<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Demo | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="lite_library">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="intro_text">
				<h1>About the flexi auth Demo</h1>			
				<p>This demo is intended to demonstrate the majority of all the functions that are available within the flexi auth library.</p>
				<p>All these demo files are available for <a href="https://github.com/haseydesign/flexi-auth">download</a> so that you can get hands on with the code behind the working examples.</p>
			</div>		
		</div>
	</div>

	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content main_content_bg parallel clearfix">
				
			<div class="w66 frame parallel_target">				
				<h4>Layout of the demo</h4>
				<div class="frame_note">
					<p>The layout of the demo is broken down into three main sections.</p>
					<p>The first 'outer' section requires no login to view and contains examples of flexi auth library features that are used by users that have not logged in, for example a user login form, a registration form, and forgotten password and account activation request forms.</p>
					<p>The second section contains an example 'public account' interface where public users can log into their account and manage their own settings.</p>					
					<p>The third section contains an example 'admin backend' interface where administrators can login and manage the settings for all site users, user privileges and user groups.</p>					
				</div>
			
				<h4>Live data</h4>
				<div class="frame_note">				
					<p>The data within the demo is 'live' and any changes that are made will directly affect the auth, so bare it in mind that other users may also be using the demo and also changing settings themselves.</p>
					<p>The best way to ensure the intended user experience when using the demo, is to download the demo files and use them via your local setup.</p>
					<p>All data within the website demo example is periodically reset after a few hours.</p>
				</div>
				
				<h4>How to get started</h4>
				<div class="frame_note">				
					<p>By default the demo is setup with 3 example user accounts that each have different access permissions.</p>
					<p>Try logging into each of these accounts and browsing the different pages within the demo to view examples of the flexi auth library in action. Login details for each account are available via the login page.</p>
					<p>If you wish to setup and then manage your own account, you can register for an account via the registration page.</p>
					<p>Go and get playing!</p>
				</div>
			</div>

			<div class="w33 r_margin frame parallel_target">
				<h6>Quick Links</h6>
				<ul class="bullet">
					<li>
						<a href="<?php echo $base_url; ?>auth">Login</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth/login_via_ajax">Login via Ajax</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth/register_account">Register for an Account</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth_lite/privilege_examples">Privilege Examples</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth/forgotten_password">Reset Forgotten Password</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth/resend_activation_token">Resend Account Activation Token</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth/lite_library">Lite Library Examples</a>
					</li>
				</ul>

				<hr/>
				<h6>Public Dashboard</h6>
				<small>
					Manage account details of the logged in user.<br/>
					Note: Must be logged in as any user.
				</small>
				<ul class="bullet">
					<li>
						<a href="<?php echo $base_url; ?>auth_public/update_account">Update Account Details</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth_public/update_email">Update Email Address</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth_public/change_password">Update Password</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth_public/manage_address_book">Manage Address Book</a>
					</li>
				</ul>

				<hr/>
				<h6>Admin Dashboard</h6>
				<small>
					Manage user accounts, groups and privileges.<br/>
					Note: Must be logged in as an admin or moderator.
				</small>
				<ul class="bullet">
					<li>
						<a href="<?php echo $base_url; ?>auth_admin/manage_user_accounts">Manage User Accounts</a>			
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth_admin/manage_user_groups">Manage User Groups</a>			
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth_admin/manage_privileges">Manage User Privileges</a>			
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth_admin/list_user_status/active">List Active Users</a>
					</li>	
					<li>
						<a href="<?php echo $base_url; ?>auth_admin/list_user_status/inactive">List Inactive Users</a>
					</li>	
					<li>
						<a href="<?php echo $base_url; ?>auth_admin/delete_unactivated_users">List Unactivated Users</a>
					</li>	
					<li>
						<a href="<?php echo $base_url; ?>auth_admin/failed_login_users">List Failed Logins</a>			
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