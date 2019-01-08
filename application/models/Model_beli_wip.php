<?php
class Model_beli_wip extends CI_Model
{
	function po_list(){
		$data = $this->db->query("Select po.*, 
                    bsp.no_pengajuan, bsp.tgl_pengajuan,
                    usr.realname As created_name,
                    spl.nama_supplier, spl.pic,
                (Select count(id)As jumlah_item From po_detail pd Where pd.po_id = po.id)As jumlah_item,
                (Select count(id)As tot_voucher From voucher vc Where vc.po_id = po.id)As tot_voucher,
                (Select count(pd.id)As ready_to_dtr From po_detail pd Where 
                    pd.po_id = po.id And pd.flag_dtr=1)As ready_to_dtr
                From po 
                    Left Join beli_sparepart bsp On (po.beli_sparepart_id = bsp.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (bsp.created_by = usr.id) 
                Where po.jenis_po='WIP' 
                Order By po.id Desc");
		return $data;
	}

    function po_list_outdated(){
        $data = $this->db->query("Select po.*, 
                    bsp.no_pengajuan, bsp.tgl_pengajuan,
                    usr.realname As created_name,
                    spl.nama_supplier, spl.pic,
                (Select count(id)As jumlah_item From po_detail pd Where pd.po_id = po.id)As jumlah_item,
                (Select count(id)As tot_voucher From voucher vc Where vc.po_id = po.id)As tot_voucher,
                (Select count(pd.id)As ready_to_dtr From po_detail pd Where 
                    pd.po_id = po.id And pd.flag_dtr=1)As ready_to_dtr
                From po 
                    Left Join beli_sparepart bsp On (po.beli_sparepart_id = bsp.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (bsp.created_by = usr.id) 
                Where po.jenis_po='WIP' and po.tanggal < DATE_ADD(NOW(), INTERVAL -2 MONTH) 
                Order By po.id Desc");
        return $data;
    }

    function show_header_po($id){
        $data = $this->db->query("Select po.*, 
                    spl.nama_supplier, spl.pic,
                    sum(po_detail.total_amount)as tot_nilai_po,
                    (select sum(voucher.amount) from voucher where voucher.po_id = po.id)
                     as 'tot_nilai_dp',
                    (select count(dtr.id) from dtr where dtr.po_id = po.id)as 'tot_dtr'
                    From po 
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        left join po_detail on po_detail.po_id = po.id
                    Where po.id=".$id);
        return $data;
    }

    function list_wip(){
        $data = $this->db->query("select *from jenis_barang where category = 'WIP'");
        return $data;
    }
}