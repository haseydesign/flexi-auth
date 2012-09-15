<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Message Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for message functions in flexi auth."/> 
	<meta name="keywords" content="message functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Message Functions</h1>
				<p>The flexi auth library includes a messaging system that allows for custom status and error messages to be displayed to users when they perform actions utilising library functions.</p>
				<p>Each message is fully customisable and uses the native CodeIgniter language library to allow for multi-lingual versions of each message.</p>
				<p>Below is a compiled list of functions and configuration settings to implement and customise the management of status and error messages.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>Messages : User Guide Index</h2>				
			<a href="<?php echo $base_url; ?>user_guide/message_config">Message Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/message_functions">Message Functions</a>
			
			<div class="w100 frame">
				<h3>Message Configuration</h3>
				<p>Customise the configuration of the how the library handles status and error messages.</p>
				<p><a href="<?php echo $base_url; ?>user_guide/message_config">Message Config. File Settings</a></p>
			</div>
			
			<div class="w33 frame parallel_target">
				<h3>Status Message Functions</h3>
				<hr/>
				
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#status_messages">status_messages()</a><br/>
						<small>Get any status message(s) that may have been set by recently run functions.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#set_status_message">set_status_message()</a><br/>
						<small>Set a status message to be displayed to the user.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#clear_status_messages">clear_status_messages()</a><br/>
						<small>Clear all status messages.</small>
					</li>
				</ul>
			</div>
			
			<div class="w33 frame parallel_target">
				<h3>Error Message Functions</h3>
				<hr/>
				
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#error_messages">error_messages()</a><br/>
						<small>Get any error message(s) that may have been set by recently run functions.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#set_error_message">set_error_message()</a><br/>
						<small>Set an error message to be displayed to the user.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#clear_error_messages">clear_error_messages()</a><br/>
						<small>Clear all error messages.</small>
					</li>
				</ul>
			</div>
			
			<div class="w33 r_margin frame parallel_target">
				<h3>Global Message Functions</h3>
				<hr/>
				
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#clear_messages">clear_messages()</a><br/>
						<small>Clear all status and error messages.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#get_messages_array">get_messages_array()</a><br/>
						<small>
							Returns any set messages, grouped into a 'status' and 'error' array.<br/>
							The returned status and error messages are then further grouped into 'public' and 'admin' type messages.
						</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_functions#get_messages">get_messages()</a><br/>
						<small>Get any operational function messages whether of status or error type and format their output with delimiters.</small>
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