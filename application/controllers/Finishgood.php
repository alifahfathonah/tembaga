<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finishgood extends CI_Controller{   
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
        $data['judul']     = "Finish Good";
        $data['content']   = "finishgood/index";
        
        $this->load->model('Model_ingot');
        $data['jenis_barang_list'] = $this->Model_ingot->jenis_barang_list()->result();
        $data['list_data'] = $this->db->query("select tgf.*, mb.berat, o.nama_owner from t_gudang_fg tgf 
            left join m_bobbin mb on (mb.id = tgf.bobbin_id)
            left join owner o on (o.id = mb.owner_id)")->result();
        $data['packing'] = $this->db->query("select * from m_jenis_packing")->result();
        
        $this->load->view('layout', $data);  
    }


      function add(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Finish Good";
        $data['content']   = "finishgood/add";
        
        
        $this->load->view('layout', $data);  
    }


        function save_addfinishgood(){
        $tgl = date("Y-m-d H:i:s");
        $tanggal = date("Y-m-d");
         $this->db->query("insert into t_gudang_fg(tanggal,no_produksi,no_packing,bruto,netto,berat,milik,keterangan,dibuat_oleh,dibuat_tgl)values('".$tanggal."','".$this->input->post('no_produksi')."','".$this->input->post('no_packing')."','".$this->input->post('bruto')."','".$this->input->post('netto')."','".$this->input->post('berat')."','".$this->input->post('milik')."','".$this->input->post('keterangan')."','".$this->session->userdata('user_id')."','".$tgl."')");   

         return redirect(base_url().'index.php/Finishgood');


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
        $data['content']   = "Finishgood/send";
        
        
        $this->load->view('layout', $data);  
    }


     function save_sendrongsok(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
             
                'tanggal'=> $tgl_input,
                'no_spb'=>$this->input->post('no_spb'),
                'keterangan'=>$this->input->post('keterangan'),
                'dibuat_oleh'=> $user_id,
            );

                $this->db->insert('t_spb_rongsok', $data);
               
           
                redirect('index.php/Finishgood');  
           
    }

        
   
}