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

    function ttr_list(){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr,
                    dtr.tanggal as tgl_dtr,
                    po.no_po, 
                    spl.nama_supplier,
                (Select count(ttrd.id) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As jumlah_item,
                (Select Sum(ttrd.bruto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As bruto, 
                (Select Sum(ttrd.netto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As netto
                From ttr 
                    Left Join dtr On (dtr.id = ttr.dtr_id) 
                    Left Join po On (po.id = dtr.po_id) 
                    Left Join supplier spl On (po.supplier_id = spl.id)
                Where dtr.flag_ppn=1 and (dtr.po_id > 0 or so_id > 0)
                Order By ttr.id Desc");
        return $data;
    }

    function pindah_history(){
        return $this->db->query("Select tp.*, jb.kode, jb.jenis_barang, (select count(id) from t_gudang_fg tgf where tgf.flag_pindah = tp.id) as jumlah From t_pindah tp
            left join jenis_barang jb on jb.id = tp.jenis_barang_id
            ");
    }

    function view_pindah($id){
        return $this->db->query("Select tgf.*, jb.jenis_barang, jb.uom from t_gudang_fg tgf 
            left join jenis_barang jb on jb.id = tgf.jenis_barang_id
            where tgf.flag_pindah =".$id);
    }

    function show_header_pindah($id){
        return $this->db->query("Select tp.*, jb.kode, jb.jenis_barang From t_pindah tp
            left join jenis_barang jb on jb.id = tp.jenis_barang_id
            where tp.id =".$id);
    }

    function get_list_pindah($id){
        return $this->db->query("Select * from t_gudang_fg where flag_pindah =".$id);
    }
}