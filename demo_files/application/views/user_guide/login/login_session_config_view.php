<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Login Session Configuration | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring user login sessions in flexi auth."/> 
	<meta name="keywords" content="user login session configuration, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Login Session and Cookie Configuration</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>User Login Session and Cookie Configuration</h2>
			<a href="<?php echo $base_url; ?>user_guide/login_index">Login Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/validation_config#recaptcha_settings">Login reCAPTCHA Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/login_functions">Login Functions</a> |
			<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions">Login CAPTCHA Functions</a>

			<div class="anchor_nav">
				<h6>Config Setup Information</h6>
				<p>
					<a href="#db_schema_diagram">Table Schema Diagram</a>
				</p>
				<h6>Table and Config File Settings</h6>
				<p>
					<a href="#user_login_session_table">User Login Session Table</a> | 
					<a href="#user_login_sessions_cookies">User Login Session/Cookie Settings</a> | 
					<a href="#session_names">Session Names</a> | 
					<a href="#cookie_names">Cookie Names</a>
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

			<a name="db_schema_diagram"></a>
			<div class="w100 frame">
				<h3 class="heading">Schema Diagram : User Login Session Table</h3>
				<div class="frame_note">
					<p>A database table schema diagram, showing how the user login session table is related to the primary user account table.</p>
					<p>Note: Table and columns names are defined using their config names referenced within the config file. The names within brackets are the default demo names.</p>
				</div>
				<img src="<?php echo $includes_dir; ?>images/db_diagrams/user_login_session_schema.png" class="db_schema_diagram"/>
			</div>

			<a name="user_login_session_table"></a>
			<div class="w100 frame">
				<h3 class="heading">User Login Session Table</h3>
				
				<p>
					The user login session table is used to validate user login credentials.<br/>
					For security purposes, if a users credentitals do not match those stored within the table, the user is automatically logged out.
				</p>
				<p>
					The login session feature is based on a technique put forward by two articles by Charles Miller and Barry Jaspan.<br/>
					<a href="http://fishbowl.pastiche.org/2004/01/19/persistent_login_cookie_best_practice/">Charles Miller's 'Best Practices' article.</a><br/>
					<a href="http://jaspan.com/improved_persistent_login_cookie_best_practice">Barry Jaspan's Improved Best Practices</a>.
				</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_125">Default</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>table</td>
							<td>user_login_sessions</td>
							<td class="align_ctr">-</td>
							<td>The tables name.</td>
						</tr>
						<tr>
							<td>join</td>
							<td>user_login_sessions.usess_uacc_fk</td>
							<td class="align_ctr">-</td>
							<td>The tables foreign key used to join with foreign keys of other tables.</td>
						</tr>
						<tr>
							<td>identifier</td>
							<td>usess_uacc_fk</td>
							<td class="align_ctr">int</td>
							<td>Defines the user id that the login session is associated with.</td>
						</tr>
						<tr>
							<td>series</td>
							<td>usess_series</td>
							<td class="align_ctr">string</td>
							<td>
								Defines an authentication token that was issued to a user who logged in using the 'Remember me' feature.<br/> 
								This is the 'series' token referred to by <a href="http://jaspan.com/improved_persistent_login_cookie_best_practice">Barry Jaspan</a>.
							</td>
						</tr>
						<tr>
							<td>token</td>
							<td>usess_token</td>
							<td class="align_ctr">string</td>
							<td>Defines an authentication token that is validated and then re-issued to a user everytime their login session is verified.</td>
						</tr>
						<tr>
							<td>date</td>
							<td>usess_login_date</td>
							<td class="align_ctr">datetime</td>
							<td>Defines the date that the token(s) were issued.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The user login session table should not be confused with the CodeIgniter session table name 'ci_sessions'.</p>
					<p>
						The ci_sessions table is natively used by CodeIgniter to store and relate large amounts of data with a browser session.
						Whilst the user login session table used by flexi auth specifically manages the authentication of tokens set by the library within a browser session.
						If the tokens within the table and browser session do not match properly, the users login session is terminated. 
					</p>
					<p>Both of the tables are required by flexi auth to function properly.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment bold">// Defining the table, join and column names.</span>

