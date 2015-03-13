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

    function getrecord_airlines() {
        $this->load->model('airlines_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->airlines_mdl->getdatalist();
        $data['iTotalRecords'] = $this->airlines_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->airlines_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_class() {
        $this->load->model('class_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->class_mdl->getdatalist();
        $data['iTotalRecords'] = $this->class_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->class_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_room() {
        $this->load->model('room_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->room_mdl->getdatalist();
        $data['iTotalRecords'] = $this->room_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->room_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_reservation() {
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

    function getrecord_invoice() {
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

    function getrecord_hotel_rate() {
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

}
