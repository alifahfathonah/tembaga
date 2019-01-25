<?php
class Model_surat_jalan extends CI_Model{

	function list_sj(){
		$data = $this->db->query("select tsj.*, mc.nama_customer, ti.no_invoice_resmi,
		(select count(tsjd.id) from r_t_surat_jalan_detail tsjd where tsjd.sj_resmi_id = tsj.id) as jumlah_item
    	from r_t_surat_jalan tsj
    	left join r_t_invoice ti on ti.id = tsj.r_invoice_id
    	left join m_customers mc on mc.id = tsj.m_customer_id
    	order by id asc");
		return $data;
	}

	function show_header_invoice($id){
		$data = $this->db->query("select ti.*, fi.no_invoice from r_t_invoice ti
			left join f_invoice fi on fi.id = ti.invoice_id
			where ti.id=".$id);
		return $data;
	}

	function invoice_list(){
		$data = $this->db->query("select * from r_t_invoice where sjr_id = 0 order by id desc");
		return $data;
	}

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

	// function jenis_barang_list(){
	// 	$this->db->order_by('category', 'asc');
	// 	$this->db->group_by('category');
	// 	$data = $this->db->get('jenis_barang');
	// 	return $data;
	// }

	function show_header_sj($id){
		$data = $this->db->query("select sjr.*, c.id as id_customer, c.nama_customer, c.alamat, tri.no_invoice_resmi
			from r_t_surat_jalan sjr
			left join r_t_invoice tri on (tri.id = sjr.r_invoice_id)
			left join m_customers c on (sjr.m_customer_id = c.id)
			where sjr.id = ".$id);
		return $data;
	}

	function list_sj_detail($id){
		$data = $this->db->query("select tsjd.*, rsk.nama_item from r_t_surat_jalan_detail tsjd 
		left join r_t_surat_jalan tsj on tsj.id = tsjd.sj_resmi_id
		left join rongsok rsk on tsj.jenis_barang = 'RONGSOK' and rsk.id = tsjd.jenis_barang_id
		where sj_resmi_id =".$id);
		return $data;
	}

	function get_alamat($id){
        $data = $this->db->query("Select * From m_customers Where id=".$id);
        return $data;
    }
}
