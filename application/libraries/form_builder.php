<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * library to build uniform form elements with bootstrap styling.
 * @author sim wicki
 */
class Form_builder {
	
	private $_separation = false;
	private $_editable = true;
	public static $TYPES;
	
	public function __construct() {
		Form_builder::$TYPES = (object) array(
			'TEXT' => 1,
			'OPTION' => 2,
			'CHECKBOX' => 3,
			'DATE' => 4,
			'RADIO' => 5,
			'BUTTON' => 6,
			'PASSSWORD' => 7,
		);
	}

	/**
	 * builds and prints out a text input section.
	 * @param id string
	 * @param name string
	 * @param default string
	 * @param class string
	 * @param placeholder string
	 * @param prepend string
	 * @param append string
	 */
	public function text($id, $name, $default = '', $class = 'input-large', $placeholder = '', $prepend = '', $append = '') {
		$data = array(
			'base_control' 	=> $this->base_control($id, $name),
			'_build_text'	=> $this->_build_text($id, $default, $class, $placeholder, $prepend, $append)
			);
		return $data;
	}
	
	/**
	* builds and prints out a password input section.
	* @param id string
	* @param name string
	* @param default string
	* @param class string
	* @param placeholder string
	* @param prepend string
	* @param append string
	*/
	public function password($id, $name, $default = '', $class = 'input-large', $placeholder = '', $prepend = '', $append = '') {
		$data = array(
			'base_control' 	=> $this->base_control($id, $name),
			'_build_text'	=> $this->_build_text($id, $default, $class, $placeholder, $prepend, $append, true)
			);
		return $data;
	}
	
	
	
	/**
	 * creates a form element with multiple inputs defined by form_builder types.
	 * @param ids array
	 * @param name string
	 * @param default array
	 * @param class array
	 * @param param array used for placeholder or values
	 * @param prepend array
	 * @param append array
	 */
	public function multi($ids, $name, $types, $default = array(), $class = array(), $param = array(), $prepend = array(), $append = array()) {
		
		$data = array();
		
		for ($i = 0; $i < count($types); $i++) {
			$type = isset($types[$i]) ? $types[$i] : '';
			$id = isset($ids[$i]) ? $ids[$i] : 0;
			$df = isset($default[$i]) ? $default[$i] : '';
			$cl = isset($class[$i]) ? $class[$i] : '';
			$pm = isset($param[$i]) ? $param[$i] : '';
			$pp = isset($prepend[$i]) ? $prepend[$i] : '';
			$ap = isset($append[$i]) ? $append[$i] : '';
			
			switch ($type) {
				case Form_builder::$TYPES->TEXT:
					$data['_build_text']	= $this->_build_text($id, $df, $cl, $pm, $pp, $ap, false);
					break;
				case Form_builder::$TYPES->OPTION:
					$data['_build_option'] = $this->_build_option($id, $pm, $df, $cl);
					break;
				case Form_builder::$TYPES->CHECKBOX:
					$data['_build_checkboxes'] = $this->_build_checkboxes($id, $pm, $df, $cl);
					break;
				case Form_builder::$TYPES->DATE:
					$data['_build_date'] = $this->_build_date($id, $df, $cl, $pm);
					break;
				case Form_builder::$TYPES->BUTTON:
					$data['single_button'] = $this->single_button($df, $id, $cl, '', ($pp) ? $pp : 'button');
					break;
				case Form_builder::$TYPES->PASSWORD:
					$data['_build_text'] = $this->_build_text($id, $df, $cl, $pm, $pp, $ap, true);
					break;
			}
					$data_type[] = array(
						$i => $data
						);
		}
		$data = array(
			'base_control' 	=> $this->base_control($ids[0], $name),
			'data_type'		=> $data_type
			);
		//var_dump($data);
		return $data;
	}
	
	/**
	 * builds and prints out a radio input section.
	 * @param id string
	 * @param name string
	 * @param values array containing id, name
	 * @param default string
	 */
	public function radio($id, $name, $values, $default = '') {
		$data_value = array();
		foreach ($values as $value) {
			$data_value[] = array(
				'id' 	=> $id,
				'name'	=> $value['name'],
				'set_radio' => set_radio($id, $value['id'], $default == $value['id'])
				);
		}
		$data = array(
			'base_control'	=> $this->base_control($id, $name),
			'_build_radio'	=> $data_value
			);
		
		return $data;
	}
	
	/**
	 * builds and prints out an option input section.
	 * @param di string
	 * @param name string
	 * @param values array containing id, name
	 * @param default string
	 * @param class string
	 */
	public function option($id, $name, $values, $default = '', $class = 'input-large') {
		$data = array(
			'base_control'		=> $this->base_control($id, $name),
			'_build_option'		=> $this->_build_option($id, $values, $default, $class)
		);
		return $data;
	}
	
