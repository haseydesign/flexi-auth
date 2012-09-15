<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Setting User Group Data | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for setting user group data in flexi auth."/> 
	<meta name="keywords" content="user group data, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Setting User Group Data</h1>
				<p>The flexi auth library functions for setting data to the user group table.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Set User Group Data</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_group_index">User Group Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_config">User Group Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_get_data">Get User Group Data</a>

			<div class="anchor_nav">
				<h6>User Group CRUD Functions</h6>
				<p>
					<a href="#insert_group">insert_group()</a> | 
					<a href="#update_group">update_group()</a> | 
					<a href="#delete_group">delete_group()</a>
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
				
			<a name="insert_group"></a>
			<div class="w100 frame">
				<h3 class="heading">insert_group()</h3>
				
				<p>Inserts a new user group to the database.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>insert_group(name, description, is_admin, custom_data)</code>
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
							<td>name</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the name of the user group.</td>
						</tr>
						<tr>
							<td>description</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">NULL</td>
							<td>Defines a short description of the user group.</td>
						</tr>
						<tr>
							<td>is_admin</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether the user group has some form of admin privileges.</td>
						</tr>
						<tr>
							<td>custom_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines any custom data that is to be inserted into the user group table.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL INSERT statement to insert the data passed to the function into the user group table.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>int | id of user group | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example of inserting a new user group.</span>
$name = 'Group 101';
$description = 'Description of group 101';
$is_admin = FALSE;
$custom_data = array(
	'custom_col_1' => 'custom_value_1',
	'custom_col_2' => 'custom_value_2'
);

$this->flexi_auth->insert_group($name, $description, $is_admin, $custom_data);
</pre>
			</div>

			<a name="update_group"></a>
			<div class="w100 frame">
				<h3 class="heading">update_group()</h3>
				
				<p>Updates a user group with any submitted data.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>update_group(group_id, group_data)</code>
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
							<td>group_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user group to be updated.</td>
						</tr>
						<tr>
							<td>group_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the columns and data within the user group table to be updated.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function loops through the '<em>group_data</em>' argument and runs an SQL UPDATE statement by matching the array data with the user group table columns.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example of updating user group columns 'name' and 'description' for a group with an id of 101.</span>
$group_id = 101;
$group_data = array(
	'ugrp_name' => 'Example Group Name',
	'ugrp_desc' => 'Description of Example Group'
);

$this->flexi_auth->update_group($group_id, $group_data);
</pre>
			</div>

			<a name="delete_group"></a>
			<div class="w100 frame">
				<h3 class="heading">delete_group()</h3>
				
				<p>Deletes a group from the user group table.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>delete_group(sql_where)</code>
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
							<td>sql_where</td>
							<td class="align_ctr">string | int | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								<p>
									Set the SQL WHERE statement used to filter the database records to return.
									Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
								</p>
								<p>
									If a number is passed, the function will interpret the value as a group id. 		
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function generates an SQL WHERE statement from the passed '<em>sql_where</em>' argument and deletes all matching user groups.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Delete a user group via a group id of 101.</span>
$sql_where = 101;

$this->flexi_auth->delete_group($sql_where);
</pre>
<pre>
<span class="comment">// Example #2 : Delete user groups via a custom SQL WHERE statement.</span>
<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_where = array(...);

$this->flexi_auth->delete_group($sql_where);
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