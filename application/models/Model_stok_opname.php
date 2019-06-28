<?php
class Model_stok_opname extends CI_Model{
    
    function list_report(){
        $data = $this->db->query("SELECT sop.*, (SELECT COUNT(id) FROM stok_opname_detail sopd WHERE sopd.stok_opname_id = sop.id) AS jumlah_item
            FROM stok_opname sop ORDER BY tanggal");
        return $data;
    }

    function get_packing($no){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom from t_gudang_fg tgf 
                left JOIN jenis_barang jb on jb.id = tgf.jenis_barang_id
                WHERE tgf.no_packing='".$no."'");
        return $data;
    }

    function header_stok_opname_fg($id){
        return $this->db->get_where('stok_opname', ['id' => $id]);
    }

    function list_stok_opname_fg($id){
        $data = $this->db->query("select sod.*, jb.jenis_barang, jb.uom from stok_opname_detail sod 
                left JOIN jenis_barang jb on jb.id = sod.jenis_barang_id
                WHERE sod.stok_opname_id = ".$id);
        return $data;
    }
}