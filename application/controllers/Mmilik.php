<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmilik extends CI_Controller{
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
        
        $data['judul']  = "Mmilik";
        $data['content']= "m_milik/index";
        
        $this->load->model('Model_m_milik');
        $data['list_data']    = $this->db->query("select * from owner")->result();

        $this->load->view('layout', $data);
    }
    
    function save(){
        $this->db->insert('owner', array(
            'kode_owner' => $this->input->post('kode_owner'),
            'nama_owner' => $this->input->post('nama_owner')
        ));  
     return redirect(base_url().'index.php/Mmilik/');
    } 

    function edit(){
        $id = $this->input->post('id');
        $data =  $this->db->query("select * from owner where id = '".$id."'")->row_array();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function update(){
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('owner', array(
            'kode_owner' => $this->input->post('kode_owner'),
            'nama_owner' => $this->input->post('nama_owner')
        ));  
    return redirect(base_url().'index.php/Mmilik/');
    } 

    function delete(){
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('owner');
        
        redirect(base_url()."index.php/Mmilik/");
    }



}