<?php
class Model_sinkronisasi extends CI_Model{
    function sales_order_fg(){
        return $this->db->query("select so.*, tso.alias, tso.no_po, tso.tgl_po, tso.term_of_payment, tso.no_spb, tso.jenis_so, tso.jenis_barang, tso.currency, tso.kurs, COALESCE(tsf.no_spb,tsw.no_spb_wip,spb.no_spb,'') as nomor_spb, COALESCE(tsf.status,tsw.status,spb.status,'') as status, COALESCE(tsf.flag_tolling, tsw.flag_tolling, spb.flag_tolling, 0) as flag_tolling_spb, COALESCE(tsf.jenis_spb, tsw.flag_produksi, spb.jenis_spb, 0) as jenis_spb, COALESCE(tsf.keterangan, tsw.keterangan, spb.remarks) as keterangan_spb 
            from sales_order so
                left join t_sales_order tso on tso.so_id = so.id
                left join t_spb_fg tsf on tso.jenis_barang = 'FG' and tsf.id=tso.no_spb
                left join t_spb_wip tsw on tso.jenis_barang = 'WIP' and tsw.id=tso.no_spb
                left join spb on tso.jenis_barang = 'RONGSOK' and spb.id = tso.no_spb
                where so.flag_ppn = 1 and (select count(id) from t_sales_order_detail where t_so_id = so.id) > 0");
    }

    function sj(){
        return $this->db->query("select tsj.id, tsj.jenis_barang from t_surat_jalan tsj
            left join sales_order so on so.id = tsj.sales_order_id
            where so.flag_ppn = 1 and tsj.status = 1 and tsj.api = 0");
    }

    function inv(){
        return $this->db->query("select id from f_invoice
            where flag_ppn = 1 and api = 0 and id_retur = 0");
    }

    function inv_header_only($id){
        return $this->db->query("select fi.*, so.flag_invoice from f_invoice fi
            left join sales_order so on so.id = fi.id_sales_order
            where fi.id =".$id);
    }

    function inv_detail_only($id){
        return $this->db->query("select * from f_invoice_detail where id_invoice =".$id);
    }
}