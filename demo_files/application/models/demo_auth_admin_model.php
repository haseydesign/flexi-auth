<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo_auth_admin_model extends CI_Model {
	
	// The following method prevents an error occurring when $this->data is modified.
	// Error Message: 'Indirect modification of overloaded property Demo_cart_admin_model::$data has no effect'.
	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}
		
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// User Accounts
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

 	/**
	 * get_user_accounts
	 * Gets a paginated list of users that can be filtered via the user search form, filtering by the users email and first and last names.
	 */
	function get_user_accounts()
	{
		// Select user data to be displayed.
		$sql_select = array(
			$this->flexi_auth->db_column('user_acc', 'id'),
			$this->flexi_auth->db_column('user_acc', 'email'),
			$this->flexi_auth->db_column('user_acc', 'suspend'),
			$this->flexi_auth->db_column('user_group', 'name'),
			'upro_first_name',
			'upro_last_name',
		);
		$this->flexi_auth->sql_select($sql_select);

		// For this example, prevent any 'Master Admin' users (User group id of 3) being listed to non 'Master Admin' users.
		if (! $this->flexi_auth->in_group('Master Admin'))
		{
			$sql_where[$this->flexi_auth->db_column('user_group', 'id').' !='] = 3;
			$this->flexi_auth->sql_where($sql_where);
		}	

		// Get url for any search query or pagination position.
		$uri = $this->uri->uri_to_assoc(3);

		// Set pagination limit, get current position and get total users.
		$limit = 10;
		$offset = (isset($uri['page'])) ? $uri['page'] : FALSE;		
		
		// Set SQL WHERE condition depending on whether a user search was submitted.
		if (array_key_exists('search', $uri))
		{
			// Set pagination url to include search query.
			$pagination_url = 'auth_admin/manage_user_accounts/search/'.$uri['search'].'/';
			$config['uri_segment'] = 6; // Changing to 6 will select the 6th segment, example 'controller/function/search/query/page/10'.

			// Convert uri '-' back to ' ' spacing.
			$search_query = str_replace('-',' ',$uri['search']);
								
			// Get users and total row count for pagination.
			// Custom SQL SELECT, WHERE and LIMIT statements have been set above using the sql_select(), sql_where(), sql_limit() functions.
			// Using these functions means we only have to set them once for them to be used in future function calls.
			$total_users = $this->flexi_auth->search_users_query($search_query)->num_rows();			
			
			$this->flexi_auth->sql_limit($limit, $offset);
			$this->data['users'] = $this->flexi_auth->search_users_array($search_query);
		}
		else
		{
			// Set some defaults.
			$pagination_url = 'auth_admin/manage_user_accounts/';
			$search_query = FALSE;
			$config['uri_segment'] = 4; // Changing to 4 will select the 4th segment, example 'controller/function/page/10'.
			
			// Get users and total row count for pagination.
			// Custom SQL SELECT and WHERE statements have been set above using the sql_select() and sql_where() functions.
			// Using these functions means we only have to set them once for them to be used in future function calls.
			$total_users = $this->flexi_auth->get_users_query()->num_rows();

			$this->flexi_auth->sql_limit($limit, $offset);
			$this->data['users'] = $this->flexi_auth->get_users_array();
		}
		
		// Create user record pagination.
		$this->load->library('pagination');	
		$config['base_url'] = base_url().$pagination_url.'page/';
		$config['total_rows'] = $total_users;
		$config['per_page'] = $limit; 
		$this->pagination->initialize($config); 
		
		// Make search query and pagination data available to view.
		$this->data['search_query'] = $search_query; // Populates search input field in view.
		$this->data['pagination']['links'] = $this->pagination->create_links();
		$this->data['pagination']['total_users'] = $total_users;
	}

 	/**
	 * update_user_accounts
	 * The function loops through all POST data checking the 'Suspend' and 'Delete' checkboxes that have been checked, and updates/deletes the user accounts accordingly.
	 */
	function update_user_accounts()
    {
		// If user has privileges, delete users.
		if ($this->flexi_auth->is_privileged('Delete Users')) 
		{
			if ($delete_users = $this->input->post('delete_user'))
			{
				foreach($delete_users as $user_id => $delete)
				{
					// Note: As the 'delete_user' input is a checkbox, it will only be present in the $_POST data if it has been checked,
					// therefore we don't need to check the submitted value.
					$this->flexi_auth->delete_user($user_id);
				}
			}
		}
			
		// Update User Suspension Status.
		// Suspending a user prevents them from logging into their account.
		if ($user_status = $this->input->post('suspend_status'))
		{
			// Get current statuses to check if submitted status has changed.
			$current_status = $this->input->post('current_status');
			
			foreach($user_status as $user_id => $status)
			{
				if ($current_status[$user_id] != $status)
				{
					if ($status == 1)
					{
						$this->flexi_auth->update_user($user_id, array($this->flexi_auth->db_column('user_acc', 'suspend') => 1));
					}
					else
					{
						$this->flexi_auth->update_user($user_id, array($this->flexi_auth->db_column('user_acc', 'suspend') => 0));
					}
				}
			}
		}
			
		// Save any public or admin status or error messages to CI's flash session data.
		$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
		
		// Redirect user.
		redirect('auth_admin/manage_user_accounts');			
	}

 	/**
	 * update_user_account
	 * Updates the account and profile data of a specific user.
	 * Note: The user profile table ('demo_user_profiles') is used in this demo as an example of relating additional user data to the auth libraries account tables. 
	 */
	function update_user_account($user_id)
	{
		$this->load->library('form_validation');

		// Set validation rules.
		$validation_rules = array(
			array('field' => 'update_first_name', 'label' => 'First Name', 'rules' => 'required'),
			array('field' => 'update_last_name', 'label' => 'Last Name', 'rules' => 'required'),
			array('field' => 'update_phone_number', 'label' => 'Phone Number', 'rules' => 'required'),
			array('field' => 'update_newsletter', 'label' => 'Newsletter', 'rules' => 'integer'),
			array('field' => 'update_email_address', 'label' => 'Email Address', 'rules' => 'required|valid_email|identity_available['.$user_id.']'),
			array('field' => 'update_username', 'label' => 'Username', 'rules' => 'min_length[4]|identity_available['.$user_id.']'),
			array('field' => 'update_group', 'label' => 'User Group', 'rules' => 'required|integer')
		);

		$this->form_validation->set_rules($validation_rules);
		
		if ($this->form_validation->run())
		{
			// 'Update User Account' form data is valid.
			// IMPORTANT NOTE: As we are updating multiple tables (The main user account and user profile tables), it is very important to pass the
			// primary key column and value in the $profile_data for any custom user tables being updated, otherwise, the function will not
			// be able to identify the correct custom data row.
			// In this example, the primary key column and value is 'upro_id' => $user_id.
			$profile_data = array(
				'upro_id' => $user_id,
				'upro_first_name' => $this->input->post('update_first_name'),
				'upro_last_name' => $this->input->post('update_last_name'),
				'upro_phone' => $this->input->post('update_phone_number'),
				'upro_newsletter' => $this->input->post('update_newsletter'),
				$this->flexi_auth->db_column('user_acc', 'email') => $this->input->post('update_email_address'),
				$this->flexi_auth->db_column('user_acc', 'username') => $this->input->post('update_username'),
				$this->flexi_auth->db_column('user_acc', 'group_id') => $this->input->post('update_group')
			);			

			// If we were only updating profile data (i.e. no email, username or group included), we could use the 'update_custom_user_data()' function instead.
			$this->flexi_auth->update_user($user_id, $profile_data);
				
			// Save any public or admin status or error messages to CI's flash session data.
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			
			// Redirect user.
			redirect('auth_admin/manage_user_accounts');			
		}
		
		return FALSE;
	}

 	/**
	 * delete_users
	 * Delete all user accounts that have not been activated X days since they were registered.
	 */
	function delete_users($inactive_days)
	{
		// Deleted accounts that have never been activated.
		$this->flexi_auth->delete_unactivated_users($inactive_days);

		// Save any public or admin status or error messages to CI's flash session data.
		$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
		
		// Redirect user.
		redirect('auth_admin/manage_user_accounts');			
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// User Groups
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

  	/**
	 * manage_user_groups
	 * The function loops through all POST data checking the 'Delete' checkboxes that have been checked, and deletes the associated user groups.
	 */
   function manage_user_groups()
    {
		// Delete groups.
		if ($delete_groups = $this->input->post('delete_group'))
		{
			foreach($delete_groups as $group_id => $delete)
			{
				// Note: As the 'delete_group' input is a checkbox, it will only be present in the $_POST data if it has been checked,
				// therefore we don't need to check the submitted value.
				$this->flexi_auth->delete_group($group_id);
			}
		}

		// Save any public or admin status or error messages to CI's flash session data.
		$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
		
		// Redirect user.
		redirect('auth_admin/manage_user_groups');			
	}
	
  	/**
	 * insert_user_group
	 * Inserts a new user group.
	 */
	function insert_user_group()
	{
		$this->load->library('form_validation');

		// Set validation rules.
		$validation_rules = array(
			array('field' => 'insert_group_name', 'label' => 'Group Name', 'rules' => 'required'),
			array('field' => 'insert_group_admin', 'label' => 'Admin Status', 'rules' => 'integer')
		);
		
		$this->form_validation->set_rules($validation_rules);
		
		if ($this->form_validation->run())
		{
			// Get user group data from input.
			$group_name = $this->input->post('insert_group_name');
			$group_desc = $this->input->post('insert_group_description');
			$group_admin = ($this->input->post('insert_group_admin')) ? 1 : 0;

			$this->flexi_auth->insert_group($group_name, $group_desc, $group_admin);
				
			// Save any public or admin status or error messages to CI's flash session data.
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			
			// Redirect user.
			redirect('auth_admin/manage_user_groups');			
		}
	}
	
  	/**
	 * update_user_group
	 * Updates a specific user group.
	 */
	function update_user_group($group_id)
	{
		$this->load->library('form_validation');

		// Set validation rules.
		$validation_rules = array(
			array('field' => 'update_group_name', 'label' => 'Group Name', 'rules' => 'required'),
			array('field' => 'update_group_admin', 'label' => 'Admin Status', 'rules' => 'integer')
		);
		
		$this->form_validation->set_rules($validation_rules);
		
		if ($this->form_validation->run())
		{
			// Get user group data from input.
			$data = array(
				$this->flexi_auth->db_column('user_group', 'name') => $this->input->post('update_group_name'),
				$this->flexi_auth->db_column('user_group', 'description') => $this->input->post('update_group_description'),
				$this->flexi_auth->db_column('user_group', 'admin') => $this->input->post('update_group_admin')
			);			

			$this->flexi_auth->update_group($group_id, $data);
				
			// Save any public or admin status or error messages to CI's flash session data.
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			
			// Redirect user.
			redirect('auth_admin/manage_user_groups');			
		}
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Privileges
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

  	/**
	 * manage_privileges
	 * The function loops through all POST data checking the 'Delete' checkboxes that have been checked, and deletes the associated privileges.
	 */
    function manage_privileges()
    {
		// Delete privileges.
		if ($delete_privileges = $this->input->post('delete_privilege'))
		{
			foreach($delete_privileges as $privilege_id => $delete)
			{
				// Note: As the 'delete_privilege' input is a checkbox, it will only be present in the $_POST data if it has been checked,
				// therefore we don't need to check the submitted value.
				$this->flexi_auth->delete_privilege($privilege_id);
			}
		}

		// Save any public or admin status or error messages to CI's flash session data.
		$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
		
		// Redirect user.
		redirect('auth_admin/manage_privileges');			
	}

  	/**
	 * insert_privilege
	 * Inserts a new privilege.
	 */
	function insert_privilege()
	{
		$this->load->library('form_validation');

		// Set validation rules.
		$validation_rules = array(
			array('field' => 'insert_privilege_name', 'label' => 'Privilege Name', 'rules' => 'required')
		);
		
		$this->form_validation->set_rules($validation_rules);
		
		if ($this->form_validation->run())
		{
			// Get privilege data from input.
			$privilege_name = $this->input->post('insert_privilege_name');
			$privilege_desc = $this->input->post('insert_privilege_description');

			$this->flexi_auth->insert_privilege($privilege_name, $privilege_desc);
				
			// Save any public or admin status or error messages to CI's flash session data.
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			
			// Redirect user.
			redirect('auth_admin/manage_privileges');			
		}
	}
	
  	/**
	 * update_privilege
	 * Updates a specific privilege.
	 */
	function update_privilege($privilege_id)
	{
		$this->load->library('form_validation');

		// Set validation rules.
		$validation_rules = array(
			array('field' => 'update_privilege_name', 'label' => 'Privilege Name', 'rules' => 'required')
		);
		
		$this->form_validation->set_rules($validation_rules);
		
		if ($this->form_validation->run())
		{
			// Get privilege data from input.
			$data = array(
				$this->flexi_auth->db_column('user_privileges', 'name') => $this->input->post('update_privilege_name'),
				$this->flexi_auth->db_column('user_privileges', 'description') => $this->input->post('update_privilege_description')
			);			

			$this->flexi_auth->update_privilege($privilege_id, $data);
				
			// Save any public or admin status or error messages to CI's flash session data.
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			
			// Redirect user.
			redirect('auth_admin/manage_privileges');			
		}
	}
	
   	/**
	 * update_user_privileges
	 * Updates the privileges for a specific user.
	 */
	function update_user_privileges($user_id)
    {
		// Update privileges.
		foreach($this->input->post('update') as $row)
		{
			if ($row['current_status'] != $row['new_status'])
			{
				// Insert new user privilege.
				if ($row['new_status'] == 1)
				{
					$this->flexi_auth->insert_privilege_user($user_id, $row['id']);	
				}
				// Delete existing user privilege.
				else
				{
					$sql_where = array(
						$this->flexi_auth->db_column('user_privilege_users', 'user_id') => $user_id,
						$this->flexi_auth->db_column('user_privilege_users', 'privilege_id') => $row['id']
					);
					
					$this->flexi_auth->delete_privilege_user($sql_where);
				}
			}
		}

		// Save any public or admin status or error messages to CI's flash session data.
		$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
		
		// Redirect user.
		redirect('auth_admin/manage_user_accounts');			
	}

   	/**
	 * update_group_privileges
	 * Updates the privileges for a specific user group.
	 */
	function update_group_privileges($group_id)
    {
		// Update privileges.
		foreach($this->input->post('update') as $row)
		{
			if ($row['current_status'] != $row['new_status'])
			{
				// Insert new user privilege.
				if ($row['new_status'] == 1)
				{
					$this->flexi_auth->insert_user_group_privilege($group_id, $row['id']);	
				}
				// Delete existing user privilege.
				else
				{
					$sql_where = array(
						$this->flexi_auth->db_column('user_privilege_groups', 'group_id') => $group_id,
						$this->flexi_auth->db_column('user_privilege_groups', 'privilege_id') => $row['id']
					);
					
					$this->flexi_auth->delete_user_group_privilege($sql_where);
				}
			}
		}

		// Save any public or admin status or error messages to CI's flash session data.
		$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
		
		// Redirect user.
		redirect('auth_admin/manage_user_groups');			
    }
}

/* End of file demo_auth_admin_model.php */
/* Location: ./application/models/demo_auth_admin_model.php */