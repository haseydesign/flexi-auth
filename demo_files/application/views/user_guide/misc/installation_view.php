<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Installation Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for installing the flexi auth library."/> 
	<meta name="keywords" content="installation guide, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Installation Guide</h1>
				<p>Setting up flexi auth is a quick and painless process that can be completed in just a few minutes.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			
			<div class="w100 frame">
				<h3 class="heading">Installing flexi auth</h3>
				<p>The following notes describe how to install flexi auth to a brand new Codeigniter 2.0 installation.</p>
				<p>
					The guide includes the steps to install either the 'library only' or 'demo' versions of flexi auth.<br/>
					The library version contains only the essential files required to run flexi auth, the demo version includes all files to run an installation of the online flexi auth demo.	
				</p>
				<p class="highlight_red">Note that some of the steps listed below may not need to be completed if the flexi auth library is being installed to to a previously setup CodeIgniter installation.</p>
				<hr/>
				
				<h6>Update the 'config/config.php' file</h6>
				<div class="frame_note">
					<p>The following steps may not need to be applied to a previous CodeIgniter installation.</p>
					<ul>
						<li>
							Update the 'base_url' to CodeIgniters root installation directory.<br/>
							<code>$config['base_url'] = 'http://localhost/your_codeigniter_directory/';</code>
						</li>
						<li>
							Update the 'index_page' config setting to ''. This will remove 'index.php' from the sites urls.<br/>
							Note that this is optional, and if done, a '.htaccess' files needs to be included in the root directory of the installation.<br/>
							A sample '.htaccess' file is included in the demo.<br/>
							<code>$config['index_page'] = '';</code>
						</li>
						<li>
							Update the 'encryption_key' config setting to a value of your choice.<br/>
							This is optional, but will improve security with your CodeIgniter installation.<br/>
							<code>$config['encryption_key'] = 'YOUR_ENCRYPTION_KEY';</code>
						</li>
						<li>
							Update the 'global_xss_filtering' config setting to TRUE.<br/>
							This is optional, but will improve security with your CodeIgniter installation.<br/>
							<code>$config['global_xss_filtering'] = TRUE;</code>
						</li>
					</ul>

					<p>This step must be completed to all flexi auth installations.</p>
					<ul>
						<li>
							Update the 'sess_use_database' config setting to TRUE. This instructs CodeIgniter to save session data to the database rather than as a browser cookie.<br/>
							<strong>This is required</strong> as the auth session data is too big to store in a cookie.<br/>
							<code>$config['sess_use_database'] = TRUE;</code>
						</li>
					</ul>
				</div>
				
				<h6>Update the 'config/database.php' file</h6>
				<div class="frame_note">
					<p>This step must be completed if a database has not been configured with your CodeIgniter installation.</p>
					<ul>
						<li>
							Update the database configuration settings located in the 'config/database.php' file to connect to your database.
						</li>
					</ul>
				</div>
				
				<h6>Update the 'config/routes.php' file</h6>
				<div class="frame_note">
					<p>This step is only required if you are installing the flexi auth demo.</p>
					<ul>
						<li>
							Update the 'default_controller' to the sites home page.<br/>
							<code>$route['default_controller'] = 'auth_lite/index';</code>
						</li>
					</ul>
				</div>
				
				<h6>Copy flexi auth files to CodeIgniter installation</h6>
				<div class="frame_note">
					<p>The flexi auth repository is split into two sections, essential 'library files', and optional 'demo files'.</p>
					<p>If you wish to install the demo, you will need to install both the 'library files' and the 'demo files'.</p>
					<p>Note: Both folders also include an 'sql_dump' folder, see the 'Import SQL database dump' section below for further details.</p>
					<hr/>
					<strong>Installing Library Files</strong>
					<p>To install the flexi auth library, copy the 'application' folder from 'library_files' to the root Codeigniter folder.</p>		
					<p>The 'application' folder in the <span class="unline">'library_files'</span> folder includes the following folders and files:</p>
					<ul>
						<li>
							<strong>config</strong> : 'flexi_auth.php'.
						</li>
						<li>
							<strong>helpers</strong> : 'recaptcha_helper.php'.  
						</li>
						<li>
							<strong>lanaguge</strong> : 'english/flexi_auth_lang.php', (Plus any other language files...).  
						</li>
						<li>
							<strong>libraries</strong> : 'flexi_auth.php', 'flexi_auth_lite.php', 'MY_Form_validation.php' and the PHPASS library in the folder 'phpass'.  
						</li>
						<li>
							<strong>models</strong> : 'flexi_auth_model.php' and 'flexi_auth_lite_model.php'.  
						</li>
					</ul>
					<hr/>
					<strong>Installing Demo Files</strong>
					<p>To install the flexi auth demo, install the essential library files as described above, then also copy the 'application' and 'includes' folder from 'demo_files' to the root Codeigniter folder.</p>				
					<p>The <span class="unline">'demo_files'</span> folder includes three folders in the root directory, 'application', 'includes', 'sql_dump' and a '.htaccess' file.</p>
					<p>The 'application' folder contains the following folders and files:</p>
					<ul>
						<li>
							<strong>controllers</strong> : 'auth.php', 'auth_admin.php', 'auth_lite.php', 'auth_public.php' and 'user_guide.php', 
						</li>
						<li>
							<strong>models</strong> : 'demo_auth_admin_model.php' and 'demo_auth_model.php'.  
						</li>
						<li>
							<strong>views</strong> : The folders 'demo', 'includes' and 'user_guide' and multiple php files.
						</li>
					</ul>
					<p>The 'includes' folder contains the following folders and files:</p>
					<ul>
						<li>
							<strong>css</strong> : 'global.css' and 'structure.css', 
						</li>
						<li>
							<strong>images</strong> : multiple images used throughout the demo.  
						</li>
						<li>
							<strong>js</strong> : 'global.js' and 'jquery.tools.tooltips.min.js'.
						</li>
					</ul>
				</div>
		
				<h6>Update the '.htaccess' root CodeIgniter directory</h6>
				<div class="frame_note">
					<p>
						If installing the flexi auth demo to a new CodeIgniter installation, you may wish to also copy the '.htaccess' file to the root CodeIgniter directory.<br/>
						Note that you may need to change the path of the files 'RewriteBase /' to your servers Codeigniter installation.
					</p>
					<p>
						<strong>Example</strong><br/>
						If the 'base_url' defined via the config file was <code>$config['base_url'] = 'http://localhost/your_codeigniter_directory/'</code><br/>
						Then the '.htaccess' file should be updated to <code>RewriteBase /your_codeigniter_directory/</code>.
					</p>
				</div>

				<h6>Update 'base_url' and 'includes_dir' vars</h6>
				<div class="frame_note">
					<p>If installing the flexi auth demo, the directories of the 'base_url' and 'includes_dir' vars need to be updated for the demo files to work correctly.</p>
					<p>
						Open each of the demo controllers and update the 'base_url' and 'includes_dir' vars.<br/>
						These can be found in the constructor of each controller and look like.
					</p>
					<p>
						<code>$this->load->vars('base_url', 'http://localhost/your_codeigniter_directory/');</code><br/>
						<code>$this->load->vars('includes_dir', 'http://localhost/your_codeigniter_directory/includes/');</code>
					</p>
					<p>The 'base_url' must refer to CodeIgniters root installation directory. 'includes_dir' must refer to the demo 'includes' folder.</p>
				</div>
				
				<h6>Import SQL database dump</h6>
				<div class="frame_note">
					<p>Import the SQL database dump file included with the flexi auth installation to your database.</p>
					<p>If you are installing only the library files, install the sql dump within the 'library_files' folder. If installing the demo, install sql dump within the 'demo_files' folder.</p>
					<p>The flexi auth <span class="uline">'library_files'</span> folder includes the SQL dump file 'flexi_auth_database_dump.sql', which contains all the essential tables, columns and data that is required to utilise every feature within flexi auth.</p>
					<p>The flexi auth <span class="uline">'demo_files'</span> folder includes the SQL dump file 'flexi_auth_demo_database_dump.sql', which contains all the essential tables, but with example data and extra example tables that are utilised by the demo.</p>
				</div>
				
				<h6>Static Salt for Password Hashing</h6>
				<div class="frame_note">
					<p>It is very important that <span class="uline">BEFORE</span> you insert any users into the database, that you change the libraries static salt to your own unique value.</p>
					<p>Once you start inserting users to the database, their password will have been hashed using this salt, therefore it cannot be later changed without reseting everyones passwords.</p>
					<p>The static salt can be defined via the the config file.</p>
					<p>
						<code>$config['security']['static_salt'] = 'change-me!';</code>
					</p>
				</div>
				
				<h6>Google reCAPTCHA</h6>
				<div class="frame_note">
					<p>If you are using the demo or intend to use Googles reCAPTCHA within your application, then you will need to <a href="http://www.google.com/recaptcha" target="_blank">get your own API keys</a> in order to use the service.</p>
					<p>Once you have obtained your keys, update the flexi auth libraries config file as follows.</p>
					<p>
						<code>$config['security']['recaptcha_public_key'] = 'ENTER_RECAPTCHA_PUBLIC_KEY_HERE';</code><br/>
						<code>$config['security']['recaptcha_private_key'] = 'ENTER_RECAPTCHA_PRIVATE_KEY_HERE';</code>
					</p>
				</div>
				
				<h6>That's it!</h6>
				<div class="frame_note">
					<p>Next you can start configuring the flexi auth config file and database tables to match the setup that you require.</p>
					<p>Once you have configured the site to your requirements, start building the site.</p>
					<p>If starting from scratch, check out the demo flexi auth installation for live working examples of using many of the library functions.</p>			
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