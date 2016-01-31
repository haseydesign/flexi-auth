<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo lang("manage_address_demo"); ?> | flexi auth | <?php echo lang("a_user_authentication_library"); ?></title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="manage_address_book">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("public_manage_address_book"); ?></h2>
				<p>The flexi auth library allows multiple custom user data tables to be related to the libraries user account table.</p>
				<p>As an example of this, this demo includes a user address book that can be used by each user to save addresses and relate them to their account.</p>
				<p>This page lists all addresses that are related to the current logged in user.</p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2><?php echo lang("manage_address_book"); ?></h2>
				<a href="<?php echo $base_url;?>auth_public/insert_address"><?php echo lang("insert_new_address"); ?></a>

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
									title="An alias to reference the address by.">
									Alias
								</th>
								<th><?php echo lang("recipient"); ?></th>
								<th><?php echo lang("company"); ?></th>
								<th><?php echo lang("postal_code"); ?></th>
								<th class="spacer_100 align_ctr tooltip_trigger" 
									title="If checked, the row will be deleted upon the form being updated.">
									<?php echo lang("delete"); ?>
								</th>
							</tr>
						</thead>
						<?php 
							if (!empty($addresses)) {
								foreach ($addresses as $address) {
						?>
						<tbody>
							<tr>
								<td>
									<a href="<?php echo $base_url;?>auth_public/update_address/<?php echo $address['uadd_id'];?>/"><?php echo $address['uadd_alias'];?></a>
								</td>
								<td><?php echo $address['uadd_recipient'];?></td>
								<td><?php echo $address['uadd_company'];?></td>
								<td><?php echo $address['uadd_post_code'];?></td>
								<td class="align_ctr">
									<input type="checkbox" name="delete_address[<?php echo $address['uadd_id'];?>]" value="1"/>
								</td>
							</tr>
						</tbody>
						<?php } ?>
						<tfoot>
							<tr>
								<td colspan="5">
									<input type="submit" name="update_addresses" value="<?php echo lang("delete_checked_addresses"); ?>" class="link_button large"/>
								</td>
							</tr>
						</tfoot>
						<?php } else { ?>
						<tbody>
							<tr>
								<td colspan="5">
									<p><?php echo lang("there_are_no_addresses"); ?></p>
								</td>
							</tr>
						</tbody>
						<?php } ?>
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