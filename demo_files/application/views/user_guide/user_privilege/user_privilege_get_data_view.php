<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Getting User Privilege Functions | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for getting user privilege functions in flexi auth."/> 
	<meta name="keywords" content="getting user privilege functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Getting User Privilege Data</h1>
				<p>The flexi auth library functions for getting data from the user privilege tables.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Get User Privilege Data</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_index">User Privilege Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_config">User Privilege Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data">Set User Privilege Data</a>

			<div class="anchor_nav">
				<h6>User Privilege Data Functions</h6>
				<p>
					<a href="#get_privileges">get_privileges()</a> | 
					<a href="#get_user_privileges">get_user_privileges()</a> | 
					<a href="#get_user_group_privileges">get_user_group_privileges()</a>
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
				
			<a name="get_privileges"></a>
			<div class="w100 frame">
				<h3 class="heading">get_privileges()</h3>
				
				<p>Gets a list of user privileges filtered by a custom SQL WHERE statement.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_privileges(sql_select, sql_where)</code>
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
							<td>sql_select</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define the database fields returned via an SQL SELECT statement.<br/>
								Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
							</td>
						</tr>
						<tr>
							<td>sql_where</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Set the SQL WHERE statement used to filter the database records to return.<br/>
								Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function uses the defined '<em>sql_where</em>' argument to create an SQL WHERE statement to filter a list of user privileges from the user privilege table.</p>
					<p>The data returned by the query is defined via the '<em>sql_select</em>' argument. If no columns are specified, all columns will be returned.</p>
				</div>

				<h6>Notes</h6>
				<div class="frame_note">
					<p>This function is compatible with flexi auths '<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Query Builder</a>' functions.</p>
					<hr/>
					<p>This function can be chained with CodeIgniters query functions 'result()', 'row()' etc.</p>
					<p>Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on all the combined flexi auth and CodeIgniter functions that are available.</p>
				</div>
			
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>object</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_select = array(...);
$sql_where = array(...);

<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_privileges($sql_select, $sql_where)->result();
</pre>
			</div>

			<a name="get_user_privileges"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_privileges()</h3>
				
				<p>Get the user privileges for a user.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_user_privileges(sql_select, sql_where)</code>
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
							<td>sql_select</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define the database fields returned via an SQL SELECT statement.<br/>
								Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
							</td>
						</tr>
						<tr>
							<td>sql_where</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								<p>
									Set the SQL WHERE statement used to filter the database records to return.
									Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
								</p>
								<p>
									If no value is passed to the '<em>sql_where</em>' argument, the function will use the sessions user id to filter privileges for the current logged in user.
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL SELECT query that joins the User Privilege and User Privilege Users table together.</p>
					<p>The function uses the defined '<em>sql_where</em>' argument to create an SQL WHERE statement to filter a list of user privileges.</p>
					<p>If no value is passed to the '<em>sql_where</em>' argument, the function will use the sessions user id to filter privileges for the current logged in user.</p>
					<p>The data returned by the query is defined via the '<em>sql_select</em>' argument. If no columns are specified, all columns will be returned.</p>
				</div>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>This function is compatible with flexi auths '<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Query Builder</a>' functions.</p>
					<hr/>
					<p>This function can be chained with CodeIgniters query functions 'result()', 'row()' etc.</p>
					<p>Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on all the combined flexi auth and CodeIgniter functions that are available.</p>
				</div>
						
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>object</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Using the session user id of a logged in user.</span>
$this->flexi_auth->get_user_privileges(FALSE, FALSE);
</pre>
<pre>
<span class="comment">// Example #2 : Defining a specific SQL WHERE condition and specific columns to return.
// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_select = array(...);
$sql_where = array(...);

<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_user_privileges($sql_select, $sql_where)->result();
</pre>
			</div>
                        
			<a name="get_user_group_privileges"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_group_privileges()</h3>
				
				<p>Get the user privileges for a user group.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_user_group_privileges(sql_select, sql_where)</code>
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
							<td>sql_select</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define the database fields returned via an SQL SELECT statement.<br/>
								Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
							</td>
						</tr>
						<tr>
							<td>sql_where</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								<p>
									Set the SQL WHERE statement used to filter the database records to return.
									Read the <a href="<?php echo $base_url; ?>/user_guide/defining_custom_sql">defining SQL documentation</a> for further information.
								</p>
								<p>
									If no value is passed to the '<em>sql_where</em>' argument, the function will use the sessions user group id to filter privileges for the current logged in user.
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function runs an SQL SELECT query that joins the User Privilege and User Privilege Groups table together.</p>
					<p>The function uses the defined '<em>sql_where</em>' argument to create an SQL WHERE statement to filter a list of user privileges.</p>
					<p>If no value is passed to the '<em>sql_where</em>' argument, the function will use the sessions user group id to filter privileges for the current logged in user.</p>
					<p>The data returned by the query is defined via the '<em>sql_select</em>' argument. If no columns are specified, all columns will be returned.</p>
				</div>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>This function is compatible with flexi auths '<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Query Builder</a>' functions.</p>
					<hr/>
					<p>This function can be chained with CodeIgniters query functions 'result()', 'row()' etc.</p>
					<p>Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on all the combined flexi auth and CodeIgniter functions that are available.</p>
				</div>
						
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>object</p>
				</div>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1 : Using the session group id of a logged in user.</span>
$this->flexi_auth->get_user_group_privileges(FALSE, FALSE);
</pre>
<pre>
<span class="comment">// Example #2 : Defining a specific SQL WHERE condition and specific columns to return.
// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_select = array(...);
$sql_where = array(...);

<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_user_group_privileges($sql_select, $sql_where)->result();
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