<?php
class Model_gudang_wip extends CI_Model{
    function gudang_wip_list(){
        $data = $this->db->query("Select tgw.*, jb.jenis_barang, tbw.no_bpb,
                    usr.realname As pengirim
                From t_gudang_wip tgw
                    Left Join users usr On (tgw.created_by = usr.id)
                    left join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
                    left join t_bpb_wip_detail tbwd on (tbwd.id = tgw.t_bpb_wip_detail_id)
                    left join t_bpb_wip tbw on (tbw.id = tbwd.bpb_wip_id)
                Where tgw.flag_taken=0 
                Order By tgw.id Desc");
        return $data;
    }          

    function gudang_wip_produksi_list(){
        $data = $this->db->query("Select COALESCE(NULLIF(thw.no_produksi_wip,''), pi.no_produksi) as no_produksi_wip,thw.jenis_masak, thw.tanggal, thw.qty, thw.uom, thw.berat, thw.susut, thw.keras, thw.bs, jb.jenis_barang, usr.realname As pembuat, dtr.id as id_dtr, tbw.id as id_bpb
                From t_hasil_wip thw
                    left join t_hasil_masak thm On (thm.id = thw.hasil_masak_id)
                    left join produksi_ingot pi On (pi.id = thm.id_produksi)
                    Left Join users usr On (thw.created_by = usr.id)
                    left join jenis_barang jb on (jb.id = thw.jenis_barang_id)   
                    left join dtr On (dtr.prd_id = thw.id)
                    left join t_bpb_wip tbw on (tbw.hasil_wip_id = thw.id)
                Order By thw.id Desc");
        return $data;
    } 

    function bpb_list(){
        $data = $this->db->query("Select bpbwip.*,
                    (select count(id) from t_bpb_wip_detail bpbwipd where bpbwip.id = bpbwipd.bpb_wip_id)as jumlah_item,
                    usr.realname As pengirim, a.tipe_apolo
                From t_bpb_wip bpbwip
                    Left join users usr On (bpbwip.created_by = usr.id)
                    Left join t_hasil_wip thw On (thw.id = bpbwip.hasil_wip_id)
                    Left join t_hasil_masak thm On (thm.id = thw.hasil_masak_id)
                    Left join produksi_ingot pi On (pi.id = thm.id_produksi)
                    Left join apolo a On (a.id = pi.id_apolo)
                Order By bpbwip.id Desc");
        return $data;
    }
    
    function show_header_bpb($id){
        $data = $this->db->query("Select bpbwip.*, tsw.no_spb_wip, 
                COALESCE(pi.no_produksi, hslwip.no_produksi_wip) as no_produksi_ingot,
                    usr.realname As pengirim, us.realname As penerima
                    From t_bpb_wip bpbwip
                        left Join users usr On (bpbwip.created_by = usr.id)
                        left join users us On (bpbwip.approved_by = us.id) 
                        left join t_spb_wip tsw on (tsw.id = bpbwip.spb_wip_id)
                        left join t_hasil_wip hslwip on (hslwip.id = bpbwip.hasil_wip_id)
                        left join t_hasil_masak hslmsk on (hslmsk.id = hslwip.hasil_masak_id)
                        left join produksi_ingot pi on (pi.id = hslmsk.id_produksi)
                    Where bpbwip.id=".$id);
        return $data;
    }
    
    function show_detail_bpb($id){
        $data = $this->db->query("Select wipd.*, jb.jenis_barang
                    From t_bpb_wip_detail wipd 
                        Left Join jenis_barang jb On (wipd.jenis_barang_id = jb.id) 
                    Where wipd.bpb_wip_id=".$id);
        return $data;
    }

    function spb_list(){
        $data = $this->db->query("Select tsw.*,
                    usr.realname As pic,
                    aprv.realname As approved_name,
                    rjt.realname As rejected_name,
                    rcv.realname As receiver_name,
                (Select count(tswd.id)As jumlah_item From t_spb_wip_detail tswd Where tswd.t_spb_wip_id = tsw.id)As jumlah_item,
                (Select count(tswf.id) from t_spb_wip_fulfilment tswf where tswf.t_spb_wip_id = tsw.id)As jumlah_fulfilment
                From t_spb_wip tsw
                    Left Join users usr On (tsw.created_by = usr.id)
                    Left Join users aprv On (tsw.approved_by = aprv.id)
                    Left Join users rjt On (tsw.rejected_by = rjt.id)
                    Left join users rcv on (tsw.received_by = rcv.id) 
                Order By tsw.id Desc");
        return $data;
    }

    function pilihan_spb_list(){
        $data = $this->db->query("Select tsw.*, 
                (Select count(tswd.id)As jumlah_item From t_spb_wip_detail tswd Where tswd.t_spb_wip_id = tsw.id)As jml_barang
                From t_spb_wip tsw
                where tsw.status = 1
                order by tsw.id Desc
                ");
        return $data;

    }

    function jenis_barang_list_by_spb($id){
        $data = $this->db->query("select jb.jenis_barang, jb.id
                from t_spb_wip_detail tswd
                left join jenis_barang jb on (jb.id = tswd.jenis_barang_id )
                where t_spb_wip_id =".$id
                );
        return $data;
    }

    function jenis_barang_list(){
        $data = $this->db->query("select jb.jenis_barang, jb.id
                from jenis_barang jb
                where category='WIP'"
                );
        return $data;
    }

    function jenis_barang_spb($id){
        $data = $this->db->query("select jb.jenis_barang, jb.id
                from jenis_barang jb
                where id=".$id);
        return $data;
    }

    function jenis_barang_spb_cuci(){
        $data = $this->db->query("select jb.jenis_barang, jb.id
                from jenis_barang jb
                where id in (6,656)");
        return $data;
    }

    function show_header_spb($id){
        $data = $this->db->query("Select tsw.*, 
                    usr.realname As pic,
                    appr.realname As approved_name,
                    rjct.realname As reject_name
                    From t_spb_wip tsw
                        Left Join users usr On (tsw.created_by = usr.id) 
                        Left Join users appr On (tsw.approved_by = appr.id)
                        Left Join users rjct On (tsw.rejected_by = rjct.id)
                    Where tsw.id=".$id);
        return $data;
    }
    
    function show_detail_spb($id){
        $data = $this->db->query("Select tswd.*, jb.jenis_barang,
                    (select total_qty_out from stok_wip sw where sw.jenis_barang_id= tswd.jenis_barang_id)as total_qty_out,
                    (select total_qty_in from stok_wip sw where sw.jenis_barang_id= tswd.jenis_barang_id)as total_qty_in,
                    (select total_berat_out from stok_wip sw where sw.jenis_barang_id= tswd.jenis_barang_id)as total_berat_out,
                    (select total_berat_in from stok_wip sw where sw.jenis_barang_id= tswd.jenis_barang_id)as total_berat_in
                    From t_spb_wip_detail tswd 
                        Left Join jenis_barang jb On (jb.id = tswd.jenis_barang_id)
                    Where tswd.t_spb_wip_id=".$id);
        return $data;
    }

    function show_detail_wip_fulfilment($id){
       $data = $this->db->query("select tgw.*, jb.jenis_barang 
                from t_gudang_wip tgw
                left join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
                left join t_spb_wip_detail tswd on (tswd.id = tgw.t_spb_wip_detail_id)
                left join t_spb_wip tsw on (tsw.id = tswd.t_spb_wip_id) 
                where tsw.id =".$id
                );
        return $data;
    }

    function show_detail_spb_fulfilment($id){
        $data = $this->db->query("select tswf.*, jb.jenis_barang, jb.uom from t_spb_wip_fulfilment tswf
                left join jenis_barang jb on jb.id = tswf.jenis_barang_id
                where tswf.approved_by = 0 and tswf.t_spb_wip_id =".$id);
        return $data;
    }

    function check_spb($id){
        $data = $this->db->query("select tsw.id, 
                (select sum(tswd.berat) from t_spb_wip_detail tswd where tswd.t_spb_wip_id=tsw.id) as tot_spb,
                (select sum(tswf.berat) from t_spb_wip_fulfilment tswf where tswf.approved_by > 0 and tswf.t_spb_wip_id =tsw.id) as tot_fulfilment
                from t_spb_wip tsw
                where tsw.id =".$id);
        return $data;
    }

    function load_detail($id){
        $data = $this->db->query("Select tswd.*, jb.jenis_barang
                From t_spb_wip_detail tswd 
                Left Join jenis_barang jb On(tswd.jenis_barang_id = jb.id) 
                Where tswd.t_spb_wip_id=".$id);
        return $data;
    }

    function show_data_barang_spb($id){
        $data = $this->db->query("select jb.uom,tswd.id
                from t_spb_wip_detail tswd
                left join jenis_barang jb on (jb.id = tswd.jenis_barang_id)
                where tswd.jenis_barang_id = ".$id
                );
        return $data;
    }

    function show_data_barang_view_spb($id,$spb_id){
        $data = $this->db->query("select * from t_spb_wip_detail tswd
                where tswd.jenis_barang_id = ".$id." and tswd.t_spb_wip_id = ".$spb_id
                );
        return $data;
    }

    function show_data_barang($id){
        $data = $this->db->query("select jb.uom
                from jenis_barang jb 
                where jb.id = ".$id
                );
        return $data;
    }

    function show_barang_wip($id){
        $data = $this->db->query("select tgw.* ,jb.jenis_barang,jb.id as id_jenis_barang
                from t_gudang_wip tgw
                left join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
                where tgw.id=".$id
                );
        return $data;
    }

    function spb_ingot(){
        $data = $this->db->query("select tsw.id, tsw.no_spb_wip FROM t_spb_wip tsw
                left join t_spb_wip_detail tswd on tswd.t_spb_wip_id = tsw.id
                where tswd.jenis_barang_id = 2 and tsw.status = 1 and flag_produksi = 2");
        return $data;
    }

    function spb_kawat_hitam(){
        $data = $this->db->query("select tsw.id, tsw.no_spb_wip FROM t_spb_wip tsw
                left join t_spb_wip_detail tswd on tswd.t_spb_wip_id = tsw.id
                where tsw.status = 1 and flag_produksi = 3");
        return $data;
    }

    function get_spb($id){
        $data = $this->db->query("select sum(qty)as qty, sum(berat) as berat from t_spb_wip_detail where t_spb_wip_id =".$id);
        return $data;
    }

    function stok_keras(){
        $data = $this->db->query("select * from stok_keras");
        return $data;
    }

    function show_laporan(){
        $data = $this->db->query("select DATE_FORMAT(t_gudang_wip.tanggal,'%M %Y') as showdate, 
            EXTRACT(YEAR_MONTH from t_gudang_wip.tanggal) as tanggal,
            count(t_gudang_wip.id) as jumlah,
                sum(CASE WHEN jenis_trx = 0 THEN qty ELSE 0 END) as qty_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN qty ELSE 0 END) as qty_keluar,
                sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) as berat_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) as berat_keluar
                from t_gudang_wip
                LEFT join jenis_barang jb on (jb.id = t_gudang_wip.jenis_barang_id)
                GROUP by month(t_gudang_wip.tanggal)");
        return $data;
    }

    function show_view_laporan($bulan,$tahun){
        $data = $this->db->query("select jenis_barang_id, jb.jenis_barang, count(t_gudang_wip.id) as jumlah,
                sum(CASE WHEN jenis_trx = 0 THEN qty ELSE 0 END) as qty_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN qty ELSE 0 END) as qty_keluar,
                sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) as berat_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) as berat_keluar
                from t_gudang_wip
                LEFT join jenis_barang jb on (jb.id = t_gudang_wip.jenis_barang_id)
                Where month(t_gudang_wip.tanggal) =".$bulan." and year(t_gudang_wip.tanggal) =".$tahun."
                GROUP by t_gudang_wip.jenis_barang_id");
        return $data;
    }

    function show_laporan_detail($bulan,$tahun,$id){
        $data = $this->db->query("Select tgw.*, jb.jenis_barang
                From t_gudang_wip tgw
                    left join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
                Where month(tgw.tanggal) =".$bulan." and year(tgw.tanggal) =".$tahun." 
                and tgw.jenis_barang_id =".$id);
        return $data;
    }

    function stok_wip(){
        $data = $this->db->query("select * from stok_wip");
        return $data;
    }
    /*
    cara membuat view stok wip
    
    CREATE OR REPLACE VIEW stok_wip(jenis_barang_id,jenis_barang,total_qty_in,total_qty_out,total_berat_in,total_berat_out)
    AS SELECT jenis_barang_id, jb.jenis_barang,
    sum(CASE WHEN jenis_trx = 0 THEN qty ELSE 0 END),
    sum(CASE WHEN jenis_trx = 1 THEN qty ELSE 0 END),
    sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END),
    sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END)
    from t_gudang_wip
    LEFT join jenis_barang jb on (jb.id = t_gudang_wip.jenis_barang_id)
    GROUP by t_gudang_wip.jenis_barang_id
    */

}