$config['database']['user_sess']['table'] = 'user_login_sessions';
$config['database']['user_sess']['join'] = 'user_login_sessions.usess_uacc_fk';
$config['database']['user_sess']['columns']['user_id'] = 'usess_uacc_fk';
</pre>
			</div>

			<a name="user_login_sessions_cookies"></a>
			<div class="w100 frame">
				<h3 class="heading">User Login Session/Cookie Settings</h3>
				
				<p>Define how the library handles the behaviour of login sessions and cookies.</p>
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
							<td>validate_login_onload</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">true</td>
							<td>
								<p>Set whether login details are validated on every page load.</p>
								<p><em>true</em> = Login credentials are validated against the database everytime a page is loaded, invalid users are logged out automatically.</p>
								<p><em>false</em> = Login credentials are validated only once at time of login and will not expire until CI sessions expire (Defined via CI config file).</p>
							</td>
						</tr>
						<tr>
							<td>login_session_expire</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">60*60*3</td>
							<td>
								<p>Set the lifetime of a user login session in seconds.</p>
								<p>
									Example: 60*30 = 30 minutes, 60*60*24 = 1 day, 86400 = 1 day, 0 = Unlimited.<br/>
									Setting the value as '0' would mean the session would not expire until CIs own session value (config['sess_expiration'] in CI config file) expired.
								</p>
								<p>Note: Used when <code>$config['security']['validate_login_onload'] = true</code></p>
							</td>
						</tr>
						<tr>
							<td>extend_login_session</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">true</td>
							<td>
								<p>Set whether a users login time is extended when their session token is validated (On every page load).</p>
								<p>Note: Used when <code>$config['security']['validate_login_onload'] = true</code></p>
							</td>
						</tr>
						<tr>
							<td>logout_user_onclose</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">true</td>
							<td>
								<p>Set whether a user is logged out as soon as the browser is closed.</p>
								<p>
									Creates a cookie with a 0 lifetime that is deleted when the browser is closed.<br/>
								 	This invalidates the users session the next time they visit the website as there is no longer a matching cookie.
								</p>
								<p>Note: Used when <code>$config['security']['validate_login_onload'] = true</code></p>
							</td>
						</tr>
						<tr>
							<td>unset_password_status_onclose</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">true</td>
							<td>
								<p>Set whether a user has their 'logged in via password' status removed as soon as the browser is closed.</p>
								<p>
									If the user enabled the 'Remember me' feature on login, and their session is still valid, they will have a 'logged in via "Remember me"' status on their next visit.<br/>
								 	If the user did not enable the 'Remember me' feature on login, they will be logged out on their next visit.
								</p>
								<p>
									If this setting is not enabled, a user who has logged in via password will have the same login status if they close the browser and revisit the site before the login 
									session expires ('login_session_expire').
								</p>
								<p>
									Creates a cookie with a 0 lifetime that is deleted when the browser is closed.<br/>
								 	This invalidates the users session the next time they visit the website as there is no longer a matching cookie.
								</p>
								<p>Note: Used when <code>$config['security']['logout_user_onclose'] = false</code></p>
							</td>
						</tr>
						<tr>
							<td>user_cookie_expire</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">60*60*24*14</td>
							<td>
								<p>Set the lifetime of a users login cookies in seconds, this includes the 'Remember me' cookies.</p>
								<p>Example: 60*60*24 = 24 hours, 60*60*24*14 = 14 days, 86400 = 1 day.</p>
							</td>
						</tr>
						<tr>
							<td>extend_cookies_on_login</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">true</td>
							<td>
								<p>Set whether a users 'Remember me' login cookies have their lifetime extended when their session token is validated.</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Login Cookie and Session Settings</h6>
<pre><span class="comment">// Defining whether login details are validated on every page load.</span>
$config['security']['validate_login_onload'] = TRUE;

<span class="comment">// Defining the lifetime of a user login session in seconds.</span>
$config['security']['login_session_expire'] = 60*60*3;
				
<span class="comment">// Defining whether a users login time is extended when their session token is validated (On every page load).</span>
$config['security']['extend_login_session'] = TRUE;

<span class="comment">// Defining whether a user is logged out as soon as the browser is closed.</span>
$config['security']['logout_user_onclose'] = TRUE;

