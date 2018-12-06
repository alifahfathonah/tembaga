<?php
class Model_jenis_barang extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From jenis_barang Order By jenis_barang");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From jenis_barang Where jenis_barang='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From jenis_barang Where id=".$id);        
        return $data;
    }
}