<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Name: Flexi Auth Lang - English
* 
* Author: 
* Rob Hussey
* flexiauth@haseydesign.com
* haseydesign.com/flexi-auth
*
* Updated by: Reconix
*
* Released: 13/09/2012
* Update : 31.08.2016
*
* Description:
* English language file for Flexi Auth
*
* Requirements: PHP5 and Codeigniter 3.0+
*/

// Account Creation
$lang['account_creation_successful']					= 'Your account has successfully been created.';
$lang['account_creation_unsuccessful']					= 'Unable to create account.';
$lang['account_creation_duplicate_email']			= 'An account with this email address already exists.'; 
$lang['account_creation_duplicate_username']		= 'An account with this username already exists.'; 
$lang['account_creation_duplicate_identity'] 		= 'An account with this identity already exists.';
$lang['account_creation_insufficient_data']			= 'Insufficient data to create an account. Ensure a valid identity and password are submitted.';

// Password
$lang['password_invalid']										= 'The %s field is invalid.';
$lang['password_change_successful'] 	 	 			= 'Password has successfully been changed.';
$lang['password_change_unsuccessful'] 	  	 		= 'Your submitted password does not match our records.';
$lang['password_token_invalid']  							= 'Your submitted password token is invalid or has expired.'; 
$lang['email_new_password_successful']				= 'A new password has been emailed to you.';
$lang['email_forgot_password_successful']	 		= 'An email has been sent to reset your password.';
$lang['email_forgot_password_unsuccessful']  		= 'Unable to reset password.'; 

// Activation
$lang['activate_successful']									= 'Account has been activated.';
$lang['activate_unsuccessful']								= 'Unable to activate account.';
$lang['deactivate_successful']								= 'Account has been deactivated.';
$lang['deactivate_unsuccessful']							= 'Unable to deactivate account.';
$lang['activation_email_successful'] 	 				= 'An activation email has been sent.';
$lang['activation_email_unsuccessful']  	 			= 'Unable to send activation email.';
$lang['account_requires_activation'] 					= 'Your account needs to be activated via email.';
$lang['account_already_activated'] 						= 'Your account has already been activated.';
$lang['email_activation_email_successful']			= 'An email has been sent to activate your new email address.';
$lang['email_activation_email_unsuccessful']		= 'Unable to send an email to activate your new email address.';

// Login / Logout
$lang['login_successful']										= 'You have been successfully logged in.';
$lang['login_unsuccessful']									= 'Your submitted login details are incorrect.';
$lang['logout_successful']										= 'You have been successfully logged out.';
$lang['login_details_invalid'] 								= 'Your login details are invalid.';
$lang['captcha_answer_invalid'] 							= 'CAPTCHA answer is incorrect.';
$lang['login_attempts_exceeded'] 						= 'The maximum login attempts have been exceeded, please wait a few moments before trying again.';
$lang['login_session_expired']								= 'Your login session has expired.';
$lang['account_suspended'] 									= 'Your account has been suspended.';

// Account Changes
$lang['update_successful']									= 'Account information has been successfully updated.';
$lang['update_unsuccessful']								= 'Unable to update account information.';
$lang['delete_successful']										= 'Account information has been successfully deleted.';
$lang['delete_unsuccessful']									= 'Unable to delete account information.';

// Form Validation
$lang['form_validation_duplicate_identity'] 			= 'An account with this email address or username already exists.';
$lang['form_validation_duplicate_email'] 				= 'The Email of %s field is not available.';
$lang['form_validation_duplicate_username'] 		= 'The Username of %s field is not available.';
$lang['form_validation_current_password'] 			= 'The %s field is invalid.';

/*-------------------------------------- demo views -------------------------------------------------------------------*/

/* Global Values */
$lang['a_user_authentication_library']			= 'A User Authentication Library for CodeIgniter';
$lang['first_name']										= 'First Name';
$lang['last_name']										= 'Last Name';
$lang['user_group']										= 'User Group';
$lang['description']										= 'Description';
$lang['manage']											= 'Manage';
$lang['delete']												= 'Delete';
$lang['reset']												= 'Reset';
$lang['submit']												= 'Submit';
$lang['register']											= 'Register';
$lang['username']										= 'Username';
$lang['email']												= 'E-Mail';
$lang['group']												= 'Group';
$lang['password']											= 'Password';
$lang['privileges']											= 'Privileges';
$lang['status']												= 'Status';
$lang['admin']												= 'Admin';
$lang['administrate']									= 'Administrate';
$lang['company']											= 'Company';
$lang['city']													= 'City';
$lang['town']												= 'Town';
$lang['state']												= 'State';
$lang['county']												= 'County';
$lang['postal_code']										= 'Post Code';
$lang['country']											= 'Country';
$lang['recipient']											= 'Recipient';

