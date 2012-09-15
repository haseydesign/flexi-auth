<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Group Configuration | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring user groups in flexi auth."/> 
	<meta name="keywords" content="user group configuration, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Group Configuration</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>User Group Configuration</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_group_index">User Group Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_get_data">Get User Group Data</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_group_set_data">Set User Group Data</a>

			<div class="anchor_nav">
				<h6>Config Setup Information</h6>
				<p>
					<a href="#db_schema_diagram">Table Schema Diagram</a>
				</p>
				<h6>Table and Config File Settings</h6>
				<p>
					<a href="#user_group_table">User Group Table</a> | 
					<a href="#config_settings">User Group Config Settings</a>
				</p>
			</div>
		
			<a name="help"></a>
			<div class="w100 frame">
				<h3 class="heading">Help with the Table Configuration</h3>
				<span class="toggle">Show / Hide Help</span>
				<div id="help_guide" class="hide_toggle">
					<hr/>
					<p><strong>Config Name</strong>: The name that flexi auth internally references the config setting by.</p>
					<p><strong>Default</strong>: The default value set within the config file.</p>
					<p>
						<strong>Data Type</strong>: The data type that is expected by the config setting.
						<ul>
							<li><em>bool</em> : Requires a boolean value of 'TRUE' or 'FALSE'.</li>
							<li><em>string</em> : Requires a textual value.</li>
							<li><em>int</em> : Requires a numeric value. It does not matter whether the value is an integer, float, decimal etc.</li>
							<li><em>array</em> : Requires an array.</li>
							<li><em>datetime</em> : Requires a datetime value. Typically either a MySQL DATETIME (2000-12-31 12:00:00) or UNIX timestamp (1234567890)</li>
						</ul>
					</p>
					<hr/>
					
					<h6>Config File Location</h6>
					<p>The config file is located in CodeIgniters 'config' folder and is named 'flexi_auth.php'.</p>
				</div>
			</div>

			<a name="db_schema_diagram"></a>
			<div class="w100 frame">
				<h3 class="heading">Schema Diagram : User Group Table</h3>
				<div class="frame_note">
					<p>A database table schema diagram, showing how the user group table is related to the primary user account table.</p>
					<p>Note: Table and columns names are defined using their config names referenced within the config file. The names within brackets are the default demo names.</p>
				</div>
				<img src="<?php echo $includes_dir; ?>images/db_diagrams/user_group_schema.png" class="db_schema_diagram"/>
			</div>

			<a name="user_group_table"></a>
			<div class="w100 frame">
				<h3 class="heading">User Group Table</h3>
				
				<p>
					The user group table is used to allocate a group classification to users, typically this is used to group users as either admins or public users.<br/>
					The grouped users can then be delivered content specific to their group, or be restricted access to specific areas - i.e. an admin only area.
				</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_125">Default</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>table</td>
							<td>user_groups</td>
							<td class="align_ctr">-</td>
							<td>The tables name.</td>
						</tr>
						<tr>
							<td>join</td>
							<td>user_groups.ugrp_id</td>
							<td class="align_ctr">-</td>
							<td>The tables foreign key used to join with foreign keys of other tables.</td>
						</tr>
						<tr>
							<td>id</td>
							<td>ugrp_id</td>
							<td class="align_ctr">int</td>
							<td>The tables primary key.</td>
						</tr>
						<tr>
							<td>name</td>
							<td>ugrp_name</td>
							<td class="align_ctr">string</td>
							<td>The name of the user group.</td>
						</tr>
						<tr>
							<td>description</td>
							<td>ugrp_desc</td>
							<td class="align_ctr">string</td>
							<td>A brief description of the user group.</td>
						</tr>
						<tr>
							<td>admin</td>
							<td>ugrp_admin</td>
							<td class="align_ctr">int</td>
							<td>Defined whether the user group is an 'admin' user group.</td>
						</tr>
					</tbody>
				</table>
								
				<h6>Example</h6>
<pre>
<span class="comment">// Defining the table, join and column names.</span>
$config['database']['user_group']['table'] = 'user_groups';
$config['database']['user_group']['join'] = 'user_groups.ugrp_id';
$config['database']['user_group']['columns']['id'] = 'ugrp_id';
</pre>
			</div>

			<a name="config_settings"></a>
			<div class="w100 frame">
				<h3 class="heading">User Group Config Settings</h3>
				
				<p>User group configuration settings used when handling data related to the user group table.</p>
				<hr/>

				<h6>Table and Column Setup</h6>
				<a href="#help" class="help_link">Help</a>
				<table>
					<thead>
						<tr>
							<th class="spacer_125">Config Name</th>
							<th class="spacer_75 align_ctr">Data Type</th>
							<th class="spacer_75 align_ctr">Default</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>default_group_id</td>
							<td class="align_ctr">int</td>
							<td class="align_ctr">1</td>
							<td>
								Set the id of the default group that new users will be added to unless otherwise specified.
							</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre><span class="comment">// Defining the default group id that is assigned to new registered users if not defined directly via
// a function.</span>
$config['settings']['default_group_id']	= 1;
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