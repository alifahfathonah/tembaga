<?php
class Model_purchase_order extends CI_Model{
	
	function po_list(){
		$data = $this->db->query("select rpo.*, c.nama_customer, c.pic, (select count(tpd.id) from r_t_po_detail tpd where tpd.po_id = rpo.id)as jumlah_item
			from r_t_po rpo
			left join m_customers c on (rpo.customer_id = c.id)
			order by rpo.created_at desc");
		return $data;
	}

	function invoice_list($id){
		$data = $this->db->query("select ti.id, ti.invoice_id, ti.no_invoice_resmi, fi.no_invoice, mc.id as customer_id, mc.nama_customer, mc.pic from r_t_invoice ti
			left join f_invoice fi on fi.id = ti.invoice_id
		    left join m_customers mc on mc.id = fi.id_customer
		    where ti.id =".$id);
		return $data;
	}

	function invoice_detail($id){
		$data = $this->db->query("select * from f_invoice_detail fid where fid.id_invoice =".$id);
		return $data;
	}

	function customer_list(){
		$this->db->order_by('nama_customer','ASC');
		$data = $this->db->get('m_customers');
		return $data;
	}

	function get_contact_name($id){
		$this->db->select('pic');
		$this->db->where('id', $id);
		$data = $this->db->get('m_customers');
		return $data;
	}

	function show_header_po($id){
		$data = $this->db->query("select rpo.*, c.nama_customer, c.pic, c.alamat
			from r_t_po rpo
			left join m_customers c on (rpo.customer_id = c.id)
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
}