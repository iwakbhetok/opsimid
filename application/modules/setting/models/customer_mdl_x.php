<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class customer_x_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('mst_customer');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'customer_id',
            'identity_number',
            'title',
            'full_name',
            'address_1',
            'email',
            'type',
        );

        $this->db->select($fields);
        $query = $this->db->get('mst_customer');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'customer_id' => $row->customer_id,
                'identity_number' => $row->identity_number,
                'full_name' => $row->title.' '.$row->full_name,
                'address_1' => $row->address_1,
                'email' => $row->email,
                'type' => $row->type,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'identity_number',
            //'title',
            'full_name',
            'address_1',
            'email',
            'type'
        );

        $this->db->select($fields);
        $this->db->where('customer_id', $id);
        $query = $this->db->get('mst_customer');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'identity_number' => $identity_number,
                'full_name' => $row->full_name,
                'address_1' => $row->address_1,
                'email' => $row->email,
                'type' => $row->type,
            );
        }
        return $data;
    }

    function save($params) {
        return true;
    }

    function update($params, $id) {
        return true;
    }

    function delete($id) {
        return true;
    }

}
