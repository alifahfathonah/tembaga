<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PrintInvoice extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        //$data['content']= "print_invoice";
        $this->load->model('Model_print_invoice');
        $data['list_data'] = $this->Model_print_invoice->list_data()->result();
        $this->load->view('print_invoice',$data);
    }
    
}