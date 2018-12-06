<?php

class TtrResmi extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
    function index(){
        $module_name = $this->uri->segment(1);

        $data['content']= "ttrresmi/index";
        $this->load->model('Model_ttr_resmi');
        $data['list_data'] = $this->Model_ttr_resmi->list_data()->result();
         $data['list_data2'] = $this->Model_ttr_resmi->list_data2()->result();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $this->load->model('Model_proses_resmi','proses_input');
        $this->proses_input->proses_save();
        redirect(base_url().'index.php/ProsesResmi');
    }
    
}


?>