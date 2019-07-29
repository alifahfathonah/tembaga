<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_SuratJalan extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_surat_jalan');
        $this->load->helper('target_url');
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

        $data['content']= "resmi/surat_jalan/index";
        if($group_id == 14 || $group_id == 15){
            $data['list_sj']= $this->Model_surat_jalan->list_sj_cv($reff_cv)->result();
        }else if($group_id == 16){
            $data['list_sj']= $this->Model_surat_jalan->list_sj_so()->result();
        }else{
            $data['list_sj']= $this->Model_surat_jalan->list_sj()->result();
        }
        $this->load->view('layout', $data);
    }

    function add_surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $jenis = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $reff_cv = $this->session->userdata('cv_id');
        $user_id = $this->session->userdata('user_id');      
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
        $data['group_id']  = $group_id;
        $data['user_id'] = $user_id;
        $data['jenis'] = $jenis;
        $data['content']= "resmi/surat_jalan/add_surat_jalan";
        if($jenis == 'matching'){
            $this->load->model('Model_matching');
            $this->load->model('Model_purchase_order');
            $data['header'] = $this->Model_surat_jalan->show_header_invoice($id)->row_array();
            $data['customer_list'] = $this->Model_purchase_order->customer_list($id)->result();
            $data['po_list'] = $this->Model_matching->po_free()->result();
        }else if($jenis == 'so'){
            $this->load->model('Model_so');
            $this->load->model('Model_matching');
            $data['header'] = $this->Model_so->show_header_so($id)->row_array();
            $data['customer_list'] = $this->Model_matching->cv_list()->result();
        }else if($jenis == 'po'){
            $this->load->model('Model_purchase_order');
            $data['header'] = $this->Model_purchase_order->show_header_po($id)->row_array();
            $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        }else if($jenis == 'sj_cv'){
            $this->load->model('Model_matching');
            $data['header'] = $this->Model_surat_jalan->show_header_bpb_cv($id)->row_array();
            $data['cv_list'] = $this->Model_surat_jalan->cv_list()->result();
            $data['po_list'] = $this->Model_matching->po_free_cv($reff_cv)->result();
        }else if($jenis == 'sj_customer'){
            $data['header'] = $this->Model_surat_jalan->show_header_sj_cv($id)->row_array();
            $data['po_list'] = $this->Model_surat_jalan->po_list($reff_cv)->result();
            $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        }
        // $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();

        $this->load->view('layout', $data);
    }

    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $reff_cv   = $this->session->userdata('cv_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Ym', strtotime($this->input->post('tanggal')));
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
                'jenis_bpb'=>'BPB DARI CUSTOMER',
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_bpb', $data);
            $sjr_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('id_invoice_resmi'));
            $this->db->update('r_t_invoice', array(
                'sjr_id'=> $sjr_id
            ));

            $this->load->model('Model_matching');
            $list_invoice = $this->Model_matching->list_invoice_detail($this->input->post('id_invoice_resmi'))->result();
            foreach ($list_invoice as $row) {
                $detail = array(
                    'bpb_resmi_id' => $sjr_id,
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
                    'flag_sj' => $sjr_id
                ));
            }
        }else if($jenis == 'so'){
            // $this->load->model('Model_m_numberings');
            // $code = $this->Model_m_numberings->getNumbering('SJ-KMP', $tgl_input);
            $data = array(
                'no_sj_resmi'=> "SJ-KMP.".$tgl_code.".".$this->input->post('no_surat_jalan'),
                'r_invoice_id'=>$this->input->post('id_invoice_resmi'),
                'r_so_id' => $this->input->post('so_id'),
                'r_po_id' => $this->input->post('po_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_cv_id'=>$this->input->post('m_customer_id'),
                'jenis_surat_jalan'=>'SURAT JALAN KMP KE CV',
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_surat_jalan', $data);
            $sjr_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('so_id'));
            $this->db->update('r_t_so', array(
                'sjr_id'=> $sjr_id
            ));

            $this->load->model('Model_so');
            $get_r_gudang_fg = $this->Model_so->get_r_gudang_fg($this->input->post('so_id'))->result();
            foreach ($get_r_gudang_fg as $v) {
                $this->db->where('id', $v->id);
                $this->db->update('r_t_gudang_fg', array('tanggal_keluar'=>$tgl_input));
            }

            $this->load->model('Model_so');
            $get_po = $this->input->post('get_po');
            $list_so = $this->Model_so->list_detail_so($get_po)->result();
            // print_r($list_so); die();
            foreach ($list_so as $row) {
                $detail = array(
                    'sj_resmi_id' => $sjr_id,
                    'so_detail_id' => $row->so_detail,
                    'jenis_barang_id' => $row->jenis_barang_ida,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'no_packing' => $row->no_packing,
                    'nomor_bobbin' => $row->nomor_bobbin,
                    'line_remarks' => $row->line_remarks
                );
                $this->db->insert('r_t_surat_jalan_detail', $detail);
            }
        }else if($jenis == 'po'){
            $data = array(
                'no_sj_resmi'=> $this->input->post('no_surat_jalan'),
                'r_invoice_id'=>$this->input->post('id_invoice_resmi'),
                'r_so_id' => $this->input->post('so_id'),
                'r_po_id' => $this->input->post('po_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_cv_id'=>$this->input->post('m_customer_id'),
                // 'jenis_surat_jalan'=>'SURAT JALAN CV KE KMP',
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'jenis_surat_jalan'=>'SURAT JALAN CV',
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_surat_jalan', $data);
            $sjr_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('po_id'));
            $this->db->update('r_t_po', array(
                'flag_sj'=> $sjr_id
            ));

            $this->load->model('Model_purchase_order');
            $list_po = $this->Model_purchase_order->load_detail_po_sj($this->input->post('po_id'))->result();
            foreach ($list_po as $row) {
                $detail = array(
                    'sj_resmi_id' => $sjr_id,
                    'po_detail_id' => $row->po_detail_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
// <<<<<<< HEAD:application/controllers/SuratJalan.php
//                     'bruto' => $row->bruto_tsjd,
//                     'netto' => $row->netto_tsjd,
//                     'no_packing' => $row->no_packing,
//                     'line_remarks' => $row->line_remarks
// =======
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'no_packing' => $row->no_packing,
                    'nomor_bobbin' => $row->nomor_bobbin,
                    'line_remarks' => $row->keterangan
                );
                $this->db->insert('r_t_surat_jalan_detail', $detail);
            }
        } else if($jenis == 'sj_cv'){
            $data = array(
                'no_sj_resmi'=> $this->input->post('no_surat_jalan'),
                'r_invoice_id'=>$this->input->post('id_invoice_resmi'),
                // 'r_so_id' => $this->input->post('so_id'),
                'r_po_id' => $this->input->post('flag_po'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_cv_id'=>$this->session->userdata('cv_id'),
                'jenis_surat_jalan'=>'SURAT JALAN CV KE KMP',
                'r_bpb_id'=>$this->input->post('r_bpb_id'),
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
            $this->db->insert('r_t_surat_jalan', $data);
            $sjr_id = $this->db->insert_id();

            $this->db->where('id', $this->input->post('r_bpb_id'));
            $this->db->update('r_t_bpb', array('r_sj_id' => $sjr_id));

            $this->db->where('id', $this->input->post('flag_po'));
            $this->db->update('r_t_po', array('flag_sj'=>$sjr_id));

            $this->load->model('Model_bpb');
            $sj_detail = $this->Model_bpb->list_bpb_detail($this->input->post('r_bpb_id'))->result();
            foreach ($sj_detail as $row) {
                $detail = array(
                    'sj_resmi_id' => $sjr_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'no_packing' => $row->no_packing,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'line_remarks' => $row->line_remarks
                );

                $this->db->insert('r_t_surat_jalan_detail', $detail);
            }

            $data_sj_api = array(
                'no_sj'=> $this->input->post('no_surat_jalan'),
                'po_id' => $this->input->post('flag_po'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'supplier_id'=>1,
                'jenis_surat_jalan'=>'SURAT JALAN KE SUPPLIER',
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'reff'=>$sjr_id,
                'bpb_id' => $this->input->post('r_bpb_id'),
            );

            $ch = curl_init(target_url_cv($reff_cv).'api/SuratJalanAPI/sj');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_sj_api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);

            log_message('debug', 'result sj = '.print_r($result,1));

            $this->load->model('Model_surat_jalan');
            $sj_detail_api = $this->Model_surat_jalan->get_sj_detail_only($sjr_id)->result_array();
            foreach ($sj_detail_api as $i => $value) {
                $sj_detail_api[$i]['reff'] = $sj_detail_api[$i]['id'];
                $sj_detail_api[$i]['sj_id'] = $result['id'];
                unset($sj_detail_api[$i]['id']);
                // unset($sj_detail_api[$i]['sj_id']);
            }

            $detail_api = json_encode($sj_detail_api);

            log_message('debug', 'sj detail = '.print_r($detail_api,1));

            $ch2 = curl_init(target_url_cv($reff_cv).'api/SuratJalanAPI/sj_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $detail_api);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));
            
        } else if($jenis == 'sj_customer'){
            
            $data = array(
                'no_sj_resmi'=> $this->input->post('no_surat_jalan'),
                // 'r_invoice_id'=>$this->input->post('id_invoice_resmi'),
                'r_so_id' => $this->input->post('so_id'),
                'r_po_id' => $this->input->post('po_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'jenis_surat_jalan'=>'SURAT JALAN CV KE CUSTOMER',
                'r_sj_id'=>$this->input->post('r_sj_id'),
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
            $this->db->insert('r_t_surat_jalan', $data);
            $sjr_id = $this->db->insert_id();

            $this->db->where('id', $this->input->post('po_id'));
            $this->db->update('r_t_po', array('flag_sj' => $sjr_id));

            $tanggal_bpb = date('Y-m-d', strtotime($this->input->post('tanggal_bpb')));

            $po_id = $this->db->query("select sj.r_po_id from r_t_bpb bpb
                left join r_t_surat_jalan sj on bpb.r_sj_id = sj.id
                where bpb.r_po_id = ".$this->input->post('po_id'))->row_array();

            $data_bpb = array(
                'no_bpb' => $this->input->post('no_bpb'),
                'r_po_id' => $po_id['r_po_id'],
                'tanggal'=> $tanggal_bpb,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'jenis_bpb'=>'BPB FG',
                'r_sj_id'=>$sjr_id,
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
            $this->db->insert('r_t_bpb', $data_bpb);
            $bpb_id = $this->db->insert_id();

            $this->db->where('id', $this->input->post('r_sj_id'));
            $this->db->update('r_t_surat_jalan', array('flag_sj_cv' => $sjr_id));

            $this->db->where('id', $sjr_id);
            $this->db->update('r_t_surat_jalan', array('r_bpb_id' => $bpb_id));

            $this->db->where('sjr_id', $this->input->post('r_sj_id'));
            $this->db->update('r_t_inv_jasa', array('flag_sjr'=>1));

            

            $sj_detail = $this->Model_surat_jalan->sj_detail($this->input->post('r_sj_id'))->result();
            foreach ($sj_detail as $row) {
                $detail = array(
                    'sj_resmi_id' => $sjr_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'no_packing' => $row->no_packing,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'nomor_bobbin' => $row->nomor_bobbin,
                    'line_remarks' => $row->line_remarks
                );

                $this->db->insert('r_t_surat_jalan_detail', $detail);

                $detail_bpb = array(
                    'bpb_resmi_id' => $bpb_id,
                    'sj_resmi_id' => $sjr_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'no_packing' => $row->no_packing,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'nomor_bobbin' => $row->nomor_bobbin,
                    'line_remarks' => $row->line_remarks
                );

                $this->db->insert('r_t_bpb_detail', $detail_bpb);
            }

            $data_sj_api = array(
                'no_sj'=> $this->input->post('no_surat_jalan'),
                'no_po' => $this->input->post('no_po'),
                'so_id' => $this->input->post('so_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'jenis_surat_jalan'=>'SURAT JALAN KE CUSTOMER',
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'reff'=>$sjr_id,
                'bpb_id'=>$bpb_id,
            );

            $ch = curl_init(target_url_cv($reff_cv).'api/SuratJalanAPI/sjcs');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_sj_api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);

            log_message('debug', 'sj = '.print_r($result,1));

            $this->load->model('Model_surat_jalan');
            $sj_detail_api = $this->Model_surat_jalan->get_sj_detail_only($sjr_id)->result_array();
            foreach ($sj_detail_api as $i => $value) {
                $sj_detail_api[$i]['reff'] = $sj_detail_api[$i]['id'];
                $sj_detail_api[$i]['sj_id'] = $result['id'];
                unset($sj_detail_api[$i]['id']);
                unset($sj_detail_api[$i]['sj_resmi_id']);
            }

            $detail_api = json_encode($sj_detail_api);

            log_message('debug', 'sj detail = '.print_r($detail_api,1));

            $ch2 = curl_init(target_url_cv($reff_cv).'api/SuratJalanAPI/sj_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $detail_api);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));


            $data_bpb_api = array(
                'no_bpb'=> $this->input->post('no_bpb'),
                'no_po'=> null,
                'po_id'=> $po_id['r_po_id'],
                'tanggal'=> $tanggal_bpb,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>0,
                'supplier_id'=>1,
                'jenis_bpb'=>'BPB FG',
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'reff'=>$bpb_id,
            );

            $ch = curl_init(target_url_cv($reff_cv).'api/BPBAPI/bpbs');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_bpb_api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);

            log_message('debug', 'bpb = '.print_r($result,1));

            $this->load->model('Model_bpb');
            $bpb_detail_api = $this->Model_bpb->list_bpb_detail_only($bpb_id)->result_array();
            foreach ($bpb_detail_api as $i => $value) {
                $bpb_detail_api[$i]['reff'] = $bpb_detail_api[$i]['id'];
                $bpb_detail_api[$i]['bpb_id'] = $result['id'];
                unset($bpb_detail_api[$i]['id']);
            }

            $detail_bpb_api = json_encode($bpb_detail_api);

            log_message('debug', 'bpb details = '.print_r($detail_bpb_api,1));

            $ch2 = curl_init(target_url_cv($reff_cv).'api/BPBAPI/bpb_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $detail_bpb_api);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));
        }

            if($this->db->trans_complete()){
                redirect('index.php/R_SuratJalan/edit_surat_jalan/'.$sjr_id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/R_SuratJalan/surat_jalan');  
            }
    }

    function edit_surat_jalan(){
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

            $data['content']= "resmi/surat_jalan/edit_surat_jalan";
            $data['header'] = $this->Model_surat_jalan->show_header_sj($id)->row_array();
            $this->load->model('Model_sales_order');
            if($data['header']['r_invoice_id']>0){
                $this->load->model('Model_matching');
                $this->load->model('Model_purchase_order');
                $data['customer_list'] = $this->Model_purchase_order->customer_list()->result();
                $data['cv_list'] = $this->Model_purchase_order->cv_list()->result();
                $data['po_list'] = $this->Model_matching->po_free_edit($id)->result();
            }else{
                $this->load->model('Model_purchase_order');
                $data['cv_list'] = $this->Model_purchase_order->cv_list()->result();
                $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            }
            $this->load->model('Model_so');
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();

            $data['list_sj_detail'] = $this->Model_surat_jalan->list_sj_detail($id)->result();
            $jenis = $data['header']['jenis_barang'];
            $this->load->model('Model_sales_order');
            if($jenis == 'FG'){
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();
            }else{
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_rsk()->result();
            }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SuratJalan/surat_jalan');
        }
    }

    function load_detail_fg(){
        $id = $this->input->post('id');
        $no = 1;
        $bruto = 0;
        $netto = 0;
        $table = '';
        $this->load->model('Model_surat_jalan');
        $details = $this->Model_surat_jalan->list_sj_detail($id)->result();
        foreach ($details as $key => $detail) {
            $table .= '<tr id="row_'.$detail->id.'">';
                $table .= '<td align="center">'.$no.'<input type="hidden" name="details['.$no.'][id]" value="'.$detail->id.'"></td>';
                $table .= '<td>'.$detail->jenis_barang.'<input type="hidden" name="details['.$no.'][barang_id]" value="'.$detail->jenis_barang_id.'"></td>';
                $table .= '<td>'.$detail->uom.'</td>';
                $table .= '<td align="right">'.number_format($detail->bruto,2,'.',',').'<input type="hidden" name="details['.$no.'][bruto]" value="'.$detail->bruto.'"></td>';
                $table .= '<td align="right">'.number_format($detail->netto,2,'.',',').'<input type="hidden" name="details['.$no.'][netto]" value="'.$detail->netto.'"></td>';
                $table .= '<td>'.$detail->no_packing.'<input type="hidden" name="details['.$no.'][no_packing]" value="'.$detail->no_packing.'"></td>';
                $table .= '<td>'.$detail->nomor_bobbin.'<input type="hidden" name="details['.$no.'][nomor_bobbin]" value="'.$detail->nomor_bobbin.'"></td>';
                $table .= '<td>'.$detail->line_remarks.'<input type="hidden" name="details['.$no.'][line_remarks]" value="'.$detail->line_remarks.'"></td>';
                $table .= '<td><a class="btn btn-circle btn-xs green" href="javascript:;" onclick="edit('.$detail->id.')" style="margin-bottom:4px"> &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a></td>';
            $table .= '</tr>';
            $no++;
            $bruto += $detail->bruto;
            $netto += $detail->netto;
        }
        $table .= '<tr>';
            $table .= '<td colspan="3" style="text-align: right;"><strong>Total :</strong></td>';
            $table .= '<td style="background-color: green; color: white;" align="right">'.number_format($bruto,2,'.',',').'</td>';
            $table .= '<td style="background-color: green; color: white;" align="right">'.number_format($netto,2,'.',',').'</td>';
            $table .= '<td colspan="3"></td>';
        $table .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($table);
    }

    function edit_detail_sj(){
        $id = $this->input->post('id');
        
        $return = [];
        $this->load->model('Model_surat_jalan');
        $return['data'] = $this->Model_surat_jalan->get_detail_sj($id)->row();

        header('Content-Type: application/json');
        echo json_encode($return);
    }

    function update_detail_sj(){
        $id = $this->input->post('id');
        $return = [];
        $return['input'] = $this->input->post();
        try {
            $this->db->update('r_t_surat_jalan_detail', [
                'jenis_barang_id' => $this->input->post('barang_id'),
                'bruto' => $this->input->post('bruto'),
                'netto' => $this->input->post('netto'),
                'no_packing' => $this->input->post('no_packing'),
                'nomor_bobbin' => $this->input->post('nomor_bobbin'),
                'line_remarks' => $this->input->post('line_remarks'),
            ], ['id' => $id]);
            $return['response'] = 'sukses';
        } catch (\Exception $e) {
            $return['response'] = 'gagal';
            $return['message'] = $e->getMessage();
        }

        header('Content-Type: application/json');
        echo json_encode($return);     
    }

    function update_surat_jalan(){
        $user_id   = $this->session->userdata('user_id');
        $reff_cv   = $this->session->userdata('cv_id');
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
                    $this->db->update('r_t_surat_jalan_detail', $data);
                }
            }

            if($this->input->post('flag_po') != 0){
                $this->db->where('id', $this->input->post('flag_po'));
                $this->db->update('r_t_po', array(
                    'flag_sj' => $this->input->post('id')
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
                    $this->db->update('r_t_surat_jalan_detail', $data);

                    $data_bpb_detail = array(
                            'jenis_barang_id'=> $v['barang_id'],
                            'no_packing'=> $v['no_packing'],
                            'bruto'=> $v['bruto'],
                            'netto'=> $v['netto'],
                            'nomor_bobbin'=> $v['nomor_bobbin'],
                            'line_remarks'=> $v['line_remarks'],
                            'modified_at'=> $tanggal,
                            'modified_by'=> $user_id
                        );
                    $this->db->where('sj_resmi_id', $this->input->post('id'));
                    $this->db->where('no_packing', $v['no_packing']);
                    $this->db->update('r_t_bpb_detail', $data_bpb_detail);
                }
            }
        }

        $id_inv = $this->input->post('id_inv');
        $data = array(
                'no_sj_resmi'=> $this->input->post('no_surat_jalan'),
                'tanggal'=> $tgl_input,
                // 'm_cv_id'=>$this->input->post('m_cv_id'),
                // 'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('r_t_surat_jalan', $data);

        $tanggal_bpb = date('Y-m-d', strtotime($this->input->post('tanggal_bpb')));
        $data_bpb = array(
                'no_bpb'=> $this->input->post('no_bpb'),
                'tanggal'=> $tanggal_bpb,
                // 'm_cv_id'=>$this->input->post('m_cv_id'),
                // 'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('r_sj_id',$this->input->post('id'));
        $this->db->update('r_t_bpb', $data_bpb);

        $data_sj_api = array(
                'id' => $this->input->post('id'),
                'no_sj'=> $this->input->post('no_surat_jalan'),
                'tanggal'=> $tgl_input,
                // 'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
            );

        $ch = curl_init(target_url_cv($reff_cv).'api/SuratJalanAPI/sjupdt');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_sj_api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        log_message('debug', 'updt = '.print_r($result, 1));

        if($result['status'] == 1){
            $update_sj_details = $this->Model_surat_jalan->get_sj_detail_only($this->input->post('id'))->result_array();
            foreach ($update_sj_details as $i => $value) {
                $update_sj_details[$i]['reff'] = $update_sj_details[$i]['id'];
                $update_sj_details[$i]['sj_id'] = $result['id'];
                unset($update_sj_details[$i]['id']);
            }

            $data_sj_details = json_encode($update_sj_details);

            log_message('debug', 'data details = '.print_r($data_sj_details, 1));

            $ch2 = curl_init(target_url_cv($reff_cv).'api/SuratJalanAPI/sj_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_sj_details);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));
        } else {
            log_message('debug', 'failed update delete');
        }

        $data_bpb_api = array(
                'id' => $this->input->post('bpb_id'),
                'no_bpb'=> $this->input->post('no_bpb'),
                'tanggal'=> $tgl_input,
                // 'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
            );

        $ch = curl_init(target_url_cv($reff_cv).'api/BPBAPI/bpbupdt');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_bpb_api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        log_message('debug', 'updt = '.print_r($result,1));

        if($result['status'] == 1){
            $this->load->model('Model_bpb');
            $update_details = $this->Model_bpb->list_bpb_detail_only($this->input->post('bpb_id'))->result_array();
            foreach ($update_details as $i => $value) {
                $update_details[$i]['reff'] = $update_details[$i]['id'];
                $update_details[$i]['bpb_id'] = $result['id'];
                unset($update_details[$i]['id']);
            }

            $data_details = json_encode($update_details);

            log_message('debug', 'data details = '.print_r($data_details, 1));

            $ch2 = curl_init(target_url_cv($reff_cv).'api/BPBAPI/bpb_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_details);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));
        } else {
            log_message('debug', 'failed update delete');
        }

        if($this->db->trans_complete()){
            redirect(base_url('index.php/R_SuratJalan/'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_SuratJalan/edit_surat_jalan/'.$this->input->post('id'));  
        }   
    }

    function view_surat_jalan(){
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

            $data['content']= "resmi/surat_jalan/view_surat_jalan";
            $data['header'] = $this->Model_surat_jalan->show_header_sj($id)->row_array();  
            $this->load->model('Model_sales_order');
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $this->load->model('Model_so');
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();

            $data['list_sj_detail'] = $this->Model_surat_jalan->list_sj_detail($id)->result();
            $jenis = $data['header']['jenis_barang'];
            $this->load->model('Model_sales_order');
            if($jenis == 'FG'){
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();
            }else{
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_rsk()->result();
            }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SuratJalan/surat_jalan');
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

    function get_cv(){
        $id = $this->input->post('id');
        $this->load->model('Model_surat_jalan');
        $customer = $this->Model_surat_jalan->get_cv($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }

    function print_surat_jalan(){
        $id = $this->uri->segment(3);

        if(isset($id)){
            $this->load->model('Model_surat_jalan');
            $this->load->helper('tanggal_indo');
            $data['header'] = $this->Model_surat_jalan->show_header_print_sj($id)->row_array();
            if ($data['header']['jenis_surat_jalan'] == "SURAT JALAN CUSTOMER KE CV") {
                $data['headerbpb'] = $this->Model_surat_jalan->show_header_print_bpb($id)->row_array();
            $data['list_sj_detail'] = $this->Model_surat_jalan->list_detail_print_sj($id)->result();
                $this->load->view('resmi/bpb/print_bpb_cs_cv', $data);
            } else if ($data['header']['jenis_surat_jalan'] == "SURAT JALAN CV KE KMP") {
            $data['list_sj_detail'] = $this->Model_surat_jalan->list_detail_print_sj($id)->result();
                $this->load->view('resmi/surat_jalan/print_sj_cv_kmp', $data);
            } else if ($data['header']['jenis_surat_jalan'] == "SURAT JALAN KMP KE CV") {
                $data['list_sj_detail'] = $this->Model_surat_jalan->list_detail_print_sj_fg($id)->result();
                $this->load->view('resmi/surat_jalan/print_sj_kmp_cv', $data);
            } else if ($data['header']['jenis_surat_jalan'] == "SURAT JALAN CV KE CUSTOMER") {
            $data['list_sj_detail'] = $this->Model_surat_jalan->list_detail_print_sj($id)->result();
                $data['header_cv_cs'] = $this->Model_surat_jalan->show_header_print_sj_cv_cs($id)->row_array();
                $this->load->view('resmi/surat_jalan/print_sj_cv_cust', $data);
            }
        } else {
            redirect('index.php'); 
        }
    }
}