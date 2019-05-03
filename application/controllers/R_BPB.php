<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_BPB extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_bpb');
        $this->load->model('Model_surat_jalan');
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');       
        $reff_cv = $this->session->userdata('cv_id'); 
        if($group_id != 9){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/bpb/index";
        // if($group_id == 14 || $group_id == 15){
        //     $data['list_sj']= $this->Model_surat_jalan->list_sj_cv()->result();
        // }else if($group_id == 17){
        //     $data['list_sj']= $this->Model_surat_jalan->list_sj_so()->result();
        // }else{
        if ($group_id == 9) {
            $data['list_bpb']= $this->Model_bpb->list_bpb()->result();
        } else {
            $data['list_bpb']= $this->Model_bpb->list_bpb($reff_cv)->result();
        }
        // }
        $this->load->view('layout', $data);
    }

    function add_bpb(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $jenis = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $user_id = $this->session->userdata('user_id');      
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
        $data['group_id']  = $group_id;
        $data['user_id'] = $user_id;
        $data['jenis'] = $jenis;
        $data['content']= "resmi/bpb/add_bpb";
        if($jenis == 'matching'){
            $this->load->model('Model_matching');
            $this->load->model('Model_purchase_order');
            $data['header'] = $this->Model_surat_jalan->show_header_invoice($id)->row_array();
            $data['customer_list'] = $this->Model_purchase_order->customer_list($id)->result();
            $data['po_list'] = $this->Model_bpb->po_free()->result();
        }
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();

        $this->load->view('layout', $data);
    }

    function save_bpb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis');    
        
        $this->db->trans_start();

        if($jenis == 'matching'){
            $data = array(
                'no_bpb'=> $this->input->post('no_surat_jalan'),
                'r_invoice_id'=>$this->input->post('id_invoice_resmi'),
                'r_so_id' => $this->input->post('so_id'),
                'r_po_id' => $this->input->post('flag_po'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'jenis_bpb'=>'BPB RONGSOK',
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'reff_cv'=>$this->session->userdata('cv_id'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_bpb', $data);
            $bpb_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('id_invoice_resmi'));
            $this->db->update('r_t_invoice', array(
                'bpb_id'=> $bpb_id
            ));

            $this->load->model('Model_matching');
            $list_invoice = $this->Model_matching->list_invoice_detail($this->input->post('id_invoice_resmi'))->result();
            foreach ($list_invoice as $row) {
                $detail = array(
                    'bpb_resmi_id' => $bpb_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'no_packing' => $row->no_pallete,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'line_remarks' => $row->line_remarks
                );
                $this->db->insert('r_t_bpb_detail', $detail);
            }

            if($this->input->post('flag_po') != 0){
                $this->db->where('id', $this->input->post('flag_po'));
                $this->db->update('r_t_po', array(
                    'flag_bpb' => $bpb_id
                ));
            }

            // $data_api = array(
            //     'no_bpb'=> $this->input->post('no_surat_jalan'),
            //     'no_po'=> $this->input->post('no_po'),
            //     'tanggal'=> $tgl_input,
            //     'jenis_barang'=>$this->input->post('jenis_barang'),
            //     'm_customer_id'=>$this->input->post('m_customer_id'),
            //     'jenis_bpb'=>'BPB RONGSOK',
            //     'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
            //     'no_kendaraan'=>$this->input->post('no_kendaraan'),
            //     'supir'=>$this->input->post('supir'),
            //     'remarks'=>$this->input->post('remarks'),
            //     'reff'=>$bpb_id,
            // );

            // $this->load->helper('target_url');

            // $ch = curl_init(target_url().'api/BPBAPI/bpb');
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $response = curl_exec($ch);
            // $result = json_decode($response, true);
            // curl_close($ch);

            // log_message('debug', print_r($result,1));


            // $this->load->model('Model_bpb');
            // $bpb_detail_api = $this->Model_bpb->list_bpb_detail_only($bpb_id)->result_array();
            // foreach ($bpb_detail_api as $i => $value) {
            //     $bpb_detail_api[$i]['reff'] = $bpb_detail_api[$i]['id'];
            //     $bpb_detail_api[$i]['bpb_id'] = $result['id'];
            //     unset($bpb_detail_api[$i]['id']);
            // }

            // $detail_api = json_encode($bpb_detail_api);

            // // print_r($detail_api);

            // $ch2 = curl_init(target_url().'api/BPBAPI/bpb_detail');
            // curl_setopt($ch2, CURLOPT_POST, true);
            // curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            // curl_setopt($ch2, CURLOPT_POSTFIELDS, $detail_api);
            // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            // $response2 = curl_exec($ch2);
            // $result2 = json_decode($response2, true);
            // curl_close($ch2);

            // log_message('debug', print_r($result2,1));
        }

        if($this->db->trans_complete()){
            redirect('index.php/R_BPB/edit_bpb/'.$bpb_id);  
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_SuratJalan/surat_jalan');  
        }
    }

    function edit_bpb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "resmi/bpb/edit_bpb";
            $data['header'] = $this->Model_bpb->show_header_bpb($id)->row_array();
            $data['jenis_bpb'] = $data['header']['jenis_bpb'];
            $this->load->model('Model_surat_jalan');
            $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
            $data['list_bpb_detail'] = $this->Model_bpb->list_bpb_detail($id)->result();
            $jenis = $data['header']['jenis_barang'];
            $this->load->model('Model_sales_order');
            if($jenis == 'FG'){
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();
            }else{
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_rsk()->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_BPB/');
        }
    }

    function update_bpb(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $jenis = $this->input->post('jenis_barang');

        if($jenis == 'RONGSOK'){
            $details = $this->input->post('details');
            foreach ($details as $v) {
                if($v['id']!=''){
                    $data = array(
                            'jenis_barang_id'=> $v['barang_id'],
                            'no_packing'=> $v['no_packing'],
                            'bruto'=> $v['bruto'],
                            'netto'=> $v['netto'],
                            'line_remarks'=> $v['line_remarks'],
                            'modified_at'=> $tanggal,
                            'modified_by'=> $user_id
                        );
                    $this->db->where('id', $v['id']);
                    $this->db->update('r_t_bpb_detail', $data);
                }
            }

            if($this->input->post('flag_po') != 0){
                $this->db->where('id', $this->input->post('flag_po'));
                $this->db->update('r_t_po', array(
                    'flag_bpb' => $this->input->post('id')
                ));
            }

        }else if($jenis == 'FG'){
            $details = $this->input->post('details');
            foreach ($details as $v) {
                if($v['id']!=''){
                    $data = array(
                            'jenis_barang_id'=> $v['barang_id'],
                            'no_packing'=> $v['no_packing'],
                            'bruto'=> $v['bruto'],
                            'netto'=> $v['netto'],
                            'nomor_bobbin'=> $v['nomor_bobbin'],
                            'line_remarks'=> $v['line_remarks'],
                            'modified_at'=> $tanggal,
                            'modified_by'=> $user_id
                        );
                    $this->db->where('id', $v['id']);
                    $this->db->update('r_t_bpb_detail', $data);
                }
            }
        }

        $id_inv = $this->input->post('id_inv');
        $data = array(
                'no_bpb'=> $this->input->post('no_bpb'),
                'tanggal'=> $tgl_input,
                'm_cv_id'=>$this->input->post('m_cv_id'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('r_t_bpb', $data);

        $data_api = array(
                'id' => $this->input->post('id'),
                'no_bpb'=> $this->input->post('no_bpb'),
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
            );

        // $this->load->helper('target_url');

        // $ch = curl_init(target_url().'api/BPBAPI/bpbupdt');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($ch);
        // $result = json_decode($response, true);
        // curl_close($ch);

        // log_message('debug', 'updt = '.print_r($result));

        // if($result['status'] == 1){
        //     $this->load->model('Model_bpb');
        //     $update_details = $this->Model_bpb->list_bpb_detail_only($this->input->post('id'))->result_array();
        //     foreach ($update_details as $i => $value) {
        //         $update_details[$i]['reff'] = $update_details[$i]['id'];
        //         $update_details[$i]['bpb_id'] = $this->input->post('id');
        //         unset($update_details[$i]['id']);
        //     }

        //     $data_details = json_encode($update_details);

        //     log_message('debug', 'data details = '.print_r($data_details, 1));
        //     // die();

        //     $ch2 = curl_init(target_url().'api/BPBAPI/bpb_detail');
        //     curl_setopt($ch2, CURLOPT_POST, true);
        //     curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        //     curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_details);
        //     curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        //     $response2 = curl_exec($ch2);
        //     $result2 = json_decode($response2, true);
        //     curl_close($ch2);

        //     log_message('debug', print_r($result2,1));
        // } else {
        //     log_message('debug', 'failed update delete');
        // }

        if($this->db->trans_complete()){
            redirect(base_url('index.php/R_BPB/'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_SuratJalan/edit_surat_jalan/'.$this->input->post('id'));  
        }   
    }

    function view_bpb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "resmi/bpb/view_bpb";
            $data['header'] = $this->Model_bpb->show_header_bpb($id)->row_array();
            $data['jenis_bpb'] = $data['header']['jenis_bpb'];
            $this->load->model('Model_surat_jalan');
            $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
            $data['list_bpb_detail'] = $this->Model_bpb->list_bpb_detail($id)->result();
            $jenis = $data['header']['jenis_barang'];
            $this->load->model('Model_sales_order');
            if($jenis == 'FG'){
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();
            }else{
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_rsk()->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_BPB/');
        }
    }

    // function get_alamat(){
    //     $id = $this->input->post('id');
    //     $this->load->model('Model_sales_order');
    //     $customer = $this->Model_sales_order->get_alamat($id)->row_array();

    //     header('Content-Type: application/json');
    //     echo json_encode($customer); 
    // }

    function get_alamat(){
        $id = $this->input->post('id');
        $this->load->model('Model_surat_jalan');
        $customer = $this->Model_surat_jalan->get_alamat($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }

    function get_customer(){
        $id = $this->input->post('id');
        $this->load->model('Model_surat_jalan');
        $customer = $this->Model_surat_jalan->get_customer($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }

    function get_no_po(){
        $id = $this->input->post('id');
        $this->load->model('Model_purchase_order');
        $po = $this->Model_purchase_order->get_no_po($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($po); 
    }

    function print_bpb(){
        $id = $this->uri->segment(3);

        if(isset($id)){
            $this->load->model('Model_surat_jalan');
            $data['header'] = $this->Model_bpb->show_header_print_bpb($id)->row_array();
            $data['list_bpb_detail'] = $this->Model_bpb->list_bpb_detail($id)->result();
            if ($data['header']['jenis_bpb'] == "BPB RONGSOK") {
                $this->load->view('resmi/bpb/print_bpb_cs_cv', $data);
            } else if ($data['header']['jenis_bpb'] == "BPB FG") {
                $this->load->view('resmi/bpb/print_bpb_kmp_cv', $data);
            }
        } else {
            redirect('index.php'); 
        }
    }
}