<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_data extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function getrecord_supplier() {
        $this->load->model('supplier_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->supplier_mdl->getdatalist();
        $data['iTotalRecords'] = $this->supplier_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->supplier_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_main_cost() {
        $this->load->model('main_cost_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->main_cost_mdl->getdatalist();
        $data['iTotalRecords'] = $this->main_cost_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->main_cost_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_sub_cost() {
        $this->load->model('sub_cost_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->sub_cost_mdl->getdatalist();
        $data['iTotalRecords'] = $this->sub_cost_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->sub_cost_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_quotation() {
        $this->load->model('quotation_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->quotation_mdl->getdatalist();
        $data['iTotalRecords'] = $this->quotation_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->quotation_mdl->getrecordcount();
        echo json_encode($data);
    }
    
    function getrecord_reservation() {
        $this->load->model('reservation_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->reservation_mdl->getdatalist();
        $data['iTotalRecords'] = $this->reservation_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->reservation_mdl->getrecordcount();
        echo json_encode($data);
    }
    
    function getrecord_invoice() {
        $this->load->model('invoice_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->invoice_mdl->getdatalist();
        $data['iTotalRecords'] = $this->invoice_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->invoice_mdl->getrecordcount();
        echo json_encode($data);
    }

}