<span class="comment">// Defining whether a users 'logged in via password' status is removed as soon as the browser is closed.</span>
$config['security']['unset_password_status_onclose'] = TRUE;

<span class="comment">// Defining the lifetime of a users login cookies in seconds, this includes the 'Remember me' cookies.</span>
$config['security']['user_cookie_expire'] = 60*60*24*14;

<span class="comment">// Defining whether a users 'Remember me' login cookies have their lifetime extended when their 
// session token is validated.</span>
$config['security']['extend_cookies_on_login'] = TRUE;
</pre>
			</div>

			<a name="session_names"></a>
			<div class="w100 frame">
				<h3 class="heading">Session Names</h3>
				
				<p>flexi auth uses CI sessions to store and serve authentication data between pages loads.</p>
				<p>
					All flexi auth session data is stored together within one session array, this helps maintain a tidy session structure.<br/>
					If required, the name of each session within the flexi auth library can be defined.
				</p>
				<hr/>

<pre><span class="comment bold">// Auth Session Name.</span>
<span class="comment">// Set the root auth session name saved as an array in the CI session, 
// all other flexi auth session data is then stored within this array.</span>
$config['sessions']['name'] = 'flexi_auth';

<span class="comment bold">// Primary User Indentifier Session.</span>
<span class="comment">// Contains the $config['database']['settings']['primary_identity_col'] config column value.
// This value is then used to internally identify the user when performing CRUD functions.</span>
$config['sessions']['user_identifier'] = 'user_identifier';

<span class="comment bold">// User Account Data Sessions.</span>
<span class="comment">// Used for performing various CRUD functions.</span>
$config['sessions']['user_id'] = 'user_id';
$config['sessions']['is_admin'] = 'admin';
$config['sessions']['group'] = 'group';
$config['sessions']['privileges'] = 'privileges';

<span class="comment bold">// Login Via Password.</span>
<span class="comment">// Indicate whether the user logged in via entering a password or was logged in automatically  
// via the 'Remember me' function.</span>
$config['sessions']['logged_in_via_password'] = 'logged_in_via_password';

<span class="comment bold">// Login Session Token.</span>
<span class="comment">// The login session token is used to help validate a users login credentials against a stored database token.</span>
<span class="comment">// Note: Only used when "<em>$config['security']['validate_login_onload'] = true</em>" has been defined.</span>
$config['sessions']['login_session_token'] = 'login_session_token';

<span class="comment bold">// Math Captcha Flash Session.</span>
<span class="comment">// Used to store the answer of a math captcha question, this data is stored only in a CI flash session 
// and so will only be available on the next page and is then deleted.</span>
$config['sessions']['math_captcha'] = 'math_captcha';
</pre>
			</div>

			<a name="cookie_names"></a>
			<div class="w100 frame">
				<h3 class="heading">Cookie Names</h3>
				
				<p>
					flexi auth uses cookies to store and serve authentication data for the next time a user visits the website.<br/>
					If required, the name of each cookie within the flexi auth library can be defined.
				</p>
				<hr/>
				
<pre><span class="comment bold">// 'Remember me' Cookies.</span>
<span class="comment">// Used to store 'Remember me' data to automatically log a user in next time they visit the website.</span>
$config['cookies']['user_id'] = 'user_id';
$config['cookies']['remember_series'] = 'remember_series';
$config['cookies']['remember_token'] = 'remember_token';

<span class="comment bold">// Login Session Cookie.</span>
<span class="comment">// The cookie login session token is used to invalidate a users login session when they close their 
// browser by deleting itself.</span>
<span class="comment">// Note: Only used when "<em>config['security']['validate_login_onload'] = TRUE</em>" and
// "<em>$config['security']['logout_user_onclose'] = TRUE</em>" have been defined.</span>
$config['cookies']['login_session_token'] = 'login_session_token';

<span class="comment bold">// Login Via Password Cookie.</span>
<span class="comment">// The login via password cookie token is used to invalidate a users 'logged in via password' status
// when they close their browser by deleting itself.</span>
<span class="comment">// Note: Only used when "<em>config['security']['logout_user_onclose'] = FALSE</em>" has been defined.</span>
$config['cookies']['login_via_password_token'] = 'login_via_password_token';
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