<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VoucherCost extends CI_Controller{
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

        $data['content']= "voucher_cost/index";
        $this->load->model('Model_voucher_cost');
        $data['list_data'] = $this->Model_voucher_cost->list_data()->result();
        $data['list_group_cost'] = $this->Model_voucher_cost->list_group_cost()->result();

        $this->load->view('layout', $data);
    }
    
    function get_cost_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_voucher_cost');
        if($id == 1){
            $data = $this->Model_voucher_cost->get_customer()->result();
        } else if ($id == 2){
            $data = $this->Model_voucher_cost->get_supplier()->result();
        } else {
            $data = $this->Model_voucher_cost->get_cost_list($id)->result();
        }
        $arr_cost[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_cost[$row->id] = $row->nama_cost;
        } 
        print form_dropdown('cost_id', $arr_cost);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        if ($this->input->post('cost_id') == 0) {
            $cost_id = 0;
        } else {
            $cost_id = $this->input->post('cost_id');
        }
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('VCOST', $tgl_input);
        if($code){
            $data = array(
                        'no_voucher'=> $code,
                        'tanggal'=> $tgl_input,
                        'jenis_voucher'=>'Manual',
                        'group_cost_id'=> $this->input->post('group_cost_id'),
                        'cost_id'=> $cost_id,
                        'keterangan'=> $this->input->post('remarks'),
                        'amount'=> str_replace('.', '', $this->input->post('amount')),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );

            $this->db->insert('voucher', $data); 
            $this->session->set_flashdata('flash_msg', 'Voucher cost berhasil di-create dengan nomor : '.$code);
        }else{
            $this->session->set_flashdata('flash_msg', 'Voucher cost gagal di-create, penomoran belum disetup!');            
        }
        redirect('index.php/VoucherCost');
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('voucher');            
        }
        $this->session->set_flashdata('flash_msg', 'Data voucher cost berhasil dihapus');
        redirect('index.php/VoucherCost');
    }

    
}