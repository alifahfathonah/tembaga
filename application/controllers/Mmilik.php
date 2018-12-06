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
        
        $this->load->model('Model_sumber_wip');
        $data['list_data']    = $this->db->query("select * from m_milik")->result();

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
        
        $data['judul']  = "AddMmilik";
        $data['content']= "m_milik/add";
        
        $this->load->view('layout', $data);
    }
    


    function save_addmilik(){
     $this->db->query("insert into m_milik(id,milik,keterangan)values('".$this->input->post('id')."','".$this->input->post('milik')."','".$this->input->post('keterangan')."')");   
     return redirect(base_url().'index.php/Mmilik/');
    } 

     function edit(){
      

        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);  
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        
        $data['judul']  = "EditMmilik";
        $data['content']= "m_milik/edit";
        $data['detail'] =  $this->db->query("select * from m_milik where id = '".$id."'")->result();

        $this->load->view('layout', $data);

   } 


    function save_editmilik(){

     $this->db->query("update m_milik set milik='".$this->input->post('milik')."',keterangan='".$this->input->post('keterangan')."' where id = '".$this->input->post('id')."' ");   
     return redirect(base_url().'index.php/Mmilik/');
    } 


    function delete(){

        $id = $this->uri->segment(3);
        $this->db->query("delete from m_milik where id = '".$id."'");
        redirect(base_url()."index.php/Mmilik/");



    }



}