<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo lang("admin_dashboard_demo"); ?> | flexi auth | <?php echo lang("a_user_authentication_library"); ?></title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="admin_dashboard">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("admin_dashboard"); ?></h2>
				<p>This page acts as an example dashboard landing page for logged in admin users, demonstrating how some of the functions within the flexi auth library can be used to manage the user accounts, groups and privileges.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<div class="w100 frame">							
					<h3><?php echo lang("user_accounts"); ?></h3>
					<p>Manage the account details of all site users.</p>
					<p>
						This example updates records from the required 'User Accounts' table, and from the custom 'Demo User Profile' table that in this demo is used to store a users name, phone number etc.<br/>
						In addition, this demo also allows the privileges of users to be defined.   
					</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_admin/manage_user_accounts"><?php echo lang("manage_user_accounts"); ?></a>			
						</li>	
					</ul>
					<hr/>

					<h3><?php echo lang("user_groups"); ?></h3>
					<p>Manage the user groups that users can be assigned to.</p>
					<p>User groups are intended to be used to categorise the primary access rights of a user, if required, more specific privileges can then be assigned to a user using the 'User Privileges' below. User groups are completely customised.</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_admin/manage_user_groups"><?php echo lang("manage_user_groups"); ?></a>			
						</li>	
					</ul>
					<hr/>

					<h3><?php echo lang("user_privileges"); ?></h3>
					<p>Manage the specific user privileges that can be assigned to users.</p>
					<p>User privileges are intended to verify whether a user has privileges to perfrom specific actions within the site. The specific action of each privilege is completely customised.</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_admin/manage_privileges"><?php echo lang("manage_user_privileges"); ?></a>			
						</li>	
					</ul>
					<hr/>

					<h3><?php echo lang("user_activity"); ?></h3>
					<p>View lists of users that are currently active, inactive or who have a high number of failed logins attempts.</p>
					<p>
						When a user registers for an account, it is a good practice to have the user confirm their registration via email, as this helps prevent spam accounts being repeatedly setup.<br/>
						Active (activated) account users can login, inactive accounts cannot. It is also possible in suspend an active account to prevent the user from logging in again.
					</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_admin/list_user_status/active"><?php echo lang("list_all_active_users"); ?></a>
						</li>	
						<li>
							<a href="<?php echo $base_url;?>auth_admin/list_user_status/inactive"><?php echo lang("list_all_inactive_users"); ?></a>
						</li>	
						<li>
							<a href="<?php echo $base_url;?>auth_admin/delete_unactivated_users"><?php echo lang("list_all_unactivated"); ?></a>
						</li>	
						<li>
							<a href="<?php echo $base_url;?>auth_admin/failed_login_users"><?php echo lang("list_users_with_a_high"); ?></a> <?php echo lang("helps_identify_possible"); ?>			
						</li>	
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