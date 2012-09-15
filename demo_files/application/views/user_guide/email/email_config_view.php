<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Email Configuration | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring email in flexi auth."/> 
	<meta name="keywords" content="email configuration, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="user_guide">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- User Guide Navigation -->
	<?php $this->load->view('includes/user_guide_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="intro_text">
				<h1>User Guide | Email Configuration</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>Email Configuration</h2>
			<a href="<?php echo $base_url; ?>user_guide/email_index">Email Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/email_functions">Email Functions</a>

			<div class="anchor_nav">
				<h6>Config File Settings</h6>
				<p>
					<a href="#email_settings">Email Settings</a>
				</p>
			</div>

			<a name="email_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">Email Settings</h3>
				
				<p>
					Some of the functions in flexi auth need to send emails to the user (i.e. 'Account Activation', 'Forgot Password' etc).<br/>
					If required, the title, reply address, email type and the content of these emails can be configured to suit different website needs.
				</p>
				<hr/>
					
				<h6>Example</h6>
<pre>
<span class="comment">// Site title shown as 'from' header on emails.</span>
$config['email']['site_title'] = 'flexi auth';

<span class="comment">// Reply email shown as 'from' header on emails.</span>
$config['email']['reply_email'] = 'info@website.com';

<span class="comment">// Type of email to send, options: 'html', 'text'.</span>
$config['email']['email_type'] = 'html';

<span class="comment">// Sub-directory where email templates are stored within CI's 'view' directory.</span>
$config['email']['email_template_directory'] = 'includes/email/';

<span class="comment">// Filename of 'Activate Account' email template.</span>
$config['email']['email_template_activate'] = 'activate_account.tpl.php';

<span class="comment">// Filename of 'Forgot Password' email template.</span>
$config['email']['email_template_forgot_password'] = 'forgot_password.tpl.php';

<span class="comment">// Filename of 'Forgot Password Complete' email template.</span>
$config['email']['email_template_forgot_password_complete'] = 'new_password.tpl.php';

<span class="comment">// Filename of 'Update Email' email template.</span>
$config['email']['email_template_update_email'] = 'update_email_address.tpl.php';
</pre>
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