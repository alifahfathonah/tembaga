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
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.($no+1).'</td>';
        $tabel .= '<td>';
        $tabel .= '<select id="sparepart_id_'.$no.'" name="sparepart_id_'.$no.'" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value, '.$no.');">';
            $tabel .= '<option value=""></option>';
            foreach ($list_sparepart as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom_'.$no.'" name="uom_'.$no.'" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><input type="text" id="qty_'.$no.'" name="qty_'.$no.'" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="3"></td>';
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail('.$no.');" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';
       
        
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
                        'ppn'=>$user_ppn,
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
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_spare_part/po_list";
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_sparepart->po_list()->result();

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
            $data['details'] = $this->Model_beli_sparepart->show_detail_po($id)->result(); 
            
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
                        'pengirim'=>$this->input->post('pengirim'),
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
                    $this->db->update('po_detail', array('flag_lpb'=>1));
                }
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
        $sisa = $data['nilai_po']- $data['jumlah_dibayar'];
        $data['nilai_po'] = number_format($data['nilai_po'],0,',','.');
        $data['jumlah_dibayar'] = number_format($data['jumlah_dibayar'],0,',','.');
        $data['sisa']     = number_format($sisa,0,',','.');
        
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
                'po_id'=>$this->input->post('id'),
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
                $this->db->update('po', array('flag_pelunasan'=>1));
            }else{
                $this->db->update('po', array('flag_dp'=>1));
            }
            
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
}