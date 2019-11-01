<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingot extends CI_Controller{
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

        $data['content']= "ingot/index";
        $this->load->model('Model_ingot');
        $data['list_data'] = $this->Model_ingot->list_data()->result();

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
        $data['content']= "ingot/add";
        
        $this->load->model('Model_ingot');
        $data['jenis_barang_list'] = $this->Model_ingot->jenis_barang_list()->result();
        $data['apolo'] = $this->Model_ingot->show_apolo()->result();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PRD', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_produksi'=> $code,
                'tanggal'=> $tgl_input,
                'jenis_barang_id'=>$this->input->post('jenis_barang'),
                'id_apolo'=>$this->input->post('tipe_apolo'),
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id
            );
            $this->db->insert('produksi_ingot', $data);
            $insert_id = $this->db->insert_id();

            $detail = array(
                'produksi_ingot_id'=> $insert_id,
                'rongsok_id'=>$this->input->post('jenis_barang'),
                'qty'=>$this->input->post('qty'),
                'flag_spb'=>1,
                'created'=>$user_id,
                'created_by'=>$tanggal
            );
            $this->db->insert('produksi_ingot_detail', $detail);

            $code_spb = $this->Model_m_numberings->getNumbering('SPB', $tgl_input);
            $data_spb = array(
                        'no_spb'=> $code_spb,
                        'tanggal'=> $tgl_input,
                        'produksi_ingot_id'=> $insert_id,
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'jumlah'=> $this->input->post('qty'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('spb', $data_spb);

            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Data produksi berhasil di simpan dengan nomor '.$code);
                redirect('index.php/Ingot');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Ingot');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Ingot');
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

            $data['content']= "ingot/edit";
            $this->load->model('Model_ingot');
            $data['header'] = $this->Model_ingot->show_header_pi($id)->row_array();  
            $data['jenis_barang_list'] = $this->Model_ingot->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot');
        }
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang_id'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('produksi_ingot', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data produksi ingot berhasil disimpan');
        redirect('index.php/Ingot');
    }
    
    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_rongsok');
        $list_rongsok = $this->Model_rongsok->list_data()->result();
        
        $this->load->model('Model_ingot'); 
        $list_pallete = $this->Model_ingot->list_pallete()->result();
        $myDetail = $this->Model_ingot->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->qty.'</td>';
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
    
    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_rongsok');
        $rongsok= $this->Model_rongsok->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }
    
    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('produksi_ingot_detail', array(
            'produksi_ingot_id'=>$this->input->post('id'),
            'qty'=>$this->input->post('qty'),
            'rongsok_id'=>$this->input->post('rongsok_id'),
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
        if($this->db->delete('produksi_ingot_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function create_spb(){
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

            $data['content']= "ingot/create_spb";
            $this->load->model('Model_ingot');
            $data['header'] = $this->Model_ingot->show_header_pi($id)->row_array();
            $this->load->model('Model_rongsok');
            $data['list_rongsok'] = $this->Model_rongsok->list_data()->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot');
        }
    }
    
    function tambah_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('spb', array(
                        'status'=> 4,
                        'modified'=> $tanggal,
                        'modified_by'=>$user_id
        ));

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'Silahkan tambah barang');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }                 

       redirect('index.php/Ingot/view_spb/'.$spb_id);
    }

    function save_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_spb'=> $code,
                        'tanggal'=> $tgl_input,
                        'produksi_ingot_id'=> $this->input->post('produksi_ingot_id'),
                        'jenis_barang'=> $this->input->post('jenis_barang_id'),
                        'jenis_spb'=> 0,
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );

            $this->db->insert('spb', $data);
            $spb_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if($row['rongsok_id']!=0 && $row['netto']!=0){
                    $this->db->insert('spb_detail', array(
                        'spb_id'=>$spb_id,
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>$row['netto'],
                        'line_remarks'=>$row['line_remarks']
                    ));
                }
            }

            $this->db->where('produksi_ingot_id',$this->input->post('produksi_ingot_id'));
            $this->db->update('produksi_ingot_detail', array('flag_spb'=>1));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create SPB, silahkan coba kembali!');
            }                   
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan SPB gagal, penomoran belum disetup!');
        }
        redirect('index.php/Ingot');    
    }

    function save_spb_keluar(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_spb'=> $code,
                        'tanggal'=> $tgl_input,
                        'produksi_ingot_id'=> 0,
                        'jenis_barang'=> 1,
                        'jenis_spb'=> $this->input->post('jenis_spb'),
                        'jumlah'=> $this->input->post('qty'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );

            $this->db->insert('spb', $data);
            $id = $this->db->insert_id();

            if($this->db->trans_complete()){
                redirect('index.php/Ingot/create_spb_keluar/'.$id);  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Ingot/hasil_produksi');  
            }                           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan SPB gagal, penomoran belum disetup!');
        }
        redirect('index.php/Ingot');    
    }

    function create_spb_keluar(){
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

            $data['content']= "ingot/create_spb_keluar";
            $this->load->model('Model_ingot');
            $data['header'] = $this->Model_ingot->show_header_spb($id)->row_array();
            $this->load->model('Model_rongsok');
            $data['list_rongsok'] = $this->Model_rongsok->list_data()->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot');
        }
    }

    function save_spb_rsk(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $id = $this->input->post('id');

            $this->db->trans_start();

            $this->db->where('id', $id);
            $this->db->update('spb', array(
                'tanggal'=> $tgl_input,
                'remarks'=> $this->input->post('remarks')
            ));

            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if($row['rongsok_id']!=0 && $row['netto']!=0){
                    $this->db->insert('spb_detail', array(
                        'spb_id'=>$id,
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty'=>$row['netto'],
                        'line_remarks'=>$row['line_remarks']
                    ));
                }
            }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB berhasil di-create dengan nomor : '.$this->input->post('no_dtr'));                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create SPB, silahkan coba kembali!');
            }                   
        redirect('index.php/GudangRongsok/spb_list');    
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

        $data['content']= "ingot/spb_list";
        $this->load->model('Model_ingot');
        $data['list_data'] = $this->Model_ingot->spb_list()->result();

        $this->load->view('layout', $data);
    }

    function filter_spb(){
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

            $data['content']= "ingot/spb_list";
            $this->load->model('Model_ingot');
            if($id == 0){
                $data['list_data'] = $this->Model_ingot->spb_list_filter_0()->result();
            }else if($id == 1){
                $data['list_data'] = $this->Model_ingot->spb_list_filter_1()->result();
            }

            $this->load->view('layout', $data);
        }else{
            redirect('index.php/GudangRongsok/spb_list');
        }
    }
    
    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_ingot');
            $data['header']  = $this->Model_ingot->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_ingot->show_detail_spb($id)->result();

            $this->load->view('ingot/print_spb', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_spb_fulfilment(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->helper('tanggal_indo_helper');
            $this->load->model('Model_ingot');
            $data['header']  = $this->Model_ingot->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_ingot->show_detail_spb_fulfilment($id)->result();

            $this->load->view('ingot/print_spb_fulfilment', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_afkir(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->helper('tanggal_indo');
            $this->load->model('Model_beli_rongsok');
            $this->load->model('Model_ingot');
            $data['header']  = $this->Model_ingot->show_header_dtr($id)->row_array();
            $data['details'] = $this->Model_beli_rongsok->show_detail_dtr($id)->result();

            $this->load->view('ingot/print_afkir', $data);
        }else{
            $this->session->set_flashdata('flash_msg', 'No DTR Afkir tidak di temukan'); 
            redirect('index.php/Ingot/hasil_produksi'); 
        }
    }

    function print_hasil_produksi(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->helper('tanggal_indo');
            $this->load->model('Model_beli_rongsok');
            $this->load->model('Model_ingot');
            $data['header']  = $this->Model_ingot->show_hasil_produksi($id)->row_array();

            $this->load->view('ingot/print_hasil_produksi', $data);
        }else{
            $this->session->set_flashdata('flash_msg', 'No DTR Afkir tidak di temukan'); 
            redirect('index.php/Ingot/hasil_produksi'); 
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

            $data['content']= "ingot/create_skb";
            $this->load->model('Model_ingot');
            $data['header'] = $this->Model_ingot->show_header_spb($id)->row_array();           
            $data['details'] = $this->Model_ingot->show_detail_spb($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot/spb_list');
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
        redirect('index.php/Ingot/spb_list');    
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

        $data['content']= "ingot/skb_list";
        $this->load->model('Model_ingot');
        $data['list_data'] = $this->Model_ingot->skb_list()->result();

        $this->load->view('layout', $data);
    }
    
    function print_skb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_ingot');
            $data['header']  = $this->Model_ingot->show_header_skb($id)->row_array();
            $data['details'] = $this->Model_ingot->show_detail_skb($id)->result();

            $this->load->view('print_skb', $data);
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

        $data['content']= "ingot/hasil_produksi";
        $this->load->model('Model_ingot');
        $data['list_data'] = $this->Model_ingot->hasil_produksi()->result();

        $this->load->view('layout', $data);
    }

    function hasil_produksi2(){
    
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "ingot/add_produksi2";
     
        $this->load->model('Model_ingot');
        $this->load->model('Model_beli_rongsok');
        $data['no_produksi_list'] = $this->Model_ingot->get_no_produksi_list()->result();
        $data['rongsok'] = $this->Model_beli_rongsok->show_data_rongsok()->result();

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
        $data['content']= "ingot/add_produksi";
        
        $this->load->model('Model_ingot');
        $data['skb_list'] = $this->Model_ingot->get_skb_list()->result();
        $data['jenis_barang_list'] = $this->Model_ingot->jenis_barang_list()->result();
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
                redirect('index.php/Ingot/edit_produksi/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/Ingot/hasil_produksi');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data produksi gagal disimpan, penomoran belum disetup!');
            redirect('index.php/Ingot/hasil_produksi');
        }
    }

    function save_produksi2(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_prd = date('Y-m-d', strtotime($this->input->post('tgl_prd')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PRD-APL', $tgl_input);

        $data = array(
                'tanggal'=> $tgl_input,
                'mulai'=>$this->input->post('mulai'),
                'selesai'=>$this->input->post('selesai'),
                'tipe'=>$this->input->post('tipe_rongsok'),
                'total_rongsok'=>$this->input->post('total_rongsok'),
                'kayu'=>$this->input->post('kayu'),
                'gas'=> $this->input->post('gas'),
                'no_spb_rongsok'=> $this->input->post('no_spb_rongsok'),
                'id_produksi'=> $this->input->post('no_masak'),
                'ingot'=> $this->input->post('ingot'),
                'berat_ingot'=> $this->input->post('berat_ingot'),
                'bs'=> $this->input->post('bs'),
                'susut'=> $this->input->post('susut'),
                'ampas'=> $this->input->post('ampas'),
                'serbuk'=> $this->input->post('serbuk'),
                'bs_service'=> 0,
                'created_by'=> $user_id
            );

        #insert data hasil masak
        $this->db->insert('t_hasil_masak', $data);
        $id_masak = $this->db->insert_id();

        #Catat hasil WIP
        $data_wip = array(
                'no_produksi_wip'=> $code,
                'tanggal'=> $tgl_prd,
                'jenis_barang_id'=>2,// INGOT
                'jenis_masak' => 'INGOT',
                'uom'=> 'BATANG',
                'hasil_masak_id'=> $id_masak,
                'qty'=> $this->input->post('ingot'),
                'berat'=> $this->input->post('berat_ingot'),
                'created_by'=> $user_id,
            );

        $this->db->insert('t_hasil_wip', $data_wip);
        $id_hasil_wip = $this->db->insert_id();

        if($this->input->post('bs') != 0){
            //CREATE DTR
        $this->load->model('Model_m_numberings');
        $code_dtr = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
        
            #insert dtr
            $data_dtr = array(
                        'no_dtr'=> $code_dtr,
                        'tanggal'=> $tgl_prd,
                        'supplier_id'=> 96,//APOLLO
                        'prd_id'=> $id_hasil_wip,
                        'jenis_barang'=> 'RONGSOK',
                        'remarks'=> 'SISA PRODUKSI INGOT',
                        'created'=> $tanggal,
                        'created_by'=> $user_id
                    );
            $this->db->insert('dtr', $data_dtr);
            $dtr_id = $this->db->insert_id();

            //CREATE DTR_DETAIL
            if($this->input->post('bs')!=0){

                $details = $this->input->post('myDetails');
                // print_r($details);die();
                $bs_ingot = 0;
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
                            'line_remarks'=>'SISA PRODUKSI',
                            'created'=>$tanggal,
                            'created_by'=>$user_id,
                            'tanggal_masuk'=>$tgl_input
                        ));
                        if($row['rongsok_id'] == 22){
                            $bs_ingot += $row['netto'];
                        }
                    }
                }

                if($bs_ingot > 0){
                    $new_bs = $this->input->post('bs') - $bs_ingot;
                    $this->db->where('id', $id_masak);
                    $this->db->update('t_hasil_masak', array(
                        'bs'=> $new_bs,
                        'bs_service'=>$bs_ingot
                    ));
                }
            }
        }

        // if($this->input->post('serbuk') != 0){
        //     #insert serbuk ke gudang bs
        //     $data_serbuk = array(
        //         'id_produksi' => $id_masak,
        //         'jenis_produksi' => 'INGOT',
        //         'berat' => $this->input->post('serbuk'),
        //         'jenis_barang_id' => 31,//Serbuk Drawing SDM
        //         'tanggal' => $tgl_input,
        //         'status' => 0,
        //         'created_by' => $user_id,
        //         'created_at' => $tanggal
        //     );
        //     $this->db->insert('t_gudang_bs', $data_serbuk);
        // }

        // if($this->input->post('ampas') != 0){
        //     #insert ampas ke gudang bs
        //     $data_ampas = array(
        //         'id_produksi' => $id_masak,
        //         'jenis_produksi' => 'INGOT',
        //         'berat' => $this->input->post('ampas'),
        //         'jenis_barang_id' => 28,//AMPAS APOLLO
        //         'tanggal' => $tgl_input,
        //         'status' => 0,
        //         'created_by' => $user_id,
        //         'created_at' => $tanggal
        //     );
        //     $this->db->insert('t_gudang_bs', $data_ampas);
        // }

        #update status produksi
        $this->db->where('id',$this->input->post('no_masak'));
        $this->db->update('produksi_ingot',array(
                        'flag_result'=>1));

        /* 
        Hasil masak di distribusikan ke 3 gudang, masing-masing memiliki BPB dan BPB detail.
        3 gudang diantaranya adalah: gudang rongsok (BS), gudang ampas, gudang wip
        */ 

        #Create BPB ke gudang WIP
        $this->load->model('Model_m_numberings');
        $code_bpb_wip = $this->Model_m_numberings->getNumbering('BPB-WIP', $tgl_input);    
        $data_bpb = array(
                'no_bpb' => $code_bpb_wip,
                'tanggal' => $tgl_prd,
                'status' => 0,
                'hasil_wip_id'=> $id_hasil_wip,
                'created_by' => $user_id,
                'created' => $tgl_prd
                );
        $this->db->insert('t_bpb_wip',$data_bpb);

        #Create BPB detail ke gudang WIP
        $data_bpb_detail = array(
                'bpb_wip_id' => $this->db->insert_id(),
                'created' => $tgl_input,
                'jenis_barang_id' => 2,
                'qty' => $this->input->post('ingot'),
                'uom' => 'BATANG',
                'berat' => $this->input->post('berat_ingot'),
                'created_by' => $user_id
                );
        $this->db->insert('t_bpb_wip_detail',$data_bpb_detail);

        #Create DTR BS ke gudang rongsok
        // $code_dtr_wip = $this->Model_m_numberings->getNumbering('DTR', $tgl_input);
        // $data_dtr_bs = array(
        //         'no_dtr'=> $code_dtr_wip,
        //         'tanggal' => $tgl_input,
        //         'status' =>0,
        //         'jenis_barang' => 'RONGSOK',
        //         'remarks'=> 'BS SISA PRODUKSI INGOT',
        //         'created_by' => $user_id
        //         );
        // $this->db->insert('dtr',$data_dtr_bs);
        // $dtr_id = $this->db->insert_id();

        // #Create DTR Detail BS ke gudang rongsok
        // $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
        // $data_dtr_detail_bs = array(
        //         'dtr_id' => $dtr_id,
        //         'rongsok_id' => 7,
        //         'netto'=> $this->input->post('bs'),
        //         'line_remarks' => 'SISA PRODUKSI INGOT',
        //         'no_pallete' => date("dmyHis").$rand,
        //         'flag_taken' => 0
        //         );
        // $this->db->insert('dtr_detail',$data_dtr_detail_bs);

        if($this->input->post('ampas') != 0){
            #Create BPB Ampas ke gudang ampas
            $code_bpb_ampas = $this->Model_m_numberings->getNumbering('BPB-AMP', $tgl_input);    
            $data_bpb_ampas = array(
                    'no_bpb' => $code_bpb_ampas,
                    'tanggal' => $tgl_prd,
                    'status' => 0,
                    'hasil_masak_id'=> $id_hasil_wip,
                    'created_by' => $user_id,
                    'created' => $tgl_input
                    );
            $this->db->insert('t_bpb_ampas',$data_bpb_ampas);

            #Create BPB Detail Ampas ke gudang ampas
            $data_bpb_detail_ampas = array(
                    'bpb_ampas_id' => $this->db->insert_id(),
                    'jenis_barang_id' => 28,
                    'uom' => 'KG',
                    'berat' => $this->input->post('ampas'),
                    'keterangan' => 'SISA PRODUKSI INGOT'
                    );
            $this->db->insert('t_bpb_ampas_detail',$data_bpb_detail_ampas);
        }
        $this->db->trans_complete();
        redirect('index.php/Ingot/hasil_produksi/');
    }

    function update_hasil(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $id = $this->input->post('id');

        $this->db->trans_start();

        $data = array(
                'tanggal'=>$tgl_input,
                'mulai'=>$this->input->post('mulai'),
                'selesai'=>$this->input->post('selesai'),
                'kayu'=>$this->input->post('kayu'),
                'gas'=> $this->input->post('gas'),
                'ingot'=> $this->input->post('ingot'),
                'berat_ingot'=> $this->input->post('berat_ingot'),
                'bs'=> $this->input->post('bs'),
                'susut'=> $this->input->post('susut'),
                'ampas'=> $this->input->post('ampas'),
                'serbuk'=> $this->input->post('serbuk'),
                'bs_service'=> $this->input->post('bs_service'),
                'modified_at'=>$tanggal,
                'modified_by'=>$user_id,
                'modified_remarks'=>$this->input->post('modified_remarks')
            );

        #update data hasil masak
        $this->db->where('id', $id);
        $this->db->update('t_hasil_masak', $data);

        //BS
        if($this->input->post('bs_old') != 0){
            #update bs ke gudang bs
            $data_bs = array(
                'bruto' => $this->input->post('bs'),
                'netto' => $this->input->post('bs')
            );
            $this->db->where('dtr_id',$this->input->post('id_dtr'));
            $this->db->where('rongsok_id',21);
            $this->db->where('line_remarks', 'SISA PRODUKSI');
            $this->db->update('dtr_detail', $data_bs);

        }

        if($this->input->post('bs_service_old') != 0){
            $data_bs_service = array(
                'bruto' => $this->input->post('bs_service'),
                'netto' => $this->input->post('bs_service')
            );
            $this->db->where('dtr_id',$this->input->post('id_dtr'));
            $this->db->where('rongsok_id',21);
            $this->db->where('line_remarks', 'BS SERVICE');
            $this->db->update('dtr_detail', $data_bs_service);
        }

        //SERBUK
        // if($this->input->post('serbuk_old') != 0){
        //     #update serbuk ke gudang bs
        //     $data_bs = array(
        //         'berat' => $this->input->post('serbuk')
        //     );
        //     $this->db->where('id_produksi', $id);
        //     $this->db->where('jenis_barang_id', 31);
        //     $this->db->update('t_gudang_bs', $data_bs);
        // }else if($this->input->post('serbuk') != 0){
        //     #update serbuk ke gudang bs
        //     $data_bs = array(
        //         'id_produksi' => $id,
        //         'berat' => $this->input->post('serbuk'),
        //         'jenis_barang_id' => 31,
        //         'tanggal' => $tgl_input,
        //         'status' => 0,
        //         'created_by' => $user_id,
        //         'created_at' => $tanggal
        //     );
        //     $this->db->insert('t_gudang_bs', $data_bs);
        // }
        
        #Update hasil WIP
        $data_wip = array(
                'qty'=> $this->input->post('ingot'),
                'berat'=> $this->input->post('berat_ingot')
            );
        $this->db->where('hasil_masak_id', $id);
        $this->db->update('t_hasil_wip', $data_wip);

        #Create BPB detail ke gudang WIP
        $data_bpb_detail = array(
                'qty' => $this->input->post('ingot'),
                'berat' => $this->input->post('berat_ingot')
                );
        $this->db->where('bpb_wip_id', $this->input->post('id_bpb_wip'));
        $this->db->update('t_bpb_wip_detail',$data_bpb_detail);

        #Update BPB Ampas
        if($this->input->post('ampas_old') != $this->input->post('ampas')){
            if($this->input->post('ampas_old') != 0){

                $data_bpb_detail_ampas = array(
                        'berat' => $this->input->post('ampas')
                        );
                $this->db->where('bpb_ampas_id', $this->input->post('id_bpb_ampas'));
                $this->db->update('t_bpb_ampas_detail',$data_bpb_detail_ampas);
            }else if($this->input->post('ampas') != 0){

                $this->load->model('Model_m_numberings');
                #Create BPB Ampas ke gudang ampas
                $code_bpb_ampas = $this->Model_m_numberings->getNumbering('BPB-AMP', $tgl_input); 

                $data_bpb_ampas = array(
                        'no_bpb' => $code_bpb_ampas,
                        'tanggal' => $tgl_input,
                        'status' => 0,
                        'hasil_masak_id'=> $id,
                        'created_by' => $user_id,
                        'created' => $tanggal
                        );
                $this->db->insert('t_bpb_ampas',$data_bpb_ampas);

                #Create BPB Detail Ampas ke gudang ampas
                $data_bpb_detail_ampas = array(
                        'bpb_ampas_id' => $this->db->insert_id(),
                        'created' => $tgl_input,
                        'jenis_barang_id' => 3,
                        'uom' => 'KG',
                        'berat' => $this->input->post('ampas'),
                        'keterangan' => 'SISA PRODUKSI INGOT',
                        'created_by' => $user_id
                        );
                $this->db->insert('t_bpb_ampas_detail',$data_bpb_detail_ampas);
            }
        }
        $this->db->trans_complete();
        redirect('index.php/Ingot/hasil_produksi/');
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

            $data['content']= "ingot/edit_produksi";
            $this->load->model('Model_ingot');
            $data['header'] = $this->Model_ingot->show_header_pa($id)->row_array();  
            
            $data['skb_list'] = $this->Model_ingot->get_skb_list()->result();
            $data['jenis_barang_list'] = $this->Model_ingot->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot/hasil_produksi');
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
        
        $this->load->model('Model_ingot'); 
        $myDetail = $this->Model_ingot->load_detail_produksi($id)->result(); 
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
    
    function delete_detail_produksi(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('produksi_ampas_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save_detail_produksi(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $hasil_produksi = str_replace('.', '', $this->input->post('hasil_produksi'));
        $return_data = array();
        
        $this->db->trans_start();
        $this->db->insert('produksi_ampas_detail', array(
                    'produksi_ampas_id'=>$this->input->post('id'),
                    'rongsok_id'=>$this->input->post('rongsok_id'),
                    'hasil_produksi'=>$hasil_produksi,
                    'sisa'=>str_replace('.', '', $this->input->post('sisa')),
                    'line_remarks'=>$this->input->post('line_remarks')
        ));
        
        #Update Stok Ingot
        $this->load->model('Model_beli_rongsok');
        $get_stok = $this->Model_beli_rongsok->cek_stok($this->input->post('jenis_item'), 'INGOT')->row_array(); 
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
                    'jenis_item'=>'INGOT',
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
            'remarks'=>'Produksi ingot',
        ));
        
        if($this->db->trans_complete()){  
            $return_data['message_type']= "sukses";               
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item ingot! Silahkan coba kembali";
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
                'jenis_barang_id'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'skb_id'=>$this->input->post('skb_id'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('produksi_ampas', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data produksi ingot berhasil disimpan');
        redirect('index.php/Ingot/hasil_produksi');
    }

    function edit_hasil(){
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

            $data['content']= "ingot/edit_hasil";
            $this->load->model('Model_ingot');
            $data['header'] = $this->Model_ingot->show_hasil($id)->row_array();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot');
        }
    }

    function add_spb(){
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

            $data['content']= "ingot/add_spb";

            $this->load->model('Model_ingot');
            $data['myData'] = $this->Model_ingot->show_header_spb($id)->row_array();
            $this->load->model('Model_rongsok');
            $data['list_rongsok'] = $this->Model_rongsok->list_data()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot/spb_list');
        }
    }

    function add_spb_keluar(){
        $module_name = $this->uri->segment(1);
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "ingot/add_spb_keluar";

            $this->load->model('Model_rongsok');
            $data['list_rongsok'] = $this->Model_rongsok->list_data()->result();
            $this->load->view('layout', $data);
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

            $data['content']= "ingot/view_spb";

            $this->load->model('Model_ingot');
            $data['myData'] = $this->Model_ingot->show_header_spb($id)->row_array();           
            $data['myDetail'] = $this->Model_ingot->show_detail_spb($id)->result(); 
            $data['detailSPBFulfilment'] = $this->Model_ingot->show_detail_spb_fulfilment_approved($id)->result();
            $data['detailSPB'] = $this->Model_ingot->show_detail_spb_fulfilment($id)->result();
            $data['apolo'] = $this->Model_ingot->show_apolo()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot/spb_list');
        }
    }

    function edit_apolo(){
        $id    = $_GET['id'];
        $id_ap = $_GET['id_ap'];
        $id_pi = $_GET['id_pi'];
        if($id){
            $this->db->where('id', $id_pi);
            $this->db->update('produksi_ingot', array('id_apolo'=>$id_ap));
            redirect('index.php/Ingot/view_spb/'.$id);
        }
    }
    
    function save_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('spb', array(
                        'status'=> 3,
                        'modified'=> $tanggal,
                        'modified_by'=>$user_id
        ));

        #Create SPB fulfilment
        $details = $this->input->post('details');
        $spb_id = $this->input->post('id');
        foreach ($details as $v) {
            if($v['no_pallete']!=''){   
                $this->db->insert('spb_detail_fulfilment', array(
                                'ttr_id'=> $v['ttr_id'],
                                'dtr_detail_id'=> $v['dtr_id'],
                                'spb_id'=> $spb_id
                            ));
            }   
        }

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'SPB sudah di-save. Detail Pemenuhan SPB sudah disimpan');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }                 

       redirect('index.php/Ingot/spb_list');
    }

    function update_tanggal_keluar(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('update_tanggal_keluar')));
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        $details = $this->input->post('myDetails');
        // print_r($details);die();
        foreach ($details as $v) {
            if(isset($v['check']) && $v['check']==1){
                $this->db->where('id', $v['id_detail']);
                $this->db->update('dtr_detail', array(
                    'tanggal_keluar'=> $tgl_input
                ));
            }   
        }

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'SPB sudah di-save. Detail Pemenuhan SPB sudah disimpan');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }                 

       redirect('index.php/GudangRongsok/view_spb/'.$spb_id);
    }

    function delPemenuhan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $id = $this->uri->segment(3);
        $spb_id = $this->uri->segment(4);

        $this->db->trans_start();

            $this->db->where('id', $id);
            $this->db->delete('spb_detail_fulfilment');

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Detail Pemenuhan SPB sudah dihapus');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/Ingot/view_spb/'.$spb_id);
    }

    function reject_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');

        $this->db->trans_start();

            $this->load->model('Model_ingot');
            $details = $this->Model_ingot->approve_loop($spb_id)->result();
            // echo '<pre>';print_r($details);echo'</pre>';
            // die();
            foreach ($details as $v) {
               $this->db->where('dtr_detail_id', $v->id);
               $this->db->delete('spb_detail_fulfilment');
            }

            $check = $this->Model_ingot->check_spb_reject($spb_id)->row_array();
            if($check['count'] > 0){
                $status = 4;
            }else{
                $status = 0;
            }
            $this->db->update('spb',['status'=>$status],['id'=>$spb_id]);

        if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail Pemenuhan SPB sudah disimpan');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/Ingot/view_spb/'.$spb_id);
    }

    function close_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('header_id');

        $this->db->trans_start();

        // echo $this->input->post('close_remarks');
        // die();
            $this->db->where('id',$spb_id);
            $this->db->update('spb', array(
                'reject_remarks'=>$this->input->post('close_remarks'),
                'status'=>1,
            ));

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail Pemenuhan SPB sudah disimpan');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/GudangRongsok/view_spb/'.$spb_id);
    }

    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal_keluar = date('Y-m-d', strtotime($this->input->post('tanggal_keluar')));
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();
        $this->load->model('Model_ingot');
        $data['check'] = $this->Model_ingot->check_spb($spb_id)->row_array();
        if(((int)$data['check']['tot_so']) >= ((int)$data['check']['tot_spb'])){
            $status = 1;
        }else{
            $status = 4;
        }
        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('spb', array(
                        'status'=> $status,
                        'approved'=> $tanggal,
                        'approved_by'=>$user_id
        ));

        #loop SPB fulfilment
        $details = $this->Model_ingot->approve_loop($spb_id)->result();
        foreach ($details as $v) {
        	#update dtr_detail flag_taken
        	$this->db->where('id',$v->dtr_detail_id);
            $this->db->where('flag_taken', 0);
        	$this->db->update('dtr_detail',array(
        					'flag_taken' => 1,
                            'tanggal_keluar' => $tanggal_keluar
        					));
        }
            
            /*    
                #Update Stok Rongsok
                $get_stok = $this->Model_beli_rongsok->cek_stok($row->nama_item, 'RONGSOK')->row_array(); 
                if($get_stok){
                    $stok_id  = $get_stok['id'];            
                    $this->db->where('id', $stok_id);
                    $this->db->update('t_inventory', array(
                            'stok_bruto'=>($get_stok['stok_bruto']- $row->qty), 
                            'stok_netto'=>($get_stok['stok_netto']- $row->qty), 
                            'modified'=>$tanggal, 
                            'modified_by'=>$user_id));
                }else{
                    $this->db->insert('t_inventory', array(
                            'nama_produk'=>$row->nama_item,
                            'jenis_item'=>'RONGSOK',
                            'stok_bruto'=>$row->qty, 
                            'stok_netto'=>$row->qty, 
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
                    'bruto_masuk'=>$row->qty,
                    'netto_masuk'=>$row->qty,
                    'remarks'=>'SKB produksi ingot',
                ));
            */
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail Pemenuhan SPB sudah disimpan');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/Ingot/spb_list');
    }
    
    function delSPBSudahDipenuhi(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $id = $this->uri->segment(3);
        $spb_id = $this->uri->segment(4);

        $this->db->trans_start();

        $this->load->model('Model_ingot');
        $get = $this->Model_ingot->get_spdf($id)->row_array();

            $this->db->where('id',$get['dtr_detail_id']);
            $this->db->update('dtr_detail',array(
                            'flag_taken' => 0,
                            'tanggal_keluar' => null
                            ));

            $this->db->where('id', $id);
            $this->db->delete('spb_detail_fulfilment');

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Detail Pemenuhan SPB sudah dihapus');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/Ingot/view_spb/'.$spb_id);
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
        redirect('index.php/GudangRongsok/spb_list');
    }
    
    function get_detail_produksi(){
    	$this->load->model('Model_ingot');
    	$id = $this->input->post('id');
    	$return_data = $this->Model_ingot->get_detail_produksi($id)->row_array();
    	header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function get_rongsok(){
    	$this->load->model('Model_ingot');
    	$no_pallete = $this->input->post('no_pallete');
    	$result = $this->Model_ingot->get_dtr_detail_by_no_pallete($no_pallete)->row_array();
    	header('Content-Type: application/json');
        echo json_encode($result);
    }

    /*function edit_spb(){
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

            $data['content']= "ingot/edit_spb";
            $this->load->model('Model_ingot');
            $data['myData'] = $this->Model_ingot->show_header_spb($id)->row_array();           
            $data['myDetail'] = $this->Model_ingot->show_detail_spb($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot/spb_list');
        }
    }*/
    
}