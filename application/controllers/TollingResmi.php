<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TollingResmi extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_tolling_resmi');
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $this->load->model('Model_matching');
        $data['group_id']  = $group_id;
        $data['list_data'] = $this->Model_tolling_resmi->list_tolling()->result();
        $data['content']= "resmi/tolling_resmi/index";

        $this->load->view('layout', $data);
    }

    function add(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['header'] = $this->Model_tolling_resmi->add_tolling($id)->row_array();
        $this->load->model('Model_surat_jalan');
        $data['myDetail'] = $this->Model_surat_jalan->list_sj_detail($id)->result(); 

        $data['content']= "resmi/tolling_resmi/add";

        $this->load->view('layout', $data);
    }

    function get_customer_sj(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_resmi');
        $customer = $this->Model_tolling_resmi->get_customer_sj($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));        
        
        $this->db->trans_start();

            $this->load->model('Model_m_numberings');
            $code_dtr = $this->Model_m_numberings->getNumbering('DTR-R', $tgl_input); 

            //CREATE DTR R
            $data_dtr = array(
                'no_dtr_resmi'=> $code_dtr,
                'tanggal'=> $tgl_input,
                'sj_id'=>$this->input->post('sj_id'),
                'f_invoice_id'=>$this->input->post(''),
                'customer_id'=>$this->input->post('customer_id'),
                'created_by'=> $user_id,
                'created_at'=> $tanggal
            );
            $this->db->insert('r_dtr', $data_dtr);
            $dtr_id = $this->db->insert_id();

            //CREATE TTR R
            $code_ttr = $this->Model_m_numberings->getNumbering('TTR-R', $tgl_input); 
            $data_ttr = array(
                'no_ttr_resmi'=> $code_ttr,
                'tanggal'=> $tgl_input,
                'r_dtr_id'=> $dtr_id,
                'customer_id'=>$this->input->post('customer_id'),
                'created_by'=> $user_id,
                'created_at'=> $tanggal
            );
            $this->db->insert('r_ttr', $data_ttr);
            $ttr_id = $this->db->insert_id();

            //UPDATE STATUS SJ
            $this->db->where('id',$this->input->post('sj_id'));
            $this->db->update('r_t_surat_jalan', array(
                'flag_tolling'=> 1
            ));

            //INPUT DTR DAN TTR
            $this->load->model('Model_surat_jalan');
            $list_sj_detail = $this->Model_surat_jalan->list_sj_detail($this->input->post('sj_id'))->result();
            foreach ($list_sj_detail as $row) {
                $berat_pallete = $row->bruto - $row->netto;
                $detail_dtr = array(
                    'r_dtr_id' => $dtr_id,
                    'rongsok_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'berat_pallete' => $berat_pallete,
                    'no_pallete' => $row->no_packing,
                    'line_remarks' => $row->line_remarks
                );
                $this->db->insert('r_dtr_detail', $detail_dtr);
                $dtr_detail_id = $this->db->insert_id();

                $detail_ttr = array(
                    'r_ttr_id' => $ttr_id,
                    'r_dtr_detail_id' => $dtr_detail_id,
                    'rongsok_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'line_remarks' => $row->line_remarks,
                    'created_at' => $tanggal,
                    'created_by' => $user_id
                );
                $this->db->insert('r_ttr_detail', $detail_ttr);
            }

            if($this->db->trans_complete()){
                redirect('index.php/TollingResmi');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/TollingResmi');  
            }
    }

    function view_tolling(){
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
            $data['judul']     = "Matching";
            $data['content']   = "resmi/tolling_resmi/view_tolling";

            $this->load->model('Model_tolling_resmi');
            $data['header'] = $this->Model_tolling_resmi->show_tolling_header($id)->row_array();
            $id_ttr = $data['header']['id_ttr'];
            $data['dtr_detail'] = $this->Model_tolling_resmi->show_dtr_detail($id)->result();
            $data['ttr_detail'] = $this->Model_tolling_resmi->show_ttr_detail($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Finance');
        }
    }
}