<?php
class Model_beli_fg extends CI_Model
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
                Where po.jenis_po='FG' 
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

	function list_fg(){
		$data = $this->db->query("select *from jenis_barang where category='FG' order by jenis_barang asc");
		return $data;
	}

	function load_detail_po($id){
		$data = $this->db->query("Select pod.*, jb.jenis_barang, jb.uom From po_detail pod 
                Left Join jenis_barang jb On(pod.fg_id = jb.id) 
                Where pod.po_id=".$id);
		return $data;
	}

	function show_data_po($id){
		$data = $this->db->query("select *from jenis_barang where id = ".$id);
		return $data;
	}

	function dtbj_list(){
		$data = $this->db->query("Select dtbj.*, 
                    po.no_po, 
                    spl.nama_supplier,
                    usr.realname As penimbang,
                (Select count(dtbjd.id)As jumlah_item From dtbj_detail dtbjd Where dtbjd.dtbj_id = dtbj.id)As jumlah_item
                From dtbj
                    Left Join po On (dtbj.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) or (dtbj.supplier_id = spl.id) 
                    Left Join users usr On (dtbj.created_by = usr.id) 
                Order By dtbj.id Desc");
		return $data;
	}

	function show_data_bobbin($id){
        $data = $this->db->query("select mb.*, o.nama_owner
                from m_bobbin mb
                left join owner o on (o.id = mb.owner_id)
                where mb.nomor_bobbin = '".$id."' and mb.status = 3"
                );
        return $data;
    }
}