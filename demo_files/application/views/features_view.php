<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Features | flexi auth | A User Authentication Library for CodeIgniter</title>
	<meta name="description" content="A summary of the features flexi auth has to offer."/> 
	<meta name="keywords" content="features, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="home">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header'); ?> 

	<!-- Intro Content -->
	<div class="content_wrap nav_bg">
		<div id="sub_nav_wrap" class="content">
			<ul id="sub_nav">
				<li>
					<a href="<?php echo $base_url; ?>auth_lite/features/#feature_list">The Feature List</a>
				</li>
				<li>
					<a href="<?php echo $base_url; ?>auth_lite/features/#whats_not_included">What's Not Included</a>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="content_wrap intro_bg">
		<div class="content clearfix">
			<div class="intro_text">
				<h1>Features of flexi cart</h1>
				<p>flexi auth is a free user authentication (User login) library for use with the <a href="http://ellislab.com" target="_blank">CodeIgniter</a> 2.0+ framework.</p>
				<p>
					The flexi auth library initially started out as a modified version of the popular <a href="http://benedmunds.com/ion_auth/" target="_blank">Ion Auth</a> library. 
					As the original library was tweaked with feature after feature being added, the original code base had transformed into a new library all of its own.
				</p>
				<p>
					Below is a compiled list of the core features included within the flexi auth library.
				</p>
			</div>		
		</div>
	</div>

	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">

			<a name="feature_list"></a>
			<h3>The Feature List</h3>
			<div class="w100 frame">
				<h6>Flexibility and Customisation</h6>
				<div class="frame_note">
					<p>The features in flexi auth are designed to be modularised, so that you can use bits and pieces of different features without needing to setup other features that are not required.</p>
					<p>If you want a login system that requires users to activate their account via an email, but to allow them a 30 minute access period immediately upon registration - just use and define the functions and settings you need.</p>
					<p>If the default session/table names clash with your existing setup, or maybe simply don't match your coding conventions, then simply change just one setting via the libraries config file.</p>
					<p>The idea of flexi auth is to let you build the site, the way you want it built, rather than being confined to a one path design flow.</p>
				</div>
				
				<h6>Database Structure</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>All tables and column names are renamable via just one config file setting to match whatever name coding convention you prefer.</li>
						<li>The library consists of only 5 tables to provide every feature within flexi auth.</li>
						<li>Unlimited additional custom tables can be added and related to the core library tables, allowing you to capture whatever data you require.</li>
						<li>The 5 core library tables can be modified with the addition of new columns that can then be managed via library functions.</li>
						<li>The data type for storing dates and times within the database can be defined via the config file.</li>
						<li>Functions that modify multiple rows of data across multiple tables use SQL transactions to rollback any changes that could be interrupted by an error halfway through the action of a function.</li>
					</ul>
				</div>
				
				<h6>User Management</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>Users can be assigned user groups and privileges that allow/restrict them from performing custom actions throughout the site.</li>
						<li>
							<p>If a user updates their email address, functions within the library can be used to require that the new email address must be validated by the user clicking a link sent to the new email address, before it is activated.</p>
							<p>This method prevents misspelt email addresses that would otherwise prevent future login.</p>
						</li>
						<li>Users can be primarily identified within the library via either their email address of a unique username.</li>
						<li>The library includes a user search function that can look for a match in user table columns defined via the libraries config file.</li>
						<li>Users can be suspended from logging in to their account, without deleting any of their records or data.</li>
						<li>Users can be prevented from logging in to their account until after a defined date and time.</li>
						<li>The dates and times of account creations, and login attempts are automatically managed by library functions.</li>
						<li>Users can change their password without needing to log the user out.</li>
					</ul>
				</div>
				
				<h6>User Registration</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>The minimum required length and valid characters of a password can be defined using a regular expression (Regex) set via the config file.</li>
						<li>Upon registration, new user accounts can be either automatically activated, sent an account activation email or suspended pending review by an admin.</li>
						<li>Newly registered users that are sent an account activation email can be given temporary instant login access for a defined period of time. Once the time period has elapsed, the user must activate their account prior to future logins</li>
						<li>Allow users to login instantly on registration, but require them to activate their account before a defined timed otherwise they will be unable to login.</li>
						<li>If the library is setup to require users setting a username, the config setting can be defined to suffix an auto incremented number to any duplicate usernames rather than warning the user of an existing username.</li>
						<li>Account activation emails can be easily resent to users who have not received or deleted the original sent to them upon registration.</li>
					</ul>
				</div>

				<h6>User Login Methods</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>The login method is compatible with logging in users via either their email address, username, or via both.</li>
						<li>The login method includes a simple out-of-the-box 'Remember me' feature via defining a boolean parameter to remember a users login credentials upon a successful login.</li>
					</ul>
				</div>

				<h6>CAPTCHAs</h6>
				<div class="frame_note">
					<p>flexi auth includes two different CAPTCHA functions, the popular Google reCAPTCHA and a basic math based question and answer CAPTCHA.</p>
					<p>
						Using reCAPTCHA requires each site to apply for a free API key from Google before the reCAPTCHA can be deployed.<br/>
						The math based Q&amp;A CAPTCHA is custom to the flexi auth library and asks simple addition and subtraction questions. 
					</p>
					<p>
						The CAPTCHAs would typically be used during registration or login, but implementation of them is completely optional.<br/>
					  	The library further includes other functions that can be used to detect when to deploy the CAPTCHA based on specific IP addresses that have been related to numerous failed login attempts.
					</p>
				</div>
				
				<h6>Forgotten Passwords</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>Forgotten passwords can either be reset by generating a new random password and emailing it to the user, or by allowing the user to manually reset the password after click a verifcation link that is emailed to them.</li>
						<li>If a verification email is sent to a user that has forgotten their password, the verification token can be set to expire after a defined time limit.</li>
					</ul>
				</div>
				
				<h6>Password Security</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>All passwords are hashed via the popular password hashing library <a href="http://www.openwall.com/phpass/" target="_blank">PHPASS</a>.</li>
						<li>The library additionally allows for two password salts to be defined, a static salt defined via the libraries config file, and a unique database salt assigned to each user within the database.</li>
						<li>All failed login attempts per user are tracked, if user fails a defined number of attempts, an option is available to set a short time limit ban until the user can attempt to login again.</li>
					</ul>
				</div>

				<h6>General Security</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>
							The libraries login feature is based on a technique put forward by two articles by Charles Miller and Barry Jaspan.<br/>
							<a href="http://fishbowl.pastiche.org/2004/01/19/persistent_login_cookie_best_practice/">Charles Miller's 'Best Practices' article.</a><br/>
							<a href="http://jaspan.com/improved_persistent_login_cookie_best_practice">Barry Jaspan's Improved Best Practices</a>.
						</li>
						<li>The login tokens outlined via the above articles are saved in a cookie that can be encrypted using CodeIgniters config settings.</li>
						<li>
							A config setting can be defined to destroy a users login session when they close their browser.<br/>
						 	Alternatively, a time limit can be defined that the user will be able to revisit the site using the same login credentials.
						 </li>
						<li>
							<p>A config setting can be defined to instruct the library to automatically validate a users login credentials are still valid on every page load.</p>
							<p>If a user is logged into the same account on multiple computers, if they chose to logout of all session via one computer, then a user on the other computer will not be able to continue browsing the site until they re-login.</p>
							<p>Additionally, if an administrator was to suspend an account whilst the user was on the site, the users credentials would be removed the next time they refreshed the page.</p>
						</li>
						<li>When a user logs into their account, they are issued with a login expiry time. If required, this expiry time can be extended upon every page load.</li>
						<li>Upon every login attempt, the users IP address is tracked for successful and failed login attempts. This data can then be used to deploy additional security techniques like CAPTCHAS.</li>
					</ul>
				</div>
				
				<h6>Miscellaneous</h6>
				<div class="frame_note">
					<ul class="bullet">
						<li>The library includes fully customisable email templates for account activation, forgotten password, new password and validate updated email.</li>
						<li>Multilingual and customisable status and error messages.</li>
					</ul>
				</div>
				
				<h6>Two Different Purpose Libraries</h6>
				<div class="frame_note">
					<p>It's likely that the majority of pages on your site will not require the complete functionality of the flexi auth library, which would result in wasting memory resources loading parts of the library that would not be used.</p>
					<p>To solve this, the functionality of flexi auth is split into two different libraries, each with a different intended purpose.</p>
					<hr>
					<ul class="bullet">
						<li>
							<p>The 'lite library' is primarily used for three purposes, validating a users login credentials and permissions, getting a users account data or managing status and error messages.</p>
							<p>These are core features that are most likely to be required on most pages throughout your site, therefore the 'lite library' is designed to be small enough to include on all pages.</p>
						</li>
						<li>
							<p>The 'standard library' is used for functions that tend to have a single purpose, as such as user login, deploying CAPTCHAs and sending forgotten password emails.</p>
							<p>These features are likely to only be required by specific pages, and so the library should only be included when needed.</p>
							<p>Note: When including the 'standard library', it extends the 'lite library', so all features within both libraries are then available.</p>
						</li>
					</ul>
				</div>				
			</div>	
				
			<h3>What's Not Included</h3>
			<a name="whats_not_included"></a>
			<div class="w100 frame">
				<div class="frame_note">
					<p>Whilst flexi auth offers a good ground base of features for a fully fledged user authentication system, here is a list of some of the more notable features that are not included within the library.</p>
				</div>

				<h6>Third Party API Logins</h6>
				<div class="frame_note">
					<p>The flexi auth library does not include any features to login via a third party api like Facebook, Twitter and OpenID.</p>
				</div>
			</div>

		</div>	
	</div>
</div>

<!-- Footer -->  
<?php $this->load->view('includes/footer'); ?> 

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

</body>
</html>