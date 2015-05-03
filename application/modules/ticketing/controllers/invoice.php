<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoice extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('invoice_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Invoice');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Invoice');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Ticketing');
        $this->twiggy->set('LIST_TITLE', 'Invoice');
    }
    

    function index()
    { 
    	$data = array();
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/invoice')->render();
        $this->twiggy->set('content_page', $content);

        $this->twiggy->set('FORM_NAME', 'form_invoice');
        $this->twiggy->set('FORM_VIEW_IDKEY', 'data-view-id');
        $this->twiggy->set('FORM_PRINT_IDKEY', 'data-print-id');        
        $this->twiggy->set('FORM_IDKEY', 'full.invoice_id');
        $this->twiggy->set('FORM_LINK', site_url('ticketing/invoice/delete'));
        
        $button_view = $this->twiggy->template('button/btn_view')->render();         
        $button_view .= $this->twiggy->template('button/btn_print')->render();
        $this->twiggy->set('BUTTON_VIEW', $button_view);

        $script_page = $this->twiggy->template('script/invoice')->render();
        $this->twiggy->set('SCRIPTS', $script_page);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);   

    }

    function form($id='')
    {
        if (!empty($id)){
        $data = $this->invoice_mdl->getdataid($id);
        $this->twiggy->set('edit', $data); 
        };


        $data = array(); 
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_invoice')->render();
        $this->twiggy->set('content_page', $content);        
        $this->twiggy->set('FORM_NAME', 'form_invoice');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', $id);
        $this->twiggy->set('FORM_LINK', site_url('ticketing/invoice/delete'));    
        
        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);
        
        $script_page = $this->twiggy->template('script/script_all')->render();
        $this->twiggy->set('SCRIPTS', $script_page);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {
        $params = (object) $this->input->post();   
        
        $valid = $this->invoice_mdl->save($params);
        //echo $this->db->last_query();
        
        //die();
        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/ticketing/invoice/form");
        else
            redirect("../index.php/ticketing/invoice/index");
    }

    public function delete()
    {       
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->invoice_mdl->delete($id);
        
        if ($valid)
            redirect("../index.php/ticketing/invoice/index");  
    }
 }