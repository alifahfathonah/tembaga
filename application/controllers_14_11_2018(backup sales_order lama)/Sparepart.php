<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sparepart extends CI_Controller{
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

        $data['content']= "sparepart/index";
        $this->load->model('Model_sparepart');
        $data['list_data'] = $this->Model_sparepart->list_data()->result();

        $this->load->view('layout', $data);
    }
    
    function cek_code(){
        $code = $this->input->post('data');
        $this->load->model('Model_sparepart');
        $cek_data = $this->Model_sparepart->cek_data($code)->row_array();
        $return_data = ($cek_data)? "ADA": "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                    'nama_item'=> $this->input->post('nama_item'),
                    'uom'=> $this->input->post('uom'),
                    'description'=> $this->input->post('description'),
                    'alias'=> $this->input->post('alias'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                );
       
        $this->db->insert('sparepart', $data); 
        $this->session->set_flashdata('flash_msg', 'Data sparepart berhasil disimpan');
        redirect('index.php/Sparepart');       
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('sparepart');            
        }
        $this->session->set_flashdata('flash_msg', 'Data sparepart berhasil dihapus');
        redirect('index.php/Sparepart');
    }
    
    function edit(){
        $id = $this->input->post('id');
        $this->load->model('Model_sparepart');
        $data = $this->Model_sparepart->show_data($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'nama_item'=> $this->input->post('nama_item'),
                'uom'=> $this->input->post('uom'),
                'description'=> $this->input->post('description'),
                'alias'=> $this->input->post('alias'),
                //'flag_sinkronisasi'=>0,
                //'flag_action'=>'U',
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sparepart', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data sparepart berhasil disimpan');
        redirect('index.php/Sparepart');
    }
    
}