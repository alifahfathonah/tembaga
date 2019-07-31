<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeliWIP extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');   
        $user_ppn = $this->session->userdata('user_ppn');     
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_wip/index";
        $this->load->model('Model_beli_sparepart');
        $this->load->model('Model_beli_wip');
        $data['list_data'] = $this->Model_beli_wip->po_list($user_ppn)->result();
        $data['bank_list'] = $this->Model_beli_sparepart->bank($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function po_list_outdated(){
        $module_name = $this->uri->segment(1);
        $group_id = $this->session->userdata('group_id');
        $user_ppn = $this->session->userdata('user_ppn');     
        if ($group_id != 1) {
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id'] = $group_id;
        $data['content'] = "beli_wip/po_list_outdated";

        $this->load->model('Model_beli_wip');
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_wip->po_list_outdated($user_ppn)->result();
        $data['bank_list'] = $this->Model_beli_sparepart->bank($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function add(){
        $module_name = $this->uri->segment(1);
        $data['user_ppn'] = $this->session->userdata('user_ppn');
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "beli_wip/add";
        
        $this->load->model('Model_beli_sparepart');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
        $this->load->view('layout', $data);
    }

    function save(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        if($user_ppn == 1){
            $code = 'PO-KMP.'.$tgl_po.'.'.$this->input->post('no_po'); 
            $count = $this->db->query("Select count(id) as count from po where no_po = '".$code."'")->row_array();
            if($count['count']){
                $this->session->set_flashdata('flash_msg', 'Nomor PO sudah Ada. Please try again!');
                redirect('index.php/BeliWIP/add');
            }
        }else{
            $code = $this->Model_m_numberings->getNumbering('POW-KMP', $tgl_input);
        }

        $data = array(
            'no_po'=> $code,
            'tanggal'=> $tgl_input,
            'flag_ppn'=> $user_ppn,
            'ppn'=> $this->input->post('ppn'),
            'currency'=> $this->input->post('currency'),
            'diskon'=> $this->input->post('diskon'),
            'materai'=> $this->input->post('materai'),
            'kurs'=> $this->input->post('kurs'),
            'supplier_id'=>$this->input->post('supplier_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'remarks'=>$this->input->post('remarks'),
            'jenis_po'=>'WIP',
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

                $ch = curl_init(target_url().'api/BeliWIPAPI/po');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
            }

        if($this->db->trans_complete()){
            redirect('index.php/BeliWIP/edit/'.$po_id);  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO WIP gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/BeliWIP');  
        }  
    }

    function edit(){
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

            $data['content']= "beli_wip/edit";
            $this->load->model('Model_beli_wip');
            $data['header'] = $this->Model_beli_wip->show_header_po($id)->row_array(); 
                $data['list_detail'] = $this->Model_beli_wip->load_dtwip_detail($id)->result();
            if($data['header']['status']==0){ 
                $data['list_wip'] = $this->Model_beli_wip->list_wip()->result();
                $this->load->model('Model_beli_rongsok');
                $data['count'] = $this->Model_beli_rongsok->count_po_detail($id)->row_array();
            }else{
                $data['list_data'] = $this->Model_beli_wip->load_detail_po($id)->result();
            }
            // $data['list_detail'] = $this->Model_beli_wip->show_data_po($id)->result();
            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliWIP');
        }
    }

    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_wip');
        $wip = $this->Model_beli_wip->show_data_po($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($wip); 
    }

    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('po_detail', array(
            'po_id'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('wip_id'),
            'amount'=>str_replace(',', '', $this->input->post('harga')),
            'qty'=>str_replace(',', '', $this->input->post('qty')),
            'flag_dtwip' => 0,
            'total_amount'=>str_replace(',', '', $this->input->post('total_harga'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item finish good! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $cek = 0;
        $no    = 1;
        $total = 0;
        
        $this->load->model('Model_beli_wip'); 
        $myDetail = $this->Model_beli_wip->load_detail_po($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,2,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,2,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,2,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $cek += $row->id;
            $total += $row->total_amount;
            $no++;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total (Rp) </strong></td>';
        $tabel .= '<input type="hidden" id="count2" value="'.$cek.'">';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,2,',','.').'</strong></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('po_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item WIP good! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
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

            $ch = curl_init(target_url().'api/BeliWIPAPI/po_detail');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);
        }
        
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data PO WIP berhasil disimpan');
            redirect('index.php/BeliWIP');
        }else{
            $this->session->set_flashdata('flash_msg', 'Data PO WIP gagal disimpan');
            redirect('index.php/BeliWIP');
        }
    }

    function delete_po(){
        ## BELOM ADA API
        $id = $this->uri->segment(3);
        $this->db->trans_start();
        if(!empty($id)){
            $this->db->delete('po', ['id' => $id]);
        }

        if ($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data PO WIP berhasil dihapus');
            redirect('index.php/BeliWIP');
        }
    }

    function close_po(){
         $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $user_ppn = $this->session->userdata('user_ppn');
        $this->db->trans_start();
        
        $data = array(
                'status'=> 1,
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

                $ch = curl_init(target_url().'api/BeliWIPAPI/close_po');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
            }
        
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'PO WIP Berhasil di Close');
            redirect('index.php/BeliWIP');
        }
    }

    function print_po(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_wip');
            $data['header']  = $this->Model_beli_wip->show_header_po($id)->row_array();
            $data['details'] = $this->Model_beli_wip->load_detail_po($id)->result();
            $data['rows'] = count($data['details']);
            if ($this->session->userdata('user_ppn') == 0) {
                $this->load->view('beli_wip/print_po', $data);
            } else {
                $this->load->view('beli_wip/print_po_ppn', $data);
            }
        }else{
            redirect('index.php'); 
        }
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

        $data['content']= "beli_wip/dtwip_list";
        $this->load->model('Model_beli_wip');
        $data['list_data'] = $this->Model_beli_wip->dtwip_list($user_ppn)->result();

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

        $data['content']= "beli_wip/create_dtwip";
        $this->load->model('Model_beli_wip');
        $data['list_wip_on_po'] = $this->Model_beli_wip->list_wip()->result();
        
        $this->load->model('Model_beli_rongsok');
        $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
        $this->load->view('layout', $data);   
    }

    function save_dtwip(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
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
                        'supplier_id'=> $this->input->post('supplier_id'),
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
            redirect('index.php/BeliWIP/dtwip_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan DTWIP gagal, penomoran belum disetup!');
            redirect('index.php/BeliWIP/dtwip_list');
        }
    }

    function proses_dtwip(){
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

            $data['content']= "beli_wip/proses_dtwip";
            $this->load->model('Model_beli_wip');
            $data['header']  = $this->Model_beli_wip->show_header_dtwip($id)->row_array(); 
            $data['details'] = $this->Model_beli_wip->show_detail_dtwip($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function edit_dtwip(){
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

            $data['content']= "beli_wip/edit_dtwip";
            $this->load->model('Model_beli_wip');
            $data['header']  = $this->Model_beli_wip->show_header_dtwip($id)->row_array(); 
            $data['details'] = $this->Model_beli_wip->show_detail_dtwip($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliWIP');
        }
    }

    function update_dtwip(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        
        $this->db->trans_start();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dtwip', array(
                    'status'=>0,
                    'remarks'=>$this->input->post('remarks'),
                    'modified'=>$tanggal,
                    'modified_by'=>$user_id
        ));
        
        $details = $this->input->post('myDetails');
        foreach($details as $row){
            $this->db->where('id', $row['id']);
            $this->db->update('dtwip_detail', array(
                'qty'=>str_replace('.','', $row['qty']),
                'berat'=>str_replace('.','', $row['berat']),
                'line_remarks'=>$row['line_remarks'],
                'tanggal_masuk'=>$tgl_input
            ));
        }
        
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'DTWIP dengan nomor : '.$this->input->post('no_dtwip').' berhasil diupdate...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat updates DTWIP, silahkan coba kembali!');
        }
        redirect('index.php/BeliWIP/dtwip_list');
    }

    function print_dtwip(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_wip');
            $data['header']  = $this->Model_beli_wip->show_header_dtwip($id)->row_array();
            $data['details'] = $this->Model_beli_wip->show_detail_dtwip($id)->result();

            $this->load->view('beli_wip/print_dtwip', $data);
        }else{
            redirect('BeliWIP/index.php'); 
        }
    }

    function print_dtwip_harga(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_wip');
            $data['header']  = $this->Model_beli_wip->show_header_dtwip($id)->row_array();
            $data['details'] = $this->Model_beli_wip->show_detail_dtwip_harga($id)->result();

            $this->load->view('beli_wip/print_dtwip_harga', $data);
        }else{
            redirect('BeliWIP/index.php'); 
        }
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

        $data['content']= "beli_wip/matching";
        $this->load->model('Model_beli_wip');
        $data['po_list'] = $this->Model_beli_wip->get_po_list($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function proses_matching(){
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

        $data['content']= "beli_wip/proses_matching";
        $this->load->model('Model_beli_wip');
        $data['header_po'] = $this->Model_beli_wip->show_header_po($po_id)->row_array();
        $data['details_po'] = $this->Model_beli_wip->show_detail_po($po_id)->result();

        $dtwip_app = $this->Model_beli_wip->get_dtwip_approve($po_id)->result();
        foreach ($dtwip_app as $index=>$row){
            $dtwip_app[$index]->details = $this->Model_beli_wip->show_detail_dtwip($row->id)->result();
        }
        $data['dtwip_app'] = $dtwip_app;
        $sp_id = $data['header_po']['supplier_id'];
        $dtwip = $this->Model_beli_wip->get_dtwip($sp_id,$user_ppn)->result();
        foreach ($dtwip as $index=>$row){
            $dtwip[$index]->details = $this->Model_beli_wip->show_detail_dtwip($row->id)->result();
        }
        $data['dtwip'] = $dtwip;
        $this->load->view('layout', $data);
    }

    function reject(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('dtwip_id'));
        $this->db->update('dtwip', $data);

        redirect('index.php/BeliWIP/proses_matching/'.$this->input->post('po_id'));
    }

    function approve(){
        $dtwip_id = $this->input->post('dtwip_id');
        $po_id = $this->input->post('po_id');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        $this->load->model('Model_beli_wip');
        
        $this->db->trans_start();       

        #Update status DTBJ
        $this->db->where('id', $dtwip_id);
        $this->db->update('dtwip', array(
                'po_id'=>$po_id,
                'status'=>1,
                'approved'=>$tanggal,
                'approved_by'=>$user_id));
                        
            #update po_detail_id di dtwip_detail

            $po_dtwip_check_update = $this->Model_beli_wip->check_to_update($po_id)->result();
            foreach ($po_dtwip_check_update as $u) {
                $this->db->where('id',$u->dtwip_detail_id );
                $this->db->update('dtwip_detail',array(
                                'po_detail_id'=>$u->id));
            }

            $total_qty = 0;
            $total_berat_dtwip = 0;
            $po_dtwip_list = $this->Model_beli_wip->check_po_dtwip($po_id)->result();
            foreach ($po_dtwip_list as $v) {
                #penghitungan +- 10 % PO ke DTR
                if(((int)$v->tot_berat) >= (0.9*((int)$v->qty))){
                    #update po_detail flag_dtr
                    $this->Model_beli_wip->update_flag_dtwip_po_detail($po_id,$v->jenis_barang_id);
                }
                $total_qty += $v->qty;
                $total_berat_dtwip += $v->tot_berat;
            }

            if(((int)$total_berat_dtwip) >= (0.9*((int)$total_qty))){
                $update_po = array(
                            'status'=>3,
                            'flag_pelunasan'=>0);
            } else {
                $update_po = array(
                    'status'=>2
                );
            }
            $this->db->where('id',$po_id);
            $this->db->update('po', $update_po);

            #Create BPB WIP
            $this->load->model('Model_m_numberings');
                #insert t_bpb_wip
                if($user_ppn==1){
                    $code = $this->Model_m_numberings->getNumbering('BPB-KMP', $tgl_input);
                }else{
                    $code = $this->Model_m_numberings->getNumbering('BPB-PO',$tgl_input);
                }

                $data_bpb = array(
                        'no_bpb' => $code,
                        'tanggal' => $tanggal,
                        'flag_ppn' => $user_ppn,
                        'created' => $tanggal,
                        'created_by' => $user_id,
                        'keterangan' => 'BARANG PO WIP',
                        'status' => 0
                    );
                $this->db->insert('t_bpb_wip',$data_bpb);
                $id_bpb = $this->db->insert_id();

                #insert t_bpb_detail
                $loop2 = $this->db->query("select dtwip_detail.*, jb.uom from dtwip_detail left join jenis_barang jb on (jb.id = dtwip_detail.jenis_barang_id) where dtwip_id = ".$dtwip_id)->result();
                foreach ($loop2 as $k2) {
                    $this->db->insert('t_bpb_wip_detail', array(
                        'bpb_wip_id' => $id_bpb,
                        'created' => $tgl_input,
                        'jenis_barang_id' => $k2->jenis_barang_id,
                        'qty' => $k2->qty,
                        'berat' => $k2->berat,
                        'uom' => $k2->uom,
                        'keterangan' => $k2->line_remarks,
                        'created_by' => $user_id
                    ));
                }

            if($user_ppn==1){
                $this->load->helper('target_url');
            
                $data_post['po'] = $update_po;
                $data_post['po_id'] = $po_id;

                $data_post['dtwip'] = $this->Model_beli_wip->load_dtwip_only($dtwip_id)->row_array();
                $data_post['details'] = $this->Model_beli_wip->load_dtwip_detail_only($dtwip_id)->result();

                unset($data_bpb['flag_ppn']);
                $data_id = array('reff1' => $id_bpb);
                $data_post['data_bpb'] = array_merge($data_bpb, $data_id);
                $data_post['details_bpb'] = $this->Model_beli_wip->load_bpb_detail_only($id_bpb)->result();

                $detail_post = json_encode($data_post);
                // print($detail_post);
                // die();

                $ch = curl_init(target_url().'api/BeliWIPAPI/dtwip');
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
            redirect('index.php/BeliWIP/proses_matching/'.$this->input->post('po_id'));
        }else{
            redirect('index.php/BeliWIP/proses_matching/'.$this->input->post('po_id'));
        }                       
        
       // header('Content-Type: application/json');
       // echo json_encode($return_data);
    }

    function save_proses_dtwip(){
        $dtwip_id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->load->model('Model_beli_wip');

         #Update status DTBJ
        $this->db->where('id', $dtwip_id);
        $this->db->update('dtwip', array(
                'status'=>1,
                'approved'=>$tanggal,
                'approved_by'=>$user_id));
                        
            #Create BPB WIP
            $this->load->model('Model_m_numberings');
            $loop1 = $this->db->query("select dtwipd.dtwip_id, dtwipd.jenis_barang_id, jb.jenis_barang
                from dtwip_detail dtwipd
                left join jenis_barang jb on (jb.id = dtwipd.jenis_barang_id)
                where dtwipd.dtwip_id = ".$dtwip_id." group by jb.jenis_barang")->result();
            foreach ($loop1 as $k1) {
                #insert t_bpb_fg
                if($user_ppn==1){
                    $code = $this->Model_m_numberings->getNumbering('BPB-KMP', $tgl_input);
                }else{
                    $code = $this->Model_m_numberings->getNumbering('BPB-PO',$tgl_input);
                }

                $data_bpb = array(
                        'no_bpb' => $code,
                        'tanggal' => $tgl_input,
                        'flag_ppn' => $user_ppn,
                        'created' => $tanggal,
                        'created_by' => $user_id,
                        'keterangan' => $this->input->post('remarks'),
                        'status' => 0
                    );
                $this->db->insert('t_bpb_wip',$data_bpb);
                $id_bpb = $this->db->insert_id();

                #insert t_bpb_detail
                $loop2 = $this->db->query("select dtwip_detail.*, jb.uom from dtwip_detail left join jenis_barang jb on (jb.id = dtwip_detail.jenis_barang_id) where jenis_barang_id = ".$k1->jenis_barang_id." and dtwip_id = ".$dtwip_id)->result();
                foreach ($loop2 as $k2) {
                    $this->db->insert('t_bpb_wip_detail', array(
                        'bpb_wip_id' => $id_bpb,
                        'created' => $tgl_input,
                        'jenis_barang_id' => $k2->jenis_barang_id,
                        'qty' => $k2->qty,
                        'berat' => $k2->berat,
                        'uom' => $k2->uom,
                        'keterangan' => $k2->line_remarks,
                        'created_by' => $user_id
                    ));
                }
            }
        
        $this->db->trans_start();   
        if($this->db->trans_complete()){  
            redirect('index.php/BeliWIP/dtwip_list');
        }else{
            redirect('index.php/BeliWIP/dtwip_list');
        }
    }

    function reject_dtwip(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('dtwip', $data);
        
        $this->session->set_flashdata('flash_msg', 'Reject DTWIP berhasil direject');
        redirect('index.php/BeliWIP/dtwip_list');
    }

    function create_voucher(){
        $id = $this->input->post('id');
        $this->load->helper('terbilang_helper');
        $this->load->model('Model_beli_wip');
        $data = $this->Model_beli_wip->voucher_po_wip($id)->row_array();
        if($data['ppn']==1){
            $data['nilai_before_ppn'] = number_format($data['nilai_po'],0,',','.');
            $nilai_po = $data['nilai_po']*110/100;
            $data['nilai_ppn'] = number_format($data['nilai_po']*10/100,0,',','.');
        }else{
            $nilai_po = $data['nilai_po'];
            $data['nilai_ppn'] = 0;
        }

        $terbilang = $nilai_po;
        $sisa = $nilai_po - $data['nilai_dp'];
        $data['nilai_po'] = number_format($nilai_po,0,',','.');
        $data['nilai_dp'] = number_format($data['nilai_dp'],0,',','.');
        $data['sisa']     = number_format($sisa,0,',','.');
        // $nilai_po = $data['nilai_po'];
        $data['terbilang'] = ucwords(number_to_words($terbilang));
        
        header('Content-Type: application/json');
        echo json_encode($data);  
    }

    function save_voucher(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $nilai_po  = str_replace(',', '', $this->input->post('nilai_po'));
        $nilai_dp  = str_replace(',', '', $this->input->post('nilai_dp'));
        $amount  = str_replace(',', '', $this->input->post('amount'));
        $id = $this->input->post('id');
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('VWIP', $tgl_input);
        if($nilai_po-($nilai_dp+$amount)>=0){
            $jenis_voucher = 'Pelunasan';
            $this->db->where('id', $id);
            $this->db->update('po', array('flag_pelunasan'=>1,'status'=>4));
        }else{
            $jenis_voucher = 'DP';
            $this->db->where('id', $id);
            $this->db->update('po', array('flag_dp'=>1));
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
                $this->session->set_flashdata('flash_msg', 'Voucher wip berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher wip, silahkan coba kembali!');
            }
            redirect('index.php/BeliWIP');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher wip gagal, penomoran belum disetup!');
            redirect('index.php/BeliWIP');
        }
    }

    function save_voucher_pembayaran(){
        $ppn = $this->session->userdata('user_ppn');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Y', strtotime($this->input->post('tanggal')));
        $nilai_po  = str_replace(',', '', $this->input->post('nilai_po'));
        $jumlah_dibayar  = str_replace(',', '', $this->input->post('jumlah_dibayar'));
        $amount  = str_replace(',', '', $this->input->post('amount'));
        if($nilai_po-($jumlah_dibayar+$amount)<0){
            $jenis_voucher = 'Parsial';
        }else{
            $jenis_voucher = 'Pelunasan';
        }
        
        $this->db->trans_start();

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
                'id_vc'=>$id_vc,
                'currency'=>$this->input->post('currency'),
                'nominal'=>str_replace(',', '', $amount),
                'created_at'=>$tanggal,
                'created_by'=>$user_id
            );
            $this->db->insert('f_kas', $data_f);
            $fk_id = $this->db->insert_id();

        $this->load->model('Model_m_numberings');
        if($ppn==1){
            $code = $this->Model_m_numberings->getNumbering('VWIP-KMP', $tgl_input);
        }else{
            $code = $this->Model_m_numberings->getNumbering('VWIP', $tgl_input); 
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

            // if($ppn==1){
            //     $this->load->helper('target_url');
                
            //     $data_post['voucher'] = array_merge($data_v, array('reff1' => $id_vc));
            //     $data_post['f_kas'] = array_merge($data_f, array('reff1' => $fk_id));
            //     $data_post['update_po'] = $update_po;
            //     $detail_post = json_encode($data_post);

            //     $ch = curl_init(target_url().'api/BeliWIPAPI/voucher');
            //     curl_setopt($ch, CURLOPT_POST, true);
            //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            //     curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //     $response = curl_exec($ch);
            //     $result = json_decode($response, true);
            //     curl_close($ch);
            // }
            
            if($this->db->trans_complete()){  
                $this->session->set_flashdata('flash_msg', 'Voucher pembayaran WIP berhasil di-create dengan nomor : '.$code);
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher pembayaran WIP, silahkan coba kembali!');
            }
            redirect('index.php/BeliWIP');
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher pembayaran WIP gagal, penomoran belum disetup!');
            redirect('index.php/BeliWIP');
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

        $data['content']= "beli_wip/voucher_list";
        $this->load->model('Model_beli_wip');
        if($user_ppn==1){
            $data['list_data'] = $this->Model_beli_wip->voucher_list_ppn($user_ppn)->result();
        }else{
            $data['list_data'] = $this->Model_beli_wip->voucher_list($user_ppn)->result();
        }

        $this->load->view('layout', $data);
    }

    function print_voucher(){
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

                $this->load->view('beli_wip/print_voucher_ppn', $data);   
            }else{
                $this->load->model('Model_finance');
                $data['header'] = $this->Model_finance->show_header_voucher($id)->row_array();
                $data['list_data'] = $this->Model_finance->show_detail_voucher($id)->result();

                $total = 0;
                foreach ($data['list_data'] as $row) {
                    $total += $row->amount;
                }

                $data['total'] = $total;

                $this->load->view('beli_wip/print_voucher', $data);   
            }

        }else{
            redirect('index.php/BeliWIP');
        }
    }
}