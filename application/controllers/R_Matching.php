<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_Matching extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_matching');
    }
    
    function index(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $this->load->model('Model_matching');
        $data['group_id']  = $group_id;
        $data['list_data'] = $this->Model_matching->list_invoice()->result();
        $data['content']= "resmi/matching/index";

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
        $data['list_invoice_fg'] = $this->Model_matching->list_invoice_fg()->result();

        $data['content']= "resmi/matching/add";

        $this->load->view('layout', $data);
    }

    function get_jumlah(){
        $id = $this->input->post('id');

        $barang= $this->Model_matching->get_jumlah($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($barang); 
    }

    function save_invoice(){
        $user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $this->db->trans_start();
        
        $this->db->where('id', $this->input->post('invoice_id'));
        $this->db->update('f_invoice', array(
            'flag_resmi' => 1
        ));

        $data = array(
            'no_invoice_resmi'=> $this->input->post('no_invoice'),
            'invoice_id'=> $this->input->post('invoice_id'),
            'tanggal'=> $tgl_input,
            'jumlah'=> $this->input->post('qty'),
            'remarks'=> $this->input->post('remarks'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('r_t_invoice', $data);
        $id_new=$this->db->insert_id();

        if($this->db->trans_complete()){
            redirect(base_url('index.php/R_Matching/matching_invoice/'.$id_new));
        }else{
            $this->session->set_flashdata('flash_msg', 'Invoice gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_Matching');  
        }   
    }

    function matching_invoice(){
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
            $data['judul']     = "Matching";
            $data['content']   = "resmi/matching/matching_invoice";

            $this->load->model('Model_matching');
            $data['header'] = $this->Model_matching->show_header_invoice($id)->row_array();
            $data['list_dtr'] = $this->Model_matching->list_dtr()->result();
            $data['list_invoice_detail'] = $this->Model_matching->list_invoice_detail($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_Matching');
        }
    }

    function load_list_dtr(){
        $tabel = "";
        $no = 1;

        $this->load->model('Model_matching');
        $list_dtr = $this->Model_matching->list_dtr()->result();
        foreach ($list_dtr as $row) {
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align: center;">'.$no.'</td>';
            $tabel .= '<td>'.$row->no_dtr.'</td>';
            $tabel .= '<td>'.$row->netto.'</td>';
            $tabel .= '</tr>';
            $no++;
        }

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    function get_dtr_list(){
        $this->load->model('Model_matching');
        $data = $this->Model_matching->list_dtr()->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_dtr;
        } 
        print form_dropdown('dtr_id', $arr_so);
    }

    function load_detail_dtr(){
        $id = $this->input->post('id');

        $tabel = "";
        $no    = 1;
        $total = 0;
        
        $this->load->model('Model_matching'); 
        $myDetail = $this->Model_matching->load_detail_dtr($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<input type="hidden" id="dtr_id_'.$no.'" value="'.$row->dtr_id.'"/>';
            $tabel .= '<tr>';
            $tabel .= '<td style="width: 30px; text-align:center;"><input type="checkbox" value="1" id="check_'.$no.'" name="details['.$no.'][check]" onclick="check();" class="form-check-input"/></td>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<input type="hidden" id="dtr_detail_id_'.$no.'" name="details['.$no.'][dtr_detail_id]" value="'.$row->id.'" />';
            $tabel .= '<input type="hidden" id="id_barang_'.$no.'" name="details['.$no.'][id_barang]" value="'.$row->rongsok_id.'" />';
            $tabel .= '<td><input type="text" id="nama_item_'.$no.'" name="details['.$no.'][nama_item]" value="'.$row->nama_item.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td style="text-align:right"><input type="text" id="bruto_'.$no.'" name="details['.$no.'][bruto]" value="'.$row->bruto.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td style="text-align:right"><input type="text" id="netto_'.$no.'" name="details['.$no.'][netto]" value="'.$row->netto.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td style="text-align:right"><input type="text" id="berat_palette_'.$no.'" name="details['.$no.'][berat_palette]" value="'.$row->berat_palette.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td><input type="text" id="no_pallete_'.$no.'" name="details['.$no.'][no_pallete]" value="'.$row->no_pallete.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td><input type="text" id="line_remarks_'.$no.'" name="details['.$no.'][line_remarks]" value="'.$row->line_remarks.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td><a href="javascript:;"  class="btn btn-xs btn-circle yellow-gold"  onclick="saveDetail('.$no.');" style="margin-top:5px" id="btnSaveDetail" ><i class="fa fa-plus"></i> Tambah </a></td>';
            // $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
            //         . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
            //         . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->netto;
            $no++;
        }

        $tabel .= '<tr>';
        $tabel .= '<td></td>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total (Kg) </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.$total.'</strong></td>';
        $tabel .= '<td colspan="4"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    function saveData(){
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $check = $this->db->query("select sum(netto) as total_netto from r_t_invoice_detail where invoice_resmi_id = ".$id)->row_array();
        $total_netto = $check['total_netto'];
        
        if ($total_netto < $qty) {
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan. Jumlah netto invoice kurang dari berat permintaan!');
            redirect('index.php/R_Matching/matching_invoice/'.$id);
        } else {
            $this->db->trans_start();

            $this->db->where('id', $id);
            $this->db->update('r_t_invoice', array(
                'no_invoice_resmi' => $this->input->post('no_invoice_resmi'),
                'remarks' => $this->input->post('remarks'),
                'tanggal' => $tgl_input,
                'jumlah' => $this->input->post('qty')
            ));

            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Data invoice berhasil disimpan!');
                redirect('index.php/R_Matching/'); 
            } else {
                $this->session->set_flashdata('flash_msg', 'Data invoice gagal disimpan!');
                redirect('index.php/R_Matching/matching_invoice/'.$id);
            }
        }
    }

    function save_invoice_detail(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $dtr_id = $this->input->post('id_dtr');
        $dtr_detail_id = $this->input->post('dtr_detail_id');

        $this->db->where('id', $dtr_detail_id);
        $this->db->update('dtr_detail', array('flag_resmi' => 1));

        $detail_taken = $this->db->query("select count(flag_resmi) as total_taken from dtr_detail where flag_resmi = 1 and dtr_id = ".$dtr_id)->row_array();
        $detail_id = $this->db->query("select count(id) as total_id from dtr_detail where dtr_id = ".$dtr_id)->row_array();
        if($detail_taken['total_taken'] == $detail_id['total_id']){
            #update flag_resmi dtr
            $this->db->where('id', $dtr_id);
            $this->db->update('dtr', array('flag_taken' => 1));
            $check = 1;
        }else{
            $check = 0;
        }

        if($this->db->insert('r_t_invoice_detail', array(
            'invoice_resmi_id' => $this->input->post('invoice_resmi_id'),
            'dtr_detail_id'=>$this->input->post('dtr_detail_id'),
            'jenis_barang_id'=>$this->input->post('id_barang'),
            'bruto'=>$this->input->post('bruto'),
            'netto'=>$this->input->post('netto'),
            'berat_pallete' => $this->input->post('berat_pallete'),
            'line_remarks' => $this->input->post('keterangan')
        ))){
            $return_data['message_type']= "sukses";
            $return_data['id_dtr'] = $this->input->post('id_dtr');
            $return_data['flag_taken'] = $check;
            $return_data['dtr_detail_id'] = $this->input->post('dtr_detail_id');
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function delete_invoice_detail(){
        $id = $this->input->post('id_dtr_detail');
        $id_dtr = $this->input->post('id_dtr');
        $check = 0;

        $this->db->where('id', $id);
        $this->db->update('dtr_detail', array('flag_resmi' => 0));

        $this->db->where('id', $id_dtr);
        $this->db->update('dtr', array('flag_taken' => 0));

        $return_data = array();
        $this->db->where('dtr_detail_id', $id);
        if($this->db->delete('r_t_invoice_detail')){
            $return_data['message_type']= "sukses";
            $return_data['dtr_id'] = $id_dtr;
            $return_data['check'] = $check;
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item finish good! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function load_detail_invoice(){
        $id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        $this->load->model('Model_matching');
        
        $myDetail = $this->Model_matching->load_invoice_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<input type="hidden" id="dtr_id_'.$row->dtr_detail_id.'" name="dtr_id" value="'.$row->dtr_id.'"/>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td style="text-align:right;">'.$row->bruto.'</td>';
            $tabel .= '<td style="text-align:right;">'.$row->netto.'</td>';
            $tabel .= '<td style="text-align:right;">'.$row->berat_pallete.'</td>';
            $tabel .= '<td>'.$row->no_pallete.'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->dtr_detail_id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->netto;
            $no++;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total (Kg) </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.$total.'</strong></td>';
        $tabel .= '<td colspan="4"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }
    
    function view_invoice(){
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
            $data['judul']     = "Matching";
            $data['content']   = "resmi/matching/view_invoice";

            $this->load->model('Model_matching');
            $data['header'] = $this->Model_matching->show_header_invoice($id)->row_array();
            $data['list_invoice_detail'] = $this->Model_matching->list_invoice_detail($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_Matching');
        }
    }

    function print_invoice(){
        $id = $this->uri->segment(3);
        if($id){       
            $this->load->helper('terbilang_helper'); 
            $this->load->model('Model_matching');
            $data['header'] = $this->Model_matching->show_header_invoice($id)->row_array();
            $data['list_invoice_detail'] = $this->Model_matching->list_invoice_detail($id)->result();

            // $total = 0;
            // foreach ($data['details'] as $row) {
            //     $total += $row->total_harga;
            // }

            // $data['total'] = $total;

            $this->load->view('resmi/matching/print_invoice', $data);
        }else{
            redirect('index.php'); 
        }
    }
}