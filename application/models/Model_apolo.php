<?php
class Model_apolo extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From apolo Order By id");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From apolo Where tipe_apolo='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From apolo Where id=".$id);        
        return $data;
    }
}