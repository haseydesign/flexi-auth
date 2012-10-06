<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Setting User Account Data | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for setting user account data in flexi auth."/> 
	<meta name="keywords" content="user account data, user guide, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="user_guide">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- User Guide Navigation -->
	<?php $this->load->view('includes/user_guide_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="intro_text">
				<h1>User Guide | Setting User Account Data</h1>
				<p>The flexi auth library functions for setting data to the user account tables.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Set User Account Data</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_account_index">User Account Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_config">User Account Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_get_data">Get User Account Data</a>

			<div class="anchor_nav">
				<h6>User CRUD Functions</h6>
				<p>
					<a href="#insert_user">insert_user()</a> | 
					<a href="#update_user">update_user()</a> | 
					<a href="#delete_user">delete_user()</a>
				</p>
				
				<h6>Custom User Data CRUD Functions</h6>
				<p>
					<a href="#insert_custom_user_data">insert_custom_user_data()</a> | 
					<a href="#update_custom_user_data">update_custom_user_data()</a> | 
					<a href="#delete_custom_user_data">delete_custom_user_data()</a>
				</p>

				<h6>User Activation Functions</h6>
				<p>
					<a href="#activate_user">activate_user()</a> | 
					<a href="#deactivate_user">deactivate_user()</a> | 
					<a href="#delete_unactivated_users">delete_unactivated_users()</a>
				</p>

				<h6>Password Management Functions</h6>
				<p>
					<a href="#change_password">change_password()</a> | 
					<a href="#forgotten_password">forgotten_password()</a> | 
					<a href="#validate_forgotten_password">validate_forgotten_password()</a> | 
					<a href="#forgotten_password_complete">forgotten_password_complete()</a>
				</p>

				<h6>Email Management Functions</h6>
				<p>
					<a href="#update_email_via_verification">update_email_via_verification()</a> | 
					<a href="#verify_updated_email">verify_updated_email()</a>
				</p>
			</div>
				
			<a name="help"></a>
			<div class="w100 frame">
				<h3 class="heading">Help with Function Parameters</h3>
				<span class="toggle">Show / Hide Help</span>
				<div id="help_guide" class="hide_toggle">
					<hr/>
					<p><strong>Name</strong>: The name of the function parameter (argument).</p>
					<p>
						<strong>Data Type</strong>: The data type that is expected by the parameter.
						<ul>
							<li><em>bool</em> : Requires a boolean value of 'TRUE' or 'FALSE'.</li>
							<li><em>string</em> : Requires a textual value.</li>
							<li><em>int</em> : Requires a numeric value. It does not matter whether the value is an integer, float, decimal etc.</li>
							<li><em>array</em> : Requires an array.</li>
						</ul>
					</p>
					<p><strong>Required</strong>: Defines whether the parameter requires a value to be submitted.</p>
					<p><strong>Default</strong>: Defines the default parameter value that is used if no other value is submitted.</p>
				</div>
			</div>
			
			<a name="insert_user"></a>
			<div class="w100 frame">
				<h3 class="heading">insert_user()</h3>
				
				<p>Inserts user account and profile data, returning the users new id.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>insert_user(email, username, password, user_data, group_id, activate)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>email</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the user email address.</td>
						</tr>
						<tr>
							<td>username</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes/No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the users username.<br/>
								If the username table column is defined as an identity column via the '<a href="<?php echo $base_url; ?>user_guide/user_account_config#database_config_settings">identity_cols</a>' setting in the config. file, then an argument value is required.
							</td>
						</tr>
						<tr>
							<td>password</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the users password (As plain text).</td>
						</tr>
						<tr>
							<td>user_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines any custom user data that is to be inserted to the database.<br/>
								This data would typically be user profile data as such as the users name, address etc.
							</td>
						</tr>
						<tr>
							<td>group_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the user group that the user should be assigned to.</td>
						</tr>
						<tr>
							<td>activate</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether the users account should be immediately activated.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>
						The function initially checks that the users email address and username (If defined) are unique.<br/>
						If the username if not unique, and the config. file is defined to auto increment usernames, then the function will start a loop, suffixing a number to the username until a unique username is found.
					</p>
					<p>The function thens check whether a group id was defined via the functions arguments, if no value is found, then the default group id defined via the config. file will be used.</p>
					<p>The users password is then hashed using the <a href="http://www.openwall.com/phpass/">PHPASS library</a> with any additional static and database salt that may have been defined via the config. file.</p>
					<p>The function will then proceed to automatically set other data required by the library, as such as the users ip address an account activatation token, and whether to auto suspend the users account on insert.</p>
					<p>A database transaction is then started so that if any SQL errors occur during the transaction, all database changes are auto rolled back to their original values.</p>
					<p>The compiled user data is then inserted to the database. Any defined custom user data is then looped through and inserted to the relevant custom user tables.</p>
					<p>
						Once the data is inserted, the function will check whether to auto activate the users account. The account can be defined to be activated for a short time period, or indefinitely via the config. file.<br/>
						If the account is not auto activated, an email with an activation token is emailed to the user.
					</p>
					<p>Finally, the function returns the newly inserted users id.</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>To insert custom user data via the function, an associative array must be passed to the '<em>user_data</em>' argument.</p>
					<p>The function relates each array key with the name of each table column, the assoicated array value contains the value that is to be inserted into the table.</p>
					<p>For the function to be able to match the array keys with each table column, the name of each table column must be defined via the config. file.</p>
<pre>
<span class="comment">// Example of defining custom columns within the libraries primary user account table.</span>
$config['database']['user_acc']['custom_columns'] = array(
	'custom_col_1', 'custom_col_2', 'custom_col_3'
);
</pre>
<pre>
<span class="comment">// Example of defining custom columns within a custom user table.</span>
$config['database']['custom']['custom_user_table']['custom_columns'] = array(
	'custom_col_1', 'custom_col_2', 'custom_col_3'
);
</pre>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>int | id of the inserted record | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example : Insert a new user with two custom user columns.</span>
$email = 'user@email.com';
$username = 'custom_username';
$password = 'password123';
$user_data = array(
	'custom_col_1' => 'custom_value_1',
	'custom_col_2' => 'custom_value_2'
);
$group_id = 1;
$activate = FALSE;

$this->flexi_auth->insert_user($email, $username, $password, $user_data, $group_id, $activate);
</pre>
			</div>

			<a name="update_user"></a>
			<div class="w100 frame">
				<h3 class="heading">update_user()</h3>
				
				<p>Updates the main user account table and any related custom user tables with the submitted data.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>update_user(user_id, user_data)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user to be updated.</td>
						</tr>
						<tr>
							<td>user_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the user data that is to be updated.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function first runs an SQL SELECT query to get the identity of the users account being updated.</p>
					<p>
						The submitted user data array is then checked to determine whether the users identity is being updated.<br/>
						If it is, then the function checks whether the new identity is unique and available.
					</p>
					<p>A database transaction is then started so that if any SQL errors occur during the transaction, all database changes are auto rolled back to their original values.</p>
					<p>
						The function then loops through each row within the user data array adding the data to an SQL update statement.<br/>
						If a new password is included in the array, the function will automatically hash the password.
					</p>
					<p>If the users identity is in the array, the function will update the browsers session data once the update is successful.</p>
				</div>
						
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>To update user data via the function, an associative array must be passed to the '<em>user_data</em>' argument.</p>
					<p>The function relates each array key with the name of each table column, the assoicated array value contains the value that is to be inserted into the table.</p>
					<p>For the function to be able to match the array keys with each table column, the name of each table column must be defined via the config. file.</p>
<pre>
<span class="comment">// Example of defining custom columns within the libraries user account table.</span>
$config['database']['user_acc']['custom_columns'] = array(
	'custom_col_1', 'custom_col_2', 'custom_col_3'
);
</pre>
<pre>
<span class="comment">// Example of defining custom columns within a custom user table.</span>
$config['database']['custom']['custom_user_table']['custom_columns'] = array(
	'custom_col_1', 'custom_col_2', 'custom_col_3'
);
</pre>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example : Updating the users email, password and two custom columns.</span>
$user_id = 101;
$user_data = array(
	'email' => 'user@email.com',
	'password' => 'password123',
	'custom_col_1' => 'custom_value_1',
	'custom_col_2' => 'custom_value_2'
);

$this->flexi_auth->update_user($user_id, $user_data);
</pre>
			</div>

			<a name="delete_user"></a>
			<div class="w100 frame">
				<h3 class="heading">delete_user()</h3>
				
				<p>Deletes a user account and all related custom user tables from the database.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>delete_user(user_id)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the user id of the user account to be deleted.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>A database transaction is started so that if any SQL errors occur during the transaction, all database changes are auto rolled back to their original values.</p>
					<p>All user session data is then deleted from the database, followed by the users account data, all related custom user data and any related user privilege data.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$user_id = 101;

$this->flexi_auth->delete_user($user_id);
</pre>
			</div>

			<a name="insert_custom_user_data"></a>
			<div class="w100 frame">
				<h3 class="heading">insert_custom_user_data()</h3>
				
				<p>Inserts data into a custom user table and returns the table name and row id of each record inserted.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>insert_custom_user_data(user_id, custom_data)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the user id of the user to insert data to.</td>
						</tr>
						<tr>
							<td>custom_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the custom user data that is to be inserted to the database.<br/>
								This data would typically be user profile data as such as the users name, address etc.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>
						The function loops through all the custom user tables that are defined via the config. file.<br/>
						Within the loop, the function matches the names of the table columns with the array keys of the custom user data array.  
					</p>
					<p>Once the custom user data has been matched to the related custom user table, the data is inserted into each table.</p>
					<p>The name and id of each table and row is then added to the returned array data.</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>To update custom user data via the function, an associative array must be passed to the '<em>custom_data</em>' argument.</p>
					<p>The function relates each array key with the name of each table column, the assoicated array value contains the value that is to be inserted into the table.</p>
					<p>For the function to be able to match the array keys with each table column, the name of each table column must be defined via the config. file.</p>
<pre>
<span class="comment">// Example of defining custom columns within a custom user table.</span>
$config['database']['custom']['custom_user_table']['custom_columns'] = array(
	'custom_col_1', 'custom_col_2', 'custom_col_3'
);
</pre>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>Array | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$custom_data = array(
	'custom_col_1' => 'custom_value_1',
	'custom_col_2' => 'custom_value_2'
);

$this->flexi_auth->insert_custom_user_data($custom_data);
</pre>
			</div>

			<a name="update_custom_user_data"></a>
			<div class="w100 frame">
				<h3 class="heading">update_custom_user_data()</h3>
				
				<p>Updates a custom user table with any submitted data.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>update_custom_user_data(table, row_id, custom_data)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>table</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the name of the table to update data to.<br/>
								If no specific table is defined, the function will loop through all custom tables defined via the config. file.
							</td>
						</tr>
						<tr>
							<td>row_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the table row id of the table to update data to.<br/>
								If no specific row id is defined, the function will attempt to find the primary or foreign key value defined within the custom user data.
							</td>
						</tr>
						<tr>
							<td>custom_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the custom user data that is to be updated.<br/>
								This data would typically be user profile data as such as the users name, address etc.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>If a specific table and row id have been specified, the function will simply loop through the custom user data can create an SQL update statement.</p>
					<p>
						If no table is specified, the function will loop through each custom user table defined via the config. file.<br/>
						Within each loop, the function will attempt to match the custom user data values with the primary or foreign key of each table define via the config. file.<br/>
						If the tables primary or foreign key column is found within the custom user data, it will be used for the SQL WHERE statement. 
					</p>
					<p>The function then loops through the custom data and tries to match it with each custom table, when data is matched, it is added to an SQL update statement, and the data is removed from the custom data array.</p>
					<p>
						Once the loop has finish the function checks whether all the custom data has been assigned to an SQL update statement.<br/>
						If any custom data remains unassigned, the function returns FALSE to prevent updating some custom data, and not others.<br/>
						If all custom data has been assigned to an SQL update statement, then each update statement is run.
					</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>
						If defining which row to update via a primary/foreign key value within the custom data array, then it is important to ensure all custom table columns are named uniquely.<br/>
						This means no other custom user table should have an identically named column, otherwise the wrong table column could be updated.
					</p>
					<p>Typically, if only updating data within one table, you should pass the 'table' and 'row_id' arguments to the function.</p>
					<hr/>
					<p>To update custom user data via the function, an associative array must be passed to the '<em>custom_data</em>' argument.</p>
					<p>The function relates each array key with the name of each table column, the assoicated array value contains the value that is to be inserted into the table.</p>
					<p>For the function to be able to match the array keys with each table column, the name of each table column must be defined via the config. file.</p>
<pre>
<span class="comment">// Example of defining custom columns within a custom user table.</span>
$config['database']['custom']['custom_user_table']['custom_columns'] = array(
	'custom_col_1', 'custom_col_2', 'custom_col_3'
);
</pre>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Defining a table and row id to update with custom user data.</span>
$table = 'custom_table';
$row_id = '101';
$custom_data = array(
	'custom_col_1' => 'custom_value_1',
	'custom_col_2' => 'custom_value_2'
);

$this->flexi_auth->update_custom_user_data($table, $row_id, $custom_data);
</pre>
<pre>
<span class="comment">// Example #2 : Defining the table and row id to update within the custom user data array.</span>
$custom_data = array(
	'custom_tbl_1_primary_key' => '101',
	'custom_tbl_1_col_1' => 'custom_value_1a',
	'custom_tbl_1_col_2' => 'custom_value_2a',
	'custom_tbl_2_primary_key' => '201',
	'custom_tbl_2_col_1' => 'custom_value_1b'
);

$this->flexi_auth->update_custom_user_data(FALSE, FALSE, $custom_data);
</pre>
			</div>

			<a name="delete_custom_user_data"></a>
			<div class="w100 frame">
				<h3 class="heading">delete_custom_user_data()</h3>
				
				<p>Deletes a data row from a custom user table.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>delete_custom_user_data(table, row_id)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>table</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the name of the table to delete data from.</td>
						</tr>
						<tr>
							<td>row_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the table row id of the table to delete data from.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>
						The function loops through the custom tables defined via the config. file.<br/>
						When a table is matched, an SQL delete statement is run that matches the tables primary key against the '<em>row_id</em>'. 
					</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$table = 'custom_table';
$row_id = 101;

$this->flexi_auth->delete_custom_user_data($table, $row_id);
</pre>
			</div>

			<a name="activate_user"></a>
			<div class="w100 frame">
				<h3 class="heading">activate_user()</h3>
				
				<p>Activates a users account allowing them to login to their account.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>activate_user(user_id, activation_token, verify_token)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user account to be activated.</td>
						</tr>
						<tr>
							<td>activation_token</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the token to be validated in order for the account to be activated.<br/>
								User accounts can be activated without passing a token if the '<em>verify_token</em>' argument is set as FALSE.
							</td>
						</tr>
						<tr>
							<td>verify_token</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">TRUE</td>
							<td>Defines whether the account can only be activated if a valid activation token is passed.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>If the function is defined to verify an activation token, an SQL SELECT query is run to find a user with a matching user id and activation token.</p>
					<p>Provided the token is validated, an SQL UPDATE statement is run to remove the existing activation token and to set the account as active.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Activate a users account using a token.</span>
$user_id = 101;
$activation_token = '9e89d44df40a7387ba4921f5f18bb8dd8ebfdb80';
$verify_token = TRUE;

$this->flexi_auth->activate_user($user_id, $activation_token, $verify_token);
</pre>
<pre>
<span class="comment">// Example #2 : Activate a users account without using a token.</span>
$user_id = '101';

$this->flexi_auth->activate_user($user_id);
</pre>
			</div>

			<a name="deactivate_user"></a>
			<div class="w100 frame">
				<h3 class="heading">deactivate_user()</h3>
				
				<p>Deactivates a users account, preventing them from logging in.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>deactivate_user(user_id)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user account to be deactivated.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function generates an activation token that will be required in order to re-activate the account.</p>
					<p>An SQL UPDATE statement is then run deactivating the account and setting the re-activation token.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$user_id = 101;

$this->flexi_auth->deactivate_user($user_id);
</pre>
			</div>

			<a name="delete_unactivated_users"></a>
			<div class="w100 frame">
				<h3 class="heading">delete_unactivated_users()</h3>
				
				<p>Delete users that have not activated their account within a defined time period.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>delete_unactivated_users(inactive_days, sql_where)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>inactive_days</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">28</td>
							<td>Defines the number of days that inactive accounts must be acivated within to be exempt from being deleted.</td>
						</tr>
						<tr>
							<td>sql_where</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Set the SQL WHERE statement used to filter the database records to return.<br/>
								Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL SELECT query returning all unactivated functions that were registered outside of the defined time period.</p>
					<p>All returned records are then looped through and deleted.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Delete all unactivated user accounts older than 14 days.</span>
$inactive_days = 14;

$this->flexi_auth->delete_unactivated_users($inactive_days);
</pre>
<pre>
<span class="comment">// Example #2 : Delete all unactivated user accounts older than 14 days with an additional SQL WHERE clause.</span>
$inactive_days = 14;

<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_where = array(...);

$this->flexi_auth->delete_unactivated_users($inactive_days, $sql_where);
</pre>
			</div>

			<a name="change_password"></a>
			<div class="w100 frame">
				<h3 class="heading">change_password()</h3>
				
				<p>Validates a submitted 'current' password against the database, if valid, the database is updated with the users 'new' password.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>change_password(identity, current_password, new_password)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>identity</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the primary identity of the user whose password is to be updated.<br/>
								The primary identity is either the users email address or username, which is defined via the '<a href="<?php echo $base_url; ?>user_guide/user_account_config#database_config_settings">primary_identity_col</a>' setting in the config. file.
							</td>
						</tr>
						<tr>
							<td>current_password</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the users current unhashed password.</td>
						</tr>
						<tr>
							<td>new_password</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the users new unhashed password.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function first validates that the submitted current password matches the current database records.<br/></p>
					<p>The function then performs and SQL SELECT query to get the users id and database password salt (If set) that will be used when hashing the new password.</p>
					<p>Then all database login sessions related to the users id are deleted, forcing any browsers logged in via a 'Remember me' cookie to login the next visit.</p>
					<p>Finally, the users new password is hashed using the PHPASS library and is saved to the user account table.</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The current and new passwords should be passed to the function in plain text, the function then performs the required hashing to secure the password.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$identity = 'user@email.com';
$current_password = 'password';
$new_password = 'password123';

$this->flexi_auth->change_password($identity, $current_password, $new_password);
</pre>
			</div>

			<a name="forgotten_password"></a>
			<div class="w100 frame">
				<h3 class="heading">forgotten_password()</h3>
				
				<p>Sends the user an email containing a link to verify the user has requested to change their forgotten password.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>forgotten_password(identifier)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>identifier</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>The email or username of the user requesting to reset their forgotten password.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function creates a random token that will be used to validate the reset of the users password.</p>
					<p>If the config. file defines that forgotten password token should expire after a set time period, then a time limit (Defined via the config. file) is set.</p>
					<p>The token and time limit (If set) are then saved to the database.</p>
					<p>
						The function then runs an SQL SELECT query to get the users id, email and the new password token.<br/>
						Using this data, an email is then sent to the user which contains a link to reset the users password.
					</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$identifier = 'user@email.com';

$this->flexi_auth->forgotten_password($identifier);
</pre>
			</div>

			<a name="validate_forgotten_password"></a>
			<div class="w100 frame">
				<h3 class="heading">validate_forgotten_password()</h3>
				
				<p>Validates a forgotten password token that is typically passed via a link from an email sent by the <a href="#forgotten_password">'forgotten_password()'</a> function.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>validate_forgotten_password(user_id, token)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user reseting their password.</td>
						</tr>
						<tr>
							<td>token</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the token to be validated in order for the password to be reset.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL SELECT query to check whether the defined user and token exist within the user account table.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Example</h6>
<pre>
$user_id = 101;
$token = '11f4ba606abadd56810768b5dcb5b758cb974e3a';

$this->flexi_auth->validate_forgotten_password($user_id, $token);
</pre>
			</div>

			<a name="forgotten_password_complete"></a>
			<div class="w100 frame">
				<h3 class="heading">forgotten_password_complete()</h3>
				
				<p>
					This function is similar to the <a href="#validate_forgotten_password">'validate_forgotten_password()'</a> function.
					However, if validated the function also updates the database with a new password, then if defined, an email will be sent to the user containing the new password.
				</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>forgotten_password_complete(user_id, token, new_password, send_email)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user reseting their password.</td>
						</tr>
						<tr>
							<td>token</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the token to be validated in order for the password to be reset.</td>
						</tr>
						<tr>
							<td>new_password</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the new password to be set.<br/>
								If no password is defined, a new random password will be generated.
							</td>
						</tr>
						<tr>
							<td>send_email</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether the new password should be emailed to the user.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL SELECT query to check whether the defined user and token exist within the user account table.</p>
					<p>Provided the token is valid, the function then runs another SQL SELECT query to get the users primary identity, email and database password salt (If set).</p>
					<p>If a new password has been defined, the function will update the users password. If no new password is set, then a randomly generated password is set.</p>
					<p>If defined, the function then emails the new password to the user.</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The new passwords should be passed to the function in plain text, the function then performs the required hashing to secure the password.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>string | The new password | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$user_id = 101;
$token = '11f4ba606abadd56810768b5dcb5b758cb974e3a';
$new_password = 'password123';
$send_email = 'user@email.com';

$this->flexi_auth->forgotten_password_complete($user_id, $forgot_password_token, $new_password , $send_email);
</pre>
			</div>

			<a name="update_email_via_verification"></a>
			<div class="w100 frame">
				<h3 class="heading">update_email_via_verification()</h3>
				
				<p>Sends the user a verification email to their new email address, the user must then click a link within the email to update their accounts email address.</p>
				<p>
					The function serves two purposes. Firstly it validates that the user has spelt their new email address correctly.<br/>
					Secondly, it validates that the email address is owned by the user and is not fraudulent.
				</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>update_email_via_verification(user_id, new_email)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user to be updated.</td>
						</tr>
						<tr>
							<td>new_email</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the users new email address.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function generates a random email verification token that will be required to validate the new email address.</p>
					<p>
						The function then runs an SQL UPDATE statement to update the users account table with the verification token and the new email address.<br/>
						However, rather than replacing the users current email address, the new address is saved to another column incase the user never validates their new email address.
					</p>
					<p>The function then sends the user an email with a link containing the email verification token.</p>
				</div>

				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$user_id = 101;
$new_email = 'user@email.com';

$this->flexi_auth->update_email_via_verification($user_id, $new_email);
</pre>
			</div>

			<a name="verify_updated_email"></a>
			<div class="w100 frame">
				<h3 class="heading">verify_updated_email()</h3>
				
				<p>Verifies a submitted email verification token and updates the users account with the new email address.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>verify_updated_email(user_id, update_email_token)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user to be updated.</td>
						</tr>
						<tr>
							<td>update_email_token</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the token to be validated in order for the email address to be updated.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL SELECT query to find a user with a email user id an email verification token.</p>
					<p>Provided a user is matched, the function then updates the users email address and removes users email verification data.</p>
					<p>If the users primary identity column is email, then users session data will be updated with the new email address.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$user_id = 101;
$update_email_token = '5600433cb5defbd2c83e0877d2713ef0c54473da';

$this->flexi_auth->verify_updated_email($user_id, $update_email_token);
</pre>
			</div>


		</div>
	</div>	
	
	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

</body>
</html>