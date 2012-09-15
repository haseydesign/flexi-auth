<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Defining SQL Statements | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for defining sql statements in flexi auth functions."/> 
	<meta name="keywords" content="defining sql statements, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Defining Custom SQL Statements</h1>
				<p>A guide to defining custom SQL statements to flexi auth functions.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>Defining Custom SQL Statements</h2>
			<a href="<?php echo $base_url; ?>user_guide/custom_sql_index">Customising SQL Statements Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/query_sql_results">Querying SQL Results</a> |
			<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Building Custom SQL Queries</a>
			
			<div class="anchor_nav">
				<h6>SQL Statements</h6>
				<p>
					<a href="#sql_select">SQL SELECT</a> | <a href="#sql_where">SQL WHERE</a> | <a href="#sql_insert">SQL INSERT</a> | <a href="#sql_update">SQL UPDATE</a>
				</p>
			</div>
			
			<div class="w100 frame">
				<h3 class="heading">Defining SQL Statements using a String or an Array</h3>
				<p>Many of the functions in the flexi auth library that perform CRUD operations to the database tables allow for custom SQL statements to be returned or defined when performing a query.</p>
				<p>The custom SQL statements can be defined for applicable functions using one of two available methods, either via the <a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Query Builder</a> functions, or via submitting an SQL formatted string or array directly to a functions parameters.</p>
				<p>The examples below explain how to define and format custom SQL statements using either a string or an array.</p>
			</div>

			<a name="sql_select"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL SELECT Statements</h3>
				<p>Some functions allow a custom SQL SELECT statement to be returned, rather than just returning every column available.</p>
				<p>
					Setting the columns to be returned uses the same formatting available when defining an SELECT statement using CodeIgniters Active Record functions.
					The data can either be an SQL SELECT statement formatted as a string, or it can be formatted using an array.
				</p>
				<p>Essentially, you can pass data to the '<em>sql_select</em>' parameters using any of the methods that CodeIgniters SELECT function allows.</p>
				<hr/>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1: Setting an SQL SELECT statement using a <strong class="uline">string</strong>.</span>

$sql_select = 'column_1, column_2, column_3';
</pre>					
<pre>
<span class="comment">// Example #2: Setting an SQL SELECT statement using an <strong class="uline">array</strong>.</span>

$sql_select = array(
	'column_1', 
	'column_2', 
	'column_3'
);
</pre>					
			</div>

			<a name="sql_where"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL WHERE Statements</h3>
				<p>Some functions allow a custom SQL WHERE statement to be defined, rather than either filtering results using the functions default SQL WHERE statement, or by applying no filter at all.</p>
				<p>
					Setting the columns and values to be compared uses the same formatting available when defining a WHERE statement using CodeIgniters Active Record functions.
					The data can either be an SQL WHERE statement formatted as a string, or it can be formatted using an array.
				</p>
				<p>Essentially, you can pass data to the '<em>sql_where</em>' parameters using any of the methods that CodeIgniters WHERE function allows.</p>
				<hr/>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Example #1: Setting an SQL WHERE statement using a <strong class="uline">string</strong>.</span>

$sql_where = 'column_1 = "example_value_1" AND column_2 = "example_value_2" AND column_3 = "example_value_3"';
</pre>					
<pre>
<span class="comment">// Example #2: Setting an SQL WHERE statement using an <strong class="uline">array</strong>.</span>

$sql_where = array(
	'column_1' => "example_value_1",
	'column_2' => "example_value_2", 
	'column_3' => "example_value_3"
);
</pre>					
			</div>

			<a name="sql_insert"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL INSERT Statements</h3>
				<p>Functions using SQL INSERT queries allow you to define the table columns and values that you want to insert into the database table.</p>
				<p>
					Setting the table columns and values uses the same formatting when defining an INSERT statement using CodeIgniters Active Record functions.<br/>
					The data must be formatted as an associative array with the array key acting as the table column, and the array value as the table column value.
				</p>
				<hr/>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Setting an SQL INSERT statement using an <strong class="uline">array</strong>.</span>

$sql_insert = array(
	'column_1' => "example_value_1",
	'column_2' => "example_value_2", 
	'column_3' => "example_value_3"
);
</pre>					
			</div>

			<a name="sql_update"></a>
			<div class="w100 frame">
				<h3 class="heading">SQL UPDATE Statements</h3>
				<p>Functions using SQL UPDATE queries allow you to define the table columns and values that you want to UPDATE into the database table.</p>
				<p>
					Setting the table columns and values uses the same formatting when defining an UPDATE statement using CodeIgniters Active Record functions.<br/>
					The data must be formatted as an associative array with the array key acting as the table column, and the array value as the table column value.
				</p>
				<hr/>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Setting an SQL UPDATE statement using an <strong class="uline">array</strong>.</span>

$sql_update = array(
	'column_1' => "example_value_1",
	'column_2' => "example_value_2", 
	'column_3' => "example_value_3"
);
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