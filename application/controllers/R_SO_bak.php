<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R_SO extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_so');
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
        $data['group_id']  = $group_id;

        $data['content']= "resmi/salesorder/index";
        if ($group_id == 9) {
            $data['list_data'] = $this->Model_so->so_list()->result();
        } else if ($group_id == 14) {
            $data['list_data'] = $this->Model_so->so_list_for_cv($reff_cv)->result();
        } else if ($group_id == 16) {
            $data['list_data'] = $this->Model_so->so_list_for_kmp()->result();
        }

        $this->load->view('layout', $data);
    }

    function add_so(){
        $module_name = $this->uri->segment(1);
        $po_id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "resmi/salesorder/add_so";
        
        $this->load->model('Model_purchase_order');
        $this->load->model('Model_sales_order');
        $data['header'] = $this->Model_purchase_order->show_header_po($po_id)->row_array();
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        $data['marketing_list'] = $this->Model_sales_order->marketing_list()->result();
        $data['no_so_kmp'] = $this->Model_sales_order->get_last_so(1)->row_array();
        $data['no_so_cv'] = $this->Model_sales_order->get_last_so_cv()->row_array();
        $this->load->view('layout', $data);
    }

    function get_tanggal_po(){
        $id = $this->input->post('id');
        $data = $this->Model_so->get_tanggal_po($id)->row_array(); 
        $data['tanggal'] = date('d-m-Y', strtotime($data['tanggal']));
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    function save_so(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_code = date('Ym', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Y-m-d', strtotime($this->input->post('tanggal_po')));
        $no_so = 'SO-KMP.'.$tgl_code.'.'.$this->input->post('no_so');

        $this->load->model('Model_m_numberings');
        // $code = $this->Model_m_numberings->getNumbering('SO-KMP', $tgl_input);
                
        $category = $this->input->post('jenis_barang');

        // if($code){
            $this->db->trans_start();

            $t_data = array(
                'no_so'=>$no_so,
                'tanggal'=>$tgl_input,
                'term_of_payment'=>$this->input->post('term_of_payment'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'cv_id'=>$this->input->post('customer_id'),
                'po_id'=>$this->input->post('po_id'),
                'tgl_po'=>$tgl_po,
                'jenis_so'=>'SO KMP',
                'jenis_barang'=>'FG',
                'created_at'=> $tanggal,
                'created_by'=> $user_id
            );
            $this->db->insert('r_t_so', $t_data);
            $so_id = $this->db->insert_id();

            $this->db->where('id', $this->input->post('po_id'));
            $this->db->update('r_t_po', array(
                'flag_so' => $so_id
            ));
            
            $detail = [];
            $loop = $this->db->get_where('r_t_po_detail', array('po_id'=>$this->input->post('po_id')))->result();
            foreach ($loop as $i => $row) {
                $data_sod = array(
                    'so_id' => $so_id,
                    'po_detail_id' => $row->id,
                    'jenis_barang_id' => $row->jenis_barang_id,
                    'netto' => $row->netto,
                    'amount' => $row->amount,
                    'total_amount' => $row->total_amount
                );
                $this->db->insert('r_t_so_detail', $data_sod);
                $id_detail = $this->db->insert_id();

                $arr_merge = array('reff2' => $id_detail);
                $detail[$i] = array_merge($data_sod, $arr_merge);
            }

                //API START//
                $so_old = $this->db->query(
                    "select tsf.id as id_spb, tsf.no_spb, tsf.jenis_spb, so.tanggal, so.no_sales_order, so.flag_tolling, so.m_customer_id, tso.alias, tso.so_id, tso.no_po, tso.jenis_so, tso.jenis_barang, tso.currency, tso.kurs from r_t_po rtp
                    left join f_invoice fi on fi.id = rtp.f_invoice_id
                    left join sales_order so on so.id = fi.id_sales_order
                    left join t_sales_order tso on tso.id = so.id
                    left join t_spb_fg tsf on tsf.id = tso.no_spb"
                )->row_array();

                // generate nomor SPB untuk pajak
                $this->load->model('Model_m_numberings');
                $num = $this->Model_m_numberings->getNumbering('SPB-T', $tgl_input); 

                $this->load->helper('target_url');

                $reff_so = array('reff2' => $so_id, 'no_po'=>$this->input->post('no_po'), 'idkmp'=>$this->input->post('idkmp'));
                $data_post['nomor_spb'] = $num;
                $data_post['header'] = array_merge($t_data, $reff_so);
                $data_post['detail'] = $detail;

                $post = json_encode($data_post);

                // echo"<pre>";print_r($data_post);echo "</pre>";
                // die();
                $ch = curl_init(target_url().'api/ReffAPI/so');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();

                //API END//
                      
            if ($this->db->trans_complete()) {
                redirect('index.php/R_SO/edit_so/'.$so_id);  
            } else {
                $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/R_SO');  
            }
        // }
    }

    function edit_so(){
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

            $data['content']= "resmi/salesorder/edit_so";
            $this->load->model('Model_sales_order');
            $data['header'] = $this->Model_so->show_header_so($id)->row_array(); 
            $data['jenis_so'] = $data['header']['jenis_so'];
            if($data['jenis_so'] == 'SO KMP'){
                $this->load->model('Model_matching'); 
                $data['customer_list'] = $this->Model_matching->cv_list()->result();
            }else if($data['jenis_so'] == 'SO CV'){
                $this->load->model('Model_purchase_order'); 
                $data['customer_list'] = $this->Model_purchase_order->customer_list()->result();
            }
            $data['marketing_list'] = $this->Model_sales_order->marketing_list()->result();
            $data['jenis_barang'] = $this->Model_so->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SO');
        }
    }

    function view_so(){
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

            $data['content']= "resmi/salesorder/view_so";
            $this->load->model('Model_sales_order');
            $data['header'] = $this->Model_so->show_header_so($id)->row_array();
            $data['jenis_so'] = $data['header']['jenis_so'];
            $data['myDetails'] = $this->Model_so->load_detail_so($id)->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/R_SO');
        }
    }

    function print_so(){
        $id = $this->uri->segment(3);

        if(isset($id)){
            $this->load->model('Model_surat_jalan');
            $this->load->helper('tanggal_indo');
            $data['header'] = $this->Model_so->show_header_print_so($id)->row_array();
            $data['myDetails'] = $this->Model_so->load_detail_so($id)->result();
            if ($data['header']['jenis_so'] == "SO KMP") {
                $this->load->view('resmi/salesorder/print_so_kmp', $data);
            } else if ($data['header']['jenis_so'] == "SO CV") {
                $this->load->view('resmi/salesorder/print_so_cv', $data);
            }
        } else {
            redirect('index.php'); 
        }
    }

    function load_detail_so(){
        $id = $this->input->post('id');

        $no = 1;
        $total = 0;
        $netto = 0;
        $tabel = "";
        $jenis_barang = $this->Model_so->jenis_barang_list()->result();

        $myDetails = $this->Model_so->load_detail_so($id)->result();
        foreach ($myDetails as $row) {
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align: center;">'.$no.'</td>';
            $tabel .= '<td><label id="lbl_jenis_barang_'.$no.'">'.$row->jenis_barang.'</label>';
            $tabel .= '<select id="jenis_barang_id_'.$no.'" name="jenis_barang_id_'.$no.'" class="form-control select2me myline" ';
            $tabel .= 'data-placeholder="Pilih..." style="margin-bottom:5px; display:none" onclick="get_uom(this.value, '.$no.');">';
            $tabel .= '<option value=""></option>';
            foreach ($jenis_barang as $value){
                $tabel .= "<option value='".$value->id."' ".(($value->id==$row->jenis_barang_id)? "selected='selected'": "").">".$value->jenis_barang."</option>";
            }
            $tabel .= '</select>';
            $tabel .= '<input type="hidden" id="detail_id_'.$no.'" name="detail_id_'.$no.'" value="'.$row->id.'">';
            $tabel .= '</td>';
            $tabel .= '<td><label id="lbl_uom_'.$no.'">'.$row->uom.'</label>';
            $tabel .= '<input type="text" id="uom_'.$no.'" name="uom_'.$no.'" class="form-control myline" value="'.$row->uom.'" readonly  style="display:none;"/></td>';
            $tabel .= '<td style="text-align:right;"><label id="lbl_amount_'.$no.'">'.number_format($row->amount,2,'.',',').'</label>';
            $tabel .= '<input type="text" id="amount_'.$no.'" name="amount_'.$no.'" class="form-control myline" value="'.number_format($row->amount,2,'.',',').'" onkeydown="return myCurrency_a(event);" maxlength="10" value="0" onkeyup="getComa_a(this.value, this.id,'.$no.');"  style="display:none;"/></td>';
            $tabel .= '<td style="text-align:right;"><label id="lbl_netto_'.$no.'">'.$row->netto.'</label>';
            $tabel .= '<input type="number" id="netto_'.$no.'" name="netto_'.$no.'" class="form-control myline" value="'.$row->netto.'"  style="display:none;" maxlength="10" value="0" onkeyup="hitungSubTotal_a('.$no.');"/></td>';
            $tabel .= '<td style="text-align:right;"><label id="lbl_total_amount_'.$no.'">'.number_format($row->total_amount,2,'.',',').'</label>';
            $tabel .= '<input type="text" id="total_amount_'.$no.'" name="total_amount_'.$no.'" class="form-control myline" value="'.number_format($row->total_amount,2,'.',',').'" style="display:none;" readonly /></td>';
            $tabel .= '<td style="text-align:center;"><a id="btnEdit_'.$no.'" href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green" onclick="editDetail('.$no.');" style="margin-top:5px"> '
                    . '<i class="fa fa-pencil"></i> Edit </a>';
            $tabel .= '<a id="btnUpdate_'.$no.'" href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green-seagreen" onclick="updateDetail('.$no.');" style="margin-top:5px; display:none;"> '
                    . '<i class="fa fa-save"></i> Update </a>';
            $tabel .= '</tr>';
            $netto += $row->netto;
            $total += $row->total_amount;
            $no++;
        }
        $tabel .= '<tr>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,2,'.',',').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        $tabel .= '<td></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function save_detail_so(){
        $return_data = array();
        $tanggal  = date('Y-m-d H:i:s');
        $user_id  = $this->session->userdata('user_id');

        if($this->db->insert('r_t_so_detail', array(
            'so_id'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('barang_id'),
            'amount'=>str_replace(',', '', $this->input->post('harga')),
            'total_amount'=>str_replace(',', '', $this->input->post('total_harga')),
            'netto'=>str_replace(',', '', $this->input->post('netto'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item finish good! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }

    function update_detail_so(){
        $return_data = array();
        $tanggal  = date('Y-m-d H:i:s');
        $user_id  = $this->session->userdata('user_id');
        
        $this->db->where('id', $this->input->post('detail_id'));
        if($this->db->update('r_t_so_detail', array(
            'jenis_barang_id'=>$this->input->post('jenis_barang_id'),
            'amount'=>str_replace(',', '', $this->input->post('amount')),
            'total_amount'=>str_replace(',', '', $this->input->post('total_amount')),
            'netto'=>str_replace(',', '', $this->input->post('netto')),
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal meng-update item finish good! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data);     
    }

    function update_so(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Y-m-d', strtotime($this->input->post('tanggal_po')));
        
        $this->db->trans_start();
        $data = array(
                'no_so' => $this->input->post('no_so'),
                'tanggal'=> $tgl_input,
                'marketing_id'=>$this->input->post('marketing_id'),
                'cv_id'=>$this->input->post('m_customer_id'),
                'po_id'=>$this->input->post('po_id'),
                'tgl_po'=>$tgl_po,
                'term_of_payment'=>$this->input->post('term_of_payment'),
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('r_t_so', $data);

                //API START//

                $this->load->helper('target_url');

                $myDetails = $this->Model_so->load_detail_so($this->input->post('id'))->result();
                $data_post['header'] = array_merge($data, array('reff2' => $this->input->post('id')));
                $data_post['detail'] = $myDetails;

                $post = json_encode($data_post);

                // print_r($post);
                // die();
                $ch = curl_init(target_url().'api/ReffAPI/so_update');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: 34a75f5a9c54076036e7ca27807208b8'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $result = json_decode($response, true);
                curl_close($ch);
                // print_r($response);
                // die();

                //API END//
        
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data sales order jasa berhasil disimpan');
            redirect('index.php/R_SO');
        }else{
            $this->session->set_flashdata('flash_msg', 'Data sales order jasa gagal disimpan');
            redirect('index.php/R_SO');
        }
    }

    function get_so(){
        $id = $this->input->post('id');
        $so = $this->Model_so->get_so($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($so); 
    }
}