<html>
<body>
	<h1>Change of Email Address from <?php echo $current_email;?> to <?php echo $new_email;?></h1>
	<p>Please click this link to <?php echo anchor('auth_public/update_email/'.$user_id.'/'.$update_email_token, 'confirm changing your email to this address');?>.</p>
</body>
</html>