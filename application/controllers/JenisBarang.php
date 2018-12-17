<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JenisBarang extends CI_Controller{
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

        $data['content']= "jenis_barang/index";
        $this->load->model('Model_jenis_barang');
        $data['list_data'] = $this->Model_jenis_barang->list_data()->result();

        $this->load->view('layout', $data);
    }
    
    function cek_code(){
        $code = $this->input->post('data');
        $this->load->model('Model_jenis_barang');
        $cek_data = $this->Model_jenis_barang->cek_data($code)->row_array();
        $return_data = ($cek_data)? "ADA": "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                    'jenis_barang'=> $this->input->post('jenis_barang'),
                    'kode'=> $this->input->post('kode_barang'),
                    'uom'=> $this->input->post('uom'),
                    'category'=> $this->input->post('kategori'),
                    'ukuran'=> $this->input->post('ukuran'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );
       
        $this->db->insert('jenis_barang', $data); 
        $this->session->set_flashdata('flash_msg', 'Data jenis barang berhasil disimpan');
        redirect('index.php/JenisBarang');       
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('jenis_barang');            
        }
        $this->session->set_flashdata('flash_msg', 'Data jenis barang berhasil dihapus');
        redirect('index.php/JenisBarang');
    }
    
    function edit(){
        $id = $this->input->post('id');
        $this->load->model('Model_jenis_barang');
        $data = $this->Model_jenis_barang->show_data($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'jenis_barang'=> $this->input->post('jenis_barang'),
                'kode'=> $this->input->post('kode_barang'),
                'uom'=> $this->input->post('uom'),
                'category'=> $this->input->post('kategori'),
                'ukuran'=> $this->input->post('ukuran'),
                'keterangan'=> $this->input->post('keterangan'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jenis_barang', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data jenis barang berhasil disimpan');
        redirect('index.php/JenisBarang');
    }
    
}