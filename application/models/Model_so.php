<?php
class Model_so extends CI_Model{
	
	function so_list(){
		$data = $this->db->query("select rso.*, 
			c.nama_customer, c.pic,
			count(rsod.id) as jumlah_item
			from r_t_so rso
			left join m_customers c on(rso.customer_id = c.id)
			left join r_t_so_detail rsod on (rso.id = rsod.so_id)");
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
			rpo.no_po, rpo.tanggal as tgl_po, 
			c.nama_customer, c.pic, c.alamat,
			u.realname as nama_marketing 
			from r_t_so rso
			left join r_t_po rpo on (rso.po_id = rpo.id)
			left join m_customers c on (rso.customer_id = c.id)
			left join users u on (rso.marketing_id = u.id)
			where rso.id = ".$id);
		return $data;
	}

	function list_detail_so($id){
		$data = $this->db->query("select rsod.*, jb.jenis_barang, jb.uom
			from r_t_so_detail rsod
			left join jenis_barang jb on (rsod.jenis_barang_id = jb.id)
			where rsod.so_id = ".$id);
		return $data;
	}

	function jenis_barang_list(){
		$this->db->order_by('jenis_barang','asc');
		$data = $this->db->get_where('jenis_barang', array('category'=>'FG'));
		return $data;
	}
}