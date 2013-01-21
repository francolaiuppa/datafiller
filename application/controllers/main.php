<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Filler_model','Filler');
		$this->connect_to_database_using_session();
	}

	public function connect_to_database_using_session() {
		if (!$this->session->userdata('dsn')) {
			return $this->output->set_output($this->setup());
		}
		$result = $this->_connect_to_db();
	}

	public function setup($extra_error='') {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('protocol','Protocol','required');
		$this->form_validation->set_rules('hostname','Hostname','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('database','Database','required');
		if (!$this->form_validation->run()) {
			return $this->load->view('setup',array('error'=>$extra_error));	
		}
		$result = $this->_check_db(
			$this->input->post('protocol'),
			$this->input->post('hostname'),
			$this->input->post('username'),
			$this->input->post('password'),
			$this->input->post('database')
		);

		if (!$result) {
			redirect('setup/error_while_connecting');
			return;	
		}

		foreach ($_POST as $k=>$v) {
			$this->session->set_userdata($k,$v);
		}

		redirect('/');
		
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

protected function _connect_to_db() {
	$this->load->database($this->session->userdata('dsn'));
}

/**
 * Check Database Connection
 * 
 * Checks connection details to see if they are correct. Useful for testing
 * user supplied details in an install controller.
 * 
 * @access	protected
 * @param	string		$protocol	protocol to connect with
 * @param	string		$host		host to connect to
 * @param	string		$user		username to login with
 * @param	string		$pass		password to login with
 * @param	string		$database	database to check for
 * @param	integer		$port		port to connect on (optional)
 * @return	bool
 */
protected function _check_db($protocol,$host,$user,$password,$database,$port = NULL)
{
	// prep the DSN string
	$dsn = "{$protocol}://{$user}:{$password}@{$host}/{$database}";
	if($port !== NULL) {
		$dsn .="?port={$port}";
	}

	$this->session->set_userdata('dsn',$dsn);
	
	// Load the database and dbutil
	$this->load->database($dsn);
	$this->load->dbutil();

	// check the connection details
	$check = $this->dbutil->database_exists($database);

	// close the database
	$this->db->close();

	// return our status
	return $check;
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */