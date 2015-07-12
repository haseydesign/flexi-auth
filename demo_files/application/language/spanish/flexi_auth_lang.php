<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name: flexi auth lang - English
* 
* Author: 
* Rob Hussey
* flexiauth@haseydesign.com
* haseydesign.com/flexi-auth
*
* Released: 13/09/2012
*
* Description:
* English language file for flexi auth
*
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

// Account Creation
$lang['account_creation_successful']				= 'Su cuenta ha sido creada con éxito.';
$lang['account_creation_unsuccessful']				= 'No se puede crear la cuenta.';
$lang['account_creation_duplicate_email']			= 'Una cuenta con esta dirección de correo electrónico ya existe.'; 
$lang['account_creation_duplicate_username']		= 'Una cuenta con este nombre de usuario ya existe.'; 
$lang['account_creation_duplicate_identity'] 		= 'Una cuenta con esta identidad ya existe.';
$lang['account_creation_insufficient_data']			= 'Datos insuficientes para crear una cuenta. Asegurar una identidad válido y la contraseña se envían.';

// Password
$lang['password_invalid']							= "El campo %s no es válido.";
$lang['password_change_successful'] 	 	 		= 'Contraseña éxito se ha cambiado.';
$lang['password_change_unsuccessful'] 	  	 		= 'Su contraseña presentada no coincide con nuestros registros.';
$lang['password_token_invalid']  					= 'Su token de contraseña ingresado no es válido o ha expirado.'; 
$lang['email_new_password_successful']				= 'Una nueva contraseña ha sido enviada por correo electrónico.';
$lang['email_forgot_password_successful']	 		= 'Un correo electrónico ha sido enviado para restablecer su contraseña.';
$lang['email_forgot_password_unsuccessful']  		= 'No se ha podido restablecer la contraseña.'; 

// Activation
$lang['activate_successful']						= 'la cuenta ha sido activada.';
$lang['activate_unsuccessful']						= 'No se puede activar la cuenta.';
$lang['deactivate_successful']						= 'la cuenta ha sido desactivado.';
$lang['deactivate_unsuccessful']					= 'No se puede desactivar la cuenta.';
$lang['activation_email_successful'] 	 			= 'Un email de activación ha sido enviado.';
$lang['activation_email_unsuccessful']  	 		= 'No se puede enviar correo electrónico de activación.';
$lang['account_requires_activation'] 				= 'Su cuenta tiene que ser activado a través de correo electrónico.';
$lang['account_already_activated'] 					= 'Tu cuenta ya está activada.';
$lang['email_activation_email_successful']			= 'Un correo electrónico ha sido enviado para activar su nueva dirección de correo electrónico.';
$lang['email_activation_email_unsuccessful']		= 'No se puede enviar un correo electrónico para activar su nueva dirección de correo electrónico.';

// Login / Logout
$lang['login_successful']							= 'Ha ingresado correctamente.';
$lang['login_unsuccessful']							= 'Sus datos de acceso ingresado son incorrectas.';
$lang['logout_successful']							= 'Ha salido correctamente.';
$lang['login_details_invalid'] 						= 'Sus datos de acceso no son válidos.';
$lang['captcha_answer_invalid'] 					= 'Respuesta CAPTCHA es incorrecta.';
$lang['login_attempts_exceeded'] 					= 'se ha superado el maximo de intentos de inicio de sesión, por favor espere unos momentos antes de volver a intentarlo.';
$lang['login_session_expired']						= 'Su inicio de sesión ha expirado.';
$lang['account_suspended'] 							= 'Su cuenta ha sido suspendida.';

// Account Changes
$lang['update_successful']							= 'Información de la cuenta se ha actualizado correctamente.';
$lang['update_unsuccessful']						= 'No se puede actualizar la información de cuenta.';
$lang['delete_successful']							= 'Información de la cuenta se ha eliminado correctamente.';
$lang['delete_unsuccessful']						= 'No se puede eliminar información de la cuenta.';

// Form Validation
$lang['form_validation_duplicate_identity'] 		= "Una cuenta con esta dirección de correo electrónico o nombre de usuario ya existe.";
$lang['form_validation_duplicate_email'] 			= "El Correo de campo %s no está disponible.";
$lang['form_validation_duplicate_username'] 		= "El nombre de usuario de campo %s no está disponible.";
$lang['form_validation_current_password'] 			= "El campo %s no es válido.";