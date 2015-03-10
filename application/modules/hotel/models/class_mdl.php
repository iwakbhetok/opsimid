<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class class_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('hotel_mst_class');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            //'class_id',
            'class_name',
            'description',
        );

        $this->db->select($fields);
        $query = $this->db->get('hotel_mst_class');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                //'class_id' => $row->class_id,
                'class_name' => $row->class_name,
                'description' => $row->description,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            //'class_id',
            'class_name',
            'description',
        );

        $this->db->select($fields);

        $this->db->where('class_id', $id);
        $query = $this->db->get('hotel_mst_class');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                //'class_id' => $row->class_id,
                'class_name' => $row->class_name,
                'description' => $row->description,
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
