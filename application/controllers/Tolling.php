<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tolling extends CI_Controller{
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

        $data['content']= "tolling_titipan/index";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->so_list($ppn)->result();

        $this->load->view('layout', $data);
    }
    
    function add(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');       
        $ppn = $this->session->userdata('user_ppn');   
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add";
        
        $this->load->model('Model_tolling_titipan');
        $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
        $this->load->model('Model_sales_order');
        $data['no_so_kmp'] = $this->Model_sales_order->get_last_so($ppn)->row_array();
        if($ppn==1){
            $data['no_so_cv'] = $this->Model_sales_order->get_last_so_cv()->row_array();
        }
        // $data['marketing_list'] = $this->Model_tolling_titipan->marketing_list()->result();
        $this->load->view('layout', $data);
    }
    
    function get_contact_name(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->get_contact_name($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    function get_cp(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $barang= $this->Model_tolling_titipan->get_cp($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }
    
    function save(){
        $user_id = $this->session->userdata('user_id');
        $tanggal = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_so = date('Ym', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Y-m-d', strtotime($this->input->post('tanggal_po')));
        $user_ppn = $this->session->userdata('user_ppn');
        
        $this->db->trans_start();

        $this->load->model('Model_m_numberings');
        if($user_ppn == 1){
            $code = 'SO-KMP.'.$tgl_so.'.'.$this->input->post('no_so');
        }else{
            $code = $this->Model_m_numberings->getNumbering('SO', $tgl_input); 
        }
        
        if($code){        
            $data = array(
                'no_sales_order'=> $code,
                'tanggal'=> $tgl_input,
                'flag_tolling'=> 1,
                'flag_ppn'=>$user_ppn,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'keterangan' => $this->input->post('keterangan'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('sales_order', $data);
            $so_id = $this->db->insert_id();
            if($this->input->post('jenis_barang') == 'FG'){
                if($user_ppn==1){
                    $num = 'SPB-T.'.$tgl_so.'.'.$this->input->post('no_so');
                }else{
                    $num = $this->Model_m_numberings->getNumbering('SPB-FG', $tgl_input); 
                }
                $dataC = array(
                    'no_spb'=> $num,
                    'jenis_spb'=> 6,//JENIS SPB SO
                    'tanggal'=> $tgl_input,
                    'keterangan'=>'TOLLING '.$code,
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id
                );
                $this->db->insert('t_spb_fg', $dataC);
                $insert_id = $this->db->insert_id();
            }else{
                if($user_ppn==1){
                    $num = 'SPB-SO.'.$tgl_so.'.'.$this->input->post('no_so');
                }else{
                    $num = $this->Model_m_numberings->getNumbering('SPB-WIP', $tgl_input); 
                }
                $dataC = array(
                    'no_spb_wip'=> $num,
                    'tanggal'=> $tgl_input,
                    'flag_produksi'=> 6,//JENIS SPB SO
                    'keterangan'=>'TOLLING '.$code,
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );
                $this->db->insert('t_spb_wip', $dataC);
                $insert_id = $this->db->insert_id();
            }

            $t_data = array(
                'alias'=>$this->input->post('alias'),
                'so_id'=>$so_id,
                'no_po'=>$this->input->post('no_po'),
                'term_of_payment'=>$this->input->post('term_of_payment'),
                'tgl_po'=>$tgl_po,
                'no_spb'=>$insert_id,
                'jenis_barang'=> $this->input->post('jenis_barang'),
                'currency'=>$this->input->post('currency'),
                'kurs'=>$this->input->post('kurs'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('t_sales_order', $t_data);
            $tso_id = $this->db->insert_id();

            if($user_ppn == 1){
                $this->load->helper('target_url');

                $reff_so = array('reff1' => $so_id);
                $reff_tso = array('reff1' => $tso_id);
                $reff_spb = array('reff1' => $insert_id);
                $data_post['category'] = $this->input->post('jenis_barang');
                $data_post['so'] = array_merge($data, $reff_so);
                $data_post['tso'] = array_merge($t_data, $reff_tso);
                $data_post['spb'] = array_merge($dataC, $reff_spb);

                $post = json_encode($data_post);

                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/SalesOrderAPI/so');
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
                    $this->db->where('id', $so_id);
                    $this->db->update('sales_order', array('api'=>1));
                }
            }

            if($this->db->trans_complete()){
                redirect('index.php/Tolling/edit/'.$so_id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Tolling');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Tolling');
        }
    }    

    function view(){
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

            $data['content']= "tolling_titipan/view";
            $this->load->model('Model_tolling_titipan');
            $this->load->model('Model_sales_order');

            $data['header'] = $this->Model_sales_order->show_header_so($id)->row_array();
            $data['detail'] = $this->Model_tolling_titipan->load_detail_edit($id)->result(); 
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }
    
    function edit(){
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

            $data['content']= "tolling_titipan/edit";
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_so($id)->row_array();  
            $jenis = $data['header']['jenis_barang'];          
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
            // $data['marketing_list'] = $this->Model_tolling_titipan->marketing_list()->result();
                $data['list_barang'] = $this->Model_tolling_titipan->jenis_barang($jenis)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Y-m-d', strtotime($this->input->post('tanggal_po')));
        $data = array(
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'keterangan'=>$this->input->post('keterangan'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sales_order', $data);

        $t_data =  array(
            'term_of_payment' => $this->input->post('term_of_payment'),
            'no_po' => $this->input->post('no_po'),
            'tgl_po' => $tgl_po
        );

        $this->db->where('so_id', $this->input->post('id'));
        $this->db->update('t_sales_order',$t_data);

            if($user_ppn == 1){
                $this->load->helper('target_url');
                $this->load->model('Model_sales_order');
                $jenis = $this->input->post('jenis_barang');
                // if($jenis == 'FG'){
                //     $data_post['detail_spb'] =$this->Model_sales_order->spb_fg_detail_only($this->input->post('no_spb'))->result();
                // }else if($jenis == 'WIP'){
                //     $data_post['detail_spb'] =$this->Model_sales_order->spb_wip_detail_only($this->input->post('no_spb'))->result();
                // }else if($jenis == 'RONGSOK'){
                //     $data_post['detail_spb'] =$this->Model_sales_order->spb_rsk_detail_only($this->input->post('no_spb'))->result();
                // }else if($jenis == 'AMPAS'){
                //     $data_post['detail_spb'] =$this->Model_sales_order->spb_ampas_detail_only($this->input->post('no_spb'))->result();
                // }

                $data_post['category'] = $jenis;
                $data_post['so_id'] = $this->input->post('id');
                $data_post['tso_id'] = $this->input->post('id');
                $data_post['so'] = $data;
                $data_post['tso'] = $t_data;
                $data_post['details'] =$this->Model_sales_order->load_detail_only($this->input->post('id'))->result();

                $post = json_encode($data_post);

                // print_r($post);
                // die();

                $ch = curl_init(target_url().'api/SalesOrderAPI/so_detail');
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
        
        $this->session->set_flashdata('flash_msg', 'Data sales order berhasil disimpan');
        redirect('index.php/Tolling');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        $bruto = 0;
        $netto = 0;
        
        $this->load->model('Model_tolling_titipan'); 
        $myDetail = $this->Model_tolling_titipan->load_detail_edit($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>('.$row->kode.') '.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,3,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->netto,2,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,2,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.','.$row->no_spb_detail.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->total_amount;
            $netto += $row->netto;
            $no++;
        }    
        
        $tabel .= '<tr>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,2,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,2,',','.').'</strong></td>';
        $tabel .= '<td></td>';
        $tabel .= '</tr>';
       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $rongsok= $this->Model_tolling_titipan->get_uom($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }
    
    function save_detail(){
        $return_data = array();
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        // $netto = str_replace('.', '',$this->input->post('netto'));
        $netto = str_replace(',', '',$this->input->post('netto'));

        if($this->input->post('jb') == 'FG'){
            $dataC = array(
                't_spb_fg_id'=>$this->input->post('id_spb'),
                'tanggal'=>$tanggal,
                'jenis_barang_id'=>$this->input->post('jenis_barang'),
                'uom'=>$this->input->post('uom'),
                'netto'=> $netto,
                'keterangan'=>'SO TOLLING'
            );
            $this->db->insert('t_spb_fg_detail', $dataC);
            $insert_id = $this->db->insert_id();
        }else{
            $dataC = array(
                't_spb_wip_id'=> $this->input->post('id_spb'),
                'tanggal'=> $tanggal,
                'jenis_barang_id'=> $this->input->post('jenis_barang'),
                'uom'=> $this->input->post('uom'),
                'qty'=>$netto,
                'berat'=> $netto,
                'keterangan'=> 'SO TOLLING'
            );
            $this->db->insert('t_spb_wip_detail', $dataC);
            $insert_id = $this->db->insert_id();
        }
        
        if($this->db->insert('t_sales_order_detail', array(
            't_so_id'=>$this->input->post('id'),
            'no_spb_detail'=> $insert_id,
            'jenis_barang_id'=>$this->input->post('jenis_barang'),
            'netto'=>$netto,
            'amount'=>str_replace(',', '', $this->input->post('harga')),
            'total_amount'=>str_replace(',', '', $this->input->post('total_harga'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item rongsok! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $id = $this->uri->segment(3);

        $this->db->trans_start();

        $get = $this->db->query("select so_id, no_spb, jenis_barang from t_sales_order
                where id =".$id)->row_array();

        $this->db->where('id', $id);
        $this->db->delete('t_sales_order');

        $this->db->where('id', $get['so_id']);
        $this->db->delete('sales_order');

        if($get['jenis_barang'] == 'FG'){
            $this->db->where('id', $get['no_spb']);
            $this->db->delete('t_spb_fg');
        }else if($get['jenis_barang'] == 'WIP'){
            $this->db->where('id', $get['no_spb']);
            $this->db->delete('t_spb_wip');
        }else if($get['jenis_barang'] == 'RONGSOK'){
            $this->db->where('id', $get['no_spb']);
            $this->db->delete('spb');
        }else if($get['jenis_barang'] == 'AMPAS'){
            $this->db->where('id', $get['no_spb']);
            $this->db->delete('t_spb_ampas');
        }

            if($user_ppn == 1){
                $this->load->helper('target_url');
                $url = target_url().'api/SalesOrderAPI/so_del/id/'.$id;
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
            }

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Sales Order berhasil di hapus');
            redirect('index.php/Tolling');
        }else{
            $this->session->set_flashdata('flash_msg', 'Sales order gagal dihapus');
            redirect('index.php/Tolling');
        }
    }

    function delete_detail(){
        $id = $this->input->post('id');
        $id_spb = $this->input->post('id_spb');
        $return_data = array();

        if($this->input->post('jb') == 'FG'){
            $this->db->where('id', $id_spb);
            $this->db->delete('t_spb_fg_detail');
        }else{
            $this->db->where('id', $id_spb);
            $this->db->delete('t_spb_wip_detail');
        }

        $this->db->where('id', $id);
        if($this->db->delete('t_sales_order_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');   
        $user_ppn = $this->session->userdata('user_ppn');     
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/matching";
        $this->load->model('Model_tolling_titipan');
        $data['po_list'] = $this->Model_tolling_titipan->get_po_list($user_ppn)->result();
        $data['po_list_rsk'] = $this->Model_tolling_titipan->get_po_list_rsk($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function proses_matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $po_id = $this->uri->segment(3);
        
        $data['content']= "tolling_titipan/proses_matching";
        $this->load->model('Model_tolling_titipan');
        $this->load->model('Model_beli_fg');
        $data['header_po'] = $this->Model_tolling_titipan->show_header_po($po_id)->row_array();
        $data['details_po'] = $this->Model_beli_fg->show_detail_po($po_id)->result();

        $dtt_app = $this->Model_tolling_titipan->get_dtt_approve($po_id)->result();
        foreach ($dtt_app as $index=>$row){
            $dtt_app[$index]->details = $this->Model_tolling_titipan->show_detail_dtt($row->id)->result();
        }
        $data['dtt_app'] = $dtt_app;
        $jenis = $data['header_po']['jenis_po'];
        $supplier_id = $data['header_po']['supplier_id'];
        $dtt = $this->Model_tolling_titipan->get_dtt($supplier_id,$jenis)->result();
        foreach ($dtt as $index=>$row){
            $dtt[$index]->details = $this->Model_tolling_titipan->show_detail_dtt($row->id)->result();
        }
        $data['dtt'] = $dtt;
        $this->load->view('layout', $data);
    }

    function approve_matching_dtt(){
        $dtt_id = $this->input->post('dtt_id');
        $po_id = $this->input->post('po_id');
        $jenis = $this->input->post('jenis_barang');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        $this->load->model('Model_tolling_titipan');
        
        $this->db->trans_start();       

            #Update status DTBJ
            $this->db->where('id', $dtt_id);
            $this->db->update('dtt', array(
                    'po_id'=>$po_id,
                    'status'=>1,
                    'approved'=>$tanggal,
                    'approved_by'=>$user_id));
                
                #update po_detail_id di dtbj_detail
            // echo $po_id;die()
                $po_dtt_check_update = $this->Model_tolling_titipan->check_to_update($po_id)->result();
                foreach ($po_dtt_check_update as $u){
                    $this->db->where('id',$u->dtt_detail_id );
                    $this->db->update('dtt_detail',array(
                                    'po_detail_id'=>$u->id));
                }

                $total_qty = 0;
                $total_netto_dtt = 0;
                $po_dtt_list = $this->Model_tolling_titipan->check_po_dtt($po_id)->result();
                foreach ($po_dtt_list as $v) {
                    #penghitungan +- 10 % PO ke DTR
                    if(((int)$v->tot_netto) >= (0.9*((int)$v->tot_qty))){
                        #update po_detail flag_dtr
                        $this->Model_tolling_titipan->update_flag_dtt_po_detail($po_id);
                    }
                    $total_qty += $v->tot_qty;
                    $total_netto_dtt += $v->tot_netto;
                }

               if(((int)$total_netto_dtt) >= (0.9*((int)$total_qty))){
                    $update_po = array(
                                    'status'=>3,
                                    'flag_pelunasan'=>0);
               }else {
                    $update_po = array(
                        'status'=>2
                    );
               }
               $this->db->where('id',$po_id);
               $this->db->update('po', $update_po);
            #Create BPB
                $this->load->model('Model_m_numberings');
                $code = $this->Model_m_numberings->getNumbering('BPB-PO-T',$tgl_input);
                $loop1 = $this->db->query("select dttd.dtt_id, dttd.jenis_barang_id, jb.jenis_barang
                    from dtt_detail dttd
                    left join jenis_barang jb on (jb.id = dttd.jenis_barang_id)
                    where dttd.dtt_id =".$dtt_id." group by jb.jenis_barang")->result();
            if($jenis == 'FG'){
                foreach ($loop1 as $k1) {
                    #insert t_bpb_fg
                    $data_bpb = array(
                            'no_bpb_fg' => $code,
                            'flag_ppn' => $user_ppn,
                            'tanggal' => $tgl_input,
                            'dtt_id' => $k1->dtt_id,
                            'jenis_barang_id' => $k1->jenis_barang_id,
                            'created_at' => $tanggal,
                            'created_by' => $user_id,
                            'keterangan' => 'BARANG TOLLING FG',
                            'status' => 0
                        );
                    $this->db->insert('t_bpb_fg',$data_bpb);
                    $id_bpb = $this->db->insert_id();

                    #insert t_bpb_detail
                    $loop2 = $this->db->query("select dtt_detail.*, m_bobbin.id as bobbin_id from dtt_detail left join m_bobbin on (m_bobbin.nomor_bobbin = dtt_detail.no_bobbin) where jenis_barang_id =".$k1->jenis_barang_id." and dtt_id = ".$dtt_id)->result();
                    foreach ($loop2 as $k2) {
                        $this->db->insert('t_bpb_fg_detail', array(
                            't_bpb_fg_id' => $id_bpb,
                            'jenis_barang_id' => $k2->jenis_barang_id,
                            'no_produksi' => 0,
                            'bruto' => $k2->bruto,
                            'netto' => $k2->netto,
                            'no_packing_barcode' => $k2->no_packing,
                            'bobbin_id' => $k2->bobbin_id
                        ));
                    }
                }
            }else if($jenis == 'WIP'){
                #Create BPB WIP
                foreach ($loop1 as $k1) {
                    #insert t_bpb_fg
                    $data_bpb = array(
                            'no_bpb' => $code,
                            'flag_ppn' => $user_ppn,
                            'dtt_id' => $dtt_id,
                            'tanggal' => $tanggal,
                            'created' => $tanggal,
                            'created_by' => $user_id,
                            'keterangan' => 'BARANG TOLLING WIP',
                            'status' => 0
                        );
                    $this->db->insert('t_bpb_wip',$data_bpb);
                    $id_bpb = $this->db->insert_id();

                    #insert t_bpb_detail
                    $loop2 = $this->db->query("select dtt_detail.*, jb.uom from dtt_detail left join jenis_barang jb on (jb.id = dtt_detail.jenis_barang_id) where jenis_barang_id =".$k1->jenis_barang_id." and dtt_id =".$dtt_id)->result();
                    foreach ($loop2 as $k2) {
                        $this->db->insert('t_bpb_wip_detail', array(
                            'bpb_wip_id' => $id_bpb,
                            'created' => $tgl_input,
                            'jenis_barang_id' => $k2->jenis_barang_id,
                            'qty' => $k2->qty,
                            'berat' => $k2->netto,
                            'uom' => $k2->uom,
                            'keterangan' => '',
                            'created_by' => $user_id
                        ));
                    }
                }
            }

            if($user_ppn==1){
                $this->load->helper('target_url');
            
                $data_post['po'] = $update_po;
                $data_post['po_id'] = $po_id;
                $data_post['jenis'] = $jenis;

                $data_post['dtt'] = $this->Model_tolling_titipan->load_dtt_only($dtt_id)->row_array();
                $data_post['details'] = $this->Model_tolling_titipan->load_dtt_detail_only($dtt_id)->result();

                unset($data_bpb['flag_ppn']);
                unset($data_bpb['dtwip_id']);
                unset($data_bpb['dtt_id']);
                $data_id = array('reff1' => $id_bpb);
                $data_post['data_bpb'] = array_merge($data_bpb, $data_id);
                if($jenis=='FG'){
                    $data_post['details_bpb'] = $this->Model_tolling_titipan->load_bpb_fg_detail_only($id_bpb)->result();
                }elseif($jenis=='WIP'){
                    $data_post['details_bpb'] = $this->Model_tolling_titipan->load_bpb_wip_detail_only($id_bpb)->result();
                }
                $detail_post = json_encode($data_post);
                // print_r($detail_post);
                // die();

                $ch = curl_init(target_url().'api/TollingAPI/dtt');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
            }

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'DTT berhasil di-create dengan nomor : '.$no_ttr);                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTT, silahkan coba kembali!');
        }
        // redirect('index.php/Tolling/dtt_list');
    }

    function proses_matching_rsk(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');  
        $user_ppn    = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $po_id = $this->uri->segment(3);
        
        $data['content']= "tolling_titipan/proses_matching_rsk";
        $this->load->model('Model_tolling_titipan');
        $this->load->model('Model_beli_rongsok');
        $data['header_po'] = $this->Model_tolling_titipan->show_header_po($po_id)->row_array();
        $data['details_po'] = $this->Model_beli_rongsok->show_detail_po($po_id)->result();

        $dtr_app = $this->Model_beli_rongsok->get_dtr_approve($po_id)->result();
        foreach ($dtr_app as $index=>$row){
            $dtr_app[$index]->details = $this->Model_beli_rongsok->show_detail_dtr($row->id)->result();
        }
        $data['dtr_app'] = $dtr_app;
        $sp_id = $data['header_po']['supplier_id'];
        $dtr = $this->Model_tolling_titipan->get_matching_dtr($sp_id,$user_ppn)->result();
        foreach ($dtr as $index=>$row){
            $dtr[$index]->details = $this->Model_beli_rongsok->show_detail_dtr($row->id)->result();
        }
        $data['dtr'] = $dtr;
        $this->load->view('layout', $data);
    }

    function approve_matching_rsk(){
        $dtr_id = $this->input->post('dtr_id');
        $po_id = $this->input->post('po_id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        
            $this->db->trans_start();       

            $this->load->model('Model_beli_rongsok');
            #Update status DTR
            $this->db->where('id', $dtr_id);
            $this->db->update('dtr', array(
                    'po_id'=>$po_id,
                    'approved'=>$tanggal,
                    'approved_by'=>$user_id));
                
                #update po_detail_id di dtr_detail
                $po_dtr_check_update = $this->Model_beli_rongsok->check_to_update($po_id)->result();
                foreach ($po_dtr_check_update as $u) {
                    $this->db->where('id',$u->dtr_detail_id );
                    $this->db->update('dtr_detail',array(
                                    'po_detail_id'=>$u->id));
                }

                #update status PO, jika DTR sudah mencukupi
                $po_dtr_list = $this->Model_beli_rongsok->check_po_dtr($po_id)->result();
                foreach ($po_dtr_list as $v) {
                    #penghitungan +- 10 % PO ke DTR
                    // if(((int)$v->tot_netto) >= (0.9*((int)$v->qty))){
                    //     #update po_detail flag_dtr
                    //     $this->Model_beli_rongsok->update_flag_dtr_po_detail($po_id);
                    // }
                    // $total_qty += $v->qty;
                        if(((int)$v->tot_netto) >= (0.9*((int)$v->tot_qty))){
                            $this->db->where('id',$po_id);
                            $this->db->update('po',array(
                                            'status'=>3,
                                            'flag_pelunasan'=>0));
                        }else {
                            $this->db->where('id',$po_id);
                            $this->db->update('po',array(
                                            'status'=>2));
                        }
                }

        if($this->db->trans_complete()){
            redirect('index.php/Tolling/proses_matching_rsk/'.$this->input->post('po_id'));
            // $return_data['type_message']= "sukses";
            // $return_data['message'] = "TTR sudah diberikan ke bagian gudang";
            // $return_data['message']= "TTR berhasil di-create dengan nomor : ".$code;                 
        }else{
            redirect('index.php/Tolling/proses_matching_rsk/'.$this->input->post('po_id'));
        }
       // header('Content-Type: application/json');
       // echo json_encode($return_data);
    }

    function delete_po(){
        $id = $this->uri->segment(3);
        $user_ppn = $this->session->userdata('user_ppn');
        $this->db->trans_start();
        if(!empty($id)){
            $this->db->delete('po', ['id' => $id]);

            $this->db->delete('po_detail', ['po_id' => $id]);

            if($user_ppn == 1){
                $this->load->helper('target_url');

                $url = target_url().'api/BeliFinishGoodAPI/delete_po?id='.$id;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
            }
        }

        if ($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data PO Finish Good berhasil dihapus');
            redirect('index.php/Tolling/po_list');
        }
    }

    function reject_matching_dtt(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('dtbj_id'));
        $this->db->update('dtbj', $data);

        $query = $this->db->query('select *from dtbj_detail where dtbj_id = '.$this->input->post('dtbj_id'))->result();
        foreach ($query as $row) {
            $this->db->where('nomor_bobbin', $row->no_bobbin);
            $this->db->update('m_bobbin', array(
                'status' => 3,
                'modified_at' => $tanggal,
                'modified_by' => $user_id
            ));
        }

        redirect('index.php/BeliFinishGood/proses_matching/'.$this->input->post('po_id'));
    }

    function matching_so(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');    
        $ppn         = $this->session->userdata('user_ppn');    
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $so_id = $this->uri->segment(3);
        
        $data['content']= "tolling_titipan/matching_so";
        $this->load->model('Model_tolling_titipan');
        $this->load->model('Model_beli_wip');
        $data['header_so']  = $this->Model_tolling_titipan->show_header_so($so_id)->row_array();
        $data['details_so'] = $this->Model_tolling_titipan->show_detail_so($so_id)->result();

        $dtr_app = $this->Model_tolling_titipan->get_dtr_approve($so_id)->result();
        $dtwip_app = $this->Model_tolling_titipan->get_dtwip_approve($so_id)->result();
        foreach ($dtr_app as $index=>$row){
            $dtr_app[$index]->details = $this->Model_tolling_titipan->show_detail_dtr($row->id)->result();
        }
        foreach ($dtwip_app as $index=>$row) {
            $dtwip_app[$index]->details = $this->Model_tolling_titipan->show_detail_dtwip($row->id)->result();
        }
        $data['dtr_app'] = $dtr_app;
        $data['dtwip_app'] = $dtwip_app;
        $c_id = $data['header_so']['m_customer_id'];
        $dtr = $this->Model_tolling_titipan->get_dtr($c_id,$ppn)->result();
        foreach ($dtr as $index=>$row){
            $dtr[$index]->details = $this->Model_tolling_titipan->show_detail_dtr($row->id)->result();
        }
        $dtwip = $this->Model_tolling_titipan->get_dtwip($c_id,$ppn)->result();
        foreach ($dtwip as $index=>$row){
            $dtwip[$index]->details = $this->Model_beli_wip->show_detail_dtwip($row->id)->result();
        }
        $data['dtr'] = $dtr;
        $data['dtwip'] = $dtwip;
        $this->load->view('layout', $data);
    }

    function approve_matching(){
        $dtr_id = $this->input->post('dtr_id');
        $so_id = $this->input->post('so_id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        
            $this->db->trans_start();       
            #Update status DTR
            $this->db->where('id', $dtr_id);
            $this->db->update('dtr', array(
                    'so_id'=>$so_id,
                    'status'=>1,
                    'approved'=>$tanggal,
                    'approved_by'=>$user_id));
            
            #Create TTR
            $data = array(
                    'tanggal'=> $tgl_input,
                    'dtr_id'=> $dtr_id,
                    'ttr_status' => 0,
                    'created'=> $tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
            );
            $this->db->insert('ttr', $data);
            $ttr_id = $this->db->insert_id();
            
            $this->load->model('Model_beli_rongsok');
            $details = $this->Model_beli_rongsok->show_detail_dtr($dtr_id)->result();
            foreach ($details as $row){
                $this->db->insert('ttr_detail', array(
                    'ttr_id'=>$ttr_id,
                    'dtr_detail_id'=>$row->id,
                    'rongsok_id'=>$row->rongsok_id,
                    'qty'=>$row->qty,
                    'bruto'=>$row->bruto,
                    'netto'=>$row->netto,
                    'line_remarks'=>$row->line_remarks,
                    'created'=>$tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                ));
            }
            
                $this->load->model('Model_tolling_titipan');
            
                #update status PO, jika DTR sudah mencukupi
                $so_dtr_list = $this->Model_tolling_titipan->check_so_dtr($so_id)->result();
                foreach ($so_dtr_list as $v) {
                    #penghitungan +- 10 % PO ke DTR
                    // if(((int)$v->tot_netto) >= (0.9*((int)$v->qty))){
                    //     #update po_detail flag_dtr
                    //     $this->Model_beli_rongsok->update_flag_dtr_po_detail($po_id);
                    // }
                    // $total_qty += $v->qty;
                        if(((int)$v->tot_netto_dtr+(int)$v->tot_netto_dtwip) >= (0.9*($v->tot_qty))){
                            $this->db->where('id',$so_id);
                            $this->db->update('sales_order',array(
                                            'flag_tolling'=>2));
                        }else {
                            $this->db->where('id',$so_id);
                            $this->db->update('sales_order',array(
                                            'flag_tolling'=>1));
                        }
                }

        if($this->db->trans_complete()){  
            // $this->session->set_flashdata('flash_msg', ' DTR Berhasil di Approve');      
            // redirect('index.php/Tolling/proses_matching/'.$this->input->post('so_id'));    
            redirect('index.php/Tolling/matching_so/'.$this->input->post('so_id'));
        }else{
            // $this->session->set_flashdata('flash_msg', ' DTR Gagal di Approve');    
            // redirect('index.php/Tolling/proses_matching/'.$this->input->post('so_id'));
            redirect('index.php/Tolling/matching_so/'.$this->input->post('so_id'));
        }            
        
       // header('Content-Type: application/json');
       // echo json_encode($return_data);
    }

    function approve_matching_dtwip(){
        $dtwip_id = $this->input->post('dtwip_id');
        $so_id = $this->input->post('so_id');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $get = $this->db->query("select id, tanggal from dtwip where id =".$dtwip_id)->row_array();
        $tgl_input = date('Y-m-d', strtotime($get['tanggal']));
        $return_data = array();
        
            $this->db->trans_start();       
            #Update status DTwip
            $this->db->where('id', $dtwip_id);
            $this->db->update('dtwip', array(
                    'so_id'=>$so_id,
                    'status'=>1,
                    'approved'=>$tanggal,
                    'approved_by'=>$user_id,
                    'api'=>1
                ));

                #Create BPB WIP
                $this->load->model('Model_m_numberings');
                #insert t_bpb_wip
                if($user_ppn==1){
                    $code = $this->Model_m_numberings->getNumbering('BPB-KMP', $tgl_input);
                }else{
                    $code = $this->Model_m_numberings->getNumbering('BPB-WIP',$tgl_input);
                }

                $data_bpb = array(
                        'no_bpb' => $code,
                        'tanggal' => $tgl_input,
                        'dtt_id' => $dtt_id,
                        'flag_ppn' => $user_ppn,
                        'created' => $tanggal,
                        'created_by' => $user_id,
                        'keterangan' => 'BARANG TOLLING WIP',
                        'status' => 0
                    );
                $this->db->insert('t_bpb_wip',$data_bpb);
                $id_bpb = $this->db->insert_id();

            #insert t_bpb_detail
            $details = $this->db->query("select dtwip_detail.*, jb.uom from dtwip_detail left join jenis_barang jb on (jb.id = dtwip_detail.jenis_barang_id) where dtwip_id = ".$dtwip_id)->result();

            foreach ($details as $row){
                    $this->db->insert('t_bpb_wip_detail', array(
                        'bpb_wip_id' => $id_bpb,
                        'created' => $tgl_input,
                        'jenis_barang_id' => $row->jenis_barang_id,
                        'qty' => $row->qty,
                        'berat' => $row->berat,
                        'uom' => $row->uom,
                        'keterangan' => $row->line_remarks,
                        'created_by' => $user_id
                    ));
            }
            
                $this->load->model('Model_tolling_titipan');
            
                #update status PO, jika DTR sudah mencukupi
                $so_dtr_list = $this->Model_tolling_titipan->check_so_dtr($so_id)->result();
                foreach ($so_dtr_list as $v) {
                    #penghitungan +- 10 % PO ke DTR
                    // if(((int)$v->tot_netto) >= (0.9*((int)$v->qty))){
                    //     #update po_detail flag_dtr
                    //     $this->Model_beli_rongsok->update_flag_dtr_po_detail($po_id);
                    // }
                    // $total_qty += $v->qty;
                        $total = ((int)$v->tot_netto_dtr) + ((int)$v->tot_netto_dtwip);

                        // echo $total;die();
                        if(($total) >= (0.9*((int)$v->tot_qty))){
                            $flag_tolling = 2;
                        }else {
                            $flag_tolling = 1;
                        }
                        $this->db->where('id',$so_id);
                        $this->db->update('sales_order',array(
                                            'flag_tolling'=>$flag_tolling));
                }

        if($this->db->trans_complete()){  
            // $this->session->set_flashdata('flash_msg', ' DTR Berhasil di Approve');      
            // redirect('index.php/Tolling/proses_matching/'.$this->input->post('so_id'));    
            redirect('index.php/Tolling/matching_so/'.$this->input->post('so_id'));
        }else{
            // $this->session->set_flashdata('flash_msg', ' DTR Gagal di Approve');    
            // redirect('index.php/Tolling/proses_matching/'.$this->input->post('so_id'));
            redirect('index.php/Tolling/matching_so/'.$this->input->post('so_id'));
        }            
        
       // header('Content-Type: application/json');
       // echo json_encode($return_data);
    }

    function approve_ttr_resmi(){
        $ttr_id = $this->input->post('header_id');
        $tanggal = date('Y-m-d h:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Ym', strtotime($this->input->post('tanggal')));
        $user_id = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');

        $this->db->trans_start();

        $no_ttr = 'TTR-KMP.'.$tgl_code.'.'.$this->input->post('nomor_ttr');
        $count = $this->db->query("Select count(id) as count from ttr where no_ttr = '".$no_ttr."'")->row_array();
            if($count['count'] > 0){
                $this->session->set_flashdata('flash_msg', 'Nomor TTR sudah Ada. Please try again!');
                redirect('index.php/BeliRongsok/review_ttr/'.$ttr_id);
            }
        #Update status TTR
            if($this->input->post('dtr_type')==1){
                $status = 2;
            }else{
                $status = 1;
            }

            $this->db->where('id',$ttr_id);
            $result = $this->db->update('ttr', array(
                    'no_ttr' => $no_ttr,
                    'tanggal' => $tgl_input,
                    'no_sj' => $this->input->post('no_sj'),
                    'jmlh_afkiran' => $this->input->post('jml_afkir'),
                    'jmlh_pengepakan' => $this->input->post('jml_packing'),
                    'jmlh_lain'=> $this->input->post("jml_lain"),
                    'ttr_status'=>$status,
                    'tgl_approve'=>$tanggal,
                    'approved_by'=>$user_id));

            if($user_ppn==1){
                $this->load->helper('target_url');

                $this->load->model('Model_beli_rongsok');

                $data_post['master'] = $this->Model_beli_rongsok->ttr_dtr_only($ttr_id)->row_array();
                $data_post['detail'] = $this->Model_beli_rongsok->ttr_dtr_detail_only($ttr_id)->result();

                $detail_post = json_encode($data_post);
                // print_r($detail_post);
                // die();
                $ch = curl_init(target_url().'api/TollingAPI/dtr');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();
                if($result['status']==true){
                    $this->db->where('id',$ttr_id);
                    $this->db->update('ttr', array('api'=> 1));
                }
            }

        // #Update Stok Rongsok Tersedia
        //     $this->load->model('Model_beli_rongsok');
        //     $dtr_list = $this->Model_beli_rongsok->show_detail_dtr_by_ttr($ttr_id)->result();
        //     foreach ($dtr_list as $k => $v) {
        //         $this->Model_beli_rongsok->update_stok_tersedia($v->rongsok_id,$v->netto);
        //     }
            
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'TTR berhasil di-create dengan nomor : '.$no_ttr);                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create TTR, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/ttr_list');
    }

    function print_so(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_so($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_so($id)->result();

            $this->load->view('tolling_titipan/print_so', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function get_uom_so(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $rongsok= $this->Model_tolling_titipan->get_uom($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }

     function load_detail_dtr(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_tolling_titipan');
        $list_tolling_so = $this->Model_tolling_titipan->list_data_on_so($id)->result();
        
        $myDetail = $this->Model_tolling_titipan->load_detail_saved($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->bruto.'</td>';
            $tabel .= '<td>'.$row->berat_palette.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->no_pallete.'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<input type="hidden" id="so_id" name="so_id" value="'.$id.'" class="form-control myline"/>';
        $tabel .= '<td><select id="rongsok_id" name="rongsok_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom_so(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($list_tolling_so as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly></td>';
        $tabel .= '<td><input type="text" id="bruto" name="bruto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="berat_palette" name="berat_palette" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" readonly="readonly" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="no_pallete" name="no_pallete" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"/></td>';
        $tabel .= '<td><input type="text" id="keterangan" name="keterangan" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function save_so_detail(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        if($this->db->insert('dtr_detail', array(
            'so_id' => $this->input->post('so_id'),
            'rongsok_id' => $this->input->post('rongsok_id'),
            'qty' => $this->input->post('qty'),
            'bruto' => $this->input->post('bruto'),
            'netto' => $this->input->post('netto'),
            'no_pallete' => $this->input->post('no_palette'),
            'berat_palette' => $this->input->post('berat_palette'),
            'line_remarks' => $this->input->post('keterangan')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_so(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('dtr_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function create_dtr(){
        $module_name = $this->uri->segment(1);
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "tolling_titipan/create_dtr";
            $this->load->model('Model_beli_rongsok');
            $data['list_rongsok_on_po'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $this->load->model('Model_tolling_titipan');
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
            $this->load->view('layout', $data);
    }
    
    function save_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        if($user_ppn==1){
            $code = $this->Model_m_numberings->getNumbering('DTR-TKMP', $tgl_input);
        }else{
            $code = $this->Model_m_numberings->getNumbering('DTR-T', $tgl_input);
        }
        $this->load->model('Model_tolling_titipan');

        if($code){        
            $data = array(
                        'no_dtr'=> $code,
                        'flag_ppn'=> $user_ppn,
                        'tanggal'=> $tgl_input,
                        'customer_id'=> $this->input->post('supplier_id'),
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('dtr', $data);
            $dtr_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if($row['rongsok_id']!=''){
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'rongsok_id'=>$row['rongsok_id'],
                        // 'qty'=>str_replace('.', '', $row['qty']),
                        'bruto'=>$row['bruto'],
                        'berat_palette'=>$row['berat_palette'],
                        'netto'=>$row['netto'],
                        'no_pallete'=>$row['no_pallete'],
                        'line_remarks'=>$row['line_remarks'],
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
                }
            }   
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTR berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTR, silahkan coba kembali!');
            }                   
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan DTR gagal, penomoran belum disetup!');
        }
        redirect('index.php/Tolling/dtr_list');    
    }
    
    function dtr_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $user_ppn    = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/dtr_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->dtr_list($user_ppn)->result();

        $this->load->view('layout', $data);
    }
    
    function print_dtt(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_dtt($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtt($id)->result();

            $this->load->view('tolling_titipan/print_dtt', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_dtt_global(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_dtt($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtt_harga($id)->result();

            $this->load->view('tolling_titipan/print_dtt_global', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_dtt_harga(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_dtt($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtt_harga($id)->result();

            $this->load->view('tolling_titipan/print_dtt_harga', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function view_dtr(){
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

            $data['content']= "tolling_titipan/view_dtr";
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_dtr($id)->row_array(); 
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtr($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }
    
    function approve(){
        $dtr_id = $this->input->post('dtr_id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        
        $return_data = array();
        $this->db->trans_start(); 
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('TTR', $tgl_input); 
        if($code){ 
            #Update status DTR
            $this->db->where('id', $dtr_id);
            $this->db->update('dtr', array(
                    'status'=>1,
                    'approved'=>$tanggal,
                    'approved_by'=>$user_id));
            
            #Create TTR
            $data = array(
                    'no_ttr'=> $code,
                    'tanggal'=> $tgl_input,
                    'dtr_id'=> $dtr_id,
                    'created'=> $tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
            );
            $this->db->insert('ttr', $data);
            $ttr_id = $this->db->insert_id();
            
            $this->load->model('Model_beli_rongsok');
            $details = $this->Model_beli_rongsok->show_detail_dtr($dtr_id)->result();
            
            foreach ($details as $row){
                $this->db->insert('ttr_detail', array(
                    'ttr_id'=>$ttr_id,
                    'dtr_detail_id'=>$row->id,
                    'rongsok_id'=>$row->rongsok_id,
                    'qty'=>$row->qty,
                    'bruto'=>$row->bruto,
                    'netto'=>$row->netto,
                    'line_remarks'=>$row->line_remarks,
                    'created'=>$tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                ));
                
                #Update Stok Rongsok
                $get_stok = $this->Model_beli_rongsok->cek_stok($row->nama_item, 'RONGSOK')->row_array(); 
                if($get_stok){
                    $stok_id  = $get_stok['id'];            
                    $this->db->where('id', $stok_id);
                    $this->db->update('t_inventory', array(
                            'stok_bruto'=>($get_stok['stok_bruto']+ $row->bruto), 
                            'stok_netto'=>($get_stok['stok_netto']+ $row->netto), 
                            'modified'=>$tanggal, 
                            'modified_by'=>$user_id));
                }else{
                    $this->db->insert('t_inventory', array(
                            'nama_produk'=>$row->nama_item,
                            'jenis_item'=>'RONGSOK',
                            'stok_bruto'=>$row->bruto, 
                            'stok_netto'=>$row->netto, 
                            'created'=>$tanggal, 
                            'created_by'=>$user_id,
                            'modified'=>$tanggal, 
                            'modified_by'=>$user_id));
                    
                    $stok_id = $this->db->insert_id();
                }
                
                #Save data ke tabel t_inventory_detail
                $this->db->insert('t_inventory_detail', array(
                    't_inventory_id'=>$stok_id,
                    'tanggal'=>$tanggal,
                    'bruto_masuk'=>$row->bruto,
                    'netto_masuk'=>$row->netto,
                    'remarks'=>'Tolling titipan',
                ));
            }
            
            if($this->db->trans_complete()){  
                $return_data['type_message']= "sukses";
                $return_data['message']= "TTR berhasil di-create dengan nomor : ".$code;                 
            }else{
                $return_data['type_message']= "error";
                $return_data['message']= "Terjadi kesalahan saat approve DTR, silahkan coba kembali!";
            }   
        }else{
            $return_data['type_message']= "error";
            $return_data['message']= "Pembuatan TTR gagal, penomoran belum disetup!";
        } 

        
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function reject(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('dtr_id'));
        $this->db->update('dtr', $data);

        redirect('index.php/Tolling/view_dtr/'.$this->input->post('dtr_id'));
    }
    
    function edit_dtr(){
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

            $data['content']= "tolling_titipan/edit_dtr";
            $this->load->model('Model_tolling_titipan');
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
            $data['header']  = $this->Model_tolling_titipan->show_header_dtr($id)->row_array(); 
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtr($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }

    function revisi_dtr(){
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

            $data['content']= "tolling_titipan/revisi_dtr";
            $this->load->model('Model_beli_rongsok');
            $data['header']  = $this->Model_beli_rongsok->show_header_dtr($id)->row_array(); 
            $data['details'] = $this->Model_beli_rongsok->show_detail_dtr($id)->result();
            $this->load->model('Model_rongsok');
            $data['list_rongsok'] = $this->Model_beli_rongsok->all_rsk()->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }

    function proses_revisi(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dtr', array(
                    'tanggal'=> $tgl_input,
                    'remarks'=>$this->input->post('remarks'),
                    'modified'=>$tanggal,
                    'modified_by'=>$user_id
        ));
        
        $this->db->where('dtr_id', $this->input->post('id'));
        $this->db->update('ttr', array(
            'tanggal'=> $tgl_input
        ));

        $details = $this->input->post('myDetails');
        foreach($details as $row){
            $this->db->where('id', $row['id_dtr']);
            $this->db->update('dtr_detail', array(
                'rongsok_id'=>$row['rongsok_id'],
                'line_remarks'=>$row['line_remarks'],
                'tanggal_masuk'=>$tgl_input,
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            ));

            $this->db->where('dtr_detail_id', $row['id_dtr']);
            $this->db->update('ttr_detail', array(
                'rongsok_id'=>$row['rongsok_id'],
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            ));
        }
        
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'DTR dengan nomor : '.$this->input->post('no_dtr').' berhasil diupdate...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat updates DTR, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/dtr_list');
    }

    function update_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dtr', array(
                    'tanggal'=>$tgl_input,
                    'customer_id'=>$this->input->post('customer_id'),
                    'status'=>0,
                    'remarks'=>$this->input->post('remarks'),
                    'modified'=>$tanggal,
                    'modified_by'=>$user_id
        ));
        
        $details = $this->input->post('myDetails');
        foreach($details as $row){
            $this->db->where('id', $row['id']);
            $this->db->update('dtr_detail', array(
                'bruto'=>str_replace('.','', $row['bruto']),
                'netto'=>str_replace('.','', $row['netto']),
                'line_remarks'=>$row['line_remarks'],
                'no_pallete'=>$row['no_pallete'],
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            ));
        }
        
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'DTR dengan nomor : '.$this->input->post('no_dtr').' berhasil diupdate...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat updates DTR, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/dtr_list');
    }
    
    function create_ttr(){
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

            $data['content']= "tolling_titipan/create_ttr";
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_dtr($id)->row_array();           
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtr($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }
    
    function save_ttr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('TTR', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_ttr'=> $code,
                        'tanggal'=> $tgl_input,
                        'dtr_id'=> $this->input->post('dtr_id'),
                        'jmlh_afkiran'=>str_replace('.','', $this->input->post('jmlh_afkiran')),
                        'jmlh_pengepakan'=>str_replace('.','', $this->input->post('jmlh_pengepakan')),
                        'jmlh_lain'=>str_replace('.','', $this->input->post('jmlh_lain')),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('ttr', $data);
            $dtr_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('ttr_detail', array(
                        'ttr_id'=>$dtr_id,
                        'dtr_detail_id'=>$row['dtr_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>$row['qty'],
                        'bruto'=>$row['bruto'],
                        'netto'=>$row['netto'],
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['dtr_detail_id']);
                    $this->db->update('dtr_detail', array('flag_ttr'=>1));
                }
            }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'TTR berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create TTR, silahkan coba kembali!');
            }                     
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan TTR gagal, penomoran belum disetup!');
        }
        redirect('index.php/Tolling/dtr_list');  
    }
    
    function ttr_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $user_ppn    = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/ttr_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->ttr_list($user_ppn)->result();

        $this->load->view('layout', $data);
    }
    
    function print_ttr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_ttr($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_ttr($id)->result();

            $this->load->view('print_ttr_from_so', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        $user_ppn = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/surat_jalan";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->surat_jalan($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function surat_jalan_keluar(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        $user_ppn = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/surat_jalan_keluar";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->surat_jalan_keluar($user_ppn)->result();

        $this->load->view('layout', $data);
    }
    
    function add_surat_jalan(){
        $module_name = $this->uri->segment(1);
        $user_ppn    = $this->session->userdata('user_ppn');
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add_surat_jalan";
        
        $this->load->model('Model_tolling_titipan');
        $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
        $this->load->model('Model_sales_order');
        $data['sj'] = $this->Model_sales_order->get_last_sj($user_ppn)->row_array();
        $data['sjr'] = $this->Model_sales_order->get_last_sj_cv()->row_array();
        $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();
        $this->load->view('layout', $data);
    }

    function add_surat_jalan_keluar(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add_surat_jalan_keluar";
        
        $this->load->model('Model_beli_sparepart');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
        $this->load->model('Model_sales_order');
        $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();
        $this->load->view('layout', $data);
    }
    
    function get_type_kendaraan(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $type_kendaraan = $this->Model_tolling_titipan->get_type_kendaraan($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($type_kendaraan); 
    }
    
    function get_alamat(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $customer = $this->Model_tolling_titipan->get_alamat($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }

    function get_alamat_supplier(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $supplier = $this->Model_tolling_titipan->get_alamat_supplier($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($supplier); 
    }
    
    function get_so_list(){ 
        $user_ppn = $this->session->userdata('user_ppn');
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->get_so_list($id, $user_ppn)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_sales_order;
        } 
        print form_dropdown('sales_order_id', $arr_so);
    }
    
    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_sj = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn = $this->session->userdata('user_ppn');

        if($user_ppn == 1){
            $code = 'SJ-KMP.'.$tgl_sj.'.'.$this->input->post('no_surat_jalan');
        }else{
            // $this->load->model('Model_m_numberings');
            // $code = $this->Model_m_numberings->getNumbering('SJ', $tgl_input); 
            $code = 'SJ.'.$tgl_sj.'.'.$this->input->post('no_surat_jalan');
        }
        
        if($code){        
            $data = array(
                'no_surat_jalan'=> $code,
                'sales_order_id'=>$this->input->post('sales_order_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>'ONGKOS KERJA, '.$this->input->post('remarks'),
                'status'=>0,
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('t_surat_jalan', $data)){
                redirect('index.php/Tolling/edit_surat_jalan/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Tolling/surat_jalan');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Tolling/surat_jalan');
        }
    }

    function save_surat_jalan_keluar(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_sj = date('Ym', strtotime($this->input->post('tanggal')));
        
        // $this->load->model('Model_m_numberings');
        // $code = $this->Model_m_numberings->getNumbering('SJ-T', $tgl_input); 
        $code = 'SJ-T.'.$tgl_sj.'.'.$this->input->post('no_surat_jalan');
        
        if($code){        
            $data = array(
                'no_surat_jalan'=> $code,
                'spb_id'=>$this->input->post('no_spb'),
                'po_id'=>$this->input->post('po_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('t_surat_jalan', $data)){
                redirect('index.php/Tolling/edit_surat_jalan_keluar/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Tolling/surat_jalan');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Tolling/surat_jalan');
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

            $data['content']= "tolling_titipan/edit_surat_jalan";
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_sj($id)->row_array();
            $data['type_kendaraan_list'] = $this->Model_tolling_titipan->type_kendaraan_list()->result();
            $data['jenis_barang'] = $this->Model_tolling_titipan->jenis_barang_in_so($data['header']['sales_order_id'])->result();
            if($data['header']['jenis_barang'] == 'FG'){
                $data['list_produksi'] = $this->Model_tolling_titipan->list_item_sj_fg($data['header']['sales_order_id'])->result();
            }else{
                $data['list_produksi'] = $this->Model_tolling_titipan->list_item_sj_wip($data['header']['sales_order_id'])->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling/surat_jalan');
        }
    }

    function edit_surat_jalan_keluar(){
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

            $data['content']= "tolling_titipan/edit_surat_jalan_keluar";
            $this->load->model('Model_sales_order');
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_sj_only($id)->row_array();  
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();

            $jenis = $data['header']['jenis_barang'];
            $spbid = $data['header']['spb_id'];
            if($jenis == 'FG'){
                $data['list_produksi'] = $this->Model_tolling_titipan->list_item_sjk_fg($spbid)->result();
            }else if($jenis == 'WIP'){
                $data['list_produksi'] = $this->Model_tolling_titipan->list_item_sjk_wip($spbid)->result();
            }else if($jenis == 'RONGSOK'){
                $data['list_produksi'] = $this->Model_tolling_titipan->list_item_sjk_rsk($spbid)->result();
            }else if($jenis == 'AMPAS'){
                $data['list_produksi'] = $this->Model_tolling_titipan->list_item_sjk_ampas($spbid)->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling/surat_jalan_keluar');
        }
    }

    function get_data_fg(){
        $id = $this->input->post('id');
        $jb = $this->input->post('jenis_barang');
        $this->load->model('Model_tolling_titipan');
        if($jb == 'FG'){
            $uom= $this->Model_tolling_titipan->get_data_fg($id)->row_array();
        }else{
            $uom= $this->Model_tolling_titipan->list_item_sj_wip_detail($id)->row_array();
        }
        
        header('Content-Type: application/json');
        echo json_encode($uom); 
    }

    function get_data_sj(){
        $id = $this->input->post('id');
        $jb = $this->input->post('jenis_barang');
        $this->load->model('Model_tolling_titipan');
        if($jb=='FG'){
        $sj_detail= $this->Model_tolling_titipan->list_item_sjk_fg_detail($id)->row_array();
        }else if($jb=='WIP'){
        $sj_detail= $this->Model_tolling_titipan->list_item_sjk_wip_detail($id)->row_array();
        }else{
        $sj_detail= $this->Model_tolling_titipan->list_item_sjk_rsk_detail($id)->row_array();
        }
        
        header('Content-Type: application/json');
        echo json_encode($sj_detail); 
    }
    
    function update_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');
        $soid = $this->input->post('so_id');

        #Insert Surat Jalan
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id_barang']!='' || $v['id_barang']!= 0){
                if($jenis=='FG'){// BARANG FINISH GOOD
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'gudang_id'=>$v['id_barang'],
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'jenis_barang_alias'=>$v['barang_alias_id'],
                        'no_packing'=>$v['no_packing'],
                        'qty'=>'1',
                        'bruto'=>$v['bruto'],
                        'berat'=>$v['bruto']-$v['netto'],
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>$v['bobbin'],
                        'line_remarks'=>$v['line_remarks'],
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                }else{
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'gudang_id'=>$v['id_barang'],
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'no_packing'=>0,
                        'qty'=>$v['qty'],
                        'bruto'=>0,
                        'berat'=>0,
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>0,
                        'line_remarks'=>$v['line_remarks'],
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                }
            }
        }

        $data = array(
                'tanggal'=> $tgl_input,
                'status'=> 0,
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_surat_jalan', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data surat jalan berhasil disimpan');
        redirect('index.php/Tolling/surat_jalan');
    }

    function update_surat_jalan_keluar(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');
        $soid = $this->input->post('so_id');

        #Insert Surat Jalan
        $details = $this->input->post('details');
        // print_r($details);
        // die();
        foreach ($details as $v) {
            if($v['id_barang']!=''){
                if($v['barang_alias']==''){
                    $v['barang_alias']=null;
                }
                if($jenis=='FG'){// BARANG FINISH GOOD
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'gudang_id'=>$v['id_barang'],
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'barang_alias'=>$v['barang_alias'],
                        'no_packing'=>$v['no_packing'],
                        'qty'=>'1',
                        'bruto'=>$v['bruto'],
                        'berat'=>$v['berat'],
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>$v['bobbin'],
                        'line_remarks'=>'',
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                }else if($jenis=='WIP'){//BARANG WIP
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'gudang_id'=>$v['id_barang'],
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'barang_alias'=>$v['barang_alias'],
                        'no_packing'=>0,
                        'qty'=>$v['qty'],
                        'bruto'=>0,
                        'berat'=>0,
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>0,
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                }else if($jenis=='RONGSOK'){
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'gudang_id'=>$v['id_barang'],
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'barang_alias'=>$v['barang_alias'],
                        'no_packing'=>$v['no_palette'],
                        'qty'=>$v['qty'],
                        'bruto'=>$v['bruto'],
                        'berat'=>$v['berat_palette'],
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>0,
                        'line_remarks'=>'',
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                }else if($jenis=='AMPAS'){
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'gudang_id'=>$v['id_barang'],
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'barang_alias'=>$v['barang_alias'],
                        'no_packing'=>0,
                        'qty'=>1,
                        'bruto'=>$v['netto'],
                        'berat'=>0,
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>0,
                        'line_remarks'=>'',
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                }
            }
        }

        $data = array(
                'tanggal'=> $tgl_input,
                'status'=> 0,
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_surat_jalan', $data);

        $this->session->set_flashdata('flash_msg', 'Data surat jalan berhasil disimpan');
        redirect('index.php/Tolling/surat_jalan_keluar');
    }

    function update_surat_jalan_existing(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');
        $soid = $this->input->post('so_id');

        #Insert Surat Jalan
        $details = $this->input->post('details');

        // print_r($details);
        // die();
        foreach ($details as $v) {
            if($v['id_tsj_detail']!=''){
                $this->db->where('id',$v['id_tsj_detail']);
                $this->db->update('t_surat_jalan_detail', array(
                    'jenis_barang_alias'=>$v['barang_alias_id'],
                    'modified_by'=>$user_id,
                    'modified_at'=>$tanggal
                ));
            }
        }

        $data = array(
                'no_surat_jalan'=> $this->input->post('no_surat_jalan'),
                'tanggal'=> $tgl_input,
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_surat_jalan', $data);

            if($user_ppn == 1 && $this->input->post('status')==1){
                $this->load->helper('target_url');

                    $data_post['id_sj'] = $this->input->post('id');
                    $data_post['header'] = $data;
                    $data_post['details'] = $details;
                    $post = json_encode($data_post);
                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/SalesOrderAPI/sj_update');
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

        
        $this->session->set_flashdata('flash_msg', 'Data surat jalan berhasil disimpan');
        redirect('index.php/Tolling/view_surat_jalan/'.$this->input->post('id'));
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

            $data['content']= "tolling_titipan/view_sj";
            $this->load->model('Model_sales_order');
            $data['header'] = $this->Model_sales_order->show_header_sj($id)->row_array();  
            $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_in_so($data['header']['sales_order_id'])->result();
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();
            $data['list_sj'] = $this->Model_sales_order->load_view_sjd($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/SalesOrder/surat_jalan');
        }
    }

    function view_surat_jalan_keluar(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $user_ppn = $this->session->userdata('user_ppn');
        if($id){
            $group_id    = $this->session->userdata('group_id');
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "tolling_titipan/view_sj_keluar";
            $this->load->model('Model_sales_order');
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_sj_only($id)->row_array();
            $custid = $data['header']['m_customer_id'];
            $jenis = $data['header']['jenis_barang'];

            $data['list_po'] = $this->Model_tolling_titipan->get_po_tolling($custid,$user_ppn)->result();
            $data['list_sj'] = $this->Model_tolling_titipan->load_detail_surat_jalan($id)->result();
            // if($jenis == 'FG'){
            //     $data['list_sj'] = $this->Model_sales_order->load_view_sjd($id)->result();
            // }else if($jenis == 'WIP'){
            //     $data['list_sj'] = $this->Model_sales_order->load_detail_surat_jalan_wip($id)->result();
            // }else{
            //     $data['list_sj'] = $this->Model_sales_order->load_detail_surat_jalan_rsk($id,0)->result();
            // }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling/surat_jalan_keluar');
        }
    }

    function approve_surat_jalan(){
        $sjid = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $so_id = $this->input->post('so_id');
        $custid = $this->input->post('id_customer');
        $jenis = $this->input->post('jenis_barang');

        $this->db->trans_start();
        
        #set flag taken
        $loop = $this->db->query("select *from t_surat_jalan_detail where t_sj_id = ".$sjid)->result();
        if ($jenis == 'FG') {
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_gudang_fg', array('flag_taken' => 1, 't_sj_id'=> $sjid));
            }
        } else if ($jenis == 'WIP') {
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_gudang_wip', array('flag_taken' => 1));
            }
        }

        $this->load->model('Model_sales_order');
        #cek jika surat jalan sudah di kirim semua atau belum
        if($jenis == 'FG'){
            $list_produksi = $this->Model_sales_order->list_item_sj_fg($so_id)->result();
        }else if($jenis == 'WIP'){
            $list_produksi = $this->Model_sales_order->list_item_sj_wip($so_id)->result();
        }

        if(empty($list_produksi) && $this->input->post('status_spb') == 1){
            $flag_sj = 1;
        }else{
            $flag_sj = 0;
        }

        $this->db->where('id',$so_id);
        $this->db->update('sales_order', array(
            'flag_invoice'=>0,
            'flag_sj'=>$flag_sj
        ));

        if($jenis == 'FG'){
            #insert bobbin_peminjaman
            $query = $this->db->query('select * from t_surat_jalan_detail where t_sj_id = '.$sjid.' and nomor_bobbin != ""')->result();

            if(!empty($query)){
                $this->load->model('Model_m_numberings');
                $code = $this->Model_m_numberings->getNumbering('BB-BR', $tgl_input);

                $this->db->insert('m_bobbin_peminjaman', array(
                    'no_surat_peminjaman' => $code,
                    'tanggal' => $tgl_input,
                    'id_surat_jalan' => $sjid,
                    'id_customer' => $custid,
                    'status' => 0,
                    'created_by' => $user_id,
                    'created_at' => $tanggal
                ));
                $insert_id = $this->db->insert_id();

                $query = $this->db->query('select *from t_surat_jalan_detail where t_sj_id = '.$sjid)->result();
                foreach ($query as $row) {
                    if($row->nomor_bobbin!=''){
                        $this->db->where('nomor_bobbin', $row->nomor_bobbin);
                        $this->db->update('m_bobbin', array(
                            'borrowed_by' => $custid,
                            'status' => 2,
                            'modified_at' => $tanggal,
                            'modified_by' => $user_id
                        ));

                        $this->db->insert('m_bobbin_peminjaman_detail', array(
                            'id_peminjaman' => $insert_id,
                            'nomor_bobbin' => $row->nomor_bobbin
                        ));
                    }
                }
            }

            //INSERT SURAT PEMINJAMAN BP DAN KARDUS
            $query2 = $this->Model_sales_order->get_bp_kardus($sjid)->result();
            if(!empty($query2)){
                foreach ($query2 as $value) {
                    $this->db->insert('t_surat_peminjaman', array(
                        't_sj_id'=> $sjid,
                        'jenis_packing'=> $value->jenis_packing,
                        'jumlah'=> $value->jumlah,
                        'ket'=> $value->ket
                    ));
                }
            }
        }

        $data = array(
                'status' => 1,
                'approved_at'=> $tanggal,
                'approved_by'=> $user_id
            );
        
        $this->db->where('id', $sjid);
        $this->db->update('t_surat_jalan', $data);

            if($user_ppn == 1){
                $this->load->helper('target_url');
                    $data_post['flag_sj'] = $flag_sj;
                    $data_post['tsj'] = $this->Model_sales_order->tsj_header_only($sjid)->row_array();

                if($jenis == 'FG'){
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang($sjid)->result();
                }elseif($jenis == 'WIP'){
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang_wip($sjid)->result();
                }elseif($jenis == 'RONGSOK'){
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang_rsk($sjid)->result();
                }
                    $post = json_encode($data_post);
                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/SalesOrderAPI/sj');
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
                    $this->db->where('id',$this->input->post('id'));
                    $this->db->update('t_surat_jalan', array('api'=>1));
                }
            }

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'Surat jalan sudah di-approve. Detail Surat jalan sudah disimpan');            
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Surat Jalan, silahkan coba kembali!');
        }             
        
       redirect('index.php/Tolling/surat_jalan');
    }

    function approve_surat_jalan_keluar(){
        $sjid = $this->input->post('id');
        $spbid = $this->input->post('spb_id');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $custid = $this->input->post('id_customer');
        $jenis = $this->input->post('jenis_barang');

        $this->db->trans_start();
        
        #set flag taken
        $loop = $this->db->query("select *from t_surat_jalan_detail where t_sj_id = ".$sjid)->result();
        if ($jenis == 'FG') {
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_gudang_fg', array('flag_taken' => 1, 't_sj_id'=> $sjid));
            }
        } else if ($jenis == 'WIP') {
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_gudang_wip', array('flag_taken' => 1));
            }
        } else if ($jenis == 'RONGSOK'){
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('dtr_detail', array('flag_sj' => $sjid));
            }
        } else if ($jenis == 'AMPAS'){
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_gudang_ampas', array('flag_taken' => 1));
            }
        }

        $this->load->model('Model_tolling_titipan');
        #cek jika surat jalan sudah di kirim semua atau belum
            if($jenis == 'FG'){
                if($this->input->post('status_spb') == 1){
                    $this->db->where('id',$spbid);
                    $this->db->update('t_spb_fg', array(
                        'flag_tolling'=>2
                    ));
                }
            }else if($jenis == 'WIP'){
                if($this->input->post('status_spb') == 1){
                    $this->db->where('id',$spbid);
                    $this->db->update('t_spb_wip', array(
                        'flag_tolling'=>2
                    ));
                }
            }else if($jenis == 'RONGSOK'){
                if($this->input->post('status_spb') == 1){
                    $this->db->where('id',$spbid);
                    $this->db->update('spb', array(
                        'flag_tolling'=>2
                    ));
                }
            }else if($jenis == 'AMPAS'){
                if($this->input->post('status_spb') == 1){
                    $this->db->where('id',$spbid);
                    $this->db->update('t_spb_ampas', array(
                        'flag_tolling'=>2
                    ));
                }
            }


        if($jenis=='FG'){
            #insert bobbin_peminjaman
           $query = $this->db->query('select * from t_surat_jalan_detail where t_sj_id = '.$sjid.' and nomor_bobbin != ""')->result();

            if(!empty($query)){
                $this->load->model('Model_m_numberings');
                $code = $this->Model_m_numberings->getNumbering('BB-BR', $tgl_input);

                $this->db->insert('m_bobbin_peminjaman', array(
                    'no_surat_peminjaman' => $code,
                    'tanggal' => $tgl_input,
                    'id_surat_jalan' => $sjid,
                    'id_customer' => $custid,
                    'status' => 0,
                    'created_by' => $user_id,
                    'created_at' => $tanggal
                ));
                $insert_id = $this->db->insert_id();

                foreach ($query as $row) {
                    if($row->nomor_bobbin!=''){
                        $this->db->where('nomor_bobbin', $row->nomor_bobbin);
                        $this->db->update('m_bobbin', array(
                            'borrowed_by' => $custid,
                            'status' => 2,
                            'modified_at' => $tanggal,
                            'modified_by' => $user_id
                        ));

                        $this->db->insert('m_bobbin_peminjaman_detail', array(
                            'id_peminjaman' => $insert_id,
                            'nomor_bobbin' => $row->nomor_bobbin
                        ));
                    }
                }
            }
        }
        
        $data = array(
                'status' => 1,
                'approved_at'=> $tanggal,
                'approved_by'=> $user_id
            );
        
        $this->db->where('id', $sjid);
        $this->db->update('t_surat_jalan', $data);

            if($user_ppn == 1){
                $this->load->helper('target_url');
                    $this->load->model('Model_sales_order');
                    $this->load->model('Model_tolling_titipan');
                    $data_post['tsj'] = $this->Model_sales_order->tsj_header_only($sjid)->row_array();

                if($jenis == 'FG'){
                    $data_post['spb'] = $this->Model_tolling_titipan->spb_fg($spbid)->row_array();
                    $data_post['spb_detail'] = $this->Model_tolling_titipan->spb_detail_fg($spbid)->result();
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang($sjid)->result();
                }elseif($jenis == 'WIP'){
                    $data_post['spb'] = $this->Model_tolling_titipan->spb_wip($spbid)->row_array();
                    $data_post['spb_detail'] = $this->Model_tolling_titipan->spb_detail_wip($spbid)->result();
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang_wip($sjid)->result();
                }elseif($jenis == 'RONGSOK'){
                    $data_post['spb'] = $this->Model_tolling_titipan->spb_rsk($spbid)->row_array();
                    $data_post['spb_detail'] = $this->Model_tolling_titipan->spb_detail_rsk($spbid)->result();
                    $data_post['gudang'] = $this->Model_sales_order->tsjd_get_gudang_rsk($sjid)->result();
                }
                    $post = json_encode($data_post);
                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/TollingAPI/sj_keluar');
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
            $this->session->set_flashdata('flash_msg', 'Surat jalan sudah di-approve. Detail Surat jalan sudah disimpan');            
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Surat Jalan, silahkan coba kembali!');
        }             

        redirect('index.php/Tolling/surat_jalan_keluar');
    }

    function reject_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $sjid = $this->input->post('sj_id');
        
        #Update status t_surat_jalan
        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $sjid);
        $this->db->update('t_surat_jalan', $data);
        
        $this->db->where('t_sj_id', $sjid);
        $this->db->delete('t_surat_jalan_detail');
        
        $this->session->set_flashdata('flash_msg', 'Surat jalan berhasil direject');
        redirect('index.php/Tolling/surat_jalan');
    }

    function reject_surat_jalan_keluar(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $sjid = $this->input->post('sj_id');
        
        #Update status t_surat_jalan
        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $sjid);
        $this->db->update('t_surat_jalan', $data);

        $this->db->where('t_sj_id', $sjid);
        $this->db->delete('t_surat_jalan_detail');
        
        $this->session->set_flashdata('flash_msg', 'Surat jalan berhasil direject');
        redirect('index.php/Tolling/surat_jalan_keluar');
    }

    function delete_surat_jalan(){
        $id = $this->uri->segment(3);
        $this->db->trans_start();
        if(!empty($id)){
            $this->db->delete('t_surat_jalan', ['id' => $id]);
        }

        if($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data Surat Jalan berhasil dihapus');
            redirect('index.php/Tolling/surat_jalan');
        }
    }

    function delete_surat_jalan_keluar(){
        $id = $this->uri->segment(3);
        $this->db->trans_start();
        if(!empty($id)){
            $this->db->delete('t_surat_jalan', ['id' => $id]);
        }

        if($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data Surat Jalan berhasil dihapus');
            redirect('index.php/Tolling/surat_jalan_keluar');
        }
    }

    function simpan_surat_jalan_keluar(){
        $sjid = $this->input->post('id');
        $data = array(
                'po_id'=>$this->input->post('po_id')
            );
        
        $this->db->where('id', $sjid);
        $this->db->update('t_surat_jalan', $data);

        $this->session->set_flashdata('flash_msg', 'Surat jalan berhasil disimpan');
        redirect('index.php/Tolling/surat_jalan_keluar');
    }
    
    function print_surat_jalan(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $this->load->helper('tanggal_indo');
            $data['header']  = $this->Model_tolling_titipan->show_header_sj($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->load_detail_surat_jalan($id)->result();

            if($data['header']['status']==1){
                $this->load->view('tolling_titipan/print_sj_approve', $data);
            }else{
                $this->load->view('tolling_titipan/print_sj', $data);
            }
        }else{
            redirect('index.php'); 
        }
    }

    function get_jenis_barang(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $jenis_barang = $this->Model_tolling_titipan->get_jenis_barang($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($jenis_barang); 
    }

    function tolling_fg(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/tolling_fg";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->tolling_fg()->result();

        $this->load->view('layout', $data);
    }

    function view_tolling(){
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

            $data['content']= "tolling_titipan/view_tolling";

            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_tolling_fg($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_tolling_fg($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function add_tolling_fg(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $data['user_ppn'] = $this->session->userdata('user_ppn');       
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add_tolling_fg";
        
        $this->load->model('Model_tolling_titipan');
        $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
        $data['marketing_list'] = $this->Model_tolling_titipan->marketing_list()->result();
        $this->load->view('layout', $data);
    }

    function get_detail_so(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->get_detail_so($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    function save_tolling_fg(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        if($user_ppn == 0){
            $this->load->model('Model_m_numberings');
            $code= $this->Model_m_numberings->getNumbering('PO-T', $tgl_input);
        }else{
            $code = 'PO-KMP.'.$tgl_po.'.'.$this->input->post('no_po');
            $count = $this->db->query("Select count(id) as count from po where no_po = '".$code."'")->row_array();
            if($count['count']){
                $this->session->set_flashdata('flash_msg', 'Nomor PO sudah Ada. Please try again!');
                redirect('index.php/Tolling/add_tolling_fg');
            }
        }
        
        if($code){
            $data = array(
                'no_po'=> $code,
                'tanggal'=> $tgl_input,
                'flag_ppn'=> $user_ppn,
                'ppn'=>$this->input->post('ppn'),
                'customer_id'=>$this->input->post('customer_id'),
                'term_of_payment'=>$this->input->post('top'),
                'jenis_po'=>$this->input->post('jenis_barang'),
                'currency'=>$this->input->post('currency'),
                'kurs'=>$this->input->post('kurs'),
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id
            );

            if($this->db->insert('po', $data)){
                redirect('index.php/Tolling/edit_tolling_fg/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Tolling');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Tolling');
        }
    }

    function edit_tolling_fg(){
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

            $data['content']= "tolling_titipan/edit_tolling_fg";
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_tolling($id)->row_array();
            $jenis = $data['header']['jenis_po'];
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
            if($jenis == 'Rongsok'){
                $data['list_barang'] = $this->Model_tolling_titipan->jenis_barang_rsk()->result();
            }else{
                $data['list_barang'] = $this->Model_tolling_titipan->jenis_barang($jenis)->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }

    function load_detail_tolling(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $total = 0;
        $qty = 0;
        $no    = 1;
        $this->load->model('Model_tolling_titipan');
        // $list_barang = $this->Model_tolling_titipan->get_barang_fg()->result();
        
        $myDetail = $this->Model_tolling_titipan->load_tolling_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>('.$row->kode.') '.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,2,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,2,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,2,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $qty += $row->qty;
            $total += $row->total_amount;
            $no++;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total Jumlah </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($qty,2,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right"><strong>Total (Rp) </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,2,',','.').'</strong></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function save_detail_tolling(){
        $return_data = array();
        
        if($this->db->insert('po_detail', array(
            'po_id'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('jenis_barang'),
            'amount'=>str_replace(',', '', $this->input->post('harga')),
            'qty'=>str_replace(',', '', $this->input->post('qty')),
            'total_amount'=>str_replace(',', '', $this->input->post('total'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item rongsok! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail_tolling(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('po_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item tolling detail! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function get_uom_tolling(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $uom= $this->Model_tolling_titipan->get_uom_tolling($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($uom); 
    }

    function get_uom_tolling_rsk(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $uom= $this->Model_tolling_titipan->get_uom_tolling_rsk($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($uom); 
    }

    function update_tolling_fg(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal  = date('Y-m-d');
        
        $this->db->trans_start();

        $this->db->where('id', $id);
        $this->db->update('po', array(
            'customer_id' => $this->input->post('customer_id'),
            'tanggal' => $tgl_input,
            'remarks' => $this->input->post('remarks'),
            'term_of_payment' => $this->input->post('top')
        ));
        
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'PO Tolling berhasil di buat...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat membuat SPB FG, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/po_list');
    }

    function save_stok_laporan(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $id = $this->input->post('jenis_laporan');

        $this->load->model('Model_tolling_titipan');
        $cek = $this->Model_tolling_titipan->get_stok_awal_laporan($tgl_input,$this->input->post('customer_id'),$this->input->post('supplier_id'),$id,$user_ppn,$this->input->post('tipe_laporan'))->row_array();
        if(empty($cek)){
            $this->db->trans_start();

                $this->db->insert('stok_awal_laporan', array(
                    'flag_ppn'=>$user_ppn,
                    'jenis'=>$id,
                    'tipe'=>$this->input->post('tipe_laporan'),
                    'tanggal'=>$tgl_input,
                    'customer_id'=>$this->input->post('customer_id'),
                    'supplier_id'=>$this->input->post('supplier_id'),
                    'netto'=>$this->input->post('netto'),
                    'susut'=>$this->input->post('susut'),
                    'created_by'=> $user_id,
                    'created_at'=> $tanggal
                ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Stok Awal Berhasil di Input');                
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create laporan stok, silahkan coba kembali!');
            }
        }else{
            $this->session->set_flashdata('flash_msg', 'Stok Awal Sudah Pernah di Input'); 
        }
        if($id==1){
            redirect('index.php/Tolling/cek_balance');
        }elseif($id==2){
            redirect('index.php/Tolling/cek_balance_po');
        }
    }

    function update_stok_laporan(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_laporan');
        $id = $this->input->post('id');

        $this->db->trans_start();

            $this->db->where("id",$id);
            $this->db->update("stok_awal_laporan", array(
                'tanggal'=>$tgl_input,
                'tipe'=>$this->input->post('tipe_laporan'),
                'customer_id'=>$this->input->post('customer_id'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'netto'=>$this->input->post('netto'),
                'susut'=>$this->input->post('susut'),
                'created_by'=> $user_id,
                'created_at'=> $tanggal
            ));
            
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'Stok Awal Berhasil di Input');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher  rongsok, silahkan coba kembali!');
        }
        if($jenis==1){
            redirect('index.php/Tolling/cek_balance');
        }elseif($jenis==2){
            redirect('index.php/Tolling/cek_balance_po');
        }
    }

    function edit_stok(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->edit_stok($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }

    function delete_stok(){
        $id = $this->uri->segment(3);
        $jenis = $this->uri->segment(4);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('stok_awal_laporan');            
        }
        $this->session->set_flashdata('flash_msg', 'Data stok berhasil dihapus');
        if($jenis==1){
            redirect('index.php/Tolling/cek_balance');
        }elseif($jenis==2){
            redirect('index.php/Tolling/cek_balance_po');
        }
    }

    function cek_balance(){
        $user_ppn = $this->session->userdata('user_ppn');
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/cek_balance";
        $this->load->model('Model_sales_order');
        $this->load->model('Model_tolling_titipan');
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        $data['list_data'] = $this->Model_tolling_titipan->stok_awal_laporan($user_ppn,1)->result();

        $this->load->view('layout', $data);
    }

    function print_laporan_tolling_so(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn = $this->session->userdata('user_ppn');

        $cust_id = $_GET['l'];
        $data['start'] = date('Y-m-d', strtotime($_GET['ts']));
        $data['end'] = date('Y-m-d', strtotime($_GET['te']));
        // echo $data['start'];die();

            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang WIP";
            $this->load->helper('tanggal_indo');

        $this->load->model('Model_tolling_titipan');
        $data['header']  = $this->Model_tolling_titipan->get_contact_name($cust_id)->row_array();
        $data['header']['jenis'] = 'SO';
        $data['stok_awal'] = $this->Model_tolling_titipan->get_stok_awal_laporan($data['start'],$cust_id,0,1,$ppn,0)->row_array();
        $data['details_bahan'] = $this->Model_tolling_titipan->laporan_bahan_so($cust_id,$ppn,$data['start'],$data['end'])->result();
        $data['details_kirim'] = $this->Model_tolling_titipan->laporan_kirim_so($cust_id,$ppn,$data['start'],$data['end'])->result();
        // print_r($data['details_bahan']);die();
        $this->load->view('tolling_titipan/print_laporan_balance_so', $data);
    }

    function cek_balance_po(){
        $user_ppn = $this->session->userdata('user_ppn');
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/cek_balance_po";
        $this->load->model('Model_beli_sparepart');
        $this->load->model('Model_tolling_titipan');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();;
        $data['list_data'] = $this->Model_tolling_titipan->stok_awal_laporan($user_ppn,2)->result();

        $this->load->view('layout', $data);
    }

    function print_laporan_tolling_po(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn = $this->session->userdata('user_ppn');

        $cust_id = $_GET['l'];
        $data['start'] = date('Y-m-d', strtotime($_GET['ts']));
        $data['end'] = date('Y-m-d', strtotime($_GET['te']));
        // echo $start;die();

            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang WIP";
            $this->load->helper('tanggal_indo');

        $this->load->model('Model_tolling_titipan');
        $data['header']  = $this->Model_tolling_titipan->get_alamat_supplier($cust_id)->row_array();
        $data['stok_awal'] = $this->Model_tolling_titipan->get_stok_awal_laporan($data['start'],0,$cust_id,2,$ppn,0)->row_array();
        $data['header']['jenis'] = 'PO';
        $data['details_bahan'] = $this->Model_tolling_titipan->laporan_kirim_bahan($cust_id,$ppn,$data['start'],$data['end'])->result();
        $data['details_kirim'] = $this->Model_tolling_titipan->laporan_terima($cust_id,$ppn,$data['start'],$data['end'])->result();
        $this->load->view('tolling_titipan/print_laporan_balance_po', $data);
    }

    function view_balance(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/view_balance";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->view_balance($id)->result();

        $this->load->view('layout', $data);
    }

    function po_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');     
        $user_ppn = $this->session->userdata('user_ppn');   
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/po_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->po_list($user_ppn)->result();
        $this->load->model('Model_beli_sparepart');
        $data['bank_list'] = $this->Model_beli_sparepart->bank($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function add_po(){
        $module_name = $this->uri->segment(1);
        $data['user_ppn'] = $this->session->userdata('user_ppn');
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add_po";
        
        $this->load->model('Model_beli_sparepart');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
        // $data['no'] = $this->Model_beli_sparepart->get_last_po('Rongsok')->row_array();
        $this->load->view('layout', $data);
    }

    function save_po(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->db->trans_start();
        if($user_ppn == 0){
            $this->load->model('Model_m_numberings');
            if($this->input->post('jenis_barang')=='FG'){
                $num = 'POFG';
            }elseif($this->input->post('jenis_barang')=='WIP'){
                $num = 'POWIP';
            }elseif($this->input->post('jenis_barang')=='Rongsok'){
                $num = 'PO';
            }
            $code = $this->Model_m_numberings->getNumbering($num, $tgl_input); 
        }else{
            $code = 'PO-KMP.'.$tgl_po.'.'.$this->input->post('no_po');
            $count = $this->db->query("Select count(id) as count from po where no_po = '".$code."'")->row_array();
            if($count['count']){
                $this->session->set_flashdata('flash_msg', 'Nomor PO sudah Ada. Please try again!');
                redirect('index.php/Tolling/add_po');
            }
        }

        $data = array(
            'no_po'=> $code,
            'tanggal'=> $tgl_input,
            'flag_ppn'=> $user_ppn,
            'flag_tolling'=> 1,
            'type'=> 0,
            'ppn'=> $this->input->post('ppn'),
            'diskon'=>str_replace('.', '', $this->input->post('diskon')),
            'materai'=>$this->input->post('materai'),
            'currency'=> $this->input->post('currency'),
            'kurs'=> $this->input->post('kurs'),
            'supplier_id'=>$this->input->post('supplier_id'),
            'remarks'=> $this->input->post('remarks'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'jenis_po'=>$this->input->post('jenis_barang'),
            'created'=> $tanggal,
            'created_by'=> $user_id,
            'modified'=> $tanggal,
            'modified_by'=> $user_id
        );
        $this->db->insert('po', $data);
        $po_id = $this->db->insert_id();

            if($user_ppn == 1){
                $this->load->helper('target_url');

                $data_id = array('reff1' => $po_id);
                $data_post = array_merge($data, $data_id);

                $data_post = http_build_query($data_post);

                $ch = curl_init(target_url().'api/BeliRongsokAPI/po');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
            }

        if($this->db->trans_complete()){
            redirect('index.php/Tolling/edit_po/'.$po_id);  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO rongsok gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/BeliRongsok');  
        }            
    }    

    function edit_po(){
        $module_name = $this->uri->segment(1);
        $data['user_ppn'] = $this->session->userdata('user_ppn');
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "tolling_titipan/edit_po";
            $this->load->model('Model_beli_rongsok');
            $data['header'] = $this->Model_beli_rongsok->show_header_po($id)->row_array();
            $jenis=$data['header']['jenis_po'];

            $this->load->model('Model_tolling_titipan');
            if($jenis=='FG'){
                $data['list_barang'] = $this->Model_tolling_titipan->jenis_barang($jenis)->result();
            }elseif($jenis=='WIP'){
                $data['list_barang'] = $this->Model_tolling_titipan->jenis_barang($jenis)->result();
            }else{
                $data['list_barang'] = $this->Model_tolling_titipan->jenis_barang_rsk()->result();
            }

            if($data['header']['status']==0){
                $data['count'] = $this->Model_beli_rongsok->count_po_detail($id)->row_array();
            }else{
                $data['count'] = $this->Model_beli_rongsok->count_po_detail($id)->row_array();
                $data['list_data'] = $this->Model_tolling_titipan->load_detail_po($id)->result();
                if($jenis=='Rongsok'){
                    $data['list_detail'] = $this->Model_beli_rongsok->show_data_po($id)->result();
                }else{
                    $data['list_detail'] = $this->Model_tolling_titipan->show_data_po($id)->result();
                }
            }

            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function close_po(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $user_ppn = $this->session->userdata('user_ppn');
        $this->db->trans_start();
        
        $data = array(
                'status'=> 1,
                'flag_pelunasan'=> 1,
                'modified'=> $tanggal,
                'modified_by'=>$user_id,
                'remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('po', $data);

            if($user_ppn == 1){
                $this->load->helper('target_url');

                $data_post = $data;
                $data_post['po_id'] = $this->input->post('header_id');

                $data_post = http_build_query($data_post);

                $ch = curl_init(target_url().'api/BeliFinishGoodAPI/close_po');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
            }
        
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'PO Berhasil di Close');
            redirect('index.php/Tolling/po_list');
        }else{
            $this->session->set_flashdata('flash_msg', 'PO GAGAL di Close');
            redirect('index.php/Tolling/po_list');
        }
    }

    function update_po(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $data = array(
                'tanggal'=> $tgl_input,
                'supplier_id'=>$this->input->post('supplier_id'),
                'term_of_payment'=>$this->input->post('term_of_payment'),
                'remarks'=>$this->input->post('remarks'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('po', $data);

        if($this->session->userdata('user_ppn')==1){
            $this->load->helper('target_url');
            
            $data_post['master'] = $data;
            $data_post['po_id'] = $this->input->post('id');

            $this->load->model('Model_beli_rongsok');
            $data_post['details'] = $this->Model_beli_rongsok->load_detail_only($this->input->post('id'))->result();

            $detail_post = json_encode($data_post);

            $ch = curl_init(target_url().'api/BeliFinishGoodAPI/po_detail');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);
        }
        
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data PO Finish Good berhasil disimpan');
            redirect('index.php/Tolling/po_list');
        }else{
            $this->session->set_flashdata('flash_msg', 'Data PO Finish Good gagal disimpan');
            redirect('index.php/Tolling/'.$this->input->post('id'));
        }
    }

    function dtt_list(){
        $module_name = $this->uri->segment(1);
        $flag_ppn    = $this->session->userdata('user_ppn');
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/dtt_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->dtt_list($flag_ppn)->result();

        $this->load->view('layout', $data);
    }

    function create_dtt(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $data['user_ppn'] = $this->session->userdata('user_ppn');       
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add_dtt";
        
        $this->load->model('Model_beli_sparepart');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
        $this->load->model('Model_gudang_fg');
        $data['packing'] = $this->Model_gudang_fg->packing_fg_list()->result();
        $this->load->view('layout', $data);
    }

    function save_dtt(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Y-m-d', strtotime($this->input->post('tanggal_po')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('DTT', $tgl_input); 
        
        if($code){
            $this->db->trans_start();    
            $data = array(
                'no_dtt'=> $code,
                'flag_ppn'=>$user_ppn,
                'tanggal'=> $tgl_input,
                'no_sj'=>$this->input->post('no_sj'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'jenis_packing'=>$this->input->post('packing'),
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
            );
            $this->db->insert('dtt', $data);
            $id = $this->db->insert_id();

            if($this->db->trans_complete()){
                redirect('index.php/Tolling/edit_dtt/'.$id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Tolling');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Tolling');
        }
    }

    function edit_dtt(){
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

            $this->load->model('Model_tolling_titipan');
            $this->load->model('Model_gudang_fg');
            $data['header'] = $this->Model_tolling_titipan->show_header_dtt($id)->row_array();
            $data['jenis_barang'] = $this->Model_gudang_fg->barang_fg_list()->result();
            if($data['header']['nama_jenis_packing']=='KARDUS'){
                $data['content']= "tolling_titipan/edit_dtt_kardus";
                $data['packing'] =  $this->Model_gudang_fg->get_bobbin_g($data['header']['jenis_packing'])->result();
            }else if($data['header']['nama_jenis_packing']=='BOBBIN'){
                $data['content']= "tolling_titipan/edit_dtt_bobbin";
            }else if($data['header']['nama_jenis_packing']=='KERANJANG'){
                $this->load->model('Model_gudang_fg');
                $data['packing'] =  $this->Model_gudang_fg->get_bobbin_g($data['header']['jenis_packing'])->result();
                // $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KERANJANG')->result();
                $data['content']= "tolling_titipan/edit_dtt_bobbin";
            }else if($data['header']['nama_jenis_packing']==('BOBBIN PLASTIK' || 'KERANJANG SDM')){
                $data['content']= "tolling_titipan/edit_dtt_b600g";
                $this->load->model('Model_gudang_fg');
                $data['packing'] =  $this->Model_gudang_fg->get_bobbin_g($data['header']['jenis_packing'])->result();
            }else{
                $data['content']= "tolling_titipan/edit_dtt";
            }
            $jenis = $data['header']['jenis_barang'];
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
            $data['list_barang'] = $this->Model_tolling_titipan->jenis_barang($jenis)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }

    function edit_dtt_header(){
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

            $this->load->model('Model_tolling_titipan');
            $this->load->model('Model_gudang_fg');
            $data['header'] = $this->Model_tolling_titipan->show_header_dtt($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtt($id)->result();
            $data['content']= "tolling_titipan/edit_dtt_header";

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }

    function update_dtt_header(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dtt', array(
                    'tanggal'=>$tgl_input,
                    'no_sj'=>$this->input->post('no_sj'),
                    'remarks'=>$this->input->post('remarks'),
                    'modified'=>$tanggal,
                    'modified_by'=>$user_id
        ));

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'DTT berhasil diupdate...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat updates DTT, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/edit_dtt_header/'.$this->input->post('id'));
    }

    function delete_dtt(){
        $user_id  = $this->session->userdata('user_id');
        $id = $this->uri->segment(3);
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->delete('dtt');

        $this->db->where('dtt_id',$id);
        $this->db->delete('dtt_detail');

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'DTT berhasil dihapus...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat delete DTT, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/dtt_list/');
    }

    function delete_detail_rambut(){
        $id = $this->input->post('id');
        $return_data = array();

        $this->db->where('id', $id);
        if($this->db->delete('dtt_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function save_detail_rambut(){
        $return_data = array();
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_id  = $this->session->userdata('user_id');

        $this->db->trans_start();

        $this->db->insert('dtt_detail', array(
            'dtt_id'=>$this->input->post('id'),
            'jenis_barang_id' => $this->input->post('jb'),
            'bruto' => $this->input->post('bruto'),
            'berat_bobbin' => $this->input->post('berat'),
            'netto' => $this->input->post('netto'),
            'no_bobbin' => $this->input->post('no_bobbin'),
            'no_packing' => $this->input->post('no_packing'),
            'line_remarks' => $this->input->post('keterangan'),
            'created' => $tanggal,
            'created_by' => $user_id,
            'tanggal_masuk'=> $tgl_input
        ));
        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function save_dtt_detail(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');
        $dtt_id = $this->input->post('id');

        $this->db->trans_start();

        $this->db->where('id', $dtt_id);
        $this->db->update('dtt', array(
            'tanggal'=>$this->input->post('tanggal'),
            'no_sj'=>$this->input->post('no_sj')
        ));

        $details = $this->input->post('myDetails');
        foreach ($details as $row){
            if($jenis=='FG'){
                if($row['fg_id']!=0 && $row['no_packing']!=''){
                        $this->db->insert('dtt_detail', array(
                            'dtt_id'=>$dtt_id,
                            'jenis_barang_id'=>$row['fg_id'],
                            'bruto'=>$row['bruto'],
                            'berat_bobbin'=>$row['berat_bobbin'],
                            'netto'=>$row['netto'],
                            'no_bobbin'=>$row['no_bobbin'],
                            'no_packing'=>$row['no_packing'],
                            'created'=>$tanggal,
                            'created_by'=>$user_id,
                            'tanggal_masuk'=>$tgl_input
                        ));
                    if($row['no_bobbin']!=''){
                        $updatebobbin = array(
                            'status'=>1,
                            'modified_at' => $tanggal,
                            'modified_by' => $user_id
                    );
                        $this->db->where('nomor_bobbin', $row['no_bobbin']);
                        $this->db->update('m_bobbin', $updatebobbin);
                    }
                }
            }else if($jenis=='WIP'){
                if($row['jb_id']!=0 && $row['netto']!= (0 || '')){
                        $this->db->insert('dtt_detail', array(
                            'dtt_id'=>$dtt_id,
                            'jenis_barang_id'=>$row['jb_id'],
                            'qty'=>$row['qty'],
                            'netto'=>$row['netto'],
                            'created'=>$tanggal,
                            'created_by'=>$user_id,
                            'tanggal_masuk'=>$tgl_input
                        ));
                }
            }
        }

        $this->db->where('id',$this->input->post('id'));
        $this->db->update('dtt', array(
            'remarks'=>$this->input->post('remarks')
        ));

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'DTT berhasil dibuat');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTT, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/dtt_list');
    }

    function load_detail_rambut(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_tolling_titipan');
        $myDetail = $this->Model_tolling_titipan->load_detail_dtt($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue disabled"><i class="fa fa-dashboard"></i> Timbang</a></td>';
            $tabel .= '<td>'.$row->bruto.'</td>';
            $tabel .= '<td>'.$row->berat_bobbin.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->no_packing.'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a>'
                    . '<a href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay"'
                    . 'onclick="printBarcode('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Print Barcode </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function spb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/spb_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->spb_list()->result();

        $this->load->view('layout', $data);
    }

    function add_spb(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/add_spb";
        $this->load->model('Model_tolling_titipan');
        
        $this->load->view('layout', $data);
    }

    function save_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');

        $this->load->model('Model_m_numberings');
        if($jenis == 'FG'){
            $code = $this->Model_m_numberings->getNumbering('SPB-FGT', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb'=> $code,
                    'tanggal'=> $tgl_input,
                    'jenis_spb'=> 4,
                    'flag_tolling'=> 1,
                    'keterangan'=>$this->input->post('remarks'),
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('t_spb_fg', $data)){
                    redirect('index.php/GudangFG/edit_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Tolling/add_spb');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Tolling/spb_list');
            }
        }else if($jenis == 'WIP'){
            $code = $this->Model_m_numberings->getNumbering('SPB-WIPT', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb_wip'=> $code,
                    'tanggal'=> $tgl_input,
                    'flag_produksi'=> 4,
                    'flag_tolling'=> 1,
                    'keterangan'=>$this->input->post('remarks'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('t_spb_wip', $data)){
                    redirect('index.php/GudangWIP/edit_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB WIP gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Tolling/add_spb');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Tolling/spb_list');
            }
        }else if($jenis == 'RONGSOK'){
            $code = $this->Model_m_numberings->getNumbering('SPB-RSKT', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb'=> $code,
                    'tanggal'=> $tgl_input,
                    'jenis_barang'=>1,
                    'jenis_spb'=> 4,//JENIS SPB TOLLING
                    'flag_tolling'=> 1,
                    'jumlah'=> $this->input->post('jumlah_rsk'),
                    'remarks'=>$this->input->post('remarks'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('spb', $data)){
                    redirect('index.php/Ingot/add_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Tolling/add_spb');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Tolling/spb_list');
            }
        }else if($jenis == 'AMPAS'){
            $code = $this->Model_m_numberings->getNumbering('SPB-AMPT', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb_ampas'=> $code,
                    'tanggal'=> $tgl_input,
                    'flag_tolling'=> 1,
                    'keterangan'=>$this->input->post('remarks'),
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('t_spb_ampas', $data)){
                    redirect('index.php/PengirimanAmpas/edit_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Tolling/add_spb');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Tolling/spb_list');
            }
        }
    }

    function edit_spb(){
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

            $data['content']= "gudang_fg/edit_spb";
            $this->load->model('Model_gudang_fg');
            $data['header'] = $this->Model_gudang_fg->show_header_spb($id)->row_array();
            $data['details'] =   $this->Model_gudang_fg->show_detail_spb($id)->result();
    
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function view_spb(){
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

            $data['content']= "gudang_fg/view_spb";

            $this->load->model('Model_gudang_fg');
            $data['list_barang'] = $this->Model_gudang_fg->barang_fg_stock_list()->result();
            $data['myData'] = $this->Model_gudang_fg->show_header_spb($id)->row_array();
            $data['myDetail'] = $this->Model_gudang_fg->show_detail_spb($id)->result();
            $data['myDetailSaved'] = $this->Model_gudang_fg->show_detail_spb_saved($id)->result();
            $data['detailSPB'] = $this->Model_gudang_fg->show_detail_spb_fulfilment($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function filter_spb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['jenis']     = $id;
            $data['group_id']  = $group_id;
            $data['judul']     = "Finance";
            $data['content']   = "tolling_titipan/filter_spb";

            $this->load->model('Model_tolling_titipan');
            if($id == 'rongsok'){
                $data['list_data'] = $this->Model_tolling_titipan->list_data_filter_rsk()->result();
            }else if($id == 'wip'){
                $data['list_data'] = $this->Model_tolling_titipan->list_data_filter_wip()->result();
            }else if($id == 'fg'){
                $data['list_data'] = $this->Model_tolling_titipan->list_data_filter_fg()->result();
            }

            $this->load->view('layout', $data);
        }else{
            redirect('index.php/Tolling');
        }
    }

    function get_no_spb(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        if($id == 'RONGSOK'){
            $data = $this->Model_tolling_titipan->get_spb_list_rsk($id)->result();
        }else if($id == 'WIP'){
            $data = $this->Model_tolling_titipan->get_spb_list_wip($id)->result();
        }else if($id == 'FG'){
            $data = $this->Model_tolling_titipan->get_spb_list_fg($id)->result();
        }else if($id == 'AMPAS'){
            $data = $this->Model_tolling_titipan->get_spb_list_ampas($id)->result();
        }
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_spb;
        } 
        print form_dropdown('no_spb', $arr_so);
    }

    function get_po_tolling(){ 
        $user_ppn = $this->session->userdata('user_ppn');
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->get_po_tolling($id, $user_ppn)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_po;
        } 
        print form_dropdown('no_po', $arr_so);
    }

    // function create_voucher(){
    //     $id = $this->input->post('id');
    //     $this->load->helper('terbilang_helper');
    //     $this->load->model('Model_tolling_titipan');
    //     $data = $this->Model_tolling_titipan->voucher_po($id)->row_array();
    //     $terbilang = $data['nilai_po'];
    //     $sisa = $data['nilai_po'] - $data['nilai_dp'];
    //     $data['nilai_po'] = number_format($data['nilai_po'],0,',','.');
    //     $data['nilai_dp'] = number_format($data['nilai_dp'],0,',','.');
    //     $data['sisa']     = number_format($sisa,0,',','.');

    //     $data['terbilang'] = ucwords(number_to_words($terbilang));
        
    //     header('Content-Type: application/json');
    //     echo json_encode($data);  
    // }

    function create_voucher(){
        $id = $this->input->post('id');
        // $this->load->helper('terbilang_d_helper');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->voucher_po($id)->row_array();
        if($data['ppn']==1){
            if($data['nilai_po']==0){
                $nilai_po = 0;
                $data['nilai_ppn'] = 0;
            }else{
                $data['nilai_before_ppn'] = number_format($data['nilai_po'],0,'.',',');
                $nilai_po = ($data['nilai_po']-$data['diskon'])*110/100+$data['materai'];
                $data['nilai_ppn'] = number_format($data['nilai_po']*10/100,0,'.',',');
            }
        }else{
            if($data['nilai_po']==0){
                $nilai_po = 0;
                $data['nilai_ppn'] = 0;
            }else{
                $nilai_po = $data['nilai_po']-$data['diskon'];
                $data['nilai_ppn'] = 0;
            }
        }

        // $terbilang = $nilai_po;
        $sisa = $nilai_po - $data['nilai_dp'];
        $data['materai'] = number_format($data['materai'],0,'.',',');
        $data['diskon'] = number_format($data['diskon'],0,'.',',');
        $data['nilai_po'] = number_format($nilai_po,0,'.',',');
        $data['nilai_dp'] = number_format($data['nilai_dp'],0,'.',',');
        $data['sisa']     = number_format($sisa,0,'.',',');
        // $nilai_po = $data['nilai_po'];
        // $data['terbilang'] = ucwords(number_to_words_d($terbilang, $data['currency']));

        header('Content-Type: application/json');
        echo json_encode($data);    
    }

    function save_voucher(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $nilai_po  = str_replace(',', '', $this->input->post('nilai_po'));
        $nilai_dp  = str_replace(',', '', $this->input->post('nilai_dp'));
        $amount  = str_replace(',', '', $this->input->post('amount'));
        $id = $this->input->post('id');
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('VTL', $tgl_input);
        if($nilai_po-($nilai_dp+$amount)>0){
            $jenis_voucher = 'DP';
        }else{
            $jenis_voucher = 'Pelunasan';
            $this->db->where('id', $id);
            $this->db->update('po', array('status'=>4));
        } 

        if($code){ 
            $this->db->insert('voucher', array(
                'no_voucher'=>$code,
                'tanggal'=>$tgl_input,
                'jenis_voucher'=>$jenis_voucher,
                'po_id'=>$this->input->post('id'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'amount'=>str_replace(',', '', $this->input->post('amount')),
                'keterangan'=>$this->input->post('keterangan'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Voucher finish good berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher finish good, silahkan coba kembali!');
            }
            redirect('index.php/Tolling/po_list');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher finish good gagal, penomoran belum disetup!');
            redirect('index.php/Tolling/po_list');
        }
    }

    function save_voucher_pembayaran(){
        $ppn = $this->session->userdata('user_ppn');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Y', strtotime($this->input->post('tanggal')));
        $nilai_po  = str_replace(',', '', $this->input->post('nilai_po'));
        $jumlah_dibayar  = str_replace(',', '', $this->input->post('jumlah_dibayar'));
        $amount  = str_replace(',', '', $this->input->post('amount'));
        if($nilai_po-($jumlah_dibayar+$amount)>0){
            $jenis_voucher = 'Parsial';
        }else{
            $jenis_voucher = 'Pelunasan';
        }
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');

            if($ppn==0){
                if($this->input->post('bank_id')<=3){
                    $num = 'KK';
                }else{
                    $num = 'BK';
                }
                $code_um = $this->Model_m_numberings->getNumbering($num);
            }else{
                if($this->input->post('bank_id')<=3){
                    $code_um = 'KK-KMP.'.$tgl_code.'.'.$this->input->post('no_uk');
                }else{
                    $code_um = 'BK-KMP.'.$tgl_code.'.'.$this->input->post('no_uk');
                }
            }

            $data_f = array(
                'jenis_trx'=>1,
                'nomor'=>$code_um,
                'flag_ppn'=>$ppn,
                'tanggal'=>$tgl_input,
                'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
                'no_giro'=>$this->input->post('nomor_giro'),
                'id_bank'=>$this->input->post('bank_id'),
                'id_vc'=>0,
                'currency'=>$this->input->post('currency'),
                'kurs'=>$this->input->post('kurs'),
                'nominal'=>str_replace(',', '', $amount),
                'created_at'=>$tanggal,
                'created_by'=>$user_id
            );
            $this->db->insert('f_kas', $data_f);
            $fk_id = $this->db->insert_id();

        if($ppn==1){
            $this->load->helper('target_url');
            // $url = target_url().'api/BeliSparepartAPI/numbering?id=VRSK-KMP&tgl='.$tgl_input;
            // $ch2 = curl_init();
            // curl_setopt($ch2, CURLOPT_URL, $url);
            // // curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "DELETE");
            // // curl_setopt($ch2, CURLOPT_POSTFIELDS, "group=3&group_2=1");
            // curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch2, CURLOPT_HEADER, 0);

            // $result2 = curl_exec($ch2);
            // $result2 = json_decode($result2);
            // curl_close($ch2);
            // $code = $result2->code;
            $code = $this->Model_m_numberings->getNumbering('VTL-KMP', $tgl_input);
        }else{
            $code = $this->Model_m_numberings->getNumbering('VTL', $tgl_input); 
        }

        if($code){ 
            $data_v = array(
                'no_voucher'=>$code,
                'tanggal'=>$tgl_input,
                'jenis_voucher'=>$jenis_voucher,
                'flag_ppn'=>$ppn,
                'status'=>1,
                'po_id'=>$this->input->post('id'),
                'id_fk'=>$fk_id,
                'supplier_id'=>$this->input->post('supplier_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'amount'=>$amount,
                'keterangan'=>$this->input->post('keterangan'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->insert('voucher', $data_v);
            $id_vc = $this->db->insert_id();
            
            $this->db->where('id', $this->input->post('id'));
            if($jenis_voucher=='Pelunasan' && $this->input->post('status_vc')==3){
                $update_po = array('flag_pelunasan'=>1, 'status'=>4);
            }else{
                $update_po = array('flag_dp'=>1);
            }
            $this->db->update('po', $update_po);
            
            if($ppn==1){
                
                $data_post['voucher'] = array_merge($data_v, array('reff1' => $id_vc));
                $data_post['f_kas'] = array_merge($data_f, array('reff1' => $fk_id));
                $data_post['update_po'] = $update_po;
                $detail_post = json_encode($data_post);

                $ch = curl_init(target_url().'api/BeliRongsokAPI/voucher');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
            }

            if($this->db->trans_complete()){  
                $this->session->set_flashdata('flash_msg', 'Voucher pembayaran Tolling berhasil di-create dengan nomor : '.$code);
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher pembayaran Tolling, silahkan coba kembali!');
            }
            redirect('index.php/Tolling/po_list');
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher pembayaran Tolling gagal, penomoran belum disetup!');
            redirect('index.php/Tolling/po_list');
        }
    }

    function voucher_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');     
        $user_ppn = $this->session->userdata('user_ppn');   
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $this->load->model('Model_beli_fg');
        if($user_ppn==1){
            $data['content']= "tolling_titipan/voucher_list_ppn";
            $data['list_data'] = $this->Model_beli_fg->voucher_list_ppn($user_ppn)->result();
        }else{
            $data['content']= "tolling_titipan/voucher_list";
            $data['list_data'] = $this->Model_beli_fg->voucher_list($user_ppn)->result();
        }

        $this->load->view('layout', $data);
    }

    function print_barcode_dtt(){
        $fg_id = $_GET['fg'];
        $bruto = $_GET['b'];
        $berat_bobbin = $_GET['bp'];
        $netto = $_GET['n'];
        $no_packing = $_GET['np'];
        if($netto){

        $this->load->model('Model_sales_order');
        $data = $this->Model_sales_order->get_jb($fg_id)->row_array();

        $current = '';
        $data_printer = $this->db->query("select * from m_print_barcode_line")->result_array();
        $data_printer[17]['string1'] = 'BARCODE 488,335,"39",41,0,180,2,6,"'.$data['kode'].'"';
        $data_printer[18]['string1'] = 'TEXT 386,289,"ROMAN.TTF",180,1,8,"'.$data['kode'].'"';
        $data_printer[22]['string1'] = 'BARCODE 612,101,"39",41,0,180,2,6,"'.$no_packing.'"';
        $data_printer[23]['string1'] = 'TEXT 426,55,"ROMAN.TTF",180,1,8,"'.$no_packing.'"';
        $data_printer[24]['string1'] = 'TEXT 499,260,"4",180,1,1,"'.$no_packing.'"';
        $data_printer[25]['string1'] = 'TEXT 495,226,"ROMAN.TTF",180,1,14,"'.$bruto.'"';
        $data_printer[26]['string1'] = 'TEXT 495,188,"ROMAN.TTF",180,1,14,"'.$berat_bobbin.'"';
        $data_printer[27]['string1'] = 'TEXT 495,147,"0",180,14,14,"'.$netto.'"';
        $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['jenis_barang'].'"';
        $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode'].'"';
        $jumlah = count($data_printer);
        for($i=0;$i<$jumlah;$i++){
        $current .= $data_printer[$i]['string1']."\n";
        }
        echo "<form method='post' id=\"coba\" action=\"http://localhost/print/print.php\">";
        echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
        echo "</form>";
        echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
        }else{
            'GAGAL';
        }
    }

    function get_bobbin(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_fg');
        $barang= $this->Model_beli_fg->show_data_bobbin($id)->row_array();
        // $this->load->model('Model_tolling_titipan');
        // $check = $this->Model_tolling_titipan->check_urut()->row_array();
        // $no_urut = $check['no_urut'];
        // $no_urut = $no_urut + 1;
        // switch (strlen($no_urut)) {
        //     case 1 : $urutan = "000".$no_urut;
        //         break;
        //     case 2 : $urutan = "00".$no_urut;
        //         break;
        //     case 3 : $urutan = "0".$no_urut;
        //         break;
            
        //     default:
        //         $urutan = $no_urut;
        //         break;
        // }

        $no_bobbin = $barang['nomor_bobbin'];
        $kode_bobbin = substr($no_bobbin, 0,1);
        $urut_bobbin = substr($no_bobbin, 1,4);
        $ukuran = $this->input->post('ukuran');
        $barang['no_packing'] = date("ymd").$kode_bobbin.$ukuran.$urut_bobbin;
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function print_barcode_kardus(){
        $id = $_GET['id'];
        if($id){

        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->get_detail_dtt($id)->row_array();
        $berat = $data['bruto'] - $data['netto'];

        $current = '';
        $data_printer = $this->db->query("select * from m_print_barcode_line")->result_array();
        $data_printer[17]['string1'] = 'BARCODE 488,335,"39",41,0,180,2,6,"'.$data['kode'].'"';
        $data_printer[18]['string1'] = 'TEXT 386,289,"ROMAN.TTF",180,1,8,"'.$data['kode'].'"';
        $data_printer[22]['string1'] = 'BARCODE 612,101,"39",41,0,180,2,6,"'.$data['no_packing'].'"';
        $data_printer[23]['string1'] = 'TEXT 426,55,"ROMAN.TTF",180,1,8,"'.$data['no_packing'].'"';
        $data_printer[24]['string1'] = 'TEXT 499,260,"4",180,1,1,"'.$data['no_packing'].'"';
        $data_printer[25]['string1'] = 'TEXT 495,226,"ROMAN.TTF",180,1,14,"'.$data['bruto'].'"';
        $data_printer[26]['string1'] = 'TEXT 495,188,"ROMAN.TTF",180,1,14,"'.$berat.'"';
        $data_printer[27]['string1'] = 'TEXT 495,147,"0",180,14,14,"'.$data['netto'].'"';
        $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['jenis_barang'].'"';
        $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode'].'"';
        $jumlah = count($data_printer);
        for($i=0;$i<$jumlah;$i++){
        $current .= $data_printer[$i]['string1']."\n";
        }
        echo "<form method='post' id=\"coba\" action=\"http://localhost/print/print.php\">";
        echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
        echo "</form>";
        echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
        }else{
            'GAGAL';
        }
    }

    function close_so(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $jenis    = $this->input->post('jenis_barang');
        
        #Update status t_surat_jalan
        $data = array(
                'flag_invoice'=>1,
                'flag_sj'=>1,
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sales_order', $data);

        if($jenis=='FG'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('t_spb_fg', array(
                'status'=>1,
            ));
        }elseif($jenis=='WIP'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('t_spb_wip', array(
                'status'=>1,
            ));
        }elseif($jenis=='RONGSOK'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('spb', array(
                'status'=>1,
            ));
        }elseif($jenis=='AMPAS'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('t_spb_ampas', array(
                'status'=>1,
            ));
        }
        
        $this->session->set_flashdata('flash_msg', 'Sales Order berhasil di close');
        redirect('index.php/Tolling/');
    }

    function open_so(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $jenis    = $this->input->post('jenis_barang');
        
        #Update status t_surat_jalan
        $data = array(
                'flag_invoice'=>0,
                'flag_sj'=>0,
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sales_order', $data);

        if($jenis=='FG'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('t_spb_fg', array(
                'status'=>4,
            ));
        }elseif($jenis=='WIP'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('t_spb_wip', array(
                'status'=>4,
            ));
        }elseif($jenis=='RONGSOK'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('spb', array(
                'status'=>4,
            ));
        }elseif($jenis=='AMPAS'){
            $this->db->where('id', $this->input->post('id_spb'));
            $this->db->update('t_spb_ampas', array(
                'status'=>4,
            ));
        }
        
        $this->session->set_flashdata('flash_msg', 'Sales Order berhasil di open');
        redirect('index.php/Tolling/');
    }

    function open_inv(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $jenis    = $this->input->post('jenis_barang');
        
        #Update status t_surat_jalan
        $data = array(
                'flag_invoice'=>0,
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sales_order', $data);
        
        $this->session->set_flashdata('flash_msg', 'Invoice berhasil di open');
        redirect('index.php/Finance/add_invoice');
    }

    function open_sj(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $jenis    = $this->input->post('jenis_barang');
        
        #Update status t_surat_jalan
        $data = array(
                'flag_sj'=>0,
                'flag_invoice'=>0,
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sales_order', $data);
        
        $this->session->set_flashdata('flash_msg', 'Surat Jalan berhasil di open');
        redirect('index.php/Tolling/add_surat_jalan');
    }

    function dtwip_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');    
        $user_ppn = $this->session->userdata('user_ppn');         
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/dtwip_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->dtwip_list($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function create_dtwip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/create_dtwip";
        $this->load->model('Model_beli_wip');
        $data['list_wip_on_po'] = $this->Model_beli_wip->list_wip()->result();
        
        $this->load->model('Model_sales_order');
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        $this->load->view('layout', $data);   
    }

    function save_dtwip(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn =  $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        if($user_ppn == 1){
            $code = $this->Model_m_numberings->getNumbering('DTWP-KMP', $tgl_input);
        }else{
            $code = $this->Model_m_numberings->getNumbering('DTWIP', $tgl_input); 
        }

        if($code){        
            $data = array(
                        'no_dtwip'=> $code,
                        'flag_ppn'=> $user_ppn,
                        'tanggal'=> $tgl_input,
                        'customer_id'=> $this->input->post('customer_id'),
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id
                    );
            $this->db->insert('dtwip', $data);
            $dtwip_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if($row['wip_id']!=0){
                    $this->db->insert('dtwip_detail', array(
                        'dtwip_id'=>$dtwip_id,
                        'jenis_barang_id'=>$row['wip_id'],
                        'qty' => $row['qty'],
                        'berat'=>$row['berat'],
                        'line_remarks'=>$row['line_remarks'],
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
                }
            }
                    
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTWIP berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTWIP, silahkan coba kembali!');
            }
            redirect('index.php/Tolling/dtwip_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan DTWIP gagal, penomoran belum disetup!');
            redirect('index.php/Tolling/dtwip_list');
        }
    }

    function print_balance(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $this->load->helper('tanggal_indo');
            $data['header']  = $this->Model_tolling_titipan->show_header_so($id)->row_array();
            $data['header']['jenis'] = 'SO';
            $data['details_bahan'] = $this->Model_tolling_titipan->details_bahan($id)->result();
            $data['details_kirim'] = $this->Model_tolling_titipan->details_kirim($id)->result();

            $this->load->view('tolling_titipan/print_balance', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_balance_sp(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $this->load->model('Model_beli_fg');
            $this->load->helper('tanggal_indo');
            $data['header']  = $this->Model_beli_fg->show_header_po($id)->row_array();
            $data['header']['jenis'] = 'PO';
            $data['details_bahan'] = $this->Model_tolling_titipan->details_kirim_bahan($id)->result();
            $data['details_kirim'] = $this->Model_tolling_titipan->details_terima($id)->result();

            $this->load->view('tolling_titipan/print_balance', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function laporan_sisa_tolling_customer(){
        $user_ppn = $this->session->userdata('user_ppn');
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/laporan_sisa_tolling_customer";
        $this->load->model('Model_sales_order');
        $this->load->model('Model_tolling_titipan');

        $this->load->view('layout', $data);
    }

    function print_sisa_tolling_customer(){
        $module_name = $this->uri->segment(1);
        $ppn = $this->session->userdata('user_ppn');
        $this->load->helper('tanggal_indo');
        $b = $_GET['b'];
        $t = $_GET['t'];

        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $this->load->model('Model_tolling_titipan');
        if($b==0){
            $data['detailLaporan'] = $this->Model_tolling_titipan->print_sisa_tolling_customer()->result();
            $this->load->view('tolling_titipan/print_sisa_tolling_customer', $data);   
        }else{  
            $data['tgl'] = $t.'-'.$b.'-01';
            if($b==12){
                $b='01';
                $t+=1;
            }else if($b>9){
                $b+=1;
            }else{
                $b+=1;
                $b='0'.$b;
            }

            $tgl = $t.'-'.$b.'-01';
            // echo $tgl;
            $data['detailLaporan'] = $this->Model_tolling_titipan->print_sisa_tolling_customer2($tgl,$ppn)->result();
            // print_r($data['detailLaporan']);
            $this->load->view('tolling_titipan/print_sisa_tolling_customer2', $data);   
        }
    }

    function laporan_sisa_tolling_supplier(){
        $user_ppn = $this->session->userdata('user_ppn');
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/laporan_sisa_tolling_supplier";
        $this->load->model('Model_sales_order');
        $this->load->model('Model_tolling_titipan');

        $this->load->view('layout', $data);
    }

    function print_sisa_tolling_supplier(){
        $module_name = $this->uri->segment(1);
        $ppn = $this->session->userdata('user_ppn');
        $this->load->helper('tanggal_indo');
        $b = $_GET['b'];
        $t = $_GET['t'];

        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $this->load->model('Model_tolling_titipan');
        if($b==0){
            $data['detailLaporan'] = $this->Model_tolling_titipan->print_sisa_tolling_supplier()->result();
            $this->load->view('tolling_titipan/print_sisa_tolling_supplier', $data);   
        }else{  
            $data['tgl'] = $t.'-'.$b.'-01';
            if($b==12){
                $b='01';
                $t+=1;
            }else if($b>9){
                $b+=1;
            }else{
                $b+=1;
                $b='0'.$b;
            }

            $tgl = $t.'-'.$b.'-01';
            // echo $tgl;
            $data['detailLaporan'] = $this->Model_tolling_titipan->print_sisa_tolling_supplier2($tgl,$ppn)->result();
            // print_r($data['detailLaporan']);
            $this->load->view('tolling_titipan/print_sisa_tolling_supplier2', $data);   
        }
    }
}