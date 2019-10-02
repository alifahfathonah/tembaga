<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_Sync_Individual extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }

        $this->load->model('Model_r_sync_individual');
        $this->load->model('Model_purchase_order');
        $this->load->helper('target_url');
    }

    public function PO()
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
        $data['content']= "resmi/sinkronisasi/po_individual";

        $data['list_cv'] = $this->Model_r_sync_individual->list_cv()->result();

        $this->load->view('layout', $data);
    }

    public function send_po()
    {
    	$post = $this->input->post();

    	$data_po = $this->db->get_where('r_t_po', ['id' => $post['po_id']])->row_array();

    	if ($data_po !== null) {
    		$post_api = array(
	            'reff' => $post['po_id'],
	            'no_po'=> $data_po['no_po'],
	            'supplier_id'=> 1,
	            'tanggal'=> $data_po['tanggal'],
	            'tanggal_kirim' => $data_po['tanggal_kirim'],
	            'term_of_payment'=> $data_po['term_of_payment'],
	        );

	        $ch = curl_init(target_url_cv($post['cv_id']).'api/PurchaseOrderAPI/po');
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_api);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        $response = curl_exec($ch);
	        $result = json_decode($response, true);
	        curl_close($ch);

	        $data_po_detail = $this->Model_purchase_order->get_po_detail_only($post['po_id'])->result_array();
	        foreach ($data_po_detail as $i => $value) {
	            $data_po_detail[$i]['reff'] = $data_po_detail[$i]['id'];
	            $data_po_detail[$i]['po_id'] = $result['id'];
	            unset($data_po_detail[$i]['id']);
	        }

	        $post_api_detail = json_encode($data_po_detail);

	        $ch2 = curl_init(target_url_cv($post['cv_id']).'api/PurchaseOrderAPI/po_detail');
	        curl_setopt($ch2, CURLOPT_POST, true);
	        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
	        curl_setopt($ch2, CURLOPT_POSTFIELDS, $post_api_detail);
	        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
	        $response2 = curl_exec($ch2);
	        // $result2 = json_decode($response2, true);
	        $result2 = json_decode(json_encode($response2));
	        curl_close($ch2);
	        print_r($response2);

	        if ($result2['status'] == 1) {
	        	$this->session->set_flashdata('flash_msg', 'PO Sent.');
	        	return redirect('index.php/R_Sync_Individual/PO');
	        } else {
	        	echo "<pre>";
	        	var_dump($result);
	        	echo "</pre>";
	        	echo "<pre>";
	        	var_dump($result2);
	        	echo "</pre>";
	        	die();
	        }
    	} else {
    		echo "PO tidak ditemukan!";
    	}
    }
}