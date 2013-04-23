<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Getting User Account Data | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for getting user account data in flexi auth."/> 
	<meta name="keywords" content="user account data, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Getting User Account Data</h1>
				<p>The flexi auth library functions for getting data from the user account tables.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
						
			<h2>Get User Account Data</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_account_index">User Account Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_config">User Account Config</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_account_set_data">Set User Account Data</a>

			<div class="anchor_nav">
				<h6>User Data Functions</h6>
				<p>
					<a href="#get_user_id">get_user_id()</a> | 
					<a href="#get_user_identity">get_user_identity()</a> | 
					<a href="#get_user_by_id">get_user_by_id()</a> | 
					<a href="#get_user_by_identity">get_user_by_identity()</a> | 
					<a href="#get_users">get_users()</a> | 
					<a href="#get_custom_user_data">get_custom_user_data()</a> | 
					<a href="#search_users">search_users()</a>
				</p>

				<h6>User Activation Functions</h6>
				<p>
					<a href="#get_unactivated_users">get_unactivated_users()</a> | 
					<a href="#resend_activation_token">resend_activation_token()</a>
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
				
			<a name="get_user_id"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_id()</h3>
				
				<p>Get the users id from the session.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function gets the user id value saved in the users browser session.</p>
				</div>
				
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE</p>
					<p><strong class="spacer_100">Success:</strong>int</p>
				</div>
				
				<h6>Example</h6>
				<small>Note: The returned example values below are displaying live data from the current auth database and session data set via the demo.</small>
				<table class="example">
					<tr>
						<td>
							<code>get_user_id()</code>
							<small>What is the user id of the current logged in user?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php 
								if ($user_id = $this->flexi_auth->get_user_id()) {
									echo $user_id;
								} else {
									var_dump($user_id);
								}
							?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="get_user_identity"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_identity()</h3>
				
				<p>Get the users primary identity from the session.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function gets the user id value saved in the users browser session.</p>
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
							<code>get_user_identity()</code>
							<small>What is the primary identity of the current logged in user?</small>
						</td>
						<td class="spacer_200 align_ctr">
							<?php 
								if ($user_identity = $this->flexi_auth->get_user_identity()) {
									echo $user_identity;
								} else {
									var_dump($user_identity);
								}
							?>
						</td>
					</tr>
				</table>
			</div>
				
			<a name="get_user_by_id"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_by_id()</h3>
				
				<p>Gets data from the user account table and any custom tables that have been related to it by submitting the users id.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_user_by_id(user_id, sql_select)</code>
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
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the users unique row id from the user account table.<br/>
								If no value is defined, the function will try to use the user id of the current logged in user.
							</td>
						</tr>
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
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function uses the defined user id to create an SQL WHERE statement that filters the defined user from the user accounts table.</p>
					<p>The data returned by the query is defined via the 'sql_select' argument. If no columns are specified, all columns will be returned.</p>
					<p>
						The SQL query is automatically joined with any other custom user tables (e.g. Profile and address tables in the demo) that have been defined and joined via the config. file.
						By using the defined joins, the query will return data from all the related custom tables too.
					</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>
						The SQL query uses GROUP BY on the users id column.<br/>
						This means that if you have any related custom user tables that may have more than one row of data related to a unique user id, then only the first row will be returned by this function.
					</p>
					<p>If you need to return multiple rows of data per unique user id, then you can use the alternative <a href="#get_custom_user_data">get_custom_user_data()</a> function.</p>
					<hr/>
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
<span class="comment">// Example #1 : Get all user data for the current logged in user.</span>
$this->flexi_auth->get_user_by_id();
</pre>
<pre>
<span class="comment">// Example #2 : Get defined column data for the user with an id of '101'.</span>
$user_id = 101;
$sql_select = array(...);

$this->flexi_auth->get_user_by_id($user_id, $sql_select);
</pre>
<pre>
<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_user_by_id()->result();
</pre>
			</div>
				
			<a name="get_user_by_identity"></a>
			<div class="w100 frame">
				<h3 class="heading">get_user_by_identity()</h3>
				
				<p>Gets data from the user account table and any custom tables that have been related to it by submitting the users identity.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_user_by_identity(identity, sql_select)</code>
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
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the users identity (Username and/or Email) from the user account table.<br/>
								If no value is defined, the function will try to use the primary identity of the current logged in user.
							</td>
						</tr>
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
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function uses the defined user identity (Username and/or Email) to create an SQL WHERE statement that filters the defined user from the user accounts table.</p>
					<p>The data returned by the query is defined via the 'sql_select' argument. If no columns are specified, all columns will be returned.</p>
					<p>
						The SQL query is automatically joined with any other custom user tables (e.g. Profile and address tables in the demo) that have been defined and joined via the config. file.
						By using the defined joins, the query will return data from all the related custom tables too.
					</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>
						The SQL query uses GROUP BY on the users id column.<br/>
						This means that if you have any related custom user tables that may have more than one row of data related to a unique user id, then only the first row will be returned by this function. 
					</p>
					<p>If you need to return multiple rows of data per unique user id, then you can use the alternative <a href="#get_custom_user_data">get_custom_user_data()</a> function.</p>
					<p>This function is compatible with flexi auths '<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Query Builder</a>' functions.</p>
					<hr/>
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
<span class="comment">// Example #1 : Get all user data for the current logged in user.</span>
$this->flexi_auth->get_user_by_identity();
</pre>
<pre>
<span class="comment">// Example #2 : Get defined column data for the user with an email identity of 'custom@email.com'.</span>
$user_identity = 'custom@email.com';
$sql_select = array(...);

