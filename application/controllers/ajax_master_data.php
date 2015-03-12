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

}    
    
    