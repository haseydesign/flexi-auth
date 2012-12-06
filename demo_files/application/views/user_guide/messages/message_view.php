<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Message Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for message functions in flexi auth."/> 
	<meta name="keywords" content="message functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Message Functions</h1>
				<p>The flexi auth library functions for displaying status and error messages to users after they have performed an action using a library function.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">

			<h2>Status and Error Messages</h2>
			<a href="<?php echo $base_url; ?>user_guide/message_index">Message Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/message_config">Message Config</a>

			<div class="anchor_nav">
				<h6>Status Message Functions</h6>
				<p>
					<a href="#status_messages">status_messages()</a> | 
					<a href="#set_status_message">set_status_message()</a> | 
					<a href="#clear_status_messages">clear_status_messages()</a>
				</p>
				
				<h6>Error Message Functions</h6>
				<p>
					<a href="#error_messages">error_messages()</a> | 
					<a href="#set_error_message">set_error_message()</a> | 
					<a href="#clear_error_messages">clear_error_messages()</a>
				</p>

				<h6>Global Message Functions</h6>
				<p>
					<a href="#clear_messages">clear_messages()</a> | 
					<a href="#get_messages_array">get_messages_array()</a> | 
					<a href="#get_messages">get_messages()</a>
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

			<a name="status_messages"></a>
			<div class="w100 frame">
				<h3 class="heading">status_messages()</h3>
				
				<p>Get any status message(s) that may have been set by recently run functions.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Parameters</h6>
				<code>status_messages(target_user, prefix_delimiter, suffix_delimiter)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>target_user</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">public</td>
							<td>
								Define whether to suppress any '<em>admin</em>' error messages and only return '<em>public</em>' messages intended for notifying public users.<br/>
								Defining '<em>public</em>' will return the message for both public and admin users.<br/> 
								Defining '<em>admin</em>' will return the message for admin users only.
							</td>
						</tr>
						<tr>
							<td>prefix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to prefix to the status message.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no prefix is set, the '<em>status_prefix_delimiter</em>' defined via the config. file is used instead.
							</td>
						</tr>
						<tr>
							<td>suffix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to suffix to the status message.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no suffix is set, the '<em>status_suffix_delimiter</em>' defined via the config. file is used instead.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The messages returned by flexi cart functions can be returned in other languages by defining the translation in CodeIgniters language directory.</p>
					<p>
						To define your own translations, create a folder within the CI language directory named as the language, e.g. 'french'.<br/>
						Then copy the 'flexi_cart_lang.php' file from the 'english' folder to the new language folder and translate the messages within the file.
					</p>
					<p>For further information, read the <a href="http://ellislab.com/user_guide/libraries/language.html" target="_blank">CodeIgniter documentation</a> on the language library.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>string</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>status_messages('admin', FALSE, FALSE)</code>
							<small>This would return all <span class="uline">admin</span> status messages as non formatted text.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>status_messages('public', FALSE, FALSE)</code>
							<small>This would return all <span class="uline">public and admin</span> status messages as non formatted text.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>status_messages('admin', '<?php echo htmlentities('<p>');?>', '<?php echo htmlentities('</p>');?>')</code>
							<small>This would return all <span class="uline">admin</span> status messages formatted in a html <?php echo htmlentities('<p>');?> tag.</small>
						</td>
					</tr>
				</table>
			</div>
			
			<a name="set_status_message"></a>
			<div class="w100 frame">
				<h3 class="heading">set_status_message()</h3>
				
				<p>Set a status message to be displayed to the user.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Parameters</h6>
				<code>set_status_message(status_message, target_user, overwrite_existing)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>status_message</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the status message to be set.</td>
						</tr>
						<tr>
							<td>target_user</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">public</td>
							<td>Define whether to set the message as a '<em>public</em>' or '<em>admin</em>' status message.</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Define whether to overwrite any existing status messages.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>'status_message' parameter value</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>set_status_message('This is a custom ADMIN status message', 'admin', FALSE)</code>
							<small>This would set a status message that would NOT be shown in public areas of the site.</small>
						</th>
					</tr>
					<tr>
						<td>
							<code>set_status_message('This is a custom PUBLIC status message', 'public', FALSE)</code>
							<small>This would set a status message that would be shown in public and admin areas of the site.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>set_status_message('This is a custom PUBLIC status message', 'public', TRUE)</code>
							<small>This would overwrite any existing messages and then set a status message that would be shown in public and admin areas of the site.</small>
						</td>
					</tr>
				</table>
			</div>
			
			<a name="clear_status_messages"></a>
			<div class="w100 frame">
				<h3 class="heading">clear_status_messages()</h3>
				
				<p>Clear all status messages.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>clear_status_messages()</code>
							<small>This would remove all currently set status messages.</small>
						</td>
					</tr>
				</table>
			</div>

			<a name="error_messages"></a>
			<div class="w100 frame">
				<h3 class="heading">error_messages()</h3>
				
				<p>Get any error message(s) that may have been set by recently run functions.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Parameters</h6>
				<code>error_messages(target_user, prefix_delimiter, suffix_delimiter)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>target_user</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">public</td>
							<td>
								Define whether to suppress any '<em>admin</em>' error messages and only return '<em>public</em>' messages intended for notifying public users.<br/>
								Defining '<em>public</em>' will return the message for both public and admin users.<br/> 
								Defining '<em>admin</em>' will return the message for admin users only.
							</td>
						</tr>
						<tr>
							<td>prefix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to prefix to the error message.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no prefix is set, the 'error_prefix_delimiter' defined via the config. file is used instead.
							</td>
						</tr>
						<tr>
							<td>suffix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to suffix to the error message.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no suffix is set, the 'error_suffix_delimiter' defined via the config. file is used instead.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The messages returned by flexi cart functions can be returned in other languages by defining the translation in CodeIgniters language directory.</p>
					<p>
						To define your own translations, create a folder within the CI language directory named as the language, e.g. 'french'.<br/>
						Then copy the 'flexi_cart_lang.php' file from the 'english' folder to the new language folder and translate the messages within the file.
					</p>
					<p>For further information, read the <a href="http://ellislab.com/user_guide/libraries/language.html" target="_blank">CodeIgniter documentation</a> on the language library.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>string</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>error_messages('admin', FALSE, FALSE)</code>
							<small>This would return all <span class="uline">admin</span> error messages as non formatted text.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>error_messages('public', FALSE, FALSE)</code>
							<small>This would return all <span class="uline">public and admin</span> error messages as non formatted text.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>error_messages('admin', '<?php echo htmlentities('<p>');?>', '<?php echo htmlentities('</p>');?>')</code>
							<small>This would return all <span class="uline">admin</span> error messages formatted in a html <?php echo htmlentities('<p>');?> tag.</small>
						</td>
					</tr>
				</table>
			</div>

			<a name="set_error_message"></a>
			<div class="w100 frame">
				<h3 class="heading">set_error_message()</h3>
				
				<p>Set an error message to be displayed to the user.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Parameters</h6>
				<code>set_error_message(error_message, target_user, overwrite_existing)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>error_message</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the error message to be set.</td>
						</tr>
						<tr>
							<td>target_user</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">public</td>
							<td>Define whether to set the message as a '<em>public</em>' or '<em>admin</em>' error message.</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Define whether to overwrite any existing error messages.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>'error_message' parameter value</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>set_error_message('This is a custom ADMIN error message', 'admin', FALSE)</code>
							<small>This would set an error message that would NOT be shown in public areas of the site.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>set_error_message('This is a custom PUBLIC error message', 'public', FALSE)</code>
							<small>This would set an error message that would be shown in public and admin areas of the site.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>set_error_message('This is a custom PUBLIC error message', 'public', TRUE)</code>
							<small>This would overwrite any existing messages and then set a error message that would be shown in public and admin areas of the site.</small>
						</td>
					</tr>
				</table>
			</div>
			
			<a name="clear_error_messages"></a>
			<div class="w100 frame">
				<h3 class="heading">clear_error_messages()</h3>
				
				<p>Clear all error messages.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>clear_error_messages()</code>
							<small>This would remove all currently set error messages.</small>
						</td>
					</tr>
				</table>
			</div>
			
			<a name="clear_messages"></a>
			<div class="w100 frame">
				<h3 class="heading">clear_messages()</h3>
				
				<p>Clear all status and error messages.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>n/a</p>
					<p><strong class="spacer_100">Success:</strong>TRUE</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>clear_messages()</code>
							<small>This would remove all currently set status and error messages.</small>
						</td>
					</tr>
				</table>
			</div>
			
			<a name="get_messages_array"></a>
			<div class="w100 frame">
				<h3 class="heading">get_messages_array()</h3>
				
				<p>
					Returns any set messages, grouped into a '<em>status</em>' and '<em>error</em>' array.<br/>
					The returned status and error messages are then further grouped into '<em>public</em>' and '<em>admin</em>' type messages.
				</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Parameters</h6>
				<code>get_messages_array(target_user, prefix_delimiter, suffix_delimiter)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>target_user</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">public</td>
							<td>
								Define whether to suppress any '<em>admin</em>' error messages and only return '<em>public</em>' messages intended for notifying public users.<br/>
								Defining '<em>public</em>' will return the message for both public and admin users.<br/> 
								Defining '<em>admin</em>' will return the message for admin users only.
							</td>
						</tr>
						<tr>
							<td>prefix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to prefix to the messages.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no prefix is set, the corresponding 'status_prefix_delimiter' and 'error_prefix_delimiter' defined via the config. file is used instead.
							</td>
						</tr>
						<tr>
							<td>suffix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to suffix to the messages.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no suffix is set, the corresponding 'status_suffix_delimiter' and 'error_suffix_delimiter' defined via the config. file is used instead.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The messages returned by flexi cart functions can be returned in other languages by defining the translation in CodeIgniters language directory.</p>
					<p>
						To define your own translations, create a folder within the CI language directory named as the language, e.g. 'french'.<br/>
						Then copy the 'flexi_cart_lang.php' file from the 'english' folder to the new language folder and translate the messages within the file.
					</p>
					<p>For further information, read the <a href="http://ellislab.com/user_guide/libraries/language.html" target="_blank">CodeIgniter documentation</a> on the language library.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>array</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>get_messages_array('admin', FALSE, FALSE)</code>
							<small>This would return an array of all the <span class="uline">admin</span> status and error messages as non formatted text, with an array key indicating the message type.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>get_messages_array('public', FALSE, FALSE)</code>
							<small>This would return an array of all the <span class="uline">public and admin</span> status and error messages as non formatted text, with an array key indicating the message type.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>get_messages_array('admin', '<?php echo htmlentities('<p>');?>', '<?php echo htmlentities('</p>');?>')</code>
							<small>This would return an array of all the <span class="uline">admin</span> status and error messages formatted in a html <?php echo htmlentities('<p>');?> tag, with an array key indicating the message type.</small>
						</td>
					</tr>
				</table>
			</div>

			<a name="get_messages"></a>
			<div class="w100 frame">
				<h3 class="heading">get_messages()</h3>
				
				<p>Get any operational function messages whether of status or error type and format their output with delimiters.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Parameters</h6>
				<code>get_messages(target_user, prefix_delimiter, suffix_delimiter)</code>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_150">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>target_user</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">public</td>
							<td>
								Define whether to suppress any '<em>admin</em>' error messages and only return '<em>public</em>' messages intended for notifying public users.<br/>
								Defining '<em>public</em>' will return the message for both public and admin users.<br/> 
								Defining '<em>admin</em>' will return the message for admin users only.
							</td>
						</tr>
						<tr>
							<td>prefix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to prefix to the messages.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no prefix is set, the corresponding 'status_prefix_delimiter' and 'error_prefix_delimiter' defined via the config. file is used instead.
							</td>
						</tr>
						<tr>
							<td>suffix_delimiter</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define a string of characters to suffix to the messages.<br/>
								Typically this is intended to allow elements to be wrapped around messages.<br/>
								If no suffix is set, the corresponding 'status_suffix_delimiter' and 'error_suffix_delimiter' defined via the config. file is used instead.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>The messages returned by flexi cart functions can be returned in other languages by defining the translation in CodeIgniters language directory.</p>
					<p>
						To define your own translations, create a folder within the CI language directory named as the language, e.g. 'french'.<br/>
						Then copy the 'flexi_cart_lang.php' file from the 'english' folder to the new language folder and translate the messages within the file.
					</p>
					<p>For further information, read the <a href="http://ellislab.com/user_guide/libraries/language.html" target="_blank">CodeIgniter documentation</a> on the language library.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>string</p>
				</div>
				
				<h6>Examples</h6>
				<table class="example">
					<tr>
						<td>
							<code>get_messages('admin', FALSE, FALSE)</code>
							<small>This would return all <span class="uline">admin</span> status and error messages as non formatted text.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>get_messages('public', FALSE, FALSE)</code>
							<small>This would return all <span class="uline">public and admin</span> status and error messages as non formatted text.</small>
						</td>
					</tr>
					<tr>
						<td>
							<code>get_messages('admin', '<?php echo htmlentities('<p>');?>', '<?php echo htmlentities('</p>');?>')</code>
							<small>This would return all <span class="uline">admin</span> status and error messages formatted in a html <?php echo htmlentities('<p>');?> tag.</small>
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