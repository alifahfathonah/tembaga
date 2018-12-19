<?php
class Model_finance extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            Order By id desc");
        return $data;
    }

    function replace_list($id, $jenis){
        $data = $this->db->query("Select * from f_uang_masuk where status = 9 and replace_id = 0 and m_customer_id =".$id." and jenis_pembayaran = '".$jenis."'");
        return $data;
    }

    function replace_list_detail($id){
        $data = $this->db->query("Select * from f_uang_masuk where id = ".$id);
        return $data;
    }

    function customer_list(){
        $data = $this->db->query("Select * From m_customers Order By nama_customer");
        return $data;
    }

    function customer_detail($id){
        $data = $this->db->query("Select * From m_customers where id=".$id);
        return $data;
    }

    function bank_list(){
        $data = $this->db->query("Select * From bank Order By kode_bank");
        return $data;
    }

    function get_bank_list($id){
        $data = $this->db->query("Select * From bank where id =".$id);
        return $data;
    }

    function view_um($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer, b.kode_bank, b.nama_bank, b.nomor_rekening, u.realname From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            left join bank b on b.id = fum.rekening_tujuan
            left join users u on u.id = fum.approved_by or u.id = fum.reject_by
            where fum.id = ".$id);
        return $data;
    }

    function list_data_voucher(){
        $data = $this->db->query("Select * from voucher where pembayaran_id = 0");
        return $data;
    }

    function voucher_list(){
        $data = $this->db->query("Select voucher.*, supplier.nama_supplier, 
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id)
                    left join supplier on (supplier.id = po.supplier_id)
                Order By voucher.no_voucher");
        return $data;
    }

    function check_voucher(){
        $data = $this->db->query("Select voucher.*, supplier.nama_supplier,
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id)
                    left join supplier on (supplier.id = po.supplier_id)
                where pembayaran_id = 0 Order By voucher.no_voucher");
        return $data;
    }

    function list_voucher($id){
        $data = $this->db->query("Select * from voucher where id = ".$id);
        return $data;
    }

    function list_um(){
        $data = $this->db->query("select * from f_uang_masuk where pembayaran_id = 0");
        return $data;
    }

    function list_data_pembayaran(){
        $data = $this->db->query("select * from f_pembayaran");
        return $data;
    }

    function list_detail_pembayaran($id){
        $data = $this->db->query("select fp.*, usr.realname from f_pembayaran fp
                Left Join users usr On (fp.created_by = usr.id)
                where fp.id =".$id);
        return $data;
    }

    function load_detail($id){
        $data = $this->db->query("select * from voucher where pembayaran_id = ".$id);
        return $data;
    }

    function load_detail_reject($id){
        $data = $this->db->query("select fpd.*, v.no_voucher, v.jenis_voucher, v.jenis_barang, v.amount, v.keterangan from f_pembayaran_detail fpd
            left join voucher v on v.id = fpd.voucher_id
            where fpd.id_pembayaran =".$id." and um_id = 0");
        return $data;
    }

    function list_voucher_data(){
        $data = $this->db->query("Select * from voucher");
        return $data;
    }

    function load_detail_um($id){
        $data = $this->db->query("select fpd.*, fum.bank_pembayaran, fum.jenis_pembayaran, fum.nominal, fum.keterangan, fum.currency, fum.rekening_pembayaran, fum.nomor_cek, mc.nama_customer
            from f_pembayaran_detail fpd
            left join f_uang_masuk fum on fum.id = fpd.um_id
            left join m_customers mc on mc.id = fum.m_customer_id
            where fpd.id_pembayaran = ".$id." and fpd.voucher_id = 0");
        return $data;
    }

    function list_data_um(){
        $data = $this->db->query("Select fum.* from f_uang_masuk fum
                left join f_pembayaran_detail fpd on fpd.um_id = fum.id 
                where fpd.um_id is null and (status = 1 or status = 0)");
        return $data;
    }

    function get_data_um($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer from f_uang_masuk fum
                left join m_customers mc on mc.id = fum.m_customer_id
                where fum.id = ".$id);
        return $data;
    }

    function list_invoice(){
        $data = $this->db->query("Select fi.*, mc.nama_customer, so.no_sales_order, tsj.no_surat_jalan,
            (select count(fid.id) from f_invoice_detail fid where fid.id_invoice = fi.id) as jumlah 
            From f_invoice fi
            left join sales_order so on so.id = fi.id_sales_order
            left join t_surat_jalan tsj on tsj.id = fi.id_surat_jalan
            left join m_customers mc on mc.id = fi.id_customer
            Order By id desc");
        return $data;
    }

    function get_so_list($id){
        $data = $this->db->query("Select so.* From sales_order so
            Where so.m_customer_id=".$id." and so.jenis_barang_id = 0 
            and (select id from t_surat_jalan tsj where tsj.sales_order_id = so.id group by tsj.sales_order_id) and flag_invoice = 0");
        return $data;
    }

    function get_sj_list($id){
        $data = $this->db->query("Select tsj.id, tsj.no_surat_jalan from t_surat_jalan tsj where tsj.sales_order_id = ".$id." and not exists (select null from f_invoice fi where fi.id_surat_jalan = tsj.id)");
        return $data;
    }

    function show_header_invoice($id){
        $data = $this->db->query("select fi.*, tso.alias,mc.alamat, so.no_sales_order, u.realname, tsj.no_surat_jalan, tso.id as id_t_sales_order from f_invoice fi
            left join m_customers mc on mc.id = fi.id_customer
            left join sales_order so on so.id = fi.id_sales_order
            left join t_sales_order tso on tso.so_id = fi.id_sales_order
            left join t_surat_jalan tsj on tsj.id = fi.id_surat_jalan
            left join users u on u.id = fi.created_by
            where fi.id = ".$id);
        return $data;
    }

    function load_detail_invoice($id){
        $data = $this->db->query("select tsjd.*, COALESCE(jb.jenis_barang,r.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom) as uom,
            (select tsod.amount from t_sales_order_detail tsod left join t_sales_order tso on tso.id = tsod.t_so_id where tso.so_id = tsj.sales_order_id and tsod.jenis_barang_id = tsjd.jenis_barang_id)as amount 
            from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id 
            left join t_sales_order tso on tso.so_id = tsj.sales_order_id
            left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and jb.id=tsjd.jenis_barang_id
            left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id=tsjd.jenis_barang_id
            where tsjd.t_sj_id = ".$id);
        return $data;
    }

    function show_detail_invoice($id){
        $data = $this->db->query("select fid.*, COALESCE(jb.jenis_barang,r.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom) as uom
        from f_invoice_detail fid
        left join f_invoice fi on fi.id = fid.id_invoice
        left join t_sales_order tso on tso.so_id=fi.id_sales_order
        left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and jb.id = fid.jenis_barang_id
        left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id = fid.jenis_barang_id
        where fid.id_invoice = ".$id);
        return $data;
    }

    function show_header_voucher($id){
        $data = $this->db->query("select v.*, s.nama_supplier, p.no_po, pmb.no_pembayaran, u.realname as pic 
            from voucher v 
            left join po p on (p.id = v.po_id)
            left join supplier s on (s.id = p.supplier_id)
            left join f_pembayaran pmb on (pmb.id = v.pembayaran_id)
            left join users u on (u.id = v.created_by)
            where v.id = ".$id);
        return $data;
    }

    function show_detail_voucher($id){
        $data = $this->db->query("Select voucher.*, supplier.nama_supplier, 
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id)
                    left join supplier on (supplier.id = po.supplier_id)
                where voucher.id = ".$id);
        return $data;
    }

    function list_matching(){
        $data = $this->db->query("select mc.*, 
        (select count(id) from sales_order so where so.m_customer_id = mc.id) as jumlah_so,
        (select count(id) from t_surat_jalan tsj where tsj.m_customer_id = mc.id) as jumlah_sj,
        (select count(id) from f_invoice fi where fi.id_customer = mc.id) as jumlah_invoice
        from m_customers mc where 
        (select fi.id from f_invoice fi where mc.id = fi.id_customer group by fi.id_customer) is not null");
        return $data;
    }

    function load_invoice_full($id){
        $data = $this->db->query("select fi.*, (select sum(fid.total_harga) from f_invoice_detail fid where fid.id_invoice = fi.id) as total from f_invoice fi where fi.id_customer =".$id." and matching_id = 0");
        return $data;
    }

    function load_um_full($id){
        $data = $this->db->query("select id,jenis_pembayaran, bank_pembayaran, COALESCE(rekening_pembayaran, nomor_cek) as nomor, currency, nominal 
            from f_uang_masuk 
            where m_customer_id =".$id." and matching_id = 0 and status = 1");
        return $data;
    }

    function list_invoice_matching($id){
        $data = $this->db->query("select fi.id, fi.no_invoice from f_invoice fi where fi.id_customer =".$id." and matching_id = 0");
        return $data;
    }

    function list_um_matching($id){
        $data = $this->db->query("select fum.id, COALESCE(fum.rekening_pembayaran, fum.nomor_cek) as nomor from f_uang_masuk fum where fum.m_customer_id =".$id." and fum.matching_id=0 and fum.status=1");
        return $data;
    }

    function get_data_invoice($id){
        $data = $this->db->query("select sum(fid.total_harga) as total from f_invoice_detail fid where fid.id_invoice = ".$id." group by fid.id_invoice");
        return $data;
    }
}