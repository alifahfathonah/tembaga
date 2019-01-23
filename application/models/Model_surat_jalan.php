<?php
class Model_surat_jalan extends CI_Model{

	function customer_list(){
		$this->db->order_by('nama_customer', 'asc');
		$data = $this->db->get('m_customers');
		return $data;
	}

	function tipe_kendaraan_list(){
		$this->db->order_by('type_kendaraan', 'asc');
		$data = $this->db->get('m_type_kendaraan');
		return $data;
	}

	function jenis_barang_list(){
		$this->db->order_by('category', 'asc');
		$this->db->group_by('category');
		$data = $this->db->get('jenis_barang');
		return $data;
	}

	function show_header_sj($id){
		$data = $this->db->query("select sjr.*, c.nama_customer
			from r_t_surat_jalan sjr
			left join m_customers c on (sjr.m_customer_id = c.id)
			where sjr.id = ".$id);
		return $data;
	}
}
