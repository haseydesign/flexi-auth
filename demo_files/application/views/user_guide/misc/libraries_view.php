<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Libraries | User Guide | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="The user guide for flexi auths libraries."/> 
	<meta name="keywords" content="library, libraries, user guide, flexi auth, user authentication, codeigniter"/>
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
				<h1>User Guide | Libraries</h1>
				<p>flexi auth is split into two different libraries each with an individual purpose.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			
			<div class="anchor_nav">
				<h6>Libraries</h6>
				<p>
					<a href="#lite_library">Lite Library</a> | <a href="#standard_library">Standard Library</a>
				</p>
			</div>

			<a name="lite_library"></a>
			<div class="w100 frame">
				<h3 class="heading">Lite Library</h3>

				<p>The lite library contains functions that typically read data from the auth session or database, and barring status and error messages, it does not set any data to the auth session or database.</p>
				<p>It is called the 'lite' library as it used by the standard library, but to save memory usage, can be instantiated by itself for pages that do not need the functionality of the full standard library.</p>
				<p>When loaded by itself, it typically uses approximately 350kb of memory which is around 75% lighter than when loaded via the standard library.</p>
				<p>
					The typical functions available from the lite library can return any data that is set in the auth session data, this includes the users id, email/username, user groups and user privilege data.<br/>
					Additionally, database queries can be run to return data for any user within the database.
				</p>
				<hr/>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Loading the lite library.</span>
$this->load->library('flexi_auth_lite');
</pre>
<pre>
<span class="comment">// Loading the lite library using a different object name.
// When loading the lite library, it may be more convenient to rename the library object to 'flexi_auth'.</span>
$this->load->library('flexi_auth_lite', FALSE, 'flexi_auth');
</pre>
			</div>

			<a name="standard_library"></a>
			<div class="w100 frame">
				<h3 class="heading">Standard Library</h3>
				
				<p>The standard library contains the core functionality of the library, with functions to insert, update and delete data from the database tables.</p>
				<p>The standard library automatically loads the lite library when instantiated, so all functions that are available in the lite library, are also available when the standard library has been loaded.</p>
				<p>When loaded, the standard library typically uses approximately 1500kb of memory. To minimize the memory usage on the server, it is recommended that the standard library should only be loaded on pages that are actively using functions within the standard library. Note that the auth session data is not lost if a library is not loaded.</p>
				<p>Note: Unlike with the lite library, do NOT rename the library object to any other name when loading this library as it will cause conflicts in some internal functions.</p>
				<hr/>
				
				<h6>Examples</h6>
<pre>
<span class="comment">// Loading the standard library.</span>
$this->load->library('flexi_auth');
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