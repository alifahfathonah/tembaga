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

    function list_peminjam(){
        $data = $this->db->query("select mbp.*, tsj.no_surat_jalan, mc.nama_customer, (select count(tsjd.id) as jumlah_item from t_surat_jalan_detail tsjd where tsjd.t_sj_id = tsj.id) as jumlah_item
            from m_bobbin_peminjaman mbp left join t_surat_jalan tsj on (mbp.id_surat_jalan = tsj.id)
            left join m_customers mc on (mbp.id_customer = mc.id)
            ");
        return $data;

        // $data = $this->db->query("select mbs.*, aprv.realname as approved_name, rjct.realname as rejected_name, (select count(mbsd.id) from m_bobbin_spb_detail mbsd where mbsd.id_spb_bobbin = mbs.id) as jumlah_item from m_bobbin_spb mbs
        //     left join users aprv on (aprv.id = mbs.approved_by)
        //     left join users rjct on (rjct.id = mbs.rejected_by)
        //     ");
        // return $data;
    }

    function show_header_peminjam($id){
        $data = $this->db->query("select mbp.*, usr.realname, tsj.no_surat_jalan, mc.nama_customer
            from m_bobbin_peminjaman mbp left join t_surat_jalan tsj on (mbp.id_surat_jalan = tsj.id)
            left join m_customers mc on (mbp.id_customer = mc.id)
            left join users usr on (mbp.created_by = usr.id)
            where mbp.id = ".$id);

        return $data;
    }
    function show_detail_peminjam($id){
        $data = $this->db->query("select mbp.*, tsj.no_surat_jalan, tsjd.nomor_bobbin, mc.nama_customer, (select count(tsjd.id) as jumlah_item from t_surat_jalan_detail tsjd where tsjd.t_sj_id = tsj.id) as jumlah_item
            from m_bobbin_peminjaman mbp left join t_surat_jalan tsj on (mbp.id_surat_jalan = tsj.id)
            left join m_customers mc on (mbp.id_customer = mc.id)
            left join t_surat_jalan_detail tsjd on (tsjd.t_sj_id = tsj.id)
            where mbp.id = ".$id);
        return $data;
    }

    function list_bobbin(){
        $data = $this->db->query("select mbt.*, (select count(mbtd.id) as jumlah_item from m_bobbin_penerimaan_detail mbtd where mbtd.id_bobbin_penerimaan = mbt.id) as jumlah_item
            from m_bobbin_penerimaan mbt");
        return $data;
    }

    function customer_list(){
        $this->db->order_by('nama_customer', 'asc');
        $data = $this->db->get('m_customers');
        return $data;
    }

    function get_sj_list($id){
        $data = $this->db->query("Select * From m_bobbin_peminjaman mbp Where mbp.id_customer=".$id." and status = 0");
        return $data;
    }

    function show_header_penerimaan($id){
        $data = $this->db->query("select mbt.*, mbp.no_surat_peminjaman, mbp.id_customer, mc.nama_customer, u.realname
            from m_bobbin_penerimaan mbt
            left join m_bobbin_peminjaman mbp on (mbt.id_peminjaman = mbp.id)
            left join m_customers mc on (mbp.id_customer = mc.id)
            left join users u on (u.id = mbt.created_by)
            where mbt.id = ".$id);
        return $data;
    }

    function load_list_bobbin_penerimaan($id_peminjaman){
        $data = $this->db->query("select mbp.*, mbpd.nomor_bobbin
            from m_bobbin_peminjaman mbp
            left join m_bobbin_peminjaman_detail mbpd on (mbpd.id_peminjaman = mbp.id)
            where mbp.id = ".$id_peminjaman." and mbpd.id_penerimaan = 0");

        // $data = $this->db->query("select mbt.*, mbp.id_surat_jalan, tsjd.nomor_bobbin, mb.id
        //     from m_bobbin_penerimaan mbt
        //     left join m_bobbin_peminjaman mbp on (mbt.id_peminjaman = mbp.id)
        //     left join t_surat_jalan_detail tsjd on (mbp.id_surat_jalan = tsjd.t_sj_id)
        //     left join m_bobbin mb on (tsjd.nomor_bobbin = mb.nomor_bobbin)
        //     where mbt.id_peminjaman = ".$id_peminjaman);
        return $data;    
    }

    function check_sisa_bobbin($id){
        $data = $this->db->query("select id from m_bobbin_peminjaman_detail 
            where id_peminjaman =".$id." and id_penerimaan = 0");
        return $data;
    }

    function load_bobbin_penerimaan_detail($id){
        $data = $this->db->query("select mbtd.*, mb.nomor_bobbin, mb.status from m_bobbin_penerimaan_detail mbtd left join m_bobbin mb on (mb.nomor_bobbin = mbtd.nomor_bobbin) where mbtd.id_bobbin_penerimaan = ".$id);

        // $data = $this->db->query("select mbtd.*, mbt.id, mbt.id_peminjaman, mbp.id_surat_jalan, tsjd.nomor_bobbin 
        //     from m_bobbin_penerimaan_detail mbtd 
        //     left join m_bobbin_penerimaan mbt on (mbtd.id_bobbin_penerimaan = mbt.id) 
        //     left join m_bobbin_peminjaman mbp on (mbt.id_peminjaman = mbp.id) 
        //     left join t_surat_jalan_detail tsjd on (mbp.id_surat_jalan = tsjd.t_sj_id)
        //     where mbtd.id_bobbin_penerimaan = ".$id_penerimaan);
        return $data;
    }

}