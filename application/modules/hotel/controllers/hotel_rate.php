<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_rate extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('hotel_rate_mdl');

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
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/hotel_rate')->render();
        $this->twiggy->set('content_page', $content);

        $this->twiggy->set('FORM_NAME', 'form_hotel_rate');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', 'full.hotel_rate_id');
        $this->twiggy->set('FORM_LINK', site_url('hotel/hotel_rate/form'));
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $script_page = $this->twiggy->template('script/hotel_rate')->render();       
        $this->twiggy->set('SCRIPTS', $script_page);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     

    }

    function form($id='')
    {
        if (!empty($id)){
        $data = $this->hotel_rate_mdl->getdataid($id);
        $this->twiggy->set('edit', $data); 
        };
        $data = array();   
        
        $content = $this->twiggy->template('breadcrumbs')->render();     
        $content .= $this->twiggy->template('form/form_hotel_rate')->render();   
        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);
        
        $script_page = $this->twiggy->template('script/hotel_rate')->render();         
        $script_page .= $this->twiggy->template('script/script_all')->render();
        
        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {
        $params = (object) $this->input->post();   
        
        $valid = $this->hotel_rate_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/hotel/hotel_rate/form");
        else
            redirect("../index.php/hotel/hotel_rate/index");
    }
 }