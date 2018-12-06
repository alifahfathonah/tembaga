<?php
class Model_tolling_titipan extends CI_Model{
    function so_list(){
        $data = $this->db->query("Select so.*, 
                    usr.realname As nama_marketing,
                    cust.nama_customer, cust.pic,
                (Select count(sod.id)As jumlah_item From sales_order_detail sod Where sod.sales_order_id = so.id)As jumlah_item,
                (Select Count(sod.id)As ready_to_dtr From sales_order_detail sod Where 
                    sod.sales_order_id = so.id And sod.flag_dtr=0)As ready_to_dtr
                From sales_order so
                    Left Join m_customers cust On (so.m_customer_id = cust.id) 
                    Left Join users usr On (so.marketing_id = usr.id) 
                Where so.jenis_barang_id='4' 
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
    
    function show_header_so($id){
        $data = $this->db->query("Select so.*, 
                    cust.nama_customer, cust.pic, cust.alamat, cust.telepon
                    From sales_order so
                        Left Join m_customers cust On (so.m_customer_id = cust.id) 
                    Where so.id=".$id);
        return $data;
    }
    
    function load_detail($id){
        $data = $this->db->query("Select sod.*, rsk.nama_item, rsk.uom From sales_order_detail sod 
                Left Join rongsok rsk On(sod.rongsok_id = rsk.id) 
                Where sod.sales_order_id=".$id);
        return $data;
    }
    
    function show_detail_so($id){
        $data = $this->db->query("Select sod.*, rsk.nama_item, rsk.uom
                    From sales_order_detail sod 
                        Left Join rongsok rsk On (sod.rongsok_id = rsk.id) 
                    Where sod.sales_order_id=".$id);
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
                Where dtr.so_id>0 
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
        $data = $this->db->query("Select sj.*, 
                    cust.nama_customer, cust.alamat,
                    so.no_sales_order,
                    kdr.no_kendaraan
                From surat_jalan sj
                    Left Join m_customers cust On (sj.m_customer_id = cust.id)
                    Left Join sales_order so On (sj.sales_order_id = so.id) 
                    Left Join m_kendaraan kdr On (sj.m_kendaraan_id = kdr.id) 
                Where sj.sales_order_id>0 
                Order By sj.id Desc");
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
        $data = $this->db->query("Select * From sales_order Where m_customer_id=".$id);
        return $data;
    }
    
    function show_header_sj($id){
        $data = $this->db->query("Select sj.*, 
                    cust.nama_customer, cust.alamat,
                    so.no_sales_order,
                    kdr.no_kendaraan,
                    tkdr.type_kendaraan,
                    usr.realname
                From surat_jalan sj
                    Left Join m_customers cust On (sj.m_customer_id = cust.id)
                    Left Join sales_order so On (sj.sales_order_id = so.id) 
                    Left Join m_kendaraan kdr On (sj.m_kendaraan_id = kdr.id) 
                    Left Join m_type_kendaraan tkdr On (kdr.m_type_kendaraan_id = tkdr.id) 
                    Left Join users usr On (sj.created_by = usr.id)
                    Where sj.id=".$id);
        return $data;
    }
    
    function list_no_produksi(){
        $data = $this->db->query("Select id, no_produksi From produksi_ampas Order By no_produksi");
        return $data;
    }
    
    function load_detail_surat_jalan($id){
        $data = $this->db->query("Select sjd.*, ampas.nama_item, ampas.uom,
                    pa.no_produksi                    
                From surat_jalan_detail sjd 
                    Left Join ampas On(sjd.ampas_id = ampas.id) 
                    Left Join produksi_ampas pa On (sjd.produksi_ampas_id = pa.id)                    
                Where sjd.surat_jalan_id=".$id);
        return $data;
    }

}