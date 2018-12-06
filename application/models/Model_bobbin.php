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
        $data = $this->db->query("select mbs.*,(select count(mbsd.id) from m_bobbin_spb_detail mbsd where mbsd.id_spb_bobbin = mbs.id) from m_bobbin_spb mbs");
        return $data;
    }
}