<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sinkronisasi extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->Model('Model_sinkronisasi');
        $this->load->helper('target_url');
    }

    function finance_sync(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/sinkronisasi/finance_sync";
        $data['so'] = $this->Model_sinkronisasi->so_count()->row_array();
        $data['sj'] = $this->Model_sinkronisasi->sj_count()->row_array();
        $data['inv'] = $this->Model_sinkronisasi->inv_count()->row_array();
        $data['mtch'] = $this->Model_sinkronisasi->match_inv_count()->row_array();
        $this->load->model('Model_sinkronisasi');
        // $data['list_data'] = $this->Model_sinkronisasi->list_data()->result();

        $this->load->view('layout', $data);
    }

    function sync_so(){
        try {
            $this->db->trans_start();
            $data_post = $this->Model_sinkronisasi->sales_order_fg()->result_array();
            $this->load->model('Model_sales_order');
            foreach ($data_post as $key => $value) {
                $post[$key]['detail'] = $this->Model_sales_order->load_detail_only($value['id'])->result();
                $data_api[$key] = array_merge($data_post[$key], array('details'=>$post[$key]['detail']));
            }
            $post = json_encode($data_api);

                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/SinkronisasiAPI/so');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
                if($result['status']==true){
                    foreach ($data_post as $v) {
                        $this->db->where('id', $v['id']);
                        $this->db->update('sales_order', array(
                            'api'=>1
                        ));
                    }
                }
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Sales order berhasil disimpan, silahkan dicoba kembali!');
                redirect('index.php/Sinkronisasi/finance_sync');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            // return;
        }
    }

    function sync_sj(){
        try {
            $this->db->trans_start();

            $loop = $this->Model_sinkronisasi->sj()->result();
            $this->load->model('Model_sales_order');
            foreach ($loop as $key => $v) {
                $data_post['tsj'] = $this->Model_sales_order->tsj_header_only($v->id)->row_array();

                if($data_post['tsj']['jenis_barang'] == 'FG'){
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang($v->id)->result();
                }elseif($data_post['tsj']['jenis_barang'] == 'WIP'){
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang_wip($v->id)->result();
                }elseif($data_post['tsj']['jenis_barang'] == 'RONGSOK'){
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang_rsk($v->id)->result();
                }elseif($data_post['tsj']['jenis_barang'] == 'LAIN'){
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang_lain($v->id)->result();
                }
                $post[$key] = array_merge($data_post['tsj'], array('gudang'=>$data_post['gudang']));
            }

            $post = json_encode($post);

                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/SinkronisasiAPI/sj');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);

                if($result['status']==true){
                    foreach ($loop as $v) {
                        $this->db->where('id', $v->id);
                        $this->db->update('t_surat_jalan', array(
                            'api'=>1
                        ));
                    }
                }
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Surat Jalan berhasil disimpan, silahkan dicoba kembali!');
                redirect('index.php/Sinkronisasi/finance_sync');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            // return;
        }
    }

    function sync_inv(){
        try {
            $this->db->trans_start();

            $loop = $this->Model_sinkronisasi->inv()->result();
            foreach ($loop as $key => $v) {
                $header= $this->Model_sinkronisasi->inv_header_only($v->id)->row_array();
                $details= $this->Model_sinkronisasi->inv_detail_only($v->id)->result();
                $post[$key] = array_merge($header, array('details'=>$details));
            }

            $post = json_encode($post);

                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/SinkronisasiAPI/inv');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
                if($result['status']==true){
                    foreach ($loop as $v) {
                        $this->db->where('id', $v->id);
                        $this->db->update('f_invoice', array(
                            'api'=>1
                        ));
                    }
                }
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Invoice berhasil disimpan!');
                redirect('index.php/Sinkronisasi/finance_sync');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            // return;
        }
    }

    function sync_matching_inv(){
        try {
            $this->db->trans_start();

            $loop = $this->Model_sinkronisasi->match_inv()->result();
            foreach ($loop as $key => $v) {
                $details= $this->Model_sinkronisasi->match_inv_detail_only($v->id)->result();
                $post[$key] = array_merge((array)$v, array('details'=>$details));
            }

            $post = json_encode($post);

                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/SinkronisasiAPI/matching_inv');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
                if($result['status']==true){
                    foreach ($loop as $v) {
                        $this->db->where('id', $v->id);
                        $this->db->update('f_match', array(
                            'api'=>1
                        ));
                    }
                }
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Matchiing Invoice berhasil disimpan!');
                redirect('index.php/Sinkronisasi/finance_sync');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            // return;
        }
    }

    function um_sync(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/sinkronisasi/um_sync";
        $data['um'] = $this->Model_sinkronisasi->um_count()->row_array();
        $data['uk'] = $this->Model_sinkronisasi->uk_count()->row_array();
        $this->load->model('Model_sinkronisasi');
        // $data['list_data'] = $this->Model_sinkronisasi->list_data()->result();

        $this->load->view('layout', $data);
    }

//ini belum
    function sync_um(){
        try {
            $this->db->trans_start();
            $data_post = $this->Model_sinkronisasi->um()->result_array();
            $this->load->model('Model_finance');
            foreach ($data_post as $key => $value) {
                $post['um'] = $this->Model_finance->replace_list_detail($value['id_um'])->row_array();
                $data_api[$key] = array_merge(array('data_fk'=>$data_post[$key]), array('data_um'=>$post['um']));
            }
            $post = json_encode($data_api);

                    // print_r($post);
                    // die();
                $ch = curl_init(target_url().'api/SinkronisasiAPI/um');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
                if($result['status']==true){
                    foreach ($data_post as $v) {
                        $this->db->where('id', $v['id']);
                        $this->db->update('f_kas', array(
                            'api'=>1
                        ));
                    }
                }
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Uang Masuk berhasil disinkronisasi, silahkan dicoba kembali!');
                redirect('index.php/Sinkronisasi/um_sync');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            // return;
        }
    }

    function sync_uk(){
        try {
            $this->db->trans_start();
            $data_post = $this->Model_sinkronisasi->uk()->result_array();
            $this->load->model('Model_finance');
            foreach ($data_post as $key => $value) {
                $post['uk'] = $this->Model_finance->get_vk_voucher($value['id'])->result();
                $data_api[$key] = array_merge(array('data_fk'=>$data_post[$key]), array('data_voucher'=>$post['uk']));
            }
            $post = json_encode($data_api);

                    // print_r($post);
                    // die();
                $ch = curl_init(target_url().'api/SinkronisasiAPI/uk');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
                if($result['status']==true){
                    foreach ($data_post as $v) {
                        $this->db->where('id', $v['id']);
                        $this->db->update('f_kas', array(
                            'api'=>1
                        ));
                    }
                }
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Uang Keluar berhasil disinkronisasi');
                redirect('index.php/Sinkronisasi/um_sync');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            // return;
        }
    }
}

// TRUNCATE `sales_order`;
// TRUNCATE `spb`;
// TRUNCATE `spb_detail`;
// TRUNCATE `t_sales_order`;
// TRUNCATE `t_sales_order_detail`;
// TRUNCATE `t_spb_fg`;
// TRUNCATE `t_spb_fg_detail`;
// TRUNCATE `t_spb_wip_detail`;
// TRUNCATE `t_spb_wip_fulfilment`;