<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MSumberwip extends CI_Controller{
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
        
        $data['judul']  = "MSumberwip";
        $data['content']= "m_sumber_wip/index";
        
        $this->load->model('Model_sumber_wip');
        $data['list_data']    = $this->Model_sumber_wip->list_data()->result();

        $this->load->view('layout', $data);
    }
    


    function add_sumber_wip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        
        $data['judul']  = "AddMSumberwip";
        $data['content']= "m_sumber_wip/add";
        
        $this->load->view('layout', $data);
    }
    


    function save_addwip(){
     $this->db->query("insert into m_sumber_wip(id,sumber,keterangan)values('".$this->input->post('id')."','".$this->input->post('sumber')."','".$this->input->post('keterangan')."')");   
     return redirect(base_url().'index.php/MSumberwip/');
    } 



    function edit_wip(){
      

        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);  
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        
        $data['judul']  = "EditMSumberwip";
        $data['content']= "m_sumber_wip/edit_wip";
        $data['detail'] =  $this->db->query("select * from m_sumber_wip where id = '".$id."'")->result();

        $this->load->view('layout', $data);

   } 


    function save_editwip(){

     $this->db->query("update m_sumber_wip set sumber='".$this->input->post('sumber')."',keterangan='".$this->input->post('keterangan')."' where id = '".$this->input->post('id')."' ");   
     return redirect(base_url().'index.php/MSumberwip/');
    } 


    function delete(){

        $id = $this->uri->segment(3);
        $this->db->query("delete from m_sumber_wip where id = '".$id."'");
        redirect(base_url()."index.php/MSumberwip/");



    }


}