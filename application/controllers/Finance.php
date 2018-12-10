<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finance extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/index";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data()->result();

        $this->load->view('layout', $data);
    }

    function add(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add";
        
        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list()->result();
        $this->load->view('layout', $data); 
    }

    function get_replace(){
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $tabel = "";

        $this->load->model('Model_finance');
        $replace_list = $this->Model_finance->replace_list($id, $jenis)->result();

            $tabel .= '<option></option>';
            $tabel .= '<option value="0">Cek Baru</option>';
            foreach ($replace_list as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nomor_cek."</option>";
            }

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_replace_detail(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result = $this->Model_finance->replace_list_detail($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result); 
    }

    function save(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $data = array(
            'm_customer_id'=> $this->input->post('customer_id'),
            'tanggal'=> $this->input->post('tanggal'),
            'status'=> 0,
            'jenis_pembayaran'=> $this->input->post('jenis_id'),
            'rekening_tujuan'=> $this->input->post('bank_id'),
            'bank_pembayaran'=> $this->input->post('bank_pengirim'),
            'rekening_pembayaran'=> $this->input->post('rek_pengirim'),
            'nomor_cek'=> $this->input->post('no_cek_pengirim'),
            'currency'=> $this->input->post('currency'),
            'nominal'=> str_replace('.', '', $this->input->post('nominal')),
            'tgl_cair'=> $this->input->post('tanggal_cek'),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_uang_masuk', $data);
        $insert_id = $this->db->insert_id();

        if($this->input->post('id_replace') != 0){
            $this->db->where('id', $this->input->post('id_replace'));
            $this->db->update('f_uang_masuk', array(
                            'replace_id'=>$insert_id,
                            'status'=> 8,
            ));
        }

        if($this->db->trans_complete()){
            redirect('index.php/Finance/');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function view_um(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "finance/view_um";

            $this->load->model('Model_finance');
            $data['myData'] = $this->Model_finance->view_um($id)->row_array();
            if($data['myData']['replace_id'] > 0){
                $data['dataReplace'] = $this->Model_finance->replace_list_detail($data['myData']['replace_id'])->row_array();
            }
            //$data['list_bank'] = $this->Model_finance->bank_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function get_bank(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $barang= $this->Model_finance->get_bank_list($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function approve_um(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $id = $this->input->post('id');
        
        $this->db->trans_start();
        
        #Update status Uang Masuk
        $this->db->where('id', $id);
        $this->db->update('f_uang_masuk', array(
                        'status'=> 1,
                        'tgl_cair'=> $tgl_input,
                        'approved_at'=> $tanggal,
                        'approved_by'=> $user_id
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Uang Masuk sudah di-approve');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance');
    }

    function reject_um(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $id = $this->input->post('header_id');
        
        #Update status Uang Masuk
        $data = array(
            'status'=> 9,
            'reject_at'=> $tanggal,
            'reject_by'=> $user_id,
            'reject_remarks'=> $this->input->post('reject_remarks')
        );

        $this->db->where('id', $id);
            
            if($this->db->update('f_uang_masuk', $data)){
                $this->session->set_flashdata('warning_msg', 'Uang Masuk sudah di Reject');
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance');
    }

    function voucher_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/voucher_list";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->voucher_list()->result();

        $this->load->view('layout', $data);
    }

    function pembayaran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/pembayaran";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data_pembayaran()->result();

        $this->load->view('layout', $data);
    }

    function add_pembayaran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_pembayaran";
        
        $this->load->model('Model_finance');

        $this->load->view('layout', $data); 
    }

    function save_pembayaran(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PMB', $tgl_input);

        $data = array(
            'no_pembayaran'=> $code,
            'tanggal'=> $this->input->post('tanggal'),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_pembayaran', $data);
        $id_new=$this->db->insert_id();

        if($this->db->trans_complete()){
            redirect(base_url('index.php/Finance/add_detail_pembayaran/'.$id_new));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function save_redirect(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');

        $id = $this->input->post('id');
        $this->db->trans_start();
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail($id)->result();

        foreach ($myDetail as $row) {
            $data = array(
            'id_pembayaran'=> $id,
            'voucher_id'=> $row->id,
            'um_id'=> 0
            );
        $this->db->insert('f_pembayaran_detail', $data);   
        }
        if($this->db->trans_complete()){
            redirect(base_url('index.php/Finance/matching_pmb/'.$this->input->post('id')));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function add_detail_pembayaran(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_detail_pembayaran";

        $this->load->model('Model_finance');
        $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
        //$data['voucher_list'] = $this->Model_finance->list_data_voucher()->result();

        $this->load->view('layout', $data); 
    }

    function load_detail_pembayaran(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail($id)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_voucher.'</td>';
            $tabel .= '<td>'.$row->jenis_voucher.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.number_format($row->amount,0,',','.').'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail_vc('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_vc_list(){ 
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_data_voucher()->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_voucher;
        } 
        print form_dropdown('vc_id', $arr_so);
    }

    function get_data_voucher(){
        $id = $this->input->post('id');
        $tabel = "";

        $this->load->model('Model_finance');
        $voucher= $this->Model_finance->list_voucher($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($voucher);
    }

    function save_detail_pembayaran(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $tanggal   = date('Y-m-d h:m:s');
        
        $data = array(
            'pembayaran_id'=>$this->input->post('id'),
            'modified'=> $tanggal,
            'modified_by'=> $user_id
        );
        $this->db->where('id', $this->input->post('vc_id'));
        if($this->db->update('voucher', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_pembayaran(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();
        $data = array(
                'pembayaran_id'=>0,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $id);
        if($this->db->update('voucher', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB FG! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function add_detail_um(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_detail_um";

        $this->load->model('Model_finance');
        $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
        $data['myDetail'] = $this->Model_finance->load_detail($id)->result();
        $data['myData'] = $this->Model_finance->load_detail_um($id)->result();

        $this->load->view('layout', $data); 
    }

    function load_detail_um(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail_um($id)->result();
        $um_list = $this->Model_finance->list_data_um()->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->currency.' '.number_format($row->nominal,0,',','.').'</td>';
            $tabel .= '<td>'.$row->jenis_pembayaran.'</td>';
            $tabel .= '<td>'.$row->bank_pembayaran.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail_um('.$row->id.');"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td>';
        $tabel .= '<select id="um_id" name="um_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_data_um(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($um_list as $value){
                $tabel .= "<option value='".$value->id."'>".$value->currency.' '.number_format($value->nominal,0,',','.')."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="jenis_pembayaran" name="jenis_voucher" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><input type="text" id="bank_pembayaran" name="bank_pembayaran" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<input type="hidden" id="amount_um" name="amount_um" class="form-control myline" readonly="readonly"/>';
        $tabel .= '<td><input type="text" id="keterangan_um" name="keterangan_um" class="form-control myline" readonly="readonly"'
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail_um();" style="margin-top:7px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_data_um(){
        $id = $this->input->post('id');
        $tabel = "";

        $this->load->model('Model_finance');
        $um= $this->Model_finance->get_data_um($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($um);
    }

    function save_detail_um(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        $data = array(
            'id_pembayaran'=>$this->input->post('id'),
            'um_id'=>$this->input->post('um_id')
        );
        if($this->db->insert('f_pembayaran_detail', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_um(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();

        $this->db->where('id', $id);
        if($this->db->delete('f_pembayaran_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB FG! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function save_pmb(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
            'modified_at'=>$tanggal,
            'modified_by'=>$user_id
        );
        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('f_pembayaran', $data)){
            redirect(base_url('index.php/Finance/pembayaran'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        } 
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function approve_pmb(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        $data = array(
            'status'=>1
        );
        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('f_pembayaran', $data)){
            redirect(base_url('index.php/Finance/pembayaran'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        } 
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function matching_pmb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Finance";
            $data['content']   = "finance/matching_pmb";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }
}