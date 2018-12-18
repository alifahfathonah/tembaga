<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SalesOrder extends CI_Controller{
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

        $data['content']= "sales_order/index";
        $this->load->model('Model_sales_order');
        $data['list_data'] = $this->Model_sales_order->so_list()->result();

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
        $data['content']= "sales_order/add";
        
        $this->load->model('Model_sales_order');
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        $data['marketing_list'] = $this->Model_sales_order->marketing_list()->result();
        $data['option_jenis_barang'] = $this->Model_sales_order->jenis_barang_list()->result();
        $this->load->view('layout', $data);
    }

    function view_so(){
        $module_name = $this->uri->segment(1);
        $id = $this->uri->segment(3);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "sales_order/view_so";
        
            $this->load->model('Model_sales_order');
            $data['header']  = $this->Model_sales_order->show_header_so($id)->row_array();
            if($data['header']['jenis_barang'] == 'RONGSOK'){
            $data['detailSPB'] = $this->Model_sales_order->show_detail_spb_fulfilment_rsk($id)->result();
            $data['details'] = $this->Model_sales_order->show_detail_so_rsk($id)->result();
            $data['detailSJ'] = $this->Model_sales_order->load_detail_view_sj_rsk($id)->result();
            }else{
            $data['detailSPB'] = $this->Model_sales_order->show_detail_spb_fulfilment($id)->result();
            $data['details'] = $this->Model_sales_order->show_detail_so($id)->result();
            $data['detailSJ'] = $this->Model_sales_order->load_detail_view_sj($id)->result();
            }

            $this->load->view('layout', $data);
    }
    
    function get_contact_name(){
        $id = $this->input->post('id');
        $this->load->model('Model_sales_order');
        $data = $this->Model_sales_order->get_contact_name($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }
    
    function get_uom(){
        $id = $this->input->post('id');
        $this->load->model('Model_sales_order');
        $rongsok= $this->Model_sales_order->show_data($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($rongsok); 
    }

    function print_so(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_sales_order');
            $data['header']  = $this->Model_sales_order->show_header_so($id)->row_array();
            $data['details'] = $this->Model_sales_order->show_detail_so($id)->result();

            $this->load->view('sales_order/print_so', $data);
        }else{
            redirect('index.php'); 
        }
    }    

    function load_detail_so(){
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        
        $tabel = "";
        $no    = 1;
        $total = 0;
        $bruto = 0;
        $netto = 0;
        
        $this->load->model('Model_sales_order');  
        if($jenis == 'RONGSOK'){
        $myDetail = $this->Model_sales_order->load_detail_so_rongsok($id)->result();
        }else{
        $myDetail = $this->Model_sales_order->load_detail_so($id)->result();
        }
        foreach ($myDetail as $row){
            $tabel .= '<tr>';
            $tabel .= '<td style="text-align:center">'.$no.'</td>';
            $tabel .= '<td>'.$row->nama_barang.'</td>';
            $tabel .= '<td>'.$row->uom.'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->amount,0,',','.').'</td>';
            if($jenis == 'WIP'){
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
            $tabel .= '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
            }else if($jenis == 'FG'){
            $tabel .= '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
            }else{
            $tabel .= '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
            }
            $tabel .= '<td style="text-align:right">'.number_format($row->total_amount,0,',','.').'</td>';
            $tabel .= '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle '
                    . 'red" onclick="hapusDetail('.$row->id.');" style="margin-top:5px"> '
                    . '<i class="fa fa-trash"></i> Delete </a></td>';
            $tabel .= '</tr>';
            $total += $row->total_amount;
            $bruto += $row->bruto;
            $netto += $row->netto;
            
            $no++;
        }
        $tabel .= '<tr>';
        if($jenis == 'WIP'){
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($bruto,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        }else if($jenis == 'FG'){
        $tabel .= '<td colspan="4" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($netto,0,',','.').'</strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        }else {
        $tabel .= '<td colspan="5" style="text-align:right"><strong>Total </strong></td>';
        $tabel .= '<td style="text-align:right; background-color:green; color:white"><strong>'.number_format($total,0,',','.').'</strong></td>';
        }
        $tabel .= '<td></td>';
        $tabel .= '</tr>';
        
        header('Content-Type: application/json');
        echo json_encode($tabel); 
    }

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $user_ppn  = $this->session->userdata('user_ppn');
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SO', $tgl_input); 
        
        if($code){
            $category = $this->input->post('jenis_barang');
            
            if($category == 'FG'){
                $num = $this->Model_m_numberings->getNumbering('SPB-FG', $tgl_input); 
                $dataC = array(
                    'no_spb'=> $num,
                    'tanggal'=> $tgl_input,
                    'keterangan'=>'SALES ORDER FINISH GOOD',
                    'created_at'=> $tanggal,
                    'created_by'=> $user_id
                );
                $this->db->insert('t_spb_fg', $dataC);
                $insert_id = $this->db->insert_id();

            }else if($category == 'WIP'){
                $num = $this->Model_m_numberings->getNumbering('SPB-WIP', $tgl_input); 
                $dataC = array(
                    'no_spb_wip'=> $num,
                    'tanggal'=> $tgl_input,
                    'keterangan'=>'SALES ORDER WIP',
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );
                $this->db->insert('t_spb_wip', $dataC);
                $insert_id = $this->db->insert_id();

            }else if($category == 'RONGSOK'){
                $num = $this->Model_m_numberings->getNumbering('SPB-RSK', $tgl_input);
                $dataC = array(
                    'no_spb'=> $num,
                    'jenis_barang'=> 1,
                    'tanggal'=> $tanggal,
                    'remarks'=> 'SALES ORDER RONGSOK',
                    'created'=> $tanggal,
                    'created_by'=> $user_id
                );
                $this->db->insert('spb', $dataC);
                $insert_id = $this->db->insert_id();
            }

            $data = array(
                'no_sales_order'=> $code,
                'tanggal'=> $tgl_input,
                'flag_ppn'=>$user_ppn,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'created'=> $tanggal,
                'created_by'=> $user_id,
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );

            $this->db->insert('sales_order', $data);
            $so_id = $this->db->insert_id();

            $t_data = array(
                'alias'=>$this->input->post('alias'),
                'so_id'=>$so_id,
                'no_po'=>$this->input->post('no_po'),
                'no_spb'=>$insert_id,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('t_sales_order', $t_data)){
                redirect('index.php/SalesOrder/edit/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/SalesOrder');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Sales order gagal disimpan, penomoran belum disetup!');
            redirect('index.php/SalesOrder');
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

            $data['content']= "sales_order/edit";
            $this->load->model('Model_sales_order');
            $data['header'] = $this->Model_sales_order->show_header_so($id)->row_array();  
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['marketing_list'] = $this->Model_sales_order->marketing_list()->result();
            $jenis = $data['header']['jenis_barang'];
            if($jenis == 'RONGSOK'){
            $data['list_barang'] = $this->Model_sales_order->list_barang_so_rongsok()->result();
            }else{
            $data['list_barang'] = $this->Model_sales_order->list_barang_so($jenis)->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/SalesOrder');
        }
    }

    function save_detail_so(){
        $return_data = array();
        $tanggal  = date('Y-m-d h:m:s');
        $user_id  = $this->session->userdata('user_id');
        $spb = $this->input->post('no_spb');
        $jenis = $this->input->post('jenis');

        if($jenis == 'FG'){
            $dataC = array(
                't_spb_fg_id'=>$spb,
                'tanggal'=>$tanggal,
                'jenis_barang_id'=>$this->input->post('barang_id'),
                'uom'=>$this->input->post('uom'),
                'netto'=>$this->input->post('netto'),
                'keterangan'=>'SALES ORDER'
            );
            $this->db->insert('t_spb_fg_detail', $dataC);
            $insert_id = $this->db->insert_id();
        }else if($jenis == 'WIP'){
            $dataC = array(
                't_spb_wip_id'=>$spb,
                'tanggal'=>$tanggal,
                'jenis_barang_id'=>$this->input->post('barang_id'),
                'qty'=>$this->input->post('qty'),
                'uom'=>$this->input->post('uom'),
                'berat'=>$this->input->post('netto'),
                'keterangan'=>'SALES ORDER'
            );
            $this->db->insert('t_spb_wip_detail', $dataC);
            $insert_id = $this->db->insert_id();
        }else if($jenis == 'RONGSOK'){
            $dataC = array(
                'spb_id'=> $spb,
                'rongsok_id'=> $this->input->post('barang_id'),
                'qty'=> $this->input->post('qty'),
                'line_remarks'=> 'SALES ORDER',
                'created'=> $tanggal,
                'created_by'=> $user_id
            );
            $this->db->insert('spb_detail', $dataC);
            $insert_id = $this->db->insert_id();
        }

        if($this->db->insert('t_sales_order_detail', array(
            't_so_id'=>$this->input->post('id'),
            'no_spb_detail'=>$insert_id,
            'jenis_barang_id'=>$this->input->post('barang_id'),
            'amount'=>str_replace('.', '', $this->input->post('harga')),
            'qty'=>str_replace('.', '', $this->input->post('qty')),
            'total_amount'=>str_replace('.', '', $this->input->post('total_harga')),
            'bruto'=>str_replace('.', '', $this->input->post('bruto')),
            'netto'=>str_replace('.', '', $this->input->post('netto'))
        ))){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menambahkan item rongsok! Silahkan coba kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($return_data); 
    }
    
    function delete_detail_so(){
        $id = $this->input->post('id');// t_sales_order_detail id
        $jenis = $this->input->post('jenis');// jenis barang FG/WIP/RONGSOK

        $this->load->model('Model_sales_order');
        $no_spb = $this->Model_sales_order->get_no_spb($id)->row();// t_sales_order_detail no_spb

        if($jenis == 'FG'){
            $this->db->where('id',$no_spb->no_spb_detail);
            $this->db->delete('t_spb_fg_detail');
        }else if($jenis == 'WIP'){
            $this->db->where('id',$no_spb->no_spb_detail);
            $this->db->delete('t_spb_wip_detail');
        }else if($jenis == 'RONGSOK'){
            $this->db->where('id',$no_spb->no_spb_detail);
            $this->db->delete('spb_detail');
        }

        $return_data = array();
        $this->db->where('id', $id);
        if($this->db->delete('t_sales_order_detail')){
            $return_data['message_type']= "sukses";
        }else{
            $return_data['message_type']= "error";
            $return_data['message']= "Gagal menghapus item rongsok! Silahkan coba kembali";
        }           
        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    function update_so(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $data = array(
                'tanggal'=> $tgl_input,
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'marketing_id'=>$this->input->post('marketing_id'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('so_id'));
        $this->db->update('sales_order', $data);

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('t_sales_order', array(
                'alias'=> $this->input->post('alias'),
                'no_po'=> $this->input->post('no_po')
            ));
        
        $this->session->set_flashdata('flash_msg', 'Data sales order berhasil disimpan');
        redirect('index.php/SalesOrder');
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

        $data['content']= "sales_order/spb_list";
        $this->load->model('Model_sales_order');
        $data['list_data'] = $this->Model_sales_order->spb_list()->result();

        $this->load->view('layout', $data);
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

            $data['content']= "sales_order/view_spb";

            $this->load->model('Model_sales_order');
            $data['myData'] = $this->Model_sales_order->show_view_header_so($id)->row_array();
            if($data['myData']['jenis_barang'] == 'RONGSOK'){
            $data['myDetail'] = $this->Model_sales_order->show_view_detail_so_rsk($id)->result(); 
            $data['detailSPB'] = $this->Model_sales_order->show_detail_spb_fulfilment_rsk($id)->result();
            }else{
            $data['myDetail'] = $this->Model_sales_order->show_view_detail_so($id)->result(); 
            $data['detailSPB'] = $this->Model_sales_order->show_detail_spb_fulfilment($id)->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/GudangFG/spb_list');
        }
    }

    function print_spb(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_sales_order');
            $data['header']  = $this->Model_sales_order->show_view_header_so($id)->row_array();
            $data['details'] = $this->Model_sales_order->show_view_detail_so($id)->result();

            $this->load->view('sales_order/print_spb', $data);
        }else{
            redirect('index.php'); 
        }
    }

/** SURAT JALAN  */
    function surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;

        $data['content']= "sales_order/surat_jalan";
        $this->load->model('Model_sales_order');
        $data['list_data'] = $this->Model_sales_order->surat_jalan()->result();

        $this->load->view('layout', $data);
    }
    
    function add_surat_jalan(){
        $module_name = $this->uri->segment(1);
        $group_id    = $this->session->userdata('group_id');        
        if($group_id != 1){
            $this->load->model('Model_modules');
            $roles = $this->Model_modules->get_akses($module_name, $group_id);
            $data['hak_akses'] = $roles;
        }
        $data['group_id']  = $group_id;
        $data['content']= "sales_order/add_surat_jalan";
        
        $this->load->model('Model_sales_order');
        $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
        //$data['jenis_barang_list'] = $this->Model_sales_order->jenis_barang_list()->result();
        $data['kendaraan_list'] = $this->Model_sales_order->kendaraan_list()->result();
        $this->load->view('layout', $data);
    }

    function get_alamat(){
        $id = $this->input->post('id');
        $this->load->model('Model_sales_order');
        $customer = $this->Model_sales_order->get_alamat($id)->row_array();

        header('Content-Type: application/json');
        echo json_encode($customer); 
    }

    function get_so_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_sales_order');
        $data = $this->Model_sales_order->get_so_list($id)->result();
        $arr_so[] = "Silahkan pilih....";
        foreach ($data as $row) {
            $arr_so[$row->id] = $row->no_sales_order;
        } 
        print form_dropdown('sales_order_id', $arr_so);
    }

    function get_type_kendaraan(){
        $id = $this->input->post('id');
        $this->load->model('Model_sales_order');
        $type_kendaraan = $this->Model_sales_order->get_type_kendaraan($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($type_kendaraan); 
    }

    function get_jenis_barang(){
        $id = $this->input->post('id');
        $this->load->model('Model_sales_order');
        $jenis_barang = $this->Model_sales_order->get_jenis_barang($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($jenis_barang); 
    }

    function save_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        
        $this->load->model('Model_m_numberings');
        $code = $this->Model_m_numberings->getNumbering('SJ', $tgl_input); 
        
        if($code){        
            $data = array(
                'no_surat_jalan'=> $code,
                'sales_order_id'=>$this->input->post('sales_order_id'),
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('m_customer_id'),
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'created_at'=> $tanggal,
                'created_by'=> $user_id,
                'modified_at'=> $tanggal,
                'modified_by'=> $user_id
            );

            if($this->db->insert('t_surat_jalan', $data)){
                redirect('index.php/SalesOrder/edit_surat_jalan/'.$this->db->insert_id());  
            }else{
                $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, silahkan dicoba kembali!');
                redirect('index.php/SalesOrder/surat_jalan');  
            }            
        }else{
            $this->session->set_flashdata('flash_msg', 'Data surat jalan gagal disimpan, penomoran belum disetup!');
            redirect('index.php/SalesOrder/surat_jalan');
        }
    }
    
    function edit_surat_jalan(){
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

            $data['content']= "sales_order/edit_surat_jalan";
            $this->load->model('Model_sales_order');
            $data['header'] = $this->Model_sales_order->show_header_sj($id)->row_array();  
            $data['customer_list'] = $this->Model_sales_order->customer_list()->result();
            $data['kendaraan_list'] = $this->Model_sales_order->kendaraan_list()->result();

            $jenis = $data['header']['jenis_barang'];
            $soid = $data['header']['sales_order_id'];
            if($jenis == 'FG'){
                $data['list_produksi'] = $this->Model_sales_order->list_item_sj_fg($soid)->result();
            }else if($jenis == 'WIP'){
                $data['list_produksi'] = $this->Model_sales_order->list_item_sj_wip($soid)->result();
            }else{
                $data['list_produksi'] = $this->Model_sales_order->list_item_sj_rsk($soid)->result();
            }
            $this->load->view('layout', $data);   
        }else{
            redirect('index.php/SalesOrder/surat_jalan');
        }
    }

    function get_data_sj(){
        $id = $this->input->post('id');
        $jb = $this->input->post('jenis_barang');
        $this->load->model('Model_sales_order');
        if($jb=='FG'){
        $sj_detail= $this->Model_sales_order->list_item_sj_fg_detail($id)->row_array();
        }else if($jb=='WIP'){
        $sj_detail= $this->Model_sales_order->list_item_sj_wip_detail($id)->row_array();
        }else{
        $sj_detail= $this->Model_sales_order->list_item_sj_rsk_detail($id)->row_array();
        }
        
        header('Content-Type: application/json');
        echo json_encode($sj_detail); 
    }
    
    function update_surat_jalan(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d h:m:s');        
        $tgl_input = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $jenis = $this->input->post('jenis_barang');
        $soid = $this->input->post('so_id');

        #Insert Surat Jalan
        $details = $this->input->post('details');
        foreach ($details as $v) {
            if($v['id_barang']!=''){
                if($jenis=='FG'){// BARANG FINISH GOOD
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'no_packing'=>$v['no_packing'],
                        'qty'=>'1',
                        'bruto'=>$v['bruto'],
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>$v['bobbin'],
                        'line_remarks'=>$v['line_remarks'],
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                    $this->db->where('id',$v['id_barang']);
                    $this->db->update('t_gudang_fg',array(
                        'flag_taken'=>1,
                    ));
                }else if($jenis=='WIP'){//BARANG WIP
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'no_packing'=>0,
                        'qty'=>$v['qty'],
                        'bruto'=>0,
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>0,
                        'line_remarks'=>$v['line_remarks'],
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                    $this->db->where('id',$v['id_barang']);
                    $this->db->update('t_gudang_wip',array(
                        'flag_taken'=>1,
                    ));
                }else if($jenis=='RONGSOK'){
                    $this->db->insert('t_surat_jalan_detail', array(
                        't_sj_id'=>$this->input->post('id'),
                        'jenis_barang_id'=>$v['jenis_barang_id'],
                        'no_packing'=>$v['no_palette'],
                        'qty'=>$v['qty'],
                        'bruto'=>$v['bruto'],
                        'netto'=>$v['netto'],
                        'nomor_bobbin'=>0,
                        'line_remarks'=>$v['line_remarks'],
                        'created_by'=>$user_id,
                        'created_at'=>$tanggal
                    ));
                    $this->db->where('id',$v['id_barang']);
                    $this->db->update('dtr_detail',array(
                        'so_id'=>$this->input->post('so_id')
                    ));
                }
            }
        }

        $this->load->model('Model_sales_order');
        #cek jika surat jalan sudah di kirim semua atau belum
        if($jenis == 'FG'){
            $list_produksi = $this->Model_sales_order->list_item_sj_fg($soid)->result();
        }else if($jenis == 'WIP'){
            $list_produksi = $this->Model_sales_order->list_item_sj_wip($soid)->result();
        }else{
            $list_produksi = $this->Model_sales_order->list_item_sj_rsk($soid)->result();
        }

        if(empty($list_produksi)){
            $this->db->where('id',$soid);
            $this->db->update('sales_order', array(
                'flag_sj'=>1
            ));
        }

        if($jenis=='FG'){
            #insert bobbin_peminjaman
            $this->load->model('Model_m_numberings');
            $code = $this->Model_m_numberings->getNumbering('BB-BR', $tgl_input);

            $this->db->insert('m_bobbin_peminjaman', array(
                'no_surat_peminjaman' => $code,
                'id_surat_jalan' => $this->input->post('id'),
                'id_customer' => $this->input->post('id_customer'),
                'status' => 0,
                'created_by' => $user_id,
                'created_at' => $tanggal
            ));
            $insert_id = $this->db->insert_id();

            $query = $this->db->query('select *from t_surat_jalan_detail where t_sj_id = '.$this->input->post('id'))->result();
            foreach ($query as $row) {
                $this->db->where('nomor_bobbin', $row->nomor_bobbin);
                $this->db->update('m_bobbin', array(
                    'borrowed_by' => $this->input->post('id_customer'),
                    'status' => 2
                ));

                $this->db->insert('m_bobbin_peminjaman_detail', array(
                    'id_peminjaman' => $insert_id,
                    'nomor_bobbin' => $row->nomor_bobbin
                ));
            }
        }

        $data = array(
                'tanggal'=> $tgl_input,
                'jenis_barang'=>$this->input->post('jenis_barang'),
                'm_customer_id'=>$this->input->post('id_customer'),
                'sales_order_id'=>$this->input->post('sales_order_id'),
                'm_kendaraan_id'=>$this->input->post('m_kendaraan_id'),
                'supir'=>$this->input->post('supir'),
                'remarks'=>$this->input->post('remarks'),
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_jalan', $data);

        
        $this->session->set_flashdata('flash_msg', 'Data surat jalan berhasil disimpan');
        redirect('index.php/SalesOrder/surat_jalan');
    }
    
    function print_surat_jalan(){
        $id = $this->uri->segment(3);
        if($id){        
            $this->load->model('Model_sales_order');
            $data['header']  = $this->Model_sales_order->show_header_sj($id)->row_array();
            $data['details'] = $this->Model_sales_order->load_detail_surat_jalan_fg($id)->result();

            $this->load->view('sales_order/print_sj', $data);
        }else{
            redirect('index.php'); 
        }
    }
}