/* --- Public Examples --- */

//account_update_view
$lang['update_account_demo']							= 'Update Account Demo';
$lang['public_update_account_details']				= 'Public: Update Account Details';
$lang['update_account_details']						= 'Update Account Details';
$lang['click_here_to_change_your_password']	= 'Click here to change your password';

//address_insert_view
$lang['insert_new_address_demo']				= 'Insert New Address Demo';
$lang['public_insert_new_address']				= 'Public: Insert New Address';
$lang['insert_new_address']							= 'Insert New Address';
$lang['manage_address_book']					= 'Manage Address Book';
$lang['address_alias']									= 'Address Alias';
$lang['recipient_details']								= 'Recipient Details';
$lang['recipient_name']								= 'Recipient Name';
$lang['address_details']								= 'Address Details';
$lang['address_line_1']								= 'Address 01';
$lang['address_line_2']								= 'Address 02';
$lang['address_line_3']								= 'Address 03';
$lang['insert_address']									= 'Insert Address';

//address_update_view
$lang['update_address_demo']						= 'Update Address Demo';
$lang['public_update_address']					= 'Public: Update Address';
$lang['update_address']								= 'Update Address Book';

//address_view
$lang['manage_address_demo']					= 'Manage Addresses Demo';
$lang['public_manage_address_book']			= 'Public: Manage Address Book';
$lang['delete_checked_addresses']				= 'Delete Checked Addresses';
$lang['there_are_no_addresses']					= 'There are no addresses in your address book';

//dashboard_view
$lang['public_dashboard_demo']					= 'Public Dashboard Demo';
$lang['public_dashboard']								= 'Public: Dashboard';
$lang['address_book']									= 'Address Book';

//email_update_view

//forgot_password_update_view

//forgot_password_view

//password_update_view

//forgot_password_view

//password_update_view

//register_view

//resend_activation_token_view


/* --- Admin Examples --- */

//dashboard_view
$lang['admin_dashboard_demo']					= 'Admin Dashboard Demo.';
$lang['admin_dashboard']							= 'Admin: Dashboard';
$lang['user_accounts']									= 'User Accounts';
$lang['manage_user_accounts']					= 'Manage User Accounts';
$lang['user_groups']										= 'User Groups';
$lang['manage_user_groups']						= 'Manage User Groups';
$lang['user_privileges']								= 'User Privileges';
$lang['manage_user_privileges']					= 'Manage User Privileges';
$lang['user_activity']									= 'User Activity';
$lang['list_all_active_users']							= 'List all active users';
$lang['list_all_inactive_users']						= 'List all inactive users';
$lang['list_all_inactivated']							= 'List all inactivated (Never been activated) users over 31 days old';
$lang['list_users_with_a_high']						= 'List users with a high number of failed login attempts';
$lang['helps_identify_possible']					= '- Helps identify possible brute force hack attempts.';

//Global Privilege Values
$lang['insert_new_privilege']					= 'Insert New Privilege';
$lang['privilege_name']								= 'Privilege Name:';

//privilege_insert_view
$lang['insert_new_privileges_demo']			= 'Insert New Privileges Demo';
$lang['admin_insert_new_privilege']			= 'Admin: Insert New Privilege';
$lang['manage_privileges']							= 'Manage Privileges';
$lang['privilege_details']							= 'Privilege Details';
$lang['privilege_description']					= 'Privilege Description:';
$lang['insert_privilege']								= 'Insert Privilege:';

//privilege_update_view
$lang['update_privileges_demo']					= 'Update Privileges Demo';
$lang['admin_update_privilege']					= 'Admin: Update Privilege';
$lang['update_privilege']								= 'Update Privilege';
$lang['manage_privileges']							= 'Manage Privileges';
$lang['privilege_details']							= 'Privilege Details';
$lang['privilege_description']					= 'Privilege Description:';
$lang['update_privilege_details']				= 'Update Privilege Details';
$lang['update_privilege']								= 'Update Privilege:';

//privileges_view
$lang['manage_privileges_demo']			  	= 'Manage Privileges Demo';
$lang['admin_manage_privileges']				= 'Admin: Manage Privileges';
$lang['manage_privileges']							= 'Manage Privileges';
$lang['delete_checked_privileges']			= 'Delete Checked Privileges';

