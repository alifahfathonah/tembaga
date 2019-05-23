<?php
class Model_bobbin extends CI_Model{
    function index_bobbin(){
        $data = $this->db->query("Select b.*, mjp.jenis_packing, mbs.bobbin_size, mbs.keterangan, o.nama_owner
            From m_bobbin b
            left join m_bobbin_size mbs on (mbs.id = b.m_bobbin_size_id)
            left join m_jenis_packing mjp on (mjp.id = b.m_jenis_packing_id)
            left join owner o on (o.id = b.owner_id)
            order by b.id desc
            ");
        return $data;
    }
    function list_data($id){
        $data = $this->db->query("Select b.*, mjp.jenis_packing, mbs.bobbin_size, mbs.keterangan, o.nama_owner
            From m_bobbin b
            left join m_bobbin_size mbs on (mbs.id = b.m_bobbin_size_id)
            left join m_jenis_packing mjp on (mjp.id = b.m_jenis_packing_id)
            left join owner o on (o.id = b.owner_id)
            where b.status =".$id."
            order by b.id desc
            ");
        return $data;
    }

    function view_bobbin($id){
        $data = $this->db->query("select mb.*, mjp.jenis_packing, mbs.bobbin_size, COALESCE(mc.nama_customer, s.nama_supplier) as peminjam, o.nama_owner from m_bobbin mb
            left join m_jenis_packing mjp on mjp.id = mb.m_jenis_packing_id
            left join m_bobbin_size mbs on mbs.id = mb.m_bobbin_size_id
            left join m_customers mc on mb.borrowed_by != 0 and mc.id = mb.borrowed_by
            left join supplier s on mb.borrowed_by_supplier != 0 and s.id = mb.borrowed_by_supplier
            left join owner o on (o.id = mb.owner_id)
            where mb.id =".$id);
        return $data;
    }

    function cek_data($code){
        $data = $this->db->query("Select * From bobin Where nama_bobin='".$code."'");        
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select b.*, bobbin_size From m_bobbin b
            left join m_bobbin_size mbs on mbs.id = b.m_bobbin_size_id
            Where b.id=".$id);        
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

    function get_packing($id){
        $data = $this->db->query("select mbs.id,bobbin_size, mbs.keterangan, mjp.jenis_packing, mjp.id as id_packing
            from m_bobbin_size mbs
            left join m_jenis_packing mjp on(mjp.id = mbs.jenis_packing_id) where mbs.id = ".$id);
        return $data;
    }

    function get_size_list(){
        $data = $this->db->query("select mbs.id,bobbin_size, mbs.keterangan, mjp.jenis_packing, mjp.id as id_packing
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
        $data = $this->db->query("select mbs.*, aprv.realname as approved_name, rjct.realname as rejected_name, (select count(mbsd.id) from bobbin_spb_detail mbsd where mbsd.id_spb_bobbin = mbs.id) as jumlah_item from bobbin_spb mbs
            left join users aprv on (aprv.id = mbs.approved_by)
            left join users rjct on (rjct.id = mbs.rejected_by)
            order by id desc
            ");
        return $data;
    }

    function show_header_spb($id){
        $data = $this->db->query("Select mbs.*,
                usr.realname As pic,
                appr.realname As aprroved_name,
                rjct.realname As rejected_name,
                mjp.jenis_packing As nama_jenis
                from bobbin_spb mbs
                    left join users usr on (mbs.created_by = usr.id)
                    left join m_jenis_packing mjp on (mjp.id = mbs.jenis_packing)
                    left join users appr on (mbs.approved_by = usr.id)
                    left join users rjct on (mbs.rejected_by = usr.id)
                where mbs.id=".$id);

        return $data;
    }

    // function show_detail_spb($id){
    //     $data = $this->db->query("select mb.*, mjp.jenis_packing, mbs.bobbin_size
    //         from m_bobbin mb inner join m_jenis_packing mjp on mb.m_jenis_packing_id = mjp.id
    //         left join m_bobbin_size mbs on mb.m_bobbin_size_id = mbs.id
    //         ");

    //     return $data;
    // }
    function show_detail_spb($id){
        $data = $this->db->query("select bs.*, mbs.bobbin_size, mbs.keterangan from bobbin_spb_detail bs left join m_bobbin_size mbs on mbs.id = bs.jenis_size
            where bs.id_spb_bobbin =".$id);
        return $data;
    }


    function show_detail_spb_fulfilment($id){
        // $data = $this->db->query("select mb.nomor_bobbin, mb.berat");

        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom from t_gudang_fg tgf 
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tgf.t_spb_fg_id =".$id." and tgf.jenis_trx = 1
                order by tgf.jenis_barang_id");
        return $data;
    }

    function bobbin_list($id_jenis, $id){
        $data = $this->db->query("select * from m_bobbin mb
            where not exists 
            (SELECT id_bobbin 
            FROM bobbin_spb_detail mbsd
            WHERE mbsd.id_spb_bobbin =".$id." and mbsd.id_bobbin = mb.id) 
            and m_jenis_packing_id =".$id_jenis." and status = 0");
        return $data;
    }

    function load_spb_detail($id){
        $data = $this->db->query("select mbsd.id, mb.nomor_bobbin, mb.berat
            from bobbin_spb_detail mbsd
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
                from bobbin_spb_fulfilment mbsd
                left join m_bobbin mb on (mb.id = mbsd.bobbin_id )
                where mbsd.id_spb_bobbin =".$id
                );
        return $data;
    }

    function list_peminjam(){
        $data = $this->db->query("select mbp.*, tsj.no_surat_jalan, mc.nama_customer, supp.nama_supplier, (select count(mbpd.id) as jumlah_item from m_bobbin_peminjaman_detail mbpd where mbpd.id_peminjaman = mbp.id) as jumlah_item
            from m_bobbin_peminjaman mbp left join t_surat_jalan tsj on (mbp.id_surat_jalan = tsj.id)
            left join m_customers mc on (mbp.id_customer = mc.id)
            left join supplier supp on (mbp.supplier_id = supp.id)
            ");
        return $data;

        // $data = $this->db->query("select mbs.*, aprv.realname as approved_name, rjct.realname as rejected_name, (select count(mbsd.id) from m_bobbin_spb_detail mbsd where mbsd.id_spb_bobbin = mbs.id) as jumlah_item from m_bobbin_spb mbs
        //     left join users aprv on (aprv.id = mbs.approved_by)
        //     left join users rjct on (rjct.id = mbs.rejected_by)
        //     ");
        // return $data;
    }

    function jenis_size($id){
        $data = $this->db->query("select * from m_bobbin_size where jenis_packing_id =".$id);
        return $data;
    }

    function show_header_peminjam($id){
        $data = $this->db->query("select mbp.*, usr.realname, tsj.no_surat_jalan, mc.nama_customer, supp.nama_supplier, coalesce(mc.nama_customer, supp.nama_supplier) as nama_peminjam
            from m_bobbin_peminjaman mbp left join t_surat_jalan tsj on (mbp.id_surat_jalan = tsj.id)
            left join m_customers mc on (mbp.id_customer = mc.id)
            left join users usr on (mbp.created_by = usr.id)
            left join supplier supp on (mbp.supplier_id = supp.id)
            where mbp.id = ".$id);

        return $data;
    }
    function show_detail_peminjam($id){
        $data = $this->db->query("select mbpd.*, mb.berat from m_bobbin_peminjaman_detail mbpd
            left join m_bobbin mb on (mb.nomor_bobbin = mbpd.nomor_bobbin)
            where mbpd.id_peminjaman = ".$id);
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

    function supplier_list(){
        $this->db->order_by('nama_supplier', 'asc');
        $data = $this->db->get('supplier');
        return $data;
    }

    function get_sj_list($id){
        $data = $this->db->query("Select mbp.*, tsj.no_surat_jalan From m_bobbin_peminjaman mbp 
            left join t_surat_jalan tsj on tsj.id = mbp.id_surat_jalan
            Where mbp.id_customer=".$id." and mbp.status = 0");
        return $data;
    }

    function get_sj_list_supplier($id){
        $data = $this->db->query("Select * From m_bobbin_peminjaman mbp Where mbp.supplier_id=".$id." and status = 0");
        return $data;
    }

    function show_header_penerimaan($id){
        $data = $this->db->query("select mbt.id, mbt.tanggal, mbt.surat_jalan, mbt.remarks, mbt.no_penerimaan, COALESCE(mc.nama_customer, s.nama_supplier) as pengirim, u.realname
            from m_bobbin_penerimaan mbt
            left join m_customers mc on (mbt.id_customer != 0 and mbt.id_customer = mc.id)
            left join supplier s on (mbt.id_supplier != 0 and mbt.id_supplier = s.id)
            left join users u on (u.id = mbt.created_by)
            where mbt.id = ".$id);
        return $data;
    }

    function load_list_bobbin_penerimaan($id_peminjaman){
        $data = $this->db->query("select * from m_bobbin_peminjaman_detail mbpd
            where mbpd.id_penerimaan = 0 and mbpd.id_peminjaman =".$id_peminjaman);

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

    function list_supplier(){
        $data = $this->db->query("select * from supplier order by nama_supplier");
        return $data;
    }

    function cek_bobbin_unique($id){
        $data = $this->db->query("select id from m_bobbin where nomor_bobbin ='".$id."'");
        return $data;
    }

    // function get_bobbin($id){
    //     $data = $this->db->query("select id, berat from m_bobbin where status = 0 and nomor_bobbin ='".$id."'");
    //     return $data;
    // }

    function get_bobbin($id){
        $data = $this->db->query("select id, berat from m_bobbin where nomor_bobbin ='".$id."'");
        return $data;
    }

    function get_bobbin_deliver($id){
        $data = $this->db->query("select id, berat from m_bobbin where status = 2 and nomor_bobbin ='".$id."'");
        return $data;
    }

    function get_bobbin_booked(){
        $data = $this->db->query("select *from m_bobbin where status = 3");
        return $data;
    }

    function get_dtr_detail_by_no_pallete($no_pallete){
        $data = $this->db->query(
                "select dtr_detail.id,(ttr.id)as 'ttr_id' ,bruto, netto,no_pallete,line_remarks,rongsok.id as id_rongsok, (rongsok.nama_item)as rongsokname,rongsok.uom
                from dtr_detail
                left join rongsok on rongsok.id = dtr_detail.rongsok_id
                left join ttr on ttr.dtr_id = dtr_detail.dtr_id
                where no_bobbin='".$no_pallete."' and flag_taken=0"
                );
        return $data;
    }    

    function list_spb(){
        $data = $this->db->query("select *from bobbin_spb where keperluan = 1");
        return $data;
    }

    function load_bobbin_spb($id){
        $data = $this->db->query("select mbsd.*, mb.nomor_bobbin 
            from bobbin_spb_fulfilment mbsd 
            left join m_bobbin mb on (mbsd.bobbin_id = mb.id) 
            where mbsd.id_spb_bobbin = ".$id);
        return $data;
    }

    function get_supplier_peminjaman($id){
        $data = $this->db->query("select *from supplier where id = ".$id);
        return $data;
    }

    function header_peminjaman_eks($id){
        $data = $this->db->query("select mbs.*, u.realname
            from bobbin_spb mbs
            left join users u on (mbs.created_by = u.id)
            where mbs.id = ".$id);
        return $data;
    }

    function get_bobbin_print($id){
        $data = $this->db->query("select mb.nomor_bobbin, mb.berat, mb.tanggal, mb.nomor_urut, mbz.keterangan from m_bobbin mb
            left join m_bobbin_size mbz on mbz.id = mb.m_bobbin_size_id
            where mb.id =".$id);
        return $data;
    }
}