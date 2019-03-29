<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeliSparePart extends CI_Controller{
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

        $data['content']= "beli_spare_part/index";
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->list_data()->result();

        $this->load->view('layout', $data);
    }
    
    function add(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "beli_spare_part/add";
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');

        $tgl_pengajuan = date('Y-m-d', strtotime($this->input->post('tgl_pengajuan')));
        if($this->input->post('jenis_kebutuhan')==0){
            $tgl_spare_part = date('Y-m-d', strtotime($this->input->post('tgl_spare_part')));
        }else{
            $tgl_spare_part = NULL;
        }
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PPS', $tgl_pengajuan); 
        
        if($code){        
            $data = array(
                        'no_pengajuan'=> $code,
                        'tgl_pengajuan'=> $tgl_pengajuan,
                        'jenis_kebutuhan'=> $this->input->post('jenis_kebutuhan'),
                        'tgl_sparepart_dibutuhkan'=> $tgl_spare_part,
                        'remarks'=>$this->input->post('keterangan'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );

            if($this->db->insert('beli_sparepart', $data)){
                redirect('index.php/BeliSparePart/edit/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Pengajuan pembelian spare part gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/BeliSparePart');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Pengajuan pembelian spare part gagal disimpan, penomoran belum disetup!');
            redirect('index.php/BeliSparePart');
        }
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('beli_sparepart');  
            
            $this->db->where('beli_sparepart_id', $id);
            $this->db->delete('beli_sparepart_detail');  
        }
        $this->session->set_flashdata('flash_msg', 'Data pembelian spare pat berhasil dihapus');
        redirect('index.php/BeliSparePart');
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

            $data['content']= "beli_spare_part/edit";

            $this->load->model('Model_sparepart');
            $data['list_sparepart'] = $this->Model_sparepart->list_data()->result();
            $this->load->model('Model_beli_sparepart');
            $data['myData'] = $this->Model_beli_sparepart->show_data($id)->row_array(); 
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $tgl_pengajuan = date('Y-m-d', strtotime($this->input->post('tgl_pengajuan')));
        if($this->input->post('jenis_kebutuhan')==0){
            $tgl_spare_part = date('Y-m-d', strtotime($this->input->post('tgl_spare_part')));
        }else{
            $tgl_spare_part = NULL;
        }
        
        $data = array(
                'jenis_kebutuhan'=> $this->input->post('jenis_kebutuhan'),
                'tgl_sparepart_dibutuhkan'=> $tgl_spare_part,
                'remarks'=>$this->input->post('keterangan'),
                'status'=>(($this->input->post('status')==9)? 0 : $this->input->post('status')),
                //'flag_sinkronisasi'=>0,
                //'flag_action'=>'U',
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('beli_sparepart', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data pengajuan pembelian spare part berhasil disimpan');
        redirect('index.php/BeliSparePart');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no = 0;
        $this->load->model('Model_sparepart');
        $list_sparepart = $this->Model_sparepart->list_data()->result();
        
        $this->load->model('Model_beli_sparepart'); 
        $myDetail = $this->Model_beli_sparepart->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.($no+1).'</td>';
            $tabel .= '<td><label id="lbl_item_'.$no.'">'.$row->nama_item.'</label>';
                $tabel .= '<select id="sparepart_id_'.$no.'" name="sparepart_id_'.$no.'" class="form-control select2me myline" ';
                $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px; display:none" onclick="get_uom(this.value, '.$no.');">';
                $tabel .= '<option value=""></option>';
                foreach ($list_sparepart as $value){
                    $tabel .= "<option value='".$value->id."' ".(($value->id==$row->sparepart_id)? "selected='selected'": "").">".$value->nama_item."</option>";
                }
                $tabel .= '</select>';
                $tabel .= '<input type="hidden" id="detail_id_'.$no.'" name="detail_id_'.$no.'" value="'.$row->id.'">';
            $tabel .= '</td>';
            $tabel .= '<td><label id="lbl_uom_'.$no.'">'.$row->uom.'</label>';
            $tabel .= '<input type="text" id="uom_'.$no.'" name="uom_'.$no.'" class="form-control myline" readonly="readonly" '
                    . 'value="'.$row->uom.'" style="display:none">';
            $tabel .= '</td>';
            $tabel .= '<td style="text-align:right"><label id="lbl_qty_'.$no.'">'.$row->qty.'</label>';
            $tabel .= '<input type="text" id="qty_'.$no.'" name="qty_'.$no.'" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="3" value="'.$row->qty.'" style="display:none">';
            $tabel .= '</td>';
            
            $tabel .= '<td style="text-align:center">';
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green" onclick="editDetail('.$no.');" style="margin-top:5px" id="btnEdit_'.$no.'"> '
                    . '<i class="fa fa-edit"></i> Edit &nbsp; </a>';
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green-seagreen" onclick="updateDetail('.$no.');" style="margin-top:5px; display:none" id="btnUpdate_'.$no.'"> '
                    . '<i class="fa fa-floppy-o"></i> Update </a>';
            $tabel .= '<a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a>';
            $tabel .= '</td>';
            $tabel .= '</tr>';
            $no++;
        }
        // $tabel .= '<tr>';
        // $tabel .= '<td style="text-align:center">'.($no+1).'</td>';
        // $tabel .= '<td>';
        // $tabel .= '<select id="sparepart_id_'.$no.'" name="sparepart_id_'.$no.'" class="form-control select2me myline" ';
        //     $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value, '.$no.');">';
        //     $tabel .= '<option value=""></option>';
        //     foreach ($list_sparepart as $value){
        //         $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
        //     }
        // $tabel .= '</select>';
        // $tabel .= '</td>';
        // $tabel .= '<td><input type="text" id="uom_'.$no.'" name="uom_'.$no.'" class="form-control myline" readonly="readonly"></td>';
        // $tabel .= '<td><input type="text" id="qty_'.$no.'" name="qty_'.$no.'" class="form-control myline" '
        //         . 'onkeydown="return myCurrency(event);" maxlength="3"></td>';
        // $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
        //         . 'yellow-gold" onclick="saveDetail('.$no.');" style="margin-top:5px" id="btnSaveDetail"> '
        //         . '<i class="fa fa-plus"></i> Tambah </a></td>';
        // $tabel .= '</tr>';
       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_sparepart');
        $list_sparepart = $this->Model_sparepart->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($list_sparepart); 
    }
    
    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('beli_sparepart_detail', array(
            'beli_sparepart_id'=>$this->input->post('id'),
            'sparepart_id'=>$this->input->post('sparepart_id'),
            'qty'=>$this->input->post('qty')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item spare part! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function update_detail(){
        $return_data = array();
        
        $this->db->where('id', $this->input->post('detail_id'));
        if($this->db->update('beli_sparepart_detail', array(
            'sparepart_id'=>$this->input->post('sparepart_id'),
            'qty'=>$this->input->post('qty')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal mengupdate item spare part! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('beli_sparepart_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item spare part! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
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

            $data['content']= "beli_spare_part/view";
            $this->load->model('Model_beli_sparepart');
            $data['myData'] = $this->Model_beli_sparepart->show_data($id)->row_array();           
            $data['myDetail'] = $this->Model_beli_sparepart->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart');
        }
    }
    
    function approve(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 1,
                'approved'=> $tanggal,
                'approved_by'=>$user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('beli_sparepart', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data pengajuan pembelian spare part berhasil diapprove');
        redirect('index.php/BeliSparePart');
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
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('beli_sparepart', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data pengajuan pembelian spare part berhasil direject');
        redirect('index.php/BeliSparePart');
    }
    
    function create_po(){
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

            $data['content']= "beli_spare_part/create_po";
            $this->load->model('Model_beli_sparepart');
            $data['myData'] = $this->Model_beli_sparepart->show_data($id)->row_array();           
            $data['myDetail'] = $this->Model_beli_sparepart->load_detail_pp($id)->result(); 
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart');
        }
    }
    
    function get_contact_name(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_sparepart');
        $data = $this->Model_beli_sparepart->get_contact_name($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }
    
    function save_po(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('POSP', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_po'=> $code,
                        'tanggal'=> $tgl_input,
                        'beli_sparepart_id'=> $this->input->post('beli_sparepart_id'),
                        'ppn'=>$this->input->post('ppn'),
                        'diskon'=>$this->input->post('diskon'),
                        'materai'=>$this->input->post('materai'),
                        'supplier_id'=>$this->input->post('supplier_id'),
                        'term_of_payment'=>$this->input->post('term_of_payment'),
                        'jenis_po'=>'Sparepart',
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('po', $data);
            $po_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('po_detail', array(
                        'po_id'=>$po_id,
                        'beli_sparepart_detail_id'=>$row['beli_sparepart_detail_id'],
                        'sparepart_id'=>$row['sparepart_id'],
                        'amount'=>str_replace('.', '', $row['harga']),
                        'qty'=>str_replace('.', '', $row['qty']),
                        'total_amount'=>str_replace('.', '', $row['total_harga'])
                    ));
                    
                    $this->db->where('id', $row['beli_sparepart_detail_id']);
                    $this->db->update('beli_sparepart_detail', array('flag_po'=>1));
                }
            }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'PO berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create PO, silahkan coba kembali!');
            }
            redirect('index.php/BeliSparePart');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan PO spare part gagal disimpan, penomoran belum disetup!');
            redirect('index.php/BeliSparePart');
        }
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

        $data['content']= "beli_spare_part/po_list";
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->po_list($user_ppn)->result();
        $data['bank_list'] = $this->Model_beli_sparepart->bank_list()->result();

        $this->load->view('layout', $data);
    }

    function po_list_outdated(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        $user_ppn = $this->session->userdata('user_ppn');     
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        //GANTI INTERVAL DI MODEL
        $data['content']= "beli_spare_part/po_list_outdated";
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->po_list_outdated($user_ppn)->result();

        $this->load->view('layout', $data);
    }
    
    function print_po(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_sparepart');
            $data['header']  = $this->Model_beli_sparepart->show_header_po($id)->row_array();
            $data['details'] = $this->Model_beli_sparepart->show_detail_po($id)->result();

            $this->load->view('print_po', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_sparepart');
            $data['header']  = $this->Model_beli_sparepart->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_beli_sparepart->show_detail_spb($id)->result();

            $this->load->view('beli_spare_part/print_spb', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_pps(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_sparepart');
            $data['myData'] = $this->Model_beli_sparepart->show_data($id)->row_array();           
            $data['myDetail'] = $this->Model_beli_sparepart->load_detail($id)->result(); 

            $this->load->view('beli_spare_part/print_pps', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function view_po(){
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

            $data['content']= "beli_spare_part/view_po";
            $this->load->model('Model_beli_sparepart');
            $data['header']  = $this->Model_beli_sparepart->show_header_po($id)->row_array();
            $data['details'] = $this->Model_beli_sparepart->show_detail_po($id)->result();
            $data['details_bpb'] = $this->Model_beli_sparepart->show_detail_po_lpb($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart/po_list');
        }
    }
    
    function close_po(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 1,
                'modified'=> $tanggal,
                'modified_by'=>$user_id,
                'remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('po', $data);
        
        $this->session->set_flashdata('flash_msg', 'PO Sparepart berhasil di Close');
        redirect('index.php/BeliSparePart/po_list');
    }
    
    function show_cek_qty(){
        $id = $this->input->post('po_id');
        $sp = $this->input->post('sp_id');

        $this->load->model('Model_beli_sparepart');
        $cek_qty = $this->Model_beli_sparepart->show_cek_qty($id, $sp)->row_array();

        header('Content-Type: application/json');
        echo json_encode($cek_qty);
    }

    function create_lpb(){
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

            $data['content']= "beli_spare_part/create_lpb";
            $this->load->model('Model_beli_sparepart');
            $data['header'] = $this->Model_beli_sparepart->show_header_po($id)->row_array();           
            $data['details'] = $this->Model_beli_sparepart->show_detail_po_create_lpb($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart');
        }
    }
    
    function save_lpb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('BPB', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_bpb'=> $code,
                        'tanggal'=> $tgl_input,
                        'po_id'=> $this->input->post('po_id'),
                        'remarks'=> $this->input->post('remarks'),
                        'pengirim'=> $this->input->post('pengirim'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('lpb', $data);
            $lpb_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('lpb_detail', array(
                        'lpb_id'=>$lpb_id,
                        'po_detail_id'=>$row['po_detail_id'],
                        'sparepart_id'=>$row['sparepart_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'line_remarks'=>str_replace('.', '', $row['line_remarks'])
                    ));
                    
                    $this->db->where('id', $row['po_detail_id']);
                    if($row['qty'] >= $row['qty_full']){
                    $this->db->update('po_detail', array('flag_lpb'=>1));
                    } else {
                    $this->db->update('po_detail', array('flag_lpb'=>0));
                    }
                    
                    #Update Stok Rongsok
                    $this->load->model('Model_beli_rongsok');
                    $get_stok = $this->Model_beli_rongsok->cek_stok($row['nama_item'], 'SPARE PART')->row_array(); 
                    if($get_stok){
                        $stok_id  = $get_stok['id'];            
                        $this->db->where('id', $stok_id);
                        $this->db->update('t_inventory', array(
                                'stok_bruto'=>($get_stok['stok_bruto']+ $row['qty']), 
                                'stok_netto'=>($get_stok['stok_netto']+ $row['qty']), 
                                'modified'=>$tanggal, 
                                'modified_by'=>$user_id));
                    }else{
                        $this->db->insert('t_inventory', array(
                                'nama_produk'=>$row['nama_item'],
                                'jenis_item'=>'SPARE PART',
                                'stok_bruto'=>$row['qty'], 
                                'stok_netto'=>$row['qty'], 
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
                        'bruto_masuk'=>$row['qty'],
                        'netto_masuk'=>$row['qty'],
                        'remarks'=>'Pembelian spare part',
                    ));
                }
            }

            $this->load->model('Model_beli_sparepart');
            $get_status = $this->Model_beli_sparepart->po_list_cek($this->input->post('po_id'))->row_array();

            if($get_status['ready_to_lpb'] == 0){           
                        $this->db->where('id', $get_status['id']);
                        $this->db->update('po', array(
                                'status'=>3,
                                'flag_pelunasan'=>0,
                                'modified'=>$tanggal, 
                                'modified_by'=>$user_id));
            }else{
            #Update status PO
            $this->db->where('id', $this->input->post('po_id'));
            $this->db->update('po', array(
                'status'=>2,
                'flag_pelunasan'=>0,
                'modified'=>$tanggal, 
                'modified_by'=>$user_id));
            }
                    
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Bukti penerimaan barang berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create bukti penerimaan barang, silahkan coba kembali!');
            }
            redirect('index.php/BeliSparePart/po_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan bukti penerimaan barang gagal, penomoran belum disetup!');
            redirect('index.php/BeliSparePart/po_list');
        }
    }
    
    function bpb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_spare_part/bpb_list";
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->bpb_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_bpb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_sparepart');
            $data['header']  = $this->Model_beli_sparepart->show_header_bpb($id)->row_array();
            $data['details'] = $this->Model_beli_sparepart->show_detail_bpb($id)->result();

            $this->load->view('print_bpb', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function create_voucher(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_sparepart');
        $data = $this->Model_beli_sparepart->get_data_pembayaran($id)->row_array();
        $this->load->helper('terbilang_helper');

        $diskon = 0;
        $after_diskon = 0;
        $after_ppn = 0;
        $data_total = 0;
            if($data['ppn'] == 1){
                if($data['diskon'] > 0){
                    $diskon = $data['nilai_po']*$data['diskon']/100;
                    $after_diskon = $data['nilai_po']-$diskon;
                }else{
                    $after_diskon = $data['nilai_po'];
                }

                $after_ppn = ($after_diskon)*10/100;
                $data_total = $after_diskon + $after_ppn + $data['materai'];
                $data['nilai_po_asli'] = number_format($data_total,0,',','.');
                // $data['terbilang'] = ucwords(number_to_words($data['nilai_po_asli']));
            }else{
                if($data['diskon'] > 0){
                    $diskon = $data['nilai_po']*$data['diskon']/100;
                    $after_diskon = $data['nilai_po']-$diskon;
                }else{
                    $after_diskon = $data['nilai_po'];
                }

                $data_total = $after_diskon + $data['materai'];
                $data['nilai_po_asli'] = number_format($data_total,0,',','.');
                // $data['terbilang'] = ucwords(number_to_words($data['nilai_po_asli']));
            }
        
        $data['terbilang'] = ucwords(number_to_words($data_total));
        $sisa = $data_total - $data['jumlah_dibayar'];
        $data['after_ppn'] = number_format($after_ppn,0,',','.');
        $data['diskon'] = number_format($diskon,0,',','.');
        $data['materai'] = number_format($data['materai'],0,',','.');
        $data['jumlah_dibayar'] = number_format($data['jumlah_dibayar'],0,',','.');
        $data['sisa'] = number_format($sisa,0,',','.');
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function save_voucher_pembayaran(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $nilai_po  = str_replace('.', '', $this->input->post('nilai_po'));
        $jumlah_dibayar  = str_replace('.', '', $this->input->post('jumlah_dibayar'));
        $amount  = str_replace('.', '', $this->input->post('amount'));
        if($nilai_po-($jumlah_dibayar+$amount)>0){
            $jenis_voucher = 'Parsial';
        }else{
            $jenis_voucher = 'Pelunasan';
        }
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('VSP', $tgl_input); 
        if($code){ 
            $this->db->insert('voucher', array(
                'no_voucher'=>$code,
                'tanggal'=>$tgl_input,
                'jenis_voucher'=>$jenis_voucher,
                'status'=>1,
                'po_id'=>$this->input->post('id'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'amount'=>$amount,
                'keterangan'=>$this->input->post('keterangan'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            ));
            
            $this->db->where('id', $this->input->post('id'));
            if($jenis_voucher=='Pelunasan'){
                $this->db->update('po', array('flag_pelunasan'=>1, 'status'=>4));
            }else{
                $this->db->update('po', array('flag_dp'=>1));
            }

            $this->db->insert('f_kas', array(
                'jenis_trx'=>1,
                'tanggal'=>$tgl_input,
                'tgl_jatuh_tempo'=>$this->input->post('tanggal_jatuh'),
                'no_giro'=>$this->input->post('nomor_giro'),
                'id_bank'=>$this->input->post('bank_id'),
                'currency'=>$this->input->post('currency'),
                'nominal'=>str_replace('.', '', $amount),
                'created_at'=>$tanggal,
                'created_by'=>$user_id
            ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Voucher pembayaran spare part berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher pembayaran spare part, silahkan coba kembali!');
            }
            redirect('index.php/BeliSparePart/po_list');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher pembayaran spare part gagal, penomoran belum disetup!');
            redirect('index.php/BeliSparePart/po_list');
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

        $data['content']= "beli_spare_part/voucher_list";
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->voucher_list($user_ppn)->result();

        $this->load->view('layout', $data);
    }

    function print_voucher(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $this->load->helper('terbilang_helper');
            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_voucher($id)->row_array();
            $data['list_data'] = $this->Model_finance->show_detail_voucher($id)->result();
            $total = 0;
            foreach ($data['list_data'] as $row) {
                $total += $row->amount;
            }
            $data['total'] = $total;

            $this->load->view('beli_spare_part/print_voucher', $data);   
        }else{
            redirect('index.php/BeliSparePart');
        }
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

        $data['content']= "beli_spare_part/spb_list";
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->spb_list()->result();

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

        $data['content']= "beli_spare_part/add_spb";
        $this->load->model('Model_beli_sparepart');
        
        $this->load->view('layout', $data);
    }

    function save_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-SP', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_spb_sparepart'=> $code,
                'tanggal'=> $tgl_input,
                'keterangan'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );

            if($this->db->insert('t_spb_sparepart', $data)){
                redirect('index.php/BeliSparePart/edit_spb/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB Sparepart gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/BeliSparePart/add_spb');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB Sparepart gagal disimpan, penomoran belum disetup!');
            redirect('index.php/BeliSparePart/spb_list');
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

            $data['content']= "beli_spare_part/edit_spb";
            $this->load->model('Model_beli_sparepart');
            $data['header'] = $this->Model_beli_sparepart->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_beli_sparepart->show_detail_spb($id)->result();
    
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart/spb_list');
        }
    }

    function load_detail_spb(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no = 1;
        $this->load->model('Model_beli_sparepart'); 
        $list_sparepart = $this->Model_beli_sparepart->jenis_barang_spb()->result();
        
        $myDetail = $this->Model_beli_sparepart->load_detail_spb($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_produk.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->qty.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td>';
        $tabel .= '<select id="barang_id" name="barang_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($list_sparepart as $value){
                $tabel .= "<option value='".$value->id."' data-id='".$value->nama_produk."'>".$value->nama_produk."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><input type="text" id="qty_item" name="qty" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel);  
    }

    function get_uom_spb(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_sparepart');
        $barang= $this->Model_beli_sparepart->show_data_barang($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function save_detail_spb(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        if($this->db->insert('t_spb_sparepart_detail', array(
            't_spb_sparepart_id'=>$this->input->post('id'),
            'qty'=>$this->input->post('qty'),
            'uom'=>$this->input->post('uom'),
            'tanggal' => $tgl_input,
            'jenis_inventory_id'=>$this->input->post('barang_id'),
            'keterangan'=>$this->input->post('line_remarks')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_spb(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('t_spb_sparepart_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'keterangan'=>$this->input->post('remarks'),
                'request_by'=>$this->input->post('request'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_spb_sparepart', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data SPB Sparepart berhasil disimpan');
        redirect('index.php/BeliSparePart/spb_list');
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

            $data['content']= "beli_spare_part/view_spb";

            $this->load->model('Model_beli_sparepart');
            $data['list_barang'] = $this->Model_beli_sparepart->jenis_barang_list_by_spb($id)->result();
            $data['myData'] = $this->Model_beli_sparepart->show_header_spb($id)->row_array();
            $data['myDetail'] = $this->Model_beli_sparepart->show_detail_spb_list($id)->result(); 
            $data['detailSPB'] = $this->Model_beli_sparepart->show_detail_spb_fulfilment($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart/spb_list');
        }
    }

    function load_detail_saved_item(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        
        $this->load->model('Model_beli_sparepart'); 
        $myDetail = $this->Model_beli_sparepart->load_detail_saved_item($id)->result(); 

        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_produk.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->qty.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    function save_detail_spb_sparepart_keluar(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $id= $this->input->post('t_spb_sparepart_id');
        $inventory_id = $this->input->post('jenis_inventory_id');
        $qty = $this->input->post('qty');
        $uom = $this->input->post('uom');
        $keterangan = $this->input->post('keterangan');

        $return_data = array();
        $data = array(
                't_spb_sparepart_id'=> $id,
                'jenis_inventory_id'=> $inventory_id,
                'qty'=> $qty,
                'uom'=> $uom,
                'keterangan'=> $keterangan,
            );
        
        if($this->db->insert('t_spb_sparepart_detail_keluar', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambah pemenuhan SPB Sparepart! Silahkan coba kembali";
        } 

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function delete_spb_sparepart_keluar(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();
        
        $this->db->where('id', $id);
        if($this->db->delete('t_spb_sparepart_detail_keluar')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB Sparepart! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function get_uom_view_spb(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_sparepart');
        $barang= $this->Model_beli_sparepart->show_data_barang_spb($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $id = $this->input->post('id');
        
        $this->db->trans_start();
        
        #Update status SPB
        $this->db->where('id', $id);
        $this->db->update('t_spb_sparepart', array(
                        'status'=> 1,
                        'keterangan' => $this->input->post('remarks'),
                        'approved_at'=> $tanggal,
                        'approved_by'=> $user_id
        ));

        $this->load->model('Model_beli_sparepart');
        $myDetail = $this->Model_beli_sparepart->load_detail_saved_item($id)->result(); 
        foreach ($myDetail as $row){
            $iv_id = $row->jenis_inventory_id;
            #Insert t_inventory_detail based on foreach
            $this->db->insert('t_inventory_detail', array(
                        't_inventory_id'=> $iv_id,
                        'tanggal'=> $tanggal,
                        'bruto_masuk'=> 0,
                        'netto_masuk'=> 0,
                        'bruto_keluar'=> $row->qty,
                        'netto_keluar'=> $row->qty,
                        'remarks'=>'SPB Sparepart'
            ));

            $get_stok = $this->Model_beli_sparepart->get_stok($iv_id)->row_array();
            #update t_inventory stok_bruto dan stok_netto
            $this->db->where('id', $iv_id);
            $this->db->update('t_inventory', array(
                        'stok_bruto'=> ($get_stok['stok_bruto'] - $row->qty),
                        'stok_netto'=> ($get_stok['stok_netto'] - $row->qty),
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
        ));
        }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/BeliSparePart/spb_list');
    }

    function laporan_list(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

            $data['content']= "beli_spare_part/laporan_list";
            $i=0;
            $this->load->model('Model_beli_sparepart'); 
            //$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
            $comment = $this->Model_beli_sparepart->show_laporan();
            if($comment->num_rows() > 0)
                {
                    foreach ($comment->result() as $r)
                    {
                        //bulan ini
                        $data['reg'][$i]['showdate']=$r->showdate;
                        $data['reg'][$i]['tanggal']=$r->tanggal;
                        $data['reg'][$i]['jumlah']=$r->jumlah;
                        $data['reg'][$i]['bruto_masuk']=$r->bruto_masuk;
                        $data['reg'][$i]['netto_masuk']=$r->netto_masuk;
                        $data['reg'][$i]['bruto_keluar']=$r->bruto_keluar;
                        $data['reg'][$i]['netto_keluar']=$r->netto_keluar;

                        //convert tanggal
                        $tgl=str_split($r->tanggal,4);
                        $tahun=$tgl[0];
                        $bulan=$tgl[1];

                        if($bulan==12){
                          $bulan = 1;
                          $tahun = $tahun+1;
                        } else {
                          $bulan= intval($bulan)+1;
                        }

                        // Get user details from user table
                        $before=$this->Model_beli_sparepart->show_laporan_after($tahun,$bulan);
                        if($before->num_rows() > 0)
                        {
                            foreach ($before->result() as $row)
                            {
                                // user details whatever you have in your db.
                                $data['reg'][$i]['jumlah_b']=$row->jumlah;
                                $data['reg'][$i]['bruto_masuk_b']=$row->bruto_masuk;
                                $data['reg'][$i]['netto_masuk_b']=$row->netto_masuk;
                                $data['reg'][$i]['bruto_keluar_b']=$row->bruto_keluar;
                                $data['reg'][$i]['netto_keluar_b']=$row->netto_keluar;
                            }
                        }
                        $i++;
                    }
                }
            $this->load->view('layout', $data);   
    }

    function view_laporan(){
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

            $items = strval($id);
            $tgl=str_split($id,4);
            $tahun=$tgl[0];
            $bulan=$tgl[1];

            $data['tgl'] = array(
                'tahun' => $tahun,
                'bulan' => $bulan
            );
            $i=0;
            $data['content']= "beli_spare_part/view_laporan";
            $this->load->model('Model_beli_sparepart');
            // $data['detailLaporan'] = $this->Model_beli_sparepart->show_view_laporan($bulan,$tahun)->result();
            $comment = $this->Model_beli_sparepart->show_view_laporan($bulan,$tahun);
            if($comment->num_rows() > 0)
                {
                    foreach ($comment->result() as $r)
                    {
                        //bulan ini
                        $data['reg'][$i]['id']=$r->id;
                        $data['reg'][$i]['showdate']=$r->showdate;
                        $data['reg'][$i]['tanggal']=$r->tanggal;
                        $data['reg'][$i]['nama_produk']=$r->nama_produk;
                        $data['reg'][$i]['jumlah']=$r->jumlah;
                        $data['reg'][$i]['bruto_masuk']=$r->bruto_masuk;
                        $data['reg'][$i]['netto_masuk']=$r->netto_masuk;
                        $data['reg'][$i]['bruto_keluar']=$r->bruto_keluar;
                        $data['reg'][$i]['netto_keluar']=$r->netto_keluar;

                        if($bulan==12){
                          $bulan = 1;
                          $tahun = $tahun+1;
                        } else {
                          $bulan= intval($bulan)+1;
                        }

                        // Get user details from user table
                        $before=$this->Model_beli_sparepart->show_view_laporan_after($tahun,$bulan,$r->id);
                        if($before->num_rows() > 0)
                        {
                            foreach ($before->result() as $row)
                            {
                                // user details whatever you have in your db.
                                $data['reg'][$i]['jumlah_b']=$row->jumlah;
                                $data['reg'][$i]['bruto_masuk_b']=$row->bruto_masuk;
                                $data['reg'][$i]['netto_masuk_b']=$row->netto_masuk;
                                $data['reg'][$i]['bruto_keluar_b']=$row->bruto_keluar;
                                $data['reg'][$i]['netto_keluar_b']=$row->netto_keluar;
                            }
                        }
                        $i++;
                    }
                }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart/laporan_list');
        }
    }

    function view_detail_laporan(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $id_barang = $this->uri->segment(4);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $items = strval($id);
            $tgl=str_split($id,4);
            $tahun=$tgl[0];
            $bulan=$tgl[1];

            $data['tgl'] = array(
                'tahun' => $tahun,
                'bulan' => $bulan
            );

            $data['content']= "beli_spare_part/view_detail_laporan";
            $this->load->model('Model_beli_sparepart');
            $data['detailLaporan'] = $this->Model_beli_sparepart->show_laporan_detail($bulan,$tahun,$id_barang)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliSparePart/laporan_list');
        }
    }

    function gudang_sparepart(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Sparepart";
        $data['content']   = "beli_spare_part/gudang_sparepart";
        
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->gudang_sp_list()->result();
        
        $this->load->view('layout', $data);
    }
}