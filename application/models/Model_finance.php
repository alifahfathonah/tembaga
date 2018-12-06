<?php
class Model_finance extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select fum.*, mc.nama_customer From f_uang_masuk fum
            left join m_customers mc on mc.id = fum.m_customer_id
            Order By tanggal");
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

    function list_data_voucher(){
        $data = $this->db->query("Select * from voucher");
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
        $data = $this->db->query("select fpd.*,v.no_voucher,v.jenis_voucher,v.jenis_barang,v.amount,v.keterangan from f_pembayaran_detail fpd
                left join voucher v on v.id=fpd.voucher_id
                where fpd.id_pembayaran =".$id);
        return $data;
    }

    function list_voucher_data(){
        $data = $this->db->query("Select * from voucher");
        return $data;
    }

    function load_detail_um($id){
        $data = $this->db->query("Select * from f_uang_masuk where pembayaran_id =".$id);
        return $data;
    }

    function list_data_um(){
        $data = $this->db->query("Select * from f_uang_masuk where pembayaran_id = 0");
        return $data;
    }

    function get_data_um($id){
        $data = $this->db->query("Select * from f_uang_masuk where id = ".$id);
        return $data;
    }
}