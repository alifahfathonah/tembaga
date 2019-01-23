<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratJalan extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_surat_jalan');
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

        $data['content']= "resmi/surat_jalan/index";

        $this->load->view('layout', $data);
    }

    function add_surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "resmi/surat_jalan/add_surat_jalan";
        $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();
        $data['jenis_barang_list'] = $this->Model_surat_jalan->jenis_barang_list()->result();

        $this->load->view('layout', $data);
    }

    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SJ-R', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_sj_resmi'=> $code,
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('r_t_surat_jalan', $data)){
                redirect('index.php/SuratJalan/edit_surat_jalan/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/SuratJalan/surat_jalan');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, penomoran belum disetup!');
            redirect('index.php/SuratJalan/surat_jalan');
        }
    }

    function edit_surat_jalan(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "resmi/surat_jalan/edit_surat_jalan";
            $data['header'] = $this->Model_surat_jalan->show_header_sj($id)->row_array();  
            // $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            // $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();

            // $jenis = $data['header']['jenis_barang'];
            // $soid = $data['header']['sales_order_id'];
            // if($jenis == 'FG'){
            //     $data['list_produksi'] = $this->Model_sales_order->list_item_sj_fg($soid)->result();
            //     $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();
            // }else if($jenis == 'WIP'){
            //     $data['list_produksi'] = $this->Model_sales_order->list_item_sj_wip($soid)->result();
            //     $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_wip()->result();
            // }else{
            //     $data['list_produksi'] = $this->Model_sales_order->list_item_sj_rsk($soid)->result();
            //     $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_rsk()->result();
            // }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/SalesOrder/surat_jalan');
        }
    }
    
}