<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo lang("manage_user_group_demo"); ?> | flexi auth | <?php echo lang("a_user_authentication_library"); ?></title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="manage_user_groups">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("admin_manage_user_group"); ?></h2>
				<p>The flexi auth library allows for unlimited custom user groups to be defined. Each user can then be assigned to a specific user group.</p>
				<p>Once user groups have been defined, access to specific pages or even specific sections of pages can be controlled by checking whether a user has permission to access a requested page.</p>
				<p>The default setup of this demo uses user groups and privileges to restrict the example public user from accessing the admin area, and the example moderator user from inserting, updating and deleting specific data within the admin area.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("manage_user_group"); ?></h2>
				<a href="<?php echo $base_url;?>auth_admin/insert_user_group"><?php echo lang("insert_new_user_group"); ?></a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					<table>
						<thead>
							<tr>
								<th class="spacer_150 tooltip_trigger" 
									title="The user group name.">
									<?php echo lang("group_name"); ?>
								</th>
								<th class="tooltip_trigger" 
									title="A short description of the purpose of the user group.">
									<?php echo lang("description"); ?>
								</th>
								<th class="spacer_100 align_ctr tooltip_trigger" 
									title="Indicates whether the group is considered an 'Admin' group.<br/> Note: Privileges can still be set seperately.">
									<?php echo lang("is_admin_group"); ?>
								</th>
								<th class="spacer_100 align_ctr tooltip_trigger"
									title="Manage the access privileges of user groups.">
									<?php echo lang("user_group_privileges"); ?>
								</th>
								<th class="spacer_100 align_ctr tooltip_trigger" 
									title="If checked, the row will be deleted upon the form being updated.">
									<?php echo lang("delete"); ?>
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($user_groups as $group) { ?>
							<tr>
								<td>
									<a href="<?php echo $base_url;?>auth_admin/update_user_group/<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>">
										<?php echo $group[$this->flexi_auth->db_column('user_group', 'name')];?>
									</a>
								</td>
								<td><?php echo $group[$this->flexi_auth->db_column('user_group', 'description')];?></td>
								<td class="align_ctr"><?php echo ($group[$this->flexi_auth->db_column('user_group', 'admin')] == 1) ? "Yes" : "No";?></td>
								<td class="align_ctr">
									<a href="<?php echo $base_url.'auth_admin/update_group_privileges/'.$group[$this->flexi_auth->db_column('user_group', 'id')];?>"><?php echo lang("manage"); ?></a>
								</td>
								<td class="align_ctr">
								<?php if ($this->flexi_auth->is_privileged('Delete User Groups')) { ?>
									<input type="checkbox" name="delete_group[<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>]" value="1"/>
								<?php } else { ?>
									<input type="checkbox" disabled="disabled"/>
									<small><?php echo lang("not_privileged"); ?></small>
									<input type="hidden" name="delete_group[<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>]" value="0"/>
								<?php } ?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<td colspan="5">
								<?php $disable = (! $this->flexi_auth->is_privileged('Update User Groups') && ! $this->flexi_auth->is_privileged('Delete User Groups')) ? 'disabled="disabled"' : NULL;?>
								<input type="submit" name="submit" value="<?php echo lang("delete_checked_user_groups"); ?>" class="link_button large" <?php echo $disable; ?>/>
							</td>
						</tfoot>
					</table>
					
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