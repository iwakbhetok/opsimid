<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

        function __construct() {
            parent::__construct();
            $username = $this->session->userdata('username');
            
            if (empty($username)){
                redirect(site_url('main/index'), 'refresh');
            }
            $this->load->library('menu');
            $menu = $this->menu->set_menu();
            $this->twiggy->set('menu_navigasi', $menu);
        } 
        
	public function index()
	{
        $this->load->library('menu');
    	$menu = $this->menu->set_menu();
        $this->twiggy->template('hotel')->display();
	}
}
