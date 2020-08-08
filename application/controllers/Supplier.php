<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller{
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

        $data['content']= "supplier/index";
        $this->load->model('Model_supplier');
        $data['list_data'] = $this->Model_supplier->list_data()->result();
        
        $data['list_provinsi'] = $this->Model_supplier->list_provinsi()->result();
        $data['list_city'] = $this->Model_supplier->list_kota(1)->result();
        $data['list_bank'] = $this->Model_supplier->list_bank()->result();

        $this->load->view('layout', $data);
    }

    function save(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                    'nama_supplier'=> $this->input->post('nama_supplier'),
                    'pic'=> $this->input->post('pic'),
                    'telepon'=> $this->input->post('telepon'),
                    'hp'=> $this->input->post('hp'),
                    'alamat'=> $this->input->post('alamat'),
                    'npwp'=> $this->input->post('npwp'),
                    'kode_supplier'=> $this->input->post('kode_supplier'),
                    'flag_gudang'=> 1,
                    'created'=> $tanggal,
                    'created_by'=> $user_id,
                    'modified'=> $tanggal,
                    'modified_by'=> $user_id
                );
       
        $this->db->insert('supplier', $data); 
        $this->session->set_flashdata('flash_msg', 'Data supplier berhasil disimpan');
        redirect('index.php/Supplier');       
    }
    
    function get_city_list(){ 
        $id = $this->input->post('id');
        $this->load->model('Model_supplier');
        $cities = $this->Model_supplier->list_kota($id)->result(); 
        foreach ($cities as $row) {
            $arr_city[$row->id] = $row->city_name;
        } 
        print form_dropdown('m_city_id', $arr_city);
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('supplier');            
        }
        $this->session->set_flashdata('flash_msg', 'Data supplier berhasil dihapus');
        redirect('index.php/Supplier');
    }
    
    function edit(){
        $id = $this->input->post('id');
        $this->load->model('Model_supplier');
        $data = $this->Model_supplier->show_data($id)->row_array(); 
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }
    
    function update(){
        $user_id  = $this->session->userdata('user_id');
        $tanggal  = date('Y-m-d H:i:s');
        
        $data = array(
                'nama_supplier'=> $this->input->post('nama_supplier'),
                'pic'=> $this->input->post('pic'),
                'telepon'=> $this->input->post('telepon'),
                'hp'=> $this->input->post('hp'),
                'alamat'=> $this->input->post('alamat'),
                'npwp'=> $this->input->post('npwp'),
                'kode_supplier'=> $this->input->post('kode_supplier'),
                //'flag_sinkronisasi'=>0,
                //'flag_action'=>'U',
                'modified'=> $tanggal,
                'modified_by'=> $user_id
            );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('supplier', $data);
        
        $this->session->set_flashdata('flash_msg', 'Data supplier berhasil disimpan');
        redirect('index.php/Supplier');
    }

    function get_tables(){

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * Easy set variables
         */

        // DB table to use
        $table = 'supplier';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case object
        // parameter names
        $columns = array(
            array( 'db' => 'id', 'dt' => 'id' ),
            array( 'db' => 'kode_supplier',  'dt' => 'kode_supplier' ),
            array( 'db' => 'nama_supplier',  'dt' => 'nama_supplier' ),
            array( 'db' => 'pic',   'dt' => 'pic' ),
            array( 'db' => 'telepon',   'dt' => 'telepon' ),
            array( 'db' => 'hp',   'dt' => 'hp' ),
            array( 'db' => 'npwp',   'dt' => 'npwp' ),
            array( 'db' => 'alamat',     'dt' => 'alamat' ),
            array(
                'db'        => 'alamat',
                'dt'        => 'alamat',
                'formatter' => function( $d, $row ) {
                    return substr($d, 0, 30).'...';
                }
            )
        );

        // SQL server connection information
        $sql_details = array(
            'user' => 'kmpadmin',
            'pass' => 'kmpadmin%$#@!',
            'db'   => 'tembagaprod',
            'host' => 'localhost'
        );


        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */

        require( 'assets/global/plugins/datatables/examples/server_side/scripts/ssp.class.php' );

        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );
    }
    
}