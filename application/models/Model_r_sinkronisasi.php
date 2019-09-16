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
				WHERE rsj.jenis_surat_jalan = "SURAT JALAN KMP KE CV" AND rsj.api = 0
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
				WHERE ij.jenis_invoice = "INVOICE KMP KE CV" AND ij.api = 0
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
}