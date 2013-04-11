<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Change Log | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The log of important changes to the flexi auth library."/> 
	<meta name="keywords" content="change log, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Change Log</h1>
				<p>A log of all important changes that have been made to the flexi auth library since release.</p>
				<p>Whilst there have been many minor tweaks to the library and demo since release, this change log is intended to only cover the most important changes that are likely to affect an existing flexi auth installation.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			
			<div class="w100 frame">
				<h3 class="heading">Github Commit History</h3>
				<h6>See the Github commit history log for more better indepth and up-to-date details on changes.</h6>
				<p><a href="https://github.com/haseydesign/flexi-auth/commits/master">https://github.com/haseydesign/flexi-auth/commits/master</a></p>
			</div>

			<div class="w100 frame">
				<h3 class="heading">Release | 30th January 2013</h3>
				<ul>
					<li>
						<p>A new user privilege feature has been added to the library.</p>
						<p>
							Privileges can now be assigned to a specific user group, any user within that user group will then inherit the assigned privileges. <br>
							Privileges can still be assigned to users on an individual basis.
						</p>
						<p>Thanks to Filou Tschiemer who contributed this feature to the the library!</p>
					</li>
				</ul>
			</div>
			
			<div class="w100 frame">
				<h3 class="heading">Release | 3rd November 2012</h3>
				<ul>
					<li>
						<p>Updated all database table column references within the libraries model and library files to be prefixed with the columns table name.</p>
						<p>For example, the a table column named 'id', would now be referenced within an SQL statement as 'table_name.id' rather than just 'id'.</p>
						<p>This will help prevent developers getting SQL errors regarding '<em>ambiguous</em>' column names, caused by table columns from different tables being defined in the SQL statement with identical names.</p>
						<p>Provided you have made no changes to the flexi auths model and library files, no changes should be required when upgrading to this release.</p>
					</li>
				</ul>
			</div>
			
			<div class="w100 frame">
				<h3 class="heading">Release | 6th October 2012</h3>
				<ul>
					<li>
						<p>Updated the '<a href="<?php echo $base_url; ?>user_guide/user_account_set_data#insert_custom_user_data">insert_custom_user_data()</a>' function to return either an array or boolean value of FALSE.</p>
						<p>If the function successfully inserts records to a custom table, then the name and row id of the table are added to an array that is returned by the function. If multiple rows are inserted to multiple tables, then each table and row id is returned by the array.</p>
						<p>If no records are inserted, then a boolean value of FALSE if returned.</p>
					</li>
				</ul>
			</div>
			
			<div class="w100 frame">
				<h3 class="heading">Release | 13th September 2012</h3>
				<ul>
					<li>First publicly released version.</li>
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