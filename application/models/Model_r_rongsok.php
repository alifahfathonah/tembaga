<?php
class Model_r_rongsok extends CI_Model{

	function dtr_list(){
        $data = $this->db->query("Select dtr.*, 
                    COALESCE(po.no_po,r.no_retur) as no_po,
                    spl.nama_supplier,
                    spl.kode_supplier,
                    usr.realname As penimbang,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join po On (dtr.po_id > 0 and po.id = dtr.po_id)
                    Left Join supplier spl On (po.supplier_id = spl.id) or (dtr.supplier_id = spl.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                    Left Join retur r On (r.id = dtr.retur_id)
                    Where (dtr.customer_id = 0 or retur_id > 0) and dtr.type = 1
                Order By dtr.id Desc");
        return $data;
    }

    function show_detail_dtr($id){
        $data = $this->db->query("Select dtrd.*, rsk.nama_item, rsk.uom, dtrd2.dtr_id as dtr_id_lama
                    From dtr_detail dtrd 
                    	Left Join dtr_detail dtrd2 on dtrd2.id = dtrd.dtr_asli_id
                        Left Join rongsok rsk On (dtrd.rongsok_id = rsk.id) 
                    Where dtrd.dtr_id=".$id);
        return $data;
    }
}