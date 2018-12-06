<?php
class Model_group_cost extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From group_cost Order By nama_group_cost");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From group_cost Where nama_group_cost='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From group_cost Where id=".$id);        
        return $data;
    }
}