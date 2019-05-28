<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_PurchaseOrder extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_purchase_order');
        $this->load->helper('target_url');
    }

    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');   
        $reff_cv = $this->session->userdata('cv_id');     
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/purchase_order/index";
        if($group_id == 9){
            $data['list_data'] = $this->Model_purchase_order->po_list()->result();
        } else if($group_id == 14) {
            $data['list_data'] = $this->Model_purchase_order->po_list_for_cv($reff_cv)->result();
        } else if($group_id == 16) {
            $data['list_data'] = $this->Model_purchase_order->po_list_for_kmp()->result();
        }
        $this->load->view('layout', $data);
    }

    function add_po(){
    	$module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/purchase_order/add_po";
        $data['header'] = $this->Model_purchase_order->get_po_customer($id)->row_array();
        $data['cv_list'] = $this->Model_purchase_order->cv_list()->result();

        $this->load->view('layout', $data);
    }

    function get_contact_name(){
    	$id = $this->input->post('id');
        $data = $this->Model_purchase_order->get_contact_name($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    function get_contact_name_customer(){
        $id = $this->input->post('id');
        $data = $this->Model_purchase_order->get_contact_name_customer($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    function save_po(){
    	$user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $reff_cv = $this->session->userdata('cv_id');
        
        $this->db->trans_start();

        $data = array(
            'no_po'=> $this->input->post('no_po'),
            'tanggal'=> $tgl_input,
            'f_invoice_id'=> $this->input->post('f_invoice_id'),
            'cv_id'=> $this->session->userdata('cv_id'),
            'term_of_payment'=> $this->input->post('term_of_payment'),
            'jenis_po'=> 'PO CV KE KMP',
            'reff_cv'=> $this->session->userdata('cv_id'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('r_t_po', $data);
        $po_id = $this->db->insert_id();

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('r_t_po', array('flag_po_cv'=>$po_id));

        $post_api = array(
            'reff' => $po_id,
            'no_po'=> $this->input->post('no_po'),
            'supplier_id'=> 1,
            'tanggal'=> $tgl_input,
            'term_of_payment'=> $this->input->post('term_of_payment'),
        );

        $ch = curl_init(target_url_cv($reff_cv).'api/PurchaseOrderAPI/po');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        log_message('debug', print_r($result,1));

        // $this->db->where('id', $this->input->post('r_invoice_id'));
        // $this->db->update('r_t_invoice', array(
        //     'r_po_id' => $po_id
        // ));

        $po_detail = $this->Model_purchase_order->po_detail($this->input->post('id'))->result();
        foreach ($po_detail as $row) {
            $detail = array(
                    'po_id' => $po_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'netto' => $row->netto,
                    'amount' => $row->amount,
                    'total_amount' => $row->total_amount,
                );
            $this->db->insert('r_t_po_detail', $detail);
        }

        $detail_api = $this->Model_purchase_order->get_po_detail_only($po_id)->result_array();
        foreach ($detail_api as $i => $value) {
            $detail_api[$i]['reff'] = $detail_api[$i]['id'];
            $detail_api[$i]['po_id'] = $result['id'];
            unset($detail_api[$i]['id']);
        }

        $detail_api = json_encode($detail_api);

        $ch2 = curl_init(target_url_cv($reff_cv).'api/PurchaseOrderAPI/po_detail');
        curl_setopt($ch2, CURLOPT_POST, true);
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $detail_api);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($ch2);
        $result2 = json_decode($response2, true);
        curl_close($ch2);

        log_message('debug', print_r($result2,1));

        // $invoice_detail = $this->Model_purchase_order->invoice_detail($this->input->post('id_invoice'))->result();
        // foreach ($invoice_detail as $row) {
        //     $detail = array(
        //             'po_id' => $po_id,
        //             'jenis_barang_id' => $row->jenis_barang_id,
        //             'qty' => $row->qty,
        //             'netto' => $row->netto,
        //             'amount' => $row->harga,
        //             'total_amount' => $row->total_harga,
        //         );
        //     $this->db->insert('r_t_po_detail', $detail);
        // }

        if($this->db->trans_complete()){
            redirect('index.php/R_PurchaseOrder/edit_po/'.$po_id);  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO JASA gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_PurchaseOrder');  
        }  
    }

    function edit_po(){
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

            $data['content']= "resmi/purchase_order/edit_po";
            $this->load->model('Model_beli_fg');
            $data['header'] = $this->Model_purchase_order->show_header_po($id)->row_array();    
            $data['myDetail'] = $this->Model_purchase_order->load_detail_po($id)->result();
            $data['list_fg'] = $this->Model_beli_fg->list_fg()->result();

        	$data['cv_list'] = $this->Model_purchase_order->cv_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_PurchaseOrder');
        }
    }

    function save_detail_po(){
    	$return_data = array();
        
        if($this->db->insert('r_t_po_detail', array(
            'po_id'=>$this->input->post('id'),
            'fg_id'=>$this->input->post('fg_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'netto'=>str_replace('.', '', $this->input->post('qty')),
            'total_amount'=>str_replace('.', '', $this->input->post('total_harga'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item finish good! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_po(){
    	$id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('r_t_po_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item finish good! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_po(){
    	$user_id   = $this->session->userdata('user_id');
        $reff_cv   = $this->session->userdata('cv_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id']!=''){
                $data = array(
                        'jenis_barang_id'=> $v['barang_id'],
                        'netto'=> $v['netto'],
                        'amount'=> str_replace('.', '', $v['amount']),
                        'total_amount'=> str_replace('.', '', $v['total_amount']),
                        'line_remarks'=> $v['line_remarks']
                    );
                $this->db->where('id', $v['id']);
                $this->db->update('r_t_po_detail', $data);
            }
        }

        $data = array(
            'no_po'=> $this->input->post('no_po'),
            'tanggal'=> $tgl_input,
            'cv_id'=>$this->session->userdata('cv_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            // 'jenis_po'=>'PO CV KE KMP',
            'remarks'=>$this->input->post('remarks'),
            'modified_at'=> $tanggal,
            'modified_by'=> $user_id
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('r_t_po', $data);
        
        $data_api = array(
            'id' => $this->input->post('id'),
            'no_po'=> $this->input->post('no_po'),
            'supplier_id'=> 1,
            'tanggal'=> $tgl_input,
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'remarks'=>$this->input->post('remarks'),
        );

        $ch = curl_init(target_url_cv($reff_cv).'api/PurchaseOrderAPI/poupdt');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        log_message('debug', 'updt = '.print_r($result, 1));

        if($result['status'] == 1){
            $update_details = $this->Model_purchase_order->get_po_detail_only($this->input->post('id'))->result_array();
            foreach ($update_details as $i => $value) {
                $update_details[$i]['reff'] = $update_details[$i]['id'];
                $update_details[$i]['po_id'] = $result['id'];
                unset($update_details[$i]['id']);
            }

            $data_details = json_encode($update_details);

            log_message('debug', 'data details = '.print_r($data_details, 1));
            
            $ch2 = curl_init(target_url_cv($reff_cv).'api/PurchaseOrderAPI/po_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_details);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));
        } else {
            log_message('debug', 'failed update delete');
        }

        $this->session->set_flashdata('flash_msg', 'Data PO Jasa Finish Good berhasil disimpan');
        redirect('index.php/R_PurchaseOrder');
    }

    function print_po(){
    	$id = $this->uri->segment(3);
        if($id){        
            $data['header']  = $this->Model_purchase_order->show_header_print_po($id)->row_array();
            $data['details'] = $this->Model_purchase_order->load_detail_po($id)->result();

            if($data['header']['jenis_po'] == "PO CUSTOMER KE CV"){
                $this->load->view('resmi/purchase_order/print_po_cs_cv', $data);    
            }else if($data['header']['jenis_po'] == "PO CV KE KMP"){
                $this->load->view('resmi/purchase_order/print_po_cv_kmp', $data);
            }
            
        }else{
            redirect('index.php'); 
        }
    }

    function add_po_fcustomer(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/purchase_order/add_po_fcustomer";
        $data['header'] = $this->Model_purchase_order->invoice_list($id)->row_array();
        $data['cust_list'] = $this->Model_purchase_order->customer_list()->result();

        $this->load->view('layout', $data);
    }

    function save_po_fcustomer(){
        $user_id   = $this->session->userdata('user_id');
        $reff_cv   = $this->session->userdata('cv_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal_so = date('Y-m-d', strtotime($this->input->post('tanggal_so')));
        $this->load->helper('target_url');
        
        $this->db->trans_start();

        $data = array(
            'no_po'=> $this->input->post('no_po'),
            'tanggal'=> $tgl_input,
            'f_invoice_id'=> $this->input->post('id_invoice'),
            'customer_id'=> $this->input->post('customer_id'),
            'term_of_payment'=> $this->input->post('term_of_payment'),
            'jenis_po'=> 'PO CUSTOMER KE CV',
            'reff_cv'=> $this->session->userdata('cv_id'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('r_t_po', $data);
        $po_id = $this->db->insert_id();

        $this->db->where('id', $this->input->post('r_invoice_id'));
        $this->db->update('r_t_invoice', array(
            'r_po_id' => $po_id
        ));

        $data_so = array(
            'no_so' => $this->input->post('no_so'),
            'tanggal' => $tanggal_so,
            'marketing_id' => $user_id,
            'customer_id' => $this->input->post('customer_id'),
            'po_id' => $po_id,
            'tgl_po' => $tgl_input,
            'jenis_so' => 'SO CV',
            'jenis_barang' => 'FG',
            'reff_cv' => $this->session->userdata('cv_id'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );

        $this->db->insert('r_t_so', $data_so);
        $so_id = $this->db->insert_id();

        $post_api = array(
            'reff' => $so_id,
            'no_so' => $this->input->post('no_so'),
            'tanggal' => $tanggal_so,
            'marketing_id' => $user_id,
            'customer_id' => $this->input->post('customer_id'),
            'no_po' => $this->input->post('no_po'),
            'tgl_po' => $tgl_input,
            // 'jenis_so' => 'SO CV',
            'jenis_barang' => 'FG',
            // 'created_at'=> $tanggal,
            // 'created_by'=> $user_id
        );

        $ch = curl_init(target_url_cv($reff_cv).'api/SalesOrderAPI/so');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        log_message('debug', print_r($result,1));

        $invoice_detail = $this->Model_purchase_order->invoice_detail($this->input->post('id_invoice'))->result();
        foreach ($invoice_detail as $row) {
            $detail = array(
                    'po_id' => $po_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'netto' => $row->netto,
                    'amount' => $row->harga,
                    'total_amount' => $row->total_harga,
                );
            $this->db->insert('r_t_po_detail', $detail);
            $po_detail_id = $this->db->insert_id();

            $detail_so = array(
                'so_id' => $so_id,
                'po_detail_id' => $po_detail_id,
                'jenis_barang_id' => $row->jenis_barang_id,
                'qty' => $row->qty,
                'netto' => $row->netto,
                'amount' => $row->harga,
                'total_amount' => $row->total_harga
            );
            $this->db->insert('r_t_so_detail', $detail_so);
        }

        $this->load->model('Model_so');
        $so_detail = $this->Model_so->get_so_detail_only($so_id)->result_array();
        foreach ($so_detail as $i => $value) {
            $so_detail[$i]['reff'] = $so_detail[$i]['id'];
            $so_detail[$i]['so_id'] = $result['id'];
            unset($so_detail[$i]['id']);
        }

        $detail_api = json_encode($so_detail);


        $ch2 = curl_init(target_url_cv($reff_cv).'api/SalesOrderAPI/so_detail');
        curl_setopt($ch2, CURLOPT_POST, true);
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $detail_api);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($ch2);
        $result2 = json_decode($response2, true);
        curl_close($ch2);

        log_message('debug', print_r($result2,1));


        if($this->db->trans_complete()){
            redirect('index.php/R_PurchaseOrder/edit_po_fcustomer/'.$po_id);  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO JASA gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_PurchaseOrder');  
        }  
    }

    function edit_po_fcustomer(){
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

            $data['content']= "resmi/purchase_order/edit_po_fcustomer";
            $this->load->model('Model_beli_fg');
            $data['header'] = $this->Model_purchase_order->show_header_po($id)->row_array();    
            $data['myDetail'] = $this->Model_purchase_order->load_detail_po($id)->result();
            $data['list_fg'] = $this->Model_beli_fg->list_fg()->result();

            $data['cust_list'] = $this->Model_purchase_order->customer_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_PurchaseOrder');
        }
    }

    function update_po_fcustomer(){
        $user_id   = $this->session->userdata('user_id');
        $reff_cv   = $this->session->userdata('cv_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id']!=''){
                $data = array(
                        'jenis_barang_id'=> $v['barang_id'],
                        'netto'=> $v['netto'],
                        'amount'=> str_replace('.', '', $v['amount']),
                        'total_amount'=> str_replace('.', '', $v['total_amount']),
                        'line_remarks'=> $v['line_remarks']
                    );
                $this->db->where('id', $v['id']);
                $this->db->update('r_t_po_detail', $data);

                $data_so_d = array(
                        'jenis_barang_id'=> $v['barang_id'],
                        'netto'=> $v['netto'],
                        'amount'=> str_replace('.', '', $v['amount']),
                        'total_amount'=> str_replace('.', '', $v['total_amount']),
                        'line_remarks'=> $v['line_remarks']
                    );
                $this->db->where('po_detail_id', $v['id']);
                $this->db->update('r_t_so_detail', $data_so_d);

            }
        }

        $data = array(
            'no_po'=> $this->input->post('no_po'),
            'tanggal'=> $tgl_input,
            'customer_id'=>$this->input->post('customer_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            // 'jenis_po'=>'PO CUSTOMER KE CV',
            'remarks'=>$this->input->post('remarks'),
            'modified_at'=> $tanggal,
            'modified_by'=> $user_id
        );

        $data_so = array(
            'id' => $this->input->post('so_id'),
            'no_so' => $this->input->post('no_so'),
            'remarks'=>$this->input->post('remarks')
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('r_t_po', $data);

        $this->db->where('po_id', $this->input->post('id'));
        $this->db->update('r_t_so', $data_so);


        $this->load->helper('target_url');

        $ch = curl_init(target_url_cv($reff_cv).'api/SalesOrderAPI/soupdt');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_so);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        log_message('debug', 'updt = '.print_r($result,1));

        if($result['status'] == 1){
            $this->load->model('Model_so');
            $update_details = $this->Model_so->get_so_detail_only($this->input->post('so_id'))->result_array();
            foreach ($update_details as $i => $value) {
                $update_details[$i]['reff'] = $update_details[$i]['id'];
                $update_details[$i]['so_id'] = $result['id'];
                unset($update_details[$i]['id']);
            }

            $data_details = json_encode($update_details);

            log_message('debug', 'data details = '.print_r($data_details, 1));
            // die();

            $ch2 = curl_init(target_url_cv($reff_cv).'api/SalesOrderAPI/so_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_details);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));
        } else {
            log_message('debug', 'failed update delete');
        }

        // $details_api = json_encode($this->input->post());
        
        $this->session->set_flashdata('flash_msg', 'Data PO Jasa Finish Good berhasil disimpan');
        redirect('index.php/R_PurchaseOrder');
    }
}