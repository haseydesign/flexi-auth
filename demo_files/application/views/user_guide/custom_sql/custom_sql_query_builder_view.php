<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Query Builder | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="A user guide list of building custom SQL queries in flexi auth functions."/> 
	<meta name="keywords" content="query builder functions, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h2>User Guide | Building Custom SQL Queries</h2>
				<p>A guide to customising the SQL statements used by flexi auth functions to return database data.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			
			<h2>Building Custom SQL Queries</h2>
			<a href="<?php echo $base_url; ?>user_guide/custom_sql_index">Customising SQL Statements Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/query_sql_results">Querying SQL Results</a> |
			<a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">Defining Custom SQL Statements</a>
			
			<div class="anchor_nav">
				<h6>Query Builder Functions</h6>
				<p>
					<a href="#sql_select">SQL SELECT</a> | <a href="#sql_where">SQL WHERE</a> | <a href="#sql_where_in">SQL WHERE IN</a> | <a href="#sql_where_like">SQL WHERE LIKE</a><br/>
					<a href="#sql_join">SQL JOIN</a> | <a href="#sql_order_by">SQL ORDER BY</a> | <a href="#sql_group_by">SQL GROUP BY</a> | <a href="#sql_limit">SQL LIMIT</a> | <a href="#clear_sql">Clear SQL statements</a>
				</p>
			</div>
				
			<div class="w100 frame">
				<h3 class="heading">Functions that Utilise CodeIgniters Active Record Class</h3>
				<p>Many of the functions in the flexi auth library that perform CRUD operations to the libraries database tables allow for custom SQL statements to be returned or defined when running the query.</p>
				<p>The custom SQL statements can be defined for applicable functions using one of two available methods, either via the Query Builder functions listed below, or via submitting an SQL formatted string or array directly to a functions corresponding 'sql_select' or 'sql_where' parameter.</p>
				<p>The examples below explain how to set custom SQL statements using flexi auth functions that utilise CodeIgniters Active Record class.</p>
				<hr/>
				
				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>

				<h6>How it Works</h6>
				<div class="frame_note">
					<p>When many functions are called, they make multiple SQL queries to prepare data required for the final output of the function.</p>
					<p>If a CodeIgniter Active Record function like <code>$this->db->where('x', 'y')</code> was called just before the flexi auth function, the defined WHERE statement would not necessarily be applied by CodeIgniter to the correct SQL query made by the flexi auth function. Instead it may be applied to one of the queries preparing data.</p>
					<p>To ensure that the custom SQL statement is applied to the correct query, flexi auth stores any SQL statements defined via its Query Builder functions, and applies them just prior to making the SQL query that returns the functions final output.</p>
				</div>
				
				<h6>Reference</h6>
				<div class="frame_note">
					<ul>
						<li><a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">Defining SQL Statements</a> in flexi auth.</li>
						<li><a href="http://ellislab.com/user_guide/database/active_record.html" target="_blank">CodeIgniter Active Record user guide</a>.</li>
					</ul>
				</div>
			</div>
			
			<a name="sql_select"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL SELECT</h3>
				
				<p>Defines the table columns to be returned by the SQL SELECT statement.</p>					
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Name and Parameters</h6>
				<code>sql_select(columns, overwrite_existing)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>columns</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the table columns to be returned by the SQL SELECT statement.</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL SELECT statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// This example sets the SQL SELECT statement using an array.
// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>

$sql_select = array(
	'example_column_1', 
	'example_column_2'
);

$this->flexi_auth->sql_select($sql_select);

$this->flexi_auth->get_users();

<span class="comment">// Produces:
// SELECT `example_column_1`, `example_column_2` 
// FROM (`user_accounts`)</span>
</pre>
			</div>
			
			<a name="sql_where"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL WHERE</h3>
				
				<p>Defines the table column and comparision value to be used by the SQL WHERE statement.</p>					
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Names and Parameters</h6>
				<code>sql_where(columns, value, overwrite_existing)</code><br/>
				<code>sql_or_where(columns, value, overwrite_existing)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>column</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the table column to be used by the SQL WHERE statement.</td>
						</tr>
						<tr>
							<td>value</td>
							<td class="align_ctr">string | int</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the value to be compared against the defined table column used by the SQL WHERE statement.</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL WHERE statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>				
<pre>
<span class="comment">// This example sets the SQL WHERE statement using arrays.
// Read the <a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">defining SQL documentation</a> for further information on setting SQL statements.</span>

<span class="comment">// SQL WHERE</span>
$sql_where = array(
	'example_column_1' => 'example-value-1'
);
$this->flexi_auth->sql_where($sql_where);

<span class="comment">// SQL OR WHERE</span>
$sql_or_where = array(
	'example_column_2' => 'example-value-2'
);
$this->flexi_auth->sql_or_where($sql_or_where);

