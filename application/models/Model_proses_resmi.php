<?php
class Model_proses_resmi extends CI_Model{


    function list_data(){
        $data = $this->db->query("Select * from app_proses_resmi");
        return $data;
    }


    public function proses_save(){
        $tgl = date('Y-m-d');
        $data = array(
            'kode_barang'=>$this->input->post('kode_barang'),
            'nama_barang'=>$this->input->post('nama_barang'),
            'qty'=>$this->input->post('qty'),
            'harga_satuan'=>$this->input->post('harga_satuan'),
            'total_harga'=>$this->input->post('total_harga'),
            'ppn'=>$this->input->post('ppn'),
            'created'=>$tgl
            );
        $this->db->insert('app_proses_resmi',$data);

    }


    public function delete_data($id){
        $sql = $this->db->query("delete from app_proses_resmi where id = ".$id."");
        return $sql;

    }


    public function list_voucher(){
        $data = $this->db->query("Select * from app_resmi_voucher ");
        return $data;
    }


    public function proses_save_voucher(){
        $tgl = date('Y-m-d');
        $data = array(
            'kode_voucher'=>$this->input->post('kode_voucher'),
            'id_app_resmi'=>$this->input->post('id_app_resmi'),
            'name'=>$this->input->post('name'),
            'amount'=>$this->input->post('amount'),
            'date'=>$tgl
            );
        $this->db->insert('app_resmi_voucher',$data);

    }

    public function request($id){
        $data = $this->db->query(" update app_resmi_voucher set request ='Y' where id = '".$id."'");
        return $data;
    }


    public function list_barcode(){
        $data = $this->db->query("Select * from app_resmi_voucher where request ='Y' and flag = ''");
        return $data;
    }


    public function detail_barcode($id){
        $data = $this->db->query("Select * from app_resmi_voucher where id =".$id." ");
        return $data;
    }

    public function proses_save_barcode(){
        $id = $this->input->post('id');
        $tgl = date('Y-m-d');
        $data = array(
            'id_app_resmi'=>$this->input->post('id_app_resmi'),
            'id_app_voucher'=>$this->input->post('kode_voucher'),
            'kode_barcode'=>$this->input->post('kode_barcode'),
            'description'=>$this->input->post('description'),
            'date'=>$tgl
            );
        $this->db->insert('app_resmi_barcode',$data);

        $this->db->query("update app_resmi_voucher set flag ='1' where id = ".$id."");


    }

    public function filter_barcode(){
        $data = $this->db->query("Select * from app_resmi_barcode");
        return $data;
    }



    public function list_sj(){
        $data = $this->db->query("Select * from app_resmi_barcode");
        return $data;
    }



    public function list_sj_detail($id){
        $data = $this->db->query("Select * from app_resmi_barcode where id =".$id."");
        return $data;
    }


    public function select_kode_barang(){

        $data = $this->db->query("Select kode_barang from app_proses_resmi");
        return $data;   
    }



}

?>