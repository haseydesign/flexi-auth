<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Validation Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for validation functions in flexi auth."/> 
	<meta name="keywords" content="validation functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Validation Functions</h1>
				<p>
					Validation has two important roles within any login system, primarily it is used to check whether a user is authorised to perform specific actions.<br/>
					Secondarily it is used to ensure the integrity of data within the database, checking that values like passwords are of a valid length and contain acceptable characters.
				</p>
				<p>Below is a compiled list of functions and configuration settings to customise the validation of user credentials.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>Validation : User Guide Index</h2>				
			<a href="<?php echo $base_url; ?>user_guide/validation_config">Validation / Security Config</a> | 
			<a href="<?php echo $base_url; ?>user_guide/validation_functions">Validation Functions</a>
			
			<div class="w100 frame">
				<h3>Validation and Security Configuration</h3>
				<p>Customise the configuration of how the library handles password settings and the settings for Google reCAPTCHA.</p>
				<p><a href="<?php echo $base_url; ?>user_guide/validation_config">Validation and Security Config. File Settings</a></p>
			</div>
			
			<div class="w100 frame">
				<h3>User Status / Privilege Validation Functions</h3>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#is_logged_in">is_logged_in()</a><br/>
						<small>Verifies a user is logged in either via entering a valid password or using the 'Remember me' feature.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#is_logged_in_via_password">is_logged_in_via_password()</a><br/>
						<small>Verifies a user has logged in via entering a valid password rather than using the 'Remember me' feature.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#is_admin">is_admin()</a><br/>
						<small>Verifies a user belongs to a user group with admin permissions.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#in_group">in_group()</a><br/>
						<small>Verifies whether a user is assigned to a particular user group.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#is_privileged">is_privileged()</a><br/>
						<small>Verifies whether a user has a specific privilege.</small>
					</li>
				</ul>
				<hr/>

				<h3>Identity Validation Functions</h3>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#identity_available">identity_available()</a><br/>
						<small>Returns whether a user identity (Username and/or Email) is available.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#email_available">email_available()</a><br/>
						<small>Returns whether an email address is available.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#username_available">username_available()</a><br/>
						<small>Returns whether a username is available.</small>
					</li>
				</ul>
				<hr/>
				
				<h3>Password Validation Functions</h3>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#validate_current_password">validate_current_password()</a><br/>
						<small>Validate a submitted password matches the password of a specific user stored in the database.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#min_password_length">min_password_length()</a><br/>
						<small>Gets the minimum valid password character length.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_functions#valid_password_chars">valid_password_chars()</a><br/>
						<small>Validate whether the submitted password only contains valid characters.</small>
					</li>
				</ul>
				<hr/>

				<h3>Captcha Validation Functions</h3>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions#validate_recaptcha">validate_recaptcha()</a><br/>
						<small>Validates if a Google reCAPTCHA answer is correct.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions#validate_math_captcha">validate_math_captcha()</a><br/>
						<small>Validates if a math captcha answer is correct.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions#ip_login_attempts_exceeded">ip_login_attempts_exceeded()</a><br/>
						<small>
							Validates whether the number of failed login attempts from a unique IP address has exceeded a defined limit.<br/>
							Typically used in conjunction with showing a captcha for users repeatedly failing login attempts.
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