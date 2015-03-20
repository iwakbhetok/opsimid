<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class supplier_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('mst_supplier');
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'supplier_id',
            'supplier_name',
            'address1',
        );

        $this->db->select($fields);
//            $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');
        $query = $this->db->get('mst_supplier');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'nomor' => $nomor,
                'supplier_id' => $row->supplier_id,
                'supplier_name' => $row->supplier_name,
                'address1' => $row->address1,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'supplier_id',
            'supplier_code',
            'supplier_name',
            'address1',
            'address2',
            'country_id',
            'state_id',
            'city_id',
            'zip_code',
            'phone_number',
            'fax',
            'email',
            'contact_person',
            'description',
        );

        $this->db->select($fields);
//        $this->db->join('coa_class_type', 'coa_class_type.class_type_id=coa_class.class_type_id', 'left');

        $this->db->where('supplier_id', $id);
        $query = $this->db->get('mst_supplier');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'supplier_id' => $row->supplier_id,
                'supplier_code' => $row->supplier_code,
                'supplier_name' => $row->supplier_name,
                'address1' => $row->address1,
                'address2' => $row->address2,
                'country_id' => $row->country_id,
                'state_id' => $row->state_id,
                'city_id' => $row->city_id,
                'zip_code' => $row->zip_code,
                'phone_number' => $row->phone_number,
                'fax' => $row->fax,
                'email' => $row->email,
                'contact_person' => $row->contact_person,
                'description' => $row->description,
            );
        }
        return $data;
    }

    function save($params) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;

//        print_r($params);
        $fields = array(
            'supplier_id' => $params->supplier_id,
            'supplier_code' => $params->supplier_code,
            'supplier_name' => $params->supplier_name,
            'address1' => $params->address1,
            'address2' => $params->address2,
            'country_id' => $params->country_id,
            'state_id' => $params->state_id,
            'city_id' => $params->city_id,
            'zip_code' => $params->zip_code,
            'phone_number' => $params->phone_number,
            'fax' => $params->fax,
            'email' => $params->email,
            'contact_person' => $params->contact_person,
            'description' => $params->description,
            'add_date' => date('Y-m-d H:i:s'),
            'add_user' => $log['user_id'],
        );

        if (!empty($params->supplier_id)) {
            $this->db->where("supplier_id", $params->supplier_id);
            $fields_update = array(
                'supplier_name' => $params->supplier_name,
                'address1' => $params->address1,
                'address2' => $params->address2,
                'country_id' => $params->country_id,
                'state_id' => $params->state_id,
                'city_id' => $params->city_id,
                'zip_code' => $params->zip_code,
                'phone_number' => $params->phone_number,
                'fax' => $params->fax,
                'email' => $params->email,
                'contact_person' => $params->contact_person,
                'description' => $params->description,
                'modified_date' => date('Y-m-d H:i:s'),
                'modified_user' => $log['user_id'],
            );
            $valid = $this->db->update("mst_supplier", $fields_update);
            $valid = $this->logUpdate->addLog("update", "mst_supplier", $params);
        } else {
            $valid = $this->db->insert('mst_supplier', $fields);
            $valid = $this->logUpdate->addLog("insert", "mst_supplier", $params);
        }
        return true;
    }

    function delete($id) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        $valid = $this->logUpdate->addLog("delete", "mst_supplier", array("supplier_id" => $id));

        if ($valid) {
            $this->db->where('supplier_id', $id);
            $valid = $this->db->delete('mst_supplier');
        }

        return $valid;
    }
    
    function getMaxValue() {
        $query = $this->db->query("SELECT max(supplier_id) as max FROM `mst_supplier` ");
        $result = $query->result();

        foreach ($result as $row):
                $data = $row->max;
        endforeach;

        return $data;
    }

}
