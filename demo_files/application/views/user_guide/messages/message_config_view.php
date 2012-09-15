<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Message Configuration | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring messages in flexi auth."/> 
	<meta name="keywords" content="message configuration, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Message Configuration</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>Message Configuration</h2>
			<a href="<?php echo $base_url; ?>user_guide/message_index">Message Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/message_functions">Message Functions</a>

			<div class="anchor_nav">
				<h6>Config File Settings</h6>
				<p>
					<a href="#message_delimiters">Message Delimiter Settings</a> | 
					<a href="#message_visibility">Message Visibility Settings</a> | 
					<a href="#language">Language Settings</a>
				</p>
			</div>

						
			<a name="message_delimiters"></a>
			<div class="w100 frame">
				<h3 class="heading">Message Delimiter Settings</h3>
				
				<p>Define status and error message delimiters to style auth messages.</p>
				<hr/>
					
				<h6>Example</h6>
<pre>
<span class="comment">// Status Message Start Delimiter.</span>
$config['messages']['delimiters']['status_prefix'] = <?php echo htmlentities('<p class="status_msg">');?>;

<span class="comment">// Status Message End Delimiter.</span>
$config['messages']['delimiters']['status_suffix'] = <?php echo htmlentities('</p>');?>;

<span class="comment">// Error Message Start Delimiter.</span>
$config['messages']['delimiters']['error_prefix'] = <?php echo htmlentities('<p class="error_msg">');?>;

<span class="comment">// Error Message End Delimiter.</span>
$config['messages']['delimiters']['error_suffix'] =  <?php echo htmlentities('</p>');?>;
</pre>
			</div>
						
			<a name="message_visibility"></a>
			<div class="w100 frame">
				<h3 class="heading">Message Visibility</h3>
				
				<p>
					Define which status and error messages are returned as public or admin messages, or which messages are not returned at all.<br/>
					Public messages are intended to be displayed to public and admin users, whilst admin messages are intended for admin users only.
				</p>

				<table>
					<thead>
						<tr>
							<th class="spacer_250">Internal Message Name</th>
							<th class="spacer_100 align_ctr">Default Value</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>account_creation_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user account has been successfully created.</td>
						</tr>
						<tr>
							<td>account_creation_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user account could not be created.</td>
						</tr>
						<tr>
							<td>account_creation_duplicate_email</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user account could not be created due to a existing user with the same email address.</td>
						</tr>
						<tr>
							<td>account_creation_duplicate_username</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user account could not be created due to a existing user with the same username.</td>
						</tr>
						<tr>
							<td>account_creation_duplicate_identity</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user account could not be created due to a existing user with the same email address or username.</td>
						</tr>
						<tr>
							<td>account_creation_insufficient_data</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user account could not be created due to insufficient data being submitted.</td>
						</tr>

						<tr>
							<td>password_invalid</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a supplied password failed the defined validation rules.</td>
						</tr>
						<tr>
							<td>password_change_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a users password was updated successfully.</td>
						</tr>
						<tr>
							<td>password_change_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a supplied password does not match the users current password, and so a new password could not be set.</td>
						</tr>
						<tr>
							<td>password_token_invalid</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a validation token supplied whilst reseting a forgotten password was invalid or had expired.</td>
						</tr>
						<tr>
							<td>email_new_password_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a new password has been emailed to the user.</td>
						</tr>
						<tr>
							<td>email_forgot_password_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that an email has been sent to reset the users password.</td>
						</tr>
						<tr>
							<td>email_forgot_password_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that an email to reset the users password could not be sent.</td>
						</tr>

						<tr>
							<td>activate_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a users account has been activated.</td>
						</tr>
						<tr>
							<td>activate_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a users account could not be activated.</td>
						</tr>
						<tr>
							<td>deactivate_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a users account has been deactivated.</td>
						</tr>
						<tr>
							<td>deactivate_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a users account could not be deactivated.</td>
						</tr>
						<tr>
							<td>activation_email_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that an account activation email has been sent to the user.</td>
						</tr>
						<tr>
							<td>activation_email_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that an account activation email could not be sent to the user.</td>
						</tr>
						<tr>
							<td>account_requires_activation</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user must activate their account via email activation before they can login.</td>
						</tr>
						<tr>
							<td>account_already_activated</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user has already activated their account if they attempt to activate it again.</td>
						</tr>
						<tr>
							<td>email_activation_email_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a email has been sent to the user to verify their change of email address.</td>
						</tr>
						<tr>
							<td>email_activation_email_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a email could not be sent to the user to verify their change of email address.</td>
						</tr>

						<tr>
							<td>login_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user has successfully logged into their account.</td>
						</tr>
						<tr>
							<td>login_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user was not successfully logged into their account.</td>
						</tr>
						<tr>
							<td>logout_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a user has successfully logged out of their account.</td>
						</tr>
						<tr>
							<td>login_details_invalid</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a users login details are invalid.</td>
						</tr>
						<tr>
							<td>captcha_answer_invalid</td>
							<td class="align_ctr">public</td>
							<td>Notifies that a users CAPTCHA answer is incorrect.</td>
						</tr>
						<tr>
							<td>login_attempts_exceeded</td>
							<td class="align_ctr">public</td>
							<td>Notifies a user the maximum failed login attempts to their account has been exceeded and that they must wait a short time before trying again.</td>
						</tr>
						<tr>
							<td>login_session_expired</td>
							<td class="align_ctr">public</td>
							<td>Notifies a user that their login session has expired and they will need to login again.</td>
						</tr>
						<tr>
							<td>account_suspended</td>
							<td class="align_ctr">public</td>
							<td>Notifies a user that their account has been suspended.</td>
						</tr>

						<tr>
							<td>update_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that account information has been successfully updated.</td>
						</tr>
						<tr>
							<td>update_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that account information could not be updated.</td>
						</tr>
						<tr>
							<td>delete_successful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that account information has been successfully deleted.</td>
						</tr>
						<tr>
							<td>delete_unsuccessful</td>
							<td class="align_ctr">public</td>
							<td>Notifies that account information could not be deleted.</td>
						</tr>

						<tr>
							<td>form_validation_duplicate_identity</td>
							<td class="align_ctr">public</td>
							<td>
								Used by CodeIgniters native validation library.<br/>
								Notifies that an account exists with either the same email address or username as with data from a specific input field.
							</td>
						</tr>
						<tr>
							<td>form_validation_duplicate_email</td>
							<td class="align_ctr">public</td>
							<td>
								Used by CodeIgniters native validation library.<br/>
								Notifies that an account exists with the same email address as with data from a specific input field.
							</td>
						</tr>
						<tr>
							<td>form_validation_duplicate_username</td>
							<td class="align_ctr">public</td>
							<td>
								Used by CodeIgniters native validation library.<br/>
								Notifies that an account exists with the same username as with data from a specific input field.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Set the message to be displayed to public users.</span>
