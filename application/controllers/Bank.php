<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CI_Controller{
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

        $data['content']= "bank/index";
        $this->load->model('Model_bank');
        $data['list_data'] = $this->Model_bank->list_data()->result();

        $this->load->view('layout', $data);
    }
    
    function cek_code(){
        $code = $this->input->post('data');
        $this->load->model('Model_bank');
        $cek_data = $this->Model_bank->cek_data($code)->row_array();
        $return_data = ($cek_data)? "ADA": "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                    'kode_bank'=> $this->input->post('kode_bank'),
                    'nama_bank'=> $this->input->post('nama_bank'),
                    'nomor_rekening'=> $this->input->post('no_rek'),
                    'no_acc'=> $this->input->post('no_acc'),
                    'atas_nama'=> $this->input->post('an'),
                    'currency'=> $this->input->post('currency'),
                    'kantor_cabang'=> $this->input->post('kc'),
                    'ppn'=> $this->input->post('ppn'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                );
       
        $this->db->insert('bank', $data); 
        $this->session->set_flashdata('flash_msg', 'Data bank berhasil disimpan');
        redirect('index.php/Bank');       
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('bank');            
        }
        $this->session->set_flashdata('flash_msg', 'Data bank berhasil dihapus');
        redirect('index.php/Bank');
    }
    
    function edit(){
        $id = $this->input->post('id');
        $this->load->model('Model_bank');
        $data = $this->Model_bank->show_data($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                'kode_bank'=> $this->input->post('kode_bank'),
                'nama_bank'=> $this->input->post('nama_bank'),
                'nomor_rekening'=> $this->input->post('no_rek'),
                'no_acc'=> $this->input->post('no_acc'),
                'atas_nama'=> $this->input->post('an'),
                'currency'=> $this->input->post('currency'),
                'kantor_cabang'=> $this->input->post('kc'),
                'ppn'=> $this->input->post('ppn'),
                //'flag_sinkronisasi'=>0,
                //'flag_action'=>'U',
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('bank', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data bank berhasil disimpan');
        redirect('index.php/Bank');
    }
    
}