$this->flexi_auth->get_users();

<span class="comment">// Produces:
// SELECT * 
// FROM (`user_accounts`) 
// WHERE `example_column_1` = 'example-value-1' 
// 	OR `example_column_2` = 'example-value-2'</span>
</pre>
			</div>			
			
			<a name="sql_where_in"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL WHERE IN</h3>
				
				<p>Defines the table column and comparision values to be used by the SQL WHERE IN statement.</p>				
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
										
				<h6>Function Names and Parameters</h6>
				<code>sql_where_in(column, value, overwrite_existing)</code><br/>
				<code>sql_or_where_in(column, value, overwrite_existing)</code><br/>
				<code>sql_where_not_in(column, value, overwrite_existing)</code><br/>
				<code>sql_or_where_not_in(column, value, overwrite_existing)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>column</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the table column to be used by the SQL WHERE IN statement.</td>
						</tr>
						<tr>
							<td>value</td>
							<td class="align_ctr">string | int | array</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Sets the value to be compared against the defined table column used by the SQL WHERE IN statement.<br/>
								Multiple values can be set in SQL IN statement by using a comma delimited string or an array.
							</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL WHERE statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
													
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>
				
<pre>
<span class="comment">// This example sets the SQL WHERE statement using strings and arrays.</span>

<span class="comment">// SQL WHERE IN (Set as an array)</span>
$sql_where_in = array(
	'example-value-1a'
);
$this->flexi_auth->sql_where_in('example_column_1', $sql_where_in);

<span class="comment">// SQL OR WHERE IN (Set as an array)</span>
$sql_or_where_in = array(
	'example-value-2a', 
	'example-value-2b', 
	'example-value-2c'
);
$this->flexi_auth->sql_or_where_in('example_column_2', $sql_or_where_in);

<span class="comment">// SQL WHERE NOT IN (Set as a string)</span>
$sql_where_not_in = 'example-value-3a';
$this->flexi_auth->sql_where_not_in('example_column_3', $sql_where_not_in);

<span class="comment">// SQL OR WHERE NOT IN (Set as a string)</span>
$sql_or_where_not_in = 'example-value-4a, example-value-4b';
$this->flexi_auth->sql_or_where_not_in('example_column_4', $sql_or_where_not_in);

$this->flexi_auth->get_users();

<span class="comment">// Produces:
// SELECT *
// FROM (`user_accounts`)
// WHERE `example_column_1` IN ('example-value-1a') 
// 	OR `example_column_2` IN ('example-value-2a', 'example-value-2b', 'example-value-2c') 
// 	AND `example_column_3` NOT IN ('example-value-3a') 
// 	OR `example_column_4` NOT IN ('example-value-4a, example-value-4b') </span>
</pre>
			</div>
			
			<a name="sql_where_like"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL WHERE LIKE</h3>
				
				<p>Defines the table column and comparision values to be used by the SQL WHERE LIKE statement.</p>			
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Names and Parameters</h6>
				<code>sql_like(column, value, wildcard_position)</code><br/>
				<code>sql_or_like(column, value, wildcard_position)</code><br/>
				<code>sql_not_like(column, value, wildcard_position)</code><br/>
				<code>sql_or_not_like(column, value, wildcard_position)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>column</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the table column to be used by the SQL WHERE LIKE statement.</td>
						</tr>
						<tr>
							<td>value</td>
							<td class="align_ctr">string | int</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the value to be compared against the defined table column used by the SQL WHERE LIKE statement.</td>
						</tr>
						<tr>
							<td>wildcard_position</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">'BOTH'</td>
							<td>
								Defines the type of LIKE statement that should be set.<br/> 
								The options are: 'BEFORE', 'AFTER' and 'BOTH'.
							</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL WHERE statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// SQL LIKE with the wildcard positioned on both sides.</span>
$this->flexi_auth->sql_like('example_column_1', 'example-value-1');

<span class="comment">// SQL OR LIKE with the wildcard positioned at the start.</span>
$this->flexi_auth->sql_or_like('example_column_2', 'example-value-2', 'before');

<span class="comment">// SQL NOT LIKE the wildcard positioned at the end</span>
$this->flexi_auth->sql_not_like('example_column_3', 'example-value-3', 'after');

<span class="comment">// SQL OR NOT LIKE with the wildcard positioned on both sides</span>
$this->flexi_auth->sql_or_not_like('example_column_4', 'example-value-4', 'both');

$this->flexi_auth->get_users();

