<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supplier_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getrecordcount()
    {
            $data = $this->db->count_all_results('mst_supplier');
            return $data;
    }

    function getrecordcount_for_hotel()
    {
        $this->db->join('sys_module sm', 'sm.module_id=ms.supplier_module_id');
        $this->db->where('sm.alias_module', 'hotel');
        $this->db->from('mst_supplier ms');
        $data = $this->db->count_all_results();
        return $data;
    }

    function getsupplier_hotel_combobox()
    {        
        $this->db->join('sys_module sm', 'sm.module_id=ms.supplier_module_id');
        $this->db->where('sm.alias_module', 'hotel');
        $this->db->order_by('ms.supplier_code asc');
        $query = $this->db->get('mst_supplier ms');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'supplier_id'   => $row->supplier_id,
                'supplier_name' => $row->supplier_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

    function getsupplier_ticketing_combobox()
    {        
        $this->db->join('sys_module sm', 'sm.module_id=ms.supplier_module_id');
        $this->db->where('sm.alias_module', 'ticketing');
        $this->db->order_by('ms.supplier_code asc');
        $query = $this->db->get('mst_supplier ms');
        $nomor = 1;
        foreach($query->result() as $row):
            $data[] = array(
                'supplier_id'   => $row->supplier_id,
                'supplier_name' => $row->supplier_name,
            ); 
            $nomor++;
        endforeach;
        return $data;
    }

    function getdatalist_for_hotel() {
        $data = array();
        $fields = array(
            'ms.supplier_id',
            'ms.supplier_code',
            'ms.supplier_name',
            'ms.address1',
            'ms.address2',
            'mc.city_name',
            'ms.phone_number',
        );

        $this->db->select($fields);
        $this->db->join('sys_module sm', 'sm.module_id=ms.supplier_module_id');
        $this->db->join('mst_city mc', 'ms.city_id=mc.city_id');
        $this->db->where('sm.alias_module', 'hotel');
        $query = $this->db->get('mst_supplier ms');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'supplier_id' => $row->supplier_id,
                'supplier_code' => $row->supplier_code,
                'supplier_name' => $row->supplier_name,
                'address' => $row->address1,
                'city_name' => $row->city_name,
                'phone_number' => $row->phone_number,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getrecordcount_for_ticketing()
    {
            $this->db->join('sys_module sm', 'sm.module_id=ms.supplier_module_id');
            $this->db->where('sm.alias_module', 'ticketing');
            $this->db->from('mst_supplier ms');
            $data = $this->db->count_all_results();
            return $data;
    }

    function getdatalist_for_ticketing() {
        $data = array();
        $fields = array(
            'ms.supplier_id',
            'ms.supplier_code',
            'ms.supplier_name',
            'ms.address1',
            'ms.address2',
            'mc.city_name',
            'ms.phone_number',
        );

        $this->db->select($fields);
        $this->db->join('sys_module sm', 'sm.module_id=ms.supplier_module_id');
        $this->db->join('mst_city mc', 'ms.city_id=mc.city_id');
        $this->db->where('sm.alias_module', 'ticketing');
        $query = $this->db->get('mst_supplier ms');
        $nomor = 1;
        foreach ($query->result() as $row):
            $data[] = array(
                'supplier_id' => $row->supplier_id,
                'supplier_code' => $row->supplier_code,
                'supplier_name' => $row->supplier_name,
                'address' => $row->address1,
                'city_name' => $row->city_name,
                'phone_number' => $row->phone_number,
            );
            $nomor++;
        endforeach;
        return $data;
    }

    function getmax_supplier_hotel_code()
    {
        $this->db->select_max('ms.supplier_code');
        $this->db->join('sys_module sm', 'sm.module_id=ms.supplier_module_id');
        $this->db->join('setting_mst_code_configuration smcc', 'smcc.code_id=sm.code_configuration_id');
        $this->db->where('smcc.code_name', 'ticketing');
        $this->db->where('supplier_code LIKE', 'HS%');
        $this->db->limit(1);
        $query = $this->db->get('mst_supplier');
        $data = $query->result();
        return $data;
    }

    function getmax_supplier_ticketing_code()
    {
        $this->db->select_max('supplier_code');
        $this->db->where('supplier_code LIKE', 'TC%');
        $this->db->limit(1);
        $query = $this->db->get('mst_supplier');
        $data = $query->result();
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'ms.supplier_code',
            'ms.supplier_name',
            'ms.address',
            /*'hmh.hotel_type',
            'hmh.star',
            'hmh.telp',
            'hmh.fax',
            'hmh.email',
            'hmh.contact_person',
            'hmh.country_id',
            'mc.country_name',
            'ms.state_name',
            'mci.city_name',*/
        );

        $this->db->select('*');
        $this->db->join('mst_country mc', 'mc.country_id=ms.country_id');
        $this->db->join('mst_state mst', 'mst.state_id=ms.state_id');
        $this->db->join('mst_city mci', 'mci.city_id=ms.city_id');
        $this->db->where('ms.supplier_id', $id);
        $query = $this->db->get('mst_supplier ms');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'supplier_id' => $row->supplier_id,
                'supplier_code' => $row->supplier_code,
                'supplier_name' => $row->supplier_name,
                'address' => $row->address1,
                'zip_code' => $row->zip_code,
                'phone_number' => $row->phone_number,
                'email' => $row->email,
                'fax' => $row->fax,
                'contact_person' => $row->contact_person,
                'country_id' => $row->country_id,
                'country_code' => $row->country_name,
            );
        }
        return $data;
    }

}