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
                Where po.jenis_po='FG' and po.tanggal < DATE_ADD(NOW(), INTERVAL -2 MONTH) 
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

	function show_detail_po($id){
		$data = $this->db->query("Select pod.*, jb.jenis_barang, jb.uom
                    From po_detail pod 
                        Left Join jenis_barang jb On (pod.fg_id = jb.id) 
                    Where pod.po_id=".$id);
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

    function get_po_list(){
    	$data = $this->db->query("Select id, no_po, jenis_po From po 
            Where jenis_po= 'FG' And (status= 0 or status = 2)");
    	return $data;
    }

    function get_dtbj($id){
    	$data = $this->db->query("Select dtbj.*,  
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtbjd.id)As jumlah_item From dtbj_detail dtbjd Where dtbjd.dtbj_id = dtbj.id)As jumlah_item
                From dtbj
                    Left Join supplier spl On (dtbj.supplier_id = spl.id) 
                    Left Join users usr On (dtbj.created_by = usr.id) 
                    Left Join users app On (dtbj.approved_by = app.id) 
                    Left Join users rjct On (dtbj.rejected_by = rjct.id) 
                Where dtbj.supplier_id=".$id." and status = 0");
    	return $data;
    }

    function show_header_dtbj($id){
        $data = $this->db->query("Select dtbj.*, 
                    po.no_po,
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    rjct.realname As rejected_name
                    From dtbj
                        Left Join po On (dtbj.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users usr On (dtbj.created_by = usr.id) 
                        Left Join users rjct On (dtbj.rejected_by = rjct.id) 
                    Where dtbj.id=".$id);
        return $data;
    }
    
    function show_detail_dtbj($id){
    	$data = $this->db->query("Select dtbjd.*, jb.jenis_barang, jb.uom
                    From dtbj_detail dtbjd 
                        Left Join jenis_barang jb On (dtbjd.jenis_barang_id = jb.id) 
                    Where dtbjd.dtbj_id=".$id);
    	return $data;
    }

    function get_dtbj_approve($id){
    	$data = $this->db->query("Select dtbj.*,  
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtbjd.id)As jumlah_item From dtbj_detail dtbjd Where dtbjd.dtbj_id = dtbj.id)As jumlah_item
                From dtbj
                    Left Join supplier spl On (dtbj.supplier_id = spl.id) 
                    Left Join users usr On (dtbj.created_by = usr.id) 
                    Left Join users app On (dtbj.approved_by = app.id) 
                    Left Join users rjct On (dtbj.rejected_by = rjct.id) 
                Where dtbj.po_id=".$id);
    	return $data;
    }

    function get_item_dtbj($id){
    	$data = $this->db->query("select pdtl.id, pdtl.po_id,pdtl.fg_id, pdtl.qty, dtbjd.id as dtbj_detail_id, dtbjd.jenis_barang_id, dtbjd.bruto, dtbjd.netto, mb.id as bobbin_id
                from po_detail pdtl
                left join dtbj on dtbj.po_id = pdtl.po_id
                left join dtbj_detail dtbjd on dtbjd.dtbj_id = dtbj.id
                left join m_bobbin mb on dtbjd.no_bobbin = mb.nomor_bobbin
                where dtbj.po_id = pdtl.po_id and dtbj.status=1 
                and dtbjd.jenis_barang_id = pdtl.fg_id and pdtl.po_id =".$id);
    	return $data;
    }

    function check_to_update($id){
    	$data = $this->db->query("select pdtl.id, pdtl.po_id,pdtl.fg_id, pdtl.qty, dtbjd.id as dtbj_detail_id
                from po_detail pdtl
                left join dtbj on dtbj.po_id = pdtl.po_id
                left join dtbj_detail dtbjd on dtbjd.dtbj_id = dtbj.id
                where dtbj.po_id = pdtl.po_id and dtbj.status=1 
                and dtbjd.jenis_barang_id = pdtl.fg_id and pdtl.po_id =".$id);
    	return $data;
    }

    function check_po_dtbj($id){
    	$data = $this->db->query("select pdtl.id, pdtl.po_id,pdtl.fg_id, pdtl.qty,
                (select sum(dtbjd.netto) from dtbj_detail dtbjd
                left join dtbj on dtbjd.dtbj_id = dtbj.id 
                where dtbj.po_id = pdtl.po_id and dtbj.status=1 and dtbjd.jenis_barang_id = pdtl.fg_id)as tot_netto from po_detail pdtl
                where pdtl.po_id =".$id);
    	return $data;
    }

    function update_flag_dtbj_po_detail($po_id,$fg_id){
        $this->db->where('po_id',$po_id);
        $this->db->where('fg_id',$fg_id);
        $this->db->update('po_detail',array(
                        'flag_dtbj'=>'1'));
    }

    function voucher_po_fg($id){
        $data = $this->db->query("Select po.*,s.nama_supplier, dtbj.po_id, sum(dtbjd.netto*pd.amount) as nilai_po, 
            (Select Sum(voucher.amount) From voucher Where voucher.po_id = po.id)As nilai_dp
            From po
            inner join dtbj on dtbj.po_id = po.id
            inner join dtbj_detail dtbjd on dtbjd.dtbj_id = dtbj.id
            inner join po_detail pd on pd.id = dtbjd.po_detail_id
            inner join supplier s on s.id = po.supplier_id
            Where dtbj.po_id =".$id." and dtbj.status=1");
        return $data;
    }

    function voucher_list(){
        $data = $this->db->query("Select voucher.*, 
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id) 
                Where voucher.jenis_barang='FG'
                Order By voucher.no_voucher");
        return $data;
    }

}