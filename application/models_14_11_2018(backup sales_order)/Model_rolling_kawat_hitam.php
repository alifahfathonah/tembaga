<?php
class Model_rolling_kawat_hitam extends CI_Model{
    function spb_list(){        
        $data = $this->db->query("Select spb.*, 
                    usr.realname As pic,
                    rjct.realname As reject_name,
                    aprv.realname As approved_name,
                (Select count(spbd.id)As jumlah_item From spb_detail spbd Where spbd.spb_id = spb.id)As jumlah_item,
                (Select Count(spbd.id)As ready_to_skb From spb_detail spbd Where 
                    spbd.spb_id = spb.id And spbd.flag_skb=0)As ready_to_skb
                From spb
                    Left Join users usr On (spb.created_by = usr.id) 
                    Left Join users rjct On (spb.rejected_by = rjct.id)
                    Left Join users aprv On (spb.approved_by = aprv.id) 
                Where spb.jenis_barang='Kawat Hitam' And module='Rolling'
                Order By spb.id Desc");
        return $data;
    }
    
    function jenis_barang_list(){
        $data = $this->db->query("Select * From jenis_barang Order By jenis_barang");
        return $data;
    }
    
    function show_header_spb($id){
        $data = $this->db->query("Select spb.*, 
                    usr.realname As pic,
                    appr.realname As approved_name,
                    rjct.realname As reject_name
                    From spb
                        Left Join users usr On (spb.created_by = usr.id) 
                        Left Join users appr On (spb.approved_by = appr.id)
                        Left Join users rjct On (spb.rejected_by = rjct.id)
                    Where spb.id=".$id);
        return $data;
    }       
    
    function load_detail($id){
        $data = $this->db->query("Select spbd.*, rsk.nama_item, rsk.uom From spb_detail spbd 
                Left Join rongsok rsk On(spbd.rongsok_id = rsk.id) 
                Where spbd.spb_id=".$id);
        return $data;
    }

    function skb_list(){
        $data = $this->db->query("Select skb.*, 
                    spb.no_spb,
                    pmh.realname As pemohon,
                    usr.realname As pic,
                (Select count(skbd.id)As jumlah_item From skb_detail skbd Where skbd.skb_id = skb.id)As jumlah_item
                From skb 
                    Left Join spb On (skb.spb_id = spb.id)
                    Left Join users pmh On (spb.created_by = pmh.id) 
                    Left Join users usr On (skb.created_by = usr.id) 
                Where skb.jenis_barang='KAWAT HITAM' And spb.module='Rolling'
                Order By skb.id Desc");
        return $data;
    }
    
    function show_header_skb($id){
        $data = $this->db->query("Select skb.*, 
                    spb.no_spb,
                    pmh.realname As pemohon,
                    usr.realname As pic
                From skb
                    Left Join spb On (skb.spb_id = spb.id)
                    Left Join users pmh On (spb.created_by = pmh.id) 
                    Left Join users usr On (skb.created_by = usr.id) 
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
        
    function hasil_produksi(){
        $data = $this->db->query("Select pa.*, 
                    usr.realname As pic,
                    skb.no_skb,
                (Select count(pad.id)As jumlah_item From produksi_ampas_detail pad Where pad.produksi_ampas_id = pa.id)As jumlah_item
                From produksi_ampas pa
                    Left Join skb On (pa.skb_id = skb.id)
                    Left Join users usr On (pa.created_by = usr.id) 
                Where pa.jenis_barang='Kawat Hitam' And pa.skb_id>0
                Order By pa.id Desc");
        return $data;
    }
    
    function get_skb_list(){
        $data = $this->db->query("Select id, no_skb From skb 
                Where flag_produksi=0 And skb.jenis_barang='KAWAT HITAM'
                Order By no_skb");
        return $data;
    }
    
    function show_header_pa($id){
        $data = $this->db->query("Select pa.*, 
                    skb.no_skb,
                    usr.realname As pic
                    From produksi_ampas pa
                        Left Join skb On (pa.skb_id = skb.id) 
                        Left Join users usr On (pa.created_by = usr.id)
                    Where pa.id=".$id);
        return $data;
    }
    
    function load_detail_produksi($id){
        $data = $this->db->query("Select pad.*, rsk.nama_item, rsk.uom,
                    bobin.nama_bobin
                    From produksi_ampas_detail pad 
                Left Join rongsok rsk On(pad.rongsok_id = rsk.id)
                Left Join bobin On (pad.bobin_id = bobin.id)
                Where pad.produksi_ampas_id=".$id);
        return $data;
    }   
    
    function get_list_bobin(){
        $data = $this->db->query("Select * From bobin Where status=0 Order By nama_bobin");
        return $data;
    }
    
    function get_detail_produksi($id){
        $data = $this->db->query("Select * From produksi_ampas_detail Where id=".$id);
        return $data;
    }
    
}