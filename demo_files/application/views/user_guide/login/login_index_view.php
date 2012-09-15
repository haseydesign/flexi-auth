<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Login Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for user login functions in flexi auth."/> 
	<meta name="keywords" content="user login functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Login Functions</h1>
				<p>The flexi auth library uses browser sessions and cookies in conjunction with a session management table within the database to handle user logins.</p>
				<p>Below is a compiled list of functions and configuration settings to customise how users can authenticate their login credentials.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>Users : User Guide Index</h2>				
			<a href="<?php echo $base_url; ?>user_guide/login_session_config">Login Session/Cookie Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/validation_config#recaptcha_settings">Login reCAPTCHA Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/login_functions">Login Functions</a> | 
			<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions">Login CAPTCHA Functions</a>
			
			<div class="w100 frame">
				<h3>Login Configuration Settings</h3>
				<p>Customise the configuration of how the auth library handles login sessions and CAPTCHA settings.</p>
				<p>
					<ul>
						<li>
							<a href="<?php echo $base_url; ?>user_guide/login_session_config">Login Session/Cookie Configuration</a> : 
							<small class="inline">Sessions and cookies are used by the library to track and authenticate the login sessions of users.</small>
						</li>
						<li>
							<a href="<?php echo $base_url; ?>user_guide/validation_config#recaptcha_settings">Login CAPTCHA Configuration</a> : 
							<small class="inline">CAPTCHAs can be used to help improve the security of login forms.</small>
						</li>
					</ul>
				</p>
			</div>
			
			<div class="w50 frame parallel_target">
				<h3>Login Functions</h3>
				<small>The libraries core login and logout functions.</small>
				<hr/>
				
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_functions#login">login()</a><br/>
						<small>Verifies a users identity and password, if valid, they are logged in.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_functions#logout">logout()</a><br/>
						<small>Logs a user out of their current session or all sessions.</small>
					</li>
				</ul>
			</div>
			
			<div class="w50 r_margin frame parallel_target">
				<h3>Login CAPTCHA Functions</h3>
				<small>CAPTCHA functions to aid login verification.</small>
				<hr/>
				
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions#recaptcha">recaptcha()</a><br/>
						<small>Generates the html for Google reCAPTCHA.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions#validate_recaptcha">validate_recaptcha()</a><br/>
						<small>Validates if a Google reCAPTCHA answer is correct.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions#math_captcha">math_captcha()</a><br/>
						<small>Generates a math captcha question and answer.</small>
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