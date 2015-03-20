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

    function get_id_by_customer_name()
    {
        $this->load->model('customer_mdl');
        $customer_name = $this->input->post('customer_name');
        $customer_id = $this->customer_mdl->get_id_by_customer_name($customer_name);
        echo json_encode($customer_id);
    }

    function getlist_by_customer_id()
    {
        $this->load->model('ticket_stock_mdl');
        $customer_id = $this->uri->segment(4,0);
        $date_from = $this->uri->segment(5,0);
        $date_to = $this->uri->segment(6,0);
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->ticket_stock_mdl->getdatalist_invoice_customer($customer_id, $date_from, $date_to);
        //$data['iTotalRecords'] = $this->ticket_stock_mdl->getrecordcount();
        //$data['iTotalDisplayRecords'] = $this->ticket_stock_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_invoice_by_customer_id($id) {
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
