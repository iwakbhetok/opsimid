<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ticket_status extends CI_Controller {	
	public function __construct()
	{
		parent::__construct();
	//	$this->load->model('Authentication');
	}
	
	public function index(){
		$this->load->library('menu');
                $menu = $this->menu->set_menu();
                $this->twiggy->set('menu_navigasi', $menu);

                $this->twiggy->title('OPSIMID')->prepend('Ticket_status');;
                $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
                $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
                $data = array();
                
                $window_page = $this->twiggy->template('window/window_currency')->render();
            
                // end        
                $this->twiggy->set('window_page', $window_page);

                $content = $this->twiggy->template('ticketing/ticket_status')->render();                
                $this->twiggy->set('content_page', $content);

                $output = $this->twiggy->template('dashboard')->render();
                $this->output->set_output($output);
	}
}