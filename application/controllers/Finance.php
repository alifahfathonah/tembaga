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
        $data['list_customer'] = $this->Model_finance->customer_list()->result();

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
        $tglurut = date('ymd', strtotime($this->input->post('tanggal')));

        $tgl_sekarang = date('d', strtotime($this->input->post('tanggal')));
        if ($tgl_sekarang == 01) {
            $cek_no_sebelumnya = $this->db->query("select no_uang_masuk from f_uang_masuk where tanggal = '$tgl_input' order by id desc")->row_array();
                $cek = $cek_no_sebelumnya['no_uang_masuk'];
            if (empty($cek_no_sebelumnya)) {
                $no_urut = 0;
            } else {
                $this->load->model('Model_finance');
                $check = $this->Model_finance->check_urut()->row_array();
                $no_urut = substr($check['no_uang_masuk'], 0, 4);
            }
            
        } else {
           $this->load->model('Model_finance');
            $check = $this->Model_finance->check_urut()->row_array();
            $no_urut = substr($check['no_uang_masuk'], 0, 4);
        }

        
        $no_urut = $no_urut + 1;
        switch (strlen($no_urut)) {
            case 1 : $urutan = "000".$no_urut;
                break;
            case 2 : $urutan = "00".$no_urut;
                break;
            case 3 : $urutan = "0".$no_urut;
                break;
            
            default:
                $urutan = $no_urut;
                break;
        }


        // $this->load->model('Model_m_numberings');
        // $code = $this->Model_m_numberings->getNumbering('UM', $tgl_input);
        $code = $urutan.$tglurut;
        echo $code;
        $this->db->trans_start();
        $data = array(
            'no_uang_masuk'=> $code,
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

    function update_um(){
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->post('header_id');
        $tanggal  = date('Y-m-d h:m:s');
        $jenis = $this->input->post('jenis1');
        if($jenis=="Cek Mundur"){
            $data = array(
                'status'=>0,
                'tgl_cair'=>$this->input->post('tanggal_cek_baru'),
                'modified_at'=>$tanggal,
                'modified_by'=>$user_id,
                'update_remarks'=>$this->input->post('update_remarks')
            );
        }else if($jenis=="Cek"){
            $data = array(
                'status'=>0,
                'nomor_cek'=>$this->input->post('nomor'),
                'modified_at'=>$tanggal,
                'modified_by'=>$user_id,
                'update_remarks'=>$this->input->post('update_remarks')
            );
        }else if($jenis=="Giro"){
            $data = array(
                'status'=>0,
                'rekening_pembayaran'=>$this->input->post('nomor'),
                'modified_at'=>$tanggal,
                'modified_by'=>$user_id,
                'update_remarks'=>$this->input->post('update_remarks')
            );
        }
        $this->db->where('id', $id);
        if($this->db->update('f_uang_masuk', $data)){
            $this->session->set_flashdata('flash_msg', 'Uang Masuk berhasil di update');
            redirect('index.php/Finance');
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }             
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


    function view_voucher(){
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
            $data['content']   = "finance/view_voucher";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_voucher($id)->row_array();
            $data['list_data'] = $this->Model_finance->show_detail_voucher($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
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

    function check_voucher(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/check_voucher";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->check_voucher()->result();

        $this->load->view('layout', $data);
    }

    function check_um(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/check_um";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->check_um()->result();

        $this->load->view('layout', $data);
    }

    function slip_setoran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/slip_setoran";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_data_slip_setoran()->result();

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
            redirect(base_url('index.php/Finance/matching_pmb/'.$id_new));
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
        $this->load->view('layout', $data); 
    }

    function load_detail_pembayaran(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $total_vc = 0;
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
            $total_vc += $row->amount;
        }
        $tabel .= '<tr>';
        $tabel .= '<td></td>';
        $tabel .= '<td><a <a href="'.base_url().'index.php/Finance/check_voucher" onclick="window.open(\''.base_url().'index.php/Finance/check_voucher\',\'newwindow\',\'width=1200,height=550\'); return false;" class="btn btn-primary" style="width:100%;">Lihat daftar voucher</a></td>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td><input type="text" id="total_vc" name="total_vc" style="background-color: green; color: white;" class="form-control" data-myvalue="'.$total_vc.'" value="'.number_format($total_vc,0,',','.').'" readonly="readonly"></td>';
        $tabel .= '<tr>';

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

    function get_um_list_pmb(){ 
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_data_um()->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_uang_masuk;
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
        $total_um = 0;
        $no    = 1;
        $this->load->model('Model_finance');
        $myDetail = $this->Model_finance->load_detail_um($id)->result();

        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_uang_masuk.'</td>';
            $tabel .= '<td>'.$row->jenis_pembayaran.'</td>';
            $tabel .= '<td>'.$row->bank_pembayaran.'</td>';
            $tabel .= '<td>'.$row->rekening_pembayaran.$row->nomor_cek.'</td>';
            $tabel .= '<td>';
                    if($row->status==0){
                        $tabel .= '<div style="background-color:darkkhaki; padding:3px">Belum Cair</div>';
                    }else if($row->status==1){
                        $tabel .= '<div style="background-color:green; padding:3px; color:white">Sudah Cair</div>';
                    }else if($row->status==2){
                        $tabel .= '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                    }else if($row->status==9){
                        $tabel .= '<div style="background-color:red; color:#fff; padding:3px">Gagal Cair</div>';
                    }else if($row->status==8){
                        $tabel .= '<div style="background-color:orange; color:#fff; padding:3px">Sudah Diganti</div>';
                        $tabel .= '<input type="hidden" id="tag" value="1">';
                    }
            $tabel .= '</td>';
            $tabel .= '<td>'.$row->currency.' '.number_format($row->nominal,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail_um('.$row->id.');"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
            $total_um += $row->nominal;
        }$tabel .= '<tr>';
        $tabel .= '<td></td>';
        $tabel .= '<td><a <a href="'.base_url().'index.php/Finance/check_um" onclick="window.open(\''.base_url().'index.php/Finance/check_um\',\'newwindow\',\'width=1200,height=550\'); return false;" class="btn btn-primary" style="width:100%;">Lihat daftar Uang Masuk</a></td>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td><input type="text" id="total_um" name="total_um" style="background-color: green; color: white;" class="form-control" data-myvalue="'.$total_um.'" value="'.number_format($total_um,0,',','.').'" readonly="readonly"></td>';
        $tabel .= '<td></td>';
        $tabel .= '<tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_data_um(){
        $id = $this->input->post('id');

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

    function approveagain(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
            'tanggal'=>$tgl_input,
            'status'=>0,
            'keterangan'=>$this->input->post('remarks'),
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

    function save_pmb(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
            'tanggal'=>$tgl_input,
            'keterangan'=>$this->input->post('remarks'),
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

    function view_pmb(){
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
            $data['content']   = "finance/view_pmb";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->list_detail_pembayaran($id)->row_array();
            if($data['header']['status']==9){
            $data['detailVC'] = $this->Model_finance->load_detail_reject($id)->result();
            }else{
            $data['detailVC'] = $this->Model_finance->load_detail($id)->result();
            }
            $data['detailUM'] = $this->Model_finance->load_detail_um($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function jalankan_pmb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d');
        $id = $this->input->post('id');
        
        $this->db->trans_start();

        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>2,
            'tanggal_jalan'=>$tanggal
        ));
        
        if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Pembayaran sudah di-approve. Detail Pembayaran sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat menjalankan pembayaran, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance/pembayaran');
    }

    function approve_pmb(){
        $user_id = $this->session->userdata('user_id');
        $tanggal = date('Y-m-d');
        $tanggal_input = date('Y-m-d h:m:s');

        $this->db->trans_start();
        
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $loop_vc = $this->Model_finance->load_detail($id)->result();
        $loop_um = $this->Model_finance->load_detail_um($id)->result();

        foreach ($loop_vc as $row) {
            $data = array(
            'id_pembayaran'=> $id,
            'voucher_id'=> $row->id,
            'um_id'=> 0
            );
            $this->db->insert('f_pembayaran_detail', $data);   
        }

        foreach ($loop_um as $row) {
            $data = array(
                'status'=>1,
                'tgl_cair'=>$tanggal,
                'approved_at'=>$tanggal_input,
                'approved_by'=>$user_id
            );
            $this->db->where('id',$row->um_id);
            $this->db->update('f_uang_masuk', $data);   
        }

        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>1,
            'approved_at'=>$tanggal,
            'approved_by'=>$user_id
        ));

        $this->db->insert('f_slip_setoran', array(
            'id_pembayaran'=>$id,
            'nominal'=>$this->input->post('nominal_slip'),
            'created_at'=>$tanggal,
            'created_by'=>$user_id
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Pembayaran sudah di-approve. Detail Pembayaran sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/Finance/pembayaran');
    }

    function reject_pmb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $id = $this->input->post('header_id');

        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>3,
            'tanggal_jalan'=>'0000-00-00',
            'reject_remarks'=>$this->input->post('reject_remarks')
        ));

        $this->session->set_flashdata('flash_msg', 'Data Pembayaran berhasil direject');
        redirect('index.php/Finance/pembayaran');
    }

    function reject_all_pmb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $id = $this->input->post('header_id');

        $this->load->model('Model_finance');
        $loop_vc = $this->Model_finance->load_detail($id)->result();

        //INSERT VOUCHER
        foreach ($loop_vc as $row) {
            $data = array(
            'id_pembayaran'=> $id,
            'voucher_id'=> $row->id,
            'um_id'=> 0
            );
            $this->db->insert('f_pembayaran_detail', $data);   
        }

        $this->db->where('id',$id);
        $this->db->update('f_pembayaran', array(
            'status'=>9,
            'reject_at'=>$tanggal,
            'reject_by'=>$user_id,
            'reject_remarks'=>$this->input->post('reject_remarks')
        ));

        //MERUBAH VOUCHER MENJADI DEFAULT LAGI
        $this->db->where('pembayaran_id', $id);
        $this->db->update('voucher', array(
            'pembayaran_id'=>0
        ));
        
        $this->session->set_flashdata('flash_msg', 'Semua Data Pembayaran berhasil direject');
        redirect('index.php/Finance/pembayaran');
    }

    function invoice(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/invoice";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_invoice()->result();

        $this->load->view('layout', $data);
    }

    function add_invoice(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_invoice";
        
        $this->load->model('Model_finance');
        $data['customer_list'] = $this->Model_finance->customer_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list()->result();
        $this->load->view('layout', $data); 
    }

    function get_flag(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_flag($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_so_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_so_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_sales_order;
        } 
        print form_dropdown('sales_order_id', $arr_so);
    }

    function get_sj_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->get_sj_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_surat_jalan;
        } 
        print form_dropdown('surat_jalan_id', $arr_so);
    }

    function save_invoice(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('INVOICE', $tgl_input);

        $id_so = $this->input->post('sales_order_id');
        $id_sj = $this->input->post('surat_jalan_id');

        $data = array(
            'no_invoice'=> $code,
            'bank_id'=> $this->input->post('bank_id'),
            'diskon'=> str_replace('.', '', $this->input->post('diskon')),
            'add_cost'=> str_replace('.', '', $this->input->post('add_cost')),
            'materai'=> str_replace('.', '', $this->input->post('materai')),
            'tanggal'=> $tgl_input,
            'tgl_jatuh_tempo'=> $this->input->post('tanggal_jatuh'),
            'id_customer'=> $this->input->post('m_customer_id'),
            'id_sales_order'=> $id_so,
            'id_surat_jalan'=> $id_sj,
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_invoice', $data);
        $id_new=$this->db->insert_id();

        $this->load->model('Model_finance');
        if($this->input->post('flag_tolling') == 1){
            $loop_detail = $this->Model_finance->load_detail_invoice_tolling($id_sj)->result();
        }else{
            $loop_detail = $this->Model_finance->load_detail_invoice($id_sj)->result();
        }

        foreach($loop_detail as $row){
            $total = $row->amount * $row->netto;
                if($row->jenis_barang_alias>0){
                    $jenis_barang = $row->jenis_barang_alias;
                }else{
                    $jenis_barang = $row->jenis_barang_id;
                }
            $this->db->insert('f_invoice_detail', array(
                    'id_invoice'=>$id_new,
                    'jenis_barang_id'=>$jenis_barang,
                    'qty'=>$row->qty,
                    'netto'=>$row->netto,
                    'harga'=>$row->amount,
                    'total_harga'=>$total,
                    'keterangan'=>$row->line_remarks
            ));
        }

        $cek = $this->Model_finance->get_sj_list($id_so)->result();
        if(empty($cek)){
            $this->db->where('id',$id_so);
            $this->db->update('sales_order', array(
                'flag_invoice'=>1
            ));
        }else{
            $this->db->where('id',$id_so);
            $this->db->update('sales_order', array(
                'flag_invoice'=>2
            ));
        }

        if($this->db->trans_complete()){
            redirect(base_url('index.php/Finance/view_invoice/'.$id_new));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function view_invoice(){
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
            $data['content']   = "finance/view_invoice";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_invoice($id)->row_array();
            if($data['header']['id_retur']==0){
                $data['detailInvoice'] = $this->Model_finance->show_detail_invoice($id)->result();
                $data['matching'] = $this->Model_finance->show_detail_matching_um($id)->result();
            }else{
                $data['detailInvoice'] = $this->Model_finance->show_invoice_detail($id)->result();
            }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function simpan_invoice(){
        $user_id   = $this->session->userdata('user_id');
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $tanggal   = date('Y-m-d h:m:s');
        
        $this->db->trans_start();
        
        if($this->db->trans_complete()){
            redirect(base_url('index.php/Finance/invoice'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Invoice gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }
    }

    function print_invoice(){
        $id = $this->uri->segment(3);
        if($id){       
            $this->load->helper('terbilang_helper'); 
            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_invoice($id)->row_array();
            $data['details'] = $this->Model_finance->show_detail_invoice($id)->result();

            $total = 0;
            foreach ($data['details'] as $row) {
                $total += $row->total_harga;
            }

            $data['total'] = $total;

            $this->load->view('finance/print_faktur', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/matching";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_matching()->result();

        $this->load->view('layout', $data);
    }

    function matching_invoice(){
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
            $data['content']   = "finance/matching_invoice";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->customer_detail($id)->row_array();
            $data['details_invoice'] = $this->Model_finance->load_invoice_full($id)->result();
            $data['details_um'] = $this->Model_finance->load_um_full($id)->result();
            $data['details_matching'] = $this->Model_finance->load_matching_invoice($id)->result();
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/Finance');
        }
    }

    function get_um(){
        $id = $this->input->post('id');
        $tabel = "";

        $this->load->model('Model_finance');
        $um= $this->Model_finance->get_um($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($um);
    }

    function get_invoice_list_plus(){ 
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_invoice_matching_plus($this->input->post('id'))->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_invoice;
        } 
        print form_dropdown('invoice_id', $arr_so);
    }

    function get_invoice_list_minus(){
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_invoice_matching_minus($this->input->post('id'))->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_invoice;
        }
        print form_dropdown('invoice_id', $arr_so);
    }

    function get_um_list(){ 
        $this->load->model('Model_finance');
        $data = $this->Model_finance->list_um_matching($this->input->post('id'))->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->nomor;
        } 
        print form_dropdown('invoice_id', $arr_so);
    }

    function get_data_invoice(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result= $this->Model_finance->get_data_invoice($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function get_data_hutang(){
        $id = $this->input->post('id');

        $this->load->model('Model_finance');
        $result= $this->Model_finance->get_data_hutang($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function add_matching(){
        $user_id = $this->session->userdata('user_id');
        $tanggal = date('Y-m-d');
        $tanggal_input = date('Y-m-d h:m:s');

        $this->db->trans_start();
        
        $id = $this->input->post('id_modal');
        $id_invoice = $this->input->post('invoice_id');
        $id_um = $this->input->post('um_id');
        $id_hutang = $this->input->post('invoice_min');
        $sisa_invoice = str_replace('.', '', $this->input->post('sisa_invoice'));
        $sisa_um = str_replace('.', '', $this->input->post('sisa_um'));
        $sisa_hutang = str_replace('.', '', $this->input->post('sisa_hutang'));
        $harga_um = str_replace('.', '', $this->input->post('harga_um'));
        $harga_invoice = str_replace('.', '', $this->input->post('harga_invoice'));
        $harga_hutang = str_replace('.', '', $this->input->post('hutang'));
        $this->load->model('Model_finance');

        $paid = $harga_um - $sisa_um;
        $hutang = $harga_hutang - $sisa_hutang;
            $data = array(
                'customer_id'=>$id,
                'id_invoice'=> $id_invoice,
                'id_um'=> $id_um,
                'id_hutang'=> $id_hutang,
                'paid'=>$paid,
                'used_hutang'=> $hutang,
                'sisa_um'=>$sisa_um,
                'sisa_invoice'=>$sisa_invoice,
                'created_at'=> $tanggal_input,
                'created_by'=> $user_id
            );
            $this->db->insert('f_matching_detail', $data);   

            // UPDATE MATCHING_ID DI TABEL F_INVOICE JIKA SISA_INVOICE = 0
            if($sisa_invoice == 0){
                $data = array(
                    'flag_matching'=> 1,
                    'modified_at'=> $tanggal_input,
                    'modified_by'=> $user_id
                );
                $this->db->where('id', $id_invoice);
                $this->db->update('f_invoice', $data);
            }

            //UPDATE MATCHING_ID DI TABEL F_UANG_MASUK JIKA SISA_UM = 0
            if($sisa_um == 0){
                $data = array(
                    'flag_matching'=> 1,
                    'modified_at'=> $tanggal_input,
                    'modified_by'=> $user_id
                );
                $this->db->where('id', $id_um);
                $this->db->update('f_uang_masuk', $data);
            }

            if($sisa_hutang == 0){
                $data = array(
                    'flag_matching'=> 1,
                    'modified_at'=> $tanggal_input,
                    'modified_by'=> $user_id
                );
                $this->db->where('id', $id_hutang);
                $this->db->update('f_invoice', $data);
            }

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Matching sudah diupdate');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat penginputan Data Matching, silahkan coba kembali!');
            }
       redirect('index.php/Finance/matching_invoice/'.$id);
    }

    function filter_cek(){
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
            $data['content']   = "finance/filter_cek";

            $this->load->model('Model_finance');
            $data['list_data'] = $this->Model_finance->list_data_filter($id)->result();
            $data['list_customer'] = $this->Model_finance->customer_list()->result();

            $this->load->view('layout', $data);
        }else{
            redirect('index.php/Finance');
        }
    }

    function list_kas(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "finance/list_kas";
        $this->load->model('Model_finance');
        $data['list_data'] = $this->Model_finance->list_kas()->result();

        $this->load->view('layout', $data);
    }

    function add_kas(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_kas";
        
        $this->load->model('Model_finance');
        $data['um_list'] = $this->Model_finance->um_list_kas()->result();
        $data['bank_list'] = $this->Model_finance->bank_list()->result();
        $this->load->view('layout', $data); 
    }

    function save_kas(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $data = array(
            'jenis_trx'=>0,
            'tanggal'=> $tgl_input,
            'id_bank'=> $this->input->post('bank_id'),
            'id_um'=> $this->input->post('um_id'),
            'currency'=> $this->input->post('currency'),
            'nominal'=> $this->input->post('nominal'),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_kas', $data);

        $this->db->where('id', $this->input->post('um_id'));
        $this->db->update('f_uang_masuk', array(
            'status'=>1,
            'flag_matching'=>2,
            'approved_at'=>$tanggal,
            'approved_by'=>$user_id
        ));

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Uang Kas Berhasil disimpan!');
            redirect(base_url('index.php/Finance/list_kas'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }

    function view_kas(){
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
            $data['content']   = "finance/view_kas";

            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_kas($id)->row_array();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }

    function add_slip_setoran(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finance";
        $data['content']   = "finance/add_slip_setoran";
        
        $this->load->model('Model_finance');
        $data['data_slip'] = $this->Model_finance->slip_setoran_list()->result();
        $data['bank_list'] = $this->Model_finance->bank_list()->result();
        $this->load->view('layout', $data); 
    }

    function save_slip_setoran(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $data = array(
            'jenis_trx'=>0,
            'tanggal'=> $tgl_input,
            'id_bank'=> $this->input->post('bank_id'),
            'id_slip_setoran'=> $this->input->post('slip_id'),
            'currency'=> 'IDR',
            'nominal'=> str_replace('.', '', $this->input->post('nominal')),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_kas', $data);
        $insert_id = $this->db->insert_id();

        $this->db->where('id', $this->input->post('slip_id'));
        $this->db->update('f_slip_setoran', array(
            'id_kas'=>$insert_id,
            'modified_at'=>$tanggal,
            'modified_by'=>$user_id
        ));

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Uang Kas Berhasil disimpan!');
            redirect(base_url('index.php/Finance/slip_setoran'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }
}