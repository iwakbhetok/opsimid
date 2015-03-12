<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_data extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function customer()
    {
        $this->db->order_by('full_name asc');
        $query = $this->db->get('mst_customer');
        foreach($query->result() as $row):
            $data[] = $row->full_name; 
        endforeach;
        
        echo json_encode($data);
    }

    function getclass_combobox()
    {
        $this->load->model('class_mdl');
        $data = $this->class_mdl->getclass_combobox();
        echo json_encode($data);
    }

    function gethotel_name_combobox()
    {
        $this->load->model('hotel_mdl');
        $data = $this->hotel_mdl->gethotel_name_combobox();
        echo json_encode($data);
    }

    function getroom_type_combobox()
    {
        $this->load->model('room_mdl');
        $data = $this->room_mdl->getroom_type_combobox();
        echo json_encode($data);
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

    function getrecord_hotel() {
        $this->load->model('hotel_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->hotel_mdl->getdatalist();
        $data['iTotalRecords'] = $this->hotel_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->hotel_mdl->getrecordcount();
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
        $this->load->model('hotel_rate_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->hotel_rate_mdl->getdatalist();
        $data['iTotalRecords'] = $this->hotel_rate_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->hotel_rate_mdl->getrecordcount();
        echo json_encode($data);
    }

}
