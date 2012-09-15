<script>
	// Hide content onload, prevents JS flicker
	document.body.className += ' js-enabled';
</script>

<div id="header_wrap">
	<div id="header">
		<h1 id="logo">
			<a href="<?php echo $base_url; ?>" title="flexi auth">
				<img src="<?php echo $includes_dir;?>images/logo.png" alt="flexi auth"/>
				<span class="img_rep">flexi auth</span> 
			</a>
		</h1>
		 
		<ul id="nav">
			<li>
				<a href="<?php echo $base_url;?>">Home</a>
			</li>
			<li>
				<a href="<?php echo $base_url;?>auth_lite/features">Features</a>
			</li>
			<li>
				<a href="<?php echo $base_url;?>auth_lite/demo">Demo</a>
			</li>
			<li>
				<a href="<?php echo $base_url;?>auth_lite/user_guide">User Guide</a>
			</li>
			<li>
				<a href="<?php echo $base_url;?>auth_lite/support">Support</a>
			</li>
			<li>
				<a href="https://github.com/haseydesign/flexi-auth">Download</a>
			</li>
		</ul> 

		<a href="http://haseydesign.com/flexi-cart/" id="flexi_cart_ribbon">
			<div class="ribbon_text">			
				<p>
					Need a New<br/>
					CodeIgniter<br/>
					Shopping Cart<br/>
					Library?
				</p>
				<h6>flexi cart</h6>
			</div>
		</a>
	</div>
</div>