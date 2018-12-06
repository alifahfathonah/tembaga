<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RollingKawatHitam extends CI_Controller{
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

        $data['content']= "rolling_kawat_hitam/index";
        $this->load->model('Model_rolling_kawat_hitam');
        $data['list_data'] = $this->Model_rolling_kawat_hitam->spb_list()->result();

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
        $data['content']= "rolling_kawat_hitam/add";
        
        $this->load->model('Model_rolling_kawat_hitam');
        $data['jenis_barang_list'] = $this->Model_rolling_kawat_hitam->jenis_barang_list()->result();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_spb'=> $code,
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'module'=>'Rolling',
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('spb', $data)){
                redirect('index.php/RollingKawatHitam/edit/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'SPB gagal di-create, silahkan dicoba kembali!');
                redirect('index.php/RollingKawatHitam');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'SPB gagal di-create, penomoran belum disetup!');
            redirect('index.php/RollingKawatHitam');
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

            $data['content']= "rolling_kawat_hitam/edit";
            $this->load->model('Model_rolling_kawat_hitam');
            $data['header'] = $this->Model_rolling_kawat_hitam->show_header_spb($id)->row_array();              
            $data['jenis_barang_list'] = $this->Model_rolling_kawat_hitam->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/RollingKawatHitam');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'status'=>0,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('spb', $data);
        
        $this->session->set_flashdata('flash_msg', 'SPB berhasil disimpan');
        redirect('index.php/RollingKawatHitam');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_rongsok');
        $list_rongsok = $this->Model_rongsok->list_data()->result();
        
        $this->load->model('Model_rolling_kawat_hitam'); 
        $myDetail = $this->Model_rolling_kawat_hitam->load_detail($id)->result(); 
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
        $tabel .= '<td><input type="text" id="qty" name="qty" class="form-control myline" maxlength="10" '
                . 'onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>';
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
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
        
        if($this->db->insert('spb_detail', array(
            'spb_id'=>$this->input->post('id'),            
            'rongsok_id'=>$this->input->post('rongsok_id'),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
            'line_remarks'=>$this->input->post('line_remarks')
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
        if($this->db->delete('spb_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_rolling_kawat_hitam');
            $data['header']  = $this->Model_rolling_kawat_hitam->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_rolling_kawat_hitam->load_detail($id)->result();

            $this->load->view('print_spb_kawat_hitam', $data);
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

            $data['content']= "rolling_kawat_hitam/create_skb";
            $this->load->model('Model_rolling_kawat_hitam');
            $data['header'] = $this->Model_rolling_kawat_hitam->show_header_spb($id)->row_array();           
            $data['details'] = $this->Model_rolling_kawat_hitam->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/RollingKawatHitam');
        }
    }
    
    function save_skb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SKB', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_skb'=> $code,
                        'tanggal'=> $tgl_input,
                        'spb_id'=> $this->input->post('spb_id'),
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
                        'spb_detail_id'=>$row['spb_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>str_replace('.', '', $row['qty']),
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['spb_detail_id']);
                    $this->db->update('spb_detail', array('flag_skb'=>1));
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
        redirect('index.php/RollingKawatHitam');    
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

        $data['content']= "rolling_kawat_hitam/skb_list";
        $this->load->model('Model_rolling_kawat_hitam');
        $data['list_data'] = $this->Model_rolling_kawat_hitam->skb_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_skb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_rolling_kawat_hitam');
            $data['header']  = $this->Model_rolling_kawat_hitam->show_header_skb($id)->row_array();
            $data['details'] = $this->Model_rolling_kawat_hitam->show_detail_skb($id)->result();

            $this->load->view('print_skb_kawat_hitam', $data);
        }else{
            redirect('index.php'); 
        }
    }    
    
    function hasil_produksi(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "rolling_kawat_hitam/hasil_produksi";
        $this->load->model('Model_rolling_kawat_hitam');
        $data['list_data'] = $this->Model_rolling_kawat_hitam->hasil_produksi()->result();

        $this->load->view('layout', $data);
    }
    
    function add_produksi(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "rolling_kawat_hitam/add_produksi";
        
        $this->load->model('Model_rolling_kawat_hitam');
        $data['skb_list'] = $this->Model_rolling_kawat_hitam->get_skb_list()->result();
        $data['jenis_barang_list'] = $this->Model_rolling_kawat_hitam->jenis_barang_list()->result();
        $this->load->view('layout', $data);
    }
    
    function save_produksi(){
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
                'skb_id'=>$this->input->post('skb_id'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('produksi_ampas', $data)){
                redirect('index.php/RollingKawatHitam/edit_produksi/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/RollingKawatHitam/hasil_produksi');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, penomoran belum disetup!');
            redirect('index.php/RollingKawatHitam/hasil_produksi');
        }
    }
    
    function edit_produksi(){
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

            $data['content']= "rolling_kawat_hitam/edit_produksi";
            $this->load->model('Model_rolling_kawat_hitam');
            $data['header'] = $this->Model_rolling_kawat_hitam->show_header_pa($id)->row_array();  
            
            $data['skb_list'] = $this->Model_rolling_kawat_hitam->get_skb_list()->result();
            $data['jenis_barang_list'] = $this->Model_rolling_kawat_hitam->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/RollingKawatHitam/hasil_produksi');
        }
    }
    
    function load_detail_produksi(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $produksi = 0;
        $sisa = 0;

        $this->load->model('Model_rongsok');
        $list_rongsok = $this->Model_rongsok->list_data()->result();
        
        $this->load->model('Model_rolling_kawat_hitam'); 
        $list_bobin = $this->Model_rolling_kawat_hitam->get_list_bobin()->result();
        $myDetail = $this->Model_rolling_kawat_hitam->load_detail_produksi($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->hasil_produksi,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.$row->nama_bobin.'</td>';
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
        $tabel .= '<select id="rongsok_id" name="rongsok_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">';
            $tabel .= '<option value=""></option>';
            foreach ($list_rongsok as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        $tabel .= '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>';
        
        $tabel .= '<td><input type="text" id="hasil_produksi" name="hasil_produksi" class="form-control myline" '
                . 'onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        
        $tabel .= '<td>';
        $tabel .= '<select id="bobin_id" name="bobin_id" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px">';
            $tabel .= '<option value=""></option>';
            foreach ($list_bobin as $value){
                $tabel .= "<option value='".$value->id."'>".$value->nama_bobin."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';
        
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';
        
        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($produksi,0,',','.').'</strong></td>';
        $tabel .= '<td></td>';
        $tabel .= '<td></td>';
        $tabel .= '<td></td>';
        $tabel .= '</tr>';
       
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function delete_detail_produksi(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->load->model('Model_rolling_kawat_hitam'); 
        $detail = $this->Model_rolling_kawat_hitam->get_detail_produksi($id)->result();
        
        $this->db->where('id', $detail['bobin_id']);
        $this->db->update('bobin', array('status'=>0));
        
        $this->db->where('id', $id);
        if($this->db->delete('produksi_ampas_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item produksi! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save_detail_produksi(){
        $return_data = array();
        
        if($this->db->insert('produksi_ampas_detail', array(
            'produksi_ampas_id'=>$this->input->post('id'),
            'rongsok_id'=>$this->input->post('rongsok_id'),
            'hasil_produksi'=>str_replace('.', '', $this->input->post('hasil_produksi')),
            'bobin_id'=>$this->input->post('bobin_id'),
            'line_remarks'=>str_replace('.', '', $this->input->post('line_remarks'))
        ))){
            $return_data['message_type']= "sukses";
            
            $this->db->where('id', $this->input->post('bobin_id'));
            $this->db->update('bobin', array('status'=>1));
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item produksi! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function update_produksi(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'skb_id'=>$this->input->post('skb_id'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('produksi_ampas', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data produksi ingot berhasil disimpan');
        redirect('index.php/RollingKawatHitam/hasil_produksi');
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

            $data['content']= "rolling_kawat_hitam/view_spb";
            $this->load->model('Model_rolling_kawat_hitam');
            $data['myData'] = $this->Model_rolling_kawat_hitam->show_header_spb($id)->row_array();           
            $data['myDetail'] = $this->Model_rolling_kawat_hitam->load_detail($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/RollingKawatHitam');
        }
    }
    
    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 1,
                'approved'=> $tanggal,
                'approved_by'=>$user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('spb', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan barang berhasil diapprove');
        redirect('index.php/RollingKawatHitam');
    }
    
    function reject_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('spb', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data permintaan barang berhasil direject');
        redirect('index.php/RollingKawatHitam');
    }
}