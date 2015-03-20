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
            'quotation_id',
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
                'quotation_id' => $row->quotation_id,
                'tour_code' => $row->code_tour,
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
            'quotation_id',
            'airlines_id',
            'code_tour',
            'valid_from',
            'valid_to',
            'season',
            'description',
            'type',
            'pax',
            'region',
            'currency',
        );

        $this->db->select($fields);

        $this->db->where('quotation_id', $id);
        $query = $this->db->get('tour_mst_quotation');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'quotation_id' => $row->quotation_id,
                'airlines_id' => $row->airlines_id,
                'tour_code' => $row->code_tour,
                'valid_from' => $row->valid_from,
                'valid_to' => $row->valid_to,
                'season' => $row->season,
                'description' => $row->description,
                'type' => $row->type,
                'pax' => $row->pax,
                'region' => $row->region,
                'currency' => $row->currency,
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
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        $valid = $this->logUpdate->addLog("delete", "tour_mst_quotation", array("quotation_id" => $id));

        if ($valid) {
            $this->db->where('quotation_id', $id);
            $valid = $this->db->delete('tour_mst_quotation');
        }

        return $valid;
    }

}
