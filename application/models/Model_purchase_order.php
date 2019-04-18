<?php
class Model_purchase_order extends CI_Model{
	
	function po_list(){
		$data = $this->db->query("select rpo.*, coalesce(cs.nama_customer,c.nama_cv) as nama_cv, coalesce(cs.pic, c.pic) as pic, (select count(tpd.id) from r_t_po_detail tpd where tpd.po_id = rpo.id)as jumlah_item
			from r_t_po rpo
			left join m_customers cs on (rpo.customer_id = cs.id)
			left join m_cv c on (rpo.cv_id = c.id)
			order by rpo.created_at desc");
		return $data;
	}

	function invoice_list($id){
		$data = $this->db->query("select ti.id, ti.invoice_id, ti.no_invoice_resmi, fi.no_invoice, mc.id as customer_id, mc.nama_cv, mc.pic from r_t_invoice ti
			left join f_invoice fi on fi.id = ti.invoice_id
		    left join m_cv mc on mc.id = fi.id_customer
		    where ti.id =".$id);
		return $data;
	}

	function get_po_customer($id){
		$data = $this->db->query("select rpo.* from r_t_po rpo where id=".$id);
		return $data;
	}

	function invoice_detail($id){
		$data = $this->db->query("select fid.id, fid.id_invoice, fid.sj_detail_id, fid.jenis_barang_id, sum(fid.qty) as qty, sum(fid.netto) as netto, fid.harga, sum(fid.total_harga) as total_harga from f_invoice_detail fid 
		where fid.id_invoice =".$id." group by fid.jenis_barang_id");
		return $data;
	}

	function po_detail($id){
		$data = $this->db->query("select *from r_t_po_detail where po_id=".$id);
		return $data;
	}

	function customer_list(){
		$this->db->order_by('nama_customer','ASC');
		$data = $this->db->get('m_customers');
		return $data;
	}

	function cv_list(){
		$data = $this->db->query("select id, nama_cv, pic from m_cv");
		return $data;
	}

	function get_contact_name($id){
		$this->db->select('pic');
		$this->db->where('id', $id);
		$data = $this->db->get('m_cv');
		return $data;
	}

	function get_contact_name_customer($id){
		$this->db->select('pic');
		$this->db->where('id', $id);
		$data = $this->db->get('m_customers');
		return $data;
	}

	function show_header_po($id){
		$data = $this->db->query("select rpo.*, c.nama_cv, c.pic, c.alamat
			from r_t_po rpo
			left join m_cv c on (rpo.cv_id = c.id)
			where rpo.id = ".$id);
		return $data;
	}

	function load_detail_po($id){
		$data = $this->db->query("select rpod.*, jb.jenis_barang, jb.uom, jb.kode
			from r_t_po_detail rpod
			left join jenis_barang jb on (rpod.jenis_barang_id = jb.id)
			where rpod.po_id =".$id);
		return $data;
	}

	function load_detail_po_sj($id){
		$data = $this->db->query("select rpod.*, tsjd.bruto as bruto_tsjd, tsjd.netto as netto_tsjd, tsjd.no_packing, jb.jenis_barang, jb.uom, jb.kode
			from r_t_po_detail rpod
            left join r_t_po rpo on (rpo.id = rpod.po_id)
			left join f_invoice fi on (rpo.f_invoice_id = fi.id)
			left join t_surat_jalan_detail tsjd on (fi.id_surat_jalan = tsjd.t_sj_id)
			left join jenis_barang jb on jb.id=(case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
			where rpod.po_id =".$id);

		// $data = $this->db->query("select rpod.*, tsjd.bruto as bruto_tsjd, tsjd.netto as netto_tsjd, tsjd.no_packing, jb.jenis_barang, jb.uom, jb.kode
		// 	from r_t_po_detail rpod
  //           left join r_t_po rpo on (rpo.id = rpod.po_id)
		// 	left join f_invoice fi on (rpo.f_invoice_id = fi.id)
		// 	left join t_surat_jalan_detail tsjd on (fi.id_surat_jalan = tsjd.t_sj_id)
		// 	left join jenis_barang jb on jb.id=(case when tsjd.jenis_barang_alias > 0 then tsjd.jenis_barang_alias else tsjd.jenis_barang_id end)
		// 	where rpod.po_id =".$id);
		// $data = $this->db->query("select fid.*, tsjd.bruto, tsjd.no_packing, tsjd.nomor_bobbin,
		// (select id from r_t_po_detail rtpd where rtpd.po_id = rtp.id and rtpd.jenis_barang_id = fid.jenis_barang_id) as po_detail_id
		// from f_invoice_detail fid 
		// left join t_surat_jalan_detail tsjd on tsjd.id = fid.sj_detail_id
  //       left join r_t_po rtp on rtp.f_invoice_id = fid.id_invoice
		// where rtp.id =".$id);
		return $data;
	}
}