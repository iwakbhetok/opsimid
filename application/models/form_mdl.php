<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
        /*
        FORMAT PARAMETER YANG BISA DIGUNAKAN UNTUK INPUT TYPE TEXT, HIDDEN, RADIO, CHECKBOX, DATE, OPTION, SINGLE BUTTON

        $this->table = array(
        	'name'			=> 'mst_hotels',
        	'column'		=> array(
        		'hotel_id'	=> array('type'=>'hidden', 'idkey'=>'hotel_id', 'label'=>'ID'),
        		'hotel_name'	=> array('type'=>'text', 'idkey'=>'hotel_name', 'label'=>'Name'),
        		'hotel_choice'	=> array('type'=>'radio', 'idkey'=>'hotel_choice', 'label'=>'Hotel Class', 'option'=>array(0 => array('id'=>1, 'name'=>'Bintang 1'), 1 => array('id'=>2, 'name'=>'Bintang 2')) ),
        		'hotel_checkboxes'	=> array('type'=>'checkboxes', 'idkey'=>'hotel_checkboxes', 'label'=>'Hotel Check', 'option'=>array(0 => array('id'=>1, 'name'=>'Bintang 1'), 1 => array('id'=>2, 'name'=>'Bintang 2')) ),
        		'hotel_address'	=> array('type'=>'textarea', 'idkey'=>'hotel_address', 'label'=>'Address','row'=>5),
        		'date' => array('type' => 'date', 'idkey'=>'hotel_date', 'label'=>'Date'),
        		'hotel_star'	=> array('type'=>'option', 'idkey'=>'hotel_star', 'label'=>'Star', 'option'=>array(0 => array('id'=>1, 'name'=>'Bintang 1'), 1 => array('id'=>2, 'name'=>'Bintang 2') )),
        		'hotel_phone'	=> array('type'=>'multi', 'idkey'=>'hotel_phone', 'label'=>'Hotel Phone'),
        		'hotel_btn'	=> array('type'=>'single_button', 'idkey'=>'hotel_btn', 'label'=>'Button'),
        	),
        );*/ 
    }

    function get_form($table)
    {
    	$kolom = $table['column'];
        //var_dump($kolom);
    	$data = '';
    	foreach($kolom as $row):
    		$type = $row['type'];
    		switch ($type) {
    			case 'hidden':
    				$component = $this->form_builder->hidden($row['idkey'], '');
    				$data .= '<div class="col-xs-12 col-md-9"><div class="form-group col-xs-12"><div class="col-xs-4">';
    				$data .= '<input type="'.$component['type'].'" id="'.$component['id'].'" name="'.$component['id'].'" />';
    				$data .= '</div></div></div>';
    				break;
    			case 'text' :
    				$component = $this->form_builder->text($row['idkey'], $row['idkey'],  '',  'form-control');
    				$data .= '<div class="col-xs-12 col-md-9"><div class="form-group col-xs-12"><label for="'.$component['base_control']['for'].'" class="col-xs-2 control-label">'.$row['label'].'</label><div class="col-xs-4">';
    				$data .= '<input type="'.$component['_build_text']['type'].'" id="'.$component['_build_text']['id'].'" name="'.$component['_build_text']['name'].'" class="'.$component['_build_text']['class'].'" />';
    				$data .= '</div></div></div>';
                    //var_dump($data);
    			    break;
    			case 'option':
    			    $component = $this->form_builder->option('country', $row['label'], $row['option'], 1, 'form-control');
    			    $data .= '<div class="col-xs-12 col-md-9"><div class="form-group col-xs-12"><label for="'.$component['base_control']['for'].'" class="col-xs-2 control-label">'. $row['label'] .'</label><div class="col-xs-4">';
    			    $data .= '<select '. $component['_build_option']['disabled'] .' name="'. $component['_build_option']['id'] .'" id="'. $component['_build_option']['id'] .'" class="'. $component['_build_option']['class'] .'">';
    			    $data .= '	<option value=""></option>';
    			    $no = 0;
    			    foreach ($component['_build_option']['data_value'] as $values){
    			    	foreach ( $values as $value) {
						$data .= '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
						$no++;
						}
    			    }
					$data .='</select> </div></div></div>';
    				break;
    			case 'password':
    				$component = $this->form_builder->password($row['idkey'], $row['idkey'], '', 'form-control');
    				$data .= '<div class="col-xs-12 col-md-9"><div class="form-group col-xs-12"><label for="'.$component['base_control']['for'].'" class="col-xs-2 control-label">'.$row['label'].'</label><div class="col-xs-4">';
    				$data .= '<input type="'.$component['_build_text']['type'].'" id="'.$component['_build_text']['id'].'" name="'.$component['_build_text']['id'].'" class="'.$component['_build_text']['class'].'"/>';
    				$data .= '</div></div></div>';
    				break;
    			case 'radio':
    				$component = $this->form_builder->radio($row['idkey'], $row['label'], $row['option'], 3);
                    $data .= '<div class="col-xs-12 col-md-9"><label>'.$component['base_control']['name'].'</label>';
    				foreach ($component['_build_radio'] as $value) {
    					$data .= '<div class="radio"><label class="radio">';
    					$data .= '<input type="radio" name="'. $value['id'] .'" id="'. $value['id'] .'" value="'. $value['id'] .'" '. $value['set_radio'] .'>'.$value['name'].'';
    					$data .= '</label></div>';
    				} 
                    $data .= '</div>';
    				break;
    			case 'date':
    				$component = $this->form_builder->date($row['idkey'], $row['idkey'], '', $class = 'form-control', $placeholder = 'DD.MM.YYYY');
    				$data .= '<div class="col-xs-12 col-md-9"><div class="form-group col-xs-12"><label for="'.$component['base_control']['for'].'" class="col-xs-2 control-label">'.$row['label'].'</label><div class="col-xs-4">';
    				$data .= '<div class="input-group date" id="datetimepicker1"><input type="text" '. $component['_build_date']['readonly'] .' class="'. $component['_build_date']['class'] .'" placeholder="'. $placeholder .'" id="'.$component['_build_date']['id'].'" name="'. $component['_build_date']['id'] .'" value">';
    				$data .= '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';
    				$data .= '</div></div></div></div>';
    				break;
    			case 'textarea':
    				$component = $this->form_builder->textarea($row['idkey'], $row['idkey'], '', 'form-control', $row['row'], $row['label']);
    				$data .= '<div class="col-xs-12 col-md-9"><div class="form-group col-xs-12"><label for="'.$component['_build_textarea']['label'].'" class="col-xs-2 control-label">'.$row['label'].'</label><div class="col-xs-4">';
    				$data .= '<textarea class="'. $component['_build_textarea']['class'] .'" '. $component['_build_textarea']['readonly'] .' id="'. $component['_build_textarea']['id'] .'" name="'. $component['_build_textarea']['id'] .'" rows="'. $component['_build_textarea']['rows'] .'">'. $component['set_value'] .'</textarea>';
    				$data .= '</div></div></div>';
    				break;
    			case 'checkbox':
    				$component = $this->form_builder->checkbox($name, $id, $value = '', $default = '', $class = '');
    				break;
    			case 'checkboxes':
    				$component = $this->form_builder->checkboxes($row['label'], $row['idkey'], $row['option'], '1,3', '');
    				$data .= '<div class="form-group"><label>'. $row['label'].'</label>';
    				foreach ($component['_build_checkboxes']['data_checkbox'] as $value) {
	    				$data .= '<div class="checkbox"><label><input type="checkbox" '. $value['disabled'] .' id="'. $value['id'] . $value['count_boxes'] . '" '. $value['disabled'] .' name="'. $value['name'] . $value['count_boxes'] .'" value="'. $value['label'] .'" '. $value['set_checkbox'] .'"/>' . $value['label'];
	    				$data .= '</label></div>';
    				}
    				break;
    			case 'single_button':
    				$component = $this->form_builder->single_button($row['label'], $row['idkey'], 'btn-primary', '');
    				$data .= '<div class="col-xs-12 col-md-9">';
    				$data .= '<button type="'.$component['_build_button']['type'] .'" id="'. $component['_build_button']['id'] .'" name="'. $component['_build_button']['id'].'"'.$component['_build_button']['disabled'] .'" class="btn '. $component['_build_button']['class'].' '. $component['_build_button']['disabled'] .'">'.$component['_build_button']['name'].'</button>';
    				$data .= '</div>';
    				break;
    			case 'button':
    				$component = $this->form_builder->button('apply', 'übernehmen', 'disabled');
    				break;
    			case 'multi':
    				$component = $this->form_builder->multi(
						  array('phone_area', 'phone'), 
						  'Vorwahl / Telefon', 
						  array(Form_builder::$TYPES->TEXT, Form_builder::$TYPES->TEXT), 
						  array('555', '123456'), 
						  array('span3', 'span7')
						);
    				break;
    			
    		}
    	  
    	endforeach;	
        return $data;
    }

    function field_enums($table = '', $field = '')
    {
        $enums = array();
        if ($table == '' || $field == '') return $enums;
        $CI =& get_instance();
        preg_match_all("/'(.*?)'/", $CI->db->query("SHOW COLUMNS FROM {$table} LIKE '{$field}'")->row()->Type, $matches);
        foreach ($matches[1] as $key => $value) {
            $enums[$value] = $value; 
        }
        return $enums;
    }

}