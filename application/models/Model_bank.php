<?php
class Model_bank extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From bank Order By kode_bank");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From bank Where kode_bank='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From bank Where id=".$id);        
        return $data;
    }
}