<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class quotation extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('quotation_mdl');

        $this->load->library('menu');
        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);

        $this->twiggy->title('OPSIMID')->prepend('Quotation');
        ;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');

        // create content page fo dp supplier
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Quotation');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Tour');
        $this->twiggy->set('LIST_TITLE', 'Quotation');
    }

    function index() {
        $data = array();

        // create content page fo dp supplier
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/quotation')->render();
//        
//        // end        
        $this->twiggy->set('content_page', $content);
//        
        $this->twiggy->set('FORM_NAME', 'form_quotation');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');
        $this->twiggy->set('FORM_IDKEY', 'full.quotation_id');
        $this->twiggy->set('FORM_LINK', site_url('settings/coa_class/delete'));

        $button_crud = $this->twiggy->template('button/btn_edit')->render();
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $script_page = $this->twiggy->template('script/quotation')->render();
        //$script_page .= $this->twiggy->template('script/script_all')->render();         

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function form($id = '') {
        $data = array();

        if (!empty($id)) {
            $this->load->model('quotation_mdl');
            $data = $this->quotation_mdl->getdataid($id);
            $this->twiggy->set('edit', $data);
        };

        $airlines = $this->db->from("mst_airlines")->order_by("airlines_name", "asc")->get()->result();
        $currency = $this->db->query("select distinct currency from mst_country where currency <>'' order by currency asc")->result();
        $cost = $this->db->from("tour_mst_cost")->order_by("cost_name", "asc")->get()->result();
        $subcost = $this->db->from("tour_mst_sub_cost")->order_by("sub_cost_name", "asc")->get()->result();
        $supplier = $this->db->from("mst_supplier")->order_by("supplier_name", "asc")->get()->result();
        $dropData = array(
            "airlines" => $airlines,
            "currency" => $currency,
            "cost" => $cost,
            "sub_cost" => $subcost,
            "supplier" => $supplier,
        );
        $this->twiggy->set('airlines', $dropData);



        // create content page fo dp supplier
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_quotation')->render();

        // end        
        $this->twiggy->set('content_page', $content);


        $script_page = $this->twiggy->template('script/form_coa_class')->render();
        //$script_page .= $this->twiggy->template('script/script_all')->render();         

        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    public function delete() {
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->quotation_mdl->delete($id);

        if ($valid)
            redirect("../index.php/tour/quotation/index");
    }

}
