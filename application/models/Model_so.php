<?php
class Model_so extends CI_Model{
	
	function so_list(){
		$data = $this->db->query("select rso.*, 
			coalesce(c.nama_cv, cs.nama_customer) as nama_customer, c.pic,
			(select count(rsod.id) from r_t_so_detail rsod where rsod.so_id = rso.id) as jumlah_item
			from r_t_so rso
			left join m_cv c on(rso.cv_id = c.id)
            left join m_customers_cv cs on (rso.customer_id = cs.id)
            order by rso.no_so desc");
		return $data;
	}

	function so_list_for_cv($reff_cv){
		$data = $this->db->query("select rso.*, 
			c.nama_customer, c.pic,
			(select count(rsod.id) from r_t_so_detail rsod where rsod.so_id = rso.id) as jumlah_item
			from r_t_so rso
			left join m_customers_cv c on(rso.customer_id = c.id) where rso.jenis_so = 'SO CV' and rso.reff_cv = ".$reff_cv." 
			order by rso.no_so desc");
		return $data;
	}

	function so_list_for_kmp(){
		$data = $this->db->query("select rso.*, 
			c.nama_cv as nama_customer, c.pic,
			(select count(rsod.id) from r_t_so_detail rsod where rsod.so_id = rso.id) as jumlah_item
			from r_t_so rso
			left join m_cv c on(rso.cv_id = c.id) where rso.jenis_so = 'SO KMP' 
			order by rso.no_so desc");
		return $data;
	}

	function list_po(){
		$this->db->order_by('no_po','asc');
		$data = $this->db->get_where('r_t_po', array('flag_so'=>0));
		return $data;
	}

	function get_tanggal_po($id){
		$data = $this->db->query("select tanggal from r_t_po where id = ".$id);
		return $data;
	}

	function show_header_so($id){
		$data = $this->db->query("select rso.*, 
			rpo.no_po, rpo.id as po_id, 
			c.nama_cv, c.pic, c.alamat, c.idkmp,
            cs.nama_customer, cs.pic as pic_cs, cs.alamat as alamat_cs, cs.telepon as telepon_cs,
			u.realname as nama_marketing 
			from r_t_so rso
			left join r_t_po rpo on (rpo.id = rso.po_id)
			left join m_cv c on (rso.cv_id = c.id)
            left join m_customers_cv cs on (rso.customer_id = cs.id)
			left join users u on (rso.marketing_id = u.id)
			where rso.id = ".$id);
		return $data;
	}

	function load_detail_so($id){
		$data = $this->db->query("select rtsod.*, jb.kode, jb.jenis_barang, jb.uom from r_t_so_detail rtsod
			left join jenis_barang jb on jb.id = rtsod.jenis_barang_id
			where rtsod.so_id=".$id);
		return $data;
	}

	// function list_detail_so($id){
	// 	$data = $this->db->query("select rtsjd.*, 
	// (select rtsd.id from r_t_so_detail rtsd 
 //     	left join r_t_so rts on rts.id = rtsd.so_id
 //     	where rts.po_id = rtsj.r_po_id and rtsd.jenis_barang_id = rtsjd.jenis_barang_id) as so_detail
	// from r_t_surat_jalan_detail rtsjd
	// left join r_t_surat_jalan rtsj on rtsj.id = rtsjd.sj_resmi_id
	// left join r_t_po rtp on rtp.id = rtsj.
 //    where rtsj.r_po_id =".$id);
	// 	return $data;
	// }

	function list_detail_so($id){
		// $data = $this->db->query('select fid.*, tsjd.bruto, tsjd.no_packing, tsjd.nomor_bobbin, tsjd.line_remarks,
		// 	(select rtsd.id from r_t_so_detail rtsd 
	 //      	left join r_t_so rts on rts.id = rtsd.so_id
	 //      	where rts.po_id = rtp.id and rtsd.jenis_barang_id = fid.jenis_barang_id) as so_detail
		// 	from f_invoice_detail fid 
		// 	left join t_surat_jalan_detail tsjd on tsjd.id = fid.sj_detail_id
	 //        left join r_t_po rtp on rtp.f_invoice_id = fid.id_invoice
		// 	where rtp.id ='.$id);
		$data = $this->db->query("select tsjd.*, COALESCE(NULLIF(tsjd.jenis_barang_alias,0),tsjd.jenis_barang_id) as jenis_barang_ida,
			(select rtsd.id from r_t_so_detail rtsd left join r_t_so rts on rts.id = rtsd.so_id where rts.po_id = rtp.id and rtsd.jenis_barang_id = tsjd.jenis_barang_id and rts.jenis_so = 'SO KMP') as so_detail 
			from t_surat_jalan_detail tsjd 
			left join f_invoice fi on fi.id_surat_jalan = tsjd.t_sj_id
		    left join r_t_po rtp on rtp.f_invoice_id = fi.id
		    where rtp.id =".$id);
		return $data;
	}

	function jenis_barang_list(){
		$this->db->order_by('jenis_barang','asc');
		$data = $this->db->get_where('jenis_barang', array('category'=>'FG'));
		return $data;
	}

	function get_r_gudang_fg($id){
		$data = $this->db->query("select rtg.* from r_t_so rts
			left join r_t_po rtp on rtp.id = rts.po_id
			left join r_t_invoice rti on rti.r_po_id = rtp.id
			left join r_t_gudang_fg rtg on rtg.f_invoice_id = rti.id
			where rts.id = ".$id);
		return $data;
	}

	function show_header_print_so($id){
		$data = $this->db->query("select rso.*, 
			rpo.no_po, rpo.id as po_id, 
			coalesce(c2.nama_cv, c.nama_cv) as nama_cv, coalesce(c2.pic, c.pic) as pic, coalesce(c2.alamat, c.alamat) as alamat,
            cs.nama_customer, cs.pic as pic_cs, cs.alamat as alamat_cs, cs.telepon as telepon_cs,
			u.realname as nama_marketing 
			from r_t_so rso
			left join r_t_po rpo on (rpo.id = rso.po_id)
            left join m_cv c on (rso.cv_id = c.id)
			left join m_cv c2 on (rso.reff_cv = c2.id)
            left join m_customers_cv cs on (rso.customer_id = cs.id)
			left join users u on (rso.marketing_id = u.id)
			where rso.id = ".$id);
		return $data;
	}

	function get_so_detail_only($id){
		return $this->db->query('select id, so_id, jenis_barang_id, qty, netto, amount, total_amount from r_t_so_detail where so_id = '.$id);
	}

	function get_so($id){
		return $this->db->get_where('r_t_so', ['po_id' => $id]);
	}
}