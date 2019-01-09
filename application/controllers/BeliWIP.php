<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeliWIP extends CI_Controller{
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

        $data['content']= "beli_wip/index";
        $this->load->model('Model_beli_wip');
        $data['list_data'] = $this->Model_beli_wip->po_list()->result();

        $this->load->view('layout', $data);
    }

    function po_list_outdated(){
        $module_name = $this->uri->segment(1);
        $group_id = $this->session->userdata('group_id');
        if ($group_id != 1) {
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id'] = $group_id;
        $data['content'] = "beli_wip/po_list_outdated";

        $this->load->model('Model_beli_wip');
        $data['list_data'] = $this->Model_beli_wip->po_list_outdated()->result();

        $this->load->view('layout', $data);
    }

    function add(){
        $module_name = $this->uri->segment(1);
        $data['user_ppn'] = $this->session->userdata('user_ppn');
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "beli_wip/add";
        
        $this->load->model('Model_beli_sparepart');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
        $this->load->view('layout', $data);
    }

    function save(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('POWIP', $tgl_input); 

        $data = array(
            'no_po'=> $code,
            'tanggal'=> $tgl_input,
            'ppn'=> $user_ppn,
            'supplier_id'=>$this->input->post('supplier_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'jenis_po'=>'WIP',
            'created'=> $tanggal,
            'created_by'=> $user_id,
            'modified'=> $tanggal,
            'modified_by'=> $user_id
        );

        if($this->db->insert('po', $data)){
            redirect('index.php/BeliWIP/edit/'.$this->db->insert_id());  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO WIP gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/BeliWIP');  
        }  
    }

    function edit(){
        $module_name = $this->uri->segment(1);
        $data['user_ppn'] = $this->session->userdata('user_ppn');
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "beli_wip/edit";
            $this->load->model('Model_beli_wip');
            $data['header'] = $this->Model_beli_wip->show_header_po($id)->row_array();  
            // $data['list_data'] = $this->Model_beli_wip->load_detail_po($id)->result();
            // $data['list_detail'] = $this->Model_beli_wip->show_data_po($id)->result();
            $data['list_fg'] = $this->Model_beli_wip->list_wip()->result();

            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }
}