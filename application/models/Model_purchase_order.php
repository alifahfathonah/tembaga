<?php
class Model_purchase_order extends CI_Model{
	
	function po_list(){
		$data = $this->db->query("select rpo.*, c.nama_customer, c.pic, count(rpod.id) as jumlah_item
			from r_t_po rpo
			left join r_t_po_detail rpod on (rpo.id = rpod.po_id)
			left join m_customers c on (rpo.customer_id = c.id)
			order by rpo.created_at desc");
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
		$data = $this->db->query("select rpo.*, c.nama_customer, c.pic
			from r_t_po rpo
			left join m_customers c on (rpo.customer_id = c.id)
			where rpo.id = ".$id);
		return $data;
	}

	function load_detail_po($id){
		$data = $this->db->query("select rpod.*, jb.jenis_barang, jb.uom, jb.kode
			from r_t_po_detail rpod
			left join jenis_barang jb on (rpod.fg_id = jb.id)
			where rpod.po_id = ".$id);
		return $data;
	}
}