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

    function voucher_kh(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "voucher_cost/voucher_kh";
        $this->load->model('Model_voucher_cost');

        $data['list_data'] = $this->Model_voucher_cost->list_data_kh($ppn)->result();

        $data['list_group_cost'] = $this->Model_voucher_cost->list_group_cost()->result();
        $this->load->model('Model_finance');
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();

        $this->load->view('layout', $data);
    }

    function kas_keluar(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "voucher_cost/kas_keluar";
        $this->load->model('Model_voucher_cost');
        $data['list_data'] = $this->Model_voucher_cost->list_data_kk($ppn)->result();
        // }else{
        // $data['list_data'] = $this->Model_voucher_cost->list_data_kh($ppn)->result();
        // }
        $data['list_group_cost'] = $this->Model_voucher_cost->list_group_cost()->result();
        $this->load->model('Model_finance');
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();

        $this->load->view('layout', $data);
    }

    function bank_keluar(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "voucher_cost/bank_keluar";
        $this->load->model('Model_voucher_cost');
        $data['list_data'] = $this->Model_voucher_cost->list_data_bk($ppn)->result();
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
    
    // function save(){
    //     $user_id  = $this->session->userdata('user_id');
    //     $user_ppn = $this->session->userdata('user_ppn');
    //     $tanggal  = date('Y-m-d h:m:s');
    //     $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
    //     $tgl_code = date('Y', strtotime($this->input->post('tanggal')));
        
    //     if ($this->input->post('cost_id') == 0) {
    //         $cost_id = 0;
    //     } else {
    //         $cost_id = $this->input->post('cost_id');
    //     }

    //     $this->load->model('Model_m_numberings');
    //     if($user_ppn==1){
    //         $code = $this->Model_m_numberings->getNumbering('VC-KMP', $tgl_input);
    //     }else{
    //         $code = $this->Model_m_numberings->getNumbering('VCOST', $tgl_input);
    //     }

    //     if($this->input->post('bank_id')<=3){
    //         if($user_ppn==1){
    //             $num = 'KK-KMP';
    //         }else{
    //             $num = 'KK';
    //         }
    //     }else{
    //         if($user_ppn==1){
    //             $num = 'BK-KMP';
    //         }else{
    //             $num = 'BK';
    //         }
    //     }
    //     if($user_ppn == 1){
    //         $code_um = $num.'.'.$tgl_code.'.'.$this->input->post('no_uk');
    //     }else{
    //         $code_um = $num.'.'.$tgl_code.'.'.$this->input->post('no_uk');
    //     }

    //     if($code){
    //         // if($user_ppn==1){
    //         //     $stat = 1;
    //         // }else{
    //         //     $stat = 0;
    //         // }
    //         $stat = 1;
    //         if($this->input->post('group_cost_id') == 1){
    //             $data = array(
    //                     'no_voucher'=> $code,
    //                     'tanggal'=> $tgl_input,
    //                     'flag_ppn'=> $user_ppn,
    //                     'jenis_voucher'=>'Manual',
    //                     'status'=>$stat,
    //                     'group_cost_id'=> $this->input->post('group_cost_id'),
    //                     'customer_id'=> $cost_id,
    //                     'keterangan'=> $this->input->post('remarks'),
    //                     'amount'=> str_replace(',', '', $this->input->post('amount')),
    //                     'created'=> $tanggal,
    //                     'created_by'=> $user_id,
    //                     'modified'=> $tanggal,
    //                     'modified_by'=> $user_id
    //                 );
    //             $this->db->insert('voucher', $data);
    //             $insert_id=$this->db->insert_id();

    //                 $this->db->insert('f_kas', array(
    //                     'jenis_trx'=>1,
    //                     'nomor'=>$code_um,
    //                     'flag_ppn'=>$user_ppn,
    //                     'tanggal'=>$tgl_input,
    //                     'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
    //                     'no_giro'=>$this->input->post('nomor_giro'),
    //                     'id_bank'=>$this->input->post('bank_id'),
    //                     'id_vc'=>$insert_id,
    //                     'currency'=>$this->input->post('currency'),
    //                     'kurs'=>$this->input->post('kurs'),
    //                     'nominal'=>str_replace(',', '', $this->input->post('amount')),
    //                     'created_at'=>$tanggal,
    //                     'created_by'=>$user_id
    //                 ));

    //         } else if ($this->input->post('group_cost_id') == 2){
    //             $data = array(
    //                     'no_voucher'=> $code,
    //                     'tanggal'=> $tgl_input,
    //                     'flag_ppn'=> $user_ppn,
    //                     'jenis_voucher'=>'Manual',
    //                     'status'=>$stat,
    //                     'group_cost_id'=> $this->input->post('group_cost_id'),
    //                     'supplier_id'=> $cost_id,
    //                     'keterangan'=> $this->input->post('remarks'),
    //                     'amount'=> str_replace(',', '', $this->input->post('amount')),
    //                     'created'=> $tanggal,
    //                     'created_by'=> $user_id,
    //                     'modified'=> $tanggal,
    //                     'modified_by'=> $user_id
    //                 );
    //             $this->db->insert('voucher', $data);
    //             $insert_id=$this->db->insert_id();

    //             $this->db->insert('f_kas', array(
    //                 'jenis_trx'=>1,
    //                 'nomor'=>$code_um,
    //                 'flag_ppn'=> $user_ppn,
    //                 'tanggal'=>$tgl_input,
    //                 'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
    //                 'no_giro'=>$this->input->post('nomor_giro'),
    //                 'id_bank'=>$this->input->post('bank_id'),
    //                 'id_vc'=>$insert_id,
    //                 'currency'=>$this->input->post('currency'),
    //                 'kurs'=>$this->input->post('kurs'),
    //                 'nominal'=>str_replace(',', '', $this->input->post('amount')),
    //                 'created_at'=>$tanggal,
    //                 'created_by'=>$user_id
    //             ));

    //         } else {
    //             $data = array(
    //                     'no_voucher'=> $code,
    //                     'tanggal'=> $tgl_input,
    //                     'flag_ppn'=> $user_ppn,
    //                     'jenis_voucher'=>'Manual',
    //                     'status'=>$stat,
    //                     'group_cost_id'=> $this->input->post('group_cost_id'),
    //                     'nm_cost'=> $this->input->post('nm_cost'),
    //                     'keterangan'=> $this->input->post('remarks'),
    //                     'amount'=> str_replace(',', '', $this->input->post('amount')),
    //                     'created'=> $tanggal,
    //                     'created_by'=> $user_id,
    //                     'modified'=> $tanggal,
    //                     'modified_by'=> $user_id
    //                 );
    //             $this->db->insert('voucher', $data);
    //             $insert_id=$this->db->insert_id();

    //             $this->db->insert('f_kas', array(
    //                 'jenis_trx'=>1,
    //                 'nomor'=>$code_um,
    //                 'flag_ppn'=> $user_ppn,
    //                 'tanggal'=>$tgl_input,
    //                 'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
    //                 'no_giro'=>$this->input->post('nomor_giro'),
    //                 'id_bank'=>$this->input->post('bank_id'),
    //                 'id_vc'=>$insert_id,
    //                 'currency'=>$this->input->post('currency'),
    //                 'kurs'=>$this->input->post('kurs'),
    //                 'nominal'=>str_replace(',', '', $this->input->post('amount')),
    //                 'created_at'=>$tanggal,
    //                 'created_by'=>$user_id
    //             ));

    //         }
    //         $this->session->set_flashdata('flash_msg', 'Voucher cost berhasil di-create dengan nomor : '.$code);
    //     }else{
    //         $this->session->set_flashdata('flash_msg', 'Voucher cost gagal di-create, penomoran belum disetup!');            
    //     }

    //     if ($this->input->post('bank_id') <= 3) {
    //         redirect('index.php/VoucherCost/kas_keluar');
    //     } else {
    //         redirect('index.php/VoucherCost/bank_keluar');
    //     }
    // }

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Y', strtotime($this->input->post('tanggal')));

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
        if($user_ppn == 1){
            $code_um = $num.'.'.$tgl_code.'.'.$this->input->post('no_uk');
        }else{
            $code_um = $num.'.'.$tgl_code.'.'.$this->input->post('no_uk');
        }

        if($code){
            // if($user_ppn==1){
            //     $stat = 1;
            // }else{
            //     $stat = 0;
            // }        

            $cost_id = $this->input->post('cost_id');
            if($this->input->post('group_cost_id') == 1){
                $customer_id = $cost_id;
                $supplier_id = 0;
                $nm_cost = NULL;
            }elseif($this->input->post('group_cost_id') == 2){
                $customer_id = 0;
                $supplier_id = $cost_id;
                $nm_cost = NULL;
            }else{
                $customer_id = 0;
                $supplier_id = 0;
                $nm_cost = $this->input->post('nm_cost');
            }
            $this->db->insert('f_kas', array(
                    'jenis_trx'=>1,
                    'nomor'=>$code_um,
                    'flag_ppn'=>$user_ppn,
                    'tanggal'=>$tgl_input,
                    'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
                    'no_giro'=>$this->input->post('nomor_giro'),
                    'id_bank'=>$this->input->post('bank_id'),
                    'id_vc'=>0,
                    'currency'=>$this->input->post('currency'),
                    'kurs'=>$this->input->post('kurs'),
                    'nominal'=>str_replace(',', '', $this->input->post('amount')),
                    'created_at'=>$tanggal,
                    'created_by'=>$user_id
                ));
            $fk_id = $this->db->insert_id();

                $data = array(
                        'no_voucher'=> $code,
                        'tanggal'=> $tgl_input,
                        'flag_ppn'=> $user_ppn,
                        'jenis_voucher'=>'Manual',
                        'status'=>1,
                        'id_fk'=>$fk_id,
                        'group_cost_id'=> $this->input->post('group_cost_id'),
                        'customer_id'=> $customer_id,
                        'supplier_id'=> $supplier_id,
                        'nm_cost'=> $nm_cost,
                        'keterangan'=> $this->input->post('remarks'),
                        'amount'=> str_replace(',', '', $this->input->post('amount')),
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

        if ($this->input->post('bank_id') <= 3) {
            redirect('index.php/VoucherCost/kas_keluar');
        } else {
            redirect('index.php/VoucherCost/bank_keluar');
        }
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

    function delete_voucher(){
        $id = $this->uri->segment(3);
        $jenis = $this->uri->segment(4);
        $user_ppn = $this->session->userdata('user_ppn');
        
        $this->db->trans_start();
        if(!empty($id)){
            $this->load->model('Model_voucher_cost');
            $get = $this->Model_voucher_cost->get_f_kas($id)->row_array();
            print_r($get);
            // die();

            $this->db->delete('voucher', ['id_fk' => $id]);
            $this->db->delete('f_kas', ['id' => $id]);

            if($get['po_id']>0){
                $this->db->where('id', $get['po_id']);
                $this->db->update('po', array(
                    'status'=>3,
                    'flag_pelunasan'=>0
                ));
            }

            if($user_ppn == 1){
                $this->load->helper('target_url');
                $url = target_url().'api/VoucherAPI/vc_del/id/'.$id;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                // curl_setopt($ch, CURLOPT_POSTFIELDS, "group=3&group_2=1");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                $response = json_decode($result);
                curl_close($ch);
                // print_r($result);
                // die();
            }
        }

        if ($this->db->trans_complete()) {
            if ($jenis == 'KK') {
                $this->session->set_flashdata('flash_msg', 'Data voucher cost berhasil dihapus');
                redirect('index.php/VoucherCost/kas_keluar');
            } else {
                $this->session->set_flashdata('flash_msg', 'Data voucher cost berhasil dihapus');
                redirect('index.php/VoucherCost/bank_keluar');
            }
        }
    }

    function delete_voucher_kh(){
        $id = $this->uri->segment(3);
        $jenis = $this->uri->segment(4);
        
        $this->db->trans_start();
        if(!empty($id)){
            $this->db->delete('voucher', ['id' => $id]);
        }

        if ($this->db->trans_complete()) {
                $this->session->set_flashdata('flash_msg', 'Data voucher cost berhasil dihapus');
                redirect('index.php/VoucherCost/voucher_kh');
        }
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
                $data['header'] = $this->Model_finance->show_header_voucher_ppn($id)->row_array();
                $data['list_data'] = $this->Model_finance->show_detail_voucher_ppn($id)->result();

                $total = 0;
                foreach ($data['list_data'] as $row) {
                    $total += $row->amount;
                }

                $data['total'] = $total;

                $this->load->view('voucher_cost/print_voucher_ppn', $data);   
            }
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function add_uk(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn    = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "voucher_cost/add_uk";
        $this->load->model('Model_voucher_cost');
        $data['list_data'] = $this->Model_voucher_cost->list_data_kk($ppn)->result();
        $data['list_group_cost'] = $this->Model_voucher_cost->list_group_cost()->result();
        $this->load->model('Model_finance');
        $data['bank_list'] = $this->Model_finance->bank_list($ppn)->result();
        $this->load->view('layout', $data);
    }

    function save_uk(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Y', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
            // $details = $this->input->post('myDetails');
            // print_r($details);
            // die();
        $this->load->model('Model_m_numberings');

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
        if($user_ppn == 1){
            $code_um = $num.'.'.$tgl_code.'.'.$this->input->post('no_uk');
        }else{
            $code_um = $this->Model_m_numberings->getNumbering($num);
        }

        if($code_um){
                $data = array(
                    'jenis_trx'=>1,
                    'nomor'=>$code_um,
                    'flag_ppn'=>$user_ppn,
                    'tanggal'=>$tgl_input,
                    'tgl_jatuh_tempo'=>$this->input->post('tgl_jatuh'),
                    'no_giro'=>$this->input->post('nomor_giro'),
                    'id_bank'=>$this->input->post('bank_id'),
                    'currency'=>$this->input->post('currency'),
                    'kurs'=>$this->input->post('kurs'),
                    'nominal'=>str_replace(',', '', $this->input->post('total_nominal')),
                    'created_at'=>$tanggal,
                    'created_by'=>$user_id
                );
                $this->db->insert('f_kas', $data);
                $insert_id = $this->db->insert_id();

            $details = $this->input->post('myDetails');
            $detail_post = [];
            foreach ($details as $i => $row){
                if($row['nominal']!=''){

                    if($user_ppn==1){
                        $code = $this->Model_m_numberings->getNumbering('VC-KMP', $tgl_input);
                    }else{
                        $code = $this->Model_m_numberings->getNumbering('VCOST', $tgl_input);
                    }

                    // if($row['cost_id']==0){
                    //     $cost_id = 0;
                    // }else{
                    //     $cost_id = $row['cost_id'];
                    // }

                    if($row['group_cost_id'] == 1){
                        $detail = array(
                            'no_voucher'=> $code,
                            'tanggal'=> $tgl_input,
                            'flag_ppn'=> $user_ppn,
                            'jenis_voucher'=>'Manual',
                            'status'=>1,
                            'group_cost_id'=> $row['group_cost_id'],
                            'customer_id'=> $row['cost_id'],
                            'keterangan'=> $row['line_remarks'],
                            'amount'=> str_replace(',', '', $row['nominal']),
                            'id_fk'=> $insert_id,
                            'created'=> $tanggal,
                            'created_by'=> $user_id
                        );
                        $this->db->insert('voucher', $detail);
                    }elseif($row['group_cost_id'] == 2){
                        $detail = array(
                            'no_voucher'=> $code,
                            'tanggal'=> $tgl_input,
                            'flag_ppn'=> $user_ppn,
                            'jenis_voucher'=>'Manual',
                            'status'=>1,
                            'group_cost_id'=> $row['group_cost_id'],
                            'supplier_id'=> $row['cost_id'],
                            'keterangan'=> $row['line_remarks'],
                            'amount'=> str_replace(',', '', $row['nominal']),
                            'id_fk'=> $insert_id,
                            'created'=> $tanggal,
                            'created_by'=> $user_id
                        );
                        $this->db->insert('voucher', $detail);
                    }else{
                        $detail = array(
                            'no_voucher'=> $code,
                            'tanggal'=> $tgl_input,
                            'flag_ppn'=> $user_ppn,
                            'jenis_voucher'=>'Manual',
                            'status'=>1,
                            'group_cost_id'=> $row['group_cost_id'],
                            'nm_cost'=> $row['nm_cost'],
                            'keterangan'=> $row['line_remarks'],
                            'amount'=> str_replace(',', '', $row['nominal']),
                            'id_fk'=> $insert_id,
                            'created'=> $tanggal,
                            'created_by'=> $user_id
                        );
                        $this->db->insert('voucher', $detail);
                    }
                    $detail_id = $this->db->insert_id();
                    $detail_post[$i] = array_merge($detail, ['reff1'=>$detail_id]);
                }
            }
            $this->session->set_flashdata('flash_msg', 'Uang Keluar berhasil di-create dengan nomor : '.$code_um);
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Keluar gagal di-create, penomoran belum disetup!');            
        }

            if($user_ppn == 1){
                $this->load->helper('target_url');

                $data_post['header'] = array_merge($data,['reff1'=>$insert_id]);
                $data_post['details'] = $detail_post;

                $post = json_encode($data_post);
                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/VoucherAPI/vc_add');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
            }
        if($this->db->trans_complete()){
            if ($this->input->post('bank_id') <= 3) {
                redirect('index.php/VoucherCost/kas_keluar');
            } else {
                redirect('index.php/VoucherCost/bank_keluar');
            }
        }else{
            redirect('index.php/VoucherCost');
        }
    }

    function get_voucher(){
        $id = $this->input->post('id');
        $this->load->model('Model_finance');
        $data = $this->Model_finance->show_header_voucher_ppn($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }

    function update(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('f_kas', array(
                'nomor' => $this->input->post('no_voucher'),
                'tanggal' => $this->input->post('tanggal')
            ));

            $this->db->where('id_fk', $this->input->post('id'));
            $this->db->update('voucher', array(
                'tanggal' => $this->input->post('tanggal')
            ));

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Voucher cost berhasil di-update dengan nomor : '.$this->input->post('no_voucher'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Voucher cost gagal di-update, penomoran belum disetup!');            
        }

        if ($this->input->post('bank_id') <= 3) {
            redirect('index.php/VoucherCost/kas_keluar');
        } else {
            redirect('index.php/VoucherCost/bank_keluar');
        }
    }
}