<span class="comment">// Produces:
// SELECT *
// FROM (`user_accounts`)
// WHERE  `example_column_1`  LIKE '%example-value-1%'
// 	OR  `example_column_2`  LIKE '%example-value-2'
// 	AND  `example_column_3` NOT LIKE 'example-value-3%'
// 	OR  `example_column_4` NOT LIKE '%example-value-4%'</span>
</pre>
			</div>
			
			<a name="sql_join"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL JOIN</h3>
				
				<p>Defines the table name and join relationship between the to-be-joined tables used by the SQL JOIN statement.</p>					
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Name and Parameters</h6>
				<code>sql_join(column, join_on, join_type, overwrite_existing)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>column</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the table that is to be joined by the SQL JOIN statement.</td>
						</tr>
						<tr>
							<td>join_on</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the two table columns to be used by the SQL JOIN statement.</td>
						</tr>
						<tr>
							<td>join_type</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines the type of join that should be set.<br/>
								Options are: 'LEFT', 'RIGHT', 'OUTER', 'INNER', 'LEFT OUTER', and 'RIGHT OUTER'.
							</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL JOIN statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
											
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>
<pre>
<span class="comment">// SQL JOIN table name.</span>
$sql_join = 'example_table_2';

<span class="comment">// SQL JOIN condition.</span>
$sql_join_on = 'example_table_1.example_column_1 = example_table_2.example_column_1';

$this->flexi_auth->sql_join($sql_join, $sql_join_on);

$this->flexi_auth->get_db_table_data('example_table_1');

<span class="comment">// Produces:
// SELECT *
// FROM (`example_table_1`)
// 	JOIN `example_table_2` ON `example_table_1`.`example_column_1` = `example_table_2`.`example_column_1`</span>
</pre>
			</div>
			
			<a name="sql_order_by"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL ORDER BY</h3>
				
				<p>Defines the table column and sort direction used by the SQL ORDER BY statement.</p>				
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Name and Parameters</h6>
				<code>sql_order_by(column, sort_direction, overwrite_existing)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>column</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the columns for the SQL ORDER BY statement to sort the returned data by.</td>
						</tr>
						<tr>
							<td>sort_direction</td>
							<td class="align_ctr">string</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>
								Defines what direction to sort the return data by.<br/>
								Options are: 'ASC' and 'DESC'.
							</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL ORDER BY statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$this->flexi_auth->sql_order_by('example_column_1', 'DESC');

$this->flexi_auth->get_users();

<span class="comment">// Produces:
// SELECT *
// FROM (`user_accounts`)
// ORDER BY `example_column_1` DESC</span>
</pre>
			</div>
			
			<a name="sql_group_by"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL GROUP BY</h3>
				
				<p>Defines the table column used by the SQL GROUP BY statement.</p>
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Name and Parameters</h6>
				<code>sql_group_by(columns, overwrite_existing)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>columns</td>
							<td class="align_ctr">string | array</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>column or string</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL GROUP BY statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$this->flexi_auth->sql_group_by('example_column_1');

$this->flexi_auth->get_users();

<span class="comment">// Produces:
// SELECT *
// FROM (`user_accounts`)
// GROUP BY `example_column_1`</span>
</pre>
			</div>
			
			<a name="sql_limit"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL LIMIT</h3>
				
				<p>Defines the limit value and offset value used by the SQL LIMIT statement.</p>
				<hr/>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Function Name and Parameters</h6>
				<code>sql_limit(limit, offset, overwrite_existing)</code>
				<table>
					<thead>
						<tr>
							<th class="spacer_175">Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Required</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>limit</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the limit value of SQL LIMIT statement.</td>
						</tr>
						<tr>
							<td>offset</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">Yes</td>
							<td class="align_ctr">FALSE</td>
							<td>Sets the offset value of SQL LIMIT statement.</td>
						</tr>
						<tr>
							<td>overwrite_existing</td>
							<td class="align_ctr">bool</td>
							<td class="align_ctr">No</td>
							<td class="align_ctr">FALSE</td>
							<td>Defines whether to overwrite any SQL LIMIT statements that have already been set.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Check the user guide of a specific function to confirm whether it is compatible with this SQL function.</p>
				</div>
				
				<h6>Example</h6>
<pre>
$this->flexi_auth->sql_limit(10, 2);

$this->flexi_auth->get_users();

<span class="comment">// Produces:
// SELECT *
// FROM (`user_accounts`)
// LIMIT 2, 10</span>
</pre>
			</div>
			
			<a name="clear_sql"></a>
			<div class="w100 frame">
				<h3 class="heading">Clear SQL statements</h3>
				
				<p>Clears any custom user defined SQL Active Record functions.</p>
				<hr/>

				<h6>Function Names</h6>
				<div class="frame_note">
					<code>sql_clear()</code>
				</div>

				<h6>Library Requirements</h6>
				<div class="frame_note">
					<p>Available via the lite and standard libraries.</p>
				</div>				
				
				<h6>Example</h6>
<pre>
$this->flexi_auth->sql_clear();
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