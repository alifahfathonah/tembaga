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
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/index";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->so_list()->result();

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
        $data['content']= "tolling_titipan/add";
        
        $this->load->model('Model_tolling_titipan');
        $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
        $data['marketing_list'] = $this->Model_tolling_titipan->marketing_list()->result();
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
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SO', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_sales_order'=> $code,
                'tanggal'=> $tgl_input,
                'flag_ppn'=>$user_ppn,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('sales_order', $data)){
                redirect('index.php/Tolling/edit/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Tolling');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, penomoran belum disetup!');
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
            
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();
            $data['marketing_list'] = $this->Model_tolling_titipan->marketing_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sales_order', $data);
        
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
        $this->load->model('Model_rongsok');
        $list_rongsok = $this->Model_rongsok->list_data()->result();
        
        $this->load->model('Model_tolling_titipan'); 
        $myDetail = $this->Model_tolling_titipan->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->total_amount;
            $bruto += $row->bruto;
            $netto += $row->netto;
            
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
        $tabel .= '<td><input type="text" id="harga" name="qty" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="qty" name="qty" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="5" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="total_harga" name="total_harga" class="form-control myline" '
                . 'readonly="readonly" value="0"></td>';
        $tabel .= '<td><input type="text" id="bruto" name="bruto" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';
        
        $tabel .= '<tr>';
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($bruto,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,0,',','.').'</strong></td>';
        $tabel .= '<td></td>';
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
        
        if($this->db->insert('sales_order_detail', array(
            'sales_order_id'=>$this->input->post('id'),
            'rongsok_id'=>$this->input->post('rongsok_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
            'total_amount'=>str_replace('.', '', $this->input->post('total_harga')),
            'bruto'=>str_replace('.', '', $this->input->post('bruto')),
            'netto'=>str_replace('.', '', $this->input->post('netto'))
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
        if($this->db->delete('sales_order_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function print_so(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_so($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_so($id)->result();

            $this->load->view('print_so', $data);
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

            $data['content']= "tolling_titipan/create_dtr";
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_so($id)->row_array();           
            $data['details'] = $this->Model_tolling_titipan->show_detail_so($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
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
                        'so_id'=> $this->input->post('sales_order_id'),
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
                        'so_detail_id'=>$row['so_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'bruto'=>str_replace('.', '', $row['bruto']),
                        'netto'=>str_replace('.', '', $row['netto']),
                        'no_pallete'=>$row['no_pallete'],
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['so_detail_id']);
                    $this->db->update('sales_order_detail', array('flag_dtr'=>1));
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
        redirect('index.php/Tolling');    
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

        $data['content']= "tolling_titipan/dtr_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->dtr_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_dtr(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_dtr($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtr($id)->result();

            $this->load->view('print_dtr_from_so', $data);
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
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();
        
        $this->db->where('id', $dtr_id);
        if($this->db->update('dtr', array(
                    'status'=>1,
                    'approved'=>$tanggal,
                    'approved_by'=>$user_id
        ))){
            $return_data['type_message']= "sukses";
        }else{
            $return_data['type_message']= "error";
            $return_data['message']= "Terjadi kesalahan saat meng-update data DTR, silahkan coba kembali...";
        }
        
        header('Content-Type: application/json');
        echo json_encode($return_data);
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
            $data['header']  = $this->Model_tolling_titipan->show_header_dtr($id)->row_array(); 
            $data['details'] = $this->Model_tolling_titipan->show_detail_dtr($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
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
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan TTR gagal, penomoran belum disetup!');
        }
        redirect('index.php/Tolling/dtr_list');  
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

        $data['content']= "tolling_titipan/ttr_list";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->ttr_list()->result();

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
    
    function produksi_ampas(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/produksi_ampas";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->produksi_ampas()->result();

        $this->load->view('layout', $data);
    }
    
    function add_produksi_ampas(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add_produksi_ampas";
        
        $this->load->model('Model_tolling_titipan');
        $data['ttr_list'] = $this->Model_tolling_titipan->get_ttr_to_pa()->result();
        $data['jenis_barang_list'] = $this->Model_tolling_titipan->jenis_barang_list()->result();
        $this->load->view('layout', $data);
    }
    
    function save_produksi_ampas(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PRD', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_produksi'=> $code,
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'ttr_id'=>$this->input->post('ttr_id'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('produksi_ampas', $data)){
                redirect('index.php/Tolling/edit_produksi_ampas/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Tolling/produksi_ampas');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Tolling/produksi_ampas');
        }
    }
    
    function edit_produksi_ampas(){
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

            $data['content']= "tolling_titipan/edit_produksi_ampas";
            $this->load->model('Model_tolling_titipan');
            $data['header'] = $this->Model_tolling_titipan->show_header_pa($id)->row_array();  
            
            $data['ttr_list'] = $this->Model_tolling_titipan->get_ttr_to_pa()->result();
            $data['jenis_barang_list'] = $this->Model_tolling_titipan->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }
    
    function load_detail_produksi_ampas(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $produksi = 0;
        $sisa = 0;

        $this->load->model('Model_ampas');
        $list_ampas = $this->Model_ampas->list_data()->result();
        
        $this->load->model('Model_tolling_titipan'); 
        $myDetail = $this->Model_tolling_titipan->load_detail_produksi_ampas($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->hasil_produksi,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->sisa,0,',','.').'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';            
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $produksi += $row->hasil_produksi;
            $sisa += $row->sisa;
            
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
        
        $tabel .= '<td><input type="text" id="hasil_produksi" name="hasil_produksi" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="sisa" name="sisa" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';
        
        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($produksi,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($sisa,0,',','.').'</strong></td>';
        $tabel .= '<td></td>';
        $tabel .= '<td></td>';
        $tabel .= '</tr>';
       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function get_uom_ampas(){
        $id = $this->input->post('id');
        $this->load->model('Model_ampas');
        $ampas= $this->Model_ampas->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($ampas); 
    }
    
    function delete_detail_produksi_ampas(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('produksi_ampas_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item ampas! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save_detail_produksi_ampas(){
        $return_data = array();
        
        if($this->db->insert('produksi_ampas_detail', array(
            'produksi_ampas_id'=>$this->input->post('id'),
            'ampas_id'=>$this->input->post('ampas_id'),
            'hasil_produksi'=>str_replace('.', '', $this->input->post('hasil_produksi')),
            'sisa'=>str_replace('.', '', $this->input->post('sisa')),
            'line_remarks'=>str_replace('.', '', $this->input->post('line_remarks'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item ampas! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function update_produksi_ampas(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'ttr_id'=>$this->input->post('ttr_id'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('produksi_ampas', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data produksi ampas berhasil disimpan');
        redirect('index.php/Tolling/produksi_ampas');
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

        $data['content']= "tolling_titipan/surat_jalan";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->surat_jalan()->result();

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
        $data['content']= "tolling_titipan/add_surat_jalan";
        
        $this->load->model('Model_tolling_titipan');
        $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();

        $data['jenis_barang_list'] = $this->Model_tolling_titipan->jenis_barang_list()->result();
        $data['kendaraan_list'] = $this->Model_tolling_titipan->kendaraan_list()->result();
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
    
    function get_so_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $data = $this->Model_tolling_titipan->get_so_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_sales_order;
        } 
        print form_dropdown('sales_order_id', $arr_so);
    }
    
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
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'sales_order_id'=>$this->input->post('sales_order_id'),
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('surat_jalan', $data)){
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
            
            $data['customer_list'] = $this->Model_tolling_titipan->customer_list()->result();

            $data['jenis_barang_list'] = $this->Model_tolling_titipan->jenis_barang_list()->result();
            $data['kendaraan_list'] = $this->Model_tolling_titipan->kendaraan_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling/surat_jalan');
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
        $this->load->model('Model_tolling_titipan'); 
        $list_produksi = $this->Model_tolling_titipan->list_no_produksi()->result();
        
        
        $myDetail = $this->Model_tolling_titipan->load_detail_surat_jalan($id)->result(); 
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
    }
    
    function update_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'sales_order_id'=>$this->input->post('sales_order_id'),
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_jalan', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data surat jalan berhasil disimpan');
        redirect('index.php/Tolling/surat_jalan');
    }
    
    function print_surat_jalan(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_tolling_titipan');
            $data['header']  = $this->Model_tolling_titipan->show_header_sj($id)->row_array();
            $data['details'] = $this->Model_tolling_titipan->load_detail_surat_jalan($id)->result();

            $this->load->view('print_surat_jalan', $data);
        }else{
            redirect('index.php'); 
        }
    } 

}