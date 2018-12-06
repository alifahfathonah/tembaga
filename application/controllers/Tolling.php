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
                'jenis_barang_id'=>4,
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
        $myDetail = $this->Model_tolling_titipan->load_detail_edit($id)->result(); 
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
        $tabel .= '<td><input type="text" id="harga" name="harga" class="form-control myline" '
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
            $tabel .= '<td>'.$row->qty.'</td>';
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
        $tabel .= '<td><input type="text" id="qty" name="qty" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="bruto" name="bruto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="berat_palette" name="berat_palette" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline"/></td>';
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
        $this->load->model('Model_tolling_titipan');

        
        if($code){        
            $this->db->where('so_id', $this->input->post('sales_order_id'));
            $this->db->delete('dtr');

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
            $dtr_id = $this->db->insert_id();//update detail dtr_id
                
                $this->db->where('so_id', $this->input->post('sales_order_id'));
                $this->db->update('dtr_detail', array('dtr_id'=>$dtr_id));

                $id = $this->input->post('sales_order_id');
                $details = $this->Model_tolling_titipan->save_dtr_detail($id)->result();

                foreach ($details as $row){
                    $wherearray = array('rongsok_id' => $row->rongsok_id, 'sales_order_id' => $row->so_id );
                    $this->db->where($wherearray);
                    $this->db->update('sales_order_detail', array('flag_dtr'=>1));
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
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $return_data = array();
        $this->db->trans_start(); 
        
        $hasil_produksi = str_replace('.', '', $this->input->post('hasil_produksi'));
        $sisa = str_replace('.', '', $this->input->post('sisa'));
        
        $this->db->insert('produksi_ampas_detail', array(
            'produksi_ampas_id'=>$this->input->post('id'),
            'ampas_id'=>$this->input->post('ampas_id'),
            'hasil_produksi'=>$hasil_produksi,
            'sisa'=>$sisa,
            'line_remarks'=>$this->input->post('line_remarks')
        ));
        
        #Update Stok Ampas
        $this->load->model('Model_beli_rongsok');
        $get_stok = $this->Model_beli_rongsok->cek_stok($this->input->post('jenis_item'), 'AMPAS')->row_array(); 
        if($get_stok){
            $stok_id  = $get_stok['id'];            
            $this->db->where('id', $stok_id);
            $this->db->update('t_inventory', array(
                    'stok_bruto'=>($get_stok['stok_bruto']+ $hasil_produksi), 
                    'stok_netto'=>($get_stok['stok_netto']+ $hasil_produksi), 
                    'modified'=>$tanggal, 
                    'modified_by'=>$user_id));
        }else{
            $this->db->insert('t_inventory', array(
                    'nama_produk'=>$this->input->post('jenis_item'),
                    'jenis_item'=>'AMPAS',
                    'stok_bruto'=>$hasil_produksi, 
                    'stok_netto'=>$hasil_produksi, 
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
            'bruto_masuk'=>$hasil_produksi,
            'netto_masuk'=>$hasil_produksi,
            'remarks'=>'Produksi ampas tolling titipan',
        ));
        
        if($this->db->trans_complete()){  
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
                'sales_order_id'=>$this->input->post('sales_order_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
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
            $data['kendaraan_list'] = $this->Model_tolling_titipan->kendaraan_list()->result();
            $data['list_barang_spb'] = $this->Model_tolling_titipan->jenis_barang_sj($data['header']['no_spb_fg'])->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling/surat_jalan');
        }
    }

    function get_data_fg(){
        $id = $this->input->post('id');
        $this->load->model('Model_tolling_titipan');
        $uom= $this->Model_tolling_titipan->get_data_fg($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($uom); 
    }
    
    function update_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $spb = $this->input->post('no_spb_fg');
        
        #Insert Surat Jalan
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id_barang']!=''){
            $this->db->insert('t_surat_jalan_detail', array(
                't_sj_id'=> $this->input->post('id'),
                'jenis_barang_id'=> $v['jenis_barang_id'],
                'no_packing'=> $v['no_packing'],
                'qty'=>'1',
                'bruto'=> $v['bruto'],
                'netto'=> $v['netto'],
                'line_remarks'=> $v['line_remarks'],
                'created_by'=>$user_id,
                'created_at'=>$tanggal
            ));

            #Update Status flag_taken di t_gudang_fg
            $this->db->where('id', $v['id_barang']);
            $this->db->update('t_gudang_fg',array(
                'flag_taken'=>1,
            ));
            }   
        }

        $this->load->model('Model_tolling_titipan');
        $get_status = $this->Model_tolling_titipan->jenis_barang_sj($spb)->result();
        if($get_status){
            $status=0;
        } else {
            $status=1;
            $this->db->where('so_id',$this->input->post('so_id'));
            $this->db->update('tolling_fg', array(
                'status'=>$status
        ));

        }

        $data = array(
                'tanggal'=> $tgl_input,
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
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
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "tolling_titipan/add_tolling_fg";
        
        $this->load->model('Model_tolling_titipan');
        $data['so_list'] = $this->Model_tolling_titipan->select_so()->result();
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
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->load->model('Model_m_numberings');
        $codeTFG = $this->Model_m_numberings->getNumbering('TFG', $tgl_input);
        $codeSPB = $this->Model_m_numberings->getNumbering('SPB-FG', $tgl_input);
        
        if($codeTFG){

            $this->db->insert('t_spb_fg', array(
                'no_spb' => $codeSPB,
                'tanggal' => $tgl_input,
                'keterangan' => 'UNTUK TOLLING TITIPAN FG',
                'created_at' => $tanggal,
                'created_by' => $user_id,
                'modified_at' => $tanggal,
                'modified_by' => $user_id
            ));

            $spb_id = $this->db->insert_id();

            $data = array(
                'no_tolling_fg'=> $codeTFG,
                'so_id'=> $this->input->post('no_sales_order'),
                'no_spb_fg'=> $spb_id,
                'tanggal'=> $tgl_input,
                'netto'=> $this->input->post('netto'),
                'm_customer_id'=>$this->input->post('id_customer'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('tolling_fg', $data)){
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
            $data['header'] = $this->Model_tolling_titipan->show_header_tolling_fg($id)->row_array();
            $data['marketing_list'] = $this->Model_tolling_titipan->marketing_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Tolling');
        }
    }

    function load_detail_tolling(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_tolling_titipan');
        $list_barang = $this->Model_tolling_titipan->get_barang_fg()->result();
        
        $myDetail = $this->Model_tolling_titipan->load_tolling_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.number_format($row->harga,0,',','.').'</td>';
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
            foreach ($list_barang as $value){
                $tabel .= "<option value='".$value->id."'>".$value->jenis_barang."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="harga" name="harga" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);"/></td>';
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function save_detail_tolling(){
        $return_data = array();
        $tanggal  = date('Y-m-d');
        
        if($this->db->insert('tolling_fg_detail', array(
            'tolling_fg_id'=>$this->input->post('id'),
            'tanggal'=>$tanggal,
            'jenis_barang_id'=>$this->input->post('jenis_barang'),
            'harga'=>str_replace('.', '', $this->input->post('harga')),
            'netto'=>$this->input->post('netto'),
            'keterangan'=>$this->input->post('keterangan')
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
        if($this->db->delete('tolling_fg_detail')){
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

    function update_tolling_fg(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d');
        
        $this->db->trans_start();
        
        $this->load->model('Model_tolling_titipan');
        $details= $this->Model_tolling_titipan->load_tolling_loop($id)->result();
        foreach($details as $row){
            $this->db->insert('t_spb_fg_detail', array(
                't_spb_fg_id'=>$row->no_spb_fg,
                'tanggal'=>$tanggal,
                'jenis_barang_id'=>$row->jenis_barang_id,
                'uom'=>$row->uom,
                'netto'=>$row->netto,
                'keterangan'=>$row->keterangan
            ));
        }
        
        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'SPB FG berhasil di buat...');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat membuat SPB FG, silahkan coba kembali!');
        }
        redirect('index.php/Tolling/tolling_fg');
    }

    function cek_balance(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "tolling_titipan/cek_balance";
        $this->load->model('Model_tolling_titipan');
        $data['list_data'] = $this->Model_tolling_titipan->cek_balance_list()->result();

        $this->load->view('layout', $data);
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
}