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

    function gudang_wip_produksi_list($jenis){
        $data = $this->db->query("Select thw.id, COALESCE(NULLIF(thw.no_produksi_wip,''), pi.no_produksi) as no_produksi_wip,thw.jenis_masak, thw.tanggal, thw.qty, thw.uom, thw.berat, thw.susut, thw.keras, thw.bs, jb.jenis_barang, usr.realname As pembuat, dtr.id as id_dtr, tbw.id as id_bpb, tbw.status
                From t_hasil_wip thw
                    left join t_hasil_masak thm On (thm.id = thw.hasil_masak_id)
                    left join produksi_ingot pi On (pi.id = thm.id_produksi)
                    Left Join users usr On (thw.created_by = usr.id)
                    left join jenis_barang jb on (jb.id = thw.jenis_barang_id)   
                    left join dtr On (dtr.prd_id = thw.id)
                    left join t_bpb_wip tbw on (tbw.hasil_wip_id = thw.id)
                    where thw.jenis_masak = '".$jenis."' 
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

    function spb_list($flag_produksi=null){
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
                    where tsw.flag_produksi IN (1,3) 
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
                    where tsw.flag_produksi NOT IN (1,3) 
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
        $data = $this->db->query("select jb.jenis_barang, jb.id, jb.kode
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
        $data = $this->db->query("Select thw.*, pi.id as id_produksi_ingot, COALESCE(NULLIF(thw.no_produksi_wip,''), pi.no_produksi) as no_produksi_wip, usr.realname As pembuat, dtr.id as id_dtr, tbw.id as id_bpb, tbw.status
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

    function print_laporan_masak($s,$e,$j){
        if($j == 1){
            return $this->db->query("select thm.tanggal, pi.no_produksi as nomor, thm.tipe, count(thm.id) as count, sum(kayu) as kayu, sum(gas) as gas,  sum(gas_r) as gas_r, sum(bs_service) as bs_service, sum(total_rongsok) as total_rongsok, sum(ingot) as ingot, sum(berat_ingot) as berat_ingot, sum(bs) as bs, sum(susut) as susut, sum(ampas) as ampas, sum(serbuk) as serbuk, sum(bs_service) as bs_service from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            where thm.tanggal between '".$s."' and '".$e."' group by thm.tanggal");
        }elseif($j == 2){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, thw.gas, a.qty as qty_rsk, a.netto as berat_rsk, thw.tanggal, thw.qty, uom, thw.berat, susut, bs from t_hasil_wip thw
                left join (select tsw.tanggal, sum(tgw.qty) as qty, sum(tgw.berat) as netto from t_gudang_wip tgw
                    left join t_spb_wip tsw on tgw.t_spb_wip_id = tsw.id
                    where tsw.flag_produksi = 2
                    group by tsw.id) a on a.tanggal = thw.tanggal
            where thw.jenis_masak = 'ROLLING' and thw.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 3){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, (select sum(qty) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as qty_rsk, (select sum(berat) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as berat_rsk, thw.tanggal, qty, uom, berat, susut, bs from t_hasil_wip thw
            where thw.jenis_masak = 'BAKAR ULANG' and thw.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 4){
            return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, (select sum(qty) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as qty_rsk, (select sum(berat) from t_gudang_wip tgw where tgw.t_spb_wip_id = thw.t_spb_wip_id) as berat_rsk, thw.tanggal, qty, uom, berat, susut, bs from t_hasil_wip thw
            where thw.jenis_masak = 'CUCI' and thw.tanggal between '".$s."' and '".$e."'");
        }elseif($j == 8){
            return $this->db->query("select thm.tanggal, pi.no_produksi, thm.tipe, mulai,selesai, kayu, gas, gas_r, bs_service, total_rongsok, ingot, berat_ingot, bs, susut, ampas, serbuk, bs_service from t_hasil_masak thm
            left join produksi_ingot pi on thm.id_produksi = pi.id
            where thm.tanggal between '".$s."' and '".$e."' order by thm.tanggal, pi.no_produksi");
        }
    }

    function print_laporan_bb_apollo($s,$e){
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
            COALESCE(NULLIF(sum(case when dd.rongsok_id IN (59,61,15) then dd.netto else 0 end),0),null) as COPER from produksi_ingot pi
            left join spb on spb.produksi_ingot_id = pi.id
            left join spb_detail_fulfilment sdf on sdf.spb_id = spb.id
            left join dtr_detail dd on sdf.dtr_detail_id = dd.id
            where pi.tanggal between '".$s."' and '".$e."'
            group by pi.tanggal order by pi.tanggal
            ");
    }

    function lap_babakar_apollo($s,$e){
        return $this->db->query("select thm.tanggal, 1 as v_digital, pi.no_produksi as nomor, thm.tipe, count(thm.id) as count, sum(kayu) as kayu, 
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

    function print_laporan_bb_rolling($s,$e){
        return $this->db->query("select no_produksi_wip as nomor, thw.jenis_barang_id, thw.gas, thw.gas_r, thw.tanggal, thw.qty, uom, thw.berat, susut, bs from t_hasil_wip thw 
            where thw.jenis_masak = 'ROLLING' and thw.tanggal between '".$s."' and '".$e."'");
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
                left join users u on tgp.created_by = u.id order by tgp.tanggal desc");
    }

    function get_floor_produksi($a){
        return $this->db->query("select * from t_gudang_produksi where tanggal ='".$a."'");
    }

    function header_gudang_produksi($id){
        return $this->db->query("select * from t_gudang_produksi where id =".$id);
    }

    function gudang_keras(){
        return $this->db->query("select tgk.*, jb.jenis_barang, thw.no_produksi_wip from t_gudang_keras tgk
                left join jenis_barang jb on tgk.jenis_barang_id = jb.id
                left join t_hasil_wip thw on tgk.t_hasil_wip_id = thw.id
                order by tgk.tanggal desc");
    }

    function header_gudang_keras($id){
        return $this->db->query("select * from t_gudang_keras where id =".$id);
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