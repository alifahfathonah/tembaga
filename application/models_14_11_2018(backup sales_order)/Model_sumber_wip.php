<?php
class Model_sumber_wip extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From m_sumber_wip");
        return $data;
    }

}