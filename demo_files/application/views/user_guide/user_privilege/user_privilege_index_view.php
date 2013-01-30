<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Privilege Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for user privilege functions in flexi auth."/> 
	<meta name="keywords" content="user privilege functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Privilege Functions</h1>
				<p>Within any site with user accounts, there is likely to be a need to grant specific users privileges that will allow them to perform actions that may not be granted to other users.</p>
				<p>By granting privileges to users, the library includes functions that restrict/allow access to specific content based on a users privileges.</p>
				<p>Below is a compiled list of functions and configuration settings to implement and customise the management of user privileges.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>User Privileges : User Guide Index</h2>				
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_config">User Privilege Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_get_data">Get User Privilege Data</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data">Set User Privilege Data</a>
			
			<div class="w100 frame">
				<h3>User Privilege Configuration</h3>
				<p>Customise the configuration of the user database tables and how the library handles user privilege data.</p>
				<p><a href="<?php echo $base_url; ?>user_guide/user_privilege_config">User Privilege Config. File Settings</a></p>
			</div>
			
			<div class="w50 frame parallel_target">
				<h3>Getting User Privilege Data</h3>
				<small>Get data from the auth session or database.</small>
				<hr/>
				
				<h6>User Privilege Data Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_get_data#get_privileges">get_privileges()</a><br/>
						<small>Gets a list of user privileges filtered by a custom SQL WHERE statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_get_data#get_user_privileges">get_user_privileges()</a><br/>
						<small>Get the user privileges for a user.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_get_data#get_user_group_privileges">get_user_group_privileges()</a><br/>
						<small>Get the user privileges for a user group.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>User Privilege Valdation Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#is_privileged">is_privileged()</a><br/>
						<small>Verifies whether a user has a specific privilege.</small>
					</li>
				</ul>
			</div>
			
			<div class="w50 r_margin frame parallel_target">
				<h3>Setting User Privilege Data</h3>
				<small>Set data to the database.</small>
				<hr/>
				
				<h6>User Privilege CRUD Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data#insert_privilege">insert_privilege()</a><br/>
						<small>Inserts a new user privilege to the database.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data#update_privilege">update_privilege()</a><br/>
						<small>Updates a user privilege with any submitted data.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data#delete_privilege">delete_privilege()</a><br/>
						<small>Deletes a privilege from the user privilege table.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data#insert_privilege_user">insert_privilege_user()</a><br/>
						<small>Inserts a new user privilege for a user.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data#delete_privilege_user">delete_privilege_user()</a><br/>
						<small>Deletes a user privilege for a user.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data#insert_user_group_privilege">insert_user_group_privilege()</a><br/>
						<small>Inserts a new user privilege for a user group.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data#delete_user_group_privilege">delete_user_group_privilege()</a><br/>
						<small>Deletes a user privilege for a user group.</small>
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