	/**
	 * builds and prints out a date input section.
	 * @param id string
	 * @param name string
	 * @param default string
	 * @param class string
	 * @param placeholder string
	 */
	public function date($id, $name, $default = '', $class, $placeholder = 'DD.MM.YYYY') {
		$data = array(
			'base_control'	=> $this->base_control($id, $name),
			'_build_date'	=> $this->_build_date($id, $default, $class, $placeholder),
			'set_value'		=> set_value($id, $default)
		);
		return $data;
	}
	
	/**
	 * builds and prints out a textarea input section.
	 * @param id string
	 * @param name string
	 * @param default string
	 * @param class string
	 * @param rows int
	 */
	public function textarea($id, $name, $default = '', $class = 'input-xlarge', $rows = 5, $label) {
		$readonly = ($this->_editable) ? '' : 'readonly';
		$value =  set_value($id, $default);
		$property = array('class' => $class, 'readonly'=> $readonly, 'id'=> $id, 'rows'=>$rows, 'value' => $value, 'label' => $label);
		$data = array(
			'base_control'		=> $this->base_control($id, $name),
			'_build_textarea'	=> $property,
			'set_value'			=> $value
			);
		return $data;
	}
	
	/**
	* builds and prints out checkboxes input section.
	* @param name string
	* @param id string
	* @param boxes array
	* @param default string concatenated string with ids, separated by ','
	* @param class string
	* @param disabled boolean
	*/
	public function checkboxes($name, $id, $boxes, $default = '', $class = '') {
		$data = array(
			'base_control'		=> $this->base_control('', $name),
			'_build_checkboxes' => $this->_build_checkboxes($id, $boxes, $default, $class)
			);
		return $data;
	}
	
	/**
	 * builds and prints out a single checkbox input section.
	 * @param name string
	 * @param id string
	 * @param default string
	 * @param class string
	 */
	public function checkbox($name, $id, $value = '', $default = '', $class = '') {
		$boxes = array(
			(object) array('id' => $id, 'name' => $value),
		);
		if ($default == '1') {
			$default = $id;
		}

		$data = array(
			'base_control'		=> $this->base_control('', $name),
			'_build_checkboxes'	=> $this->_build_checkboxes($id, $boxes, $default, $class)
			);
		return $data;
	}
	
	/**
	 * builds and prints a single button without indentation.
	 * @param id string
	 * @param name string
	 * @param class string
	 * @param icon string
	 * @param type string [button|submit|reset]
	 */
	public function single_button($name, $id = '', $class = '', $icon = '', $type = 'submit') {
		$data = array(
			'_build_button'	=> $this->_build_button($id, $name, $class, $icon, $type)
			);
		return $data;
	}
	
	/**
	 * builds and prints a single button with the proper indentation.
	 * @param id string
	 * @param name string
	 * @param class string
	 */
	public function button($id, $name, $class = '', $icon = '', $type = 'button') {
		$data = array(
			'base_control'	=> $this->base_control('', ''),
			'_build_button'	=> $this->_build_button($id, $name, $class, $icon, $type)
			);
		return $data;
	}
	
	
	
	/**
	 * builds and prints a hidden input field.
	 * @param id string
	 * @param default string
	 */
	public function hidden($id, $default = '') {
		$hidden = array(
			'id'		=> $id,
			'type'		=> 'hidden',
			'default'	=> $default);
		return $hidden;
	}
	
	/**
	 * builds and prints a single label on the left side (correctly indented) with variable content on the right side.
	 * @param name string
	 * @param content string
	 */
	public function label($name, $content) {
		$this->base_control('', $name);
		echo "<div style='margin-top:5px;'>{$content}</div>";
		$this->base_end();
	}
	
	/**
	* adds a small gap for the next form input.
	*/
	public function add_separation() {
		$data = array();
		$this->_separation = true;

	}
	
	/**
	 * whether the following form inputs are editable or non-editable.
	 * @param value string
	 */
	public function set_editable($value) {
		$this->_editable = $value;
	}
	
	/**
	 * outputs the beginning of an input section.
	 * @param id string
	 * @param name string
	 */
	private function base_control($id, $name) {
		$error = '';
		$for = '';
		if (is_array($id)) {
			for ($i = 0; $i < count($id); $i++) {
				if ($error == '' && form_error($id[$i])) {
					$error = 'error';
				}
			}
			$for = $id[0];
		} else {
			$error = (form_error($id)) ? 'error' : '';
			$for = $id;
		}
		
		$lesser = 'lesser-inputs';
		if ($this->_separation) {
			$lesser = '';
			$this->_separation = false;
		}
		$ui = array(
			'lesser'	=> $lesser,
			'error' 	=> $error,
			'for'		=> $for,
			'name' 		=> $name);
		return $ui;
	}
	
	
	/* ============================================
	 * private functions for building the elements.
	 * ============================================ */
	
