<?php
class Model_modules extends CI_Model{    
    function list_group(){
        $data = $this->db->query("Select id, name AS group_name From groups Where id>1 and flag_group = 0 Order By id");   
        // $data = $this->db->query("Select id, name AS group_name From groups Order By id");     
        return $data;
    }

    function list_group_resmi(){
        $data = $this->db->query("select id, name As group_name From groups Where id>1 and flag_group = 1 Order By id");
        return $data;
    }
    
    function list_modules(){
        // $data = $this->db->query("Select * From modules Where id>1 Order By id");
        // $data = $this->db->query("Select * From modules Order By parent_id ASC");   
        $data = $this->db->query("Select * From modules Where parent_id = 1 Order By id");     
        return $data;
    }

    function list_modules_resmi(){
        // $data = $this->db->query("Select * From modules Where id>1 Order By id");
        // $data = $this->db->query("Select * From modules Order By parent_id ASC");   
        $data = $this->db->query("select * from modules WHERE LEFT(modules.alias,2) = 'R_' and parent_id = 1 Order By Id");     
        return $data;
    }

    function list_modules_c(){
        $data = $this->db->query("Select * From modules Where parent_id = 0  Order By id");
        return $data;
    }

    function modules_details(){
        $data = $this->db->query("Select * From modules Where parent_id > 1 Order by Id");
        return $data;
    }

    function modules_details_c(){
        $data = $this->db->query("Select * From modules Where parent_id = 1 Order by Id");
        return $data;
    }

    function modules_details_c_resmi(){
        $data = $this->db->query("Select * From modules Where LEFT(modules.alias,2) = 'R_' and parent_id = 1 Order by Id");
        return $data;
    }
    
    function cek_akses($id_module, $id_group){
        $data = $this->db->query("Select id, akses, group_id From roles Where module_id=".$id_module." And group_id=".$id_group." Limit 1");     
        return $data;
    }
    
    function get_akses($module_name, $group_id){
        //Get ID Parent
        $qry_parent = $this->db->query("Select * From modules Where alias='".$module_name."' and parent_id=1"); 
        $parent = $qry_parent->result_array();
        $hak_akses = array();
        if($parent){
            $parent_id = $parent[0]['id'];
        
            //Get List Modules for this Parent
            $qry_modules = $this->db->query("Select id, alias From modules Where parent_id=".$parent_id." Order By id"); 
            $modules = $qry_modules->result_array();
            $module_id = array();
            foreach ($modules as $value){
                $module_id[] = $value['id'];
                $hak_akses[$value['alias']]=0;
            }
            $id_module = implode(',', $module_id);
            // print($id_module);
            //Get role for each modules
            $qry_role = $this->db->query("Select a.*,b.alias From roles a 
                    Left Join modules b ON (a.module_id=b.id) 
                    Where a.group_id=".$group_id." And a.module_id IN(".$id_module.")"); 
            $role = $qry_role->result_array();

            foreach ($role as $key=>$value){
                $hak_akses[$value['alias']] = $value['akses'];
            }            
        }else{
            $hak_akses['index'] = 0;
        }
        return $hak_akses;
    }

    function akses_menu($id){
        $data = $this->db->query("Select a.id as id_roles, g.name, a.group_id, a.module_id, b.alias, a.akses From roles a Left Join modules b ON (a.module_id=b.id) Left Join groups g ON (g.id=a.group_id) Where a.group_id=".$id);
        if($id){
            $loop = $data->result_array();
            $loop_id = array();
            $akses_menu = array();
            foreach ($loop as $key => $value) {
                $loop_id[] = $value['module_id'];
                $akses_menu[$value['alias']]= $value['akses'];
            }
        }else{
            $akses_menu['index'] = 0;
        }
        return $akses_menu;
    }
}