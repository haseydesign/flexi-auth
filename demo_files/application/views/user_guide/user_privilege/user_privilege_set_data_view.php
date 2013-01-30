<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Setting User Privilege Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for setting user privilege functions in flexi auth."/> 
	<meta name="keywords" content="setting user privilege functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Setting User Privilege Data</h1>
				<p>The flexi auth library functions for setting data to the user privilege tables.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Set User Privilege Data</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_index">User Privilege Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_config">User Privilege Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_get_data">Get User Privilege Data</a>

			<div class="anchor_nav">
				<h6>Privilege CRUD Functions</h6>
				<p>
					<a href="#insert_privilege">insert_privilege()</a> | 
					<a href="#update_privilege">update_privilege()</a> | 
					<a href="#delete_privilege">delete_privilege()</a>
				</p>
				<h6>User Privilege CRUD Functions</h6>
				<p>
					<a href="#insert_privilege_user">insert_privilege_user()</a> | 
					<a href="#delete_privilege_user">delete_privilege_user()</a>
				</p>
				<h6>User Group Privilege CRUD Functions</h6>
				<p>
					<a href="#insert_user_group_privilege">insert_user_group_privilege()</a> | 
					<a href="#delete_user_group_privilege">delete_user_group_privilege()</a>
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

			<a name="insert_privilege"></a>
			<div class="w100 frame">
				<h3 class="heading">insert_privilege()</h3>
				
				<p>Inserts a new user privilege to the database.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>insert_privilege(name, description, custom_data)</code>
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
							<td>Defines the name of the user privilege.</td>
						</tr>
						<tr>
							<td>description</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">NULL</td>
							<td>Defines a short description of the user privilege.</td>
						</tr>
						<tr>
							<td>custom_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines any custom data that is to be inserted into the user privilege table.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL INSERT statement to insert the data passed to the function into the user privilege table.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>int | id of user privilege | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example of inserting a new user privilege.</span>
$name = 'privilege 101';
$description = 'Description of privilege 101';
$custom_data = array(
	'custom_col_1' => 'custom_value_1',
	'custom_col_2' => 'custom_value_2'
);

$this->flexi_auth->insert_privilege($name, $description, $custom_data);
</pre>
			</div>

			<a name="update_privilege"></a>
			<div class="w100 frame">
				<h3 class="heading">update_privilege()</h3>
				
				<p>Updates a user privilege with any submitted data.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>update_privilege(privilege_id, privilege_data)</code>
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
							<td>privilege_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user privilege to be updated.</td>
						</tr>
						<tr>
							<td>privilege_data</td>
							<td class="align_ctr">array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the columns and data within the user privilege table to be updated.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function loops through the 'privilege_data' argument and runs an SQL UPDATE statement by matching the array data with the user privilege table columns.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example of updating user privilege columns 'name' and 'description' for a privilege with an id of 101.</span>
$privilege_id = 101;
$privilege_data = array(
	'upriv_name' => 'Example Privilege Name',
	'upriv_desc' => 'Description of Example Privilege'
);

$this->flexi_auth->update_privilege($privilege_id, $privilege_data);
</pre>
			</div>

			<a name="delete_privilege"></a>
			<div class="w100 frame">
				<h3 class="heading">delete_privilege()</h3>
				
				<p>Deletes a privilege from the user privilege table.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>delete_privilege(sql_where)</code>
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
					<p>The function generates an SQL WHERE statement from the passed '<em>sql_where</em>' argument and deletes all matching user privileges.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Delete a user privilege via a privilege id of 101.</span>
$sql_where = 101;

$this->flexi_auth->delete_privilege($sql_where);
</pre>
<pre>
<span class="comment">// Example #2 : Delete user privileges via a custom SQL WHERE statement.</span>
<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_where = array(...);

$this->flexi_auth->delete_privilege($sql_where);
</pre>
			</div>

			<a name="insert_privilege_user"></a>
			<div class="w100 frame">
				<h3 class="heading">insert_privilege_user()</h3>
				
				<p>Inserts a new user privilege for a user.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>insert_privilege_user(user_id, privilege_id)</code>
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
							<td>user_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user to insert a new user privilege for.</td>
						</tr>
						<tr>
							<td>privilege_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user privilege to be inserted for a user.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL INSERT query inserting the '<em>user_id</em>' and '<em>privilege_id</em>' to the User Privilege Users table.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | id of new record | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example of applying a user privilege to a specific user.</span>
$user_id = 101;
$privilege_id = 201;

$this->flexi_auth->insert_privilege_user($user_id, $privilege_id);
</pre>
			</div>

			<a name="delete_privilege_user"></a>
			<div class="w100 frame">
				<h3 class="heading">delete_privilege_user()</h3>
				
				<p>Deletes a user privilege for a user.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>delete_privilege_user(sql_where)</code>
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
									If a number is passed, the function will interpret the value as the tables primary key. 		
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function generates an SQL WHERE statement from the passed '<em>sql_where</em>' argument and deletes all matching user privilege users.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Delete a user privilege user via a user privilege user id of 101.</span>
$sql_where = 101;

$this->flexi_auth->delete_privilege_user($sql_where);
</pre>
<pre>
<span class="comment">// Example #2 : Delete user privilege users via a custom SQL WHERE statement.</span>
<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_where = array(...);

$this->flexi_auth->delete_privilege_user($sql_where);
</pre>
			</div>
                        

			<a name="insert_user_group_privilege"></a>
			<div class="w100 frame">
				<h3 class="heading">insert_user_group_privilege()</h3>
				
				<p>Inserts a new user privilege for a group.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>insert_user_group_privilege(group_id, privilege_id)</code>
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
							<td>Defines the id of the user group to insert a new user privilege for.</td>
						</tr>
						<tr>
							<td>privilege_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the id of the user privilege to be inserted to a user group.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL INSERT query inserting the '<em>group_id</em>' and '<em>privilege_id</em>' to the User Privilege Groups table.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | id of new record | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Example of applying a user privilege to a specific user group.</span>
$group_id = 3;
$privilege_id = 201;

$this->flexi_auth->insert_user_group_privilege($group_id, $privilege_id);
</pre>
			</div>

			<a name="delete_user_group_privilege"></a>
			<div class="w100 frame">
				<h3 class="heading">delete_user_group_privilege()</h3>
				
				<p>Deletes a user privilege for a group.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>delete_user_group_privilege(sql_where)</code>
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
									If a number is passed, the function will interpret the value as the tables primary key. 		
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function generates an SQL WHERE statement from the passed '<em>sql_where</em>' argument and deletes all matching user privilege users.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Delete a user privilege group via a user privilege group id of 101.</span>
$sql_where = 101;

$this->flexi_auth->delete_user_group_privilege($sql_where);
</pre>
<pre>
<span class="comment">// Example #2 : Delete user privilege groups via a custom SQL WHERE statement.</span>
<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_where = array(...);

$this->flexi_auth->delete_user_group_privilege($sql_where);
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