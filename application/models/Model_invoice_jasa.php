<?php
class Model_invoice_jasa extends CI_Model{

	function list_inv(){
		$data = $this->db->query("select tij.*, tsj.no_sj_resmi, ts.no_so, tp.no_po, mc.nama_customer, mc.pic from r_t_inv_jasa tij
		left join r_t_surat_jalan tsj on tsj.id = tij.sjr_id
	    left join r_t_so ts on ts.id = tij.r_t_so_id
	    left join r_t_po tp on tp.id = tij.r_t_po_id
	    left join m_customers mc on mc.id = tij.customer_id
	    order by tij.tanggal");
		return $data;
	}

	function list_sj_so($id){
		$data = $this->db->query("select tsjd.*, jb.jenis_barang, jb.uom, COALESCE((select tsd.amount from r_t_so_detail tsd where tsd.id = tsjd.so_detail_id),(select tpd.amount from r_t_po_detail tpd where tpd.id = tsjd.po_detail_id)) as amount from r_t_surat_jalan_detail tsjd 
		left join jenis_barang jb on jb.id = tsjd.jenis_barang_id
		where tsjd.sj_resmi_id =".$id);
		return $data;
	}

	function show_header_inv_jasa($id){
		$data = $this->db->query("select tij.*, tsj.no_sj_resmi, ts.no_so,ts.tanggal as tgl_so, tp.no_po, tp.tanggal as tgl_po, mc.nama_customer, mc.pic from r_t_inv_jasa tij
		left join r_t_surat_jalan tsj on tsj.id = tij.sjr_id
	    left join r_t_so ts on ts.id = tij.r_t_so_id
	    left join r_t_po tp on tp.id = tij.r_t_po_id
	    left join m_customers mc on mc.id = tij.customer_id
	    where tij.id =".$id);
		return $data;
	}

	function show_detail_inv_jasa($id){
		$data = $this->db->query("select tijd.*, jb.jenis_barang, jb.uom FROM r_t_inv_jasa_detail tijd
		left join jenis_barang jb on jb.id = tijd.jenis_barang_id
		where tijd.inv_jasa_id=".$id);
		return $data;
	}
}