<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class supplier extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('supplier_mdl');

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
        $this->twiggy->set('FORM_IDKEY', 'full.supplier_id');
        $this->twiggy->set('FORM_LINK', site_url('tour/supplier/delete'));

        $button_crud = $this->twiggy->template('button/btn_edit')->render();
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

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
//            print_r($data);
            $this->twiggy->set('edit', $data);
        } else {
            // create content page fo dp supplier
            $max_id = $this->supplier_mdl->getMaxValue();
            $datas = $this->modelNumbertrans->getVendorTur($max_id);
            
            $dataSend = array(
                "supplier_code" => $datas,
            );

            $this->twiggy->set('edit', $dataSend);
        }

        $state = $this->db->from("mst_state")->order_by("state_name", "asc")->get()->result();
        $country = $this->db->from("mst_country")->order_by("country_name", "asc")->get()->result();
        $city = $this->db->from("mst_city")->order_by("city_name", "asc")->get()->result();

        $dropData = array(
            "city" => $city,
            "country" => $country,
            "state" => $state,
        );
        $this->twiggy->set('country', $dropData);

        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_supplier')->render();

        $this->twiggy->set('content_page', $content);

        $script_page = $this->twiggy->template('script/form_coa_class')->render();

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save() {
        $params = (object) $this->input->post();
//print_r($params);
        $valid = $this->supplier_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/tour/supplier/form");
        else
            redirect("../index.php/tour/supplier/index");
    }

    public function delete() {
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->supplier_mdl->delete($id);

        if ($valid)
            redirect("../index.php/tour/supplier/index");
    }

}
