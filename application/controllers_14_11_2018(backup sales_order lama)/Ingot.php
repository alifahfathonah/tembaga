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

        $data['content']= "Ingot/index";
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
        
        $this->load->model('Model_tolling_titipan');
        $data['jenis_barang_list'] = $this->Model_tolling_titipan->jenis_barang_list()->result();
        $this->load->view('layout', $data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PRD', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_produksi'=> $code,
                'tanggal'=> $tgl_input,
                'jenis_barang_id'=>$this->input->post('jenis_barang'),
                'remarks'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('produksi_ingot', $data)){
                redirect('index.php/Ingot/edit/'.$this->db->insert_id());  
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
            
            $this->load->model('Model_tolling_titipan');
            $data['jenis_barang_list'] = $this->Model_tolling_titipan->jenis_barang_list()->result();
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
            $data['details'] = $this->Model_ingot->show_detail_pi($id)->result(); 
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot');
        }
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
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('spb', $data);
            $dtr_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if(isset($row['check']) && $row['check']==1){
                    $this->db->insert('spb_detail', array(
                        'spb_id'=>$dtr_id,
                        'produksi_ingot_detail_id'=>$row['produksi_ingot_detail_id'],
                        'rongsok_id'=>$row['rongsok_id'],
                        'qty' => $row['qty'],
                        'line_remarks'=>$row['line_remarks']
                    ));
                    
                    $this->db->where('id', $row['produksi_ingot_detail_id']);
                    $this->db->update('produksi_ingot_detail', array('flag_spb'=>1));
                }
            }
            
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
    
    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_ingot');
            $data['header']  = $this->Model_ingot->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_ingot->show_detail_spb($id)->result();

            $this->load->view('print_spb', $data);
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
        $data['no_produksi_list'] = $this->Model_ingot->get_no_produksi_list()->result();

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

        $this->db->trans_start();

        $data = array(
                'tanggal'=> $tgl_input,
                'mulai'=>$this->input->post('mulai'),
                'selesai'=>$this->input->post('selesai'),
                'total_rongsok'=>$this->input->post('total_rongsok'),
                'kayu'=>$this->input->post('kayu'),
                'gas'=> $this->input->post('gas'),
                'no_bpb_rongsok'=> $this->input->post('no_bpb_rongsok'),
                'no_masak'=> $this->input->post('no_masak'),
                'ingot'=> $this->input->post('ingot'),
                'berat_ingot'=> $this->input->post('berat_ingot'),
                'bs'=> $this->input->post('bs'),
                'susut'=> $this->input->post('susut'),
                'ampas'=> $this->input->post('ampas'),
                'created_by'=> $user_id,
            );

        #insert data hasil masak
        $this->db->insert('t_hasil_masak', $data);

        $id_masak = $this->db->insert_id();
        
        #update status produksi
        $this->db->where('id',$this->input->post('no_masak'));
        $this->db->update('produksi_ingot',array(
                        'flag_result'=>1));

        #Catat hasil WIP
        $data_wip = array(
                'tanggal'=> $tgl_input,
                'jenis_barang_id'=>2,
                'jenis_masak' => 'INGOT',
                'uom'=> 'BATANG',
                'hasil_masak_id'=> $id_masak,
                'qty'=> $this->input->post('ingot'),
                'berat'=> $this->input->post('berat_ingot'),
                'created_by'=> $user_id,
            );

        $this->db->insert('t_hasil_wip', $data_wip);
        $id_hasil_wip = $this->db->insert_id();

        /* 
        Hasil masak di distribusikan ke 3 gudang, masing-masing memiliki BPB dan BPB detail.
        3 gudang diantaranya adalah: gudang rongsok (BS), gudang ampas, gudang wip
        */ 

        #Create BPB ke gudang WIP
        $this->load->model('Model_m_numberings');
        $code_bpb_wip = $this->Model_m_numberings->getNumbering('BPB-WIP', $tgl_input);    
        $data_bpb = array(
                'no_bpb' => $code_bpb_wip,
                'status' => 0,
                'hasil_wip_id'=> $id_hasil_wip,
                'created_by' => $user_id,
                'created' => $tgl_input
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
        $code_dtr_wip = $this->Model_m_numberings->getNumbering('DTR', $tgl_input);
        $data_dtr_bs = array(
                'no_dtr'=> $code_dtr_wip,
                'tanggal' => $tgl_input,
                'status' =>0,
                'jenis_barang' => 'RONGSOK',
                'remarks'=> 'BS SISA PRODUKSI INGOT',
                'created_by' => $user_id
                );
        $this->db->insert('dtr',$data_dtr_bs);
        $dtr_id = $this->db->insert_id();

        #Create DTR Detail BS ke gudang rongsok
        $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
        $data_dtr_detail_bs = array(
                'dtr_id' => $dtr_id,
                'rongsok_id' => 7,
                'netto'=> $this->input->post('bs'),
                'line_remarks' => 'SISA PRODUKSI INGOT',
                'no_pallete' => date("dmyHis").$rand,
                'flag_taken' => 0
                );
        $this->db->insert('dtr_detail',$data_dtr_detail_bs);

        #Create BPB Ampas ke gudang ampas
        $code_bpb_ampas = $this->Model_m_numberings->getNumbering('BPB-AMP', $tgl_input);    
        $data_bpb_ampas = array(
                'no_bpb' => $code_bpb_ampas,
                'status' => 0,
                'hasil_wip_id'=> $id_hasil_wip,
                'created_by' => $user_id,
                'created' => $tgl_input
                );
        $this->db->insert('t_bpb_ampas',$data_bpb_ampas);

        #Create BPB Detail Ampas ke gudang ampas
        $data_bpb_detail_ampas = array(
                'bpb_ampas_id' => $this->db->insert_id(),
                'created' => $tgl_input,
                'jenis_barang_id' => 3,
                'uom' => 'KG',
                'berat' => $this->input->post('bs'),
                'keterangan' => 'SISA PRODUKSI INGOT',
                'created_by' => $user_id
                );
        $this->db->insert('t_bpb_ampas_detail',$data_bpb_detail_ampas);

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
            $data['detailSPB'] = $this->Model_ingot->show_detail_spb_fulfilment($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/Ingot/spb_list');
        }
    }
    
    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();
        
        
        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('spb', array(
        				'status'=> 1,
                        'approved'=> $tanggal,
                        'approved_by'=>$user_id
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
        	

        	#update dtr_detail flag_taken
        	$this->db->where('id',$v['dtr_id']);
        	$this->db->update('dtr_detail',array(
        					'flag_taken' => 1
        					));

        	}	
        }
            
            $this->load->model('Model_ingot');
            $this->load->model('Model_beli_rongsok');
            
           
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
        redirect('index.php/Ingot/spb_list');
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