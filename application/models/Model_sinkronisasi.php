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

    function so_count(){
        return $this->db->query("select count(so.id) as count from sales_order so
                where so.flag_ppn = 1 and (select count(id) from t_sales_order_detail where t_so_id = so.id) > 0 and so.api = 0");
    }

    function sj(){
        return $this->db->query("select tsj.id, tsj.jenis_barang from t_surat_jalan tsj
            left join sales_order so on so.id = tsj.sales_order_id
            where so.flag_ppn = 1 and tsj.status = 1 and tsj.api = 0");
    }

    function sj_count(){
        return $this->db->querY("select count(tsj.id) as count from t_surat_jalan tsj
            left join sales_order so on so.id = tsj.sales_order_id
            where so.flag_ppn = 1 and tsj.status = 1 and tsj.api = 0");
    }

    function inv(){
        return $this->db->query("select id from f_invoice
            where flag_ppn = 1 and id_surat_jalan > 0 and api = 0 and id_retur = 0");
    }

    function inv_count(){
        return $this->db->querY("select count(id) as count from f_invoice
            where flag_ppn = 1 and id_surat_jalan > 0 and api = 0 and id_retur = 0");
    }

    function inv_header_only($id){
        return $this->db->query("select fi.*, so.flag_invoice from f_invoice fi
            left join sales_order so on so.id = fi.id_sales_order
            where fi.id =".$id);
    }

    function inv_detail_only($id){
        return $this->db->query("select * from f_invoice_detail where id_invoice =".$id);
    }

    function match_inv_count(){
        return $this->db->query("select count(id) as count from f_match where flag_ppn = 1 and status = 1 and api = 0");
    }

    function match_inv(){
        return $this->db->query("select * from f_match where flag_ppn = 1 and status = 1 and api = 0 limit 100");
    }

    function match_inv_detail_only($id){
        return $this->db->query("Select fmd.*,  
            COALESCE(fi.id,rti.id) as id_header_inv, COALESCE(fi.no_invoice,rti.no_invoice_jasa) as no_invoice, COALESCE(fi.nilai_invoice,rti.nilai_invoice) as nilai_invoice,
            COALESCE(fi.nilai_bayar, rti.nilai_bayar) as nilai_bayar_inv, COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) as nilai_pembulatan_inv, 
            COALESCE(fi.flag_matching,rti.flag_matching) as flag_matching_inv, COALESCE(fi.term_of_payment,rti.term_of_payment) as term_of_payment,
            COALESCE(fi.tgl_jatuh_tempo,rti.jatuh_tempo) as tgl_jatuh_tempo, COALESCE(fi.tanggal,rti.tanggal) as tanggal_inv, COALESCE(fi.bank_id,rti.bank_id) as bank_id,
            COALESCE(fi.nama_direktur,rti.nama_direktur) as nama_direktur, COALESCE(fi.diskon,rti.diskon) as diskon,COALESCE(fi.add_cost, rti.cost) as add_cost,
            COALESCE(fi.materai,rti.materai) as materai, COALESCE(fi.keterangan,rti.remarks) as keterangan_inv, COALESCE(fi.id_customer,mc.idkmp) as id_customer,
            COALESCE(fi.currency,'IDR') as currency, COALESCE(fi.kurs,1) as kurs_inv, COALESCE(fi.id_surat_jalan,null) as id_surat_jalan,COALESCE(fi.jenis_trx,1) as jenis_trx, COALESCE(fi.id_sales_order, rti.r_t_so_id) as id_so
            from f_match_detail fmd
                left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
                left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
                left join m_cv mc on rti.cv_id = mc.id
            where fmd.id_match =".$id);
    }

    function um_count(){
        return $this->db->querY("select count(id) as count from f_kas
            where flag_ppn = 1 and jenis_trx = 0 and api = 0");
    }

    function uk_count(){
        return $this->db->querY("select count(id) as count from f_kas
            where flag_ppn = 1 and jenis_trx = 1 and api = 0");
    }

    function um(){
        return $this->db->query("select * from f_kas
            where flag_ppn = 1 and jenis_trx = 0 and api = 0");
    }

    function uk(){
        return $this->db->query("select * from f_kas
            where flag_ppn = 1 and jenis_trx = 1 and api = 0");
    }
}