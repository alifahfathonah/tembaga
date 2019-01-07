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
            $data['list_detail'] = $this->Model_beli_fg->show_data_po($id)->result();
            $data['list_fg'] = $this->Model_beli_fg->list_fg()->result();

            $this->load->model('Model_beli_sparepart');
            $data['supplier_list'] = $this->Model_beli_sparepart->supplier_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliRongsok');
        }
    }

    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_fg');
        $fg = $this->Model_beli_fg->show_data_po($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($fg); 
    }

    function save_detail(){
        $return_data = array();
        
        if($this->db->insert('po_detail', array(
            'po_id'=>$this->input->post('id'),
            'fg_id'=>$this->input->post('fg_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
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
        $data['list_data'] = $this->Model_beli_fg->dtbj_list()->result();

        $this->load->view('layout', $data);
    }

    function create_dtbj(){
        $module_name = $this->uri->segment(1);
        // $id = $this->uri->segment(3);
        // if($id){
            $group_id    = $this->session->userdata('group_id');        
            if($group_id != 1){
                $this->load->model('Model_modules');
                $roles = $this->Model_modules->get_akses($module_name, $group_id);
                $data['hak_akses'] = $roles;
            }
            $data['group_id']  = $group_id;

            $data['content']= "beli_fg/create_dtbj";
            $this->load->model('Model_beli_fg');
            $data['list_fg_on_po'] = $this->Model_beli_fg->list_fg()->result();
            
            $this->load->model('Model_beli_rongsok');
            $data['list_rongsok_on_po'] = $this->Model_beli_rongsok->show_data_rongsok()->result();
            $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
            // $data['header'] = $this->Model_beli_rongsok->show_header_po($id)->row_array();           
            // $data['po_id'] = $id;
            // $this->load->model('Model_rongsok');
            // $list_rongsok_on_po = $this->Model_rongsok->list_data_on_po($id)->result();
            // $opt_rongsok = '';
            // foreach ($list_rongsok_on_po as $value){
            //     $opt_rongsok .= "<option value='".$value->id."'>".$value->nama_item."</option>";
            // }
            // $data['option_rongsok'] = $opt_rongsok;
            $this->load->view('layout', $data);   
        // }else{
        //     redirect('index.php/BeliRongsok');
        // }
    }

    function get_bobbin(){
        $id = $this->input->post('id');
        $this->load->model('Model_beli_fg');
        $barang= $this->Model_beli_fg->show_data_bobbin($id)->row_array();
        $barang['berat_bobbin']=number_format($barang['berat'],2);
        if ($barang['m_jenis_packing_id'] == 1) {
            #bobbin
            $no_bobbin = $barang['nomor_bobbin'];
            $kode_bobbin = substr($no_bobbin, 0,1);
            $urut_bobbin = substr($no_bobbin, 1,4);
            $ukuran = substr($no_bobbin, 0,1);
            $barang['no_packing'] = date("ymd").$kode_bobbin.$ukuran.$urut_bobbin;
        } else if ($barang['m_jenis_packing_id'] == 2){
            #keranjang
            
        } else if ($barang['m_jenis_packing_id'] == 4){
            #roll
            $no_produksi = $this->input->post('nomor_produksi');
            $urut_packing = sprintf("%'.04d",(int)$no_produksi);
            $tmp_packing = $this->input->post('no_packing');
            $kode_packing = substr($tmp_packing, 0,1);
            $ukuran = $this->input->post('ukuran');
            $no_packing = date("ymd").$kode_packing.$ukuran.$urut_packing;
        } else {

        }
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function save_dtbj(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('DTBJ', $tgl_input); 
        
        if($code){        
            $data = array(
                        'no_dtbj'=> $code,
                        'tanggal'=> $tgl_input,
                        'supplier_id'=> $this->input->post('supplier_id'),
                        'jenis_barang'=> $this->input->post('jenis_barang'),
                        'remarks'=> $this->input->post('remarks'),
                        'created'=> $tanggal,
                        'created_by'=> $user_id
                    );
            $this->db->insert('dtbj', $data);
            $dtbj_id = $this->db->insert_id();
            $details = $this->input->post('myDetails');
            foreach ($details as $row){
                if($row['fg_id']!=0){
                    $this->db->insert('dtbj_detail', array(
                        'dtbj_id'=>$dtbj_id,
                        'jenis_barang_id'=>$row['fg_id'],
                        'bruto'=>$row['bruto'],
                        'berat_bobbin'=>$row['berat_bobbin'],
                        'netto'=>$row['netto'],
                        'no_bobbin'=>$row['no_bobbin'],
                        'line_remarks'=>$row['line_remarks'],
                        'created'=>$tanggal,
                        'created_by'=>$user_id,
                        'tanggal_masuk'=>$tgl_input
                    ));
                }
            }
            
            // #Update status PO
            // $this->db->where('id', $this->input->post('po_id'));
            // $this->db->update('po', array('status'=>2, 'modified'=>$tanggal, 'modified_by'=>$user_id));
                    
            if($this->db->trans_complete()){    
                $this->session->set_flashdata('flash_msg', 'DTBJ berhasil di-create dengan nomor : '.$code);                 
            }else{
                $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan saat create DTBJ, silahkan coba kembali!');
            }
            redirect('index.php/BeliFinishGood/dtbj_list');           
        }else{
            $this->session->set_flashdata('flash_msg', 'Pembuatan DTBJ gagal, penomoran belum disetup!');
            redirect('index.php/BeliFinishGood/dtbj_list');
        }
    }
}