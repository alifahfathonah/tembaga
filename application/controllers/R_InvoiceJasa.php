<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_InvoiceJasa extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_invoice_jasa');
        $this->load->helper('target_url');
    }

    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');   
        $reff_cv = $this->session->userdata('cv_id');     
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/invoice_jasa/index";
        if ($group_id == 9) {
            $data['list_data']= $this->Model_invoice_jasa->list_inv()->result();    
        } elseif ($group_id == 14) {
            $data['list_data']= $this->Model_invoice_jasa->list_inv_for_cv($reff_cv)->result(); 
        } elseif ($group_id == 16) {
            $data['list_data']= $this->Model_invoice_jasa->list_inv_for_kmp()->result();
        }
        

        $this->load->view('layout', $data);
    }

    function add(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');  
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');      
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
        $data['group_id']  = $group_id;
        $data['user_id'] = $user_id;
        $data['content']= "resmi/invoice_jasa/add";
            $this->load->model('Model_surat_jalan');
            $data['header'] = $this->Model_surat_jalan->show_header_sj($id)->row_array();
        $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();
        $this->load->model('Model_invoice_jasa');
        $data['bank_list'] = $this->Model_invoice_jasa->bank_list()->result();

        $this->load->view('layout', $data);
    }

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));       
        $tgl_jth_tempo = date('Y-m-d', strtotime($this->input->post('tgl_jth_tempo')));    
        $tgl_inv = date('Ym', strtotime($this->input->post('tanggal')));

        // $this->load->model('Model_m_numberings');
        // $code = $this->Model_m_numberings->getNumbering('INV-KMP', $tgl_input);
        $code = 'INV-KMP.'.$tgl_inv.'.'.$this->input->post('no_inv_jasa');
        
        $this->db->trans_start();

            $data = array(
                'no_invoice_jasa'=> $code,
                'term_of_payment' => $this->input->post('term_of_payment'),
                'jatuh_tempo' => $tgl_jth_tempo,
                'sjr_id' => $this->input->post('id_sj'),
                'r_t_so_id' => $this->input->post('id_so'),
                'r_t_po_id' => $this->input->post('id_po'),
                'flag_sjr' => 0,
                'tanggal'=> $tgl_input,
                'cv_id'=>$this->input->post('customer_id'),
                'jenis_invoice'=>'INVOICE KMP KE CV',
                'bank_id'=> $this->input->post('bank_id'),
                'nama_direktur'=> $this->input->post('nama_direktur'),
                'diskon'=> str_replace(',', '', $this->input->post('diskon')),
                'cost'=> str_replace(',', '', $this->input->post('add_cost')),
                'materai'=> str_replace(',', '', $this->input->post('materai')),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_inv_jasa', $data);
            $inv_jasa_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('id_sj'));
            $this->db->update('r_t_surat_jalan', array(
                'r_inv_jasa_id'=> $inv_jasa_id
            ));

            $get_po = $this->Model_invoice_jasa->get_po($this->input->post('id_sj'))->row_array();
            // $pod_list = $this->Model_invoice_jasa->pod_list($get_po['id'])->result();
            // $list_sj = $this->Model_invoice_jasa->list_sj_so($this->input->post('id_sj'))->result();
            //$list_sj = $this->Model_invoice_jasa->list_sj_so_v2($this->input->post('id_sj'),$get_po['id'])->result();
            $list_sj = $this->Model_invoice_jasa->list_sj_so($this->input->post('id_sj'))->result();
            $nilai_invoice = 0;
            $data_detail = [];
            foreach ($list_sj as $i => $row) {
            	$total_amount = $row->netto * $row->amount;
                $detail = array(
                    'inv_jasa_id' => $inv_jasa_id,
                    'so_detail_id' => $row->so_detail_id,
                    'po_detail_id' => $row->po_detail_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'amount' => $row->amount,
                    'total_amount' => $total_amount,
                    'line_remarks' => $row->line_remarks
                );
                $nilai_invoice += $total_amount;
                $this->db->insert('r_t_inv_jasa_detail', $detail);
                $id_detail = $this->db->insert_id();
                $data_detail[$i] = array_merge($detail, array('reff2'=>$id_detail));
            }

            $total_invoice = ($nilai_invoice-str_replace(',', '', $this->input->post('diskon'))-str_replace(',', '', $this->input->post('add_cost')))*110/100 + str_replace(',', '', $this->input->post('materai'));
            
            $total_invoice = round($total_invoice,0);

            $this->db->where('id', $inv_jasa_id);
            $this->db->update('r_t_inv_jasa', array(
                'nilai_invoice' => $total_invoice
            ));

             //API START//
                $this->load->helper('target_url');

                $reff_inv = array('reff2' => $inv_jasa_id, 'idkmp'=>$this->input->post('idkmp'), 'nilai_invoice'=>$total_invoice);
                // $data_post['nomor_spb'] = $num;
                $data_post['header'] = array_merge($data, $reff_inv);
                $data_post['detail'] = $data_detail;

                $post = json_encode($data_post);

                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/ReffAPI/inv');
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
                    $this->db->where('id', $inv_jasa_id);
                    $this->db->update('r_t_inv_jasa', array('api'=>1));
                }

            //API END//

            if($this->db->trans_complete()){
                redirect('index.php/R_InvoiceJasa/edit_inv_jasa/'.$inv_jasa_id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/R_InvoiceJasa/');  
            }
    }

    function edit_inv_jasa(){
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

            $data['content']= "resmi/invoice_jasa/edit";
            $data['header'] = $this->Model_invoice_jasa->show_header_inv_jasa($id)->row_array();
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();
            $this->load->model('Model_sales_order');
            $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();
            $data['bank_list'] = $this->Model_invoice_jasa->bank_list()->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SuratJalan/surat_jalan');
        }
    }

    function update(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_jth_tempo = date('Y-m-d', strtotime($this->input->post('tgl_jth_tempo')));
        $diskon = str_replace(',', '', $this->input->post('diskon'));
        $cost = str_replace(',', '', $this->input->post('add_cost'));
        $materai = str_replace(',', '', $this->input->post('materai'));

        $this->db->trans_start();
        $jenis = $this->input->jenis_barang;

            $details = $this->input->post('details');

            $total = 0;
            foreach ($details as $v) {
                
                $data = array(
                        'inv_jasa_id'=> $this->input->post('id'),
                        'jenis_barang_id'=> $v['barang_id'],
                        'qty'=> $v['qty'],
                        'bruto'=> str_replace(',', '', $v['bruto']),
                        'netto'=> str_replace(',', '', $v['netto']),
                        'amount'=> str_replace(',', '', $v['amount']),
                        'total_amount'=> str_replace(',', '', $v['total_amount']),
                        'line_remarks'=> $v['line_remarks'],
                        'modified_at'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $total += str_replace(',', '', $v['total_amount']);
                $this->db->where('id', $v['id']);
                $this->db->update('r_t_inv_jasa_detail', $data);
            }

            $nilai_invoice = (($total - $diskon - $cost) * 110 / 100) + $materai;
            // echo $nilai_invoice;die();

            // $this->db->delete('r_t_inv_jasa_detail', ['inv_jasa_id' => $this->input->post('id')]);
            // foreach ($details as $v) {
                
            //     $data = array(
            //             'inv_jasa_id'=> $this->input->post('id'),
            //             'jenis_barang_id'=> $v['barang_id'],
            //             'qty'=> $v['qty'],
            //             'bruto'=> str_replace(',', '', $v['bruto']),
            //             'netto'=> str_replace(',', '', $v['netto']),
            //             'amount'=> str_replace(',', '', $v['amount']),
            //             'total_amount'=> str_replace(',', '', $v['total_amount']),
            //             'line_remarks'=> $v['line_remarks'],
            //             'modified_at'=> $tanggal,
            //             'modified_by'=> $user_id
            //         );
            //     $this->db->insert('r_t_inv_jasa_detail', $data);
            //     $total_amount = str_replace(',', '', $v['total_amount']);
            //     $nilai_invoice += (int)$total_amount;
            // }

            $data = array(
                    'no_invoice_jasa'=> $this->input->post('no_inv_jasa'),
                    'nilai_invoice'=> $nilai_invoice,
                    'tanggal'=> $tgl_input,
                    'term_of_payment' => $this->input->post('term_of_payment'),
                    'jatuh_tempo' => $tgl_jth_tempo,
                    'bank_id' => $this->input->post('bank_id'),
                    'nama_direktur' => $this->input->post('nama_direktur'),
                    'diskon' => $diskon,
                    'cost' => $cost,
                    'materai' => $materai,
                    'remarks'=>$this->input->post('remarks'),
                    'modified_at'=> $tanggal,
                    'modified_by'=> $user_id
                );
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('r_t_inv_jasa', $data);

                $data_post['id'] = $this->input->post('id');                
                $data_post['master'] = $data;
                $data_post['detail'] = $details;

                $detail_post = json_encode($data_post);
                // print_r($detail_post);
                // die();

                $ch = curl_init(target_url().'api/ReffAPI/inv_update');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();

        if($this->db->trans_complete()){
            redirect(base_url('index.php/R_InvoiceJasa/edit_inv_jasa/'.$this->input->post('id')));
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_InvoiceJasa/edit_inv_jasa/'.$this->input->post('id'));  
        }   
    }

    function delete_invoice_jasa(){
        $user_id  = $this->session->userdata('user_id');
        $id = $this->uri->segment(3);
        $tanggal  = date('Y-m-d h:m:s');

        // $this->load->model('Model_m_numberings');
        // $code = $this->Model_m_numberings->getNumbering('INV-KMP', $tgl_input);
        $code = 'INV-KMP.'.$tgl_inv.'.'.$this->input->post('no_inv_jasa');
        
        $this->db->trans_start();

            $this->db->where('id', $id);
            $this->db->delete('r_t_inv_jasa');

            $this->db->where('inv_jasa_id', $id);
            $this->db->delete('r_t_inv_jasa_detail');

            $this->db->where('r_inv_jasa_id', $id);
            $this->db->update('r_t_surat_jalan', array(
                'r_inv_jasa_id'=> 0
            ));

            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Data Invoice berhasil di hapus!');
                redirect('index.php/R_InvoiceJasa/');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/R_InvoiceJasa/');  
            }
    }

    function view_invoice_jasa(){
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
            $data['judul']     = "Matching";
            $data['content']   = "resmi/invoice_jasa/view_invoice_jasa";

            $data['header'] = $this->Model_invoice_jasa->show_header_inv_jasa($id)->row_array();
            $data['jenis_invoice'] = $data['header']['jenis_invoice'];
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_InvoiceJasa');
        }
    }

    function add_inv_cust(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');  
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');      
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
        $data['group_id']  = $group_id;
        $data['user_id'] = $user_id;
        $data['content']= "resmi/invoice_jasa/add_inv_cust";
            $this->load->model('Model_surat_jalan');
            $data['header'] = $this->Model_surat_jalan->show_header_sj($id)->row_array();
        $data['customer_list'] = $this->Model_surat_jalan->customer_list()->result();
        $data['tipe_kendaraan_list'] = $this->Model_surat_jalan->tipe_kendaraan_list()->result();

        $this->load->view('layout', $data);
    }

    function save_inv_cust(){
        $user_id  = $this->session->userdata('user_id');
        $reff_cv   = $this->session->userdata('cv_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));    
        $tgl_jth_tempo = date('Y-m-d', strtotime($this->input->post('tgl_jth_tempo')));        
        
        $this->db->trans_start();

            $data = array(
                'no_invoice_jasa'=> $this->input->post('no_inv_jasa'),
                'sjr_id' => $this->input->post('id_sj'),
                'term_of_payment' => $this->input->post('term_of_payment'),
                'jatuh_tempo' => $tgl_jth_tempo,
                'r_t_so_id' => $this->input->post('id_so'),
                'r_t_po_id' => $this->input->post('id_po'),
                'flag_sjr' => 1,
                'jenis_invoice'=>'INVOICE CV KE CUSTOMER',
                'tanggal'=> $tgl_input,
                'customer_id'=>$this->input->post('customer_id'),
                'remarks'=>$this->input->post('remarks'),
                'cv_id'=>$this->session->userdata('cv_id'),
                'reff_cv'=>$this->session->userdata('cv_id'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('r_t_inv_jasa', $data);
            $inv_jasa_id = $this->db->insert_id();

            $this->db->where('id',$this->input->post('id_sj'));
            $this->db->update('r_t_surat_jalan', array(
                'r_inv_jasa_id'=> $inv_jasa_id
            ));

            $get_po = $this->Model_invoice_jasa->get_po_for_cust($this->input->post('id_sj'))->row_array();
            // $pod_list = $this->Model_invoice_jasa->pod_list($get_po['id'])->result();
            // $list_sj = $this->Model_invoice_jasa->list_sj_so($this->input->post('id_sj'))->result();
            $list_sj = $this->Model_invoice_jasa->list_sj_so_v2($this->input->post('id_sj'),$get_po['id'])->result();
            foreach ($list_sj as $row) {
                $total_amount = $row->netto * $row->amount;
                $detail = array(
                    'inv_jasa_id' => $inv_jasa_id,
                    'so_detail_id' => $row->so_detail_id,
                    'po_detail_id' => $row->po_detail_id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'qty' => $row->qty,
                    'bruto' => $row->bruto,
                    'netto' => $row->netto,
                    'amount' => $row->amount,
                    'total_amount' => $total_amount,
                    'line_remarks' => $row->line_remarks
                );
                $this->db->insert('r_t_inv_jasa_detail', $detail);
            }

            $data_api = array(
                'no_inv'=> $this->input->post('no_inv_jasa'),
                'term_of_payment' => $this->input->post('term_of_payment'),
                'jatuh_tempo' => $tgl_jth_tempo,
                'sj_id' => $this->input->post('id_sj'),
                'no_po' => $this->input->post('no_po'),
                'flag_sj' => 1,
                'tanggal'=> $tgl_input,
                'customer_id'=>$this->input->post('customer_id'),
                'jenis_invoice'=>'INVOICE KE CUSTOMER',
                'remarks'=>$this->input->post('remarks'),
                'reff' => $inv_jasa_id
            );

            $ch = curl_init(target_url_cv($reff_cv).'api/InvoiceAPI/inv');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);

            log_message('debug', print_r($result,1));

            $inv_jasa_detail_api = $this->Model_invoice_jasa->get_inv_jasa_detail_only($inv_jasa_id)->result_array();
            foreach ($inv_jasa_detail_api as $i => $value) {
                $inv_jasa_detail_api[$i]['reff'] = $inv_jasa_detail_api[$i]['id'];
                $inv_jasa_detail_api[$i]['inv_id'] = $result['id'];
                unset($inv_jasa_detail_api[$i]['id']);
            }

            $detail_api = json_encode($inv_jasa_detail_api);

            // print_r($detail_api);

            $ch2 = curl_init(target_url_cv($reff_cv).'api/InvoiceAPI/inv_detail');
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $detail_api);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            $response2 = curl_exec($ch2);
            $result2 = json_decode($response2, true);
            curl_close($ch2);

            log_message('debug', print_r($result2,1));

            if($this->db->trans_complete()){
                redirect('index.php/R_InvoiceJasa/edit_inv_cust/'.$inv_jasa_id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/R_InvoiceJasa/');  
            }
    }

    function edit_inv_cust(){
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

            $data['content']= "resmi/invoice_jasa/edit_inv_cust";
            $data['header'] = $this->Model_invoice_jasa->show_header_inv_jasa($id)->row_array();
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();
            $this->load->model('Model_sales_order');
            $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_fg()->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SuratJalan/surat_jalan');
        }
    }

    function update_inv_cust(){
        $user_id   = $this->session->userdata('user_id');
        $reff_cv   = $this->session->userdata('cv_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_jth_tempo = date('Y-m-d', strtotime($this->input->post('tgl_jth_tempo')));
        $nilai_invoice = 0;

        $this->db->trans_start();
        $jenis = $this->input->jenis_barang;

            $details = $this->input->post('details');
            foreach ($details as $v) {
                if($v['id']!=''){
                    $data = array(
                            'jenis_barang_id'=> $v['barang_id'],
                            'bruto'=> str_replace(',', '', $v['bruto']),
                            'netto'=> str_replace(',', '', $v['netto']),
                            'amount'=> str_replace(',', '', $v['amount']),
                            'total_amount'=> str_replace(',', '', $v['total_amount']),
                            'line_remarks'=> $v['line_remarks'],
                            'modified_at'=> $tanggal,
                            'modified_by'=> $user_id
                        );
                    $this->db->where('id', $v['id']);
                    $this->db->update('r_t_inv_jasa_detail', $data);

                    $total_amount = str_replace(',', '', $v['total_amount']);
                    $nilai_invoice += (int)$total_amount;
                }
            }
            
        $data = array(
                'no_invoice_jasa'=> $this->input->post('no_inv_jasa'),
                'nilai_invoice'=>$nilai_invoice,
                'tanggal'=> $tgl_input,
                'term_of_payment' => $this->input->post('term_of_payment'),
                'jatuh_tempo'=> $tgl_jth_tempo,
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('r_t_inv_jasa', $data);

        $data_api = array(
                'id' => $this->input->post('id'),
                'no_inv'=> $this->input->post('no_inv_jasa'),
                'nilai_invoice'=>$nilai_invoice,
                'tanggal'=> $tgl_input,
                'term_of_payment' => $this->input->post('term_of_payment'),
                'jatuh_tempo'=> $tgl_jth_tempo,
                'remarks'=>$this->input->post('remarks'),
            );

        $ch = curl_init(target_url_cv($reff_cv).'api/InvoiceAPI/invupdt');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        log_message('debug', 'updt = '.print_r($result,1));

        if($result['status'] == 1){
            $update_details = $this->Model_invoice_jasa->get_inv_jasa_detail_only($this->input->post('id'))->result_array();
            foreach ($update_details as $i => $value) {
                $update_details[$i]['reff'] = $update_details[$i]['id'];
                $update_details[$i]['inv_id'] = $result['id'];
                unset($update_details[$i]['id']);
            }

            $data_details = json_encode($update_details);

            log_message('debug', 'data details = '.print_r($data_details, 1));

            $ch2 = curl_init(target_url_cv($reff_cv).'api/InvoiceAPI/inv_detail');
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
            redirect(base_url('index.php/R_InvoiceJasa/'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_InvoiceJasa/edit_inv_jasa/'.$this->input->post('id'));  
        }   
    }

    function print_invoice(){
        $id = $this->uri->segment(3);
        $this->load->helper('terbilang_d_helper');
        $this->load->helper('tanggal_indo');
        if($id){        
            $data['header'] = $this->Model_invoice_jasa->show_header_print_inv_jasa($id)->row_array();
            $data['myDetail'] = $this->Model_invoice_jasa->show_detail_inv_jasa($id)->result();
            // print_r($data['myDetail']); die();

            if($data['header']['jenis_invoice'] == "INVOICE KMP KE CV"){
                $this->load->view('resmi/invoice_jasa/print_inv_kmp_cv', $data);    
            }else if($data['header']['jenis_invoice'] == "INVOICE CV KE CUSTOMER"){
                $this->load->view('resmi/invoice_jasa/print_inv_cv_cs', $data);
            }
            
        }else{
            redirect('index.php'); 
        }
    }

    function update_all(){
        $details = $this->db->query('SELECT inv_jasa_id, SUM(total_amount) AS total_amount_sum FROM r_t_inv_jasa_detail GROUP BY inv_jasa_id')->result();
        foreach ($details as $key => $detail) {
            echo "detail ".$detail->inv_jasa_id."<br>";
            echo "detail ".$detail->total_amount_sum."<br>";
            $header = $this->db->query('SELECT *FROM r_t_inv_jasa WHERE id = '.$detail->inv_jasa_id)->row();
            if (!empty($header)) {
                echo "header ".$header->id."<br>";
                echo "header ".$header->no_invoice_jasa."<br>";
                $nilai_invoice = (($detail->total_amount_sum - $header->diskon - $header->cost) * 110 / 100) + $header->materai;
                echo "nilai invoice ".$nilai_invoice."<br>";
                if ($this->db->update('r_t_inv_jasa', ['nilai_invoice' => $nilai_invoice], ['id' => $detail->inv_jasa_id])) {
                    echo "data berhasil diupdate<br>";
                } else {
                    echo "data gagal diupdate<br>";
                }
            }
        }
        // $headers = $this->db->query('SELECT *FROM r_t_inv_jasa')->result();
        // foreach ($headers as $key => $header) {
        //     echo $header->id."<br>";
        //     echo $header->no_invoice_jasa."<br>";
        // }
    }
}