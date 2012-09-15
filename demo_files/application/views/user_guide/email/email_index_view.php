<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Email Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for email functions in flexi auth."/> 
	<meta name="keywords" content="email functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Email Functions</h1>
				<p>Some functions within the flexi auth library send emails to the user in order for them the activate their account, reset forgotten passwords etc.</p>
				<p>To aid the customisation of each of these emails, there are template files included within the library that are populated with the relevant data and emailed to the user.</p>
				<p>Below is a compiled list of functions and configuration settings to customise the email templates.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>Email : User Guide Index</h2>				
			<a href="<?php echo $base_url; ?>user_guide/email_config">Email Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/email_functions">Email Functions</a>
			
			<div class="w100 frame">
				<h3>Email Configuration</h3>
				<p>Customise the configuration of the libraries email template settings.</p>
				<p><a href="<?php echo $base_url; ?>user_guide/email_config">Email Config. File Settings</a></p>
			</div>
			
			<div class="w100 frame parallel_target">
				<h3>Email Functions</h3>
				<hr/>
				
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/email_functions#send_email">send_email()</a><br/>
						<small>Emails a user a predefined email template.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/email_functions#template_data">template_data()</a><br/>
						<small>
							flexi auth sends emails for a number of functions.<br/>
							This function can set additional data variables that can then be included within these emails, by making them available to the email template files.
						</small>
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