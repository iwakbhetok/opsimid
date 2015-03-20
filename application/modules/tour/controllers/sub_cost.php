<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sub_cost extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('sub_cost_mdl');
        $this->load->library('menu');
        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);

        $this->twiggy->title('OPSIMID')->prepend('Sub Cost');
        ;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');

        // create content page fo dp supplier
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Sub Cost');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Tour');
        $this->twiggy->set('LIST_TITLE', 'Sub Cost');
    }

    function index() {
        $data = array();

        // create content page fo dp supplier
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/sub_cost')->render();
//        
//        // end        
        $this->twiggy->set('content_page', $content);
//        
        $this->twiggy->set('FORM_NAME', 'form_sub_cost');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');
        $this->twiggy->set('FORM_IDKEY', 'full.sub_cost_id');
        $this->twiggy->set('FORM_LINK', site_url('tour/sub_cost/delete'));

        $button_crud = $this->twiggy->template('button/btn_edit')->render();
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $window_page = $this->twiggy->template('window/window_currency')->render();
        $window_page .= $this->twiggy->template('window/window_dept')->render();
        $window_page .= $this->twiggy->template('window/window_vendor')->render();
        $window_page .= $this->twiggy->template('window/window_lg')->render();

        // end        
        $this->twiggy->set('window_page', $window_page);

        $script_page = $this->twiggy->template('script/sub_cost')->render();
        //$script_page .= $this->twiggy->template('script/script_all')->render();         

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function form($id = '') {
        $data = array();

        if (!empty($id)) {
            $this->load->model('sub_cost_mdl');
            $data = $this->sub_cost_mdl->getdataid($id);
            print_r($data);
            $this->twiggy->set('edit', $data);
        };


        // create content page fo dp supplier
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_sub_cost')->render();

        // end        
        $this->twiggy->set('content_page', $content);


        $script_page = $this->twiggy->template('script/sub_cost')->render();
        //$script_page .= $this->twiggy->template('script/script_all')->render();         

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save() {
        $params = (object) $this->input->post();

        $valid = $this->sub_cost_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/tour/sub_cost/form");
        else
            redirect("../index.php/tour/sub_cost/index");
    }

    public function delete() {
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->sub_cost_mdl->delete($id);

        if ($valid)
            redirect("../index.php/tour/sub_cost/index");
    }

}
