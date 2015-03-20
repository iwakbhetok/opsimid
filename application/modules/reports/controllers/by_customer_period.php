<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class by_customer_period extends CI_Controller {	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){		
            $this->load->library('menu');
            $menu = $this->menu->set_menu();
            $this->twiggy->set('menu_navigasi', $menu);

            $this->twiggy->title('OPSIMID')->prepend('Reports');
            $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
            $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
              
            $this->twiggy->set('BREADCRUMBS_TITLE', 'Booking by Customer or Period');
            $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Report');
            $this->twiggy->set('LIST_TITLE', 'Booking by Customer Period');

            $window_page = $this->twiggy->template('window/window_customer')->render();
            $this->twiggy->set('window_page', $window_page);

            $script_page = $this->twiggy->template('script/by_customer_period')->render();       
            $this->twiggy->set('SCRIPTS', $script_page);

            $content = $this->twiggy->template('breadcrumbs')->render();
            $content .= $this->twiggy->template('reports/by_customer_period')->render();                
            $this->twiggy->set('content_page', $content);

            $output = $this->twiggy->template('dashboard')->render();
            $this->output->set_output($output);

	}
}