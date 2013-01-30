<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Privilege Configuration | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for configuring user privileges in flexi auth."/> 
	<meta name="keywords" content="user privilege configuration, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | User Privilege Configuration</h1>
				<p>The key concept of the flexi auth library is to give the developer a toolbox of functions that they can use to build a user authentication system matching the custom specifications required by their site.</p>
				<p>One of the ways that the library enhances the customisation of the authentication system is by allowing many of the internal library settings to be defined by the developer via the libraries config file.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
					
			<h2>User Privilege Configuration</h2>
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_index">User Privilege Index</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_get_data">Get User Privilege Data</a> |
			<a href="<?php echo $base_url; ?>user_guide/user_privilege_set_data">Set User Privilege Data</a>

			<div class="anchor_nav">
				<h6>Config Setup Information</h6>
				<p>
					<a href="#db_schema_diagram">Table Schema Diagram</a>
				</p>
				<h6>Table and Config File Settings</h6>
				<p>
					<a href="#user_privilege_table">User Privilege Table</a> | 
					<a href="#user_privilege_users_table">User Privilege Users Table</a> |
					<a href="#user_privilege_groups_table">User Privilege Groups Table</a>
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
						</ul>
					</p>
					<hr/>
					
					<h6>Config File Location</h6>
					<p>The config file is located in CodeIgniters 'config' folder and is named 'flexi_auth.php'.</p>
				</div>
			</div>

			<a name="db_schema_diagram"></a>
			<div class="w100 frame">
				<h3 class="heading">Schema Diagram : User Privilege Table</h3>
				<div class="frame_note">
					<p>A database table schema diagram, showing how the user privilege table is related to the primary user account table.</p>
					<p>Note: Table and columns names are defined using their config names referenced within the config file. The names within brackets are the default demo names.</p>
				</div>
				<img src="<?php echo $includes_dir; ?>images/db_diagrams/user_privilege_schema.png" class="db_schema_diagram"/>
			</div>

			<a name="user_privilege_table"></a>
			<div class="w100 frame">
				<h3 class="heading">User Privilege Table</h3>
				
				<p>
					The user privilege table is used to allocate role privileges to users.<br/>
					Whilst very similar to user groups, multiple privileges can be assigned to a user, the users privilege (and group if desired) can then be looked up to verify if a user has permission to perform an action or access specific data.<br/>
					For example, 2 users could be in an 'Moderator' group, 1 of the users could be allowed to update data, whilst the other could only view the data.
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
							<td>user_privileges</td>
							<td class="align_ctr">-</td>
							<td>The tables name.</td>
						</tr>
						<tr>
							<td>id</td>
							<td>upriv_id</td>
							<td class="align_ctr">int</td>
							<td>The tables primary key.</td>
						</tr>
						<tr>
							<td>name</td>
							<td>upriv_name</td>
							<td class="align_ctr">string</td>
							<td>The name of the privilege.</td>
						</tr>
						<tr>
							<td>description</td>
							<td>upriv_desc</td>
							<td class="align_ctr">string</td>
							<td>A brief description of the privilege.</td>
						</tr>
					</tbody>
				</table>
								
				<h6>Example</h6>
<pre>
<span class="comment">// Defining the table and column names.</span>
$config['database']['user_privileges']['table'] = 'user_privileges';
$config['database']['user_privileges']['columns']['id'] = 'upriv_id';
</pre>
			</div>

			<a name="user_privilege_users_table"></a>
			<div class="w100 frame">
				<h3 class="heading">User Privilege Users Table</h3>
				
				<p>
					The user privilege user table is used to assign privileges to users. Multiple privileges can be assigned to a user.
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
							<td>user_privilege_users</td>
							<td class="align_ctr">-</td>
							<td>The tables name.</td>
						</tr>
						<tr>
							<td>id</td>
							<td>upriv_users_id</td>
							<td class="align_ctr">int</td>
							<td>The tables primary key.</td>
						</tr>
						<tr>
							<td>user_id</td>
							<td>upriv_users_uacc_fk</td>
							<td class="align_ctr">int</td>
							<td>The foreign key to the user account table.</td>
						</tr>
						<tr>
							<td>privilege_id</td>
							<td>upriv_users_upriv_fk</td>
							<td class="align_ctr">int</td>
							<td>The foreign key to the user privilege table.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Defining the table and column names.</span>
$config['database']['user_privilege_users']['table'] = 'user_privilege_users';
$config['database']['user_privilege_users']['columns']['id'] = 'upriv_users_id';
</pre>
			</div>
	
			<a name="user_privilege_groups_table"></a>
			<div class="w100 frame">
				<h3 class="heading">User Privilege Groups Table</h3>
				
				<p>
					The user privilege group table is used to assign privileges to user groups. Multiple privileges can be assigned to a user group.
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
							<td>user_privilege_groups</td>
							<td class="align_ctr">-</td>
							<td>The tables name.</td>
						</tr>
						<tr>
							<td>id</td>
							<td>upriv_groups_id</td>
							<td class="align_ctr">int</td>
							<td>The tables primary key.</td>
						</tr>
						<tr>
							<td>group_id</td>
							<td>upriv_groups_ugrp_fk</td>
							<td class="align_ctr">int</td>
							<td>The foreign key to the user group table.</td>
						</tr>
						<tr>
							<td>privilege_id</td>
							<td>upriv_groups_upriv_fk</td>
							<td class="align_ctr">int</td>
							<td>The foreign key to the user privilege table.</td>
						</tr>
					</tbody>
				</table>
				
				<h6>Example</h6>
<pre>
<span class="comment">// Defining the table and column names.</span>
$config['database']['user_privilege_groups']['table'] = 'user_privilege_groups';
$config['database']['user_privilege_groups']['columns']['id'] = 'upriv_groups_id';
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