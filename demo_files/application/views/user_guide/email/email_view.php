<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Email Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for email functions in flexi auth."/> 
	<meta name="keywords" content="email functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Email Functions</h1>
				<p>The flexi auth library functions for sending and customising data within the libraries email template files.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Email Functions</h2>
			<a href="<?php echo $base_url; ?>user_guide/email_index">Email Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/email_config">Email Config</a>

			<div class="anchor_nav">
				<p>
					<a href="#send_email">send_email()</a> | 
					<a href="#template_data">template_data()</a>
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
				
			<a name="send_email"></a>
			<div class="w100 frame">
				<h3 class="heading">send_email()</h3>
				
				<p>Emails a user a predefined email template.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>send_email(email_to, email_title, template, email_data)</code>
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
							<td>email_to</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the email address to send the email to.<br/>
								Multiple emails addresses can be defined either via an array or a comma delimited string. 
							</td>
						</tr>
						<tr>
							<td>email_title</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the title of the email.</td>
						</tr>
						<tr>
							<td>template</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the filename of the email template used to send the email.<br/>
								The email template directory is defined via the config. file.
							</td>
						</tr>
						<tr>
							<td>email_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the data that is to be displayed within the email.<br/>
								The data defined here is made available as variables within the template file.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function uses the data within the '<em>email_data</em>' argument to populate the email '<em>template</em>' with data.</p>
					<p>The template is then emailed to the defined email address(es).</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The email settings can be defined via the <a href="<?php echo $base_url; ?>user_guide/email_config">config. file</a>.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Send an email to a single user.</span>
$email_to = 'user@email.com';

<span class="comment">// Example #2 : Send an email to multiple users.</span>
$email_to = array('user_1@email.com', 'user_2@email.com');

$email_title = 'Example Email Title';
$template = 'example_email_template.php';
$email_data = array(
	'custom_var_1' => 'custom_value_1',
	'custom_var_2' => 'custom_value_2'
);

$this->flexi_auth->send_email($email_to, $email_title, $template, $email_data);
</pre>
			</div>

			<a name="template_data"></a>
			<div class="w100 frame">
				<h3 class="heading">template_data()</h3>
				
				<p>
					flexi auth sends emails for a number of functions.<br/>
					This function can set additional data variables that can then be included within these emails, by making them available to the email template files.
				</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>template_data(template, template_data)</code>
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
							<td>template</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the email to use a different email template than the default.</td>
						</tr>
						<tr>
							<td>template_data</td>
							<td class="align_ctr">string | int | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines additional data that is to be made available to the email template.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function updates a global array within the library that is checked just prior to an email being sent.</p>
					<p>If the '<em>template</em>' argument is defined, then the email function will use the new template file.</p>
					<p>
						If the '<em>template_data</em>' argument is defined, the data will be passed to the template file.<br/>
						Provided the template file is updated to display this data, it will then be included when the email is sent.
					</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>This function must be called just prior to the library function that will send the actual email.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Defining an alternative 'Forgotten Password' email template.</span>
$template = 'altenative_forgotten_password.tpl.php';

<span class="comment">// Call the template_data() function before the function sending the actual email.</span>
$this->flexi_auth->template_data($template);

<span class="comment">// Call the libraries forgotten_password() function.</span>
$this->flexi_auth->forgotten_password(...);
</pre>
<pre>
<span class="comment">// Example #2 : Defining additional data for the email template.</span>
$template = 'altenative_forgotten_password.tpl.php';
$template_data = array(
	'custom_var_1' => 'custom_value_1',
	'custom_var_2' => 'custom_value_2'
);

$this->flexi_auth->template_data($template, $template_data);
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