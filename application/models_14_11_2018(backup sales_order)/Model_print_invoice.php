<?php
class Model_print_invoice extends CI_Model{
    
    function list_data(){
        $data = $this->db->query("select * from temporary");        
        return $data;
    }
}