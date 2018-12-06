<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GudangBobbin extends CI_Controller{   
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

        $data['content']= "gudang_bobbin/index";
        $this->load->model('Model_bobbin');

        $data['size_list'] = $this->Model_bobbin->get_size_list()->result();
        $data['owner_list'] = $this->Model_bobbin->get_owner_list()->result();
        $data['list_data'] = $this->Model_bobbin->list_data()->result();

        $this->load->view('layout', $data);
    }
    
    function cek_code(){
        $code = $this->input->post('data');
        $this->load->model('Model_bobbin');
        $cek_data = $this->Model_bobbin->cek_data($code)->row_array();
        $return_data = ($cek_data)? "ADA": "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tgl_input  = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal = date('Y-m-d H:i:s');

        $this->load->model('Model_bobbin');
        $this->load->model('Model_m_numberings');
        
        $format_penomoran = $this->Model_bobbin->get_format_penomoran($this->input->post('tipe'));
        if ($format_penomoran['penomoran']){
            $str_code = $format_penomoran['bobbin_size']; 
        } else {
            //BB merupakan kode penomoran bobbin
            $str_code = 'BB-FG';
        }

        $code_bobbin = $this->Model_m_numberings->getNumbering($format_penomoran['bobbin_size'], $tgl_input);
        if($code_bobbin == null){ 
            //jika penomoran belum di setup, akan insert
            $data_numbering = array(
                            'prefix'=>$str_code,
                            'date_info'=>0,
                            'padding' => 4,
                            'prefix_separator' => '.',
                            'date_separator' => '.'
                            );
            $this->db->insert('m_numberings',$data_numbering);
            $code_bobbin = $this->Model_m_numberings->getNumbering($str_code, $tgl_input);
        }

        $code_bobbin = str_replace('.', '', $code_bobbin);
        $code_bobbin = str_replace('BB-FG', $format_penomoran['bobbin_size'], $code_bobbin);

        $data = array(
                    'tanggal' => $tgl_input,
                    'nomor_bobbin' => $code_bobbin,
                    'm_jenis_packing_id' => $this->input->post('id_packing'),
                    'm_bobbin_size_id'=> $this->input->post('tipe'),
                    'owner_id'=> $this->input->post('owner'),
                    'berat'=> $this->input->post('berat'),
                    'status' => 0, //ready
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id,
                );
       
        $this->db->insert('m_bobbin', $data); 
        $this->session->set_flashdata('flash_msg', 'Data bobbin berhasil disimpan');
        redirect('index.php/GudangBobbin');       
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('m_bobbin');            
        }
        $this->session->set_flashdata('flash_msg', 'Data bobbin berhasil dihapus');
        redirect('index.php/GudangBobbin');
    }
    
    function edit(){
        $id = $this->input->post('id');
        $this->load->model('Model_bobbin');
        $data = $this->Model_bobbin->show_data($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function get_packing(){
        $id = $this->input->post('id');
        $this->load->model('Model_bobbin');
        $packing= $this->Model_bobbin->show_detail_packing($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($packing); 
    }

    function update(){
        $user_id  = $this->session->userdata('user_id');
        $id = $this->input->post('id');
        $tanggal = date('Y-m-d H:i:s');

        $this->load->model('Model_bobbin');
        $this->load->model('Model_m_numberings');
        
        $prev_value = $this->Model_bobbin->show_data($id)->row_array();
        if($prev_value['m_bobbin_size_id'] == $this->input->post('tipe')){
            $code_bobbin = $prev_value['nomor_bobbin'];
        } else {
            $format_penomoran = $this->Model_bobbin->get_format_penomoran($this->input->post('tipe'));
            if ($format_penomoran['penomoran']){
                $str_code = $format_penomoran['bobbin_size']; 
            } else {
                //BB merupakan kode penomoran bobbin
                $str_code = 'BB-FG';
            }

            $code_bobbin = $this->Model_m_numberings->getNumbering($format_penomoran['bobbin_size'], $tgl_input);
            if($code_bobbin == null){ 
                //jika penomoran belum di setup, akan insert
                $data_numbering = array(
                                'prefix'=>$str_code,
                                'date_info'=>0,
                                'padding' => 4,
                                'prefix_separator' => '.',
                                'date_separator' => '.'
                                );
                $this->db->insert('m_numberings',$data_numbering);
                $code_bobbin = $this->Model_m_numberings->getNumbering($str_code, $tgl_input);
            }

            $code_bobbin = str_replace('.', '', $code_bobbin);
            $code_bobbin = str_replace('BB-FG', $format_penomoran['bobbin_size'], $code_bobbin);
        }
        
        $data = array(
                    'nomor_bobbin' => $code_bobbin,
                    'm_bobbin_size_id'=> $this->input->post('tipe'),
                    'm_jenis_packing_id' => $this->input->post('id_packing'),
                    'owner_id'=> $this->input->post('owner'),
                    'berat'=> $this->input->post('berat'),
                    'modified_at'=> $tanggal,
                    'modified_by'=> $user_id,
                );
       
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('m_bobbin', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data bobbin berhasil diperbaharui');
        redirect('index.php/GudangBobbin');
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
        $data['judul']     = "Gudang bobbin Register";
        $data['content']   = "gudang_bobbin/add";
        
        
        $this->load->view('layout', $data);  
    }
   

    function bobbin_request(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Bobbin Request";
        $data['content']   = "gudang_bobbin/bobbin_request";
        
        $this->load->model('Model_ingot');
        $data['jenis_barang_list'] = $this->Model_ingot->jenis_barang_list()->result();
        
        
        $this->load->view('layout', $data);  
    }


    function bobbin_terima(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Bobbin Terima Barang";
        $data['content']   = "gudang_bobbin/bobbin_terima";
        
        $this->load->model('Model_ingot');
        $data['jenis_barang_list'] = $this->Model_ingot->jenis_barang_list()->result();
        
        
        $this->load->view('layout', $data);  
    }
     
    function spb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudang_bobbin/spb_list";
        $this->load->model('Model_bobbin');
        $data['list_data'] = $this->Model_bobbin->spb_list()->result();

        $this->load->view('layout', $data);
    }   
}