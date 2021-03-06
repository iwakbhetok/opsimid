<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('form_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Report Document');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Report Document');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Document');
        $this->twiggy->set('LIST_TITLE', 'Report Document');
    }
    

    function index()
    { 
    	$data = array();
        // create content page invoice
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/report')->render();
        
        // end 
        $this->twiggy->set('content_page', $content);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }
 }