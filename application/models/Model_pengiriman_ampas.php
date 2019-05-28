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
    
    // function load_detail($id){
    //     $data = $this->db->query("Select pod.*, ampas.nama_item, ampas.uom From po_detail pod 
    //             Left Join ampas On(pod.ampas_id = ampas.id) 
    //             Where pod.po_id=".$id);
    //     return $data;
    // }

    function load_detail($id){
        $data = $this->db->query("Select pod.*, r.nama_item, r.uom From po_detail pod 
                Left Join rongsok r on (r.id=pod.ampas_id)
                Where pod.po_id=".$id);
        return $data;
    }

    function load_detail_saved_item($id){
        $data = $this->db->query("select tsaf.*, r.nama_item, r.uom from t_spb_ampas_fulfilment tsaf
                left join rongsok r on r.id = tsaf.jenis_barang_id
                where tsaf.approved_by = 0 and tsaf.t_spb_ampas_id =".$id);
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
    
    function spb_list(){
        $data = $this->db->query("select tsa.*, usr.realname As pic, aprv.realname As approved_name, rjt.realname As rejected_name, rcv.realname As receiver_name, (select count(tsa.id) as jumlah_item from t_spb_ampas_detail tsad where tsad.t_spb_ampas_id = tsa.id) as jumlah_item
            from t_spb_ampas tsa
            left join users usr on (usr.id = tsa.created_by)
            left join users aprv on (aprv.id = tsa.approved_by)
            left join users rjt on (rjt.id = tsa.rejected_by)
            left join users rcv on (rcv.id = tsa.received_by)
            order by tsa.id Desc");
        return $data;
    }

    function show_header_spb($id){
        $data = $this->db->query("select tsa.*, 
                usr.realname As pic,
                aprv.realname As approved_name,
                rjt.realname As rejected_name,
                rcv.realname As receiver_name
            from t_spb_ampas tsa
                left join users usr on (tsa.created_by = usr.id)
                left join users aprv on (tsa.approved_by = aprv.id)
                left join users rjt on (tsa.rejected_by = rjt.id)
                left join users rcv on (tsa.received_by = rcv.id)
            where tsa.id = ".$id);
        return $data;
    }

    function show_detail_spb($id){
        $data = $this->db->query("Select tsad.*, jb.jenis_barang,
                    (select sum(berat_masuk - berat_keluar) from stok_ampas) as stok
                    From t_spb_ampas_detail tsad 
                        Left Join jenis_barang jb On (jb.id = tsad.jenis_barang_id)
                    Where tsad.t_spb_ampas_id=".$id);
        return $data;
    }

    function show_detail_spb_fulfilment($id){
        $data = $this->db->query("Select saf.*, r.nama_item, r.uom from t_spb_ampas_fulfilment saf
                    left join rongsok r on r.id = saf.jenis_barang_id
                    where saf.approved_by = 0 and saf.t_spb_ampas_id=".$id);
        return $data;
    }

    function show_spb_fulfilment($id){
        $data = $this->db->query("Select saf.*, r.nama_item, r.uom from t_spb_ampas_fulfilment saf
                    left join rongsok r on r.id = saf.jenis_barang_id
                    where saf.approved_by = 1 and saf.t_spb_ampas_id=".$id);
        return $data;
    }

    function jenis_barang_list_by_spb($id){
        $data = $this->db->query("select jb.id, jb.jenis_barang
            from t_spb_ampas_detail tsad
            left join jenis_barang jb on (jb.id = tsad.jenis_barang_id)
            where tsad.t_spb_ampas_id = ".$id);
        return $data;
    }

    function jenis_barang_stok(){
        $data = $this->db->query("select rongsok_id, nama_item, berat_masuk, berat_keluar
            from stok_ampas");
        return $data;
    }

    function bpb_list(){
        $data = $this->db->query("select tba.*, pi.no_produksi, (select count(id) as jumlah_item from t_bpb_ampas_detail tbad where tbad.bpb_ampas_id = tba.id) as jumlah_item
            from t_bpb_ampas tba
            left join t_hasil_masak thm on (tba.hasil_masak_id = thm.id)
            left join produksi_ingot pi on (thm.id_produksi = pi.id)");
        return $data;
    }

    function show_header_bpb($id){
        $data = $this->db->query("select tba.*, u.realname, pi.no_produksi
            from t_bpb_ampas tba
            left join users u on (tba.created_by = u.id)
            left join t_hasil_masak thm on (tba.hasil_masak_id = thm.id)
            left join produksi_ingot pi on (thm.id_produksi = pi.id)
            where tba.id = ".$id);
        return $data;
    }

    function show_detail_bpb($id){
        $data = $this->db->query("select tbad.*, r.nama_item as jenis_barang
            from t_bpb_ampas_detail tbad
            left join rongsok r on (tbad.jenis_barang_id = r.id)
            where tbad.bpb_ampas_id = ".$id);
        return $data;
    }

    function gudang_ampas(){
        $data = $this->db->query("select tga.*, r.nama_item, pi.no_produksi
            from t_gudang_ampas tga
            left join rongsok r on (r.id = tga.rongsok_id)
            left join produksi_ingot pi on (tga.id_produksi = pi.id)");
        return $data;
    }

    function gudang_bs(){
        $data = $this->db->query("select tgb.*, pi.no_produksi, r.nama_item
            from t_gudang_bs tgb
            left join rongsok r on (r.id = tgb.jenis_barang_id)
            left join produksi_ingot pi on (tgb.id_produksi = pi.id)");
        return $data;
    }

    function list_bs(){
        $data = $this->db->query("select tgb.*, pi.no_produksi, jb.jenis_barang, jb.uom
            from t_gudang_bs tgb 
            left join produksi_ingot pi on (tgb.id_produksi = pi.id)
            left join jenis_barang jb on (pi.jenis_barang_id = jb.id)
            where tgb.status = 0");
        return $data;
    }

    function get_data_bs($id){
        $data = $this->db->query("select tgb.*, pi.no_produksi, jb.jenis_barang, jb.uom
            from t_gudang_bs tgb 
            left join produksi_ingot pi on (tgb.id_produksi = pi.id)
            left join jenis_barang jb on (pi.jenis_barang_id = jb.id)
            where tgb.id = ".$id);
        return $data;
    }

    function rongsok(){
        $data = $this->db->query("select id, nama_item from rongsok");
        return $data;
    }

    function ampas(){
        $data = $this->db->query("Select id, nama_item from rongsok where type_barang = 'Ampas'");
        return $data;
    }

    function get_stok($id){
        $data = $this->db->query("Select * from stok_ampas where rongsok_id=".$id);
        return $data;
    }

    function check_spb($id){
        $data = $this->db->query("Select 
                (select sum(netto) from t_spb_ampas_detail tsad where tsad.t_spb_ampas_id = tsa.id)as spb,
                (select sum(berat) from t_spb_ampas_fulfilment tsad where tsad.t_spb_ampas_id = tsa.id )as fulfilment
                from t_spb_ampas tsa
                where tsa.id =".$id);
        return $data;
    }
}

/**
    CREATE OR REPLACE VIEW stok_ampas(rongsok_id,nama_item,berat_masuk,berat_keluar)
    AS SELECT rongsok_id, r.nama_item,
    sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END),
    sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END)
    from t_gudang_ampas
    left join rongsok r on r.id = t_gudang_ampas.rongsok_id
    GROUP by t_gudang_ampas.rongsok_id **/