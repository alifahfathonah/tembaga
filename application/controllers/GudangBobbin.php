<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GudangBobbin extends CI_Controller{   
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

        $data['content']= "gudang_bobbin/index";
        $this->load->model('Model_bobbin');

        $data['size_list'] = $this->Model_bobbin->get_size_list()->result();
        $data['owner_list'] = $this->Model_bobbin->get_owner_list()->result();
        $data['list_data'] = $this->Model_bobbin->list_data()->result();

        $this->load->view('layout', $data);
    }
    
    function cek_code(){
        $code = $this->input->post('data');
        $this->load->model('Model_bobbin');
        $cek_data = $this->Model_bobbin->cek_data($code)->row_array();
        $return_data = ($cek_data)? "ADA": "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }
    
    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tgl_input  = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal = date('Y-m-d H:i:s');

        $this->load->model('Model_bobbin');
        $this->load->model('Model_m_numberings');
        
        $format_penomoran = $this->Model_bobbin->get_format_penomoran($this->input->post('tipe'));
        if ($format_penomoran['penomoran']){
            $str_code = $format_penomoran['bobbin_size']; 
        } else {
            //BB merupakan kode penomoran bobbin
            $str_code = 'BB-FG';
        }

        $code_bobbin = $this->Model_m_numberings->getNumbering($format_penomoran['bobbin_size'], $tgl_input);
        if($code_bobbin == null){ 
            //jika penomoran belum di setup, akan insert
            $data_numbering = array(
                            'prefix'=>$str_code,
                            'date_info'=>0,
                            'padding' => 4,
                            'prefix_separator' => '.',
                            'date_separator' => '.'
                            );
            $this->db->insert('m_numberings',$data_numbering);
            $code_bobbin = $this->Model_m_numberings->getNumbering($str_code, $tgl_input);
        }

        $code_bobbin = str_replace('.', '', $code_bobbin);
        $code_bobbin = str_replace('BB-FG', $format_penomoran['bobbin_size'], $code_bobbin);

        $data = array(
                    'tanggal' => $tgl_input,
                    'nomor_bobbin' => $code_bobbin,
                    'm_jenis_packing_id' => $this->input->post('id_packing'),
                    'm_bobbin_size_id'=> $this->input->post('tipe'),
                    'owner_id'=> $this->input->post('owner'),
                    'berat'=> $this->input->post('berat'),
                    'status' => 0, //ready
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id,
                );
       
        $this->db->insert('m_bobbin', $data); 
        $this->session->set_flashdata('flash_msg', 'Data bobbin berhasil disimpan');
        redirect('index.php/GudangBobbin');       
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('m_bobbin');            
        }
        $this->session->set_flashdata('flash_msg', 'Data bobbin berhasil dihapus');
        redirect('index.php/GudangBobbin');
    }
    
    function edit(){
        $id = $this->input->post('id');
        $this->load->model('Model_bobbin');
        $data = $this->Model_bobbin->show_data($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function get_packing(){
        $id = $this->input->post('id');
        $this->load->model('Model_bobbin');
        $data = $this->Model_bobbin->get_spb($id)->result();
        $arr_cost[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_cost[$row->id] = $row->nama_cost;
        } 
        print form_dropdown('cost_id', $arr_cost);
    }

    function update(){
        $user_id  = $this->session->userdata('user_id');
        $id = $this->input->post('id');
        $tanggal = date('Y-m-d H:i:s');

        $this->load->model('Model_bobbin');
        $this->load->model('Model_m_numberings');
        
        $prev_value = $this->Model_bobbin->show_data($id)->row_array();
        if($prev_value['m_bobbin_size_id'] == $this->input->post('tipe')){
            $code_bobbin = $prev_value['nomor_bobbin'];
        } else {
            $format_penomoran = $this->Model_bobbin->get_format_penomoran($this->input->post('tipe'));
            if ($format_penomoran['penomoran']){
                $str_code = $format_penomoran['bobbin_size']; 
            } else {
                //BB merupakan kode penomoran bobbin
                $str_code = 'BB-FG';
            }

            $code_bobbin = $this->Model_m_numberings->getNumbering($format_penomoran['bobbin_size'], $tgl_input);
            if($code_bobbin == null){ 
                //jika penomoran belum di setup, akan insert
                $data_numbering = array(
                                'prefix'=>$str_code,
                                'date_info'=>0,
                                'padding' => 4,
                                'prefix_separator' => '.',
                                'date_separator' => '.'
                                );
                $this->db->insert('m_numberings',$data_numbering);
                $code_bobbin = $this->Model_m_numberings->getNumbering($str_code, $tgl_input);
            }

            $code_bobbin = str_replace('.', '', $code_bobbin);
            $code_bobbin = str_replace('BB-FG', $format_penomoran['bobbin_size'], $code_bobbin);
        }
        
        $data = array(
                    'nomor_bobbin' => $code_bobbin,
                    'm_bobbin_size_id'=> $this->input->post('tipe'),
                    'm_jenis_packing_id' => $this->input->post('id_packing'),
                    'owner_id'=> $this->input->post('owner'),
                    'berat'=> $this->input->post('berat'),
                    'modified_at'=> $tanggal,
                    'modified_by'=> $user_id,
                );
       
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('m_bobbin', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data bobbin berhasil diperbaharui');
        redirect('index.php/GudangBobbin');
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
        $data['judul']     = "Gudang bobbin Register";
        $data['content']   = "gudang_bobbin/add";
        
        
        $this->load->view('layout', $data);  
    }
   

    function bobbin_request(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Bobbin Request";
        $data['content']   = "gudang_bobbin/bobbin_request";
        
        $this->load->model('Model_bobbin');
        $data['list_peminjam'] = $this->Model_bobbin->list_peminjam()->result();
        $data['list_supplier'] = $this->Model_bobbin->list_supplier()->result();
        $data['list_spb'] = $this->Model_bobbin->list_spb()->result();
        
        $this->load->view('layout', $data);  
    }

    function get_spb(){
        $spb_id = $this->input->post('id');
        $this->load->model('Model_beli_bobbin');
        $wip = $this->Model_beli_wip->get_spb($id)->result();
        
        header('Content-Type: application/json');
        echo json_encode($wip);
    }

    function save_surat_peminjaman(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->where('id', $this->input->post('spb_id'));
        $this->db->update('m_bobbin_spb', array('keperluan' => 2));

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('BB-BR', $tgl_input);
        $data = array(
                'no_surat_peminjaman' => $code,
                'supplier_id' => $this->input->post('supplier_id'),
                'status' => 0,
                'created_by' => $user_id,
                'created_at' => $tanggal
                );


        $this->db->insert('m_bobbin_peminjaman', $data);
        $peminjaman_id = $this->db->insert_id();

        $loop = $this->db->query("
            select msbd.*, b.nomor_bobbin
            from m_bobbin_spb_detail msbd
            left join m_bobbin b on (msbd.id_bobbin = b.id)
            where id_spb_bobbin = ".$this->input->post('spb_id'))->result();
        foreach ($loop as $row) {
            $detail = array(
                'id_peminjaman' => $peminjaman_id,
                'id_penerimaan' => 0,
                'nomor_bobbin' => $row->nomor_bobbin
            );

            $this->db->insert('m_bobbin_peminjaman_detail', $detail);

            $updatemb = array(
                'status' => 2
            );

            // $this->db->query("update m_bobbin set status = 2 where nomor_bobbin = ".$row->nomor_bobbin);
            $this->db->where('nomor_bobbin', $row->nomor_bobbin);
            $this->db->update('m_bobbin', $updatemb);
        }

        redirect('index.php/GudangBobbin/bobbin_request');
    }

    function edit_surat_peminjaman(){
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

            $data['content']= "gudang_bobbin/edit_surat_peminjaman";
            $this->load->model('Model_bobbin');
            $data['header'] = $this->Model_bobbin->show_header_peminjam($id)->row_array();
            $data['details'] =   $this->Model_bobbin->show_detail_peminjam($id)->result();
            $data['bobbin_booked'] = $this->Model_bobbin->get_bobbin_booked()->result();
    
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangBobbin/bobbin_terima');
        }
    }

    function bobbin_terima(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Bobbin Terima Barang";
        $data['content']   = "gudang_bobbin/bobbin_terima";
        
        $this->load->model('Model_bobbin');
        $data['list_bobbin'] = $this->Model_bobbin->list_bobbin()->result();
        
        
        $this->load->view('layout', $data);  
    }

    function add_penerimaan_bobbin(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "gudang_bobbin/add_penerimaan_bobbin";
        $this->load->model('Model_bobbin');
        $data['customer_list'] = $this->Model_bobbin->customer_list()->result();
        //$data['jenis_packing'] = $this->db->get('m_jenis_packing')->result();
        $this->load->view('layout', $data);
    }

    function save_penerimaan_bobbin(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('BB-RC', $tgl_input);
        
        #Insert spb bobbin
        if($code){        
            $data = array(
            'no_penerimaan' => $code,
            'id_peminjaman' => $this->input->post('surat_peminjaman_id'),
            'surat_jalan' => $this->input->post('surat_jalan'),
            'remarks' => $this->input->post('remarks'),
            'created_by' => $user_id,
            'created_at' => $tanggal
            );

            if($this->db->insert('m_bobbin_penerimaan', $data)){
                redirect('index.php/GudangBobbin/edit_penerimaan_bobbin/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data Penerimaan Bobbin gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangBobbin/add_penerimaan_bobbin');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data Penomoran Bobbin gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangBobbin/bobbin_terima');
        }
        #Insert spb bobbin detail
        // $insert_id = $this->db->insert_id();
        // $data_spb_bobbin_detail = array(
        //     'id_spb_bobbin' => $insert_id,
        //     'id_bobbin' => 
        // );
    }

    function edit_penerimaan_bobbin(){
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

            $data['content']= "gudang_bobbin/edit_penerimaan_bobbin";
            $this->load->model('Model_bobbin');
            $data['header'] = $this->Model_bobbin->show_header_penerimaan($id)->row_array();
            $data['details'] =   $this->Model_bobbin->show_detail_peminjam($id)->result();
    
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangBobbin/bobbin_terima');
        }
    }

    function load_detail_penerimaan(){
        $id = $this->input->post('id');
        $id_peminjaman = $this->input->post('id_peminjaman');
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_bobbin');
        $list_barang = $this->Model_bobbin->load_list_bobbin_penerimaan($id_peminjaman)->result();
        
        $myDetail = $this->Model_bobbin->load_bobbin_penerimaan_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nomor_bobbin.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td>';
        $tabel .= '<select id="nomor_bobbin" name="nomor_bobbin" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px">';
            $tabel .= '<option value=""></option>';
            foreach ($list_barang as $value){
                $tabel .= "<option value='".$value->nomor_bobbin."'>".$value->nomor_bobbin."</option>";
            }
        $tabel .= '</select>';
        $tabel .= '</td>';      
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel);    
    }

    function save_penerimaan_bobbin_detail(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        if($this->db->insert('m_bobbin_penerimaan_detail', array(
            'id_bobbin_penerimaan'=>$this->input->post('id_bobbin_penerimaan'),
            'nomor_bobbin'=>$this->input->post('nomor_bobbin')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan bobbin! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function delete_penerimaan_bobbin_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('m_bobbin_penerimaan_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_penerimaan_bobbin(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'remarks'=>$this->input->post('remarks'),
                'received_at'=> $tanggal,
                'received_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('m_bobbin_penerimaan', $data);

        $id = $this->input->post('id');
        $key = $this->db->query("select *from m_bobbin_penerimaan_detail where id_bobbin_penerimaan = ". $id)->result();
        foreach ($key as $row) {
            $this->db->where('nomor_bobbin', $row->nomor_bobbin);
            $this->db->update('m_bobbin', array(
                'status' => 0,
                'borrowed_by' => 0
            ));

            $this->db->where('nomor_bobbin', $row->nomor_bobbin);
            $this->db->update('m_bobbin_peminjaman_detail', array(
                'id_penerimaan' => $this->input->post('id')
            ));
        }
        $id = $this->input->post('id_peminjaman');
        $this->load->model('Model_bobbin');
        $cek = $this->Model_bobbin->check_sisa_bobbin($id)->row_array();
        if(empty($cek['id'])){
            $this->db->where('id', $id);
            $this->db->update('m_bobbin_peminjaman', array(
                'status' => 1
            ));
        }
        // $jumlah_pinjam = $this->db->query("select count(id) from m_bobbin_peminjaman_detail where id_peminjaman = ".$this->input->post('id_peminjaman'))->num_rows();
        // $jumlah_terima = $this->db->query("select count(id) from m_bobbin_penerimaan where id_peminjaman = ".$this->input->post('id_peminjaman'))->num_rows();
        // if($jumlah_pinjam == $jumlah_terima){
        //     $this->db->where('id', $this->input->post('id'));
        //     $this->db->update('m_bobbin_peminjaman', array(
        //         'status' => 1
        //     ));
        // }
        // echo "id".$this->input->post('id_peminjaman');
        // echo "pinjam".$jumlah_pinjam;
        // echo "terima".$jumlah_terima;
        
        $this->session->set_flashdata('flash_msg', 'Data Penerimaan Bobbin berhasil disimpan');
        redirect('index.php/GudangBobbin/bobbin_terima');
    }

    function view_penerimaan_bobbin($id){
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

            $data['content']= "gudang_bobbin/view_penerimaan_bobbin";
            $this->load->model('Model_bobbin');
            $data['header'] = $this->Model_bobbin->show_header_penerimaan($id)->row_array();
            $data['myDetail'] = $this->Model_bobbin->load_bobbin_penerimaan_detail($id)->result(); 
    
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangBobbin/bobbin_terima');
        }
    }

    function get_sj_list(){
        $id = $this->input->post('id');
        $this->load->model('Model_bobbin');
        $data = $this->Model_bobbin->get_sj_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_surat_peminjaman;
        } 
        print form_dropdown('surat_peminjaman_id', $arr_so);
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

        $data['content']= "gudang_bobbin/spb_list";
        $this->load->model('Model_bobbin');
        $data['list_data'] = $this->Model_bobbin->spb_list()->result();

        $this->load->view('layout', $data);
    }   

    function add_spb(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "gudang_bobbin/add_spb";
        $data['jenis_packing'] = $this->db->get('m_jenis_packing')->result();
        $this->load->view('layout', $data);
    }

    function save_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-BB', $tgl_input);
        
        #Insert spb bobbin
        if($code){        
            $data = array(
            'no_spb_bobbin' => $code,
            'jenis_packing' => $this->input->post('jenis_packing'),
            'pemohon' => $this->input->post('nama_pemohon'),
            'status' => 0,
            'keterangan' => $this->input->post('remarks'),
            'created_by' => $user_id,
            'created_at' => $tanggal
            );

            if($this->db->insert('m_bobbin_spb', $data)){
                redirect('index.php/GudangBobbin/edit_spb/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB Bobbin gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangBobbin/add_spb');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB Bobbin gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangBobbin/spb_list');
        }
        #Insert spb bobbin detail
        // $insert_id = $this->db->insert_id();
        // $data_spb_bobbin_detail = array(
        //     'id_spb_bobbin' => $insert_id,
        //     'id_bobbin' => 
        // );
    }

    function edit_spb(){
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

            $data['content']= "gudang_bobbin/edit_spb";
            $this->load->model('Model_bobbin');
            $data['header'] = $this->Model_bobbin->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_bobbin->show_detail_spb($id)->result();
    
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangBobbin/spb_list');
        }
    }

    function get_bobbin(){ 
        $this->load->model('Model_bobbin');
        $id = $this->input->post('id');
        $id_jenis = $this->input->post('id_jenis');
        $data = $this->Model_bobbin->bobbin_list($id_jenis, $id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->nomor_bobbin;
        } 
        print form_dropdown('id_bobbin', $arr_so);
    }

    function load_detail_edit_spb(){
        $id = $this->input->post('id');
        $id_jenis = $this->input->post('id_jenis');
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_bobbin');        
        $myDetail = $this->Model_bobbin->load_spb_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nomor_bobbin.'</td>';
            $tabel .= '<td>'.$row->berat.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_berat(){
        $id = $this->input->post('id');
        $this->load->model('Model_bobbin');
        $berat= $this->Model_bobbin->get_berat($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($berat);
    }

    function save_spb_bb_detail(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        if($this->db->insert('m_bobbin_spb_detail', array(
            'id_spb_bobbin'=>$this->input->post('id_spb_bobbin'),
            'id_bobbin'=>$this->input->post('id_bobbin')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan bobbin! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('m_bobbin_spb_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_spb(){
        // $user_id  = $this->session->userdata('user_id');
        // $tanggal  = date('Y-m-d h:m:s');        
        // $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'keterangan'=>$this->input->post('remarks'),
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('m_bobbin_spb', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data SPB BB berhasil disimpan');
        redirect('index.php/GudangBobbin/spb_list');
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

            $data['content']= "gudang_bobbin/view_spb";

            $this->load->model('Model_bobbin');
            $data['list_barang'] = $this->Model_bobbin->jenis_barang_list_by_spb($id)->result();
            $data['myData'] = $this->Model_bobbin->show_header_spb($id)->row_array();           
            $data['myDetail'] = $this->Model_bobbin->show_detail_spb($id)->result(); 
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
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
        $this->db->update('m_bobbin_spb', array(
                        'status'=> 1,
                        'keterangan' => $this->input->post('remarks'),
                        'approved_at'=> $tanggal,
                        'approved_by'=>$user_id
        ));

        $key = $this->db->query("select *from m_bobbin_spb_detail where id_spb_bobbin = ".$spb_id)->result();
        foreach ($key as $row) {
            $id_bobbin = $row->id_bobbin;
            $this->db->where('id', $id_bobbin);
            $this->db->update('m_bobbin', array(
                'status' => 3,
                'modified_at' => $tanggal,
                'modified_by' => $user_id
            ));
        }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangBobbin/spb_list');
    }

    function reject_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $id_spb = $this->input->post('header_id');
        
        #Update status m_bobbin_spb
        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $id_spb);
        $this->db->update('m_bobbin_spb', $data);

        // #Update NULL di t_gudang_fg
        // $this->db->where('t_spb_fg_id', $id_spb);
        // $this->db->update('t_gudang_fg', array(
        //                 't_spb_fg_id'=> NULL,
        //                 't_spb_fg_detail_id'=> NULL,
        //                 'nomor_SPB'=> NULL,
        //                 'keterangan'=> NULL,
        //                 'modified_date'=> $tanggal,
        //                 'modified_by'=>$user_id
        // ));
        
        $this->session->set_flashdata('flash_msg', 'Data SPB BB berhasil direject');
        redirect('index.php/GudangBobbin/spb_list');
    }

    function print_bobbin_request(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_bobbin');
            $data['header']  = $this->Model_bobbin->show_header_peminjam($id)->row_array();
            $data['details'] = $this->Model_bobbin->show_detail_peminjam($id)->result();

            $this->load->view('gudang_bobbin/print_bobbin_request', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_spb_bobbin(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_bobbin');
            $data['header']  = $this->Model_bobbin->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_bobbin->jenis_barang_list_by_spb($id)->result();

            $this->load->view('gudang_bobbin/print_spb_bobbin', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_bobbin_terima(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_bobbin');
            $data['header']  = $this->Model_bobbin->show_header_penerimaan($id)->row_array();
            $data['details'] = $this->Model_bobbin->load_bobbin_penerimaan_detail($id)->result();

            $this->load->view('gudang_bobbin/print_bobbin_terima', $data);
        }else{
            redirect('index.php'); 
        }
    }
}