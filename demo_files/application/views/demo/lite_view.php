<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Lite Library Demo | flexi auth | A User Authentication Library for CodeIgniter</title>
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
				<h2>flexi auth Lite Example</h2>
				<p>This page is an example of the flexi auth <em>'Lite'</em> library. The lite library only contains functions that read data from the auth session or database and can use up to 40% less memory than on pages using the standard library.</p>
				<p>Its lighter memory footprint means the library can display user data on pages that do not need complicated authentication functions, resulting in minimal effect to the sites performance.</p>
				<p>Examples of its usage can be seen below displaying a small summary of user data that is stored within the auth session and database.</p>
			</div>
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				
				<h2>Lite Library Functions</h2>
				<div class="w100 frame">
					<ul>
					<?php if ($this->flexi_auth->is_logged_in()) { ?>
						<li>
							<h3>Login Status</h3>
							<small>Check the login status of the current user.</small>
							<p>User logged in via <?php echo ($this->flexi_auth->is_logged_in_via_password()) ? 'entering a password.' : 'a "Remember me" cookie.'; ?></p>
							<hr/>
						</li>
						<li>
							<h3>User Data</h3>
							<small>Get internal and profile data of the current logged in user.</small>
							<ul class="bullet">								
								<li>
									<span class="spacer_150">User ID:</span> <?php echo $this->flexi_auth->get_user_id(); ?>
								</li>
								<li>
									<span class="spacer_150">User Identity:</span> <?php echo $this->flexi_auth->get_user_identity(); ?>
								</li>
								<li>
									<span class="spacer_150">User Full Name:</span> <?php echo $user_full_name; ?>
								</li>
								<li>
									<span class="spacer_150">User Phone #:</span> <?php echo $user_phone; ?>
								</li>
								<li>
									<span class="spacer_150">Last Login Date:</span> <?php echo $user_last_login; ?>
								</li>
							</ul>
							<hr/>
						<li>
							<h3>User Group Data</h3>
							<small>Get data on the logged in users user group.</small>
							<ul class="bullet">								
								<li>
									<span class="spacer_150">User Group ID:</span> <?php echo $this->flexi_auth->get_user_group_id(); ?>
								</li>
								<li>
									<span class="spacer_150">User Group Name:</span> <?php echo $this->flexi_auth->get_user_group(); ?>
								</li>
								<li>
									<span class="spacer_150">User Group Desc:</span> <?php echo $user_group_desc; ?>
								</li>
							</ul>
							<hr/>
						<li>
							<h3>Admin Status</h3>
							<small>Check whether the current user is an admin.</small>
							<ul class="bullet">	
								<li>
									<span class="spacer_150">Admin Status:</span> <?php echo ($this->flexi_auth->is_admin()) ? 'Current user is an Admin' : 'Current user is not an Admin'; ?>
								</li>
							</ul>
							<hr/>
						</li>
						<li>
							<p>
								<h3>User Privileges</h3>
								<small>
									Custom user privileges can be set for anything that requires a security check.<br/>
									This demo example checks whether the currently logged in user can view, update or delete user accounts.
								</small>
							</p>
							<p>
								<ul class="bullet">								
							<?php 
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
							?>
								</ul>
							</p>
						</li>
					<?php } else { ?>
						<li>
							<h3>Login Status</h3>
							<small>Check the login status of the current user.</small>
							<p>
								<span class="highlight_orange">User is not currently logged in!</span>
							</p>
						</li>
					<?php } ?>
					</ul>
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