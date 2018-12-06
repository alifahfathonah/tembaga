<?php
class Model_bobin extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From bobin Order By nama_bobin");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From bobin Where nama_bobin='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From bobin Where id=".$id);        
        return $data;
    }
}