<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('form_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Supplier');
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Supplier Hotel');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Hotel');
        $this->twiggy->set('LIST_TITLE', 'Supplier');
    }
    

    function index()
    { 
    	$data = array();
        // create content page invoice
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/supplier')->render();
        
        // end 
        $this->twiggy->set('content_page', $content);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }

    function get_supplier()
    {
        $page = $this->uri->segment(4, 0);
        switch ($page) {
            case 'hotel':                
                $this->twiggy->set('BREADCRUMBS_TITLE', 'Supplier Hotel');
                $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Hotel');
                $this->twiggy->set('LIST_TITLE', 'Supplier');
                $content = $this->twiggy->template('breadcrumbs')->render();
                $content .= $this->twiggy->template('list/supplier')->render();
                break;
            case 'document':
                $this->twiggy->set('BREADCRUMBS_TITLE', 'Supplier Document');
                $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Document');
                $this->twiggy->set('LIST_TITLE', 'Supplier');
                $content = $this->twiggy->template('breadcrumbs')->render();
                $content .= $this->twiggy->template('list/supplier')->render();
                break;
            case 'tour':
                $this->twiggy->set('BREADCRUMBS_TITLE', 'Supplier Tour');
                $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Tour');
                $this->twiggy->set('LIST_TITLE', 'Supplier');
                $content = $this->twiggy->template('breadcrumbs')->render();
                $content .= $this->twiggy->template('list/supplier')->render();
                break;
            case 'other':
                $this->twiggy->set('BREADCRUMBS_TITLE', 'Supplier Other');
                $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Other');
                $this->twiggy->set('LIST_TITLE', 'Supplier');
                $content = $this->twiggy->template('breadcrumbs')->render();
                $content .= $this->twiggy->template('list/supplier')->render();
                break;
            
            default:
                $this->twiggy->set('BREADCRUMBS_TITLE', 'Supplier ');
                $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Default');
                $this->twiggy->set('LIST_TITLE', 'Supplier');
                $content = $this->twiggy->template('breadcrumbs')->render();
                $content .= $this->twiggy->template('list/supplier')->render();
                break;
        }
        $this->twiggy->set('content_page', $content);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);

    }

    function form()
    {
        $data = array();   
        
        $content = $this->twiggy->template('breadcrumbs')->render();     
        $content .= $this->twiggy->template('form/form_supplier')->render();
        // end        
        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);
;
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }
 }