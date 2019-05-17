<?php
class Model_customercv extends CI_Model{
    function list_data(){
        $data = $this->db->query("Select cust.*, 
                    prov.province_name, cty.city_name,
                    bank.kode_bank
                From m_customers_cv cust 
                    Left Join m_provinces prov On (cust.m_province_id = prov.id) 
                    Left Join m_cities cty On (cust.m_city_id = cty.id)
                    Left Join bank On (cust.m_bank_id = bank.id) 
                Order By cust.nama_customer");
        return $data;
    }
    
    function show_data($id){
        $data = $this->db->query("Select cust.*, 
                    prov.province_name, cty.city_name,
                    bank.kode_bank
                From m_customers_cv cust 
                    Left Join m_provinces prov On (cust.m_province_id = prov.id) 
                    Left Join m_cities cty On (cust.m_city_id = cty.id)
                    Left Join bank On (cust.m_bank_id = bank.id) Where cust.id=".$id);        
        return $data;
    }
    
    function list_provinsi(){
        $data = $this->db->query("Select * From m_provinces Order By province_name");
        return $data;
    }
    
    function list_kota($id){
        $data = $this->db->query("Select * From m_cities Where m_province_id=".$id." Order By city_name");
        return $data;
    }
    
    function list_bank(){
        $data = $this->db->query("Select * From bank Order By kode_bank");
        return $data;
    }
}