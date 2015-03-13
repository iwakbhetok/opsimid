<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ticket_stock extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('ticket_stock_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Ticket Stock');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Ticket Stock');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Ticketing');
        $this->twiggy->set('LIST_TITLE', 'Ticket Stock');
    }
    

    function index()
    { 
    	$data = array();
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/ticket_stock')->render();
        $this->twiggy->set('content_page', $content);

        $this->twiggy->set('FORM_NAME', 'form_airlines');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', 'full.stock_id');
        $this->twiggy->set('FORM_LINK', site_url('ticketing/ticket_stock/delete'));
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $window_page = $this->twiggy->template('window/window_customer')->render();
        
        $this->twiggy->set('window_page', $window_page);

        $script_page = $this->twiggy->template('script/ticket_stock')->render();
        $script_page = $this->twiggy->template('script/script_all')->render();
        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);   

    }

    function form($id='')
    {
        if (!empty($id)){
        $data = $this->ticket_stock_mdl->getdataid($id);
        $this->twiggy->set('edit', $data); 
        };


        $data = array(); 
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_ticket_stock')->render();
        $this->twiggy->set('content_page', $content);        
        $this->twiggy->set('FORM_NAME', 'form_ticket_stock');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', $id);
        $this->twiggy->set('FORM_LINK', site_url('ticketing/ticket_stock/delete'));    
        
        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);
        
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {
        $params = (object) $this->input->post();   
        
        $valid = $this->ticket_stock_mdl->save($params);
        //echo $this->db->last_query();
        
        //die();
        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/ticketing/ticket_stock/form");
        else
            redirect("../index.php/ticketing/ticket_stock/index");
    }

    public function delete()
    {       
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->ticket_stock_mdl->delete($id);
        
        if ($valid)
            redirect("../index.php/ticketing/ticket_stock/index");  
    }
 }