<?php
class Model_m_ingot_rendah extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From rongsok Where type_barang='Ingot Rendah' Order By nama_item");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From rongsok Where type_barang='Ingot Rendah' And nama_item='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From rongsok Where id=".$id);        
        return $data;
    }
}