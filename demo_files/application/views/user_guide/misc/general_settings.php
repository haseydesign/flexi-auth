<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>General Settings | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring general settings in flexi auth."/> 
	<meta name="keywords" content="general settings, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | General Settings</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>General Settings</h2>

			<div class="anchor_nav">
				<h6>Config Setup Information</h6>
				<p>
					<a href="#general_settings">General Config File Settings</a>
				</p>
			</div>

			<a name="help"></a>
			<div class="w100 frame">
				<h3 class="heading">Help with the Table Configuration</h3>
				<span class="toggle">Show / Hide Help</span>
				<div id="help_guide" class="hide_toggle">
					<hr/>
					<p><strong>Config Name</strong>: The name that flexi auth internally references the config setting by.</p>
					<p><strong>Default</strong>: The default value set within the config file.</p>
					<p>
						<strong>Data Type</strong>: The data type that is expected by the config setting.
						<ul>
							<li><em>bool</em> : Requires a boolean value of 'TRUE' or 'FALSE'.</li>
							<li><em>string</em> : Requires a textual value.</li>
							<li><em>int</em> : Requires a numeric value. It does not matter whether the value is an integer, float, decimal etc.</li>
							<li><em>array</em> : Requires an array.</li>
							<li><em>datetime</em> : Requires a datetime value. Typically either a MySQL DATETIME (2000-12-31 12:00:00) or UNIX timestamp (1234567890)</li>
						</ul>
					</p>
					<hr/>
					
					<h6>Config File Location</h6>
					<p>The config file is located in CodeIgniters 'config' folder and is named 'flexi_auth.php'.</p>
				</div>
			</div>

			<a name="general_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">General Config File Settings</h3>
				
				<p>Many of flexi auths automatic functions are customisable and can even be turned on and off to suit different websites.</p>
				
<pre><span class="comment">// Set whether an incremented number is added to the end of an unavailable username.</span>
$config['settings']['auto_increment_username'] = FALSE;

<span class="comment">// Set whether accounts are suspended by default on registration / inserting user.</span>
$config['settings']['suspend_new_accounts'] = FALSE;

<span class="comment">// Set a time limit to grant users instant login access, once expired, they are locked out until they
// activate their account via an activation email sent to them.</span>
$config['settings']['account_activation_time_limit'] = 0;

<span class="comment">// Set the id of the default group that new users will be added to unless otherwise specified.</span>
$config['settings']['default_group_id'] = 1;

<span class="comment">// Set which sources are used to retrieve privileges. Can be defined either through privileges 
// assigned per user or via privileges assigned to a users user group.
// Demo default: user and user group. Library default: user only</span>
$config['settings']['privilege_sources']= array('user','group');
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