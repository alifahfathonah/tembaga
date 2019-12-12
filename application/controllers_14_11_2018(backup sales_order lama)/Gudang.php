<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends CI_Controller{   
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
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
        $data['judul']     = "Gudang";
        $data['content']   = "gudang/index";
        
       // $this->load->model('Model_ingot');
 		$query = $this->db->query("Select * From m_jenis_brg_wip");
        $query1 = $this->db->query("Select * From t_hasil_wip");
        $query2 = $this->db->query("Select * From t_spb_wip");
        $query3 = $this->db->query("Select * From t_bpb_wip");
        $query4 = $this->db->query("Select * From t_gudang_wip");

        

        $data['jenis_barang_list'] = $query->result();
        $data['spb'] = $query2->result();
        $data['bpbp'] = $query3->result();
        $data['gudang'] = $query4->result();
        
        $this->load->view('layout', $data);  
    }


    function save_gudang(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
             
                'tanggal'=> $tgl_input,
                't_spb_wip_detail_id'=>$this->input->post('spb'),
                't_bpb_wip_detail_id'=>$this->input->post('bpb'),
                'dibuat_oleh'=> $user_id,
            );

                $this->db->insert('t_gudang_wip', $data);
               
           
                redirect('index.php/Ingot/Gudang');  
           
    }


    function send(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Send Rongsok";
        $data['content']   = "Gudang/add";
        
        
        $this->load->view('layout', $data);  
    }


     function save_sendrongsok(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
             
                'tanggal'=> $tgl_input,
                'no_spb'=>$this->input->post('no_spb'),
                'keterangan'=>$this->input->post('keterangan'),
                'dibuat_oleh'=> $user_id,
            );

                $this->db->insert('t_spb_rongsok', $data);
               
           
                redirect('index.php/Gudang');  
           
    }

        
   
}