<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_InvoiceJasa extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_invoice_jasa');
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

        $data['content']= "resmi/invoice_jasa/index";
        $data['list_data']= $this->Model_invoice_jasa->list_inv()->result();

        $this->load->view('layout', $data);
    }

    function add(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');  
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');      
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
        $data['group_id']  = $group_id;
        $data['user_id'] = $user_id;
        $data['content']= "resmi/invoice_jasa/add";
            $this->load->model('Model_surat_jalan');
            $data['header'] = $this->Model_surat_jalan->show_header_sj($id)->row_array();
        $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();

        $this->load->view('layout', $data);
    }

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));        

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('INV-KMP', $tgl_input);
        
        $this->db->trans_start();

            $data = array(
                'no_invoice_jasa'=> $code,
                'sjr_id' => $this->input->post('id_sj'),
                'r_t_so_id' => $this->input->post('id_so'),
                'r_t_po_id' => $this->input->post('id_po'),
                'flag_sjr' => 0,
                'tanggal'=> $tgl_input,
                'cv_id'=>$this->input->post('customer_id'),
                'jenis_invoice'=>'INVOICE KMP KE CV',
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_inv_jasa', $data);
            $inv_jasa_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('id_sj'));
            $this->db->update('r_t_surat_jalan', array(
                'r_inv_jasa_id'=> $inv_jasa_id
            ));

            $get_po = $this->Model_invoice_jasa->get_po($this->input->post('id_sj'))->row_array();
            // $pod_list = $this->Model_invoice_jasa->pod_list($get_po['id'])->result();
            // $list_sj = $this->Model_invoice_jasa->list_sj_so($this->input->post('id_sj'))->result();
            //$list_sj = $this->Model_invoice_jasa->list_sj_so_v2($this->input->post('id_sj'),$get_po['id'])->result();
            $list_sj = $this->Model_invoice_jasa->list_sj_so($this->input->post('id_sj'))->result();
            foreach ($list_sj as $row) {
            	$total_amount = $row->netto * $row->amount;
                $detail = array(
                    'inv_jasa_id' => $inv_jasa_id,
                    'so_detail_id' => $row->so_detail_id,
                    'po_detail_id' => $row->po_detail_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'amount' => $row->amount,
                    'total_amount' => $total_amount,
                    'line_remarks' => $row->line_remarks
                );
                $this->db->insert('r_t_inv_jasa_detail', $detail);
            }

            if($this->db->trans_complete()){
                redirect('index.php/R_InvoiceJasa/edit_inv_jasa/'.$inv_jasa_id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/R_InvoiceJasa/');  
            }
    }

    function edit_inv_jasa(){
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

            $data['content']= "resmi/invoice_jasa/edit";
            $data['header'] = $this->Model_invoice_jasa->show_header_inv_jasa($id)->row_array();
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();
            $this->load->model('Model_sales_order');
            $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SuratJalan/surat_jalan');
        }
    }

    function update(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $jenis = $this->input->jenis_barang;

            $details = $this->input->post('details');
            foreach ($details as $v) {
                if($v['id']!=''){
                    $data = array(
                            'jenis_barang_id'=> $v['barang_id'],
                            'bruto'=> str_replace('.', '', $v['bruto']),
                            'netto'=> str_replace('.', '', $v['netto']),
                            'amount'=> str_replace('.', '', $v['amount']),
                            'total_amount'=> str_replace('.', '', $v['total_amount']),
                            'line_remarks'=> $v['line_remarks'],
                            'modified_at'=> $tanggal,
                            'modified_by'=> $user_id
                        );
                    $this->db->where('id', $v['id']);
                    $this->db->update('r_t_inv_jasa_detail', $data);
                }
            }

        $data = array(
                'no_invoice_jasa'=> $this->input->post('no_inv_jasa'),
                'tanggal'=> $tgl_input,
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('r_t_inv_jasa', $data);

        if($this->db->trans_complete()){
            redirect(base_url('index.php/R_InvoiceJasa/'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_InvoiceJasa/edit_inv_jasa/'.$this->input->post('id'));  
        }   
    }

    function view_invoice_jasa(){
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
            $data['content']   = "resmi/invoice_jasa/view_invoice_jasa";

            $data['header'] = $this->Model_invoice_jasa->show_header_inv_jasa($id)->row_array();
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_InvoiceJasa');
        }
    }

    function add_inv_cust(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');  
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');      
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
        $data['group_id']  = $group_id;
        $data['user_id'] = $user_id;
        $data['content']= "resmi/invoice_jasa/add_inv_cust";
            $this->load->model('Model_surat_jalan');
            $data['header'] = $this->Model_surat_jalan->show_header_sj($id)->row_array();
        $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();

        $this->load->view('layout', $data);
    }

    function save_inv_cust(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));        
        
        $this->db->trans_start();

            $data = array(
                'no_invoice_jasa'=> $this->input->post('no_inv_jasa'),
                'sjr_id' => $this->input->post('id_sj'),
                'r_t_so_id' => $this->input->post('id_so'),
                'r_t_po_id' => $this->input->post('id_po'),
                'flag_sjr' => 1,
                'jenis_invoice'=>'INVOICE CV KE CUSTOMER',
                'tanggal'=> $tgl_input,
                'customer_id'=>$this->input->post('customer_id'),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_inv_jasa', $data);
            $inv_jasa_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('id_sj'));
            $this->db->update('r_t_surat_jalan', array(
                'r_inv_jasa_id'=> $inv_jasa_id
            ));

            $get_po = $this->Model_invoice_jasa->get_po_for_cust($this->input->post('id_sj'))->row_array();
            // $pod_list = $this->Model_invoice_jasa->pod_list($get_po['id'])->result();
            // $list_sj = $this->Model_invoice_jasa->list_sj_so($this->input->post('id_sj'))->result();
            $list_sj = $this->Model_invoice_jasa->list_sj_so_v2($this->input->post('id_sj'),$get_po['id'])->result();
            foreach ($list_sj as $row) {
                $total_amount = $row->netto * $row->amount;
                $detail = array(
                    'inv_jasa_id' => $inv_jasa_id,
                    'so_detail_id' => $row->so_detail_id,
                    'po_detail_id' => $row->po_detail_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'amount' => $row->amount,
                    'total_amount' => $total_amount,
                    'line_remarks' => $row->line_remarks
                );
                $this->db->insert('r_t_inv_jasa_detail', $detail);
            }

            if($this->db->trans_complete()){
                redirect('index.php/R_InvoiceJasa/edit_inv_cust/'.$inv_jasa_id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/R_InvoiceJasa/');  
            }
    }

    function edit_inv_cust(){
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

            $data['content']= "resmi/invoice_jasa/edit_inv_cust";
            $data['header'] = $this->Model_invoice_jasa->show_header_inv_jasa($id)->row_array();
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();
            $this->load->model('Model_sales_order');
            $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SuratJalan/surat_jalan');
        }
    }

    function update_inv_cust(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $jenis = $this->input->jenis_barang;

            $details = $this->input->post('details');
            foreach ($details as $v) {
                if($v['id']!=''){
                    $data = array(
                            'jenis_barang_id'=> $v['barang_id'],
                            'bruto'=> str_replace('.', '', $v['bruto']),
                            'netto'=> str_replace('.', '', $v['netto']),
                            'amount'=> str_replace('.', '', $v['amount']),
                            'total_amount'=> str_replace('.', '', $v['total_amount']),
                            'line_remarks'=> $v['line_remarks'],
                            'modified_at'=> $tanggal,
                            'modified_by'=> $user_id
                        );
                    $this->db->where('id', $v['id']);
                    $this->db->update('r_t_inv_jasa_detail', $data);
                }
            }

        $data = array(
                'no_invoice_jasa'=> $this->input->post('no_inv_jasa'),
                'tanggal'=> $tgl_input,
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('r_t_inv_jasa', $data);

        if($this->db->trans_complete()){
            redirect(base_url('index.php/R_InvoiceJasa/'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_InvoiceJasa/edit_inv_jasa/'.$this->input->post('id'));  
        }   
    }

    function print_invoice(){
        $id = $this->uri->segment(3);
        if($id){        
            $data['header'] = $this->Model_invoice_jasa->show_header_inv_jasa($id)->row_array();
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();

            if($data['header']['jenis_invoice'] == "INVOICE KMP KE CV"){
                $this->load->view('resmi/invoice_jasa/print_inv_kmp_cv', $data);    
            }else if($data['header']['jenis_invoice'] == "INVOICE CV KE CUSTOMER"){
                $this->load->view('resmi/invoice_jasa/print_inv_cv_cs', $data);
            }
            
        }else{
            redirect('index.php'); 
        }
    }
}