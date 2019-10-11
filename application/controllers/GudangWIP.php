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
        $jenis = $this->uri->segment(3);
        $jenis = str_replace('%20', ' ', $jenis);

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang WIP";
        $data['content']   = "gudangwip/hasil_produksi";
        
       $this->load->model('Model_gudang_wip');
       $data['gudang_wip'] = $this->Model_gudang_wip->gudang_wip_produksi_list($jenis)->result();
        
        $this->load->view('layout', $data);  
    }

    function proses_wip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id'); 
        $jenis = $this->uri->segment(3);
        $jenis = str_replace('%20', ' ', $jenis);

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Proses Barang WIP";
        $data['content']   = "gudangwip/proses_wip";
        
       $this->load->model('Model_gudang_wip');
       // $pilihan_jenis_masak = array(
       //                  'ROLLING' => 'ROLLING',
       //                  'BAKAR ULANG' => 'BAKAR ULANG',
       //                  'CUCI' => 'CUCI'
       //                  );
       // $data['pil_masak'] = $pilihan_jenis_masak;
       $data['pil_masak'] = [
            $jenis => $jenis
       ];
       // $data['spb_ingot'] = $this->Model_gudang_wip->spb_ingot()->result();
       $data['stok_keras'] = $this->Model_gudang_wip->stok_keras()->row_array();
       $data['spb_kawat_hitam'] = $this->Model_gudang_wip->spb_kawat_hitam()->result();
       $data['jenis_barang'] = $this->Model_gudang_wip->jenis_barang_list()->result();
        
       $this->load->view('layout', $data);  
    }

    function get_spb(){
        $id = $this->input->post('id');
        $jb = $this->input->post('jb');
        $this->load->model('Model_gudang_wip');
        $barang= $this->Model_gudang_wip->get_spb($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function save_proses_wip(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $this->load->model('Model_m_numberings');
        if($this->input->post('jenis_masak')=='ROLLING'){
            $code = $this->Model_m_numberings->getNumbering('PRD-ROL', $tgl_input);
        }elseif($this->input->post('jenis_masak')=='BAKAR ULANG'){
            $code = $this->Model_m_numberings->getNumbering('PRD-BU', $tgl_input);
        }elseif($this->input->post('jenis_masak')=='CUCI'){
            $code = $this->Model_m_numberings->getNumbering('PRD-CC', $tgl_input);
        }

        if($code){
            if($this->input->post('id_spb')){
                $this->db->where('id', $this->input->post('id_spb'));
                $this->db->update('t_spb_wip', array(
                    'flag_produksi'=>1
                    ));
            }

            if($this->input->post('jenis_masak') == 'CUCI'){
                $susut = (int)$this->input->post('susut_berat_keras');
            }else{
                $susut = 0;
            }
            #insert hasil WIP
            $data = array(
                    'no_produksi_wip' => $code,
                    'jenis_masak' => $this->input->post('jenis_masak'),
                    'tanggal'=> $tgl_input,
                    'jenis_barang_id'=> $this->input->post('jenis_barang'),
                    't_spb_wip_id'=> $this->input->post('id_spb'),
                    'qty'=>(int)($this->input->post('qty_kh')!= null) ? $this->input->post('qty_kh'): $this->input->post('qty_km'),
                    'uom' => 'ROLL',
                    'gas'=> (int)$this->input->post('gas'),
                    'berat' => (int)($this->input->post('berat_kh')!=null) ? $this->input->post('berat_kh') : $this->input->post('berat_km'),
                    'susut' => $susut,
                    'keras' => (int)$this->input->post('berat_keras'),
                    'qty_keras' => (int)$this->input->post('jml_keras'),
                    'bs' => (int)($this->input->post('bs')!= null)? $this->input->post('bs') : $this->input->post('bs_rolling'),
                    'bs_ingot' => (int)($this->input->post('bs_ingot')!= null)? $this->input->post('bs_ingot') : 0,
                    'serbuk' => (int)$this->input->post('serbuk'),
                    'tali_rolling' => (int)$this->input->post('tali_rolling'),
                    'created_by'=> $user_id
                );
            $this->db->insert('t_hasil_wip', $data);
            $insert_id = $this->db->insert_id();

            #Insert t_bpb_wip
            $code = $this->Model_m_numberings->getNumbering('BPB-WIP', $tgl_input);
            $data_t_bpb_wip = array(
                'no_bpb' => $code,
                'tanggal'=>$tgl_input,
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
                'jenis_barang_id' => $this->input->post('jenis_barang'), //Copper Rod 8 MM Cuci
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
                'jenis_barang_id' => $this->input->post('jenis_barang'), //Copper Rod 8 MM
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
                        'qty'=>(int)$this->input->post('jml_ingot_keras') - (int)$this->input->post('susut_jumlah_keras'),
                        'berat'=>(int)$this->input->post('jml_berat_keras') - (int)$this->input->post('susut_berat_keras'),
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

        if($this->input->post('bs') != 0 || $this->input->post('bs_rolling') != 0 || $this->input->post('bs_ingot') != 0 || $this->input->post('serbuk') != 0 || $this->input->post('bs_8m') != 0){

            $code = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
        
            #insert dtr
            $data_dtr = array(
                        'no_dtr'=> $code,
                        'tanggal'=> $tgl_input,
                        'prd_id'=> $insert_id,
                        'jenis_barang'=> 'RONGSOK',
                        'remarks'=> 'SISA PRODUKSI',
                        'created'=> $tanggal,
                        'created_by'=> $user_id
                    );
            $this->db->insert('dtr', $data_dtr);
            $dtr_id = $this->db->insert_id();
           
            if($this->input->post('jenis_masak') == 'ROLLING'){
                
                #insert bs rolling ke rongsok
                if($this->input->post('bs_rolling') != 0){

                $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

                $bs_code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);

                $bs_packing = $tgl_code.substr($bs_code,13,4);

                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'rongsok_id'=>20,
                        'qty'=>0,
                        'bruto'=>$this->input->post('bs_rolling'),
                        'netto'=>$this->input->post('bs_rolling'),
                        'line_remarks'=>'SISA PRODUKSI',
                        'no_pallete'=>$bs_packing,
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
                }
                #insert bs ingot ke rongsok
                if($this->input->post('bs_ingot') != 0){

                $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

                $bs_code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);

                $bs_packing = $tgl_code.substr($bs_code,13,4);
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'rongsok_id'=>22,
                        'qty'=>0,
                        'bruto'=>$this->input->post('bs_ingot'),
                        'netto'=>$this->input->post('bs_ingot'),
                        'line_remarks'=>'SISA PRODUKSI',
                        'no_pallete'=>$bs_packing,
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
                }

                #insert bs 8mm ke rongsok
                if($this->input->post('bs_8m') != 0){

                $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

                $bs_code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);

                $bs_packing = $tgl_code.substr($bs_code,13,4);
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'rongsok_id'=>52,//BS 8,00MMM
                        'qty'=>0,
                        'bruto'=>$this->input->post('bs_8m'),
                        'netto'=>$this->input->post('bs_8m'),
                        'line_remarks'=>'SISA PRODUKSI',
                        'no_pallete'=>$bs_packing,
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
                }
                
            }else if($this->input->post('jenis_masak') == 'BAKAR ULANG'){
                #insert bs ke rongsok
                if($this->input->post('bs') != 0){
                    $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

                    $bs_code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);

                    $bs_packing = $tgl_code.substr($bs_code,13,4);
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'rongsok_id'=>52,
                        'qty'=>0,
                        'bruto'=>$this->input->post('bs'),
                        'netto'=>$this->input->post('bs'),
                        'line_remarks'=>'SISA PRODUKSI',
                        'no_pallete'=>$bs_packing,
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
                }

            }else if($this->input->post('jenis_masak') == 'CUCI'){
                #insert bs ke gudang bs
                $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

                $bs_code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);

                $bs_packing = $tgl_code.substr($bs_code,13,4);
                    $this->db->insert('dtr_detail', array(
                        'dtr_id'=>$dtr_id,
                        'rongsok_id'=>51,
                        'qty'=>0,
                        'netto'=>$this->input->post('bs'),
                        'line_remarks'=>'SISA PRODUKSI',
                        'no_pallete'=>$bs_packing,
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'modified'=>$tanggal,
                        'modified_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
            }
        }

        // if($this->input->post('serbuk') != 0){
        //     if($this->input->post('jenis_masak') == 'CUCI'){
        //         #insert serbuk ke rongsok
        //         $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
        //             $this->db->insert('dtr_detail', array(
        //                 'dtr_id'=>$dtr_id,
        //                 'rongsok_id'=>53,
        //                 'qty'=>0,
        //                 'netto'=>$this->input->post('serbuk'),
        //                 'line_remarks'=>'SISA PRODUKSI',
        //                 'no_pallete'=>date("dmyHis").$rand,
        //                 'created'=>$tanggal,
        //                 'created_by'=>$user_id,
        //                 'modified'=>$tanggal,
        //                 'modified_by'=>$user_id,
        //                 'tanggal_masuk'=>$tgl_input
        //             ));
        //     }else{
        //         #insert serbuk ke rongsok
        //         $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
        //             $this->db->insert('dtr_detail', array(
        //                 'dtr_id'=>$dtr_id,
        //                 'rongsok_id'=>30,
        //                 'qty'=>0,
        //                 'netto'=>$this->input->post('serbuk'),
        //                 'line_remarks'=>'SISA PRODUKSI',
        //                 'no_pallete'=>date("dmyHis").$rand,
        //                 'created'=>$tanggal,
        //                 'created_by'=>$user_id,
        //                 'modified'=>$tanggal,
        //                 'modified_by'=>$user_id,
        //                 'tanggal_masuk'=>$tgl_input
        //             ));
        //     }
        // }

        //     if($this->input->post('jenis_masak') == 'ROLLING'){
        //         #insert bs ke gudang bs
        //         if($this->input->post('bs_rolling') != 0){
        //             $data_bs = array(
        //                 'id_produksi' => $insert_id,
        //                 'jenis_barang_id' => 20,
        //                 'jenis_produksi' => 'WIP',
        //                 'berat' => $this->input->post('bs_rolling'),
        //                 'tanggal' => $tgl_input,
        //                 'status' => 0,
        //                 'created_by' => $user_id,
        //                 'created_at' => $tanggal
        //             );
        //             $this->db->insert('t_gudang_bs', $data_bs);
        //         }
        //         if($this->input->post('bs_ingot') != 0){
        //             $data_bs = array(
        //                 'id_produksi' => $insert_id,
        //                 'jenis_barang_id' => 22,
        //                 'jenis_produksi' => 'WIP',
        //                 'berat' => $this->input->post('bs_rolling'),
        //                 'tanggal' => $tgl_input,
        //                 'status' => 0,
        //                 'created_by' => $user_id,
        //                 'created_at' => $tanggal
        //             );
        //             $this->db->insert('t_gudang_bs', $data_bs);
        //         }
        //     }else if($this->input->post('jenis_masak') == 'BAKAR ULANG'){
        //         #insert bs ke gudang bs
        //         $data_bs = array(
        //             'id_produksi' => $insert_id,
        //             'jenis_barang_id' => 22,
        //             'jenis_produksi' => 'WIP',
        //             'berat' => $this->input->post('bs'),
        //             'tanggal' => $tgl_input,
        //             'status' => 0,
        //             'created_by' => $user_id,
        //             'created_at' => $tanggal
        //         );
        //         $this->db->insert('t_gudang_bs', $data_bs);
        //     }else if($this->input->post('jenis_masak') == 'CUCI'){
        //         #insert bs ke gudang bs
        //         $data_bs = array(
        //             'id_produksi' => $insert_id,
        //             'jenis_barang_id' => 51,
        //             'jenis_produksi' => 'WIP',
        //             'berat' => $this->input->post('bs'),
        //             'tanggal' => $tgl_input,
        //             'status' => 0,
        //             'created_by' => $user_id,
        //             'created_at' => $tanggal
        //         );
        //         $this->db->insert('t_gudang_bs', $data_bs);
        //     }
        // }

        // if($this->input->post('serbuk') != 0){
        //     if($this->input->post('jenis_masak') == 'CUCI'){
        //         #insert serbuk ke gudang bs
        //         $data_bs = array(
        //             'id_produksi' => $insert_id,
        //             'jenis_produksi' => 'WIP',
        //             'berat' => $this->input->post('serbuk'),
        //             'jenis_barang_id' => 53,
        //             'tanggal' => $tgl_input,
        //             'status' => 0,
        //             'created_by' => $user_id,
        //             'created_at' => $tanggal
        //         );
        //         $this->db->insert('t_gudang_bs', $data_bs);
        //     }else{
        //         #insert serbuk ke gudang bs
        //         $data_bs = array(
        //             'id_produksi' => $insert_id,
        //             'jenis_produksi' => 'WIP',
        //             'berat' => $this->input->post('serbuk'),
        //             'jenis_barang_id' => 30,
        //             'tanggal' => $tgl_input,
        //             'status' => 0,
        //             'created_by' => $user_id,
        //             'created_at' => $tanggal
        //         );
        //         $this->db->insert('t_gudang_bs', $data_bs);
        //     }
        // }
            
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
            $jenis = $this->input->post('jenis_masak');
            $jenis = str_replace('%20', ' ', $jenis);
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg','Simpan Data Produksi WIP Berhasil.');
            } else{
                $this->session->set_flashdata('flash_msg','Simpan Data Produksi WIP Gagal, Silahkan Coba Lagi.');
                redirect('index.php/GudangWIP/proses_wip'.$jenis);    
            } 
        } else {
            $this->session->set_flashdata('flash_msg','Penyimpanan Data Produksi WIP Gagal, Penomoran Produksi WIP Belum di Set');
        }  
        redirect('index.php/GudangWIP/produksi_wip/'.$jenis);  
    }

    function edit_produksi_wip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id'); 
        $id = $this->uri->segment(3);

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Edit Hasil Barang WIP";
        $data['content']   = "gudangwip/edit_produksi_wip";

        $this->load->model('Model_gudang_wip');
            $data['header']  = $this->Model_gudang_wip->show_header_thw($id)->row_array();
            // $data['details'] = $this->Model_gudang_wip->show_detail_bpb($id)->result();
            $data['jenis_barang'] = $this->Model_gudang_wip->jenis_barang_list()->result();
        
        $this->load->view('layout', $data);  
    }

    function update_proses_wip(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        
        #Update status SPB
        $this->db->where('id', $this->input->post('id_thw'));
        $this->db->update('t_hasil_wip', array(
                        'tanggal'=>$tgl_input,
                        'jenis_barang_id'=>$this->input->post('jenis_barang')
        ));

        $this->db->where('bpb_wip_id', $this->input->post('id_bpb'));
        $this->db->update('t_bpb_wip_detail', array(
            'jenis_barang_id'=>$this->input->post('jenis_barang')
        ));

        $this->db->where('id', $this->input->post('id_bpb'));
        $this->db->update('t_bpb_wip', array(
            'tanggal'=>$tgl_input
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Detail SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangWIP/produksi_wip/'.$this->input->post('jenis_masak'));
    }

    function delete_produksi_wip(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $this->db->trans_start();

            $this->load->model('Model_gudang_wip');
            $header  = $this->Model_gudang_wip->show_header_thw($id)->row_array();
            $this->db->where('id', $header['id']);
            $this->db->delete('t_hasil_wip');

            $this->db->where('id', $header['hasil_masak_id']);
            $this->db->delete('t_hasil_masak');

            if(!empty($header['id_produksi_ingot'])){
                $this->db->where('id', $header['id_produksi_ingot']);
                $this->db->delete('produksi_ingot');

                $this->db->where('produksi_ingot_id', $header['id_produksi_ingot']);
                $this->db->delete('produksi_ingot_detail');
            }

            $this->db->where('id', $header['id_bpb']);
            $this->db->delete('t_bpb_wip');

            $this->db->where('bpb_wip_id', $header['id_bpb']);
            $this->db->delete('t_bpb_wip_detail');

            if(!empty($header['id_dtr'])){
                $this->db->where('id', $header['id_dtr']);
                $this->db->delete('dtr');

                $this->db->where('dtr_id', $header['id_dtr']);
                $this->db->delete('dtr_detail');
            }

            if($header['jenis_masak']=='CUCI'){
                $this->db->where('id', $header['t_spb_wip_id']);
                $this->db->update('t_spb_wip', array(
                    'flag_produksi'=>3
                ));
            }elseif($header['jenis_masak']=='BAKAR ULANG'){
                $this->db->where('t_hasil_wip_id', $header['id']);
                $this->db->delete('t_gudang_keras');
            }

            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Data Produksi berhasil dihapus');
                if ($header['jenis_masak'] == 'ROLLING') {
                    redirect('index.php/GudangWIP/produksi_wip/ROLLING');
                } else if ($header['jenis_masak'] == 'CUCI') {
                    redirect('index.php/GudangWIP/produksi_wip/CUCI');
                } else if ($header['jenis_masak'] == 'INGOT') {
                    redirect('index.php/Ingot/hasil_produksi');
                } else {
                    redirect('index.php/GudangWIP/produksi_wip/BAKAR%20ULANG');
                }
            }else{
                $this->session->set_flashdata('flash_msg', 'Data Produksi gagal dihapus');
                if ($header['jenis_masak'] == 'ROLLING') {
                    redirect('index.php/GudangWIP/produksi_wip/ROLLING');
                } else if ($header['jenis_masak'] == 'CUCI'){
                    redirect('index.php/GudangWIP/produksi_wip/CUCI');
                } else if ($header['jenis_masak'] == 'INGOT'){
                    redirect('index.php/Ingot/hasil_produksi');
                } else {
                    redirect('index.php/GudangWIP/produksi_wip/BAKAR%20ULANG');
                }
            }
        }
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
        $user_ppn    = $this->session->userdata('user_ppn');

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudangwip/bpb_list";
        $this->load->model('Model_gudang_wip');
        $data['list_data'] = $this->Model_gudang_wip->bpb_list($user_ppn)->result();

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
        $user_ppn = $this->session->userdata('user_ppn');

        $hasil_wip_id = $this->input->post('id_hasil_wip');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $return_data = array();
        
        $this->db->trans_start();       
         
            #Update status BPB
            $bpb_update = array(
                    'status'=>1,
                    'tanggal'=>$tgl_input,
                    'keterangan' => $this->input->post('remarks'),
                    'approved_date'=>$tanggal,
                    'approved_by'=>$user_id);

            $this->db->where('id', $bpb_id);
            $this->db->update('t_bpb_wip', $bpb_update);
            
            $detail_push = [];

            #Create Inventori WIP
            $details = $this->input->post('details');
            foreach ($details as $k => $v) {    
                $data = array(
                        'tanggal'=> $tgl_input,
                        'flag_ppn'=> $user_ppn,
                        'flag_taken'=>0,
                        't_spb_wip_detail_id' =>$v['id_spb_detail'],
                        't_hasil_wip_id'=> $hasil_wip_id,
                        'jenis_barang_id' => $v['id_jenis_barang'] ,
                        't_bpb_wip_detail_id'=>$v['id'],
                        'qty' =>$v['qty'],
                        'uom' =>$v['uom'],
                        'berat' =>str_replace('.', '', $v['berat']),
                        'keterangan' =>null,
                        'created_by'=> $user_id
                );
                $this->db->insert('t_gudang_wip', $data);
                    if($user_ppn == 1){
                        $tgf_id = $this->db->insert_id();
                        $data_id = array('reff1' => $tgf_id);
                        unset($data['flag_ppn']);
                        unset($data['created_by']);
                        $detail_push[$k] = array_merge($details[$k], $data_id);
                    }
            }

                if($user_ppn == 1){
                    $this->load->helper('target_url');

                    $data_post['bpb_id'] = $bpb_id;
                    $data_post['tgl_input'] = $tgl_input;
                    $data_post['bpb'] = $bpb_update;
                    $data_post['details'] = $detail_push;
                    $detail_post = json_encode($data_post);

                    // print_r($detail_post);
                    // die();

                    $ch = curl_init(target_url().'api/BeliWIPAPI/bpb');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    $result = json_decode($response, true);
                    curl_close($ch);
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
            $this->load->helper('tanggal_indo_helper');
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
        $jenis = $this->uri->segment(3);
        if ($jenis == "CUCI") {
            $flag_produksi = 3;
        } else {
            $flag_produksi = null;
        }

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudangwip/spb_list";
        $this->load->model('Model_gudang_wip');
        $data['list_data'] = $this->Model_gudang_wip->spb_list($flag_produksi)->result();

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
                        'line_remarks'=>$this->input->post('keterangan'),
                        'tanggal_masuk'=>$tgl_input
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
            if($this->input->post('flag_produksi') == "2"){
                $remarks = "ROLLING | ".$this->input->post('remarks');
            } else if ($this->input->post('flag_produksi') == "3"){
                $remarks = "CUCI | ".$this->input->post('remarks');
            } else {
                $remarks = $this->input->post('remakrs');
            }        
            $data = array(
                'no_spb_wip'=> $code,
                'flag_produksi'=> $this->input->post('flag_produksi'),
                'tanggal'=> $tgl_input,
                'keterangan'=>$remarks,
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
            if($jenis==2){
                $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_spb(2)->result();
            }else if($jenis==3){
                $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_spb_cuci()->result();
            }else if($jenis==5){
                $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_list()->result();
                $this->load->model('Model_beli_rongsok');
                $data['rongsok'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            }else{
                $data['list_barang'] = $this->Model_gudang_wip->jenis_barang_list()->result();
            }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangWIP/spb_list');
        }
    }

    function delete_spb(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $flag_produksi = $this->uri->segment(4);
        if($id){
            $this->db->trans_start();

            $this->db->where('id', $id);
            $this->db->delete('t_spb_wip');

            $this->db->where('t_spb_wip_id', $id);
            $this->db->delete('t_spb_wip_detail');

            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Data SPB WIP berhasil dihapus');
                if ($flag_produksi == 1 || $flag_produksi == 3) {
                    redirect('index.php/GudangWIP/spb_list/CUCI');
                } else {
                    redirect('index.php/GudangWIP/spb_list/');
                }
                
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB WIP gagal dihapus');
                if ($flag_produksi == 1 || $flag_produksi == 3) {
                    redirect('index.php/GudangWIP/spb_list/CUCI');
                } else {
                    redirect('index.php/GudangWIP/spb_list/');
                }
            }
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
        
        $this->db->trans_start();

        $data = array(
                'keterangan'=>$this->input->post('remarks'),
                'modified_date'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_spb_wip', $data);
        
        if($this->input->post('flag_produksi')==5){
            #insert DTR ke gudang rongsok
            $this->load->model('Model_m_numberings');
            $code_DTR = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
               
            $data = array(
                        'no_dtr'=> $code_DTR,
                        'tanggal'=> $tgl_input,
                        'jenis_barang'=> 'RONGSOK',
                        'remarks'=> 'BARANG WIP TRANSFER KE RONGSOK',
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('dtr', $data);
            $dtr_id = $this->db->insert_id();
            
            #insert DTR_Detail ke gudang rongsok
            $this->load->model('Model_gudang_wip');

            $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

            $loop = $this->Model_gudang_wip->load_detail($this->input->post('id'))->result();
            foreach ($loop as $row) {
                // $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
                $code_palette = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);
                $no_pallete= $tgl_code.substr($code_palette,13,4);

                $this->db->insert('dtr_detail', array(
                            'dtr_id'=>$dtr_id,
                            //sisa WIP id 8
                            'rongsok_id' => $this->input->post('rongsok_id'),
                            'qty'=> $row->qty,
                            'bruto'=> $row->berat,
                            'netto'=> $row->berat,
                            'no_pallete'=> $no_pallete,
                            'line_remarks'=> 'Kirim Rongsok dari WIP',
                            'tanggal_masuk'=> $tgl_input
                        ));
            }
        }

        if($this->input->post('flag_produksi')==3){
            $r = 'CUCI';
        }else{
            $r = '';
        }
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data SPB WIP berhasil disimpan');
            redirect('index.php/GudangWIP/spb_list/'.$r);
        }else{
            $this->session->set_flashdata('flash_msg', 'Gagal');
            redirect('index.php/GudangWIP/edit_spb/'.$id);
        }
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
            $data['detailSPB'] = $this->Model_gudang_wip->show_detail_wip_fulfilment($id)->result();
            $data['detailFulfilment'] = $this->Model_gudang_wip->show_detail_spb_fulfilment($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangWIP/spb_list');
        }
    }

    function delSPBSudahDipenuhi(){
        $id = $this->uri->segment(3);
        $id_spb = $this->uri->segment(4);
        
        $this->db->where('id', $id);
        if($this->db->delete('t_gudang_wip')){
            redirect('index.php/GudangWIP/view_spb/'.$id_spb);
        }else{
            redirect('index.php/GudangWIP/spb_list');
        }
    }

    function save_spb_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();
        
        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_wip', array(
                        'status'=> 3,
                        'keterangan' => $this->input->post('remarks'),
                        'modified_date'=> $tanggal,
                        'modified_by'=>$user_id
        ));
            
        #Create Gudang WIP list
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id_barang']!=''){   
            $this->db->insert('t_spb_wip_fulfilment', array(
                            'jenis_barang_id' => $v['id_barang'],
                            't_spb_wip_id'=> $spb_id,
                            't_spb_wip_detail_id'=> $v['spb_detail_id'],
                            'qty' => $v['qty'],
                            'berat' => $v['berat'],
                            'keterangan' => $v['keterangan'],
                        ));
            }   
        }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Detail SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangWIP/spb_list');
    }

    function input_ulang_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_wip', array(
                        'status'=> 0,
                        'modified_date'=> $tanggal,
                        'modified_by'=>$user_id
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangWIP/view_spb/'.$spb_id);
    }

    function tambah_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_wip', array(
                        'status'=> 4,
                        'modified_date'=> $tanggal,
                        'modified_by'=>$user_id
        ));

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'Silahkan tambah barang');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }                 

       redirect('index.php/GudangWIP/view_spb/'.$spb_id);
    }

    function reject_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $spb_id = $this->input->post('id');

        $this->db->trans_start();

            $this->load->model('Model_gudang_wip');
            $details = $this->Model_gudang_wip->show_detail_spb_fulfilment($spb_id)->result();
            $this->db->where('t_spb_wip_id',$spb_id);
            $this->db->where('approved_by', 0);
            $this->db->delete('t_spb_wip_fulfilment');
            // echo '<pre>';print_r($details);echo'</pre>';
            // die();

            $check = $this->Model_gudang_wip->check_spb_reject($spb_id)->row_array();
            if($check['count'] > 0){
                $status = 4;
            }else{
                $status = 0;
            }
            $this->db->update('t_spb_wip',['status'=>$status],['id'=>$spb_id]);
            // echo $status;
            // die();

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail Pemenuhan SPB sudah disimpan');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/GudangWIP/view_spb/'.$spb_id);
    }

    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal_keluar = date('Y-m-d', strtotime($this->input->post('tanggal_keluar')));
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $spb_id = $this->input->post('id');
        
        $this->load->model('Model_gudang_wip');
        #Create Gudang WIP list
        $details = $this->Model_gudang_wip->show_detail_spb_fulfilment($spb_id)->result();
        foreach ($details as $v) {
            $this->db->where('id', $v->id);
            $this->db->update('t_spb_wip_fulfilment', array(
                            'approved_at'=> $tanggal,
                            'approved_by'=> $user_id
            ));

            $this->db->insert('t_gudang_wip', array(
                            'jenis_trx' => 1,
                            'flag_taken' => 0,
                            'tanggal' => $tanggal_keluar,
                            'jenis_barang_id' => $v->jenis_barang_id,
                            't_spb_wip_id'=> $spb_id,
                            't_spb_wip_detail_id'=> $v->t_spb_wip_detail_id,
                            'qty' => $v->qty,
                            'uom' => $v->uom,
                            'berat' => $v->berat,
                            'keterangan' => $v->keterangan,
                            'created_by' => $user_id,
                            'created_on' => $tanggal
                        ));
        }
 
        $this->db->trans_start();
        $data['check'] = $this->Model_gudang_wip->check_spb($spb_id)->row_array();
        if(((int)$data['check']['tot_fulfilment']) >= ((int)$data['check']['tot_spb'])){
            $status = 1;
        }else{
            $status = 4;
        }

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_wip', array(
                        'status'=> $status,
                        'keterangan' => $this->input->post('remarks'),
                        'approved_at'=> $tanggal,
                        'approved_by'=>$user_id
        ));
            
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
            $this->load->helper('tanggal_indo_helper');
            $this->load->model('Model_gudang_wip');
            $data['header']  = $this->Model_gudang_wip->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_gudang_wip->show_detail_spb($id)->result();

            $this->load->view('gudangwip/print_spb', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_spb_fulfilment(){
        $id = $this->uri->segment(3);
        if($id){
            $this->load->helper('tanggal_indo_helper');
            $this->load->model('Model_gudang_wip');
            $data['header']  = $this->Model_gudang_wip->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_gudang_wip->show_detail_spb_fulfilment($id)->result();

            $this->load->view('gudangwip/print_spb_fulfilment', $data);
        }else{
            redirect('index.php'); 
        }
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

            $data['content']= "gudangwip/laporan_list";
            $i=0;
            $this->load->model('Model_gudang_wip'); 
            //$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
            $comment = $this->Model_gudang_wip->show_laporan();
            if($comment->num_rows() > 0)
                {
                    foreach ($comment->result() as $r)
                    {
                        //bulan ini
                        $data['reg'][$i]['showdate']=$r->showdate;
                        $data['reg'][$i]['tanggal']=$r->tanggal;
                        $data['reg'][$i]['jumlah']=$r->jumlah;
                        $data['reg'][$i]['qty_masuk']=$r->qty_masuk;
                        $data['reg'][$i]['berat_masuk']=$r->berat_masuk;
                        $data['reg'][$i]['qty_keluar']=$r->qty_keluar;
                        $data['reg'][$i]['berat_keluar']=$r->berat_keluar;

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

    function print_laporan_bulanan(){
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
            $this->load->helper('tanggal_indo');            
            $items = strval($id);
            $tgl=str_split($id,4);
            $tahun=$tgl[0];
            $bulan=$tgl[1];

            $tgl = $tahun.'-'.$bulan.'-01';

            $data['tgl'] = array(
                'tahun' => $tahun,
                'bulan' => $bulan
            );

            $this->load->model('Model_gudang_wip');
            $data['detailLaporan'] = $this->Model_gudang_wip->show_view_laporan($bulan,$tahun)->result();
            $this->load->view("gudangwip/print_laporan_bulanan", $data);
        }else{
            redirect('index.php/GudangWIP/laporan_list');
        }
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

            $data['content']= "gudangwip/view_laporan";
            $this->load->model('Model_gudang_wip');
            // $data['detailLaporan'] = $this->Model_gudang_wip->show_view_laporan_before($bulan,$tahun)->result();
            $data['detailLaporan'] = $this->Model_gudang_wip->show_view_laporan($bulan,$tahun)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangWIP/laporan_list');
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

            $data['content']= "gudangwip/view_detail_laporan";
            $this->load->model('Model_gudang_wip');
            $data['detailLaporan'] = $this->Model_gudang_wip->show_laporan_detail($bulan,$tahun,$id_barang)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangWIP/laporan_list');
        }
    }

    function stok_wip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang WIP";
        $data['content']   = "gudangwip/stok_wip";
        
       $this->load->model('Model_gudang_wip');
       $data['gudang_wip'] = $this->Model_gudang_wip->stok_wip()->result();
        
        $this->load->view('layout', $data);  
    }

    function kartu_stok_wip(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang wip";
        $data['content']   = "gudangwip/kartu_stok_index";

        $this->load->model('Model_gudang_wip'); 
        $data['list_fg'] = $this->Model_gudang_wip->jenis_barang_list()->result();

        $this->load->view('layout', $data);  
    }

    function kartu_stok(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');

        $jb_id = $_GET['r'];
        $start = date('Y/m/d', strtotime($_GET['ts']));
        $end = date('Y/m/d', strtotime($_GET['te']));
        // echo $start;die();

            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang WIP";

        $this->load->model('Model_beli_fg');
        $data['jb'] = $this->Model_beli_fg->get_jb($jb_id)->row_array();
        $data['start'] = $start;
        $data['end'] = $end;

            $this->load->model('Model_gudang_wip');
            $data['stok_before'] = $this->Model_gudang_wip->show_kartu_stok_before($start,$end,$jb_id)->row_array();

        if($_GET['bl']==0){
            $data['detailLaporan'] = $this->Model_gudang_wip->show_kartu_stok_detail($start,$end,$jb_id)->result();
            $this->load->view('gudangwip/kartu_stok', $data);
        }else{
            $data['detailLaporan'] = $this->Model_gudang_wip->show_kartu_stok_detail_packing($start,$end,$jb_id)->result();
            $this->load->view('gudangwip/kartu_stok_packing', $data);
        }
    }
}