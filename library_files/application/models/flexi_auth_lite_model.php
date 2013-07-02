<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: flexi auth Model Lite
*
* Author: 
* Rob Hussey
* flexiauth@haseydesign.com
* haseydesign.com/flexi-auth
*
* Copyright 2012 Rob Hussey
* 
* Previous Authors / Contributors:
* Ben Edmunds, benedmunds.com
* Phil Sturgeon, philsturgeon.co.uk
* Mathew Davies
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
* 
* http://www.apache.org/licenses/LICENSE-2.0
* 
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*
* Description: A full login authorisation and user management library for CodeIgniter based on Ion Auth (By Ben Edmunds) which itself was based on Redux Auth 2 (Mathew Davies)
* Released: 13/09/2012
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Flexi_auth_lite_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->config('flexi_auth', TRUE);
		$this->lang->load('flexi_auth');

		###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
		
		// Sessions and cookies
		$this->auth->session_name = $this->config->item('sessions','flexi_auth');
		$this->auth->cookie_name = $this->config->item('cookies','flexi_auth');
	
		// Get the current auth session, else get the default values
		if ($this->session->userdata($this->auth->session_name['name']) !== FALSE)
		{
			$this->auth->session_data = $this->session->userdata($this->auth->session_name['name']);
		}
		else
		{
			$this->auth->session_data = $this->set_auth_defaults();
		}
		
		// Database tables and settings
		$this->auth->database_config = $database_config = $this->config->item('database','flexi_auth');

		// Prefix each table column with the name of the parent table. 
		foreach($database_config as $table_key => $table_data)
		{
			if (! empty($table_data['table']) && ! empty($table_data['columns']))
			{
				foreach($table_data['columns'] as $column_reference => $column_name)
				{
					$database_config[$table_key]['columns'][$column_reference] = $table_data['table'].'.'.$column_name;
				}

				if (! empty($table_data['custom_columns']))
				{
					$database_config[$table_key]['custom_columns'] = array();

					foreach($table_data['custom_columns'] as $column_reference => $column_name)
					{
						$database_config[$table_key]['custom_columns'][$column_name] = $table_data['table'].'.'.$column_name;
					}
				}
			}
			// Prefix the primary key, foreign key and custom columns of any custom tables. 
			else if ($table_key == 'custom')
			{
				foreach($table_data as $custom_table_key => $table_data)
				{
					if (! empty($table_data['table']) && ! empty($table_data['primary_key']))
					{
						$database_config['custom'][$custom_table_key]['primary_key'] = $table_data['table'].'.'.$table_data['primary_key'];
					}
					if (! empty($table_data['table']) && ! empty($table_data['foreign_key']))
					{
						$database_config['custom'][$custom_table_key]['foreign_key'] = $table_data['table'].'.'.$table_data['foreign_key'];
					}
					if (! empty($table_data['table']) && ! empty($table_data['custom_columns']))
					{
						foreach($table_data['custom_columns'] as $column_reference => $column_name)
						{
							$database_config['custom'][$custom_table_key]['custom_columns'][$column_reference] =  $table_data['table'].'.'.$column_name;
						}
					}
				}
			}
		}

		// User session table
		$this->auth->tbl_user_session = $database_config['user_sess']['table'];
		$this->auth->tbl_join_user_session = $database_config['user_sess']['join'];
		$this->auth->tbl_col_user_session = $database_config['user_sess']['columns'];
		
		// User group table
		$this->auth->tbl_user_group = $database_config['user_group']['table'];
		$this->auth->tbl_join_user_group = $database_config['user_group']['join'];
		$this->auth->tbl_col_user_group = $database_config['user_group']['columns'];
		
		// User privilege tables
		$this->auth->tbl_user_privilege = $database_config['user_privileges']['table'];
		$this->auth->tbl_col_user_privilege = $database_config['user_privileges']['columns'];
		$this->auth->tbl_user_privilege_users = $database_config['user_privilege_users']['table'];
		$this->auth->tbl_col_user_privilege_users = $database_config['user_privilege_users']['columns'];
		
		// User group privilege tables
		$this->auth->tbl_user_privilege_groups = $database_config['user_privilege_groups']['table'];
		$this->auth->tbl_col_user_privilege_groups = $database_config['user_privilege_groups']['columns'];
		
		// User main account table
		$this->auth->tbl_user_account = $database_config['user_acc']['table'];
		$this->auth->tbl_join_user_account = $database_config['user_acc']['join'];
		$this->auth->tbl_col_user_account = array_merge($database_config['user_acc']['columns'], $database_config['user_acc']['custom_columns']);
		#$this->auth->tbl_custom_col_user_account = $database_config['user_acc']['custom_columns']; // Currently unused.

		// User custom data table(s)
		$this->auth->tbl_custom_data = (! empty($database_config['custom'])) ? $database_config['custom'] : array();
		
		// Database settings
		$this->auth->db_settings = $database_config['settings'];

		// Primary user identity column
		$this->auth->primary_identity_col = $database_config['user_acc']['table'].'.'.$database_config['settings']['primary_identity_col'];
		
		// Security settings
		$this->auth->auth_security = $this->config->item('security','flexi_auth');
		
		// General settings
		$this->auth->auth_settings = $this->config->item('settings','flexi_auth');
		
		// Email settings
		$this->auth->email_settings = $this->config->item('email','flexi_auth');
		
		// Set flexi auth SQL clauses
		$this->auth->select = $this->auth->join = $this->auth->order_by = $this->auth->group_by = $this->auth->limit = array();
		$this->auth->where = $this->auth->or_where = $this->auth->where_in = array();
		$this->auth->or_where_in = $this->auth->where_not_in = $this->auth->or_where_not_in = array();
		$this->auth->like = $this->auth->or_like = $this->auth->not_like = $this->auth->or_not_like = array();

		// Status and error messages.
		$this->auth->message_settings = $this->config->item('messages', 'flexi_auth');
		$this->auth->status_messages = array('public' => array(), 'admin' => array());
		$this->auth->error_messages = array('public' => array(), 'admin' => array());
		
		// Global template data.
		$this->auth->template_data = array();
	}
	
	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}	
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// GET USER METHOD
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_users
	 * Allows strings or arrays to pass SQL SELECT, WHERE and GROUP BY statements. Defaults to return all.
	 *
	 * @return object
	 * @author Rob Hussey
	 */
	public function get_users($sql_select = FALSE, $sql_where = FALSE, $sql_group_by = TRUE)
	{
	    // Left Join user group table to user account table.
	    $this->db->join(
			$this->auth->tbl_user_group, 
			$this->auth->tbl_col_user_account['group_id'].' = '.$this->auth->tbl_join_user_group, 'left'
		);

		// Left Join user custom data table(s) to user account table.
		foreach ($this->auth->tbl_custom_data as $table)
		{
			$this->db->join($table['table'], $this->auth->tbl_join_user_account.' = '.$table['join'], 'left');
		}

		// Group by users id to prevent multiple custom data rows to be listed per user.
		if ($sql_group_by === TRUE)
		{
			$this->db->group_by($this->auth->tbl_col_user_account['id']);
		}
		// Else, if a specific column is defined, group by that column.
		else if ($sql_group_by)
		{
			$this->db->group_by($sql_group_by);
		}
		
		// Set any custom defined SQL statements.
		$this->set_custom_sql_to_db($sql_select, $sql_where);

		return $this->db->get($this->auth->tbl_user_account);
	}
	

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// LOGOUT / VALIDATION METHODS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * logout
	 * Note: $all_sessions variable allows you to define whether to delete all database session or just the current session.
	 * When set to FALSE, this can be used to logout a user off of one computer (Internet Cafe) but not another (Home).
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	public function logout($all_sessions = TRUE)
	{
		$user_id = $this->auth->session_data[$this->auth->session_name['user_id']];
				
		// Delete database login sessions and 'Remember me' cookies.
		$this->delete_database_login_session($user_id, $all_sessions);

		// Delete session login data.
		$this->auth->session_data = $this->set_auth_defaults();
		$this->session->unset_userdata($this->auth->session_name['name']);

		// Run database maintenance function to clean up any expired login sessions.
		$this->delete_expired_remember_users();

		return TRUE;
	}

	/**
	 * logout_specific_user
	 * Logs a specific user out of all of their logged in sessions.
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	public function logout_specific_user($user_id = FALSE)
	{
		if (is_numeric($user_id))
		{
			// Delete database login sessions and 'Remember me' cookies.
			$this->delete_database_login_session($user_id, TRUE);
		}
		
		// Run database maintenance function to clean up any expired login sessions.
		$this->delete_expired_remember_users();

		return TRUE;
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
		
	/**
	 * delete_remember_me_cookies
	 * Delete any defined 'Remember me' cookies.
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	public function delete_remember_me_cookies()
	{
		if (get_cookie($this->auth->cookie_name['user_id']))
		{
			delete_cookie($this->auth->cookie_name['user_id']);
		}
		if ($remember_series = get_cookie($this->auth->cookie_name['remember_series']))
		{
			delete_cookie($this->auth->cookie_name['remember_series']);
		}
		if ($remember_token = get_cookie($this->auth->cookie_name['remember_token']))
		{
			delete_cookie($this->auth->cookie_name['remember_token']);
		}

		return TRUE;
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
		
	/**
	 * delete_database_login_session
	 * Delete database login sessions and delete 'Remember me' cookies.
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	public function delete_database_login_session($user_id, $all_sessions = TRUE)
	{
		if (!is_numeric($user_id))
		{
			return FALSE;
		}

		// Get 'Remember me' cookie values before they are deleted.
		$remember_token = get_cookie($this->auth->cookie_name['remember_token']);
		$remember_series = get_cookie($this->auth->cookie_name['remember_series']);

		// Delete 'Remember me' cookies if they exist.
		$this->delete_remember_me_cookies();

		###+++++++++++++++++++++++++++++++++###
		
		// Check whether to delete all sessions for user on all browers they may be logged in on, or just this session.
		if (!$all_sessions && isset($remember_token))
		{				
			// If deleting a login session not associated to a 'Remember me' cookie.
			if (!isset($remember_series))
			{
				$remember_series = '';
			}
					
			$sql_where = '('.
				$this->auth->tbl_col_user_session['user_id'].' = '.$this->db->escape($user_id).' AND '.
				$this->auth->tbl_col_user_session['series'].' = '.$this->db->escape($this->hash_cookie_token($remember_series)).' AND '.
				$this->auth->tbl_col_user_session['token'].' = '.$this->db->escape($this->hash_cookie_token($remember_token)).
			')';
			$this->db->where($sql_where, NULL, FALSE); 
			
			// Delete the login session token if it is set.
			if ($session_token = $this->auth->session_data[$this->auth->session_name['login_session_token']])
			{
				$sql_where = '('.
					$this->auth->tbl_col_user_session['user_id'].' = '.$this->db->escape($user_id).' AND '.
					$this->auth->tbl_col_user_session['token'].' = '.$this->db->escape($session_token).
				')';
				$this->db->or_where($sql_where, NULL, FALSE);
			}
		}
		else
		{
			$this->db->where($this->auth->tbl_col_user_session['user_id'], $user_id);
		}

		// Delete database session records.
		$this->db->delete($this->auth->tbl_user_session);

	    return $this->db->affected_rows() > 0;
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * validate_database_login_session
	 * Used in conjunction with $config['validate_login_onload'] set via the config file.
	 * Validates a browser login session token with a stored database login token.
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	public function validate_database_login_session()
	{
		$user_id = $this->auth->session_data[$this->auth->session_name['user_id']];
		$session_token = $this->auth->session_data[$this->auth->session_name['login_session_token']];
		
		$sql_where = array(
			$this->auth->tbl_col_user_account['id'] => $user_id,
			$this->auth->tbl_col_user_account['active'] => 1,
			$this->auth->tbl_col_user_account['suspend'] => 0,
			$this->auth->tbl_col_user_session['token'] => $session_token
		);

		// If a session expire time is defined, check its valid. 
		if ($this->auth->auth_security['login_session_expire'] > 0)
		{
			$sql_where[$this->auth->tbl_col_user_session['date'].' > '] = $this->database_date_time(-$this->auth->auth_security['login_session_expire']);
		}

	    $query = $this->db->from($this->auth->tbl_user_account)
			->join($this->auth->tbl_user_session, $this->auth->tbl_join_user_account.' = '.$this->auth->tbl_join_user_session)
			->where($sql_where)
			->get();
		
		###+++++++++++++++++++++++++++++++++###

	    // User login credentials are valid, continue as normal.
	    if ($query->num_rows() == 1)
	    {
			// Get database session token and hash it to try and match hashed cookie token if required for the 'logout_user_onclose' or 'login_via_password_token' features.
			$session_token = $query->row()->{$this->auth->database_config['user_sess']['columns']['token']};
			$hash_session_token = $this->hash_cookie_token($session_token);

			// Validate if user has closed their browser since login (Defined by config file).
			if ($this->auth->auth_security['logout_user_onclose'])
			{
				if (get_cookie($this->auth->cookie_name['login_session_token']) != $hash_session_token)
				{
					$this->set_error_message('login_session_expired', 'config');
					$this->logout(FALSE);
					return FALSE;
				}
			}
			// Check whether to unset the users 'Logged in via password' status if they closed their browser since login (Defined by config file). 
			else if ($this->auth->auth_security['unset_password_status_onclose'])
			{
				if (get_cookie($this->auth->cookie_name['login_via_password_token']) != $hash_session_token)
				{
					$this->delete_logged_in_via_password_session();
					return FALSE;
				}
			}
		
			// Extend users login time if defined by config file.
			if ($this->auth->auth_security['extend_login_session'])
			{
				// Set extension time.
				$sql_update[$this->auth->tbl_col_user_session['date']] = $this->database_date_time();
				
				$sql_where = array(
					$this->auth->tbl_col_user_session['user_id'] => $user_id,
					$this->auth->tbl_col_user_session['token'] => $session_token
				);
				
				$this->db->update($this->auth->tbl_user_session, $sql_update, $sql_where);
			}
			
			// If loading the 'complete' library, it extends the 'lite' library with additional functions, 
			// however, this would also runs the __construct twice, causing the user to wastefully be verified twice.
			// To counter this, the 'auth_verified' var is set to indicate the user has already been verified for this page load.
			return $this->auth_verified = TRUE;
		}
		// The users login session token has either expired, is invalid (Not found in database), or their account has been deactivated since login.
		// Attempt to log the user in via any defined 'Remember Me' cookies. 
		// If the "Remember me' cookies are valid, the user will have 'logged_in' credentials, but will have no 'logged_in_via_password' credentials.
	 	// If the user cannot be logged in via a 'Remember me' cookie, the user will be stripped of any login session credentials.
		// Note: If the user is also logged in on another computer using the same identity, those sessions are not deleted as they will be authenticated when they next login.
		else
		{
			$this->delete_logged_in_via_password_session();
			return FALSE;
		}
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
		
	/**
	 * delete_logged_in_via_password_session
	 * Attempt to log the user in via any defined 'Remember me' cookies.
	 * If the user cannot be logged in via a 'Remember me' cookie, then remove any login credentials assigned to the users session.
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	private function delete_logged_in_via_password_session()
	{
		$this->load->model('flexi_auth_model');
		if (! $this->flexi_auth_model->login_remembered_user())
		{
			$this->set_error_message('login_session_expired', 'config');
			$this->session->set_userdata(array($this->auth->session_name['name'] => $this->set_auth_defaults()));
		}
		
		return TRUE;
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
		
	/**
	 * delete_expired_remember_users
	 * Cleanup function to delete all expired 'Remember me' sessions from database.
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	public function delete_expired_remember_users($expire_time = FALSE)
	{
		if (!$expire_time)
		{
			$expire_time = $this->auth->auth_security['user_cookie_expire'];
		}
		
		// Create expire date.
		$expire_date = $this->database_date_time(-$expire_time);

	    $this->db->delete($this->auth->tbl_user_session, array($this->auth->tbl_col_user_session['date'].' < ' => $expire_date));
		
	    return $this->db->affected_rows() > 0;
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * hash_cookie_token
	 * Create a hash of users database session token, users browser details and a static salt.
	 * This can help invalidate hijacked cookies used from a different browser.
	 *
	 * @return bool
	 * @author Rob Hussey
	 */
	public function hash_cookie_token($data)
	{
		if (empty($data))
		{
			return FALSE;
		}
		
		$browser = $this->auth->auth_security['static_salt'].$this->input->server('HTTP_USER_AGENT');
		
		return sha1($data.$browser);
	}

	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// MESSAGES AND ERRORS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * set_message
	 * Set a status or error message to be displayed.
	 *
	 * @return void
	 * @author Rob Hussey
	 */
	private function set_message($message_type = FALSE, $message = FALSE, $target_user = 'public', $overwrite_existing = FALSE)
	{
		if (in_array($message_type, array('status', 'error')) && $message)
		{
			// Convert the target user to lowercase to ensure whether comparison values are matched. 
			$target_user = strtolower($target_user);

			// Check whether to use the target user set via the config file.
			if ($target_user === 'config' && isset($this->auth->message_settings['target_user'][$message]))
			{
				$target_user = $this->auth->message_settings['target_user'][$message];
			}

			// If $target_user exactly equals TRUE, set the target user as public.
			$target_user = ($target_user === TRUE) ? 'public' : $target_user;

			// Check whether a message should be set, if FALSE is defined, do not set the message.
			if (in_array($target_user, array('public', 'admin')))
			{
				$message_alias = ($message_type == 'status') ? 'status_messages' : 'error_messages';
				
				// Check whether to overwrite existing messages.
				if ($overwrite_existing)
				{
					$this->auth->{$message_alias} = array('public' => array(), 'admin' => array());
				}

				// Check message is not already in array to avoid displaying duplicates.
				if (! in_array($message, $this->auth->{$message_alias}[$target_user]))
				{
					$this->auth->{$message_alias}[$target_user][] = $message;
				}
			}
		}
			
		return $message;
	}

	/**
	 * set_status_message
	 * Set a status message to be displayed.
	 *
	 * @return void
	 * @author Rob Hussey
	 */
	public function set_status_message($status_message = FALSE, $target_user = 'public', $overwrite_existing = FALSE)
	{
		return $this->set_message('status', $status_message, $target_user, $overwrite_existing);
	}

	/**
	 * set_error_message
	 * Set an error message to be displayed.
	 *
	 * @return void
	 * @author Rob Hussey
	 */
	public function set_error_message($error_message = FALSE, $target_user = 'public', $overwrite_existing = FALSE)
	{
		return $this->set_message('error', $error_message, $target_user, $overwrite_existing);
	}

	###+++++++++++++++++++++++++++++++++###

	/**
	 * get_messages
	 * Get any status or error message(s) that may have been set by recently run functions. 
	 */
	private function get_messages($message_type = FALSE, $target_user = 'public', $prefix_delimiter = FALSE, $suffix_delimiter = FALSE)
	{	
		if (in_array($message_type, array('status', 'error')))
		{
			// If $target_user exactly equals TRUE, set the target user as public.
			$target_user = ($target_user === TRUE) ? 'public' : $target_user;

			// Convert the target user to lowercase to ensure whether comparison values are matched. 
			$target_user = strtolower($target_user);

			// Set message delimiters, by checking they do not exactly equal FALSE, we can allow NULL or empty '' delimiter values. 
			if (! $prefix_delimiter)
			{
				$prefix_delimiter = ($message_type == 'status') ? 
					$this->auth->message_settings['delimiters']['status_prefix'] : $this->auth->message_settings['delimiters']['error_prefix'];
			}
			if (! $suffix_delimiter)
			{
				$suffix_delimiter = ($message_type == 'status') ? 
					$this->auth->message_settings['delimiters']['status_suffix'] : $this->auth->message_settings['delimiters']['error_suffix'];
			}
			
			$message_alias = ($message_type == 'status') ? 'status_messages' : 'error_messages';

			// Get all messages for public users, or both public AND admin users.
			if ($target_user === 'public')
			{
				$messages = $this->auth->{$message_alias}['public'];
			}
			else
			{
				$messages = array_merge($this->auth->{$message_alias}['public'], $this->auth->{$message_alias}['admin']);
			}
			
			$statuses = FALSE;
			foreach ($messages as $message)
			{
				$message = ($this->lang->line($message)) ? $this->lang->line($message) : $message;
				$statuses .= $prefix_delimiter . $message . $suffix_delimiter;
			}
			
			return $statuses;
		}

		return FALSE;
	}

	/**
	 * status_messages
	 * Get any status message(s) that may have been set by recently run functions.
	 *
	 * @return void
	 * @author Rob Hussey
	 */
	public function status_messages($target_user = 'public', $prefix_delimiter = FALSE, $suffix_delimiter = FALSE)
	{
		return $this->get_messages('status', $target_user, $prefix_delimiter, $suffix_delimiter);
	}

	/**
	 * error_messages
	 * Get any error message(s) that may have been set by recently run functions.
	 *
	 * @return void
	 * @author Rob Hussey
	 */
	public function error_messages($target_user = 'public', $prefix_delimiter = FALSE, $suffix_delimiter = FALSE)
	{
		return $this->get_messages('error', $target_user, $prefix_delimiter, $suffix_delimiter);
	}	

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// MISC FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * database_date_time
	 * Format the current or a submitted date and time (in seconds). 
	 * Additional time can be added / subtracted.
	 *
	 * @return void
	 * @author Rob Hussey
	 */
	public function database_date_time($apply_time = 0, $time = FALSE, $force_unix = FALSE)
	{
		// Get timestamp of either submitted time or current time.
		if ($time)
		{
			$time = (is_numeric($time) && strlen($time) == 10) ? $time : strtotime($time);
		}
		else
		{
			$time = time();
		}
		
		// Add or subtract any submitted apply time.
		$time += $apply_time;
	
		// If database time is set as UNIX via config file, or if a unix time has been requested.
		if ((is_numeric($this->auth->db_settings['date_time']) && strlen($this->auth->db_settings['date_time']) == 10) || $force_unix)
		{
			return $time; 
		}
		else if (is_string($this->auth->db_settings['date_time']) && strtotime($this->auth->db_settings['date_time'])) // MySQL datetime.
		{
			return date('Y-m-d H:i:s', $time);
		}
		else // Return time set via config file.
		{
			return $this->auth->db_settings['date_time'];
		}
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * set_auth_defaults
	 * Sets the default auth session values
	 *
	 * @return void
	 * @author Rob Hussey
	 */
	public function set_auth_defaults()
	{
		foreach($this->auth->session_name as $session_name => $session_alias)
		{
			if (!in_array($session_name,array('name','math_captcha')))
			{
				$this->auth->session_data[$session_alias] = FALSE;
			}
		}

		$this->session->set_userdata(array($this->auth->session_name['name'] => $this->auth->session_data));
	}

	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// ACTIVE RECORD FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * set_sql_to_var
	 * Used internally by flexi auth to set an SQL statement to CI's Active Record.
	 *
	 * @return null
	 * @author Rob Hussey
	 */
	public function set_sql_to_var($sql_clause, $key = FALSE, $value = FALSE, $param = FALSE, $overwrite_existing = FALSE)
	{
		// Validate submitted data.
		if ($key === FALSE || (! is_array($key) && in_array($key, array('select', 'order_by', 'group_by', 'limit')) && $value === FALSE))
		{
			return FALSE;
		}
	
		// Check whether to overwrite any existing clause data.
		if ($overwrite_existing)
		{
			// If '$key' is an SQL WHERE clause of some kind, then remove all SQL WHERE statements.
			if (! in_array($key, array('select', 'join', 'order_by', 'group_by', 'limit')))
			{
				$this->auth->where = $this->auth->or_where = $this->auth->where_in = array();
				$this->auth->or_where_in = $this->auth->where_not_in = $this->auth->or_where_not_in = array();
				$this->auth->like = $this->auth->or_like = $this->auth->not_like = $this->auth->or_not_like = array();
			}
			// Else, just remove the specific '$key' SQL statement.
			else
			{
				$this->auth->$key = array();
			}
		}
		
		// Key, value and parameter method, used for LIKE and JOIN clauses.
		if (! is_array($key) && $value && $param) 
		{
			array_push($this->auth->$sql_clause, array('key_value_param_method' => array('key' => $key, 'value' => $value, 'param' => $param)));
		}
		// Key and value method.
		else if (! is_array($key) && $value) 
		{
			array_push($this->auth->$sql_clause, array('key_value_method' => array('key' => $key, 'value' => $value)));
		}
		// String or associative array method.
		else 
		{
			array_push($this->auth->$sql_clause, $key);
		}
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * set_custom_sql_to_db
	 * Used internally by flexi auth to call any custom user defined SQL Active Record functions at the correct point during a function.
	 *
	 * @return null
	 * @author Rob Hussey
	 */
	public function set_custom_sql_to_db($sql_select = FALSE, $sql_where = FALSE) 
	{
		// Set directly submitted SELECT and WHERE clauses.
		if (!empty($sql_select))
		{
			$this->db->select($sql_select);
		}

		if (!empty($sql_where))
		{
			$this->db->where($sql_where);
		}
	
		### ++++++++++++++++++++ ###
	
		// Set SQL clauses defined via flexi auth SQL Active Record functions.

		// Set array of all SQL clause types.
		$clause_types = array(
			'select', 'where', 'or_where', 'where_in', 'or_where_in', 'where_not_in', 'or_where_not_in', 
			'like', 'or_like', 'not_like', 'or_not_like', 'join', 'order_by', 'group_by', 'limit'
		);
		
		// Loop through clause types.
		foreach($clause_types as $sql_clause)
		{
			// If a clause is set.
			if (! empty($this->auth->$sql_clause))
			{
				// Loop through the clause array setting values using active record.
				foreach($this->auth->$sql_clause as $value)
				{
					// Key, value and parameter method.
					if (is_array($value) && key($value) === 'key_value_param_method') 
					{
						$data = current($value);					
						$this->db->$sql_clause($data['key'], $data['value'], $data['param']);
					}
					// Key and value method.
					else if (is_array($value) && key($value) === 'key_value_method') 
					{
						$data = current($value);
						$this->db->$sql_clause($data['key'], $data['value']);
					}
					// String or Associative array method.
					else 
					{
						$this->db->$sql_clause($value);
					}
				}
			}
		}
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * clear_arg_sql
	 * Clears any custom user defined SQL Active Record functions.
	 *
	 * @return null
	 * @author Rob Hussey
	 */
	public function clear_arg_sql() 
	{
		$this->auth->select = $this->auth->join = $this->auth->order_by = $this->auth->group_by = $this->auth->limit = array();
		$this->auth->where = $this->auth->or_where = $this->auth->where_in = array();
		$this->auth->or_where_in = $this->auth->where_not_in = $this->auth->or_where_not_in = array();
		$this->auth->like = $this->auth->or_like = $this->auth->not_like = $this->auth->or_not_like = array();
	}	
}

/* End of file flexi_auth_lite_model.php */
/* Location: ./application/controllers/flexi_auth_lite_model.php */
