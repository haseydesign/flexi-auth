<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Validation and Security Configuration | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring validation and security settings in flexi auth."/> 
	<meta name="keywords" content="validation and security configuration, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Validation and Security Configuration</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>Validation and Security Configuration</h2>
			<a href="<?php echo $base_url; ?>user_guide/validation_index">Validation Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/validation_functions">Validation Functions</a>

			<div class="anchor_nav">
				<h6>Config File Settings</h6>
				<p>
					<a href="#password_settings">Password Settings</a> | 
					<a href="#failed_login_settings">Failed Login Attempt Settings</a> | 
					<a href="#recaptcha_settings">Google reCAPTCHA Settings</a> | 
					<a href="<?php echo $base_url; ?>user_guide/login_session_config#user_login_sessions_cookies">Login Session/Cookie Settings</a>
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
							<li><em>bool</em> : Requires a boolean value set as either '0' (FALSE) or '1' (TRUE).</li>
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

			<a name="password_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">Password Settings</h3>
				
				<p>Define the internal library settings for generating password hashes from salts, password validation and define how the library should handle forgotten password requests.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>min_password_length</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">8</td>
							<td>
								<p>Set the minimum required password character lengths.</p>
							</td>
						</tr>
						<tr>
							<td>valid_password_chars</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">\.\,\-_ a-z0-9</td>
							<td>
								<p>Set which characters are valid for user passwords via a <strong>regular expression</strong>.</p>
								<p>The default allows alpha-numeric, dashes, underscores, periods and commas.</p>
							</td>
						</tr>
						<tr>
							<td>static_salt</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">change-me!</td>
							<td>
								<p>Set the static (non-database stored) salt used for password and hash token generation.</p>
								<p>Do NOT change this salt once users have started registering accounts as their passwords will not work without the original salt.</p>
								<p>Change the default static salt to your own random set of characters.</p>
							</td>
						</tr>
						<tr>
							<td>store_database_salt</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">true</td>
							<td>
								<p>Set whether a salt is stored in the database and then used in conjunction with the static salt for password and hash token generation.</p>
							</td>
						</tr>
						<tr>
							<td>database_salt_length</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">10</td>
							<td>
								<p>Set the length of a stored database salt (See above).</p>
								<p>Note: Only used if <code>$config['security']['store_database_salt'] = true</code></p>
							</td>
						</tr>
						<tr>
							<td>expire_forgotten_password</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">15</td>
							<td>
								<p>Set the expiry time of unused '<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#forgotten_password">Forgotten Password</a>' tokens.</p>
								<p>Users will be required to request a new forgotten password token once expired.</p>
								<p>Example: Time set in minutes, 0 = unlimited, 60*24 = 24 hours, 1440 = 24 hours.</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Password Settings</h6>
<pre><span class="comment">// Defining the minimum required characters for the users password.</span>
$config['security']['min_password_length'] = 8;

<span class="comment">// Defining which characters are valid for user passwords.</span>
$config['security']['valid_password_chars'] = '\.\,\-_ a-z0-9';

<span class="comment">// Defining the static (non-database stored) salt used for password and hash token generation.</span>
$config['security']['static_salt'] = 'change-me!';

<span class="comment">// Defining whether a salt is stored in the database and then used for password and hash token generation.</span>
$config['security']['store_database_salt'] = TRUE;

<span class="comment">// Defining the length of a stored database salt (See above).</span>
$config['security']['database_salt_length'] = 10;

