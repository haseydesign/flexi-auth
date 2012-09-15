<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Account Configuration | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring user accounts in flexi auth."/> 
	<meta name="keywords" content="user account configuration, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Account Configuration</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>User Account Configuration</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_account_index">User Account Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_get_data">Get User Account Data</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_set_data">Set User Account Data</a>

			<div class="anchor_nav">
				<h6>Config Setup Information</h6>
				<p>
					<a href="#db_schema_diagram">Table Schema Diagram</a>
				</p>
				<h6>Table and Config File Settings</h6>
				<p>
					<a href="#primary_user_account_table">Primary User Account Table</a> | 
					<a href="#custom_user_tables">Custom User Tables</a> | 
					<a href="#database_config_settings">User Account Database Config Settings</a> | 
					<a href="#behaviour_config_settings">User Account Behaviour Config Settings</a>
				</p>
			</div>
		
			<a name="help"></a>
			<div class="w100 frame">
				<h3 class="heading">Help with the Table Configuration</h3>
				<span class="toggle">Show / Hide Help</span>
				<div id="help_guide" class="hide_toggle">
					<hr/>
					<p><strong>Config Name</strong>: The name that flexi auth internally references the config setting by.</p>
					<p><strong>Default</strong>: The default value set within the config file.</p>
					<p>
						<strong>Data Type</strong>: The data type that is expected by the config setting.
						<ul>
							<li><em>bool</em> : Requires a boolean value of 'TRUE' or 'FALSE'.</li>
							<li><em>string</em> : Requires a textual value.</li>
							<li><em>int</em> : Requires a numeric value. It does not matter whether the value is an integer, float, decimal etc.</li>
							<li><em>array</em> : Requires an array.</li>
							<li><em>datetime</em> : Requires a datetime value. Typically either a MySQL DATETIME (2000-12-31 12:00:00) or UNIX timestamp (1234567890)</li>
						</ul>
					</p>
					<hr/>
					
					<h6>Config File Location</h6>
					<p>The config file is located in CodeIgniters 'config' folder and is named 'flexi_auth.php'.</p>
				</div>
			</div>

			<a name="db_schema_diagram"></a>
			<div class="w100 frame">
				<h3 class="heading">Schema Diagram : User Account Table</h3>
				<div class="frame_note">
					<p>A database table schema diagram, showing how the primary user account table is the core table within the flexi auth library, linking to each of the other tables used by the library.</p>
					<p>Note: Table and columns names are defined using their config names referenced within the config file. The names within brackets are the default demo names.</p>
				</div>
				<img src="<?php echo $includes_dir; ?>images/db_diagrams/user_account_schema.png" class="db_schema_diagram"/>
			</div>

			<a name="primary_user_account_table"></a>
			<div class="w100 frame">
				<h3 class="heading">Primary User Account Table</h3>
				
				<p>The primary user account table contains all of the columns required for different functions within the flexi auth library.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_125">Default</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>table</td>
							<td>user_accounts</td>
							<td class="align_ctr">-</td>
							<td>The tables name.</td>
						</tr>
						<tr>
							<td>join</td>
							<td>user_accounts.uacc_id</td>
							<td class="align_ctr">-</td>
							<td>The tables foreign key used to join with foreign keys of other tables.</td>
						</tr>
						<tr>
							<td>id</td>
							<td>uacc_id</td>
							<td class="align_ctr">int</td>
							<td>The tables primary key.</td>
						</tr>
						<tr>
							<td>group_id</td>
							<td>uacc_group_fk</td>
							<td class="align_ctr">int</td>
							<td>The foreign key used to join with the user group table.</td>
						</tr>
						<tr>
							<td>email</td>
							<td>uacc_email</td>
							<td class="align_ctr">string</td>
							<td>The users email address.</td>
						</tr>
						<tr>
							<td>username</td>
							<td>uacc_username</td>
							<td class="align_ctr">string</td>
							<td>The users login username.</td>
						</tr>
						<tr>
							<td>password</td>
							<td>uacc_password</td>
							<td class="align_ctr">string</td>
							<td>The users password.</td>
						</tr>
						<tr>
							<td>ip_address</td>
							<td>uacc_ip_address</td>
							<td class="align_ctr">string</td>
							<td>The ip address of the last visit from the user.</td>
						</tr>
						<tr>
							<td>salt</td>
							<td>uacc_salt</td>
							<td class="align_ctr">string</td>
							<td>A database salt unique to each user that is used when salting passwords.</td>
						</tr>
						<tr>
							<td>activation_token</td>
							<td>uacc_activation_token</td>
							<td class="align_ctr">string</td>
							<td>The account activation token assigned to a user upon registration.</td>
						</tr>
						<tr>
							<td>forgot_password_token</td>
							<td>uacc_forgotten_password_token</td>
							<td class="align_ctr">string</td>
							<td>The reset a forgotten password token assigned to a user upon requesting to reset their 'forgotten' password.</td>
						</tr>
						<tr>
							<td>forgot_password_expire</td>
							<td>uacc_forgotten_password_expire</td>
							<td class="align_ctr">datetime</td>
							<td>The date that the forgotten password token expires by.</td>
						</tr>
						<tr>
							<td>update_email_token</td>
							<td>uacc_update_email_token</td>
							<td class="align_ctr">string</td>
							<td>The update email token assigned to a user upon updating their email address. The token verifies whether the email account is registered to the user.</td>
						</tr>
						<tr>
							<td>update_email</td>
							<td>uacc_update_email</td>
							<td class="align_ctr">string</td>
							<td>The email address that is to be updated to the user upon verification.</td>
						</tr>
						<tr>
							<td>active</td>
							<td>uacc_active</td>
							<td class="align_ctr">int</td>
							<td>Defines whether the users account has been activated.</td>
						</tr>
						<tr>
							<td>suspend</td>
							<td>uacc_suspend</td>
							<td class="align_ctr">int</td>
							<td>Defined whether the users account has been suspended/banned, meaning the user can no longer login.</td>
						</tr>
						<tr>
							<td>failed_logins</td>
							<td>uacc_fail_login_attempts</td>
							<td class="align_ctr">int</td>
							<td>The number of failed login attempts that have been made to a users account since their last successful login.</td>
						</tr>
						<tr>
							<td>failed_login_ip</td>
							<td>uacc_fail_login_ip_address</td>
							<td class="align_ctr">string</td>
							<td>The ip address of the user that made the last failed login attempt to a users account.</td>
						</tr>
						<tr>
							<td>failed_login_ban_date</td>
							<td>uacc_date_fail_login_ban</td>
							<td class="align_ctr">datetime</td>
							<td>If a users account has too many failed logins, its can be banned from being logged into until the defined date.</td>
						</tr>
						<tr>
							<td>last_login_date</td>
							<td>uacc_date_last_login</td>
							<td class="align_ctr">datetime</td>
							<td>The last successful login date into a users account.</td>
						</tr>
						<tr>
							<td>date_added</td>
							<td>uacc_date_added</td>
							<td class="align_ctr">datetime</td>
							<td>The date the users account was created.</td>
						</tr>
						<tr>
							<td>custom_columns</td>
							<td>-</td>
							<td class="align_ctr">array</td>
							<td>
								Custom columns can be added to the main user account table to enable library functions to handle additional custom data stored within the table.<br/>
								The custom columns names are defined via an array.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Defining the table, join and column names.</span>
