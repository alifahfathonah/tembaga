<?php
class Model_invoice_jasa extends CI_Model{

	function list_inv(){
		$data = $this->db->query("select tij.*, tsj.id as sjr_id, tsj.no_sj_resmi, ts.no_so, tp.no_po, coalesce(mc.nama_customer, cv.nama_cv) as nama_customer, coalesce(mc.pic, cv.pic) as pic from r_t_inv_jasa tij
		left join r_t_surat_jalan tsj on tsj.id = tij.sjr_id
	    left join r_t_so ts on ts.id = tij.r_t_so_id
	    left join r_t_po tp on tp.id = tij.r_t_po_id
	    left join m_customers_cv mc on mc.id = tij.customer_id
	    left join m_cv cv on cv.id = tij.cv_id
	    order by tij.no_invoice_jasa desc");
		return $data;
	}

	function list_inv_for_cv($reff_cv){
		$data = $this->db->query("select tij.*, tsj.id as sjr_id, tsj.no_sj_resmi, ts.no_so, tp.no_po, mc.nama_customer, mc.pic from r_t_inv_jasa tij
		left join r_t_surat_jalan tsj on tsj.id = tij.sjr_id
	    left join r_t_so ts on ts.id = tij.r_t_so_id
	    left join r_t_po tp on tp.id = tij.r_t_po_id
	    left join m_customers_cv mc on mc.id = tij.customer_id
	    where tij.cv_id = ".$reff_cv." 
	    order by tij.no_invoice_jasa desc");
		return $data;
	}

	function list_inv_for_kmp(){
		$data = $this->db->query("select tij.*, tsj.id as sjr_id, tsj.no_sj_resmi, ts.no_so, tp.no_po, mc.nama_cv as nama_customer, mc.pic from r_t_inv_jasa tij
		left join r_t_surat_jalan tsj on tsj.id = tij.sjr_id
	    left join r_t_so ts on ts.id = tij.r_t_so_id
	    left join r_t_po tp on tp.id = tij.r_t_po_id
	    left join m_cv mc on mc.id = tij.cv_id
	    where tij.jenis_invoice = 'INVOICE KMP KE CV'
	    order by tij.no_invoice_jasa desc");
		return $data;
	}

	function list_sj_so($id){
		$data = $this->db->query("select tsjd.*, count(tsjd.id) as qty, sum(tsjd.bruto) as bruto, sum(tsjd.netto) as netto, jb.jenis_barang, jb.uom, (select so.amount from r_t_so_detail so where so.so_id = rtsj.r_so_id and so.jenis_barang_id = tsjd.jenis_barang_id ) as amount from r_t_surat_jalan_detail tsjd 
		left join r_t_surat_jalan rtsj on rtsj.id = tsjd.sj_resmi_id
		left join jenis_barang jb on jb.id = tsjd.jenis_barang_id
		where tsjd.sj_resmi_id =".$id."
        group by tsjd.jenis_barang_id");
		return $data;
	}

	function list_sj_so_v2($id,$id_inv){
		$data = $this->db->query("select tsjd.jenis_barang_id, sum(bruto) as bruto, sum(tsjd.netto) as netto, tsjd.so_detail_id, tsjd.po_detail_id, sum(tsjd.qty) as qty, tsjd.line_remarks, (select tpod.amount from r_t_po_detail tpod
	left join r_t_po tp on tp.id = tpod.po_id
	where tp.f_invoice_id =".$id_inv." and cv_id = 0 and tpod.jenis_barang_id = tsjd.jenis_barang_id group by tpod.jenis_barang_id ) as amount from r_t_surat_jalan_detail tsjd 
		left join r_t_surat_jalan rtsj on rtsj.id = tsjd.sj_resmi_id
		left join jenis_barang jb on jb.id = tsjd.jenis_barang_id
		where tsjd.sj_resmi_id =".$id." group by tsjd.jenis_barang_id");
		return $data;
	}

	function get_po($id){
		$data = $this->db->query("select tpo.f_invoice_id as id from r_t_surat_jalan rtsj
		left join r_t_so tso on tso.id = rtsj.r_so_id
		left join r_t_po tpo on tpo.id = tso.po_id
		left join r_t_invoice ti on ti.id = tpo.f_invoice_id
		where rtsj.id =".$id);
		return $data;
	}

	function get_po_for_cust($id){
		$data = $this->db->query("select tpo.f_invoice_id as id from r_t_surat_jalan rtsj
			left join r_t_surat_jalan rts on rts.id = rtsj.r_sj_id
			left join r_t_so tso on tso.id = rts.r_so_id
			left join r_t_po tpo on tpo.id = tso.po_id
			left join r_t_invoice ti on ti.id = tpo.f_invoice_id
			where rtsj.id =".$id);
		return $data;
	}

	function pod_list($id){
		$data = $this->db->query("select tpod.* from r_t_po_detail tpod
	left join r_t_po tp on tp.id = tpod.po_id
	where tp.f_invoice_id =".$id." and cv_id = 0");
		return $data;
	}

	function show_header_inv_jasa($id){
		$data = $this->db->query("select tij.*, tsj.no_sj_resmi, ts.no_so,ts.tanggal as tgl_so, tp.no_po, tp.tanggal as tgl_po, coalesce(mc.nama_customer, cv.nama_cv) as nama_customer, coalesce(mc.pic, cv.pic) as pic from r_t_inv_jasa tij
		left join r_t_surat_jalan tsj on tsj.id = tij.sjr_id
	    left join r_t_so ts on ts.id = tij.r_t_so_id
	    left join r_t_po tp on tp.id = tij.r_t_po_id
	    left join m_customers_cv mc on mc.id = tij.customer_id
	    left join m_cv cv on cv.id = tij.cv_id
	    where tij.id =".$id);
		return $data;
	}

	function show_detail_inv_jasa($id){
		$data = $this->db->query("select tijd.*, sum(tijd.total_amount) as sum_total_amount, sum(tijd.bruto) as sum_bruto, sum(tijd.netto) as sum_netto, jb.jenis_barang, jb.uom FROM r_t_inv_jasa_detail tijd
		left join jenis_barang jb on jb.id = tijd.jenis_barang_id
		where tijd.inv_jasa_id=".$id." group by jb.jenis_barang");
		return $data;
	}

	// function show_detail_inv_jasa($id){
	// 	$data = $this->db->query("select tijd.*, jb.jenis_barang, jb.uom FROM r_t_inv_jasa_detail tijd
	// 	left join jenis_barang jb on jb.id = tijd.jenis_barang_id
	// 	where tijd.inv_jasa_id=".$id." group by jb.jenis_barang");
	// 	return $data;
	// }

	function show_header_print_inv_jasa($id){
		$data = $this->db->query("select tij.*, tsj.no_sj_resmi, ts.no_so,ts.tanggal as tgl_so, tp.no_po, tp.tanggal as tgl_po, mc.nama_customer, cv.nama_cv, mc.pic, cv.pic as pic_cv, cv.alamat as alamat_cv, cv.npwp, tp2.no_po as no_po2, b.kode_bank, b.nama_bank, b.nomor_rekening, b.kantor_cabang from r_t_inv_jasa tij
		left join r_t_surat_jalan tsj on tsj.id = tij.sjr_id
	    left join r_t_so ts on ts.id = tij.r_t_so_id
	    left join r_t_po tp on tp.id = tij.r_t_po_id
		left join r_t_po tp2 on tp2.id = ts.po_id
	    left join m_customers_cv mc on mc.id = tij.customer_id
	    left join m_cv cv on cv.id = tij.cv_id
	    left join bank b on b.id = tij.bank_id
	    where tij.id =".$id);
		return $data;
	}

	function get_inv_jasa_detail_only($id){
		return $this->db->query("select id, inv_jasa_id as inv_id, jenis_barang_id, qty, bruto, netto, amount, total_amount, line_remarks from r_t_inv_jasa_detail where inv_jasa_id =".$id);
	}

	function bank_list(){
		return $this->db->get_where('bank', ['ppn' => 1, 'currency' => 'IDR']);
	}
}