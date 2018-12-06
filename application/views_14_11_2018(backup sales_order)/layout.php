<?php 
    $user_ppn  = $this->session->userdata('user_ppn');
    if($user_ppn==1){
        $this->load->view('mythemes_ppn/header');
        $this->load->view('mythemes_ppn/menu');
        $this->load->view($content);
        $this->load->view('mythemes_ppn/footer');
    }else{
        $this->load->view('mythemes/header');
        $this->load->view('mythemes/menu');
        $this->load->view($content);
        $this->load->view('mythemes/footer');
    }    
?>