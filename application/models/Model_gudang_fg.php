<?php
class Model_gudang_fg extends CI_Model{
    // function gudang_fg_list(){
    //     $data = $this->db->query("Select tgf.*, jb.jenis_barang, tbf.no_bpb_fg, mb.berat, o.nama_owner, mjp.jenis_packing,
    //                 usr.realname As pengirim
    //             From t_gudang_fg tgf
    //                 Left Join users usr On (tgf.created_by = usr.id)
    //                 left join jenis_barang jb on (jb.id = tgf.jenis_barang_id)
    //                 left join t_bpb_fg_detail tbfd on (tbfd.id = tgf.t_bpb_fg_detail_id)
    //                 left join t_bpb_fg tbf on (tbf.id = tbfd.t_bpb_fg_id)
    //                 left join m_bobbin mb on (mb.id = tgf.bobbin_id)
    //                 left join owner o on (o.id = mb.owner_id)
    //                 left join produksi_fg pf on (pf.id = tbf.produksi_fg_id)
    //                 left join m_jenis_packing mjp on (mjp.id = pf.jenis_packing_id)
    //             Where tgf.flag_taken=0 
    //             Order By tgf.id Desc");
    //     return $data;
    // }      

    function gudang_fg_list(){
        $data = $this->db->query("select * from stok_fg");
        return $data;
    }

    function view_gudang_fg($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang from t_gudang_fg tgf
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tgf.jenis_trx = 0 and tgf.jenis_barang_id =".$id);
        return $data;
    }