$config['database']['user_acc']['table'] = 'user_accounts';
$config['database']['user_acc']['join'] = 'user_accounts.uacc_id';
$config['database']['user_acc']['columns']['id'] = 'uacc_id';

<span class="comment">// Defining custom column names within the table.</span>
$config['database']['user_acc']['custom_columns'] = array('date_modified', 'modified_user_id');
</pre>
			</div>

			<a name="custom_user_tables"></a>
			<div class="w100 frame">
				<h3 class="heading">Custom User Tables</h3>
				
				<p>Additional custom tables that are directly related to the user account table can be included in flexi auth CRUD functions by setting their database structure via the the $config['database']['custom'] array.</p>
				<p>Typically, such examples of a custom table you may wish to link to the user account table would be a user profile table listing the users name and contact details etc.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_125">Default Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>table</td>
							<td>* Custom *</td>
							<td class="align_ctr">-</td>
							<td>The tables name.</td>
						</tr>
						<tr>
							<td>primary_key</td>
							<td>* Custom *</td>
							<td class="align_ctr">-</td>
							<td>The tables primary key.</td>
						</tr>
						<tr>
							<td>foreign_key</td>
							<td>* Custom *</td>
							<td class="align_ctr">-</td>
							<td>The tables foreign key, intended to join the table with the primary key of the primary user account table.</td>
						</tr>
						<tr>
							<td>join</td>
							<td>* Custom *</td>
							<td class="align_ctr">-</td>
							<td>The full length table name and foreign key column used to join the table, example 'custom_table_name.foreign_key_name'.</td>
						</tr>
						<tr>
							<td>custom_columns</td>
							<td>* Custom *</td>
							<td class="align_ctr">array</td>
							<td>An array of all the other column names within the table.</td>
						</tr>
					</tbody>
				</table>

				<h6>Notes</h6>
				<div class="frame_note">
					<p>You are not required to include any custom tables if not needed.</p>
					<p>You are not limited to the number of different custom tables you can define.</p>
					<p>All custom column names in <span class="uline">ALL</span> custom tables should be uniquely named. Otherwise, if the <a href="<?php echo $base_url; ?>user_guide/user_account_set_data#update_custom_user_data">update_custom_user_data()</a> is used, it could match the wrong columns when trying to match a primary key column and array data.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example of defining a custom table for capturing user address data.</span>
