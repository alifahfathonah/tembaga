<?php
class Model_cost extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select cost.*, gc.nama_group_cost From cost 
                    Left Join group_cost gc On (cost.group_cost_id = gc.id)
                Order By cost.nama_cost");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From cost Where nama_cost='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From cost Where id=".$id);        
        return $data;
    }
    
    function list_group_cost_add(){
        $data = $this->db->query("Select * From group_cost where id > 2");
        return $data;
    }

    function list_group_cost(){
        $data = $this->db->query("Select * From group_cost Order By nama_group_cost");
        return $data;
    }
}