<?php
class Model_finance extends CI_Model{
    function list_data($ppn){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.flag_ppn =".$ppn." and fum.rekening_tujuan < 4 and (fum.jenis_pembayaran != 'Cek' and fum.jenis_pembayaran != 'Cek Mundur')
            Order By id desc");
        return $data;
    }

    function list_data_filter($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.m_customer_id =".$id." Order By id desc");
        return $data;
    }

    function list_data_cm($ppn){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.flag_ppn =".$ppn." and (fum.jenis_pembayaran = 'Cek' or fum.jenis_pembayaran = 'Cek Mundur')
            Order By id desc");
        return $data;
    }

    function list_data_bm($ppn){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.flag_ppn =".$ppn." and fum.rekening_tujuan > 4 and (fum.jenis_pembayaran != 'Cek' and fum.jenis_pembayaran != 'Cek Mundur')
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

    function bank_list($ppn){
        $data = $this->db->query("Select * From bank where ppn =".$ppn." Order By id ");
        return $data;
    }

    function get_bank_list($id){
        $data = $this->db->query("Select * From bank where id =".$id);
        return $data;
    }

    function get_currency($id){
        $data = $this->db->query("Select currency From bank where id =".$id);
        return $data;
    }

    function get_currency_so($id){
        $data = $this->db->query("Select currency, kurs From t_sales_order where so_id =".$id);
        return $data;
    }

    function list_data_slip_setoran(){
        $data = $this->db->query("Select fss.*, fp.no_pembayaran, fp.tanggal, b.nama_bank From f_slip_setoran fss
            left join f_pembayaran fp on fp.id = fss.id_pembayaran
            left join f_kas fk on fk.id = fss.id_kas
            left join bank b on b.id = fk.id_bank");
        return $data;
    }

    function view_um($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer, b.kode_bank, b.nama_bank, b.nomor_rekening, u.realname, fp.id as id_pmb, fp.no_pembayaran
            From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            left join f_pembayaran_detail fpd on fpd.um_id = fum.id
            left join f_pembayaran fp on fp.id = fpd.id_pembayaran
            left join bank b on b.id = fum.rekening_tujuan
            left join users u on u.id = fum.approved_by or u.id = fum.reject_by
            where fum.id = ".$id);
        return $data;
    }

    function list_data_voucher($ppn){
        $data = $this->db->query("Select v.id, v.no_voucher, COALESCE(mc.nama_customer, s.nama_supplier, v.keterangan) as keterangan from voucher v
            left join m_customers mc on v.customer_id = mc.id
            left join supplier s on v.supplier_id = s.id
            where v.pembayaran_id = 0 and v.status = 0 and v.flag_ppn =".$ppn." order by v.no_voucher asc");
        return $data;
    }

    function voucher_list($ppn){
        $data = $this->db->query("Select voucher.*, supplier.nama_supplier, 
                po.no_po, coalesce(po.tanggal,0) As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id)
                    left join supplier on (supplier.id = po.supplier_id)
                Where voucher.flag_ppn =".$ppn."
                Order By voucher.no_voucher");
        return $data;
    }

    function check_voucher(){
        $data = $this->db->query("Select v.*, COALESCE(s.nama_supplier,mc.nama_customer) as nama_supplier,
                po.no_po, COALESCE(po.tanggal,'-') As tanggal_po
                From voucher v
                    Left Join po On (v.po_id = po.id)
                    left join supplier s on (s.id = po.supplier_id)
                    Left Join m_customers mc on (v.customer_id = mc.id)
                where pembayaran_id = 0 and v.status = 0 Order By v.no_voucher desc");
        return $data;
    }

    function check_um(){
        $data = $this->db->query("Select fum.*, mc.nama_customer
                From f_uang_masuk fum
                    left join m_customers mc on (mc.id = fum.m_customer_id)
                where status = 0 Order By tanggal desc");
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
        $data = $this->db->query("select fp.*, COALESCE((select count(id) from voucher where pembayaran_id = fp.id),0) as jumlah_voucher, COALESCE((select count(id) from f_pembayaran_detail where id_pembayaran = fp.id and voucher_id = 0),0) as jumlah_um from f_pembayaran fp order by fp.no_pembayaran desc");
        return $data;
    }

    function list_detail_pembayaran($id){
        $data = $this->db->query("select fp.*, usr.realname from f_pembayaran fp
                Left Join users usr On (fp.created_by = usr.id)
                where fp.id =".$id);
        return $data;
    }

    function header_pembayaran($id){
        return $this->db->query("select fp.*, (select sum(amount) from voucher where pembayaran_id = fp.id) as total from f_pembayaran fp where fp.id =".$id);
    }

    function detail_pembayaran_um($id){
        $data = $this->db->query("select fum.no_uang_masuk, fum.nominal, COALESCE(mc.nama_customer,fum.keterangan) as keterangan, fum.rekening_pembayaran, fum.nomor_cek
            from f_pembayaran_detail fpd
            left join f_uang_masuk fum on fum.id = fpd.um_id
            left join m_customers mc on mc.id = fum.m_customer_id
            where fpd.id_pembayaran =".$id." and fpd.voucher_id = 0");
        return $data;
    }

    function load_detail($id){
        $data = $this->db->query("select * from voucher where pembayaran_id = ".$id);
        return $data;
    }

    function load_detail_vc($id){
        $data = $this->db->query("select v.id, v.no_voucher, v.jenis_barang, v.jenis_voucher, 
            ( CASE WHEN ( COALESCE ( mc.nama_customer, s.nama_supplier ) IS NOT NULL ) THEN
                concat_ws(
                    '',
                    'PEMB. ',
                    COALESCE ( concat( mc.nama_customer, '' ), concat( s.nama_supplier, '' ) ), v.keterangan 
                ) ELSE v.nm_cost 
            END 
            ) as keterangan, v.amount from voucher v 
            left join m_customers mc on v.customer_id = mc.id
            left join supplier s on v.supplier_id = s.id
            where pembayaran_id = ".$id);
        return $data;
    }

    function load_detail_pembayaran($id){
        return $this->db->query("
            (Select v.no_voucher, v.tanggal, v.amount, 
                CASE WHEN ( COALESCE(mc.nama_customer, s.nama_supplier) IS NOT NULL ) THEN
                    concat_ws('', 'PEMB. ',
                        COALESCE ( concat( mc.nama_customer, '' ), concat( s.nama_supplier, '' ) ),
                        v.keterangan 
                    ) ELSE v.nm_cost END as keterangan from voucher v
            left join supplier s on s.id = v.supplier_id
            left join m_customers mc on mc.id = v.customer_id
            where v.pembayaran_id =".$id.")
            UNION ALL
            (select COALESCE(fk.nomor,'Slip Setoran') as no_voucher, COALESCE(fum.tanggal, '') as tanggal, fss.nominal as amount, COALESCE(fum.keterangan, 'Slip Setoran') as keterangan from f_slip_setoran fss
            left join f_kas fk on fk.id = fss.id_kas
            left join f_uang_masuk fum on fum.id = fk.id_um
            where fss.id_pembayaran =".$id.")");
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
        $data = $this->db->query("select fpd.*, fum.bank_pembayaran, fum.no_uang_masuk, fum.jenis_pembayaran, fum.nominal, fum.keterangan, fum.currency, fum.rekening_pembayaran, fum.nomor_cek, mc.nama_customer, fum.status
            from f_pembayaran_detail fpd
            left join f_uang_masuk fum on fum.id = fpd.um_id
            left join m_customers mc on mc.id = fum.m_customer_id
            where fpd.id_pembayaran =".$id." and fpd.voucher_id = 0");
        return $data;
    }

    function list_data_um($ppn){
        $data = $this->db->query("Select fum.id, fum.no_uang_masuk, COALESCE(NULLIF(fum.nomor_cek,''), mc.nama_customer) as nomor_cek from f_uang_masuk fum
                left join m_customers mc on mc.id = fum.m_customer_id
                left join f_pembayaran_detail fpd on fpd.um_id = fum.id 
                where fpd.um_id is null and fum.status = 0 and fum.flag_ppn=".$ppn);
        return $data;
    }

    function get_data_um($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer from f_uang_masuk fum
                left join m_customers mc on mc.id = fum.m_customer_id
                where fum.id = ".$id);
        return $data;
    }

    function load_detail_uk($id){
        $data = $this->db->query("select fk.id, fk.nomor, fk.no_giro, fk.id_bank, fk.nominal, fk.currency, b.nama_bank from f_kas fk
        left join bank b on b.id = fk.id_bank
        where fk.id_matching=".$id);
        return $data;
    }

    function list_invoice($ppn){
        $data = $this->db->query("Select fi.*, mc.nama_customer, so.no_sales_order, tsj.no_surat_jalan, so.flag_ppn,
            (select count(fid.id) from f_invoice_detail fid where fid.id_invoice = fi.id) as jumlah 
            From f_invoice fi
            left join sales_order so on so.id = fi.id_sales_order
            left join t_surat_jalan tsj on tsj.id = fi.id_surat_jalan
            left join m_customers mc on mc.id = fi.id_customer
            left join retur r on r.id = fi.id_retur
            where fi.flag_ppn = ".$ppn."
            Order By id desc");
        return $data;
    }

    function get_so_list($id,$ppn){
        $data = $this->db->query("Select so.*, tso.no_po From sales_order so
            left join t_sales_order tso on tso.so_id = so.id
            Where so.m_customer_id=".$id." and (select id from t_surat_jalan tsj where tsj.sales_order_id = so.id group by tsj.sales_order_id) and flag_invoice != 1 and flag_ppn =".$ppn);
        return $data;
    }

    // function get_sj_list($id){
    //     $data = $this->db->query("Select tsj.id, tsj.no_surat_jalan from t_surat_jalan tsj where tsj.sales_order_id = ".$id." and tsj.status = 1 and not exists (select null from f_invoice fi where fi.id_surat_jalan = tsj.id)");
    //     return $data;
    // }

    function get_sj_list($id){
        $data = $this->db->query("Select tsj.id, tsj.no_surat_jalan from t_surat_jalan tsj where tsj.sales_order_id = ".$id." and tsj.status = 1 and tsj.inv_id is null");
        return $data;
    }

    function show_header_invoice($id){
        $data = $this->db->query("select fi.*, coalesce(NULLIF(tso.alias,''),mc.nama_customer)as nama_customer, mc.alamat, mc.npwp, coalesce(NULLIF(tso.alias,''), mc.nama_customer_kh) as nama_customer_kh, mc.alamat_kh, so.no_sales_order, COALESCE(so.flag_ppn,r.flag_ppn) as flag_ppn, so.flag_tolling, tso.no_po, u.realname, tsj.no_surat_jalan, tso.id as id_t_sales_order, r.no_retur, b.kode_bank, b.nama_bank, b.nomor_rekening, b.kantor_cabang, mtch.no_matching from f_invoice fi
            left join m_customers mc on mc.id = fi.id_customer
            left join sales_order so on so.id = fi.id_sales_order
            left join t_sales_order tso on tso.so_id = fi.id_sales_order
            left join t_surat_jalan tsj on tsj.id = fi.id_surat_jalan
            left join retur r on fi.id_retur > 0 and r.id = fi.id_retur
            left join bank b on b.id = fi.bank_id
            left join users u on u.id = fi.created_by
            left join f_match mtch on mtch.id = fi.flag_matching
            where fi.id = ".$id);
        return $data;
    }

    // function load_detail_invoice($id){
    //     $data = $this->db->query("select tsjd.id,tsjd.t_sj_id,tsjd.no_packing,tsjd.qty,tsjd.bruto, tsjd.jenis_barang_id, tsjd.jenis_barang_alias,
    //         (case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end) as netto,
    //         tsjd.nomor_bobbin, tsjd.line_remarks, 
    //         COALESCE(jb.jenis_barang,r.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom) as uom,
    //         (select tsod.amount from t_sales_order_detail tsod left join t_sales_order tso on tso.id = tsod.t_so_id where tso.so_id = tsj.sales_order_id and tsod.jenis_barang_id = case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)as amount 
    //         from t_surat_jalan_detail tsjd 
    //         left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id 
    //         left join t_sales_order tso on tso.so_id = tsj.sales_order_id
    //         left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and jb.id = (case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
    //         left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id=tsjd.jenis_barang_id
    //         where tsjd.t_sj_id =".$id);
    //     return $data;
    // }

    function load_detail_invoice($id){
        $data = $this->db->query("select tsjd.t_sj_id, sum(tsjd.qty) as qty, sum(tsjd.bruto) as bruto, 
            (case when tsjd.jenis_barang_alias = 0 then tsjd.jenis_barang_id else tsjd.jenis_barang_alias end) as jbid,
            round(sum(case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end),3) as netto,
            COALESCE(jb.jenis_barang,r.nama_item,r2.nama_item,s.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom,r2.uom,s.uom) as uom,
            (select tsod.amount from t_sales_order_detail tsod left join t_sales_order tso on tso.id = tsod.t_so_id where tso.so_id = tsj.sales_order_id and tsod.jenis_barang_id = case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)as amount 
            from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id 
            left join t_sales_order tso on tso.so_id = tsj.sales_order_id
            left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and tso.jenis_barang != 'AMPAS' and jb.id = (case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
            left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id=tsjd.jenis_barang_id
            left join rongsok r2 on tso.jenis_barang = 'AMPAS' and r2.id=tsjd.jenis_barang_id
            left join sparepart s on tso.jenis_barang = 'LAIN' and s.id=tsjd.jenis_barang_id
            where tsjd.t_sj_id =".$id." group by jbid");
        return $data;
    }

    function load_detail_invoice_tolling($id){
        $data = $this->db->query("select tsjd.id,tsjd.t_sj_id,tsjd.no_packing,tsjd.qty,tsjd.bruto, tsjd.jenis_barang_id, tsjd.jenis_barang_alias,
            (case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end) as netto,
            tsjd.nomor_bobbin, tsjd.line_remarks, 
            COALESCE(jb.jenis_barang,r.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom) as uom,
            (select sod.amount from sales_order_detail sod left join sales_order so on so.id = sod.sales_order_id where so.id = tsj.sales_order_id and sod.jenis_barang_id = case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)as amount 
            from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id 
            left join t_sales_order tso on tso.so_id = tsj.sales_order_id
            left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and jb.id = (case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
            left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id=tsjd.jenis_barang_id
            where tsjd.t_sj_id =".$id);
        return $data;
    }

    function show_detail_matching_um($id){
        $data = $this->db->query("select fum.*, b.kode_bank, b.nama_bank, b.nomor_rekening from f_match_detail fmd
            left join f_uang_masuk fum on fum.id = fmd.id_um
            left join bank b on b.id = fum.rekening_tujuan
            where id_inv = 0 and fmd.id_match =".$id);
        return $data;
    }

    function show_detail_sj($id){
        $data = $this->db->query("SELECT tsod.*, COALESCE(CASE WHEN tsod.nama_barang_alias = '' THEN null ELSE tsod.nama_barang_alias END, jb.jenis_barang) as jenis_barang, COALESCE(jb.uom,r.uom,s.uom) AS uom
            FROM t_sales_order_detail tsod
            LEFT JOIN t_sales_order tso ON tso.id = tsod.t_so_id
            LEFT JOIN t_surat_jalan tsj ON tsj.sales_order_id = tso.so_id
            LEFT JOIN jenis_barang jb ON tso.jenis_barang != 'RONGSOK' AND tso.jenis_barang != 'LAIN' AND jb.id = tsod.jenis_barang_id
            LEFT JOIN rongsok r ON tso.jenis_barang = 'RONGSOK' AND r.id = tsod.jenis_barang_id
            LEFT JOIN sparepart s ON tso.jenis_barang = 'LAIN' AND s.id = tsod.jenis_barang_id
            WHERE tsj.id = ".$id);
        return $data;
    }

    function show_detail_invoice($id){
        $data = $this->db->query("select fid.*, COALESCE(NULLIF((select nama_barang_alias from t_sales_order_detail tsod where tsod.jenis_barang_id = fid.jenis_barang_id and tsod.t_so_id = tso.id),''),jb.jenis_barang,r.nama_item,r2.nama_item,s.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom,s.uom,r2.uom) as uom
        from f_invoice_detail fid
        left join f_invoice fi on fi.id = fid.id_invoice
        left join t_sales_order tso on tso.so_id=fi.id_sales_order
        left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and tso.jenis_barang != 'LAIN' and tso.jenis_barang != 'AMPAS' and jb.id = fid.jenis_barang_id
        left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id = fid.jenis_barang_id
        left join rongsok r2 on tso.jenis_barang = 'AMPAS' and r2.id = fid.jenis_barang_id
        left join sparepart s on tso.jenis_barang = 'LAIN' and s.id = fid.jenis_barang_id
        where fid.id_invoice =".$id);
        return $data;
    }

    function show_invoice_detail($id){
        $data = $this->db->query("select fid.*, COALESCE(jb.jenis_barang,r.nama_item) as jenis_barang, jb.uom from f_invoice_detail fid
            left join f_invoice fi on fi.id = fid.id_invoice
            left join retur rt on rt.id = fi.id_retur
            left join jenis_barang jb on rt.jenis_barang != 'RONGSOK' and jb.id=fid.jenis_barang_id
            left join rongsok r on rt.jenis_barang = 'RONGSOK' and r.id = fid.jenis_barang_id
            where id_invoice=".$id);
        return $data;
    }

    function show_header_voucher($id){
        $data = $this->db->query("select v.*, s.nama_supplier, mc.nama_customer, p.no_po, p.currency, pmb.no_pembayaran, u.realname as pic 
            from voucher v 
            left join po p on (p.id = v.po_id)
            left join supplier s on (s.id = p.supplier_id)
            left join m_customers mc on (mc.id = v.customer_id)
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

    function show_header_voucher_ppn($id){
        $data = $this->db->query("select fk.id, fk.tanggal, fk.id_bank, COALESCE(s.nama_supplier, mc.nama_customer, '-') as nama_customer, COALESCE(p.currency, fk.currency) as currency, fk.tgl_jatuh_tempo, fk.no_giro, b.no_acc, b.nama_bank, s.nama_supplier, p.no_po, u.realname as pic, fk.nomor, COALESCE(p.kurs, fk.kurs)as kurs
            from f_kas fk 
            left join voucher v on (v.id_fk = fk.id)
            left join bank b on (b.id = fk.id_bank)
            left join po p on (p.id = v.po_id)
            left join supplier s on (s.id = v.supplier_id)
            left join m_customers mc on (mc.id = v.customer_id)
            left join users u on (u.id = v.created_by)
            where fk.id = ".$id);
        return $data;
    }

    function show_detail_voucher_ppn($id){
        $data = $this->db->query("Select v.*, COALESCE(s.nama_supplier, mc.nama_customer, v.nm_cost) as nama, po.no_po, po.tanggal As tanggal_po
                From voucher v
                    Left Join po On (v.po_id = po.id)
                    left join supplier s on (s.id = v.supplier_id)
                    left join m_customers mc on (mc.id = v.customer_id)
                where v.id_fk = ".$id);
        return $data;
    }
    // function list_matching(){
    //     $data = $this->db->query("select mc.*, 
    //     (select count(id) from sales_order so where so.m_customer_id = mc.id) as jumlah_so,
    //     (select count(id) from t_surat_jalan tsj where tsj.m_customer_id = mc.id) as jumlah_sj,
    //     (select count(id) from f_invoice fi where fi.id_customer = mc.id) as jumlah_invoice
    //     from m_customers mc where 
    //     (select fi.id from f_invoice fi where mc.id = fi.id_customer group by fi.id_customer) is not null");
    //     return $data;
    // }

    function list_matching($ppn){
        $data = $this->db->query("select fm.*, mc.nama_customer, mc.pic, (select count(id) from f_match_detail fmd where fmd.id_match = fm.id and fmd.id_um = 0) as jumlah_inv, (select count(id) from f_match_detail fmd where fmd.id_match = fm.id and fmd.id_inv = 0) as jumlah_um from f_match fm 
            left join m_customers mc on mc.id = fm.id_customer
            where flag_ppn=".$ppn."
            order by fm.no_matching desc
            ");
        return $data;
    }

    function matching_header($id){
        $data = $this->db->query("select fm.*, mc.nama_customer, mc.pic, mc.alamat from f_match fm 
            left join m_customers mc on mc.id = fm.id_customer
            where fm.id =".$id);
        return $data;
    }

    // function matching_header_um_print($id){
    //     $data = $this->db->query("select fum.*, mc.nama_customer, mc.pic, fm.no_matching, 
    //         COALESCE((select sum((select if(so.flag_ppn=1,round((sum(fid.total_harga)-f.diskon)*110/100)-f.add_cost+f.materai,sum(fid.total_harga-f.diskon)-f.add_cost+f.materai) from f_invoice_detail fid
    //                 left join f_invoice f on f.id = fid.id_invoice
    //                 left join sales_order so on so.id = f.id_sales_order 
    //                 where fid.id_invoice = md.id_inv)) 
    //                     from f_match_detail md where md.id_um = 0 and md.id_match = fm.id),0) as total 
    //         from f_uang_masuk fum
    //         left join f_match fm on fm.id = fum.flag_matching
    //         left join m_customers mc on mc.id = fum.m_customer_id
    //         where fum.id =".$id);
    //     return $data;
    // }

    function matching_header_um_print($id){
        $data = $this->db->query("select fum.*, COALESCE(mc.nama_customer,'-') as nama_customer, COALESCE(fum.bank_pembayaran,b.nama_bank) as bank_pembayaran, mc.pic, fm.no_matching, b.nama_bank, COALESCE(b.no_acc, '-') as no_acc, fum.kurs
            from f_uang_masuk fum
            left join bank b on b.id = fum.rekening_tujuan
            left join f_match fm on fm.id = fum.flag_matching
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.id =".$id);
        return $data;
    }

    // function matching_header_print($id){
    //     $data = $this->db->query("select fm.*, mc.nama_customer, mc.pic, mc.alamat, 
    //         (select sum(inv_bayar) from f_match_detail where id_match = fm.id) as total
    //         from f_match fm 
    //         left join m_customers mc on mc.id = fm.id_customer
    //         where fm.id =".$id);
    //     return $data;
    // }

    function matching_header_print($id){
        $data = $this->db->query("select fm.*, mc.nama_customer, mc.pic, mc.alamat, 
            (select sum(fmd.inv_bayar+COALESCE(fi.nilai_pembulatan,rti.nilai_pembulatan)) from f_match_detail fmd 
            left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id_match = fm.id) as total
            from f_match fm 
            left join m_customers mc on mc.id = fm.id_customer
            where fm.id =".$id);
        return $data;
    }

    // function load_invoice_match_print($id){
    //     $data = $this->db->query("
    //         (select COALESCE(fi.no_invoice,rti.no_invoice_jasa) as nomor, fmd.inv_bayar+COALESCE(fi.nilai_pembulatan,rti.nilai_pembulatan) as nominal, COALESCE(fi.tanggal,rti.tanggal) as tanggal
    //         from f_match_detail fmd
    //         left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
    //         left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
    //         where fmd.id_match =".$id." and fmd.id_um = 0 and biaya = 0)
    //             UNION ALL
    //         (select 'SELISIH' as nomor, COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan)*-1 as nominal, '' as tanggal from f_match_detail fmd
    //                     left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
    //                     left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
    //                     where fmd.id_match =".$id." and COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) < 0 and fmd.id_um = 0)");
    //     return $data;
    // }

    function load_invoice_match_print($id){
        $data = $this->db->query("
            (select COALESCE(fi.no_invoice,rti.no_invoice_jasa) as nomor, fmd.inv_bayar+COALESCE(fi.nilai_pembulatan,rti.nilai_pembulatan) as nominal, COALESCE(fi.tanggal,rti.tanggal) as tanggal
            from f_match_detail fmd
            left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id_match =".$id." and fmd.id_um = 0 and biaya = 0)
                UNION ALL
            (select 'SELISIH' as nomor, COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan)*-1 as nominal, '' as tanggal from f_match_detail fmd
                        left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
                        left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
                        where fmd.id_match =".$id." and COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) < 0 and fmd.id_um = 0)");
        return $data;
    }

    function load_um_match_print($id){
        $data = $this->db->query("
            (select COALESCE(fmd.keterangan,fum.no_uang_masuk) as nomor, COALESCE(NULLIF(fmd.biaya,0),fum.nominal) as nominal,  COALESCE(NULLIF(fum.rekening_pembayaran,''),fum.nomor_cek) as nomor_cek, b.nama_bank from f_match_detail fmd
            left join f_uang_masuk fum on fum.id = fmd.id_um
            left join bank b on b.id = fum.rekening_tujuan
            where fmd.id_match =".$id." and fmd.id_inv = 0)
                UNION ALL
            (select 'SELISIH' as nomor, COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) as nominal, '' as nomor_cek, '' as nama_bank from f_match_detail fmd
            left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id_match =".$id." and COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) > 0 and fmd.id_um = 0)");
        return $data;
    }

    function load_invoice_match_print2($id){
        $data = $this->db->query("
            (select COALESCE(fi.no_invoice,rti.no_invoice_jasa) as nomor, COALESCE(fi.nilai_invoice,rti.nilai_invoice) as nominal, COALESCE(fi.tanggal,rti.tanggal) as tanggal
            from f_match_detail fmd
            left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id_match =".$id." and fmd.id_um = 0 and biaya = 0)
                UNION ALL
            (select 'SELISIH' as nomor, COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan)*-1 as nominal, '' as tanggal from f_match_detail fmd
                        left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
                        left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
                        where fmd.id_match =".$id." and COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) < 0 and fmd.id_um = 0)");
        return $data;
    }

    function load_um_match_print2($id){
        $data = $this->db->query("
            (select COALESCE(fmd.keterangan,fum.no_uang_masuk) as nomor, COALESCE(NULLIF(fmd.biaya,0),fum.nominal) as nominal,  COALESCE(NULLIF(fum.rekening_pembayaran,''),fum.nomor_cek) as nomor_cek, b.nama_bank from f_match_detail fmd
            left join f_uang_masuk fum on fum.id = fmd.id_um
            left join bank b on b.id = fum.rekening_tujuan
            where fmd.id_match =".$id." and fmd.id_inv = 0)
                UNION ALL
            (select 'SELISIH' as nomor, COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) as nominal, '' as nomor_cek, '' as nama_bank from f_match_detail fmd
            left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id_match =".$id." and COALESCE(fi.nilai_pembulatan, rti.nilai_pembulatan) > 0 and fmd.id_um = 0)
                UNION ALL
            (select concat_ws(COALESCE(fi.no_invoice, rti.no_invoice_jasa), 'PEL. ','') as nomor, COALESCE(fi.nilai_invoice,rti.nilai_invoice)-COALESCE(fi.nilai_pembulatan,rti.nilai_pembulatan)-fmd2.inv_bayar as nominal, '' as nomor_cek, '' as nama_bank from f_match_detail fmd2
            left join f_invoice fi on fmd2.inv_type = 0 and fi.id = fmd2.id_inv
            left join r_t_inv_jasa rti on fmd2.inv_type = 1 and rti.id = fmd2.id_inv
            where fmd2.id_match =".$id." and fmd2.inv_bayar!=COALESCE(fi.nilai_invoice,rti.nilai_invoice)-COALESCE(fi.nilai_pembulatan,rti.nilai_pembulatan) and fmd2.id_um = 0)
            ");
        return $data;
    }

    function load_invoice_print_um_match($id){
        $data = $this->db->query("select fmd.*, COALESCE(fi.jenis_trx,0) as jenis_trx, COALESCE(fi.no_invoice,rti.no_invoice_jasa) as no_invoice, COALESCE(fi.nilai_bayar,rti.nilai_bayar) as total 
            from f_match_detail fmd
            left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id_match =".$id." and fmd.id_um = 0");
        return $data;
    }

    function matching_detail($id){
        $data = $this->db->query("select fm.*, mc.nama_customer, mc.pic, mc.alamat from f_match fm 
            left join m_customers mc on mc.id = fm.id_customer
            where fm.id_customer =".$id);
        return $data;
    }

    function load_invoice_full($id,$ppn,$idm){
        $data = $this->db->query("(select fi.id, fi.jenis_trx, fi.no_invoice, 0 as inv_type, (select count(id) from f_match_detail where inv_type = 0 and id_inv = fi.id and id_match =".$idm.")as count, (fi.nilai_invoice-fi.nilai_bayar-fi.nilai_pembulatan) as total
            from f_invoice fi 
            where fi.id_customer =".$id." and fi.flag_ppn =".$ppn." and flag_matching = 0)
            UNION ALL
            (select rti.id, 0 as jenis_trx, rti.no_invoice_jasa as no_invoice, 1 as inv_type, (select count(id) from f_match_detail where inv_type = 1 and id_inv = rti.id and id_match =".$idm.") as count, (rti.nilai_invoice-rti.nilai_bayar-rti.nilai_pembulatan) as total
            from r_t_inv_jasa rti 
            left join m_cv cv on rti.cv_id = cv.id
            where rti.jenis_invoice = 'INVOICE KMP KE CV' and cv.idkmp =".$id." and flag_matching = 0)
            ");
        return $data;
    }

    function load_invoice_full_kh($id,$ppn,$idm){
        $data = $this->db->query("select fi.*, 0  as inv_type, (select count(id) from f_match_detail where id_inv = fi.id and id_match =".$idm.")as count, (fi.nilai_invoice-fi.nilai_bayar-fi.nilai_pembulatan) as total
            from f_invoice fi 
            where fi.id_customer =".$id." and fi.flag_ppn =".$ppn." and flag_matching = 0");
        return $data;
    }

    function load_um_full($id,$ppn){
        $data = $this->db->query("select fum.id, fum.no_uang_masuk, fum.nomor_cek, fum.status, COALESCE(NULLIF(fum.rekening_pembayaran,''), NULLIF(fum.nomor_cek, '')) as nomor, fum.currency, fum.nominal
            from f_uang_masuk fum
            where fum.m_customer_id =".$id." and fum.flag_ppn=".$ppn." and fum.flag_matching = 0 and (fum.status = 0 or fum.status = 1)");
        return $data;
    }

    function load_invoice_match($id){
        $data = $this->db->query("select fmd.*, COALESCE(fi.jenis_trx,0) as jenis_trx, COALESCE(fi.no_invoice,rti.no_invoice_jasa) as no_invoice, fmd.inv_bayar as total
            from f_match_detail fmd
            left join f_invoice fi on fmd.inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on fmd.inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id_match =".$id." and fmd.id_inv != 0 and fmd.id_um = 0");
        return $data;
    }

    function view_um_match($id){
        $data = $this->db->query("select fmd.*
            from f_match_detail fmd
            where fmd.id =".$id);
        return $data;
    }

    function load_um_match($id){
        $data = $this->db->query("select fmd.*, COALESCE(fmd.keterangan,fum.no_uang_masuk) as no_uang_masuk, fum.nomor_cek, COALESCE(fmd.currency,fum.currency) as currency, COALESCE(NULLIF(fmd.biaya,0),fum.nominal) as total, COALESCE(fum.status,1) as status from f_match_detail fmd
            left join f_uang_masuk fum on fum.id = fmd.id_um
            where fmd.id_match =".$id." and fmd.id_inv = 0");
        return $data;
    }

    function list_invoice_matching_plus($id){
        $data = $this->db->query("select fi.id, fi.no_invoice from f_invoice fi where fi.id_customer =".$id." and flag_matching = 0 and jenis_trx = 0");
        return $data;
    }

    function list_invoice_matching_minus($id){
        $data = $this->db->query("select fi.id, fi.no_invoice from f_invoice fi where fi.id_customer =".$id." and flag_matching = 0 and jenis_trx = 1");
        return $data;
    }

    function list_um_matching($id){
        $data = $this->db->query("select fum.id, COALESCE(NULLIF(fum.rekening_pembayaran,''), NULLIF(fum.nomor_cek, '')) as nomor from f_uang_masuk fum where fum.m_customer_id =".$id." and fum.flag_matching=0 and fum.status=1");
        return $data;
    }

    function get_id_match_by_inv($id){
        $data = $this->db->query("select id_match from f_match_detail where id_um =".$id);
        return $data;
    }

    // function get_data_invoice($id){
    //     $data = $this->db->query("select 
    //         (select if(so.flag_ppn=1,round((sum(fid.total_harga)-f.diskon)*110/100)-f.add_cost+f.materai,sum(fid.total_harga-f.diskon)-f.add_cost+f.materai) from f_invoice_detail fid
    //         left join f_invoice f on f.id = fid.id_invoice
    //         left join sales_order so on so.id = f.id_sales_order 
    //         where fid.id_invoice = fi.id) as total  , 
    //         sum(fmd.paid) as paid
    //         from f_invoice fi
    //         left join f_matching_detail fmd on fmd.id_invoice = fi.id
    //         where fi.id =".$id);
    //     return $data;
    // }

    function get_data_hutang($id){
        $data = $this->db->query("select (select sum(fid.total_harga) from f_invoice_detail fid where fid.id_invoice = fi.id) as total, sum(fmd.used_hutang) as used_hutang
            from f_invoice fi
            left join f_matching_detail fmd on fmd.id_hutang = fi.id
            where fi.id =".$id);
        return $data;
    }

    function get_data_inv($id){
        $data = $this->db->query("select fi.id, fi.no_invoice, fi.nilai_invoice, fi.nilai_bayar, fi.nilai_pembulatan, (fi.nilai_invoice - fi.nilai_bayar - fi.nilai_pembulatan) as nominal
            from f_invoice fi
            where fi.id =".$id);
        return $data;
    }

    function get_data_inv2($id){
        $data = $this->db->query("select rti.id, rti.no_invoice_jasa as no_invoice, rti.nilai_invoice, rti.nilai_bayar, rti.nilai_pembulatan, (rti.nilai_invoice - rti.nilai_bayar - rti.nilai_pembulatan) as nominal
            from r_t_inv_jasa rti
            where rti.id =".$id);
        return $data;
    }

    function get_um($id){
        $data = $this->db->query("Select fum.nominal, sum(fmd.paid) as paid from f_uang_masuk fum
                left join f_matching_detail fmd on fmd.id_um = fum.id
                where fum.id =".$id);
        return $data;
    }

    function load_matching_invoice($id){
        $data = $this->db->query("select fi.no_invoice, (select sum(fid.total_harga) from f_invoice_detail fid where fid.id_invoice = fi.id) as total, 
            COALESCE(NULLIF(fum.rekening_pembayaran,''), NULLIF(fum.nomor_cek, '')) as nomor, 
            fum.jenis_pembayaran, fum.nominal, fmd.paid, fmd.sisa_invoice, fmd.sisa_um, fmd.used_hutang, fii.no_invoice as no_hutang, (select sum(fiid.total_harga) from f_invoice_detail fiid where fiid.id_invoice = fii.id) as total_hutang
            from f_matching_detail fmd 
                left join f_uang_masuk fum on fum.id = fmd.id_um
                left join f_invoice fi on fi.id = fmd.id_invoice
                left join f_invoice fii on fii.id = fmd.id_hutang
                where fmd.customer_id =".$id);
        return $data;
    }

    function check_urut(){
        $data = $this->db->query("select no_uang_masuk from f_uang_masuk order by id desc");
        return $data;
    }

    function list_kas($ppn){
        $data = $this->db->query("select fk.*, b.kode_bank, fum.no_uang_masuk, fp.no_pembayaran, mc.nama_customer, COALESCE(NULLIF(v.nm_cost,''), NULLIF(CONCAT('PEMB. ',s.nama_supplier),''), NULLIF(CONCAT('PEMB. ',c.nama_customer),''), '') as keterangan
            from f_kas fk
            left join voucher v on v.id = fk.id_vc
            left join supplier s on s.id = v.supplier_id
            left join m_customers c on c.id = v.customer_id
            left join f_match fm on fm.id = fk.id_matching
            left join m_customers cust on cust.id = fm.id_customer
            left join bank b on b.id=fk.id_bank
            left join f_uang_masuk fum on fum.id=fk.id_um
            left join m_customers mc on mc.id=fum.m_customer_id
            left join f_slip_setoran fss on fss.id=fk.id_slip_setoran
            left join f_pembayaran fp on fp.id = fss.id_pembayaran
            where fk.flag_ppn = ".$ppn."
            order by id desc");
        return $data;
    }

    function um_list_kas(){
        $data = $this->db->query("select id,no_uang_masuk,jenis_pembayaran from f_uang_masuk where status = 0");
        return $data;
    }

    function show_header_kas($id){
        $data = $this->db->query("select fk.*, fum.no_uang_masuk, fum.jenis_pembayaran, fum.bank_pembayaran, coalesce(fum.rekening_pembayaran,fum.nomor_cek) as nomor, b.kode_bank, b.nama_bank, b.nomor_rekening, v.jenis_barang, v.no_voucher, v.jenis_voucher, v.supplier_id, p.no_po, mc.nama_customer, s.nama_supplier,v.nm_cost, coalesce(fp.no_pembayaran,fpp.no_pembayaran) as no_pembayaran, coalesce(v.keterangan,fum.keterangan) as ket_v FROM f_kas fk
            left join bank b on b.id= fk.id_bank
            left join f_uang_masuk fum on fk.id_um != 0 and fum.id = fk.id_um
            left join voucher v on fk.id_vc != 0 and v.id = fk.id_vc
            left join po p on p.id = v.po_id
            left join m_customers mc on mc.id = fum.m_customer_id or mc.id = v.customer_id
            left join supplier s on s.id = v.supplier_id
            left join f_slip_setoran fss on fss.id = fk.id_slip_setoran
            left join f_pembayaran fp on fp.id = fss.id_pembayaran
            left join f_pembayaran fpp on fpp.id = fk.id_matching
            where fk.id =".$id);
        return $data;
    }

    function slip_setoran_list(){
        $data = $this->db->query("select fss.*, fp.no_pembayaran from f_slip_setoran fss
            left join f_pembayaran fp on fp.id = fss.id_pembayaran 
            where id_kas = 0");
        return $data;
    }

    function get_flag($id){
        $data = $this->db->query("select flag_tolling from sales_order where id=".$id);
        return $data;
    }

    function get_tgl_sj($id){
        $data = $this->db->query("select tanggal from t_surat_jalan where id =".$id);
        return $data;
    }

    function saldo_ppn(){
        $data = $this->db->query("select * from stok_um_ppn");
        return $data;
    }

    function saldo(){
        $data = $this->db->query("select * from stok_um");
        return $data;
    }

    function query_pak_yo_untuk_report_invoice_sj($id){
        $data = $this->db->query("select tsjd.t_sj_id, tsj.no_surat_jalan, tsj.tanggal, sum(tsjd.qty) as qty, sum(tsjd.bruto) as bruto, 
            (case when tsjd.jenis_barang_alias = 0 then tsjd.jenis_barang_id else tsjd.jenis_barang_alias end) as jbid,
            round(sum(case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end),3) as netto,
            COALESCE(jb.jenis_barang,r.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom) as uom,
            (select tsod.amount from t_sales_order_detail tsod left join t_sales_order tso on tso.id = tsod.t_so_id where tso.so_id = tsj.sales_order_id and tsod.jenis_barang_id = case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)as amount 
            from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id 
            left join t_sales_order tso on tso.so_id = tsj.sales_order_id
            left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and jb.id = (case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
            left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id=tsjd.jenis_barang_id
            -- where tsjd.t_sj_id =".$id." 
                        group by jbid
                        order by 2;");
        return $data;
    }

    function get_inv($id){
        $data = $this->db->query("Select * from f_invoice where id =".$id);
        return $data;
    }

    // function view_inv_match($id){
    //     $data = $this->db->query("Select fmd.*,COALESCE((select sum(fmd2.inv_bayar) from f_match_detail fmd2 where fmd2.id_inv = COALESCE(fi.id,rti.id) and fmd2.id != fmd.id),0) as nilai_sdh_bayar, COALESCE(fi.nilai_bayar, rti.nilai_bayar)as nilai_bayar, COALESCE(fi.nilai_invoice, rti.nilai_invoice) as nilai_invoice, COALESCE(fi.nilai_pembulatan,rti.nilai_pembulatan) as nilai_pembulatan, COALESCE(fi.no_invoice,rti.no_invoice_jasa) as no_invoice from f_match_detail fmd
    //         left join f_invoice fi on inv_type = 0 and fi.id = fmd.id_inv
    //         left join r_t_inv_jasa rti on inv_type = 1 and rti.id = fmd.id_inv
    //         where fmd.id =".$id);
    //     return $data;
    // }

    function view_inv_match($id){
        $data = $this->db->query("Select fmd.*, COALESCE(
            (select sum(fmd2.inv_bayar) from f_match_detail fmd2 where fmd2.id_inv = COALESCE(fi.id,rti.id) and fmd2.id != fmd.id),0) as nilai_sdh_bayar, 
            COALESCE(fi.nilai_bayar, rti.nilai_bayar)as nilai_bayar, COALESCE(fi.nilai_invoice, rti.nilai_invoice) as nilai_invoice, COALESCE(fi.nilai_pembulatan,rti.nilai_pembulatan) as nilai_pembulatan, COALESCE(fi.no_invoice,rti.no_invoice_jasa) as no_invoice from f_match_detail fmd
            left join f_invoice fi on inv_type = 0 and fi.id = fmd.id_inv
            left join r_t_inv_jasa rti on inv_type = 1 and rti.id = fmd.id_inv
            where fmd.id =".$id);
        return $data;
    }

    function query_penjualan($s,$e,$c){
        $data = $this->db->query("select v.*, ((v.total_harga-v.diskon-v.add_cost)*v.kurs) as total_harga, IF(v.currency='USD',0,IF(v.flag_ppn = 0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
            where v.PENJUALAN != '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."')
            order by v.flag_ppn, v.flag_tolling, v.kode_customer, v.tanggal, v.no_invoice
            ");
        return $data;
    }

    function query_penjualan_jb($s,$e,$c){
        $data = $this->db->query("select v.*, ((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai as total_harga, IF(v.currency='USD',0,IF(v.flag_ppn = 0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
            where v.PENJUALAN != '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."')
            order by v.flag_ppn, v.flag_tolling, v.kode_barang, v.tanggal, v.no_invoice
            ");
        return $data;
    }

    function print_laporan_sj($s,$e,$ppn){
        $data = $this->db->query("select COALESCE(r.nama_item,r2.nama_item,sp.nama_item,jb.jenis_barang) as jenis_barang, COALESCE(r.kode_rongsok,r2.kode_rongsok,sp.alias,jb.kode) as kode_barang, COALESCE(r.uom,r2.uom,sp.uom,jb.uom) as uom, sum(tsjd.bruto) as bruto, round(sum(case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end),3) as netto, tsj.tanggal, tsj.no_surat_jalan from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id
            left join rongsok r on (tsj.jenis_barang = 'RONGSOK' and r.id = tsjd.jenis_barang_id)
            left join rongsok r2 on (tsj.jenis_barang = 'AMPAS' and r2.id = tsjd.jenis_barang_id)
            left join sparepart sp on (tsj.jenis_barang = 'LAIN' and sp.id = tsjd.jenis_barang_id)
            left join jenis_barang jb on (jb.id = tsjd.jenis_barang_id)
            left join sales_order so on so.id = tsj.sales_order_id
            where so.flag_ppn=".$ppn." and tsj.tanggal between '".$s."' and '".$e."' group by tsjd.jenis_barang_id, tsjd.t_sj_id, tsj.tanggal order by kode_barang, tanggal");
        return $data;
    }

    function print_laporan_sj_all($s,$e){
        $data = $this->db->query("select COALESCE(r.nama_item,r2.nama_item,sp.nama_item,jb.jenis_barang) as jenis_barang, COALESCE(r.kode_rongsok,r2.kode_rongsok,sp.alias,jb.kode) as kode_barang, COALESCE(r.uom,r2.uom,sp.uom,jb.uom) as uom, sum(tsjd.bruto) as bruto, round(sum(case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end),3) as netto, tsj.tanggal, tsj.no_surat_jalan from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id
            left join rongsok r on (tsj.jenis_barang = 'RONGSOK' and r.id = tsjd.jenis_barang_id)
            left join rongsok r2 on (tsj.jenis_barang = 'AMPAS' and r2.id = tsjd.jenis_barang_id)
            left join sparepart sp on (tsj.jenis_barang = 'LAIN' and sp.id = tsjd.jenis_barang_id)
            left join jenis_barang jb on (jb.id = tsjd.jenis_barang_id)
            where tsj.tanggal between '".$s."' and '".$e."' group by tsjd.jenis_barang_id, tsjd.t_sj_id, tsj.tanggal order by kode_barang, tanggal");
        return $data;
    }

    function print_laporan_penjualan($s,$e,$ppn){
        $data = $this->db->query("select v.*, ((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai as total_harga, IF(v.currency='USD',0,IF(v.flag_ppn=1,(((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100),0)) as nilai_ppn from v_data_faktur_all v 
            where v.flag_ppn =".$ppn." and (v.tanggal BETWEEN '".$s."' AND '".$e."')
            order by v.flag_tolling, v.kode_customer
            ");
        return $data;
    }

    function print_laporan_penjualan_sj($s,$e,$ppn){
        $data = $this->db->query("select v.*, ((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai as total_harga, IF(v.currency='USD',0,IF(v.flag_ppn=1,(((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100),0)) as nilai_ppn from v_data_faktur_all v 
            where v.flag_ppn =".$ppn." and (v.tanggal BETWEEN '".$s."' AND '".$e."')
            order by v.no_surat_jalan, v.nama_barang
            ");
        return $data;
    }

    function print_laporan_penjualan_sj_all($s,$e){
        $data = $this->db->query("select v.*, ((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai as total_harga, IF(v.currency='USD',0,IF(v.flag_ppn=1,(((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100),0)) as nilai_ppn from v_data_faktur_all v 
            where (v.tanggal BETWEEN '".$s."' AND '".$e."')
            order by v.no_surat_jalan, v.nama_barang
            ");
        return $data;
    }

    function print_laporan_penjualan_jb($s,$e,$ppn){
        $data = $this->db->query("select v.*, ((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai as total_harga, IF(v.currency='USD',0,IF(v.flag_ppn=1,(((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100),0)) as nilai_ppn from v_data_faktur_all v 
            where v.flag_ppn =".$ppn." and (v.tanggal BETWEEN '".$s."' AND '".$e."')
            order by v.flag_tolling, v.kode_barang
            ");
        return $data;
    }

    function print_query_penjualan($ppn){
        $data = $this->db->query("select v.*,(CASE WHEN v.flag_ppn = 0 THEN v.total_harga ELSE v.total_harga/110*100) as nilai_sebelum_ppn, (CASE WHEN v.flag_ppn = 0 THEN 0 ELSE v.total_harga/110*10 END) as nilai_ppn from v_data_faktur_all v 
            where v.flag_ppn =".$ppn."
            order by v.flag_ppn, v.flag_tolling, v.kode_customer, v.tanggal, v.no_invoice
            ");
        return $data;
    }

    function print_penjualan_customer($s,$e,$c,$id){
        $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai) as total_harga, 
            SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v
            where v.PENJUALAN != '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."') and v.id_customer = ".$id."
            group by v.flag_tolling, v.kode_customer
            order by v.flag_tolling, total_harga desc
            ");
        return $data;
    }

//INI PAKE MATERAI
    // function print_penjualan_customer_all($s,$e,$c){
    //     $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai) as total_harga, 
    //         SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v
    //         where v.PENJUALAN != '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."')
    //         group by v.flag_tolling, v.kode_customer
    //         order by v.flag_tolling, total_harga desc
    //         ");
    //     return $data;
    // }

    function print_penjualan_customer_all($s,$e,$c){
        $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum((v.total_harga-v.diskon-v.add_cost)*v.kurs) as total_harga, 
            SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v
            where v.PENJUALAN != '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."')
            group by v.flag_tolling, v.kode_customer
            order by v.flag_tolling, total_harga desc
            ");
        return $data;
    }

    function print_penjualan_customer2($s,$e,$c,$id){
        $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai) as total_harga, 
            SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
            where v.PENJUALAN = '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."') and v.id_customer = ".$id."
            group by v.flag_tolling, v.kode_customer
            order by v.flag_tolling, total_harga desc");
        return $data;
    }

//INI PAKE MATERAI
    // function print_penjualan_customer2_all($s,$e,$c){
    //     $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai) as total_harga, 
    //         SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
    //         where v.PENJUALAN = '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."')
    //         group by v.flag_tolling, v.kode_customer
    //         order by v.flag_tolling, total_harga desc");
    //     return $data;
    // }

    function print_penjualan_customer2_all($s,$e,$c){
        $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)) as total_harga, 
            SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
            where v.PENJUALAN = '".$c."' and (v.tanggal BETWEEN '".$s."' AND '".$e."')
            group by v.flag_tolling, v.kode_customer
            order by v.flag_tolling, total_harga desc");
        return $data;
    }

//INI PAKE MATERAI
    // function print_penjualan_jb($s,$e,$c){
    //     $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai) as total_harga, 
    //         SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
    //         where v.PENJUALAN != '".$c."' and v.tanggal between '".$s."' and '".$e."'
    //         group by v.flag_tolling, v.kode_barang
    //         order by v.flag_tolling, v.kode_barang asc
    //         ");
    //     return $data;
    // }

    // function print_penjualan_jb2($s,$e,$c){
    //     $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)+v.materai) as total_harga, 
    //         SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
    //         where v.PENJUALAN = '".$c."' and v.tanggal between '".$s."' and '".$e."'
    //         group by v.flag_tolling, v.kode_barang
    //         order by v.flag_tolling, v.kode_barang asc
    //         ");
    //     return $data;
    // }

//INI GAPAKE MATERAI
    function print_penjualan_jb($s,$e,$c){
        $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)) as total_harga, 
            SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
            where v.PENJUALAN != '".$c."' and v.tanggal between '".$s."' and '".$e."'
            group by v.flag_tolling, v.kode_barang
            order by v.flag_tolling, v.kode_barang asc
            ");
        return $data;
    }

    function print_penjualan_jb2($s,$e,$c){
        $data = $this->db->query("select v.*, 'IDR' as currency, sum(v.netto) as netto, sum(((v.total_harga-v.diskon-v.add_cost)*v.kurs)) as total_harga, 
            SUM(IF(v.currency='USD' or v.flag_ppn=0,0,((v.total_harga-v.diskon-v.add_cost)*v.kurs)*10/100)) as nilai_ppn from v_data_faktur_all v 
            where v.PENJUALAN = '".$c."' and v.tanggal between '".$s."' and '".$e."'
            group by v.flag_tolling, v.kode_barang
            order by v.flag_tolling, v.kode_barang asc
            ");
        return $data;
    }

    function print_laporan_piutang_old($date,$ppn){
        $data = $this->db->query("select fi.*, (CASE WHEN fi.nilai_invoice = (fi.nilai_bayar + fi.nilai_pembulatan) THEN 0 
            WHEN fi.currency = 'IDR' THEN fi.nilai_invoice ELSE 0 END) as nilai_invoice,
            (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us, 
            (CASE WHEN fi.nilai_invoice = (fi.nilai_bayar + fi.nilai_pembulatan) THEN fi.nilai_invoice ELSE 0 END) as nilai_cm,
            tsj.no_surat_jalan, 
            mc.kode_customer, mc.nama_customer, mc.nama_customer_kh
            from f_invoice fi
            left join t_surat_jalan tsj on tsj.inv_id =  fi.id
            left join m_customers mc on mc.id = fi.id_customer
            where (MONTH((select fm.tanggal from f_match_detail fmd 
             left join f_match fm on fm.id = fmd.id_match
             where fmd.id_inv = fi.id order by fmd.id desc limit 1)) = MONTH('".$date."') or fi.nilai_invoice > (fi.nilai_bayar + fi.nilai_pembulatan)) and fi.flag_ppn = ".$ppn."
             order by fi.id_customer, fi.tanggal asc");
        return $data;
    }

    function print_laporan_piutang($ppn){
        $data = $this->db->query("select *, (select sum(fmd.inv_bayar) from f_invoice fi2
            left join f_match_detail fmd on fmd.id_inv = fi2.id
            where i.count_fmd > 0 and fi2.id = i.id group by i.id) as nilai_cm 
            from (select fi.id, fi.id_customer, fi.nilai_invoice, fi.currency, fi.tanggal, fi.nilai_bayar, fi.nilai_pembulatan, fi.no_invoice, fi.tgl_jatuh_tempo, (sum(fmd.inv_bayar) + fi.nilai_pembulatan) as nilai_invoice_bayar,
            (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us, (select count(id_inv) from v_inv_um_status vi where vi.status = 0 and vi.id_inv = fi.id group by vi.id_inv) as count_fmd,
            tsj.no_surat_jalan, 
            mc.kode_customer, mc.nama_customer, mc.nama_customer_kh
            from f_invoice fi
            left join f_match_detail fmd on fmd.id_inv = fi.id
            left join t_surat_jalan tsj on tsj.inv_id =  fi.id
            left join m_customers mc on mc.id = fi.id_customer
            where fi.flag_ppn = ".$ppn."
             group by fi.id
            ) as i
             where i.nilai_invoice > (i.nilai_bayar + i.nilai_pembulatan)
             order by i.id_customer, i.no_invoice, i.tanggal asc");
        return $data;
    }

    function print_laporan_piutang2($ppn,$tgl){
        $data = $this->db->query("select *, 0 as nilai_cm from 
            (select fi.id, fi.id_customer, fi.nilai_invoice, fi.currency, fi.tanggal, fi.nilai_bayar, fi.nilai_pembulatan, fi.no_invoice, fi.tgl_jatuh_tempo, 
                (select COALESCE(sum(fmd.inv_bayar+fmd.inv_pembulatan),0) from f_match_detail fmd
                    left join f_match fm on fm.id = fmd.id_match
                    where fmd.inv_type = 0 and fi.id = fmd.id_inv and fm.tanggal <= '".$tgl."') as nilai_invoice_bayar,
            (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us,
            tsj.no_surat_jalan, mc.kode_customer, mc.nama_customer, mc.nama_customer_kh
            from f_invoice fi
            left join t_surat_jalan tsj on tsj.inv_id =  fi.id
            left join m_customers mc on mc.id = fi.id_customer
            where fi.flag_ppn ='".$ppn."' and fi.tanggal <= '".$tgl."'
             group by fi.id
            ) as i
             where i.nilai_invoice > i.nilai_invoice_bayar
             order by i.id_customer, i.no_invoice, i.tanggal asc");
        return $data;
    }

    function print_laporan_piutang_all(){
        $data = $this->db->query("select *, (select sum(fmd.inv_bayar) from f_invoice fi2
            left join f_match_detail fmd on fmd.id_inv = fi2.id
            where i.count_fmd > 0 and fi2.id = i.id group by i.id) as nilai_cm from (select fi.id, fi.id_customer, fi.nilai_invoice, fi.currency, fi.tanggal, fi.nilai_bayar, fi.nilai_pembulatan, fi.no_invoice, fi.tgl_jatuh_tempo, (sum(fmd.inv_bayar) + fi.nilai_pembulatan) as nilai_invoice_bayar,
            (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us, (select count(id_inv) from v_inv_um_status vi where vi.status = 0 and vi.id_inv = fi.id group by vi.id_inv) as count_fmd,
            tsj.no_surat_jalan, 
            mc.kode_customer, mc.nama_customer, mc.nama_customer_kh
            from f_invoice fi
            left join f_match_detail fmd on fmd.id_inv = fi.id
            left join t_surat_jalan tsj on tsj.inv_id =  fi.id
            left join m_customers mc on mc.id = fi.id_customer
             group by fi.id
            ) as i
             where i.nilai_invoice > (i.nilai_bayar + i.nilai_pembulatan)
             order by i.id_customer, i.no_invoice, i.tanggal asc");
        return $data;
    }

    function print_laporan_piutang_all2($tgl){
        $data = $this->db->query("select *, 0 as nilai_cm from 
            (select fi.id, fi.id_customer, fi.nilai_invoice, fi.currency, fi.tanggal, fi.nilai_bayar, fi.nilai_pembulatan, fi.no_invoice, fi.tgl_jatuh_tempo, 
                (select COALESCE(sum(fmd.inv_bayar+fmd.inv_pembulatan),0) from f_match_detail fmd
                    left join f_match fm on fm.id = fmd.id_match
                    where fmd.inv_type = 0 and fi.id = fmd.id_inv and fm.tanggal <= '".$tgl."') as nilai_invoice_bayar,
            (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us,
            tsj.no_surat_jalan, mc.kode_customer, mc.nama_customer, mc.nama_customer_kh
            from f_invoice fi
            left join t_surat_jalan tsj on tsj.inv_id =  fi.id
            left join m_customers mc on mc.id = fi.id_customer
            where fi.tanggal <= '".$tgl."' and fi.nilai_pembulatan != fi.nilai_invoice
             group by fi.id
            ) as i
             where i.nilai_invoice > i.nilai_invoice_bayar
             order by i.id_customer, i.no_invoice, i.tanggal asc");
        return $data;
    }

    function print_laporan_piutang_kmp($ppn){
        $data = $this->db->query("
            select * from (
            (select fi.id, fi.id_customer, fi.nilai_invoice, fi.currency, fi.tanggal, fi.nilai_bayar as nilai_invoice_bayar, fi.nilai_pembulatan, fi.no_invoice, fi.tgl_jatuh_tempo,
            (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us, 0 as nilai_cm,
            tsj.no_surat_jalan, mc.kode_customer, mc.nama_customer, mc.nama_customer_kh
            from f_invoice fi
            left join t_surat_jalan tsj on tsj.inv_id =  fi.id
            left join m_customers mc on mc.id = fi.id_customer
            where fi.flag_ppn = ".$ppn.")
            UNION ALL
            (select rinv.id, mc2.id as id_customer, rinv.nilai_invoice, 'IDR' as currency, rinv.tanggal, rinv.nilai_bayar as nilai_invoice_bayar, rinv.nilai_pembulatan, rinv.no_invoice_jasa as no_invoice, rinv.jatuh_tempo as tgl_jatuh_tempo, 0 as nilai_us, 0 as nilai_cm, rtsj.no_sj_resmi as no_surat_jalan, mc2.kode_customer, mc2.nama_customer, mc2.nama_customer_kh
                from r_t_inv_jasa rinv
                left join r_t_surat_jalan rtsj on rtsj.id = rinv.sjr_id
                left join m_cv mcv on mcv.id = rinv.cv_id
                left join m_customers mc2 on mc2.id = mcv.idkmp
                where customer_id = 0
            )) as i where i.nilai_invoice > (i.nilai_invoice_bayar + i.nilai_pembulatan) order by i.id_customer, i.tanggal, i.no_surat_jalan
            ");
        return $data;
    }

    function print_laporan_piutang_kmp2($ppn,$tgl){
        $data = $this->db->query("
            select * from (
            (select fi.id, fi.id_customer, fi.nilai_invoice, fi.currency, fi.tanggal, 
                (select COALESCE(sum(fmd.inv_bayar+fmd.inv_pembulatan),0) from f_match_detail fmd
                    left join f_match fm on fm.id = fmd.id_match
                    where fmd.inv_type = 0 and fi.id = fmd.id_inv and fm.tanggal <= '".$tgl."') as nilai_invoice_bayar, fi.nilai_pembulatan, fi.no_invoice, fi.tgl_jatuh_tempo,
            (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us, 0 as nilai_cm,
            tsj.no_surat_jalan, mc.kode_customer, mc.nama_customer, mc.nama_customer_kh
            from f_invoice fi
            left join t_surat_jalan tsj on tsj.inv_id =  fi.id
            left join m_customers mc on mc.id = fi.id_customer
            where fi.flag_ppn = ".$ppn." and fi.tanggal <= '".$tgl."')
            UNION ALL
            (select rinv.id, mc2.id as id_customer, rinv.nilai_invoice, 'IDR' as currency, rinv.tanggal,
                (select COALESCE(sum(fmd.inv_bayar+fmd.inv_pembulatan),0) from f_match_detail fmd
                    left join f_match fm on fm.id = fmd.id_match
                    where fmd.inv_type = 1 and rinv.id = fmd.id_inv and fm.tanggal <= '".$tgl."') as nilai_invoice_bayar, rinv.nilai_pembulatan, rinv.no_invoice_jasa as no_invoice, rinv.jatuh_tempo as tgl_jatuh_tempo, 0 as nilai_us, 0 as nilai_cm, rtsj.no_sj_resmi as no_surat_jalan, mc2.kode_customer, mc2.nama_customer, mc2.nama_customer_kh
                from r_t_inv_jasa rinv
                left join r_t_surat_jalan rtsj on rtsj.id = rinv.sjr_id
                left join m_cv mcv on mcv.id = rinv.cv_id
                left join m_customers mc2 on mc2.id = mcv.idkmp
                where customer_id = 0 and rinv.tanggal <= '".$tgl."'
            )) as i where i.nilai_invoice > (i.nilai_invoice_bayar + i.nilai_pembulatan) order by i.id_customer, i.tanggal, i.no_surat_jalan
            ");
        return $data;
    }

    // function print_laporan_piutang_kmp($date,$ppn){
    //     $data = $this->db->query("select * from (select fi.id, fi.id_customer, fi.nilai_invoice, fi.currency, fi.tanggal, fi.nilai_bayar, fi.nilai_pembulatan, fi.no_invoice, fi.tgl_jatuh_tempo, (sum(fmd.inv_bayar) + fi.nilai_pembulatan) as nilai_invoice_bayar,
    //         (CASE WHEN fi.currency='USD' THEN fi.nilai_invoice ELSE 0 END) as nilai_us,
    //         tsj.no_surat_jalan, 
    //         mc.kode_customer, mc.nama_customer, mc.nama_customer_kh, 0 as nilai_cm
    //         from f_invoice fi
    //         left join f_match_detail fmd on fmd.id_inv = fi.id
    //         left join t_surat_jalan tsj on tsj.inv_id =  fi.id
    //         left join m_customers mc on mc.id = fi.id_customer
    //         where fi.flag_ppn = ".$ppn."
    //          group by fi.id
    //         ) as i
    //          where i.nilai_invoice > (i.nilai_bayar + i.nilai_pembulatan)
    //          order by i.id_customer, i.no_invoice, i.tanggal asc");
    //     return $data;
    // }

    function trx_kas($s,$e,$id,$ppn){
        return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fk.nomor, fk.jenis_trx, (fk.nominal*fk.kurs) as nominal, COALESCE(mc.nama_customer,'') as nama_customer, b.nama_bank from f_kas fk 
            left join bank b on b.id = fk.id_bank
            left join f_uang_masuk fum on fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            where fk.tanggal BETWEEN '".$s."' and '".$e."' and id_bank < 5 and fk.flag_ppn =".$ppn." and jenis_trx=".$id." and fum.rekening_tujuan != 0 order by fk.tanggal");
    }

    function trx_bank($s,$e,$id,$ppn){
        return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fk.nomor, fk.jenis_trx, (fk.nominal*fk.kurs) as nominal, COALESCE(mc.nama_customer,'') as nama_customer, b.nama_bank from f_kas fk 
            left join bank b on b.id = fk.id_bank
            left join f_uang_masuk fum on fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            where fk.tanggal BETWEEN '".$s."' and '".$e."' and id_bank >= 5 and fk.flag_ppn =".$ppn." and jenis_trx=".$id." and fum.rekening_tujuan != 0 order by fk.tanggal");
    }

    // function trx_keluar_kas($s,$e,$id,$ppn){
    //     return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fk.nomor, fk.jenis_trx, (v.amount*fk.kurs) as nominal,
    //     (CASE WHEN COALESCE(mc.nama_customer, s.nama_supplier) IS NOT NULL
    //         THEN
    //             CONCAT_WS(' ','PEMB.',COALESCE(mc.nama_customer, s.nama_supplier))
    //         ELSE
    //             nm_cost
    //         END) as keterangan, b.nama_bank from f_kas fk 
    //         left join bank b on b.id = fk.id_bank
    //         left join voucher v on fk.id = v.id_fk
    //         left join m_customers mc on mc.id = v.customer_id
    //         left join supplier s on s.id = v.supplier_id
    //         where fk.tanggal BETWEEN '".$s."' and '".$e."' and id_bank < 5 and fk.flag_ppn =".$ppn." and jenis_trx=".$id."
    //         group by fk.id order by fk.tanggal, fk.nomor
    //         ");
    // }

    function trx_keluar_kas($s,$e,$id,$ppn){
        return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fk.nomor, fk.jenis_trx, 
            (CASE WHEN v.vk_id > 0 
            THEN (select
                round((select if(po.diskon=0,if(p.ppn=1,sum(ld.qty*pd.amount)*110/100,sum(ld.qty*pd.amount)),if(p.ppn=1,sum(ld.qty*pd.amount)*110/100,sum(ld.qty*pd.amount))*(100-po.diskon)/100)+po.materai from lpb_detail ld
                 left join po_detail pd on pd.id = ld.po_detail_id
                 left join po p on p.id = pd.po_id
                 where ld.lpb_id=lpb2.id),0)         
            from lpb lpb2
            left join po on po.id = lpb2.po_id
            where lpb2.id = lpb.id)
            ELSE (v.amount*fk.kurs) END) as nominal,
            (CASE WHEN COALESCE(mc.nama_customer, s.nama_supplier) IS NOT NULL
            THEN
                CONCAT_WS(' ','PEMB.',COALESCE(mc.nama_customer, s.nama_supplier),COALESCE(lpb.no_bpb,v.keterangan))
            ELSE
                nm_cost
            END) as keterangan, b.nama_bank
            from voucher v
            left join f_kas fk on fk.id = v.id_fk
            left join bank b on b.id = fk.id_bank
            left join m_customers mc on mc.id = v.customer_id
            left join supplier s on s.id = v.supplier_id
            left join lpb on v.vk_id > 0 and lpb.vk_id = v.vk_id
            where fk.tanggal BETWEEN '".$s."' and '".$e."' and id_bank < 5 and fk.flag_ppn =".$ppn." and jenis_trx=".$id."
            order by fk.tanggal, fk.nomor
            ");
    }

    function trx_keluar_bank($s,$e,$id,$ppn){
        return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fk.nomor, fk.jenis_trx, 
            (CASE WHEN v.vk_id > 0 
            THEN (select
                round((select if(po.diskon=0,if(p.ppn=1,sum(ld.qty*pd.amount)*110/100,sum(ld.qty*pd.amount)),if(p.ppn=1,sum(ld.qty*pd.amount)*110/100,sum(ld.qty*pd.amount))*(100-po.diskon)/100)+po.materai from lpb_detail ld
                 left join po_detail pd on pd.id = ld.po_detail_id
                 left join po p on p.id = pd.po_id
                 where ld.lpb_id=lpb2.id),0)         
            from lpb lpb2
            left join po on po.id = lpb2.po_id
            where lpb2.id = lpb.id)
            ELSE (v.amount*fk.kurs) END) as nominal,
            (CASE WHEN COALESCE(mc.nama_customer, s.nama_supplier) IS NOT NULL
            THEN
                CONCAT_WS(' ','PEMB.',COALESCE(mc.nama_customer, s.nama_supplier),COALESCE(lpb.no_bpb,v.keterangan))
            ELSE
                nm_cost
            END) as keterangan, b.nama_bank
            from voucher v
            left join f_kas fk on fk.id = v.id_fk
            left join bank b on b.id = fk.id_bank
            left join m_customers mc on mc.id = v.customer_id
            left join supplier s on s.id = v.supplier_id
            left join lpb on v.vk_id > 0 and lpb.vk_id = v.vk_id
            where fk.tanggal BETWEEN '".$s."' and '".$e."' and id_bank >= 5 and fk.flag_ppn =".$ppn." and jenis_trx=".$id."
            order by fk.tanggal, fk.nomor");
    }

    function trx_cm($s,$e,$id,$ppn){
        return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fk.nomor, fk.jenis_trx, (fk.nominal*fk.kurs) as nominal, COALESCE(mc.nama_customer,'') as nama_customer, b.nama_bank, fum.nomor_cek, fum.tgl_cair from f_kas fk 
            left join bank b on b.id = fk.id_bank
            left join f_uang_masuk fum on fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            where fk.tanggal BETWEEN '".$s."' and '".$e."' and id_bank = 0 and fk.flag_ppn =".$ppn." and jenis_trx=".$id." order by fk.tanggal");
    }

    function cm_belum_cair0(){
        return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fum.no_uang_masuk as nomor, fk.jenis_trx, (fk.nominal*fk.kurs) as nominal, 'Cek dari KMP' as nama_customer, b.nama_bank, fum.nomor_cek, fum.tgl_cair from f_kas fk 
            left join bank b on b.id = fk.id_bank
            left join f_uang_masuk fum on fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.m_customer_id = 0 and id_bank = 0 and fk.flag_ppn = 0 and jenis_trx=0 and status = 0 order by nama_customer, tgl_cair, tanggal, nomor");
    }

    function cm_belum_cair02($tgl){
        return $this->db->query("select * from (select fk.id, fk.tanggal, fk.flag_ppn, fum.no_uang_masuk as nomor, fk.jenis_trx, (fk.nominal*fk.kurs) as nominal, mc.nama_customer, b.nama_bank, fum.nomor_cek, fum.tgl_cair,
            (CASE WHEN fum.status = 1 THEN CASE WHEN fp.tanggal > '".$tgl."' THEN 0 ELSE 1 END ELSE 0 END) as stat from f_kas fk 
            left join bank b on b.id = fk.id_bank
            left join f_uang_masuk fum on fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            left join f_pembayaran_detail fpd on fpd.um_id = fum.id
            left join f_pembayaran fp on fp.id = fpd.id_pembayaran
            where fum.m_customer_id = 0 and id_bank = 0 and fum.tanggal <= '".$tgl."' and fk.flag_ppn = 0 and jenis_trx = 0 
        ) as i
        where stat = 0
        order by nama_customer, tgl_cair, tanggal, nomor");
    }

    function cm_belum_cair(){
        return $this->db->query("select fk.id, fk.tanggal, fk.flag_ppn, fum.no_uang_masuk as nomor, fk.jenis_trx, (fk.nominal*fk.kurs) as nominal, COALESCE(mc.nama_customer,'') as nama_customer, b.nama_bank, fum.nomor_cek, fum.tgl_cair from f_kas fk 
            left join bank b on b.id = fk.id_bank
            left join f_uang_masuk fum on fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.m_customer_id > 0 and id_bank = 0 and fk.flag_ppn = 0 and jenis_trx=0 and status = 0 order by nama_customer, tgl_cair, tanggal, nomor");
    }

    function cm_belum_cair2($tgl){
        return $this->db->query("select * from (select fk.id, fk.tanggal, fk.flag_ppn, fum.no_uang_masuk as nomor, fk.jenis_trx, (fk.nominal*fk.kurs) as nominal, mc.nama_customer, b.nama_bank, fum.nomor_cek, fum.tgl_cair,
            (CASE WHEN fum.status = 1 THEN CASE WHEN fp.tanggal > '".$tgl."' THEN 0 ELSE 1 END ELSE 0 END) as stat from f_kas fk 
            left join bank b on b.id = fk.id_bank
            left join f_uang_masuk fum on fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            left join f_pembayaran_detail fpd on fpd.um_id = fum.id
            left join f_pembayaran fp on fp.id = fpd.id_pembayaran
            where fum.m_customer_id > 0 and id_bank = 0 and fum.tanggal <= '".$tgl."' and fk.flag_ppn = 0 and jenis_trx = 0 
        ) as i
        where stat = 0
        order by nama_customer, tgl_cair, tanggal, nomor");
    }

    function saldo_awal($s,$id){
        return $this->db->query("select jenis_trx, sum(CASE WHEN jenis_trx = 0 THEN nominal ELSE 0 END) as saldo_masuk, sum(CASE WHEN jenis_trx = 1 THEN nominal ELSE 0 END) as saldo_keluar from f_kas where tanggal < '".$s."' and id_bank =".$id."
            ");
    }

    // function trx_keluar_masuk($s,$e,$id){
    //     return $this->db->query("select fk.nomor, fk.tanggal, COALESCE(v.amount,fk.nominal) as nominal, fk.jenis_trx, COALESCE(NULLIF(v.nm_cost,''),NULLIF(fk.keterangan,''),(CASE WHEN COALESCE(mc.nama_customer, s.nama_supplier, mc2.nama_customer) IS NOT NULL
    //         THEN
    //             CONCAT_WS(' ','PEMB.',COALESCE(mc.nama_customer, s.nama_supplier, mc2.nama_customer), v.keterangan)
    //         ELSE
    //             nm_cost
    //         END)) as keterangan from f_kas fk
    //         left join voucher v on fk.jenis_trx = 1 and v.id_fk = fk.id 
    //         left join supplier s on s.id = v.supplier_id
    //         left join m_customers mc2 on mc2.id = v.customer_id
    //         left join f_uang_masuk fum on fk.jenis_trx = 0 and fum.id = fk.id_um
    //         left join m_customers mc on mc.id = fum.m_customer_id
    //         where fk.tanggal BETWEEN '".$s."' and '".$e."' and fk.id_bank =".$id."
    //         order by fk.tanggal, fk.jenis_trx, fk.nomor asc
    //         ");
    // }

    function trx_keluar_masuk($s,$e,$id){
        return $this->db->query("select fk.nomor, fk.tanggal, COALESCE(
            (select if(p.diskon=0,if(p.ppn=1,round(sum(ld.qty*pd.amount)*110/100),sum(ld.qty*pd.amount)),if(p.ppn=1,round(sum(ld.qty*pd.amount)*110/100),sum(ld.qty*pd.amount))*(100-p.diskon)/100)+p.materai from lpb_detail ld
                 left join po_detail pd on pd.id = ld.po_detail_id
                 left join po p on p.id = pd.po_id
                 where ld.lpb_id=lpb.id),
            v.amount,fk.nominal) as nominal, fk.jenis_trx, COALESCE(NULLIF(v.nm_cost,''),NULLIF(fk.keterangan,''),(CASE WHEN COALESCE(mc.nama_customer, s.nama_supplier, mc2.nama_customer) IS NOT NULL
            THEN
                CONCAT_WS(' ','PEMB.',COALESCE(mc.nama_customer, s.nama_supplier, mc2.nama_customer),lpb.no_bpb, v.keterangan)
            ELSE
                nm_cost
            END)) as keterangan from f_kas fk
            left join voucher v on fk.jenis_trx = 1 and v.id_fk = fk.id 
            left join supplier s on s.id = v.supplier_id
            left join m_customers mc2 on mc2.id = v.customer_id
            left join f_uang_masuk fum on fk.jenis_trx = 0 and fum.id = fk.id_um
            left join m_customers mc on mc.id = fum.m_customer_id
            left join lpb on v.vk_id > 0 and lpb.vk_id = v.vk_id
            where fk.tanggal BETWEEN '".$s."' and '".$e."' and fk.id_bank =".$id."
            order by fk.tanggal, fk.jenis_trx, fk.nomor asc
            ");
    }
    // function print_penjualan_customer($ppn){
    //     $data = $this->db->query("select v.*, (v.total_harga*v.kurs) as total_harga, IF(v.currency='USD',v.total_harga*v.kurs,v.total_harga*v.kurs/110*100) as nilai_sebelum_ppn, IF(v.currency='USD',v.total_harga*v.kurs,v.total_harga*v.kurs/110*10) as nilai_ppn from v_data_faktur_all v 
    //         where v.flag_ppn =".$ppn."
    //         order by v.kode_customer, v.flag_tolling, total_harga desc
    //         ");
    //     return $data;
    // }

    function print_laporan_pembelian($s, $e, $ppn){
        if ($ppn == 3) {
            $data = $this->db->query("
                    SELECT
                        t.tanggal AS tgl_ttr,
                        t.no_ttr AS no_ttr,
                    CASE
                            
                            WHEN dd.po_detail_id > 0 THEN
                            'PO' 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                'Tolling' ELSE 'Lain2' 
                                END AS sumber,
                        CASE
                                
                                WHEN dd.po_detail_id > 0 THEN
                                p.no_po 
                                WHEN dd.po_detail_id = 0 
                                AND d.so_id > 0 THEN
                                    so.no_sales_order ELSE '-' 
                                    END AS no_doc_sumber,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    p.tanggal ELSE so.tanggal 
                                END AS tgl_doc,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    s.kode_supplier 
                                    WHEN dd.po_detail_id = 0 
                                    AND d.so_id > 0 THEN
                                        mc.kode_customer ELSE '-' 
                                        END AS kode_sup_cust,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        s.nama_supplier 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                        mc.nama_customer_kh 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                        mc.nama_customer ELSE '-' 
                                    END AS nama_sup_cust,
                                    r.kode_rongsok AS kode_rongsok,
                                    r.nama_item AS nama_item,
                                    td.bruto AS bruto,
                                    td.netto AS netto,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        pd.amount ELSE 0 
                                    END AS amount,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        ( td.netto * pd.amount ) ELSE 0 
                                    END AS total_amount,
                                    t.jmlh_afkiran AS jmlh_afkiran,
                                    t.jmlh_lain AS jmlh_lain,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        p.flag_ppn 
                                        WHEN dd.po_detail_id = 0 
                                        AND d.so_id > 0 THEN
                                            so.flag_ppn ELSE '-' 
                                            END AS flag_ppn 
                                    FROM
                                        ttr_detail td
                                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                                    WHERE
                                        ( t.ttr_status != 0 ) AND (d.type = 0)
                                    AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                                    AND t.tanggal BETWEEN '".$s."' and '".$e."' 
                                    ORDER BY sumber, kode_rongsok, no_ttr, tgl_ttr
                ");
        }elseif ($ppn == 2) {
            $data = $this->db->query("
                    SELECT
                        t.tanggal AS tgl_ttr,
                        t.no_ttr AS no_ttr,
                    CASE
                            
                            WHEN dd.po_detail_id > 0 THEN
                            'PO' 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                'Tolling' ELSE 'Lain2' 
                                END AS sumber,
                        CASE
                                
                                WHEN dd.po_detail_id > 0 THEN
                                p.no_po 
                                WHEN dd.po_detail_id = 0 
                                AND d.so_id > 0 THEN
                                    so.no_sales_order ELSE '-' 
                                    END AS no_doc_sumber,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    p.tanggal ELSE so.tanggal 
                                END AS tgl_doc,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    s.kode_supplier 
                                    WHEN dd.po_detail_id = 0 
                                    AND d.so_id > 0 THEN
                                        mc.kode_customer ELSE '-' 
                                        END AS kode_sup_cust,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        s.nama_supplier 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                        mc.nama_customer_kh 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                        mc.nama_customer ELSE '-' 
                                    END AS nama_sup_cust,
                                    r.kode_rongsok AS kode_rongsok,
                                    r.nama_item AS nama_item,
                                    td.bruto AS bruto,
                                    td.netto AS netto,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        pd.amount ELSE 0 
                                    END AS amount,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        ( td.netto * pd.amount ) ELSE 0 
                                    END AS total_amount,
                                    t.jmlh_afkiran AS jmlh_afkiran,
                                    t.jmlh_lain AS jmlh_lain,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        p.flag_ppn 
                                        WHEN dd.po_detail_id = 0 
                                        AND d.so_id > 0 THEN
                                            so.flag_ppn ELSE '-' 
                                            END AS flag_ppn 
                                    FROM
                                        ttr_detail td
                                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                                    WHERE
                                        ( t.ttr_status != 0 ) 
                                    AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                                    AND t.tanggal BETWEEN '".$s."' and '".$e."' 
                                    ORDER BY sumber, kode_rongsok, no_ttr, tgl_ttr
                ");
        } elseif($ppn == 0){
            $data = $this->db->query("SELECT
                        t.tanggal AS tgl_ttr,
                        t.no_ttr AS no_ttr,
                    CASE
                            
                            WHEN dd.po_detail_id > 0 THEN
                            'PO' 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                'Tolling' ELSE 'Lain2' 
                                END AS sumber,
                        CASE
                                
                                WHEN dd.po_detail_id > 0 THEN
                                p.no_po 
                                WHEN dd.po_detail_id = 0 
                                AND d.so_id > 0 THEN
                                    so.no_sales_order ELSE '-' 
                                    END AS no_doc_sumber,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    p.tanggal ELSE so.tanggal 
                                END AS tgl_doc,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    s.kode_supplier 
                                    WHEN dd.po_detail_id = 0 
                                    AND d.so_id > 0 THEN
                                        mc.kode_customer ELSE '-' 
                                        END AS kode_sup_cust,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        s.nama_supplier 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                        mc.nama_customer_kh 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                        mc.nama_customer ELSE '-' 
                                    END AS nama_sup_cust,
                                    r.kode_rongsok AS kode_rongsok,
                                    r.nama_item AS nama_item,
                                    td.bruto AS bruto,
                                    td.netto AS netto,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        pd.amount ELSE 0 
                                    END AS amount,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        ( td.netto * pd.amount ) ELSE 0 
                                    END AS total_amount,
                                    t.jmlh_afkiran AS jmlh_afkiran,
                                    t.jmlh_lain AS jmlh_lain,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        p.flag_ppn 
                                        WHEN dd.po_detail_id = 0 
                                        AND d.so_id > 0 THEN
                                            so.flag_ppn ELSE '-' 
                                            END AS flag_ppn 
                                    FROM
                                        ttr_detail td
                                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                                    WHERE
                                        ( t.ttr_status != 0 ) 
                                    AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                                    AND (p.flag_ppn = ".$ppn." OR so.flag_ppn = ".$ppn.") ORDER BY sumber, kode_rongsok, no_ttr, tgl_ttr");
        }else{
            $data = $this->db->query("
                    (SELECT
                        t.tanggal AS tgl_ttr,
                        t.no_ttr AS no_ttr,
                    CASE
                            
                            WHEN dd.po_detail_id > 0 THEN
                            'PO' 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                'Tolling' ELSE 'Lain2' 
                                END AS sumber,
                        CASE
                                
                                WHEN dd.po_detail_id > 0 THEN
                                p.no_po 
                                WHEN dd.po_detail_id = 0 
                                AND d.so_id > 0 THEN
                                    so.no_sales_order ELSE '-' 
                                    END AS no_doc_sumber,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    p.tanggal ELSE so.tanggal 
                                END AS tgl_doc,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    s.kode_supplier 
                                    WHEN dd.po_detail_id = 0 
                                    AND d.so_id > 0 THEN
                                        mc.kode_customer ELSE '-' 
                                        END AS kode_sup_cust,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        s.nama_supplier 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                        mc.nama_customer_kh 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                        mc.nama_customer ELSE '-' 
                                    END AS nama_sup_cust,
                                    r.kode_rongsok AS kode_rongsok,
                                    r.nama_item AS nama_item,
                                    td.bruto AS bruto,
                                    td.netto AS netto,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        pd.amount ELSE 0 
                                    END AS amount,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        ( td.netto * pd.amount ) ELSE 0 
                                    END AS total_amount,
                                    t.jmlh_afkiran AS jmlh_afkiran,
                                    t.jmlh_lain AS jmlh_lain,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        p.flag_ppn 
                                        WHEN dd.po_detail_id = 0 
                                        AND d.so_id > 0 THEN
                                            so.flag_ppn ELSE '-' 
                                            END AS flag_ppn 
                                    FROM
                                        ttr_detail td
                                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                                    WHERE
                                        ( t.ttr_status != 0 ) 
                                    AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                                    AND (p.flag_ppn = ".$ppn." OR so.flag_ppn = ".$ppn.")) 
                    UNION ALL
                    (Select rt.tanggal as tgl_ttr, rt.no_ttr_resmi as no_ttr, 'Tolling' as sumber, rts.no_so as no_doc_sumber, rts.tanggal as tgl_doc, mc.kode_customer as kode_sup_cust, mc.nama_customer as nama_sup_cust, r.kode_rongsok, r.nama_item, rtd.bruto, rtd.netto, 0 as amount, 0 as total_amount, 0 as jmlh_afkiran, 0 as jmlh_lain, 1 as flag_ppn from r_ttr_detail rtd
                    left join r_ttr rt on rtd.r_ttr_id = rt.id
                    left join r_dtr rd on rt.r_dtr_id = rd.id
                    left join r_t_surat_jalan rtsj on rd.sj_id = rtsj.id
                    left join r_t_so rts on rtsj.r_po_id = rts.po_id
                    left join m_cv cv on rt.customer_id = cv.id
                    left join m_customers mc on cv.idkmp = mc.id
                    left join rongsok r on rtd.rongsok_id = r.id
                    where rt.tanggal BETWEEN '".$s."' and '".$e."')
                                    ORDER BY sumber, kode_rongsok, no_ttr, tgl_ttr
                ");
        }
        return $data;
    }

    function print_laporan_pembelian2($s,$e,$j,$ppn){
        if($j == 2){
            $data = $this->db->query("
                    SELECT
                        t.tanggal AS tgl_ttr,
                        t.no_ttr AS no_ttr,
                    CASE
                            
                            WHEN dd.po_detail_id > 0 THEN
                            'PO' 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                'Tolling' ELSE 'Lain2' 
                                END AS sumber,
                        CASE
                                
                                WHEN dd.po_detail_id > 0 THEN
                                p.no_po 
                                WHEN dd.po_detail_id = 0 
                                AND d.so_id > 0 THEN
                                    so.no_sales_order ELSE '-' 
                                    END AS no_doc_sumber,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    p.tanggal ELSE so.tanggal 
                                END AS tgl_doc,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    s.kode_supplier 
                                    WHEN dd.po_detail_id = 0 
                                    AND d.so_id > 0 THEN
                                        mc.kode_customer ELSE '-' 
                                        END AS kode_sup_cust,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        s.nama_supplier 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                        mc.nama_customer_kh 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                        mc.nama_customer ELSE '-' 
                                    END AS nama_sup_cust,
                                    r.kode_rongsok AS kode_rongsok,
                                    r.nama_item AS nama_item,
                                    td.bruto AS bruto,
                                    td.netto AS netto,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        pd.amount ELSE 0 
                                    END AS amount,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        ( td.netto * pd.amount ) ELSE 0 
                                    END AS total_amount,
                                    t.jmlh_afkiran AS jmlh_afkiran,
                                    t.jmlh_lain AS jmlh_lain,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        p.flag_ppn 
                                        WHEN dd.po_detail_id = 0 
                                        AND d.so_id > 0 THEN
                                            so.flag_ppn ELSE '-' 
                                            END AS flag_ppn 
                                    FROM
                                        ttr_detail td
                                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                                    WHERE
                                        ( t.ttr_status != 0 ) 
                                    AND ( dd.po_detail_id > 0 AND d.so_id = 0 ) 
                                    AND t.tanggal BETWEEN '".$s."' and '".$e."' 
                                    AND ( p.flag_ppn = ".$ppn." OR so.flag_ppn = ".$ppn.") 
                                    ORDER BY sumber, kode_rongsok, no_ttr, tgl_ttr");
        }else{
        $data = $this->db->query("
                    (SELECT
                        t.tanggal AS tgl_ttr,
                        t.no_ttr AS no_ttr,
                    CASE
                            
                            WHEN dd.po_detail_id > 0 THEN
                            'PO' 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                'Tolling' ELSE 'Lain2' 
                                END AS sumber,
                        CASE
                                
                                WHEN dd.po_detail_id > 0 THEN
                                p.no_po 
                                WHEN dd.po_detail_id = 0 
                                AND d.so_id > 0 THEN
                                    so.no_sales_order ELSE '-' 
                                    END AS no_doc_sumber,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    p.tanggal ELSE so.tanggal 
                                END AS tgl_doc,
                            CASE
                                    
                                    WHEN dd.po_detail_id > 0 THEN
                                    s.kode_supplier 
                                    WHEN dd.po_detail_id = 0 
                                    AND d.so_id > 0 THEN
                                        mc.kode_customer ELSE '-' 
                                        END AS kode_sup_cust,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        s.nama_supplier 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                        mc.nama_customer_kh 
                                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                        mc.nama_customer ELSE '-' 
                                    END AS nama_sup_cust,
                                    r.kode_rongsok AS kode_rongsok,
                                    r.nama_item AS nama_item,
                                    td.bruto AS bruto,
                                    td.netto AS netto,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        pd.amount ELSE 0 
                                    END AS amount,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        ( td.netto * pd.amount ) ELSE 0 
                                    END AS total_amount,
                                    t.jmlh_afkiran AS jmlh_afkiran,
                                    t.jmlh_lain AS jmlh_lain,
                                CASE
                                        
                                        WHEN dd.po_detail_id > 0 THEN
                                        p.flag_ppn 
                                        WHEN dd.po_detail_id = 0 
                                        AND d.so_id > 0 THEN
                                            so.flag_ppn ELSE '-' 
                                            END AS flag_ppn 
                                    FROM
                                        ttr_detail td
                                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                                    WHERE
                                        ( t.ttr_status != 0 ) 
                                    AND ( dd.po_detail_id = 0 AND d.so_id > 0 )
                                    AND ( so.flag_ppn = 1)
                                    AND t.tanggal BETWEEN '".$s."' and '".$e."' )
                        UNION ALL
                    (Select rt.tanggal as tgl_ttr, rt.no_ttr_resmi as no_ttr, 'Tolling' as sumber, rts.no_so as no_doc_sumber, rts.tanggal as tgl_doc, mc.kode_customer as kode_sup_cust, mc.nama_customer as nama_sup_cust, r.kode_rongsok, r.nama_item, rtd.bruto, rtd.netto, 0 as amount, 0 as total_amount, 0 as jmlh_afkiran, 0 as jmlh_lain, 1 as flag_ppn from r_ttr_detail rtd
                    left join r_ttr rt on rtd.r_ttr_id = rt.id
                    left join r_dtr rd on rt.r_dtr_id = rd.id
                    left join r_t_surat_jalan rtsj on rd.sj_id = rtsj.id
                    left join r_t_so rts on rtsj.r_po_id = rts.po_id
                    left join m_cv cv on rt.customer_id = cv.id
                    left join m_customers mc on cv.idkmp = mc.id
                    left join rongsok r on rtd.rongsok_id = r.id
                    where rt.tanggal BETWEEN '".$s."' and '".$e."')
                                    ORDER BY sumber, kode_rongsok, no_ttr, tgl_ttr");
        }
        return $data;
    }

    function laporan_pembelian_ingot_rendah($s, $e, $ppn){
        if ($ppn == 2) {
                $data = $this->db->query("
                    SELECT dd.rongsok_id,r.kode_rongsok, r.nama_item, t.no_ttr, t.tanggal, '-' as supplier, '-' as sumber 
                    ,dd.netto, 0 amount, 0 total_amount
                    from 
                    dtr_detail dd
                    left join dtr d on d.id = dd.dtr_id
                    left join ttr t on t.dtr_id = d.id 
                    left join rongsok r on r.id = dd.rongsok_id
                    where
                    r.kode_rongsok =  '02I0001'
                    and t.ttr_status != 0
                    AND t.tanggal BETWEEN '".$s."' and '".$e."'");
            }else{
                $data = $this->db->query("
                    SELECT dd.rongsok_id,r.kode_rongsok, r.nama_item, t.no_ttr, t.tanggal, '-' as supplier, '-' as sumber 
                    ,dd.netto, 0 amount, 0 total_amount
                    from 
                    dtr_detail dd
                    left join dtr d on d.id = dd.dtr_id
                    left join ttr t on t.dtr_id = d.id 
                    left join rongsok r on r.id = dd.rongsok_id
                    where
                    r.kode_rongsok =  '02I0001'
                    and t.ttr_status != 0
                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                    AND d.flag_ppn = ".$ppn);
            }
            return $data;
    }

    function laporan_pembelian_rsk($s, $e, $ppn){
        if ($ppn == 3) {
            $data = $this->db->query("SELECT
            CASE
                WHEN
                    dd.po_detail_id > 0 THEN
                        s.nama_supplier 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                        mc.nama_customer_kh 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                        mc.nama_customer ELSE '-' 
                    END AS nama_sup_cust,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then td.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then td.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then td.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then td.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then td.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then td.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then td.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then td.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then td.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then td.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then td.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then td.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then td.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then td.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then td.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then td.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then td.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then td.netto  else 0 end),0),null) as SCJ,
                    sum( td.netto ) AS total
                FROM
                    ttr_detail td
                    LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                    LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                    LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                    LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                    LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                    LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                    LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                    LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                    LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                WHERE
                    ( t.ttr_status != 0 ) AND ( d.type = 0)
                    AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                GROUP BY
                nama_sup_cust
                    order by total desc");
        }elseif ($ppn == 2) {
            $data = $this->db->query("SELECT
            CASE
                WHEN
                    dd.po_detail_id > 0 THEN
                        s.nama_supplier 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                        mc.nama_customer_kh 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                        mc.nama_customer ELSE '-' 
                    END AS nama_sup_cust,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then td.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then td.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then td.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then td.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then td.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then td.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then td.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then td.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then td.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then td.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then td.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then td.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then td.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then td.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then td.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then td.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then td.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then td.netto  else 0 end),0),null) as SCJ,
                    sum( td.netto ) AS total
                FROM
                    ttr_detail td
                    LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                    LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                    LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                    LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                    LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                    LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                    LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                    LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                    LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                WHERE
                    ( t.ttr_status != 0 ) 
                    AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                GROUP BY
                nama_sup_cust
                    order by total desc");
        }else{
        $data = $this->db->query("SELECT
            CASE
                WHEN
                    dd.po_detail_id > 0 THEN
                        s.nama_supplier 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                        mc.nama_customer_kh 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                        mc.nama_customer ELSE '-' 
                    END AS nama_sup_cust,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then td.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then td.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then td.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then td.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then td.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then td.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then td.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then td.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then td.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then td.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then td.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then td.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then td.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then td.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then td.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then td.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then td.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then td.netto  else 0 end),0),null) as SCJ,
                    sum( td.netto ) AS total
                FROM
                    ttr_detail td
                    LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                    LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                    LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                    LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                    LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                    LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                    LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                    LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                    LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                WHERE
                    ( t.ttr_status != 0 ) 
                    AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                    AND (p.flag_ppn = ".$ppn." OR so.flag_ppn = ".$ppn.") 
                GROUP BY
                nama_sup_cust
                    order by total desc");
        }
        return $data;
    }

    function laporan_pembelian_rsk2($s, $e, $j, $ppn){
        if($j == 3){//TOLLING
            $data = $this->db->query("(SELECT
            CASE
                WHEN
                    dd.po_detail_id > 0 THEN
                        s.nama_supplier 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                        mc.nama_customer_kh 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                        mc.nama_customer ELSE '-' 
                    END AS nama_sup_cust,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then td.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then td.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then td.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then td.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then td.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then td.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then td.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then td.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then td.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then td.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then td.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then td.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then td.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then td.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then td.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then td.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then td.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then td.netto  else 0 end),0),null) as SCJ,
                    sum( td.netto ) AS total
                FROM
                    ttr_detail td
                    LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                    LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                    LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                    LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                    LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                    LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                    LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                    LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                    LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                WHERE
                    ( t.ttr_status != 0 ) 
                    AND ( dd.po_detail_id = 0 AND d.so_id > 0 )
                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                    AND (p.flag_ppn = ".$ppn." OR so.flag_ppn = ".$ppn.") 
                UNION ALL
                    (Select mc.nama_customer as nama_sup_cust, 
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then rtd.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then rtd.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then rtd.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then rtd.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then rtd.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then rtd.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then rtd.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then rtd.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then rtd.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then rtd.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then rtd.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then rtd.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then rtd.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then rtd.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then rtd.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then rtd.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then rtd.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then rtd.netto  else 0 end),0),null) as SCJ,
                    sum( rtd.netto ) AS total
                    from r_ttr_detail rtd
                    left join r_ttr rt on rtd.r_ttr_id = rt.id
                    left join r_dtr rd on rt.r_dtr_id = rd.id
                    left join r_t_surat_jalan rtsj on rd.sj_id = rtsj.id
                    left join r_t_so rts on rtsj.r_po_id = rts.po_id
                    left join m_cv cv on rt.customer_id = cv.id
                    left join m_customers mc on cv.idkmp = mc.id
                    left join rongsok r on rtd.rongsok_id = r.id
                    where rt.tanggal BETWEEN '".$s."' and '".$e."')
                GROUP BY
                nama_sup_cust
                    order by total desc");
        }else{//PEMBELIAN
            $data = $this->db->query("SELECT
            CASE
                WHEN
                    dd.po_detail_id > 0 THEN
                        s.nama_supplier 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                        mc.nama_customer_kh 
                        WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                        mc.nama_customer ELSE '-' 
                    END AS nama_sup_cust,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then td.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then td.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then td.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then td.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then td.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then td.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then td.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then td.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then td.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then td.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then td.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then td.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then td.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then td.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then td.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then td.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then td.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then td.netto  else 0 end),0),null) as SCJ,
                    sum( td.netto ) AS total
                FROM
                    ttr_detail td
                    LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                    LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                    LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                    LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                    LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                    LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                    LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                    LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                    LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                WHERE
                    ( t.ttr_status != 0 ) 
                    AND ( dd.po_detail_id > 0 AND d.so_id = 0 ) 
                    AND t.tanggal BETWEEN '".$s."' and '".$e."'
                    AND (p.flag_ppn = ".$ppn." OR so.flag_ppn = ".$ppn.") 
                GROUP BY
                nama_sup_cust
                    order by total desc");
        }
        return $data;
    }

    function laporan_pembelian_rsk_ingot_rendah($s, $e, $ppn){
        if ($ppn == 2) {
            $data = $this->db->query("
                SELECT
                    r.nama_item as supplier,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then td.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then td.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then td.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then td.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then td.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then td.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then td.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then td.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then td.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then td.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then td.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then td.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then td.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then td.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then td.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then td.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then td.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then td.netto  else 0 end),0),null) as SCJ,
                    sum( td.netto ) AS TOTAL
                    from 
            dtr_detail dd
            left join dtr d on d.id = dd.dtr_id
            left join rongsok r on r.id = dd.rongsok_id
            left join ttr t on t.dtr_id = d.id
            left join ttr_detail td on td.dtr_detail_id = dd.id
            where  
            t.ttr_status != 0
              AND t.tanggal BETWEEN '".$s."' and '".$e."'
             and r.kode_rongsok =  '02I0001'
            group by supplier;");
        }else{
        $data = $this->db->query("
            SELECT
                    r.nama_item as supplier,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0001' then td.netto  else 0 end),0),null) as AB1,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01A0002' then td.netto  else 0 end),0),null) as AB2,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01AR001' then td.netto  else 0 end),0),null) as AR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0002' then td.netto  else 0 end),0),null) as TR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BB001' then td.netto  else 0 end),0),null) as BB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0001' then td.netto  else 0 end),0),null) as BC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01B0003' then td.netto  else 0 end),0),null) as CT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01BL001' then td.netto  else 0 end),0),null) as BL,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0003' then td.netto  else 0 end),0),null) as DH,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PB001' then td.netto  else 0 end),0),null) as PB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01PR001' then td.netto  else 0 end),0),null) as PRT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01DD001' then td.netto  else 0 end),0),null) as DD,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0002' then td.netto  else 0 end),0),null) as DB,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01D0004' then td.netto  else 0 end),0),null) as DK,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '02I0001' then td.netto  else 0 end),0),null) as IR,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '01LP001' then td.netto  else 0 end),0),null) as LT,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0001' then td.netto  else 0 end),0),null) as SC,
                    COALESCE(NULLIF(sum(case when r.kode_rongsok = '03S0003' then td.netto  else 0 end),0),null) as SCJ,
                    sum( td.netto ) AS TOTAL
                    from 
            dtr_detail dd
            left join dtr d on d.id = dd.dtr_id
            left join rongsok r on r.id = dd.rongsok_id
            left join ttr t on t.dtr_id = d.id
            left join ttr_detail td on td.dtr_detail_id = dd.id
            where  
            t.ttr_status != 0
              AND t.tanggal BETWEEN '".$s."' and '".$e."'
             and r.kode_rongsok =  '02I0001'
            AND d.flag_ppn = ".$ppn." 
            group by supplier;");
        }
        return $data;
    }

    function rangking_pemasukan_rongsok($s, $e, $ppn){
        if ($ppn == 2) {
            $data = $this->db->query("
                SELECT MONTH
                    ( t.tanggal ) AS bulan,
                CASE
                        WHEN dd.po_detail_id > 0 THEN
                        'PO' 
                        WHEN dd.po_detail_id = 0 
                        AND d.so_id > 0 THEN
                            'Tolling' ELSE 'Lain2' 
                            END AS sumber,
                    CASE    
                            WHEN dd.po_detail_id > 0 THEN
                            s.kode_supplier 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                mc.kode_customer ELSE '-' 
                                END AS kode_sup_cust,
                        CASE        
                                WHEN dd.po_detail_id > 0 THEN
                                s.nama_supplier 
                                WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                mc.nama_customer_kh 
                                WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                mc.nama_customer ELSE '-' 
                            END AS nama_sup_cust,
                            sum( td.netto ) AS netto,
                            sum( CASE WHEN dd.po_detail_id > 0 THEN ( td.netto * pd.amount ) ELSE 0 END ) AS total_amount,
                            round(sum( CASE WHEN dd.po_detail_id > 0 THEN ( td.netto * pd.amount ) ELSE 0 END ) / sum( td.netto ),2) AS rata2
                        FROM
                            ttr_detail td
                            LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                            LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                            LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                            LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                            LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                            LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                            LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                            LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                            LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                        WHERE
                            ( t.ttr_status != 0 ) AND ( d.type = 0)
                            AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                            AND t.tanggal BETWEEN '".$s."' AND '".$e."' 
                        GROUP BY
                            bulan,
                        sumber,
                    kode_sup_cust
                    ORDER BY sumber, netto DESC;
                ");
        } else if ($ppn==3) {
            $data = $this->db->query("
                Select * From (
(
SELECT MONTH
                    ( t.tanggal ) AS bulan,
                CASE
                        WHEN dd.po_detail_id > 0 THEN
                        'PO' 
                        WHEN dd.po_detail_id = 0 
                        AND d.so_id > 0 THEN
                            'Tolling' ELSE 'Lain2' 
                            END AS sumber,
                    CASE    
                            WHEN dd.po_detail_id > 0 THEN
                            s.kode_supplier 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                mc.kode_customer ELSE '-' 
                                END AS kode_sup_cust,
                        CASE        
                                WHEN dd.po_detail_id > 0 THEN
                                s.nama_supplier 
                                WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                mc.nama_customer_kh 
                                WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                mc.nama_customer ELSE '-' 
                            END AS nama_sup_cust,
                            sum( td.netto ) AS netto,
                            sum( CASE WHEN dd.po_detail_id > 0 THEN ( td.netto * pd.amount ) ELSE 0 END ) AS total_amount,
                            round(sum( CASE WHEN dd.po_detail_id > 0 THEN ( td.netto * pd.amount ) ELSE 0 END ) / sum( td.netto ),2) AS rata2
                        FROM
                            ttr_detail td
                            LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                            LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                            LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                            LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                            LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                            LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                            LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                            LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                            LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                        WHERE
                            ( t.ttr_status != 0 ) 
                            AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                            AND t.tanggal BETWEEN '".$s."' AND '".$e."'
                            AND (so.flag_ppn = 1 OR p.flag_ppn = 1)
                        GROUP BY
                            bulan,
                        sumber,
                    kode_sup_cust)
                    UNION ALL 
                    (SELECT MONTH ( rt.tanggal ) AS bulan, 'Tolling' as sumber, mc2.kode_customer as kode_sup_cust, mc2.nama_customer as nama_sup_cust, sum(rtd.netto), 0 as total_amount, 0 as rata2 from
                                                r_ttr_detail rtd
                                                LEFT JOIN r_dtr_detail rdd ON ( rdd.id = rtd.r_dtr_detail_id )
                                                LEFT JOIN r_dtr rd ON ( rd.id = rdd.r_dtr_id )
                                                LEFT JOIN r_ttr rt ON ( rt.id = rtd.r_ttr_id )
                                                                            LEFT JOIN r_t_surat_jalan rts ON (rts.id = rd.sj_id)
                                                LEFT JOIN r_t_so rso ON ( rts.r_po_id = rso.po_id)
                                                LEFT JOIN rongsok r ON ( r.id = rtd.rongsok_id )
                                                LEFT JOIN m_cv cv ON ( cv.id = rso.cv_id )
                                                LEFT JOIN m_customers mc2 ON ( mc2.id = cv.idkmp)
                                                WHERE rt.tanggal BETWEEN '".$s."' AND '".$e."'
                                                GROUP BY
                                                bulan,
                                            sumber,
                                        kode_sup_cust
                    )
                    ) as i
                                        ORDER BY sumber, netto DESC;");
        }else{
            $data = $this->db->query("
                SELECT MONTH
                    ( t.tanggal ) AS bulan,
                CASE
                        WHEN dd.po_detail_id > 0 THEN
                        'PO' 
                        WHEN dd.po_detail_id = 0 
                        AND d.so_id > 0 THEN
                            'Tolling' ELSE 'Lain2' 
                            END AS sumber,
                    CASE    
                            WHEN dd.po_detail_id > 0 THEN
                            s.kode_supplier 
                            WHEN dd.po_detail_id = 0 
                            AND d.so_id > 0 THEN
                                mc.kode_customer ELSE '-' 
                                END AS kode_sup_cust,
                        CASE        
                                WHEN dd.po_detail_id > 0 THEN
                                s.nama_supplier 
                                WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                                mc.nama_customer_kh 
                                WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                                mc.nama_customer ELSE '-' 
                            END AS nama_sup_cust,
                            sum( td.netto ) AS netto,
                            sum( CASE WHEN dd.po_detail_id > 0 THEN ( td.netto * pd.amount ) ELSE 0 END ) AS total_amount,
                            round(sum( CASE WHEN dd.po_detail_id > 0 THEN ( td.netto * pd.amount ) ELSE 0 END ) / sum( td.netto ),2) AS rata2
                        FROM
                            ttr_detail td
                            LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                            LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                            LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                            LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                            LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                            LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                            LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                            LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                            LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                        WHERE
                            ( t.ttr_status != 0 ) 
                            AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                            AND t.tanggal BETWEEN '".$s."' AND '".$e."'
                            AND (so.flag_ppn = ".$ppn." OR p.flag_ppn = ".$ppn.")
                        GROUP BY
                            bulan,
                        sumber,
                    kode_sup_cust
                    ORDER BY sumber, netto DESC;
                ");
        }

        return $data;
    }

    function rangking_pemasukan_ingot_rendah($s, $e, $ppn){
        if ($ppn == 2) {
            $data = $this->db->query("
                SELECT ' - ' as sumber, r.nama_item as supplier, d.flag_ppn, sum(dd.netto) netto, 0 total, 0 rata2
                from 
                dtr_detail dd
                left join dtr d on d.id = dd.dtr_id
                left join ttr t on t.dtr_id = d.id
                left join rongsok r on r.id = dd.rongsok_id
                where  d.tanggal BETWEEN '".$s."' AND '".$e."'
                and t.ttr_status != 0
                and r.kode_rongsok =  '02I0001'
                group by sumber, supplier, flag_ppn
                ");
        } else {
            $data = $this->db->query("
                SELECT ' - ' as sumber, r.nama_item as supplier, d.flag_ppn, sum(dd.netto) netto, 0 total, 0 rata2
                from 
                dtr_detail dd
                left join dtr d on d.id = dd.dtr_id
                left join ttr t on t.dtr_id = d.id
                left join rongsok r on r.id = dd.rongsok_id
                where  d.tanggal BETWEEN '".$s."' AND '".$e."'
                and t.ttr_status != 0
                and d.flag_ppn = ".$ppn."
                and r.kode_rongsok =  '02I0001'
                group by sumber, supplier, flag_ppn
                ");
        }

        return $data;
    }

    function header_daftar_pembelian_rongsok($s, $e, $ppn) {
        if ($ppn == 2) {
            $data = $this->db->query("
                SELECT DISTINCT
                CASE
                    WHEN
                        dd.po_detail_id > 0 THEN
                            s.nama_supplier 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                            mc.nama_customer_kh 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                            mc.nama_customer ELSE '-' 
                        END AS nama_sup_cust,
                        r.kode_rongsok AS kode_rongsok,
                        sum( td.netto ) AS netto 
                    FROM
                        ttr_detail td
                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                    WHERE
                        ( t.ttr_status != 0 ) 
                        AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                        AND t.tanggal BETWEEN '".$s."' AND '".$e."'
                    GROUP BY
                    kode_rongsok
                    ORDER BY kode_rongsok;
            ");
        } else {
            $data = $this->db->query("
                SELECT DISTINCT
                CASE
                    WHEN
                        dd.po_detail_id > 0 THEN
                            s.nama_supplier 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                            mc.nama_customer_kh 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                            mc.nama_customer ELSE '-' 
                        END AS nama_sup_cust,
                        r.kode_rongsok AS kode_rongsok,
                        sum( td.netto ) AS netto 
                    FROM
                        ttr_detail td
                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                    WHERE
                        ( t.ttr_status != 0 ) 
                        AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                        AND t.tanggal BETWEEN '".$s."' AND '".$e."'
                        AND (so.flag_ppn = ".$ppn." OR p.flag_ppn = ".$ppn.")
                    GROUP BY
                    kode_rongsok
                    ORDER BY kode_rongsok;
            ");
        }

        return $data;
    }

    function detail_daftar_pembelian_rongsok($s, $e, $ppn){
        if ($ppn == 2) {
            $data = $this->db->query("
                SELECT
                CASE
                    WHEN
                        dd.po_detail_id > 0 THEN
                            s.nama_supplier 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                            mc.nama_customer_kh 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                            mc.nama_customer ELSE '-' 
                        END AS nama_sup_cust,
                        r.kode_rongsok AS kode_rongsok,
                        sum( td.netto ) AS netto 
                    FROM
                        ttr_detail td
                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                    WHERE
                        ( t.ttr_status != 0 ) 
                        AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                        AND t.tanggal BETWEEN '".$s."' AND '".$e."' 
                    GROUP BY
                    nama_sup_cust,
                    kode_rongsok;
                ");
        } else {
            $data = $this->db->query("
                SELECT
                CASE
                    WHEN
                        dd.po_detail_id > 0 THEN
                            s.nama_supplier 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 0 AND d.so_id > 0 ) THEN
                            mc.nama_customer_kh 
                            WHEN ( dd.po_detail_id = 0 AND so.flag_ppn = 1 AND d.so_id > 0 ) THEN
                            mc.nama_customer ELSE '-' 
                        END AS nama_sup_cust,
                        r.kode_rongsok AS kode_rongsok,
                        sum( td.netto ) AS netto 
                    FROM
                        ttr_detail td
                        LEFT JOIN dtr_detail dd ON ( dd.id = td.dtr_detail_id )
                        LEFT JOIN dtr d ON ( d.id = dd.dtr_id )
                        LEFT JOIN ttr t ON ( t.id = td.ttr_id )
                        LEFT JOIN po_detail pd ON ( ( dd.po_detail_id > 0 ) AND ( pd.id = dd.po_detail_id ) )
                        LEFT JOIN po p ON ( ( p.id = pd.po_id ) AND ( dd.po_detail_id > 0 ) )
                        LEFT JOIN sales_order so ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND so.id = d.so_id )
                        LEFT JOIN rongsok r ON ( r.id = td.rongsok_id )
                        LEFT JOIN supplier s ON ( dd.po_detail_id > 0 AND ( s.id = p.supplier_id ) )
                        LEFT JOIN m_customers mc ON ( dd.po_detail_id = 0 AND d.so_id > 0 AND mc.id = d.customer_id ) 
                    WHERE
                        ( t.ttr_status != 0 ) 
                        AND ( dd.po_detail_id > 0 OR ( dd.po_detail_id = 0 AND d.so_id > 0 ) ) 
                        AND t.tanggal BETWEEN '".$s."' AND '".$e."'
                        AND (so.flag_ppn = ".$ppn." OR p.flag_ppn = ".$ppn.") 
                    GROUP BY
                    nama_sup_cust,
                    kode_rongsok;
                ");
        }

        return $data;
    }

    // function detail_daftar_bahan_pembantu($tgl1, $tgl2) {
    //     $data = $this->db->query("
    //         select
    //         x.sparepart_id,x.bulan, x.alias kode, x.nama_item, sum(x.saldo_qty) saldo_qty, round(sum(x.saldo_amount),2) saldo_amount,
    //         sum(x.qty_masuk) qty_masuk, round(sum(x.amount_masuk),2) amount_masuk, sum(x.qty_keluar) qty_keluar,
    //         round((sum(x.saldo_amount)+sum(x.amount_masuk)) /(sum(x.saldo_qty)+ sum(x.qty_masuk)),2) rata2,
    //          round(sum(x.qty_keluar)* ((sum(x.saldo_amount)+sum(x.amount_masuk)) /(sum(x.saldo_qty)+ sum(x.qty_masuk))),2)  amount_keluar,
    //          (sum(x.saldo_qty)+sum(x.qty_masuk)-sum(x.qty_keluar)) qty_sisa,
    //          (round(sum(x.saldo_amount),2) +  round(sum(x.amount_masuk),2)-
    //           round(sum(x.qty_keluar)* ((sum(x.saldo_amount)+sum(x.amount_masuk)) /(sum(x.saldo_qty)+ sum(x.qty_masuk))),2))  amount_sisa,
    //          x.uom
    //         from
    //         (
    //         select t.sparepart_id,
    //         EXTRACT( YEAR_MONTH FROM ( t.tanggal ) ) bulan, s.alias, s.nama_item, 0 saldo_qty, 0 saldo_amount,
    //         case when t.jenis_trx=0 then t.qty else 0 end  qty_masuk, 
    //         case when t.jenis_trx=0 then 
    //         case when ISNULL(ka.kurs) then t.qty*t.amount else t.qty*pd.amount*ka.kurs end 
    //         else 0 end amount_masuk
    //         , case when t.jenis_trx=1 then t.qty else 0 end  qty_keluar, 
    //         case when t.jenis_trx=1 then t.qty*t.amount else 0 end amount_keluar, s.uom
    //         from 
    //         t_gudang_sp t
    //         left join sparepart s on s.id = t.sparepart_id
    //         left join lpb_detail ld on (ld.id = t.lpb_detail_id and t.jenis_trx=0)
    //         left join po_detail pd on pd.id = ld.po_detail_id
    //         left join po p on p.id = pd.po_id
    //         left join m_kurs_akhir ka on ka.bulan = '".$tgl1."' and ka.currency = p.currency
    //         where s.sparepart_group in (6,7)
    //         and EXTRACT( YEAR_MONTH FROM ( t.tanggal ) ) = '".$tgl1."'
    //         union all
    //         select  t2.sparepart_id, case when right(t2.bulan,2)=12 then t2.bulan+101 else t2.bulan+1 end , s2.alias, s2.nama_item, t2.qty saldo_qty, t2.total_amount saldo_amount, 0 qty_masuk, 0 amount_masuk, 0 qty_keluar, 0 amount_keluar, s2.uom  
    //         from t_sparepart_saldo t2
    //         left join sparepart s2 on s2.id = t2.sparepart_id
    //         where t2.bulan='".$tgl2."'
    //         )
    //         x
    //         where x.alias  not in ('06KB002')
    //         group by bulan, kode, nama_item
    //         order by 3
    //         ");
    //     return $data;
    // }

    function detail_daftar_bahan_pembantu($tgl1, $tgl2) {
        $data = $this->db->query("select
        x.sparepart_id,x.bulan, x.alias kode, x.nama_item, sum(x.saldo_qty) saldo_qty, round(sum(x.saldo_amount),2) saldo_amount,
        sum(x.qty_masuk) qty_masuk, 
                round(sum(x.amount_masuk),2) amount_masuk,
                sum(x.qty_keluar) qty_keluar,
        round((sum(x.saldo_amount)+sum(x.amount_masuk)) /(sum(x.saldo_qty)+ sum(x.qty_masuk)),2) rata2,
         round(sum(x.qty_keluar)* ((sum(x.saldo_amount)+sum(x.amount_masuk)) /(sum(x.saldo_qty)+ sum(x.qty_masuk))),2)  amount_keluar,
         (sum(x.saldo_qty)+sum(x.qty_masuk)-sum(x.qty_keluar)) qty_sisa,
         (round(sum(x.saldo_amount),2) +  round(sum(x.amount_masuk),2)-
          round(sum(x.qty_keluar)* ((sum(x.saldo_amount)+sum(x.amount_masuk)) /(sum(x.saldo_qty)+ sum(x.qty_masuk))),2))  amount_sisa,
         x.uom
        from
        (
        select t.sparepart_id,
        EXTRACT( YEAR_MONTH FROM ( t.tanggal ) ) bulan, s.alias, s.nama_item, 0 saldo_qty, 0 saldo_amount,
        case when t.jenis_trx=0 then t.qty else 0 end  qty_masuk, 
        case when t.jenis_trx=0 then 
        case when ISNULL(ka.kurs) then t.qty*t.amount else 
                case when pd.id = 1057 then round(2.816666433 * ka.kurs *t.qty,2) else t.qty*pd.amount*ka.kurs end end
        else 0 end amount_masuk
        , case when t.jenis_trx=1 then t.qty else 0 end  qty_keluar, 
        case when t.jenis_trx=1 then t.qty*t.amount else 0 end amount_keluar, s.uom
        from 
        t_gudang_sp t
        left join sparepart s on s.id = t.sparepart_id
        left join lpb_detail ld on (ld.id = t.lpb_detail_id and t.jenis_trx=0)
        left join po_detail pd on pd.id = ld.po_detail_id
        left join po p on p.id = pd.po_id
        left join m_kurs_akhir ka on ka.bulan =  '".$tgl1."' and ka.currency = p.currency
        where s.sparepart_group in (6,7)
        and EXTRACT( YEAR_MONTH FROM ( t.tanggal ) ) =  '".$tgl1."'
        union all
        select  t2.sparepart_id, case when right(t2.bulan,2)=12 then t2.bulan+101 else t2.bulan+1 end , s2.alias, s2.nama_item, t2.qty saldo_qty, t2.total_amount saldo_amount, 0 qty_masuk, 0 amount_masuk, 
                0 qty_keluar, 0 amount_keluar, s2.uom  
        from t_sparepart_saldo t2
        left join sparepart s2 on s2.id = t2.sparepart_id
        where t2.bulan=  '".$tgl2."'
        )
        x
       where x.alias  not in ('06KB002')
        group by bulan, kode, nama_item
        order by 3
            ");
        return $data;
    }

    // VIEW MATCHING PEMBAYARAN
    // select fp.id, fp.tanggal as tgl_matching, fp.no_pembayaran, COALESCE(v.tanggal,fum.tanggal) as tanggal, (CASE WHEN fpd.um_id=0 THEN 1 ELSE 0 END) as jenis_trx, COALESCE(v.no_voucher, fum.no_uang_masuk) as nomor, COALESCE(s.kode_supplier, mc.kode_customer) as kode, COALESCE(s.nama_supplier,mc.nama_customer) as nama, COALESCE(v.amount, fum.nominal) as amount from f_pembayaran_detail fpd
    // left join f_pembayaran fp on fp.id = fpd.id_pembayaran
    // left join voucher v on fpd.um_id = 0 and v.id = fpd.voucher_id
    // left join f_uang_masuk fum on fpd.voucher_id = 0 and fum.id = fpd.um_id
    // left join supplier s on s.id = v.supplier_id
    // left join m_customers mc on mc.id = fum.m_customer_id
}