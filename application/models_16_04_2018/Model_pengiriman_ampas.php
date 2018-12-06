<?php
class Model_pengiriman_ampas extends CI_Model{
    function po_list(){
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
    
    function load_detail($id){
        $data = $this->db->query("Select pod.*, ampas.nama_item, ampas.uom From po_detail pod 
                Left Join ampas On(pod.ampas_id = ampas.id) 
                Where pod.po_id=".$id);
        return $data;
    }
    
    function dtr_list(){
        $data = $this->db->query("Select dtr.*, 
                    po.no_po, 
                    spl.nama_supplier,
                    usr.realname As penimbang,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                Where dtr.po_id>0 And dtr.jenis_barang='AMPAS' 
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_dtr($id){
        $data = $this->db->query("Select dtr.*, 
                    po.no_po,
                    spl.nama_supplier,
                    usr.realname As penimbang
                    From dtr
                        Left Join po On (dtr.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users usr On (dtr.created_by = usr.id) 
                    Where dtr.id=".$id);
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
    
    function show_header_sj($id){
        $data = $this->db->query("Select sj.*, 
                    cust.nama_customer, cust.alamat,
                    po.no_po,
                    kdr.no_kendaraan,
                    tkdr.type_kendaraan,
                    usr.realname
                From surat_jalan sj
                    Left Join m_customers cust On (sj.m_customer_id = cust.id)
                    Left Join po On (sj.po_id = po.id) 
                    Left Join m_kendaraan kdr On (sj.m_kendaraan_id = kdr.id) 
                    Left Join m_type_kendaraan tkdr On (kdr.m_type_kendaraan_id = tkdr.id) 
                    Left Join users usr On (sj.created_by = usr.id)
                    Where sj.id=".$id);
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
    
    /*function get_dtr($po_id){
        $data = $this->db->query("Select dtr.*, 
                    po.no_po, 
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                    Left Join users app On (dtr.approved_by = app.id) 
                    Left Join users rjct On (dtr.rejected_by = rjct.id) 
                Where dtr.po_id=".$po_id);
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
                Where dtr.po_id>0 
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
                    (Select Sum(po_detail.total_amount) From po_detail Where po_detail.po_id = po.id)As nilai_po,
                    (Select voucher.amount From voucher Where voucher.po_id = po.id)As nilai_dp
                From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id) 
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier On (po.supplier_id = supplier.id)
                Where ttr.id=".$id);
        return $data;
    }*/
}