<span class="comment">// Defining the expiry time of unused 'Forgotten Password' tokens.</span>
$config['security']['expire_forgotten_password'] = 15;
</pre>
			</div>

			<a name="failed_login_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">Failed Login Attempt Settings</h3>
				
				<p>Define how the library should handle users that have made multiple failed login attempts.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>login_attempt_limit</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">3</td>
							<td>
								<p>Set a limit to the number of failed login attempts.</p>
								<p>Once limit is passed, user is blocked from another attempt until time ban passes (Defined by 'login_attempt_time_ban' below).</p>
								<p>Additionally/alternatively, a captcha can be set to show once this limit is reached by using the '<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions#ip_login_attempts_exceeded">ip_login_attempts_exceeded()</a>' library function.</p>
								<p>Note: If a user exceeds 3 times the limit set, the resulting time ban is doubled to further slow down attempts.</p>
								<p>Example: 0 = unlimited attempts, 3 = 3 attempts.</p>
							</td>
						</tr>
						<tr>
							<td>login_attempt_time_ban</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">10</td>
							<td>
								<p>If a user has exceeded the failed login attempt limit, set the length of time they must wait before they can attempt to login again.</p>
								<p>Note: The time ban is doubled if the failed attempts are 3 times higher than the limit defined via 'login_attempt_limit'.</p>
								<p>Example: If 'login_attempt_limit' = 3 and 'login_attempt_time_ban' = 10, after 3 failed attempts, the user must wait 10 seconds between each next attempt, after 9 consecutive failed attempts, the user must wait 20 seconds between each next attempt. Attempts within the time ban are ignored and not even checked as being valid.</p>
								<p>IMPORTANT: It is NOT recommended that this time ban is set for a long period of time (> 5 mins).<br/> Long time bans could be abused by attackers to deny legitimate users access, it is designed to SLOW DOWN brute force attackers, not outright ban them.</p>
								<p>Example: Time in seconds, 0 = no time ban, 10 = 10 seconds, 60*3 = 3 minutes.</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Failed Login Attempt Settings</h6>
<pre><span class="comment">// Defining a limit to the number of failed login attempts.</span>
$config['security']['login_attempt_limit'] = 3;

<span class="comment">// Defining the length of time a user with too many failed login attempts must wait before they can 
// attempt to login again.</span>
$config['security']['login_attempt_time_ban'] = 10;
</pre>
			</div>

			<a name="recaptcha_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">Google reCAPTCHA Settings</h3>
				
				<p>Google reCAPTCHA can be used to help slow down brute force login attempts, requiring the user to complete the CAPTCHA before their login details will be submitted.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>recaptcha_public_key</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">-</td>
							<td>
								Set your own unique 'recaptcha_public_key' reCAPTCHA api key.
							</td>
						</tr>
						<tr>
							<td>recaptcha_private_key</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">-</td>
							<td>
								Set your own unique 'recaptcha_private_key' reCAPTCHA api key.
							</td>
						</tr>
						<tr>
							<td>recaptcha_theme</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">white</td>
							<td>
								Set the theme of the reCAPTCHA.<br/>
								For custom theming, see <a href="https://developers.google.com/recaptcha/docs/customization">https://developers.google.com/recaptcha/docs/customization</a>
							</td>
						</tr>
						<tr>
							<td>recaptcha_language</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">en</td>
							<td>
								Set the language of the reCAPTCHA.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre><span class="comment">// Defining your unique Google reCAPTCHA api keys.
// Obtain your keys from <a href="http://www.google.com/recaptcha">http://www.google.com/recaptcha</a></span>
$config['security']['recaptcha_public_key'] = 'ENTER_RECAPTCHA_PUBLIC_KEY_HERE';
$config['security']['recaptcha_private_key'] = 'ENTER_RECAPTCHA_PRIVATE_KEY_HERE'; 

<span class="comment">// Defining the theme of the reCAPTCHA.
// See <a href="https://developers.google.com/recaptcha/docs/customization">https://developers.google.com/recaptcha/docs/customization</a>
// Predefined themes: 'red', 'white', 'blackglass', 'clean'. Set 'custom' for custom themes.</span>
$config['security']['recaptcha_theme'] = 'white';

<span class="comment">// Defining the language of the reCAPTCHA.
// Supported languages: English 'en',  Dutch 'nl',  French 'fr',  German 'de',
// Portuguese 'pt', Russian 'ru', Spanish 'es', Turkish 'tr'.</span>
$config['security']['recaptcha_language'] = 'en';
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