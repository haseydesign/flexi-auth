<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_guide extends CI_Controller {
	
	function __construct() 
	{
		parent::__construct();

		// To load the CI benchmark and memory usage profiler - set 1==1.
		if (1==2) 
		{
			$sections = array(
				'benchmarks' => TRUE, 'memory_usage' => TRUE, 
				'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE, 
				'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
			); 
			$this->output->set_profiler_sections($sections);
			$this->output->enable_profiler(TRUE);
		}

		// Load CI libraries and helpers.
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('text');
 		$this->load->helper('url');
 		$this->load->helper('form');

  		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		$this->auth = new stdClass;

		// Load 'standard' flexi auth library by default.
		$this->load->library('flexi_auth');	

		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this->load->vars('base_url', 'http://localhost/flexi_auth/');
		$this->load->vars('includes_dir', 'http://localhost/flexi_auth/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// USER GUIDE
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	function index()
	{
		$this->load->view('user_guide_view');
	}

	function concept()
	{
		$this->load->view('user_guide/misc/concept_view');
	}

	function library_info()
	{
		$this->load->view('user_guide/misc/libraries_view');
	}

	function installation()
	{
		$this->load->view('user_guide/misc/installation_view');
	}

	function change_log()
	{
		$this->load->view('user_guide/misc/change_log_view');
	}
		
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// LOGIN FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
		
	function login_index() 
	{
		$this->load->view('user_guide/login/login_index_view');
	}
		
	function login_session_config() 
	{
		$this->load->view('user_guide/login/login_session_config_view');
	}
		
	function login_functions() 
	{
		$this->load->view('user_guide/login/login_view');
	}

	function login_captcha_functions() 
	{
		$this->load->view('user_guide/login/login_captcha_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// VALIDATION FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
		
	function validation_index() 
	{
		$this->load->view('user_guide/validation/validation_index_view');
	}
		
	function validation_config()  
	{
		$this->load->view('user_guide/validation/validation_config_view');
	}

	function validation_functions() 
	{
		$this->load->view('user_guide/validation/validation_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// USER ACCOUNT FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
		
	function user_account_index() 
	{
		$this->load->view('user_guide/user_account/user_account_index_view');
	}
		
	function user_account_config() 
	{
		$this->load->view('user_guide/user_account/user_account_config_view');
	}
		
	function user_account_get_data() 
	{
		$this->load->view('user_guide/user_account/user_account_get_data_view');
	}
		
	function user_account_set_data() 
	{
		$this->load->view('user_guide/user_account/user_account_set_data_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// USER GROUP FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
		
	function user_group_index() 
	{
		$this->load->view('user_guide/user_group/user_group_index_view');
	}
		
	function user_group_config() 
	{
		$this->load->view('user_guide/user_group/user_group_config_view');
	}
		
	function user_group_get_data() 
	{
		$this->load->view('user_guide/user_group/user_group_get_data_view');
	}
		
	function user_group_set_data() 
	{
		$this->load->view('user_guide/user_group/user_group_set_data_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// USER PRIVILEGE FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
		
	function user_privilege_index() 
	{
		$this->load->view('user_guide/user_privilege/user_privilege_index_view');
	}
		
	function user_privilege_config() 
	{
		$this->load->view('user_guide/user_privilege/user_privilege_config_view');
	}
		
	function user_privilege_get_data() 
	{
		$this->load->view('user_guide/user_privilege/user_privilege_get_data_view');
	}
		
	function user_privilege_set_data() 
	{
		$this->load->view('user_guide/user_privilege/user_privilege_set_data_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// EMAIL FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
		
	function email_index() 
	{
		$this->load->view('user_guide/email/email_index_view');
	}
		
	function email_config() 
	{
		$this->load->view('user_guide/email/email_config_view');
	}
		
	function email_functions() 
	{
		$this->load->view('user_guide/email/email_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// MESSAGE FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
		
	function message_index() 
	{
		$this->load->view('user_guide/messages/message_index_view');
	}
		
	function message_config() 
	{
		$this->load->view('user_guide/messages/message_config_view');
	}
		
	function message_functions() 
	{
		$this->load->view('user_guide/messages/message_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// CUSTOM SQL USER GUIDE
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	function custom_sql_index() 
	{
		$this->load->view('user_guide/custom_sql/custom_sql_index_view');
	}	

	function query_sql_results() 
	{
		$this->load->view('user_guide/custom_sql/query_sql_results_view');
	}

	function defining_custom_sql()
	{
		$this->load->view('user_guide/custom_sql/defining_custom_sql_view');
	}
	
	function custom_sql_query_builder() 
	{
		$this->load->view('user_guide/custom_sql/custom_sql_query_builder_view');
	}	

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// LIBRARY USER GUIDE
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
			
	function lite_library()
	{
		$this->load->view('user_guide/functions_lite_view');
	}
		
	function standard_library() 
	{
		$this->load->view('user_guide/functions_standard_view');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// General Settings
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	function general_settings()
	{
		$this->load->view('user_guide/misc/general_settings');
	}
}
/* End of file user_guide.php */
/* Location: ./application/controllers/user_guide.php */