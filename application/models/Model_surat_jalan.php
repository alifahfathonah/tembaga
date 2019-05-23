<?php
class Model_surat_jalan extends CI_Model{

	function list_sj(){
		$data = $this->db->query("select tsj.*, mc.nama_customer, '-' as no_reff, ts.no_so, tp.no_po,
		(select count(tsjd.id) from r_t_surat_jalan_detail tsjd where tsjd.sj_resmi_id = tsj.id) as jumlah_item
    	from r_t_surat_jalan tsj
    	left join r_t_invoice ti on ti.id = tsj.r_invoice_id
        left join r_t_so ts on ts.id = tsj.r_so_id
        left join r_t_po tp on tp.id = tsj.r_po_id
    	left join m_customers_cv mc on mc.id = tsj.m_customer_id
    	where tsj.jenis_surat_jalan != 'SURAT JALAN CUSTOMER KE CV'
    	order by id desc");
		return $data;
	}

	function list_sj_cv($reff_cv){
		$data = $this->db->query("select tsj.*, cs.nama_customer, ti.no_invoice_resmi as no_reff, 
			(select count(tsjd.id) from r_t_surat_jalan_detail tsjd where tsjd.sj_resmi_id = tsj.id) as jumlah_item
			from r_t_surat_jalan tsj
			left join r_t_invoice ti on ti.id = tsj.r_invoice_id
			left join m_customers_cv cs on cs.id = tsj.m_customer_id
			where tsj.reff_cv = ".$reff_cv." 
			order by id desc");
    	return $data;
	}

	function list_sj_so(){
		$data = $this->db->query("select tsj.*, mc.nama_cv as nama_customer, ts.no_so as no_reff, 
			(select count(tsjd.id) from r_t_surat_jalan_detail tsjd where tsjd.sj_resmi_id = tsj.id) as jumlah_item
			from r_t_surat_jalan tsj
        	left join r_t_so ts on ts.id = tsj.r_so_id
    		left join m_cv mc on mc.id = tsj.m_customer_id
			where tsj.jenis_surat_jalan NOT LIKE '%CUSTOMER%' 
			order by id desc");
		return $data;
	}

	function list_sj_po(){
		$data = $this->db->query("select tsj.*, mc.nama_customer, tp.no_po as no_reff, 
			(select count(tsjd.id) from r_t_surat_jalan_detail tsjd where tsjd.sj_resmi_id = tsj.id) as jumlah_item
			from r_t_surat_jalan tsj
        	left join r_t_po tp on tp.id = tsj.r_po_id
    		left join m_customers_cv mc on mc.id = tsj.m_customer_i
			where tsj.r_invoice_id > 0
			order by id desc");
		return $data;
	}

	function list_bpb(){
		$data = $this->db->query("select tsj.*, mc.nama_customer, coalesce(ts.no_so, tp.no_po) as no_reff, 
		(select count(tsjd.id) from r_t_surat_jalan_detail tsjd where tsjd.sj_resmi_id = tsj.id) as jumlah_item
    	from r_t_surat_jalan tsj
    	left join r_t_invoice ti on ti.id = tsj.r_invoice_id
        left join r_t_so ts on ts.id = tsj.r_so_id
        left join r_t_po tp on tp.id = tsj.r_po_id
    	left join m_customers_cv mc on mc.id = tsj.m_customer_id
    	where tsj.jenis_surat_jalan = 'SURAT JALAN CUSTOMER KE CV'
    	order by id desc");
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
		$data = $this->db->get('m_customers_cv');
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
		$data = $this->db->query("select sjr.*, c.id as id_customer, coalesce(c.nama_customer, cv.nama_cv) as nama_customer, coalesce(c.alamat, cv.alamat) as alamat, tri.no_invoice_resmi, ts.no_so, ts.tanggal as tgl_so, coalesce(tp.no_po,tpo.no_po) as no_po, tpo.tanggal as tgl_po, bpb.id as bpb_id, bpb.no_bpb, bpb.tanggal as tanggal_bpb
			from r_t_surat_jalan sjr
			left join r_t_invoice tri on (tri.id = sjr.r_invoice_id)
            left join r_t_so ts on (ts.id = sjr.r_so_id)
            left join r_t_po tp on (sjr.r_invoice_id > 0 and tp.flag_sj = sjr.id)
            left join r_t_po tpo on (tpo.id = sjr.r_po_id)
            left join r_t_bpb bpb on (bpb.id = sjr.r_bpb_id)
			left join m_customers_cv c on (sjr.m_customer_id = c.id)
			left join m_cv cv on (sjr.m_cv_id = cv.id)
			where sjr.id =".$id);
		return $data;
	}

	function list_sj_detail($id){
		$data = $this->db->query("select tsjd.*, rsk.nama_item, jb.jenis_barang, coalesce(rsk.uom, jb.uom) as uom from r_t_surat_jalan_detail tsjd 
		left join r_t_surat_jalan tsj on tsj.id = tsjd.sj_resmi_id
		left join rongsok rsk on tsj.jenis_barang = 'RONGSOK' and rsk.id = tsjd.jenis_barang_id
		left join jenis_barang jb on tsj.jenis_barang = 'FG' and jb.id = tsjd.jenis_barang_id
		where tsjd.sj_resmi_id =".$id);
		return $data;
	}

	function get_alamat($id){
        $data = $this->db->query("Select * From m_cv Where id=".$id);
        return $data;
    }

    function get_customer($id){
    	$data = $this->db->query("select c.id, c.nama_customer from m_customers_cv c
    		left join r_t_po rpo on c.id = rpo.customer_id where rpo.id = ".$id);
    	return $data;
    }

    function get_cv($id){
    	$data = $this->db->query("select c.* from m_cv c
    		left join r_t_po rpo on c.id = rpo.cv_id where rpo.id = ".$id);
    	return $data;
    }

    function show_header_sj_cv($id){
    	$data = $this->db->query("select rtsj.*, rtsj2.m_cv_id from r_t_surat_jalan rtsj
			left join r_t_surat_jalan rtsj2 on rtsj.r_sj_id = rtsj2.id
			where rtsj.id = ".$id);
    	return $data;
    }

    function show_header_bpb_cv($id){
    	$data = $this->db->query("select *from r_t_bpb where id = ".$id);
    	return $data;
    }

    function sj_detail($id){
    	$data = $this->db->query("select *from r_t_surat_jalan_detail where sj_resmi_id = ".$id);
    	return $data;
    }

    function cv_list(){
    	$data = $this->db->query("select *from m_cv order by nama_cv asc");
    	return $data;
    }

    // function show_header_sj_customer($id){
    // 	$data = $this->db->query("");
    // }

    function show_header_print_sj($id){
    	$data = $this->db->query("select rtsj.*, rtpo.no_po, cv.nama_cv, cs.nama_customer, bpb.no_bpb, coalesce(rtso.no_so, rtso2.no_so) as no_so from r_t_surat_jalan rtsj
			left join r_t_po rtpo on rtsj.r_po_id = rtpo.id
            left join r_t_so rtso on rtsj.r_so_id = rtso.id
            left join r_t_bpb bpb on bpb.id = rtsj.r_bpb_id
			left join m_cv cv on rtsj.m_cv_id = cv.id
			left join r_t_surat_jalan rtsj2 on rtsj.r_sj_id = rtsj2.id
			left join m_customers_cv cs on rtsj2.m_customer_id = cs.id
            left join r_t_so rtso2 on rtso2.id = rtsj2.r_so_id
			where rtsj.id = ".$id);
    	return $data;
    }

    function show_header_print_sj_cv_cs($id){
    	$data = $this->db->query("select rtsj.*, rtpo.no_po, cv.nama_cv, cs.nama_customer, bpb.no_bpb, coalesce(rtso.no_so, rtso2.no_so) as no_so from r_t_surat_jalan rtsj
			left join r_t_po rtpo on rtsj.r_po_id = rtpo.id
            left join r_t_so rtso on rtsj.r_so_id = rtso.id
            left join r_t_bpb bpb on bpb.id = rtsj.r_bpb_id
			left join m_cv cv on rtsj.reff_cv = cv.id
			left join r_t_surat_jalan rtsj2 on rtsj.r_sj_id = rtsj2.id
			left join m_customers_cv cs on rtsj.m_customer_id = cs.id
            left join r_t_so rtso2 on rtso2.id = rtsj2.r_so_id
			where rtsj.id = ".$id);
    	return $data;
    }

    function list_detail_print_sj($id){
    	$data = $this->db->query("select tsjd.*, sum(tsjd.netto) as total_netto, rsk.nama_item, jb.jenis_barang, coalesce(rsk.uom, jb.uom) as uom from r_t_surat_jalan_detail tsjd 
			left join r_t_surat_jalan tsj on tsj.id = tsjd.sj_resmi_id
			left join rongsok rsk on tsj.jenis_barang = 'RONGSOK' and rsk.id = tsjd.jenis_barang_id
			left join jenis_barang jb on tsj.jenis_barang = 'FG' and jb.id = tsjd.jenis_barang_id
			where tsjd.sj_resmi_id =".$id." group by jb.jenis_barang");
    	return $data;
    }

    function show_header_print_bpb($id){
    	$data = $this->db->query("select bpb.*, rtpo.no_po, cv.nama_cv, cs.nama_customer from r_t_bpb bpb
            left join r_t_po rtpo on bpb.r_po_id = rtpo.id
            left join m_cv cv on bpb.m_cv_id = cv.id
            left join m_customers_cv cs on bpb.m_customer_id = cs.id
            where bpb.id = ".$id);
    	return $data;
    }

    function po_list($reff_cv){
    	$data = $this->db->query("select *from r_t_po rpo where jenis_po = 'PO CUSTOMER KE CV' and rpo.flag_sj = 0 and reff_cv = ".$reff_cv);
    	return $data;
    }

    function get_sj_detail_only($id)
    {
    	return $this->db->query('select id, sj_resmi_id as sj_id, jenis_barang_id, no_packing, qty, bruto, netto, nomor_bobbin, line_remarks
    			from r_t_surat_jalan_detail where sj_resmi_id = '.$id);
    }
}
