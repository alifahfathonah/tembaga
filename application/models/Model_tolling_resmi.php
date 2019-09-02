<?php
class Model_tolling_resmi extends CI_Model{

	function list_tolling(){
		$data = $this->db->query("select rd.id, rd.no_dtr_resmi, rd.tanggal, mc.nama_cv,t.no_ttr_resmi, tsj.no_sj_resmi, ti.no_invoice_resmi from r_dtr rd
		left join r_t_surat_jalan tsj on tsj.id = rd.sj_id
        left join r_ttr t on t.r_dtr_id = rd.id
        left join r_t_invoice ti on ti.id = tsj.r_invoice_id
        left join m_cv mc on mc.id = rd.customer_id
        order by id asc");
		return $data;
	}

    function add_tolling($id){
        $data = $this->db->query("select tsj.id, tsj.tanggal, tsj.no_sj_resmi, tsj.r_invoice_id, cv.id as customer_id, cv.idkmp, cv.nama_cv as nama_customer, rtp.flag_so as id_so, rtp.no_po from r_t_surat_jalan tsj
            left join r_t_bpb bpb on bpb.id = tsj.r_bpb_id
            left join r_t_po rtp on rtp.id = tsj.r_po_id
            left join m_cv cv on cv.id = bpb.reff_cv where tsj.id =".$id);
        return $data;
    }

	function list_sj(){
		$data = $this->db->query("select * from r_t_surat_jalan where flag_tolling = 0");
		return $data;
	}

	function get_customer_sj($id){
		$data = $this->db->query("select tsj.m_customer_id, mc.nama_customer from r_t_surat_jalan tsj 
			left join m_customers_cv mc on mc.id=tsj.m_customer_id
			where tsj.id=".$id);
		return $data;
	}

	function list_sj_detail($id){
        $data = $this->db->query("select ird.*, dtrd.no_pallete, dtrd.qty, r.nama_item, dtr.id as dtr_id
            from r_t_invoice_detail ird
            left join dtr_detail dtrd on (ird.dtr_detail_id = dtrd.id)
            left join dtr on (dtrd.dtr_id = dtr.id)
            left join rongsok r on (dtrd.rongsok_id = r.id)
            where ird.invoice_resmi_id = ".$id);
        return $data;
    }

    function show_tolling_header($id){
    	$data = $this->db->query("select rd.id, rd.sj_id, rd.no_dtr_resmi, rd.tanggal, cv.nama_cv as nama_customer,t.id as id_ttr, t.no_ttr_resmi, tsj.no_sj_resmi, tsj.jenis_barang, ti.no_invoice_resmi from r_dtr rd
			left join r_t_surat_jalan tsj on tsj.id = rd.sj_id
	        left join r_ttr t on t.r_dtr_id = rd.id
	        left join r_t_invoice ti on ti.id = tsj.r_invoice_id
	        left join m_cv cv on cv.id = rd.customer_id
	        where rd.id =".$id);
        return $data;
    }

    function show_tolling_dtr($id){
        $data = $this->db->query("select rd.no_dtr_resmi as no_dtr, rd.tanggal, '' as no_po, cv.nama_cv as nama_supplier, '' as remarks, 'RONGSOK' as jenis_barang, '' as penimbang from r_dtr rd
            left join m_cv cv on cv.id = rd.customer_id
            where rd.id=".$id);
        return $data;
    }

    function show_dtr_detail($id){
    	$data = $this->db->query("select dd.*, rsk.nama_item, rsk.uom from r_dtr_detail dd
    		left join rongsok rsk on rsk.id = dd.rongsok_id
    		where r_dtr_id =".$id);
    	return $data;
    }

    function show_ttr_detail($id){
    	$data = $this->db->query("select * from r_ttr_detail td
    		left join rongsok rsk on rsk.id = td.rongsok_id
    		where r_ttr_id =".$id);
    	return $data;
    }
}