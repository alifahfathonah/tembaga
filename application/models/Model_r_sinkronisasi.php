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

	function count_so_cv() {
		$data = $this->db->query('
				SELECT COUNT(id) AS jumlah
				FROM r_t_so
				WHERE jenis_so = "SO CV" AND api = 0
			');
		return $data;
	}

	function count_po_cv() {
		$data = $this->db->query('
				SELECT COUNT(id) AS jumlah
				FROM r_t_po
				WHERE jenis_po = "PO CV KE KMP" AND api = 0
			');
		return $data;
	}

	function count_bpb_cv() {
		$data = $this->db->query('
				SELECT COUNT(id) AS jumlah
				FROM r_t_bpb
				WHERE jenis_bpb = "BPB RONGSOK" AND api = 0
			');
		return $data;
	}

	function count_sj_rsk_cv() {
		$data = $this->db->query('
				SELECT COUNT(id) AS jumlah
				FROM r_t_surat_jalan
				WHERE jenis_surat_jalan = "SURAT JALAN CV KE KMP" AND api = 0
			');
		return $data;
	}

	function count_sj_bpb_cv() {
		$data = $this->db->query('
				SELECT COUNT(id) AS jumlah
				FROM r_t_surat_jalan
				WHERE jenis_surat_jalan = "SURAT JALAN CV KE CUSTOMER" AND api = 0
			');
		return $data;
	}

	function count_inv_jasa_cv() {
		$data = $this->db->query('
				SELECT COUNT(id) AS jumlah
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

	function get_so_cv_cust($id) {
		$data = $this->db->query('Select rts.*, rtp.no_po, cv.idkmp from r_t_so rts
					left join r_t_po rtp on rtp.id = rts.po_id
					left join m_cv cv on cv.id = rts.reff_cv
					where rts.reff_cv = '.$id.' and rts.jenis_so="SO CV"
			');
		return $data;
	}

	function get_so_detail_cv($id) {
		$data = $this->db->query('Select * from r_t_so_detail where so_id='.$id);
		return $data;
	}

	function get_bpb_cv_cust($id) {
		$data = $this->db->query('Select rtb.*, rtp.no_po, rts.id as id_so FROM r_t_bpb rtb
				left join r_t_po rtp on rtp.flag_bpb = rtb.id
				left join r_t_so rts on rts.po_id = rtp.id
				WHERE rtb.reff_cv ='.$id.' AND rtb.jenis_bpb = "BPB RONGSOK"
			');
		return $data;
	}

	function get_bpb_detail_cv($id){
		return $this->db->query('Select * From r_t_bpb_detail where bpb_resmi_id='.$id);
	}

	function get_po_cv_cust($id){
		$data = $this->db->query('Select rtp.* FROM r_t_po rtp
				WHERE rtp.reff_cv ='.$id.' AND rtp.jenis_po = "PO CV KE KMP"
			');
		return $data;
	}

	function get_po_detail_cv($id){
		return $this->db->query('select * from r_t_po_detail where po_id='.$id);
	}

	function get_sj_rsk_cv_cust($id) {
		$data = $this->db->query('Select rts.* FROM r_t_surat_jalan rts
				WHERE reff_cv ='.$id.' AND jenis_surat_jalan = "SURAT JALAN CV KE KMP"
			');
		return $data;
	}

	function get_sj_detail_cv($id){
		return $this->db->query('select * from r_t_surat_jalan_detail where sj_resmi_id ='.$id);
	}

	function get_sj_bpb_cv_cust($id) {
		$data = $this->db->query('
				SELECT rtsj.*, rtb.no_bpb, rtp.flag_po_cv, rtp.no_po, rtb.tanggal as tanggal_bpb, rtb.jenis_barang as jenis_barang_bpb, rtb.m_type_kendaraan_id, rtb.no_kendaraan, rtb.supir, rtb.remarks as remarks_bpb FROM r_t_surat_jalan rtsj
				left join r_t_bpb rtb on rtsj.r_bpb_id = rtb.id
				left join r_t_po rtp on rtsj.r_po_id = rtp.id
				WHERE rtsj.jenis_surat_jalan = "SURAT JALAN CV KE CUSTOMER" AND rtsj.reff_cv ='.$id.'
			');
		return $data;
	}

	function get_inv_cv_cust($id) {
		$data = $this->db->query('
				SELECT ij.*, cv.idkmp
				FROM r_t_inv_jasa ij
				LEFT JOIN m_cv cv ON cv.id = ij.cv_id
				WHERE reff_cv = '.$id.' and ij.jenis_invoice = "INVOICE CV KE CUSTOMER"
			');
		return $data;
	}

	function count_so_cv_cust() {
		$data = $this->db->query('Select id, nama_cv, (
				SELECT COUNT(id)
				FROM r_t_so
				WHERE reff_cv = mc.id AND jenis_so = "SO CV" AND api = 0) as jumlah
				from m_cv mc
			');
		return $data;
	}

	function count_bpb_cv_cust() {
		$data = $this->db->query('Select id, nama_cv, (
				SELECT COUNT(id)
				FROM r_t_bpb
				WHERE reff_cv = mc.id AND jenis_bpb = "BPB RONGSOK" AND api = 0) as jumlah
				from m_cv mc
			');
		return $data;
	}

	function count_po_cv_cust() {
		$data = $this->db->query('Select id, nama_cv, (
				SELECT COUNT(id)
				FROM r_t_po
				WHERE reff_cv = mc.id AND jenis_po = "PO CV KE KMP" AND api = 0) as jumlah
				from m_cv mc
			');
		return $data;
	}

	function count_sj_rsk_cv_cust() {
		$data = $this->db->query('Select id, nama_cv, (
				SELECT COUNT(id) AS jumlah
				FROM r_t_surat_jalan
				WHERE reff_cv = mc.id AND jenis_surat_jalan = "SURAT JALAN CV KE KMP" AND api = 0) as jumlah
				from m_cv mc
			');
		return $data;
	}

	function count_sj_bpb_cv_cust() {
		$data = $this->db->query('Select id, nama_cv, (
				SELECT COUNT(id) AS jumlah
				FROM r_t_surat_jalan
				WHERE reff_cv = mc.id AND jenis_surat_jalan = "SURAT JALAN CV KE CUSTOMER" AND api = 0) as jumlah
				from m_cv mc
			');
		return $data;
	}

	function count_inv_cv_cust() {
		$data = $this->db->query('Select id, nama_cv, (
				SELECT count(id) as jumlah
				FROM r_t_inv_jasa
				WHERE reff_cv = mc.id and jenis_invoice = "INVOICE CV KE CUSTOMER" AND api = 0) as jumlah
				from m_cv mc
			');
		return $data;
	}
}