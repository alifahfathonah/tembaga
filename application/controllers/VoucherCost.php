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
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "voucher_cost/index";
        $this->load->model('Model_voucher_cost');
        $data['list_data'] = $this->Model_voucher_cost->list_data($ppn)->result();
        $data['list_group_cost'] = $this->Model_voucher_cost->list_group_cost()->result();
        $this->load->model('Model_finance');
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();

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
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        if ($this->input->post('cost_id') == 0) {
            $cost_id = 0;
        } else {
            $cost_id = $this->input->post('cost_id');
        }

        $this->load->model('Model_m_numberings');
        if($user_ppn==1){
            $code = $this->Model_m_numberings->getNumbering('VC-KMP', $tgl_input);
        }else{
            $code = $this->Model_m_numberings->getNumbering('VCOST', $tgl_input);
        }

        if($this->input->post('bank_id')<=3){
            if($user_ppn==1){
                $num = 'KK-KMP';
            }else{
                $num = 'KK';
            }
        }else{
            if($user_ppn==1){
                $num = 'BK-KMP';
            }else{
                $num = 'BK';
            }
        }
        $code_um = $this->Model_m_numberings->getNumbering($num);

        if($code){
            if($this->input->post('group_cost_id') == 1){
                $data = array(
                        'no_voucher'=> $code,
                        'tanggal'=> $tgl_input,
                        'flag_ppn'=> $user_ppn,
                        'jenis_voucher'=>'Manual',
                        'status'=>1,
                        'group_cost_id'=> $this->input->post('group_cost_id'),
                        'customer_id'=> $cost_id,
                        'keterangan'=> $this->input->post('remarks'),
                        'amount'=> str_replace('.', '', $this->input->post('amount')),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->insert('voucher', $data);
                $insert_id=$this->db->insert_id();
                
                $this->db->insert('f_kas', array(
                    'jenis_trx'=>1,
                    'nomor'=>$code_um,
                    'flag_ppn'=>$user_ppn,
                    'tanggal'=>$tgl_input,
                    'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
                    'no_giro'=>$this->input->post('nomor_giro'),
                    'id_bank'=>$this->input->post('bank_id'),
                    'id_vc'=>$insert_id,
                    'currency'=>$this->input->post('currency'),
                    'kurs'=>$this->input->post('kurs'),
                    'nominal'=>str_replace('.', '', $this->input->post('amount')),
                    'created_at'=>$tanggal,
                    'created_by'=>$user_id
                ));
            } else if ($this->input->post('group_cost_id') == 2){
                $data = array(
                        'no_voucher'=> $code,
                        'tanggal'=> $tgl_input,
                        'flag_ppn'=> $user_ppn,
                        'jenis_voucher'=>'Manual',
                        'status'=>1,
                        'group_cost_id'=> $this->input->post('group_cost_id'),
                        'supplier_id'=> $cost_id,
                        'keterangan'=> $this->input->post('remarks'),
                        'amount'=> str_replace('.', '', $this->input->post('amount')),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->insert('voucher', $data);
                $insert_id=$this->db->insert_id();

                $this->db->insert('f_kas', array(
                    'jenis_trx'=>1,
                    'nomor'=>$code_um,
                    'flag_ppn'=> $user_ppn,
                    'tanggal'=>$tgl_input,
                    'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
                    'no_giro'=>$this->input->post('nomor_giro'),
                    'id_bank'=>$this->input->post('bank_id'),
                    'id_vc'=>$insert_id,
                    'currency'=>$this->input->post('currency'),
                    'kurs'=>$this->input->post('kurs'),
                    'nominal'=>str_replace('.', '', $this->input->post('amount')),
                    'created_at'=>$tanggal,
                    'created_by'=>$user_id
                ));
            } else {
                $data = array(
                        'no_voucher'=> $code,
                        'tanggal'=> $tgl_input,
                        'flag_ppn'=> $user_ppn,
                        'jenis_voucher'=>'Manual',
                        'status'=>1,
                        'group_cost_id'=> $this->input->post('group_cost_id'),
                        'nm_cost'=> $this->input->post('nm_cost'),
                        'keterangan'=> $this->input->post('remarks'),
                        'amount'=> str_replace('.', '', $this->input->post('amount')),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->insert('voucher', $data);
                $insert_id=$this->db->insert_id();

                $this->db->insert('f_kas', array(
                    'jenis_trx'=>1,
                    'nomor'=>$code_um,
                    'flag_ppn'=> $user_ppn,
                    'tanggal'=>$tgl_input,
                    'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
                    'no_giro'=>$this->input->post('nomor_giro'),
                    'id_bank'=>$this->input->post('bank_id'),
                    'id_vc'=>$insert_id,
                    'currency'=>$this->input->post('currency'),
                    'kurs'=>$this->input->post('kurs'),
                    'nominal'=>str_replace('.', '', $this->input->post('amount')),
                    'created_at'=>$tanggal,
                    'created_by'=>$user_id
                ));
            }
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

    function print_voucher(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $user_ppn = $this->session->userdata('user_ppn');
        $this->load->helper('tanggal_indo');

        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }

            $this->load->helper('terbilang_d_helper');
            if($user_ppn==1){
                $this->load->model('Model_finance');
                $data['header'] = $this->Model_finance->show_header_voucher_ppn($id)->row_array();
                $data['list_data'] = $this->Model_finance->show_detail_voucher_ppn($id)->result();
                $total = 0;
                foreach ($data['list_data'] as $row) {
                    $total += $row->amount;
                }

                $data['total'] = $total;

                $this->load->view('voucher_cost/print_voucher_ppn', $data);   
            }else{
                $this->load->model('Model_finance');
                $data['header'] = $this->Model_finance->show_header_voucher($id)->row_array();
                $data['list_data'] = $this->Model_finance->show_detail_voucher($id)->result();

                $total = 0;
                foreach ($data['list_data'] as $row) {
                    $total += $row->amount;
                }

                $data['total'] = $total;

                $this->load->view('voucher_cost/print_voucher', $data);   
            }
        }else{
            redirect('index.php/BeliRongsok');
        }
    }
}