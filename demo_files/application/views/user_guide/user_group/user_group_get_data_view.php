<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Getting User Group Data | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for getting user group data in flexi auth."/> 
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
				<h1>User Guide | Getting User Group Data</h1>
				<p>The flexi auth library functions for getting data from the user group table.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Get User Group Data</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_group_index">User Group Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_config">User Group Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_set_data">Set User Group Data</a>

			<div class="anchor_nav">
				<h6>User Group Data Functions</h6>
				<p>
					<a href="#get_groups">get_groups()</a> | 
					<a href="#get_users_group">get_users_group()</a> |
					<a href="#get_user_group_id">get_user_group_id()</a> | 
					<a href="#get_user_group">get_user_group()</a>
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
				
			<a name="get_groups"></a>
			<div class="w100 frame">
				<h3 class="heading">get_groups()</h3>
				
				<p>Gets a list of user groups filtered by a custom SQL WHERE statement.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_groups(sql_select, sql_where)</code>
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
					<p>The function uses the defined '<em>sql_where</em>' argument to create an SQL WHERE statement to filter a list of user groups from the user group table.</p>
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
$this->flexi_auth->get_groups($sql_select, $sql_where)->result();
</pre>
			</div>

			<a name="get_users_group"></a>
			<div class="w100 frame">
				<h3 class="heading">get_users_group()</h3>
				
				<p>Gets records from the user group table typically for a filtered set of users.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_users_group(sql_select, sql_where)</code>
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
					<p>
						By default the function is set to return all columns from the user group table for all filtered users.<br/>
						However, by defining specific user table columns via the '<em>sql_select</em>' argument, it is possible to return other user data.
					</p>
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
				
				<h6>Example</h6>
<pre>
<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_select = array(...);
$sql_where = array(...);

<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_users_group($sql_select, $sql_where)->result();
</pre>
			</div>
				
			<a name="get_user_group_id"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_group_id()</h3>
				
				<p>Get the users group id from the session.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function get the user group id value saved in the users browser session.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>int</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>get_user_group_id()</code>
							<small>What is the user group id of the current logged in user?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php 
								if ($user_group_id = $this->flexi_auth->get_user_group_id()) {
									echo $user_group_id;
								} else {
									var_dump($user_group_id);
								}
							?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="get_user_group"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_group()</h3>
				
				<p>Get the users user group name from the session.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function get the user group name saved in the users browser session.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>string</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>get_user_group()</code>
							<small>What is the user group name of the current logged in user?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php 
								if ($user_group = $this->flexi_auth->get_user_group()) {
									echo $user_group;
								} else {
									var_dump($user_group);
								}
							?>
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