<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Querying Results | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for querying results from flexi auth functions."/> 
	<meta name="keywords" content="query results, active record, flexi auth, user authentication, codeigniter"/>
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
				<h2>User Guide | Querying SQL Results</h2>
				<p>A guide to returning data from SQL queries returned by flexi auth functions.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			
			<h2>Querying SQL Results</h2>
			<a href="<?php echo $base_url; ?>user_guide/custom_sql_index">Customising SQL Statements Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">Defining Custom SQL Statements</a> |
			<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Building Custom SQL Queries</a>

			<div class="anchor_nav">
				<h6>Querying SQL Results</h6>
				<p>
					<a href="#codeigniter_query_syntax">Chaining CodeIgniters Query Result Functions</a> | <a href="#alternative_query_syntax">Alternative Syntax</a>
				</p>
			</div>

			<a name="codeigniter_query_syntax"></a>
			<div class="w100 frame">
				<h3 class="heading">Returning Query Results by Chaining CodeIgniter Functions</h3>
				<p>flexi auth provides many SQL SELECT query functions that return query objects using CodeIgniters Active Record class.</p>
				<p>To return data from the query objects, CodeIgniters query result functions ('result()', 'row()' etc.) can be directly chained to the returned object.</p>
				
				<h6>Examples</h6>
				<p><em>Note: These examples use the '<a href="<?php echo $base_url; ?>user_guide/custom_sql_admin#get_users">get_users()</a>' function as an example SQL SELECT query function.</em></p>
<pre>
<span class="comment">// Example #1: Chaining CodeIgniters 'result()' function.</span>

$this->flexi_auth->get_users()->result();
</pre>					
<pre>
<span class="comment">// Example #2: Chaining CodeIgniters 'row_array()' function.</span>

$this->flexi_auth->get_users()->row_array();
</pre>				
<pre>
<span class="comment">// Example #3: Returning the query object without applying a result function.</span>

$this->flexi_auth->get_users();
</pre>				
			</div>

			<a name="alternative_query_syntax"></a>
			<div class="w100 frame">
				<h3 class="heading">Returning Query Results using an Alternative Syntax</h3>
				<p>To offer an alternative and slightly tidier syntax, flexi auth allows you to automatically return the query data type that you want by defining so via the functions actual name.</p>
				<p>This method still uses CodeIgniters query result functions, but simply does the chaining for you, returning the exact same data.</p>
				<hr/>

				<h6>Alternative Syntax</h6>
				<p><em>Note: The following 'xxx' values represent the name of the flexi auth function that is being chained.</em></p> 
				<table>
					<thead>
						<tr>
							<th class="spacer_150">CodeIgniter Function</th>
							<th class="spacer_150">Alternative Syntax</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>xxx->result()</td>
							<td>xxx_result()</td>
							<td>Returns a query result as an array of objects, or an empty array on failure.</td>
						</tr>
						<tr>
							<td>xxx->row()</td>
							<td>xxx_row()</td>
							<td>Returns a single result row as an object. If the query has more than one row, it returns only the first row.</td>
						</tr>
						<tr>
							<td>xxx->result_array()</td>
							<td>xxx_array()</td>
							<td>Returns a query result as a pure array, or an empty array when no result is produced.</td>
						</tr>
						<tr>
							<td>xxx->row_array()</td>
							<td>xxx_row_array()</td>
							<td>Returns a single result row as an array. If the query has more than one row, it returns only the first row.</td>
						</tr>
						<tr>
							<td>xxx->num_rows()</td>
							<td>xxx_num_rows()</td>
							<td>Returns the number of rows returned by a query.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Notes</h6>
				<div class="frame_note">
					<p>Using the alternative syntax can be used on virtually all SQL SELECT functions within the library.</p>
					<p>Functions that are compatible are defined via each functions details described in this user guide.</p>
				</div>					
				
				<h6>Examples</h6>
				<p><em>Note: These examples use the '<a href="<?php echo $base_url; ?>user_guide/user_account_get_data#get_users">get_users()</a>' function as an example SQL SELECT query function.</em></p>
<pre>
<span class="comment">// Example #1: Returning CodeIgniters 'result()' query data using alternative syntax.</span>

$this->flexi_auth->get_users_result();
</pre>					
<pre>
<span class="comment">// Example #2: Returning CodeIgniters 'row()' query data using alternative syntax.</span>

$this->flexi_auth->get_users_row();
</pre>				
<pre>
<span class="comment">// Example #3: Returning CodeIgniters 'result()' query data using alternative syntax.</span>

$this->flexi_auth->get_users_array();
</pre>					
<pre>
<span class="comment">// Example #4: Returning CodeIgniters 'row_array()' query data using alternative syntax.</span>

$this->flexi_auth->get_users_row_array();
</pre>
<pre>
<span class="comment">// Example #5: Returning CodeIgniters 'num_rows()' query data using alternative syntax.</span>

$this->flexi_auth->get_users_num_rows();
</pre>				
<pre>
<span class="comment">// Example #6: Returning the query object without applying a result function.</span>

$this->flexi_auth->get_users();
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