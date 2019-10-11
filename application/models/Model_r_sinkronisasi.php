<?php
class Model_r_sinkronisasi extends CI_Model{

	function count_so_kmp() {
		$data = $this->db->query('
				SELECT COUNT(id) AS count_so
				FROM r_t_so
				WHERE jenis_so = "SO KMP" AND api = 0
			');
		return $data;
	}

	function count_sj_kmp() {
		$data = $this->db->query('
				SELECT COUNT(id) AS count_sj
				FROM r_t_surat_jalan
				WHERE jenis_surat_jalan = "SURAT JALAN KMP KE CV" AND api = 0
			');
		return $data;
	}

	function count_inv_kmp() {
		$data = $this->db->query('
				SELECT COUNT(id) AS count_inv
				FROM r_t_inv_jasa
				WHERE jenis_invoice = "INVOICE KMP KE CV" AND api = 0
			');
		return $data;
	}

	function count_tolling_kmp() {
		$data = $this->db->query('
				SELECT COUNT(id) AS count_sj
				FROM r_t_surat_jalan
				WHERE jenis_surat_jalan = "SURAT JALAN CV KE KMP" AND api = 0
			');
		return $data;
	}

	function count_inv_jasa_cv() {
		$data = $this->db->query('
				SELECT COUNT(id) AS count_inv
				FROM r_t_inv_jasa
				WHERE jenis_invoice = "INVOICE CV KE CUSTOMER" AND api = 0
			');
		return $data;
	}

	function get_so_kmp() {
		$data = $this->db->query('
				SELECT rso.*, rpo.no_po, cv.idkmp
				FROM r_t_so rso
				LEFT JOIN r_t_po rpo ON rpo.id = rso.po_id
				LEFT JOIN m_cv cv ON rso.cv_id = cv.id
				WHERE rso.jenis_so = "SO KMP" AND rso.api = 0
			');
		return $data;
	}

	function get_so_detail_kmp($id) {
		$data = $this->db->query('
				SELECT rsod.*
				FROM r_t_so_detail rsod
				LEFT JOIN r_t_so rso ON rso.id = rsod.so_id
				WHERE rso.jenis_so = "SO KMP" AND rso.api = 0 AND rso.id = '.$id.'
			');
		return $data;
	}

	function get_sj_kmp() {
		$data = $this->db->query('
				SELECT rsj.*, cv.idkmp
				FROM r_t_surat_jalan rsj
				LEFT JOIN m_cv cv ON rsj.m_cv_id = cv.id
				WHERE rsj.jenis_surat_jalan = "SURAT JALAN KMP KE CV" AND rsj.api = 0 limit 100
			');
		return $data;
	}

	function get_sj_detail_kmp($id) {
		$data = $this->db->query('
				SELECT *
				FROM r_t_surat_jalan_detail
				WHERE sj_resmi_id = '.$id.'
			');
		return $data;
	}

	function get_inv_kmp() {
		$data = $this->db->query('
				SELECT ij.*, cv.idkmp
				FROM r_t_inv_jasa ij
				LEFT JOIN m_cv cv ON cv.id = ij.cv_id
				WHERE ij.jenis_invoice = "INVOICE KMP KE CV" AND ij.api = 0 limit 100
			');
		return $data;
	}

	function get_inv_detail_kmp($id) {
		$data = $this->db->query('
				SELECT *
				FROM r_t_inv_jasa_detail
				WHERE inv_jasa_id = '.$id.'
			');
		return $data;
	}

	function get_tolling_kmp() {
		$data = $this->db->query('
				SELECT rd.*, rt.id as id_ttr, rt.no_ttr_resmi, rsj.no_sj_resmi, cv.idkmp, (select id from r_t_so where jenis_so = "SO KMP" and po_id = rsj.r_po_id) as so_id
				FROM r_t_surat_jalan rsj
				LEFT JOIN m_cv cv ON rsj.m_cv_id = cv.id
				LEFT JOIN r_dtr rd ON rsj.id = rd.sj_id
				LEFT JOIN r_ttr rt ON rd.id = rt.r_dtr_id
				WHERE rsj.jenis_surat_jalan = "SURAT JALAN CV KE KMP" AND rsj.flag_tolling = 1 AND rsj.api = 1 limit 100
			');
		return $data;
	}

	function get_tolling_detail_kmp($id){
		$data = $this->db->query("select rdd.*, rtd.id as ttr_detail_id from r_dtr_detail rdd
			left join r_ttr_detail rtd on rtd.r_dtr_detail_id = rdd.id
			where r_dtr_id = ".$id);
		return $data;
	}

	function get_inv_cv_cust($id) {
		$data = $this->db->query('
				SELECT ij.*, cv.idkmp
				FROM r_t_inv_jasa ij
				LEFT JOIN m_cv cv ON cv.id = ij.cv_id
				WHERE reff_cv = '.$id.' and ij.jenis_invoice = "INVOICE CV KE CUSTOMER" AND ij.api = 0 limit 100
			');
		return $data;
	}

	function count_inv_cv_cust($id) {
		$data = $this->db->query('
				SELECT count(id) as jumlah
				FROM r_t_inv_jasa
				WHERE reff_cv = '.$id.' and jenis_invoice = "INVOICE CV KE CUSTOMER" AND api = 0
			');
		return $data;
	}
}