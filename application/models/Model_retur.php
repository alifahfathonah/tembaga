<?php
class Model_retur extends CI_Model{    
    function dtr_list(){
        $data = $this->db->query("Select dtr.*, 
                    cust.nama_customer, cust.pic,
                    usr.realname As penimbang,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item,
                (Select count(dtrd.id)As ready_to_ttr From dtr_detail dtrd Where dtrd.dtr_id = dtr.id And dtrd.flag_ttr=0)As ready_to_ttr
                From dtr
                    Left Join m_customers cust On (dtr.m_customer_id = cust.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                Where dtr.m_customer_id>0 
                Order By dtr.id Desc");
        return $data;
    }

    function kendaraan_list(){
        $data = $this->db->query("Select * From m_kendaraan Order By no_kendaraan");
        return $data;
    }

    function retur_list($user_ppn){
        $data = $this->db->query("select r.*, c.nama_customer, c.pic, u.realname as penimbang, (select count(id) as jumlah_item from retur_detail rd where rd.retur_id = r.id) as jumlah_item
            from retur r
            left join users u on (u.id = r.created_by)
            left join m_jenis_packing jp on (jp.id = r.jenis_packing_id)
            left join m_customers c on (c.id = r.customer_id)
            where r.flag_ppn =".$user_ppn."
            order by r.no_retur desc
            ");
        return $data;
    }

    function get_retur_list($id){
        $data = $this->db->query("select r.*, c.nama_customer, c.pic, u.realname as penimbang, (select count(id) as jumlah_item from retur_detail rd where rd.retur_id = r.id) as jumlah_item
            from retur r
            left join users u on (u.id = r.created_by)
            left join m_jenis_packing jp on (jp.id = r.jenis_packing_id)
            left join m_customers c on (c.id = r.customer_id)
            where r.customer_id = ".$id." and status = 1 and flag_taken = 0 and jenis_retur = 0 and r.spb_id != 0");
        return $data;
    }
    
    function get_retur_fulfilment($spbid){
        $data = $this->db->query("select tgf.*, jb.jenis_barang
            from t_gudang_fg tgf
            left join jenis_barang jb on (jb.id = tgf.jenis_barang_id)
            where tgf.t_spb_fg_id = ".$spbid. " and flag_taken = 0");
        return $data;
    }

    function get_retur_fulfilment_wip($spbid){
        $data = $this->db->query("select tgw.*, jb.jenis_barang
            from t_gudang_wip tgw
            left join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
            where tgw.t_spb_wip_id = ".$spbid. " and flag_taken = 0");
        return $data;
    }

    function get_retur_fulfilment_rsk($spbid){
        $data = $this->db->query("select dd.id, dd.rongsok_id, r.nama_item, dd.bruto, dd.netto, dd.berat_palette, dd.no_pallete
            from spb_detail_fulfilment sdf
            left join dtr_detail dd on dd.id = sdf.dtr_detail_id 
            left join rongsok r on r.id = dd.rongsok_id 
            where sdf.spb_id=".$spbid." and dd.retur_id = 0");
        return $data;
    }

    function list_item_sj_retur_detail($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang
            from t_gudang_fg tgf
            left join jenis_barang jb on (jb.id = tgf.jenis_barang_id)
            where tgf.id =".$id);
        return $data;
    }

    function customer_list(){
        $data = $this->db->query("Select * From m_customers Order By nama_customer");
        return $data;
    }
    
    function jenis_barang_list(){
        $data = $this->db->query("Select * From jenis_barang where category = 'FG' Order By jenis_barang");
        return $data;
    }

    function jenis_wip_retur(){
        $data = $this->db->query("Select * From jenis_barang where category = 'WIP' Order By jenis_barang");
        return $data;
    }

    function rongsok_retur(){
        $data = $this->db->query("Select * From rongsok Where type_barang='Rongsok' Order By nama_item");
        return $data;
    }
    
    function jenis_packing_list(){
        $data = $this->db->query("select *from m_jenis_packing");
        return $data;
    }

    function show_header_retur($id){
        $data = $this->db->query("select r.*, u.realname as penimbang, jp.jenis_packing, c.nama_customer, c.pic, c.nama_customer_kh, c.pic_kh
            from retur r
            left join users u on (u.id = r.created_by)
            left join m_jenis_packing jp on (jp.id = r.jenis_packing_id)
            left join m_customers c on (c.id = r.customer_id)
            where r.id = ".$id);
        return $data;
    }

     function show_header_dtr($id){
        $data = $this->db->query("Select dtr.*, 
                    cust.nama_customer, cust.pic,
                    usr.realname As penimbang
                    From dtr
                        Left Join m_customers cust On (dtr.m_customer_id = cust.id) 
                        Left Join users usr On (dtr.created_by = usr.id) 
                    Where dtr.id=".$id);
        return $data;
    }
    
    function load_detail($id){
        $data = $this->db->query("Select rd.*, COALESCE(jb.jenis_barang,rsk.nama_item) as jenis_barang, jb.uom, mb.nomor_bobbin From retur_detail rd 
                Left join retur r on r.id = rd.retur_id
                Left Join jenis_barang jb On(r.jenis_barang != 'RONGSOK' and rd.jenis_barang_id = jb.id) 
                Left Join rongsok rsk on(r.jenis_barang = 'RONGSOK' and rd.jenis_barang_id = rsk.id)
                left join m_bobbin mb on (rd.bobbin_id = mb.id)
                Where rd.retur_id=".$id);
        return $data;
    }

    function load_detail_wip($id){
        $data = $this->db->query("Select rd.*, jb.jenis_barang, jb.uom from retur_detail rd
                Left Join jenis_barang jb On (rd.jenis_barang_id = jb.id)
                Where rd.retur_id=".$id);
        return $data;
    }

    function load_detail_rsk($id){
        $data = $this->db->query("Select rd.*, r.nama_item, r.uom From retur_detail rd 
                Left Join rongsok r On(rd.jenis_barang_id = r.id)
                Where rd.retur_id=".$id);
        return $data;
    }

    function load_detail_fulfilment($id){
        $data = $this->db->query("select rf.*, jb.jenis_barang
            from retur_fulfilment rf
            left join jenis_barang jb on (rf.jenis_barang_id = jb.id)
            where rf.retur_id = ".$id);
        return $data;
    }

    function load_detail_fulfilment_rsk($id){
        $data = $this->db->query("select rf.*, r.nama_item
            from retur_fulfilment rf
            left join rongsok r on (rf.jenis_barang_id = r.id)
            where rf.retur_id = ".$id);
        return $data;
    }
    
    function ttr_list(){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr, dtr.status_pembayaran, dtr.type_retur,
                    cust.nama_customer, cust.pic,
                    rs.ttr_id,
                (Select count(ttrd.id) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As jumlah_item
                From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id) 
                    Left Join m_customers cust On (dtr.m_customer_id = cust.id) 
                    Left Join request_sample rs On (rs.ttr_id = ttr.id And rs.module='Retur')
                Where dtr.m_customer_id>0 
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_ttr($id){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr, dtr.status_pembayaran, dtr.type_retur,
                    dtr.m_customer_id,
                    cust.nama_customer, cust.pic
                    From ttr 
                        Left Join dtr On (ttr.dtr_id = dtr.id) 
                        Left Join m_customers cust On (dtr.m_customer_id = cust.id)  
                    Where ttr.id=".$id);
        return $data;
    }
    
    function show_detail_ttr($id){
        $data = $this->db->query("Select ttrd.*, ampas.nama_item, ampas.uom
                    From ttr_detail ttrd 
                        Left Join ampas On (ttrd.ampas_id = ampas.id) 
                    Where ttrd.ttr_id=".$id);
        return $data;
    }
    
    function show_header_rs($id){
        $data = $this->db->query("Select rs.*, 
                    cust.nama_customer, cust.pic, cust.alamat, cust.telepon,
                    appr.realname As approved_name,
                    rjct.realname As reject_name
                    From request_sample rs
                        Left Join m_customers cust On (rs.m_customer_id = cust.id) 
                        Left Join users appr On (rs.approved_by = appr.id)
                        Left Join users rjct On (rs.rejected_by = rjct.id)
                    Where rs.id=".$id);
        return $data;
    }
    
    function list_request_barang(){
        $data = $this->db->query("Select rs.*, 
                    usr.realname As nama_marketing,
                    cust.nama_customer, cust.pic,
                    rjct.realname As reject_name,
                    aprv.realname As approved_name,
                (Select count(rsd.id)As jumlah_item From request_sample_detail rsd Where rsd.request_sample_id = rs.id)As jumlah_item,
                (Select Count(rsd.id)As ready_to_dtr From request_sample_detail rsd Where 
                    rsd.request_sample_id = rs.id And rsd.flag_skb=0)As ready_to_skb
                From request_sample rs
                    Left Join m_customers cust On (rs.m_customer_id = cust.id) 
                    Left Join users usr On (rs.marketing_id = usr.id) 
                    Left Join users rjct On (rs.rejected_by = rjct.id)
                    Left Join users aprv On (rs.approved_by = aprv.id) 
                Where rs.module='Retur' 
                Order By rs.id Desc");
        return $data;
    }

    function get_retur($id){
        $data = $this->db->query("select * from retur where customer_id = ".$id." and status = 1 and jenis_retur = 0 and flag_taken = 0");
        return $data;
    }

    function get_uom($id){
        $data = $this->db->query("select ukuran, uom from jenis_barang where id=".$id);
        return $data;
    }

    function fulfilment_list(){
        $data = $this->db->query("select r.*, COALESCE(s.no_spb, tsf.no_spb, tsw.no_spb_wip) as no_spb, COALESCE(s.status, tsf.status, tsw.status) as status_spb, c.nama_customer, (select count(id) as jumlah_item from retur_fulfilment rf where rf.retur_id = r.id) as jumlah_item
            from retur r
            left join spb s on (r.jenis_barang = 'RONGSOK' and s.id = r.spb_id)
            left join t_spb_fg tsf on (r.jenis_barang = 'FG' and tsf.id = r.spb_id)
            left join t_spb_wip tsw on (r.jenis_barang = 'WIP' and tsw.id = r.spb_id)
            left join m_customers c on (c.id = r.customer_id)
            where r.spb_id != 0
            order by r.no_retur desc");
        return $data;
    }
    
    function show_header_fulfilment($id){
        $data = $this->db->query("select r.*, c.id as cust_id, c.nama_customer
            from retur r
            left join m_customers c on (r.customer_id = c.id)
            where r.retur_id = ".$id);
        return $data;
    }

    function surat_jalan(){
        $data = $this->db->query("Select tsj.*, (select count(tsjd.id) from t_surat_jalan_detail tsjd where tsjd.t_sj_id = tsj.id) as jumlah_item,
                    cust.nama_customer, cust.alamat, r.no_retur, so.no_sales_order
                From t_surat_jalan tsj
                    Left Join retur r On (tsj.retur_id = r.id)
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join sales_order so On (tsj.sales_order_id = so.id) 
                Where tsj.retur_id > 0
                Order By tsj.id Desc");
        return $data;
    }

    function surat_jalan_sp(){
        $data = $this->db->query("Select tsj.*, (select count(tsjd.id) from t_surat_jalan_detail tsjd where tsjd.t_sj_id = tsj.id) as jumlah_item,
                    cust.nama_customer, cust.alamat,
                    so.no_sales_order
                From t_surat_jalan tsj
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join sales_order so On (tsj.sales_order_id = so.id) 
                Where tsj.spb_id > 0 and tsj.m_customer_id > 0
                Order By tsj.id Desc");
        return $data;
    }

    function load_detail_sj($id){
        $data = $this->db->query("select tsjd.id, tsjd.t_sj_id, tsjd.jenis_barang_id, tsjd.jenis_barang_alias, tsjd.no_packing, tsjd.qty, tsjd.berat, tsjd.bruto, (case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end) as netto, tsjd.netto_r, tsjd.nomor_bobbin, tsjd.line_remarks, jb.jenis_barang, jb.uom 
                from t_surat_jalan_detail tsjd
                left join jenis_barang jb on jb.id=(case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
                where tsjd.t_sj_id =".$id);
        return $data;
    }

    function load_detail_sj_rsk($id){
        $data = $this->db->query("select tsjd.id, tsjd.t_sj_id, tsjd.jenis_barang_id, tsjd.jenis_barang_alias, tsjd.no_packing, tsjd.qty, tsjd.berat, tsjd.bruto, (case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end) as netto, tsjd.netto_r, tsjd.nomor_bobbin, tsjd.line_remarks, COALESCE(tsjd.barang_alias, r.nama_item) as jenis_barang, r.uom 
                from t_surat_jalan_detail tsjd
                left join rongsok r on (r.id = tsjd.jenis_barang_id)
                where tsjd.t_sj_id =".$id);
        return $data;
    }

    /*function po_list(){
        $data = $this->db->query("Select po.*, 
                    spl.nama_supplier, spl.pic,
                (Select count(id)As jumlah_item From po_detail pd Where pd.po_id = po.id)As jumlah_item,
                (Select Count(pd.id)As ready_to_dtr From po_detail pd Where 
                    pd.po_id = po.id And pd.flag_dtr=0)As ready_to_dtr
                From po 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                Where po.jenis_po='Ampas' 
                Order By po.id Desc");
        return $data;
    }
    
    function show_header_po($id){
        $data = $this->db->query("Select po.*, 
                    spl.nama_supplier, spl.pic
                    From po 
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                    Where po.id=".$id);
        return $data;
    }
    
    function show_detail_po($id){
        $data = $this->db->query("Select pod.*, ampas.nama_item, ampas.uom
                    From po_detail pod 
                        Left Join ampas On (pod.ampas_id = ampas.id) 
                    Where pod.po_id=".$id);
        return $data;
    }
    
    function show_detail_dtr($id){
        $data = $this->db->query("Select dtrd.*, ampas.nama_item, ampas.uom
                    From dtr_detail dtrd 
                        Left Join ampas On (dtrd.ampas_id = ampas.id) 
                    Where dtrd.dtr_id=".$id);
        return $data;
    }
    
    function surat_jalan(){
        $data = $this->db->query("Select sj.*, 
                    cust.nama_customer, cust.alamat,
                    po.no_po,
                    kdr.no_kendaraan
                From surat_jalan sj
                    Left Join m_customers cust On (sj.m_customer_id = cust.id)
                    Left Join po On (sj.po_id = po.id) 
                    Left Join m_kendaraan kdr On (sj.m_kendaraan_id = kdr.id) 
                Where sj.po_id>0
                Order By sj.id Desc");
        return $data;
    }
    
    function get_po_list(){
        $data = $this->db->query("Select po.id, po.no_po                   
                    From po 
                    Where po.jenis_po='Ampas'");
        return $data;
    }
    */
    function show_header_sj_sp($id){
        $data = $this->db->query("Select tsj.*, COALESCE(cust.id,s.id) as id_customer, 
                    COALESCE(cust.nama_customer,s.nama_supplier) as nama_customer,
                    COALESCE(tsf.no_spb, tsw.no_spb_wip, spb.no_spb) as nomor_spb,
                    COALESCE(tsf.status, tsw.status, spb.status) as status_spb,
                    COALESCE(s.alamat, cust.alamat) as alamat,
                    tkdr.type_kendaraan,
                    usr.realname,
                    aprv.realname as approved_name,
                    rjct.realname as rejected_name
                From t_surat_jalan tsj
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join supplier s On (tsj.supplier_id = s.id)
                    Left Join t_spb_fg tsf On (tsj.jenis_barang = 'FG' and tsf.id = tsj.spb_id)
                    Left Join t_spb_wip tsw On (tsj.jenis_barang = 'WIP' and tsw.id = tsj.spb_id)
                    Left Join spb On (tsj.jenis_barang = 'RONGSOK' and spb.id = tsj.spb_id)
                    Left Join m_type_kendaraan tkdr On (tsj.m_type_kendaraan_id = tkdr.id) 
                    Left Join users usr On (tsj.created_by = usr.id)
                    Left Join users aprv On (tsj.approved_by = aprv.id)
                    Left Join users rjct On (tsj.rejected_by = rjct.id)
                    Where tsj.id=".$id);
        return $data;
    }    

    function show_header_sj($id){
        $data = $this->db->query("Select tsj.*, 
                    cust.nama_customer, cust.alamat,
                    cust.nama_customer_kh, cust.alamat_kh,
                    r.no_retur, r.tanggal as tgl_retur, r.spb_id,
                    tkdr.type_kendaraan,
                    usr.realname
                From t_surat_jalan tsj
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join retur r On (tsj.retur_id = r.id) 
                    Left Join m_type_kendaraan tkdr On (tsj.m_type_kendaraan_id = tkdr.id) 
                    Left Join users usr On (tsj.created_by = usr.id)
                    Where tsj.id=".$id);
        return $data;
    }

    function get_jenis_barang($id){
        $data = $this->db->query("Select jenis_barang from retur where id=".$id);
        return $data;
    }

    function get_retur_detail($id){
        $data = $this->db->query("Select rd.*, jb.jenis_barang, jb.kode from retur_detail rd
                    left join jenis_barang jb on jb.id = rd.jenis_barang_id
                    where rd.id=".$id);
        return $data;
    }

    function get_spb_list_rsk(){
        $data = $this->db->query("select id, no_spb from spb where jenis_spb = 9 and flag_retur = 0");
        return $data;
    }

    function get_spb_list_wip(){
        $data = $this->db->query("select id, no_spb_wip as no_spb from t_spb_wip where flag_produksi = 9 and flag_retur = 0");
        return $data;
    }

    function get_spb_list_fg(){
        $data = $this->db->query("select id, no_spb from t_spb_fg where jenis_spb = 9 and flag_retur = 0");
        return $data;
    }

    function spb_list(){
        $data = $this->db->query("SELECT * FROM (
    Select tsf.id, tsf.tanggal, tsf.no_spb, tsf.status, tsf.flag_tolling, tsf.keterangan, usr.realname As pic,
    aprv.realname As approved_name, rjt.realname As rejected_name, (Select count(tsfd.id)As jumlah_item From t_spb_fg_detail tsfd Where tsfd.t_spb_fg_id = tsf.id)As jumlah_item, 'FG' as jenis_barang
                From t_spb_fg tsf
                    Left Join users usr On (tsf.created_by = usr.id) 
                    Left Join users aprv On (tsf.approved_by = aprv.id) 
                    Left Join users rjt On (tsf.rejected_by = rjt.id)
                    where jenis_spb = 9
    UNION
    Select tsw.id, tsw.tanggal, tsw.no_spb_wip as no_spb, tsw.status, tsw.flag_tolling, tsw.keterangan,  usr.realname As pic, aprv.realname As approved_name, rjt.realname As rejected_name, (Select count(tswd.id)As jumlah_item From t_spb_wip_detail tswd Where tswd.t_spb_wip_id = tsw.id)As jumlah_item, 'WIP' as jenis_barang
                From t_spb_wip tsw
                    Left Join users usr On (tsw.created_by = usr.id) 
                    Left Join users aprv On (tsw.approved_by = aprv.id) 
                    Left Join users rjt On (tsw.rejected_by = rjt.id)
                    where flag_produksi = 9
    UNION
    Select spb.id, spb.tanggal, spb.no_spb, spb.status, spb.flag_tolling, spb.remarks as keterangan, usr.realname As pic, aprv.realname As approved_name, rjt.realname As rejected_name, (Select count(sd.id)As jumlah_item From spb_detail sd Where sd.spb_id = spb.id)As jumlah_item, 'RONGSOK' as jenis_barang
                From spb
                    Left Join users usr On (spb.created_by = usr.id) 
                    Left Join users aprv On (spb.approved_by = aprv.id) 
                    Left Join users rjt On (spb.rejected_by = rjt.id)
                    where jenis_spb = 9
    ) a");
        return $data;
    }

    function print_laporan_retur($s,$e){
        return $this->db->query("select * from (select r.no_retur, r.tanggal, r.jenis_retur, mc.nama_customer, COALESCE(jb.jenis_barang, rsk.nama_item) as jenis_barang, sum(rd.netto) as netto, r.remarks,
                COALESCE((select sum(netto) from t_surat_jalan_detail tsjd
                    left join t_surat_jalan tsj on tsjd.t_sj_id = tsj.id
                        where tsj.retur_id = r.id and tsjd.jenis_barang_id = rd.jenis_barang_id and tsj.tanggal < '".$s."' group by tsjd.jenis_barang_id),0) as netto_kirim_b,
                (CASE WHEN r.jenis_retur = 1 THEN rd.netto ELSE COALESCE((select sum(netto) from t_surat_jalan_detail tsjd
                    left join t_surat_jalan tsj on tsjd.t_sj_id = tsj.id
                        where tsj.retur_id = r.id and tsjd.jenis_barang_id = rd.jenis_barang_id and tsj.tanggal  between '".$s."' and '".$e."'
                            group by tsjd.jenis_barang_id),0) END) as netto_kirim, COALESCE(fi.tanggal,'".$s."') as tanggal_invoice
                    from retur_detail rd
                left join retur r on rd.retur_id = r.id
                left join m_customers mc on r.customer_id = mc.id
                left join jenis_barang jb on r.jenis_barang != 'RONGSOK' and rd.jenis_barang_id = jb.id
                left join rongsok rsk on r.jenis_barang = 'RONGSOK' and rd.jenis_barang_id = rsk.id
                left join f_invoice fi on r.id = fi.id_retur
                where r.tanggal <= '".$e."'
                group by rd.retur_id, jenis_barang_id)as a
                where CASE WHEN jenis_retur = 1 THEN tanggal_invoice >= '".$s."' ELSE netto >= netto_kirim_b END
                order by nama_customer, tanggal, no_retur");
    }
    /*
    function load_detail_surat_jalan($id){
        $data = $this->db->query("Select sjd.*, ampas.nama_item, ampas.uom,
                    pa.no_produksi                    
                From surat_jalan_detail sjd 
                    Left Join ampas On(sjd.ampas_id = ampas.id) 
                    Left Join produksi_ampas pa On (sjd.produksi_ampas_id = pa.id)                    
                Where sjd.surat_jalan_id=".$id);
        return $data;
    }*/
    
}