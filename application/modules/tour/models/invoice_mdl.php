<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class invoice_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('trans_turinvoice');
        return $data;
    }

    function getdatalist() {
        $data = array();
//        $fields = array(
//            'book_code',
//            'nama_lengkap',
//            'kode_tur',
//        );

        $query = $this->db->query("SELECT  a.invoice_number,a.invoice_date,b.book_code, c.kode_tur, d.nama_lengkap
        FROM trans_turinvoice a
        JOIN mst_booking_tur b ON a.id_booking=b.id_booking
        JOIN mst_quotation c ON b.id_quotation=c.id_quotation
        JOIN mst_customer d ON b.id_customer=d.id_customer
        ");
//            $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');
//        $query->result();
//        $query = $this->db->get('mst_quotation');
        $result = $query->result();

        $nomor = 1;
        foreach ($result as $row):
            $data[] = array(
                'nomor' => $nomor,
                'invoice_number' => $row->invoice_number,
                'invoice_date' => $row->invoice_date,
                'kode_tur' => $row->kode_tur,
                'book_code' => $row->book_code,
                'nama_lengkap' => $row->nama_lengkap,
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
