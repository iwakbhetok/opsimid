<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_data extends CI_Controller {

    function __construct() {
        parent::__construct();
    }


    function getrecord_supplier_hotel() {
        $this->load->model('supplier_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->supplier_mdl->getdatalist_for_hotel();
        $data['iTotalRecords'] = $this->supplier_mdl->getrecordcount_for_hotel();
        $data['iTotalDisplayRecords'] = $this->supplier_mdl->getrecordcount_for_hotel();
        echo json_encode($data);
    }

    function getmax_supplier_hotel_code()
    {
        $this->load->model('supplier_mdl');
        $data = $this->supplier_mdl->getmax_supplier_hotel_code();
        echo json_encode($data);
    }

    function getmax_supplier_ticketing_code()
    {
        $this->load->model('supplier_mdl');
        $data = $this->supplier_mdl->getmax_supplier_ticketing_code();
        echo json_encode($data);
    }

    function getrecord_supplier_ticketing() {
        $this->load->model('supplier_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->supplier_mdl->getdatalist_for_ticketing();
        $data['iTotalRecords'] = $this->supplier_mdl->getrecordcount_for_ticketing();
        $data['iTotalDisplayRecords'] = $this->supplier_mdl->getrecordcount_for_ticketing();
        echo json_encode($data);
    }

}
