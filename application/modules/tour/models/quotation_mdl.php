<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class quotation_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('tour_mst_quotation');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'code_tour',
            'type',
            'valid_from',
            'valid_to',
            'season',
            'description',
        );

        $this->db->select($fields);
        $query = $this->db->get('tour_mst_quotation');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'nomor' => $nomor,
                'code_tour' => $row->code_tour,
                'type' => $row->type,
                'valid_from' => $row->valid_from,
                'valid_to' => $row->valid_to,
                'season' => $row->season,
                'description' => $row->description,
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
