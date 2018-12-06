<?php
class Model_pengiriman_sample extends CI_Model{
    function list_data(){
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
                Where rs.module='PengirimanSample' 
                Order By rs.id Desc");
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
    
    function jenis_barang_list(){
        $data = $this->db->query("Select * From jenis_barang Order By jenis_barang");
        return $data;
    }
    
    function get_contact_name($id){
        $data = $this->db->query("Select * From m_customers Where id=".$id);
        return $data;
    }
    
    function show_header_rs($id){
        $data = $this->db->query("Select rs.*, 
                    cust.nama_customer, cust.pic, cust.alamat, cust.telepon,
                    users.realname As marketing,
                    appr.realname As approved_name,
                    rjct.realname As reject_name
                    From request_sample rs
                        Left Join m_customers cust On (rs.m_customer_id = cust.id) 
                        Left Join users On (rs.marketing_id = users.id)
                        Left Join users appr On (rs.approved_by = appr.id)
                        Left Join users rjct On (rs.rejected_by = rjct.id)
                    Where rs.id=".$id);
        return $data;
    }
    
    function load_detail($id){
        $data = $this->db->query("Select rsd.*, rsk.nama_item, rsk.uom 
                    From request_sample_detail rsd 
                Left Join rongsok rsk On(rsd.rongsok_id = rsk.id) 
                Where rsd.request_sample_id=".$id);
        return $data;
    }
    
    function skb_list(){
        $data = $this->db->query("Select skb.*, 
                    rs.no_request,
                    cst.nama_customer, cst.pic,
                    usr.realname As marketing,
                (Select count(skbd.id)As jumlah_item From skb_detail skbd Where skbd.skb_id = skb.id)As jumlah_item
                From skb 
                    Left Join request_sample rs On (skb.request_sample_id = rs.id)
                    Left Join m_customers cst On (rs.m_customer_id = cst.id) 
                    Left Join users usr On (rs.marketing_id = usr.id) 
                Where skb.request_sample_id>0
                Order By skb.id Desc");
        return $data;
    }
    
    function show_header_skb($id){
        $data = $this->db->query("Select skb.*, 
                    rs.no_request,
                    cst.nama_customer, cst.pic,
                    usr.realname As marketing
                From skb
                    Left Join request_sample rs On (skb.request_sample_id = rs.id)
                    Left Join m_customers cst On (rs.m_customer_id = cst.id) 
                    Left Join users usr On (rs.marketing_id = usr.id) 
                Where skb.id=".$id);
        return $data;
    }
    
    function show_detail_skb($id){
        $data = $this->db->query("Select skbd.*, rsk.nama_item, rsk.uom                        
                    From skb_detail skbd 
                        Left Join rongsok rsk On (skbd.rongsok_id = rsk.id) 
                    Where skbd.skb_id=".$id);
        return $data;
    } 
    
    function surat_jalan(){
        $data = $this->db->query("Select sj.*, 
                    cust.nama_customer, cust.alamat,
                    rs.no_request,
                    kdr.no_kendaraan
                From surat_jalan sj
                    Left Join m_customers cust On (sj.m_customer_id = cust.id)
                    Left Join request_sample rs On (sj.request_sample_id = rs.id) 
                    Left Join m_kendaraan kdr On (sj.m_kendaraan_id = kdr.id) 
                Where sj.request_sample_id>0 
                Order By sj.id Desc");
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
    
    function get_rs_list($id){
        $data = $this->db->query("Select * From request_sample Where m_customer_id=".$id);
        return $data;
    }
    
    function show_header_sj($id){
        $data = $this->db->query("Select sj.*, 
                    cust.nama_customer, cust.alamat,
                    rs.no_request,
                    kdr.no_kendaraan,
                    tkdr.type_kendaraan,
                    usr.realname
                From surat_jalan sj
                    Left Join m_customers cust On (sj.m_customer_id = cust.id)
                    Left Join request_sample rs On (sj.request_sample_id = rs.id) 
                    Left Join m_kendaraan kdr On (sj.m_kendaraan_id = kdr.id) 
                    Left Join m_type_kendaraan tkdr On (kdr.m_type_kendaraan_id = tkdr.id) 
                    Left Join users usr On (sj.created_by = usr.id)
                    Where sj.id=".$id);
        return $data;
    }
    
    function load_detail_surat_jalan($id){
        $data = $this->db->query("Select sjd.*, ampas.nama_item, ampas.uom                   
                From surat_jalan_detail sjd 
                    Left Join ampas On(sjd.ampas_id = ampas.id)                   
                Where sjd.surat_jalan_id=".$id);
        return $data;
    }

}