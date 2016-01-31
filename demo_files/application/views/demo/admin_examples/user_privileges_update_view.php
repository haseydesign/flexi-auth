<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo lang("update_user_privileges_demo"); ?> | flexi auth | <?php echo lang("a_user_authentication_library"); ?></title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="update_user_privileges">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("admin_update_user_privilege"); ?></h2>
				<p>The flexi auth library allows for unlimited custom privileges to be defined. The privileges can then be assigned to user groups or users individually.</p>
				<p>Once privileges have been defined, access to specific pages or even specific sections of pages can be controlled by checking whether a user has permission to access a requested page.</p>
				<p>The default setup of this demo uses user groups and privileges to restrict the example public user from accessing the admin area, and the example moderator user from inserting, updating and deleting specific data within the admin area.</p>
                <h3 class="toggle">&raquo; View Current Privilege Sources</h3>
                <div class="hide_toggle">
	                <p>The flexi auth config. setting '<em>privilege_sources</em>' defines whether user privileges should be determined by individual privileges assigned per user, or via privileges assigned to a users user group. 
	                <p>According to the current settings:</p>
	                <ul class="bullet">
	                <?php
	                    if (in_array('user', $privilege_sources))
	                    {
	                        echo '<li><span class="highlight_green">User privileges are considered.</span></li>';
	                    }
	                    else
	                    {
	                        echo '<li><span class="highlight_orange">User privileges are NOT considered.</span></li>';
	                    }
	                    
	                    if (in_array('group', $privilege_sources))
	                    {
	                        echo '<li><span class="highlight_green">Group privileges are considered.</span></li>';
	                    }
	                    else
	                    {
	                        echo '<li><span class="highlight_orange">User Group privileges are NOT considered.</span></li>';
	                    }
	                ?>
	                </ul>
				</div>		
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("update_user_privileges_of"); ?> '<?php echo $user['upro_first_name'].' '.$user['upro_last_name']; ?>', Member of Group '<?php echo $user['ugrp_name']; ?>'</h2>
				<a href="<?php echo $base_url;?>auth_admin/manage_user_accounts">Manage User Accounts</a> | 
				<a href="<?php echo $base_url;?>auth_admin/update_user_account/<?php echo $user['upro_uacc_fk']; ?>">Update Users Account</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
			
				<?php echo form_open(current_url());	?>  	
					<table>
						<thead>
							<tr>
								<th class="tooltip_trigger"
									title="The name of the privilege."/>
									<?php echo lang("privilege_name"); ?>
								</th>
								<th class="tooltip_trigger"
									title="A short description of the purpose of the privilege."/>
									<?php echo lang("description"); ?>
								</th>
								<th class="spacer_150 align_ctr tooltip_trigger"
									title="If checked, the user will be granted the privilege, regardless of whether their user group has the privilege."/>
									<?php echo lang("user_has_individual_privilege"); ?>
								</th>
								<th class="spacer_150 align_ctr tooltip_trigger"
									title="Indicates whether the privilege has been assigned to the user via the privileges defined for their user group."/>
									<?php echo lang("has_privilege_from_user_group"); ?>
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($privileges as $privilege) { ?>
							<tr>
								<td>
									<input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][id]" value="<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>"/>
									<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'name')];?>
								</td>
								<td><?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'description')];?></td>
								<td class="align_ctr">
									<?php 
										// Define form input values.
										$current_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $user_privileges)) ? 1 : 0; 
										$new_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $user_privileges)) ? 'checked="checked"' : NULL;
									?>
									<input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>][current_status]" value="<?php echo $current_status ?>"/>
									<input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>][new_status]" value="0"/>
									<input type="checkbox" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>][new_status]" value="1" <?php echo $new_status ?>/>
								</td>
                                <td class="align_ctr">
									<?php echo (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $group_privileges) ? 'Yes' : 'No'); ?>
                                </td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4">
									<input type="submit" name="update_user_privilege" value="<?php echo lang("update_user_privilege"); ?>" class="link_button large"/>
								</td>
							</tr>
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