<?php
class Model_so extends CI_Model{
	
	function so_list(){
		$data = $this->db->query("select rso.*, 
			c.nama_cv, c.pic,
			(select count(rsod.id) from r_t_so_detail rsod where rsod.so_id = rso.id) as jumlah_item
			from r_t_so rso
			left join m_cv c on(rso.customer_id = c.id)");
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
			c.nama_cv, c.pic, c.alamat,
			u.realname as nama_marketing 
			from r_t_so rso
			left join r_t_po rpo on (rpo.id = rso.po_id)
			left join m_cv c on (rso.customer_id = c.id)
			left join users u on (rso.marketing_id = u.id)
			where rso.id = ".$id);
		return $data;
	}

	function load_detail_so($id){
		$data = $this->db->query("select rtsod.*, jb.jenis_barang, jb.uom from r_t_so_detail rtsod
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
		$data = $this->db->query('select fid.*, tsjd.bruto, tsjd.no_packing, tsjd.nomor_bobbin, tsjd.line_remarks,
			(select rtsd.id from r_t_so_detail rtsd 
	      	left join r_t_so rts on rts.id = rtsd.so_id
	      	where rts.po_id = rtp.id and rtsd.jenis_barang_id = fid.jenis_barang_id) as so_detail
			from f_invoice_detail fid 
			left join t_surat_jalan_detail tsjd on tsjd.id = fid.sj_detail_id
	        left join r_t_po rtp on rtp.f_invoice_id = fid.id_invoice
			where rtp.id ='.$id);
		return $data;
	}

	function jenis_barang_list(){
		$this->db->order_by('jenis_barang','asc');
		$data = $this->db->get_where('jenis_barang', array('category'=>'FG'));
		return $data;
	}
}