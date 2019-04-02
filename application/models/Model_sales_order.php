<?php
class Model_sales_order extends CI_Model{
    function so_list($ppn){
        $data = $this->db->query("Select tso.*, so.no_sales_order, so.tanggal, so.m_customer_id, so.marketing_id, so.flag_ppn, so.flag_sj, so.flag_invoice, usr.realname As nama_marketing, cust.nama_customer, cust.pic, COALESCE(tsf.status,tsw.status,spb.status) as status_spb,
            (Select count(fi.id) from f_invoice fi where fi.id_sales_order = so.id) as invoice,
            (Select count(tsod.id)As jumlah_item From t_sales_order_detail tsod Where tsod.t_so_id = tso.id)As jumlah_item From t_sales_order tso
            Left Join sales_order so on (so.id = tso.so_id)
            Left Join m_customers cust On (so.m_customer_id = cust.id) 
            Left Join t_spb_fg tsf on (tso.jenis_barang='FG') and (tsf.id=tso.no_spb)
            Left Join t_spb_wip tsw on (tso.jenis_barang='WIP') and (tsw.id=tso.no_spb)
            Left Join spb on (tso.jenis_barang='RONGSOK') and (spb.id=tso.no_spb)
            Left Join users usr On (so.marketing_id = usr.id)
            Where so.flag_tolling = 0 and so.flag_ppn =".$ppn."
            Order by so.tanggal desc");
        return $data;
    }

    function filter_so_list($id){
        $data = $this->db->query("Select tso.*, so.no_sales_order, so.tanggal, so.m_customer_id, so.marketing_id, so.flag_ppn, so.flag_sj, so.flag_invoice, usr.realname As nama_marketing, cust.nama_customer, cust.pic, COALESCE(tsf.status,tsw.status,spb.status) as status_spb,
            (Select count(fi.id) from f_invoice fi where fi.id_sales_order = so.id) as invoice,
            (Select count(tsod.id)As jumlah_item From t_sales_order_detail tsod Where tsod.t_so_id = tso.id)As jumlah_item From t_sales_order tso
            Left Join sales_order so on (so.id = tso.so_id)
            Left Join m_customers cust On (so.m_customer_id = cust.id) 
            Left Join t_spb_fg tsf on (tso.jenis_barang='FG') and (tsf.id=tso.no_spb)
            Left Join t_spb_wip tsw on (tso.jenis_barang='WIP') and (tsw.id=tso.no_spb)
            Left Join spb on (tso.jenis_barang='RONGSOK') and (spb.id=tso.no_spb)
            Left Join users usr On (so.marketing_id = usr.id)
            Where so.flag_sj = ".$id." Order by so.tanggal desc");
        return $data;
    }

    function customer_list(){
        $data = $this->db->query("Select * From m_customers Order By nama_customer");
        return $data;
    }
    
    function marketing_list(){
        $data = $this->db->query("Select * From users Order By realname");
        return $data;
    }
    
    function get_contact_name($id){
        $data = $this->db->query("Select * From m_customers Where id=".$id);
        return $data;
    }

    function load_detail($id){
        $data = $this->db->query("Select sod.*, jb.jenis_barang, jb.category, jb.uom From sales_order_detail sod 
                Left Join jenis_barang jb On(jb.id = sod.id) 
                Where sod.sales_order_id=".$id);
        return $data;
    }

    function show_header_so($id){
        $data = $this->db->query("Select tso.*, so.no_sales_order, so.tanggal, so.m_customer_id, so.marketing_id, so.flag_invoice, so.keterangan, u.realname, cust.nama_customer, cust.pic, cust.alamat, cust.telepon as telepon, COALESCE(tsf.no_spb, tsw.no_spb_wip, spb.no_spb,tsa.no_spb_ampas) as no_spb_barang, COALESCE(tsf.status,tsw.status,spb.status) as status_spb
                    From t_sales_order tso
                        Left join sales_order so on (so.id = tso.so_id)
                        Left join m_customers cust On (so.m_customer_id = cust.id)
                        Left join t_spb_fg tsf on tso.jenis_barang = 'FG' and tsf.id = tso.no_spb
                        Left join t_spb_wip tsw on tso.jenis_barang = 'WIP' and tsw.id = tso.no_spb
                        Left join spb on tso.jenis_barang = 'RONGSOK' and spb.id = tso.no_spb
                        Left join t_spb_ampas tsa on tso.jenis_barang = 'AMPAS' and tso.no_spb
                        Left join users u on u.id = so.marketing_id
                    Where tso.id=".$id);
        return $data;
    }
    
    function show_detail_so($id){
        $data = $this->db->query("Select tsod.*, jb.jenis_barang, jb.uom
                    From t_sales_order_detail tsod 
                        Left Join jenis_barang jb On (tsod.jenis_barang_id = jb.id) 
                    Where tsod.t_so_id=".$id);
        return $data;
    }

    function show_detail_so_rsk($id){
        $data = $this->db->query("Select tsod.*, r.nama_item as jenis_barang, r.uom
                    From t_sales_order_detail tsod 
                        Left Join rongsok r On (tsod.jenis_barang_id = r.id) 
                    Where tsod.t_so_id=".$id);
        return $data;
    }

    function load_detail_view_sj($id){
        $data = $this->db->query("select tsjd.*, jb.jenis_barang, jb.uom 
                from t_surat_jalan_detail tsjd
                left join t_surat_jalan tsj on tsj.id= tsjd.t_sj_id
                left join t_sales_order tso on tso.so_id = tsj.sales_order_id
                left join jenis_barang jb on jb.id = tsjd.jenis_barang_id
                where tso.id =".$id);
        return $data;
    }

    function load_detail_view_sj_rsk($id){
        $data = $this->db->query("select tsjd.*, r.nama_item as jenis_barang, r.uom 
                from t_surat_jalan_detail tsjd
                left join t_surat_jalan tsj on tsj.id= tsjd.t_sj_id
                left join t_sales_order tso on tso.so_id = tsj.sales_order_id
                left join rongsok r on r.id = tsjd.jenis_barang_id
                where tso.id =".$id);
        return $data;
    }
    // function show_view_sj($id){
    //     $data = $this->db->query("select tsj.* from t_surat_jalan tsj
    //                 left join t_sales_order tso on tso.so_id = tsj.sales_order_id
    //                 where tso.id = ".$id);
    //     return $data;
    // }

    function jenis_barang_list(){
        $data = $this->db->query("Select category From jenis_barang where category <> '' group by category");
        return $data;
    }
    
    function type_kendaraan_list(){
        $data = $this->db->query("select *from m_type_kendaraan order by type_kendaraan");
        return $data;
    }
    function kendaraan_list(){
        $data = $this->db->query("Select * From m_kendaraan Order By no_kendaraan");
        return $data;
    }
    
    function get_type_kendaraan($id){
        $data = $this->db->query("Select kdr.*, tkdr.type_kendaraan From m_kendaraan kdr 
                    Left Join m_type_kendaraan tkdr On (kdr.m_type_kendaraan_id = tkdr.id) 
                    Where kdr.id=".$id);
        return $data;
    }
    
    function get_alamat($id){
        $data = $this->db->query("Select * From m_customers Where id=".$id);
        return $data;
    }
    
    function get_so_list($id, $user_ppn){
        $data = $this->db->query("Select so.id, so.no_sales_order From sales_order so
                left join t_sales_order tso on tso.so_id = so.id
                left join t_spb_fg tsf on tso.jenis_barang = 'FG' and tsf.id = tso.no_spb
                left join t_spb_wip tsw on tso.jenis_barang = 'wip' and tsw.id = tso.no_spb
                left join spb s on tso.jenis_barang = 'RONGSOK' and s.id = tso.no_spb
                Left join t_spb_ampas tsa on tso.jenis_barang = 'AMPAS' and tso.no_spb
                Where so.m_customer_id=".$id." and so.flag_tolling = 0 and so.flag_sj = 0 and COALESCE(tsf.status,tsw.status,s.status,tsa.status) != 0 and so.flag_ppn = ".$user_ppn);
        return $data;
    }

    function get_jenis_barang($id){
        $data = $this->db->query("Select jenis_barang from t_sales_order where so_id=".$id);
        return $data;
    }

    // function list_item_sj_fg($soid){
    //     $data = $this->db->query("select tgf.id, tgf.no_packing, jb.jenis_barang, jb.uom, jb.ukuran from t_sales_order tso
    //             left join t_gudang_fg tgf on tgf.t_spb_fg_id = tso.no_spb
    //             left join jenis_barang jb on jb.id = tgf.jenis_barang_id
    //             where tso.so_id = ".$soid." and flag_taken = 0");
    //     return $data;
    // }

    function list_item_sj_fg($soid){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.kode, jb.uom, jb.ukuran from t_sales_order tso
                left join t_gudang_fg tgf on tgf.t_spb_fg_id = tso.no_spb
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tso.so_id = ".$soid." and flag_taken = 0");
        return $data;
    }

    function list_item_sj_fg_detail($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.kode, jb.uom from sales_order so
                left join t_sales_order tso on tso.so_id = so.id
                left join t_gudang_fg tgf on tgf.t_spb_fg_id = tso.no_spb
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tgf.id=".$id);
        return $data;
    }

    function jenis_barang_fg(){
        $data = $this->db->query("select id, jenis_barang, kode from jenis_barang 
                where category ='FG'");
        return $data;
    }

    function list_item_sj_wip($soid){
        $data = $this->db->query("select tgw.id as id, jb.jenis_barang, jb.kode, jb.uom  from sales_order so
                left join t_sales_order tso on tso.so_id = so.id
                left join t_spb_wip_detail tswd on tswd.t_spb_wip_id = tso.no_spb
                left join t_gudang_wip tgw on tgw.t_spb_wip_detail_id = tswd.id
                left join jenis_barang jb on jb.id = tswd.jenis_barang_id
                where so.id = ".$soid." and tgw.flag_taken = 0");
        return $data;
    }

    function list_item_sj_wip_detail($id){
        $data = $this->db->query("select tgw.*, jb.jenis_barang, jb.kode, jb.uom from t_gudang_wip tgw
                left join jenis_barang jb on jb.id = tgw.jenis_barang_id
                where tgw.id=".$id);
        return $data;
    }

    function jenis_barang_wip(){
        $data = $this->db->query("select id, jenis_barang, kode from jenis_barang 
                where category ='WIP'");
        return $data;
    }

    function list_item_sj_rsk($soid){
        $data = $this->db->query("select dd.id, dd.no_pallete as jenis_barang
            from sales_order so 
            left join t_sales_order tso on tso.so_id = so.id 
            left join spb_detail_fulfilment sdf on sdf.spb_id = tso.no_spb 
            left join dtr_detail dd on dd.id = sdf.dtr_detail_id 
            left join rongsok r on r.id = dd.rongsok_id 
            where so.id =".$soid." and dd.so_id=0");
        return $data;
    }
    
    function list_item_sj_rsk_detail($id){
        $data = $this->db->query("select dd.*, r.nama_item as jenis_barang, r.uom
            from dtr_detail dd left join rongsok r on r.id = dd.rongsok_id 
            where dd.id =".$id);
        return $data;
    }

    function jenis_barang_rsk(){
        $data = $this->db->query("select id, kode_rongsok, nama_item from rongsok 
                where type_barang ='Rongsok'");
        return $data;
    }

    function load_detail_so($id){
        $data = $this->db->query("Select tsod.*, jb.jenis_barang as nama_barang, jb.category, jb.uom From t_sales_order_detail tsod 
                Left Join jenis_barang jb On(jb.id = tsod.jenis_barang_id) 
                Where tsod.t_so_id= ".$id);
        return $data;
    }

    function load_detail_so_rongsok($id){
        $data = $this->db->query("Select tsod.*, rsk.nama_item as nama_barang, rsk.type_barang, rsk.uom From t_sales_order_detail tsod 
                Left Join rongsok rsk On(rsk.id = tsod.jenis_barang_id) 
                Where tsod.t_so_id= ".$id);
        return $data;
    }

    function show_data($id){
        $data = $this->db->query("Select uom From jenis_barang Where id=".$id);        
        return $data;
    }

    function get_uom_so($id){
        $data = $this->db->query("Select uom From rongsok Where id=".$id);        
        return $data;
    }
    
    function list_barang_so($jenis){
        $data = $this->db->query("Select id, jenis_barang, uom from jenis_barang where category = '".$jenis."'");
        return $data;
    }

    function list_barang_so_rongsok(){
        $data = $this->db->query("Select id, nama_item as jenis_barang, uom from rongsok where type_barang = 'Rongsok'");
        return $data;
    }

    function get_no_spb($id){
        $data = $this->db->query("select no_spb_detail from t_sales_order_detail where id=".$id);
        return $data;
    }

    function spb_list($user_ppn){
        $data = $this->db->query("select tso.*, mc.nama_customer, so.no_sales_order, so.tanggal, coalesce(tsf.no_spb, tsw.no_spb_wip, spb.no_spb) as no_spb_detail , 
            coalesce(tsf.status, tsw.status, spb.status) as status, coalesce(tsf.keterangan, tsw.keterangan, spb.remarks) as keterangan,
            (Select count(tsod.id)As jumlah_item From t_sales_order_detail tsod Where tsod.t_so_id = tso.id)As jumlah_item from t_sales_order tso 
            left join sales_order so on so.id = tso.so_id
            left join t_spb_fg tsf on tso.jenis_barang='FG' and tsf.id = tso.no_spb
            left join t_spb_wip tsw on tso.jenis_barang='WIP' and tsw.id = tso.no_spb
            left join spb on tso.jenis_barang='RONGSOK' and spb.id = tso.no_spb
            left join m_customers mc on mc.id = so.m_customer_id
            Where so.flag_tolling = 0 And so.flag_ppn = ".$user_ppn."
            order by so.tanggal desc");
        return $data;
    }

    function show_view_header_so($id){
        $data = $this->db->query("select tso.*, so.no_sales_order, so.tanggal,
            usr.realname As nama_marketing, 
            cust.nama_customer, cust.pic, 
            coalesce(tsf.no_spb, tsw.no_spb_wip, spb.no_spb) as no_spb_detail, 
            coalesce(tsf.status, tsw.status, spb.status) as status, 
            coalesce(tsf.keterangan, tsw.keterangan, spb.remarks) as keterangan, 
            coalesce(tsf.reject_remarks, tsw.reject_remarks, spb.reject_remarks) as reject_remarks,
            (Select count(tsod.id)As jumlah_item From t_sales_order_detail tsod Where tsod.t_so_id = tso.id)As jumlah_item from t_sales_order tso 
            left join sales_order so on so.id = tso.so_id
            left join t_spb_fg tsf on tso.jenis_barang='FG' and tsf.id = tso.no_spb
            left join t_spb_wip tsw on tso.jenis_barang='WIP' and tsw.id = tso.no_spb
            left join spb on tso.jenis_barang='RONGSOK' and spb.id= tso.no_spb
            Left Join m_customers cust On (so.m_customer_id = cust.id) 
            Left Join users usr On (so.marketing_id = usr.id)
            where tso.id =".$id);
        return $data;
    }

    function show_view_detail_so($id){
        $data = $this->db->query("select tsod.*, jb.jenis_barang as nama_barang, jb.uom from t_sales_order_detail tsod
            left join jenis_barang jb on jb.id = tsod.jenis_barang_id
            where tsod.t_so_id =".$id);
        return $data;
    }

    function show_view_detail_so_rsk($id){
        $data = $this->db->query("select tsod.*, rsk.nama_item as nama_barang, rsk.uom from t_sales_order_detail tsod
            left join rongsok rsk on rsk.id = tsod.jenis_barang_id
            where tsod.t_so_id =".$id);
        return $data;
    }

    function show_detail_spb_fulfilment($id){
        $data = $this->db->query("select  jb.jenis_barang as nama_barang,jb.uom,
        coalesce(tgf.no_packing, 0) as no_packing,
        coalesce(tgf.bruto, 0) as bruto,
        coalesce(tgf.netto, tgw.berat) as berat,
        coalesce(tgw.qty, 1) as qty,
        coalesce(tgw.uom, NULL) as uom,
        coalesce(tgf.keterangan, tgw.keterangan) as keterangan
        from t_sales_order tso
        left join t_gudang_fg tgf on tso.jenis_barang = 'FG' and tgf.t_spb_fg_id = tso.no_spb
        left join t_gudang_wip tgw on tso.jenis_barang = 'WIP' and tgw.t_spb_wip_id = tso.no_spb
        left join jenis_barang jb on jb.id = (case when tso.jenis_barang='FG' then tgf.jenis_barang_id else tgw.jenis_barang_id end)
        where tso.id =".$id);
        return $data;
    }

    function show_detail_spb_fulfilment_rsk($id){
        $data = $this->db->query("Select rsk.nama_item as nama_barang, rsk.uom, dtrd.no_pallete as no_packing,dtrd.bruto, dtrd.netto as berat, dtrd.qty, dtrd.line_remarks as keterangan
            From spb_detail_fulfilment spdf 
            Left Join dtr_detail dtrd on (dtrd.id = spdf.dtr_detail_id) 
            Left Join rongsok rsk On (dtrd.rongsok_id = rsk.id)
            Left Join t_sales_order tso on (tso.no_spb = spdf.spb_id)
            Where tso.id=".$id);
        return $data;
    }

    function surat_jalan($user_ppn){
        $data = $this->db->query("Select tsj.*, (select count(tsjd.id) from t_surat_jalan_detail tsjd where tsjd.t_sj_id = tsj.id) as jumlah_item,
                    cust.nama_customer, cust.alamat,
                    so.no_sales_order, fi.id as inv
                From t_surat_jalan tsj
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join sales_order so On (tsj.sales_order_id = so.id) 
                    Left Join f_invoice fi on (fi.id_surat_jalan = tsj.id)
                Where so.flag_tolling = 0  And so.flag_ppn = ".$user_ppn."
                Order By tsj.id Desc");
        return $data;
    }

    function show_header_sj($id){
        $data = $this->db->query("Select tsj.*, cust.id as id_customer, cust.nama_customer, cust.alamat, so.tanggal as tanggal_so, 
                    COALESCE(tsf.no_spb, tsw.no_spb_wip, s.no_spb) as nomor_spb,
                    COALESCE(tsf.status, tsw.status, s.status) as status_spb,
                    tso.no_spb, so.no_sales_order, tso.no_po,
                    tkdr.type_kendaraan,
                    usr.realname,
                    aprv.realname as approved_name,
                    rjct.realname as rejected_name
                From t_surat_jalan tsj
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join t_sales_order tso On (tsj.sales_order_id = tso.so_id) 
                    Left Join t_spb_fg tsf On (tso.jenis_barang = 'FG' and tsf.id = tso.no_spb)
                    Left Join t_spb_wip tsw On (tso.jenis_barang = 'WIP' and tsw.id = tso.no_spb)
                    Left Join spb s On (tso.jenis_barang = 'RONGSOK' and s.id = tso.no_spb)
                    Left Join sales_order so On (so.id = tso.so_id)
                    Left Join m_type_kendaraan tkdr On (tsj.m_type_kendaraan_id = tkdr.id) 
                    Left Join users usr On (tsj.created_by = usr.id)
                    Left Join users aprv On (tsj.approved_by = aprv.id)
                    Left Join users rjct On (tsj.rejected_by = rjct.id)
                    Where tsj.id=".$id);
        return $data;
    }

    function jenis_barang_in_so($id){
        $data = $this->db->query("select jb.id,jb.jenis_barang, jb.ukuran from t_sales_order_detail tsod 
            left join t_sales_order tso on tso.id = tsod.t_so_id
            left join jenis_barang jb on jb.id = tsod.jenis_barang_id
            where tso.so_id =".$id);
        return $data;
    }

    function rongsok_in_so($id){
        $data = $this->db->query("select r.id, r.nama_item as jenis_barang, r.kode_rongsok from t_sales_order_detail tsod 
            left join t_sales_order tso on tso.id = tsod.t_so_id
            left join rongsok r on r.id = tsod.jenis_barang_id
            where tso.so_id =".$id);
        return $data;
    }

    function load_detail_surat_jalan_fg($id){
        $data = $this->db->query("select tsjd.id, tsjd.t_sj_id, tsjd.jenis_barang_id, tsjd.jenis_barang_alias, tsjd.no_packing, tsjd.qty, tsjd.bruto, (case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end) as netto, tsjd.netto_r, tsjd.nomor_bobbin, tsjd.line_remarks, jb.jenis_barang, jb.uom, tgf.no_produksi, mb.berat
                from t_surat_jalan_detail tsjd
                left join jenis_barang jb on jb.id=(case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
                left join t_surat_jalan tsj on tsj.id = tsjd.t_sj_id
                left join t_gudang_fg tgf on tgf.id = tsjd.gudang_id
                left join m_bobbin mb on tgf.bobbin_id>0 and mb.id = tgf.bobbin_id
                where tsjd.t_sj_id =".$id);
        return $data;
    }

    function load_detail_surat_jalan_wip($id){
        $data = $this->db->query("select tsjd.*, jb.jenis_barang, jb.uom 
                from t_surat_jalan_detail tsjd
                left join jenis_barang jb on jb.id = tsjd.jenis_barang_id
                where tsjd.t_sj_id =".$id);
        return $data;
    }

    function load_detail_surat_jalan_rsk($id){
        $data = $this->db->query("select tsjd.*, rsk.nama_item as jenis_barang, rsk.uom 
                from t_surat_jalan_detail tsjd
                left join rongsok rsk on rsk.id = tsjd.jenis_barang_id
                where tsjd.t_sj_id =".$id);
        return $data;
    }

    function get_data_gudang_fg($id){
        $data = $this->db->query("select id_gudang from t_surat_jalan_detail where id =".$id);
        return $data;
    }

    function load_view_sjd($id){
        $data = $this->db->query("select tsjd.id, tsjd.t_sj_id, tsjd.jenis_barang_id, tsjd.jenis_barang_alias, tsjd.no_packing, tsjd.qty, tsjd.bruto, (case when tsjd.netto_r > 0 then tsjd.netto_r else tsjd.netto end) as netto, tsjd.netto_r, tsjd.nomor_bobbin, tsjd.line_remarks, jb.jenis_barang, jba.jenis_barang as jenis_barang_a, jb.uom 
                from t_surat_jalan_detail tsjd
                left join jenis_barang jb on jb.id= tsjd.jenis_barang_id
                left join jenis_barang jba on tsjd.jenis_barang_alias != 0 and jba.id = tsjd.jenis_barang_alias
                where tsjd.t_sj_id = ".$id);
        return $data;
    }

    function get_jb($id){
        $data = $this->db->query("select id, jenis_barang, kode from jenis_barang where id =".$id);
        return $data;
    }

    function get_rsk($id){
        $data = $this->db->query("Select * from rongsok where id =".$id);
        return $data;
    }
}