<?php
class Model_cuci_kawat_hitam extends CI_Model{
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
                Where spb.jenis_barang='Kawat Hitam' And module='Cuci'
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
                (Select count(skbd.id)As jumlah_item From skb_detail skbd Where skbd.skb_id = skb.id)As jumlah_item,
                (Select Count(skbd.id)As ready_to_dtr From skb_detail skbd Where 
                    skbd.skb_id = skb.id And skbd.flag_dtr=0)As ready_to_dtr
                From skb 
                    Left Join spb On (skb.spb_id = spb.id)
                    Left Join users pmh On (spb.created_by = pmh.id) 
                    Left Join users usr On (skb.created_by = usr.id) 
                Where skb.jenis_barang='KAWAT HITAM' And spb.module='Cuci'
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
        
    function dtr_list(){
        $data = $this->db->query("Select dtr.*, 
                    skb.no_skb, 
                    usr.realname As penimbang,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item,
                (Select Count(dtrd.id)As ready_to_ttr From dtr_detail dtrd Where 
                    dtrd.dtr_id = dtr.id And dtrd.flag_ttr=0)As ready_to_ttr
                From dtr
                    Left Join skb On (dtr.skb_id = skb.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                Where dtr.skb_id>0 And dtr.jenis_barang='KAWAT HITAM'
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_dtr($id){
        $data = $this->db->query("Select dtr.*, 
                    skb.no_skb,
                    usr.realname As penimbang
                    From dtr
                        Left Join skb On (dtr.skb_id = skb.id)
                        Left Join users usr On (dtr.created_by = usr.id) 
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
                    skb.no_skb,
                (Select count(ttrd.id) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As jumlah_item,
                (Select Sum(ttrd.bruto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As bruto, 
                (Select Sum(ttrd.netto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As netto
                From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id) 
                    Left Join skb On (dtr.skb_id = skb.id)
                Where dtr.skb_id>0 And dtr.jenis_barang='KAWAT HITAM'
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_ttr($id){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr,
                    skb.no_skb
                    From ttr 
                        Left Join dtr On (ttr.dtr_id = dtr.id) 
                        Left Join skb On (dtr.skb_id = skb.id)
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
    
}