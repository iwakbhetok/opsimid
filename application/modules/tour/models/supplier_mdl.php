<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class supplier_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('mst_vendortur');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'id_vendor',
            'nama_vendor',
            'alamat',
        );

        $this->db->select($fields);
//            $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');
        $query = $this->db->get('mst_vendortur');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'nomor' => $nomor,
                'id_vendor' => $row->id_vendor,
                'nama_vendor' => $row->nama_vendor,
                'alamat' => $row->alamat,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'id_vendor',
            'nama_vendor',
//            'coa_class.class_type_id',
            'alamat',
        );

        $this->db->select($fields);
//        $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');

        $this->db->where('id_vendor', $id);
        $query = $this->db->get('mst_vendortur');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'id_vendor' => $row->id_vendor,
                'nama_vendor' => $row->nama_vendor,
//                'class_type_id' => $row->class_type_id,
                'alamat' => $row->alamat,
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