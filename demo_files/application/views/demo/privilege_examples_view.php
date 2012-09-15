<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Permission Demo | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="login">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2>Permission Validation Examples</h2>
				<p>When a user logs into their account, the flexi auth library authenticates their credentials are valid and then sets data into their current session related to their login method, user group and user privileges.</p>
				<p>Once the user has been authenticated, flexi auth offers numerous different methods of checking the users credentials, which can then be used to determine whether a user should have access to either specific pages within a site, or should be able to see specific sections within a page.</p>
				<p>To properly demonstrate the privilege checks on this page, try logging into all 3 demo accounts and then revisit this page to view the differences.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2>Permissions</h2>

				<div class="w100 frame">
					<h3>Login Check</h3>
					<p>Check the status of whether a user is currently logged in.</p>
					<p>This includes whether they logged into this session via entering their password, or via using a 'Remember me' cookie.</p>
					<p>
						<ul class="bullet">								
						<?php 
							// Check if user is logged in either via password or 'Remember me' function
							if ($this->flexi_auth->is_logged_in()) 
							{
								echo '<li><span class="highlight_green">User is logged in.</span></li>';
							}
							else 
							{
								echo '<li><span class="highlight_orange">User is not logged in.</span></li>';
							}
						?>
						</ul>
					</p>
					<hr/>

					<h3>Login Method</h3>
					<p>Check how a logged in user logged into their current session.</p>
					<p>Users that have logged in via a password have positively confirmed their identity for this session, whilst a user logged in via a "Remember me" cookie should have limited access rights, until they confirm their identity via a password.</p>
					<p>An example of limited access would be to allow users access to their account, but prevent data from being updated until they login via a password.</p>
					<p>
						<ul class="bullet">								
						<?php 
							// Check if user logged in directly via password, or via 'Remember me' function
							if ($this->flexi_auth->is_logged_in()) 
							{
								if ($this->flexi_auth->is_logged_in_via_password()) 
								{
									echo '<li><span class="highlight_green">User logged in via password.</span></li>';
								}
								else
								{
									echo '<li><span class="highlight_green">User logged in via "Remember me".</span></li>';
								}
							}
							else
							{
								echo '<li><span class="highlight_orange">User is not logged in.</span></li>';
							}
						?>
						</ul>
					</p>
					<hr/>

					<h3>Admin Check</h3>
					<p>Check whether a logged in user is considered an 'Admin'.</p>
					<p>This function should be considered as an indicator that the user is trusted to use 'backend' areas of the site, however, that does not mean they would necessarily have read/write permissions to all areas.</p>
					<p>Specific permissions can be further allocated to users via the 'User Group' and 'User Account Privileges' that are displayed below.</p>
					<p>
						<ul class="bullet">								
						<?php 
							// Check if user is in classed as an admin
							if ($this->flexi_auth->is_logged_in()) 
							{
								if ($this->flexi_auth->is_admin()) 
								{
									echo '<li><span class="highlight_green">User is an Admin.</span></li>';
								}
								else 
								{
									echo '<li><span class="highlight_orange">User is not an Admin.</span></li>';
								}
							}
							else
							{
								echo '<li><span class="highlight_orange">User is not logged in.</span></li>';
							}
						?>
						</ul>
					</p>
					<hr/>

					<h3>User Group</h3>
					<p>Check which group a logged in user is assigned to.</p>
					<p>By grouping users, specific access rights can be granted/prohibited based on their custom group.</p>
					<p>
						<ul class="bullet">								
						<?php
							if ($this->flexi_auth->is_logged_in()) 
							{
								// Display user group.
								echo '<li><span class="highlight_green">User is in the "'.$this->flexi_auth->get_user_group().'" user group.</span></li>';
							}
							else
							{
								echo '<li><span class="highlight_orange">User is not logged in.</span></li>';
							}
						?>
						</ul>
					</p>
					<hr/>

					<h3>User Account Privileges</h3>
					<p>Check the specific privileges a logged in user currently has.</p>
					<p>Specific privileges can be granted for any specific custom task, and can then be assigned on an individual user basis.</p>
					<p>
						<ul class="bullet">								
						<?php
							if ($this->flexi_auth->is_logged_in()) 
							{
								if ($this->flexi_auth->is_privileged('View Users')) 
								{
									echo '<li><span class="highlight_green">User has the privilege to VIEW other user accounts.</span></li>';
								}
								else 
								{
									echo '<li><span class="highlight_orange">User does not have the privilege to VIEW other user accounts.</span></li>';
								}
								if ($this->flexi_auth->is_privileged('Update Users')) 
								{
									echo '<li><span class="highlight_green">User has the privilege to UPDATE other user accounts.</span></li>';
								}
								else 
								{
									echo '<li><span class="highlight_orange">User does not have the privilege to UPDATE other user accounts.</span></li>';
								}
								if ($this->flexi_auth->is_privileged('Delete Users')) 
								{
									echo '<li><span class="highlight_green">User has the privilege to DELETE other user accounts.</span></li>';
								}
								else 
								{
									echo '<li><span class="highlight_orange">User does not have the privilege to DELETE other user accounts.</span></li>';
								}
							}
							else
							{
								echo '<li><span class="highlight_orange">User is not logged in.</span></li>';
							}
						?>
						</ul>								
					</p>
				</div>
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