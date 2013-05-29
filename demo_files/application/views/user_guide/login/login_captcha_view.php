<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Login CAPTCHA Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for user login CAPTCHA functions in flexi auth."/> 
	<meta name="keywords" content="user login CAPTCHA functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Login CAPTCHA Functions</h1>
				<p>The flexi auth library includes a set of optional CAPTCHA functions that can be used to further secure the login process.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>User Login CAPTCHA Functions</h2>
			<a href="<?php echo $base_url; ?>user_guide/login_index">Login Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/login_session_config">Login Session/Cookie Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/validation_config#recaptcha_settings">Login reCAPTCHA Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/login_functions">Login Functions</a>

			<div class="anchor_nav">
				<h6>CAPTCHA Functions</h6>
				<p>
					<a href="#recaptcha">recaptcha()</a> |
					<a href="#validate_recaptcha">validate_recaptcha()</a> |
					<a href="#math_captcha">math_captcha()</a> |
					<a href="#validate_math_captcha">validate_math_captcha()</a> | 
					<a href="#ip_login_attempts_exceeded">ip_login_attempts_exceeded()</a>
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

			<a name="recaptcha"></a>
			<div class="w100 frame">
				<h3 class="heading">recaptcha()</h3>
				
				<p>Generates the html for Google reCAPTCHA.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>recaptcha(ssl)</code>
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
							<td>ssl</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether the reCAPTCHA is to be displayed on an SSL secured page (https).</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The functions loads the reCAPTCHA helper file and then gets the 'Theme' and 'Language' settings from flexi auths config. file. The function then generates the captchas html using the helper file.</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>flexi auth loads the Google reCAPTCHA library as a helper. This file can be found in CI's 'application/helper' directory and is required for the reCAPTCHA to work.</p>
					<p>To then use reCAPTCHA, you must signup for a set of API keys from <a href="http://www.google.com/recaptcha">http://www.google.com/recaptcha</a>.</p>
					<p>The API keys must then be set in flexi auths config. file, where additionally, reCAPTCHAs theme and language can also be set.</p>
<pre>
<span class="comment">// Defining reCAPTCHA API Keys in flexi auth config. file.</span>

$config['security']['recaptcha_public_key'] = 'ENTER_RECAPTCHA_PUBLIC_KEY_HERE';
$config['security']['recaptcha_private_key'] = 'ENTER_RECAPTCHA_PRIVATE_KEY_HERE'; 						
</pre>
					<br>
					<p>If using the 'custom' reCAPTCHA theme (Defined via the config. file option 'recaptcha_theme'), note that the customised reCAPTCHA html code must be <span class="uline">prepended</span> to the code generated via the 'recaptcha()' function.</p>
					<p>Examples of custom themes are available at <a href="https://developers.google.com/recaptcha/docs/customization">https://developers.google.com/recaptcha/docs/customization</a>.</p>
<pre>
<span class="comment">// Defining a custom reCAPTCHA theme.</span>
$custom_recaptcha = '<?php echo htmlspecialchars('
  <div id="recaptcha_widget" style="display:none">
    <div id="recaptcha_image"></div>
    <!-- Customised code ... -->
    <div><a href="javascript:Recaptcha.showhelp()">Help</a></div>
  </div>'); ?>';

$custom_repcatcha .= $this->flexi_auth->recaptcha();
</pre>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>string</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example : Display the reCAPTCHA on a NON SECURED page (http).</span>

$this->flexi_auth->recaptcha(FALSE);
</pre>
<pre>
<span class="comment">// Example : Display the reCAPTCHA on a SECURED page (https).</span>

$this->flexi_auth->recaptcha(TRUE);
</pre>
			</div>

			<a name="validate_recaptcha"></a>
			<div class="w100 frame">
				<h3 class="heading">validate_recaptcha()</h3>
				
				<p>Validates if a Google reCAPTCHA answer is correct.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>flexi auth loads the Google reCAPTCHA library as a CodeIgniter helper and validates the users IP address, and value of the submitted http POST data for the input fields 'recaptcha_challenge_field' and 'recaptcha_response_field'.</p>
				</div>

				<h6>Notes</h6>
				<div class="frame_note">
					<p>flexi auth loads the Google reCAPTCHA library as a helper. This file can be found in CI's 'application/helper' directory and is required for the reCAPTCHA to work.</p>
					<p>This function can either be called directly or via CodeIgniters form validation library, see the examples below for further details.</p>
					<p><strong>The function must be called immediately by the page after the reCAPTCHA has been submitted as http POST data. Additionally, the input fields must be named 'recaptcha_challenge_field' and 'recaptcha_response_field' - as they are by default.</strong></p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example : Validate a reCAPTCHA answer via a direct function call to validate_recaptcha().</span>

$this->flexi_auth->validate_recaptcha();

<span class="comment">// Example : Validate a reCAPTCHA answer via CodeIgniters form validation library.</span>

$this->load->library('form_validation');
$this->form_validation->set_rules('recaptcha_response_field', 'Captcha Answer', 'required|validate_recaptcha');				
</pre>
			</div>

			<a name="math_captcha"></a>
			<div class="w100 frame">
				<h3 class="heading">math_captcha()</h3>
				
				<p>Generates a math captcha question and answer.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function returns a basic math question and sets the answer to a CI flash session.</p>
					<p>The returned question is meant to be immediately displayed to the user, whilst the answer in the CI flash session in validated on the next page load using the <a href="#validate_math_captcha">validate_math_captcha()</a> function.</p>
				</div>

				<h6>Notes</h6>
				<div class="frame_note">
					<p>Use the <a href="#validate_math_captcha">validate_math_captcha()</a> function to validate the users submitted answer.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>TRUE</p>
					<p><strong class="spacer_100">Success:</strong>FALSE</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example : Generate a math question and answer, ouputting the question as a string.</span>

$question = $this->flexi_auth->math_captcha(); // Output '19 - 5'
</pre>
			</div>

			<a name="validate_math_captcha"></a>
			<div class="w100 frame">
				<h3 class="heading">validate_math_captcha()</h3>
				
				<p>Validates if a math captcha answer is correct.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>validate_math_captcha(answer)</code>
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
							<td>answer</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the users submitted answer to a math captcha question.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function compares the users submitted answer to the math captcha answer stored via a CI flash session.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example : An answer to the math captcha question '19 - 5'.</span>

$answer = 14;

$this->flexi_auth->validate_math_captcha($answer);
</pre>
			</div>

			<a name="ip_login_attempts_exceeded"></a>
			<div class="w100 frame">
				<h3 class="heading">ip_login_attempts_exceeded()</h3>
				
				<p>
					Validates whether the number of failed login attempts from a unique IP address has exceeded a defined limit.<br/>
	 				The function would typically be used in conjunction with showing a captcha for users repeatedly failing login attempts.
	 			</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>When a user fails a login attempt, the library records their IP address and increments a counter tracking the number of failed attempts made by the user.</p>
					<p>When this function is called, it checks the entire user table to find any user that last made a failed attempt using the current users IP address, and that has exceeded the defined limit of failed login attempts.</p>
					<p>The failed login attempt limit is defined via the config. files '<a href="<?php echo $base_url; ?>user_guide/validation_config#failed_login_settings">login_attempt_limit</a>' setting.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Examples</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>ip_login_attempts_exceeded()</code>
							<small>Has the current users IP (<?php echo $this->input->ip_address(); ?>) exceeded 3 failed login attempts?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->ip_login_attempts_exceeded()); ?>
						</td>
					</tr>
				</table>
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