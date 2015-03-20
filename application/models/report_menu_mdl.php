<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_menu_mdl extends CI_Model {
    function __construct() {
        parent::__construct();        
    }
    
    function get_reportmenu($id)
    {
        $this->db->where('menu_parent_id', $id);            
        $this->db->where('menu_is_active', 'TRUE');            
        $this->db->where('menu_is_report', 'TRUE');
        $query = $this->db->get('sys_menu');
        $data = array();
        foreach($query->result() as $row):
            $data[] = array(
                'menu_name' => $row->menu_name,
                'menu_link' => $row->menu_link,
                'menu_icon' => $row->menu_icon,                
            );
        endforeach;
        return $data;
    }
}           