$config['messages']['target_user']['account_creation_successful'] = 'public';
</pre>
<pre>
<span class="comment">// Set the message to be displayed to admin users only.</span>
$config['messages']['target_user']['account_creation_successful'] = 'admin';
</pre>
<pre>
<span class="comment">// Disable a message from being set.</span>
$config['messages']['target_user']['account_creation_successful'] = FALSE;
</pre>
			</div>

			<a name="language"></a>
			<div class="w100 frame">
				<h3 class="heading">Define Language</h3>
				
				<p>Define the language of status and error messages returned by flexi auth functions.</p>
				<hr/>
				
				<h6>The Language File</h6>
				<div class="frame_note">
					<p>flexi auth uses CodeIgniters language class to allow status and error messages returned by the library to be displayed in a specific language.</p>
					<p>
						To set the library to display messages in a specific language, firstly the translated language file must be added to CodeIgniters 'language' directory.
						If the language you require does not currently exist, you will need to create a copy of the default language file and get it translated.<br/>
					</p>
					<hr/>
					<p>
						To do this, copy the 'English' language file from:<br/>
						<em>'application/language/english/flexi_auth_lang.php'</em> to <em>'application/language/[YOUR LANGUAGE]/flexi_auth_lang.php'</em>.
					</p>
					<hr/>
					<p>
						It is recommended that any translations are made directly from the English language file rather than others, as that contains the originally intended messages of the library, with no lingual misinterpretations.
					</p>
					<p>
						If you are unable to translate the file yourself, you could try one of the many free translators that are available online:
						<ul>
							<li><a href="http://translate.google.com/">Google Translate</a></li>
							<li><a href="http://www.microsofttranslator.com/">Bing Translator</a></li>
							<li><a href="http://translate.reference.com/">Dictionary.com Translator</a></li>
						</ul>
					</p>
				</div>

				<h6>Defining a Language</h6>
				<p>Defining the language used by the library is done using CodeIgniters internal methods, either via the CI config. file, or by using CI's language class.</p>
<pre>
<span class="comment">// Example #1 : Set language via CI's config file ('application/config/config.php').</span>
$config['language'] = 'spanish';
</pre>
<pre>
<span class="comment">// Example #2 : Set language via CI's language class.
// Note: This must be defined before calling the flexi auth library and would typically be done in either
// a controller or model.</span>

<span class="comment">// First load the language file.</span>
$this->lang->load('flexi_auth', 'spanish');

<span class="comment">// And then load the flexi auth library.</span>
$this->load->library('flexi_auth');	
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