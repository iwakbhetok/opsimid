<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_rate extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('model_hotel_rate');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Hotel Rate');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Hotel Rate');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Hotel');
        $this->twiggy->set('LIST_TITLE', 'Hotel Rate');
    }
    

    function index()
    { 
    	$data = array();
        // create content page invoice
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/hotel_rate')->render();
        
        // end 
        $this->twiggy->set('content_page', $content);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }

    function form()
    {
        $data = array();   
        
        $form_builder = $this->model_hotel_rate->get_form_view();
        
        $this->twiggy->set('form_builder', $form_builder);
        // create content page form hotel rate
        $content = $this->twiggy->template('breadcrumbs')->render();     
        $content .= $this->twiggy->template('form/form_hotel_rate')->render();
        // end        
        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);
        
        //$script_page = $this->twiggy->template('script/form_user_accounts')->render();         
        //$script_page .= $this->twiggy->template('script/script_all')->render();         
        
        //$this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {}
 }