<?php
class Model_ttr_resmi extends CI_Model{

    
    function list_data(){
        $data = $this->db->query("
            SELECT *,rongsok.id as ids FROM ttr_detail left join ttr on ttr_id = ttr_detail.ttr_id left join rongsok on ttr_detail.rongsok_id = rongsok_id group by rongsok.id ");
        return $data;
    }


    public function list_data2(){

        $sql = $this->db->query("select * from temporary");
        return $sql;

    }

    public function proses_save(){
        $data = array(
            'nama_barang'=>$this->input->post('nama_barang'),
            'qty'=>$this->input->post('qty'),
            'harga_satuan'=>$this->input->post('harga_satuan'),
            'total_harga'=>$this->input->post('total_harga'),
            'ppn'=>$this->input->post('ppn'),
            );
        $this->db->insert('app_proses_resmi',$data);
        return $data;
    }




}


?>