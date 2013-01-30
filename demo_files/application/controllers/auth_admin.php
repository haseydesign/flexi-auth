<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_admin extends CI_Controller {
 
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
		
		// Load required CI libraries and helpers.
		$this->load->database();
		$this->load->library('session');
 		$this->load->helper('url');
 		$this->load->helper('form');

  		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		$this->auth = new stdClass;

		// Load 'standard' flexi auth library by default.
		$this->load->library('flexi_auth');	

		// Check user is logged in as an admin.
		// For security, admin users should always sign in via Password rather than 'Remember me'.
		if (! $this->flexi_auth->is_logged_in_via_password() || ! $this->flexi_auth->is_admin()) 
		{
			// Set a custom error message.
			$this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			redirect('auth');
		}

		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this->load->vars('base_url', 'http://localhost/flexi_auth/');
		$this->load->vars('includes_dir', 'http://localhost/flexi_auth/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		
		// Define a global variable to store data that is then used by the end view page.
		$this->data = null;
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// flexi auth demo
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * Many of the functions within this controller load a custom model called 'demo_auth_admin_model' that has been created for the purposes of this demo.
	 * The 'demo_auth_admin_model' file is not part of the flexi auth library, it is included to demonstrate how some of the functions of flexi auth can be used.
	 *
	 * These demos show working examples of how to implement some (most) of the functions available from the flexi auth library.
	 * This particular controller 'auth_admin', is used by logged in admins to manage users and user groups.
	 * 
	 * All demos are to be used as exactly that, a demonstation of what the library can do.
	 * In a few cases, some of the examples may not be considered as 'Best practice' at implementing some features in a live environment.
	*/

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Quick Help Guide
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * db_column() function
	 * Columns defined using the 'db_column()' functions are referencing native table columns from the auth libraries 'user_accounts' table.
	 * Using the 'db_column()' function ensures if the column names are changed via the auth config file, then no further references to those table columns 
	 * within the CI installation should need to be updated, as the function will auto reference the config files updated column name.
	 * Native library column names can be defined without using this function, however, you must then ensure that all references to those column names are 
	 * updated throughout the site if later changed.
	 */

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Dashboard
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * index
	 * Forwards to the admin dashboard.
	 */ 
	function index()
    {
		$this->dashboard();
	}
 
 	/**
 	 * dashboard (Admin)
 	 * The public account dashboard page that acts as the landing page for newly logged in public users.
 	 * The dashboard provides links to some examples of the features available from the flexi auth library.  
 	 */
    function dashboard()
    {
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view('demo/admin_examples/dashboard_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// User Accounts
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
 	/**
 	 * manage_user_accounts
 	 * View and manage a table of all users.
 	 * This example allows accounts to be suspended or deleted via checkoxes within the page.
 	 * The example also includes a search tool to lookup users via either their email, first name or last name. 
 	 */
    function manage_user_accounts()
    {
		$this->load->model('demo_auth_admin_model');

		// Check user has privileges to view user accounts, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('View Users'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user accounts.</p>');
			redirect('auth_admin');
		}

		// If 'Admin Search User' form has been submitted, this example will lookup the users email address and first and last name.
		if ($this->input->post('search_users') && $this->input->post('search_query')) 
		{
			// Convert uri ' ' to '-' spacing to prevent '20%'.
			// Note: Native php functions like urlencode() could be used, but by default, CodeIgniter disallows '+' characters.
			$search_query = str_replace(' ','-',$this->input->post('search_query'));
		
			// Assign search to query string.
			redirect('auth_admin/manage_user_accounts/search/'.$search_query.'/page/');
		}
		// If 'Manage User Accounts' form has been submitted and user has privileges to update user accounts, then update the account details.
		else if ($this->input->post('update_users') && $this->flexi_auth->is_privileged('Update Users')) 
		{
			$this->demo_auth_admin_model->update_user_accounts();
		}

		// Get user account data for all users. 
		// If a search has been performed, then filter the returned users.
		$this->demo_auth_admin_model->get_user_accounts();
		
		// Set any returned status/error messages.
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/user_acccounts_view', $this->data);		
    }
	
 	/**
 	 * update_user_account
 	 * Update the account details of a specific user.
 	 */
	function update_user_account($user_id)
	{
		// Check user has privileges to update user accounts, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('Update Users'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to update user accounts.</p>');
			redirect('auth_admin');		
		}

		// If 'Update User Account' form has been submitted, update the users account details.
		if ($this->input->post('update_users_account')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->update_user_account($user_id);
		}
		
		// Get users current data.
		$sql_where = array($this->flexi_auth->db_column('user_acc', 'id') => $user_id);
		$this->data['user'] = $this->flexi_auth->get_users_row_array(FALSE, $sql_where);
	
		// Get user groups.
		$this->data['groups'] = $this->flexi_auth->get_groups_array();
		
		// Set any returned status/error messages.
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/user_account_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// User Groups
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
 	/**
 	 * manage_user_groups
 	 * View and manage a table of all user groups.
 	 * This example allows user groups to be deleted via checkoxes within the page.
 	 */
    function manage_user_groups()
    {
		// Check user has privileges to view user groups, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('View User Groups'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user groups.</p>');
			redirect('auth_admin');		
		}

		// If 'Manage User Group' form has been submitted and user has privileges, delete user groups.
		if ($this->input->post('delete_group') && $this->flexi_auth->is_privileged('Delete User Groups')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->manage_user_groups();
		}

		// Define the group data columns to use on the view page. 
		// Note: The columns defined using the 'db_column()' functions are native table columns to the auth library. 
		// Read more on 'db_column()' functions in the quick help section near the top of this controller. 
		$sql_select = array(
			$this->flexi_auth->db_column('user_group', 'id'),
			$this->flexi_auth->db_column('user_group', 'name'),
			$this->flexi_auth->db_column('user_group', 'description'),
			$this->flexi_auth->db_column('user_group', 'admin')
		);
		$this->data['user_groups'] = $this->flexi_auth->get_groups_array($sql_select);
				
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/user_groups_view', $this->data);		
    }
	
 	/**
 	 * insert_user_group
 	 * Insert a new user group.
 	 */
	function insert_user_group()
	{
		// Check user has privileges to insert user groups, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('Insert User Groups'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to insert new user groups.</p>');
			redirect('auth_admin/manage_user_groups');		
		}

		// If 'Add User Group' form has been submitted, insert the new user group.
		if ($this->input->post('insert_user_group')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->insert_user_group();
		}
		
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/user_group_insert_view', $this->data);
	}
	
 	/**
 	 * update_user_group
 	 * Update the details of a specific user group.
 	 */
	function update_user_group($group_id)
	{
		// Check user has privileges to update user groups, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('Update User Groups'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to update user groups.</p>');
			redirect('auth_admin/manage_user_groups');		
		}

		// If 'Update User Group' form has been submitted, update the user group details.
		if ($this->input->post('update_user_group')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->update_user_group($group_id);
		}

		// Get user groups current data.
		$sql_where = array($this->flexi_auth->db_column('user_group', 'id') => $group_id);
		$this->data['group'] = $this->flexi_auth->get_groups_row_array(FALSE, $sql_where);
		
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/user_group_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Privileges
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
 	/**
 	 * manage_privileges
 	 * View and manage a table of all user privileges.
 	 * This example allows user privileges to be deleted via checkoxes within the page.
 	 */
    function manage_privileges()
    {
		// Check user has privileges to view user privileges, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('View Privileges'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to view user privileges.</p>');
			redirect('auth_admin');		
		}
		
		// If 'Manage Privilege' form has been submitted and the user has privileges to delete privileges.
		if ($this->input->post('delete_privilege') && $this->flexi_auth->is_privileged('Delete Privileges')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->manage_privileges();
		}

		// Define the privilege data columns to use on the view page. 
		// Note: The columns defined using the 'db_column()' functions are native table columns to the auth library. 
		// Read more on 'db_column()' functions in the quick help section near the top of this controller. 
		$sql_select = array(
			$this->flexi_auth->db_column('user_privileges', 'id'),
			$this->flexi_auth->db_column('user_privileges', 'name'),
			$this->flexi_auth->db_column('user_privileges', 'description')
		);
		$this->data['privileges'] = $this->flexi_auth->get_privileges_array($sql_select);
				
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/privileges_view', $this->data);
	}
	
 	/**
 	 * insert_privilege
 	 * Insert a new user privilege.
 	 */
	function insert_privilege()
	{
		// Check user has privileges to insert user privileges, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('Insert Privileges'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to insert new user privileges.</p>');
			redirect('auth_admin/manage_privileges');		
		}

		// If 'Add Privilege' form has been submitted, insert the new privilege.
		if ($this->input->post('insert_privilege')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->insert_privilege();
		}
		
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/privilege_insert_view', $this->data);
	}
	
 	/**
 	 * update_privilege
 	 * Update the details of a specific user privilege.
 	 */
	function update_privilege($privilege_id)
	{
		// Check user has privileges to update user privileges, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('Update Privileges'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to update user privileges.</p>');
			redirect('auth_admin/manage_privileges');		
		}

		// If 'Update Privilege' form has been submitted, update the privilege details.
		if ($this->input->post('update_privilege')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->update_privilege($privilege_id);
		}
		
		// Get privileges current data.
		$sql_where = array($this->flexi_auth->db_column('user_privileges', 'id') => $privilege_id);
		$this->data['privilege'] = $this->flexi_auth->get_privileges_row_array(FALSE, $sql_where);
		
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

		$this->load->view('demo/admin_examples/privilege_update_view', $this->data);
	}
	
 	/**
 	 * update_user_privileges
 	 * Update the access privileges of a specific user.
 	 */
    function update_user_privileges($user_id)
    {
		// Check user has privileges to update user privileges, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('Update Privileges'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to update user privileges.</p>');
			redirect('auth_admin/manage_user_accounts');		
		}

		// If 'Update User Privilege' form has been submitted, update the user privileges.
		if ($this->input->post('update_user_privilege')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->update_user_privileges($user_id);
		}

		// Get users profile data.
		$sql_select = array(
			'upro_uacc_fk', 
			'upro_first_name', 
			'upro_last_name',
			$this->flexi_auth->db_column('user_acc', 'group_id'),
			$this->flexi_auth->db_column('user_group', 'name')
        );
		$sql_where = array($this->flexi_auth->db_column('user_acc', 'id') => $user_id);
		$this->data['user'] = $this->flexi_auth->get_users_row_array($sql_select, $sql_where);		

		// Get all privilege data. 
		$sql_select = array(
			$this->flexi_auth->db_column('user_privileges', 'id'),
			$this->flexi_auth->db_column('user_privileges', 'name'),
			$this->flexi_auth->db_column('user_privileges', 'description')
		);
		$this->data['privileges'] = $this->flexi_auth->get_privileges_array($sql_select);
		
		// Get user groups current privilege data.
		$sql_select = array($this->flexi_auth->db_column('user_privilege_groups', 'privilege_id'));
		$sql_where = array($this->flexi_auth->db_column('user_privilege_groups', 'group_id') => $this->data['user'][$this->flexi_auth->db_column('user_acc', 'group_id')]);
		$group_privileges = $this->flexi_auth->get_user_group_privileges_array($sql_select, $sql_where);
                
        $this->data['group_privileges'] = array();
        foreach($group_privileges as $privilege)
        {
            $this->data['group_privileges'][] = $privilege[$this->flexi_auth->db_column('user_privilege_groups', 'privilege_id')];
        }
                
		// Get users current privilege data.
		$sql_select = array($this->flexi_auth->db_column('user_privilege_users', 'privilege_id'));
		$sql_where = array($this->flexi_auth->db_column('user_privilege_users', 'user_id') => $user_id);
		$user_privileges = $this->flexi_auth->get_user_privileges_array($sql_select, $sql_where);
	
		// For the purposes of the example demo view, create an array of ids for all the users assigned privileges.
		// The array can then be used within the view to check whether the user has a specific privilege, this data allows us to then format form input values accordingly. 
		$this->data['user_privileges'] = array();
		foreach($user_privileges as $privilege)
		{
			$this->data['user_privileges'][] = $privilege[$this->flexi_auth->db_column('user_privilege_users', 'privilege_id')];
		}
	
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

        // For demo purposes of demonstrate whether the current defined user privilege source is getting privilege data from either individual user 
        // privileges or user group privileges, load the settings array containing the current privilege sources. 
		$this->data['privilege_sources'] = $this->auth->auth_settings['privilege_sources'];
                
		$this->load->view('demo/admin_examples/user_privileges_update_view', $this->data);		
    }
    
 	/**
 	 * update_group_privileges 
 	 * Update the access privileges of a specific user group.
 	 */
    function update_group_privileges($group_id)
    {
		// Check user has privileges to update group privileges, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('Update Privileges'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to update group privileges.</p>');
			redirect('auth_admin/manage_user_accounts');		
		}

		// If 'Update Group Privilege' form has been submitted, update the privileges of the user group.
		if ($this->input->post('update_group_privilege')) 
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->update_group_privileges($group_id);
		}
		
		// Get data for the current user group.
		$sql_where = array($this->flexi_auth->db_column('user_group', 'id') => $group_id);
		$this->data['group'] = $this->flexi_auth->get_groups_row_array(FALSE, $sql_where);
                
		// Get all privilege data. 
		$sql_select = array(
			$this->flexi_auth->db_column('user_privileges', 'id'),
			$this->flexi_auth->db_column('user_privileges', 'name'),
			$this->flexi_auth->db_column('user_privileges', 'description')
		);
		$this->data['privileges'] = $this->flexi_auth->get_privileges_array($sql_select);
		
		// Get data for the current privilege group.
		$sql_select = array($this->flexi_auth->db_column('user_privilege_groups', 'privilege_id'));
		$sql_where = array($this->flexi_auth->db_column('user_privilege_groups', 'group_id') => $group_id);
		$group_privileges = $this->flexi_auth->get_user_group_privileges_array($sql_select, $sql_where);
                
		// For the purposes of the example demo view, create an array of ids for all the privileges that have been assigned to a privilege group.
		// The array can then be used within the view to check whether the group has a specific privilege, this data allows us to then format form input values accordingly. 
		$this->data['group_privileges'] = array();
		foreach($group_privileges as $privilege)
		{
			$this->data['group_privileges'][] = $privilege[$this->flexi_auth->db_column('user_privilege_groups', 'privilege_id')];
		}
	
		// Set any returned status/error messages.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		

        // For demo purposes of demonstrate whether the current defined user privilege source is getting privilege data from either individual user 
        // privileges or user group privileges, load the settings array containing the current privilege sources. 
        $this->data['privilege_sources'] = $this->auth->auth_settings['privilege_sources'];
                
		$this->load->view('demo/admin_examples/user_group_privileges_update_view', $this->data);		
    }

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// User Activity
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
 	/**
 	 * list_user_status
 	 * Display a list of active or inactive user accounts. 
 	 * The active status of an account is based on whether the user has verified their account after registering - typically via email activation. 
 	 * This demo example simply shows a table of users that have, and have not activated their accounts.
 	 */
	function list_user_status($status = FALSE)
	{
		// Check user has privileges to view user accounts, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('View Users'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user accounts.</p>');
			redirect('auth_admin');		
		}

		// The view associated with this controller method is used by multiple methods, therefore set a page title.
		$this->data['page_title'] = ($status == 'inactive') ? 'Inactive Users' : 'Active Users';
		$this->data['status'] = ($status == 'inactive') ? 'inactive_users' : 'active_users'; // Indicate page function.
		
		// Get an array of all active/inactive user accounts, using the sql select and where statements defined below.
		// Note: The columns defined using the 'db_column()' functions are native table columns to the auth library. 
		// Read more on 'db_column()' functions in the quick help section near the top of this controller. 
		$sql_select = array(
			$this->flexi_auth->db_column('user_acc', 'id'),
			$this->flexi_auth->db_column('user_acc', 'email'),
			$this->flexi_auth->db_column('user_acc', 'active'),
			$this->flexi_auth->db_column('user_group', 'name'),
			// The following columns are located in the demo example 'demo_user_profiles' table, which is not required by the library.
			'upro_first_name', 
			'upro_last_name'
		);
		$sql_where[$this->flexi_auth->db_column('user_acc', 'active')] = ($status == 'inactive') ? 0 : 1;
		if (! $this->flexi_auth->in_group('Master Admin'))
		{
			// For this example, prevent any 'Master Admin' users being listed to non master admins.
			$sql_where[$this->flexi_auth->db_column('user_group', 'id').' !='] = 2;
		}
		$this->data['users'] = $this->flexi_auth->get_users_array($sql_select, $sql_where);
			
		$this->load->view('demo/admin_examples/users_view', $this->data);
	}

 	/**
 	 * delete_unactivated_users
 	 * Display a list of all user accounts that have not been activated within a define time period. 
 	 * This demo example allows the option to then delete all of the unactivated accounts.
 	 */
	function delete_unactivated_users()
	{
		// Check user has privileges to view user accounts, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('View Users'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user accounts.</p>');
			redirect('auth_admin');		
		}

		// Filter accounts old than set number of days.
		$inactive_days = 28;
	
		// If 'Delete Unactivated Users' form has been submitted and user has privileges to delete users.
		if ($this->input->post('delete_unactivated') && $this->flexi_auth->is_privileged('Delete Users'))
		{
			$this->load->model('demo_auth_admin_model');
			$this->demo_auth_admin_model->delete_users($inactive_days);
		}

		// Get an array of all user accounts that have not been activated within the defined limit ($inactive_days), using the sql select and where statements defined below.
		// Note: The columns defined using the 'db_column()' functions are native table columns to the auth library. 
		// Read more on 'db_column()' functions in the quick help section near the top of this controller. 
		$sql_select = array(
			$this->flexi_auth->db_column('user_acc', 'id'),
			$this->flexi_auth->db_column('user_acc', 'email'),
			$this->flexi_auth->db_column('user_acc', 'active'),
			$this->flexi_auth->db_column('user_group', 'name'),
			// The following columns are located in the demo example 'demo_user_profiles' table, which is not required by the library.
			'upro_first_name',
			'upro_last_name'
		);
		$this->data['users'] = $this->flexi_auth->get_unactivated_users_array($inactive_days, $sql_select);
				
		$this->load->view('demo/admin_examples/users_unactivated_view', $this->data);
	}
	
 	/**
 	 * failed_login_users
 	 * Display a list of all user accounts that have too many failed login attempts since the users last successful login. 
	 * The purpose of this example is to highlight user accounts that have either struggled to login, or that may be the subject of a brute force hacking attempt.
 	 */
	function failed_login_users()
	{
		// Check user has privileges to view user accounts, else display a message to notify the user they do not have valid privileges.
		if (! $this->flexi_auth->is_privileged('View Users'))
		{
			$this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view this page.</p>');
			redirect('auth_admin');		
		}

		// The view associated with this controller method is used by other methods, therefore set a page title.
		$this->data['page_title'] = 'Failed Login Users';
		$this->data['status'] = 'failed_login_users'; // Indicate page function.
		
		// Get an array of all user accounts that have more than 3 failed login attempts since their last successfuly login.
		// Note: The columns defined using the 'db_column()' functions are native table columns to the auth library. 
		// Read more on 'db_column()' functions in the quick help section near the top of this controller. 
		$sql_select = array(
			$this->flexi_auth->db_column('user_acc', 'id'),
			$this->flexi_auth->db_column('user_acc', 'email'),
			$this->flexi_auth->db_column('user_acc', 'failed_logins'),
			$this->flexi_auth->db_column('user_acc', 'active'),
			$this->flexi_auth->db_column('user_group', 'name'),
			// The following columns are located in the demo example 'demo_user_profiles' table, which is not required by the library.
			'upro_first_name',
			'upro_last_name'
		);
		$sql_where[$this->flexi_auth->db_column('user_acc', 'failed_logins').' >='] = 3; // Get users with 3 or more failed login attempts.
		if (! $this->flexi_auth->in_group('Master Admin'))
		{
			// For this example, prevent any 'Master Admin' users being listed to non master admins.
			$sql_where[$this->flexi_auth->db_column('user_group', 'id').' !='] = 2;
		}
		$this->data['users'] = $this->flexi_auth->get_users_array($sql_select, $sql_where);
		
		$this->load->view('demo/admin_examples/users_view', $this->data);
	}

}

/* End of file auth_admin.php */
/* Location: ./application/controllers/auth_admin.php */