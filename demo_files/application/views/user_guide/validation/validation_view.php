<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Validation Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for validation functions in flexi auth."/> 
	<meta name="keywords" content="validation functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Validation Functions</h1>
				<p>The flexi auth library functions to validate user credentials and data integrity.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Validation Functions</h2>
			<a href="<?php echo $base_url; ?>user_guide/validation_index">Validation Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/validation_config">Validation / Security Config</a>

			<div class="anchor_nav">
				<h6>User Status / Privilege Validation</h6>
				<p>
					<a href="#is_logged_in">is_logged_in()</a> | 
					<a href="#is_logged_in_via_password">is_logged_in_via_password()</a> |
					<a href="#is_admin">is_admin()</a> |
					<a href="#in_group">in_group()</a> |
					<a href="#is_privileged">is_privileged()</a>
				</p>
				<h6>Identity Validation</h6>
				<p>
					<a href="#identity_available">identity_available()</a> |
					<a href="#email_available">email_available()</a> |
					<a href="#username_available">username_available()</a>
				</p>
				<h6>Password Validation</h6>
				<p>
					<a href="#validate_current_password">validate_current_password()</a> |
					<a href="#min_password_length">min_password_length()</a> |
					<a href="#valid_password_chars">valid_password_chars()</a>
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
				
			<a name="is_logged_in"></a>
			<div class="w100 frame">
				<h3 class="heading">is_logged_in()</h3>
				
				<p>Verifies a user is logged in either via entering a valid password or using the 'Remember me' feature.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks a value saved in the users browser session.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>is_logged_in()</code>
							<small>Is the current user logged in?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->is_logged_in()); ?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="is_logged_in_via_password"></a>
			<div class="w100 frame">
				<h3 class="heading">is_logged_in_via_password()</h3>
				
				<p>Verifies a user has logged in via entering a valid password rather than using the 'Remember me' feature (Login by password is more secure).</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks a value saved in the users browser session.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>is_logged_in_via_password()</code>
							<small>Is the current user logged in via entering a password (Rather than a 'Remember me' cookie)?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->is_logged_in_via_password()); ?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="is_admin"></a>
			<div class="w100 frame">
				<h3 class="heading">is_admin()</h3>
				
				<p>Verifies a user belongs to a user group with admin permissions.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks a value saved in the users browser session.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>is_admin()</code>
							<small>Is the current user logged in with admin credentials?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->is_admin()); ?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="in_group"></a>
			<div class="w100 frame">
				<h3 class="heading">in_group()</h3>
				
				<p>Verifies whether a user is assigned to a particular user group.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>in_group(groups)</code>
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
							<td>groups</td>
							<td class="align_ctr">int | string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines which user group(s) to check for whether the currently logged in user is assigned to.<br/>
								The user group id or name can be checked, or alternatively an array of ids or names can be defined to check multiple groups.
							</td>
						</tr>
					</tbody>
				</table>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks a value saved in the users browser session.</p>
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
							<code>in_group('moderator')</code>
							<small>Is the current logged in user assigned to the 'Moderator' user group?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->in_group('moderator')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>in_group(array('moderator', 'editor'))</code>
							<small>Is the current logged in user assigned to either the 'Moderator' or 'Editor' user groups?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->in_group(array('moderator', 'editor'))); ?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="is_privileged"></a>
			<div class="w100 frame">
				<h3 class="heading">is_privileged()</h3>
				
				<p>Verifies whether a user has a specific privilege.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>Function Parameters</h6>
				<code>is_privileged(privileges)</code>
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
							<td>privileges</td>
							<td class="align_ctr">int | string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines which user privilege(s) to check for whether the currently logged in user is assigned to.<br/>
								The user privilege id or name can be checked, or alternatively an array of ids or names can be defined to check multiple privileges.
							</td>
						</tr>
					</tbody>
				</table>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks a value saved in the users browser session.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>is_privileged('Update Users')</code>
							<small>Does the current logged in user have the privilege to 'Update Users'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->is_privileged('Update Users')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>is_privileged(array('Update Users', 'Delete Users'))</code>
							<small>Does the current logged in user have the privilege to either 'Update Users' or 'Delete Users'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->is_privileged(array('Update Users', 'Delete Users'))); ?>
						</td>
					</tr>
				</table>
			</div>

				
			<a name="identity_available"></a>
			<div class="w100 frame">
				<h3 class="heading">identity_available()</h3>
				
				<p>Returns whether a user identity (Username and/or Email) is available.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>identity_available(identity, user_id)</code>
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
							<td>The identity (Username and/or Email) to be checked.</td>
						</tr>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the id of a user to be excluded from the identity check.<br/>
								The purpose of this is to exclude the user that currently has the submitted identity value set as their current identity.</br>
								For example, if a user updates their account details, but their email address remains unchanged, without the user id being excluded from the identity check, the users own identity would be matched, indicating that the identity was unavailable.  
							</td>
						</tr>
					</tbody>
				</table>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks the defined identity columns in the user database table trying to match any other users that already have the submitted identity as their own identity.</p>
					<p>If a user id is submitted, the function will exclude that user from the query to prevent their own identity conflicting with the query result.</p>
				</div>

				<h6>Notes</h6>
				<div class="frame_note">
					<p>The identity columns are defined via the '<a href="<?php echo $base_url; ?>user_guide/user_account_config#database_config_settings">identity_cols</a>' variable in the config. file.</p>
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
							<code>identity_available('admin@admin.com')</code>
							<small>Is the email address 'admin@admin.com' currently available?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->identity_available('admin@admin.com')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>identity_available('available_identity')</code>
							<small>Is the username 'available_identity' currently available?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->identity_available('available_identity')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>identity_available('admin@admin.com', 1)</code>
							<small>Is the email address 'admin@admin.com' currently available whilst excluding the user with an id of '1'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->identity_available('admin@admin.com', 1)); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>identity_available('admin@admin.com', 2)</code>
							<small>Is the email address 'admin@admin.com' currently available whilst excluding the user with an id of '2'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->identity_available('admin@admin.com', 2)); ?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="email_available"></a>
			<div class="w100 frame">
				<h3 class="heading">email_available()</h3>
				
				<p>Returns whether an email address is available.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>email_available(email, user_id)</code>
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
							<td>email</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>The email address to be checked.</td>
						</tr>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the id of a user to be excluded from the email check.<br/>
								The purpose of this is to exclude the user that currently has the submitted email value set as their current email address.</br>
								For example, if a user updates their account details, but their email address remains unchanged, without the user id being excluded from the email check, the users own email would be matched, indicating that the email was unavailable.  
							</td>
						</tr>
					</tbody>
				</table>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks the email column in the user database table trying to match any other users that already have the submitted email as their own email address.</p>
					<p>If a user id is submitted, the function will exclude that user from the query to prevent their own email conflicting with the query result.</p>
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
							<code>email_available('admin@admin.com')</code>
							<small>Is the email address 'admin@admin.com' currently available?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->email_available('admin@admin.com')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>email_available('available@available.com')</code>
							<small>Is the email address 'available@available.com' currently available?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->email_available('available@available.com')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>email_available('admin@admin.com', 1)</code>
							<small>Is the email address 'admin@admin.com' currently available whilst excluding the user with an id of '1'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->email_available('admin@admin.com', 1)); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>email_available('admin@admin.com', 2)</code>
							<small>Is the email address 'admin@admin.com' currently available whilst excluding the user with an id of '2'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->email_available('admin@admin.com', 2)); ?>
						</td>
					</tr>
				</table>
			</div>		

			<a name="username_available"></a>
			<div class="w100 frame">
				<h3 class="heading">username_available()</h3>
				
				<p>Returns whether a username is available.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>username_available(username, user_id)</code>
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
							<td>username</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>The username to be checked.</td>
						</tr>
						<tr>
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the id of a user to be excluded from the username check.<br/>
								The purpose of this is to exclude the user that currently has the submitted username value set as their current username.</br>
								For example, if a user updates their account details, but their username remains unchanged, without the user id being excluded from the username check, the users own username would be matched, indicating that the username was unavailable.  
							</td>
						</tr>
					</tbody>
				</table>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks the username column in the user database table trying to match any other users that already have the submitted username as their own username.</p>
					<p>If a user id is submitted, the function will exclude that user from the query to prevent their own username conflicting with the query result.</p>
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
							<code>username_available('admin')</code>
							<small>Is the username 'admin' currently available?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->username_available('admin')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>username_available('available_username')</code>
							<small>Is the username 'available_username' currently available?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->username_available('available_username')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>username_available('admin@admin.com', 1)</code>
							<small>Is the username 'admin@admin.com' currently available whilst excluding the user with an id of '1'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->username_available('admin@admin.com', 1)); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>username_available('admin@admin.com', 2)</code>
							<small>Is the username 'admin@admin.com' currently available whilst excluding the user with an id of '2'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->username_available('admin@admin.com', 2)); ?>
						</td>
					</tr>
				</table>
			</div>			
				
			<a name="validate_current_password"></a>
			<div class="w100 frame">
				<h3 class="heading">validate_current_password()</h3>
				
				<p>Validate a submitted password matches the password of a specific user stored in the database.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function compares a submitted password against the users current password saved within the database.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>validate_current_password('password123', 'admin@admin.com')</code>
							<small>Is 'admin@admin.com' current password 'password123'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->validate_current_password('password123', 'admin@admin.com')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>validate_current_password('WRONGPASSWORD', 'admin@admin.com')</code>
							<small>Is 'admin@admin.com' current password 'WRONGPASSWORD'?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->validate_current_password('WRONGPASSWORD', 'admin@admin.com')); ?>
						</td>
					</tr>
				</table>
			</div>
			
			<a name="min_password_length"></a>
			<div class="w100 frame">
				<h3 class="heading">min_password_length()</h3>
				
				<p>Gets the minimum valid password character length.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function returns the minimum password length defined via the config. file.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>int</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>min_password_length()</code>
							<small>What is the minimum password length defined via the config. file?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php echo $this->flexi_auth->min_password_length(); ?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="valid_password_chars"></a>
			<div class="w100 frame">
				<h3 class="heading">valid_password_chars()</h3>
				
				<p>Validate whether the submitted password only contains valid characters.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>valid_password_chars(password)</code>
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
							<td>password</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the password to be validated.</td>
						</tr>
					</tbody>
				</table>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function compares the submitted password against the '<a href="<?php echo $base_url; ?>user_guide/validation_config#password_settings">valid_password_chars</a>' regex string defined via the config. file.</p>
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
							<code>valid_password_chars('password123')</code>
							<small>The the password string 'password123' contain valid characters?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->valid_password_chars('password123')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<code>valid_password_chars('@password#123')</code>
							<small>The the password string '@password#123' contain valid characters?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php var_dump($this->flexi_auth->valid_password_chars('@password#123')); ?>
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