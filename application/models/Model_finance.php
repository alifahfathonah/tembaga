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
        $data = $this->db->query("Select voucher.*, 
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id)
                Order By voucher.no_voucher");
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
        $data = $this->db->query("Select * From sales_order Where m_customer_id=".$id." and jenis_barang_id = 0 and flag_invoice = 0");
        return $data;
    }

    function get_sj_list($id){
        $data = $this->db->query("Select tsj.id, tsj.no_surat_jalan from t_surat_jalan tsj where tsj.sales_order_id = ".$id." and not exists (select null from f_invoice fi where fi.id_surat_jalan = tsj.id)");
        return $data;
    }

    function show_header_invoice($id){
        $data = $this->db->query("select fi.*, mc.nama_customer,mc.alamat, so.no_sales_order, tsj.no_surat_jalan, tso.id as id_t_sales_order from f_invoice fi
            left join m_customers mc on mc.id = fi.id_customer
            left join sales_order so on so.id = fi.id_sales_order
            left join t_sales_order tso on tso.so_id = fi.id_sales_order
            left join t_surat_jalan tsj on tsj.id = fi.id_surat_jalan
            where fi.id = ".$id);
        return $data;
    }

    function load_detail_invoice($id){
        $data = $this->db->query("select tsjd.*, jb.jenis_barang, jb.uom,
            (select tsod.amount from t_sales_order_detail tsod left join t_sales_order tso on tso.id = tsod.t_so_id where tso.so_id = tsj.sales_order_id and tsod.jenis_barang_id = tsjd.jenis_barang_id)as amount 
            from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id 
            left join jenis_barang jb on jb.id = tsjd.jenis_barang_id 
            where tsjd.t_sj_id = ".$id);
        return $data;
    }

    function show_detail_invoice($id){
        $data = $this->db->query("select fid.*, jb.jenis_barang, jb.uom
        from f_invoice_detail fid
        left join jenis_barang jb on jb.id = fid.jenis_barang_id
        where fid.id_invoice = ".$id);
        return $data;
    }
}