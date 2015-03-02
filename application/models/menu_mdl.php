<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_mdl extends CI_Model {
    function __construct() {
        parent::__construct();        
    }
            
    function getlist()
    {
       $groupid = $this->session->userdata('user_group_id');
       $fields = array(
           'sys_user_permission.menu_id',
           'menu_name',
           'menu_icon',
           'menu_link',
           'menu_position'
       );
       $this->db->select($fields);
       $this->db->join('sys_menu', 'sys_menu.menu_id=sys_user_permission.menu_id', 'left');
       $this->db->where('user_group_id', $groupid);
       $this->db->where('menu_parent_id', 0);
       $this->db->where('menu_is_active', 'TRUE');
       $this->db->order_by('menu_position asc');
       $this->db->order_by('menu_id asc');
       
       $query = $this->db->get('sys_user_permission');
       
       $data = array();
       foreach($query->result() as $row):
            $menu_name = $row->menu_name;
            $child = $this->getchild($row->menu_id);     
            if (count($child)>0){                
                $link = 'javascript:;';
                $targetclass   = '';//'data-toggle="collapse" data-target="#'.strtolower($row->menu_name).'child"';
                $targetid       = strtolower($row->menu_name).'child';
                $iconarrow      = '<i class="fa fa-fw arrow"></i>';
                $this->twiggy->set('targetid', $targetid);
                $this->twiggy->set('menuchild', $child);
                $child_list     = $this->twiggy->template('menu_child')->render();
            }
            else {
                $link           = site_url($row->menu_link);
                $targetclass    = ''; 
                $targetid       = '';
                $iconarrow      = '';
                $child_list     = '';
            };
            
            $data[] = array(
                'id'            => $row->menu_id,
                'name'          => $menu_name,
                'menu_link'     => $link,
                'menu_icon'     => $row->menu_icon,
                'targetclass'   => $targetclass,
                'targetid'      => $targetid,    
                'iconarrow'     => $iconarrow,
                'CHILD_LIST'    => $child_list
            );    
        endforeach;
        
        return $data;
    }
    
    
    function getchild($parentid)
    {
       
       $groupid = $this->session->userdata('user_group_id');
       $fields = array(
           'sys_user_permission.menu_id',
           'menu_name',
           'menu_icon',
           'menu_link'
       );
       $this->db->select($fields);
       $this->db->join('sys_menu', 'sys_menu.menu_id=sys_user_permission.menu_id', 'left');
       $this->db->where('menu_parent_id', $parentid);
       $this->db->where('user_group_id', $groupid);
       $this->db->where('menu_is_active', 'TRUE');       
       $this->db->order_by('menu_position asc');
       $this->db->order_by('menu_id asc');
       $query = $this->db->get('sys_user_permission');
       
       $data = array();
       foreach($query->result() as $row):
            $menu_name = $row->menu_name;
            $child = $this->get_third($row->menu_id);
            
            if (count($child)>0){                
                $link = 'javascript:;';
                $targetclass   = '';//'data-toggle="collapse" data-target="#'.strtolower($row->menu_name).'child"';
                $targetid       = strtolower($row->menu_name).'child';
                $iconarrow      = '<i class="fa fa-fw arrow"></i>';
                $this->twiggy->set('targetid', $targetid);
                $this->twiggy->set('menuchild', $child);
                $child_list     = $this->twiggy->template('menu_third_child')->render();
            }
            else {
                $link           = site_url($row->menu_link);
                $targetclass    = ''; 
                $targetid       = '';
                $iconarrow      = '';
                $child_list     = '';
            };
            
            $data[] = array(
                'child_id'            => $row->menu_id,
                'child_name'          => $menu_name,
                'child_link'          => site_url($row->menu_link),
                'child_icon'          => $row->menu_icon,  
                'iconarrow'             => $iconarrow,
                'CHILD_THIRD_LIST'    => $child_list
                //'child_css_class'     => $row->menu_css_class,                
            );    
        endforeach;
        return $data;
    }
    
    
    function get_third($parentid)
    {
       
       $groupid = $this->session->userdata('user_group_id');
       $fields = array(
           'sys_user_permission.menu_id',
           'menu_name',
           'menu_icon',
           'menu_link'
       );
       $this->db->select($fields);
       $this->db->join('sys_menu', 'sys_menu.menu_id=sys_user_permission.menu_id', 'left');
       $this->db->where('menu_parent_id', $parentid);
       $this->db->where('user_group_id', $groupid);
       $this->db->where('menu_is_active', 'TRUE');       
       $this->db->order_by('menu_position asc');
       $this->db->order_by('menu_id asc');
       $query = $this->db->get('sys_user_permission');
       
       $data = array();
       foreach($query->result() as $row):
            $menu_name = $row->menu_name;
            
            $data[] = array(
                'child_third_id'            => $row->menu_id,
                'child_third_name'          => $menu_name,
                'child_third_link'          => site_url($row->menu_link),
                'child_third_icon'          => $row->menu_icon,  
                //'child_css_class'     => $row->menu_css_class,                
            );    
        endforeach;
        return $data;
    }
    
    
    function getmenu()
    {
        $this->db->where('menu_parent_id', 0);
        $this->db->where('menu_id >', 1);
        $this->db->order_by('menu_position', 'asc');
        $this->db->order_by('menu_id', 'asc');
        $this->db->limit(2);
        $query = $this->db->get('sys_menu');
        $data = array();
        foreach($query->result() as $row):
            $name = $row->menu_name; 
            $id   = $row->menu_id;  
            $anak = array();
            $anak = $this->getmenu_child($id);
            $data[] = array(
                'id'        => $row->menu_id,
                //'title'     => $name,
                'children'  => $anak,
            );
            
        endforeach;
        return $data;
    }
    
    function getmenu_child($id)
    {
        $this->db->where('menu_parent_id', $id);
        $this->db->order_by('menu_position', 'asc');
        $this->db->order_by('menu_id', 'asc');
        $this->db->limit(1);
        $query = $this->db->get('sys_menu');
        $data_child = array();
        foreach($query->result() as $row):
            $name = $row->menu_name;        
            $data_child[] = array(
                'id'        => $row->menu_id,
                //'title'     => $name,
            );
        endforeach;
        return $data_child;
    }
  
} 