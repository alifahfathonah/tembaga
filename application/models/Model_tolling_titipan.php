<?php
class Model_tolling_titipan extends CI_Model{
    function so_list(){
        $data = $this->db->query("Select so.*, 
                    usr.realname As nama_marketing,
                    cust.nama_customer, cust.pic,
                (Select count(fi.id) from f_invoice fi where fi.id_sales_order = so.id) as invoice,
                (Select count(sod.id)As jumlah_item From sales_order_detail sod Where sod.sales_order_id = so.id)As jumlah_item
                From sales_order so
                    Left Join m_customers cust On (so.m_customer_id = cust.id) 
                    Left Join users usr on (usr.id = so.marketing_id)
                Where flag_tolling > 0
                Order By so.id Desc");
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

    function get_uom($id){
        $data = $this->db->query("Select uom from jenis_barang where id=".$id);
        return $data;
    }
    
    function show_header_so($id){
        $data = $this->db->query("Select so.*, tso.id as id_tso, tso.no_po, tso.jenis_barang, tso.no_spb,
                    cust.nama_customer, cust.pic, cust.alamat, cust.telepon, tsf.no_spb as nomor_spb
                    From sales_order so
                        Left Join t_sales_order tso on tso.so_id = so.id
                        Left Join t_spb_fg tsf on tsf.id = tso.no_spb
                        Left Join m_customers cust On (so.m_customer_id = cust.id)
                    Where so.id=".$id);
        return $data;
    }
    
    function load_detail($id){
        $data = $this->db->query("Select dtrd.*, rsk.nama_item, rsk.uom
                    From dtr_detail dtrd 
                        Left Join rongsok rsk On (dtrd.rongsok_id = rsk.id) 
                    Where dtrd.dtr_id=".$id);
        return $data;
    }

    function load_detail_edit($id){
        $data = $this->db->query("Select sod.*, jb.jenis_barang, jb.uom From sales_order_detail sod 
                Left Join jenis_barang jb On(sod.jenis_barang_id = jb.id) 
                Where sod.sales_order_id=".$id);
        return $data;
    }

    function load_detail_saved($id){
        $data = $this->db->query("Select dd.*, rsk.nama_item, rsk.uom From dtr_detail dd
                Left Join dtr on dtr.id=dd.dtr_id
                Left Join rongsok rsk On(dd.rongsok_id = rsk.id) 
                Where dtr.so_id =".$id);
        return $data;
    }
    
    function show_detail_so($id){
        $data = $this->db->query("Select sod.*, jb.jenis_barang,jb.uom
                    From sales_order_detail sod 
                        Left Join jenis_barang jb On (sod.jenis_barang_id = jb.id) 
                    Where sod.sales_order_id=".$id);
        return $data;
    }

    function get_dtr_approve($id){
        $data = $this->db->query("Select dtr.*,  
                    mc.nama_customer,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join m_customers mc On (dtr.customer_id = mc.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                    Left Join users app On (dtr.approved_by = app.id) 
                    Left Join users rjct On (dtr.rejected_by = rjct.id) 
                Where dtr.so_id=".$id);
        return $data;
    }

    function get_dtr($c_id){
        $data = $this->db->query("Select dtr.*,  
                    mc.nama_customer,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join m_customers mc On (dtr.customer_id = mc.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                    Left Join users app On (dtr.approved_by = app.id) 
                    Left Join users rjct On (dtr.rejected_by = rjct.id) 
                Where dtr.customer_id=".$c_id." and status = 0");
        return $data;
    }

    function check_so_dtr($id){
        $data = $this->db->query("select so.id,
                (select sum(ddtl.netto) from dtr_detail ddtl left join dtr on ddtl.dtr_id = dtr.id 
                where dtr.so_id = so.id and dtr.status=1)as tot_netto,
                (select sum(sod.netto) from sales_order_detail sod left join sales_order so on 
                 sod.sales_order_id = so.id) as tot_qty
                from sales_order so
                where so.id =".$id);
        return $data;
    }

    function dtr_list(){
        $data = $this->db->query("Select dtr.*, 
                    so.no_sales_order, 
                    cust.nama_customer,
                    usr.realname As penimbang,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join sales_order so On (dtr.so_id = so.id) 
                    Left Join m_customers cust On (so.m_customer_id = cust.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                Where dtr.customer_id!=0 
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_dtr($id){
        $data = $this->db->query("Select dtr.*, 
                    so.no_sales_order,
                    cust.nama_customer,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name
                    From dtr
                        Left Join sales_order so On (dtr.so_id = so.id)
                        Left Join m_customers cust On (so.m_customer_id = cust.id) 
                        Left Join users usr On (dtr.created_by = usr.id) 
                        Left Join users app On (dtr.approved_by = app.id) 
                        Left Join users rjct On (dtr.rejected_by = rjct.id) 
                    Where dtr.id=".$id);
        return $data;
    }
    
    function show_detail_dtr($id){
        $data = $this->db->query("Select dtrd.*, rsk.nama_item, rsk.uom
                    From dtr_detail dtrd 
                        Left Join rongsok rsk On (dtrd.rongsok_id = rsk.id) 
                    Where dtrd.dtr_id=".$id);
        return $data;
    }
    
    function ttr_list(){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr,
                    so.no_sales_order, 
                    cust.nama_customer,
                (Select count(ttrd.id) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As jumlah_item,
                (Select Sum(ttrd.bruto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As bruto, 
                (Select Sum(ttrd.netto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As netto
                From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id) 
                    Left Join sales_order so On (dtr.so_id = so.id) 
                    Left Join m_customers cust On (so.m_customer_id = cust.id) 
                Where dtr.so_id>0 
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_ttr($id){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr,
                    so.no_sales_order,
                    cust.nama_customer
                    From ttr 
                        Left Join dtr On (ttr.dtr_id = dtr.id) 
                        Left Join sales_order so On (dtr.so_id = so.id)
                        Left Join m_customers cust On (so.m_customer_id = cust.id) 
                    Where ttr.id=".$id);
        return $data;
    }
    
    function show_detail_ttr($id){
        $data = $this->db->query("Select ttrd.*, rsk.nama_item, rsk.uom
                    From ttr_detail ttrd 
                        Left Join rongsok rsk On (ttrd.rongsok_id = rsk.id) 
                    Where ttrd.ttr_id=".$id);
        return $data;
    }
    
    function produksi_ampas(){
        $data = $this->db->query("Select pa.*, 
                    usr.realname As pic,
                    ttr.no_ttr,
                (Select count(pad.id)As jumlah_item From produksi_ampas_detail pad Where pad.produksi_ampas_id = pa.id)As jumlah_item
                From produksi_ampas pa
                    Left Join ttr On (pa.ttr_id = ttr.id)
                    Left Join users usr On (pa.created_by = usr.id) 
                Where pa.jenis_barang='Ampas' And pa.ttr_id>0
                Order By pa.id Desc");
        return $data;
    }
    
    function get_ttr_to_pa(){
        $data = $this->db->query("Select ttr.id, ttr.no_ttr From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id)
                Where ttr.flag_produksi=0 
                    And dtr.so_id>0 
                Order By ttr.no_ttr");
        return $data;
    }
    
    function jenis_barang_fg(){
        $data = $this->db->query("Select id, jenis_barang from jenis_barang where category ='FG'");
        return $data;
    }

    function jenis_barang_in_so($id){
        $data = $this->db->query("select jb.id,jb.jenis_barang from sales_order_detail sod 
            left join jenis_barang jb on jb.id = sod.jenis_barang_id
            where sod.sales_order_id =".$id);
        return $data;
    }

    function jenis_barang_list(){
        $data = $this->db->query("Select * From jenis_barang Order By jenis_barang");
        return $data;
    }
    
    function show_header_pa($id){
        $data = $this->db->query("Select pa.*, 
                    ttr.no_ttr,
                    usr.realname As pic
                    From produksi_ampas pa
                        Left Join ttr On (pa.ttr_id = ttr.id) 
                        Left Join users usr On (pa.created_by = usr.id)
                    Where pa.id=".$id);
        return $data;
    }
    
    function load_detail_produksi_ampas($id){
        $data = $this->db->query("Select pad.*, ampas.nama_item, ampas.uom From produksi_ampas_detail pad 
                Left Join ampas On(pad.ampas_id = ampas.id) 
                Where pad.produksi_ampas_id=".$id);
        return $data;
    }
    
    function surat_jalan(){
        $data = $this->db->query("Select tsj.*, (select count(tsjd.id) from t_surat_jalan_detail tsjd where tsjd.t_sj_id = tsj.id) as jumlah_item,
                    cust.nama_customer, cust.alamat,
                    so.no_sales_order, fi.id as inv
                From t_surat_jalan tsj
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join sales_order so On (tsj.sales_order_id = so.id)
                    Left Join f_invoice fi on (fi.id_surat_jalan = tsj.id)
                Where jenis_barang = 'FG' and so.flag_tolling > 0
                Order By tsj.id Desc");
        return $data;
    }
    
    function get_so_to_sj(){
        $data = $this->db->query("Select id, no_sales_order From sales_order Order By no_sales_order");
        return $data;
    }
    
    function kendaraan_list(){
        $data = $this->db->query("Select * From m_kendaraan Order By no_kendaraan");
        return $data;
    }

    function type_kendaraan_list(){
        $data = $this->db->query("Select * from m_type_kendaraan");
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
    
    function get_so_list($id){
        $data = $this->db->query("Select so.* From sales_order so
                Where so.flag_tolling > 0 and so.m_customer_id=".$id);
        return $data;
    }

    function get_jenis_barang($id){
        $data = $this->db->query("Select tso.jenis_barang from sales_order so
                left join t_sales_order tso on tso.so_id = so.id
                where so.id=".$id);
        return $data;
    }

    function list_item_sj_fg($soid){
        $data = $this->db->query("select tgf.id, jb.jenis_barang, jb.uom from t_sales_order tso
                left join t_gudang_fg tgf on tgf.t_spb_fg_id = tso.no_spb
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tso.so_id = ".$soid." and flag_taken = 0");
        return $data;
    }
    
    function show_header_sj($id){
        $data = $this->db->query("Select tsj.*, cust.id as id_customer,
                    cust.nama_customer, cust.alamat,
                    tso.no_spb, so.no_sales_order, tso.no_po, tsf.no_spb as nomor_spb,
                    tkdr.type_kendaraan,
                    usr.realname,
                    aprv.realname as approved_name,
                    rjct.realname as rejected_name
                From t_surat_jalan tsj
                    Left Join m_customers cust On (tsj.m_customer_id = cust.id)
                    Left Join t_sales_order tso On (tsj.sales_order_id = tso.so_id) 
                    Left Join t_spb_fg tsf On (tsf.id = tso.no_spb)
                    Left Join sales_order so On (so.id = tso.so_id)
                    Left Join m_type_kendaraan tkdr On (tsj.m_type_kendaraan_id = tkdr.id) 
                    Left Join users usr On (tsj.created_by = usr.id)
                    Left Join users aprv On (tsj.approved_by = aprv.id)
                    Left Join users rjct On (tsj.rejected_by = rjct.id)
                    Where tsj.id=".$id);
        return $data;
    }
    
    function list_no_produksi(){
        $data = $this->db->query("Select id, no_produksi From produksi_ampas Order By no_produksi");
        return $data;
    }
    
    function load_detail_surat_jalan($id){
        $data = $this->db->query("select tsjd.*, jb.jenis_barang, jb.uom from t_surat_jalan_detail tsjd
                left join jenis_barang jb on jb.id = tsjd.jenis_barang_id
                where tsjd.t_sj_id =".$id);
        return $data;
    }

    /**function list_data_on_so($id){
        $data = $this->db->query("Select rongsok.id,rongsok.uom,rongsok.nama_item From sales_order_detail sod
                left join rongsok on rongsok.id = sod.rongsok_id
                Where type_barang='Rongsok' And
                sod.sales_order_id = ".$id."
                group by rongsok.id
                Order By nama_item");
        return $data;
    }**/

    // function get_uom($id){
    //     $data = $this->db->query("Select rongsok.id,rongsok.uom,rongsok.nama_item From rongsok where id=".$id);
    //     return $data;
    // }

    function save_dtr_detail($id){
        $data = $this->db->query("select dtr_id, so_id, rongsok_id FROM `dtr_detail` where so_id =".$id." group by rongsok_id");
        return $data;
    }

    function tolling_fg(){
        $data = $this->db->query("Select tf.*, 
                    usr.realname As nama_marketing,
                    cust.nama_customer, cust.pic,
                    so.no_sales_order, tsf.no_spb,
                    tsf.status as status_spb,
                    (Select count(tfd.id)As jumlah_item From tolling_fg_detail tfd Where tfd.tolling_fg_id = tf.id)As jumlah_item
                From tolling_fg tf
                    Left Join m_customers cust On (tf.m_customer_id = cust.id) 
                    Left Join users usr On (tf.marketing_id = usr.id) 
                    Left Join sales_order so on (so.id = tf.so_id)
                    Left Join t_spb_fg tsf on (tsf.id = tf.no_spb_fg)");
        return $data;
    }

    function select_so(){
        $data = $this->db->query("select * from sales_order so 
            where so.flag_ppn = 0 and not exists
        ( select so_id from tolling_fg tf where tf.so_id = so.id )");
        return $data;
    }

    /**function get_detail_so($id){
        $data = $this->db->query("select so.*, 
            usr.realname As nama_marketing,
            cust.nama_customer, cust.pic, 
            (Select count(sod.id)As jumlah_item From sales_order_detail sod Where sod.sales_order_id = so.id)As jumlah_item,
            (Select Sum(ttrd.netto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As netto from sales_order so
        left join dtr on (dtr.so_id = so.id)
        left join ttr on (ttr.dtr_id = dtr.id)
        left join ttr_detail ttrd on (ttrd.ttr_id  = ttr.id)
        left Join m_customers cust On (so.m_customer_id = cust.id) 
        left Join users usr On (so.marketing_id = usr.id)
        Where so.id =".$id." limit 1");
        return $data;
    }**/

    function show_header_tolling_fg($id){
        $data = $this->db->query("Select tf.*, 
                    usr.realname As nama_marketing,
                    cust.nama_customer, cust.pic,
                    so.no_sales_order, tsf.no_spb
                From tolling_fg tf
                    Left Join m_customers cust On (tf.m_customer_id = cust.id) 
                    Left Join users usr On (tf.marketing_id = usr.id) 
                    Left Join sales_order so on (so.id = tf.so_id)
                    Left Join t_spb_fg tsf on (tsf.id = tf.no_spb_fg)
                Where tf.id =".$id);
        return $data;
    }

    function show_detail_tolling_fg($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom from tolling_fg tf
        left join t_gudang_fg tgf on tgf.t_spb_fg_id = tf.no_spb_fg
        left join jenis_barang jb on jb.id = tgf.jenis_barang_id
        where tf.id =".$id." order by tgf.jenis_barang_id");
        return $data;
    }

    function get_barang_fg(){
        $data = $this->db->query("select * from  jenis_barang where category = 'FG'");
        return  $data;
    }

    function load_tolling_detail($id){
        $data = $this->db->query("Select tfd.*, jb.jenis_barang, jb.uom
                From tolling_fg_detail tfd 
                Left Join jenis_barang jb On(jb.id = tfd.jenis_barang_id)
                Where tfd.tolling_fg_id =".$id);
        return $data;
    }

    function get_uom_tolling($id){
        $data = $this->db->query("Select uom from jenis_barang where id=".$id);
        return $data;
    }

    function load_tolling_loop($id){
        $data = $this->db->query("select tfd.*, tf.no_spb_fg, jb.uom from tolling_fg_detail tfd
        left join tolling_fg tf on tf.id = tfd.tolling_fg_id
        left join jenis_barang jb on jb.id = tfd.jenis_barang_id
        where tfd.tolling_fg_id =".$id);
        return $data;
    }

    function get_data_fg($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom from t_gudang_fg tgf
        left join jenis_barang jb on jb.id = tgf.jenis_barang_id
        where tgf.id = ".$id);
        return $data;
    }

    function get_data_gudang_fg($id){
        $data = $this->db->query("select t_gudang_fg_id from t_surat_jalan_detail where id =".$id);
        return $data;
    }

    function cek_balance_list(){
        $data = $this->db->query("Select tf.*, 
                    usr.realname As nama_marketing,
                    cust.nama_customer, cust.pic,
                    sum(tf.netto)as jumlah_netto,
                    count(tf.id)as jumlah_tolling,
                    (Select count(tsj.id)As sj_item From t_surat_jalan tsj Where tsj.m_customer_id = tf.m_customer_id )As sj_item,
                    (Select sum(tsjd.netto)As tsjd_item From t_surat_jalan_detail tsjd left join t_surat_jalan tsj on tsjd.t_sj_id = tsj.id where tsj.m_customer_id= tf.m_customer_id) As sj_detail_netto
                From tolling_fg tf
                    Left Join m_customers cust On (tf.m_customer_id = cust.id) 
                    Left Join users usr On (tf.marketing_id = usr.id)
                group by tf.m_customer_id");
        return $data;
    }

    function view_balance($id){
        $data = $this->db->query("Select tf.*, 
                    usr.realname As nama_marketing,
                    cust.nama_customer, cust.pic,
                    so.no_sales_order, tsf.no_spb,
                    tsf.status as status_spb,
                    (Select count(tfd.id)As jumlah_item From tolling_fg_detail tfd Where tfd.tolling_fg_id = tf.id)As jumlah_item
                From tolling_fg tf
                    Left Join m_customers cust On (tf.m_customer_id = cust.id) 
                    Left Join users usr On (tf.marketing_id = usr.id) 
                    Left Join sales_order so on (so.id = tf.so_id)
                    Left Join t_spb_fg tsf on (tsf.id = tf.no_spb_fg)
                where so.m_customer_id =".$id);
        return $data;
    }
}