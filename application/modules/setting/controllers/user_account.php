<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_account extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('user_account_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('User Account');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'User Account');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Setting');
        $this->twiggy->set('LIST_TITLE', 'User Account');
    }
    

    function index()
    { 
    	$data = array();
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/user_account')->render();
        
        $this->twiggy->set('FORM_NAME', 'form_user_account');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', 'full.user_id');
        $this->twiggy->set('FORM_LINK', site_url('setting/user_account/form'));
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $this->twiggy->set('content_page', $content);

        $script_page = $this->twiggy->template('script/user_account')->render();
        //$script_page = $this->twiggy->template('script/script_all')->render();
        $this->twiggy->set('SCRIPTS', $script_page);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }

    function form($id='')
    {
        if (!empty($id)){
        $data = $this->user_account_mdl->getdataid($id);
        $this->twiggy->set('edit', $data); 
        };
        
        $this->twiggy->set('FORM_NAME', 'form_user_account');
        $this->twiggy->set('FORM_SELECT_IDKEY', 'data-select-id');        
        $this->twiggy->set('FORM_IDKEY', 'full.user_group_id');
        $this->twiggy->set('FORM_LINK', site_url('setting/user_account/form'));

        $window_page = $this->twiggy->template('window/window_group')->render();        
        $this->twiggy->set('window_page', $window_page);   
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_user_account')->render();
        $this->twiggy->set('content_page', $content);
        
        $button_select = $this->twiggy->template('button/btn_select')->render();
        $this->twiggy->set('BUTTON_CHOOSE', $button_select);

        $script_page = $this->twiggy->template('script/group_name')->render();
        $script_page .= $this->twiggy->template('script/user_account')->render();
        $this->twiggy->set('SCRIPTS', $script_page);
        
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {
        $params = (object) $this->input->post();   
        
        $valid = $this->user_account_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/setting/user_account/form");
        else
            redirect("../index.php/setting/user_account/index");
    }

    function delete($id=''){
        if (!empty($id)){
        $data = $this->user_account_mdl->delete($id);
            if (!empty($data)) {
            redirect("../index.php/setting/user_account/index"); 
            }
            else {}
        };
    }
 }