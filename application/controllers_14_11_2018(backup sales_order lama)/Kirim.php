<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kirim extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
     function save(){
        $segt1 = $this->uri->segment(3);
        $segt2 = $this->uri->segment(4);
        $segt3 = $this->uri->segment(5);


        $data = $this->db->query("select * from temporary where id = '".$segt1."'")->result();

        if(empty($data->id)){

        $data = array(
            'id'=> $segt1,
            'tanggal'=>$segt2,
            'qty'=> $segt3
       
            );
        $this->db->insert('temporary',$data);

        redirect(base_url().'index.php/TtrResmi');
        
        }else{
            redirect(base_url().'index.php/TtrResmi');     
        }


    }
    
}