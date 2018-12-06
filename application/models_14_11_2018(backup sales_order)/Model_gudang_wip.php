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
        $data = $this->db->query("Select thw.*, jb.jenis_barang,
                    usr.realname As pembuat
                From t_hasil_wip thw
                    Left Join users usr On (thw.created_by = usr.id)
                    left join jenis_barang jb on (jb.id = thw.jenis_barang_id)   
                Order By thw.id Desc");
        return $data;
    } 

    function bpb_list(){
        $data = $this->db->query("Select bpbwip.*, tsw.no_spb_wip,
                    (select count(id) from t_hasil_wip twip where twip.id = bpbwip.hasil_wip_id)as jumlah_item,
                    usr.realname As pengirim
                From t_bpb_wip bpbwip
                    Left join users usr On (bpbwip.created_by = usr.id)
                    left join t_spb_wip tsw on (tsw.id = bpbwip.spb_wip_id)
                Order By bpbwip.id Desc");
        return $data;
    }
    
    function show_header_bpb($id){
        $data = $this->db->query("Select bpbwip.*, tsw.no_spb_wip, 
                (pi.no_produksi)as no_produksi_ingot,
                (hslwip.id)as hasil_wip_id,
                    usr.realname As pengirim
                    From t_bpb_wip bpbwip
                        Left Join users usr On (bpbwip.created_by = usr.id) 
                        left join t_spb_wip tsw on (tsw.id = bpbwip.spb_wip_id)
                        left join t_hasil_wip hslwip on (hslwip.id = bpbwip.hasil_wip_id)
                        left join t_hasil_masak hslmsk on (hslmsk.id = hslwip.hasil_masak_id)
                        left join produksi_ingot pi on (pi.no_produksi = hslmsk.no_masak)
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
                (Select count(tswd.id)As jumlah_item From t_spb_wip_detail tswd Where tswd.t_spb_wip_id = tsw.id)As jumlah_item
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

    function show_detail_spb_fulfilment($id){
       $data = $this->db->query("select tgw.*, jb.jenis_barang 
                from t_gudang_wip tgw
                left join jenis_barang jb on (jb.id = tgw.jenis_barang_id)
                left join t_spb_wip_detail tswd on (tswd.id = tgw.t_spb_wip_detail_id)
                left join t_spb_wip tsw on (tsw.id = tswd.t_spb_wip_id) 
                where tsw.id =".$id
                );
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