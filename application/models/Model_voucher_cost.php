<?php
class Model_voucher_cost extends CI_Model{
    function list_data($ppn){
        $data = $this->db->query("Select voucher.*, 
                gc.nama_group_cost,
                cost.nama_cost,
                mc.nama_customer,
                supp.nama_supplier,
                COALESCE(nm_cost, mc.nama_customer, supp.nama_supplier) as nama_trx,
                fk.nomor
                From voucher 
                    Left Join group_cost gc On (voucher.group_cost_id = gc.id) 
                    Left Join cost On (voucher.cost_id = cost.id)
                    Left Join m_customers mc ON (voucher.customer_id = mc.id)
                    Left join supplier supp on (voucher.supplier_id = supp.id)
                    Left Join f_kas fk On (voucher.id = fk.id_vc)
                Where voucher.jenis_voucher='Manual' and voucher.flag_ppn =".$ppn."
                Order By voucher.no_voucher");
        return $data;
    }

    function list_data_kh($ppn){
        $data = $this->db->query("Select voucher.*, voucher.no_voucher as nomor, 
                gc.nama_group_cost,
                cost.nama_cost,
                mc.nama_customer,
                supp.nama_supplier,
                COALESCE(nm_cost, mc.nama_customer, supp.nama_supplier) as nama_trx
                From voucher 
                    Left Join group_cost gc On (voucher.group_cost_id = gc.id) 
                    Left Join cost On (voucher.cost_id = cost.id)
                    Left Join m_customers mc ON (voucher.customer_id = mc.id)
                    Left join supplier supp on (voucher.supplier_id = supp.id)
                Where voucher.jenis_voucher='Manual' and voucher.flag_ppn =".$ppn." and status = 0
                Order By voucher.no_voucher desc");
        return $data;
    }

    function list_data_kk($ppn){
        $data = $this->db->query("Select fk.*, 
                gc.nama_group_cost,
                cost.nama_cost,
                mc.nama_customer,
                supp.nama_supplier,
                COALESCE(nm_cost, mc.nama_customer, supp.nama_supplier) as nama_trx
                From f_kas fk
                    Left Join voucher On (voucher.id_fk = fk.id)
                    Left Join group_cost gc On (voucher.group_cost_id = gc.id) 
                    Left Join cost On (voucher.cost_id = cost.id)
                    Left Join m_customers mc ON (voucher.customer_id = mc.id)
                    Left join supplier supp on (voucher.supplier_id = supp.id)
                Where fk.id_bank <= 3 and fk.flag_ppn =".$ppn." and fk.jenis_trx = 1
                group by fk.id
                Order By fk.nomor desc");
        return $data;
    }

    function list_data_bk($ppn){
        $data = $this->db->query("Select fk.*, 
                gc.nama_group_cost,
                cost.nama_cost,
                mc.nama_customer,
                supp.nama_supplier,
                COALESCE(NULLIF(nm_cost,''), mc.nama_customer, supp.nama_supplier) as nama_trx
                From f_kas fk
                    Left Join voucher On (voucher.id_fk = fk.id)
                    Left Join group_cost gc On (voucher.group_cost_id = gc.id) 
                    Left Join cost On (voucher.cost_id = cost.id)
                    Left Join m_customers mc ON (voucher.customer_id = mc.id)
                    Left join supplier supp on (voucher.supplier_id = supp.id)
                Where fk.id_bank > 3 and fk.flag_ppn =".$ppn." and fk.jenis_trx = 1
                group by fk.id
                Order By fk.nomor desc");
        return $data;
    }
    
    function get_cost_list($id){
        $data = $this->db->query("Select * From cost Where group_cost_id=".$id);
        return $data;
    }
            
    function show_data($id){
        $data = $this->db->query("Select * From cost Where id=".$id);        
        return $data;
    }
    
    function list_group_cost(){
        $data = $this->db->query("Select * From group_cost Order By Id asc");
        return $data;
    }

    function get_customer(){
        $data = $this->db->query("select id, nama_customer as nama_cost from m_customers order by nama_customer");
        return $data;
    }

    function get_supplier(){
        $data = $this->db->query("select id, nama_supplier as nama_cost from supplier order by nama_supplier");
        return $data;
    }

    function customer_list(){
        $data = $this->db->query("Select voucher.*, 
                gc.nama_group_cost,
                mc.nama_customer as nama_cost
                From voucher 
                    Left Join group_cost gc On (voucher.group_cost_id = gc.id)
                    Left Join m_customers mc on (voucher.cost_id = mc.id) 
                Where voucher.jenis_voucher='Manual'
                Order By voucher.no_voucher");
        return $data;
    }

    function get_f_kas($id){
        $data = $this->db->query("select fk.id, v.id as id_vc, v.po_id, v.vk_id FROM f_kas fk
                left join voucher v on v.id_fk = fk.id
                WHERE fk.id =".$id." limit 1");
        return $data;
    }

    function list_data_voucher($ppn){
        $data = $this->db->query("Select v.*, po.no_po, coalesce(s.nama_supplier, mc.nama_customer)as nama from voucher v
            left join supplier s on s.id = v.supplier_id
            left join m_customers mc on mc.id = v.customer_id
            left join po on po.id = v.po_id
            where v.pembayaran_id = 0 and v.status = 0 and v.flag_ppn =".$ppn);
        return $data;
    }

    function show_header_voucher($id){
        $data = $this->db->query("select v.*, COALESCE(s.nama_supplier, mc.nama_customer) as nama, p.no_po, p.currency, pmb.no_pembayaran, u.realname as pic 
            from voucher v 
            left join po p on (p.id = v.po_id)
            left join supplier s on (s.id = p.supplier_id)
            left join m_customers mc on (mc.id = v.customer_id)
            left join f_pembayaran pmb on (pmb.id = v.pembayaran_id)
            left join users u on (u.id = v.created_by)
            where v.id = ".$id);
        return $data;
    }

    function show_detail_voucher($id){
        $data = $this->db->query("Select v.*, po.no_po, coalesce(s.nama_supplier, mc.nama_customer)as nama, concat_ws(v.nm_cost, v.keterangan) as keterangan from voucher v
                left join supplier s on s.id = v.supplier_id
                left join m_customers mc on mc.id = v.customer_id
                left join po on po.id = v.po_id
                where v.id = ".$id);
        return $data;
    }
}