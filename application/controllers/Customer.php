<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller{
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

        $data['content']= "customer/index";
        $this->load->model('Model_customer');
        $data['list_data'] = $this->Model_customer->list_data()->result();
        
        $data['list_provinsi'] = $this->Model_customer->list_provinsi()->result();
        $data['list_city'] = $this->Model_customer->list_kota(1)->result();
        $data['list_bank'] = $this->Model_customer->list_bank()->result();

        $this->load->view('layout', $data);
    }

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                    'kode_customer'=> $this->input->post('kode_customer'),
                    'nama_customer'=> $this->input->post('nama_customer'),
                    'npwp'=> $this->input->post('npwp'),
                    'pic'=> $this->input->post('pic'),
                    'telepon'=> $this->input->post('telepon'),
                    'hp'=> $this->input->post('hp'),
                    'alamat'=> $this->input->post('alamat'),
                    'jenis_customer'=> $this->input->post('jenis_customer'),
                    'fax'=>$this->input->post('fax'),
                    'nama_customer_kh'=> $this->input->post('nama_customer'),
                    'pic_kh'=> $this->input->post('pic'),
                    'telepon_kh'=> $this->input->post('telepon'),
                    'hp_kh'=> $this->input->post('hp'),
                    'alamat_kh'=> $this->input->post('alamat'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                );
       
        $this->db->insert('m_customers', $data); 
        $this->session->set_flashdata('flash_msg', 'Data customer berhasil disimpan');
        redirect('index.php/Customer');       
    }
    
    function get_city_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_customer');
        $cities = $this->Model_customer->list_kota($id)->result(); 
        foreach ($cities as $row) {
            $arr_city[$row->id] = $row->city_name;
        } 
        print form_dropdown('m_city_id', $arr_city);
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('m_customers');            
        }
        $this->session->set_flashdata('flash_msg', 'Data customer berhasil dihapus');
        redirect('index.php/Customer');
    }
    
    function edit(){
        $id = $this->input->post('id');
        $this->load->model('Model_customer');
        $data = $this->Model_customer->show_data($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $ppn      = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        
        if($ppn == 1){
            $data = array(
                    'kode_customer'=> $this->input->post('kode_customer'),
                    'nama_customer'=> $this->input->post('nama_customer'),
                    'npwp'=> $this->input->post('npwp'),
                    'pic'=> $this->input->post('pic'),
                    'telepon'=> $this->input->post('telepon'),
                    'hp'=> $this->input->post('hp'),
                    'alamat'=> $this->input->post('alamat'),
                    'jenis_customer'=> $this->input->post('jenis_customer'),
                    'fax'=>$this->input->post('fax'),
                    //'flag_sinkronisasi'=>0,
                    //'flag_action'=>'U',
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                );
        }else{
            $data = array(
                    'kode_customer'=> $this->input->post('kode_customer'),
                    'nama_customer_kh'=> $this->input->post('nama_customer'),
                    'npwp'=> $this->input->post('npwp'),
                    'pic_kh'=> $this->input->post('pic'),
                    'telepon_kh'=> $this->input->post('telepon'),
                    'hp_kh'=> $this->input->post('hp'),
                    'alamat_kh'=> $this->input->post('alamat'),
                    'jenis_customer'=> $this->input->post('jenis_customer'),
                    'fax_kh'=>$this->input->post('fax'),
                    //'flag_sinkronisasi'=>0,
                    //'flag_action'=>'U',
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                );
        }
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('m_customers', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data customer berhasil disimpan');
        redirect('index.php/Customer');
    }
    
}