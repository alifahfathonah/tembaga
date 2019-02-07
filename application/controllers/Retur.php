<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur extends CI_Controller{
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

        $data['content']= "retur/index";
        $this->load->model('Model_retur');
        $data['list_data'] = $this->Model_retur->retur_list()->result();

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
        $data['content']= "retur/add";
        
        $this->load->model('Model_retur');
        $data['customer_list'] = $this->Model_retur->customer_list()->result();
        $data['jenis_barang_list'] = $this->Model_retur->jenis_barang_list()->result();
        $data['jenis_packing_list'] = $this->Model_retur->jenis_packing_list()->result();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('RTR', $tgl_input); 
        // $code_bpb = $this->Model_m_numberings->getNumbering('BPB-RTR', $tgl_input);
        
        if($code){        
            // #insert bpb fg
            // $data_bpb = array(
            //     'no_bpb_fg' => $code_bpb,
            //     'tanggal' => $tgl_input,
            //     'produksi_fg_id' => 0,
            //     'jenis_barang_id' => $this->input->post('jenis_barang'),
            //     'created_by' => $user_id,
            //     'created_at' => $tanggal,
            //     'status' => 0,
            //     'keterangan' => $this->input->post('remarks')
            // );
            // $this->db->insert('t_bpb_fg', $data_bpb);
            // $bpb_id = $this->db->insert_id();


            #insert retur
            $data = array(
                'no_retur'=> $code,
                'customer_id'=>$this->input->post('m_customer_id'),
                'jenis_retur'=>$this->input->post('type_retur'),
                'jenis_packing_id' => $this->input->post('jenis_packing_id'),
                'remarks'=>$this->input->post('remarks'),
                'jenis_retur'=>$this->input->post('type_retur'),
                'status' => 0,
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );

            if($this->db->insert('retur', $data)){
                redirect('index.php/Retur/edit/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data retur gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Retur');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data retur gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Retur');
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

            $data['content']= "retur/edit";
            $this->load->model('Model_retur');
            $data['header'] = $this->Model_retur->show_header_retur($id)->row_array();  
            
            $data['customer_list'] = $this->Model_retur->customer_list()->result();
            $data['jenis_barang_list'] = $this->Model_retur->jenis_barang_list()->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Retur');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        #update retur
        $data = array(
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('retur', $data);

        
        $this->session->set_flashdata('flash_msg', 'Data Retur berhasil disimpan');
        redirect('index.php/Retur');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $bruto = 0;
        $netto = 0;
        $this->load->model('Model_retur');
        $jenis_barang_list = $this->Model_retur->jenis_barang_list()->result();
         
        $myDetail = $this->Model_retur->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->no_packing.'</td>';
            $tabel .= '<td style="text-align:right">'.$row->bruto.'</td>';
            $tabel .= '<td style="text-align:right">'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->nomor_bobbin.'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $bruto += $row->bruto;
            $netto += $row->netto;
            $no++;
        }
                    
        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($bruto,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,0,',','.').'</strong></td>';
        $tabel .= '<td colspan="3"></td>';
        $tabel .= '</tr>';
       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_ampas');
        $ampas = $this->Model_ampas->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($ampas); 
    }
    
    function save_detail(){
        $return_data = array();
        $no_bobbin = $this->input->post('no_bobbin');
        $kode_bobbin = substr($no_bobbin, 0,1);
        $urut_bobbin = substr($no_bobbin, 1,4);
        $ukuran = $this->input->post('ukuran');
        $no_packing = date("ymd").$kode_bobbin.$ukuran.$urut_bobbin."RTR";
        
        if($this->db->insert('retur_detail', array(
            'retur_id'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('jenis_barang_id'), 
            'bruto'=>$this->input->post('bruto'),
            'netto'=>$this->input->post('netto'),
            'bobbin_id'=>$this->input->post('id_bobbin'),
            'no_packing'=>$no_packing,
            'line_remarks'=>$this->input->post('line_remarks')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan detail item retur! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('retur_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus detail item retur! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function print_dtr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_retur');
            $data['header']  = $this->Model_retur->show_header_dtr($id)->row_array();
            $data['details'] = $this->Model_retur->load_detail($id)->result();

            $this->load->view('print_dtr_retur', $data);
        }else{
            redirect('index.php'); 
        }
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

            $data['content']= "retur/create_ttr";
            $this->load->model('Model_retur');
            $data['header'] = $this->Model_retur->show_header_dtr($id)->row_array();           
            $data['details'] = $this->Model_retur->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Retur');
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
                        'ampas_id'=>$row['ampas_id'],
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
        redirect('index.php/Retur'); 
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

        $data['content']= "retur/ttr_list";
        $this->load->model('Model_retur');
        $data['list_data'] = $this->Model_retur->ttr_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_ttr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_retur');
            $data['header']  = $this->Model_retur->show_header_ttr($id)->row_array();
            $data['details'] = $this->Model_retur->show_detail_ttr($id)->result();

            $this->load->view('print_ttr_retur', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function create_request_barang(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "retur/create_request_barang";
        
        $this->load->model('Model_retur');
        $data['header'] = $this->Model_retur->show_header_ttr($id)->row_array();
        $data['jenis_barang_list'] = $this->Model_retur->jenis_barang_list()->result();

        $this->load->view('layout', $data);
    }
    
    function save_request_barang(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('REQ', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_request'=> $code,
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'ttr_id'=>$this->input->post('ttr_id'),
                'module'=>'Retur',
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('request_sample', $data)){
                redirect('index.php/Retur/edit_request_barang/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data request gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Retur');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data request gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Retur');
        }
    }  
    
    function edit_request_barang(){
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

            $data['content']= "retur/edit_request_barang";
            $this->load->model('Model_retur');
            $data['header'] = $this->Model_retur->show_header_rs($id)->row_array();  
            $data['jenis_barang_list'] = $this->Model_retur->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Retur');
        }
    }
    
    function update_request_barang(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('request_sample', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data request barang berhasil disimpan');
        redirect('index.php/Retur/ttr_list');
    }
    
    function load_detail_request_barang(){
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
    
    function save_detail_request_barang(){
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
    
    function delete_detail_request_barang(){
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
    
    function request_barang_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "retur/request_barang_list";
        $this->load->model('Model_retur');
        $data['list_data'] = $this->Model_retur->list_request_barang()->result();

        $this->load->view('layout', $data);
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

            $data['content']= "retur/view";
            $this->load->model('Model_retur');
            $this->load->model('Model_pengiriman_sample'); 

            $data['header'] = $this->Model_retur->show_header_retur($id)->row_array();           
            $data['myDetail'] = $this->Model_retur->load_detail($id)->result();  
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Retur/');
        }
    }


    function print(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_retur');
            $data['header']  = $this->Model_retur->show_header_retur($id)->row_array();
            $data['details'] = $this->Model_retur->load_detail($id)->result();

            $this->load->view('retur/print', $data);
        }else{
            redirect('index.php'); 
        }
    }
    
    function approve(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        
        $loop1 = $this->db->query("select rd.retur_id, rd.jenis_barang_id, jb.jenis_barang
            from retur_detail rd
            left join jenis_barang jb on (rd.jenis_barang_id = jb.id)
            where rd.retur_id = ".$this->input->post('id')."
            group by jb.jenis_barang
            ")->result();
        
        foreach($loop1 as $row1){
            $code_bpb = $this->Model_m_numberings->getNumbering('BPB-RTR', $tgl_input);
            #insert bpb
            $this->db->insert('t_bpb_fg', array(
                'no_bpb_fg' => $code_bpb,
                'tanggal' => $tgl_input,
                'produksi_fg_id' => $this->input->post('id'),
                'jenis_barang_id' => $row1->jenis_barang_id,
                'created_at' => $tanggal,
                'created_by' => $user_id,
                'status' => 0,
                'keterangan' => $this->input->post('remarks')
            ));

            $bpb_id = $this->db->insert_id();
            #insert bpb detail
            $loop2 = $this->db->query("select *from retur_detail where jenis_barang_id = ".$row1->jenis_barang_id." and retur_id = ".$this->input->post('id'))->result();
            foreach ($loop2 as $row2) {
                $this->db->insert('t_bpb_fg_detail', array(
                    't_bpb_fg_id' => $bpb_id,
                    'jenis_barang_id' => $row2->jenis_barang_id,
                    'no_produksi' => 0,
                    'bruto' => $row2->bruto,
                    'netto' => $row2->netto,
                    'no_packing_barcode' => $row2->no_packing,
                    'bobbin_id' => $row2->bobbin_id
                ));

                #update status bobbin
                $this->db->where('id' ,$row2->bobbin_id);
                $this->db->update('m_bobbin', array(
                     'status' => 1
                ));
            }
        }

        $data = array(
                'status'=> 1,
                'approved_at'=> $tanggal,
                'approved_by'=>$user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('retur', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan retur berhasil diapprove');
        redirect('index.php/Retur/');
    }
    
    function reject(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('retur', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan retur barang berhasil direject');
        redirect('index.php/Retur');
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

        $data['content']= "retur/surat_jalan";
        $this->load->model('Model_retur');
        $data['list_data'] = $this->Model_retur->surat_jalan()->result();

        $this->load->view('layout', $data);
    }

    function print_surat_jalan(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_retur');
            $data['header']  = $this->Model_retur->show_header_sj($id)->row_array();
            $data['details'] = $this->Model_retur->load_detail_sj($id)->result();
            $this->load->view('retur/print_surat_jalan', $data);
        }else{
            redirect('index.php'); 
        }
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
        $data['content']= "retur/add_surat_jalan";
        
        $this->load->model('Model_sales_order');
        $this->load->model('Model_retur');
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();
        // $data['retur_list'] = $this->Model_retur->retur_list_2()->result();
        $this->load->view('layout', $data);
    }

    function get_retur_list(){
        $id = $this->input->post('id');
        $this->load->model('Model_retur');
        $data = $this->Model_retur->get_retur_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_retur;
        } 
        print form_dropdown('retur_id', $arr_so);
    }

    function fulfilment(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "retur/fulfilment";
        
        $this->load->model('Model_retur');
        $data['customer_list'] = $this->Model_retur->customer_list()->result();
        $data['jenis_barang_list'] = $this->Model_retur->jenis_barang_list()->result();
        $data['jenis_packing_list'] = $this->Model_retur->jenis_packing_list()->result();
        $this->load->view('layout', $data);
    }
    
    function get_retur(){
        $id = $this->input->post('id');
        $this->load->model('Model_retur');
        $data = $this->Model_retur->get_retur($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_retur;
        } 
        print form_dropdown('retur_id', $arr_so);
    }

    function fulfilment_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "retur/fulfilment_list";
        $this->load->model('Model_retur');
        $data['list_data'] = $this->Model_retur->fulfilment_list()->result();

        $this->load->view('layout', $data);
    }

    function save_fulfilment(){
        $module_name = $this->uri->segment(1);
        // $id = $this->uri->segment(3);
        // if($id){
        //     $group_id    = $this->session->userdata('group_id');        
        //     if($group_id != 1){
        //         $this->load->model('Model_modules');
        //         $roles = $this->Model_modules->get_akses($module_name, $group_id);
        //         $data['hak_akses'] = $roles;
        //     }
               
        // }else{
        //     redirect('index.php/Retur');
        // }
            $retur_id = $this->input->post('retur_id');
            redirect('index.php/Retur/edit_fulfilment/'.$retur_id);
    }

    function edit_fulfilment(){
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

            $data['content']= "retur/edit_fulfilment";
            $this->load->model('Model_retur');
            $data['header'] = $this->Model_retur->show_header_retur($id)->row_array();  
            
            $data['myDetail'] = $this->Model_retur->load_detail($id)->result();
            $data['jenis_barang_list'] = $this->Model_retur->jenis_barang_list()->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Retur');
        }
    }

    function load_detail_fulfilment(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $netto = 0;
        $this->load->model('Model_retur');
        $jenis_barang_list = $this->Model_retur->jenis_barang_list()->result();
         
        $myDetail = $this->Model_retur->load_detail_fulfilment($id)->result(); 
        foreach ($myDetail as $row){
            $netto += $row->netto;
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<input type="hidden" id="id_jenis_barang" value="'.$row->jenis_barang_id.'" />';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td></td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $no++;
        }
        
        // $tabel .= '<tr>';
        // $tabel .= '<td style="text-align: right;" colspan="2">Total</td>';
        // $tabel .= '<td name="sum_netto" id="sum_netto">'.$netto.'</td>';
        // $tabel .= '<td></td>';
        // $tabel .= '</tr>';       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function save_detail_fulfilment(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        if($this->db->insert('retur_fulfilment', array(
            'retur_id'=>$this->input->post('id'),
            'tanggal'=>$tgl_input,
            'uom'=>'KG',
            'jenis_barang_id'=>$this->input->post('jenis_barang_id'),
            'netto'=>$this->input->post('netto'),
            'keterangan'=>$this->input->post('line_remarks')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan detail item retur! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail_fulfilment(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('retur_fulfilment')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus detail item retur! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-FG', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_spb'=> $code,
                'tanggal'=> $tgl_input,
                'keterangan'=>'RETUR FINISHGOOD',
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );

            if($this->db->insert('t_spb_fg', $data)){
                $spb_id = $this->db->insert_id();

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('retur', array(
                    'spb_id' => $spb_id
                ));

                $key = $this->db->query("select *from retur_fulfilment where retur_id = ".$this->input->post('id'))->result();

                foreach ($key as $row) {
                    $data_spb_detail = array(
                        'tanggal' => date('Y-m-d'),
                        't_spb_fg_id' => $spb_id,
                        'jenis_barang_id' => $row->jenis_barang_id,
                        'uom' => 'KG',
                        'netto' => $row->netto,
                        'keterangan' => $row->keterangan
                    );
                    $this->db->insert('t_spb_fg_detail', $data_spb_detail);
                }

                redirect('index.php/GudangFG/spb_list');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Retur/edit_fulfilment/'.$this->input->post('id'));  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, penomoran belum disetup!');
            redirect('index.phpRetur/edit_fulfilment/'.$this->input->post('id'));
        }
    }
    /*function print_po(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_pengiriman_ampas');
            $data['header']  = $this->Model_pengiriman_ampas->show_header_po($id)->row_array();
            $data['details'] = $this->Model_pengiriman_ampas->show_detail_po($id)->result();

            $this->load->view('print_po_ampas', $data);
        }else{
            redirect('index.php'); 
        }
    }    
        
    function create_dtr(){
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

            $data['content']= "pengiriman_ampas/create_dtr";
            $this->load->model('Model_pengiriman_ampas');
            $data['header'] = $this->Model_pengiriman_ampas->show_header_po($id)->row_array();           
            $data['details'] = $this->Model_pengiriman_ampas->show_detail_po($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/PengirimanAmpas');
        }
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
                        'po_id'=> $this->input->post('po_id'),
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
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'po_detail_id'=>$row['po_detail_id'],
                        'ampas_id'=>$row['ampas_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'bruto'=>str_replace('.', '', $row['bruto']),
                        'netto'=>str_replace('.', '', $row['netto']),
                        'line_remarks'=>$row['line_remarks'],
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id
                    ));
                    
                    $this->db->where('id', $row['po_detail_id']);
                    $this->db->update('po_detail', array('flag_dtr'=>1));
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
        redirect('index.php/PengirimanAmpas'); 
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

        $data['content']= "pengiriman_ampas/dtr_list";
        $this->load->model('Model_pengiriman_ampas');
        $data['list_data'] = $this->Model_pengiriman_ampas->dtr_list()->result();

        $this->load->view('layout', $data);
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

        $data['content']= "pengiriman_ampas/surat_jalan";
        $this->load->model('Model_pengiriman_ampas');
        $data['list_data'] = $this->Model_pengiriman_ampas->surat_jalan()->result();

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
        $data['content']= "pengiriman_ampas/add_surat_jalan";
        
        $this->load->model('Model_pengiriman_ampas');
        $data['po_list'] = $this->Model_pengiriman_ampas->get_po_list()->result();
        
        $this->load->model('Model_tolling_titipan');
        $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();

        $data['jenis_barang_list'] = $this->Model_tolling_titipan->jenis_barang_list()->result();
        $data['kendaraan_list'] = $this->Model_tolling_titipan->kendaraan_list()->result();
        $this->load->view('layout', $data);
    }*/
    
    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SJ', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_surat_jalan'=> $code,
                'tanggal'=> $tgl_input,
                'retur_id' => $this->input->post('retur_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'status'=>0,
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
            );

            if($this->db->insert('t_surat_jalan', $data)){
                redirect('index.php/Retur/edit_surat_jalan/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Retur/add_surat_jalan');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Retur/add_surat_jalan');
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

            $data['content']= "retur/edit_surat_jalan";
            $this->load->model('Model_retur');
            $data['header'] = $this->Model_retur->show_header_sj($id)->row_array();
            $spid = $data['header']['spb_id'];              
            $data['retur_list'] = $this->Model_retur->get_retur_fulfilment($spid)->result();
        
            $this->load->model('Model_tolling_titipan');            
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
            $this->load->model('Model_sales_order');
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/PengirimanAmpas/surat_jalan');
        }
    }

    function get_data_sj(){
        $id = $this->input->post('id');
        $jb = $this->input->post('jenis_barang');
        $this->load->model('Model_retur');
        $sj_detail= $this->Model_retur->list_item_sj_retur_detail($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($sj_detail); 
    }

    /*
    function load_detail_surat_jalan(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $bruto = 0;
        $bobin = 0;
        $netto = 0;

        $this->load->model('Model_ampas');
        $list_ampas = $this->Model_ampas->list_data()->result();
        $this->load->model('Model_tolling_titipan'); 
        $list_produksi = $this->Model_tolling_titipan->list_no_produksi()->result();
        
        $this->load->model('Model_pengiriman_ampas'); 
        $myDetail = $this->Model_pengiriman_ampas->load_detail_surat_jalan($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->no_produksi.'</td>';
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
        
        $tabel .= '<td>';
        $tabel .= '<select id="produksi_ampas_id" name="produksi_ampas_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px">';
            $tabel .= '<option value=""></option>';
            foreach ($list_produksi as $value){
                $tabel .= "<option value='".$value->id."'>".$value->no_produksi."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        
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
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total </strong></td>';
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
            $return_data['message']= "Gagal menghapus item ampas! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save_detail_surat_jalan(){
        $return_data = array();
        
        if($this->db->insert('surat_jalan_detail', array(
            'surat_jalan_id'=>$this->input->post('id'),
            'ampas_id'=>$this->input->post('ampas_id'),
            'produksi_ampas_id'=>$this->input->post('produksi_ampas_id'),
            'no_packing'=>$this->input->post('no_packing'),
            'bruto'=>str_replace('.', '', $this->input->post('bruto')),
            'bobin'=>str_replace('.', '', $this->input->post('bobin')),
            'netto'=>str_replace('.', '', $this->input->post('netto')),
            'line_remarks'=>str_replace('.', '', $this->input->post('line_remarks'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item ampas! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }*/
    
    function update_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');
        $retur_id = $this->input->post('retur_id');
        $spbid = $this->input->post('spb_id');

        #Insert Surat Jalan
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id_barang']!=''){
                $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'no_packing'=>$v['no_packing'],
                        'qty'=>'1',
                        'bruto'=>$v['bruto'],
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>$v['bobbin'],
                        'line_remarks'=>$v['line_remarks'],
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                    $this->db->where('id',$v['id_barang']);
                    $this->db->update('t_gudang_fg',array(
                        'flag_taken'=>1,
                    )); 
            }
        }

        $this->load->model('Model_retur');
        #cek jika surat jalan sudah di kirim semua atau belum
            $list_produksi = $this->Model_retur->get_retur_fulfilment($spbid)->result();

        if(empty($list_produksi)){
            $this->db->where('id',$retur_id);
            $this->db->update('retur', array(
                'flag_taken'=>1
            ));
        }

            #insert bobbin_peminjaman
            $this->load->model('Model_m_numberings');
            $code = $this->Model_m_numberings->getNumbering('BB-BR', $tgl_input);

            $this->db->insert('m_bobbin_peminjaman', array(
                'no_surat_peminjaman' => $code,
                'id_surat_jalan' => $this->input->post('id'),
                'id_customer' => $this->input->post('id_customer'),
                'status' => 0,
                'created_by' => $user_id,
                'created_at' => $tanggal
            ));
            $insert_id = $this->db->insert_id();

            $query = $this->db->query('select *from t_surat_jalan_detail where t_sj_id = '.$this->input->post('id'))->result();
            foreach ($query as $row) {
                $this->db->where('nomor_bobbin', $row->nomor_bobbin);
                $this->db->update('m_bobbin', array(
                    'borrowed_by' => $this->input->post('id_customer'),
                    'status' => 2
                ));

                $this->db->insert('m_bobbin_peminjaman_detail', array(
                    'id_peminjaman' => $insert_id,
                    'nomor_bobbin' => $row->nomor_bobbin
                ));
            }

        $data = array(
                'tanggal'=> $tgl_input,
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
        redirect('index.php/Retur/surat_jalan');
    }
    
    // function print_surat_jalan(){
    //     $id = $this->uri->segment(3);
    //     if($id){        
    //         $this->load->model('Model_pengiriman_ampas');
    //         $data['header']  = $this->Model_pengiriman_ampas->show_header_sj($id)->row_array();
    //         $data['details'] = $this->Model_pengiriman_ampas->load_detail_surat_jalan($id)->result();

    //         $this->load->view('print_sj_ampas', $data);
    //     }else{
    //         redirect('index.php'); 
    //     }
    // } 
    
    function add_invoice(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Retur";
        $data['content']   = "retur/add_invoice";
        
        $this->load->model('Model_retur');
        $data['header'] = $this->Model_retur->show_header_retur($id)->row_array();
        $data['list_retur'] = $this->Model_retur->load_detail($id)->result();
        $this->load->view('layout', $data); 
    }

    function save_invoice(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        // $details = $this->input->post('details');
        // foreach ($details as $v) {
        //     echo $v['nama_barang'], '<br>';
        //     echo $v['jenis_barang_id'], '<br>';
        //     echo $v['bruto'], '<br>';
        //     echo $v['netto'], '<br>';
        //     echo str_replace('.', '', $v['amount']), '<br>';
        //     echo str_replace('.', '', $v['total']), '<br>';
        //     echo $v['line_remarks'];
        // }
        // die();

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('INV-RTR', $tgl_input);

        $data = array(
            'jenis_trx'=>1,
            'no_invoice'=> $code,
            'tanggal'=> $tgl_input,
            'tgl_jatuh_tempo'=> $this->input->post('tanggal_jatuh'),
            'id_customer'=> $this->input->post('customer_id'),
            'id_retur'=> $this->input->post('id_retur'),
            'keterangan'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('f_invoice', $data);
        $id_new=$this->db->insert_id();

        $details = $this->input->post('details');
        foreach ($details as $v) {
            $this->db->insert('f_invoice_detail', array(
                'id_invoice'=>$id_new,
                'jenis_barang_id'=>$v['jenis_barang_id'],
                'qty'=>1,
                'netto'=>$v['netto'],
                'harga'=>str_replace('.', '', $v['amount']),
                'total_harga'=>str_replace('.', '', $v['total']),
                'keterangan'=>$v['line_remarks']
            ));
        }

        $this->db->where('id',$this->input->post('id_retur'));
        $this->db->update('retur', array(
            'flag_taken'=>1
        ));

        if($this->db->trans_complete()){
            redirect(base_url('index.php/Finance/view_invoice/'.$id_new));
        }else{
            $this->session->set_flashdata('flash_msg', 'Uang Masuk gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/Finance');  
        }            
    }
}