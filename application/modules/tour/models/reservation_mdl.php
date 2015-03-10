<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reservation_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('tour_mst_booking');
        return $data;
    }

    function getdatalist() {
        $data = array();

        $query = $this->db->query("SELECT a.book_code, c.full_name, b.code_tour
            FROM tour_mst_booking a
            JOIN tour_mst_quotation b ON b.quotation_id=a.quotation_id
            JOIN mst_customer c ON c.customer_id=a.customer_id
            ORDER BY c.full_name ASC");
        $result = $query->result();
        
        $nomor = 1; 
        foreach ($result as $row):
            $data[] = array(
                'nomor' => $nomor,
                'book_code' => $row->book_code,
                'full_name' => $row->full_name,
                'code_tour' => $row->code_tour,
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
            'alamat',
        );

        $this->db->select($fields);

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
