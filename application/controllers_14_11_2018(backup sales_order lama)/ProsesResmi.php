<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProsesResmi extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
    function index(){
        $module_name = $this->uri->segment(1);

        $data['content']= "prosesresmi/index";
        $this->load->model('Model_proses_resmi');
        $data['list_data'] = $this->Model_proses_resmi->list_data()->result();
        //$data['get_so_list'] = $this->Model_proses_resmi->get_so_list()->result();

        $this->load->view('layout', $data);
    }
    
    function save(){
        $this->load->model('Model_proses_resmi','proses_input');
        $this->proses_input->proses_save();
        redirect(base_url().'index.php/ProsesResmi');
    }


    public function delete(){

        $id = $this->uri->segment(3);
        $this->load->model('Model_proses_resmi','Delete_Pro');
        $this->Delete_Pro->delete_data($id);
        redirect(base_url().'index.php/ProsesResmi');   

    }



    function voucher(){
        $module_name = $this->uri->segment(1);

        $data['content']= "prosesresmi/voucher";
        $this->load->model('Model_proses_resmi');
        $data['list_data'] = $this->Model_proses_resmi->list_voucher()->result();
        $data['kode_barang'] = $this->Model_proses_resmi->select_kode_barang()->result();
        $this->load->view('layout', $data);
    }


  function save_voucher(){
        $this->load->model('Model_proses_resmi','proses_save');
        $this->proses_save->proses_save_voucher();
        redirect(base_url().'index.php/ProsesResmi/voucher');
    }

    

    function request_barang(){
        $id = $this->uri->segment(3);
        $this->load->model('Model_proses_resmi','request');
        $this->request->request($id);
        redirect(base_url().'index.php/ProsesResmi/voucher');
    }


    function barcode(){
        $module_name = $this->uri->segment(1);

        $data['content']= "prosesresmi/barcode";
        $this->load->model('Model_proses_resmi');
        $data['list_data'] = $this->Model_proses_resmi->list_barcode()->result();
        $data['filter_data'] = $this->Model_proses_resmi->filter_barcode()->result();
        $this->load->view('layout', $data);
    }

    function create_barcode(){
        $module_name = $this->uri->segment(1);
        $id= $this->uri->segment(3);
        $data['content']= "prosesresmi/create_barcode";
        $this->load->model('Model_proses_resmi');
        $data['detail'] = $this->Model_proses_resmi->detail_barcode($id)->result();
        $this->load->view('layout', $data);
    }

    function save_barcode(){
        $this->load->model('Model_proses_resmi','proses_save');
        $this->proses_save->proses_save_barcode();
        redirect(base_url().'index.php/ProsesResmi/barcode');
    }

    function surat_jalan(){
        
        $module_name = $this->uri->segment(1);
        $data['content']= "prosesresmi/surat_jalan";
        $this->load->model('Model_proses_resmi');
        $data['list_data'] = $this->Model_proses_resmi->list_sj()->result();
        $this->load->view('layout', $data);
    }

    function print_invoice(){
        $id = $this->uri->segment(3);
        $this->load->model('Model_proses_resmi');
        $data['list_data'] = $this->Model_proses_resmi->list_sj_detail($id)->result();
        $this->load->view('print_invoice',$data);
    }


    
}

?>