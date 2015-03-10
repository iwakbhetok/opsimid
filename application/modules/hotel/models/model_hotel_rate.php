<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_hotel_rate extends Form_mdl {
    function __construct() {
        parent::__construct();
        $this->table_base = 'hotel_mst_hotel_rate';
        $this->load->model('form_mdl');
    }

    function get_list_hotel_rate()
    {
    	$data = array();
            $fields = array(
                'hotel_rate_id', 
                'hotel_id',
                'supplier_id',
                'class_id',
                'room_id',
                'valid_date_from',
                'valid_date_to',
                'currency',
                'market_type',
                'include_breakfast',
                'nett_room',
                'sell_room',
                'nett_breakfast',
                'sell_breakfast',
            );
            
            $this->db->select($fields);
            $query = $this->db->get($this->table_base);
            $nomor = 1;
            foreach($query->result() as $row):
                $data[] = array(
                    'hotel_rate_id'     => $row->hotel_rate_id,
                    'hotel_id'          => $row->hotel_id, 
                    'supplier_id'       => $row->supplier_id,
                    'class_id'          => $row->class_id,
                    'room_id'     		=> $row->room_id,
                    'valid_date_from'   => $row->valid_date_from,
                    'valid_date_to'     => $row->valid_date_to,
                    'currency'          => $row->currency,
                    'market_type'       => $row->market_type,
                    'include_breakfast' => $row->include_breakfast,
                    'nett_room'         => $row->nett_room,
                    'sell_room'         => $row->sell_room,
                    'nett_breakfast'    => $row->nett_breakfast,
                    'sell_breakfast'    => $row->sell_breakfast
                );
                $nomor++;
            endforeach;
            return $data;
    }

    function get_form_view()
    {
    	$fields = $this->db->field_data($this->table_base);

		foreach ($fields as $field)
		{
		   $field_ = ucwords(str_replace("_"," ",$field->name));
		   $type = $field->type;
		   switch ($type) {
		   	case 'int':
		   		$filters = array('add_user','modified_user');
		   		if (substr($field->name, -3) == '_id' or in_array($field->name, $filters) ) {
		   			$field_names[$field->name] = array(
			   			'type'=>'hidden', 'idkey'=>$field->name, 'label'=> $field_
			   		);
		   		}
		   		else{
			   		$field_names[$field->name] = array(
			   			'type'=>'text', 'idkey'=>$field->name, 'label'=> $field_
			   		);
		   		}
		   		break;
		   	case 'varchar':
		   		$field_names[$field->name] = array(
		   			'type'=>'text', 'idkey'=>$field->name, 'label'=> $field_
		   		);
		   		break;
		   	case 'date':
		   		$field_names[$field->name] = array(
		   			'type'=>'date', 'idkey'=>$field->name, 'label'=> $field_
		   		);
		   		break;
		   	case 'datetime':
		   		$filters = array('add_date','modified_date');
		   		if (in_array($field->name, $filters) ) {
		   			$field_names[$field->name] = array(
			   			'type'=>'hidden', 'idkey'=>$field->name, 'label'=> $field_
			   		);
		   		}
		   		else{
			   		$field_names[$field->name] = array(
			   			'type'=>'date', 'idkey'=>$field->name, 'label'=> $field_
			   		);
		   		}
		   		break;
		   	case 'set':
		   		$enums = $this->field_enums($this->table_base, $field->name);
		   		$no = 0;
		   		foreach ($enums as $key => $value) {
		   			$enum_arr[] = array(
		   				'id' => $no,
		   				'name'=> $value
		   				);
		   			$no++;
		   		}
		   		$field_names[$field->name] = array(
		   			'type'=>'option', 'idkey'=>$field->name, 'label'=>$field_, 'option'=>$enum_arr
		   		);
		   		break;
		   }
		}
		$data = array(
        	'name'			=> $this->table_base,
        	'column'		=> $field_names
        	);
    	return $this->get_form($data);
    }

}