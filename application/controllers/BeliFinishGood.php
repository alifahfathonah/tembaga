<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeliFinishGood extends CI_Controller{
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

        $data['content']= "beli_fg/index";

        $this->load->model('Model_beli_fg');
        $data['list_data'] = $this->Model_beli_fg->po_list()->result();

        $this->load->view('layout', $data);
    }

    function po_list_outdated(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        //GANTI INTERVAL DI MODEL
        $data['content']= "beli_fg/po_outdated";
        $this->load->model('Model_beli_fg');
        $data['list_data'] = $this->Model_beli_fg->po_list_outdated()->result();

        $this->load->view('layout', $data);
    }
    
   function add(){
        $module_name = $this->uri->segment(1);
        $data['user_ppn'] = $this->session->userdata('user_ppn');
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "beli_fg/add";
        
        $this->load->model('Model_beli_sparepart');
        $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
        $this->load->view('layout', $data);
    }

    function save(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('POFG', $tgl_input); 

        $data = array(
            'no_po'=> $code,
            'tanggal'=> $tgl_input,
            'ppn'=> $user_ppn,
            'supplier_id'=>$this->input->post('supplier_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'jenis_po'=>'FG',
            'created'=> $tanggal,
            'created_by'=> $user_id,
            'modified'=> $tanggal,
            'modified_by'=> $user_id
        );

        if($this->db->insert('po', $data)){
            redirect('index.php/BeliFinishGood/edit/'.$this->db->insert_id());  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO FG gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/BeliFinishGood');  
        }  
    }

    function edit(){
        $module_name = $this->uri->segment(1);
        $data['user_ppn'] = $this->session->userdata('user_ppn');
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "beli_fg/edit";
            $this->load->model('Model_beli_fg');
            $data['header'] = $this->Model_beli_fg->show_header_po($id)->row_array();  
            $data['list_data'] = $this->Model_beli_fg->load_detail_po($id)->result();
            $data['list_detail'] = $this->Model_beli_fg->get_jb($id)->result();
            $data['list_fg'] = $this->Model_beli_fg->list_fg()->result();

            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliFinishGood');
        }
    }

    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_fg');
        $fg = $this->Model_beli_fg->get_jb($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($fg); 
    }

    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('po_detail', array(
            'po_id'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('fg_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
            'flag_dtbj' => 0,
            'total_amount'=>str_replace('.', '', $this->input->post('total_harga'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item finish good! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function load_detail(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        
        $this->load->model('Model_beli_fg'); 
        $myDetail = $this->Model_beli_fg->load_detail_po($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->total_amount;
            $no++;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total (Rp) </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function delete_detail(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('po_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item finish good! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'supplier_id'=>$this->input->post('supplier_id'),
                'term_of_payment'=>$this->input->post('term_of_payment'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('po', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data PO Finish Good berhasil disimpan');
        redirect('index.php/BeliFinishGood');
    }

    function close_po(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 1,
                'modified'=> $tanggal,
                'modified_by'=>$user_id,
                'remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('header_id'));
        $this->db->update('po', $data);
        
        $this->session->set_flashdata('flash_msg', 'PO Finish Good Berhasil di Close');
        redirect('index.php/BeliFinishGood');
    }

    function print_po(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_fg');
            $data['header']  = $this->Model_beli_fg->show_header_po($id)->row_array();
            $data['details'] = $this->Model_beli_fg->load_detail_po($id)->result();

            $this->load->view('beli_fg/print_po', $data);
        }else{
            redirect('index.php'); 
        }
    }

    function dtbj_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_fg/dtbj_list";
        $this->load->model('Model_beli_fg');
        $this->load->model('Model_beli_rongsok');
        $this->load->model('Model_gudang_fg');
        $data['list_data'] = $this->Model_beli_fg->dtbj_list()->result();
        $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
        $data['packing'] = $this->Model_gudang_fg->packing_fg_list()->result();

        $this->load->view('layout', $data);
    }

    function get_bobbin(){
        $id = $this->input->post('id');
        $jp = $this->input->post('jp');
        $this->load->model('Model_beli_fg');
        $barang= $this->Model_beli_fg->show_data_bobbin($id)->row_array();
        // $barang['berat_bobbin']=number_format($barang['berat'],2);
        // if ($barang['m_jenis_packing_id'] == 1) {
        //     #bobbin
        //     $check = $this->Model_beli_fg->check_urut()->row_array();
        //     $no_urut = $check['no_urut'];
        //     $no_urut = $no_urut + 1;
        //     switch (strlen($no_urut)) {
        //         case 1 : $urutan = "000".$no_urut;
        //             break;
        //         case 2 : $urutan = "00".$no_urut;
        //             break;
        //         case 3 : $urutan = "0".$no_urut;
        //             break;
                
        //         default:
        //             $urutan = $no_urut;
        //             break;
        //     }

        //     $no_bobbin = $barang['nomor_bobbin'];
        //     $kode_bobbin = substr($no_bobbin, 0,1);
        //     $urut_bobbin = substr($no_bobbin, 1,4);
        //     $ukuran = substr($no_bobbin, 0,1);
        //     $barang['no_packing'] = date("ymd").$ukuran.$urut_bobbin.$urutan;
        // } else if ($barang['m_jenis_packing_id'] == 2){
        //     #keranjang
        //     $no_bobbin = $barang['nomor_bobbin'];
        //     $kode_bobbin = substr($no_bobbin, 0,1);
        //     $urut_bobbin = substr($no_bobbin, 2,4);
        //     $ukuran = substr($no_bobbin, 0,1);
        //     $barang['no_packing'] = date("ymd").$ukuran.$urut_bobbin.rand(1,20);
        // } else if ($barang['m_jenis_packing_id'] == 4){
        //     #roll
        //     $no_bobbin = $barang['nomor_bobbin'];
        //     $kode_bobbin = substr($no_bobbin, 0,1);
        //     $urut_bobbin = substr($no_bobbin, 1,4);
        //     $ukuran = substr($no_bobbin, 0,1);
        //     $barang['no_packing'] = date("ymd").$kode_bobbin.$ukuran.$urut_bobbin;
        // } else {
        //     #kardus
        //     $no_bobbin = $barang['nomor_bobbin'];
        //     $kode_bobbin = substr($no_bobbin, 0,1);
        //     $urut_bobbin = substr($no_bobbin, 1,4);
        //     $ukuran = substr($no_bobbin, 0,1);
        //     $barang['no_packing'] = date("ymd").$kode_bobbin.$ukuran.$urut_bobbin;
        // }
        $check = $this->Model_beli_fg->check_urut($jp)->row_array();
        $no_urut = $check['no_urut'];
        $no_urut = $no_urut + 1;
        switch (strlen($no_urut)) {
            case 1 : $urutan = "000".$no_urut;
                break;
            case 2 : $urutan = "00".$no_urut;
                break;
            case 3 : $urutan = "0".$no_urut;
                break;
            
            default:
                $urutan = $no_urut;
                break;
        }

        $no_bobbin = $barang['nomor_bobbin'];
        $kode_bobbin = substr($no_bobbin, 0,1);
        $ukuran = $this->input->post('ukuran');
        $barang['no_packing'] = date("ymd").$kode_bobbin.$ukuran.$urutan;
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function save_header_dtbj(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('DTBJ', $tgl_input); 
        $data = array(
                        'no_dtbj'=> $code,
                        'tanggal'=> $tgl_input,
                        'supplier_id'=> $this->input->post('supplier_id'),
                        'jenis_packing'=> $this->input->post('packing'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id
                    );

        if($this->db->insert('dtbj', $data)){
            redirect(base_url('index.php/BeliFinishGood/create_dtbj/'.$this->db->insert_id()));
        } else {
            $this->session->set_flashdata('flash_msg', 'Laporan Produksi Finish Good gagal disimpan, silahkan dicoba kembali!');
            redirect(base_url('index.php/BeliFinishGood/dtbj_list'));
        }
    }

    function create_dtbj(){
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
            $data['judul']     = "Create DTBJ";

            $this->load->model('Model_beli_fg');
            $data['list_fg_on_po'] = $this->Model_beli_fg->list_fg()->result();
            $data['header'] = $this->Model_beli_fg->show_header_dtbj($id)->row_array();
            echo $data['header']['jenis_packing'];
            $this->load->model('Model_gudang_fg');
            $packing = $this->Model_gudang_fg->show_data_packing($data['header']['jenis_packing'])->row_array()['packing'];
            if($packing=="BOBBIN"){
                $data['content']   = "beli_fg/create_dtbj_bobbin";
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result();
            } else if ($packing == "KERANJANG") {
                $data['content'] = "beli_fg/create_dtbj_keranjang";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KERANJANG')->result();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            } else if ($packing == "ROLL") {
                $data['content'] = "beli_fg/create_dtbj_roll";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('ROLL')->row_array();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result(); 
            } else {
                $data['content'] = "beli_fg/create_dtbj_rambut";
                $data['packing'] =  $this->Model_gudang_fg->packing_list_by_name('KARDUS')->result();
                $data['myDetail'] = $this->Model_gudang_fg->load_detail($id)->result();
            }
            $this->load->model('Model_beli_rongsok');
            $data['list_rongsok_on_po'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function save_dtbj(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
 
        $this->db->trans_start();

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('dtbj', array(
                'remarks'=>$this->input->post('remarks'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'modified'=>$tanggal,
                'modified_by'=>$user_id
            ));

            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if($row['fg_id']!=0){
                    $this->db->insert('dtbj_detail', array(
                        'dtbj_id'=>$this->input->post('id'),
                        'jenis_barang_id'=>$row['fg_id'],
                        'bruto'=>$row['bruto'],
                        'berat_bobbin'=>$row['berat_bobbin'],
                        'netto'=>$row['netto'],
                        'no_bobbin'=>$row['no_bobbin'],
                        'no_packing'=>$row['no_packing'],
                        'line_remarks'=>$row['line_remarks'],
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));

                    if(isset($row['bobbin'])){
                        $updatebobbin = array('status'=>1);
                        $this->db->where('nomor_bobbin', $row['no_bobbin']);
                        $this->db->update('m_bobbin', $updatebobbin);
                    }
                }
            }
            
            // #Update status PO
            // $this->db->where('id', $this->input->post('po_id'));
            // $this->db->update('po', array('status'=>2, 'modified'=>$tanggal, 'modified_by'=>$user_id));
                    
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTBJ berhasil di-create dengan nomor : '.$this->input->post('no_dtr'));                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTBJ, silahkan coba kembali!');
            }
            redirect('index.php/BeliFinishGood/dtbj_list');
    }

    // function edit_dtbj(){
    //     $module_name = $this->uri->segment(1);
    //     $id = $this->uri->segment(3);
    //     if($id){
    //         $group_id    = $this->session->userdata('group_id');        
    //         if($group_id != 1){
    //             $this->load->model('Model_modules');
    //             $roles = $this->Model_modules->get_akses($module_name, $group_id);
    //             $data['hak_akses'] = $roles;
    //         }
    //         $data['group_id']  = $group_id;

    //         $data['content']= "beli_fg/edit_dtbj";
    //         $this->load->model('Model_beli_fg');
    //         $data['header']  = $this->Model_beli_fg->show_header_dtbj($id)->row_array(); 
    //         $data['details'] = $this->Model_beli_fg->show_detail_dtbj($id)->result();
            
    //         $this->load->view('layout', $data);   
    //     }else{
    //         redirect('index.php/BeliFinishGood');
    //     }
    // }

    function matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_fg/matching";
        $this->load->model('Model_beli_fg');
        $data['po_list'] = $this->Model_beli_fg->get_po_list()->result();

        $this->load->view('layout', $data);
    }

    function proses_matching(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $po_id = $this->uri->segment(3);
        
        $data['content']= "beli_fg/proses_matching";
        $this->load->model('Model_beli_fg');
        $data['header_po'] = $this->Model_beli_fg->show_header_po($po_id)->row_array();
        $data['details_po'] = $this->Model_beli_fg->show_detail_po($po_id)->result();

        $dtbj_app = $this->Model_beli_fg->get_dtbj_approve($po_id)->result();
        foreach ($dtbj_app as $index=>$row){
            $dtbj_app[$index]->details = $this->Model_beli_fg->show_detail_dtbj($row->id)->result();
        }
        $data['dtbj_app'] = $dtbj_app;
        $sp_id = $data['header_po']['supplier_id'];
        $dtbj = $this->Model_beli_fg->get_dtbj($sp_id)->result();
        foreach ($dtbj as $index=>$row){
            $dtbj[$index]->details = $this->Model_beli_fg->show_detail_dtbj($row->id)->result();
        }
        $data['dtbj'] = $dtbj;
        $this->load->view('layout', $data);
    }

    function approve(){
        $dtbj_id = $this->input->post('dtbj_id');
        $po_id = $this->input->post('po_id');
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d');
        $return_data = array();
        $this->load->model('Model_beli_fg');
        
            $this->db->trans_start();       

            #Update status DTBJ
            $this->db->where('id', $dtbj_id);
            $this->db->update('dtbj', array(
                    'po_id'=>$po_id,
                    'status'=>1,
                    'approved'=>$tanggal,
                    'approved_by'=>$user_id));
            
            if($this->db->trans_complete()){  
                
                #update po_detail_id di dtbj_detail

                $po_dtbj_check_update = $this->Model_beli_fg->check_to_update($po_id)->result();
                foreach ($po_dtbj_check_update as $u) {
                    $this->db->where('id',$u->dtbj_detail_id );
                    $this->db->update('dtbj_detail',array(
                                    'po_detail_id'=>$u->id));
                }

                $total_qty = 0;
                $total_netto_dtbj = 0;
                $po_dtbj_list = $this->Model_beli_fg->check_po_dtbj($po_id)->result();
                foreach ($po_dtbj_list as $v) {
                    #penghitungan +- 10 % PO ke DTR
                    if(((int)$v->tot_netto) >= (0.9*((int)$v->qty))){
                        #update po_detail flag_dtr
                        $this->Model_beli_fg->update_flag_dtbj_po_detail($po_id,$v->jenis_barang_id);
                    }
                    $total_qty += $v->qty;
                    $total_netto_dtbj += $v->tot_netto;
                }

               if(((int)$total_netto_dtbj) >= (0.9*((int)$total_qty))){
                    $this->db->where('id',$po_id);
                    $this->db->update('po',array(
                                    'status'=>3,
                                    'flag_pelunasan'=>0));
               }else {
                    $this->db->where('id',$po_id);
                    $this->db->update('po',array(
                                    'status'=>2));
               }

                #Create BPB FG
                $this->load->model('Model_m_numberings');
                $loop1 = $this->db->query("select dtbjd.dtbj_id, dtbjd.jenis_barang_id, jb.jenis_barang
                    from dtbj_detail dtbjd
                    left join jenis_barang jb on (jb.id = dtbjd.jenis_barang_id)
                    where dtbjd.dtbj_id = ".$dtbj_id." group by jb.jenis_barang")->result();
                foreach ($loop1 as $k1) {
                    #insert t_bpb_fg
                    $code = $this->Model_m_numberings->getNumbering('BPB-PO',$tgl_input);
                    $data_bpb = array(
                            'no_bpb_fg' => $code,
                            'tanggal' => $tgl_input,
                            // 'produksi_fg_id' => $id_produksi,
                            'jenis_barang_id' => $k1->jenis_barang_id,
                            'created_at' => $tanggal,
                            'created_by' => $user_id,
                            'keterangan' => 'BARANG PO FG',
                            'status' => 0
                        );
                    $this->db->insert('t_bpb_fg',$data_bpb);
                    $id_bpb = $this->db->insert_id();

                    #insert t_bpb_detail
                    $loop2 = $this->db->query("select dtbj_detail.*, m_bobbin.id as bobbin_id from dtbj_detail left join m_bobbin on (m_bobbin.nomor_bobbin = dtbj_detail.no_bobbin) where jenis_barang_id = ".$k1->jenis_barang_id." and dtbj_id = ".$dtbj_id)->result();
                    foreach ($loop2 as $k2) {
                        $this->db->insert('t_bpb_fg_detail', array(
                            't_bpb_fg_id' => $id_bpb,
                            'jenis_barang_id' => $k2->jenis_barang_id,
                            'no_produksi' => 0,
                            'bruto' => $k2->bruto,
                            'netto' => $k2->netto,
                            'no_packing_barcode' => $k2->no_packing,
                            'bobbin_id' => $k2->bobbin_id
                        ));
                    }
                }

            $return_data['type_message']= "sukses";
            $return_data['message'] = "DTBJ sudah diberikan ke bagian gudang";           
        }else{
            $return_data['type_message']= "error";
            $return_data['message']= "Pembuatan DTBJ gagal, penomoran belum disetup!";
        }                  
        
       header('Content-Type: application/json');
       echo json_encode($return_data);
    }

    function reject(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        
        $data = array(
                'status'=> 9,
                'rejected'=> $tanggal,
                'rejected_by'=>$user_id,
                'reject_remarks'=>$this->input->post('reject_remarks')
            );
        
        $this->db->where('id', $this->input->post('dtbj_id'));
        $this->db->update('dtbj', $data);

        $query = $this->db->query('select *from dtbj_detail where dtbj_id = '.$this->input->post('dtbj_id'))->result();
        foreach ($query as $row) {
            $this->db->where('nomor_bobbin', $row->no_bobbin);
            $this->db->update('m_bobbin', array(
                'status' => 3
            ));
        }

        redirect('index.php/BeliFinishGood/proses_matching/'.$this->input->post('po_id'));
    }

    function create_voucher(){
        $id = $this->input->post('id');
        $this->load->helper('terbilang_helper');
        $this->load->model('Model_beli_fg');
        $data = $this->Model_beli_fg->voucher_po_fg($id)->row_array();
        $terbilang = $data['nilai_po'];
        $sisa = $data['nilai_po'] - $data['nilai_dp'];
        $data['nilai_po'] = number_format($data['nilai_po'],0,',','.');
        $data['nilai_dp'] = number_format($data['nilai_dp'],0,',','.');
        $data['sisa']     = number_format($sisa,0,',','.');

        $data['terbilang'] = ucwords(number_to_words($terbilang));
        
        header('Content-Type: application/json');
        echo json_encode($data);  
    }

    function save_voucher(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $nilai_po  = str_replace('.', '', $this->input->post('nilai_po'));
        $nilai_dp  = str_replace('.', '', $this->input->post('nilai_dp'));
        $amount  = str_replace('.', '', $this->input->post('amount'));
        $id = $this->input->post('id');
        
        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('VFG', $tgl_input);
        if($nilai_po-($nilai_dp+$amount)>0){
            $jenis_voucher = 'DP';
        }else{
            $jenis_voucher = 'Pelunasan';
            $this->db->where('id', $id);
            $this->db->update('po', array('flag_pelunasan'=>1,'status'=>4));
        } 

        if($code){ 
            $this->db->insert('voucher', array(
                'no_voucher'=>$code,
                'tanggal'=>$tgl_input,
                'jenis_voucher'=>$jenis_voucher,
                'po_id'=>$this->input->post('id'),
                'supplier_id'=>$this->input->post('supplier_id'),
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'amount'=>str_replace('.', '', $this->input->post('amount')),
                'keterangan'=>$this->input->post('keterangan'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            ));
            
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'Voucher finish good berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create voucher finish good, silahkan coba kembali!');
            }
            redirect('index.php/BeliFinishGood');  
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan voucher finish good gagal, penomoran belum disetup!');
            redirect('index.php/BeliFinishGood');
        }
    }

    function voucher_list(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "beli_fg/voucher_list";
        $this->load->model('Model_beli_fg');
        $data['list_data'] = $this->Model_beli_fg->voucher_list()->result();

        $this->load->view('layout', $data);
    }

    function print_dtbj(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_beli_fg');
            $data['header']  = $this->Model_beli_fg->show_header_dtbj($id)->row_array();
            $data['details'] = $this->Model_beli_fg->show_detail_dtbj($id)->result();

            $this->load->view('beli_fg/print_dtbj', $data);
        }else{
            redirect('BeliFinishGood/index.php'); 
        }
    }

    function print_voucher(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }

            $this->load->helper('terbilang_helper');
            $this->load->model('Model_finance');
            $data['header'] = $this->Model_finance->show_header_voucher($id)->row_array();
            $data['list_data'] = $this->Model_finance->show_detail_voucher($id)->result();

            $total = 0;
            foreach ($data['list_data'] as $row) {
                $total += $row->amount;
            }

            $data['total'] = $total;

            $this->load->view('beli_fg/print_voucher', $data);   
        }else{
            redirect('index.php/BeliFinishGood');
        }
    }

    function print_barcode(){
        $jb_id = $_GET['fg'];
        $bruto = $_GET['b'];
        $berat_bobbin = $_GET['bb'];
        $netto = $_GET['n'];
        $no_packing = $_GET['np'];
        if($netto){

        $this->load->model('Model_beli_fg');
        $data = $this->Model_beli_fg->get_jb($jb_id)->row_array();

        $current = '';
        $data_printer = $this->db->query("select * from m_print_barcode_line where m_print_barcode_id = 1")->result_array();
        $data_printer[17]['string1'] = 'BARCODE 488,335,"39",41,0,180,2,6,"'.$data['kode'].'"';
        $data_printer[18]['string1'] = 'TEXT 386,289,"ROMAN.TTF",180,1,8,"'.$data['kode'].'"';
        $data_printer[22]['string1'] = 'BARCODE 612,101,"39",41,0,180,2,6,"'.$no_packing.'"';
        $data_printer[23]['string1'] = 'TEXT 426,55,"ROMAN.TTF",180,1,8,"'.$no_packing.'"';
        $data_printer[24]['string1'] = 'TEXT 499,260,"4",180,1,1,"'.$no_packing.'"';
        $data_printer[25]['string1'] = 'TEXT 495,226,"ROMAN.TTF",180,1,14,"'.$bruto.'"';
        $data_printer[26]['string1'] = 'TEXT 495,188,"ROMAN.TTF",180,1,14,"'.$berat_bobbin.'"';
        $data_printer[27]['string1'] = 'TEXT 495,147,"0",180,14,14,"'.$netto.'"';
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
}