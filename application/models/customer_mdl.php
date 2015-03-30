<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
        $this->db->where('state', '1');
        $this->db->from('mst_customer');
        $data = $this->db->count_all_results();
        return $data;
    }

    function getrecord_with_typehead($params)
    {
        $this->db->where('full_name LIKE', '%'.$params.'%');
        $query = $this->db->get('mst_customer');
        //$data = array();
        foreach ($query->result() as $row):
            $data[] = '00'.$row->customer_id.' '.$row->full_name;
        endforeach;
        return $data;
    }
        
    function getdatalist()
    {
        $this->db->where('state', '1');
        $this->db->order_by('full_name asc');
        $query = $this->db->get('mst_customer');
        $nomor = 1;
        $data = array();
        foreach($query->result() as $row):
            $data[] = array(
                'customer_id'  => $row->customer_id,
                'nomor'         => $nomor,
                'customer_name'    => $row->title.' '.$row->full_name,
                'address'  => 'Address 1: '.$row->address_1.'<br> Address 2: '.$row->address_2,
                'email'  => $row->email,
                'contact_person'  => $row->full_name,
                'pricing_policy'  => $row->pricing_policy,
                'description'  => $row->description,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function get_id_by_customer_name($name)
    {
        $query = $this->db->query("SELECT customer_id FROM mst_customer WHERE CONCAT (title, ' ', full_name) = '" .$name."'");
        $data = 0;
        if ($query->num_rows() > 0)
            {
               $row = $query->row();
               $data = (int)$row->customer_id;
            }
        return $data;
    }

    function getrecord_customer_by_id($params)
    {
        $this->db->where('customer_id', $params);
        $query = $this->db->get('mst_customer');
        foreach ($query->result() as $row):
            $data[] = $row->full_name;
        endforeach;
        return $data;
    }

    function getdata_by_id_customer($id) {
        $data = array();
        $this->db->select('*');
        $this->db->where('customer_id', $id);
        $query = $this->db->get('mst_customer');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'customer_id' => $row->customer_id,
                'identity_number' => $row->identity_number,
                'title' => $row->title,
                'full_name' => $row->full_name,
                'address_1' => $row->address_1,
                'address_2' => $row->address_2,
                'email' => $row->email,
                'telp1' => $row->telp1,
                'telp2' => $row->telp2,
                'citizen' => $row->citizen,
                'date_of_birth' => tgl_str($row->date_of_birth),
                'place_of_birth' => $row->place_of_birth,
                'description' => $row->description,
                'type' => $row->type,
                'pricing_policy' => $row->pricing_policy
            );
        }
        return $data;
    }

    function save($params) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
            $fields = array(
                'identity_number'         => $params->identity_number,
                'title'       => $params->title,
                'full_name'       => $params->full_name,
                'date_of_birth'       => $params->date_of_birth,
                'place_of_birth'       => $params->place_of_birth,
                'citizen'       => $params->citizen,
                'type'       => $params->type,
                'address_1'       => $params->address_1,
                'address_2'       => $params->address_2,
                'telp1'       => $params->telp1,
                'telp2'       => $params->telp2,
                'email'       => $params->email,
                'pricing_policy'       => $params->pricing_policy,
                'description'       => $params->description,
                'state'          => '1',
                'add_date'          => date('Y-m-d H:i:s'),
                'add_user'          => $log['user_id'],
            );
        
        if (!empty($params->customer_id)) {
            $fields_update = array(
                'identity_number'         => $params->identity_number,
                'title'       => $params->title,
                'full_name'       => $params->full_name,
                'date_of_birth'       => tgl_sql($params->date_of_birth),
                'place_of_birth'       => $params->place_of_birth,
                'citizen'       => $params->citizen,
                'type'       => $params->type,
                'address_1'       => $params->address_1,
                'address_2'       => $params->address_2,
                'telp1'       => $params->telp1,
                'telp2'       => $params->telp2,
                'email'       => $params->email,
                'pricing_policy'       => $params->pricing_policy,
                'description'       => $params->description,
                'modified_date'     => date('Y-m-d H:i:s'),
                'modified_user'     => $log['user_id'],
                );

            
            $this->db->where("customer_id", $params->customer_id);
            $valid = $this->db->update("mst_customer", $fields_update);
                        
            $valid = $this->logUpdate->addLog("update", "mst_customer", $params);
        }
        else {
            $valid = $this->db->insert('mst_customer', $fields);
            $valid = $this->logUpdate->addLog("insert", "mst_customer", $params);
                        
        }
        return true;
    }

    function delete($id) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        if (!empty($id)) {
                $fields_update = array(
                    'state'         => '0',
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            
            $this->db->where("customer_id", $id);
            $valid = $this->db->update("mst_customer", $fields_update);
                        
            $valid = $this->logUpdate->addLog("delete", "mst_customer", array('customer_id'=> $id));
        }
        return true;
    }

}