//user_acccounts_view
$lang['manage_user_accounts_demo']			= 'Manage User Accounts Demo';
$lang['admin_manage_user_account']			= 'Admin: Manage User Accounts';
$lang['user_accounts']									= 'User Accounts';
$lang['add_new_account']						  	= 'Add New Account';
$lang['search_filter']									= 'Search Filter';
$lang['search_users']								  	= 'Search Users:';
$lang['user_privileges']								= 'User Privileges';
$lang['account_suspended']							= 'Account Suspended';
$lang['not_privileged']									= 'Not Privileged';

//user_account_update_view / Register Page
$lang['user_registration_demo']					= 'Create User Account Demo';
$lang['create_user_account']						= 'Create User Account';
$lang['register_account']								= 'Register Account';
$lang['personal_details']								= 'Personal Details';
$lang['contact_details']								= 'Contact Details';
$lang['phone_number']									  = 'Phone Number';
$lang['subscribe_to_newsletter']				= 'Subscribe to Newsletter';
$lang['login_details']									= 'Login Details';
$lang['confirm_password']							= 'Confirm Password';
$lang['new_password']									= 'New Password';
$lang['generate_password']							= 'Generate Password';
$lang['instant_activate_account']					= 'Instant Activation';

//user_account_update_view
$lang['update_user_accounts_demo']			= 'Update User Accounts Demo';
$lang['admin_update_user_account']			= 'Admin: Update User Account';
$lang['update_account_for']							= 'Update Account for';
$lang['manage_user_accounts']					= 'Manage User Accounts';
$lang['update_account']								= 'Update Account';

//user_group_insert_view
$lang['insert_new_user_group_demo']			= 'Insert New User Group Demo';
$lang['admin_insert_new_user_group']			= 'Admin: Insert New User Group';
$lang['insert_new_user_group']					= 'Insert New User Group';
$lang['group_details']									= 'Group Details';
$lang['group_name']									= 'Group Name';
$lang['group_description']							= 'Group Description';
$lang['is_admin_group']								= 'Is Admin Group';
$lang['insert_new_group']							= 'Insert New Group';
$lang['insert_group']									= 'Insert Group';

//user_group_privileges_update_view
$lang['update_user_group_privileges_demo']		= 'Update User Group Privileges Demo';
$lang['admin_update_user_group_privileges']		= 'Admin: Update User Group Privileges';
$lang['update_user_group_privileges_of_group']	= 'Update User Group Privileges of Group';
$lang['manage_user_groups']								= 'Manage User Groups';
$lang['update_user_group']									= 'Update User Group';
$lang['user_has_privilege']									= 'User Has Privilege';
$lang['update_group_privilege']							= 'Update Group Privileges';

//user_group_update_view
$lang['insert_group']											= 'Update User Group Demo';
$lang['admin_update_user_group']						= 'Admin: Update User Group';
$lang['update_user_group']									= 'Update User Group';
$lang['manage_user_groups']								= 'Manage User Groups';
$lang['user_group_privileges']								= 'User Group Privileges';
$lang['manage_privileges_for_this_user_group']	= 'Manage Privileges for this User Group';
$lang['update_group_details']								= 'Update Group Details';
$lang['update_group']											= 'Update Group';

//user_groups_view
$lang['manage_user_group_demo']						= 'Manage User Group Demo';
$lang['admin_manage_user_group']						= 'Admin: Manage User Groups';
$lang['delete_checked_user_groups']					= 'Delete Checked User Groups';

//user_privileges_update_view
$lang['update_user_privileges_demo']					= 'Update User Privileges Demo';
$lang['admin_update_user_privilege']					= 'Admin: Update User Privileges';
$lang['update_user_privileges_for']						= 'Update User Privileges for';
$lang['user_has_individual_privilege']					= 'User Has Individual Privilege';
$lang['has_privilege_from_user_group']				= 'Has Privilege From User Group';
$lang['update_user_privileges']							= 'Update User Privileges';

//users_unactivated_view
$lang['inactivated_user_demo']							= 'Inactivated User Demo';
$lang['admin_user_accounts_not_activated']		= 'Admin: User Accounts Not Activated in 31 Days';
$lang['user_accounts_not_activated']					= 'User Accounts Not Activated in 31 Days';
$lang['delete_listed_users']									= 'Delete Listed Users';
$lang['no_inactivated_accounts']							= 'No inactivated accounts found';

//users_view
$lang['user_management_demo']							= 'User Management Demo';
$lang['failed_attempts']										= 'Failed Attempts';
$lang['no_users_are_available']							= 'No users are available';
