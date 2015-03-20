<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class module_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
            $data = $this->db->count_all_results('sys_module');
            return $data;
    }
        
    function getcode_name_prefix($module_name)
    {
        $this->db->join('setting_mst_code_configuration cc', 'cc.code_id=sm.code_configuration_id');
        $this->db->where('sm.alias_module', $module_name);
        $query = $this->db->get('sys_module sm');
        $nomor = 1;
        $data = array();
        foreach($query->result() as $row):
            $data[] = array(
                'code_name'     => $row->code_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

}