	private function _build_text($id, $default, $class, $placeholder, $prepend, $append, $is_password = false) {
		$this->addon_begin($prepend, $append, $class);
		$readonly = ($this->_editable) ? '' : 'readonly';
		$type = ($is_password) ? 'password' : 'text';
		$value = ($is_password) ? '' : set_value($id, $default);
		$this->addon_end($prepend, $append);
		$build = array(
			'type'			=> $type,
			'readonly'		=> $readonly,
			'placeholder'	=> $placeholder,
			'class'			=> $class,
			'name'			=> $id,
			'id'			=> $id,
			'value'			=> $value
			);
		return $build;
	}
	
	private function _build_option($id, $values, $default, $class) {
		$disabled = ($this->_editable) ? '' : 'disabled';
		$data_option= array();
		$no = 0;

		foreach ($values as $value) {
			$data_option['id'] = $value['id'];
			$data_option['name'] = $value['name'];
			$data_option['set_select'] = set_select($id, $value['id'], $default == $value['id']);
			$no++;
		}
		$data = array(
			'disabled'		=> $disabled,
			'id'			=> $id,
			'class'			=> $class,
			'data_value'	=> array($values)
			);
		return $data;
	}
	
	private function _build_checkboxes($id, $boxes, $default, $class) {
		$disabled = ($this->_editable) ? '' : 'disabled';
		$defaults = explode(',', $default);

		foreach ($boxes as $box) {
			$selected = (in_array($box['id'], $defaults)) ? true : false;
			$data_checkbox[] = array(
				'class'		=> $class,
				'disabled'	=> $disabled,
				'count_boxes'=> ((count($boxes) > 1) ? "{$box['id']}" : ''),
				'id'		=> $id,
				'name'		=> ((count($boxes) > 1) ? "{$id}" : ""),
				'label'		=> $box['name'],
				'set_checkbox'	=> set_checkbox($id . '[]', $box['id'], $selected),
				'selected'		=> $selected
				);
		}
		$data = array(
			'disabled'		=> $disabled,
			'defaults'		=> $defaults,
			'data_checkbox'	=> $data_checkbox
			);
		return $data;
	}
	
	private function _build_date($id, $default, $class, $placeholder) {
		$readonly = ($this->_editable) ? '' : 'readonly';
		$datepicker = ($this->_editable) ? 'data-datepicker="datepicker"' : '';
		$data = array(
			'id'		=> $id,
			'readonly'	=> $readonly,
			'datepicker'=> $datepicker,
			'placeholder'=> $placeholder,
			'class'		=> $class,
			'set_value'	=> set_value($id, $default)
			);
		return $data;
	}
	
	private function _build_button($id, $name, $class, $icon, $type = 'submit') {
		$disabled = ($this->_editable) ? '' : 'disabled';
		$icon = ($icon != '') ? "<i class='{$icon}'></i> " : '';
		$data = array(
			'id'		=> $id,
			'class'		=> $class,
			'disabled'	=> $disabled,
			'icon'		=> $icon,
			'name'		=> $name,
			'type'		=> $type,
			);
		return $data;
	}

	
	/* ======================================
	* functions for building the core inputs.
	* ======================================= */
	
	/**
	 * outputs the end of an input section.
	 */
	private function base_end() {
		echo '	</div>';
		echo '</div>';
	}
	
	/**
	* handles the begin of the append or prepend addon.
	* @param prepend string
	* @param append string
	* @param class string
	*/
	private function addon_begin($prepend, $append, $class) {
		if ($append != '' || $prepend != '') {
			if ($prepend != '') {
				echo '<div class="input-prepend '. $class .'">';
				echo '	<span class="add-on">'. $prepend .'</span>';
			} else {
				echo '<div class="input-append '. $class .'">';
			}
		}
	}
	
	/**
	 * handles the end of the append or prepend addon.
	 * @param prepend string
	 * @param append string
	 */
	private function addon_end($prepend, $append) {
		if ($append != '' || $prepend != '') {
			if ($append != '') {
				echo '	<span class="add-on">'. $append .'</span>';
			}
			echo '</div> ';
		}
	}
	
}
/* End of file form_builder.php */
/* Location: ./application/models/form_builder.php */