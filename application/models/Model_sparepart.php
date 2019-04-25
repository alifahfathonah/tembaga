<?php
class Model_sparepart extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select s.*, sg.deskripsi From sparepart s
            Left Join sparepart_group sg on sg.id = s.sparepart_group
            Order By nama_item");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From sparepart Where nama_item='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From sparepart Where id=".$id);        
        return $data;
    }

    function list_group(){
        $data = $this->db->query("Select * From sparepart_group");
        return $data;
    }
}