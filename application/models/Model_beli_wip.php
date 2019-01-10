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
        $data = $this->db->query("select *from jenis_barang where category = 'WIP' order by jenis_barang");
        return $data;
    }

    function show_data_po($id){
        $data = $this->db->query("select *from jenis_barang where id = ".$id);
        return $data;
    }

    function load_detail_po($id){
        $data = $this->db->query("Select pod.*, jb.jenis_barang, jb.uom From po_detail pod 
                Left Join jenis_barang jb On(pod.wip_id = jb.id) 
                Where pod.po_id=".$id);
        return $data;
    }

    function dtwip_list(){
        $data = $this->db->query("Select dtwip.*, 
                    po.no_po, 
                    spl.nama_supplier,
                    usr.realname As penimbang,
                (Select count(dtwipd.id)As jumlah_item From dtwip_detail dtwipd Where dtwipd.dtwip_id = dtwip.id)As jumlah_item
                From dtwip
                    Left Join po On (dtwip.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) or (dtwip.supplier_id = spl.id) 
                    Left Join users usr On (dtwip.created_by = usr.id) 
                Order By dtwip.id Desc");
        return $data;
    }

    function get_po_list(){
        $data = $this->db->query("Select id, no_po, jenis_po From po 
            Where jenis_po= 'WIP' And (status= 0 or status = 2)");
        return $data;
    }

    function show_detail_po($id){
        $data = $this->db->query("Select pod.*, jb.jenis_barang, jb.uom
                    From po_detail pod 
                        Left Join jenis_barang jb On (pod.wip_id = jb.id) 
                    Where pod.po_id=".$id);
        return $data;
    }

    function get_dtwip($id){
        $data = $this->db->query("Select dtwip.*,  
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtwipd.id)As jumlah_item From dtwip_detail dtwipd Where dtwipd.dtwip_id = dtwip.id)As jumlah_item
                From dtwip
                    Left Join supplier spl On (dtwip.supplier_id = spl.id) 
                    Left Join users usr On (dtwip.created_by = usr.id) 
                    Left Join users app On (dtwip.approved_by = app.id) 
                    Left Join users rjct On (dtwip.rejected_by = rjct.id) 
                Where dtwip.supplier_id=".$id." and status = 0");
        return $data;
    }

    function show_detail_dtwip($id){
        $data = $this->db->query("Select dtwipd.*, jb.jenis_barang, jb.uom
                    From dtwip_detail dtwipd 
                        Left Join jenis_barang jb On (dtwipd.jenis_barang_id = jb.id) 
                    Where dtwipd.dtwip_id=".$id);
        return $data;
    }

    function show_header_dtwip($id){
        $data = $this->db->query("Select dtwip.*, 
                    po.no_po,
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    rjct.realname As rejected_name
                    From dtwip
                        Left Join po On (dtwip.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users usr On (dtwip.created_by = usr.id) 
                        Left Join users rjct On (dtwip.rejected_by = rjct.id) 
                    Where dtwip.id=".$id);
        return $data;
    }

    function get_dtwip_approve($id){
        $data = $this->db->query("Select dtwip.*,  
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtwipd.id)As jumlah_item From dtwip_detail dtwipd Where dtwipd.dtwip_id = dtwip.id)As jumlah_item
                From dtwip
                    Left Join supplier spl On (dtwip.supplier_id = spl.id) 
                    Left Join users usr On (dtwip.created_by = usr.id) 
                    Left Join users app On (dtwip.approved_by = app.id) 
                    Left Join users rjct On (dtwip.rejected_by = rjct.id) 
                Where dtwip.po_id=".$id);
        return $data;
    }

    function check_to_update($id){
        $data = $this->db->query("select pdtl.id, pdtl.po_id,pdtl.wip_id, pdtl.qty, dtwipd.id as dtwip_detail_id
                from po_detail pdtl
                left join dtwip on dtwip.po_id = pdtl.po_id
                left join dtwip_detail dtwipd on dtwipd.dtwip_id = dtwip.id
                where dtwip.po_id = pdtl.po_id and dtwip.status=1 
                and dtwipd.jenis_barang_id = pdtl.wip_id and pdtl.po_id =".$id);
        return $data;
    }

    function check_po_dtwip($id){
        $data = $this->db->query("select pdtl.id, pdtl.po_id,pdtl.wip_id, pdtl.qty,
                (select sum(dtwipd.berat) from dtwip_detail dtwipd
                left join dtwip on dtwipd.dtwip_id = dtwip.id 
                where dtwip.po_id = pdtl.po_id and dtwip.status=1 and dtwipd.jenis_barang_id = pdtl.wip_id)as tot_berat from po_detail pdtl
                where pdtl.po_id =".$id);
        return $data;
    }

    function update_flag_dtwip_po_detail($po_id,$wip_id){
        $this->db->where('po_id',$po_id);
        $this->db->where('wip_id',$wip_id);
        $this->db->update('po_detail',array(
                        'flag_dtwip'=>'1'));
    }

    function voucher_po_wip($id){
        $data = $this->db->query("Select po.*,s.nama_supplier, dtwip.po_id, sum(dtwipd.berat*pd.amount) as nilai_po, 
            (Select Sum(voucher.amount) From voucher Where voucher.po_id = po.id)As nilai_dp
            From po
            inner join dtwip on dtwip.po_id = po.id
            inner join dtwip_detail dtwipd on dtwipd.dtwip_id = dtwip.id
            inner join po_detail pd on pd.id = dtwipd.po_detail_id
            inner join supplier s on s.id = po.supplier_id
            Where dtwip.po_id =".$id." and dtwip.status=1");
        return $data;
    }

    function voucher_list(){
        $data = $this->db->query("Select voucher.*, 
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id) 
                Where voucher.jenis_barang='WIP'
                Order By voucher.no_voucher");
        return $data;
    }
}