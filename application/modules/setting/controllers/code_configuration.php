<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class code_configuration extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('code_configuration_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Code Configuration');;
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Code Configuration');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Setting');
        $this->twiggy->set('LIST_TITLE', 'Code Configuration');
    }
    

    function index()
    { 
    	$data = array();
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/code_configuration')->render();
        $this->twiggy->set('content_page', $content);
        
        $this->twiggy->set('FORM_NAME', 'form_code_configuration');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_IDKEY', 'full.code_id');
        $this->twiggy->set('FORM_LINK', site_url('setting/code_configuration/form'));
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $script_page = $this->twiggy->template('script/code_configuration')->render();
        $this->twiggy->set('SCRIPTS', $script_page);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }

    function form($id='')
    {
        if (!empty($id)){
        $data = $this->code_configuration_mdl->getdataid($id);
        $this->twiggy->set('edit', $data); 
        };       
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_code_configuration')->render();
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
        
        $valid = $this->code_configuration_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/setting/code_configuration/form");
        else
            redirect("../index.php/setting/code_configuration/index");
    }
 }