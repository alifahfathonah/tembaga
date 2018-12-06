<?php
class Model_beli_sparepart extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select bsp.*, 
                usr.realname,
                aprv.realname As approve_name,
                (Select count(id)As jumlah_item From beli_sparepart_detail bspd Where bspd.beli_sparepart_id = bsp.id)As jumlah_item,
                (Select Count(bspd.id)As ready_to_create From beli_sparepart_detail bspd Where 
                    bspd.beli_sparepart_id = bsp.id And bspd.flag_po=0)As ready_to_create
                From beli_sparepart bsp
                    Left Join users usr On (bsp.created_by = usr.id) 
                    Left Join users aprv On (bsp.approved_by = aprv.id) 
                Order By bsp.no_pengajuan Desc");
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select bsp.*, 
                crt.realname As created_name,
                aprv.realname As approve_name                
                From beli_sparepart bsp
                    Left Join users crt On (bsp.created_by = crt.id) 
                    Left Join users aprv On (bsp.rejected_by = aprv.id) 
                Where bsp.id=".$id);        
        return $data;
    }
    
    function load_detail($id){
        $data = $this->db->query("Select bsd.*, part.nama_item, part.uom From beli_sparepart_detail bsd 
                Left Join sparepart part On(bsd.sparepart_id = part.id) 
                Where bsd.beli_sparepart_id=".$id);
        return $data;
    }
    
    function supplier_list(){
        $data = $this->db->query("Select * From supplier Order By nama_supplier");
        return $data;
    }
    
    function get_contact_name($id){
        $data = $this->db->query("Select * From supplier Where id=".$id);
        return $data;
    }
    
    function load_detail_pp($id){
        $data = $this->db->query("Select bsd.*, part.nama_item, part.uom From beli_sparepart_detail bsd 
                Left Join sparepart part On(bsd.sparepart_id = part.id) 
                Where bsd.beli_sparepart_id=".$id." And bsd.flag_po=0");
        return $data;
    }
    
    function po_list(){
        $data = $this->db->query("Select po.*, 
                    bsp.no_pengajuan, bsp.tgl_pengajuan,
                    usr.realname As created_name,
                    spl.nama_supplier,
                (Select count(id)As jumlah_item From po_detail pd Where pd.po_id = po.id)As jumlah_item,
                (Select Count(pd.id)As ready_to_lpb From po_detail pd Where 
                    pd.po_id = po.id And pd.flag_lpb=0)As ready_to_lpb
                From po 
                    Left Join beli_sparepart bsp On (po.beli_sparepart_id = bsp.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (bsp.created_by = usr.id) 
                Where po.jenis_po='Sparepart' 
                Order By po.id Desc");
        return $data;
    }
    
    function show_header_po($id){
        $data = $this->db->query("Select po.*, bsp.no_pengajuan, bsp.approved,
                    spl.nama_supplier, spl.pic,
                    usr.realname As approved_name
                    From po 
                        Left Join beli_sparepart bsp On (po.beli_sparepart_id = bsp.id) 
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users usr On (bsp.approved_by = usr.id)
                    Where po.id=".$id);
        return $data;
    }
    
    function show_detail_po($id){
        $data = $this->db->query("Select pod.*, spr.nama_item, spr.uom
                    From po_detail pod 
                        Left Join sparepart spr On (pod.sparepart_id = spr.id) 
                    Where pod.po_id=".$id);
        return $data;
    }
    
    function bpb_list(){
        $data = $this->db->query("Select lpb.*, 
                    po.no_po, 
                    spl.nama_supplier,
                    usr.realname As penerima,
                (Select count(lpbd.id)As jumlah_item From lpb_detail lpbd Where lpbd.lpb_id = lpb.id)As jumlah_item
                From lpb 
                    Left Join po On (lpb.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (lpb.created_by = usr.id) 
                Order By lpb.id Desc");
        return $data;
    }
    
    function show_header_bpb($id){
        $data = $this->db->query("Select lpb.*, 
                    po.no_po,
                    spl.nama_supplier,
                    usr.realname As penerima
                    From lpb
                        Left Join po On (lpb.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users usr On (lpb.created_by = usr.id) 
                    Where lpb.id=".$id);
        return $data;
    }
    
    function show_detail_bpb($id){
        $data = $this->db->query("Select lpbd.*, spr.nama_item, spr.uom
                    From lpb_detail lpbd 
                        Left Join sparepart spr On (lpbd.sparepart_id = spr.id) 
                    Where lpbd.lpb_id=".$id);
        return $data;
    }
}