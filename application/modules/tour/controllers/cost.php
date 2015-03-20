<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cost extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('main_cost_mdl');

        $this->load->library('menu');
        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);

        $this->twiggy->title('OPSIMID')->prepend('Main Cost');
        ;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');

        // create content page fo dp supplier
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Main Cost');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Tour');
        $this->twiggy->set('LIST_TITLE', 'Main Cost');
    }

    function index() {
        $data = array();

        // create content page fo dp supplier
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/main_cost')->render();
    
        $this->twiggy->set('content_page', $content);
        
        $this->twiggy->set('FORM_NAME', 'form_main_cost');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');
        $this->twiggy->set('FORM_IDKEY', 'full.cost_id');
        $this->twiggy->set('FORM_LINK', site_url('settings/cost/delete'));

        $button_crud = $this->twiggy->template('button/btn_edit')->render();
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $script_page = $this->twiggy->template('script/main_cost')->render();    

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function form($id = '') {


        if (!empty($id)) {
            $this->load->model('main_cost_mdl');
            $data = $this->main_cost_mdl->getdataid($id);
            $this->twiggy->set('edit', $data);
        };
        
        $data = array(); 
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_main_cost')->render();
        $this->twiggy->set('content_page', $content);        
        $this->twiggy->set('FORM_NAME', 'form_class');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', $id);
        $this->twiggy->set('FORM_LINK', site_url('tour/main_cost/delete'));    
        
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
        
        $valid = $this->main_cost_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/tour/cost/form");
        else
            redirect("../index.php/tour/cost/index");
    }
    
    public function delete()
    {       
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->main_cost_mdl->delete($id);
        
        if ($valid)
            redirect("../index.php/tour/cost/index");  
    }

}
