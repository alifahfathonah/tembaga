<?php
class Model_finance extends CI_Model{
    function list_data($ppn){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.flag_ppn =".$ppn."
            Order By id desc");
        return $data;
    }

    function list_data_filter($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            where fum.m_customer_id =".$id." Order By id desc");
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
        $data = $this->db->query("Select * From bank where ppn =".$ppn." Order By kode_bank ");
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

    function list_data_slip_setoran(){
        $data = $this->db->query("Select fss.*, fp.no_pembayaran, fp.tanggal, b.nama_bank From f_slip_setoran fss
            left join f_pembayaran fp on fp.id = fss.id_pembayaran
            left join f_kas fk on fk.id = fss.id_kas
            left join bank b on b.id = fk.id_bank");
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
        $data = $this->db->query("Select * from voucher where pembayaran_id = 0 and status = 0");
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
        $data = $this->db->query("select fpd.*, fum.bank_pembayaran, fum.no_uang_masuk, fum.jenis_pembayaran, fum.nominal, fum.keterangan, fum.currency, fum.rekening_pembayaran, fum.nomor_cek, mc.nama_customer, fum.status
            from f_pembayaran_detail fpd
            left join f_uang_masuk fum on fum.id = fpd.um_id
            left join m_customers mc on mc.id = fum.m_customer_id
            where fpd.id_pembayaran =".$id." and fpd.voucher_id = 0");
        return $data;
    }

    function list_data_um(){
        $data = $this->db->query("Select fum.* from f_uang_masuk fum
                left join f_pembayaran_detail fpd on fpd.um_id = fum.id 
                where fpd.um_id is null and fum.status = 0");
        return $data;
    }

    function get_data_um($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer from f_uang_masuk fum
                left join m_customers mc on mc.id = fum.m_customer_id
                where fum.id = ".$id);
        return $data;
    }

    function list_invoice($ppn){
        $data = $this->db->query("Select fi.*, mc.nama_customer, so.no_sales_order, tsj.no_surat_jalan, so.flag_ppn,
            (select count(fid.id) from f_invoice_detail fid where fid.id_invoice = fi.id) as jumlah 
            From f_invoice fi
            left join sales_order so on so.id = fi.id_sales_order
            left join t_surat_jalan tsj on tsj.id = fi.id_surat_jalan
            left join m_customers mc on mc.id = fi.id_customer
            where so.flag_ppn = ".$ppn."
            Order By id desc");
        return $data;
    }

    function get_so_list($id,$ppn){
        $data = $this->db->query("Select so.* From sales_order so
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
        $data = $this->db->query("select fi.*, tso.alias, mc.nama_customer, mc.alamat, mc.npwp, so.no_sales_order, so.flag_ppn, so.flag_tolling, tso.no_po, u.realname, tsj.no_surat_jalan, tso.id as id_t_sales_order, r.no_retur, b.kode_bank, b.nama_bank, b.nomor_rekening, mtch.no_matching from f_invoice fi
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
            (case when tsjd.netto_r > 0 then sum(tsjd.netto_r) else sum(tsjd.netto) end) as netto,
            COALESCE(jb.jenis_barang,r.nama_item) as jenis_barang, COALESCE(jb.uom,r.uom) as uom,
            (select tsod.amount from t_sales_order_detail tsod left join t_sales_order tso on tso.id = tsod.t_so_id where tso.so_id = tsj.sales_order_id and tsod.jenis_barang_id = case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)as amount 
            from t_surat_jalan_detail tsjd 
            left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id 
            left join t_sales_order tso on tso.so_id = tsj.sales_order_id
            left join jenis_barang jb on tso.jenis_barang != 'RONGSOK' and jb.id = (case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
            left join rongsok r on tso.jenis_barang = 'RONGSOK' and r.id=tsjd.jenis_barang_id
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
        $data = $this->db->query("select fum.*, b.kode_bank, b.nama_bank, b.nomor_rekening, fmd.biaya1, fmd.biaya2, fmd.ket1, fmd.ket2 from f_match_detail fmd
            left join f_uang_masuk fum on fum.id = fmd.id_um
            left join bank b on b.id = fum.rekening_tujuan
            where id_inv = 0 and fmd.id_match =".$id);
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

    function show_invoice_detail($id){
        $data = $this->db->query("select fid.*, jb.jenis_barang, jb.uom from f_invoice_detail fid
            left join jenis_barang jb on jb.id=fid.jenis_barang_id
            where id_invoice=".$id);
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
            where flag_ppn=".$ppn);
        return $data;
    }

    function matching_header($id){
        $data = $this->db->query("select fm.*, mc.nama_customer, mc.pic, mc.alamat from f_match fm 
            left join m_customers mc on mc.id = fm.id_customer
            where fm.id =".$id);
        return $data;
    }

    function matching_detail($id){
        $data = $this->db->query("select fm.*, mc.nama_customer, mc.pic, mc.alamat from f_match fm 
            left join m_customers mc on mc.id = fm.id_customer
            where fm.id_customer =".$id);
        return $data;
    }

    function load_invoice_full($id,$ppn){
        $data = $this->db->query("select fi.*,
            (select if(so.flag_ppn=1,round((sum(fid.total_harga)-f.diskon)*110/100)-f.add_cost+f.materai,sum(fid.total_harga-f.diskon)-f.add_cost+f.materai) from f_invoice_detail fid
            left join f_invoice f on f.id = fid.id_invoice
            left join sales_order so on so.id = f.id_sales_order 
            where fid.id_invoice = fi.id) as total 
            from f_invoice fi 
            left join sales_order so on so.id = fi.id_sales_order
            where fi.id_customer =".$id." and so.flag_ppn=".$ppn." and flag_matching = 0");
        return $data;
    }

    function load_um_full($id,$ppn){
        $data = $this->db->query("select fum.id, fum.no_uang_masuk, fum.jenis_pembayaran, fum.bank_pembayaran, fum.status, COALESCE(NULLIF(fum.rekening_pembayaran,''), NULLIF(fum.nomor_cek, '')) as nomor, fum.currency, fum.nominal
            from f_uang_masuk fum
            where fum.m_customer_id =".$id." and fum.flag_ppn=".$ppn." and fum.flag_matching = 0 and (fum.status = 0 or fum.status = 1)");
        return $data;
    }

    function load_invoice_match($id){
        $data = $this->db->query("select fmd.*, fi.jenis_trx, fi.no_invoice,
            (select if(so.flag_ppn=1,
                round((sum(fid.total_harga)-f.diskon)*110/100)-f.add_cost+f.materai,
                sum(fid.total_harga-f.diskon)-f.add_cost+f.materai) 
                    from f_invoice_detail fid
                    left join f_invoice f on f.id = fid.id_invoice
                    left join sales_order so on so.id = f.id_sales_order 
                    where fid.id_invoice = fmd.id_inv)-(fmd.biaya1+fmd.biaya2) as total 
            from f_match_detail fmd
            left join f_invoice fi on fi.id = fmd.id_inv
            where fmd.id_match =".$id." and fmd.id_um = 0");
        return $data;
    }

    function view_invoice_match($id){
        $data = $this->db->query("select fmd.*, fi.jenis_trx, fi.no_invoice,
            (select if(so.flag_ppn=1,
                round((sum(fid.total_harga)-f.diskon)*110/100)-f.add_cost+f.materai,
                sum(fid.total_harga-f.diskon)-f.add_cost+f.materai) 
                    from f_invoice_detail fid
                    left join f_invoice f on f.id = fid.id_invoice
                    left join sales_order so on so.id = f.id_sales_order 
                    where fid.id_invoice = fmd.id_inv)as total 
            from f_match_detail fmd
            left join f_invoice fi on fi.id = fmd.id_inv
            where fmd.id =".$id);
        return $data;
    }

    function load_um_match($id){
        $data = $this->db->query("select fmd.*, fum.no_uang_masuk, fum.jenis_pembayaran, fum.bank_pembayaran, fum.currency, fum.nominal, fum.status  from f_match_detail fmd
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

    function get_data_invoice($id){
        $data = $this->db->query("select fi.id, fi.no_invoice,
            (select if(so.flag_ppn=1,round((sum(fid.total_harga)-f.diskon)*110/100)-f.add_cost+f.materai,sum(fid.total_harga-f.diskon)-f.add_cost+f.materai) from f_invoice_detail fid
            left join f_invoice f on f.id = fid.id_invoice
            left join sales_order so on so.id = f.id_sales_order 
            where fid.id_invoice = fi.id) as total
            from f_invoice fi
            where fi.id =".$id);
        return $data;
    }

    function get_data_hutang($id){
        $data = $this->db->query("select (select sum(fid.total_harga) from f_invoice_detail fid where fid.id_invoice = fi.id) as total, sum(fmd.used_hutang) as used_hutang
            from f_invoice fi
            left join f_matching_detail fmd on fmd.id_hutang = fi.id
            where fi.id =".$id);
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
        $data = $this->db->query("select fk.*, b.kode_bank, fum.no_uang_masuk, fp.no_pembayaran, mc.nama_customer 
            from f_kas fk
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
        $data = $this->db->query("select fk.*, fum.no_uang_masuk, fum.jenis_pembayaran, fum.bank_pembayaran, coalesce(fum.rekening_pembayaran,fum.nomor_cek) as nomor, b.kode_bank, b.nama_bank, b.nomor_rekening, v.jenis_barang, v.no_voucher, v.jenis_voucher, v.supplier_id, p.no_po, mc.nama_customer, s.nama_supplier,v.nm_cost, fp.no_pembayaran, coalesce(v.keterangan,fum.keterangan) as ket_v FROM f_kas fk
            left join bank b on b.id= fk.id_bank
            left join f_uang_masuk fum on fk.id_um != 0 and fum.id = fk.id_um
            left join voucher v on fk.id_vc != 0 and v.id = fk.id_vc
            left join po p on p.id = v.po_id
            left join m_customers mc on mc.id = fum.m_customer_id or mc.id = v.customer_id
            left join supplier s on s.id = v.supplier_id
            left join f_slip_setoran fss on fss.id = fk.id_slip_setoran
            left join f_pembayaran fp on fp.id = fss.id_pembayaran
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
}