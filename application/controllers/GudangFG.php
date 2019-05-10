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
            $packing = $this->Model_gudang_fg->show_data_packing($data['header']['jenis_packing_id'])->row_array()['packing'];
            if($packing=="BOBBIN"){
                $data['content']   = "gudang_fg/detail_laporan_bobbin";
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            } else if ($packing == "KERANJANG") {
                $data['content'] = "gudang_fg/detail_laporan_keranjang";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KERANJANG')->result();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            // } else if ($packing == "ROLL") {
            //     $data['content'] = "gudang_fg/detail_laporan_roll";
            //     $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('ROLL')->row_array();
            //     $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            } else if ($packing == 'KARDUS') {
                $data['content'] = "gudang_fg/detail_laporan_rambut";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KARDUS')->result();
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
        $this->load->model('Model_gudang_fg');
        $myDetail = $this->Model_gudang_fg->load_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_produksi.'</td>';
            $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue disabled"><i class="fa fa-dashboard"></i> Timbang</a></td>';
            $tabel .= '<td>'.$row->bruto.'</td>';
            $tabel .= '<td>'.$row->berat_bobbin.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '<td>'.$row->no_packing_barcode.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a>'
                    . '<a href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay"'
                    . 'onclick="printBarcode('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Print Barcode </a></td>';
            $tabel .= '</tr>';            
            $no++;
        }
            
        // $tabel .= '<tr>';
        // $tabel .= '<td style="text-align:center">'.$no.'</td>';
        // $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>';
        // $tabel .= '<td><input type="text" id="bruto" name="bruto" class="form-control myline"/></td>';
        // $tabel .= '<td><input type="number" id="berat_bobbin" = name="berat_bobbin" class="form-control myline"/></td>';
        // $tabel .= '<td><input type="text" id="netto" name="netto" class="form-control myline" onclick="timbang_netto();" readonly="readonly"/></td>';
        // $tabel .= '<td><input type="text" id="no_packing" value="Auto" name="no_packing" class="form-control myline" readonly="readonly"></td>';
        // $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
        //         . 'yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"> '
        //         . '<i class="fa fa-plus"></i> Tambah </a></td>';
        // $tabel .= '</tr>';

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
        $tabel .= '<td><a href="javascript:;" onclick="timbang(this)" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>';
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
            'berat_bobbin' => $this->input->post('berat_bobbin'),
            'bobbin_id'=>$this->input->post('id_bobbin'),
            'keterangan'=>$this->input->post('keterangan')
        ));

       #update status bobbin
       $this->db->where('id' ,$this->input->post('id_bobbin'));
       $this->db->update('m_bobbin', array(
            'status' => 1
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

    function print_barcode_kardus(){
        $id = $_GET['id'];
        if($id){

        $this->load->model('Model_gudang_fg');
        $data = $this->Model_gudang_fg->get_pfd_id($id)->row_array();
        $berat = $data['bruto'] - $data['netto'];

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
        echo "<form method='post' id=\"coba\" action=\"http://localhost/print/print.php\">";
        echo "<input type='hidden' id='nospb' name='nospb' value='".$current."'>";
        echo "</form>";
        echo '<script type="text/javascript">document.getElementById(\'coba\').submit();</script>';
        }else{
            'GAGAL';
        }
    }

    function save_detail_rambut(){
        $return_data = array();
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('dmy', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();

        $this->load->model('Model_m_numberings');

        $code = $this->Model_m_numberings->getNumbering('KARDUS',$tgl_input);

        $first = substr($this->input->post('no_packing'),0,1);
        $ukuran = $this->input->post('ukuran');
        $no_packing = $tgl_code.$first.$ukuran.substr($code,12,4);
        
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
        $tgl_code = date('dmy', strtotime($this->input->post('tanggal')));
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
        $first = substr($this->input->post('no_packing'),0,1);
        $sec = substr($this->input->post('no_packing'),1,1);
        $num = $first.$sec;
        $code = $this->Model_m_numberings->getNumbering($num,$tgl_input);

        $ukuran = $this->input->post('ukuran');
        $no_packing = $tgl_code.$first.$ukuran.$sec.substr($code,8,3);

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
        $return_data = array();
        $this->db->where('id', $id);
        $key = $this->db->get('produksi_fg_detail')->result();
            foreach ($key as $row) {
                $id_bobbin = $row->bobbin_id;
                $this->db->where('id', $id_bobbin);
                $this->db->update('m_bobbin', array(
                    'status' => 3
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
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "gudang_fg/bpb_list";
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_gudang_fg->bpb_list($user_ppn)->result();

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
                                    'bruto' => (int)$v->bruto,
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
            $data['packing'] = $this->Model_gudang_fg->show_data_packing($data['header']['jenis_packing_id'])->row_array()['packing'];
            
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/bpb_list');
        }
    }

    function input_ulang_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
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

    function save_fulfilment(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
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

       redirect('index.php/GudangFG/spb_list');
    }

    function approve_spb(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $spb_id = $this->input->post('id');
        
        $this->db->trans_start();
        $this->load->model('Model_gudang_fg');
        $data['check'] = $this->Model_gudang_fg->check_spb($spb_id)->row_array();
        if(((int)$data['check']['tot_so']) >= (0.9*((int)$data['check']['tot_spb']))){
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

        #Update flag_taken t_gudang_fg
        $this->db->where('t_spb_fg_id', $spb_id);
        $this->db->where('jenis_trx', 0);
        $this->db->update('t_gudang_fg', array(
                        'jenis_trx'=> 1,
                        'modified_date'=>$tanggal,
                        'modified_by'=>$user_id,
                        'tanggal_keluar'=>$tanggal
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
        $user_ppn = $this->session->userdata('user_ppn');
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
            // $packing = $this->Model_gudang_fg->show_data_packing($this->input->post('id_jenis_packing'))->row_array()['packing'];
            // if($packing=="KARDUS"){
            //     foreach ($details as $v) {  
            //         $data_kardus = array(
            //                 'tanggal'=> $tgl_input,
            //                 'jenis_trx' => 0, //0 masuk
            //                 'flag_taken'=>0, // 0 belum diambil
            //                 't_bpb_fg_id' => $bpb_id,
            //                 't_bpb_fg_detail_id' => $v['id_bpb_fg_detail'],
            //                 'jenis_barang_id' => $v['id_jenis_barang'] ,
            //                 'nomor_BPB' =>$this->input->post('no_bpb'),
            //                 'no_packing' => $v['no_packing'],
            //                 'netto' =>$v['netto'],
            //                 'keterangan' => $this->input->post('remarks'),
            //                 'tanggal_masuk' => $tgl_input,
            //                 'created_by'=> $user_id,
            //                 'created_at' => $tanggal
            //         );
            //         $this->db->insert('t_gudang_fg', $data_kardus);
            //     }
                
            // } else if ($packing == "ROLL") {
            //     foreach ($details as $v) {  
            //         $data_kardus = array(
            //                 'tanggal'=> $tgl_input,
            //                 'jenis_trx' => 0, //0 masuk
            //                 'flag_taken'=>0, // 0 belum diambil
            //                 't_bpb_fg_id' => $bpb_id,
            //                 't_bpb_fg_detail_id' => $v['id_bpb_fg_detail'],
            //                 'jenis_barang_id' => $v['id_jenis_barang'] ,
            //                 'nomor_BPB' =>$this->input->post('no_bpb'),
            //                 'no_packing' => $v['no_packing'],
            //                 'no_produksi' => $v['no_produksi'],
            //                 'netto' =>$v['netto'],
            //                 'keterangan' => $this->input->post('remarks'),
            //                 'tanggal_masuk' => $tgl_input,
            //                 'created_by'=> $user_id,
            //                 'created_at' => $tanggal
            //         );
            //         $this->db->insert('t_gudang_fg', $data_kardus);
            //     }
               
            // } else {
                foreach ($details as $v) {  
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
                // }
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
        $tanggal  = date('Y-m-d h:m:s');
        
        $query = $this->db->query('select *from produksi_fg_detail where produksi_fg_id = '.$fg_id)->result();
        foreach ($query as $row) {
            $this->db->where('id', $row->bobbin_id);
            $this->db->update('m_bobbin', array(
                'status' => 3
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
                'status' => 3
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
            $data['list_barang'] = $this->Model_gudang_fg->barang_fg_list()->result();
    
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

            $data['content']= "gudang_fg/view_spb_v1";

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
            $data['details'] = $this->Model_gudang_fg->show_detail_spb_print_fulfilment($id)->result();

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
            $i=0;
            $this->load->model('Model_gudang_fg'); 
            //$data['detailTanggal'] = $this->Model_beli_sparepart->show_laporan()->result();
            $comment = $this->Model_gudang_fg->show_laporan();
            if($comment->num_rows() > 0)
                {
                    foreach ($comment->result() as $r)
                    {
                        //bulan ini
                        $data['reg'][$i]['showdate']=$r->showdate;
                        $data['reg'][$i]['tanggal']=$r->tanggal;
                        $data['reg'][$i]['jumlah']=$r->jumlah;
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

            $data['content']= "gudang_fg/view_laporan";
            $this->load->model('Model_gudang_fg');
            $data['detailLaporan'] = $this->Model_gudang_fg->show_view_laporan($bulan,$tahun)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/laporan_list');
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
}