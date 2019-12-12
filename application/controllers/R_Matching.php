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
        $reff_cv = $this->session->userdata('cv_id');      
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $this->load->model('Model_matching');
        $data['group_id']  = $group_id;
        if($group_id == 9){
            $data['list_data'] = $this->Model_matching->list_invoice()->result();
        } else {
            $data['list_data'] = $this->Model_matching->list_invoice($reff_cv)->result();    
        }
        
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
        $tanggal   = date('Y-m-d H:i:s');
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
            'persentase'=> $this->input->post('persentase'),
            'total'=> $this->input->post('total'),
            'remarks'=> $this->input->post('remarks'),
            'reff_cv'=> $this->session->userdata('cv_id'),
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );
        $this->db->insert('r_t_invoice', $data);
        $id_new=$this->db->insert_id();

        $get_gudangfg_int = $this->Model_matching->get_gudangfg_int($this->input->post('invoice_id'))->result();
        foreach ($get_gudangfg_int as $v) {
            $ins_r_t_fg = array(
                'id_gudang' => $v->id,
                'f_invoice_id' => $id_new,
                'jenis_barang_id' => $v->sj_jb,
                'bruto' => $v->bruto,
                'netto' => $v->netto,
                'berat_bobbin' => $v->berat_bobbin,
                'no_packing' => $v->no_packing,
                'bobbin_id' => $v->bobbin_id,
                'nomor_bobbin' => $v->nomor_bobbin,
                'created_at' => $tgl_input,
                'created_by' => $user_id,
                'tanggal_masuk' => $v->tanggal_masuk
            );

            $this->db->insert('r_t_gudang_fg', $ins_r_t_fg);

            $this->db->where('id', $v->id);
            $this->db->update('t_gudang_fg', array('flag_resmi'=>1));
        }

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

    function get_jenis_barang_list(){
        $this->load->model('Model_matching');
        $data = $this->Model_matching->jenis_barang_list()->result();
        $arr_so[] = "Silahkan pilih...";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->nama_item;
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

    function load_detail_jb(){
        $id = $this->input->post('id');

        $tabel = "";
        $no = 1;
        $total = 0;

        $this->load->model('Model_matching');
        $myDetail = $this->Model_matching->load_detail_jb($id)->result();

        foreach ($myDetail as $row) {
            ${'sisa_netto_'.$row->dtr_id} = 0;
            ${'sisa_netto_'.$row->dtr_id} = $row->netto - $row->netto_resmi;
            $tabel .= '<input type="hidden" id="dtr_id_'.$no.'" value="'.$row->dtr_id.'"/>';
            $tabel .= '<tr>';
            // $tabel .= '<td style="width: 30px; text-align:center;"><input type="checkbox" value="1" id="check_'.$no.'" name="details['.$no.'][check]" onclick="check();" class="form-check-input"/></td>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<input type="hidden" id="dtr_detail_id_'.$no.'" name="details['.$no.'][dtr_detail_id]" value="'.$row->id.'" />';
            $tabel .= '<input type="hidden" id="dtr_id_'.$no.'" name="details['.$no.'][dtr_id]" value="'.$row->dtr_id.'" />';
            $tabel .= '<input type="hidden" id="id_barang_'.$no.'" name="details['.$no.'][id_barang]" value="'.$row->rongsok_id.'" />';
            $tabel .= '<td><input type="text" id="nama_item_'.$no.'" name="details['.$no.'][nama_item]" value="'.$row->nama_item.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td style="text-align:right"><input type="text" id="bruto_'.$no.'" name="details['.$no.'][bruto]" value="'.$row->bruto.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td style="text-align:right"><input type="text" id="netto_'.$no.'" name="details['.$no.'][netto]" value="'.${'sisa_netto_'.$row->dtr_id}.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td style="text-align:right"><input type="text" id="berat_palette_'.$no.'" name="details['.$no.'][berat_palette]" value="'.$row->berat_palette.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td><input type="text" id="no_pallete_'.$no.'" name="details['.$no.'][no_pallete]" value="'.$row->no_pallete.'" class="form-control myline" readonly /></td>';
            // $tabel .= '<td><input type="text" id="line_remarks_'.$no.'" name="details['.$no.'][line_remarks]" value="'.$row->line_remarks.'" class="form-control myline" readonly /></td>';
            $tabel .= '<td align="center"><a href="javascript:;"  class="btn btn-xs btn-circle yellow-gold"  onclick="saveDetail('.$no.');" style="margin-top:5px" id="btnSaveDetail" ><i class="fa fa-plus"></i> Tambah </a><a href="javascript:;"  class="btn btn-xs btn-circle green"  onclick="saveParsial('.$no.',\''.$row->nama_item.'\');" style="margin-top:5px" id="btnSaveDetail" ><i class="fa fa-plus"></i> Parsial </a></td>';
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
        $tabel .= '<input type="hidden" name="total_input" id="total_input" value="'.$total.'"/>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.$total.'</strong></td>';
        $tabel .= '<td colspan="3"></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    function saveData(){
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $tanggal   = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));

        // $check = $this->db->query("select sum(netto) as total_netto from r_t_invoice_detail where invoice_resmi_id = ".$id)->row_array();
        // $total_netto = $check['total_netto'];
        
        $total = $this->input->post('total');
        $qty_pemenuhan = $this->input->post('qty_pemenuhan');

        if ($total <= $qty_pemenuhan) {
            $this->db->trans_start();

            $this->db->where('id', $id);
            $this->db->update('r_t_invoice', array(
                'no_invoice_resmi' => $this->input->post('no_invoice_resmi'),
                'remarks' => $this->input->post('remarks'),
                'tanggal' => $tgl_input,
                'total' => $this->input->post('total'),
                'persentase' => $this->input->post('persentase'),
                'jumlah' => $this->input->post('qty')
            ));

            if($this->db->trans_complete()){
                $this->session->set_flashdata('flash_msg', 'Data invoice berhasil disimpan!');
                redirect('index.php/R_Matching/'); 
            } else {
                $this->session->set_flashdata('flash_msg', 'Data invoice gagal disimpan!');
                redirect('index.php/R_Matching/matching_invoice/'.$id);
            }
        } else {
            
            $this->session->set_flashdata('flash_msg', 'Terjadi kesalahan. Jumlah netto invoice kurang dari berat permintaan!');
            redirect('index.php/R_Matching/matching_invoice/'.$id);
        }
    }

    function save_invoice_detail(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $dtr_id = $this->input->post('id_dtr');
        $dtr_detail_id = $this->input->post('dtr_detail_id');

        #update netto resmi
        $get_data = $this->db->query("select netto, netto_resmi from dtr_detail where id = ".$dtr_detail_id)->row_array();
        $update_netto = 0;
        $update_netto = $get_data['netto_resmi'] + $this->input->post('netto');
        $this->db->where('id', $dtr_detail_id);
        $this->db->update('dtr_detail', array('flag_resmi' => 1, 'netto_resmi' => $update_netto));

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
            $return_data['jenis_barang'] = $this->input->post('id_barang');
            $return_data['flag_taken'] = $check;
            $return_data['dtr_detail_id'] = $this->input->post('dtr_detail_id');
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function save_invoice_detail_parsial(){
        $return_data = array();
        $tgl_input = date("Y-m-d");
        $dtr_id = $this->input->post('id_dtr');
        $dtr_detail_id = $this->input->post('dtr_detail_id');
        $invoice_resmi_id = $this->input->post('invoice_resmi_id');

        $validasi = $this->db->query("select *from r_t_invoice_detail where dtr_detail_id = ".$dtr_detail_id." and invoice_resmi_id = ".$invoice_resmi_id)->row_array();

        if (isset($validasi)) {
            #update netto resmi
            $get_data = $this->db->query("select netto, netto_resmi from dtr_detail where id = ".$dtr_detail_id)->row_array();
            $update_netto = 0;
            $update_netto = $get_data['netto_resmi'] + $this->input->post('u_netto');

            if($update_netto == $get_data['netto']){
                $this->db->where('id', $dtr_detail_id);
                $this->db->update('dtr_detail', array('flag_resmi' => 1, 'netto_resmi' => $update_netto));
            } else {
                $this->db->where('id', $dtr_detail_id);
                $this->db->update('dtr_detail', array('flag_resmi' => 0, 'netto_resmi' => $update_netto));
            }

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

            if($this->db->query("update r_t_invoice_detail set netto = netto + ".$this->input->post('u_netto')." where dtr_detail_id = ".$dtr_detail_id." and invoice_resmi_id = ".$invoice_resmi_id)){
                $return_data['message_type']= "sukses";
                $return_data['id_dtr'] = $this->input->post('id_dtr');
                $return_data['jenis_barang'] = $this->input->post('id_barang');
                $return_data['flag_taken'] = $check;
                $return_data['dtr_detail_id'] = $this->input->post('dtr_detail_id');
            }else{
                $return_data['message_type']= "error";
                $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
            }
            header('Content-Type: application/json');
            echo json_encode($return_data); 
        } else {
            #update netto resmi
            $get_data = $this->db->query("select netto, netto_resmi from dtr_detail where id = ".$dtr_detail_id)->row_array();
            $update_netto = 0;
            $update_netto = $get_data['netto_resmi'] + $this->input->post('u_netto');

            if($update_netto == $get_data['netto']){
                $this->db->where('id', $dtr_detail_id);
                $this->db->update('dtr_detail', array('flag_resmi' => 1, 'netto_resmi' => $update_netto));
            } else {
                $this->db->where('id', $dtr_detail_id);
                $this->db->update('dtr_detail', array('flag_resmi' => 0, 'netto_resmi' => $update_netto));
            }

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
                'netto'=>$this->input->post('u_netto'),
                'berat_pallete' => $this->input->post('berat_pallete'),
                'line_remarks' => $this->input->post('keterangan')
            ))){
                $return_data['message_type']= "sukses";
                $return_data['id_dtr'] = $this->input->post('id_dtr');
                $return_data['jenis_barang'] = $this->input->post('id_barang');
                $return_data['flag_taken'] = $check;
                $return_data['dtr_detail_id'] = $this->input->post('dtr_detail_id');
            }else{
                $return_data['message_type']= "error";
                $return_data['message']= "Gagal menambahkan item barang! Silahkan coba kembali";
            }
            header('Content-Type: application/json');
            echo json_encode($return_data); 
        }
        
    }

    function delete_invoice_detail(){
        $id = $this->input->post('id_dtr_detail');
        $id_dtr = $this->input->post('id_dtr');
        $detail_id_matching = $this->input->post('detail_id_matching');
        $check = 0;
        $reset_netto = 0;
        $netto = $this->input->post('netto');

        $data = $this->db->query("select *from dtr_detail where id = ".$id)->row_array();
        $reset_netto = (int)$data['netto_resmi'] - (int)$netto;
        
        $this->db->where('id', $id);
        $this->db->update('dtr_detail', array('flag_resmi' => 0, 'netto_resmi' => $reset_netto));

        $this->db->where('id', $id_dtr);
        $this->db->update('dtr', array('flag_taken' => 0));

        $return_data = array();
        $this->db->where('id', $detail_id_matching);
        if($this->db->delete('r_t_invoice_detail')){
            $return_data['message_type']= "sukses";
            $return_data['dtr_id'] = $id_dtr;
            $return_data['jenis_barang'] = $this->input->post('id_barang');
            $return_data['check'] = $check;
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item finish good! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_invoice_detail(){
        $id = $this->input->post('id_dtr_detail');
        $id_dtr = $this->input->post('id_dtr');
        $new_netto = $this->input->post('u_netto');
        $check = 0;

        $this->db->where('id', $id_dtr);
        $this->db->update('dtr', array('flag_taken' => 0));

        $return_data = array();

        $get_data = $this->db->query("select netto_resmi from dtr_detail where id = ".$id)->row_array();
        $update_netto = $get_data['netto_resmi'] - $new_netto;

        $this->db->where('id', $id);
        $this->db->update('dtr_detail', array('flag_resmi' => 0, 'netto_resmi' => $new_netto));

        $this->db->where('dtr_detail_id', $id);
        if($this->db->update('r_t_invoice_detail', array('netto' => $new_netto))){
            $return_data['message_type']= "sukses";
            $return_data['dtr_id'] = $id_dtr;
            $return_data['jenis_barang'] = $this->input->post('id_barang');
            $return_data['check'] = $check;
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal mengupdate item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function load_detail_invoice(){
        $id = $this->input->post('id');
        $permintaan = $this->input->post('permintaan');
        $kurangnya = 0;
        $tabel = "";
        $no    = 1;
        $total = 0;
        $this->load->model('Model_matching');
        
        $myDetail = $this->Model_matching->load_invoice_detail($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<input type="hidden" id="detail_id_matching_'.$row->id.'" name="detail_id_matching" value="'.$row->id.'"/>';
            $tabel .= '<input type="hidden" id="dtr_id_'.$row->dtr_detail_id.'" name="dtr_id" value="'.$row->dtr_id.'"/>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td style="text-align:right;">'.$row->bruto.'</td>';
            $tabel .= '<td style="text-align:right;"><label id="l_netto_'.$row->dtr_detail_id.'">'.$row->netto.'</label><input style="display:none;" type="number" min="1" max="'.$row->netto.'" id="u_netto_'.$row->dtr_detail_id.'" name="u_update['.$no.'][netto]" value="'.$row->netto.'" class="form-control myline" /></td>';
            $tabel .= '<td style="text-align:right;">'.$row->berat_pallete.'</td>';
            $tabel .= '<td>'.$row->no_pallete.'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->dtr_detail_id.','.$row->jenis_barang_id.','.$row->netto.','.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->netto;
            $kurangnya = $permintaan - $total;
            $no++;
        }

        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Total (Kg) </strong></td>';
        $tabel .= '<input type="hidden" name="qty_pemenuhan" id="qty_pemenuhan" value="'.$total.'"/>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.$total.'</strong></td>';
        $tabel .= '<td colspan="4"></td>';
        $tabel .= '</tr>';
        $tabel .= '<tr>';
        $tabel .= '<td colspan="3" style="text-align:right"><strong>Kurangnya (Kg) </strong></td>';
        $tabel .= '<input type="hidden" name="kekurangan" id="kekurangan" value="'.$kurangnya.'"/>';
        if($permintaan < $total){
            $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>+'.abs($kurangnya).'</strong></td>';
        } else {
            $tabel .= '<td style="text-align:right; background-color:red; color:white"><strong>-'.$kurangnya.'</strong></td>';    
        }
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