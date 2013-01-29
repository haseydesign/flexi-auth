<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The flexi auth user guide."/> 
	<meta name="keywords" content="user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | flexi auth</h1>
				<p>flexi auth is the developers toolkit for building highly customised user authentication systems.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>User Guide Sections</h2>				

			<div class="w100 frame">
				<h3>Getting Started</h3>
				<hr/>
				<ul>
					<li><a href="https://github.com/haseydesign/flexi-auth">Download</a> the latest version of the flexi auth library.</li>
					<li>Read through the <a href="<?php echo $base_url; ?>user_guide/installation">installation guide</a>.</li>
					<li>Read the <a href="<?php echo $base_url; ?>user_guide/concept">flexi auth concept</a> to understand the principle ideas of how flexi auth works.</li>
					<li>Read the <a href="<?php echo $base_url; ?>user_guide/library_info">library documentation</a> to get an understanding of the purpose of each library.</li>
					<li>Then start building your user authentication system, using the demo and user guide for reference on how to implement each of flexi auths features.</li>
				</ul>
			</div>	
				
			<div class="w50 frame parallel_target">
				<h3>Configuration</h3>
				<hr/>
				
				<h6>Internal Auth Data</h6>
				<ul class="inl_block">
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_session_config#user_login_sessions_cookies">Session / Cookie Settings</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_config">Validation / Security Settings</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/email_config">Email Settings</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_config#message_delimiters">Status / Error Messages</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_config#language">Define Language</a>
					</li>
				</ul>
				<hr/>
				
				<h6>Database Tables and Columns</h6>
				<ul class="inl_block">
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_config#primary_user_account_table">Primary User Account Table</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_config#custom_user_tables">Custom User Account Tables</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_config">User Group Table</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_config#user_privilege_table">User Privilege Table</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_config#user_privilege_users_table">User Privilege Users Table</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_config#user_privilege_groups_table">User Privilege Groups Table</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_session_config#user_login_session_table">User Login Session Table</a>
					</li>
				</ul>
			</div>
				
			<div class="w50 r_margin frame parallel_target">
				<h3>Function List</h3>
				<hr/>

				<h6>Login / Validation Functions</h6>
				<ul class="inl_block">
					<li>
						<a href="<?php echo $base_url; ?>user_guide/login_index">Login / CAPTCHA Functions</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/validation_index">Validation Functions</a>
					</li>
				</ul>
				<hr/>
				
				<h6>User Functions</h6>
				<ul class="inl_block">
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_account_index">User Account Functions</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_group_index">User Group Functions</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/user_privilege_index">User Privilege Functions</a>
					</li>
				</ul>
				<hr/>
				
				<h6>Utility Functions</h6>
				<ul class="inl_block">
					<li>
						<a href="<?php echo $base_url; ?>user_guide/email_index">Email Functions</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/message_index">Status / Error Messages</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_index">Customising SQL Statements</a>
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