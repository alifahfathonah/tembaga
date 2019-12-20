<?php
class Model_jenis_barang extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select jb.*, o.kode_owner, o.nama_owner From jenis_barang jb
            left join owner o on jb.owner = o.id
        Order By jenis_barang");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From jenis_barang Where jenis_barang='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select * From jenis_barang Where id=".$id);        
        return $data;
    }
}