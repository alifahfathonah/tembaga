<?php
class Model_bobbin extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select b.*, mbs.bobbin_size, mbs.keterangan, o.nama_owner
            From m_bobbin b
            left join m_bobbin_size mbs on (mbs.id = b.m_bobbin_size_id)
            left join owner o on (o.id = b.owner_id)
            order by b.id desc
            ");
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From bobin Where nama_bobin='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select b.* From m_bobbin b Where id=".$id);        
        return $data;
    }

    function show_detail_packing($id){
        $data = $this->db->query("Select mjp.id as id_packing
            From m_bobbin_size mbs 
            left join m_jenis_packing mjp on(mjp.id = mbs.jenis_packing_id)
            Where mbs.id=".$id);        
        return $data;
    }

    function get_owner_list(){
        $data = $this->db->query("select * from owner");
        return $data;
    }

    function get_size_list(){
        $data = $this->db->query("select mbs.id,bobbin_size, mbs.keterangan, mjp.jenis_packing
            from m_bobbin_size mbs
            left join m_jenis_packing mjp on(mjp.id = mbs.jenis_packing_id)");
        return $data;
    }

    function get_format_penomoran($id){
        $data = $this->db->query("select penomoran,bobbin_size
            from m_bobbin_size
            where id=".$id)->row_array();
        return $data;
    }

    function spb_list(){
        $data = $this->db->query("select mbs.*, aprv.realname as approved_name, rjct.realname as rejected_name, (select count(mbsd.id) from m_bobbin_spb_detail mbsd where mbsd.id_spb_bobbin = mbs.id) as jumlah_item from m_bobbin_spb mbs
            left join users aprv on (aprv.id = mbs.approved_by)
            left join users rjct on (rjct.id = mbs.rejected_by)
            ");
        return $data;
    }

    function show_header_spb($id){
        $data = $this->db->query("Select mbs.*,
                usr.realname As pic,
                appr.realname As aprroved_name,
                rjct.realname As rejected_name,
                mjp.jenis_packing As nama_jenis
                from m_bobbin_spb mbs
                    left join users usr on (mbs.created_by = usr.id)
                    left join m_jenis_packing mjp on (mjp.id = mbs.jenis_packing)
                    left join users appr on (mbs.approved_by = usr.id)
                    left join users rjct on (mbs.rejected_by = usr.id)
                where mbs.id=".$id);

        return $data;
    }

    function show_detail_spb($id){
        $data = $this->db->query("select mb.*, mjp.jenis_packing, mbs.bobbin_size
            from m_bobbin mb inner join m_jenis_packing mjp on mb.m_jenis_packing_id = mjp.id
            left join m_bobbin_size mbs on mb.m_bobbin_size_id = mbs.id
            ");

        return $data;
    }

    function show_detail_spb_fulfilment($id){
        $data = $this->db->query("select mb.nomor_bobbin, mb.berat");

        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom from t_gudang_fg tgf 
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tgf.t_spb_fg_id =".$id." and tgf.jenis_trx = 1
                order by tgf.jenis_barang_id");
        return $data;
    }

    function bobbin_list($id_jenis){
        $data = $this->db->query("select *
                from m_bobbin where m_jenis_packing_id = ".$id_jenis);

        return $data;
    }

    function load_spb_detail($id){
        $data = $this->db->query("select mbsd.id, mb.nomor_bobbin, mb.berat
            from m_bobbin_spb_detail mbsd
            left join m_bobbin mb on (mbsd.id_bobbin = mb.id)
            where mbsd.id_spb_bobbin = ".$id);
        return $data;
    }

    function get_berat($id){
        $data = $this->db->query("select *from m_bobbin where id = ".$id);
        return $data;
    }

    function jenis_barang_list_by_spb($id){
        $data = $this->db->query("select mb.nomor_bobbin, mb.id, mb.berat, mb.status
                from m_bobbin_spb_detail mbsd
                left join m_bobbin mb on (mb.id = mbsd.id_bobbin )
                where id_spb_bobbin =".$id
                );
        return $data;
    }
}