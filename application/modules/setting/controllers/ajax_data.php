<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_data extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function getrecord_customer() {
        $this->load->model('customer_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->customer_mdl->getdatalist();
        $data['iTotalRecords'] = $this->customer_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->customer_mdl->getrecordcount();
        echo json_encode($data);
    }

    function getrecord_user_account() {
        $this->load->model('user_account_mdl');
        $data = array(
            'aaData' => array(),
            'sEcho' => 0,
            'iTotalRecords' => '',
            'iTotalDisplayRecords' => '',
        );
        //find total record 
        $data['aaData'] = $this->user_account_mdl->getdatalist();
        $data['iTotalRecords'] = $this->user_account_mdl->getrecordcount();
        $data['iTotalDisplayRecords'] = $this->user_account_mdl->getrecordcount();
        echo json_encode($data);
    }

}
