<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Public Dashboard Demo | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="public_dashboard">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2>Public: Dashboard</h2>
				<p>This page acts as an example dashboard landing page for logged in public users, demonstrating how some of the functions within the flexi auth library can be used to manage the account details of public users.</p>
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
					<h3>Account Details</h3>
					<p>Update the account details of the currently logged in user.</p>
					<p>This example updates records from the required 'User Accounts' table, and from the custom 'Demo User Profile' table that in this demo is used to store a users name, phone number etc.</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_public/update_account">Update Account Details</a>
						</li>	
					</ul>
					<hr/>
					
					<h3>Email Address</h3>
					<p>Update the email address of the currently logged in user, via email verification.</p>
					<p>
						Using email verification to update an email address confirms the user has entered the correct new email address.<br/>
						If they were make a typo entering the address, that then was NOT verified via email, they could potentially be prevented from logging back in via their email address as they wouldn't know how they misspelled it. 
					</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_public/update_email">Update Email Address via Email Verification</a>
						</li>	
					</ul>
					<hr/>
					
					<h3>Password</h3>
					<p>Update the password of the currently logged in user.</p>
					<p>All passwords are securely hashed using the <a href="http://www.openwall.com/phpass/" target="_blank">phpass framework</a>.</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_public/change_password">Update Password</a>
						</li>	
					</ul>
					<hr/>
					
					<h3>Address Book</h3>
					<p>Manage the custom address details of the currently logged in user.</p>
					<p>This example manages records from the custom 'Demo User Address' table that in this demo is used to store a list of different addresses per user.</p>
					<ul>
						<li>
							<a href="<?php echo $base_url;?>auth_public/manage_address_book">Manage Address Book</a>
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