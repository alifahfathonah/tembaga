<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PurchaseOrder extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/Login"));
        }
        $this->load->model('Model_purchase_order');
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

        $data['content']= "resmi/purchase_order/index";
        $data['list_data'] = $this->Model_purchase_order->po_list()->result();

        $this->load->view('layout', $data);
    }

    function add_po(){
    	$module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "resmi/purchase_order/add_po";
        $data['customer_list'] = $this->Model_purchase_order->customer_list()->result();

        $this->load->view('layout', $data);
    }

    function get_contact_name(){
    	$id = $this->input->post('id');
        $data = $this->Model_purchase_order->get_contact_name($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    function save_po(){
    	$user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
            'no_po'=> $this->input->post('no_po'),
            'tanggal'=> $tgl_input,
            'customer_id'=>$this->input->post('customer_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'jenis_po'=>'JASA',
            'created_at'=> $tanggal,
            'created_by'=> $user_id
        );

        if($this->db->insert('r_t_po', $data)){
            redirect('index.php/PurchaseOrder/edit_po/'.$this->db->insert_id());  
        }else{
            $this->session->set_flashdata('flash_msg', 'PO JASA gagal disimpan, silahkan dicoba kembali!');
            redirect('index.php/PurchaseOrder');  
        }  
    }

    function edit_po(){
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

            $data['content']= "resmi/purchase_order/edit_po";
            $this->load->model('Model_beli_fg');
            $data['header'] = $this->Model_purchase_order->show_header_po($id)->row_array();  
            $data['list_data'] = $this->Model_beli_fg->load_detail_po($id)->result();
            $data['list_detail'] = $this->Model_beli_fg->show_data_po($id)->result();
            $data['list_fg'] = $this->Model_beli_fg->list_fg()->result();

        	$data['customer_list'] = $this->Model_purchase_order->customer_list()->result();
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/BeliFinishGood');
        }
    }

    function save_detail_po(){
    	$return_data = array();
        
        if($this->db->insert('r_t_po_detail', array(
            'po_id'=>$this->input->post('id'),
            'fg_id'=>$this->input->post('fg_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'netto'=>str_replace('.', '', $this->input->post('qty')),
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

    function load_detail_po(){
    	$id = $this->input->post('id');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        
        $myDetail = $this->Model_purchase_order->load_detail_po($id)->result(); 
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align: center;">'.$no.'</td>';
            $tabel .= '<td>'.$row->kode.' - '.$row->jenis_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align: right;">'.$row->amount.'</td>';
            $tabel .= '<td style="text-align: right;">'.$row->netto.'</td>';
            $tabel .= '<td style="text-align: right;">'.$row->total_amount.'</td>';
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
        $tabel .= '<td></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function delete_detail_po(){
    	$id = $this->input->post('id');
        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('r_t_po_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item finish good! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_po(){
    	$user_id   = $this->session->userdata('user_id');
        $tanggal   = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
            'no_po'=> $this->input->post('no_po'),
            'tanggal'=> $tgl_input,
            'customer_id'=>$this->input->post('customer_id'),
            'term_of_payment'=>$this->input->post('term_of_payment'),
            'jenis_po'=>'JASA',
            'remarks'=>$this->input->post('remarks'),
            'modified_at'=> $tanggal,
            'modified_by'=> $user_id
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('r_t_po', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data PO Jasa Finish Good berhasil disimpan');
        redirect('index.php/PurchaseOrder');
    }

    function print_po(){
    	$id = $this->uri->segment(3);
        if($id){        
            $data['header']  = $this->Model_purchase_order->show_header_po($id)->row_array();
            $data['details'] = $this->Model_purchase_order->load_detail_po($id)->result();

            $this->load->view('resmi/purchase_order/print_po', $data);
        }else{
            redirect('index.php'); 
        }
    }
}