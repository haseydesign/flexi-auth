<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Group Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for user group functions in flexi auth."/> 
	<meta name="keywords" content="user group functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Group Functions</h1>
				<p>Within any site allowing for user accounts, there is likely to be a need to group users into specific types, from the most basic 'Public' and 'Admin' user groups, to more specific groupings that could include 'Moderators', 'Editors', 'Contributors' etc.</p>
				<p>By grouping user types, the library includes functions that restrict/allow access to specific content based on a users user group. Furthermore, the library can filter and search users based on their user group.</p>
				<p>Below is a compiled list of functions and configuration settings to implement and customise the management of user groups.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>User Groups : User Guide Index</h2>				
			<a href="<?php echo $base_url; ?>user_guide/user_group_config">User Group Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_get_data">Get User Group Data</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_set_data">Set User Group Data</a>
			
			<div class="w100 frame">
				<h3>User Group Configuration</h3>
				<p>Customise the configuration of the user database tables and how the library handles user group data.</p>
				<p><a href="<?php echo $base_url; ?>user_guide/user_group_config">User Group Config. File Settings</a></p>
			</div>
			
			<div class="w50 frame parallel_target">
				<h3>Getting User Group Data</h3>
				<small>Get data from the auth session or database.</small>
				<hr/>
				
				<h6>User Group Data Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_get_data#get_groups">get_groups()</a><br/>
						<small>Gets a list of user groups filtered by a custom SQL WHERE statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_get_data#get_users_group">get_users_group()</a><br/>
						<small>Gets records from the user group table typically for a filtered set of users.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_get_data#get_user_group_id">get_user_group_id()</a><br/>
						<small>Get the users group id from the session.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_get_data#get_user_group">get_user_group()</a><br/>
						<small>Get the users user group name from the session.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>User Group Validation Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#in_group">in_group()</a><br/>
						<small>Verifies whether a user is assigned to a particular user group.</small>
					</li>
				</ul>
			</div>
			
			<div class="w50 r_margin frame parallel_target">
				<h3>Setting User Group Data</h3>
				<small>Set data to the database.</small>
				<hr/>
				
				<h6>User Group CRUD Functions</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_set_data#insert_group">insert_group()</a><br/>
						<small>Inserts a new user group to the database.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_set_data#update_group">update_group()</a><br/>
						<small>Updates a user group with any submitted data.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_set_data#delete_group">delete_group()</a><br/>
						<small>Deletes a group from the user group table.</small>
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