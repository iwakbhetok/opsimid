<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_master_data extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function get_currency()
    {
        $this->load->model('currency_all_mdl');
        $data = array(
            'aaData'                => array(),
            'sEcho'                 => 0,
            'iTotalRecords'         => '',
            'iTotalDisplayRecords'  => '',
        );        
        //find total record 
        $data['aaData']                 = $this->currency_all_mdl->getdatalist();
        $data['iTotalRecords']          = $this->currency_all_mdl->getrecordcount();
        $data['iTotalDisplayRecords']   = $this->currency_all_mdl->getrecordcount();
        echo json_encode($data);
    }

    function get_customer()
    {
        $this->load->model('customer_mdl');
        $data = array(
            'aaData'                => array(),
            'sEcho'                 => 0,
            'iTotalRecords'         => '',
            'iTotalDisplayRecords'  => '',
        );        
        //find total record 
        $data['aaData']                 = $this->customer_mdl->getdatalist();
        $data['iTotalRecords']          = $this->customer_mdl->getrecordcount();
        $data['iTotalDisplayRecords']   = $this->customer_mdl->getrecordcount();
        echo json_encode($data);
    }
    
    function getsupplier_ticketing()
    {
        $this->load->model('supplier_mdl');
        $data = $this->supplier_mdl->getsupplier_ticketing_combobox();
        echo json_encode($data);
    }

    function getsupplier_hotel()
    {
        $this->load->model('supplier_mdl');
        $data = $this->supplier_mdl->getsupplier_hotel_combobox();
        echo json_encode($data);
    }

    function get_currency_combobox()
    {
        $this->load->model('country_mdl');
        $data = $this->country_mdl->getdatacurrency_combobox();
        echo json_encode($data);
    }
    
    function get_country()
    {
        $this->load->model('country_mdl');
        $data = $this->country_mdl->getdatalist();
        echo json_encode($data);
    }

    function get_state()
    {
        $this->load->model('state_mdl');
        $country_id = $this->uri->segment(3, 0);
        $data = $this->state_mdl->getdatalist($country_id);
        echo json_encode($data);
    }

    function get_city()
    {
        $this->load->model('city_mdl');
        $state_id = $this->uri->segment(3, 0);
        $data = $this->city_mdl->getdatalist($state_id);
        echo json_encode($data);
    }

    function getrecord_group_typehead() {
        $this->load->model('user_mdl');
        $params = $this->input->post('query');
        $data = $this->user_mdl->getrecord_group_typehead($params);
        echo json_encode($data);
    }

    function get_group()
    {
        $this->load->model('user_mdl');
        $data = array(
            'aaData'                => array(),
            'sEcho'                 => 0,
            'iTotalRecords'         => '',
            'iTotalDisplayRecords'  => '',
        );        
        //find total record 
        $data['aaData']                 = $this->user_mdl->getdatalist_group();
        $data['iTotalRecords']          = $this->user_mdl->getrecordcount_group();
        $data['iTotalDisplayRecords']   = $this->user_mdl->getrecordcount_group();
        echo json_encode($data);
    }

    function getrecord_customer_typehead() {
        $this->load->model('customer_mdl');
        $params = $this->input->post('query');
        $data = $this->customer_mdl->getrecord_with_typehead($params);
        echo json_encode($data);
    }

    function get_group_by_id(){
        $this->load->model('user_mdl');
        $group_id = $this->uri->segment(3, 0);
        $data = $this->user_mdl->getrecord_group_by_id($group_id);
        echo json_encode($data);
    }

    function get_customer_by_id(){
        $this->load->model('customer_mdl');
        $customer_id = $this->uri->segment(3, 0);
        $data = $this->customer_mdl->getrecord_customer_by_id($customer_id);
        echo json_encode($data);
    }

    function get_supplier_by_id(){
        $this->load->model('supplier_mdl');
        $supplier_id = $this->uri->segment(3, 0);
        $data = $this->supplier_mdl->getrecord_supplier_by_id($supplier_id);
        echo json_encode($data);
    }

    function getrecord_supplier_typehead() {
        $this->load->model('supplier_mdl');
        $this->load->model('module_mdl');
        $params = $this->input->post('query');
        $module = $this->uri->segment(3, 0);
        $supplier_module_id = $this->module_mdl->get_module_id($module);
        $data = $this->supplier_mdl->getrecord_supplier_typehead($params, $supplier_module_id);
        echo json_encode($data);
    }

    function get_supplier()
    {
        $this->load->model('supplier_mdl');
        $data = array(
            'aaData'                => array(),
            'sEcho'                 => 0,
            'iTotalRecords'         => '',
            'iTotalDisplayRecords'  => '',
        );        
        //find total record 
        $data['aaData']                 = $this->supplier_mdl->getdatalist_for_ticketing();
        $data['iTotalRecords']          = $this->supplier_mdl->getrecordcount_for_ticketing();
        $data['iTotalDisplayRecords']   = $this->supplier_mdl->getrecordcount_for_ticketing();
        echo json_encode($data);
    }


}    
    
    