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

    function retur_list(){
        $data = $this->db->query("select r.*, c.nama_customer, c.pic, u.realname as penimbang, (select count(id) as jumlah_item from retur_detail rd where rd.retur_id = r.id) as jumlah_item
            from retur r
            left join users u on (u.id = r.created_by)
            left join m_jenis_packing jp on (jp.id = r.jenis_packing_id)
            left join m_customers c on (c.id = r.customer_id)");
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
    
    function jenis_packing_list(){
        $data = $this->db->query("select *from m_jenis_packing");
        return $data;
    }

    function show_header_retur($id){
        $data = $this->db->query("select r.*, u.realname as penimbang, jp.jenis_packing, c.nama_customer, c.pic
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
        $data = $this->db->query("Select rd.*, jb.jenis_barang, mb.nomor_bobbin From retur_detail rd 
                Left Join jenis_barang jb On(rd.jenis_barang_id = jb.id) 
                left join m_bobbin mb on (rd.bobbin_id = mb.id)
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
        $data = $this->db->query("select *from retur where customer_id = ".$id." and status = 1 and jenis_retur = 0");
        return $data;
    }

    function fulfilment_list(){
        $data = $this->db->query("select r.*, tsf.no_spb, c.nama_customer, (select count(id) as jumlah_item from retur_fulfilment rf where rf.retur_id = r.id) as jumlah_item
            from retur r
            left join t_spb_fg tsf on (tsf.id = r.spb_id)
            left join m_customers c on (c.id = r.customer_id)");
        return $data;
    }
    
    function show_header_fulfilment($id){
        $data = $this->db->query("select r.*, c.id as cust_id, c.nama_customer
            from retur r
            left join m_customers c on (r.customer_id = c.id)
            where r.retur_id = ".$id);
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
    }*/
    
}