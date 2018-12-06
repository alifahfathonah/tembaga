<?php
class Model_voucher_cost extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select voucher.*, 
                gc.nama_group_cost,
                cost.nama_cost
                From voucher 
                    Left Join group_cost gc On (voucher.group_cost_id = gc.id) 
                    Left Join cost On (voucher.cost_id = cost.id) 
                Where voucher.jenis_voucher='Manual'
                Order By voucher.no_voucher");
        return $data;
    }
    
    function get_cost_list($id){
        $data = $this->db->query("Select * From cost Where group_cost_id=".$id);
        return $data;
    }
            
    function show_data($id){
        $data = $this->db->query("Select * From cost Where id=".$id);        
        return $data;
    }
    
    function list_group_cost(){
        $data = $this->db->query("Select * From group_cost Order By nama_group_cost");
        return $data;
    }
}