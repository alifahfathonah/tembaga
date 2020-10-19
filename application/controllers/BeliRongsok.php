<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeliRongsok extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }

    function test_timbang(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_rongsok/test_timbang";
        // $this->load->model('Model_beli_rongsok');
        // $this->load->model('Model_beli_sparepart');
        // $data['list_data'] = $this->Model_beli_rongsok->po_list($ppn)->result();
        // $data['bank_list'] = $this->Model_beli_sparepart->bank($ppn)->result();

        $this->load->view('layout', $data);
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

        $data['content']= "beli_rongsok/index";
        if(null!==$this->uri->segment(3) && null!==$this->uri->segment(4)){
            $s = $this->uri->segment(3);
            $e = $this->uri->segment(4);
        }else{
            $e = date('Y-m-d');
            $s = date('Y-m-d', strtotime('-6 months'));
        }

        $this->load->model('Model_beli_rongsok');
        $this->load->model('Model_beli_sparepart');
        $data['list_data'] = $this->Model_beli_rongsok->po_list($ppn,$s,$e)->result();
        $data['bank_list'] = $this->Model_beli_sparepart->bank($ppn)->result();

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
        $data['content']= "beli_rongsok/po_outdated";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->po_list_outdated($user_ppn)->result();
        $data['bank_list'] = $this->Model_beli_sparepart->bank($ppn)->result();

        $this->load->view('layout', $data);
    }

    function filter_po(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id'); 
            $ppn = $this->session->userdata('user_ppn');            
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $arr=explode("&",$id);

            $data['content']= "beli_rongsok/index";
            $this->load->model('Model_beli_rongsok');
            $data['list_data'] = $this->Model_beli_rongsok->po_list_filter(date("Y-m-d", strtotime($arr[0])),date("Y-m-d", strtotime($arr[1])))->result();
            $this->load->model('Model_beli_sparepart');
            $data['bank_list'] = $this->Model_beli_sparepart->bank($ppn)->result();

            $this->load->view('layout', $data);
        }else{
            redirect('index.php/BeliRongsok');
        }
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
        $data['no'] = $this->Model_beli_sparepart->get_last_po('Rongsok')->row_array();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->db->trans_start();
        if($user_ppn == 0){
            $this->load->model('Model_m_numberings');
            $code = $this->Model_m_numberings->getNumbering('PO', $tgl_input); 
        }else{
            $code = 'PO-RSK.'.$tgl_po.'.'.$this->input->post('no_po');
            $count = $this->db->query("Select count(id) as count from po where no_po = '".$code."'")->row_array();
            if($count['count']){
                $this->session->set_flashdata('flash_msg', 'Nomor PO sudah Ada. Please try again!');
                redirect('index.php/BeliRongsok/add');
            }
        }

        $data = array(
            'no_po'=> $code,
            'tanggal'=> $tgl_input,
            'flag_ppn'=> $user_ppn,
            'flag_tolling'=> 0,
            'type'=> 0,
            'ppn'=> $this->input->post('ppn'),
            'diskon'=>str_replace('.', '', $this->input->post('diskon')),
            'materai'=>$this->input->post('materai'),
            'currency'=> $this->input->post('currency'),
            'kurs'=> $this->input->post('kurs'),
            'supplier_id'=>$this->input->post('supplier_id'),
            'remarks'=> $this->input->post('remarks'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'jenis_po'=>'Rongsok',
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
            redirect('index.php/BeliRongsok/edit/'.$po_id);  
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
            if($data['header']['status']==0){    
                $this->load->model('Model_rongsok');
                $data['list_rongsok'] = $this->Model_rongsok->list_data()->result();
                $data['count'] = $this->Model_beli_rongsok->count_po_detail($id)->row_array();
            }else{
                $data['count'] = $this->Model_beli_rongsok->count_po_detail($id)->row_array();
                $data['list_data'] = $this->Model_beli_rongsok->load_detail($id)->result();
                $data['list_detail'] = $this->Model_beli_rongsok->show_data_po($id)->result();
            }

            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function view_po(){
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

            $data['content']= "beli_rongsok/view_po";
            $this->load->model('Model_beli_rongsok');
            $data['header'] = $this->Model_beli_rongsok->show_header_po($id)->row_array();
            $data['list_detail'] = $this->Model_beli_rongsok->show_data_po($id)->result();
            $data['list_voucher'] = $this->Model_beli_rongsok->show_data_voucher($id)->result();

            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'ppn'=> $this->input->post('ppn'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'remarks'=> $this->input->post('remarks'),
                'term_of_payment'=>$this->input->post('term_of_payment'),
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

            $ch = curl_init(target_url().'api/BeliRongsokAPI/po_detail');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);
        }
        
        $this->session->set_flashdata('flash_msg', 'Data PO rongsok berhasil disimpan');
        redirect('index.php/BeliRongsok');
    }

    function update_po(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'no_po'=>strtoupper($this->input->post('no_po')),
                'tanggal'=> $tgl_input,
                'remarks'=> $this->input->post('remarks'),
                'term_of_payment'=>$this->input->post('term_of_payment'),
                'ppn'=>$this->input->post('ppn'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('po', $data);

        if($this->session->userdata('user_ppn')==1){
            $this->load->helper('target_url');
            
            $data_post['master'] = $data;
            $data_post['po_id'] = $this->input->post('id');

            $detail_post = json_encode($data_post);

            $ch = curl_init(target_url().'api/BeliRongsokAPI/po_update');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);
            // print_r($response);die();
        }
        
        $this->session->set_flashdata('flash_msg', 'Data PO rongsok berhasil disimpan');
        redirect('index.php/BeliRongsok/edit/'.$this->input->post('id'));
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 0;
        $total = 0;
        $qty = 0;
        $cek = 0;
        
        $this->load->model('Model_beli_rongsok'); 
        $myDetail = $this->Model_beli_rongsok->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $no++;
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,2,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,2,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,2,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $cek += $row->id;
            $qty += $row->qty;
            $total += $row->total_amount;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<input type="hidden" id="count2" value="'.$cek.'">';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($qty,2,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,2,',','.').'</strong></td>';
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

//         $tabel .= '<tr>';
//         $tabel .= '<td style="text-align:center">'.$no.'</td>';
//         $tabel .= '<td>';
//         $tabel .= '<input type="checkbox" value="1" id="check_'.$no.'" name="myDetails['.$no.'][check]" onclick="check();" class="form-control">';
//         $tabel .= '<input type="hidden" id="po_id_'.$no.'" name="myDetails['.$no.'][po_detail_id]" value="">';
//         $tabel .= '<input type="hidden" id="rongsok_id_'.$no.'" name="myDetails['.$no.'][rongsok_id]" value="">';
//         $tabel .= '</td>';
//         $tabel .= '<td><select id="name_rongsok" name="myDetails['.$no.'][nama_item]" class="form-control select2me myline" ';
//             $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom_po(this.value,'.$no.');">';
//             $tabel .= '<option value=""></option>';
//             foreach ($list_rongsok_on_po as $value){
//                 $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
//             }
//         $tabel .= '</select>';
//         $tabel .= '</td>';
//         $tabel .= '<td><input type="text" id="uom_'.$no.'" name="myDetails['.$no.'][uom]" class="form-control myline" '
//                     .' readonly="readonly"></td>';        
//         $tabel .= '<td><input type="text" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" '
//                     . 'class="form-control myline" value="0" maxlength="10" '
//                     . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';

//         $tabel .= '<td><input type="text" id="berat_palette_'.$no.'" name="myDetails['.$no.'][berat_palette]" '
//                     . 'class="form-control myline" value="0" maxlength="10" '
//                     . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
                                    
//         $tabel .= '<td><input type="text" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" '
//                     . 'class="form-control myline" value="0" maxlength="10" readonly="readonly"'
//                     . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
                                    
// /*        $tabel .= '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="loadTimbangan('
//                     .$no.');"> <i class="fa fa-dashboard"></i> Timbang </a></td>'; */
//         $tabel .= '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('.$no.');"> <i class="fa fa-dashboard"></i> Timbang </a></td>';                            
//         $tabel .= '<td><input type="text" name="myDetails['.$no.'][no_pallete]" id="no_pallete_'.$no
//                     .'" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
//         $tabel .= '<td><input type="text" name="myDetails['.$no.'][line_remarks]" '
//                     . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
        
//        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
//                 . 'yellow-gold" onclick="saveDetail('.$no.');" style="margin-top:5px" id="btnSaveDetail"> '
//                 . '<i class="fa fa-plus"></i> Tambah </a></td>';
//         $tabel .= '</tr>';
        
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
        $iditem = $this->input->post('iditem');
        $this->load->model('Model_beli_rongsok');
        $rongsok= $this->Model_beli_rongsok->show_data_rongsok_detail($iditem)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }
    
    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('po_detail', array(
            'po_id'=>$this->input->post('id'),
            'rongsok_id'=>$this->input->post('rongsok_id'),
            'amount'=>str_replace(',', '', $this->input->post('harga')),
            'qty'=>str_replace(',', '', $this->input->post('qty')),
            'flag_dtr' => '1',
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
            $data['rows'] = count($data['details']);
            if ($this->session->userdata('user_ppn') == 0) {
                $this->load->view('print_po_rongsok', $data);    
            } else {
                $this->load->view('print_po_rongsok_ppn', $data); 
            }
            
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

    function create_voucher(){
        $id = $this->input->post('id');
        // $this->load->helper('terbilang_d_helper');
        $this->load->model('Model_beli_rongsok');
        $data = $this->Model_beli_rongsok->voucher_po_rsk($id)->row_array();
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
        $code = $this->Model_m_numberings->getNumbering('VRSK', $tgl_input);
        if($nilai_po-($nilai_dp+$amount)==0 && $this->input->post('status_vc') == 3){
            $jenis_voucher = 'Pelunasan';
            $this->db->where('id', $id);
            $this->db->update('po', array('flag_pelunasan'=>1,'status'=>4));
        }else{
            $jenis_voucher = 'DP';
            $this->db->where('id', $id);
            $this->db->update('po', array('flag_dp'=>1));
        }

        // echo $nilai_po-($nilai_dp+$amount).' | '.$this->input->post('status_vc');die();

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
                $this->session->set_flashdata('flash_msg', 'Voucher rongsok berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher  rongsok, silahkan coba kembali!');
            }
            redirect('index.php/BeliRongsok');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher rongsok gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok');
        }
    }
    
    function get_no_uang_keluar(){
        $tgl_code = date('Y', strtotime($this->input->post('tanggal')));

        if($this->input->post('bank_id')<=3){
            if($this->session->userdata('user_ppn')==1){
                $code_um = 'KK-KMP.'.$tgl_code.'.'.$this->input->post('no_uk');
            }else{
                $code_um = 'KK.'.$tgl_code.'.'.$this->input->post('no_uk');
            }
        }else{
            if($this->session->userdata('user_ppn')==1){
                $code_um = 'BK-KMP.'.$tgl_code.'.'.$this->input->post('no_uk');
            }else{
                $code_um = 'BK.'.$tgl_code.'.'.$this->input->post('no_uk');
            }
        }

        $count = $this->db->query("select count(id) as count from f_kas where nomor ='".$code_um."'")->row_array();
        if($count['count']>0){
            $data['type'] = 'duplicate';
        }else{
            $data['type'] = 'sukses';
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_no_po(){
        $tgl_code = date('Ym', strtotime($this->input->post('tanggal')));

        $code_po = 'PO-RSK.'.$tgl_code.'.'.$this->input->post('no_po');
        // print_r($code_po);
        // die();
        $count = $this->db->query("select count(id) as count from po where no_po ='".$code_po."'")->row_array();
        // print_r($count);die();
        if($count['count']>0){
            $data['type'] = 'duplicate';
        }else{
            $data['type'] = 'sukses';
        }
        header('Content-Type: application/json');
        echo json_encode($data);
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
            $code = $this->Model_m_numberings->getNumbering('VRSK-KMP', $tgl_input);
        }else{
            $code = $this->Model_m_numberings->getNumbering('VRSK', $tgl_input); 
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

                if($result['status']==true){
                    $this->db->where('id', $fk_id);
                    $this->db->update('f_kas', array('api'=>1));
                }
            }

            if($this->db->trans_complete()){  
                $this->session->set_flashdata('flash_msg', 'Voucher pembayaran Rongsok berhasil di-create dengan nomor : '.$code);
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher pembayaran Rongsok, silahkan coba kembali!');
            }
            redirect('index.php/BeliRongsok');
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher pembayaran Rongsok gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok');
        }
    }

    function get_no_dtr(){
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $code = 'DTR-KMP.'.$tgl_po.'.'.$this->input->post('id');
        $count = $this->db->query("select count(id) as count from dtr where no_dtr ='".$code."'")->row_array();
        if($count['count']>0){
            $data['type'] = 'duplicate';
        }else{
            $data['type'] = 'sukses';
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_no_ttr(){
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $code = 'TTR-KMP.'.$tgl_po.'.'.$this->input->post('no_ttr');

        $count = $this->db->query("select count(id) as count from ttr where no_ttr ='".$code."'")->row_array();
        if($count['count']>0){
            $data['type'] = 'duplicate';
        }else{
            $data['type'] = 'sukses';
        }
        header('Content-Type: application/json');
        echo json_encode($data);
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

            $data['content']= "beli_rongsok/create_dtr";
            $this->load->model('Model_beli_rongsok');
            $data['list_rongsok_on_po'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
            $this->load->view('layout', $data);
    }

    function tambah_dtr(){
            $module_name = $this->uri->segment(1);
            $id = $this->uri->segment(3);
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "beli_rongsok/tambah_dtr";
            $this->load->model('Model_beli_rongsok');
            $data['list_rongsok_on_po'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
            $data['header']  = $this->Model_beli_rongsok->show_header_dtr($id)->row_array();
            $this->load->view('layout', $data);
    }

    function generate_palette(){
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);
        
        $data['no_packing'] = $tgl_code.substr($code,13,4);

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function save_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        if($user_ppn==1){
            $code = 'DTR-KMP.'.$tgl_po.'.'.$this->input->post('no_dtr');
        }else{
            $code = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
        }

        if($code){        
            $data = array(
                        'no_dtr'=> $code,
                        'tanggal'=> $tgl_input,
                        'flag_ppn'=> $user_ppn,
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
            foreach ($details as $i => $row){
                if($row['rongsok_id']!=''){
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        //'po_detail_id'=>$row['po_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
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
            
            // #Update status PO
            // $this->db->where('id', $this->input->post('po_id'));
            // $this->db->update('po', array('status'=>2, 'modified'=>$tanggal, 'modified_by'=>$user_id));
                    
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTR berhasil di-create dengan nomor : '.$code);
                if($this->input->post('supplier_id')==822){
                    redirect('index.php/BeliRongsok/proses_dtr/'.$dtr_id);
                }else{
                    redirect('index.php/BeliRongsok/dtr_list');
                }             
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTR, silahkan coba kembali!');
            }
            redirect('index.php/BeliRongsok/dtr_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan DTR gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok/dtr_list');
        }
    }

    function save_tambah_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $dtr_id = $this->input->post('id');
        $details = $this->input->post('myDetails');
        foreach ($details as $i => $row){
            if($row['rongsok_id']!=''){
                $this->db->insert('dtr_detail', array(
                    'dtr_id'=>$dtr_id,
                    //'po_detail_id'=>$row['po_detail_id'],
                    'rongsok_id'=>$row['rongsok_id'],
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
        
        // #Update status PO
        // $this->db->where('id', $this->input->post('po_id'));
        // $this->db->update('po', array('status'=>2, 'modified'=>$tanggal, 'modified_by'=>$user_id));
                
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'data DTR berhasil di-tambah');
            redirect('index.php/BeliRongsok/edit_dtr/'.$dtr_id);
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat tambah DTR, silahkan coba kembali!');
        }
        redirect('index.php/BeliRongsok/edit_dtr/'.$dtr_id);
    }

    function re_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

            $code = $this->input->post('no_dtr');

            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                $this->db->where('id', $row['id']);
                $this->db->update('dtr_detail', array(
                    'bruto'=>$row['bruto'],
                    'berat_palette'=>$row['berat_palette'],
                    'netto'=>$row['netto'],
                    'no_pallete'=>$row['no_pallete'],
                    'line_remarks'=>$row['line_remarks'],
                    'modified'=>$tanggal,
                    'modified_by'=>$user_id,
                    'tanggal_masuk'=>$tgl_input
                ));
            }

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('dtr', array(
                        'supplier_id'=>$this->input->post('supplier_id'),
                        'tanggal'=>$tgl_input,
                        'status'=>0,
                        'remarks'=>$this->input->post('remarks'),
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id
            ));
            
            // #Update status PO
            // $this->db->where('id', $this->input->post('po_id'));
            // $this->db->update('po', array('status'=>2, 'modified'=>$tanggal, 'modified_by'=>$user_id));
                    
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTR berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTR, silahkan coba kembali!');
            }
            redirect('index.php/BeliRongsok/dtr_list');
    }

    function test_dtr(){
        $this->load->model('Model_m_numberings');
        $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
        echo $rand;
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

        $data['content']= "beli_rongsok/dtr_list";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->dtr_list($user_ppn)->result();

        $this->load->view('layout', $data);
    }
    
    function filter_dtr(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $user_ppn    = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $s = $this->uri->segment(3);
        $e = $this->uri->segment(4);

        $data['content']= "beli_rongsok/dtr_list";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->filter_dtr($user_ppn,$s,$e)->result();

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
        $user_ppn = $this->session->userdata('user_ppn');         
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_rongsok/matching";
        $this->load->model('Model_beli_rongsok');
        $data['po_list'] = $this->Model_beli_rongsok->get_po_list($user_ppn)->result();

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
        $dtr = $this->Model_beli_rongsok->get_dtr($sp_id,$user_ppn)->result();
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
        $tanggal  = date('Y-m-d H:i:s');
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
            redirect('index.php/BeliRongsok/proses_matching/'.$this->input->post('po_id'));
            // $return_data['type_message']= "sukses";
            // $return_data['message'] = "TTR sudah diberikan ke bagian gudang";
            // $return_data['message']= "TTR berhasil di-create dengan nomor : ".$code;                 
        }else{
            redirect('index.php/BeliRongsok/proses_matching/'.$this->input->post('po_id'));
        }
       // header('Content-Type: application/json');
       // echo json_encode($return_data);
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
                $ch = curl_init(target_url().'api/BeliRongsokAPI/dtr');
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
        redirect('index.php/BeliRongsok/ttr_list');
    }

    function approve_ttr(){
        $ttr_id = $this->input->post('id');
        $tanggal = date('Y-m-d h:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_id = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');

            if($this->input->post('flag_gudang') > 0){
                if($this->input->post('po_id') > 0 || $this->input->post('so_id') > 0){
                    $num = 'TTR';
                }else{
                    $num = 'BPB-R';
                }
            }else{
                $num = 'BPB-R';
            }

            $code = $this->Model_m_numberings->getNumbering($num, $tgl_input);

            if($this->input->post('stok')==1){
                $status = 1;
            }else{
                $status = 2;
            }

        #Update status TTR
            $this->db->where('id',$ttr_id);
            $result = $this->db->update('ttr', array(
                    'no_ttr' => $code,
                    'no_sj' => $this->input->post('no_sj'),
                    'tanggal' => $tgl_input,
                    'jmlh_afkiran' => $this->input->post('jumlah_afkir'),
                    'jmlh_pengepakan' => $this->input->post('jumlah_packing'),
                    'jmlh_lain'=> $this->input->post("jumlah_lain"),
                    'ttr_status'=>$status,
                    'tgl_approve'=>$tanggal,
                    'approved_by'=>$user_id));

            if($this->db->trans_complete()){
                redirect('index.php/BeliRongsok/ttr_list');
            }else{
                $this->session->set_flashdata('flash_msg', 'TTR gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/BeliRongsok/ttr_list');  
            }            
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

        redirect('index.php/BeliRongsok/proses_matching/'.$this->input->post('po_id'));
    }
    
    function reject_ttr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
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
            redirect('index.php/BeliRongsok');
        }
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
            $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
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
        redirect('index.php/BeliRongsok/dtr_list');
    }
    
    function update_dtr_rsk(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $dtr_id = $this->input->post('id');

        $this->db->trans_start();
        
            $this->db->where('id', $dtr_id);
            $this->db->update('dtr', array(
                        'status'=>1,
                        'remarks'=>$this->input->post('remarks'),
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id
            ));

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
            if($this->input->post('supplier_id')==822){
                redirect('index.php/BeliRongsok/review_ttr/'.$ttr_id);
            }else{
                $this->session->set_flashdata('flash_msg', 'DTR dengan nomor : '.$this->input->post('no_dtr').' berhasil diupdate...');  
                redirect('index.php/BeliRongsok/dtr_list');   
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat updates DTR, silahkan coba kembali!');
            redirect('index.php/BeliRongsok/dtr_list');
        }
    }

    function update_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $dtr_id = $this->input->post('id');

        $this->db->trans_start();
        
            $this->db->where('id', $dtr_id);
            $this->db->update('dtr', array(
                        'status'=>0,
                        'remarks'=>$this->input->post('remarks'),
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id
            ));

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
            $this->session->set_flashdata('flash_msg', 'DTR dengan nomor : '.$this->input->post('no_dtr').' berhasil diupdate...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat updates DTR, silahkan coba kembali!');
        }
        redirect('index.php/BeliRongsok/dtr_list');
    }

    function reject_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('dtr', $data);
        
        $this->session->set_flashdata('flash_msg', 'Reject DTR rongsok berhasil direject');
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
            redirect('index.php/BeliRongsok/dtr_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan TTR gagal, penomoran belum disetup!');
            redirect('index.php/BeliRongsok/dtr_list');
        }
    }
    
    function ttr_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');   
        $user_ppn = $this->session->userdata('user_ppn');          
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        if(null!==$this->uri->segment(3) && null!==$this->uri->segment(4)){
            $s = $this->uri->segment(3);
            $e = $this->uri->segment(4);
        }else{
            $e = date('Y-m-d');
            $s = date('Y-m-d', strtotime('-2 months'));
        }
        $data['content']= "beli_rongsok/ttr_list";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->ttr_list($user_ppn,$s,$e)->result();

        $this->load->view('layout', $data);
    }

    function bpb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');   
        $user_ppn = $this->session->userdata('user_ppn');          
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        if(null!==$this->uri->segment(3) && null!==$this->uri->segment(4)){
            $s = $this->uri->segment(3);
            $e = $this->uri->segment(4);
        }else{
            $e = date('Y-m-d');
            $s = date('Y-m-d', strtotime('-2 months'));
        }

        $data['content']= "beli_rongsok/ttr_list";
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->bpb_list($user_ppn,$s,$e)->result();

        $this->load->view('layout', $data);
    }

    function review_ttr(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $user_ppn = $this->session->userdata('user_ppn');
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
            $pengepakan = 0;
            foreach ($data['details'] as $v) {
                $pengepakan += $v->bruto-$v->netto;
            }
            $data['header']['pengepakan'] = $pengepakan;
            
            if($user_ppn == 1){
                $data['content'] = 'beli_rongsok/review_ttr_resmi';
            }else{
                $data['content'] = 'beli_rongsok/review_ttr';
            }

            $this->load->view('layout', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_ttr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_rongsok');
            $this->load->helper('tanggal_indo');
            $data['header']  = $this->Model_beli_rongsok->show_header_ttr($id)->row_array();
            $data['details'] = $this->Model_beli_rongsok->show_detail_ttr_group($id)->result();
            if($this->session->userdata('user_ppn')>0){
                $this->load->view('print_ttr_ppn', $data);
            }else{
                $this->load->view('print_ttr', $data);
            }
        }else{
            redirect('index.php'); 
        }
    }

    function print_ttr_harga(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_rongsok');
            $this->load->helper('tanggal_indo');
            $data['header']  = $this->Model_beli_rongsok->show_header_ttr($id)->row_array();
            $poid = $data['header']['po_id'];
            $data['details'] = $this->Model_beli_rongsok->show_detail_ttr_harga($id, $poid)->result();

            $this->load->view('beli_rongsok/print_ttr_harga', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function save_voucher_pelunasan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
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
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $user_ppn = $this->session->userdata('user_ppn');
        
        $this->db->trans_start();

        $data = array(
                'flag_pelunasan'=> 1,
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

                $ch = curl_init(target_url().'api/BeliRongsokAPI/close_po');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
            }

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'PO Rongsok Berhasil di Close');
            redirect('index.php/BeliRongsok');
        }else{
            $this->session->set_flashdata('flash_msg', 'PO Rongsok GAGAL di Close');
            redirect('index.php/BeliRongsok');
        }


        // $id = $this->input->post('id');
        // $user_id  = $this->session->userdata('user_id');
        // $tanggal  = date('Y-m-d H:i:s');
        
        // $return_data = array();
        // $this->db->where('id', $id);
        // if($this->db->update('po', array('status'=>1, 'modified'=>$tanggal, 'modified_by'=>$user_id))){
        //     $return_data['message_type']= "sukses";
        // }else{
        //     $return_data['message_type']= "error";
        //     $return_data['message']= "Gagal close PO! Silahkan coba kembali";
        // }           
        // header('Content-Type: application/json');
        // echo json_encode($return_data);
    }

    function delete_voucher(){
        $id = $this->uri->segment(3);
        
        $this->db->trans_start();
        $this->load->model('Model_beli_rongsok');

        if(!empty($id)){

        $get = $this->Model_beli_rongsok->get_po_from_voucher($id)->row_array();

                $po_dtr_list = $this->Model_beli_rongsok->check_po_dtr($get['po_id'])->result();
                foreach ($po_dtr_list as $v) {
                    #penghitungan +- 10 % PO ke DTR
                    // if(((int)$v->tot_netto) >= (0.9*((int)$v->qty))){
                    //     #update po_detail flag_dtr
                    //     $this->Model_beli_rongsok->update_flag_dtr_po_detail($po_id);
                    // }
                    // $total_qty += $v->qty;
                        if(((int)$v->tot_netto) >= (0.9*((int)$v->tot_qty))){
                            $this->db->where('id',$get['po_id']);
                            $this->db->update('po',array(
                                            'status'=>3,
                                            'flag_pelunasan'=>0));
                        }else {
                            $this->db->where('id',$get['po_id']);
                            $this->db->update('po',array(
                                            'flag_pelunasan'=>0,
                                            'status'=>2));
                        }
                }
            $this->db->delete('voucher', ['id' => $id]);
        }

        if ($this->db->trans_complete()) {
            $this->session->set_flashdata('flash_msg', 'Data voucher berhasil dihapus');
            redirect('index.php/BeliRongsok/voucher_list');
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
        if(null!==$this->uri->segment(3) && null!==$this->uri->segment(4)){
            $s = $this->uri->segment(3);
            $e = $this->uri->segment(4);
        }else{
            $e = date('Y-m-d');
            $s = date('Y-m-d', strtotime('-3 months'));
        }

        $this->load->model('Model_beli_rongsok');
        if($user_ppn==1){
            $data['content']= "beli_rongsok/voucher_list_ppn";
            $data['list_data'] = $this->Model_beli_rongsok->voucher_list_ppn($user_ppn,$s,$e)->result();
        }else{
            $data['content']= "beli_rongsok/voucher_list";
            $data['list_data'] = $this->Model_beli_rongsok->voucher_list($user_ppn,$s,$e)->result();
        }

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
                        // $before=$this->Model_beli_rongsok->show_laporan_after($tahun,$bulan);
                        // if($before->num_rows() > 0)
                        // {
                        //     foreach ($before->result() as $row)
                        //     {
                        //         // user details whatever you have in your db.
                        //         $data['reg'][$i]['jumlah_b']=$row->jumlah;
                        //         $data['reg'][$i]['bruto_masuk_b']=$row->bruto_masuk;
                        //         $data['reg'][$i]['netto_masuk_b']=$row->netto_masuk;
                        //         $data['reg'][$i]['bruto_keluar_b']=$row->bruto_keluar;
                        //         $data['reg'][$i]['netto_keluar_b']=$row->netto_keluar;
                        //     }
                        // }
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

    function view_gudang_rongsok(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');

        if($id){
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang Rongsok";
            $data['content']   = "beli_rongsok/view_gudang_rongsok";
            
            $this->load->model('Model_beli_rongsok');
            $data['list_data'] = $this->Model_beli_rongsok->view_gudang_rongsok($id)->result();
            
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/BeliRongsok/gudang_rongsok');
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

                $this->load->view('beli_rongsok/print_voucher_ppn', $data);   
            }else{
                $this->load->model('Model_finance');
                $data['header'] = $this->Model_finance->show_header_voucher($id)->row_array();
                $data['list_data'] = $this->Model_finance->show_detail_voucher($id)->result();

                $total = 0;
                foreach ($data['list_data'] as $row) {
                    $total += $row->amount;
                }

                $data['total'] = $total;

                $this->load->view('beli_rongsok/print_voucher', $data);   
            }
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function print_barcode_rongsok(){
        $rongsok_id = $_GET['r'];
        $bruto = $_GET['b'];
        $berat_palette = $_GET['bp'];
        $netto = $_GET['n'];
        $no_pallete = $_GET['np'];
        if($netto){

        $this->load->model('Model_beli_rongsok');
        $data = $this->Model_beli_rongsok->show_data_rongsok_detail($rongsok_id)->row_array();

        $current = '';
        $data_printer = $this->db->query("select * from m_print_barcode_line where m_print_barcode_id = 6")->result_array();
        $data_printer[17]['string1'] = 'BARCODE 488,335,"39",41,0,180,2,6,"'.$data['kode_rongsok'].'"';
        $data_printer[18]['string1'] = 'TEXT 386,289,"ROMAN.TTF",180,1,8,"'.$data['kode_rongsok'].'"';
        $data_printer[22]['string1'] = 'BARCODE 612,101,"39",41,0,180,2,6,"'.$no_pallete.'"';
        $data_printer[23]['string1'] = 'TEXT 426,55,"ROMAN.TTF",180,1,8,"'.$no_pallete.'"';
        $data_printer[24]['string1'] = 'TEXT 499,260,"4",180,1,1,"'.$no_pallete.'"';
        $data_printer[25]['string1'] = 'TEXT 495,226,"ROMAN.TTF",180,1,14,"'.$bruto.'"';
        $data_printer[26]['string1'] = 'TEXT 495,188,"ROMAN.TTF",180,1,14,"'.$berat_palette.'"';
        $data_printer[27]['string1'] = 'TEXT 495,147,"0",180,14,14,"'.$netto.'"';
        $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['nama_item'].'"';
        $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode_rongsok'].'"';
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
}