<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends CI_Controller{   
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
        $data['judul']     = "Gudang";
        $data['content']   = "gudang/index";
        
       // $this->load->model('Model_ingot');
 		$query = $this->db->query("Select * From m_jenis_brg_wip");

        $data['jenis_barang_list'] = $query->result();
        
        
        $this->load->view('layout', $data);  
    }
        
   
}