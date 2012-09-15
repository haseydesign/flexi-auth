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
				<h1>User Guide | User Login Functions</h1>
				<p>The flexi auth library core login and logout functions.</p>
			</div>
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>User Login Functions</h2>
			<a href="<?php echo $base_url; ?>user_guide/login_index">Login Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/login_session_config">Login Session/Cookie Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/validation_config#recaptcha_settings">Login reCAPTCHA Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/login_captcha_functions">Login CAPTCHA Functions</a>

			<div class="anchor_nav">
				<h6>Functions</h6>
				<p>
					<a href="#login">login()</a> | <a href="#logout">logout()</a>
				</p>
			</div>

			<a name="help"></a>
			<div class="w100 frame">
				<h3 class="heading">Help with Function Parameters</h3>
				<span class="toggle">Show / Hide Help</span>
				<div id="help_guide" class="hide_toggle">
					<hr/>
					<p><strong>Name</strong>: The name of the function parameter (argument).</p>
					<p>
						<strong>Data Type</strong>: The data type that is expected by the parameter.
						<ul>
							<li><em>bool</em> : Requires a boolean value of 'TRUE' or 'FALSE'.</li>
							<li><em>string</em> : Requires a textual value.</li>
							<li><em>int</em> : Requires a numeric value. It does not matter whether the value is an integer, float, decimal etc.</li>
							<li><em>array</em> : Requires an array.</li>
						</ul>
					</p>
					<p><strong>Required</strong>: Defines whether the parameter requires a value to be submitted.</p>
					<p><strong>Default</strong>: Defines the default parameter value that is used if no other value is submitted.</p>
				</div>
			</div>
				
			<a name="login"></a>
			<div class="w100 frame">
				<h3 class="heading">login()</h3>
				
				<p>Verifies a users identity and password, if valid, they are logged in.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>login(identity, password, remember_user)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>identity</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the identity of the user.<br/>
								Depending on the the settings defined via the config. file, this can either be the users email or username.
							</td>
						</tr>
						<tr>
							<td>password</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>The users plain text password.</td>
						</tr>
						<tr>
							<td>remember_user</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether a cookie should be created to auto login the user on future visits to the site.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>
						The function checks whether the config. file has defined for failed login attempts to be counted, if so, the function will check how many failed login attempts have been made using the submitted identity.<br/>
						If the number of failed attempts exceed the limit defined via the config. file, it will then check whether an imposed short time limit ban has passed. If the time ban has not passed, the login attempt will stop.
					</p>
					<p>Provided the login attempt isn't still pending a time limit ban, the function will lookup the users account data from the database table.</p>
					<p>If the user is found, the function will then perform a series of checks, checking the users account has been activated (If required), not since suspended, and most importantly that the submitted password is valid.</p>
					<p>If the users data was invalid, the function will increment the failed login attempt counter. If the data was valid, the function will reset the counter for any previous failed login attempts and then set the users authentication details to the database and the browsers session and cookie (If 'Remember me' was used).</p>
				</div>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>This function is compatible with flexi auths '<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Query Builder</a>' functions.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example : Login user and set a 'Remember me' cookie.</span>

$identity = 'user@example.com';
$password = 'plaintextpassword';
$remember_user = true;

$this->flexi_auth->login($identity, $password, $remember_user);
</pre>
			</div>

			<a name="logout"></a>
			<div class="w100 frame">
				<h3 class="heading">logout()</h3>
				
				<p>Logs a user out of their current session or all sessions.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>logout(all_sessions)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_100 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>all_sessions</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">TRUE</td>
							<td>
								Defines whether sessions on all devices (i.e. A home and work computer) that the user has logged into the site on should be logged out.<br/>
								If set as FALSE, only the current browsers session will be logged out.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function deletes all session and cookie data in the current browser.</p>
					<p>If '<em>all_sessions = TRUE</em>', the function will then delete all login session data that is stored within the database. This means that the next time another device that was previously logged in is used, its database credentials will have been deleted, and so the session will be invalid and auto logged out.</p>
					<p>This function also includes a garbage collection function that deletes any expired login sessions from the database, regardless of which user they belong to.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Log a user out of their current browser session.</span>

$this->flexi_auth->logout(FALSE);
</pre>
<pre>
<span class="comment">// Example #2 : Log a user out of all devices that are logged into their account.</span>

$this->flexi_auth->logout(TRUE);
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