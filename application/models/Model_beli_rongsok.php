<?php
class Model_beli_rongsok extends CI_Model{
    function po_list(){
        $data = $this->db->query("Select po.*, 
                    bsp.no_pengajuan, bsp.tgl_pengajuan,
                    usr.realname As created_name,
                    spl.nama_supplier, spl.pic,
                (Select count(id)As jumlah_item From po_detail pd Where pd.po_id = po.id)As jumlah_item,
                (Select count(id)As tot_voucher From voucher vc Where vc.po_id = po.id)As tot_voucher,
                (Select count(pd.id)As ready_to_dtr From po_detail pd Where 
                    pd.po_id = po.id And pd.flag_dtr=1)As ready_to_dtr
                From po 
                    Left Join beli_sparepart bsp On (po.beli_sparepart_id = bsp.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (bsp.created_by = usr.id) 
                Where po.jenis_po='Rongsok' 
                Order By po.id Desc");
        return $data;
    }

    function po_list_outdated(){
        $data = $this->db->query("Select po.*, 
                    bsp.no_pengajuan, bsp.tgl_pengajuan,
                    usr.realname As created_name,
                    spl.nama_supplier, spl.pic,
                (Select count(id)As jumlah_item From po_detail pd Where pd.po_id = po.id)As jumlah_item,
                (Select count(id)As tot_voucher From voucher vc Where vc.po_id = po.id)As tot_voucher,
                (Select count(pd.id)As ready_to_dtr From po_detail pd Where 
                    pd.po_id = po.id And pd.flag_dtr=1)As ready_to_dtr
                From po 
                    Left Join beli_sparepart bsp On (po.beli_sparepart_id = bsp.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                    Left Join users usr On (bsp.created_by = usr.id) 
                Where po.jenis_po='Rongsok' and po.tanggal < DATE_ADD(NOW(), INTERVAL -2 MONTH)
                Order By po.id Desc");
        return $data;
    }
    //(select sum(ddtl.qty) from dtr_detail ddtl where ddtl.po_detail_id = po.id )as 'ddtl_qty',
    //(select sum(pdtl.qty) from po_detail pdtl where pdtl.po_id = po.id)as 'pdtl_qty',
    
    function select_po_id($id){
        $data = $this->db->query("select COUNT(dd.id) as jumlah_barang, 
            count(case when dd.flag_taken=0 then 1 else null end) as confirmed 
            from dtr_detail dd where dd.dtr_id =".$id);
        return $data;
    }

    function check_po_flag($id){
        $data = $this->db->query("select COUNT(dd.id) as jumlah_barang, 
            count(case when dd.flag_taken=0 then 1 else null end) as confirmed 
            from dtr_detail dd where dd.dtr_id =".$id);
        return $data;
    }

    function check_to_update($po_id){
        $data = $this->db->query("select pdtl.id, pdtl.po_id,pdtl.rongsok_id, pdtl.qty, ddtl.id as dtr_detail_id
                from po_detail pdtl
                left join dtr on dtr.po_id = pdtl.po_id
                left join dtr_detail ddtl on ddtl.dtr_id = dtr.id
                where dtr.po_id = pdtl.po_id and dtr.status=1 
                and ddtl.rongsok_id = pdtl.rongsok_id and pdtl.po_id =".$po_id);
        return $data;
    }

    function check_po_dtr($id){
        $data = $this->db->query(
                "select pdtl.id, pdtl.po_id, sum(pdtl.qty) tot_qty,
                (select sum(ddtl.netto) from dtr_detail ddtl
                left join dtr on ddtl.dtr_id = dtr.id 
                where dtr.po_id = pdtl.po_id and dtr.status=1)as tot_netto from po_detail pdtl
                where pdtl.po_id =".$id." group by pdtl.po_id");
        return $data;
    }

    // function check_po_dtr($id){
    //     $data = $this->db->query("select pdtl.po_id, sum(pdtl.qty) as qty, 
    //             sum((select sum(ddtl.netto) from dtr_detail ddtl
    //             left join dtr on ddtl.dtr_id = dtr.id 
    //             where dtr.po_id = pdtl.po_id and dtr.status=1 and ddtl.rongsok_id = pdtl.rongsok_id))as total from po_detail pdtl
    //             where pdtl.po_id =".$id);
    //     return $data;
    // }

    function update_flag_dtr_po_detail($po_id){
        $this->db->where('po_id',$po_id);
        $this->db->update('po_detail',array(
                        'flag_dtr'=>'0'));
    }   
    
    function show_header_po($id){
        $data = $this->db->query("Select po.*, 
                    spl.nama_supplier, spl.pic,
                    sum(po_detail.total_amount)as tot_nilai_po,
                    (select sum(voucher.amount) from voucher where voucher.po_id = po.id)
                     as 'tot_nilai_dp',
                    (select count(dtr.id) from dtr where dtr.po_id = po.id)as 'tot_dtr'
                    From po 
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        left join po_detail on po_detail.po_id = po.id
                    Where po.id=".$id);
        return $data;
    }

    function voucher_po_rsk($id){
        $data = $this->db->query("Select po.*,s.nama_supplier, dtr.po_id, sum(dd.netto*pd.amount) as nilai_po, 
            (Select Sum(voucher.amount) From voucher Where voucher.po_id = po.id)As nilai_dp
            From po
            inner join dtr on dtr.po_id = po.id
            inner join dtr_detail dd on dd.dtr_id = dtr.id
            inner join po_detail pd on pd.id = dd.po_detail_id
            inner join supplier s on s.id = po.supplier_id
            Where dtr.po_id =".$id." and dtr.status=1");
        return $data;
    }
   
    function show_data_po($id){
        $data = $this->db->query("select rsk.nama_item, rsk.uom, sum(ttd.qty) as qty, sum(ttd.bruto) as bruto, sum(ttd.netto) as netto, count(ttd.ttr_id) as jml_ttr
            from ttr 
            left join ttr_detail ttd on ttd.ttr_id = ttr.id
            left join dtr on dtr.id = ttr.dtr_id
            left join rongsok rsk On ttd.rongsok_id = rsk.id
            where dtr.po_id =".$id." group by ttd.rongsok_id");
        return $data;
    }

    function show_detail_po($id){
        $data = $this->db->query("Select pod.*, rsk.nama_item, rsk.uom
                    From po_detail pod 
                        Left Join rongsok rsk On (pod.rongsok_id = rsk.id) 
                    Where pod.po_id=".$id);
        return $data;
    }
    
    function load_detail($id){
        $data = $this->db->query("Select pod.*, rsk.nama_item, rsk.uom From po_detail pod 
                Left Join rongsok rsk On(pod.rongsok_id = rsk.id) 
                Where pod.po_id=".$id);
        return $data;
    }
    
    // function dtr_list(){
    //     $data = $this->db->query("Select dtr.*, 
    //                 po.no_po, 
    //                 spl.nama_supplier,
    //                 usr.realname As penimbang,
    //             (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
    //             From dtr
    //                 Left Join po On (dtr.po_id = po.id) 
    //                 Left Join supplier spl On (po.supplier_id = spl.id) 
    //                 Left Join users usr On (dtr.created_by = usr.id) 
    //             Order By dtr.id Desc");
    //     return $data;
    // }

    function dtr_list(){
        $data = $this->db->query("Select dtr.*, 
                    po.no_po, 
                    spl.nama_supplier,
                    usr.realname As penimbang,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) or (dtr.supplier_id = spl.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_dtr($id){
        $data = $this->db->query("Select dtr.*, 
                    po.no_po,
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    rjct.realname As rejected_name
                    From dtr
                        Left Join po On (dtr.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users usr On (dtr.created_by = usr.id) 
                        Left Join users rjct On (dtr.rejected_by = rjct.id) 
                    Where dtr.id=".$id);
        return $data;
    }
    
    function show_detail_dtr($id){
        $data = $this->db->query("Select dtrd.*, rsk.nama_item, rsk.uom
                    From dtr_detail dtrd 
                        Left Join rongsok rsk On (dtrd.rongsok_id = rsk.id) 
                    Where dtrd.dtr_id=".$id);
        return $data;
    }

    function show_detail_dtr_by_ttr($id){
        $data = $this->db->query("Select dtr_detail.*
                    From ttr
                    left join dtr_detail on dtr_detail.dtr_id = ttr.dtr_id
                    Where ttr.id=".$id);
        return $data;
    }
    
    // function get_po_list(){
    //     $data = $this->db->query("Select po.id, po.no_po                   
    //                 From po 
    //                 Where po.jenis_po='Rongsok' 
    //                 And (Select count(dtr.id)As jmlh_dtr From dtr Where dtr.po_id=po.id And dtr.status!=1)>0");
    //     return $data;
    // }

    function get_po_list(){
        $data = $this->db->query("Select id, no_po, jenis_po From po 
            Where jenis_po= 'Rongsok' And (status= 0 or status = 2)");
        return $data;
    }
    
    // function get_dtr($po_id){
    //     $data = $this->db->query("Select dtr.*, 
    //                 po.no_po, 
    //                 spl.nama_supplier,
    //                 usr.realname As penimbang,
    //                 app.realname As approved_name,
    //                 rjct.realname As rejected_name,
    //             (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
    //             From dtr
    //                 Left Join po On (dtr.po_id = po.id) 
    //                 Left Join supplier spl On (po.supplier_id = spl.id) 
    //                 Left Join users usr On (dtr.created_by = usr.id) 
    //                 Left Join users app On (dtr.approved_by = app.id) 
    //                 Left Join users rjct On (dtr.rejected_by = rjct.id) 
    //             Where dtr.po_id=".$po_id);
    //     return $data;
    // }
    function get_dtr_approve($po_id){
        $data = $this->db->query("Select dtr.*,  
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join supplier spl On (dtr.supplier_id = spl.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                    Left Join users app On (dtr.approved_by = app.id) 
                    Left Join users rjct On (dtr.rejected_by = rjct.id) 
                Where dtr.po_id=".$po_id);
        return $data;
    }

    function get_dtr($sp_id){
        $data = $this->db->query("Select dtr.*,  
                    spl.nama_supplier,
                    usr.realname As penimbang,
                    app.realname As approved_name,
                    rjct.realname As rejected_name,
                (Select count(dtrd.id)As jumlah_item From dtr_detail dtrd Where dtrd.dtr_id = dtr.id)As jumlah_item
                From dtr
                    Left Join supplier spl On (dtr.supplier_id = spl.id) 
                    Left Join users usr On (dtr.created_by = usr.id) 
                    Left Join users app On (dtr.approved_by = app.id) 
                    Left Join users rjct On (dtr.rejected_by = rjct.id) 
                Where dtr.supplier_id=".$sp_id." and status = 0");
        return $data;
    }
    
    function ttr_list(){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr,
                    po.no_po, 
                    spl.nama_supplier,
                (Select count(ttrd.id) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As jumlah_item,
                (Select Sum(ttrd.bruto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As bruto, 
                (Select Sum(ttrd.netto) From ttr_detail ttrd Where ttrd.ttr_id = ttr.id)As netto
                From ttr 
                    Left Join dtr On (ttr.dtr_id = dtr.id) 
                    Left Join po On (dtr.po_id = po.id) 
                    Left Join supplier spl On (po.supplier_id = spl.id) 
                Where dtr.po_id>0 And po.jenis_po='Rongsok'
                Order By dtr.id Desc");
        return $data;
    }
    
    function show_header_ttr($id){
        $data = $this->db->query("Select ttr.*, 
                    dtr.no_dtr,
                    po.no_po,
                    spl.nama_supplier,
                    app.realname As approved_name,
                    rjct.realname As rejected_name
                    From ttr 
                        Left Join dtr On (ttr.dtr_id = dtr.id) 
                        Left Join po On (dtr.po_id = po.id)
                        Left Join supplier spl On (po.supplier_id = spl.id) 
                        Left Join users app On (dtr.approved_by = app.id) 
                        Left Join users rjct On (dtr.rejected_by = rjct.id) 
                    Where ttr.id= ".$id);
        return $data;
    }
    
    function show_detail_ttr($id){
        $data = $this->db->query("Select ttrd.*, rsk.nama_item, rsk.uom, dtr_detail.no_pallete
                    From ttr_detail ttrd 
                        Left Join rongsok rsk On (ttrd.rongsok_id = rsk.id)
                        left join dtr_detail on dtr_detail.id = ttrd.dtr_detail_id
                    Where ttrd.ttr_id=".$id);
        return $data;
    }
    
    function get_data_pelunasan($id){
        $data = $this->db->query("Select po.*,
                    supplier.nama_supplier,
                    (Select Sum(po_detail.total_amount) From po_detail Where po_detail.po_id = po.id)As nilai_po,
                    (Select sum(voucher.amount) From voucher Where voucher.po_id = po.id And jenis_voucher='DP')As nilai_dp
                From po
                    Left Join supplier On (po.supplier_id = supplier.id)
                Where po.id=".$id);
        return $data;
    }

    function cek_stok($produk, $jenis_item=null){
        $sql  = "Select * From t_inventory Where nama_produk='".$produk."'";    
        if(!empty($jenis_item)){
            $sql .= " And jenis_item='".$jenis_item."'";
        }
        $data = $this->db->query($sql);        
        return $data;
    }
    
    function voucher_list(){
        $data = $this->db->query("Select voucher.*, 
                po.no_po, po.tanggal As tanggal_po
                From voucher 
                    Left Join po On (voucher.po_id = po.id) 
                Where voucher.jenis_barang='RONGSOK'
                Order By voucher.no_voucher");
        return $data;
    }

    function update_stok_tersedia($id, $stok){
        $this->db->select('stok');
        $this->db->where('id',$id);
        $stok_now = $this->db->get('rongsok')->row_array();
        $final_stok = ((int)$stok_now['stok'] + $stok);
        $this->db->where('id',$id);
        $r = $this->db->update('rongsok',array(
                'stok'=> $final_stok)
                );
    }

    function supplier_list(){
        $data = $this->db->query("Select * From supplier Order By nama_supplier");
        return $data;
    }

    function show_data_rongsok(){
        $data = $this->db->query("Select * From rongsok Where type_barang ='Rongsok' order by nama_item");        
        return $data;
    }

    function show_data_rongsok_detail($iditem){
        $data = $this->db->query("Select id, uom From rongsok Where id=".$iditem);        
        return $data;
    }

    function show_detail_prev_dtr($id){
        $data =  $this->db->query("
                Select dtr.no_dtr,rongsok.nama_item,dtr_detail.qty from dtr_detail
                left join rongsok on rongsok.id = dtr_detail.rongsok_id
                left join dtr on dtr.id = dtr_detail.dtr_id
                left join po_detail on po_detail.id = dtr_detail.po_detail_id
                left join po on po.id = po_detail.po_id
                where po.id = ".$id);
        return $data;
    }

    function show_list_barang($id){
        $data = $this->db->query(
                "select nama_item from po_detail
                left join rongsok on rongsok.id = po_detail.rongsok_id
                where po_id = ".$id
                );
        return $data;
    }

     function show_laporan(){
        $data = $this->db->query("select DATE_FORMAT(tid.tanggal,'%M %Y') as showdate, 
            EXTRACT(YEAR_MONTH from tid.tanggal) as tanggal, 
            count(tid.t_inventory_id) as jumlah, 
            sum(tid.bruto_masuk) as bruto_masuk, 
            sum(tid.netto_masuk) as netto_masuk, 
            sum(tid.bruto_keluar) as bruto_keluar, 
            sum(tid.netto_keluar) as netto_keluar from t_inventory_detail tid
            left join t_inventory ti on ti.id = tid.t_inventory_id 
            where ti.jenis_item = 'RONGSOK'
            group by month(tanggal)");
        return $data;
    }

    function show_laporan_after($tahun,$bulan){
        $data = $this->db->query("select count(tid.t_inventory_id) as jumlah, 
            sum(tid.bruto_masuk) as bruto_masuk, 
            sum(tid.netto_masuk) as netto_masuk, 
            sum(tid.bruto_keluar) as bruto_keluar, 
            sum(tid.netto_keluar) as netto_keluar from t_inventory_detail tid
            left join t_inventory ti on ti.id = tid.t_inventory_id 
            where ti.jenis_item = 'RONGSOK' and tid.tanggal < '".$tahun."-".$bulan."-01'");
        return $data;
    }

    function show_view_laporan($bulan, $tahun){
        $data = $this->db->query("select ti.id, ti.nama_produk, DATE_FORMAT(tid.tanggal,'%M %Y') as showdate, 
            EXTRACT(YEAR_MONTH from tid.tanggal) as tanggal,
            count(tid.t_inventory_id) as jumlah, 
            sum(tid.bruto_masuk) as bruto_masuk, 
            sum(tid.netto_masuk) as netto_masuk, 
            sum(tid.bruto_keluar) as bruto_keluar, 
            sum(tid.netto_keluar) as netto_keluar from t_inventory_detail tid
            left join t_inventory ti on ti.id = tid.t_inventory_id 
            where ti.jenis_item = 'RONGSOK' and month(tid.tanggal) =".$bulan." and year(tid.tanggal) =".$tahun."
            group by ti.id");
        return $data;
    }

    function show_laporan_detail($bulan,$tahun,$id_barang){
        $data = $this->db->query("select tid.*, ti.nama_produk from t_inventory_detail tid
            left join t_inventory ti on ti.id = tid.t_inventory_id 
            where ti.jenis_item = 'RONGSOK' and 
            month(tid.tanggal) =".$bulan." and year(tid.tanggal) =".$tahun." and ti.id =".$id_barang."
            order by tid.tanggal asc");
        return $data;
    }

    function gudang_rongsok_list(){
        $data = $this->db->query("select rsk.*, sr.jumlah_packing, sr.stok as stok_rsk, (select sum(dd.netto) from dtr_detail dd where dd.rongsok_id = rsk.id and dd.tanggal_masuk != 0) as stok_masuk, (select sum(dd.netto) from dtr_detail dd where dd.rongsok_id = rsk.id and dd.tanggal_keluar != 0) as stok_keluar from rongsok rsk
            left join stok_rsk sr on sr.rongsok_id = rsk.id
            where type_barang = 'Rongsok' and sr.jumlah_packing > 0");
        return $data;
    }
}

/** CREATE VIEW STOK_RONGSOK 
CREATE OR REPLACE VIEW stok_rsk(rongsok_id, nama_item, jumlah_packing, stok)
    AS SELECT dd.rongsok_id, rsk.nama_item, count(dd.id), (select sum(netto) from dtr_detail dd where dd.tanggal_masuk != 0 and dd.rongsok_id=rsk.id) - COALESCE((select sum(netto) from dtr_detail dd where dd.tanggal_keluar != 0 and dd.rongsok_id=rsk.id),0)
    from dtr_detail dd
        left join rongsok rsk on rsk.id = dd.rongsok_id
            where rsk.type_barang = 'Rongsok'
            group by dd.rongsok_id**/