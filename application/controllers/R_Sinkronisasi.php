<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_Sinkronisasi extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }

        $this->load->model('Model_r_sinkronisasi');
        $this->load->helper('target_url');
    }

    public function index() 
    {
    	$module_name = $this->uri->segment(1);
        $po_id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "resmi/sinkronisasi/index";

        $data['count_so'] = $this->Model_r_sinkronisasi->count_so_kmp()->row_array();
        $data['count_sj'] = $this->Model_r_sinkronisasi->count_sj_kmp()->row_array();
        $data['count_inv'] = $this->Model_r_sinkronisasi->count_inv_kmp()->row_array();

        $this->load->view('layout', $data);
    }

    public function do_sinkronisasi_kmp1() 
    {
    	// set_time_limit(1800);
    	/*
    	* so dan spb
    	*/
    	$so = $this->Model_r_sinkronisasi->get_so_kmp()->result_array();
    	if (!empty($so)) {
    		foreach ($so as $key => $row) {
	    		$exp = explode(".", $row['no_so']);
	    		$tgl_input = $exp[1];
	    		$number = $exp[2];
	    		$num = 'SPB-T.'.$tgl_input.'.'.$number;
	    		$header[$key] = array_merge($so[$key], array('nomor_spb'=>$num));
	    		// print_r($header[$key]);die();

	    		$sod[$key] = $this->Model_r_sinkronisasi->get_so_detail_kmp($row['id'])->result_array();
	    		$data[$key] = array_merge($header[$key], ['details'=>$sod[$key]]);
	    	}

	    	$json_so = json_encode($data);
	    	// print_r($data); die();
	    	// echo "<pre>"; print_r($json_so); echo "</pre>"; die();
	    	$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url().'api/ReffAPI/so_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_so);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);

	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($so as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_so', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
    	}

        /*
        * surat jalan
        */
        $sj = $this->Model_r_sinkronisasi->get_sj_kmp()->result_array();
        // print_r($sj);die();
        if (!empty($sj)) {
        	foreach ($sj as $key => $row) {
	        	$header[$key] = $sj[$key];

	        	$sjd[$key] = $this->Model_r_sinkronisasi->get_sj_detail_kmp($row['id'])->result_array();

	        	$this->load->model('Model_so');
	        	$gudang[$key] = $this->Model_so->get_r_gudang_fg($row['r_so_id'])->result_array();

	        	$data[$key] = array_merge($header[$key], ['details' => $sjd[$key]], ['gudang' => $gudang[$key]]);
	        }
	        // print_r($data);die();
	        $json_sj = json_encode($data);
	        // echo "<pre>"; print_r($data); echo "</pre>"; die();
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url().'api/ReffAPI/sj_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_sj);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();

	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($sj as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_surat_jalan', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        /*
        * invoice
        */

        $inv = $this->Model_r_sinkronisasi->get_inv_kmp()->result_array();
        // print_r($inv);die();
        if (!empty($inv)) {
        	foreach ($inv as $key => $row) {
        		$header[$key] = $inv[$key];

        		$invd[$key] = $this->Model_r_sinkronisasi->get_inv_detail_kmp($row['id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $invd[$key]]);
        	}

        	$json_inv = json_encode($data);
	        // echo "<pre>"; print_r($data); echo "</pre>"; die();
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url().'api/ReffAPI/inv_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_inv);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($result);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($inv as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_inv_jasa', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }


        $this->session->set_flashdata('flash_msg', 'Sinkronisasi selesai.');
        return redirect('index.php/R_Sinkronisasi/');
    }

    function do_sync_so() {
    	// set_time_limit(600);
    	/*
    	* so dan spb
    	*/
    	$so = $this->Model_r_sinkronisasi->get_so_kmp()->result_array();
    	if (!empty($so)) {
    		foreach ($so as $key => $row) {
	    		$exp = explode(".", $row['no_so']);
	    		$tgl_input = $exp[1];
	    		$number = $exp[2];
	    		$num = 'SPB-T.'.$tgl_input.'.'.$number;
	    		$header[$key] = array_merge($so[$key], array('nomor_spb'=>$num));
	    		// print_r($header[$key]);die();

	    		$sod[$key] = $this->Model_r_sinkronisasi->get_so_detail_kmp($row['id'])->result_array();
	    		$data[$key] = array_merge($header[$key], ['details'=>$sod[$key]]);
	    	}

	    	$json_so = json_encode($data);
	    	// print_r($data); die();
	    	// echo "<pre>"; print_r($json_so); echo "</pre>"; die();
	    	$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url().'api/ReffAPI/so_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_so);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);
	        // die();

	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($so as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_so', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
    	}

        $this->session->set_flashdata('flash_msg', 'Sinkronisasi selesai.');
        return redirect('index.php/R_Sinkronisasi/');
    }

    function do_sync_sj() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
        $sj = $this->Model_r_sinkronisasi->get_sj_kmp()->result_array();
        // print_r($sj);die();
        if (!empty($sj)) {
        	foreach ($sj as $key => $row) {
	        	$header[$key] = $sj[$key];

	        	$sjd[$key] = $this->Model_r_sinkronisasi->get_sj_detail_kmp($row['id'])->result_array();

	        	$this->load->model('Model_so');
	        	$gudang[$key] = $this->Model_so->get_r_gudang_fg($row['r_so_id'])->result_array();

	        	$data[$key] = array_merge($header[$key], ['details' => $sjd[$key]], ['gudang' => $gudang[$key]]);
	        }
	        // print_r($data);die();
	        $json_sj = json_encode($data);
	        // echo "<pre>"; print_r($data); echo "</pre>"; die();
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url().'api/ReffAPI/sj_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_sj);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();

	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($sj as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_surat_jalan', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        $this->session->set_flashdata('flash_msg', 'Sinkronisasi selesai.');
        return redirect('index.php/R_Sinkronisasi/');
    }

    function do_sync_inv() {
    	// set_time_limit(600);
        /*
        * invoice
        */

        $inv = $this->Model_r_sinkronisasi->get_inv_kmp()->result_array();
        // print_r($inv);die();
        if (!empty($inv)) {
        	foreach ($inv as $key => $row) {
        		$header[$key] = $inv[$key];

        		$invd[$key] = $this->Model_r_sinkronisasi->get_inv_detail_kmp($row['id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $invd[$key]]);
        	}

        	$json_inv = json_encode($data);
	        // echo "<pre>"; print_r($data); echo "</pre>"; die();
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url().'api/ReffAPI/inv_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_inv);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($inv as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_inv_jasa', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }


        $this->session->set_flashdata('flash_msg', 'Sinkronisasi selesai.');
        return redirect('index.php/R_Sinkronisasi/');
    }

    function tolling_sync(){
    	$module_name = $this->uri->segment(1);
        $po_id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "resmi/sinkronisasi/cv_tolling_sync";

        $data['count_tolling'] = $this->Model_r_sinkronisasi->count_tolling_kmp()->row_array();

        $this->load->view('layout', $data);
    }

    function do_sync_tolling() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
        $tolling = $this->Model_r_sinkronisasi->get_tolling_kmp()->result_array();
        // print_r($tolling);die();
        if (!empty($tolling)) {
        	foreach ($tolling as $key => $row) {
	        	$header[$key] = $tolling[$key];

	        	$sjd[$key] = $this->Model_r_sinkronisasi->get_tolling_detail_kmp($row['id'])->result_array();

	        	$data[$key] = array_merge($header[$key], ['details' => $sjd[$key]]);
	        }

        	$json = json_encode($data);
        	// print_r($json);die();

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url().'api/ReffAPI/tolling_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($tolling as $key => $value) {
	        		$this->db->where('id', $value['sj_id']);
	        		$this->db->update('r_t_surat_jalan', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }


        $this->session->set_flashdata('flash_msg', 'Sinkronisasi selesai.');
        return redirect('index.php/R_Sinkronisasi/tolling_sync');
    }

    function all_cv_sync(){
    	$module_name = $this->uri->segment(1);
        $po_id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "resmi/sinkronisasi/cv_invoice_sync";

        $data['list_so'] = $this->Model_r_sinkronisasi->count_so_cv_cust()->result();
        $data['list_bpb'] = $this->Model_r_sinkronisasi->count_bpb_cv_cust()->result();
        $data['list_po'] = $this->Model_r_sinkronisasi->count_po_cv_cust()->result();
        $data['list_sj_rsk'] = $this->Model_r_sinkronisasi->count_sj_rsk_cv_cust()->result();
        $data['list_sj_bpb'] = $this->Model_r_sinkronisasi->count_sj_bpb_cv_cust()->result();
        $data['list_inv'] = $this->Model_r_sinkronisasi->count_inv_cv_cust()->result();
        $data['so'] = $this->Model_r_sinkronisasi->count_so_cv()->row_array();
        $data['po'] = $this->Model_r_sinkronisasi->count_po_cv()->row_array();
        $data['bpb'] = $this->Model_r_sinkronisasi->count_bpb_cv()->row_array();
        $data['sj_rsk'] = $this->Model_r_sinkronisasi->count_sj_rsk_cv()->row_array();
        $data['sj_bpb'] = $this->Model_r_sinkronisasi->count_sj_bpb_cv()->row_array();
        $data['inv'] = $this->Model_r_sinkronisasi->count_inv_jasa_cv()->row_array();

        $this->load->view('layout', $data);
    }

    function do_sync_so_cv() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
    	$post = $this->input->post();
        $so = $this->Model_r_sinkronisasi->get_so_cv_cust($post['cv_id'])->result_array();
        // print_r($so);die();
        if (!empty($so)) {
        	foreach ($so as $key => $row) {
	        	$header[$key] = $so[$key];

        		$sod[$key] = $this->Model_r_sinkronisasi->get_so_detail_cv($row['id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $sod[$key]]);
	        }

        	$json = json_encode($data);
        	// print_r($json);die();

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url_cv($post['cv_id']).'api/SalesOrderAPI/so_cust_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($so as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_so', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        $this->session->set_flashdata('flash_msg', $result['message']);
        return redirect('index.php/R_Sinkronisasi/all_cv_sync');
    }

    function do_sync_bpb_cv() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
    	$post = $this->input->post();
        $bpb = $this->Model_r_sinkronisasi->get_bpb_cv_cust($post['cv_id'])->result_array();
        // print_r($bpb);die();
        if (!empty($bpb)) {
        	foreach ($bpb as $key => $row) {
	        	$header[$key] = $bpb[$key];

        		$bpbd[$key] = $this->Model_r_sinkronisasi->get_bpb_detail_cv($row['id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $bpbd[$key]]);
	        }

        	$json = json_encode($data);
        	// print_r($json);die();

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url_cv($post['cv_id']).'api/BPBAPI/bpb_rsk_cust_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($bpb as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_bpb', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        $this->session->set_flashdata('flash_msg', $result['message']);
        return redirect('index.php/R_Sinkronisasi/all_cv_sync');
    }

    function do_sync_po_cv() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
    	$post = $this->input->post();
        $bpb = $this->Model_r_sinkronisasi->get_po_cv_cust($post['cv_id'])->result_array();
        // print_r($bpb);die();
        if (!empty($bpb)) {
        	foreach ($bpb as $key => $row) {
	        	$header[$key] = $bpb[$key];

        		$bpbd[$key] = $this->Model_r_sinkronisasi->get_po_detail_cv($row['id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $bpbd[$key]]);
	        }

        	$json = json_encode($data);
        	// print_r($json);die();

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url_cv($post['cv_id']).'api/PurchaseOrderAPI/po_cust_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($bpb as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_po', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        $this->session->set_flashdata('flash_msg', $result['message']);
        return redirect('index.php/R_Sinkronisasi/all_cv_sync');
    }

    function do_sync_sj_rsk_cv() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
    	$post = $this->input->post();
        $bpb = $this->Model_r_sinkronisasi->get_sj_rsk_cv_cust($post['cv_id'])->result_array();
        // print_r($bpb);die();
        if (!empty($bpb)) {
        	foreach ($bpb as $key => $row) {
	        	$header[$key] = $bpb[$key];

        		$bpbd[$key] = $this->Model_r_sinkronisasi->get_sj_detail_cv($row['id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $bpbd[$key]]);
	        }

        	$json = json_encode($data);
        	// print_r($json);die();

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url_cv($post['cv_id']).'api/SuratJalanAPI/sj_rsk_cust_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($bpb as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_surat_jalan', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        $this->session->set_flashdata('flash_msg', $result['message']);
        return redirect('index.php/R_Sinkronisasi/all_cv_sync');
    }

    function do_sync_sj_bpb_cv() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
    	$post = $this->input->post();
        $bpb = $this->Model_r_sinkronisasi->get_sj_bpb_cv_cust($post['cv_id'])->result_array();
        // print_r($bpb);die();
        if (!empty($bpb)) {
        	foreach ($bpb as $key => $row) {
	        	$header[$key] = $bpb[$key];
        		$sjd[$key] = $this->Model_r_sinkronisasi->get_sj_detail_cv($row['id'])->result_array();
        		$bpbd[$key] = $this->Model_r_sinkronisasi->get_bpb_detail_cv($row['r_bpb_id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $sjd[$key]], ['details_bpb' => $bpbd[$key]]);
	        }

        	$json = json_encode($data);
        	// print("<pre>".print_r($data,true)."</pre>");die();

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url_cv($post['cv_id']).'api/SuratJalanAPI/sj_bpb_cust_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($response);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($bpb as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_surat_jalan', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        $this->session->set_flashdata('flash_msg', $result['message']);
        return redirect('index.php/R_Sinkronisasi/all_cv_sync');
    }

    function do_sync_inv_jasa_cv() {
    	// set_time_limit(600);
        /*
        * surat jalan
        */
    	$post = $this->input->post();
        $tolling = $this->Model_r_sinkronisasi->get_inv_cv_cust($post['cv_id'])->result_array();
        // print_r($tolling);die();
        if (!empty($tolling)) {
        	foreach ($tolling as $key => $row) {
	        	$header[$key] = $tolling[$key];

        		$invd[$key] = $this->Model_r_sinkronisasi->get_inv_detail_kmp($row['id'])->result_array();
        		$data[$key] = array_merge($header[$key], ['details' => $invd[$key]]);
	        }

        	$json = json_encode($data);
        	// print_r($json);die();

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, target_url_cv($post['cv_id']).'api/InvoiceAPI/inv_cust_sync');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_HEADER, 0);
	        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);
	        // print_r($result);die();
	        if($result['status']==true){
	        	$this->db->trans_start();
	        	foreach ($tolling as $key => $value) {
	        		$this->db->where('id', $value['id']);
	        		$this->db->update('r_t_inv_jasa', ['api' => 1]);
	        	}
	        	$this->db->trans_complete();
	        }
        }

        $this->session->set_flashdata('flash_msg', $result['message']);
        return redirect('index.php/R_Sinkronisasi/all_cv_sync');
    }
}