$config['database']['custom']['user_address']['table'] = 'user_address';
$config['database']['custom']['user_address']['primary_key'] = 'user_address_id';
$config['database']['custom']['user_address']['foreign_key'] = 'user_account_fk';
$config['database']['custom']['user_address']['join'] = 'user_address.user_account_fk';
$config['database']['custom']['user_address']['custom_columns'] = array(
	'user_street','user_city','user_county','user_post_code','user_country'
);
</pre>
			</div>

			<a name="database_config_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">User Account Database Config Settings</h3>
				
				<p>Define user account database settings.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>primary_identity_col</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">uacc_email</td>
							<td>
								<p>Set the column to be used to primarily identify users within the user account table.</p>
								<p>Note: Only the '<em>email</em>' or '<em>username</em>' columns can be used.</p>
							</td>
						</tr>
						<tr>
							<td>identity_cols</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">array('uacc_email', 'uacc_username')</td>
							<td>
								<p>
									Set whether the users email address, username or both are to be used to identify users from data submitted via a login form.<br/>
									This MUST include the '<em>primary_identity_col</em>' column (Default '<em>uacc_email</em>').
								</p>
								<p>If both the email address and username are used, then users will be able to login by submitting either value.</p>
								<p>Note: Only the '<em>email</em>' and/or '<em>username</em>' columns can be used.</p>
							</td>
						</tr>
						<tr>
							<td>search_user_cols</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">array('uacc_email', 'uacc_username')</td>
							<td>
								<p>Set the table columns that are looked-up by the libraries <a href="<?php echo $base_url; ?>user_guide/user_account_get_data#search_users">search_users()</a> function to match users against submitted search query terms.</p>
								<p>By default, the config file is defined to only lookup the '<em>email</em>' and '<em>username</em>' columns. However, if using custom user tables capturing user profile data etc, those columns can be added to this config setting.</p>
							</td>
						</tr>
						<tr>
							<td>date_time</td>
							<td class="align_ctr">PHP Date Function</td>
							<td class="align_ctr">date('Y-m-d H:i:s')</td>
							<td>
								<p>
									Set a native PHP function to format the date and time correctly to be stored within the user tables.
								</p>
								<p>
									Typically this will either be either <em>DATETIME</em> or <em>TIMESTAMP</em> <br/>										
									MySQL DATETIME = <code>date('Y-m-d H:i:s');</code><br/>
									Unix TIMESTAMP = <code>time();</code>
								</p>		
								<p>Note: Ensure you consistently use the same data type in all defined flexi auth tables for date and time data.</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre><span class="comment">// Defining the primary idenity column within the user account table.
// Note: Only the user 'email' or 'username' columns can be used.</span>
$config['database']['settings']['primary_identity_col'] = 'uacc_email';

<span class="comment">// Defining which user table columns are used to identify a user via data submitted by a login form.</span>
$config['database']['settings']['identity_cols'] = array('uacc_email', 'uacc_username');

<span class="comment">// Defining which user table columns are searched via the libraries <a href="<?php echo $base_url; ?>user_guide/user_account_get_data#search_users">search_users()</a> function.</span>
$config['database']['settings']['search_user_cols'] = array('uacc_email', 'upro_first_name', 'upro_last_name');

<span class="comment">// Defining the date and time format that will be saved to the database.
// This example uses the native PHP function date(), to format the value as '2000-12-31 12:00:00'.</span>
$config['database']['settings']['date_time'] = date('Y-m-d H:i:s');
</pre>
			</div>

			<a name="behaviour_config_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">User Account Behaviour Config Settings</h3>
				
				<p>Define user account behaviour settings used when handling data related to the primary user account table.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>auto_increment_username</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">false</td>
							<td>
								<p>Set whether an incremented number is added to the end of an unavailable username.</p>
								<p>Example: If username 'flexi' is already in use, the next user to use 'flexi' as their username will be automatically updated to 'flexi1'.</p>
								<p>Note: This only applies if the username is not set as the primary identity column via the setting '<em><a href="#database_config_settings">primary_identity_col</a></em>'.</p>
							</td>
						</tr>
						<tr>
							<td>suspend_new_accounts</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">false</td>
							<td>
								Set whether accounts are suspended by default on registration / inserting user.<br/>
								This option allows admins to verify account details before enabling users.
							</td>
						</tr>
						<tr>
							<td>account_activation_time_limit</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">0</td>
							<td>
								Set a time limit to grant users instant login access, once expired, they are locked out until they activate their account via an activation email sent to them.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre><span class="comment">// Defining whether to auto increment a duplicate username.</span>
$config['settings']['auto_increment_username'] = FALSE;

<span class="comment">// Defining whether to suspend all new account upon registration until reviewed by a moderator.</span>
$config['settings']['suspend_new_accounts'] = FALSE;

<span class="comment">// Defining a time period that users will be able to access their for, until they activate the account via email.
// Time is defined in minutes.</span>
$config['settings']['account_activation_time_limit'] = 60; // 60 minutes
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