    function gudang_fg_produksi_list(){
        $data = $this->db->query("Select pf.*, jb.jenis_barang, jp.jenis_packing,
                    (select count(pfd.id) from produksi_fg_detail pfd where pfd.produksi_fg_id = pf.id)as total_barang,
                    (select sum(netto) from produksi_fg_detail pfd where pfd.produksi_fg_id = pf.id)as total_netto,
                    usr.realname As pembuat
                From produksi_fg pf
                    Left Join users usr On (pf.created_by = usr.id)
                    left join jenis_barang jb on (jb.id = pf.jenis_barang_id)
                    left join m_jenis_packing jp on (jp.id = pf.jenis_packing_id)  
                Order By pf.tanggal desc, pf.id desc");
        return $data;
    } 

    function bpb_list($ppn){
        $data = $this->db->query("Select bpbfg.*, jb.jenis_barang, COALESCE(pf.no_laporan_produksi,r.no_retur) as no_produksi, COALESCE(pf.jenis_packing_id,r.jenis_packing_id) as jenis_packing_id,
                    (select count(id) from t_bpb_fg_detail tbfd where tbfd.t_bpb_fg_id = bpbfg.id)as jumlah_item,
                    usr.realname As pengirim
                From t_bpb_fg bpbfg
                    Left join users usr On (bpbfg.created_by = usr.id)
                    Left join jenis_barang jb on (jb.id = bpbfg.jenis_barang_id)
                    left join produksi_fg pf on (substring(bpbfg.no_bpb_fg,1,7) = 'BPB-SDM') and (pf.id = bpbfg.produksi_fg_id)
                    left join retur r on (substring(bpbfg.no_bpb_fg,1,7) = 'BPB-RTR') and (r.id = bpbfg.produksi_fg_id)
                    left join m_jenis_packing jp on (jp.id = pf.jenis_packing_id) or (jp.id = pf.jenis_packing_id)
                Where bpbfg.flag_ppn =".$ppn."
                Order By bpbfg.id Desc");
        return $data;
    }
    
    function show_header_bpb($id){
        $data = $this->db->query("Select tbf.*, COALESCE(pf.no_laporan_produksi,r.no_retur) as no_laporan_produksi, COALESCE(pf.jenis_packing_id,r.jenis_packing_id,0) as jenis_packing_id, jb.jenis_barang, jb.id as id_jenis_barang,
                    usr.realname As pengirim
                    From t_bpb_fg tbf
                        Left Join users usr On (tbf.created_by = usr.id)
                        left join produksi_fg pf on (substring(tbf.no_bpb_fg,1,7) = 'BPB-SDM') and (pf.id = tbf.produksi_fg_id)
                        left join retur r on (substring(tbf.no_bpb_fg,1,7) = 'BPB-RTR') and (r.id = tbf.produksi_fg_id)
                        left join m_jenis_packing mjp on (mjp.id = pf.jenis_packing_id) or (mjp.id = r.jenis_packing_id)
                        left join jenis_barang jb on (jb.id = tbf.jenis_barang_id)
                    Where tbf.id=".$id);
        return $data;
    }
    
    function show_detail_bpb($id){
        $data = $this->db->query("Select tbfd.*, jb.jenis_barang, mb.nomor_bobbin, mb.id as id_bobbin
                    From t_bpb_fg_detail tbfd 
                        Left Join jenis_barang jb On (tbfd.jenis_barang_id = jb.id) 
                        left join m_bobbin mb on (mb.id = tbfd.bobbin_id)
                    Where tbfd.t_bpb_fg_id=".$id);
        return $data;
    }

    function spb_list(){
        $data = $this->db->query("Select tsf.*, 
                    usr.realname As pic,
                    aprv.realname As approved_name,
                    rjt.realname As rejected_name,
                    rcv.realname As receiver_name,
                (Select count(tsfd.id)As jumlah_item From t_spb_fg_detail tsfd Where tsfd.t_spb_fg_id = tsf.id)As jumlah_item
                From t_spb_fg tsf
                    Left Join users usr On (tsf.created_by = usr.id) 
                    Left Join users aprv On (tsf.approved_by = aprv.id) 
                    Left Join users rjt On (tsf.rejected_by = rjt.id)
                    Left join users rcv on (tsf.received_by = rcv.id) 
                Order By tsf.id Desc");
        return $data;
    }

    function check_spb($id){
        $data = $this->db->query("select tsf.id, 
                (select sum(tsfd.netto) from t_spb_fg_detail tsfd where tsfd.t_spb_fg_id=tsf.id) as tot_spb,
                (select sum(tgf.netto) from t_gudang_fg tgf where tgf.t_spb_fg_id=tsf.id) as tot_so
                from t_spb_fg tsf
                where tsf.id =".$id);
        return $data;
    }

    function pilihan_spb_list(){
        $data = $this->db->query("Select tsf.*, 
                (Select count(tsfd.id)As jumlah_item From t_spb_fg_detail tsfd Where tsfd.t_spb_fg_id = tsf.id)As jml_barang
                From t_spb_fg tsf
                where tsf.status = 1
                order by tsf.id Desc
                ");
        return $data;

    }

    function jenis_barang_list_by_spb($id){
        $data = $this->db->query("select jb.jenis_barang, jb.id
                from t_spb_fg_detail tsfd
                left join jenis_barang jb on (jb.id = tsfd.jenis_barang_id )
                where t_spb_fg_id =".$id
                );
        return $data;
    }

    function barang_fg_list(){
        $data = $this->db->query("select jb.jenis_barang, jb.id
                from jenis_barang jb
                where category='FG'"
                );
        return $data;
    }

    function barang_fg_stock_list(){
        $data = $this->db->query("select jb.jenis_barang, jb.id
            from jenis_barang jb
            left join t_gudang_fg tgf on (jb.id = tgf.jenis_barang_id)
            where category = 'FG' and jb.id = tgf.jenis_barang_id and tgf.t_spb_fg_detail_id is null group by jb.jenis_barang");
        return $data;
    }

    function packing_fg_list(){
        $data = $this->db->query("select mjb.* from m_jenis_packing mjb");
        return $data;
    }

    function packing_list_by_name($id){
        $data = $this->db->query("select mb.*,mjb.jenis_packing
                from m_bobbin mb
                left join m_jenis_packing mjb on(mjb.id = mb.m_jenis_packing_id)
                where mjb.jenis_packing='".$id."'");
        return $data;
    }
    
    function show_header_laporan($id){
        $data = $this->db->query("Select pf.*, jb.id as jenis_barang_id, jb.jenis_barang, mjp.jenis_packing, jb.ukuran,
                    usr.realname As pembuat
                    From produksi_fg pf
                        Left Join users usr On (pf.created_by = usr.id)
                        Left join jenis_barang jb on (jb.id = pf.jenis_barang_id)
                        Left join m_jenis_packing mjp on (mjp.id = pf.jenis_packing_id)
                    Where pf.id=".$id);
        return $data;
    }

    function show_header_spb($id){
        $data = $this->db->query("Select tsf.*, 
                    usr.realname As pic,
                    appr.realname As approved_name,
                    rjct.realname As reject_name
                    From t_spb_fg tsf
                        Left Join users usr On (tsf.created_by = usr.id) 
                        Left Join users appr On (tsf.approved_by = appr.id)
                        Left Join users rjct On (tsf.rejected_by = rjct.id)
                    Where tsf.id=".$id);
        return $data;
    }
    
    function show_detail_spb($id){
        $data = $this->db->query("Select tsfd.*, jb.jenis_barang,
                    (select jenis_barang from stok_fg sf where sf.jenis_barang_id= tsfd.jenis_barang_id)as jenis_barang_stok,
                    (select total_qty from stok_fg sf where sf.jenis_barang_id = tsfd.jenis_barang_id)as total_qty,
                    (select total_netto from stok_fg sf where sf.jenis_barang_id = tsfd.jenis_barang_id)as total_netto
                    From t_spb_fg_detail tsfd 
                        Left Join jenis_barang jb On (jb.id = tsfd.jenis_barang_id)
                    Where tsfd.t_spb_fg_id=".$id);
        return $data;
    }

    function load_detail_saved_item($id){
        $data = $this->db->query("select jb.jenis_barang, jb.uom, tgf.* from  t_gudang_fg tgf
            left join jenis_barang jb on jb.id = tgf.jenis_barang_id 
            where tgf.t_spb_fg_id =".$id." and tgf.jenis_trx=0
            order by tgf.jenis_barang_id");
        return $data;
    }

    function load_detail($id){
        $data = $this->db->query("Select pfd.*,pf.jenis_barang_id,jb.jenis_barang, mb.nomor_bobbin, o.nama_owner
                From produksi_fg_detail pfd 
                Left Join m_bobbin mb On(mb.id = pfd.bobbin_id)
                Left Join owner o On(o.id = mb.owner_id) 
                Left Join produksi_fg pf on(pf.id = pfd.produksi_fg_id)
                Left Join jenis_barang jb on(jb.id = pf.jenis_barang_id)
                Where pfd.produksi_fg_id=".$id." 
                order by pfd.id");
        return $data;
    }

    function load_spb_fg_detail($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom
                from t_spb_fg_detail tsfd 
                left join jenis_barang jb on (jb.id = tsfd.jenis_barang_id) 
                left join t_gudang_fg tgf on (tgf.jenis_barang_id = jb.id) 
                where tgf.t_spb_fg_detail_id =".$id);
        return $data;
    }

    function load_spb_detail($id){
        $data = $this->db->query("Select tsfd.*, jb.jenis_barang
                From t_spb_fg_detail tsfd 
                Left Join jenis_barang jb On(tsfd.jenis_barang_id = jb.id) 
                Where tsfd.t_spb_fg_id=".$id);
        return $data;
    }

    //AFTER PRODUCTION TEST
    // function show_data_bobbin($id){
    //     $data = $this->db->query("select mb.berat, mb.id, o.nama_owner
    //             from m_bobbin mb
    //             left join owner o on (o.id = mb.owner_id)
    //             where mb.nomor_bobbin = '".$id."' and mb.status = 3"
    //             );
    //     return $data;
    // }

    //WHEN PRODUCTION TEST
    function show_data_bobbin($id){
        $data = $this->db->query("select mb.berat, mb.id, o.nama_owner
                from m_bobbin mb
                left join owner o on (o.id = mb.owner_id)
                where mb.nomor_bobbin = '".$id."'");
        return $data;
    }


    function show_data_barang($id){
        $data = $this->db->query("select jb.uom
                from jenis_barang jb 
                where jb.id = ".$id
                );
        return $data;
    }

    function show_data_barang_spb($id){
        $data = $this->db->query("select jb.uom,tsfd.id
                from t_spb_fg_detail tsfd
                left join jenis_barang jb on (jb.id = tsfd.jenis_barang_id)
                where tsfd.jenis_barang_id = ".$id
                );
        return $data;
    }

    function show_no_packing($id){
        $data = $this->db->query("select tgf.*, jb.uom
                from t_gudang_fg tgf
                left join jenis_barang jb on (jb.id = tgf.jenis_barang_id) 
                where tgf.jenis_barang_id =".$id." and tgf.t_spb_fg_detail_id is null"
                );
        return $data;
    }
    
    function show_no_packing_detail($id){
        $data = $this->db->query("select tgf.*, jb.uom from t_gudang_fg tgf 
                left JOIN jenis_barang jb on jb.id = tgf.jenis_barang_id
                WHERE tgf.id=".$id);
        return $data;
    }

    function get_packing($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom from t_gudang_fg tgf 
                left JOIN jenis_barang jb on jb.id = tgf.jenis_barang_id
                WHERE tgf.t_spb_fg_id is NULL and tgf.no_packing='".$id."'");
        return $data;
    }

    function get_detail_spb($id,$jb){
        $data = $this->db->query("select * from t_spb_fg_detail tsfd where tsfd.t_spb_fg_id =".$id." and tsfd.jenis_barang_id =".$jb);
        return $data;
    }

    function show_data_packing($id){
        $data = $this->db->query("select id, mjp.jenis_packing as packing
                from m_jenis_packing mjp 
                where mjp.id = ".$id
                );
        return $data;
    }

    function check_spb_reject($id){
        $data = $this->db->query("select count(id) as count from t_gudang_fg where t_spb_fg_id =".$id);
        return $data;
    }

    function show_detail_spb_fulfilment($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom, jb.kode from t_gudang_fg tgf 
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tgf.t_spb_fg_id =".$id." and tgf.jenis_trx = 0
                order by tgf.jenis_barang_id");
        return $data;
    }

    function show_detail_spb_saved($id){
        $data = $this->db->query("select jb.jenis_barang, jb.uom, tgf.* from  t_gudang_fg tgf
            left join jenis_barang jb on jb.id = tgf.jenis_barang_id 
            where tgf.t_spb_fg_id =".$id." and tgf.jenis_trx=1
            order by tgf.jenis_barang_id");
        return $data;
    }

    function show_detail_spb_print_fulfilment($id){
        $data = $this->db->query("select tgf.*, jb.jenis_barang, jb.uom from t_gudang_fg tgf 
                left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                where tgf.t_spb_fg_id =".$id."
                order by tgf.jenis_barang_id");
        return $data;
    }

    function show_barang_fg($id){
        $data = $this->db->query("select tgf.* ,jb.jenis_barang,jb.id as id_jenis_barang, jb.uom
                from t_gudang_fg tgf
                left join jenis_barang jb on (jb.id = tgf.jenis_barang_id)
                where tgf.id=".$id
                );
        return $data;
    }

    function check_urut($id){
        $data = $this->db->query("select count(pfd.id) as no_urut from produksi_fg_detail pfd
                left join produksi_fg pf on pf.id = pfd.produksi_fg_id
                where pf.jenis_packing_id =".$id);
        return $data;
    }

    function get_pfd_id($id){
        $data = $this->db->query("select pfd.*, jb.kode, jb.jenis_barang from produksi_fg_detail pfd 
                left join produksi_fg pf on pf.id = pfd.produksi_fg_id
                left join jenis_barang jb on jb.id = pf.jenis_barang_id where pfd.id =".$id);
        return $data;
    }

    function show_laporan(){
        $data = $this->db->query("select DATE_FORMAT(tg.tanggal,'%M %Y') as showdate, 
            EXTRACT(YEAR_MONTH from tg.tanggal) as tanggal, count(tg.id) as jumlah, sum(bruto) as bruto_masuk, sum(netto) as netto_masuk,
            COALESCE((select sum(bruto) from t_gudang_fg tgf where month(tgf.tanggal_keluar) = month(tg.tanggal)),0)as bruto_keluar,
            COALESCE((select sum(netto) from t_gudang_fg tgf where month(tgf.tanggal_keluar) = month(tg.tanggal)),0)as netto_keluar
            from t_gudang_fg tg
            group by year(tg.tanggal), month(tg.tanggal) order by tg.tanggal desc");
        return $data;
    }

    function show_view_laporan($bulan, $tahun){
        $data = $this->db->query("select tg.jenis_barang_id, jb.jenis_barang, count(tg.id) as jumlah, 
                (select sum(bruto) from t_gudang_fg tgf where month(tgf.tanggal_masuk) = ".$bulan." and year(tgf.tanggal_masuk) =".$tahun." and tgf.jenis_barang_id=jb.id) as bruto_masuk,
                (select sum(netto) from t_gudang_fg tgf where month(tgf.tanggal_masuk) =".$bulan." and year(tgf.tanggal_masuk) =".$tahun." and tgf.jenis_barang_id=jb.id) as netto_masuk,
                (select sum(bruto) from t_gudang_fg tgf where month(tgf.tanggal_keluar) =".$bulan." and year(tgf.tanggal_keluar) =".$tahun." and tgf.jenis_barang_id=jb.id) as bruto_keluar,
                (select sum(netto) from t_gudang_fg tgf where month(tgf.tanggal_keluar) =".$bulan." and year(tgf.tanggal_keluar) =".$tahun." and tgf.jenis_barang_id=jb.id) as netto_keluar
                from t_gudang_fg tg
                    left join jenis_barang jb on jb.id = tg.jenis_barang_id
                where month(tg.tanggal) =".$bulan." and year(tg.tanggal) =".$tahun."
            group by tg.jenis_barang_id");
        return $data;
    }

    function show_laporan_detail($bulan,$tahun,$id_barang){
        $data = $this->db->query("(SELECT
                    tg.id, tg.jenis_barang_id, tg.no_packing, jb.jenis_barang, tg.bruto, tg.netto, tg.tanggal_masuk, tg.tanggal_keluar = null as tanggal_keluar, tg.tanggal_masuk as tanggal
                FROM t_gudang_fg tg
                    left join jenis_barang jb on jb.id = tg.jenis_barang_id
                    where tg.jenis_barang_id =".$id_barang." and month(tg.tanggal_masuk) =".$bulan." and year(tg.tanggal_masuk) =".$tahun.")
                UNION ALL
                (SELECT 
                    tgf.id, tgf.jenis_barang_id, tgf.no_packing, jb.jenis_barang, tgf.bruto, tgf.netto, tgf.tanggal_masuk = null, tgf.tanggal_keluar, tgf.tanggal_keluar as tanggal
                FROM t_gudang_fg tgf
                    left join jenis_barang jb on jb.id = tgf.jenis_barang_id
                    where tgf.jenis_barang_id =".$id_barang." and month(tgf.tanggal_keluar) =".$bulan." and year(tgf.tanggal_keluar) =".$tahun.") Order By tanggal asc
                    ");
        return $data;
    }

    function produksi_fg_count($id){
        $data = $this->db->query("Select count(id) as count from produksi_fg_detail where produksi_fg_id =".$id);
        return $data;
    }

    function get_bobbin_g($id){
        $data = $this->db->query("Select bobbin_size, keterangan from m_bobbin_size where jenis_packing_id =".$id);
        return $data;
    }
    /*
    cara membuat view stok fg
    CREATE OR REPLACE VIEW stok_fg(jenis_barang_id, jenis_barang, total_qty, total_bruto, total_netto)
    AS SELECT jenis_barang_id, jb.jenis_barang,COUNT(jenis_barang_id), SUM(bruto), SUM(netto)
    from t_gudang_fg
    LEFT join jenis_barang jb on (jb.id = t_gudang_fg.jenis_barang_id)
    WHERE t_gudang_fg.jenis_trx = 0
    GROUP by t_gudang_fg.jenis_barang_id
    */

}