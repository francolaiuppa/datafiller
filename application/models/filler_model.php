<?php
class Filler_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	private function _fill($field_name,$fill_type,$data) {
		switch ($fill_type) {
			case 'fullname':
				$first_names = get_hardcoded_data('first_name');
				$last_names = get_hardcoded_data('last_name');
				shuffle($first_names);
				shuffle($last_names);
				return array_shift($first_names).' '.array_shift($last_names);
			break;

			case 'first_name':
				$first_names = get_hardcoded_data('first_name');
				shuffle($first_names);
				return array_shift($first_names);
			break;

			case 'last_name':
				$last_names = get_hardcoded_data('last_name');
				shuffle($last_names);
				return array_shift($last_names);
			break;

			case 'email':
				$first_names = get_hardcoded_data('first_name');
				$last_names = get_hardcoded_data('last_name');
				shuffle($first_names);
				shuffle($last_names);
				return strtolower(array_shift($first_names)).'@'.strtolower(array_shift($last_names)).'.com';	
			break;

			case 'country':
				$countries = get_hardcoded_data('country');
				shuffle($countries);
				return array_shift($countries);
			break;

			case 'address':
				$last_names = get_hardcoded_data('last_name');
				shuffle($last_names);
				return array_shift($last_names).' '.rand(1,9000);
			break;

			case 'phone':
			  $phone = array(rand(100,999),rand(100,999),rand(1000,9999)); 
				return implode('-',$phone);
			break;

			case 'current_date':
				return date('Y-m-d');
			break;

			case 'current_time':
				return date('H:i:s');
			break;

			case 'current_datetime':
				return date('Y-m-d H:i:s');
			break;

			case 'current_mktime':
				return mktime();
			break;

			case 'fixed_value':
				return $data['fixed_value'][$field_name];
			break;			

			case 'fixed_value_multiple':
				$data = str_getcsv($data['fixed_value_multiple'][$field_name],',',"'");
				shuffle($data);
				$data = array_shift($data);
				return $data;
			break;

			case 'other_table_key':
				$t_table = $data['other_table_for_field'][$field_name];
				$t_column = $data['other_table_for_field_id'][$field_name];
				$data = $this->db->query('SELECT '.$t_column.' FROM '.$t_table.' ORDER BY RAND() LIMIT 1')->result();
				return $data[0]->$t_column;
			break;

			case 'integer':
				$min = $data['integer_min'][$field_name];
				$max = $data['integer_max'][$field_name];
				$number = rand($min,$max);
				return $number;
			break;

			case 'float':
				$min = $data['float_min'][$field_name];
				$max = $data['float_max'][$field_name];
				$number = rand($min,$max);
				$decimals = rand(0,99);
				return (float)($number.'.'.$decimals);
			break;

			case 'null':
				return NULL;
			break;

			case 'md5':
				return md5($data['md5'][$field_name]);
			break;

			case 'ip':
			  $ip = array(rand(1,200),rand(1,215),rand(0,255),rand(0,255)); 
				return implode('.',$ip);
			break;

			case 'url':
				$first_name = get_hardcoded_data_item('first_name');
				$last_name = get_hardcoded_data_item('last_name');
				$domain = get_hardcoded_data_item('ccTLDs');
				return 'http://www.'.strtolower($first_name.$last_name).'.'.$domain;
			break;

			case 'between_dates_date':
				$start_date = strtotime($data['between_dates_date_start'][$field_name]);
				$end_date = strtotime($data['between_dates_date_end'][$field_name]);
				return date('Y-m-d',rand($start_date,$end_date));
			break;

			case 'between_dates_datetime':
				$start_date = strtotime($data['between_dates_datetime_start'][$field_name]);
				$end_date = strtotime($data['between_dates_datetime_end'][$field_name]);
				return date('Y-m-d H:i:s',rand($start_date,$end_date));
			break;

			case 'between_dates_mktime':
				$start_date = strtotime($data['between_dates_mktime_start'][$field_name]);
				$end_date = strtotime($data['between_dates_mktime_end'][$field_name]);
				return rand($start_date,$end_date);
			break;

		} 
	}

	public function create($table,$data) {
		if (empty($data)) { return false; }
		$result = array();
		// repeat process for the rows that we need
		for ($i=0;$i<=$data['how_many_rows'];$i++) {
			$tmp = array();
			// loop each field, call the appropiate function
			foreach ($data['fields_fill_type'] as $field_name=>$fill_type) {
				$tmp[$field_name] = $this->_fill($field_name,$fill_type,$data);
			}
			// store everything on result array
			$result[] = $tmp;
		}		
		// insert time
			$this->db->insert_batch($table,$result);
	}

	public function get_last_rows($table,$limit,$id_field='id') {
		$data = $this->db->order_by($id_field,'ASC')->limit($limit)->get($table)->result();
		return $data;
	}

	public function get_last_rows_html_table($table,$limit,$select='') {
		if ($select != '') { $this->db->select($select); }
		$fields = $this->db->field_data($table);

		foreach ($fields as $field) {
		  if ($field->primary_key) { $id_field = $field->name; }
		}
		if (isset($id_field)) {
			$this->db->order_by($id_field,'DESC');
		}

		$data = $this->db->limit($limit)->get($table)->result_array();
		// die(var_dump($data));
		if (empty($data)) { return '<p>(No data to show)</p>'; }
		$CI =& get_instance();
		$CI->load->library('table');
		$CI->table->set_heading(array_keys($data[0]));
		$result = $CI->table->generate($data);
		return str_replace('<table','<table class="table table-bordered table-hover table-stripped table-condensed" ',$result);
	}
}