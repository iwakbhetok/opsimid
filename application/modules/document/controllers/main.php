<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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
                $this->twiggy->template('cashier')->display();
	}
}
