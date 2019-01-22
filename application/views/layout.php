<?php 
    $user_ppn  = $this->session->userdata('user_ppn');
    if($user_ppn==1){
        $this->load->view('mythemes_ppn/header');
        $this->load->view('mythemes_ppn/menu');
        $this->load->view($content);
        $this->load->view('mythemes_ppn/footer');
    }else if($user_ppn==2){
        $this->load->view('mythemes_resmi/header');
        $this->load->view('mythemes_resmi/menu');
        $this->load->view($content);
        $this->load->view('mythemes_resmi/footer');
    }else{
        $this->load->view('mythemes/header');
        $this->load->view('mythemes/menu');
        $this->load->view($content);
        $this->load->view('mythemes/footer');
    }  
?>