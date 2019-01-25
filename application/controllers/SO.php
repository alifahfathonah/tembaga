<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SO extends CI_Controller{
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
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/salesorder/index";
        $data['list_data'] = $this->Model_so->so_list()->result();

        $this->load->view('layout', $data);
    }

    function add_so(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "resmi/salesorder/add_so";
        
        $this->load->model('Model_sales_order');
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        $data['marketing_list'] = $this->Model_sales_order->marketing_list()->result();
        $data['option_jenis_barang'] = $this->Model_sales_order->jenis_barang_list()->result();
        $data['list_po'] = $this->Model_so->list_po()->result();
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
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Y-m-d', strtotime($this->input->post('tanggal_po')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SO', $tgl_input); 
        
        $category = $this->input->post('jenis_barang');

        $this->db->trans_start();
        $t_data = array(
            'no_so'=>$this->input->post('no_so'),
            'tanggal'=>$tgl_input,
            'marketing_id'=>$this->input->post('marketing_id'),
            'customer_id'=>$this->input->post('m_customer_id'),
            'po_id'=>$this->input->post('po_id'),
            'tgl_po'=>$tgl_po,
            'jenis_so'=>'JASA',
            'jenis_barang'=>'FG',
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );

        $this->db->insert('r_t_so', $t_data);
        $so_id = $this->db->insert_id();
        $loop = $this->db->get_where('r_t_po_detail', array('po_id'=>$this->input->post('po_id')))->result();
        foreach ($loop as $row) {
            $data_sod = array(
                'so_id' => $so_id,
                'po_detail_id' => $row->id,
                'jenis_barang_id' => $row->fg_id,
                'netto' => $row->netto,
                'amount' => $row->amount,
                'total_amount' => $row->total_amount

            );
            $this->db->insert('r_t_so_detail', $data_sod);
        }
                  
        if ($this->db->trans_complete()) {
            redirect('index.php/SO/edit_so/'.$so_id);  
        } else {
            $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/SO');  
        }
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
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['marketing_list'] = $this->Model_sales_order->marketing_list()->result();
            $data['option_jenis_barang'] = $this->Model_sales_order->jenis_barang_list()->result();
            $data['list_po'] = $this->Model_so->list_po()->result();
            $data['list_detail'] = $this->Model_so->list_detail_so($id)->result();
            $data['jenis_barang'] = $this->Model_so->jenis_barang_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/SO');
        }
    }

    function load_detail_so(){
        $id = $this->input->post('id');

        $no = 1;
        $total = 0;
        $netto = 0;
        $tabel = "";
        $jenis_barang = $this->Model_so->jenis_barang_list()->result();

        $myDetails = $this->Model_so->list_detail_so($id)->result();
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
            $tabel .= '<td style="text-align:right;"><label id="lbl_amount_'.$no.'">'.number_format($row->amount,0,',','.').'</label>';
            $tabel .= '<input type="text" id="amount_'.$no.'" name="amount_'.$no.'" class="form-control myline" value="'.$row->amount.'" onkeydown="return myCurrency_a(event);" maxlength="10" value="0" onkeyup="getComa_a(this.value, this.id,'.$no.');"  style="display:none;"/></td>';
            $tabel .= '<td style="text-align:right;"><label id="lbl_netto_'.$no.'">'.number_format($row->netto,0,',','.').'</label>';
            $tabel .= '<input type="text" id="netto_'.$no.'" name="netto_'.$no.'" class="form-control myline" value="'.$row->netto.'"  style="display:none;" onkeydown="return myCurrency_a(event);" maxlength="10" value="0" onkeyup="getComa_a(this.value, this.id, '.$no.');"/></td>';
            $tabel .= '<td style="text-align:right;"><label id="lbl_total_amount_'.$no.'">'.number_format($row->total_amount,0,',','.').'</label>';
            $tabel .= '<input type="text" id="total_amount_'.$no.'" name="total_amount_'.$no.'" class="form-control myline" value="'.$row->total_amount.'" style="display:none;" readonly /></td>';
            $tabel .= '<td style="text-align:center;"><a id="btnEdit_'.$no.'" href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green" onclick="editDetail('.$no.');" style="margin-top:5px"> '
                    . '<i class="fa fa-pencil"></i> Edit </a>';
            $tabel .= '<a id="btnUpdate_'.$no.'" href="javascript:;" class="btn btn-xs btn-circle '
                    . 'green-seagreen" onclick="updateDetail('.$no.');" style="margin-top:5px; display:none;"> '
                    . '<i class="fa fa-save"></i> Update </a>';
            $tabel .= '<a id="btnDelete_'.$no.'" href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $netto += $row->netto;
            $total += $row->total_amount;
            $no++;
        }
        $tabel .= '<tr>';
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        $tabel .= '</tr>';

        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function delete_detail_so(){
        $id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('r_t_so_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item finish good! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function save_detail_so(){
        $return_data = array();
        $tanggal  = date('Y-m-d h:m:s');
        $user_id  = $this->session->userdata('user_id');

        if($this->db->insert('r_t_so_detail', array(
            'so_id'=>$this->input->post('id'),
            'jenis_barang_id'=>$this->input->post('barang_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'total_amount'=>str_replace('.', '', $this->input->post('total_harga')),
            'netto'=>str_replace('.', '', $this->input->post('netto'))
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
        $tanggal  = date('Y-m-d h:m:s');
        $user_id  = $this->session->userdata('user_id');
        
        $this->db->where('id', $this->input->post('detail_id'));
        if($this->db->update('r_t_so_detail', array(
            'jenis_barang_id'=>$this->input->post('jenis_barang_id'),
            'amount'=>str_replace('.', '', $this->input->post('amount')),
            'total_amount'=>str_replace('.', '', $this->input->post('total_amount')),
            'netto'=>str_replace('.', '', $this->input->post('netto'))
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
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tgl_po = date('Y-m-d', strtotime($this->input->post('tanggal_po')));
        
        $data = array(
                'no_so'=> $this->input->post('no_so'),
                'tanggal'=> $tgl_input,
                'marketing_id'=>$this->input->post('marketing_id'),
                'customer_id'=>$this->input->post('customer_id'),
                'po_id'=>$this->input->post('po_id'),
                'tgl_po'=>$tgl_po,
                'remarks'=>$this->input->post('remarks'),
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('r_t_so', $data);

        $this->db->where('id', $this->input->post('po_id'));
        $this->db->update('r_t_po', array('flag_so' => 1));
        
        $this->session->set_flashdata('flash_msg', 'Data sales order jasa berhasil disimpan');
        redirect('index.php/SO');
    }
}