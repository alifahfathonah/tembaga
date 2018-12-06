<?php
class Model_ingot_rendah extends CI_Model{
    function po_list(){
        $data = $this->db->query("Select po.*, 
                    spl.nama_supplier, spl.pic,
                (Select count(id)As jumlah_item From po_detail pd Where pd.po_id = po.id)As jumlah_item,
                (Select Count(pd.id)As ready_to_dtr From po_detail pd Where 
                    pd.po_id = po.id And pd.flag_dtr=0)As ready_to_dtr
                From po 
                    Left Join beli_sparepart bsp On (po.beli_sparepart_id = bsp.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                Where po.jenis_po='Ingot Rendah' 
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
    
    function list_ingot_rendah(){
        $data = $this->db->query("Select * From rongsok Where type_barang='Ingot Rendah' Order By nama_item");
        return $data;
    }
    
    function show_detail_po($id){
        $data = $this->db->query("Select pod.*, rsk.nama_item, rsk.uom
                    From po_detail pod 
                        Left Join rongsok rsk On (pod.rongsok_id = rsk.id) 
                    Where pod.po_id=".$id);
        return $data;
    }
    
    function load_detail($id){
        $data = $this->db->query("Select pod.*, rsk.nama_item, rsk.uom From po_detail pod 
                Left Join rongsok rsk On(pod.rongsok_id = rsk.id) 
                Where pod.po_id=".$id);
        return $data;
    }
    
    function dtr_list(){
        $data = $this->db->query("Select dtr.*, 
                    po.no_po, 
                    spl.nama_supplier,
                    usr.realname As penimbang,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item,
                (Select Count(dtrd.id)As ready_to_ttr From dtr_detail dtrd Where 
                    dtrd.dtr_id = dtr.id And dtrd.flag_ttr=0)As ready_to_ttr
                From dtr
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                Where po_id>0 And dtr.jenis_barang='INGOT RENDAH'
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_dtr($id){
        $data = $this->db->query("Select dtr.*, 
                    po.no_po,
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    rjct.realname As rejected_name
                    From dtr
                        Left Join po On (dtr.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users usr On (dtr.created_by = usr.id) 
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
                    po.no_po, 
                    spl.nama_supplier,
                (Select count(ttrd.id) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As jumlah_item,
                (Select Sum(ttrd.bruto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As bruto, 
                (Select Sum(ttrd.netto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As netto
                From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id) 
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                Where dtr.po_id>0 And po.jenis_po='Ingot Rendah'
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_ttr($id){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr,
                    po.no_po,
                    spl.nama_supplier
                    From ttr 
                        Left Join dtr On (ttr.dtr_id = dtr.id) 
                        Left Join po On (dtr.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
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
    
    function get_data_pelunasan($id){
        $data = $this->db->query("Select ttr.id,
                    ttr.no_ttr,
                    dtr.no_dtr,
                    dtr.po_id,
                    po.no_po,
                    po.tanggal,
                    po.supplier_id,
                    supplier.nama_supplier,
                    (Select Sum(po_detail.total_amount) From po_detail Where po_detail.po_id = po.id)As nilai_po
                From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id) 
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier On (po.supplier_id = supplier.id)
                Where ttr.id=".$id);
        return $data;
    }
}