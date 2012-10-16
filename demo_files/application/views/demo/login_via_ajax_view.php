<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Login via Ajax Demo | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="login">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2>User Login via Ajax</h2>
				<p>This login example is a simplified version of the <a href="<?php echo $base_url; ?>auth/">standard login method</a>, that instead uses ajax to submit a users credentials.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2>User Login via Ajax</h2>

				<div id="message" style="display:none;">
					<p class="error_msg">Your submitted login details are incorrect.</p>
				</div>
				
				<?php echo form_open(current_url());?>  	
					<fieldset class="w100">
						<ul>
							<li>
								<label for="identity">Email or Username:</label>
								<input type="text" id="identity" name="login_identity" value="<?php echo set_value('login_identity', 'admin@admin.com');?>" class="tooltip_parent"/>
								<span class="tooltip width_400">
									<h6>Example Users</h6>
									<p>There are 3 example users setup, login to each account using the following details.</p>
									<table>
										<thead>
											<tr>
												<th>Email</th>
												<th>Username</th>
												<th>Password</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>admin@admin.com</td>
												<td>admin</td>
												<td>password123</td>
											</tr>
											<tr>
												<td>moderator@moderator.com</td>
												<td>moderator</td>
												<td>password123</td>
											</tr>
											<tr>
												<td>public@public.com</td>
												<td>public</td>
												<td>password123</td>
											</tr>
										</tbody>
									</table>
								</span>
							</li>
							<li>
								<label for="password">Password:</label>
								<input type="password" id="password" name="login_password" value="<?php echo set_value('login_password', 'password123');?>"/>
							</li>
							<li>
								<label for="remember_me">Remember Me:</label>
								<input type="checkbox" id="remember_me" name="remember_me" value="1" <?php echo set_checkbox('remember_me', 1); ?>/>
							</li>
							<li>
								<label for="submit">Login:</label>
								<input type="submit" name="login_user" id="submit" value="Submit" class="link_button large"/>
							</li>
						</ul>
					</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>	
	
	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 
<script>
$(function() 
{
	$('form').submit(function(event)
	{
		event.preventDefault();

		// Get the url that the ajax form data is to be submitted to.
		var submit_url = $(this).attr('action');

		// Get the form data.
		var $form_inputs = $(this).find(':input');
		var form_data = {};
		$form_inputs.each(function() 
		{
			form_data[this.name] = $(this).val();
		});

		$.ajax(
		{
			url: submit_url,
			type: 'POST',
			data: form_data,
			success:function(data)
			{
				// If the returned login value successul.
				if (data)
				{
					// Empty the login form content and replace it will a successful login message.
					$('fieldset').empty().append('<h1>Login via Ajax was successful!</h1><p>Refreshing this page would now redirect you away from the login page to the user dashboard.</p>');
					
					// Hide any error message that may be showing.
					$('#message').hide();
				}
				// Else the login credentials were invalid.
				else
				{
					// Show an error message stating the users login credentials were invalid.
					$('#message').show();
				}
			}
		});
	})
});
</script>

</body>
</html>