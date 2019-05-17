<?php
class Model_ingot extends CI_Model{
    // function list_data(){
    //     $data = $this->db->query("Select pi.*, jb.jenis_barang,
    //                 usr.realname As pic, a.tipe_apolo, s.status,
    //                 (Select count(pid.id)As jumlah_item From produksi_ingot_detail pid Where pid.produksi_ingot_id = pi.id)As jumlah_item,
    //                 (Select Count(pid.id)As ready_to_spb From produksi_ingot_detail pid Where 
    //                 pid.produksi_ingot_id = pi.id And pid.flag_spb=0)As ready_to_spb
    //             From produksi_ingot pi
    //                 Left Join users usr On (pi.created_by = usr.id) 
    //                 Left Join jenis_barang jb On (pi.jenis_barang_id = jb.id)
    //                 Left Join apolo a On (a.id = pi.id_apolo)
    //                 Left Join spb s On (s.produksi_ingot_id = pi.id)
    //             Order By pi.id Desc");
    //     return $data;
    // }

    function list_data(){
        $data = $this->db->query("Select pi.*, jb.jenis_barang,
                    usr.realname As pic, a.tipe_apolo, s.status, s.jumlah,
                    (Select Count(pid.id)As ready_to_spb From produksi_ingot_detail pid Where 
                    pid.produksi_ingot_id = pi.id And pid.flag_spb=0)As ready_to_spb
                From produksi_ingot pi
                    Left Join users usr On (pi.created_by = usr.id) 
                    Left Join jenis_barang jb On (pi.jenis_barang_id = jb.id)
                    Left Join apolo a On (a.id = pi.id_apolo)
                    Left Join spb s On (s.produksi_ingot_id = pi.id)
                Order By pi.id Desc");
        return $data;
    }
    
    function show_header_pi($id){
        $data = $this->db->query("Select pi.*, jb.jenis_barang, usr.realname As pic, pid.qty, a.tipe_apolo
                From produksi_ingot pi
                    Left Join users usr On (pi.created_by = usr.id) 
                    left join jenis_barang jb on (jb.id = pi.jenis_barang_id)
                    Left join produksi_ingot_detail pid on (pid.produksi_ingot_id = pi.id)
                    Left Join apolo a On (a.id = pi.id_apolo)
                Where pi.id=".$id);
        return $data;
    }

    function show_hasil($id){
        $data = $this->db->query("Select thm.*, pi.no_produksi, pi.remarks, a.tipe_apolo, jb.jenis_barang, jb.uom, usr.realname as pic, tbw.id as id_bpb_wip, tba.id as id_bpb_ampas, tba.status as status_ampas
                From t_hasil_masak thm
                    Left Join users usr On (thm.created_by = usr.id) 
                    left join produksi_ingot pi On (pi.id = thm.id_produksi)
                    left join t_hasil_wip thw ON (thw.hasil_masak_id = thm.id)
                    left join t_bpb_wip tbw On (tbw.hasil_wip_id = thw.id)
                    left join apolo a On (a.id = pi.id_apolo)
                    left join jenis_barang jb On (jb.id = pi.jenis_barang_id)
                    left join t_bpb_ampas tba On (tba.hasil_masak_id = thm.id)
                Where thm.id =".$id);
        return $data;
    }
    
    function list_pallete(){
        $data = $this->db->query("Select distinct no_pallete From dtr_detail Order By no_pallete");
        return $data;
    }        
    
    function load_detail($id){
        $data = $this->db->query("Select pid.*, rsk.nama_item, rsk.uom From produksi_ingot_detail pid 
                Left Join rongsok rsk On(pid.rongsok_id = rsk.id) 
                Where pid.produksi_ingot_id=".$id);
        return $data;
    }

    function load_detail_spb($id){
        $data = $this->db->query("Select * from spb_detail where spb_id =".$id);
        return $data;
    }
    
    function show_detail_pi($id){
        $data = $this->db->query("Select pid.*, rsk.nama_item, rsk.uom
                    From produksi_ingot_detail pid 
                        Left Join rongsok rsk On (pid.rongsok_id = rsk.id) 
                    Where pid.produksi_ingot_id=".$id);
        return $data;
    }

    function show_apolo(){
        $data = $this->db->query("select id, tipe_apolo from apolo order by id");
        return $data;
    }

    function spb_list(){
        $data = $this->db->query("Select spb.*, 
                    pi.no_produksi, 
                    usr.realname As pic,
                    aprv.realname As approved_name,
                    rjt.realname As rejected_name
                From spb
                    Left Join produksi_ingot pi On (spb.produksi_ingot_id = pi.id) 
                    Left Join users usr On (spb.created_by = usr.id) 
                    Left Join users aprv On (spb.approved_by = aprv.id) 
                    Left Join users rjt On (spb.rejected_by = rjt.id) 
                Order By spb.id Desc");
        return $data;
    }
    
    function show_header_spb($id){
        $data = $this->db->query("Select spb.*, 
                    pi.no_produksi,
                    jb.jenis_barang,
                    usr.realname As pic,
                    appr.realname As approved_name,
                    rjct.realname As reject_name
                    From spb
                        Left Join produksi_ingot pi On (spb.produksi_ingot_id = pi.id)
                        Left join jenis_barang jb on (jb.id = spb.jenis_barang)
                        Left Join users usr On (spb.created_by = usr.id) 
                        Left Join users appr On (spb.approved_by = appr.id)
                        Left Join users rjct On (spb.rejected_by = rjct.id)
                    Where spb.id=".$id);
        return $data;
    }
    
    function show_detail_spb($id){
        $data = $this->db->query("Select spbd.*, rsk.nama_item, rsk.uom, sr.stok_netto as stok
                    From spb_detail spbd 
                        Left Join rongsok rsk On (spbd.rongsok_id = rsk.id) 
                        Left Join stok_rsk sr On (sr.rongsok_id = rsk.id)
                        Left Join produksi_ingot_detail pid On (spbd.produksi_ingot_detail_id = pid.id)
                    Where spbd.spb_id=".$id);
        return $data;
    }
    
    function show_detail_spb_fulfilment($id){
        $data = $this->db->query("Select rsk.nama_item, rsk.uom, dtrd.no_pallete,dtrd.netto, sr.stok_netto as stok, dtrd.line_remarks
                    From spb_detail_fulfilment spdf 
                        left join dtr_detail dtrd on (dtrd.id = spdf.dtr_detail_id)
                        Left Join rongsok rsk On (dtrd.rongsok_id = rsk.id)
                        Left join stok_rsk sr on (sr.rongsok_id = rsk.id)
                    Where spdf.spb_id=".$id);
        return $data;
    }

   
    function skb_list(){
        $data = $this->db->query("Select skb.*, 
                    spb.no_spb,
                    pi.no_produksi, 
                    pmh.realname As pemohon,
                    usr.realname As pic,
                (Select count(skbd.id)As jumlah_item From skb_detail skbd Where skbd.skb_id = skb.id)As jumlah_item
                From skb 
                    Left Join spb On (skb.spb_id = spb.id)
                    Left Join produksi_ingot pi On (spb.produksi_ingot_id = pi.id) 
                    Left Join users pmh On (spb.created_by = pmh.id) 
                    Left Join users usr On (skb.created_by = usr.id) 
                Where skb.jenis_barang='INGOT'
                Order By skb.id Desc");
        return $data;
    }
    
    function show_header_skb($id){
        $data = $this->db->query("Select skb.*, 
                    spb.no_spb,
                    pi.no_produksi, 
                    pmh.realname As pemohon,
                    usr.realname As pic
                From skb
                    Left Join spb On (skb.spb_id = spb.id)
                    Left Join produksi_ingot pi On (spb.produksi_ingot_id = pi.id) 
                    Left Join users pmh On (spb.created_by = pmh.id) 
                    Left Join users usr On (skb.created_by = usr.id) 
                Where skb.id=".$id);
        return $data;
    }
    
    function show_detail_skb($id){
        $data = $this->db->query("Select skbd.*, rsk.nama_item, rsk.uom,                        
                        pid.no_pallete
                    From skb_detail skbd 
                        Left Join rongsok rsk On (skbd.rongsok_id = rsk.id) 
                        Left Join spb_detail spbd On (skbd.spb_detail_id = spbd.id)
                        Left Join produksi_ingot_detail pid On (spbd.produksi_ingot_detail_id = pid.id)
                    Where skbd.skb_id=".$id);
        return $data;
    }    
        
    function hasil_produksi(){
        $data = $this->db->query("Select thm.*,  pi.no_produksi,
                    usr.realname As pic, tbw.status as status_bpb_wip
                From t_hasil_masak thm
                    Left Join users usr On (thm.created_by = usr.id)
                    Left Join produksi_ingot pi On (pi.id = thm.id_produksi)
                    Left Join t_hasil_wip thw ON (thw.hasil_masak_id = thm.id)
                    Left Join t_bpb_wip tbw On (tbw.hasil_wip_id = thw.id)
                Order By thm.id Desc");
        return $data;
    }
    
    function get_skb_list(){
        $data = $this->db->query("Select id, no_skb From skb 
                Where flag_produksi=0 And skb.jenis_barang='INGOT'
                Order By no_skb");
        return $data;
    }
    
    function get_no_produksi_list(){
        $data = $this->db->query("Select pi.id, pi.no_produksi From spb
                inner join produksi_ingot pi on (pi.id = spb.produksi_ingot_id)
                where spb.status = 1 and flag_result=0
                Order By no_produksi");
        return $data;
    }

    function get_detail_produksi($id){
        $data = $this->db->query("Select no_spb,
                (Select sum(dtrd.netto) From dtr_detail dtrd
                left join spb_detail_fulfilment spbf on spbf.dtr_detail_id = dtrd.id
                Where spbf.spb_id = spb.id)As total_rongsok
                From spb 
                Left Join produksi_ingot pi On (spb.produksi_ingot_id = pi.id) 
                where pi.id = ".$id."
                Order By no_produksi");
        return $data;
    }

    function approve_loop($id){
        $data = $this->db->query("select * from spb_detail_fulfilment sdf where sdf.spb_id =".$id);
        return $data;
    }

    function jenis_barang_list(){
        $data = $this->db->query("Select * From jenis_barang Where category='WIP' Order By jenis_barang");
        return $data;
    }

    function rongsok_list(){
        $data = $this->db->query("Select * From rongsok where type_barang = 'Rongsok' Order By nama_item");
        return $data;
    }
    
    function show_header_pa($id){
        $data = $this->db->query("Select pa.*, 
                    skb.no_skb,
                    usr.realname As pic
                    From produksi_ampas pa
                        Left Join skb On (pa.skb_id = skb.id) 
                        Left Join users usr On (pa.created_by = usr.id)
                    Where pa.id=".$id);
        return $data;
    }
    
    function load_detail_produksi($id){
        $data = $this->db->query("Select pad.*, rsk.nama_item, rsk.uom From produksi_ampas_detail pad 
                Left Join rongsok rsk On(pad.rongsok_id = rsk.id) 
                Where pad.produksi_ampas_id=".$id);
        return $data;
    }

    function show_related_stok($id){
        $data = $this->db->query("select stok from rongsok where id =".$id);
        return $data;
    }

    function get_dtr_detail_by_no_pallete($no_pallete){
        $data = $this->db->query(
                "select dtr_detail.id,(ttr.id)as 'ttr_id' ,bruto, netto,no_pallete,line_remarks,rongsok.id as id_rongsok, (rongsok.nama_item)as rongsokname,rongsok.uom
                from dtr_detail
                left join rongsok on rongsok.id = dtr_detail.rongsok_id
                left join ttr on ttr.dtr_id = dtr_detail.dtr_id
                where no_pallete='".$no_pallete."' and flag_taken=0 and ttr.ttr_status = 1");
        return $data;
    }

    function check_spb($id){
        $data = $this->db->query("select spb.id, 
                (select sum(sd.qty) from spb_detail sd where sd.spb_id=spb.id) as tot_spb,
                (select sum(dd.netto) from spb_detail_fulfilment sdf left join dtr_detail dd on dd.id = sdf.dtr_detail_id where sdf.spb_id =spb.id) as tot_so
                from spb
                where spb.id =".$id);
        return $data;
    }
    
}