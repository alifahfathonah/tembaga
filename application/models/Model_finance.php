<?php
class Model_finance extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            Order By tanggal desc");
        return $data;
    }

    function replace_list($id, $jenis){
        $data = $this->db->query("Select * from f_uang_masuk where status = 9 and replace_id = 0 and m_customer_id =".$id." and jenis_pembayaran = '".$jenis."'");
        return $data;
    }

    function replace_list_detail($id){
        $data = $this->db->query("Select * from f_uang_masuk where id = ".$id);
        return $data;
    }

    function customer_list(){
        $data = $this->db->query("Select * From m_customers Order By nama_customer");
        return $data;
    }

    function bank_list(){
        $data = $this->db->query("Select * From bank Order By kode_bank");
        return $data;
    }

    function get_bank_list($id){
        $data = $this->db->query("Select * From bank where id =".$id);
        return $data;
    }

    function view_um($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer, b.kode_bank, b.nama_bank, b.nomor_rekening, u.realname From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            left join bank b on b.id = fum.rekening_tujuan
            left join users u on u.id = fum.approved_by or u.id = fum.reject_by
            where fum.id = ".$id);
        return $data;
    }

    function list_data_voucher(){
        $data = $this->db->query("Select * from voucher where pembayaran_id = 0");
        return $data;
    }

    function voucher_list(){
        $data = $this->db->query("Select voucher.*, 
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id)
                Order By voucher.no_voucher");
        return $data;
    }

    function list_voucher($id){
        $data = $this->db->query("Select * from voucher where id = ".$id);
        return $data;
    }

    function list_um(){
        $data = $this->db->query("select * from f_uang_masuk where pembayaran_id = 0");
        return $data;
    }

    function list_data_pembayaran(){
        $data = $this->db->query("select * from f_pembayaran");
        return $data;
    }

    function list_detail_pembayaran($id){
        $data = $this->db->query("select fp.*, usr.realname from f_pembayaran fp
                Left Join users usr On (fp.created_by = usr.id)
                where fp.id =".$id);
        return $data;
    }

    function load_detail($id){
        $data = $this->db->query("select * from voucher where pembayaran_id = ".$id);
        return $data;
    }

    function list_voucher_data(){
        $data = $this->db->query("Select * from voucher");
        return $data;
    }

    function load_detail_um($id){
        $data = $this->db->query("select fpd.*, fum.bank_pembayaran, fum.jenis_pembayaran, fum.nominal, fum.keterangan, fum.currency, fum.rekening_pembayaran, mc.nama_customer
            from f_pembayaran_detail fpd
            left join f_uang_masuk fum on fum.id = fpd.um_id
            left join m_customers mc on mc.id = fum.m_customer_id
            where fpd.id_pembayaran = ".$id." and fpd.voucher_id = 0");
        return $data;
    }

    function list_data_um(){
        $data = $this->db->query("Select fum.* from f_uang_masuk fum
                left join f_pembayaran_detail fpd on fpd.um_id = fum.id 
                where fpd.um_id is null and (status = 1 or status = 0)");
        return $data;
    }

    function get_data_um($id){
        $data = $this->db->query("Select fum.*, mc.nama_customer from f_uang_masuk fum
                left join m_customers mc on mc.id = fum.m_customer_id
                where fum.id = ".$id);
        return $data;
    }
}