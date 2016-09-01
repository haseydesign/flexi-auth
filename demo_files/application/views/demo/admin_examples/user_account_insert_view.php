<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo lang("user_registration_demo"); ?> | flexi auth | <?php echo lang("a_user_authentication_library"); ?></title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="register">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("register_account"); ?></h2>
				<p>User registation is a core requirement for any site that is to allow anonymous users to register for an account within the site.</p>
				<p>The data collected and saved during this process will always vary from site to site, but typically comes down to two primary types, data that is essential for user authentication and then user profile data.</p>
				<p>The essential user authentication data consists of information like a users email address and password that are required by users to securely log into their account. In addition to this, the flexi auth library can also automatically save and manage user data like IP addresses, last login dates etc.</p>
				<p>As for the user profile data, flexi auth allows you to save and relate whatever data you require to the users account, whether that data is all stored in the same table, or via multiple tables. The design of the database schema is up to you.</p>
			</div>
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("register_account"); ?></h2>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url()); ?>  	
					<fieldset>
						<legend><?php echo lang("personal_Details"); ?></legend>
						<ul>
							<li class="info_req">
								<label for="first_name"><?php echo lang("first_name"); ?>:</label>
								<input type="text" id="first_name" name="register_first_name" value="<?php echo set_value('register_first_name');?>"/>
							</li>
							<li class="info_req">
								<label for="last_name"><?php echo lang("last_name"); ?>:</label>
								<input type="text" id="last_name" name="register_last_name" value="<?php echo set_value('register_last_name');?>"/>
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend><?php echo lang("contact_details"); ?></legend>
						<ul>
							<li class="info_req">
								<label for="phone_number"><?php echo lang("phone_number"); ?>:</label>
								<input type="text" id="phone_number" name="register_phone_number" value="<?php echo set_value('register_phone_number');?>"/>
							</li>
							<li>
								<label for="newsletter"><?php echo lang("subscribe_to_newsletter"); ?>:</label>
								<input type="checkbox" id="newsletter" name="register_newsletter" value="1" <?php echo set_checkbox('register_newsletter',1);?>/>
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend><?php echo lang("login_details"); ?></legend>
						<ul>
							<li class="info_req">
								<label for="email_address">Email:</label>
								<input type="text" id="email_address" name="register_email_address" value="<?php echo set_value('register_email_address');?>" class="tooltip_trigger"
									title="This demo requires that upon registration, you will need to activate your account via clicking a link that is sent to your email address."
								/>
							</li>
							<li class="info_req">
								<label for="username"><?php echo lang("username"); ?>:</label>
								<input type="text" id="username" name="register_username" value="<?php echo set_value('register_username');?>" class="tooltip_trigger"
									title="Set a username that can be used to login with."
								/>
							</li>
                                                        <li class="info_req">
								<label for="group"><?php echo lang("group"); ?>:</label>
								<select id="group" name="update_group" class="tooltip_trigger"
									title="Set the users group, that can define them as an admin, public, moderator etc."
								>
								<?php foreach($groups as $group) { ?>
									<?php $default_group = ($group[$this->flexi_auth->db_column('user_group', 'id')] == $this->auth->auth_settings['default_group_id']) ? TRUE : FALSE;?>
									<option value="<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>" <?php echo set_select('update_group', $group[$this->flexi_auth->db_column('user_group', 'id')], $default_group);?>>
										<?php echo $group[$this->flexi_auth->db_column('user_group', 'name')];?>
									</option>
								<?php } ?>
								</select>
							</li>
							<li>							
								<small>
									<strong>For this demo, the following validation settings have been defined:</strong><br/>
									Password length must be more than <?php echo $this->flexi_auth->min_password_length(); ?> characters in length.<br/>Only alpha-numeric, dashes, underscores, periods and comma characters are allowed.
								</small>
							</li>
							<li class="info_req">
								<label for="password"><?php echo lang("password"); ?>:</label>
								<input type="password" id="password" name="register_password" value="<?php echo set_value('register_password');?>"/>
							</li>
							<li class="info_req">
								<label for="confirm_password"><?php echo lang("confirm_password"); ?>:</label>
								<input type="password" id="confirm_password" name="register_confirm_password" value="" <?php echo set_checkbox('register_confirm_password',1);?>/>
                                                        <li class="info_req">        
                                                            <label id="password_result" for="generate_password" style = "visibility: hidden;"><?php echo lang("new_password");?>: <span id="password_result_span"></span></label>
                                                            <button id="generate_password" type="button" onclick="generatePassword(8)" class="link_button large"> <?php echo lang("generate_password");?> </button>
                                                        </li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend><?php echo lang("register"); ?></legend>

						<ul>
							<li>
								<h6>Important Note</h6>
								<small>The data saved via this demo is available for anyone else using the demo to see, therefore, you may wish to only test this registration page via your local development environment. All data that is saved via this demo, is completely wiped every few hours.</small>
							</li>
                                                        <li class="info_req">
								<label for="activate_account"><?php echo lang("instant_activate_account"); ?>:</label>
                                                                <input <?php echo set_checkbox("activate_account",1,$this->auth->auth_settings['instant_activate_new_accounts'] ); ?> type="checkbox" id="activate_account" name="activate_account" value="1"/>
							</li>
							<li>
								<hr/>
								<label for="submit"><?php echo lang("register"); ?>:</label>
								<input type="submit" name="register_user" id="submit" value="<?php echo lang("submit"); ?>" class="link_button large"/>
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

</body>
</html>