<?php
class Model_rongsok extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From rongsok Where type_barang='Rongsok' Order By nama_item");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From rongsok Where type_barang='Rongsok' And nama_item='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From rongsok Where id=".$id);        
        return $data;
    }
}