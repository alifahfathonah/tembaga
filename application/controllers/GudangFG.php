<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GudangFG extends CI_Controller{   
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
        $data['judul']     = "Finish Good";
        $data['content']   = "gudang_fg/index";
        
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->gudang_fg_list()->result();
        
        $this->load->view('layout', $data);  
    }

    function print_gudang_fg(){
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

            $this->load->model('Model_gudang_fg');
            $data['jb'] = $this->Model_gudang_fg->show_data_barang($id)->row_array();
            $data['detailLaporan'] = $this->Model_gudang_fg->view_gudang_fg($id)->result();
            $this->load->view("gudang_fg/print_gudang_fg", $data);
        }else{
            redirect('index.php/GudangFG/index');
        }
    }

    function view_gudang_fg(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id = $this->session->userdata('group_id');

        if($id){
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang Finish Good";
            $data['content']   = "gudang_fg/view_gudang_fg";
            
            $this->load->model('Model_gudang_fg');
            $data['list_data'] = $this->Model_gudang_fg->view_gudang_fg($id)->result();
            
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/GudangFG/view_gudang_fg');
        }
    }

    function produksi_fg(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $tanggal  = date('Y-m-d');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Produksi Finish Good";
        $data['content']   = "gudang_fg/produksi";  

            $tgl=explode("-",$tanggal);
            $tahun=$tgl[0];
            $bulan=$tgl[1];
            // echo $tanggal.'-'.$tahun.'-'.$bulan;die();
        
        $this->load->model('Model_gudang_fg');
        $data['jenis_barang'] = $this->Model_gudang_fg->barang_fg_list()->result();
        $data['packing'] = $this->Model_gudang_fg->packing_fg_list()->result();
        $data['list_data'] = $this->Model_gudang_fg->gudang_fg_produksi_list($bulan,$tahun)->result();
        $this->load->view('layout', $data);  
    }

    function produksi_fg_filter(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');   
        $id     = '01-'.$this->uri->segment(3);     
        $tanggal = date('Y-m-d', strtotime($id));

        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Produksi Finish Good";
        $data['content']   = "gudang_fg/produksi";

            $tgl=explode("-",$tanggal);
            $tahun=$tgl[0];
            $bulan=$tgl[1];
            // echo $tahun;die();
        
        $this->load->model('Model_gudang_fg');
        $data['jenis_barang'] = $this->Model_gudang_fg->barang_fg_list()->result();
        $data['packing'] = $this->Model_gudang_fg->packing_fg_list()->result();
        $data['list_data'] = $this->Model_gudang_fg->gudang_fg_produksi_list($bulan,$tahun)->result();
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
        $data['judul']     = "Finish Good";
        $data['content']   = "finishgood/add";
        
        
        $this->load->view('layout', $data);  
    }

    function save_laporan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->load->model('Model_m_numberings');
        $jenis = $this->input->post('jenis_barang');
        $code = $this->Model_m_numberings->getNumbering('PRD-SDM', $tgl_input);
        $data = array(
                'no_laporan_produksi' => $code,
                'tanggal' => $tgl_input,
                'flag_result' => 0,
                'jenis_barang_id' => $jenis,
                'jenis_packing_id' => $this->input->post('packing'),
                'created_by' => $user_id,
                'created_at' => $tanggal
                );

        if($this->db->insert('produksi_fg',$data)){
            redirect(base_url('index.php/GudangFG/edit_laporan/'.$this->db->insert_id()));
        } else {
            $this->session->set_flashdata('flash_msg', 'Laporan Produksi Finish Good gagal disimpan, silahkan dicoba kembali!');
            redirect(base_url('index.php/GudangFG/produksi_fg'));
        }
    }

    function edit_laporan(){
        $id = $this->uri->segment(3);
        if($id){
            $module_name = $this->uri->segment(1);
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Detail Laporan";

            $this->load->model('Model_gudang_fg');
            $data['header'] = $this->Model_gudang_fg->show_header_laporan($id)->row_array();
            $packing = $this->Model_gudang_fg->show_data_packing($data['header']['jenis_packing_id'])->row_array();
            if($packing['packing']=="BOBBIN"){
                $data['content']   = "gudang_fg/detail_laporan_bobbin";
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            } else if ($packing['packing'] == "KERANJANG") {
                $data['content'] = "gudang_fg/detail_laporan_keranjang";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KERANJANG')->result();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            // } else if ($packing['packing'] == "ROLL") {
            //     $data['content'] = "gudang_fg/detail_laporan_roll";
            //     $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('ROLL')->row_array();
            //     $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            } else if ($packing['packing'] == 'KARDUS' || $packing['packing'] == 'KERANJANG SDM') {
                $data['content'] = "gudang_fg/detail_laporan_rambut";
                $data['packing'] =  $this->Model_gudang_fg->get_bobbin_g($packing['id'])->result();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result();
            } else if ($packing['packing'] == 'BOBBIN PLASTIK') {
                $data['content'] = "gudang_fg/detail_laporan_b600g";
                $data['packing'] = $this->Model_gudang_fg->get_bobbin_g($packing['id'])->result();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result();
            } else {
                $data['content'] = "gudang_fg/detail_laporan_roll";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('ROLL')->result();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result();
            }
            
            $this->load->view('layout', $data);
        }else{
            redirect('index.php/GudangFG/produksi_fg');
        }
    }

    function load_detail_rambut(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $bruto = 0;
        $netto = 0;

        $this->load->model('Model_gudang_fg');
        $myDetail = $this->Model_gudang_fg->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_produksi.'</td>';
            $tabel .= '<td>'.$row->bruto.'</td>';
            $tabel .= '<td>'.$row->berat_bobbin.'</td>';
            $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue disabled"><i class="fa fa-dashboard"></i> Timbang</a></td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->no_packing_barcode.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a>'
                    . '<a href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay"'
                    . 'onclick="printBarcode('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-print"></i> Print Barcode </a></td>';
            $tabel .= '</tr>';        
            $no++;
            $bruto += $row->bruto;
            $netto += $row->netto;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:right;" colspan="2"><strong>Total :</strong></td>';
        $tabel .= '<td>'.number_format($bruto,2,',','.').'</td>';
        $tabel .= '<td colspan="2"></td>';
        $tabel .= '<td style="background-color:green; color:white;">'.number_format($netto,2,',','.').'</td>';
        $tabel .= '<td colspan="2"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function load_detail_roll(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $netto = 0;
        $this->load->model('Model_gudang_fg');
        $myDetail = $this->Model_gudang_fg->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_produksi.'</td>';
            $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue disabled"><i class="fa fa-dashboard"></i> Timbang</a></td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->no_packing_barcode.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
            $netto += $row->netto;
        }

        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:right;" colspan="3"><strong>Total :</strong></td>';
        $tabel .= '<td style="background-color:green; color:white;">'.number_format($netto,2,',','.').'</td>';
        $tabel .= '<td colspan="2"></td>';
        $tabel .= '</tr>';

            
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function get_bobbin(){
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_fg');
        $barang= $this->Model_gudang_fg->show_data_bobbin($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function delete_produksi_fg(){
        $id = $this->uri->segment(3);
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');

        $this->db->trans_start();

        $get = $this->db->query("select pf.id, COALESCE(tbf.id,0) as id_bpb from produksi_fg pf
                left join t_bpb_fg tbf on tbf.produksi_fg_id = pf.id
                where pf.id =".$id)->row_array();

        $this->db->where('id', $get['id']);
        $this->db->delete('produksi_fg');

        $this->db->where('produksi_fg_id', $get['id']);
        $this->db->delete('produksi_fg_detail');

        if($get['id_bpb']>0){
            $this->db->where('id', $get['id_bpb']);
            $this->db->delete('t_bpb_fg');
            echo 'masuk';

            $this->db->where('t_bpb_fg_id', $get['id_bpb']);
            $this->db->delete('t_bpb_fg_detail');
        }

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data berhasil di hapus');
            redirect('index.php/GudangFG/produksi_fg');
        }else{
            $this->session->set_flashdata('flash_msg', 'Data gagal di hapus');
            redirect('index.php/GudangFG/produksi_fg');
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function delete_spb_fg_detail(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $return_data = array();
        $data = array(
                //'flag_result' => 1,
                't_spb_fg_id'=> NULL,
                't_spb_fg_detail_id'=> NULL,
                'nomor_SPB'=> NULL,
                'keterangan'=> NULL,
                'modified_date'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $id);
        if($this->db->update('t_gudang_fg', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB FG! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function load_detail_saved_item(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        
        $this->load->model('Model_gudang_fg'); 
        $myDetail = $this->Model_gudang_fg->load_detail_saved_item($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->no_packing.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->netto;
            $no++;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.$total.'</strong></td>';
        $tabel .= '<td colspan="2"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_gudang_fg');
        $myDetail = $this->Model_gudang_fg->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_produksi.'</td>';
            $tabel .= '<td>'.$row->no_packing_barcode.'</td>';
            $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue disabled"><i class="fa fa-dashboard"></i> Timbang</a></td>';
            $tabel .= '<td>'.$row->bruto.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->nomor_bobbin.'</td>';
            $tabel .= '<td>'.$row->berat_bobbin.'</td>';
            $tabel .= '<td>'.$row->nama_owner.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a>'
                    . '<a href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay"'
                    . 'onclick="printBarcode('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Print Barcode </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td><input type="text" id="nomor_produksi" name="nomor_produksi" class="form-control myline"></td>';
        $tabel .= '<td><input type="text" id="no_packing" value="Auto" name="no_packing" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><a href="javascript:;" onclick="timbang()" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>';
        $tabel .= '<td><input type="text" id="bruto" name="bruto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline" readonly="readonly"/></td>';
        $tabel .= '<td><input type="text" id="no_bobbin" name="no_bobbin" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" onchange="get_bobbin(this.value)"/><input type="hidden" name="id_bobbin" id="id_bobbin"></td>';
        $tabel .= '<td><input type="text" id="berat_bobbin" name="berat_bobbin" class="form-control myline" readonly="readonly"/></td>';
        $tabel .= '<td><input type="text" id="pemilik" name="pemilik" class="form-control myline" readonly="readonly"/></td>';
        
        $tabel .= '<td><input type="text" id="keterangan" name="keterangan" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function load_detail_edit_spb(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $this->load->model('Model_gudang_fg');
        
        $myDetail = $this->Model_gudang_fg->load_spb_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>('.$row->kode.') '.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
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

    function load_spb_fg_detail(){
        $id = $this->input->post('spb_fg_detail_id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        
        $this->load->model('Model_gudang_fg'); 
        $myDetail = $this->Model_gudang_fg->load_spb_fg_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->no_packing.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->keterangan.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->t_spb_fg_detail_id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->total_amount;
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }
    
    function get_uom_spb(){
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_fg');
        $barang= $this->Model_gudang_fg->show_data_barang_spb($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($barang);
    }

    function save_spb_fg_detail(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        
        if($this->db->insert('t_spb_fg_detail', array(
            'tanggal' => $tgl_input,
            't_spb_fg_id'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('barang_id'),
            'uom'=>$this->input->post('uom'),
            'netto' => $this->input->post('netto'),
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

    function save_detail_spb_fg_detail(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $t_spb_fg_id = $this->input->post('t_spb_fg_id');
        $id_spb_fg_detail = $this->input->post('tsfd_detail_id');
        $nomor_SPB = $this->input->post('no_spb');
        $id_packing = $this->input->post('id_packing');
        $keterangan = $this->input->post('keterangan');

        $return_data = array();
        $data = array(
                //'flag_result' => 1,
                't_spb_fg_id'=> $t_spb_fg_id,
                't_spb_fg_detail_id'=> $id_spb_fg_detail,
                'nomor_SPB'=> $nomor_SPB,
                'keterangan'=> $keterangan,
                'modified_date'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $id_packing);
        if($this->db->update('t_gudang_fg', $data)){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus pemenuhan SPB FG! Silahkan coba kembali";
        } 

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function save_detail(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $tgl_input = date("Y-m-d");
        $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

       /*  $this->db->insert('t_spb_fg_detail', array(
            't_spb_fg_detail'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('jenis_barang_id'),
            'jenis_packing_id'=>$this->input->post('no_packing'),
            'netto' => $this->input->post('netto'),
            'berat'=>$this->input->post(NULL),
            'keterangan'=>$this->input->post('keterangan')*/
        $this->db->trans_start();
        $no_bobbin = $this->input->post('no_bobbin');
        $kode_bobbin = substr($no_bobbin, 0,1);
        $urut_bobbin = substr($no_bobbin, 1,4);
        $ukuran = $this->input->post('ukuran');
        $no_packing = $tgl_code.$kode_bobbin.$ukuran.$urut_bobbin;
        
       $this->db->insert('produksi_fg_detail', array(
            'tanggal' => $tgl_input,
            'no_produksi' => $this->input->post('nomor_produksi'),
            'produksi_fg_id'=>$this->input->post('id'),
            'no_packing_barcode'=>$no_packing,
            'bruto'=>$this->input->post('bruto'),
            'netto' => $this->input->post('netto'),
            'berat_bobbin' => $this->input->post('berat_bobbin'),
            'bobbin_id'=>$this->input->post('id_bobbin'),
            'keterangan'=>$this->input->post('keterangan')
        ));

       #update status bobbin
       $this->db->where('id' ,$this->input->post('id_bobbin'));
       $this->db->update('m_bobbin', array(
            'status' => 1,
            'modified_at'=>$tgl_input,
            'modified_by'=>$user_id
       ));

        if ($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }


    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_fg');
        $barang= $this->Model_gudang_fg->show_data_barang($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function print_barcode_test(){
        $id = $this->uri->segment(3);
        if($id){

        $this->load->model('Model_gudang_fg');
        $data = $this->Model_gudang_fg->get_pfd_id($id)->row_array();
        $berat = $data['bruto'] - $data['netto'];
        // $sql_printer = $this->db->query("select * from m_print_barcode_line where id = '23'")->result_array();

        // $codb = explode(',',$sql_printer[0]['string1']);

        // $co = '"'.$data->no_packing_barcode.'"';
        // $codb1 = $codb[0];
        // $codb2 = $codb[1];
        // $codb3 = $codb[2];
        // $codb4 = $codb[3];
        // $codb5 = $codb[4];
        // $codb6 = $codb[5];
        // $codb7 = $codb[6];
        // $codb8 = $codb[7];

        // $this->db->query("update m_print_barcode_line set string1 ='$codb1,$codb2,$codb3,$codb4,$codb5,$codb6,$codb7,$codb8,$co' where id = '23'");

        $file = APPPATH.'../print/barcode_new.prn';
        $current = '';
        $data_printer = $this->db->query("select * from m_print_barcode_line where m_print_barcode_id = 1")->result_array();
        $data_printer[17]['string1'] = 'BARCODE 488,335,"39",41,0,180,2,6,"'.$data['kode'].'"';
        $data_printer[18]['string1'] = 'TEXT 386,289,"ROMAN.TTF",180,1,8,"'.$data['kode'].'"';
        $data_printer[22]['string1'] = 'BARCODE 612,101,"39",41,0,180,2,6,"'.$data['no_packing_barcode'].'"';
        $data_printer[23]['string1'] = 'TEXT 426,55,"ROMAN.TTF",180,1,8,"'.$data['no_packing_barcode'].'"';
        $data_printer[24]['string1'] = 'TEXT 499,260,"4",180,1,1,"'.$data['no_packing_barcode'].'"';
        $data_printer[25]['string1'] = 'TEXT 495,226,"ROMAN.TTF",180,1,14,"'.$data['bruto'].'"';
        $data_printer[26]['string1'] = 'TEXT 495,188,"ROMAN.TTF",180,1,14,"'.$berat.'"';
        $data_printer[27]['string1'] = 'TEXT 495,147,"0",180,14,14,"'.$data['netto'].'"';
        $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['jenis_barang'].'"';
        $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode'].'"';
        $jumlah = count($data_printer);
        for($i=0;$i<$jumlah;$i++){
        $current .= $data_printer[$i]['string1']."\n";
        }
        // file_put_contents($file, $current);
        redirect(base_url().'print/print.php');
            header('Content-Type: application/json');
            echo json_encode($data_printer);
        }else{
            header('Content-Type: application/json');
            echo json_encode(array('message'=> 'Not Found'));
        }
    }

    // BARCODE LAMA YANG DULU
    // function print_barcode_kardus(){
    //     $id = $_GET['id'];
    //     if($id){

    //     $this->load->model('Model_gudang_fg');
    //     $data = $this->Model_gudang_fg->get_pfd_id($id)->row_array();
    //     $berat = $data['bruto'] - $data['netto'];

    //     $current = '';
    //     $data_printer = $this->db->query("select * from m_print_barcode_line where m_print_barcode_id = 1")->result_array();
    //     $data_printer[17]['string1'] = 'BARCODE 488,335,"39",41,0,180,2,6,"'.$data['kode'].'"';
    //     $data_printer[18]['string1'] = 'TEXT 386,289,"ROMAN.TTF",180,1,8,"'.$data['kode'].'"';
    //     $data_printer[22]['string1'] = 'BARCODE 612,101,"39",41,0,180,2,6,"'.$data['no_packing_barcode'].'"';
    //     $data_printer[23]['string1'] = 'TEXT 426,55,"ROMAN.TTF",180,1,8,"'.$data['no_packing_barcode'].'"';
    //     $data_printer[24]['string1'] = 'TEXT 499,260,"4",180,1,1,"'.$data['no_packing_barcode'].'"';
    //     $data_printer[25]['string1'] = 'TEXT 495,226,"ROMAN.TTF",180,1,14,"'.$data['bruto'].'"';
    //     $data_printer[26]['string1'] = 'TEXT 495,188,"ROMAN.TTF",180,1,14,"'.$berat.'"';
    //     $data_printer[27]['string1'] = 'TEXT 495,147,"0",180,14,14,"'.$data['netto'].'"';
    //     $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['jenis_barang'].'"';
    //     $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode'].'"';
    //     $jumlah = count($data_printer);
    //     for($i=0;$i<$jumlah;$i++){
    //     $current .= $data_printer[$i]['string1']."\n";
    //     }
    //     echo "<form method='post' id=\"coba\" action=\"http://localhost:8080/print/print.php\">";
    //     echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
    //     echo "</form>";
    //     echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
    //     }else{
    //         'GAGAL';
    //     }
    // }

    //BARCODE 90*60
    function print_barcode_kardus(){
        $id = $_GET['id'];
        if($id){

        $this->load->model('Model_gudang_fg');
        $data = $this->Model_gudang_fg->get_pfd_id($id)->row_array();
        $berat = $data['bruto'] - $data['netto'];

        $current = '';
        $data_printer = $this->db->query("select * from m_print_barcode_line where m_print_barcode_id = 3")->result_array();
        // print("<pre>".print_r($data_printer,true)."</pre>");
        // die();
        $data_printer[19]['string1'] = 'BARCODE 621,218,"39",144,0,180,2,6,"'.$data['no_packing_barcode'].'"';
        $data_printer[20]['string1'] = 'TEXT 560,64,"2",180,2,2,"'.$data['no_packing_barcode'].'"';
        $data_printer[21]['string1'] = 'TEXT 384,348,"1",180,2,2,"'.$data['nomor_bobbin'].'"';
        $data_printer[22]['string1'] = 'TEXT 426,316,"1",180,2,2,"'.$data['bruto'].'"';
        $data_printer[23]['string1'] = 'TEXT 405,282,"1",180,2,2,"'.$berat.'"';
        $data_printer[24]['string1'] = 'TEXT 423,249,"1",180,2,2,"'.$data['netto'].'"';
        $data_printer[28]['string1'] = 'TEXT 513,440,"1",180,2,2,"'.$data['kode'].'"';
        $data_printer[29]['string1'] = 'TEXT 665,403,"3",180,1,1,"'.$data['jenis_barang'].'"';
        // $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['jenis_barang'].'"';
        // $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode'].'"';
        $jumlah = count($data_printer);
        for($i=0;$i<$jumlah;$i++){
        $current .= $data_printer[$i]['string1']."\n";
        }

        echo "<form method='post' id=\"coba\" action=\"http://localhost:8080/print/print.php\">";
        echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
        echo "</form>";
        echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
        }else{
            'GAGAL';
        }
    }

    function print_barcode_gudangfg(){
        $id = $_GET['id'];
        if($id){

        $this->load->model('Model_gudang_fg');
        $data = $this->Model_gudang_fg->get_gudang_id($id)->row_array();
        $berat = $data['bruto'] - $data['netto'];

        $current = '';
        $data_printer = $this->db->query("select * from m_print_barcode_line where m_print_barcode_id = 3")->result_array();
        // print("<pre>".print_r($data_printer,true)."</pre>");
        // die();
        $data_printer[19]['string1'] = 'BARCODE 621,218,"39",144,0,180,2,6,"'.$data['no_packing'].'"';
        $data_printer[20]['string1'] = 'TEXT 560,64,"2",180,2,2,"'.$data['no_packing'].'"';
        $data_printer[21]['string1'] = 'TEXT 384,348,"1",180,2,2,"'.$data['nomor_bobbin'].'"';
        $data_printer[22]['string1'] = 'TEXT 426,316,"1",180,2,2,"'.$data['bruto'].'"';
        $data_printer[23]['string1'] = 'TEXT 405,282,"1",180,2,2,"'.$berat.'"';
        $data_printer[24]['string1'] = 'TEXT 423,249,"1",180,2,2,"'.$data['netto'].'"';
        $data_printer[28]['string1'] = 'TEXT 513,440,"1",180,2,2,"'.$data['kode'].'"';
        $data_printer[29]['string1'] = 'TEXT 665,403,"3",180,1,1,"'.$data['jenis_barang'].'"';
        // $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['jenis_barang'].'"';
        // $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode'].'"';
        $jumlah = count($data_printer);
        for($i=0;$i<$jumlah;$i++){
        $current .= $data_printer[$i]['string1']."\n";
        }

        echo "<form method='post' id=\"coba\" action=\"http://localhost:8080/print/print.php\">";
        echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
        echo "</form>";
        echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
        }else{
            'GAGAL';
        }
    }

    //BARCODE 90*50
    // function print_barcode_kardus(){
    //     $id = $_GET['id'];
    //     if($id){

    //     $this->load->model('Model_gudang_fg');
    //     $data = $this->Model_gudang_fg->get_pfd_id($id)->row_array();
    //     $berat = $data['bruto'] - $data['netto'];

    //     $current = '';
    //     $data_printer = $this->db->query("select * from m_print_barcode_line where m_print_barcode_id = 4")->result_array();
    //     // print("<pre>".print_r($data_printer,true)."</pre>");
    //     // die();
    //     $data_printer[19]['string1'] = 'BARCODE 618,163,"39",96,0,180,2,6,"'.$data['no_packing_barcode'].'"';
    //     $data_printer[20]['string1'] = 'TEXT 557,56,"2",180,2,2,"'.$data['no_packing_barcode'].'"';
    //     $data_printer[21]['string1'] = 'TEXT 381,295,"4",180,1,1,"'.$data['nomor_bobbin'].'"';
    //     $data_printer[22]['string1'] = 'TEXT 424,263,"4",180,1,1,"'.$data['bruto'].'"';
    //     $data_printer[23]['string1'] = 'TEXT 399,229,"4",180,1,1,"'.$berat.'"';
    //     $data_printer[24]['string1'] = 'TEXT 422,196,"4",180,1,1,"'.$data['netto'].'"';
    //     $data_printer[28]['string1'] = 'TEXT 510,367,"2",180,1,1,"'.$data['kode'].'"';
    //     $data_printer[29]['string1'] = 'TEXT 661,340,"3",180,1,1,"'.$data['jenis_barang'].'"';
    //     // $data_printer[31]['string1'] = 'TEXT 496,373,"2",180,1,1,"'.$data['jenis_barang'].'"';
    //     // $data_printer[32]['string1'] = 'TEXT 497,407,"4",180,1,1,"'.$data['kode'].'"';
    //     $jumlah = count($data_printer);
    //     for($i=0;$i<$jumlah;$i++){
    //     $current .= $data_printer[$i]['string1']."\n";
    //     }

    //     echo "<form method='post' id=\"coba\" action=\"http://localhost:8080/print/print.php\">";
    //     echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
    //     echo "</form>";
    //     echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
    //     }else{
    //         'GAGAL';
    //     }
    // }

    function save_detail_rambut(){
        $return_data = array();
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $this->load->model('Model_m_numberings');

        $code = $this->Model_m_numberings->getNumbering('KARDUS',$tgl_input);

        $first = $this->input->post('no_packing');
        $ukuran = $this->input->post('ukuran');
        $no_packing = $tgl_code.$first.$ukuran.substr($code,12,4);

        // $no_packing = $this->input->post('no_barcode');
        
        $this->db->insert('produksi_fg_detail', array(
            'tanggal' => $tgl_input,
            'produksi_fg_id' =>$this->input->post('id'),
            'no_produksi' => $this->input->post('no_produksi'),
            'no_packing_barcode' =>$no_packing,
            'bruto' => $this->input->post('bruto'),
            'netto' => $this->input->post('netto'),
            'berat_bobbin' => $this->input->post('berat_bobbin'),
            'bobbin_id' =>$this->input->post('id_packing'),
            'keterangan' =>$this->input->post('keterangan')
        ));
        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function save_detail_b600g(){
        $return_data = array();
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $this->load->model('Model_m_numberings');
        $first = $this->input->post('no_packing');
        $count = strlen($first);

        $code = $this->Model_m_numberings->getNumbering($first,$tgl_input);

        $a = $count + 6;
        $ukuran = $this->input->post('ukuran');
        $ukuran = substr($ukuran, 0,3);
        $no_packing = $tgl_code.$first.$ukuran.substr($code,$a,4);
        
        $this->db->insert('produksi_fg_detail', array(
            'tanggal' => $tgl_input,
            'produksi_fg_id' =>$this->input->post('id'),
            'no_produksi' => $this->input->post('no_produksi'),
            'no_packing_barcode' =>$no_packing,
            'bruto' => $this->input->post('bruto'),
            'netto' => $this->input->post('netto'),
            'berat_bobbin' => $this->input->post('berat_bobbin'),
            'bobbin_id' =>$this->input->post('id_packing'),
            'keterangan' =>$this->input->post('keterangan')
        ));
        if ($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    // function save_detail_roll(){
    //     $return_data = array();
    //     $tgl_input = date("Y-m-d");

    //     $this->db->trans_start();
    //     $no_produksi = $this->input->post('nomor_produksi');
    //     $urut_packing = sprintf("%'.04d",(int)$no_produksi);
    //     $tmp_packing = $this->input->post('no_packing');
    //     $kode_packing = substr($tmp_packing, 0,1);
    //     $ukuran = $this->input->post('ukuran');
    //     $no_packing = date("ymd").$kode_packing.$ukuran.$urut_packing;
        
    //     $this->db->insert('produksi_fg_detail', array(
    //         'tanggal' => $tgl_input,
    //         'no_produksi' => $no_produksi,
    //         'produksi_fg_id'=>$this->input->post('id'),
    //         'no_packing_barcode'=>$no_packing,
    //         'bruto'=> $this->input->post('bruto'),
    //         'netto' => $this->input->post('netto'),
    //         'berat_bobbin' => $this->input->post('berat_bobbin'),
    //         'bobbin_id'=>$this->input->post('id_packing')
    //     ));
    //     if ($this->db->trans_complete()){
    //         $return_data['message_type']= "sukses";
    //     }else{
    //         $return_data['message_type']= "error";
    //         $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
    //     }
    //     header('Content-Type: application/json');
    //     echo json_encode($return_data); 
    // }

    function save_detail_roll(){
        $return_data = array();
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));
        $this->db->trans_start();

        // $this->load->model('Model_gudang_fg');
        // $check = $this->Model_gudang_fg->check_urut(3)->row_array();
        // $no_urut = $check['no_urut'];
        // $no_urut = $no_urut + 1;
        // switch (strlen($no_urut)) {
        //     case 1 : $urutan = "00".$no_urut;
        //         break;
        //     case 2 : $urutan = "0".$no_urut;
        //         break;
            
        //     default:
        //         $urutan = $no_urut;
        //         break;
        // }

        $this->load->model('Model_m_numberings');

        // OLD BARCODE
        // $first = substr($this->input->post('no_packing'),0,1);
        // $sec = substr($this->input->post('no_packing'),1,1);
        // $num = $first.$sec;
        // $code = $this->Model_m_numberings->getNumbering($num,$tgl_input);

        // $ukuran = $this->input->post('ukuran');
        // $no_packing = $tgl_code.$first.$ukuran.$sec.substr($code,8,3);

        //NEW BARCODE
        $first = substr($this->input->post('no_packing'),0,2);
        $code = $this->Model_m_numberings->getNumbering($first,$tgl_input);

        $ukuran = $this->input->post('ukuran');
        $no_packing = $tgl_code.$first.$ukuran.substr($code,8,3);

        $this->db->insert('produksi_fg_detail', array(
            'tanggal' => $tgl_input,
            'produksi_fg_id' =>$this->input->post('id'),
            'no_produksi' => $this->input->post('no_produksi'),
            'no_packing_barcode' =>$no_packing,
            'bruto' => $this->input->post('netto'),
            'netto' => $this->input->post('netto'),
            'berat_bobbin' => 0,
            'bobbin_id' =>$this->input->post('id_packing'),
            'keterangan' =>$this->input->post('keterangan')
        ));
        if ($this->db->trans_complete()){
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
        $tanggal = date('Y-m-d');
        $user_id  = $this->session->userdata('user_id');
        $return_data = array();
        $this->db->where('id', $id);
        $key = $this->db->get('produksi_fg_detail')->result();
            foreach ($key as $row) {
                $id_bobbin = $row->bobbin_id;
                $this->db->where('id', $id_bobbin);
                $this->db->update('m_bobbin', array(
                    'status' => 3,
                    'modified_at' => $tanggal,
                    'modified_by' => $user_id
                ));
            }
        $this->db->where('id', $id);
        if($this->db->delete('produksi_fg_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function delete_detail_spb(){
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        if($this->db->delete('t_spb_fg_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item barang! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function bpb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');     
        $user_ppn    = $this->session->userdata('user_ppn');  
        $tanggal = date('m-Y'); 
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        if(null!==$this->uri->segment(3) && null!==$this->uri->segment(4)){
            $s = $this->uri->segment(3);
            $e = $this->uri->segment(4);
        }else{
            $e = date('Y-m-d');
            $s = date('Y-m-d', strtotime('-15 days'));
        }

        $data['content']= "gudang_fg/bpb_list";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->bpb_list($user_ppn,$s,$e)->result();
        $data['jenis_barang'] = $this->Model_gudang_fg->barang_fg_list()->result();

        $this->load->view('layout', $data);
    }

    function bpb_list_filter(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');     
        $user_ppn    = $this->session->userdata('user_ppn');
        $tanggal = $this->uri->segment(3);   
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

            $tgl=explode("-",$tanggal);
            $tahun=$tgl[1];
            $bulan=$tgl[0];

        $data['content']= "gudang_fg/bpb_list";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->bpb_list($user_ppn,$bulan,$tahun)->result();
        $data['jenis_barang'] = $this->Model_gudang_fg->barang_fg_list()->result();

        $this->load->view('layout', $data);
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
        $data['content']   = "Finishgood/send";
        
        
        $this->load->view('layout', $data);  
    }

    function update_laporan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();

            $this->load->model('Model_gudang_fg');
            $id_produksi = $this->input->post('id');
            $cek = $this->Model_gudang_fg->produksi_fg_count($id_produksi)->row_array();

        if($cek['count']==0){
            $this->session->set_flashdata('flash_msg', 'Data belum ada detailnya');
            redirect('index.php/GudangFG/produksi_fg');
        }else{
                #update status produksi FG
                $data = array(
                        'flag_result' => 1,
                        'remarks' => $this->input->post('remarks'),
                        'modified_date'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->where('id', $id_produksi);
                $this->db->update('produksi_fg', $data);
                
                $jenis_barang_id = $this->input->post('jenis_barang_id'); 
                #create bpb ke gundang fg
                $this->load->model('Model_m_numberings');
                $code = $this->Model_m_numberings->getNumbering('BPB-SDM',$tgl_input);
                $data_bpb = array(
                        'no_bpb_fg' => $code,
                        'tanggal' => $tgl_input,
                        'produksi_fg_id' => $id_produksi,
                        'jenis_barang_id' => $jenis_barang_id,
                        'created_at' => $tanggal,
                        'created_by' => $user_id,
                        'status' => 0
                    );
                $this->db->insert('t_bpb_fg',$data_bpb);
                $id_bpb = $this->db->insert_id();

                #create bpb_detail ke gudang fg
                $details = $this->Model_gudang_fg->load_detail($id_produksi)->result();
                foreach ($details as $k => $v) {
                    $this->db->insert('t_bpb_fg_detail',
                                array(
                                    't_bpb_fg_id' => $id_bpb,
                                    'jenis_barang_id' => $jenis_barang_id,
                                    'no_packing_barcode' => $v->no_packing_barcode,
                                    'no_produksi' => $v->no_produksi,
                                    'bruto' => $v->bruto,
                                    'netto' => $v->netto,
                                    'berat_bobbin' => $v->berat_bobbin,
                                    'bobbin_id' => $v->bobbin_id,
                                    'flag_taken' => 0
                                ));
                }


            if($this->db->trans_complete()){   
                $this->session->set_flashdata('flash_msg', 'Data Produksi FG berhasil disimpan beserta Laporan BPB Gudang FG dengan nomor '.$code);
                redirect('index.php/GudangFG/produksi_fg');
            } else {
                $this->session->set_flashdata('flash_msg', 'Data Produksi FG gagal disimpan');
                redirect('index.php/GudangFG/produksi_fg/'.$id_produksi);
            }
        }
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

            $data['content']= "gudang_fg/proses_bpb";
            $this->load->model('Model_gudang_fg');
            $data['header']  = $this->Model_gudang_fg->show_header_bpb($id)->row_array(); 
            $data['details'] = $this->Model_gudang_fg->show_detail_bpb($id)->result();
            if($data['header']['jenis_packing_id']==0){
                $data['packing'] = 0;
            }else{
                $data['packing'] = $this->Model_gudang_fg->show_data_packing($data['header']['jenis_packing_id'])->row_array()['packing'];
            }

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/bpb_list');
        }
    }

    function get_bpb(){
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_fg');
        $bpb= $this->Model_gudang_fg->get_bpb($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($bpb); 
    }

    function update_jb_bpb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $bpb_id = $this->input->post('id');
        $jb = $this->input->post('jenis_barang');
        
        $this->db->trans_start();

        $this->load->model('Model_gudang_fg');
        $bpb= $this->Model_gudang_fg->get_bpb($this->input->post('id'))->row_array();

        if($bpb['produksi_fg_id']>0){
            $this->db->where('id', $bpb['produksi_fg_id']);
            $this->db->update('produksi_fg', array(
                            'jenis_barang_id'=> $jb,
                            'tanggal'=>$tgl_input,
                            'modified_date'=> $tanggal,
                            'modified_by'=>$user_id
            ));

            $this->db->where('id', $bpb['id']);
            $this->db->update('t_bpb_fg', array(
                            'jenis_barang_id'=> $jb,
                            'tanggal'=>$tgl_input,
                            'modified_at'=> $tanggal,
                            'modified_by'=>$user_id
            ));

            $this->db->where('t_bpb_fg_id', $bpb['id']);
            $this->db->update('t_bpb_fg_detail', array(
                            'jenis_barang_id'=> $jb
            ));

            if($bpb['status']==1){
                $this->db->where('t_bpb_fg_id', $bpb['id']);
                $this->db->update('t_gudang_fg', array(
                                'tanggal'=> $tgl_input,
                                'tanggal_masuk'=> $tgl_input,
                                'jenis_barang_id'=> $jb
                ));
            }
        }elseif($bpb['dtt_id']>0){
            $this->db->where('id', $bpb['dtt_id']);
            $this->db->update('dtt', array(
                            'tanggal'=>$tgl_input,
                            'modified'=> $tanggal,
                            'modified_by'=>$user_id
            ));

            $this->db->where('id', $bpb['id']);
            $this->db->update('t_bpb_fg', array(
                            'tanggal'=>$tgl_input,
                            'modified_at'=> $tanggal,
                            'modified_by'=>$user_id
            ));

            if($bpb['status']==1){
                $this->db->where('t_bpb_fg_id', $bpb['id']);
                $this->db->update('t_gudang_fg', array(
                                'tanggal'=> $tgl_input,
                                'tanggal_masuk'=> $tgl_input,
                ));
            }
        }elseif($bpb['dtbj_id']>0){
            $this->db->where('id', $bpb['dtbj_id']);
            $this->db->update('dtbj', array(
                            'tanggal'=>$tgl_input,
                            'modified'=> $tanggal,
                            'modified_by'=>$user_id
            ));

            $this->db->where('id', $bpb['id']);
            $this->db->update('t_bpb_fg', array(
                            'tanggal'=>$tgl_input,
                            'modified_at'=> $tanggal,
                            'modified_by'=>$user_id
            ));

            if($bpb['status']==1){
                $this->db->where('t_bpb_fg_id', $bpb['id']);
                $this->db->update('t_gudang_fg', array(
                                'tanggal'=> $tgl_input,
                                'tanggal_masuk'=> $tgl_input,
                ));
            }
        }
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'BPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat edit BPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangFG/bpb_list');
    }

    function input_ulang_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_fg', array(
                        'status'=> 0,
                        'modified_at'=> $tanggal,
                        'modified_by'=>$user_id
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangFG/view_spb/'.$spb_id);
    }

    function close_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_fg', array(
                        'status'=> 1,
                        'modified_at'=> $tanggal,
                        'modified_by'=>$user_id
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangFG/view_spb/'.$spb_id);
    }

    function save_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_fg', array(
                        'status'=> 3,
                        'modified_at'=> $tanggal,
                        'modified_by'=>$user_id
        ));

        #Create SPB fulfilment
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['no_packing']!=''){   
                $data = array(
                        //'flag_result' => 1,
                        't_spb_fg_id'=> $spb_id,
                        'nomor_SPB'=> $this->input->post('no_spb'),
                        // 'keterangan'=> $this->input->post('keterangan'),
                        'modified_date'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->where('id', $v['id_barang']);
                $this->db->update('t_gudang_fg', $data);
            }
        }

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'SPB sudah di-save. Detail Pemenuhan SPB sudah disimpan');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }                 

       redirect('index.php/GudangFG/view_spb/'.$spb_id);
    }

    function reject_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');

        $this->db->trans_start();

            $this->load->model('Model_gudang_fg');
            $details = $this->Model_gudang_fg->show_detail_spb_fulfilment($spb_id)->result();
            // echo '<pre>';print_r($details);echo'</pre>';
            // die();
            foreach ($details as $v){
                $this->db->update('t_gudang_fg',['jenis_trx'=>0, 't_spb_fg_id'=>NULL, 'nomor_SPB'=>NULL],['id'=>$v->id]);
            }

            $check = $this->Model_gudang_fg->check_spb_reject($spb_id)->row_array();
            if($check['count'] > 0){
                $status = 4;
            }else{
                $status = 0;
            }
            $this->db->update('t_spb_fg',['status'=>$status],['id'=>$spb_id]);

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail Pemenuhan SPB sudah disimpan');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/GudangFG/view_spb/'.$spb_id);
    }

    function reject_approved(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');

        $this->db->trans_start();

            $this->load->model('Model_gudang_fg');
            $details = $this->Model_gudang_fg->show_detail_spb_fulfilment_approved_belum_dikirim($spb_id)->result();
            // echo '<pre>';print_r($details);echo'</pre>';
            // die();
            foreach ($details as $v){
                $this->db->update('t_gudang_fg',['jenis_trx'=>0, 't_spb_fg_id'=>NULL, 'nomor_SPB'=>NULL, 'tanggal_keluar'=>'0000-00-00'],['id'=>$v->id]);
            }

            $check = $this->Model_gudang_fg->check_spb_reject($spb_id)->row_array();
            if($check['count'] > 0){
                $status = 4;
            }else{
                $status = 0;
            }
            $this->db->update('t_spb_fg',['status'=>$status],['id'=>$spb_id]);

            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail Pemenuhan SPB sudah disimpan');                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }
       redirect('index.php/GudangFG/view_spb/'.$spb_id);
    }

    function delSPBSudahDipenuhi(){
        $id = $this->uri->segment(3);
        $id_spb = $this->uri->segment(4);
        
        $data = array(
            'jenis_trx'=>0,
            't_spb_fg_id'=>NULL,
            'nomor_SPB'=>NULL,
            'tanggal_keluar'=>'0000-00-00'
        );
        $this->db->where('id', $id);
        if($this->db->update('t_gudang_fg',$data)){
            redirect('index.php/GudangFG/view_spb/'.$id_spb);
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function delPemenuhan(){
        $id = $this->uri->segment(3);
        $id_spb = $this->uri->segment(4);
        
        $data = array(
            'jenis_trx'=>0,
            't_spb_fg_id'=>NULL,
            'nomor_SPB'=>NULL,
            'tanggal_keluar'=>'0000-00-00'
        );
        $this->db->where('id', $id);
        if($this->db->update('t_gudang_fg',$data)){
            redirect('index.php/GudangFG/view_spb/'.$id_spb);
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tgl_input  = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal_keluar = date('Y-m-d', strtotime($this->input->post('tanggal_keluar')));
        $tanggal = date('Y-m-d H:i:s');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();
        $this->load->model('Model_gudang_fg');
        $data['check'] = $this->Model_gudang_fg->check_spb($spb_id)->row_array();
        if(((int)$data['check']['tot_so']) >= ((int)$data['check']['tot_spb'])){
            $status = 1;
        }else{
            $status = 4;
        }
        
        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_fg', array(
                        'status'=> $status,
                        'keterangan' => $this->input->post('remarks'),
                        'approved_at'=> $tanggal,
                        'approved_by'=>$user_id
        ));

        #Update jenis_trx t_gudang_fg
        $this->db->where('t_spb_fg_id', $spb_id);
        $this->db->where('jenis_trx', 0);
        $this->db->update('t_gudang_fg', array(
                        'jenis_trx'=> 1,
                        'modified_date'=>$tanggal,
                        'modified_by'=>$user_id,
                        'tanggal_keluar'=>$tanggal_keluar
        ));

        if($status = 1 && $this->input->post('jenis_spb')==8){
            $this->load->model('Model_m_numberings');
            $code = $this->Model_m_numberings->getNumbering('DTBJ', $tgl_input);
            $data = array(
                'no_dtbj'=> $code,
                'flag_ppn'=> 0,
                'tanggal'=> $tanggal_keluar,
                'supplier_id'=> 822,
                'spb_id'=> $this->input->post('id'),
                'jenis_packing'=> $this->input->post('jenis_packing_id'),
                'remarks'=> 'Repacking : '.$this->input->post('no_spb'),
                'created'=> $tanggal,
                'created_by'=> $user_id
            );
            $this->db->insert('dtbj', $data);
            $dtbj_id = $this->db->insert_id();
        }
            
            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail SPB sudah disimpan'); 
                if($this->input->post('jenis_spb')==8){
                    redirect('index.php/BeliFinishGood/create_dtbj/'.$dtbj_id);
                }else{
                    redirect('index.php/GudangFG/spb_list');
                }       
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
                    redirect('index.php/GudangFG/spb_list');
            }
    }

    function tambah_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        #Update status SPB
        $this->db->where('id', $spb_id);
        $this->db->update('t_spb_fg', array(
                        'status'=> 4,
                        'modified_at'=> $tanggal,
                        'modified_by'=>$user_id
        ));

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'Silahkan tambah barang');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }                 

       redirect('index.php/GudangFG/view_spb/'.$spb_id);
    }

    function approve_bpb(){
        $bpb_id = $this->input->post('bpb_fg_id');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $return_data = array();
        
        $this->db->trans_start();       
         
            #Update status BPB
            $bpb_update = array(
                    'status'=>1,
                    'tanggal'=> $tgl_input,
                    'keterangan' => $this->input->post('remarks'),
                    'approved_at'=>$tanggal,
                    'approved_by'=>$user_id);

            $this->db->where('id', $bpb_id);
            $this->db->update('t_bpb_fg', $bpb_update);
            
            $detail_push = [];
            
            #Create Inventori FG
            $details = $this->input->post('details');
            $this->load->model('Model_gudang_fg');
                foreach ($details as $k => $v) {  
                    $data_else = array(
                            'tanggal'=> $tgl_input,
                            'flag_ppn'=> $user_ppn,
                            'jenis_trx' => 0, //0 masuk
                            'flag_taken'=>0, // 0 belum diambil
                            't_bpb_fg_id' => $bpb_id,
                            't_bpb_fg_detail_id' => $v['id_bpb_fg_detail'],
                            'jenis_barang_id' => $v['id_jenis_barang'] ,
                            'nomor_BPB' =>$this->input->post('no_bpb'),
                            'no_produksi' => $v['no_produksi'],
                            'no_packing' => $v['no_packing'],
                            'netto' =>$v['netto'],
                            'bruto' =>$v['bruto'],
                            'berat_bobbin' => $v['berat_bobbin'],
                            'bobbin_id' => $v['id_bobbin'],
                            'nomor_bobbin'=> $v['no_bobbin'],
                            'keterangan' => $this->input->post('remarks'),
                            'tanggal_masuk' => $tgl_input,
                            'created_by'=> $user_id,
                            'created_at' => $tanggal
                        );
                    $this->db->insert('t_gudang_fg', $data_else);
                    if($user_ppn == 1){
                        $tgf_id = $this->db->insert_id();
                        $data_id = array('reff1' => $tgf_id);
                        unset($data_else['flag_ppn']);
                        unset($data_else['created_by']);
                        unset($data_else['created_at']);
                        $detail_push[$k] = array_merge($details[$k], $data_id);
                    }
                }
                
                /** API TRANSACTION **/
                if($user_ppn==1 && strpos($this->input->post('remarks'), 'BARANG PO') !== false ){
                    $this->load->helper('target_url');

                    $data_post['bpb_id'] = $bpb_id;
                    $data_post['tgl_input'] = $tgl_input;
                    $data_post['bpb'] = $bpb_update;
                    $data_post['details'] = $detail_push;
                    $detail_post = json_encode($data_post);

                    // print_r($detail_post);
                    // die();

                    $ch = curl_init(target_url().'api/BeliFinishGoodAPI/bpb');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $detail_post);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    $result = json_decode($response, true);
                    curl_close($ch);
                    // print_r($response);
                    // die();
                }
            
            if($this->db->trans_complete()){
                $this->session->set_flashdata("message", "Inventori FG sudah dibuat dan masuk gudang");
            }else{
                $this->session->set_flashdata("message","Pembuatan Inventori FG gagal, silahkan coba lagi!");
            }                  
        
      redirect("index.php/GudangFG/bpb_list");
    }

    function reject_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $id_spb = $this->input->post('header_id');
        
        #Update status t_spb_fg
        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $id_spb);
        $this->db->update('t_spb_fg', $data);

        #Update NULL di t_gudang_fg
        $this->db->where('t_spb_fg_id', $id_spb);
        $this->db->update('t_gudang_fg', array(
                        'jenis_trx'=>0,
                        't_spb_fg_id'=> NULL,
                        't_spb_fg_detail_id'=> NULL,
                        'nomor_SPB'=> NULL,
                        'keterangan'=> NULL,
                        'modified_date'=> $tanggal,
                        'modified_by'=>$user_id
        ));
        
        $this->session->set_flashdata('flash_msg', 'Data SPB FG berhasil direject');
        redirect('index.php/GudangFG/spb_list');
    }

    function reject_bpb(){
        $user_id  = $this->session->userdata('user_id');
        $fg_id = $this->input->post('fg_id');
        $tanggal  = date('Y-m-d H:i:s');

        $this->load->model('Model_gudang_fg');
        $bpb= $this->Model_gudang_fg->get_bpb($this->input->post('header_id'))->row_array();
        // $query = $this->db->query('select *from produksi_fg_detail where produksi_fg_id = '.$fg_id)->result();
        // foreach ($query as $row) {
        //     $this->db->where('id', $row->bobbin_id);
        //     $this->db->update('m_bobbin', array(
        //         'status' => 3
        //     ));
        // }

        if($bpb['dtt_id']>0){
            $this->db->where('id', $bpb['dtt_id']);
            $this->db->update('dtt', array(
                'status'=>9,
                'po_id'=>0
            ));
        }elseif($bpb['dtbj_id']>0){
            $this->db->where('id', $bpb['dtbj_id']);
            $this->db->update('dtbj', array(
                'status'=>9,
                'po_id'=>0,
                'so_id'=>0
            ));
        }

        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('t_bpb_fg', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data BPB FG berhasil direject');
        redirect('index.php/GudangFG/bpb_list');
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
            $this->load->model('Model_gudang_fg');
            $data['barang'] =  $this->Model_gudang_fg->show_barang_fg($id_barang_gudang)->row_array();
            $data['content']= "gudang_fg/kirim_rongsok";
            $this->load->view('layout', $data);
            

        }else{
             redirect('index.php/GudangFG/');
        }
    }

    function save_sendrongsok(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
             
                'tanggal'=> $tgl_input,
                'no_spb'=>$this->input->post('no_spb'),
                'keterangan'=>$this->input->post('keterangan'),
                'dibuat_oleh'=> $user_id,
            );

        $this->db->insert('t_spb_rongsok', $data);
               
           
        redirect('index.php/Finishgood');  
           
    }

    function save_spb_kirim_rongsok(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-FGR', $tgl_input); 
        
        if($code){     
            $this->db->trans_start();
            #insert data spb fg
            $data = array(
                'no_spb'=> $code,
                'tanggal'=> $tgl_input,
                'status'=> 3,
                'keterangan'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );
            $this->db->insert('t_spb_fg', $data);
            $id_spb = $this->db->insert_id();

            #insert data spb fg detail
            $data_detail = array(
                't_spb_fg_id' => $id_spb,
                'tanggal' => $tgl_input,
                'jenis_barang_id'=>$this->input->post('id_jenis_barang'),
                'uom'=>$this->input->post('uom'),
                //'no_packing'=>$this->input->post('no_packing'),
                'netto' => $this->input->post('netto'),
                'keterangan'=>$this->input->post('keterangan')
                );
            $this->db->insert('t_spb_fg_detail',$data_detail);
            $id_spb_detail = $this->db->insert_id();

            $data_gudang = array(
                'flag_taken' => 1,
                't_spb_fg_id'=> $id_spb,
                't_spb_fg_detail_id'=> $id_spb_detail,
                'nomor_SPB'=> $code,
                'keterangan'=> $this->input->post('keterangan'),
                'modified_date'=> $tanggal,
                'modified_by'=> $user_id
            );
            $this->db->where('id', $this->input->post('id_gudang'));
            $this->db->update('t_gudang_fg', $data_gudang);

            $this->db->where('id', $this->input->post('id_bobbin'));
            $this->db->update('m_bobbin', array(
                'status' => 3,
                'modified_at' => $tanggal,
                'modified_by' => $user_id
            ));

            #insert DTR ke gudang rongsok
            $code_DTR = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
               
            $data = array(
                        'no_dtr'=> $code_DTR,
                        'tanggal'=> $tgl_input,
                        'jenis_barang'=> 'RONGSOK',
                        'remarks'=> 'BARANG FG TRANSFER KE RONGSOK ('.$this->input->post('remarks').')',
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
                        //'spb_id'=>$id_spb,
                        //sisa WIP id 8
                        'rongsok_id' => 1,
                        'qty'=> 0,
                        'bruto'=>$this->input->post('bruto'),
                        'netto'=>$this->input->post('netto'),
                        'no_pallete'=>date("dmyHis").$rand,
                        'line_remarks'=>$this->input->post('keterangan')
                    ));
               
            if($this->db->trans_complete()){
                redirect('index.php/GudangFG/');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB FG Kirim Rongsok gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangFG/spb_kirim_rongsok'.$this->input->post('id_gudang'));  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB FG Kirim Rongsok gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangFG/');
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
        if(null!==$this->uri->segment(3) && null!==$this->uri->segment(4)){
            $s = $this->uri->segment(3);
            $e = $this->uri->segment(4);
        }else{
            $e = date('Y-m-d');
            $s = date('Y-m-d', strtotime('-2 months'));
        }

        $data['content']= "gudang_fg/spb_list";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->spb_list($s,$e)->result();

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

        $data['content']= "gudang_fg/add_spb";
        $this->load->model('Model_retur');
        $data['jenis_packing_list'] = $this->Model_retur->jenis_packing_list()->result();
        
        $this->load->view('layout', $data);
    }

    function save_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-FG', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_spb'=> $code,
                'jenis_spb'=> $this->input->post('jenis_spb'),
                'jenis_packing_id'=> $this->input->post('jenis_packing_id'),
                'tanggal'=> $tgl_input,
                'keterangan'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );

            if($this->db->insert('t_spb_fg', $data)){
                redirect('index.php/GudangFG/edit_spb/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangFG/add_spb');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangFG/spb_list');
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

            $data['content']= "gudang_fg/edit_spb";
            $this->load->model('Model_gudang_fg');
            $this->load->model('Model_beli_rongsok');
            $data['rongsok'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $data['header'] = $this->Model_gudang_fg->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_gudang_fg->show_detail_spb($id)->result();
            $data['list_barang'] = $this->Model_gudang_fg->barang_fg_all()->result();
    
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function delete_spb(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('t_spb_fg');            
        }
        $this->session->set_flashdata('flash_msg', 'Data SPB FG berhasil dihapus');
        redirect('index.php/GudangFG/spb_list');
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

            $data['content']= "gudang_fg/view_spb";

            $this->load->model('Model_gudang_fg');
            $data['list_barang'] = $this->Model_gudang_fg->barang_fg_stock_list()->result();
            $data['myData'] = $this->Model_gudang_fg->show_header_spb($id)->row_array();
            $data['myDetail'] = $this->Model_gudang_fg->show_detail_spb($id)->result();
            $data['detailSPB'] = $this->Model_gudang_fg->show_detail_spb_saved($id)->result();
            $data['myDetailSaved'] = $this->Model_gudang_fg->show_detail_spb_fulfilment($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function update_tanggal_keluar(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('update_tanggal_keluar')));
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();

        $details = $this->input->post('myDetails');
        // print_r($details);die();
        foreach ($details as $v) {
            if(isset($v['check']) && $v['check']==1){
                $this->db->where('id', $v['id_detail']);
                $this->db->update('t_gudang_fg', array(
                    'tanggal_keluar'=> $tgl_input
                ));
            }   
        }

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'SPB sudah di-save. Detail Pemenuhan SPB sudah disimpan');                 
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
        }                 

       redirect('index.php/GudangFG/view_spb/'.$spb_id);
    }

    function get_packing(){
        $id = $this->input->post('id');

        $this->load->model('Model_gudang_fg');
        $result = $this->Model_gudang_fg->get_packing($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function get_no_packing(){
        $id = $this->input->post('id');
        $tabel = "";

        $this->load->model('Model_gudang_fg');
        $no_packing = $this->Model_gudang_fg->show_no_packing($id)->result();
        $tabel .= '<select id="packing_1" name="packing_1" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_no_packing_detail(1)">';
            $tabel .= '<option value=""></option>';
            foreach ($no_packing as $value){
                $tabel .= "<option value='".$value->id."'>".$value->no_packing."</option>";
            }
        $tabel .= '</select>';

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    function get_no_packing_detail(){
        $id = $this->input->post('no_packing');

        $this->load->model('Model_gudang_fg');
        $no_packing_detail = $this->Model_gudang_fg->show_no_packing_detail($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($no_packing_detail);
    }

    function get_tsfd_id(){
        $id = $this->input->post('id_spb');
        $jb = $this->input->post('id_barang');

        $this->load->model('Model_gudang_fg');
        $spb_detail = $this->Model_gudang_fg->get_detail_spb($id,$jb)->row_array();

        header('Content-Type: application/json');
        echo json_encode($spb_detail);;
    }

    function update_spb(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();

        $data = array(
                'tanggal'=> $tgl_input,
                'keterangan'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_spb_fg', $data);

        if($this->input->post('jenis_spb')==5){
           #insert DTR ke gudang rongsok
            $this->load->model('Model_m_numberings');
            $code_DTR = $this->Model_m_numberings->getNumbering('DTR', $tgl_input); 
               
            $data = array(
                        'no_dtr'=> $code_DTR,
                        'tanggal'=> $tgl_input,
                        'jenis_barang'=> 'RONGSOK',
                        'supplier_id'=> 255, //gudang barang jadi
                        'remarks'=> 'BARANG FG TRANSFER KE RONGSOK | '.$this->input->post('no_spb'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
            $this->db->insert('dtr', $data);
            $dtr_id = $this->db->insert_id();
            
            #insert DTR_Detail ke gudang rongsok
            $this->load->model('Model_gudang_fg');

            $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));

            $loop = $this->Model_gudang_fg->load_spb_detail($this->input->post('id'))->result();
            foreach ($loop as $row) {
                // $rand = strtoupper(substr(md5(microtime()),rand(0,26),3));
                $code_palette = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);
                $no_pallete= $tgl_code.substr($code_palette,13,4);

                $this->db->insert('dtr_detail', array(
                            'dtr_id'=>$dtr_id,
                            //sisa WIP id 8
                            'rongsok_id' => $this->input->post('rongsok_id'),
                            'qty'=> 1,
                            'bruto'=> $row->netto,
                            'netto'=> $row->netto,
                            'berat_palette'=> 0,
                            'no_pallete'=> $no_pallete,
                            'line_remarks'=> 'Kirim Rongsok dari FG',
                            'tanggal_masuk'=> $tgl_input
                        ));
            }
        }
        
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data SPB FG berhasil disimpan');
            redirect('index.php/GudangFG/view_spb/'.$this->input->post('id'));
        }else{
            $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan');
            redirect('index.php/GudangFG/edit_spb/'.$this->input->post('id'));
        }
    }

    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->helper('tanggal_indo_helper');
            $this->load->model('Model_gudang_fg');
            $data['header']  = $this->Model_gudang_fg->show_header_spb($id)->row_array();
            $data['details'] = $this->Model_gudang_fg->show_detail_spb($id)->result();

            $this->load->view('gudang_fg/print_spb', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function print_spb_fulfilment(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->helper('tanggal_indo_helper');
            $this->load->model('Model_gudang_fg');
            $data['header']  = $this->Model_gudang_fg->show_header_spb($id)->row_array();
            // $data['details'] = $this->Model_gudang_fg->show_detail_spb_print_fulfilment($id)->result();
            $data['details'] = $this->Model_gudang_fg->show_detail_spb_fulfilment($id)->result();

            $this->load->view('gudang_fg/print_spb_fulfilment', $data);
        }else{
            redirect('index.php'); 
        }
    }

    // function print_barcode(){
    //     $id = $this->uri->segment(3);
    //     if($id){

    //     $this->load->model('Model_gudang_fg');
    //     $no_spb = $this->Model_gudang_fg->show_header_spb($id)->row();

    //     $sql_printer = $this->db->query("select * from m_print_barcode_line where id = '23'")->result_array();

    //     $codb = explode(',',$sql_printer[0]['string1']);

    //     $co = '"'.$no_spb->no_spb.'"';
    //     $codb1 = $codb[0];
    //     $codb2 = $codb[1];
    //     $codb3 = $codb[2];
    //     $codb4 = $codb[3];
    //     $codb5 = $codb[4];
    //     $codb6 = $codb[5];
    //     $codb7 = $codb[6];
    //     $codb8 = $codb[7];

    //     $this->db->query("update m_print_barcode_line set string1 ='$codb1,$codb2,$codb3,$codb4,$codb5,$codb6,$codb7,$codb8,$co' where id = '23'");

    //     $file = 'http://localhost/teckwrap/public/prints/barcode_new.prn';
    //     $current = '';
    //     $data_printer = $this->db->query("select * from m_print_barcode_line")->result_array();
    //     $jumlah = count($data_printer);
    //     for($i=0;$i<$jumlah;$i++){
    //     $current .= $data_printer[$i]['string1']."\n";
    //     }
    //     // file_put_contents($file, $current);
    //     echo "<form method='post' id=\"coba\" action=\"http://localhost/teckwrap/public/prints/print.php\">";
    //     echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
    //     echo "</form>";
    //     echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
    //     // redirect('http://localhost/teckwrap/public/prints/print.php?id=cobacobcaobcabo');
    //     }else{
    //         'GAGAL';
    //     }
    // }

    function print_bpb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_gudang_fg');
            $this->load->helper('tanggal_indo_helper');
            $data['header']  = $this->Model_gudang_fg->show_header_bpb($id)->row_array();
            $data['details'] = $this->Model_gudang_fg->show_detail_bpb($id)->result();

            $this->load->view('gudang_fg/print_bpb', $data);
        }else{
            redirect('index.php'); 
        }
    }

    // function laporan_list(){
    //     $module_name = $this->uri->segment(1);
    //     $id = $this->uri->segment(3);
    //     $group_id    = $this->session->userdata('group_id');        
    //     if($group_id != 1){
    //         $this->load->model('Model_modules');
    //         $roles = $this->Model_modules->get_akses($module_name, $group_id);
    //         $data['hak_akses'] = $roles;
    //     }
    //     $data['group_id']  = $group_id;

    //         $data['content']= "gudang_fg/laporan_list";
    //         $i=0;
    //         $this->load->model('Model_gudang_fg'); 
    //         //$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
    //         $comment = $this->Model_gudang_fg->show_laporan();
    //         if($comment->num_rows() > 0)
    //             {
    //                 foreach ($comment->result() as $r)
    //                 {
    //                     //bulan ini
    //                     $data['reg'][$i]['showdate']=$r->showdate;
    //                     $data['reg'][$i]['tanggal']=$r->tanggal;
    //                     // $data['reg'][$i]['jumlah']=$r->jumlah;
    //                     $data['reg'][$i]['bruto_masuk']=$r->bruto_masuk;
    //                     $data['reg'][$i]['netto_masuk']=$r->netto_masuk;
    //                     $data['reg'][$i]['bruto_keluar']=$r->bruto_keluar;
    //                     $data['reg'][$i]['netto_keluar']=$r->netto_keluar;

    //                     //convert tanggal
    //                     $tgl=str_split($r->tanggal,4);
    //                     $tahun=$tgl[0];
    //                     $bulan=$tgl[1];

    //                     if($bulan==12){
    //                       $bulan = 1;
    //                       $tahun = $tahun+1;
    //                     } else {
    //                       $bulan= intval($bulan)+1;
    //                     }
    //                     $i++;
    //                 }
    //             }
    //         $this->load->view('layout', $data);   
    // }

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

        $data['content']= "gudang_fg/laporan_list";
        $this->load->model('Model_gudang_fg'); 
        //$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
        $data['list'] = $this->Model_gudang_fg->show_laporan()->result();
        $this->load->view('layout', $data);   
    }

    function proses_inventory(){
        set_time_limit(1800);
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');

        $bulan = $_GET['b'];
        $tahun = $_GET['t'];
        $jb = 'FG';

        $start = $tahun.'-'.$bulan.'-01';
        $end = date("Y-m-t", strtotime($start));

        // echo $start;die();
        // echo $end;die();

        $before = date('Y-m-d', strtotime('first day of last month', strtotime($start)));

        $this->db->trans_start();
        $this->load->model('Model_gudang_fg');

            $jenis_barang = $this->Model_gudang_fg->barang_fg_list()->result();
            $this->db->where(array(
                'tanggal' => $start,
                'jenis_barang' => $jb
            ));
            $this->db->delete('inventory');
            $no = 0;
            foreach ($jenis_barang as $key => $value) {
                $stok_before = $this->Model_gudang_fg->inventory_stok_before($jb,$before,$value->id)->row_array();
                $t = 1;
                if(empty($stok_before)){
                    $stok_before = $this->Model_gudang_fg->show_kartu_stok_before($start,$end,$value->id)->row_array();
                    $t = 2;
                // $data['stok_before'] = $this->Model_gudang_fg->show_kartu_stok_before($start,$end,$jb_id)->row_array();
                // $data['detailLaporan'] = $this->Model_gudang_fg->show_kartu_stok_detail($start,$end,$jb_id)->result();
                }
                $trx = $this->Model_gudang_fg->show_kartu_stok_detail_inventory($start,$end,$value->id)->row_array();
                if(!empty($stok_before) || !empty($trx)){
                    if($t==1){
                        $stok_awal = $stok_before['stok_akhir'];
                    }else{
                        $stok_awal = $stok_before['netto_masuk']-$stok_before['netto_keluar'];
                    }

                    $stok_awal_next_month = $stok_awal + $trx['netto_masuk'] - $trx['netto_keluar'];
                    if($stok_awal > 0 || $trx['netto_masuk'] > 0 || $trx['netto_keluar'] > 0){
                    // if($value->id==714){
                    //     echo $stok_awal.' | '.$trx['netto_masuk'].' | '.$trx['netto_keluar'].' | '.$t;
                    //     die();
                    // }
                        //stok akhir
                        $this->db->insert('inventory', array(
                            'jenis_barang'=>$jb,
                            'bulan'=>$bulan,
                            'tahun'=>$tahun,
                            'tanggal'=>$start,
                            'jenis_barang_id'=>$value->id,
                            'qty'=> 0,
                            'stok_awal'=>$stok_awal,
                            'netto_masuk'=>((empty($trx['netto_masuk']))? 0: $trx['netto_masuk']),
                            'netto_keluar'=>((empty($trx['netto_keluar']))? 0: $trx['netto_keluar']),
                            'stok_akhir'=>$stok_awal_next_month,
                            'created_at'=>$tanggal,
                            'created_by'=>$user_id
                        ));
                    }
                }
            }
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Laporan Finish Good berhasil diproses !');
            redirect(base_url('index.php/GudangFG/laporan_list'));
        } else {
            $this->session->set_flashdata('flash_msg', 'Laporan Finish Good gagal diproses, silahkan dicoba kembali!');
            redirect(base_url('index.php/GudangFG/laporan_list'));
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

            $tgl=explode('-', $id);
            $tahun=$tgl[0];
            $bulan=$tgl[1];

            $data['tgl'] = array(
                'tahun' => $tahun,
                'bulan' => $bulan
            );
            $data['end'] = date("Y-m-t", strtotime($id));

            $data['content']= "gudang_fg/view_laporan";
            $this->load->model('Model_gudang_fg');
            $data['detailLaporan'] = $this->Model_gudang_fg->show_view_laporan('FG',$id)->result();
            // print_r($data['detailLaporan']);die();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/laporan_list');
        }
    }

    function edit_laporan_bulanan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $ppn         = $this->session->userdata('user_ppn');
        $id          = $this->uri->segment(3);
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudang_fg/edit_laporan";
        $this->load->model('Model_gudang_fg');
        $data['detailLaporan'] = $this->Model_gudang_fg->show_laporan_barang_bulanan('FG',$id)->result();

        $this->load->view('layout', $data);
    }


    function update_laporan_bulanan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
            
            $myDetails = $this->input->post('myDetails');
            // print_r($myDetails);die();
            foreach ($myDetails as $row) {
                $this->db->where('id',$row['id']);
                $this->db->update('inventory', array(
                    'keterangan'=>$row['keterangan']
                ));
            }

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data inventory berhasil disimpan!');
            redirect('index.php/GudangFG/edit_laporan_bulanan/'.$this->input->post('tanggal'));  
        }else{
            $this->session->set_flashdata('flash_msg', 'Data inventory gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/GudangFG/edit_laporan_bulanan/'.$this->input->post('tanggal'));  
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

            $data['content']= "gudang_fg/view_detail_laporan";
            $this->load->model('Model_gudang_fg');
            $data['detailLaporan'] = $this->Model_gudang_fg->show_laporan_detail($bulan,$tahun,$id_barang)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/laporan_list');
        }
    }

    function delete_detail_produksi_bpb(){
        $return_data = array();
        $user_id  = $this->session->userdata('user_id');
        $no_packing = $this->uri->segment(3);
        $id_produksi = $this->uri->segment(4);

        $this->load->model('Model_gudang_fg');
        $cek = $this->Model_gudang_fg->cek_produksi_approve($no_packing)->row_array();
        if($cek['status'] == 1){
            $this->session->set_flashdata('flash_msg', 'Data Sudah di Approve, Tidak bisa di Hapus');
            redirect('index.php/GudangFG/edit_laporan/'.$id_produksi);
        }else{
            $this->db->trans_start();

            $this->db->where('no_packing_barcode', $no_packing);
            $this->db->delete('produksi_fg_detail');

            $this->db->where('no_packing_barcode', $no_packing);
            $this->db->delete('t_bpb_fg_detail');

            if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data berhasil dihapus');
            redirect('index.php/GudangFG/edit_laporan/'.$id_produksi);
            }else{
            $this->session->set_flashdata('flash_msg', 'Data gagal dihapus');
            redirect('index.php/GudangFG/edit_laporan/'.$id_produksi);
            }
        }
    }

    function update_detail_produksi(){
        $return_data = array();
        $tanggal  = date('Y-m-d H:i:s');
        $user_id  = $this->session->userdata('user_id');

        $this->db->trans_start();
        $data = array(
            'bruto'=>$this->input->post('bruto'),
            'netto'=>$this->input->post('netto')
        );

        $this->db->where('no_packing_barcode', $this->input->post('no_packing'));
        $this->db->update('produksi_fg_detail', $data);

        $this->db->where('no_packing_barcode', $this->input->post('no_packing'));
        $this->db->update('t_bpb_fg_detail', $data);

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal meng-update item finish good! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data);     
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

            $tgl=explode('-', $id);
            $tahun=$tgl[0];
            $bulan=$tgl[1];

            $tgl = $tahun.'-'.$bulan.'-01';

            $data['tgl'] = array(
                'tahun' => $tahun,
                'bulan' => $bulan
            );

            $data['jb'] = 'Finish Good';

            $this->load->model('Model_gudang_fg');
            $data['detailLaporan'] = $this->Model_gudang_fg->show_laporan_barang('FG',$id)->result();
            $this->load->view("gudang_fg/print_laporan_bulanan", $data);
        }else{
            redirect('index.php/GudangFG/laporan_list');
        }
    }

    function print_laporan_fg(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');
        $user_id = $this->session->userdata('user_id');
        $tanggal  = $this->uri->segment(3);
        $g  = $this->uri->segment(4);
        $this->load->helper('tanggal_indo');

            $tgl_arr = explode('-', $tanggal);
            $bulan = $tgl_arr[1];
            $tahun = $tgl_arr[0];

            $start = $tanggal;
            $end = date("Y-m-t", strtotime($start));

            $data['start'] = $start;
            $data['end'] = $end;
        $this->load->model('Model_gudang_fg');
            if($g == 5){
                $j=5;
                $o=0;
                $data['g'] = 'FINISH GOOD';
                $data['note_retur'] = $this->Model_gudang_fg->note_pengganti_retur($start,$end)->result();
            }elseif($g == 29){
                $j=29;
                $o=0;
                $data['g'] = 'ALUMUNIUM';
            }elseif($g == 1){
                $j=5;
                $o=2;
                $data['g'] = 'KMP FINISH GOOD';
            }elseif($g == 2){
                $j=29;
                $o=2;
                $data['g'] = 'KMP ALUMUNIUM';
            }elseif($g == 3){
                $j=5;
                $o=1;
                $data['g'] = 'TMS FINISH GOOD';
            }elseif($g == 4){
                $j=29;
                $o=1;
                $data['g'] = 'TMS ALUMUNIUM';
            }elseif($g == 6){
                $j=5;
                $o= 3;
                $data['g'] = 'INDOKA FINISH GOOD';
            }elseif($g == 7){
                $j=29;
                $o= 3;
                $data['g'] = 'INDOKA ALUMUNIUM';
            }

        $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_fg($bulan,$tahun,$start,$end,$g,$j,$o)->result();
        $this->load->view('gudang_fg/print_laporan_fg', $data);
    }

    function print_stok_fg(){
        $this->load->helper('tanggal_indo');
        $this->load->model('Model_gudang_fg');
        $data['detailLaporan'] = $this->Model_gudang_fg->stok_fg_detail()->result();

        $this->load->view('gudang_fg/print_stok_fg', $data);
    }

    function laporan_pemasukan_harian(){
        $module_name = $this->uri->segment(1);
            $group_id    = $this->session->userdata('group_id');
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['content']= "gudang_fg/laporan_pemasukan_harian";

            $this->load->view('layout', $data);
    }

    function laporan_pemasukan(){
        $module_name = $this->uri->segment(1);
            $group_id    = $this->session->userdata('group_id');
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['content']= "gudang_fg/laporan_pemasukan";

            $this->load->view('layout', $data);
    }

    function print_laporan_pemasukan_harian(){

        $tgl_input = date('Y-m-d', strtotime($_GET['ts']));
        $this->load->helper('tanggal_indo');  
        $this->load->model('Model_gudang_fg');
        $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan_harian($tgl_input)->result();

        $this->load->view('gudang_fg/print_laporan_pemasukan_harian', $data);
    }

    function print_laporan_gudang_fg(){
        $l = $_GET['l'];
        $s = date('Y-m-d', strtotime($_GET['ts']));
        $e = date('Y-m-d', strtotime($_GET['te']));
        $this->load->helper('tanggal_indo');  
        $this->load->model('Model_gudang_fg');

        if($l==0){
            $data['header'] = 'Global';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==1){
            $data['header'] = 'Produksi';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==2){
            $data['header'] = 'Global';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan2', $data);
        }elseif($l==3){
            $data['header'] = 'Produksi';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan2', $data);
        }elseif($l==4){
            $data['header'] = 'PO KH';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==5){
            $data['header'] = 'PO KMP';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==6){
            $data['header'] = 'Tolling KH';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==7){
            $data['header'] = 'Tolling KMP';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==9){
            $data['header'] = 'Retur';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==12){
            $data['header'] = 'Repacking';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==14){
            $data['header'] = 'Adjustment';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==18){
            $data['header'] = 'Retur (Produksi)';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
        }elseif($l==19){
            $data['header'] = 'SDM';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pemasukan($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pemasukan', $data);
    //PENGELUARAN
        }elseif($l==8){
            $data['header'] = 'Retur';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }elseif($l==10){
            $data['header'] = 'SDM';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }elseif($l==11){
            $data['header'] = 'Kirim Ke Rongsok';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }elseif($l==13){
            $data['header'] = 'Adjustment';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }elseif($l==15){
            $data['header'] = 'Global';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }elseif($l==16){
            $data['header'] = 'Repacking';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }elseif($l==17){
            $data['header'] = 'Penjualan';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }elseif($l==20){
            $data['header'] = 'Eksternal';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_pengeluaran($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_pengeluaran', $data);
        }
    }

    function print_stok_ukuran_fg(){
        $this->load->helper('tanggal_indo');  
        $this->load->model('Model_gudang_fg');
        $date=date('Y-m-d');
        $m=date('m');
        $y=date('Y');
        $data['detailLaporan'] = $this->Model_gudang_fg->stok_fg_kawat_rambut_jenis()->result();
        $data['detailLaporan2'] = $this->Model_gudang_fg->stok_fg_kawat_halus_jenis()->result();
        $data['detailLaporan3'] = $this->Model_gudang_fg->stok_fg_kawat_besar_jenis()->result();
        $data['detailLaporanRTR'] = $this->Model_gudang_fg->stok_fg_kawat_rambut_rtr()->result();
        $data['detailLaporanRTR2'] = $this->Model_gudang_fg->stok_fg_kawat_halus_rtr()->result();
        $data['detailLaporanRTR3'] = $this->Model_gudang_fg->stok_fg_kawat_besar_rtr()->result();
        $data['header']['penjualan'] = $this->Model_gudang_fg->stok_penjualan_hari($date)->row_array();
        $data['header']['t_penjualan'] = $this->Model_gudang_fg->stok_t_penjualan_hari($date,$m,$y)->row_array();
        $data['header']['8mm'] = $this->Model_gudang_fg->stok_8mm()->row_array();
        $data['header']['95mm'] = $this->Model_gudang_fg->stok_95mm()->row_array();
        $data['header']['76mm'] = $this->Model_gudang_fg->stok_76mm()->row_array();
        $data['header']['26mm'] = $this->Model_gudang_fg->stok_26mm()->row_array();
        $data['stok_beli'] = $this->Model_gudang_fg->stok_fg_beli()->result();

        $this->load->view('gudang_fg/print_stok_fg_jenis', $data);
    }

    function kartu_stok_index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang Finishgood";
        $data['content']   = "gudang_fg/kartu_stok_index";

        $this->load->model('Model_gudang_fg'); 
        $data['list_fg'] = $this->Model_gudang_fg->barang_fg_list()->result();

        $this->load->view('layout', $data);  
    }

    function kartu_stok(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');

        $jb_id = $_GET['r'];
        $start = date('Y/m/d', strtotime($_GET['ts']));
        $end = date('Y/m/d', strtotime($_GET['te']));

            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang FG";

        $this->load->model('Model_beli_fg');
        $data['jb'] = $this->Model_beli_fg->get_jb($jb_id)->row_array();
        $data['start'] = $start;
        $data['end'] = $end;

        $s = explode('/', $start);
        $this->load->model('Model_gudang_fg');

        if($_GET['bl']==0){
            if($jb_id == 0){
            $query = $this->Model_gudang_fg->jb_sisa_available($start,$end)->result();
            // $query = $this->db->query('select i.*, jb.jenis_barang ,jb.kode,jb.uom from inventory i
            //     left join jenis_barang jb on i.jenis_barang_id = jb.id
            //      where i.jenis_barang = "FG" and bulan = '.$s[1].' and tahun = '.$s[0])->result();
            // print_r($query);die();
                foreach ($query as $key => $v) {
                    if(($v->netto_masuk - $v->netto_keluar)>0){
                        $data['loop'][$key]['stok_before'] = get_object_vars($v);
                        $data['loop'][$key]['detailLaporan'] = $this->Model_gudang_fg->show_kartu_stok_detail($start,$end,$v->jenis_barang_id)->result();
                    }
                }
                // print_r($data['loop']);die();
            $this->load->view('gudang_fg/kartu_stok_all', $data);
            }else{
                $data['stok_before'] = $this->Model_gudang_fg->show_kartu_stok_before($start,$end,$jb_id)->row_array();
                $data['detailLaporan'] = $this->Model_gudang_fg->show_kartu_stok_detail($start,$end,$jb_id)->result();
                $this->load->view('gudang_fg/kartu_stok', $data);
            }
        }else{
            $data['stok_before'] = $this->Model_gudang_fg->show_kartu_stok_before($start,$end,$jb_id)->row_array();
            $data['detailLaporan'] = $this->Model_gudang_fg->show_kartu_stok_detail_packing($start,$end,$jb_id)->result();
            $this->load->view('gudang_fg/kartu_stok_packing', $data);
        }
    }
/** SURAT JALAN **/
    function surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        $user_ppn = $this->session->userdata('user_ppn');
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudang_fg/surat_jalan";
        if(null!==$this->uri->segment(3) && null!==$this->uri->segment(4)){
            $s = $this->uri->segment(3);
            $e = $this->uri->segment(4);
        }else{
            $e = date('Y-m-d');
            $s = date('Y-m-d', strtotime('-2 months'));
        }
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->surat_jalan($user_ppn,$s,$e)->result();

        $this->load->view('layout', $data);
    }
    
    function add_surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');    
        $user_ppn    = $this->session->userdata('user_ppn');    
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "gudang_fg/add_surat_jalan";
        
        $this->load->model('Model_sales_order');
        $this->load->model('Model_gudang_fg');
        $data['sj'] = $this->Model_gudang_fg->get_last_sj()->row_array();
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();
        $this->load->view('layout', $data);
    }

    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_sj = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn = $this->session->userdata('user_ppn');
        $jb = $this->input->post('jenis_barang');

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SJ-L', $tgl_input); 
        
        if($jb == 'FG' || $jb == 'WIP' || $jb == 'RONGSOK'){
            $spb_id = $this->input->post('spb_id');
        }else{
            $spb_id = 0;
        }

        if($code){        
            $data = array(
                'no_surat_jalan'=> $code,
                'tanggal'=> $tgl_input,
                'spb_id'=> $spb_id,
                'jenis_barang'=>$jb,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'status'=>0,
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('t_surat_jalan', $data)){
                redirect('index.php/GudangFG/edit_surat_jalan/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangFG/surat_jalan');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangFG/surat_jalan');
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

            $this->load->model('Model_gudang_fg');
            $this->load->model('Model_sales_order');
            $data['header'] = $this->Model_gudang_fg->show_header_sj($id)->row_array(); 
            $jenis = $data['header']['jenis_barang'];
            $spb_id = $data['header']['spb_id'];
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();
            if($jenis=='LAIN'){
                $data['jenis_barang'] = $this->Model_sales_order->list_barang_sp()->result();
            $data['content']= "gudang_fg/edit_surat_jalan";
            }elseif ($jenis=='AMPAS') {
                $this->load->model('Model_beli_rongsok');
                $data['jenis_barang'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $data['content']= "gudang_fg/edit_surat_jalan";
                // print_r($data['jenis_barang']);die();
            }elseif($jenis == 'FG'){
                $data['list_produksi'] = $this->Model_gudang_fg->list_item_sj_fg($spb_id)->result();
                $data['jenis_barang'] = $this->Model_gudang_fg->barang_fg_list($spb_id)->result();
                $data['content']= "gudang_fg/edit_surat_jalan2";
            }else if($jenis == 'WIP'){
                $this->load->model('Model_gudang_wip');
                $data['list_produksi'] = $this->Model_gudang_fg->list_item_sj_wip($spb_id)->result();
                $data['jenis_barang'] = $this->Model_gudang_wip->jenis_barang_list($spb_id)->result();
                $data['content']= "gudang_fg/edit_surat_jalan2";
            }else if($jenis == 'RONGSOK'){
                $data['list_produksi'] = $this->Model_gudang_fg->list_item_sj_rsk($spb_id)->result();
                $this->load->model('Model_beli_rongsok');
                $data['jenis_barang'] = $this->Model_gudang_fg->show_data_rongsok()->result();
                $data['content']= "gudang_fg/edit_surat_jalan2";
            }

            $jenis = $data['header']['jenis_barang'];
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/surat_jalan');
        }
    }

    function view_surat_jalan(){
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

            $data['content']= "gudang_fg/view_sj";
            $this->load->model('Model_gudang_fg');
            $this->load->model('Model_sales_order');
            $data['header'] = $this->Model_gudang_fg->show_header_sj($id)->row_array(); 
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['type_kendaraan_list'] = $this->Model_sales_order->type_kendaraan_list()->result();

            $jenis = $data['header']['jenis_barang'];
            $soid = $data['header']['sales_order_id'];
            if($jenis == 'FG'){
                $data['list_sj'] = $this->Model_sales_order->load_view_sjd($id)->result();
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_in_so($soid)->result();
            }else if($jenis == 'WIP'){
                $data['list_sj'] = $this->Model_sales_order->load_detail_surat_jalan_wip($id)->result();
                $data['jenis_barang'] = $this->Model_sales_order->jenis_barang_in_so($soid)->result();
            }else if($jenis == 'LAIN'){
                $data['list_sj'] = $this->Model_sales_order->load_detail_surat_jalan_lain($id)->result();
                $data['jenis_barang'] = $this->Model_sales_order->rongsok_in_so($soid)->result();
            }else{
                $data['list_sj'] = $this->Model_sales_order->load_detail_surat_jalan_rsk($id,$soid)->result();
                $data['jenis_barang'] = $this->Model_sales_order->rongsok_in_so($soid)->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/surat_jalan');
        }
    }

    function delete_surat_jalan(){
        $id = $this->uri->segment(3);
        $this->db->trans_start();

        $this->db->where('id', $id);
        $this->db->delete('t_surat_jalan');

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Surat Jalan berhasil di hapus');
            redirect('index.php/GudangFG/surat_jalan');
        }else{
            $this->session->set_flashdata('flash_msg', 'Surat Jalan gagal dihapus');
            redirect('index.php/GudangFG/surat_jalan');
        }
    }

    function load_detail_sj(){
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        
        $tabel = "";
        $no    = 1;
        $total_qty = 0;
        $total = 0;
        $bruto = 0;
        $berat = 0;
        $netto = 0;
        
        $this->load->model('Model_gudang_fg');  
        $myDetail = $this->Model_gudang_fg->load_detail_sj($id)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>('.$row->kode.') '.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            if($jenis=='LAIN'){
                $tabel .= '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
            }elseif($jenis=='AMPAS'){
                $tabel .= '<td style="text-align:right">'.number_format($row->bruto,2,',','.').'</td>';
                $tabel .= '<td style="text-align:right">'.number_format($row->berat,2,',','.').'</td>';
                $tabel .= '<td></td>';
                $tabel .= '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
                $bruto += $row->bruto;
                $berat += $row->berat;
            }
            $tabel .= '<td style="text-align:right">'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $netto += $row->netto;
            $no++;
        }
        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total </strong></td>';
        if($jenis=='LAIN'){
            $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,2,',','.').'</strong></td>';
        }elseif($jenis=='AMPAS'){
            $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($bruto,2,',','.').'</strong></td>';
            $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($berat,2,',','.').'</strong></td>';
            $tabel .= '<td></td>';
            $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,2,',','.').'</strong></td>';
        }
        $tabel .= '<td colspan="2"></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function save_detail_sj(){
        $return_data = array();
        $tanggal  = date('Y-m-d H:i:s');
        $user_id  = $this->session->userdata('user_id');
        $spb = $this->input->post('no_spb');
        $jenis = $this->input->post('jenis');
        // $netto = str_replace('.', '',$this->input->post('netto'));
        $netto = str_replace(',', '',$this->input->post('netto'));

        $this->db->trans_start();
        if($jenis=='LAIN'){
            $data_sj = array(
                't_sj_id'=>$this->input->post('id'),
                'gudang_id'=>0,
                'jenis_barang_id'=>$this->input->post('barang_id'),
                'qty'=>1,
                'netto'=>$this->input->post('netto'),
                'line_remarks'=>$this->input->post('keterangan'),
                'created_by'=>$user_id,
                'created_at'=>$tanggal
            );
        }elseif($jenis=='AMPAS'){
            $data_sj = array(
                't_sj_id'=>$this->input->post('id'),
                'gudang_id'=>0,
                'jenis_barang_id'=>$this->input->post('barang_id'),
                'qty'=>1,
                'bruto'=>$this->input->post('bruto'),
                'berat'=>$this->input->post('berat'),
                'netto'=>$this->input->post('netto'),
                'line_remarks'=>$this->input->post('keterangan'),
                'created_by'=>$user_id,
                'created_at'=>$tanggal
            );
        }
        $this->db->insert('t_surat_jalan_detail',$data_sj);
        // print_r($data_so_detail);
        // die();
        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item rongsok! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail_sj(){
        $id = $this->input->post('id');// t_sales_order_detail id
        $jenis = $this->input->post('jenis');// jenis barang FG/WIP/RONGSOK

        $this->db->trans_start();

        $return_data = array();
            $this->db->where('id', $id);
            $this->db->delete('t_surat_jalan_detail');

        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');

        if(!empty($this->input->post('spb_id'))){
        #Insert Surat Jalan
        $details = $this->input->post('details');

            foreach ($details as $v) {
                if($v['id_barang']!=''){
                    if($jenis=='FG'){// BARANG FINISH GOOD
                        $this->db->insert('t_surat_jalan_detail', array(
                            't_sj_id'=>$this->input->post('id'),
                            'gudang_id'=>$v['id_barang'],
                            'jenis_barang_id'=>$v['jenis_barang_id'],
                            'jenis_barang_alias'=>$v['barang_alias_id'],
                            'no_packing'=>$v['no_packing'],
                            'qty'=>'1',
                            'bruto'=>$v['bruto'],
                            'berat'=>$v['berat'],
                            'netto'=>$v['netto'],
                            'nomor_bobbin'=>$v['bobbin'],
                            'created_by'=>$user_id,
                            'created_at'=>$tanggal
                        ));
                    }else if($jenis=='WIP'){//BARANG WIP
                        $this->db->insert('t_surat_jalan_detail', array(
                            't_sj_id'=>$this->input->post('id'),
                            'gudang_id'=>$v['id_barang'],
                            'jenis_barang_id'=>$v['jenis_barang_id'],
                            'no_packing'=>0,
                            'qty'=>$v['qty'],
                            'bruto'=>0,
                            'berat'=>0,
                            'netto'=>$v['netto'],
                            'nomor_bobbin'=>0,
                            'created_by'=>$user_id,
                            'created_at'=>$tanggal
                        ));
                    }else if($jenis=='RONGSOK'){
                        $this->db->insert('t_surat_jalan_detail', array(
                            't_sj_id'=>$this->input->post('id'),
                            'gudang_id'=>$v['id_barang'],
                            'jenis_barang_id'=>$v['jenis_barang_id'],
                            'jenis_barang_alias'=>$v['barang_alias_id'],
                            'no_packing'=>$v['no_palette'],
                            'qty'=>'1',
                            'bruto'=>$v['bruto'],
                            'berat'=>$v['berat_palette'],
                            'netto'=>$v['netto'],
                            'nomor_bobbin'=>0,
                            'created_by'=>$user_id,
                            'created_at'=>$tanggal
                        ));
                    }
                }
            }
        }

        $data = array(
                'tanggal'=> $tgl_input,
                'status'=> 0,
                'm_type_kendaraan_id'=>$this->input->post('m_type_kendaraan_id'),
                'no_kendaraan'=>$this->input->post('no_kendaraan'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_surat_jalan', $data);

        $this->session->set_flashdata('flash_msg', 'Data surat jalan berhasil disimpan');
        redirect('index.php/GudangFG/surat_jalan');
    }

    function reject_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $sjid = $this->input->post('sj_id');
        
        #Update status t_surat_jalan
        $data = array(
                'status'=> 9,
                'rejected_at'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $sjid);
        $this->db->update('t_surat_jalan', $data);
        
        $this->db->where('t_sj_id', $sjid);
        $this->db->delete('t_surat_jalan_detail');
        
        $this->session->set_flashdata('flash_msg', 'Surat jalan berhasil direject');
        redirect('index.php/GudangFG/surat_jalan');
    }

    function approve_surat_jalan(){
        $sjid = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $user_ppn = $this->session->userdata('user_ppn');
        $flag_sj = 0;
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $so_id = $this->input->post('so_id');
        $custid = $this->input->post('id_customer');
        $jenis = $this->input->post('jenis_barang');

        $this->db->trans_start();

        $this->load->model('Model_sales_order');
        #set flag taken
        $loop = $this->Model_sales_order->tsj_detail_only($sjid)->result();
        if ($jenis == 'FG') {
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_gudang_fg', array('flag_taken' => 1, 't_sj_id'=> $sjid, 'tanggal_keluar'=>$tgl_input));
            }
        } else if ($jenis == 'WIP') {
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_gudang_wip', array('flag_taken' => 1));
            }
        } else if ($jenis == 'RONGSOK'){
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('dtr_detail', array('so_id' => $so_id, 'flag_sj' => $sjid, 'tanggal_keluar'=>$tgl_input));
            }
        } else if ($jenis == 'AMPAS'){
            foreach ($loop as $row) {
                $this->db->where('id', $row->gudang_id);
                $this->db->update('t_spb_ampas_fulfilment', array('flag_taken' => 1));
            }
        }

        $data = array(
                'status' => 1,
                'approved_at'=> $tanggal,
                'approved_by'=> $user_id
            );

        $this->db->where('id', $sjid);
        $this->db->update('t_surat_jalan', $data);

        if($this->db->trans_complete()){    
            $this->session->set_flashdata('flash_msg', 'Surat jalan sudah di-approve. Detail Surat jalan sudah disimpan');            
        }else{
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Surat Jalan, silahkan coba kembali!');
        }             
        
       redirect('index.php/GudangFG/surat_jalan');
    }

    function print_surat_jalan(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_sales_order');
            $this->load->helper('tanggal_indo');
            $data['header']  = $this->Model_sales_order->show_header_sj($id)->row_array();
            $soid = $data['header']['sales_order_id'];
            $jenis = $data['header']['jenis_barang'];
            if($jenis=='LAIN'){
                $data['details'] = $this->Model_sales_order->load_detail_surat_jalan_lain($id)->result();
                $this->load->view('gudang_fg/print_sj_lain', $data);
            }else if($jenis=='AMPAS'){
                $data['details'] = $this->Model_sales_order->load_detail_surat_jalan_rsk($id,$soid)->result();
                $this->load->view('gudang_fg/print_sj_ampas', $data);
            }
        }else{
            redirect('index.php'); 
        }
    }

    function spb_all(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudang_fg/spb_all";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->spb_all()->result();

        $this->load->view('layout', $data);
    }

    function add_spb_all(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "gudang_fg/add_spb_all";

        $this->load->view('layout', $data);
    }
    
    function save_spb_all(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');

        $this->load->model('Model_m_numberings');
        if($jenis == 'FG'){
            $code = $this->Model_m_numberings->getNumbering('SPB-FG', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb'=> $code,
                    'tanggal'=> $tgl_input,
                    'jenis_spb'=> 13,
                    'flag_tolling'=> 0,
                    'keterangan'=>$this->input->post('remarks'),
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('t_spb_fg', $data)){
                    redirect('index.php/GudangFG/edit_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Retur/create_request_barang');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Retur/request_barang_list');
            }
        }else if($jenis == 'WIP'){
            $code = $this->Model_m_numberings->getNumbering('SPB-WIP', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb_wip'=> $code,
                    'tanggal'=> $tgl_input,
                    'flag_produksi'=> 13,
                    'flag_tolling'=> 0,
                    'keterangan'=>$this->input->post('remarks'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('t_spb_wip', $data)){
                    redirect('index.php/GudangWIP/edit_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB WIP gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Retur/create_request_barang');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB FG gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Retur/request_barang_list');
            }
        }else if($jenis == 'RONGSOK'){
            $code = $this->Model_m_numberings->getNumbering('SPB-RSK', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb'=> $code,
                    'tanggal'=> $tgl_input,
                    'jenis_barang'=>1,
                    'jenis_spb'=> 13,//JENIS SPB SJ Lain
                    'flag_tolling'=> 0,
                    'jumlah'=> $this->input->post('jumlah_rsk'),
                    'remarks'=>$this->input->post('remarks'),
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('spb', $data)){
                    redirect('index.php/Ingot/add_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Retur/create_request_barang');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Retur/request_barang_list');
            }
        }else if($jenis == 'AMPAS'){
            $code = $this->Model_m_numberings->getNumbering('SPB-AMP', $tgl_input); 
            if($code){        
                $data = array(
                    'no_spb_ampas'=> $code,
                    'tanggal'=> $tgl_input,
                    'flag_tolling'=> 0,
                    'keterangan'=>$this->input->post('remarks'),
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id
                );

                if($this->db->insert('t_spb_ampas', $data)){
                    redirect('index.php/PengirimanAmpas/edit_spb/'.$this->db->insert_id());  
                }else{
                    $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, silahkan dicoba kembali!');
                    redirect('index.php/Retur/create_request_barang');  
                }            
            }else{
                $this->session->set_flashdata('flash_msg', 'Data SPB Rongsok gagal disimpan, penomoran belum disetup!');
                redirect('index.php/Retur/request_barang_list');
            }
        }
    }

    function get_spb_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_fg');
        $data = $this->Model_gudang_fg->get_spb_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_spb;
        } 
        print form_dropdown('spb_id', $arr_so);
    }

    function laporan_eksternal_sj(){
        $module_name = $this->uri->segment(1);
            $group_id    = $this->session->userdata('group_id');
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['content']= "gudang_fg/laporan_eksternal_sj";

            $this->load->view('layout', $data);
    }

    function print_laporan_eksternal_sj(){
        $l = $_GET['l'];
        $s = date('Y-m-d', strtotime($_GET['ts']));
        $e = date('Y-m-d', strtotime($_GET['te']));
        $this->load->helper('tanggal_indo');  
        $this->load->model('Model_gudang_fg');

        if($l==1){
            $data['header'] = 'Global';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_eksternal_sj($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_eksternal_sj', $data);
        }elseif($l==2){
            $data['header'] = 'Finish Good';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_eksternal_sj($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_eksternal_sj', $data);
        }elseif($l==3){
            $data['header'] = 'WIP';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_eksternal_sj($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_eksternal_sj', $data);
        }elseif($l==4){
            $data['header'] = 'Rongsok';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_eksternal_sj($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_eksternal_sj', $data);
        }elseif($l==5){
            $data['header'] = 'Ampas';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_eksternal_sj($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_eksternal_sj', $data);
        }elseif($l==6){
            $data['header'] = 'Lain-Lain';
            $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_eksternal_sj($s,$e,$l)->result();
            $this->load->view('gudang_fg/print_laporan_eksternal_sj', $data);
        }
    }

    function laporan_produksi_fg(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Gudang FG";
        $data['content']   = "gudang_fg/laporan_produksi_fg";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->gudang_floor_produksi()->result();
        $data['jb'] = $this->Model_gudang_fg->barang_fg_all()->result();

        $this->load->view('layout', $data);  
    }

    function print_laporan_produksi_fg(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');

        $jb_id = $_GET['l'];
        $start = date('Y-m-d', strtotime($_GET['ts']));
        $end = date('Y-m-d', strtotime($_GET['te']));
        // echo $start;die();

            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;
            $data['judul']     = "Gudang FG";
            $this->load->helper('tanggal_indo');

        $data['start'] = $start;
        $data['end'] = $end;
        $first_day = date('Y-m-01', strtotime('+1 month', strtotime($start)));
        $last_day =date("Y-m-t", strtotime('-1 day', strtotime($start)));
        // echo $last_day;die();

            $this->load->model('Model_gudang_fg');
            if($jb_id == 0){
                $data['detailLaporan'] = $this->Model_gudang_fg->print_laporan_produksi_fg($start,$end,$first_day)->result();
                $this->load->view('gudang_fg/print_laporan_produksi_fg', $data);
            }elseif($jb_id == 2){
                $data['check'] = $this->Model_gudang_wip->cek_rolling_bu($start,$end,$jb_id)->result();
                $data['detailLaporan'] = $this->Model_gudang_wip->print_laporan_masak($start,$end,$jb_id)->result();
                $data['a'] = $this->Model_gudang_wip->get_wip_awal($start)->row_array();
                $data['b'] = $this->Model_gudang_wip->get_wip_akhir($start,$end)->row_array();
                $data['ia'] = $this->Model_gudang_wip->get_floor_produksi($last_day)->row_array();
                $data['ib'] = $this->Model_gudang_wip->get_floor_produksi($end)->row_array();
                $data['tr'] = $this->Model_gudang_wip->get_tali_rolling($start,$end)->row_array();
                $this->load->view('gudangwip/print_laporan_masak_rolling', $data);
            }
    }

    function save_stok_laporan(){
        $user_id  = $this->session->userdata('user_id');
        $user_ppn  = $this->session->userdata('user_ppn');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $id = $this->input->post('jenis_barang_id');

        $this->load->model('Model_gudang_fg');
        $cek = $this->Model_gudang_fg->get_gudang_produksi($tgl_input,$this->input->post('jenis_barang_id'),1)->row_array();
        if(empty($cek)){
            $this->db->trans_start();

                $this->db->insert('t_gudang_produksi', array(
                    'jenis'=>1,
                    'tanggal'=>$tgl_input,
                    'jenis_barang_id'=>$id,
                    'netto'=>$this->input->post('netto'),
                    'created_by'=> $user_id,
                    'created_at'=> $tanggal
                ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Stok Awal Berhasil di Input');                
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create laporan stok, silahkan coba kembali!');
            }
        }else{
            $this->session->set_flashdata('flash_msg', 'Stok Awal Sudah Pernah di Input'); 
        }
            redirect('index.php/GudangFG/laporan_produksi_fg');
    }

    function edit_stok(){
        $id = $this->input->post('id');
        $this->load->model('Model_gudang_fg');
        $data = $this->Model_gudang_fg->edit_stok($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }

    function delete_stok(){
        $user_id  = $this->session->userdata('user_id');
        $id = $this->uri->segment(3);

        $this->db->trans_start();
        if($id){
            $this->db->where('id', $id);
            $this->db->delete('t_gudang_produksi');

            if($this->db->trans_complete()){
                redirect('index.php/GudangFG/laporan_produksi_fg');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data Floor Produksi berhasil dihapus, silahkan dicoba kembali!');
                redirect('index.php/GudangFG/laporan_produksi_fg');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data Floor Produksi gagal disimpan, penomoran belum disetup!');
            redirect('index.php/GudangFG/laporan_produksi_fg');
        }
    }

    function update_stok_laporan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $id = $this->input->post('id');

            $this->db->trans_start();
            $this->db->where('id', $id);
            $this->db->update('t_gudang_produksi', array(
                'tanggal'=>$tgl_input,
                'jenis_barang_id'=>$this->input->post('jenis_barang_id'),
                'netto'=>$this->input->post('netto'),
                'created_by'=> $user_id,
                'created_at'=> $tanggal
            ));

            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Data Floor Produksi berhasil disimpan!');
                redirect('index.php/GudangFG/laporan_produksi_fg');  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data Floor Produksi gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/GudangFG/laporan_produksi_fg');  
            }
    }
}