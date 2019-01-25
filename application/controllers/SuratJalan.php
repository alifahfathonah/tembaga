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
        $data['list_sj']= $this->Model_surat_jalan->list_sj()->result();

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
        $data['list_invoice'] = $this->Model_surat_jalan->invoice_list()->result();
        $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();

        $this->load->view('layout', $data);
    }

    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));        
        
        $this->db->trans_start();

            $data = array(
                'no_sj_resmi'=> $this->input->post('no_surat_jalan'),
                'r_invoice_id'=>$this->input->post('r_invoice_id'),
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
            $this->db->insert('r_t_surat_jalan', $data);
            $sjr_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('r_invoice_id'));
            $this->db->update('r_t_invoice', array(
                'sjr_id'=> $sjr_id
            ));

            $this->load->model('Model_matching');
            $list_invoice = $this->Model_matching->list_invoice_detail($this->input->post('r_invoice_id'))->result();
            foreach ($list_invoice as $row) {
                $detail = array(
                    'sj_resmi_id' => $sjr_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'no_packing' => $row->no_pallete,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'line_remarks' => $row->line_remarks
                );
                $this->db->insert('r_t_surat_jalan_detail', $detail);
            }

            if($this->db->trans_complete()){
                redirect('index.php/SuratJalan/edit_surat_jalan/'.$sjr_id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
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
            $this->load->model('Model_sales_order');
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();

            $jenis = $data['header']['jenis_barang'];
            $this->load->model('Model_sales_order');
            if($jenis == 'FG'){
                $data['list_invoice'] = $this->Model_sales_order->list_item_sj_fg($soid)->result();
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();
            }else{
                $data['list_sj_detail'] = $this->Model_surat_jalan->list_sj_detail($id)->result();
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_rsk()->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/SuratJalan/surat_jalan');
        }
    }

     function update_surat_jalan(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id']!=''){
                $data = array(
                        'jenis_barang_id'=> $v['barang_id'],
                        'no_packing'=> $v['no_packing'],
                        'bruto'=> $v['bruto'],
                        'netto'=> $v['netto'],
                        'modified_at'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->where('id', $v['id']);
                $this->db->update('r_t_surat_jalan_detail', $data);
            }
        }

        $id_inv = $this->input->post('id_inv');
        $data = array(
                'no_sj_resmi'=> $this->input->post('no_surat_jalan'),
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('r_t_surat_jalan', $data);

        if($this->db->trans_complete()){
            redirect(base_url('index.php/SuratJalan/'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/SuratJalan/edit_surat_jalan/'.$this->input->post('id'));  
        }   
    }

    function get_alamat(){
        $id = $this->input->post('id');
        $this->load->model('Model_sales_order');
        $customer = $this->Model_sales_order->get_alamat($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }
}