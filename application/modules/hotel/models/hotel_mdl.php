<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hotel_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('hotel_mst_hotels');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'hotel_id',
            'hotel_name',
            'address',
            'hotel_type',
            'star',
            'contact_person',
            'telp',
            'state',
        );

        $this->db->select($fields);
//            $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');
        $query = $this->db->get('hotel_mst_hotels');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                //'nomor' => $nomor,
                'hotel_id' => $row->hotel_id,
                'hotel_name' => $row->hotel_name,
                'hotel_type' => $row->hotel_type,
                'star' => $row->star,
                'contact_person' => $row->contact_person,
                'address' => $row->address,
                'telp' => $row->telp,
                'state' => $row->state,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'hotel_id',
            'hotel_name',
            'address',
        );

        $this->db->select($fields);
//        $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');

        $this->db->where('id_vendor', $id);
        $query = $this->db->get('hotel_mst_hotels');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'hotel_id' => $row->hotel_id,
                'hotel_name' => $row->hotel_name,
//                'class_type_id' => $row->class_type_id,
                'address' => $row->address,
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
