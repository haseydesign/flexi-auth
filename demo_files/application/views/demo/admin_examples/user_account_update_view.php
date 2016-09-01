<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo lang("update_user_accounts_demo"); ?> | flexi auth | <?php echo lang("a_user_authentication_library"); ?></title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="update_user_account">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("admin_update_user_account"); ?></h2>
				<p>The flexi auth library includes functions to aid the management of user accounts by site administrators.</p>
				<p>This page is similar to the page used by users updating their own account details, but has the additional option for the admininstrator to update the users user group.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("update_account_of"); ?> <?php echo $user['upro_first_name'].' '.$user['upro_last_name']; ?></h2>
				<a href="<?php echo $base_url;?>auth_admin/manage_user_accounts"><?php echo lang("manage_user_accounts"); ?></a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());?>  	
					<fieldset>
						<legend>Personal Details</legend>
						<ul>
							<li class="info_req">
								<label for="first_name"><?php echo lang("first_name"); ?>:</label>
								<input type="text" id="first_name" name="update_first_name" value="<?php echo set_value('update_first_name',$user['upro_first_name']);?>"/>
							</li>
							<li class="info_req">
								<label for="last_name"><?php echo lang("last_name"); ?>:</label>
								<input type="text" id="last_name" name="update_last_name" value="<?php echo set_value('update_last_name',$user['upro_last_name']);?>"/>
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend>Contact Details</legend>
						<ul>
							<li class="info_req">
								<label for="phone_number"><?php echo lang("phone_number"); ?>:</label>
								<input type="text" id="phone_number" name="update_phone_number" value="<?php echo set_value('update_phone_number',$user['upro_phone']);?>"/>
							</li>
							<li>
								<?php $newsletter = ($user['upro_newsletter'] == 1) ;?>
								<label for="newsletter"><?php echo lang("subscribe_to_newsletter"); ?>:</label>
								<input type="checkbox" id="newsletter" name="update_newsletter" value="1" <?php echo set_checkbox('update_newsletter','1',$newsletter); ?>/>
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend><?php echo lang("login_details"); ?></legend>
						<ul>
							<li class="info_req">
								<label for="email_address">Email:</label>
								<input type="text" id="email_address" name="update_email_address" value="<?php echo set_value('update_email_address',$user[$this->flexi_auth->db_column('user_acc', 'email')]);?>" class="tooltip_trigger"
									title="Set the users email address that they can use to login with."
								/>
							</li>
							<li>
								<label for="username"><?php echo lang("username"); ?>:</label>
								<input type="text" id="username" name="update_username" value="<?php echo set_value('update_username',$user[$this->flexi_auth->db_column('user_acc', 'username')]);?>" class="tooltip_trigger"
									title="Set the users username that they can use to login with."
								/>
							</li>
                                                        <li>
                                                                <label for="new_password"><?php echo lang("new_password"); ?>:</label>
                                                                <input  type="text" id="new_password" name="new_password" value="<?php echo set_value('new_password');?>"/>
                                                        </li>
							<li class="info_req">
								<label for="group"><?php echo lang("group"); ?>:</label>
								<select id="group" name="update_group" class="tooltip_trigger"
									title="Set the users group, that can define them as an admin, public, moderator etc."
								>
								<?php foreach($groups as $group) { ?>
									<?php $user_group = ($group[$this->flexi_auth->db_column('user_group', 'id')] == $user[$this->flexi_auth->db_column('user_acc', 'group_id')]) ? TRUE : FALSE;?>
									<option value="<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>" <?php echo set_select('update_group', $group[$this->flexi_auth->db_column('user_group', 'id')], $user_group);?>>
										<?php echo $group[$this->flexi_auth->db_column('user_group', 'name')];?>
									</option>
								<?php } ?>
								</select>
							</li>
							<li>
								<label><?php echo lang("privileges"); ?>:</label>
								<a href="<?php echo $base_url.'auth_admin/update_user_privileges/'.$user[$this->flexi_auth->db_column('user_acc', 'id')];?>" class="tooltip_trigger"
									title="Manage a users access privileges."><?php echo lang("manage_user_privileges"); ?></a>
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend><?php echo lang("update_account"); ?></legend>
						<ul>
							<li>
								<label for="submit"><?php echo lang("update_account"); ?>:</label>
								<input type="submit" name="update_users_account" id="submit" value="<?php echo lang("submit"); ?>" class="link_button large"/>
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