$this->flexi_auth->get_user_by_identity($user_identity, $sql_select);
</pre>
<pre>
<span class="comment">// Example #3 : Get defined column data for the user with a username identity of 'custom_username'.</span>
$user_identity = 'custom_username';
$sql_select = array(...);

$this->flexi_auth->get_user_by_identity($user_identity, $sql_select);
</pre>
<pre>
<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_user_by_identity()->result();
</pre>
			</div>
				
			<a name="get_users"></a>
			<div class="w100 frame">
				<h3 class="heading">get_users()</h3>
				
				<p>Gets data from the user account table and any custom tables that have been related to it.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_users(sql_select, sql_where)</code>
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
					<p>The function uses the defined 'sql_where' argument to create an SQL WHERE statement to filter a list of users from the user accounts table.</p>
					<p>The data returned by the query is defined via the 'sql_select' argument. If no columns are specified, all columns will be returned.</p>
					<p>
						The SQL query is automatically joined with any other custom user tables (e.g. Profile and address tables in the demo) that have been defined and joined via the config. file.
						By using the defined joins, the query can return data from any of the related custom tables.
					</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>
						The SQL query uses GROUP BY on the users id column.<br/>
						This means that if you have any related custom user tables that may have more than one row of data related to a unique user id, then only the first row will be returned by this function. 
					</p>
					<p>If you need to return multiple rows of data per unique user id, then you can use the alternative <a href="#get_custom_user_data">get_custom_user_data()</a> function.</p>
					<hr/>
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
$this->flexi_auth->get_users($sql_select, $sql_where)->result();
</pre>
			</div>

			<a name="get_custom_user_data"></a>
			<div class="w100 frame">
				<h3 class="heading">get_custom_user_data()</h3>
				
				<p>Gets data from the user account table and any custom tables that have been related to it.</p>
				<p>
					The key difference with this function to the <a href="#get_users">get_users()</a> function, is that query results are not automatically grouped (Athough they can be).<br/>
					This means that a query could return multiple rows from a custom user table that are all related to a unique user id, rather than grouping the data to just one row.
				</p>
				<p>
					For example, the flexi auth demo includes a customer user address table, to return data on the user and ALL of their addresses, the query should not group rows by the user id.
				</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_custom_user_data(sql_select, sql_where, sql_group_by)</code>
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
						<tr>
							<td>sql_group_by</td>
							<td class="align_ctr">bool | string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define whether the returned query rows should be grouped together by a specific table column. 
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function uses the defined 'sql_where' argument to create an SQL WHERE statement to filter a list of users from the user accounts table.</p>
					<p>The data returned by the query is defined via the 'sql_select' argument. If no columns are specified, all columns will be returned.</p>
					<p>
						The SQL query is automatically joined with any other custom user tables (e.g. Profile and address tables in the demo) that have been defined and joined via the config. file.
						By using the defined joins, the query can return data from any of the related custom tables.
					</p>
					<p>Unlike the similar <a href="#get_users">get_users()</a> function, this function allows data to be grouped by a specific table column, or to not be grouped at all.</p>
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
$sql_group_by = array(...);

