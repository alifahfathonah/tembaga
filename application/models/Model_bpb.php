<?php
class Model_bpb extends CI_Model{

    function list_bpb($reff_cv = null,$s,$e){
        if ($reff_cv === null) {
            $data = $this->db->query("select bpb.*, mc.nama_customer, coalesce(ts.no_so, tp.no_po) as no_reff, 
            (select count(bpbd.id) from r_t_bpb_detail bpbd where bpbd.bpb_resmi_id = bpb.id) as jumlah_item
            from r_t_bpb bpb
            left join r_t_invoice ti on ti.id = bpb.r_invoice_id
            left join r_t_so ts on ts.id = bpb.r_so_id
            left join r_t_po tp on tp.id = bpb.r_po_id
            left join m_customers_cv mc on mc.id = bpb.m_customer_id
            where bpb.tanggal between '".$s."' and '".$e."'
            order by bpb.tanggal desc, bpb.no_bpb desc");
        } else {
            $data = $this->db->query("select bpb.*, mc.nama_customer, coalesce(ts.no_so, tp.no_po) as no_reff, 
            (select count(bpbd.id) from r_t_bpb_detail bpbd where bpbd.bpb_resmi_id = bpb.id) as jumlah_item
            from r_t_bpb bpb
            left join r_t_invoice ti on ti.id = bpb.r_invoice_id
            left join r_t_so ts on ts.id = bpb.r_so_id
            left join r_t_po tp on tp.id = bpb.r_po_id
            left join m_customers_cv mc on mc.id = bpb.m_customer_id
            where bpb.reff_cv = ".$reff_cv." and bpb.tanggal between '".$s."' and '".$e."'
            order by bpb.tanggal desc, bpb.no_bpb desc");
        }

        return $data;
    }

    function list_bpb_new($reff_cv = null, $jenis,$s,$e){
        if ($reff_cv === null) {
            $data = $this->db->query("select bpb.*, mc.nama_customer, coalesce(ts.no_so, tp.no_po) as no_reff, 
            (select count(bpbd.id) from r_t_bpb_detail bpbd where bpbd.bpb_resmi_id = bpb.id) as jumlah_item
            from r_t_bpb bpb
            left join r_t_invoice ti on ti.id = bpb.r_invoice_id
            left join r_t_so ts on ts.id = bpb.r_so_id
            left join r_t_po tp on tp.id = bpb.r_po_id
            left join m_customers_cv mc on mc.id = bpb.m_customer_id
            where bpb.tanggal between '".$s."' and '".$e."'
            order by bpb.tanggal desc, bpb.no_bpb desc");
        } else {
            $data = $this->db->query("select bpb.*, mc.nama_customer, coalesce(ts.no_so, tp.no_po) as no_reff, 
            (select count(bpbd.id) from r_t_bpb_detail bpbd where bpbd.bpb_resmi_id = bpb.id) as jumlah_item
            from r_t_bpb bpb
            left join r_t_invoice ti on ti.id = bpb.r_invoice_id
            left join r_t_so ts on ts.id = bpb.r_so_id
            left join r_t_po tp on tp.id = bpb.r_po_id
            left join m_customers_cv mc on mc.id = bpb.m_customer_id
            where bpb.reff_cv = ".$reff_cv." AND bpb.jenis_barang = '".$jenis."' and bpb.tanggal between '".$s."' and '".$e."'
            order by bpb.tanggal desc, bpb.no_bpb desc");
        }

        return $data;
    }

    function show_header_bpb($id){
        $data = $this->db->query("select bpb.*, cs.nama_customer, cs.alamat, cs.pic, ri.no_invoice_resmi, rpo.no_po from r_t_bpb bpb
            left join m_customers_cv cs on bpb.m_customer_id = cs.id
            left join r_t_invoice ri on bpb.r_invoice_id = ri.id
            left join r_t_po rpo on bpb.r_po_id = rpo.id
            where bpb.id = ".$id);
        return $data;
    }

    function list_bpb_detail($id){
        $data = $this->db->query("select bpbd.*, rsk.nama_item, jb.jenis_barang, coalesce(rsk.uom, jb.uom) as uom from r_t_bpb_detail bpbd 
        left join r_t_bpb bpb on bpb.id = bpbd.bpb_resmi_id
        left join rongsok rsk on bpb.jenis_barang = 'RONGSOK' and rsk.id = bpbd.jenis_barang_id
        left join jenis_barang jb on bpb.jenis_barang = 'FG' and jb.id = bpbd.jenis_barang_id
        where bpbd.bpb_resmi_id =".$id);
        return $data;
    }

    function show_header_print_bpb($id){
        $data = $this->db->query("select bpb.*, coalesce(rtpo.no_po, rtpo2.no_po) as no_po, cv.nama_cv, cs.nama_customer from r_t_bpb bpb
            left join r_t_po rtpo on bpb.r_po_id = rtpo.id
            left join m_cv cv on bpb.reff_cv = cv.id
            left join m_customers_cv cs on bpb.m_customer_id = cs.id
            left join r_t_surat_jalan rtsj on rtsj.id = bpb.r_sj_id
            left join r_t_surat_jalan rtsj2 on rtsj2.id = rtsj.r_sj_id
            left join r_t_so rtso on rtso.id = rtsj2.r_so_id
            left join r_t_po rtpo2 on rtpo2.id = rtso.po_id
            where bpb.id = ".$id);
        return $data;
    }

    function print_list_bpb_detail($id){
        $data = $this->db->query("select bpbd.*, rsk.nama_item, jb.jenis_barang, coalesce(rsk.uom, jb.uom) as uom, sum(bpbd.netto) as netto_sum from r_t_bpb_detail bpbd 
        left join r_t_bpb bpb on bpb.id = bpbd.bpb_resmi_id
        left join rongsok rsk on bpb.jenis_barang = 'RONGSOK' and rsk.id = bpbd.jenis_barang_id
        left join jenis_barang jb on bpb.jenis_barang = 'FG' and jb.id = bpbd.jenis_barang_id
        where bpbd.bpb_resmi_id =".$id." group by bpbd.jenis_barang_id");
        return $data;
    }

    function po_free(){
        $data = $this->db->query("select * from r_t_po where flag_bpb = 0 and cv_id = 0");
        return $data;
    }

    function list_bpb_detail_only($id){
        return $this->db->query('select id, bpb_resmi_id as bpb_id, jenis_barang_id, no_packing, qty, bruto, netto, nomor_bobbin, line_remarks from r_t_bpb_detail where bpb_resmi_id = '.$id);
    }
}
