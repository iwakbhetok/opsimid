<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hotel_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('logUpdate');
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('hotel_mst_hotels');
        return $data;
    }

    function gethotel_name_combobox()
    {
        $this->db->order_by('hotel_name asc');
        $query = $this->db->get('hotel_mst_hotels');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'hotel_id'   => $row->hotel_id,
                'hotel_name' => $row->hotel_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

    function getmax_hotel_code()
    {
        $this->db->select_max('hotel_code');
        $this->db->limit(1);
        $query = $this->db->get('hotel_mst_hotels');
        $data = $query->result();
        return $data;
    }

    function getdatalist() {
        $data = array();
        $fields = array(
            'hmh.hotel_id',
            'hmh.hotel_name',
            'hmh.address',
            'hmh.hotel_type',
            'hmh.star',
            'hmh.telp',
            'hmh.email',
            'mc.country_name',
            'ms.state_name',
            'mci.city_name',
        );

        $this->db->select($fields);
        $this->db->join('mst_country mc', 'mc.country_id=hmh.country_id');
        $this->db->join('mst_state ms', 'ms.state_id=hmh.state_id');
        $this->db->join('mst_city mci', 'mci.city_id=hmh.city_id');
        $this->db->where('hmh.state', '1');
        $query = $this->db->get('hotel_mst_hotels hmh');
        foreach ($query->result() as $row):
            $data[] = array(
                'hotel_id' => $row->hotel_id,
                'hotel_name' => $row->hotel_name,
                'hotel_type' => $row->hotel_type,
                'star' => $row->star,
                'address' => $row->address.'<br>'.$row->city_name.'<br>'.$row->state_name.' - '.$row->country_name,
                'telp' => $row->telp,
                'email' => $row->email,
            );
        endforeach;
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'hmh.hotel_id',
            'hmh.hotel_name',
            'hmh.hotel_code',
            'hmh.address',
            'hmh.hotel_type',
            'hmh.star',
            'hmh.telp',
            'hmh.fax',
            'hmh.email',
            'hmh.contact_person',
            'hmh.country_id',
            'mc.country_name',
            'ms.state_name',
            'mci.city_name',
        );

        $this->db->select($fields);
        $this->db->join('mst_country mc', 'mc.country_id=hmh.country_id');
        $this->db->join('mst_state ms', 'ms.state_id=hmh.state_id');
        $this->db->join('mst_city mci', 'mci.city_id=hmh.city_id');
        $this->db->where('hotel_id', $id);
        $query = $this->db->get('hotel_mst_hotels hmh');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'hotel_id' => $row->hotel_id,
                'hotel_name' => $row->hotel_name,
                'hotel_code' => $row->hotel_code,
                'hotel_type' => $row->hotel_type,
                'star' => $row->star,
                'address' => $row->address,
                'telp' => $row->telp,
                'email' => $row->email,
                'fax' => $row->fax,
                'contact_person' => $row->contact_person,
                'country_id' => $row->country_id,
                'country_code' => $row->country_name,
            );
        }
        return $data;
    }

    function save($params) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        
                $fields = array(
                    'hotel_code'      => $params->hotel_code, 
                    'hotel_name'      => $params->hotel_name,
                    'address'         => $params->address,
                    'country_id'      => $params->country_code,
                    'state_id'        => $params->state,
                    'city_id'         => $params->city,
                    'hotel_type'      => $params->hotel_type,
                    'star'            => $params->star,
                    'telp'            => $params->telp,
                    'fax'             => $params->fax,
                    'email'           => $params->email,
                    'contact_person'  => $params->contact_person,
                    'state'           => '1',
                    'add_date'        => date('Y-m-d H:i:s'),
                    'add_user'        => $log['user_id'],
                );
        
        if (!empty($params->hotel_id)) {
            $fields_update = array(
                    'hotel_code'      => $params->hotel_code, 
                    'hotel_name'      => $params->hotel_name,
                    'address'         => $params->address,
                    'country_id'      => $params->country_code,
                    'state_id'        => $params->state,
                    'city_id'         => $params->city,
                    'hotel_type'      => $params->hotel_type,
                    'star'            => $params->star,
                    'telp'            => $params->telp,
                    'fax'             => $params->fax,
                    'email'           => $params->email,
                    'contact_person'  => $params->contact_person,
                    'modified_date'        => date('Y-m-d H:i:s'),
                    'modified_user'        => $log['user_id'],
                );
            $this->db->where("hotel_id", $params->hotel_id);
            $valid = $this->db->update("hotel_mst_hotels", $fields_update);
                        
            $valid = $this->logUpdate->addLog("update", "hotel_mst_hotels", $params);
        }
        else {
            $valid = $this->db->insert('hotel_mst_hotels', $fields);
            $valid = $this->logUpdate->addLog("insert", "hotel_mst_hotels", $params);
                        
        }
        return true;
    }

    function delete($id) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;     
        $valid = $this->logUpdate->addLog("delete", "hotel_mst_hotels", array("hotel_id" => $id));   
        
        if ($valid){
            $this->db->where('hotel_id', $id);
            $valid = $this->db->delete('hotel_mst_hotels');
        }
        
        return $valid;
    }

}
