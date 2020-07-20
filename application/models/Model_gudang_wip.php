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

    function gudang_wip_produksi_list($jenis,$s,$e){
        $data = $this->db->query("Select thw.id, COALESCE(NULLIF(thw.no_produksi_wip,''), pi.no_produksi) as no_produksi_wip,thw.jenis_masak, thw.tanggal, thw.qty, thw.uom, thw.berat, thw.susut, thw.keras, thw.bs, jb.jenis_barang, usr.realname As pembuat, dtr.id as id_dtr, tbw.id as id_bpb, tbw.status
                From t_hasil_wip thw
                    left join t_hasil_masak thm On (thm.id = thw.hasil_masak_id)
                    left join produksi_ingot pi On (pi.id = thm.id_produksi)
                    Left Join users usr On (thw.created_by = usr.id)
                    left join jenis_barang jb on (jb.id = thw.jenis_barang_id)   
                    left join dtr On (dtr.prd_id = thw.id)
                    left join t_bpb_wip tbw on (tbw.hasil_wip_id = thw.id)
                    where thw.jenis_masak = '".$jenis."' and thw.tanggal between '".$s."' and '".$e."'
                Order By thw.id Desc");
        return $data;
    } 

    function bpb_list($ppn, $s,$e){
        $data = $this->db->query("Select bpbwip.*,
                    (select count(id) from t_bpb_wip_detail bpbwipd where bpbwip.id = bpbwipd.bpb_wip_id)as jumlah_item,
                    usr.realname As pengirim, a.tipe_apolo
                From t_bpb_wip bpbwip
                    Left join users usr On (bpbwip.created_by = usr.id)
                    Left join t_hasil_wip thw On (thw.id = bpbwip.hasil_wip_id)
                    Left join t_hasil_masak thm On (thm.id = thw.hasil_masak_id)
                    Left join produksi_ingot pi On (pi.id = thm.id_produksi)
                    Left join apolo a On (a.id = pi.id_apolo)
                    where bpbwip.flag_ppn = ".$ppn." and bpbwip.tanggal between '".$s."' and '".$e."'
                Order By bpbwip.tanggal Desc");
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

    function spb_list($flag_produksi=null,$s,$e){
        if ($flag_produksi == 3 || $flag_produksi == 1) {
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
                    where tsw.flag_produksi IN (1,3) and tsw.tanggal between '".$s."' and '".$e."'
                Order By tsw.id Desc");
        } else {
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
                    where tsw.flag_produksi NOT IN (1,3) and tsw.tanggal between '".$s."' and '".$e."'
                Order By tsw.id Desc");
        }
        
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
        $data = $this->db->query("select jb.jenis_barang, jb.id, tswd.id as id_spb_wip_detail, jb.kode, jb.uom
                from t_spb_wip_detail tswd
                left join jenis_barang jb on (jb.id = tswd.jenis_barang_id )
                where t_spb_wip_id =".$id
                );
        return $data;
    }

    function jenis_barang_list(){
        $data = $this->db->query("select jb.jenis_barang, jb.kode, jb.uom, jb.id
                from jenis_barang jb
                where category='WIP'"
                );
        return $data;
    }

    function jenis_barang_spb($id){
        $data = $this->db->query("select jb.jenis_barang, jb.kode, jb.uom, jb.id
                from jenis_barang jb
                where id=".$id);
        return $data;
    }

    function jenis_barang_spb_cuci(){
        $data = $this->db->query("select jb.jenis_barang, jb.id
                from jenis_barang jb
                where id in (6, 656, 667, 668)");
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
        $data = $this->db->query("Select tswd.*, jb.jenis_barang, jb.kode,
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
       $data = $this->db->query("select tgw.*, jb.jenis_barang, jb.kode 
                from t_gudang_wip tgw
                left join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
                left join t_spb_wip_detail tswd on (tswd.id = tgw.t_spb_wip_detail_id)
                left join t_spb_wip tsw on (tsw.id = tswd.t_spb_wip_id) 
                where tsw.id =".$id
                );
        return $data;
    }

    function show_detail_spb_fulfilment($id){
        $data = $this->db->query("select tswf.*, jb.jenis_barang, jb.kode, jb.uom from t_spb_wip_fulfilment tswf
                left join jenis_barang jb on jb.id = tswf.jenis_barang_id
                where tswf.approved_by = 0 and tswf.t_spb_wip_id =".$id);
        return $data;
    }

    function show_detail_spb_fulfilment_appv($id){
        $data = $this->db->query("select tswf.*, jb.jenis_barang, jb.kode, jb.uom from t_spb_wip_fulfilment tswf
                left join jenis_barang jb on jb.id = tswf.jenis_barang_id
                where tswf.approved_by != 0 and tswf.t_spb_wip_id =".$id);
        return $data;
    }

    function check_spb_reject($id){
        $data = $this->db->query("select count(id) as count from t_spb_wip_fulfilment where t_spb_wip_id =".$id);
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
                where tsw.status = 1 and flag_produksi = 3 group by tsw.id");
        return $data;
    }

    function get_spb($id){
        $data = $this->db->query("select sum(qty)as qty, sum(berat) as berat from t_gudang_wip where t_spb_wip_id =".$id);
        return $data;
    }

    function stok_keras(){
        $data = $this->db->query("select * from stok_keras");
        return $data;
    }

    // function show_laporan(){
    //     $data = $this->db->query("select DATE_FORMAT(t_gudang_wip.tanggal,'%M %Y') as showdate, 
    //         EXTRACT(YEAR_MONTH from t_gudang_wip.tanggal) as tanggal,
    //         count(t_gudang_wip.id) as jumlah,
    //             sum(CASE WHEN jenis_trx = 0 THEN qty ELSE 0 END) as qty_masuk,
    //             sum(CASE WHEN jenis_trx = 1 THEN qty ELSE 0 END) as qty_keluar,
    //             sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) as berat_masuk,
    //             sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) as berat_keluar
    //             from t_gudang_wip
    //             LEFT join jenis_barang jb on (jb.id = t_gudang_wip.jenis_barang_id)
    //             GROUP by month(t_gudang_wip.tanggal)");
    //     return $data;
    // }

    function show_laporan(){
        $data = $this->db->query("select i.tanggal, DATE_FORMAT(tanggal,'%M %Y') as showdate, sum(stok_awal) as stok_awal, sum(stok_akhir) as stok_akhir from inventory i where jenis_barang = 'WIP' 
            group by tanggal");
        return $data;
    }

    function show_view_laporan_before($bulan,$tahun){
        $data = $this->db->query("select jenis_barang_id, jb.jenis_barang, jb.kode, jb.uom, count(t_gudang_wip.id) as jumlah,
                sum(CASE WHEN jenis_trx = 0 THEN qty ELSE 0 END) as qty_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN qty ELSE 0 END) as qty_keluar,
                sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) as berat_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) as berat_keluar
                from t_gudang_wip
                LEFT join jenis_barang jb on (jb.id = t_gudang_wip.jenis_barang_id)
                Where t_gudang_wip.tanggal < '".$year."-".$month."-01'
                GROUP by t_gudang_wip.jenis_barang_id");
        return $data;
    }

    function show_view_laporan($bulan,$tahun){
        $data = $this->db->query("select jenis_barang_id, jb.jenis_barang, jb.kode, jb.uom, count(tgw.id) as jumlah,
                (select (sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) - sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END))
                from t_gudang_wip Where tanggal < '".$tahun."-".$bulan."-01' and jenis_barang_id = tgw.jenis_barang_id) as stok_awal,
                sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) as netto_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) as netto_keluar
                from t_gudang_wip tgw
                LEFT join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
                Where month(tgw.tanggal) =".$bulan." and year(tgw.tanggal) =".$tahun."
                GROUP by tgw.jenis_barang_id");
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

    function show_header_thw($id){
        $data = $this->db->query("Select thw.*, pi.id as id_produksi_ingot, COALESCE(NULLIF(thw.no_produksi_wip,''), pi.no_produksi) as no_produksi_wip, usr.realname As pembuat, dtr.id as id_dtr, dtr.status as status_dtr, tbw.id as id_bpb, tbw.status
                From t_hasil_wip thw
                    left join t_hasil_masak thm On (thm.id = thw.hasil_masak_id)
                    left join produksi_ingot pi On (pi.id = thm.id_produksi)
                    Left Join users usr On (thw.created_by = usr.id)
                    left join jenis_barang jb on (jb.id = thw.jenis_barang_id)   
                    left join dtr On (dtr.prd_id = thw.id)
                    left join t_bpb_wip tbw on (tbw.hasil_wip_id = thw.id)
                where thw.id =".$id);
        return $data;
    }

    function show_kartu_stok_before($s,$e,$jb){
        return $this->db->query("select tgw.id, tgw.tanggal, jb.jenis_barang, jb.uom, 
            sum(CASE WHEN tgw.jenis_trx = 0 THEN tgw.qty ELSE 0 END) as qty_in,
            sum(CASE WHEN tgw.jenis_trx = 1 THEN tgw.qty ELSE 0 END) as qty_out,
            sum(CASE WHEN tgw.jenis_trx = 0 THEN tgw.berat ELSE 0 END) as berat_in,
            sum(CASE WHEN tgw.jenis_trx = 1 THEN tgw.berat ELSE 0 END) as berat_out
            from t_gudang_wip tgw
                left join jenis_barang jb on jb.id = tgw.jenis_barang_id
                where tgw.jenis_barang_id =".$jb." and tgw.tanggal < '".$s."' group by tgw.jenis_barang_id
            ");
    }

    function show_kartu_stok_detail($s,$e,$jb){
        return $this->db->query("select tgw.id, tgw.tanggal, jb.jenis_barang, jb.uom, 
            sum(CASE WHEN tgw.jenis_trx = 0 THEN tgw.qty ELSE 0 END) as qty_in,
            sum(CASE WHEN tgw.jenis_trx = 1 THEN tgw.qty ELSE 0 END) as qty_out,
            sum(CASE WHEN tgw.jenis_trx = 0 THEN tgw.berat ELSE 0 END) as berat_in,
            sum(CASE WHEN tgw.jenis_trx = 1 THEN tgw.berat ELSE 0 END) as berat_out,
            COALESCE(tbw.no_bpb, tsw.no_spb_wip) as nomor, COALESCE(thw.no_produksi_wip, tsw.keterangan) as keterangan from t_gudang_wip tgw
                left join t_bpb_wip_detail tbwd on tbwd.id = tgw.t_bpb_wip_detail_id
                left join t_bpb_wip tbw on tbw.id = tbwd.bpb_wip_id
                left join t_hasil_wip thw on thw.id =  tgw.t_hasil_wip_id
                left join t_spb_wip tsw on tsw.id = tgw.t_spb_wip_id
                left join jenis_barang jb on jb.id = tgw.jenis_barang_id
                where tgw.jenis_barang_id =".$jb." and tgw.tanggal between '".$s."' and '".$e."' group by tgw.tanggal, nomor
            ");
    }

    function show_kartu_stok_detail_inventory($s,$e,$jb){
        return $this->db->query("select tgw.id, tgw.tanggal, jb.jenis_barang, jb.uom, 
            sum(CASE WHEN tgw.jenis_trx = 0 THEN tgw.qty ELSE 0 END) as qty_in,
            sum(CASE WHEN tgw.jenis_trx = 1 THEN tgw.qty ELSE 0 END) as qty_out,
            sum(CASE WHEN tgw.jenis_trx = 0 THEN tgw.berat ELSE 0 END) as berat_in,
            sum(CASE WHEN tgw.jenis_trx = 1 THEN tgw.berat ELSE 0 END) as berat_out,
            COALESCE(tbw.no_bpb, tsw.no_spb_wip) as nomor, COALESCE(thw.no_produksi_wip, tsw.keterangan) as keterangan from t_gudang_wip tgw
                left join t_bpb_wip_detail tbwd on tbwd.id = tgw.t_bpb_wip_detail_id
                left join t_bpb_wip tbw on tbw.id = tbwd.bpb_wip_id
                left join t_hasil_wip thw on thw.id =  tgw.t_hasil_wip_id
                left join t_spb_wip tsw on tsw.id = tgw.t_spb_wip_id
                left join jenis_barang jb on jb.id = tgw.jenis_barang_id
                where tgw.jenis_barang_id =".$jb." and tgw.tanggal between '".$s."' and '".$e."' group by tgw.jenis_barang_id
            ");
    }

    function cek_rolling_bu($s,$e){
        return $this->db->query("select count(thw.id) as jumlah, thw.jenis_barang_id, jb.jenis_barang, jb.ukuran from t_hasil_wip thw
                left join jenis_barang jb on jb.id = thw.jenis_barang_id
                where thw.jenis_masak = 'ROLLING' and thw.jenis_barang_id != 656 and thw.tanggal between '".$s."' and '".$e."'
                group by jenis_barang_id");
    }

    function print_laporan_masak($s,$e,$j){
        if($j == 1){
            // return $this->db->query("select thm.tanggal, pi.no_produksi as nomor, thm.tipe, count(thm.id) as count, sum(kayu) as kayu, sum(gas) as gas,  sum(gas_r) as gas_r, sum(total_rongsok) as total_rongsok, sum(ingot) as ingot, sum(berat_ingot) as berat_ingot, sum(bs) as bs, sum(susut) as susut, sum(ampas) as ampas, sum(serbuk) as serbuk, sum(bs_service) as bs_service from t_hasil_masak thm
            // left join produksi_ingot pi on thm.id_produksi = pi.id
            // where thm.tanggal between '".$s."' and '".$e."' group by thm.tanggal");


            return $this->db->query("select thm.tanggal, pi.no_produksi as nomor, thm.tipe, count(thm.id) as count, sum(kayu) as kayu, sum(gas) as gas,  sum(gas_r) as gas_r, 
                sum(CASE WHEN tipe = 'A' THEN total_rongsok ELSE 0 END)as total_rongsok_a, 
                sum(CASE WHEN tipe = 'B' THEN total_rongsok ELSE 0 END)as total_rongsok_b, 
                sum(CASE WHEN tipe = 'D' THEN total_rongsok ELSE 0 END)as total_rongsok_d, 
                sum(CASE WHEN tipe = 'Ampas' THEN total_rongsok ELSE 0 END)as total_rongsok_ampas, 
                sum(total_rongsok) as total_rongsok,
                sum(ingot) as ingot, sum(berat_ingot) as berat_ingot, sum(bs) as bs, sum(susut) as susut, sum(ampas) as ampas, sum(serbuk) as serbuk, sum(bs_service) as bs_service from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            where thm.tanggal between '".$s."' and '".$e."' group by thm.tanggal");

            return $this->db->query("select thm.tanggal, pi.no_produksi as nomor, thm.tipe, 1 as count, kayu, gas, gas_r, bs_service, total_rongsok, ingot, berat_ingot, bs, susut, ampas, serbuk from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            where thm.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 2){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, thw.gas+thw.gas_r as gas, a.qty as qty_rsk, a.netto as berat_rsk, thw.tanggal, thw.qty, thw.berat,  uom, susut, bs, qty_keras, keras,
                (select sum(netto) from dtr_detail dd 
                    left join dtr on dd.dtr_id = dtr.id
                    where dtr.prd_id = thw.id and rongsok_id = 20) as bs_rolling,
                (select sum(netto) from dtr_detail dd2 
                    left join dtr dtr2 on dd2.dtr_id = dtr2.id
                    where dtr2.prd_id = thw.id and rongsok_id = 52) as bs_8m,
                (select sum(netto) from dtr_detail dd3 
                    left join dtr dtr3 on dd3.dtr_id = dtr3.id
                    where dtr3.prd_id = thw.id and rongsok_id = 22) as bs_ingot
                from t_hasil_wip thw
                left join (select tsw.tanggal, sum(tgw.qty) as qty, sum(tgw.berat) as netto from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    where tsw.flag_produksi = 2
                    group by tsw.id) a on thw.jenis_masak = 'ROLLING' and a.tanggal = thw.tanggal
            where thw.jenis_masak in ('ROLLING', 'BAKAR ULANG') and thw.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 3){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, (select sum(qty) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as qty_rsk, (select sum(berat) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as berat_rsk, thw.tanggal, qty, uom, berat, susut, bs from t_hasil_wip thw
            where thw.jenis_masak = 'BAKAR ULANG' and thw.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 4){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, (select sum(qty) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as qty_rsk, (select sum(berat) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as berat_rsk, thw.tanggal, qty, uom, berat, susut, bs, qty_keras, keras from t_hasil_wip thw
            where thw.jenis_masak = 'CUCI' and thw.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 8){
            return $this->db->query("select thm.tanggal, pi.no_produksi, thm.tipe, mulai,selesai, kayu, thm.gas, thm.gas_r, bs_service, 
                (select sum(netto) from spb_detail_fulfilment sdf
                    left join dtr_detail dd on sdf.dtr_detail_id = dd.id
                    left join spb on sdf.spb_id = spb.id
                    where spb.produksi_ingot_id = pi.id) as total_rongsok, 
                ingot, berat_ingot, thm.bs, thm.susut, ampas, thm.serbuk, bs_service from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            where thm.tanggal between '".$s."' and '".$e."' order by thm.tanggal, pi.no_produksi");
        }
    }

    function print_laporan_produksi_tahunan($j,$s){
        if($j == 1){
            return $this->db->query("select MONTHNAME(thm.tanggal) as tanggal, thm.tipe, count(thm.id) as count, sum(kayu) as kayu, sum(gas) as gas,  sum(gas_r) as gas_r, sum(bs_service) as bs_service, sum(total_rongsok) as total_rongsok, sum(ingot) as ingot, sum(berat_ingot) as berat_ingot, sum(bs) as bs, sum(susut) as susut, sum(ampas) as ampas, sum(serbuk) as serbuk, sum(bs_service) as bs_service from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            where YEAR(thm.tanggal) = '".$s."' group by MONTH(thm.tanggal)");
        }elseif($j == 2){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, sum(thw.gas)+sum(thw.gas_r) as gas, sum(a.qty) as qty_rsk, sum(a.netto) as berat_rsk, MONTHNAME(thw.tanggal) as tanggal, sum(CASE WHEN thw.jenis_barang_id = 656 THEN thw.qty ELSE 0 END) as qty, sum(CASE WHEN thw.jenis_barang_id = 656 THEN thw.berat ELSE 0 END) as berat, sum(CASE WHEN thw.jenis_barang_id = 667 THEN thw.qty ELSE 0 END) as qty_bu, sum(CASE WHEN thw.jenis_barang_id = 667 THEN thw.berat ELSE 0 END) as berat_bu,  uom, sum(susut) as susut, sum(bs) as bs, sum(qty_keras) as qty_keras, sum(keras) as keras,
                sum((select sum(netto) from dtr_detail dd 
                    left join dtr on dd.dtr_id = dtr.id
                    where dtr.prd_id = thw.id and rongsok_id = 20)) as bs_rolling,
                sum((select sum(netto) from dtr_detail dd2 
                    left join dtr dtr2 on dd2.dtr_id = dtr2.id
                    where dtr2.prd_id = thw.id and rongsok_id = 52)) as bs_8m,
                sum((select sum(netto) from dtr_detail dd3 
                    left join dtr dtr3 on dd3.dtr_id = dtr3.id
                    where dtr3.prd_id = thw.id and rongsok_id = 22)) as bs_ingot,
                (select 
                    ( sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) - sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) )
                    from t_gudang_keras
                    where 
                        tanggal < DATE_FORMAT(thw.tanggal, '%Y-%m-01') ) as wip_awal,
                (select 
                    ( sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) - sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) )
                    from t_gudang_keras
                    where MONTH(tanggal) = MONTH(thw.tanggal) and YEAR(tanggal) = YEAR(thw.tanggal) ) as wip_akhir,
                (select netto from t_gudang_produksi where jenis = 0 and jenis_barang_id = 2 and tanggal = LAST_DAY(thw.tanggal - INTERVAL 1 MONTH) ) as produksi_awal,
                (select netto from t_gudang_produksi where jenis = 0 and jenis_barang_id = 2 and tanggal = LAST_DAY(thw.tanggal) ) as produksi_akhir,
                (select sum(dd.netto) from spb_detail_fulfilment sdf
                    left join spb on sdf.spb_id = spb.id
                    left join dtr_detail dd on sdf.dtr_detail_id = dd.id
                    where spb.jenis_spb = 10 and MONTH(spb.tanggal) = MONTH(thw.tanggal)) as tali_rolling
                from t_hasil_wip thw
                left join (select tsw.tanggal, sum(tgw.qty) as qty, sum(tgw.berat) as netto from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    where tsw.flag_produksi = 2
                    group by tsw.id) a on thw.jenis_masak = 'ROLLING' and a.tanggal = thw.tanggal
            where thw.jenis_masak in ('ROLLING', 'BAKAR ULANG') and YEAR(thw.tanggal) = '".$s."' group by DATE_FORMAT(thw.tanggal, '%Y-%m')");
        }elseif($j == 3){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, (select sum(qty) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as qty_rsk, (select sum(berat) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as berat_rsk, thw.tanggal, qty, uom, berat, susut, bs from t_hasil_wip thw
            where thw.jenis_masak = 'BAKAR ULANG' and thw.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 4){
            return $this->db->query("select thw.jenis_barang_id, sum((select sum(qty) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id)) as qty_rsk, sum((select sum(berat) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id)) as berat_rsk, MONTHNAME(thw.tanggal) as tanggal, sum(qty) as qty, uom, sum(berat) as berat, sum(susut) as susut, sum(bs) as bs from t_hasil_wip thw
            where thw.jenis_masak = 'CUCI' and YEAR(thw.tanggal) = '".$s."' group by MONTH(thw.tanggal)");
        }elseif($j == 8){
            return $this->db->query("select thm.tanggal, pi.no_produksi, thm.tipe, mulai,selesai, kayu, thm.gas, thm.gas_r, bs_service, 
                (select sum(netto) from spb_detail_fulfilment sdf
                    left join dtr_detail dd on sdf.dtr_detail_id = dd.id
                    left join spb on sdf.spb_id = spb.id
                    where spb.produksi_ingot_id = pi.id) as total_rongsok, 
                ingot, berat_ingot, thm.bs, thm.susut, ampas, thm.serbuk, bs_service from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            where thm.tanggal between '".$s."' and '".$e."' order by thm.tanggal, pi.no_produksi");
        }
    }

    function print_laporan_bb_apollo($s,$e,$j){
        if($j == 0){
            return $this->db->query("select pi.tanggal, 
                sum(netto) as total,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (9,10) then dd.netto else 0 end),0),null) as ABCW,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 12 then dd.netto else 0 end),0),null) as BC,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 17 then dd.netto else 0 end),0),null) as BBAKAR,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 14 then dd.netto else 0 end),0),null) as COVERTAPE,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 58 then dd.netto else 0 end),0),null) as BTELP,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 65 then dd.netto else 0 end),0),null) as DK,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 64 then dd.netto else 0 end),0),null) as DH,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 11 then dd.netto else 0 end),0),null) as ARMBT,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 21 then dd.netto else 0 end),0),null) as BSAPL,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 20 then dd.netto else 0 end),0),null) as BSROLL,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 19 then dd.netto else 0 end),0),null) as BSSDM,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (79,52) then dd.netto else 0 end),0),null) as AFK8MM,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 22 then dd.netto else 0 end),0),null) as BSINGOT,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (72,74) then dd.netto else 0 end),0),null) as PIPA,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (62,63) then dd.netto else 0 end),0),null) as DDBARU,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 13 then dd.netto else 0 end),0),null) as TRAVO,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 24 then dd.netto else 0 end),0),null) as BSQC,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 66 then dd.netto else 0 end),0),null) as DDG,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 57 then dd.netto else 0 end),0),null) as BS,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 53 then dd.netto else 0 end),0),null) as KR,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (59,61,15) then dd.netto else 0 end),0),null) as COPER from produksi_ingot pi
                left join spb on spb.produksi_ingot_id = pi.id
                left join spb_detail_fulfilment sdf on sdf.spb_id = spb.id
                left join dtr_detail dd on sdf.dtr_detail_id = dd.id
                where pi.tanggal between '".$s."' and '".$e."'
                group by pi.tanggal order by pi.tanggal
                ");
        }else{
            return $this->db->query("select MONTHNAME(pi.tanggal) as tanggal, 
                sum(netto) as total,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (9,10) then dd.netto else 0 end),0),null) as ABCW,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 12 then dd.netto else 0 end),0),null) as BC,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 17 then dd.netto else 0 end),0),null) as BBAKAR,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 14 then dd.netto else 0 end),0),null) as COVERTAPE,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 58 then dd.netto else 0 end),0),null) as BTELP,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 65 then dd.netto else 0 end),0),null) as DK,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 64 then dd.netto else 0 end),0),null) as DH,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 11 then dd.netto else 0 end),0),null) as ARMBT,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 21 then dd.netto else 0 end),0),null) as BSAPL,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 20 then dd.netto else 0 end),0),null) as BSROLL,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 19 then dd.netto else 0 end),0),null) as BSSDM,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (79,52) then dd.netto else 0 end),0),null) as AFK8MM,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 22 then dd.netto else 0 end),0),null) as BSINGOT,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (72,74) then dd.netto else 0 end),0),null) as PIPA,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (62,63) then dd.netto else 0 end),0),null) as DDBARU,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 13 then dd.netto else 0 end),0),null) as TRAVO,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 24 then dd.netto else 0 end),0),null) as BSQC,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 66 then dd.netto else 0 end),0),null) as DDG,
                COALESCE(NULLIF(sum(case when dd.rongsok_id = 57 then dd.netto else 0 end),0),null) as BS,
                COALESCE(NULLIF(sum(case when dd.rongsok_id IN (59,61,15) then dd.netto else 0 end),0),null) as COPER from produksi_ingot pi
                left join spb on spb.produksi_ingot_id = pi.id
                left join spb_detail_fulfilment sdf on sdf.spb_id = spb.id
                left join dtr_detail dd on sdf.dtr_detail_id = dd.id
                where YEAR(pi.tanggal) = '".$s."'
                group by MONTH(pi.tanggal) order by pi.tanggal
                ");
        }
    }

    function lap_babakar_apollo($s,$e){
        return $this->db->query("select thm.tanggal, pi.no_produksi as nomor, thm.tipe, count(thm.id) as count, sum(kayu) as kayu, 
    sum(CASE WHEN a.jenis = 3 THEN gas ELSE 0 END) as gas3,
    sum(CASE WHEN a.jenis = 4 THEN gas ELSE 0 END) as gas4,
    sum(CASE WHEN a.jenis = 3 THEN berat_ingot ELSE 0 END) as berat_ingot3, sum(CASE WHEN a.jenis = 4 THEN berat_ingot ELSE 0 END) as berat_ingot4,
    sum(bs_service) as bs_service, sum(total_rongsok) as total_rongsok, sum(ingot) as ingot, sum(bs) as bs, sum(susut) as susut, sum(ampas) as ampas, sum(serbuk) as serbuk, sum(bs_service) as bs_service, a.jenis from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            left join apolo a on a.id = pi.id_apolo
            where thm.tanggal between '".$s."' and '".$e."' group by thm.tanggal");
    }

    function get_gas_kayu($s,$e){
        return $this->db->query("select sum(kayu) as kayu, sum(gas) as gas from t_hasil_masak where tanggal between '".$s."' and '".$e."'");
    }

    //  **sebelum di gabung bu
    // function print_laporan_bb_rolling($s,$e){
    //     return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, thw.gas, thw.gas_r, thw.tanggal, thw.qty, uom, thw.berat, susut, bs from t_hasil_wip thw 
    //         where thw.jenis_masak = 'ROLLING' and thw.tanggal between '".$s."' and '".$e."'");
    // }

    function print_laporan_bb_rolling($s,$e){
        return $this->db->query("select no_produksi_wip as nomor, thw.jenis_masak, thw.jenis_barang_id, thw.gas, thw.gas_r, thw.tanggal, thw.qty, uom, 
            (CASE WHEN thw.jenis_masak = 'ROLLING' THEN thw.berat ELSE 0 END) as berat,
            (CASE WHEN thw.jenis_masak = 'BAKAR ULANG' THEN thw.berat ELSE 0 END) as berat_bu,
            susut, bs from t_hasil_wip thw 
            where thw.jenis_masak in ('ROLLING','BAKAR ULANG') and thw.tanggal between '".$s."' and '".$e."'");
    }

    function get_wip_awal($s){
        return $this->db->query("select 
                sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) as berat_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) as berat_keluar
                from t_gudang_keras
                where tanggal < '".$s."'");
    }

    function get_wip_akhir($s,$e){
        return $this->db->query("select 
                sum(CASE WHEN jenis_trx = 0 THEN berat ELSE 0 END) as berat_masuk,
                sum(CASE WHEN jenis_trx = 1 THEN berat ELSE 0 END) as berat_keluar
                from t_gudang_keras
                where tanggal between '".$s."' and '".$e."' ");
    }

    function gudang_floor_produksi(){
        return $this->db->query("select tgp.*, jb.jenis_barang, u.realname from t_gudang_produksi tgp 
                left join jenis_barang jb on tgp.jenis_barang_id = jb.id
                left join users u on tgp.created_by = u.id
                where jenis = 0 order by tgp.tanggal desc");
    }

    function get_floor_produksi($a){
        return $this->db->query("select * from t_gudang_produksi where jenis = 0 and jenis_barang_id = 2 and tanggal ='".$a."'");
    }

    function get_tali_rolling($s,$e){
        return $this->db->query("select sum(dd.netto) as netto from spb_detail_fulfilment sdf
                left join spb on sdf.spb_id = spb.id
                left join dtr_detail dd on sdf.dtr_detail_id = dd.id
                where spb.jenis_spb = 10 and spb.tanggal between '".$s."' and '".$e."'");
    }

    function header_gudang_produksi($id){
        return $this->db->query("select * from t_gudang_produksi where id =".$id);
    }

    function gudang_keras(){
        return $this->db->query("select tgk.*, jb.jenis_barang, COALESCE(thw.no_produksi_wip, tgk.keterangan) as no_produksi_wip from t_gudang_keras tgk
                left join jenis_barang jb on tgk.jenis_barang_id = jb.id
                left join t_hasil_wip thw on tgk.t_hasil_wip_id = thw.id
                order by tgk.tanggal desc");
    }

    function header_gudang_keras($id){
        return $this->db->query("select * from t_gudang_keras where id =".$id);
    }

    function get_gas($tgl){
        return $this->db->query("select * from t_gudang_produksi where jenis = 0 and jenis_barang_id in (9,10) and tanggal = '".$tgl."'");
    }

    function get_apollo($tgl){
        return $this->db->query("select * from t_gudang_produksi where jenis = 0 and jenis_barang_id in (11,12) and tanggal = '".$tgl."'");
    }

    function print_laporan_wip($s,$e,$j){
        if($j==0){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, tsw.keterangan from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tgw.jenis_barang_id = 2
                    order by kode, tanggal");
        }elseif($j==1){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, COALESCE(thw.no_produksi_wip,tsw.keterangan) as keterangan from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tgw.jenis_barang_id = 656
                    order by kode, tanggal");
        }elseif($j==2){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, COALESCE(thw.no_produksi_wip,tsw.keterangan) as keterangan from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tgw.jenis_barang_id = 654
                    order by kode, tanggal");
        }elseif($j==3){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, COALESCE(thw.no_produksi_wip,tsw.keterangan) as keterangan from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi = 0
                    order by kode, tanggal");
        }elseif($j==4){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, case when so.flag_tolling = 0 then 'SO' else 'Tolling' end as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, mc.nama_customer as keterangan from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_sales_order tso on tso.jenis_barang = 'WIP' and tso.no_spb = tsw.id
                    left join sales_order so on so.id = tso.so_id
                    left join m_customers mc on so.m_customer_id = mc.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi = 6 and so.flag_ppn=1
                    order by kode, tanggal");
        }elseif($j==5){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, case when so.flag_tolling = 0 then 'SO' else 'Tolling' end as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, mc.nama_customer as keterangan from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_sales_order tso on tso.jenis_barang = 'WIP' and tso.no_spb = tsw.id
                    left join sales_order so on so.id = tso.so_id
                    left join m_customers mc on so.m_customer_id = mc.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi = 6 and so.flag_ppn=0
                    order by kode, tanggal");
        }elseif($j==6){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, tsw.keterangan as keterangan from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi = 11
                    order by kode, tanggal");
        }elseif($j==7){
            $data = $this->db->query("select dd.jenis_barang_id, dd.berat as netto, 'PO' as sumber, jb.jenis_barang, jb.kode, dtwip.no_dtwip as nomor, dtwip.tanggal, s.nama_supplier as keterangan from dtwip_detail dd
                    left join dtwip on dd.dtwip_id = dtwip.id
                    left join supplier s on s.id = dtwip.supplier_id
                    left join jenis_barang jb on dd.jenis_barang_id = jb.id
                    where dtwip.tanggal between '".$s."' and '".$e."' and dtwip.po_id > 0 and dtwip.flag_ppn = 0
                    order by kode, tanggal");
        }elseif($j==8){
            $data = $this->db->query("select dd.jenis_barang_id, dd.berat as netto, 'PO' as sumber, jb.jenis_barang, jb.kode, dtwip.no_dtwip as nomor, dtwip.tanggal, s.nama_supplier as keterangan from dtwip_detail dd
                    left join dtwip on dd.dtwip_id = dtwip.id
                    left join supplier s on s.id = dtwip.supplier_id
                    left join jenis_barang jb on dd.jenis_barang_id = jb.id
                    where dtwip.tanggal between '".$s."' and '".$e."' and dtwip.po_id > 0 and dtwip.flag_ppn = 1
                    order by kode, tanggal");
        }elseif($j==9){
            $data = $this->db->query("select dd.jenis_barang_id, dd.netto, 'Tolling' as sumber, jb.jenis_barang, jb.kode, dtt.no_dtt as nomor, dtt.tanggal, s.nama_supplier as keterangan from dtt_detail dd
                    left join dtt on dd.dtt_id = dtt.id
                    left join supplier s on s.id = dtt.supplier_id
                    left join jenis_barang jb on dd.jenis_barang_id = jb.id
                    where dtt.jenis_barang = 'WIP' and dtt.tanggal between '".$s."' and '".$e."' and dtt.status = 1 and dtt.flag_ppn = 0
                    order by kode, tanggal");
        }elseif($j==10){
            $data = $this->db->query("select dd.jenis_barang_id, dd.netto, 'Tolling' as sumber, jb.jenis_barang, jb.kode, dtt.no_dtt as nomor, dtt.tanggal, s.nama_supplier as keterangan from dtt_detail dd
                    left join dtt on dd.dtt_id = dtt.id
                    left join supplier s on s.id = dtt.supplier_id
                    left join jenis_barang jb on dd.jenis_barang_id = jb.id
                    where dtt.jenis_barang = 'WIP' and dtt.tanggal between '".$s."' and '".$e."' and dtt.status = 1 and dtt.flag_ppn = 1
                    order by kode, tanggal");
        }elseif($j==11){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tbw.no_bpb as nomor, tgw.tanggal, COALESCE(thw.no_produksi_wip,tbw.keterangan) as keterangan from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join t_hasil_wip thw on thw.id = tbw.hasil_wip_id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 0 and thw.jenis_masak = 'INGOT'
                    order by kode, tanggal");
        }elseif($j==12){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tbw.no_bpb as nomor, tgw.tanggal, COALESCE(thw.no_produksi_wip,tbw.keterangan) as keterangan from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join t_hasil_wip thw on thw.id = tbw.hasil_wip_id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 0 and thw.jenis_masak = 'ROLLING'
                    order by kode, tanggal");
        }elseif($j==13){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tbw.no_bpb as nomor, tgw.tanggal, COALESCE(thw.no_produksi_wip,tbw.keterangan) as keterangan from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join t_hasil_wip thw on thw.id = tbw.hasil_wip_id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 0 and thw.jenis_masak = 'CUCI'
                    order by kode, tanggal");
        }elseif($j==14){
            $data = $this->db->query("select dd.jenis_barang_id, dd.berat as netto, 'PO' as sumber, jb.jenis_barang, jb.kode, dtwip.no_dtwip as nomor, dtwip.tanggal, COALESCE(s.nama_supplier,dtwip.remarks) as keterangan from dtwip_detail dd
                    left join dtwip on dd.dtwip_id = dtwip.id
                    left join supplier s on s.id = dtwip.supplier_id
                    left join jenis_barang jb on dd.jenis_barang_id = jb.id
                    where dtwip.tanggal between '".$s."' and '".$e."' and dtwip.status = 1 and dtwip.po_id = 0
                    order by kode, tanggal");
        }elseif($j==15){
            $data = $this->db->query("select dd.jenis_barang_id, dd.berat as netto, 'PO' as sumber, jb.jenis_barang, jb.kode, dtwip.no_dtwip as nomor, dtwip.tanggal, COALESCE(s.nama_supplier,dtwip.remarks) as keterangan from dtwip_detail dd
                    left join dtwip on dd.dtwip_id = dtwip.id
                    left join supplier s on s.id = dtwip.supplier_id
                    left join jenis_barang jb on dd.jenis_barang_id = jb.id
                    where dtwip.tanggal between '".$s."' and '".$e."' and dtwip.status = 1 and dtwip.po_id = 0 and dtwip.supplier_id = 713
                    order by kode, tanggal");
        }elseif($j==16){
            $data = $this->db->query("select tgw.jenis_barang_id, tgw.berat as netto, '' as sumber, jb.jenis_barang, jb.kode, tsw.no_spb_wip as nomor, tgw.tanggal, tsw.keterangan as keterangan  from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    left join jenis_barang jb on tgw.jenis_barang_id = jb.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi = 5");
        }
        return $data;
    }

    function print_laporan_bulanan_wip($b,$t,$s,$e,$g){
        return $this->db->query("select i.*, jb.jenis_barang, jb.kode,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join t_hasil_wip thw on thw.id = tbw.hasil_wip_id
                    where tbw.hasil_wip_id > 0  and jenis_trx = 0 and tgw.tanggal between '".$s."' and '".$e."' and tgw.jenis_barang_id = i.jenis_barang_id and thw.jenis_masak != 'BAKAR ULANG'
                ) as produksi,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join t_hasil_wip thw on thw.id = tbw.hasil_wip_id
                    where tbw.hasil_wip_id > 0  and jenis_trx = 0 and tgw.tanggal between '".$s."' and '".$e."' and tgw.jenis_barang_id = i.jenis_barang_id and thw.jenis_masak = 'BAKAR ULANG'
                ) as bakar_ulang,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join dtwip d on d.id = tbw.dtwip_id
                    where jenis_trx = 0 and tgw.tanggal between '".$s."' and '".$e."' and tgw.jenis_barang_id = i.jenis_barang_id and d.supplier_id = 713
                ) as sdm,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join dtwip d on tbw.dtwip_id > 0 and d.id = tbw.dtwip_id
                    left join dtt on tbw.dtt_id > 0 and d.id = tbw.dtt_id
                    where tbw.hasil_wip_id = 0  and jenis_trx = 0 and tgw.tanggal between '".$s."' and '".$e."' and tgw.jenis_barang_id = i.jenis_barang_id and COALESCE(d.po_id, dtt.po_id) > 0
                ) as supplier,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    left join dtwip d on d.id = tbw.dtwip_id
                    where tbw.hasil_wip_id = 0  and jenis_trx = 0 and tgw.tanggal between '".$s."' and '".$e."' and tgw.jenis_barang_id = i.jenis_barang_id and d.supplier_id in (95,822)
                ) as koreksi_m,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_bpb_wip_detail bwd on bwd.id = tgw.t_bpb_wip_detail_id
                    left join t_bpb_wip tbw on tbw.id = bwd.bpb_wip_id
                    where tbw.retur_id > 0  and jenis_trx = 0 and tgw.tanggal between '".$s."' and '".$e."' and tgw.jenis_barang_id = i.jenis_barang_id
                ) as retur,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi in (0,2,1,3) and tgw.jenis_barang_id = i.jenis_barang_id) as produksi_k,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi = 5 and tgw.jenis_barang_id = i.jenis_barang_id) as gdrsk,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi in (4,6) and tgw.jenis_barang_id = i.jenis_barang_id) as konsumen,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi in (7,9) and tgw.jenis_barang_id = i.jenis_barang_id) as retur_k,
                (select sum(tgw.berat) from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
                    where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi in (8,11) and tgw.jenis_barang_id = i.jenis_barang_id) as koreksi
                from inventory i
                    left join jenis_barang jb on i.jenis_barang_id = jb.id
                    where bulan = ".$b." and tahun = ".$t." and i.jenis_barang = 'WIP' and jb.group = ".$g." order by jb.group, jb.kode desc");
    }
    //kolom bakar ulang dihapus
// (select sum(tgw.berat) from t_gudang_wip tgw
//                     left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
//                     left join t_hasil_wip thw on thw.t_spb_wip_id = tsw.id
//                     where tgw.tanggal between '".$s."' and '".$e."' and jenis_trx = 1 and tsw.flag_produksi in (1,3) and tgw.jenis_barang_id = i.jenis_barang_id) as bakar_ulang_k,
    function show_laporan_barang($jb,$tgl){
        return $this->db->query("
                Select i.*, jb.jenis_barang, jb.uom, jb.kode from inventory i
                left join jenis_barang jb on i.jenis_barang_id = jb.id 
                where i.tanggal = '".$tgl."' and i.jenis_barang = '".$jb."'
                order by jb.jenis_barang asc");
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