<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GudangRongsok extends CI_Controller{   
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
        $data['judul']     = "Gudang Rongsok";
        $data['content']   = "gudang_rongsok/index";

        $this->load->model('Model_beli_rongsok'); 
        $data['list_rongsok'] = $this->Model_beli_rongsok->show_data_rongsok()->result();

        $this->load->view('layout', $data);  
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
            redirect('index.php/Ingot/spb_list');
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

            $data['content']= "beli_rongsok/laporan_list";
            $i=0;
            $this->load->model('Model_beli_rongsok'); 
            //$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
            $comment = $this->Model_beli_rongsok->show_laporan();
            if($comment->num_rows() > 0)
                {
                    foreach ($comment->result() as $r)
                    {
                        //bulan ini
                        $data['reg'][$i]['showdate']=$r->showdate;
                        $data['reg'][$i]['tanggal']=$r->tanggal;
                        $data['reg'][$i]['bruto_masuk']=$r->bruto_masuk;
                        $data['reg'][$i]['netto_masuk']=$r->netto_masuk;
                        $data['reg'][$i]['bruto_keluar']=$r->bruto_keluar;
                        $data['reg'][$i]['netto_keluar']=$r->netto_keluar;

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

            $data['content']= "beli_rongsok/view_laporan";
            $this->load->model('Model_beli_rongsok');
            $data['detailLaporan'] = $this->Model_beli_rongsok->show_view_laporan($bulan,$tahun)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok/laporan_list');
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

            $data['content']= "beli_rongsok/view_detail_laporan";
            $this->load->model('Model_beli_rongsok');
            $data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_detail($bulan,$tahun,$id_barang)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok/laporan_list');
        }
    }

    function gudang_rongsok(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Rongsok";
        $data['content']   = "beli_rongsok/gudang_rongsok";
        
        $this->load->model('Model_beli_rongsok');
        $data['list_data'] = $this->Model_beli_rongsok->gudang_rongsok_list()->result();
        
        $this->load->view('layout', $data);
    }

    function view_gudang_rongsok(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');

        if($id){
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang Rongsok";
            $data['content']   = "beli_rongsok/view_gudang_rongsok";
            
            $this->load->model('Model_beli_rongsok');
            $data['list_data'] = $this->Model_beli_rongsok->view_gudang_rongsok($id)->result();
            
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/BeliRongsok/gudang_rongsok');
        }
    }

    function kartu_stok(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');

        $rongsok_id = $_GET['r'];
        $start = date('Y/m/d', strtotime($_GET['ts']));
        $end = date('Y/m/d', strtotime($_GET['te']));

            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang Rongsok";

        $this->load->model('Model_beli_rongsok');
        $data['rongsok'] = $this->Model_beli_rongsok->show_data_rongsok_detail($rongsok_id)->row_array();
        $data['start'] = $start;
        $data['end'] = $end;
        
        $data['stok_before'] = $this->Model_beli_rongsok->get_stok_before($start,$rongsok_id)->row_array();

        if($_GET['bl']==0){
            $data['detailLaporan'] = $this->Model_beli_rongsok->show_kartu_stok($start,$end,$rongsok_id)->result();
            $this->load->view('gudang_rongsok/kartu_stok', $data);
        }else{
            $data['detailLaporan'] = $this->Model_beli_rongsok->show_kartu_stok_palette($start,$end,$rongsok_id)->result();
            $this->load->view('gudang_rongsok/kartu_stok_palette', $data);
        }
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

            $tgl = $tahun.'/'.$bulan.'/01';
            // print_r($tgl); die();
            $data['tgl'] = array(
                'tahun' => $tahun,
                'bulan' => $bulan
            );

            $this->load->model('Model_beli_rongsok');
            $data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_barang($tgl,$bulan,$tahun)->result();
            $this->load->view("gudang_rongsok/print_laporan_bulanan", $data);
        }else{
            redirect('index.php/BeliRongsok/laporan_list');
        }
    }

    function print_permintaan_gudang(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');

        $start = date('Y/m/d', strtotime($_GET['ts']));
        $end = date('Y/m/d', strtotime($_GET['te']));

            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang Rongsok";

        $this->load->model('Model_beli_rongsok');
        $data['start'] = $start;
        $data['end'] = $end;

            $data['detailLaporan'] = $this->Model_beli_rongsok->permintaan_rongsok_dari_produksi($start,$end)->result();

            $this->load->view('gudang_rongsok/print_permintaan_gudang', $data);
    }

    function search_permintaan_gudang(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Rongsok";
        $data['content']   = "gudang_rongsok/search_permintaan_gudang";

        $this->load->model('Model_beli_rongsok');

        $this->load->view('layout', $data);  
    }

    function print_permintaan_external(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');

        $start = date('Y/m/d', strtotime($_GET['ts']));
        $end = date('Y/m/d', strtotime($_GET['te']));

        $data['start'] = $start;
        $data['end'] = $end;

        $this->load->model('Model_beli_rongsok');
            $data['detailLaporan'] = $this->Model_beli_rongsok->permintaan_rongsok_external($start,$end)->result();

            $this->load->view('gudang_rongsok/print_permintaan_external', $data);
    }

    function search_permintaan_external(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Rongsok";
        $data['content']   = "gudang_rongsok/search_permintaan_external";

        // $this->load->model('Model_beli_rongsok');

        $this->load->view('layout', $data);  

            $this->load->helper('tanggal_indo');            
            // $items = strval($id);
            // $tgl=str_split($id,4);
            // $tahun=$tgl[0];
            // $bulan=$tgl[1];

            // $tgl = $tahun.'/'.$bulan.'/01';

            // $data['tgl'] = array(
            //     'tahun' => $tahun,
            //     'bulan' => $bulan
            // );

            // $this->load->model('Model_beli_rongsok');
            // $data['detailLaporan'] = $this->Model_beli_rongsok->show_laporan_barang_detail($tgl,$bulan,$tahun)->result();
            // $this->load->view("gudang_rongsok/print_laporan_bulanan_detail", $data);
    }
}