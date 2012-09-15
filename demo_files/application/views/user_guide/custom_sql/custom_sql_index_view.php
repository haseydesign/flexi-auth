<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Customising SQL Statements | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for customising SQL statements in flexi auth."/> 
	<meta name="keywords" content="customising SQL statements, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="user_guide_index">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- User Guide Navigation -->
	<?php $this->load->view('includes/user_guide_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="intro_text">
				<h1>User Guide | Customising SQL Statements</h1>
				<p>Many of the flexi auth functions return data that can be customised by re-defining the SQL statements used by the function.</p>
			</div>
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix parallel">

			<h2>User Guide Sections</h2>				
			<a href="<?php echo $base_url; ?>user_guide/query_sql_results">Querying SQL Results</a> |
			<a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">Defining Custom SQL Statements</a> |
			<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder">Building Custom SQL Queries</a>
			
			<div class="w100 frame">
				<h3>SQL Queries</h3>
				<small>Customise SQL statements used by flexi auth functions.</small>
				<hr/>
				
				<h6>Returning Data from SQL Query Results</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/query_sql_results">Querying SQL Results</a><br/>
						<small>A guide to returning data from SQL queries returned by flexi auth functions.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>Defining Custom SQL Statements</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/defining_custom_sql">Defining Custom SQL Statements</a><br/>
						<small>A guide to defining custom SQL statements to flexi auth functions.</small>
					</li>
				</ul>
				<hr/>
				
				<h6>Building Custom SQL Queries</h6>
				<ul>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_select">SQL SELECT</a><br/>
						<small>Defines the table columns to be returned by the SQL SELECT statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_where">SQL WHERE</a><br/>
						<small>Defines the table column and comparision value to be used by the SQL WHERE statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_where_in">SQL WHERE IN</a><br/>
						<small>Defines the table column and comparision values to be used by the SQL WHERE IN statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_where_like">SQL WHERE LIKE</a><br/>
						<small>Defines the table column and comparision values to be used by the SQL WHERE LIKE statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_join">SQL JOIN</a><br/>
						<small>Defines the table name and join relationship between the to-be-joined tables used by the SQL JOIN statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_order_by">SQL ORDER BY</a><br/>
						<small>Defines the table column and sort direction used by the SQL ORDER BY statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_group_by">SQL GROUP BY</a><br/>
						<small>Defines the table column used by the SQL GROUP BY statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#sql_limit">SQL LIMIT</a><br/>
						<small>Defines the limit value and offset value used by the SQL LIMIT statement.</small>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>user_guide/custom_sql_query_builder#clear_sql">Clear SQL statements</a><br/>
						<small>Clears any custom user defined SQL Active Record functions.</small>
					</li>
				</ul>
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