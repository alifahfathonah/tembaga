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

    function print_stok_v1(){
        $data = $this->db->query("select x.*, g.no_packing no_packing_gudang, g.bruto, g.netto, g.nomor_bobbin, jb.kode, jb.jenis_barang
            from
            (select o.tanggal, o.id, od.gudang_id, od.no_packing hasil_scan, od.jenis_barang_id
            from 
            stok_opname_detail od,
            stok_opname o
            where
            od.stok_opname_id = o.id
            ) x
            left join t_gudang_fg g on g.id = x.gudang_id
            left join jenis_barang jb on jb.id = x.jenis_barang_id
            order by jb.kode
            ;");
        return $data;
    }
}