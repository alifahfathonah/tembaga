<?php
class Model_stok_opname extends CI_Model{
    
    function list_report($jenis){
        $data = $this->db->query("SELECT sop.*, (SELECT COUNT(id) FROM stok_opname_detail sopd WHERE sopd.stok_opname_id = sop.id) AS jumlah_item
            FROM stok_opname sop WHERE sop.jenis_stok_opname = '".$jenis."' ORDER BY tanggal");
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

    function list_stok_opname_fg_new($id){
        $data = $this->db->query("select sod.*, jb.kode, jb.jenis_barang, jb.uom, tgf.no_produksi, tgf.bruto, tgf.berat_bobbin, tgf.tanggal_masuk from stok_opname_detail sod 
                left JOIN jenis_barang jb on jb.id = sod.jenis_barang_id
                LEFT JOIN t_gudang_fg tgf ON tgf.id = sod.gudang_id
                WHERE sod.stok_opname_id = ".$id." and flag_simpan = 0");
        return $data;
    }

    function list_stok_opname_fg($id){
        $data = $this->db->query("select sod.*, jb.kode, jb.jenis_barang, jb.uom, tgf.no_produksi, tgf.bruto, tgf.berat_bobbin, tgf.tanggal_masuk from stok_opname_detail sod 
                left JOIN jenis_barang jb on jb.id = sod.jenis_barang_id
                LEFT JOIN t_gudang_fg tgf ON tgf.id = sod.gudang_id
                WHERE sod.stok_opname_id = ".$id);
        return $data;
    }

    function print_stok_v1(){
        $data = $this->db->query("select x.*, g.no_packing no_packing_gudang, g.bruto, g.netto, g.nomor_bobbin, jb.kode, jb.jenis_barang, g.berat_bobbin, g.no_produksi, g.tanggal_masuk
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
            order by jb.kode;");
        return $data;
    }

    function stock_missing($tanggal){
        $data = $this->db->query("SELECT tfg.*, jb.jenis_barang, jb.uom, jb.kode
            FROM t_gudang_fg tfg
            LEFT JOIN jenis_barang jb ON jb.id = tfg.jenis_barang_id
            WHERE (tfg.tanggal_keluar = '0000-00-00' OR tfg.tanggal_keluar > '".$tanggal."') AND tfg.tanggal_masuk <= '".$tanggal."' AND tfg.id NOT IN (
                SELECT gudang_id 
                FROM stok_opname_detail sod
                LEFT JOIN stok_opname so ON so.tanggal = '".$tanggal."' AND so.id = sod.stok_opname_id
                )");
        return $data;
    }

    function list_stok_opname_rongsok_new($id){
        $data = $this->db->query("select sod.*, r.kode_rongsok, r.nama_item, r.uom, dtrd.bruto, dtrd.berat_palette, dtrd.tanggal_masuk from stok_opname_detail sod 
                left JOIN rongsok r on r.id = sod.jenis_barang_id
                LEFT JOIN dtr_detail dtrd ON dtrd.id = sod.dtr_detail_id
                WHERE sod.stok_opname_id = ".$id." and flag_simpan = 0");
        return $data;
    }

    function list_stok_opname_rongsok($id){
        $data = $this->db->query("select sod.*, r.kode_rongsok, r.nama_item, r.uom, dtrd.bruto, dtrd.berat_palette, dtrd.tanggal_masuk from stok_opname_detail sod 
                left JOIN rongsok r on r.id = sod.jenis_barang_id
                LEFT JOIN dtr_detail dtrd ON dtrd.id = sod.dtr_detail_id
                WHERE sod.stok_opname_id = ".$id);
        return $data;
    }

    function get_palette($no){
        $data = $this->db->query("select dtrd.*, r.nama_item, r.uom 
                from dtr_detail dtrd 
                left JOIN rongsok r on r.id = dtrd.rongsok_id
                WHERE dtrd.no_pallete='".$no."'");
        return $data;
    }

    function print_stok_rongsok(){
        $data = $this->db->query("select x.*, dtrd.no_pallete no_packing_gudang, dtrd.bruto, dtrd.netto, dtrd.berat_palette, r.kode_rongsok, r.nama_item, dtrd.tanggal_masuk
            from
                (select o.tanggal, o.id, od.dtr_detail_id, od.no_packing hasil_scan, od.jenis_barang_id
                from 
                stok_opname_detail od,
                stok_opname o
                where
                od.stok_opname_id = o.id
                ) x
            left join dtr_detail dtrd on dtrd.id = x.dtr_detail_id
            left join rongsok r on r.id = x.jenis_barang_id
            order by r.kode_rongsok;");
        return $data;
    }
}