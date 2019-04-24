<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class API extends CI_Controller{
    function __construct(){
        parent::__construct();

        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url("index.php/Login"));
        // }
    }

    function savePo(){
    	$data = array();
    	$data['post'] = $_POST;

    	// print_r($data);
    	$decode = json_encode($data);

    	log_message('debug', print_r($data, 1));

    	log_message('debug', $decode);

    	log_message('debug', $data['post']['datapo']['no_po']);
    	// file_put_contents(base_url().'application/logs/po.log', "test\n\n", FILE_APPEND);

    	echo "hallo";

    	// die();
    }
}