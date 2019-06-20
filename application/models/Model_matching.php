<?php
class Model_matching extends CI_Model{

    function list_invoice($reff_cv = null){
        if ($reff_cv === null) {
            $data = $this->db->query("Select ir.*, (select count(tid.id) from r_t_invoice_detail tid where tid.invoice_resmi_id = ir.id) as jumlah_item
                from r_t_invoice ir");
        } else {
            $data = $this->db->query("Select ir.*, (select count(tid.id) from r_t_invoice_detail tid where tid.invoice_resmi_id = ir.id) as jumlah_item
                from r_t_invoice ir where reff_cv = ".$reff_cv);
        }
        return $data;
    }

    function list_invoice_fg(){
        $data = $this->db->query("select fi.*,tso.jenis_barang from f_invoice fi
            left join sales_order so on so.id = fi.id_sales_order
            left join t_sales_order tso on tso.so_id = so.id
            where tso.jenis_barang ='FG' and so.flag_ppn = 0 and fi.flag_resmi = 0
            order by fi.no_invoice asc");
        return $data;
    }

    function get_jumlah($id){
        $data = $this->db->query("select fi.id, (select sum(fid.netto) from f_invoice_detail fid where fid.id_invoice = fi.id) as netto_invoice from f_invoice fi
            where fi.id =".$id);
        return $data;
    }

    function show_header_invoice($id){
        $data = $this->db->query("Select ir.*, fi.no_invoice, u.realname as pic
            from r_t_invoice ir
            left join f_invoice fi on fi.id = ir.invoice_id
            left join users u on (ir.created_by = u.id)
            where ir.id =".$id);
        return $data;
    }

    function list_dtr(){
        $data = $this->db->query("select dtr.*, r.nama_item, (select SUM(netto) from dtr_detail where dtr_detail.dtr_id = dtr.id and flag_resmi = 0) as netto, dtrd.berat_palette, dtrd.no_pallete, dtrd.line_remarks
            from dtr 
            left join dtr_detail dtrd on (dtr.id = dtrd.dtr_id)
            left join rongsok r on (dtrd.rongsok_id = r.id)
            where dtr.status = 1 and dtr.flag_taken = 0 group by dtr.no_dtr
            order by dtr.tanggal asc");
        return $data;
    }

    function jenis_barang_list(){
        $data = $this->db->query("select r.id, r.nama_item from dtr_detail dtrd
            left join rongsok r on r.id = dtrd.rongsok_id
            where r.type_barang = \"Rongsok\"
            group by rongsok_id
            order by r.nama_item");
        return $data;
    }

    function list_invoice_detail($id){
        $data = $this->db->query("select ird.*, dtrd.no_pallete, dtrd.qty, r.nama_item, dtr.id as dtr_id
            from r_t_invoice_detail ird
            left join dtr_detail dtrd on (ird.dtr_detail_id = dtrd.id)
            left join dtr on (dtrd.dtr_id = dtr.id)
            left join rongsok r on (dtrd.rongsok_id = r.id)
            where ird.invoice_resmi_id = ".$id);
        return $data;
    }

    function load_detail_dtr($id){
        $data = $this->db->query("select dtrd.*, r.nama_item, (select sum(netto) from dtr_detail where dtr_id = dtrd.id) as total_netto
            from dtr_detail dtrd
            left join rongsok r on (dtrd.rongsok_id = r.id)
            where dtrd.flag_resmi = 0 and dtrd.dtr_id = ".$id);
        return $data;
    }

    function load_detail_jb($id){
        $data = $this->db->query("select dtrd.*, r.nama_item, (select sum(netto) from dtr_detail where dtr_id = dtrd.id) as total_netto
            from dtr_detail dtrd
            left join rongsok r on (dtrd.rongsok_id = r.id)
            left join dtr on (dtr.id = dtrd.dtr_id)
            where dtrd.flag_resmi = 0 and r.id = ".$id." group by dtr.id order by dtr.tanggal asc limit 10");
        return $data;
    }

    function load_invoice_detail($id){
        $data = $this->db->query("select ird.*, dtrd.no_pallete, r.nama_item, dtr.id as dtr_id
            from r_t_invoice_detail ird
            left join dtr_detail dtrd on (ird.dtr_detail_id = dtrd.id)
            left join dtr on (dtrd.dtr_id = dtr.id)
            left join rongsok r on (dtrd.rongsok_id = r.id)
            where ird.invoice_resmi_id = ".$id);
        return $data;
    }

    function cv_list(){
        $data = $this->db->query("select id, nama_cv as nama_customer from m_cv");
        return $data;
    }

    function po_free(){
        $data = $this->db->query("select * from r_t_po where flag_sj = 0 and cv_id = 0");
        return $data;
    }

    function po_free_edit($id){
        $data = $this->db->query("select * from r_t_po where flag_sj = 0 and customer_id = 0");
        return $data;
    }

    function po_free_cv($reff_cv){
        $data = $this->db->query("select * from r_t_po where flag_sj = 0 and flag_so = 0 and reff_cv = ".$reff_cv." and customer_id = 0");
        return $data;
    }

    function get_gudangfg_int($id){
        $data = $this->db->query("select tgfg.* from t_surat_jalan_detail tsjd
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id
            left join f_invoice fi on fi.id = tsj.inv_id
            left join t_gudang_fg tgfg on tgfg.id = tsjd.gudang_id
            where fi.id = ".$id);
        return $data;
    }

     function list_invoice_detail_only($id){
        $data = $this->db->query("select ird.id, ird.jenis_barang_id, dtrd.no_pallete as no_packing, dtrd.qty, ird.bruto, ird.netto
            from r_t_invoice_detail ird
            left join dtr_detail dtrd on (ird.dtr_detail_id = dtrd.id)
            left join dtr on (dtrd.dtr_id = dtr.id)
            where ird.invoice_resmi_id = ".$id);
        return $data;
    }
}