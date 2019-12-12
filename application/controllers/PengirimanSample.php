<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PengirimanSample extends CI_Controller{
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

        $data['content']= "pengiriman_sample/index";
        $this->load->model('Model_pengiriman_sample');
        $data['list_data'] = $this->Model_pengiriman_sample->list_data()->result();

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
        $data['content']= "pengiriman_sample/add";
        
        $this->load->model('Model_pengiriman_sample');
        $data['customer_list'] = $this->Model_pengiriman_sample->customer_list()->result();
        $data['marketing_list'] = $this->Model_pengiriman_sample->marketing_list()->result();
        $data['jenis_barang_list'] = $this->Model_pengiriman_sample->jenis_barang_list()->result();
        $this->load->view('layout', $data);
    }
    
    function get_contact_name(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->get_contact_name($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('REQ', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_request'=> $code,
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'module'=>'PengirimanSample',
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('request_sample', $data)){
                redirect('index.php/PengirimanSample/edit/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data request gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/PengirimanSample');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data request gagal disimpan, penomoran belum disetup!');
            redirect('index.php/PengirimanSample');
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

            $data['content']= "pengiriman_sample/edit";
            $this->load->model('Model_pengiriman_sample');
            $data['header'] = $this->Model_pengiriman_sample->show_header_rs($id)->row_array();  
            
            $data['customer_list'] = $this->Model_pengiriman_sample->customer_list()->result();
            $data['marketing_list'] = $this->Model_pengiriman_sample->marketing_list()->result();
            $data['jenis_barang_list'] = $this->Model_pengiriman_sample->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/PengirimanSample');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'status'=>0,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('request_sample', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data request sample berhasil disimpan');
        redirect('index.php/PengirimanSample');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_rongsok');
        $list_rongsok = $this->Model_rongsok->list_data()->result();
        
        $this->load->model('Model_pengiriman_sample'); 
        $myDetail = $this->Model_pengiriman_sample->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';           
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td>';
        $tabel .= '<select id="rongsok_id" name="rongsok_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($list_rongsok as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>';        
        $tabel .= '<td><input type="text" id="qty" name="qty" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="5" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';  
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
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
    
    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('request_sample_detail', array(
            'request_sample_id'=>$this->input->post('id'),
            'rongsok_id'=>$this->input->post('rongsok_id'),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
            'line_remarks'=>$this->input->post('line_remarks')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan detail request! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('request_sample_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus detail request! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function print_rs(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_pengiriman_sample');
            $data['header']  = $this->Model_pengiriman_sample->show_header_rs($id)->row_array();
            $data['details'] = $this->Model_pengiriman_sample->load_detail($id)->result();

            $this->load->view('print_rs', $data);
        }else{
            redirect('index.php'); 
        }
    }  
    
    function create_skb(){
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

            $data['content']= "pengiriman_sample/create_skb";
            $this->load->model('Model_pengiriman_sample');
            $data['header'] = $this->Model_pengiriman_sample->show_header_rs($id)->row_array();           
            $data['details'] = $this->Model_pengiriman_sample->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/PengirimanSample');
        }
    }
    
    function save_skb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SKB', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_skb'=> $code,
                        'tanggal'=> $tgl_input,
                        'request_sample_id'=> $this->input->post('request_sample_id'),
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('skb', $data);
            $dtr_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('skb_detail', array(
                        'skb_id'=>$dtr_id,
                        'request_sample_detail_id'=>$row['request_sample_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['request_sample_detail_id']);
                    $this->db->update('request_sample_detail', array('flag_skb'=>1));
                }
            }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SKB berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create SKB, silahkan coba kembali!');
            }                   
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan SKB gagal, penomoran belum disetup!');
        }
        redirect('index.php/PengirimanSample');    
    }
    
    function skb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "pengiriman_sample/skb_list";
        $this->load->model('Model_pengiriman_sample');
        $data['list_data'] = $this->Model_pengiriman_sample->skb_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_skb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_pengiriman_sample');
            $data['header']  = $this->Model_pengiriman_sample->show_header_skb($id)->row_array();
            $data['details'] = $this->Model_pengiriman_sample->show_detail_skb($id)->result();

            $this->load->view('print_skb_request_sample', $data);
        }else{
            redirect('index.php'); 
        }
    }  

    function surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "pengiriman_sample/surat_jalan";
        $this->load->model('Model_pengiriman_sample');
        $data['list_data'] = $this->Model_pengiriman_sample->surat_jalan()->result();

        $this->load->view('layout', $data);
    }
    
    function add_surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "pengiriman_sample/add_surat_jalan";
        
        $this->load->model('Model_pengiriman_sample');
        $data['customer_list'] = $this->Model_pengiriman_sample->customer_list()->result();

        $data['jenis_barang_list'] = $this->Model_pengiriman_sample->jenis_barang_list()->result();
        $data['kendaraan_list'] = $this->Model_pengiriman_sample->kendaraan_list()->result();
        $this->load->view('layout', $data);
    }
    
    function get_type_kendaraan(){
        $id = $this->input->post('id');
        $this->load->model('Model_pengiriman_sample');
        $type_kendaraan = $this->Model_pengiriman_sample->get_type_kendaraan($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($type_kendaraan); 
    }
    
    function get_alamat(){
        $id = $this->input->post('id');
        $this->load->model('Model_pengiriman_sample');
        $customer = $this->Model_pengiriman_sample->get_alamat($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }
    
    function get_rs_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_pengiriman_sample');
        $data = $this->Model_pengiriman_sample->get_rs_list($id)->result();
        $arr_rs[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_rs[$row->id] = $row->no_request;
        } 
        print form_dropdown('request_sample_id', $arr_rs);
    }
    
    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SJ', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_surat_jalan'=> $code,
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'request_sample_id'=>$this->input->post('request_sample_id'),
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('surat_jalan', $data)){
                redirect('index.php/PengirimanSample/edit_surat_jalan/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/PengirimanSample/surat_jalan');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, penomoran belum disetup!');
            redirect('index.php/PengirimanSample/surat_jalan');
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

            $data['content']= "pengiriman_sample/edit_surat_jalan";
            $this->load->model('Model_pengiriman_sample');
            $data['header'] = $this->Model_pengiriman_sample->show_header_sj($id)->row_array();  
            
            $data['customer_list'] = $this->Model_pengiriman_sample->customer_list()->result();
            $data['jenis_barang_list'] = $this->Model_pengiriman_sample->jenis_barang_list()->result();
            $data['kendaraan_list'] = $this->Model_pengiriman_sample->kendaraan_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/PengirimanSample/surat_jalan');
        }
    }
    
    function load_detail_surat_jalan(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $bruto = 0;
        $bobin = 0;
        $netto = 0;

        $this->load->model('Model_ampas');
        $list_ampas = $this->Model_ampas->list_data()->result();
        $this->load->model('Model_pengiriman_sample');               
        $myDetail = $this->Model_pengiriman_sample->load_detail_surat_jalan($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->no_packing.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->bobin,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';            
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $bruto += $row->bruto;
            $bobin += $row->bobin;
            $netto += $row->netto;
            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td>';
        $tabel .= '<select id="ampas_id" name="ampas_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($list_ampas as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>';
        
        $tabel .= '<td><input type="text" id="no_packing" name="no_packing" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';
        $tabel .= '<td><input type="text" id="bruto" name="bruto" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="bobin" name="bobin" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';
        
        $tabel .= '<tr>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($bruto,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($bobin,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,0,',','.').'</strong></td>';
        $tabel .= '<td></td>';
        $tabel .= '<td></td>';
        $tabel .= '</tr>';
       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function delete_detail_surat_jalan(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('surat_jalan_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus detail item surat jalan! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save_detail_surat_jalan(){
        $return_data = array();
        
        if($this->db->insert('surat_jalan_detail', array(
            'surat_jalan_id'=>$this->input->post('id'),
            'ampas_id'=>$this->input->post('ampas_id'),
            'no_packing'=>$this->input->post('no_packing'),
            'bruto'=>str_replace('.', '', $this->input->post('bruto')),
            'bobin'=>str_replace('.', '', $this->input->post('bobin')),
            'netto'=>str_replace('.', '', $this->input->post('netto')),
            'line_remarks'=>str_replace('.', '', $this->input->post('line_remarks'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan detail item surat jalan! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function update_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'request_sample_id'=>$this->input->post('request_sample_id'),
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_jalan', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data surat jalan berhasil disimpan');
        redirect('index.php/PengirimanSample/surat_jalan');
    }
    
    function print_surat_jalan(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_pengiriman_sample');
            $data['header']  = $this->Model_pengiriman_sample->show_header_sj($id)->row_array();
            $data['details'] = $this->Model_pengiriman_sample->load_detail_surat_jalan($id)->result();

            $this->load->view('print_sj_request_sample', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function get_uom_ampas(){
        $id = $this->input->post('id');
        $this->load->model('Model_ampas');
        $ampas= $this->Model_ampas->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($ampas); 
    }
    
    function view_rs(){
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

            $data['content']= "pengiriman_sample/view_rs";
            $this->load->model('Model_pengiriman_sample');
            $data['myData'] = $this->Model_pengiriman_sample->show_header_rs($id)->row_array();           
            $data['myDetail'] = $this->Model_pengiriman_sample->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/PengirimanSample');
        }
    }
    
    function approve_rs(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                'status'=> 1,
                'approved'=> $tanggal,
                'approved_by'=>$user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('request_sample', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan sample berhasil diapprove');
        redirect('index.php/PengirimanSample');
    }
    
    function reject_rs(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('request_sample', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan sample berhasil direject');
        redirect('index.php/PengirimanSample');
    }

}