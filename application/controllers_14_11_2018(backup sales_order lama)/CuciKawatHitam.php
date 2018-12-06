<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CuciKawatHitam extends CI_Controller{
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

        $data['content']= "cuci_kawat_hitam/index";
        $this->load->model('Model_cuci_kawat_hitam');
        $data['list_data'] = $this->Model_cuci_kawat_hitam->spb_list()->result();

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
        $data['content']= "cuci_kawat_hitam/add";
        
        $this->load->model('Model_cuci_kawat_hitam');
        $data['jenis_barang_list'] = $this->Model_cuci_kawat_hitam->jenis_barang_list()->result();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_spb'=> $code,
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'module'=>'Cuci',
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('spb', $data)){
                redirect('index.php/CuciKawatHitam/edit/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'SPB gagal di-create, silahkan dicoba kembali!');
                redirect('index.php/CuciKawatHitam');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'SPB gagal di-create, penomoran belum disetup!');
            redirect('index.php/CuciKawatHitam');
        }
    }    
    
    function edit(){
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

            $data['content']= "cuci_kawat_hitam/edit";
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header'] = $this->Model_cuci_kawat_hitam->show_header_spb($id)->row_array();              
            $data['jenis_barang_list'] = $this->Model_cuci_kawat_hitam->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/CuciKawatHitam');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'status'=>0,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('spb', $data);
        
        $this->session->set_flashdata('flash_msg', 'SPB berhasil disimpan');
        redirect('index.php/CuciKawatHitam');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_rongsok');
        $list_rongsok = $this->Model_rongsok->list_data()->result();
        
        $this->load->model('Model_cuci_kawat_hitam'); 
        $myDetail = $this->Model_cuci_kawat_hitam->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';            
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';        
        $tabel .= '<td>';
        $tabel .= '<select id="rongsok_id" name="rongsok_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($list_rongsok as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><input type="text" id="qty" name="qty" class="form-control myline" maxlength="10" '
                . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_rongsok');
        $rongsok= $this->Model_rongsok->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }
    
    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('spb_detail', array(
            'spb_id'=>$this->input->post('id'),            
            'rongsok_id'=>$this->input->post('rongsok_id'),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
            'line_remarks'=>$this->input->post('line_remarks')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item rongsok! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('spb_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header']  = $this->Model_cuci_kawat_hitam->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_cuci_kawat_hitam->load_detail($id)->result();

            $this->load->view('print_spb_kawat_hitam', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function create_skb(){
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

            $data['content']= "cuci_kawat_hitam/create_skb";
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header'] = $this->Model_cuci_kawat_hitam->show_header_spb($id)->row_array();           
            $data['details'] = $this->Model_cuci_kawat_hitam->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/CuciKawatHitam');
        }
    }
    
    function save_skb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SKB', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_skb'=> $code,
                        'tanggal'=> $tgl_input,
                        'spb_id'=> $this->input->post('spb_id'),
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('skb', $data);
            $dtr_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('skb_detail', array(
                        'skb_id'=>$dtr_id,
                        'spb_detail_id'=>$row['spb_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['spb_detail_id']);
                    $this->db->update('spb_detail', array('flag_skb'=>1));
                }
            }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SKB berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create SKB, silahkan coba kembali!');
            }                   
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan SKB gagal, penomoran belum disetup!');
        }
        redirect('index.php/CuciKawatHitam');    
    }
    
    function skb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "cuci_kawat_hitam/skb_list";
        $this->load->model('Model_cuci_kawat_hitam');
        $data['list_data'] = $this->Model_cuci_kawat_hitam->skb_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_skb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header']  = $this->Model_cuci_kawat_hitam->show_header_skb($id)->row_array();
            $data['details'] = $this->Model_cuci_kawat_hitam->show_detail_skb($id)->result();

            $this->load->view('print_skb_kawat_hitam', $data);
        }else{
            redirect('index.php'); 
        }
    }    
    
    function create_dtr(){
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

            $data['content']= "cuci_kawat_hitam/create_dtr";
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header'] = $this->Model_cuci_kawat_hitam->show_header_skb($id)->row_array();           
            $data['details'] = $this->Model_cuci_kawat_hitam->show_detail_skb($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/CuciKawatHitam');
        }
    }
    
    function save_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_dtr'=> $code,
                        'tanggal'=> $tgl_input,
                        'skb_id'=> $this->input->post('skb_id'),
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('dtr', $data);
            $dtr_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'skb_detail_id'=>$row['skb_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'bruto'=>str_replace('.', '', $row['bruto']),
                        'netto'=>str_replace('.', '', $row['netto']),
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['skb_detail_id']);
                    $this->db->update('skb_detail', array('flag_dtr'=>1));
                }
            }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTR berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTR, silahkan coba kembali!');
            }                      
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan DTR gagal, penomoran belum disetup!');
        }
        redirect('index.php/CuciKawatHitam/skb_list'); 
    }
    
    function dtr_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "cuci_kawat_hitam/dtr_list";
        $this->load->model('Model_cuci_kawat_hitam');
        $data['list_data'] = $this->Model_cuci_kawat_hitam->dtr_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_dtr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header']  = $this->Model_cuci_kawat_hitam->show_header_dtr($id)->row_array();
            $data['details'] = $this->Model_cuci_kawat_hitam->show_detail_dtr($id)->result();

            $this->load->view('print_dtr_cuci_kawat_hitam', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function create_ttr(){
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

            $data['content']= "cuci_kawat_hitam/create_ttr";
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header'] = $this->Model_cuci_kawat_hitam->show_header_dtr($id)->row_array();           
            $data['details'] = $this->Model_cuci_kawat_hitam->show_detail_dtr($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/CuciKawatHitam/dtr_list');
        }
    }
    
    function save_ttr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('TTR', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_ttr'=> $code,
                        'tanggal'=> $tgl_input,
                        'dtr_id'=> $this->input->post('dtr_id'),
                        'jmlh_afkiran'=>str_replace('.','', $this->input->post('jmlh_afkiran')),
                        'jmlh_pengepakan'=>str_replace('.','', $this->input->post('jmlh_pengepakan')),
                        'jmlh_lain'=>str_replace('.','', $this->input->post('jmlh_lain')),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('ttr', $data);
            $dtr_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('ttr_detail', array(
                        'ttr_id'=>$dtr_id,
                        'dtr_detail_id'=>$row['dtr_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>$row['qty'],
                        'bruto'=>$row['bruto'],
                        'netto'=>$row['netto'],
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['dtr_detail_id']);
                    $this->db->update('dtr_detail', array('flag_ttr'=>1));
                }
            }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'TTR berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create TTR, silahkan coba kembali!');
            }                       
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan TTR gagal, penomoran belum disetup!');
        }
        redirect('index.php/CuciKawatHitam/dtr_list');
    }
    
    function ttr_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "cuci_kawat_hitam/ttr_list";
        $this->load->model('Model_cuci_kawat_hitam');
        $data['list_data'] = $this->Model_cuci_kawat_hitam->ttr_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_ttr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_cuci_kawat_hitam');
            $data['header']  = $this->Model_cuci_kawat_hitam->show_header_ttr($id)->row_array();
            $data['details'] = $this->Model_cuci_kawat_hitam->show_detail_ttr($id)->result();

            $this->load->view('print_ttr_cuci_kawat_hitam', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function view_spb(){
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

            $data['content']= "cuci_kawat_hitam/view_spb";
            $this->load->model('Model_cuci_kawat_hitam');
            $data['myData'] = $this->Model_cuci_kawat_hitam->show_header_spb($id)->row_array();           
            $data['myDetail'] = $this->Model_cuci_kawat_hitam->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/CuciKawatHitam');
        }
    }
    
    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 1,
                'approved'=> $tanggal,
                'approved_by'=>$user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('spb', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan barang berhasil diapprove');
        redirect('index.php/CuciKawatHitam');
    }
    
    function reject_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('spb', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan barang berhasil direject');
        redirect('index.php/CuciKawatHitam');
    }
}