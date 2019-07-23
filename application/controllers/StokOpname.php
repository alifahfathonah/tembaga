<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StokOpname extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "stok_opname/index";

        $this->load->view('layout', $data);
    }

    function get_packing(){
        $no = $this->input->post('no');

        $this->load->model('Model_stok_opname');
        $result = $this->Model_stok_opname->get_packing($no)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }   

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $cek = $this->db->get_where('stok_opname', ['tanggal' => $tgl_input]);
        if ($cek->num_rows() > 0) {
            $id = $cek->row()->id;
        } else {
            $this->db->insert('stok_opname', [
                'tanggal' => $tgl_input,
                'jenis_stok_opname' => "FG",
                'created_by' => $user_id,
                'created_at' => $tanggal,
            ]);

            $id = $this->db->insert_id();
        }

        // $this->session->set_flashdata('flash_msg', 'Voucher cost berhasil di-create dengan nomor : '.$code);

        redirect('index.php/StokOpname/detail_fg/'.$id);
    }

    function detail_fg(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "stok_opname/detail_fg";
        $this->load->model('Model_stok_opname');
        $data['header'] = $this->Model_stok_opname->header_stok_opname_fg($id)->row_array();
        $data['details'] = $this->Model_stok_opname->list_stok_opname_fg($id)->result();

        $this->load->view('layout', $data);
    }

    function load_detail_fg(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total_netto = 0;
        $this->load->model('Model_stok_opname');
        $myDetail = $this->Model_stok_opname->list_stok_opname_fg($id)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_packing.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td align="right">'.number_format($row->netto,2,".",",").'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a>';
            $tabel .= '</tr>';            
            $no++;
            $total_netto += $row->netto;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td colspan="4" style="text-align:right">TOTAL : </td>';
        $tabel .= '<td align="right">'.number_format($total_netto,2,".",",").'</td>';
        $tabel .= '<td colspan="2"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    function save_detail_fg(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $stok_opname_id = $this->input->post('id');
        $no_packing = $this->input->post('no_packing');
        $gudang_id = $this->input->post('gudang_id');
        $jenis_barang_id = $this->input->post('jenis_barang_id');
        $netto = $this->input->post('netto');
        $keterangan = $this->input->post('keterangan');

        $return_data = [];
        $data = [
                'stok_opname_id'=> $stok_opname_id,
                'gudang_id'=> $gudang_id,
                'jenis_barang_id'=> $jenis_barang_id,
                'netto'=> $netto,
                'no_packing'=> $no_packing,
                'keterangan'=> $keterangan,
            ];
        
        if($this->db->insert('stok_opname_detail', $data)){
            $return_data['response']= "success";
        }else{
            $return_data['response']= "error";
            $return_data['message']= "Gagal!";
        } 

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function check_duplicate(){
        $no = $this->input->post('no');
        $sql = $this->db->get_where('stok_opname_detail', ['no_packing' => $no]);

        if($sql->num_rows() > 0){
            $return_data['response']= "duplicate";
        }else{
            $return_data['response']= "ok";
        } 

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function delete_detail_fg(){
        $id = $this->input->post('id');
        if($this->db->delete('stok_opname_detail', ['id' => $id])){
            $return_data['response']= "success";
        }else{
            $return_data['response']= "error";
            $return_data['message']= "Gagal!";
        } 

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->update('stok_opname', [
            'tanggal' => $tgl_input,
            'modified_by' => $user_id,
            'modified_at' => $tanggal,
        ], ['id' => $this->input->post('id')]);

        $this->session->set_flashdata('flash_msg', 'Stok opname berhasil dibuat');

        redirect('index.php/StokOpname/report');
    }

    function report(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "stok_opname/report";
        $this->load->model('Model_stok_opname');
        $data['list_data'] = $this->Model_stok_opname->list_report()->result();

        $this->load->view('layout', $data);
    }

    function view(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "stok_opname/view";
        $this->load->model('Model_stok_opname');
        $data['header'] = $this->Model_stok_opname->header_stok_opname_fg($id)->row_array();
        $data['details'] = $this->Model_stok_opname->list_stok_opname_fg($id)->result();

        $this->load->view('layout', $data);
    }

    function print_stok(){
        $this->load->helper('tanggal_indo');  
        $this->load->model('Model_stok_opname');
        $data['detailLaporan'] = $this->Model_stok_opname->print_stok_v1()->result();

        $this->load->view('stok_opname/print_stok', $data);
    }

    function refreshData(){
        $id = $this->input->post('id');

        $this->db->trans_start();
        $opname = $this->db->get_where('stok_opname_detail', ['stok_opname_id' => $id, 'gudang_id' => 0])->result();
        foreach ($opname as $key => $row) {
            $gudang = $this->db->get_where('t_gudang_fg', ['no_packing' => $row->no_packing])->row();
            $this->db->update('stok_opname_detail', [
                'gudang_id' => $gudang->id,
                'jenis_barang_id' => $gudang->jenis_barang_id,
                'netto' => $gudang->netto,
            ], ['no_packing' => $row->no_packing]);
        }

        if($this->db->trans_complete()){
            $return_data['response']= "success";
        }else{
            $return_data['response']= "error";
            $return_data['message']= "Gagal!";
        } 

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function adjustment(){
        $id = $this->uri->segment(3);
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "stok_opname/adjustment";
        $this->load->model('Model_stok_opname');
        // $data['header'] = $this->Model_stok_opname->header_stok_opname_fg($id)->row_array();
        // $data['details'] = $this->Model_stok_opname->list_stok_opname_fg($id)->result();
        $this->load->model('Model_beli_fg');
        $data['list_fg'] = $this->Model_beli_fg->list_fg()->result();

        $this->load->view('layout', $data);
    }

    function getBobbin(){
        // $id = $this->input->post('id');
        $nomor_bobbin = $this->input->post('no_bobbin');

        $this->db->trans_start();
        $bobbin = $this->db->get_where('m_bobbin', ['nomor_bobbin' => $nomor_bobbin])->row();
        $return_data['bobbin']['nomor_bobbin'] = $bobbin->nomor_bobbin;
        $return_data['bobbin']['berat'] = $bobbin->berat;
        $return_data['bobbin']['id'] = $bobbin->id;

        if($this->db->trans_complete()){
            $return_data['response']= "success";
        }else{
            $return_data['response']= "error";
            $return_data['message']= "Gagal!";
        } 

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function saveAdjustment(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $details = $this->input->post('myDetails');
        foreach ($details as $row){
            if($row['fg_id']!=0){
                $this->db->insert('t_gudang_fg', array(
                    'tanggal' => $tgl_input,
                    'jenis_trx' => 0,
                    'jenis_barang_id'=>$row['fg_id'],
                    'bruto'=>$row['bruto'],
                    'berat_bobbin'=>$row['berat_bobbin'],
                    'netto'=>$row['netto'],
                    'nomor_bobbin'=>$row['no_bobbin'],
                    'no_packing'=>$row['no_packing'],
                    'keterangan'=>"STOCKOPNAME ADJUSTMENT ".$tgl_input,
                    'created_at'=>$tanggal,
                    'created_by'=>$user_id,
                    'tanggal_masuk'=>$tgl_input
                ));

                // if(isset($row['bobbin'])){
                //     $updatebobbin = array('status'=>1);
                //     $this->db->where('nomor_bobbin', $row['no_bobbin']);
                //     $this->db->update('m_bobbin', $updatebobbin);
                // }
            }
        }

        // $this->session->set_flashdata('flash_msg', 'Voucher cost berhasil di-create dengan nomor : '.$code);

        if ($this->db->trans_complete()) {
            redirect('index.php/StokOpname/');
        }
    }

    function filter(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "stok_opname/filter";
        // $this->load->model('Model_stok_opname');
        // $data['list_data'] = $this->Model_stok_opname->stok_missing()->result();

        $this->load->view('layout', $data);
    }

    function check($tanggal){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "stok_opname/check";
        $this->load->model('Model_stok_opname');
        $data['list_data'] = $this->Model_stok_opname->stock_missing($tanggal)->result();

        $this->load->view('layout', $data);
    }
}