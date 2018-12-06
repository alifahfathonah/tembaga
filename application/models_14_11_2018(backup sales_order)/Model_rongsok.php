<?php
class Model_rongsok extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select * From rongsok Where type_barang='Rongsok' Order By nama_item");
        return $data;
    }

    function list_data_on_po($id){
        $data = $this->db->query("Select rongsok.id,rongsok.uom,rongsok.nama_item From po_detail 
                left join rongsok on rongsok.id = po_detail.rongsok_id
                Where type_barang='Rongsok' And
                po_detail.po_id = ".$id."
                group by rongsok.id
                Order By nama_item");
        return $data;
    }


    function cek_data($code){
        $data = $this->db->query("Select * From rongsok Where type_barang='Rongsok' And nama_item='".$code."'");        
        return $data;
    }
    
    function show_data_po($idpo,$iditem){
        $data = $this->db->query("Select rongsok.uom, po_detail.qty, po_detail.id, po_detail.rongsok_id From po_detail 
                left join rongsok on rongsok.id = po_detail.rongsok_id
                Where po_detail.po_id=".$idpo
                ." and rongsok.id =".$iditem);        
        return $data;
    }

    function show_data($id){
        $data = $this->db->query("Select * From rongsok Where id=".$id);        
        return $data;
    }
}