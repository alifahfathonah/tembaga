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

    function produksi_fg(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['judul']     = "Produksi Finish Good";
        $data['content']   = "gudang_fg/produksi";
        
        $this->load->model('Model_gudang_fg');
        $data['jenis_barang'] = $this->Model_gudang_fg->barang_fg_list()->result();
        $data['packing'] = $this->Model_gudang_fg->packing_fg_list()->result();
        $data['list_data'] = $this->Model_gudang_fg->gudang_fg_produksi_list()->result();
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
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('PRD-SDM', $tgl_input);
        $jenis = $this->input->post('jenis_barang');
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
            $packing = $this->Model_gudang_fg->show_data_packing($data['header']['jenis_packing_id'])->row_array()['packing'];
            if($packing=="BOBBIN"){
                $data['content']   = "gudang_fg/detail_laporan_bobbin";
            } else if ($packing == "KERANJANG") {
                $data['content'] = "gudang_fg/detail_laporan_keranjang";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KERANJANG')->result();
            } else if ($packing == "ROLL") {
                $data['content'] = "gudang_fg/detail_laporan_roll";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('ROLL')->row_array();
            } else {
                $data['content'] = "gudang_fg/detail_laporan_rambut";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KARDUS')->result();
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
        $this->load->model('Model_gudang_fg');
        $myDetail = $this->Model_gudang_fg->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue disabled"><i class="fa fa-dashboard"></i> Timbang</a></td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->no_packing_barcode.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="no_packing" value="Auto" name="no_packing" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function load_detail_roll(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
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
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td><input type="text" id="nomor_produksi" name="nomor_produksi" maxlength="4" class="form-control myline"></td>';
        $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="no_packing" value="Auto" name="no_packing" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
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

    function delete_spb_fg_detail(){
        $id = $this->input->post('id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $return_data = array();
        $data = array(
                //'flag_result' => 1,
                't_spb_fg_id'=>NULL,
                't_spb_fg_detail_id'=> NULL,
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
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        $tabel .= '<tr>';
        $tabel .= '<td style="text-align:center">'.$no.'</td>';
        $tabel .= '<td><input type="text" id="nomor_produksi" name="nomor_produksi" class="form-control myline"></td>';
        $tabel .= '<td><input type="text" id="no_packing" value="Auto" name="no_packing" class="form-control myline" readonly="readonly"></td>';
        $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>';
        $tabel .= '<td><input type="text" id="bruto" name="bruto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline"/></td>';
        $tabel .= '<td><input type="text" id="no_bobbin" name="no_bobbin" class="form-control myline" onchange="get_bobbin(this.value)"/><input type="hidden" name="id_bobbin" id="id_bobbin"></td>';
        $tabel .= '<td><input type="text" id="berat_bobbin" name="netto" class="form-control myline" readonly="readonly"/></td>';
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
        $list_barang = $this->Model_gudang_fg->barang_fg_list()->result();
        
        $myDetail = $this->Model_gudang_fg->load_spb_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
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
        $tabel .= '<td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" '
                . 'onkeyup="this.value = this.value.toUpperCase()"></td>';        
        $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
                . '<i class="fa fa-plus"></i> Tambah </a></td>';
        $tabel .= '</tr>';

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
        $tabel = "";

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
        $tanggal  = date('Y-m-d h:m:s');
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
        $tgl_input = date("Y-m-d");

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
        $no_packing = date("ymd").$kode_bobbin.$ukuran.$urut_bobbin;
        
       $this->db->insert('produksi_fg_detail', array(
            'tanggal' => $tgl_input,
            'no_produksi' => $this->input->post('nomor_produksi'),
            'produksi_fg_id'=>$this->input->post('id'),
            'no_packing_barcode'=>$no_packing,
            'bruto'=>$this->input->post('bruto'),
            'netto' => $this->input->post('netto'),
            'bobbin_id'=>$this->input->post('id_bobbin'),
            'keterangan'=>$this->input->post('keterangan')
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

    function save_detail_rambut(){
        $return_data = array();
        $tgl_input = date("Y-m-d");

        $this->db->trans_start();
        $no_packing = $this->input->post('no_packing');
        $kode_packing = substr($no_packing, 0,1);
        $urut_packing = substr($no_packing, 2,4);
        $ukuran = $this->input->post('ukuran');
        $no_packing = date("ymd").$kode_packing.$ukuran.$urut_packing.rand(1,9);
        
        $this->db->insert('produksi_fg_detail', array(
            'tanggal' => $tgl_input,
            'produksi_fg_id'=>$this->input->post('id'),
            'no_packing_barcode'=>$no_packing,
            'netto' => $this->input->post('netto'),
            'bobbin_id'=>$this->input->post('id_packing'),
            'keterangan'=>$this->input->post('keterangan')
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

     function save_detail_roll(){
        $return_data = array();
        $tgl_input = date("Y-m-d");

        $this->db->trans_start();
        $no_produksi = $this->input->post('nomor_produksi');
        $urut_packing = sprintf("%'.04d",(int)$no_produksi);
        $tmp_packing = $this->input->post('no_packing');
        $kode_packing = substr($tmp_packing, 0,1);
        $ukuran = $this->input->post('ukuran');
        $no_packing = date("ymd").$kode_packing.$ukuran.$urut_packing;
        
        $this->db->insert('produksi_fg_detail', array(
            'tanggal' => $tgl_input,
            'no_produksi' => $no_produksi,
            'produksi_fg_id'=>$this->input->post('id'),
            'no_packing_barcode'=>$no_packing,
            'netto' => $this->input->post('netto'),
            'bobbin_id'=>$this->input->post('id_packing')
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
        $return_data = array();
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


    function bpb_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudang_fg/bpb_list";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->bpb_list()->result();

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
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->db->trans_start();
        $this->load->model('Model_gudang_fg');
        $id_produksi = $this->input->post('id');
        #update status produksi FG
        $data = array(
                'flag_result' => 1,
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
                            'bruto' => (int)$v->bruto,
                            'netto' => $v->netto,
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
            $data['packing'] = $this->Model_gudang_fg->show_data_packing($data['header']['jenis_packing_id'])->row_array()['packing'];
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/bpb_list');
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
        $this->db->update('t_spb_fg', array(
                        'status'=> 1,
                        'keterangan' => $this->input->post('remarks'),
                        'approved_at'=> $tanggal,
                        'approved_by'=>$user_id
        ));

        #Update flag_taken t_gudang_fg
        $this->db->where('t_spb_fg_id', $spb_id);
        $this->db->update('t_gudang_fg', array(
                        'flag_taken'=> 1,
                        'modified_date'=> $tanggal,
                        'modified_by'=>$user_id
        ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'SPB sudah di-approve. Detail SPB sudah disimpan');            
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat pembuatan Balasan SPB, silahkan coba kembali!');
            }             
        
       redirect('index.php/GudangFG/spb_list');
    }

    function approve_bpb(){
        $bpb_id = $this->input->post('bpb_fg_id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        
        $this->db->trans_start();       
         
            #Update status BPB
            $this->db->where('id', $bpb_id);
            $this->db->update('t_bpb_fg', array(
                    'status'=>1,
                    'keterangan' => $this->input->post('remarks'),
                    'approved_at'=>$tanggal,
                    'approved_by'=>$user_id));
            
            #Create Inventori FG
            $details = $this->input->post('details');
            $this->load->model('Model_gudang_fg');
            $packing = $this->Model_gudang_fg->show_data_packing($this->input->post('id_jenis_packing'))->row_array()['packing'];
            if($packing=="KARDUS"){
                foreach ($details as $v) {  
                    $data_kardus = array(
                            'tanggal'=> $tgl_input,
                            'jenis_trx' => 0, //0 masuk
                            'flag_taken'=>0, // 0 belum diambil
                            't_bpb_fg_id' => $bpb_id,
                            't_bpb_fg_detail_id' => $v['id_bpb_fg_detail'],
                            'jenis_barang_id' => $v['id_jenis_barang'] ,
                            'nomor_BPB' =>$this->input->post('no_bpb'),
                            'no_packing' => $v['no_packing'],
                            'netto' =>$v['netto'],
                            'keterangan' =>null,
                            'created_by'=> $user_id,
                            'created_at' => $tanggal
                    );
                    $this->db->insert('t_gudang_fg', $data_kardus);
                }
                
            } else if ($packing == "ROLL") {
                foreach ($details as $v) {  
                    $data_kardus = array(
                            'tanggal'=> $tgl_input,
                            'jenis_trx' => 0, //0 masuk
                            'flag_taken'=>0, // 0 belum diambil
                            't_bpb_fg_id' => $bpb_id,
                            't_bpb_fg_detail_id' => $v['id_bpb_fg_detail'],
                            'jenis_barang_id' => $v['id_jenis_barang'] ,
                            'nomor_BPB' =>$this->input->post('no_bpb'),
                            'no_packing' => $v['no_packing'],
                            'no_produksi' => $v['no_produksi'],
                            'netto' =>$v['netto'],
                            'keterangan' =>null,
                            'created_by'=> $user_id,
                            'created_at' => $tanggal
                    );
                    $this->db->insert('t_gudang_fg', $data_kardus);
                }
               
            } else {
                foreach ($details as $v) {  
                    $data_else = array(
                            'tanggal'=> $tgl_input,
                            'jenis_trx' => 0, //0 masuk
                            'flag_taken'=>0, // 0 belum diambil
                            't_bpb_fg_id' => $bpb_id,
                            't_bpb_fg_detail_id' => $v['id_bpb_fg_detail'],
                            'jenis_barang_id' => $v['id_jenis_barang'] ,
                            'nomor_BPB' =>$this->input->post('no_bpb'),
                            'no_produksi' => $v['no_produksi'],
                            'no_packing' => $v['no_packing'],
                            'netto' =>$v['netto'],
                            'bruto' =>(int)$v['bruto'],
                            'bobbin_id' => $v['id_bobbin'],
                            'nomor_bobbin'=> $v['no_bobbin'],
                            'keterangan' =>null,
                            'created_by'=> $user_id,
                            'created_at' => $tanggal
                        );
                    $this->db->insert('t_gudang_fg', $data_else);
                }
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
        $tanggal  = date('Y-m-d h:m:s');
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
        $tanggal  = date('Y-m-d h:m:s');
        
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
        $tanggal  = date('Y-m-d h:m:s');
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
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-WIP', $tgl_input); 
        
        if($code){     
            $this->db->trans_start();
            #insert data spb fg
            $data = array(
                'no_spb'=> $code,
                'tanggal'=> $tgl_input,
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
                'no_packing'=>$this->input->post('no_packing'),
                'netto' => $this->input->post('netto'),
                'keterangan'=>$this->input->post('keterangan')
                );
            $this->db->insert('t_spb_fg_detail',$data_detail);

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

        $data['content']= "gudang_fg/spb_list";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->spb_list()->result();

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
        $this->load->model('Model_gudang_fg');
        
        $this->load->view('layout', $data);
    }

    function save_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SPB-FG', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_spb'=> $code,
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
            $data['header'] = $this->Model_gudang_fg->show_header_spb($id)->row_array();
            $data['details'] =   $this->Model_gudang_fg->show_detail_spb($id)->result();
    
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
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

            $data['content']= "gudang_fg/view_spb";

            $this->load->model('Model_gudang_fg');
            $data['list_barang'] = $this->Model_gudang_fg->jenis_barang_list_by_spb($id)->result();
            $data['myData'] = $this->Model_gudang_fg->show_header_spb($id)->row_array();           
            $data['myDetail'] = $this->Model_gudang_fg->show_detail_spb($id)->result(); 
            $data['detailSPB'] = $this->Model_gudang_fg->show_detail_spb_fulfilment($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
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
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
                'keterangan'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_spb_fg', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data SPB FG berhasil disimpan');
        redirect('index.php/GudangFG/spb_list');
    }
}