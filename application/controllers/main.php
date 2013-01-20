<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Filler_model','Filler');
	}

	public function index() {
		$this->load->view('welcome_message');
	}

	public function about() {
		$this->load->view('about');
	}

	public function view_table($table) {
		$data = array(
			'table_info'=>$this->db->field_data($table),
			'table'=>$table,
			'current_row_count'=>$this->db->count_all_results($table),
			'last_10_rows'=>$this->Filler->get_last_rows_html_table($table,10)
		);
		$this->load->view('view_table',$data);
	}

	public function fill_with_random_data($table) {
		$this->Filler->create($table,$_POST);
		// die();
		redirect('view/'.$table);
	}

	public function backup() {
		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$filename = $this->db->database.'-'.date('Y-m-d_h_i');
		$prefs = array(
      'format'      => 'gzip',             // gzip, zip, txt
      'filename'    => $filename.'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
      'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
      'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
      'newline'     => "\n"               // Newline character used in backup file
    );
		$backup =& $this->dbutil->backup($prefs); 

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($filename.'.tar.gz', $backup);
	}

	public function truncate($table) {
		$this->db->truncate($table);
		redirect('view/'.$table);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */