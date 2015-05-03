<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model('user_mdl');
    }
    
    function index()
    {   

        $data = array();
        $this->load->library('menu');
        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Dashboard');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');

        //$this->twiggy->set('BREADCRUMBS_TITLE', 'Dashboard');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Home');

        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('dashboard_layout')->render();            
        $this->twiggy->set('content_page', $content);
        
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }
}    