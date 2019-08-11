<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_Rongsok extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_r_rongsok');
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
        $data['list_data'] = $this->Model_r_rongsok->dtr_list()->result();
        $data['content']= "resmi/ambil_rongsok/index";

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
        $this->load->model('Model_beli_rongsok');
        $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();
        $data['content']= "resmi/ambil_rongsok/add";

        $this->load->view('layout', $data);
    }

    function save_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Ym', strtotime($this->input->post('tanggal')));
        $user_ppn = $this->session->userdata('user_ppn');

        $this->db->trans_start();
        $this->load->model('Model_m_numberings');
        $code = 'DTR-KMP.'.$tgl_po.'.'.$this->input->post('no_dtr');

                $data = array(
                        'no_dtr'=> $code,
                        'tanggal'=> $tgl_input,
                        'flag_ppn'=> 1,
                        'supplier_id'=> $this->input->post('supplier_id'),
                        'jenis_barang'=> 'Rongsok',
                        'remarks'=> $this->input->post('remarks'),
                        'type'=> 1,
                        'flag_taken'=>1,
                        'created'=> $tanggal,
                        'created_by'=> $user_id,
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->insert('dtr', $data);
                $id_dtr = $this->db->insert_id();

                // //API
                // $this->load->helper('target_url');

                // $data_id = array('reff1' => $id_dtr);
                // $data_post = array_merge($data, $data_id);

                // $data_post = http_build_query($data_post);

                // $ch = curl_init(target_url().'api/R_RongsokAPI/dtr');
                // curl_setopt($ch, CURLOPT_POST, true);
                // curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // $response = curl_exec($ch);
                // $result = json_decode($response, true);
                // curl_close($ch);
                // //API CLOSE

        if($this->db->trans_complete()){
            redirect('index.php/R_Rongsok/edit/'.$id_dtr);  
        }else{
            $this->session->set_flashdata('flash_msg', 'DTR rongsok gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_Rongsok');  
        } 
    }

    function delete_dtr(){
        $id = $this->uri->segment(3);

        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->delete('dtr');

        $this->db->where('dtr_id');
        $this->db->delete('dtr_detail');

                //API
                // $this->load->helper('target_url');

                // $data = ['id'=>$id];
                // $data_post = http_build_query($data);

                // $ch = curl_init(target_url().'api/R_RongsokAPI/dtr_delete');
                // curl_setopt($ch, CURLOPT_POST, true);
                // curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // $response = curl_exec($ch);
                // $result = json_decode($response, true);
                // curl_close($ch);
                // print_r($response);
                // die();
                //API CLOSE

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'DTR rongsok berhasil dihapus!');
            redirect('index.php/R_Rongsok/index');  
        }else{
            $this->session->set_flashdata('flash_msg', 'DTR rongsok gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_Rongsok');  
        } 
    }

    function edit(){
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
            $data['content']   = "resmi/ambil_rongsok/ambil_dtr";

            $this->load->model('Model_beli_rongsok');
            $this->load->model('Model_matching');
            $data['header']  = $this->Model_beli_rongsok->show_header_dtr($id)->row_array();
            $data['list_dtr'] = $this->Model_matching->list_dtr()->result();
            $data['supplier_list'] = $this->Model_beli_rongsok->supplier_list()->result();

            // $data['list_invoice_detail'] = $this->Model_matching->list_invoice_detail($id)->result();

            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_Matching');
        }
    }

    function update_dtr(){
        $user_id  = $this->session->userdata('user_id');
        $tgl_input = date("Y-m-d", strtotime($this->input->post('tanggal')));
        $tanggal  = date('Y-m-d h:m:s');

        $this->db->trans_start();

                $data = array(
                        'no_dtr'=> $this->input->post('no_dtr'),
                        'tanggal'=> $tgl_input,
                        'supplier_id'=> $this->input->post('supplier_id'),
                        'remarks'=> $this->input->post('remarks'),
                        'modified'=> $tanggal,
                        'modified_by'=> $user_id
                    );
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('dtr', $data);

                // //API
                // $this->load->helper('target_url');

                // $data_id = array('reff1' => $id_dtr);
                // $data_post = array_merge($data, $data_id);

                // $data_post = http_build_query($data_post);

                // $ch = curl_init(target_url().'api/R_RongsokAPI/dtr');
                // curl_setopt($ch, CURLOPT_POST, true);
                // curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // $response = curl_exec($ch);
                // $result = json_decode($response, true);
                // curl_close($ch);
                // //API CLOSE

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'DTR rongsok berhasil disimpan!');
            redirect('index.php/R_Rongsok/index');  
        }else{
            $this->session->set_flashdata('flash_msg', 'DTR rongsok gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/R_Rongsok');  
        } 
    }

    function save_detail_rsk(){
        $return_data = array();
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $dtr_id = $this->input->post('id_dtr');
        $dtr_detail_id = $this->input->post('dtr_detail_id');

        $this->db->trans_start();
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

        $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);
        
        $no_pallete = $tgl_code.substr($code,13,4);

        $this->db->insert('dtr_detail', array(
            'dtr_id' => $this->input->post('dtr_asli_id'),
            'dtr_asli_id'=>$this->input->post('dtr_detail_id'),
            'rongsok_id'=>$this->input->post('id_barang'),
            'bruto'=>$this->input->post('bruto'),
            'netto'=>$this->input->post('netto'),
            'netto_resmi'=>$this->input->post('netto'),
            'no_pallete' => $no_pallete,
            'berat_palette' => $this->input->post('berat_pallete'),
            'line_remarks' => $this->input->post('keterangan'),
            'flag_resmi' => 1
        ));

        if($this->db->trans_complete()){
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

    function save_dtr_detail_parsial(){
        $return_data = array();
        $tgl_input = date("Y-m-d", strtotime($this->input->post('tanggal')));
        $dtr_id = $this->input->post('id_dtr');
        $dtr_detail_id = $this->input->post('dtr_detail_id');
        $dtr_asli_id = $this->input->post('dtr_asli_id');

        $this->db->trans_start();

        $validasi = $this->db->query("select * from dtr_detail where dtr_id = ".$dtr_detail_id." and dtr_asli_id = ".$dtr_asli_id)->row_array();

        $tgl_code = date('ymd', strtotime($this->input->post('tanggal')));
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('RONGSOK',$tgl_input);
        
        $no_pallete = $tgl_code.substr($code,13,4);

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

            $this->db->query("update dtr_detail set netto = netto + ".$this->input->post('u_netto')." where id = ".$dtr_detail_id." and dtr_asli_id = ".$dtr_asli_id);

            if($this->db->trans_complete()){
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

            $this->db->insert('dtr_detail', array(
                'dtr_id' => $this->input->post('dtr_asli_id'),
                'dtr_asli_id'=>$this->input->post('dtr_detail_id'),
                'rongsok_id'=>$this->input->post('id_barang'),
                'bruto'=>$this->input->post('u_netto'),
                'netto'=>$this->input->post('u_netto'),
                'netto_resmi'=>$this->input->post('u_netto'),
                'no_pallete' => $no_pallete,
                'berat_palette' => $this->input->post('berat_pallete'),
                'line_remarks' => $this->input->post('keterangan'),
                'flag_resmi' => 1
            ));

            if($this->db->trans_complete()){
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

    function delete_dtr_detail(){
        $id = $this->input->post('id_dtr_detail');
        $id_dtr = $this->input->post('id_dtr');
        $detail_id_matching = $this->input->post('detail_id_matching');
        $check = 0;
        $reset_netto = 0;
        $netto = $this->input->post('netto');

        $this->db->trans_start();

        $data = $this->db->query("select * from dtr_detail where id = ".$id)->row_array();
        $reset_netto = (int)$data['netto_resmi'] - (int)$netto;
        
        $this->db->where('id', $id);
        $this->db->update('dtr_detail', array('flag_resmi' => 0, 'netto_resmi' => $reset_netto));

        $this->db->where('id', $id_dtr);
        $this->db->update('dtr', array('flag_taken' => 0));

        $return_data = array();
        $this->db->where('id', $detail_id_matching);
        $this->db->delete('dtr_detail');
        if($this->db->trans_complete()){
            $return_data['message_type']= "sukses";
            $return_data['dtr_id'] = $id_dtr;
            $return_data['jenis_barang'] = $this->input->post('id_barang');
            $return_data['check'] = $check;
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function load_detail_dtr(){
        $id = $this->input->post('id');
        $kurangnya = 0;
        $tabel = "";
        $no    = 1;
        $total = 0;

        $myDetail = $this->Model_r_rongsok->show_detail_dtr($id)->result();
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<input type="hidden" id="detail_id_matching_'.$row->id.'" name="detail_id_matching" value="'.$row->id.'"/>';
            $tabel .= '<input type="hidden" id="dtr_id_'.$row->dtr_asli_id.'" name="dtr_id" value="'.$row->dtr_id_lama.'"/>';
            $tabel .= '<td>'.$row->nama_item.'</td>';
            $tabel .= '<td style="text-align:right;">'.$row->bruto.'</td>';
            $tabel .= '<td style="text-align:right;"><label id="l_netto_'.$row->dtr_asli_id.'">'.$row->netto.'</label><input style="display:none;" type="number" min="1" max="'.$row->netto.'" id="u_netto_'.$row->dtr_asli_id.'" name="u_update['.$no.'][netto]" value="'.$row->netto.'" class="form-control myline" /></td>';
            $tabel .= '<td style="text-align:right;">'.$row->berat_palette.'</td>';
            $tabel .= '<td>'.$row->no_pallete.'</td>';
            $tabel .= '<td>'.$row->line_remarks.'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->dtr_asli_id.','.$row->rongsok_id.','.$row->netto.','.$row->id.');" style="margin-top:5px"> '
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
}