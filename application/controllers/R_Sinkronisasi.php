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
        $this->load->view('layout', $data);
    }

    public function do_sinkronisasi_kmp1() 
    {
    	set_time_limit(180);
    	/*
    	* so dan spb
    	*/
    	$so = $this->Model_r_sinkronisasi->get_so_kmp()->result_array();
    	if ($so !== null) {
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
        if ($sj !== null) {
        	foreach ($sj as $key => $row) {
	        	$header[$key] = $sj[$key];

	        	$sjd[$key] = $this->Model_r_sinkronisasi->get_sj_detail_kmp($row['id'])->result_array();

	        	$this->load->model('Model_so');
	        	$gudang[$key] = $this->Model_so->get_r_gudang_fg($row['r_so_id'])->result_array();

	        	$data[$key] = array_merge($header[$key], ['details' => $sjd[$key]], ['gudang' => $gudang[$key]]);
	        }

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
        if ($inv !== null) {
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
}