<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_custom_user_data($sql_select, $sql_where, $sql_group_by)->result();
</pre>
			</div>


			<a name="search_users"></a>
			<div class="w100 frame">
				<h3 class="heading">search_users()</h3>
				
				<p>Gets data from the user account table via a keyword based search query.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>search_users(search_query, exact_match, sql_select, sql_where, sql_group_by)</code>
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
							<td>search_query</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines the search terms used to query the user account table.</td>
						</tr>
						<tr>
							<td>exact_match</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Define whether all keywords within the search query must be in the matched records.<br/>
								Example: For a search query of "John Smith", an exact match would not return a record matching the name "John".
							</td>
						</tr>
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
						<tr>
							<td>sql_group_by</td>
							<td class="align_ctr">bool | string | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">TRUE</td>
							<td>
								Define whether the returned query rows should be grouped together by a specific table column.<br/>
								By default the function will group records by the user id. 
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function works in a similar way to the other user query functions within the library, with the exception that it allows the returned results to be additionally filtered via search terms.</p>
					<p>The submitted search term is split into individual terms that are then each matched against specific user table columns that have been defined via the setting 'search_user_cols' in the libraries config. file.</p>
					<p>If the function has defined the query to only return exact matches, then the SQL function will only return records where every individual term is matched to each record.</p>
				</div>
						
				<h6>Notes</h6>
				<div class="frame_note">
					<p>By default, the function will group users by their user id using an SQL GROUP BY statement.</p>
					<p>
						This means that if you have any related custom user tables that may have more than one row of data related to a unique user id (Example: multiple addresses per user), then by default, only the first row will be returned.<br/>
					</p>
					<p>
						The GROUP BY statement can be turned off via the 'sql_group_by = FALSE' argument, or alternatively can be set to group the records by another table column.
					</p>
					<hr/>
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
<span class="comment">// Example #1 : Return all users matching BOTH keywords "John" AND "Smith".</span>
$search_query = 'John Smith';
$exact_match = TRUE;

$this->flexi_auth->search_users($search_query, $exact_match);
</pre>
<pre>
<span class="comment">// Example #2 : Return all users matching EITHER keywords "John" OR "Smith".</span>
$search_query = 'John Smith';
$exact_match = FALSE;

$this->flexi_auth->search_users($search_query, $exact_match);
</pre>
<pre>
<span class="comment">// Example #3 : As example #1, but additionally defining specific columns to return,
// adding an additional SQL WHERE statement, and preventing records being grouped by the user id.</span>
$search_query = 'John Smith';
$exact_match = FALSE;

<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_select = array(...);
$sql_where = array(...);
$sql_group_by = TRUE;

<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->search_users($search_query, $exact_match, $sql_select, $sql_where, $sql_group_by)->result();
</pre>
			</div>

			<a name="get_unactivated_users"></a>
			<div class="w100 frame">
				<h3 class="heading">get_unactivated_users()</h3>
				
				<p>Get users that have not activated their account within a set time period.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>get_unactivated_users(inactive_days, sql_select, sql_where)</code>
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
							<td>inactive_days</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">28</td>
							<td>
								Defines the number of days that inactive user accounts will be filtered by.<br/>
								For example, defining '28' would return all users that have not activated their account within 28 days since registration.
							</td>
						</tr>
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
					<p>The function works in a similar way to the other user query functions within the library, with the exception that it applies an additional SQL WHERE statement to filter all inactive user account that registered outside of a defined number of days.
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
<span class="comment">// Example #1 : Get all inactive users that registered over 14 days ago.</span>
$inactive_days = 14;

$this->flexi_auth->get_unactivated_users($inactive_days);
</pre>
<pre>
<span class="comment">// Example #2 : As example #1, but additionally defining specific columns to return and
// adding an additional SQL WHERE statement.</span>
$inactive_days = 14;

<span class="comment">// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>
$sql_select = array(...);
$sql_where = array(...);

<span class="comment">// Example of chaining CI's query function 'result()'.
// Read the <a href="<?php echo $base_url; ?>user_guide/query_sql_results">Query Result documentation</a> for further information on available functions.</span>
$this->flexi_auth->get_unactivated_users($inactive_days, $sql_select, $sql_where)->result();
</pre>
			</div>
				
			<a name="resend_activation_token"></a>
			<div class="w100 frame">
				<h3 class="heading">resend_activation_token()</h3>
				
				<p>Resend user a new activation token incase they have lost the previous one.</p>
				<hr/>
				
				<h6>Library and Requirements</h6>
				<div class="frame_note">
					<p>Available via the standard library.</p>
				</div>
				
				<h6>Function Parameters</h6>
				<code>resend_activation_token(identity)</code>
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
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the users identity (Username and/or Email) from the user account table.<br/>
								If no value is defined, the function will try to use the primary identity of the current logged in user.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>How it Works</h6>
				<div class="frame_note">
					<p>The function checks the status of the users account to confirm whether their account is inactive.</p>
					<p>A new activation token is then set and is emailed to the user.</p>
				</div>
									
				<h6>Return Values</h6>
				<div class="frame_note">
					<p><strong class="spacer_100">Failure:</strong>FALSE | An error message will be set.</p>
					<p><strong class="spacer_100">Success:</strong>TRUE | A status message will be set.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$identity = 'custom_identity';

$this->flexi_auth->resend_activation_token($identity);
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