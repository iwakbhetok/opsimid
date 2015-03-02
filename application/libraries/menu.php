<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Menu {
    
    
    function set_menu()
    {
        $CI =& get_instance(); 
        $CI->load->model('menu_mdl');         
        $data = $CI->menu_mdl->getlist();         
        return $data;
    }
    
}