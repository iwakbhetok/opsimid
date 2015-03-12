<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hotel_rate_mdl extends Form_mdl {

    function __construct() {
    parent::__construct();
    $this->load->model('logUpdate');
    }

    function getrecordcount() {
        $data = $this->db->count_all_results('hotel_mst_hotel_rate');
        return $data;
    }

    function getdataid($id) {
        $data = array();
        $fields = array(
            'hmhr.hotel_rate_id', 
            'hmhr.hotel_id', 
            'hmhr.supplier_id', 
            'hmhr.class_id', 
            'hmhr.room_id', 
            'hmh.hotel_name',
            'ms.supplier_name',
            'mc.class_name',
            'mr.room_name',
            'hmhr.valid_date_from',
            'hmhr.valid_date_to',
            'hmhr.currency',
            'hmhr.market_type',
            'hmhr.include_breakfast',
            'hmhr.nett_room',
            'hmhr.sell_room',
            'hmhr.nett_breakfast',
            'hmhr.sell_breakfast',
        );

        $this->db->select($fields);
        $this->db->join('mst_supplier ms', 'ms.supplier_id=hmhr.supplier_id');
        $this->db->join('hotel_mst_hotels hmh', 'hmh.hotel_id=hmhr.hotel_id');
        $this->db->join('hotel_mst_class mc', 'mc.class_id=hmhr.class_id');
        $this->db->join('hotel_mst_room mr', 'mr.room_id=hmhr.room_id');
        $this->db->where('hotel_rate_id', $id);
        $query = $this->db->get('hotel_mst_hotel_rate hmhr');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = array(
                'hotel_rate_id' => $row->hotel_rate_id,
                'hotel_name' => $row->hotel_name,
                'class_type' => $row->class_name,
                'room_type' => $row->room_name,
                'date_from' => $row->valid_date_from,
                'date_to' => $row->valid_date_to,
                'currency' => $row->currency,
                'market_type' => $row->market_type,
                'include_breakfast' => $row->include_breakfast,
                'nett_room' => $row->nett_room,
                'sell_room' => $row->sell_room,
                'nett_breakfast' => $row->nett_breakfast,
                'sell_breakfast' => $row->sell_breakfast,
            );
        }
        return $data;
    }

    function getdatalist()
    {
    	$data = array();
            $fields = array(
                'hmhr.hotel_rate_id', 
                'hmh.hotel_name',
                'ms.supplier_name',
                'mc.class_name',
                'mr.room_name',
                'hmhr.valid_date_from',
                'hmhr.valid_date_to',
                'hmhr.sell_room',
                'hmhr.sell_breakfast',
                'hmhr.currency',
            );
            
            $this->db->select($fields);
            $this->db->join('mst_supplier ms', 'ms.supplier_id=hmhr.supplier_id');
            $this->db->join('hotel_mst_hotels hmh', 'hmh.hotel_id=hmhr.hotel_id');
            $this->db->join('hotel_mst_class mc', 'mc.class_id=hmhr.class_id');
            $this->db->join('hotel_mst_room mr', 'mr.room_id=hmhr.room_id');
            $query = $this->db->get('hotel_mst_hotel_rate hmhr');
            $nomor = 1;
            foreach($query->result() as $row):
                $data[] = array(
                    'hotel_rate_id'     => $row->hotel_rate_id,
                    'hotel_name'        => $row->hotel_name, 
                    'supplier_name'     => $row->supplier_name,
                    'class_name'        => $row->class_name,
                    'room_name'     	=> $row->room_name,
                    'date_from'   		=> convert_datepicker_to_english_format($row->valid_date_from),
                    'date_to'     		=> convert_datepicker_to_english_format($row->valid_date_to),
                    'sell_room'         => '<p style="text-align:right;">'.currency_format_two_digit($row->sell_room).' '.$row->currency.'</p>',
                    'sell_breakfast'    => '<p style="text-align:right;">'.currency_format_two_digit($row->sell_breakfast).' '.$row->currency.'</p>',
                );
                $nomor++;
            endforeach;
            return $data;
    }

    function save($params) {
        $log = $this->session->all_userdata();
        $this->load->model('logUpdate');
        $valid = false;
        
                $fields = array(
                    'hotel_id'      	=> $params->hotel_name, 
                    'supplier_id'      	=> $params->supplier_name,
                    'class_id'         	=> $params->class_type,
                    'room_id'      		=> $params->room_type,
                    'valid_date_from'   => $params->date_from,
                    'valid_date_to'     => $params->date_to,
                    'currency'      	=> $params->currency,
                    'market_type'       => $params->market_type,
                    'include_breakfast' => $params->include_breakfast,
                    'nett_room'         => $params->nett_room,
                    'sell_room'         => $params->sell_room,
                    'nett_breakfast'  	=> $params->nett_breakfast,
                    'sell_breakfast'    => $params->sell_breakfast,
                    'add_date'        	=> date('Y-m-d H:i:s'),
                    'add_user'        	=> $log['user_id'],
                );
        
        if (!empty($params->hotel_rate_id)) {
            $fields_update = array(
                    'hotel_id'      	=> $params->hotel_name, 
                    'supplier_id'      	=> $params->supplier_name,
                    'class_id'         	=> $params->class_type,
                    'room_id'      		=> $params->room_type,
                    'valid_date_from'   => $params->date_from,
                    'valid_date_to'     => $params->date_to,
                    'currency'      	=> $params->currency,
                    'market_type'       => $params->market_type,
                    'include_breakfast' => $params->include_breakfast,
                    'nett_room'         => $params->nett_room,
                    'sell_room'         => $params->sell_room,
                    'nett_breakfast'  	=> $params->nett_breakfast,
                    'sell_breakfast'    => $params->sell_breakfast,
                    'modified_date'     => date('Y-m-d H:i:s'),
                    'modified_user'     => $log['user_id'],
                );
            $this->db->where("hotel_rate_id", $params->hotel_rate_id);
            $valid = $this->db->update("hotel_mst_hotel_rate", $fields_update);
                        
            $valid = $this->logUpdate->addLog("update", "hotel_mst_hotel_rate", $params);
        }
        else {
            $valid = $this->db->insert('hotel_mst_hotel_rate', $fields);
            $valid = $this->logUpdate->addLog("insert", "hotel_mst_hotel_rate", $params);
                        
        }
        return true;
    }

}