<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeliRongsok extends CI_Controller{
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

        $data['content']= "beli_rongsok/index";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->po_list()->result();

        $this->load->view('layout', $data);
    }
    
    function po_list_outdated(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        //GANTI INTERVAL DI MODEL
        $data['content']= "beli_rongsok/po_outdated";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->po_list_outdated()->result();

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
        $data['content']= "beli_rongsok/add";
        
        $this->load->model('Model_beli_sparepart');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PO', $tgl_input); 

        $data = array(
            'no_po'=> $code,
            'tanggal'=> $tgl_input,
            'ppn'=> $user_ppn,
            'supplier_id'=>$this->input->post('supplier_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'jenis_po'=>'Rongsok',
            'created'=> $tanggal,
            'created_by'=> $user_id,
            'modified'=> $tanggal,
            'modified_by'=> $user_id
        );

        if($this->db->insert('po', $data)){
            redirect('index.php/BeliRongsok/edit/'.$this->db->insert_id());  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO rongsok gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/BeliRongsok');  
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

            $data['content']= "beli_rongsok/edit";
            $this->load->model('Model_beli_rongsok');
            $data['header'] = $this->Model_beli_rongsok->show_header_po($id)->row_array();  
            $data['list_data'] = $this->Model_beli_rongsok->load_detail($id)->result();
            $data['list_detail'] = $this->Model_beli_rongsok->show_data_po($id)->result();

            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'supplier_id'=>$this->input->post('supplier_id'),
                'term_of_payment'=>$this->input->post('term_of_payment'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('po', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data PO rongsok berhasil disimpan');
        redirect('index.php/BeliRongsok');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        $this->load->model('Model_rongsok');
        $list_rongsok = $this->Model_rongsok->list_data()->result();
        
        $this->load->model('Model_beli_rongsok'); 
        $myDetail = $this->Model_beli_rongsok->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->total_amount;
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td>';
        $tabel .= '<select id="rongsok_id" name="rongsok_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($list_rongsok as $value){
                $tabel .= "<option value='".$value->id."'>".$value->kode_rongsok.' - '.$value->nama_item."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><input type="text" id="harga" name="harga" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="qty" name="qty" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="15" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="total_harga" name="total_harga" class="form-control myline" '
                . 'readonly="readonly" value="0"></td>';
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>'; 
        $tabel .= '<tr>';
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total (Rp) </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        $tabel .= '</tr>';
       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function load_detail_dtr(){
        $tabel = "";
        $no    = 1;
        // $this->load->model('Model_rongsok');
        // $list_rongsok_on_po = $this->Model_rongsok->list_data_on_po($id)->result();
        
        $this->load->model('Model_beli_rongsok'); 
        $list_rongsok_on_po = $this->Model_beli_rongsok->show_data_rongsok()->result();
        /*
        $myDetail = $this->Model_beli_rongsok->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>';
            $tabel .= '<input type="checkbox" value="1" id="check_'.$no.'" name="myDetails['.$no.'][check]" 
                                            onclick="check();" class="form-control">';
            $tabel .= '<input type="hidden" name="myDetails['.$no.'][po_detail_id]" value="'.$row->id.'">';
            $tabel .= '<input type="hidden" name="myDetails['.$no.'][rongsok_id]" value="'.$row->rongsok_id.'">';
            $tabel .= '</td>';
            
            $tabel .= '<td><input type="text" name="myDetails['.$no.'][nama_item]" '
                        . 'class="form-control myline" value="'.$row->nama_item.'" '
                        . 'readonly="readonly"></td>';
            $tabel .= '<td><input type="text" name="myDetails['.$no.'][uom]" '
                        . 'class="form-control myline" value="'.$row->uom.'" '
                        . 'readonly="readonly"></td>';                                    
            $tabel .=  '<td><input type="text" name="myDetails['.$no.'][qty]" '
                        . 'class="form-control myline" value="'.$row->qty.'" '
                        . 'readonly="readonly"></td>';

            $tabel .= '<td><input type="text" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" '
                        . 'class="form-control myline" value="0" maxlength="10" '
                        . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
                                    
            $tabel .= '<td><input type="text" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" '
                       . 'class="form-control myline" value="0" maxlength="10" '
                       . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
                                    
            $tabel .= '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="loadTimbangan('
                        .$no.');"> <i class="fa fa-dashboard"></i> Timbang </a></td>';
                                    
            $tabel .= '<td><input type="text" id="pallete_'.$no.'"" name="myDetails['.$no.'][no_pallete]" '
                        . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
            $tabel .= '<td><input type="text" id="ket_'.$no.'"" name="myDetails['.$no.'][line_remarks]" '
                        . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
                                   
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $no++;
        }
        */

        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td>';
        $tabel .= '<input type="checkbox" value="1" id="check_'.$no.'" name="myDetails['.$no.'][check]" onclick="check();" class="form-control">';
        $tabel .= '<input type="hidden" id="po_id_'.$no.'" name="myDetails['.$no.'][po_detail_id]" value="">';
        $tabel .= '<input type="hidden" id="rongsok_id_'.$no.'" name="myDetails['.$no.'][rongsok_id]" value="">';
        $tabel .= '</td>';
        $tabel .= '<td><select id="name_rongsok" name="myDetails['.$no.'][nama_item]" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom_po(this.value,'.$no.');">';
            $tabel .= '<option value=""></option>';
            foreach ($list_rongsok_on_po as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom_'.$no.'" name="myDetails['.$no.'][uom]" class="form-control myline" '
                    .' readonly="readonly"></td>';
        $tabel .= '<td><input type="text" id="qty_'.$no.'" name="myDetails['.$no.'][qty]" class="form-control myline"></td>';
        
        $tabel .= '<td><input type="text" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" '
                    . 'class="form-control myline" value="0" maxlength="10" '
                    . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';

        $tabel .= '<td><input type="text" id="berat_palette_'.$no.'" name="myDetails['.$no.'][berat_palette]" '
                    . 'class="form-control myline" value="0" maxlength="10" '
                    . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
                                    
        $tabel .= '<td><input type="text" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" '
                    . 'class="form-control myline" value="0" maxlength="10" readonly="readonly"'
                    . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
                                    
/*        $tabel .= '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="loadTimbangan('
                    .$no.');"> <i class="fa fa-dashboard"></i> Timbang </a></td>'; */
        $tabel .= '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('.$no.');"> <i class="fa fa-dashboard"></i> Timbang </a></td>';                            
        $tabel .= '<td><input type="text" name="myDetails['.$no.'][no_pallete]" id="no_pallete_'.$no
                    .'" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
        $tabel .= '<td><input type="text" name="myDetails['.$no.'][line_remarks]" '
                    . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
        
       $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail('.$no.');" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_rongsok');
        $rongsok= $this->Model_rongsok->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }

     function get_uom_po(){
        // $idpo = $this->input->post('idpo');
        $iditem = $this->input->post('iditem');
        $this->load->model('Model_beli_rongsok');
        $rongsok= $this->Model_beli_rongsok->show_data_rongsok_detail($iditem)->row_array();
        // $this->load->model('Model_rongsok');
        // $rongsok= $this->Model_rongsok->show_data_po($idpo,$iditem)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }
    
    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('po_detail', array(
            'po_id'=>$this->input->post('id'),
            'rongsok_id'=>$this->input->post('rongsok_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
            'flag_dtr' => '1',
            'total_amount'=>str_replace('.', '', $this->input->post('total_harga'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item rongsok! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('po_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function print_po(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_rongsok');
            $data['header']  = $this->Model_beli_rongsok->show_header_po($id)->row_array();
            $data['details'] = $this->Model_beli_rongsok->show_detail_po($id)->result();

            $this->load->view('print_po_rongsok', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function show_po(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_rongsok');
        $data = $this->Model_beli_rongsok->show_header_po($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function save_voucher(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('VRSK', $tgl_input); 
        if($code){ 
            $this->db->insert('voucher', array(
                'no_voucher'=>$code,
                'tanggal'=>$tgl_input,
                'jenis_voucher'=>'DP',
                'po_id'=>$this->input->post('id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'amount'=>str_replace('.', '', $this->input->post('amount')),
                'keterangan'=>$this->input->post('keterangan'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            ));
            
            $this->load->model('Model_beli_rongsok');
            #update status DP jika sudah lunas
            $this->Model_beli_rongsok->update_status_dp($this->input->post('id'));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Voucher DP rongsok berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher DP rongsok, silahkan coba kembali!');
            }
            redirect('index.php/BeliRongsok');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher rongsok gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok');
        }
    }
    
    function create_dtr(){
        $module_name = $this->uri->segment(1);
        // $id = $this->uri->segment(3);
        // if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "beli_rongsok/create_dtr";
            $this->load->model('Model_beli_rongsok');
            $list_rongsok_on_po = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
            // $data['header'] = $this->Model_beli_rongsok->show_header_po($id)->row_array();           
            // $data['po_id'] = $id;
            // $this->load->model('Model_rongsok');
            // $list_rongsok_on_po = $this->Model_rongsok->list_data_on_po($id)->result();
            $opt_rongsok = '';
            foreach ($list_rongsok_on_po as $value){
                $opt_rongsok .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
            $data['option_rongsok'] = $opt_rongsok;
            $this->load->view('layout', $data);   
        // }else{
        //     redirect('index.php/BeliRongsok');
        // }
    }
    
    function save_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_dtr'=> $code,
                        'tanggal'=> $tgl_input,
                        'supplier_id'=> $this->input->post('supplier_id'),
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
                if(isset($row['check']) && $row['check']==1 && $row['rongsok_id']!=null){

                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        //'po_detail_id'=>$row['po_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'bruto'=>str_replace('.', '', $row['bruto']),
                        'berat_palette'=>str_replace('.', '', $row['berat_palette']),
                        'netto'=>str_replace('.', '', $row['netto']),
                        'no_pallete'=>$row['no_pallete'],
                        'line_remarks'=>$row['line_remarks'],
                        'tanggal_masuk'=>$tgl_input
                    ));
                   
                }
            }
            
            // #Update status PO
            // $this->db->where('id', $this->input->post('po_id'));
            // $this->db->update('po', array('status'=>2, 'modified'=>$tanggal, 'modified_by'=>$user_id));
                    
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTR berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTR, silahkan coba kembali!');
            }
            redirect('index.php/BeliRongsok/dtr_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan DTR gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok/dtr_list');
        }
    }
    
    function test_dtr(){
        $this->load->model('Model_m_numberings');
        $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
        echo $rand;

    }

    function dtr_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_rongsok/dtr_list";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->dtr_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_dtr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_rongsok');
            $data['header']  = $this->Model_beli_rongsok->show_header_dtr($id)->row_array();
            $data['details'] = $this->Model_beli_rongsok->show_detail_dtr($id)->result();

            $this->load->view('print_dtr', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_rongsok/matching";
        $this->load->model('Model_beli_rongsok');
        $data['po_list'] = $this->Model_beli_rongsok->get_po_list()->result();

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
        
        $data['content']= "beli_rongsok/proses_matching";
        $this->load->model('Model_beli_rongsok');
        $data['header_po']  = $this->Model_beli_rongsok->show_header_po($po_id)->row_array();
        $data['details_po'] = $this->Model_beli_rongsok->show_detail_po($po_id)->result();

        $dtr_app = $this->Model_beli_rongsok->get_dtr_approve($po_id)->result();
        foreach ($dtr_app as $index=>$row){
            $dtr_app[$index]->details = $this->Model_beli_rongsok->show_detail_dtr($row->id)->result();
        }
        $data['dtr_app'] = $dtr_app;
        $sp_id = $data['header_po']['supplier_id'];
        $dtr = $this->Model_beli_rongsok->get_dtr($sp_id)->result();
        foreach ($dtr as $index=>$row){
            $dtr[$index]->details = $this->Model_beli_rongsok->show_detail_dtr($row->id)->result();
        }
        $data['dtr'] = $dtr;
        $this->load->view('layout', $data);
    }
    
    function approve(){
        $dtr_id = $this->input->post('dtr_id');
        $po_id = $this->input->post('po_id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        
        $this->db->trans_start();       

            #Update status DTR
            $this->db->where('id', $dtr_id);
            $this->db->update('dtr', array(
                    'po_id'=>$po_id,
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
            
            if($this->db->trans_complete()){  
                
                #update po_detail_id di dtr_detail

                $po_dtr_check_update = $this->Model_beli_rongsok->check_to_update($po_id)->result();
                foreach ($po_dtr_check_update as $u) {
                    $this->db->where('id',$u->dtr_detail_id );
                    $this->db->update('dtr_detail',array(
                                    'po_detail_id'=>$u->id));
                }

                #update status PO, jika DTR sudah mencukupi
                $total_qty = 0;
                $total_netto_dtr = 0;
                $po_dtr_list = $this->Model_beli_rongsok->check_po_dtr($po_id)->result();
                foreach ($po_dtr_list as $v) {
                    #penghitungan +- 10 % PO ke DTR
                    if(((int)$v->tot_netto) >= (0.9*((int)$v->qty))){
                        #update po_detail flag_dtr
                        $this->Model_beli_rongsok->update_flag_dtr_po_detail($po_id,$v->rongsok_id);
                    }
                    $total_qty += $v->qty;
                    $total_netto_dtr += $v->tot_netto;
                }

               if(((int)$total_netto_dtr) >= (0.9*((int)$total_qty))){
                    $this->db->where('id',$po_id);
                    $this->db->update('po',array(
                                    'status'=>3));
               }else {
                    $this->db->where('id',$po_id);
                    $this->db->update('po',array(
                                    'status'=>2));
               }

                  
                $return_data['type_message']= "sukses";
                $return_data['message'] = "TTR sudah diberikan ke bagian gudang";
                //$return_data['message']= "TTR berhasil di-create dengan nomor : ".$code;                 
        }else{
            $return_data['type_message']= "error";
            $return_data['message']= "Pembuatan TTR gagal, penomoran belum disetup!";
        }                  
        
       header('Content-Type: application/json');
       echo json_encode($return_data);
    }
    
    public function approve_ttr(){
        $ttr_id = $this->input->post('id');
        $tanggal = date('Y-m-d h:i:s');
        $user_id = $this->session->userdata('user_id');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('TTR', $tanggal);

        #Update status TTR
            $this->db->where('id',$ttr_id);
            $result = $this->db->update('ttr', array(
                    'no_ttr' => $code,
                    'ttr_status'=>1,
                    'tgl_approve'=>$tanggal,
                    'approved_by'=>$user_id));

        #Update Stok Rongsok Tersedia
            $this->load->model('Model_beli_rongsok');
            $dtr_list = $this->Model_beli_rongsok->show_detail_dtr_by_ttr($ttr_id)->result();
            foreach ($dtr_list as $k => $v) {
                $this->Model_beli_rongsok->update_stok_tersedia($v->rongsok_id,$v->netto);
            }
        
            
        if($this->db->trans_complete()){
            $message['status'] = '1';
                $message['message'] = 'TTR berhasil diterima dengan no: '.$code;
        }else{
            $message['status'] = '0';
            $message['message'] = 'Error terima TTR, silahkan coba lagi';
        }
            
        header('Content-Type: application/json');
        echo json_encode($message);
        

                #Update Stok Rongsok
                /*
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
                    'remarks'=>'Pembelian rongsok',
                ));
                
                */
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
        
        $this->db->where('id', $this->input->post('dtr_id'));
        $this->db->update('dtr', $data);

        redirect('index.php/BeliRongsok/proses_matching/'.$this->input->post('po_id'));
    }
    
    function reject_ttr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'ttr_status'=> 9,
                'no_ttr'=> null,
                'tgl_rejected'=> $tanggal,
                'rejected_by'=>$user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update('ttr', $data);

         if($result){
                $message['status'] = '1';
                $message['message'] = 'TTR berhasil ditolak, akan mengarahkan ke daftar TTR...';
            }else{
                $message['status'] = '0';
                $message['message'] = 'Error tolak TTR, silahkan coba lagi';
            }
            
        header('Content-Type: application/json');
        echo json_encode($message);
        
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

            $data['content']= "beli_rongsok/edit_dtr";
            $this->load->model('Model_beli_rongsok');
            $data['header']  = $this->Model_beli_rongsok->show_header_dtr($id)->row_array(); 
            $data['details'] = $this->Model_beli_rongsok->show_detail_dtr($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function proses_dtr(){
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

            $data['content']= "beli_rongsok/proses_dtr";
            $this->load->model('Model_beli_rongsok');
            $data['header']  = $this->Model_beli_rongsok->show_header_dtr($id)->row_array(); 
            $data['details'] = $this->Model_beli_rongsok->show_detail_dtr($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }
    
    function update_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $this->db->trans_start();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dtr', array(
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
        redirect('index.php/BeliRongsok/dtr_list');
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

            $data['content']= "beli_rongsok/create_ttr";
            $this->load->model('Model_beli_rongsok');
            $data['header'] = $this->Model_beli_rongsok->show_header_dtr($id)->row_array();           
            $data['details'] = $this->Model_beli_rongsok->show_detail_dtr($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }
    
    function save_ttr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
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
            redirect('index.php/BeliRongsok/dtr_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan TTR gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok/dtr_list');
        }
    }
    
    function ttr_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_rongsok/ttr_list";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->ttr_list()->result();

        $this->load->view('layout', $data);
    }
    
    function review_ttr(){
        $id = $this->uri->segment(3);
        if($id){    
            $group_id = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
                }
            $data['group_id']  = $group_id;

            $this->load->model('Model_beli_rongsok');
            $data['header']  = $this->Model_beli_rongsok->show_header_ttr($id)->row_array();
            $data['details'] = $this->Model_beli_rongsok->show_detail_ttr($id)->result();
            $data['content'] = 'beli_rongsok/review_ttr';
            $this->load->view('layout', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_ttr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_rongsok');
            $data['header']  = $this->Model_beli_rongsok->show_header_ttr($id)->row_array();
            $data['details'] = $this->Model_beli_rongsok->show_detail_ttr($id)->result();

            $this->load->view('print_ttr', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function create_voucher_pelunasan(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_rongsok');
        $data = $this->Model_beli_rongsok->get_data_pelunasan($id)->row_array(); 
        $sisa = $data['nilai_po']- $data['nilai_dp'];
        $data['nilai_po'] = number_format($data['nilai_po'],0,',','.');
        $data['nilai_dp'] = number_format($data['nilai_dp'],0,',','.');
        $data['sisa']     = number_format($sisa,0,',','.');
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function save_voucher_pelunasan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('VRSK', $tgl_input); 
        if($code){ 
            $this->db->insert('voucher', array(
                'no_voucher'=>$code,
                'tanggal'=>$tgl_input,
                'jenis_voucher'=>'Pelunasan',
                'po_id'=>$this->input->post('id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'amount'=>str_replace('.', '', $this->input->post('amount')),
                'keterangan'=>$this->input->post('keterangan'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            ));
            
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('po', array('flag_pelunasan'=>1, 'status'=>4));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Voucher Pelunasan rongsok berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher Pelunasan rongsok, silahkan coba kembali!');
            }
            redirect('index.php/BeliRongsok');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher rongsok gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok');
        }
    }
    
    function load_angka_timbangan(){
        $return_data = array();
        $dataxml = simplexml_load_file('http://localhost/timbangan/my_xml.php');
        $return_data['type_message'] = $dataxml->type_message;
        $return_data['message'] = $dataxml->message;
        $return_data['berat'] = $dataxml->berat;
        
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function close_po(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->update('po', array('status'=>1, 'modified'=>$tanggal, 'modified_by'=>$user_id))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal close PO! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function voucher_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_rongsok/voucher_list";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->voucher_list()->result();

        $this->load->view('layout', $data);
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

            $data['content']= "beli_rongsok/laporan_list";
            $i=0;
            $this->load->model('Model_beli_rongsok'); 
            //$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
            $comment = $this->Model_beli_rongsok->show_laporan();
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
                        $before=$this->Model_beli_rongsok->show_laporan_after($tahun,$bulan);
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

            $data['content']= "beli_rongsok/view_laporan";
            $this->load->model('Model_beli_rongsok');
            $data['detailLaporan'] = $this->Model_beli_rongsok->show_view_laporan($bulan,$tahun)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok/laporan_list');
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

            $data['content']= "beli_rongsok/view_detail_laporan";
            $this->load->model('Model_beli_rongsok');
            $data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_detail($bulan,$tahun,$id_barang)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok/laporan_list');
        }
    }

    function gudang_rongsok(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Rongsok";
        $data['content']   = "beli_rongsok/gudang_rongsok";
        
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->gudang_rongsok_list()->result();
        
        $this->load->view('layout', $data);
    }
}