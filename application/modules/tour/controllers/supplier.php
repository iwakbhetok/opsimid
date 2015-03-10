<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class supplier extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('modelNumbertrans');

        $this->load->library('menu');
        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);

        $this->twiggy->title('OPSIMID')->prepend('Supplier');
        ;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');

        // create content page fo dp supplier
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Supplier');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Tour');
        $this->twiggy->set('LIST_TITLE', 'Supplier');
    }

    function index() {
        $data = array();

        // create content page fo dp supplier
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/supplier')->render();
//        
//        // end        
        $this->twiggy->set('content_page', $content);
//        
        $this->twiggy->set('FORM_NAME', 'form_supplier');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');
        $this->twiggy->set('FORM_IDKEY', 'full.class_id');
        $this->twiggy->set('FORM_LINK', site_url('settings/coa_class/delete'));

        $button_crud = $this->twiggy->template('button/btn_edit')->render();
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $window_page = $this->twiggy->template('window/window_currency')->render();
        $window_page .= $this->twiggy->template('window/window_dept')->render();
        $window_page .= $this->twiggy->template('window/window_vendor')->render();
        $window_page .= $this->twiggy->template('window/window_lg')->render();

        // end        
        $this->twiggy->set('window_page', $window_page);

        $script_page = $this->twiggy->template('script/supplier')->render();
        //$script_page .= $this->twiggy->template('script/script_all')->render();         

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function form($id = '') {
        $data = array();

        if (!empty($id)) {
            $this->load->model('supplier_mdl');
            $data = $this->supplier_mdl->getdataid($id);
            $this->twiggy->set('edit', $data);
        };

        
        // create content page fo dp supplier
        $kodeVendor = $this->modelNumbertrans->getVendorTur();
//        $dataSend = array(
//            "kode_vendor" => $kodeVendor,
//        );
        $data = array(
            'kode_vendor' => $kodeVendor,
        );
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_supplier')->render();

//         $data = $this->coa_class_mdl->getdataid($id);
//            $this->twiggy->set('edit', $data); 
        // end        
        $this->twiggy->set('content_page', $content);
//        echo$kodeVendor;
        $this->twiggy->set('kode_vendor', $kodeVendor);

        $window_page = $this->twiggy->template('window/window_currency')->render();
        $window_page .= $this->twiggy->template('window/window_dept')->render();
        $window_page .= $this->twiggy->template('window/window_vendor')->render();
        $window_page .= $this->twiggy->template('window/window_lg')->render();

        // end        
        $this->twiggy->set('window_page', $window_page);

        $script_page = $this->twiggy->template('script/form_coa_class')->render();
        //$script_page .= $this->twiggy->template('script/script_all')->render();         

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

}
