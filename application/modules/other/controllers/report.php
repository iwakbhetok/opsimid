<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('form_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Report of Other');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Report of Other');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Other');
        $this->twiggy->set('LIST_TITLE', 'Report of Other');
    }
    

    function index()
    { 
    	$data = array();
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('report/report_of_other')->render();
        
        $this->twiggy->set('content_page', $content);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }

    function form()
    {
        $data = array();        
        
        $content = $this->twiggy->template('breadcrumbs')->render();       
        $content .= $this->twiggy->template('form/form_document')->render();

        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }
 }