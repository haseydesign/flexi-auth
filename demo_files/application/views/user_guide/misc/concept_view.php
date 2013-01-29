<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Concept | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The principle ideas of how flexi auth works."/> 
	<meta name="keywords" content="concept, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | flexi auth concept</h1>
				<p>The principle ideas of how flexi auth works and how to use its 'flexible' features.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			
			<div class="anchor_nav">
				<h6>Concept</h6>
				<p>
					<a href="#concept">The flexi auth Concept</a> | <a href="#structure">Library File Structure</a>
				</p>
			</div>

			<a name="concept"></a>
			<div class="w100 frame">
				<h3 class="heading">The flexi auth Concept</h3>
				<p>The purpose of the flexi auth library is to offer modularised user authentication features, that allow a developer to pick and choose which features they require, without having to include features that are surplus to the clients requirements.</p>
				<p>flexi auth is flexible enough to be used to create simple login-logout authentication, up to authentication systems with features including user groups and privileges, account activation, forgotten passwords etc. The tools are provided, you just have to put them together.</p>
				<p>What flexi auth is not, is an all-in-one out-of-the-box login solution, you still need to build the structure of the site, flexi auth just adds the user authentication functionality to that structure. If you build the house, it will validate who comes in and out.</p>
			</div>

			<a name="structure"></a>
			<div class="w100 frame">
				<h3 class="heading">Library File Structure</h3>

				<p>The complete flexi auth library is controlled via several files, a config file, 2 library files, 2 model files, an extension to CI's form validation library, a reCaptcha helper and multiple language files. The library also uses the PHPASS library to manage passwords.</p>
				<ul>
					<li>The config file as you would expect controls the entire configuration of flexi auth, defining auth session names, database tables and auth behaviour settings.</li>
					<li>
						The library and model files are separated into 2 operational tasks, offering a 'lite' and 'standard' set of tools.
						<ul>
							<li>The 'lite' library typically reads data from the cart session or database. It is not used to save data.</li>
							<li>The 'standard' library does the heavy work, managing SQL CRUD functionality of users, user groups and privileges, plus much more.</li>
						</ul>
						Read the <a href="<?php echo $base_url; ?>user_guide/library_info">library documentation</a> for further information on flexi auths library files.
					</li>
					<li>The extension of CI's validation library includes functions to help validate passwords and captchas. It also includes functions to lookup whether user identities are available when users create an account.</li>
					<li>A helper file is included to enable the use of Googles reCaptcha tool.</li>
					<li>The language files are used to translate cart status and error messages based on a users location.</li>
					<li>The <a href="http://www.openwall.com/phpass/">PHPASS</a> library is also included to securely manage user passwords.</li>
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