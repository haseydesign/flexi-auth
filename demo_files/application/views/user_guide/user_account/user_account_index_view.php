<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Account Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for user account functions in flexi auth."/> 
	<meta name="keywords" content="user account functions, user guide, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="user_guide_index">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- User Guide Navigation -->
	<?php $this->load->view('includes/user_guide_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="intro_text">
				<h1>User Guide | User Account Functions</h1>
				<p>Whilst the flexi auth libraries primary purpose is to manage the authentication of a users login credentials, it's next major feature is user management.</p>
				<p>The library includes a set of highly configurable database tables and accompanying functions that allow you to handle the data stored for each user, including user group and privilege assignment.</p>
				<p>Below is a compiled list of functions and configuration settings to implement and customise the management of user accounts.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>User Accounts : User Guide Index</h2>				
			<a href="<?php echo $base_url; ?>user_guide/user_account_config">User Account Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_get_data">Get User Account Data</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_set_data">Set User Account Data</a>
			
			<div class="w100 frame">
				<h3>User Account Configuration</h3>
				<p>Customise the configuration of the user database tables and how the library handles user account data and behaviours.</p>
				<p><a href="<?php echo $base_url; ?>user_guide/user_account_config">User Account Config. File Settings</a></p>
			</div>
			
			<div class="w50 frame parallel_target">
				<h3>Getting User Account Data</h3>
				<small>Get data from the auth session or database.</small>
				<hr/>
				
				<h6>User Account Data Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_user_id">get_user_id()</a><br/>
						<small>Get the users id from the session.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_user_identity">get_user_identity()</a><br/>
						<small>Get the users primary identity from the session.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_user_by_id">get_user_by_id()</a><br/>
						<small>Get all user data by submitting the users id.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_user_by_identity">get_user_by_identity()</a><br/>
						<small>Get all user data by submitting the users identity.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_users">get_users()</a><br/>
						<small>Gets data from the user account table and any custom tables that have been related to it.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_custom_user_data">get_custom_user_data()</a><br/>
						<small>Gets data from the user account table and any custom tables that have been related to it.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#search_users">search_users()</a><br/>
						<small>Gets data from the user account table via a keyword based search query.</small>
					</li>
				</ul>
				<hr/>

				<h6>User Activation Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_unactivated_users">get_unactivated_users()</a><br/>
						<small>Get users that have not activated their account within a set time period.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#resend_activation_token">resend_activation_token()</a><br/>
						<small>Resend user a new activation token incase they have lost the previous one.</small>
					</li>
				</ul>
				<hr/>

				<h6>User Group Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_get_data#get_users_group">get_users_group()</a><br/>
						<small>Gets records from the user group table typically for a filtered set of users.</small>
					</li>
				</ul>
			</div>
			
			<div class="w50 r_margin frame parallel_target">
				<h3>Setting User Account Data</h3>
				<small>Set data to the database.</small>
				<hr/>
				
				<h6>User Account CRUD Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#insert_user">insert_user()</a><br/>
						<small>Inserts user account and profile data, returning the users new id.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#update_user">update_user()</a><br/>
						<small>Updates the main user account table and any related custom user tables with the submitted data.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#delete_user">delete_user()</a><br/>
						<small>Deletes a user account and all related custom user tables from the database.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>Custom User Data CRUD Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#insert_custom_user_data">insert_custom_user_data()</a><br/>
						<small>Inserts data into a custom user table and returns the table name and row id of each record inserted.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#update_custom_user_data">update_custom_user_data()</a><br/>
						<small>Updates a custom user table with any submitted data.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#delete_custom_user_data">delete_custom_user_data()</a><br/>
						<small>Deletes a data row from a custom user table.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>User Activation Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#activate_user">activate_user()</a><br/>
						<small>Activates a users account allowing them to login to their account.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#deactivate_user">deactivate_user()</a><br/>
						<small>Deactivates a users account, preventing them from logging in.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#delete_unactivated_users">delete_unactivated_users()</a><br/>
						<small>Delete users that have not activated their account within a defined time period.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>Password Management Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#change_password">change_password()</a><br/>
						<small>Validates a submitted 'Current' password against the database, if valid, the database is updated with the 'New' password.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#forgotten_password">forgotten_password()</a><br/>
						<small>Sends the user an email containing a link to verify the user has requested to change their forgotten password.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#validate_forgotten_password">validate_forgotten_password()</a><br/>
						<small>Validates a forgotten password token.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#forgotten_password_complete">forgotten_password_complete()</a><br/>
						<small>Validates a forgotten password token and updates the users password.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>Email Management Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#update_email_via_verification">update_email_via_verification()</a><br/>
						<small>Sends user an email verification token to confirm they own an updated email address.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#verify_updated_email">verify_updated_email()</a><br/>
						<small>Verifies a submitted email verification token and updates the users account with the new email address.</small>
					</li>
				</ul>
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