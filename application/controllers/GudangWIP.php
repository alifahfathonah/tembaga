<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GudangWIP extends CI_Controller{   
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
        $data['judul']     = "Gudang WIP";
        $data['content']   = "gudangwip/index";
        
       $this->load->model('Model_gudang_wip');
       $data['gudang_wip'] = $this->Model_gudang_wip->gudang_wip_list()->result();
 		
        $this->load->view('layout', $data);  
    }

    function produksi_wip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang WIP";
        $data['content']   = "gudangwip/hasil_produksi";
        
       $this->load->model('Model_gudang_wip');
       $data['gudang_wip'] = $this->Model_gudang_wip->gudang_wip_produksi_list()->result();
        
        $this->load->view('layout', $data);  
    }

    function proses_wip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Proses Barang WIP";
        $data['content']   = "gudangwip/proses_wip";
        
       $this->load->model('Model_gudang_wip');
       $pilihan_jenis_masak = array(
                        'ROLLING' => 'ROLLING',
                        'BAKAR ULANG' => 'BAKAR ULANG',
                        'CUCI' => 'CUCI'
                        );
       $data['pil_masak'] = $pilihan_jenis_masak;
       $data['spb_ingot'] = $this->Model_gudang_wip->spb_ingot()->result();
       $data['stok_keras'] = $this->Model_gudang_wip->stok_keras()->row_array();
       $data['spb_kawat_hitam'] = $this->Model_gudang_wip->spb_kawat_hitam()->result();
        
       $this->load->view('layout', $data);  
    }

    function get_spb(){
        $id = $this->input->post('id');
        $jb = $this->input->post('jb');
        $this->load->model('Model_gudang_wip');
        $barang= $this->Model_gudang_wip->get_spb($id,$jb)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function save_proses_wip(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PRD-WIP', $tgl_input);

        if($code){
            if($this->input->post('id_spb')){
                $this->db->where('id', $this->input->post('id_spb'));
                $this->db->update('t_spb_wip', array(
                    'flag_produksi'=>1
                    ));
            }
            #insert hasil WIP
            $data = array(
                    'no_produksi_wip' => $code,
                    'jenis_masak' => $this->input->post('jenis_masak'),
                    'tanggal'=> $tgl_input,
                    'jenis_barang_id'=> $this->input->post('id_jenis_barang'),
                    't_spb_wip_id'=> $this->input->post('id_spb'),
                    'qty'=>(int)($this->input->post('qty_kh')!= null) ? $this->input->post('qty_kh'): $this->input->post('qty_km'),
                    'uom' => 'ROLL',
                    'berat' => (int)($this->input->post('berat_kh')!=null) ? $this->input->post('berat_kh') : $this->input->post('berat_km'),
                    'susut' => (int)$this->input->post('susut'),
                    'keras' => (int)$this->input->post('berat_keras'),
                    'qty_keras' => (int)$this->input->post('jml_keras'),
                    'bs' => (int)$this->input->post('bs'),
                    'tali_rolling' => (int)$this->input->post('tali_rolling'),
                    'created_by'=> $user_id
                );
            $this->db->insert('t_hasil_wip', $data);

            #Insert t_bpb_wip
            $insert_id = $this->db->insert_id();
            $this->load->model('Model_m_numberings');
            $code = $this->Model_m_numberings->getNumbering('BPB-WIP', $tgl_input);
            $data_t_bpb_wip = array(
                'no_bpb' => $code,
                'status' => '0',
                'spb_wip_id' => 0,
                'keterangan' => $this->input->post('keterangan'),
                'hasil_wip_id' => $insert_id,
                'created_by' => $user_id,
                'created' => $tanggal
            );
            $this->db->insert('t_bpb_wip', $data_t_bpb_wip);

            #Insert bpb_wip_detail
            $insert_id_bpb_wip = $this->db->insert_id();
            if ($this->input->post('jenis_masak') == 'CUCI') {
                $data_bpb_wip_detail = array(
                'bpb_wip_id' => $insert_id_bpb_wip,
                'created' => $tgl_input,
                'jenis_barang_id' => '5',
                'spb_wip_detail_id' => 0,
                'qty' => $this->input->post('qty_km'),
                'uom' => 'ROLL',
                'berat' => $this->input->post('berat_km'),
                'keterangan' => $this->input->post('keterangan'),
                'created_by' => $user_id
                );
                $this->db->insert('t_bpb_wip_detail', $data_bpb_wip_detail);
            } else {
                $data_bpb_wip_detail = array(
                'bpb_wip_id' => $insert_id_bpb_wip,
                'created' => $tgl_input,
                'jenis_barang_id' => '6',
                'spb_wip_detail_id' => 0,
                'qty' => $this->input->post('qty_kh'),
                'uom' => 'ROLL',
                'berat' => $this->input->post('berat_kh'),
                'keterangan' => $this->input->post('keterangan'),
                'created_by' => $user_id
                );
                $this->db->insert('t_bpb_wip_detail', $data_bpb_wip_detail);
                if($this->input->post('jenis_masak') == 'BAKAR ULANG'){
                    $this->db->insert('t_gudang_keras', array(
                        'jenis_trx'=>1,
                        't_hasil_wip_id'=>$insert_id,
                        'jenis_barang_id'=>15,
                        'qty'=>$this->input->post('jml_ingot_keras'),
                        'berat'=>$this->input->post('jml_berat_keras'),
                        'created_at'=>$tanggal,
                        'created_by'=>$user_id
                    ));
                }
            }

        if($this->input->post('jml_keras') && $this->input->post('berat_keras') != 0){
            $data = array(
                'jenis_trx'=>0,
                't_hasil_wip_id'=>$insert_id,
                'jenis_barang_id'=>15,
                'qty'=>$this->input->post('jml_keras'),
                'berat'=> $this->input->post('berat_keras'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );
            #insert data hasil masak
            $this->db->insert('t_gudang_keras', $data);
        }

        if($this->input->post('bs') != 0){
            if($this->input->post('jenis_masak') == 'ROLLING'){
                #insert bs ke gudang bs
                $data_bs = array(
                    'id_produksi' => $insert_id,
                    'jenis_barang_id' => 20,
                    'jenis_produksi' => 'WIP',
                    'berat' => $this->input->post('bs'),
                    'tanggal' => $tgl_input,
                    'status' => 0,
                    'created_by' => $user_id,
                    'created_at' => $tanggal
                );
                $this->db->insert('t_gudang_bs', $data_bs);
            }else if($this->input->post('jenis_masak') == 'BAKAR ULANG'){
                #insert bs ke gudang bs
                $data_bs = array(
                    'id_produksi' => $insert_id,
                    'jenis_barang_id' => 22,
                    'jenis_produksi' => 'WIP',
                    'berat' => $this->input->post('bs'),
                    'tanggal' => $tgl_input,
                    'status' => 0,
                    'created_by' => $user_id,
                    'created_at' => $tanggal
                );
                $this->db->insert('t_gudang_bs', $data_bs);
            }else if($this->input->post('jenis_masak') == 'CUCI'){
                #insert bs ke gudang bs
                $data_bs = array(
                    'id_produksi' => $insert_id,
                    'jenis_barang_id' => 51,
                    'jenis_produksi' => 'WIP',
                    'berat' => $this->input->post('bs'),
                    'tanggal' => $tgl_input,
                    'status' => 0,
                    'created_by' => $user_id,
                    'created_at' => $tanggal
                );
                $this->db->insert('t_gudang_bs', $data_bs);
            }
        }

        if($this->input->post('serbuk') != 0){
            if($this->input->post('jenis_masak') == 'CUCI'){
                #insert serbuk ke gudang bs
                $data_bs = array(
                    'id_produksi' => $insert_id,
                    'jenis_produksi' => 'WIP',
                    'berat' => $this->input->post('serbuk'),
                    'jenis_barang_id' => 53,
                    'tanggal' => $tgl_input,
                    'status' => 0,
                    'created_by' => $user_id,
                    'created_at' => $tanggal
                );
                $this->db->insert('t_gudang_bs', $data_bs);
            }else{
                #insert serbuk ke gudang bs
                $data_bs = array(
                    'id_produksi' => $insert_id,
                    'jenis_produksi' => 'WIP',
                    'berat' => $this->input->post('serbuk'),
                    'jenis_barang_id' => 30,
                    'tanggal' => $tgl_input,
                    'status' => 0,
                    'created_by' => $user_id,
                    'created_at' => $tanggal
                );
                $this->db->insert('t_gudang_bs', $data_bs);
            }
        }

            #Insert t_gudang_wip             
            // if($this->input->post('jenis_masak')=='CUCI'){
            //     $data_t_gudang_wip = array(
            //         'tanggal' => $tgl_input,
            //         'flag_taken' => 0,
            //         'jenis_trx' => null,
            //         't_hasil_wip_id' => $insert_id,
            //         'jenis_barang_id'  => '5',
            //         't_spb_wip_detail_id' => 0,
            //         't_bpb_wip_detail_id' => 0,
            //         'qty' => $this->input->post('qty_km'),
            //         'uom' => 'ROLL',
            //         'berat' => $this->input->post('berat_km'),
            //         'keterangan' => $this->input->post('keterangan'),
            //         'created_by' => $user_id,
            //         'created_on' => $tanggal
            //     );
            //     $this->db->insert('t_gudang_wip', $data_t_gudang_wip);
            // } else {
            //     $data_t_gudang_wip = array(
            //         'tanggal' => $tgl_input,
            //         'flag_taken' => 0,
            //         'jenis_trx' => null,
            //         't_hasil_wip_id' => $insert_id,
            //         'jenis_barang_id'  => '6',
            //         't_spb_wip_detail_id' => 0,
            //         't_bpb_wip_detail_id' => 0,
            //         'qty' => $this->input->post('qty_kh'),
            //         'uom' => 'ROLL',
            //         'berat' => $this->input->post('berat_kh'),
            //         'keterangan' => $this->input->post('keterangan'),
            //         'created_by' => $user_id,
            //         'created_on' => $tanggal
            //     );
            //     $this->db->insert('t_gudang_wip', $data_t_gudang_wip);
            // }
            
            // #Create DTR BS ke gudang rongsok
            // if(((int)$this->input->post('bs'))!=0){    
            //     $code_dtr_wip = $this->Model_m_numberings->getNumbering('DTR', $tgl_input);
            //     $data_dtr_bs = array(
            //             'no_dtr'=> $code_dtr_wip,
            //             'tanggal' => $tgl_input,
            //             'status' =>0,
            //             'jenis_barang' => 'RONGSOK',
            //             'remarks' => 'BS SISA PRODUKSI WIP',
            //             'created_by' => $user_id
            //             );
            //     $this->db->insert('dtr',$data_dtr_bs);
            //     $dtr_id = $this->db->insert_id();

            //     #Create DTR Detail BS ke gudang rongsok
            //     $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
            //     $data_dtr_detail_bs = array(
            //             'dtr_id' => $dtr_id,
            //             'rongsok_id' => 7,
            //             'netto'=> $this->input->post('bs'),
            //             'line_remarks' => 'SISA PRODUKSI WIP',
            //             'no_pallete' => date("dmyHis").$rand,
            //             'tanggal_masuk' => $tanggal,
            //             'flag_taken' => 0
            //             );
            //     $this->db->insert('dtr_detail',$data_dtr_detail_bs);
            // }

            if ($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg','Simpan Data Produksi WIP Berhasil.');
            } else{
                $this->session->set_flashdata('flash_msg','Simpan Data Produksi WIP Gagal, Silahkan Coba Lagi.');
                redirect('index.php/GudangWIP/proses_wip');    
            } 
        } else {
            $this->session->set_flashdata('flash_msg','Penyimpanan Data Produksi WIP Gagal, Penomoran Produksi WIP Belum di Set');
        }  
        redirect('index.php/GudangWIP/produksi_wip');  
    }

    function send(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Send Rongsok";
        $data['content']   = "Gudang/add";
        
        
        $this->load->view('layout', $data);  
    }

    function save_sendrongsok(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
             
                'tanggal'=> $tgl_input,
                'no_spb'=>$this->input->post('no_spb'),
                'keterangan'=>$this->input->post('keterangan'),
                'dibuat_oleh'=> $user_id,
            );

                $this->db->insert('t_spb_rongsok', $data);
               
           
                redirect('index.php/Gudang');  
           
    }

    function bpb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudangwip/bpb_list";
        $this->load->model('Model_gudang_wip');
        $data['list_data'] = $this->Model_gudang_wip->bpb_list()->result();

        $this->load->view('layout', $data);
    }

    function proses_bpb(){
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

            $data['content']= "gudangwip/proses_bpb";
            $this->load->model('Model_gudang_wip');
            $data['header']  = $this->Model_gudang_wip->show_header_bpb($id)->row_array(); 
            $data['details'] = $this->Model_gudang_wip->show_detail_bpb($id)->result();
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/bpb_list');
        }
    }
   
    function approve_bpb(){
        $bpb_id = $this->input->post('id_bpb_wip');
        $user_id  = $this->session->userdata('user_id');
        $hasil_wip_id = $this->input->post('id_hasil_wip');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        
        $this->db->trans_start();       
         
            #Update status BPB
            $this->db->where('id', $bpb_id);
            $this->db->update('t_bpb_wip', array(
                    'status'=>1,
                    'keterangan' => $this->input->post('remarks'),
                    'approved_date'=>$tanggal,
                    'approved_by'=>$user_id));
            
            #Create Inventori WIP
            $details = $this->input->post('details');
            foreach ($details as $v) {    
                $data = array(
                        'tanggal'=> $tgl_input,
                        'flag_taken'=>0,
                        't_spb_wip_detail_id' =>$v['id_spb_detail'],
                        't_hasil_wip_id'=> $hasil_wip_id,
                        'jenis_barang_id' => $v['id_jenis_barang'] ,
                        't_bpb_wip_detail_id'=>$v['id'],
                        'qty' =>$v['qty'],
                        'uom' =>$v['uom'],
                        'berat' =>$v['berat'],
                        'keterangan' =>null,
                        'created_by'=> $user_id
                );
                $this->db->insert('t_gudang_wip', $data);
            }
                
            
            
        if($this->db->trans_complete()){  
                
                $this->session->set_flashdata("message", "Inventori WIP sudah dibuat dan masuk gudang");
            }else{
                $this->session->set_flashdata("message","Pembuatan Inventori WIP gagal, silahkan coba lagi!");
            }                  
        
      redirect("index.php/GudangWIP/bpb_list");
    }

    function print_bpb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_gudang_wip');
            $data['header']  = $this->Model_gudang_wip->show_header_bpb($id)->row_array();
            $data['details'] = $this->Model_gudang_wip->show_detail_bpb($id)->result();

            $this->load->view('gudangwip/print_bpb', $data);
        }else{
            redirect('index.php'); 
        }
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

        $data['content']= "gudangwip/spb_list";
        $this->load->model('Model_gudang_wip');
        $data['list_data'] = $this->Model_gudang_wip->spb_list()->result();

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

        $data['content']= "gudangwip/add_spb";
        $this->load->model('Model_gudang_wip');
        
        $this->load->view('layout', $data);
    }

    function spb_kirim_rongsok($id){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        if($id!=null){
            $id_barang_gudang = $id;
            $this->load->model('Model_gudang_wip');
            $data['barang'] =  $this->Model_gudang_wip->show_barang_wip($id_barang_gudang)->row_array();
            $data['content']= "gudangwip/kirim_rongsok";
            $this->load->view('layout', $data);
            
        }else{
             redirect('index.php/GudangWIP/');
        }
    }


    function save_spb_kirim_rongsok(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-WIP', $tgl_input); 
        
        if($code){     
            $this->db->trans_start();
            #insert data spb wip
            $data = array(
                'no_spb_wip'=> $code,
                'tanggal'=> $tgl_input,
                'keterangan'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id
            );
            $this->db->insert('t_spb_wip', $data);
            $id_spb = $this->db->insert_id();

            #insert data spb wip detail
            $data_detail = array(
                't_spb_wip_id' => $id_spb,
                'qty'=>$this->input->post('qty'),
                'uom'=>$this->input->post('uom'),
                'berat' => $this->input->post('berat'),
                'tanggal' => $tgl_input,
                'jenis_barang_id'=>$this->input->post('id_jenis_barang'),
                'keterangan'=>$this->input->post('keterangan')
                );
            $this->db->insert('t_spb_wip_detail',$data_detail);

            #insert DTR ke gudang rongsok
            $code_DTR = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
               
            $data = array(
                        'no_dtr'=> $code_DTR,
                        'tanggal'=> $tgl_input,
                        'jenis_barang'=> 'RONGSOK',
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('dtr', $data);
            $dtr_id = $this->db->insert_id();
            
            #insert DTR_Detail ke gudang rongsok
            $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
            $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        //sisa WIP id 8
                        'rongsok_id' => 8,
                        'qty'=>$this->input->post('qty'),
                        'netto'=>$this->input->post('berat'),
                        'no_pallete'=>date("dmyHis").$rand,
                        'line_remarks'=>$this->input->post('keterangan')
                    ));
                   
               
            if($this->db->trans_complete()){
                redirect('index.php/GudangWIP/');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB WIP Kirim Rongsok gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangWIP/spb_kirim_rongsok'.$this->input->post('id_gudang'));  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB WIP Kirim Rongsok gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangWIP/');
        }
    }

    function save_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-WIP', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_spb_wip'=> $code,
                'flag_produksi'=> $this->input->post('flag_produksi'),
                'tanggal'=> $tgl_input,
                'keterangan'=>$this->input->post('remarks'),
                'created'=> $tanggal,
                'created_by'=> $user_id
            );

            if($this->db->insert('t_spb_wip', $data)){
                redirect('index.php/GudangWIP/edit_spb/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB WIP gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangWIP/add_spb');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB WIP gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangWIP/spb_list');
        }
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

            $data['content']= "gudangwip/edit_spb";
            $this->load->model('Model_gudang_wip');
            $data['header'] = $this->Model_gudang_wip->show_header_spb($id)->row_array();
            $jenis = $data['header']['flag_produksi'];
            if($jenis==0){
                $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_list()->result();
            }else if($jenis==2){
                $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_spb(2)->result();
            }else if($jenis==3){
                $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_spb(6)->result();
            }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangWIP/spb_list');
        }
    }

    function load_detail_spb(){
        $id = $this->input->post('id_spb');
        $tabel = "";
        $no    = 1;
        $arr_barang = array();
        $this->load->model('Model_gudang_wip');
        $list_barang = $this->Model_gudang_wip->jenis_barang_list()->result();
        
        $myDetail = $this->Model_gudang_wip->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->qty.' '.$row->uom.'</td>';
            $tabel .= '<td>'.$row->berat.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '</tr>';
            $arr_barang[] = $row->jenis_barang;            
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode(array('tabel'=>$tabel,'barang'=>implode($arr_barang, ',')));
    }

    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_gudang_wip');
        
        $myDetail = $this->Model_gudang_wip->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->qty.'</td>';
            $tabel .= '<td>'.$row->berat.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_uom_spb(){
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_wip');
        $barang= $this->Model_gudang_wip->show_data_barang_spb($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function get_uom_view_spb(){
        $id = $this->input->post('id');
        $spb_id = $this->input->post('spb_id');
        $this->load->model('Model_gudang_wip');
        $barang= $this->Model_gudang_wip->show_data_barang_view_spb($id,$spb_id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_wip');
        $barang= $this->Model_gudang_wip->show_data_barang($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function save_detail(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        if($this->db->insert('t_spb_wip_detail', array(
            't_spb_wip_id'=>$this->input->post('id'),
            'qty'=>$this->input->post('qty'),
            'uom'=>$this->input->post('uom'),
            'berat' => $this->input->post('berat'),
            'tanggal' => $tgl_input,
            'jenis_barang_id'=>$this->input->post('barang_id'),
            'keterangan'=>$this->input->post('line_remarks')
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('t_spb_wip_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'keterangan'=>$this->input->post('remarks'),
                'modified_date'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_spb_wip', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data SPB WIP berhasil disimpan');
        redirect('index.php/GudangWIP/spb_list');
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

            $data['content']= "gudangwip/view_spb";

            $this->load->model('Model_gudang_wip');
            $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_list_by_spb($id)->result();
            $data['myData'] = $this->Model_gudang_wip->show_header_spb($id)->row_array();           
            $data['myDetail'] = $this->Model_gudang_wip->show_detail_spb($id)->result(); 
            $data['detailSPB'] = $this->Model_gudang_wip->show_detail_spb_fulfilment($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangWIP/spb_list');
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
        $this->db->update('t_spb_wip', array(
                        'status'=> 1,
                        'keterangan' => $this->input->post('remarks'),
                        'approved_at'=> $tanggal,
                        'approved_by'=>$user_id
        ));
            
        #Create Gudang WIP list
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id_barang']!=''){   
            $this->db->insert('t_gudang_wip', array(
                            'jenis_trx' => 1,
                            'flag_taken' => 0,
                            'tanggal' => $tgl_input,
                            'jenis_barang_id' => $v['id_barang'],
                            't_spb_wip_id'=> $spb_id,
                            't_spb_wip_detail_id'=> $v['spb_detail_id'],
                            'qty' => $v['qty'],
                            'uom' => $v['uom'],
                            'berat' => $v['berat'],
                            'keterangan' => $v['keterangan'],
                            'created_by' => $user_id
                        ));
            }   
        }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangWIP/spb_list');
    }

    function reject_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('t_spb_wip', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data SPB WIP berhasil direject');
        redirect('index.php/GudangWIP/spb_list');
    }

    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_gudang_wip');
            $data['header']  = $this->Model_gudang_wip->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_gudang_wip->show_detail_spb($id)->result();

            $this->load->view('gudangwip/print_spb', $data);
        }else{
            redirect('index.php'); 
        }
    }
}