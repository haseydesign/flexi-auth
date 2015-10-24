<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name: flexi auth lang - Polish
* 
* Author: 
* Paweł Kasztelan
* pawek@kasztelan.me
* haseydesign.com/flexi-auth
*
* Released: 24/10/2015
*
* Description:
* Polish language file for flexi auth
*
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

// Account Creation
$lang['account_creation_successful']				= 'Twoje konto zostało pomyślnie utworzone.';
$lang['account_creation_unsuccessful']				= 'Utworzenie konta nie powiodło się.';
$lang['account_creation_duplicate_email']			= 'Konto dla wskazanego adresu e-mail już istnieje.'; 
$lang['account_creation_duplicate_username']		= 'Konto dla wskazanej nazwy użytkownika już istnieje.'; 
$lang['account_creation_duplicate_identity'] 		= 'Konto dla wskazanej tożsamości już istnieje.';
$lang['account_creation_insufficient_data']			= 'Brak wystarczających danych, aby utworzyć konto. Upewnij się że wypełniłeś wszystkie wymagane pola.';

// Password
$lang['password_invalid']							= "Pole %s zawiera nieprawidłową wartość.";
$lang['password_change_successful'] 	 	 		= 'Hasło zostało pomyślnie zmienione.';
$lang['password_change_unsuccessful'] 	  	 		= 'Podane hasła nie pasują do siebie.';
$lang['password_token_invalid']  					= 'Przesłany token dla hasła jest nieprawidłowy lub wygasł.'; 
$lang['email_new_password_successful']				= 'Nowe hasło zostało wysłane na Twój adres e-mail.';
$lang['email_forgot_password_successful']	 		= 'E-mail resetujący hasło został wysłany na adres przypisany do konta.';
$lang['email_forgot_password_unsuccessful']  		= 'Nie można zresetować hasła.'; 

// Activation
$lang['activate_successful']						= 'Konto zostało aktywowane.';
$lang['activate_unsuccessful']						= 'Nie można aktywować konta.';
$lang['deactivate_successful']						= 'Konto zostało wyłączone.';
$lang['deactivate_unsuccessful']					= 'Nie można dezaktywować konta.';
$lang['activation_email_successful'] 	 			= 'E-mail aktywacyjny został wysłany.';
$lang['activation_email_unsuccessful']  	 		= 'Nie udało się wysłać e-mail aktywującego.';
$lang['account_requires_activation'] 				= 'Twoje konto musi być aktywowane poprzez e-mail.';
$lang['account_already_activated'] 					= 'Twoje konto zostało już aktywowane.';
$lang['email_activation_email_successful']			= 'E-mail został wysłanyw celu aktywacji nowego adresu email.';
$lang['email_activation_email_unsuccessful']		= 'Nie udało się wysłać e-maila w celu aktywacji nowego adresu email.';

// Login / Logout
$lang['login_successful']							= 'Zostałeś pomyślnie zalogowany.';
$lang['login_unsuccessful']							= 'Przesłane dane logowania są nieprawidłowe.';
$lang['logout_successful']							= 'Zostałeś pomyślnie wylogowany.';
$lang['login_details_invalid'] 						= 'Twoje dane logowania są nieprawidłowe.';
$lang['captcha_answer_invalid'] 					= 'Odpowiedź CAPTCHA jest niepoprawna.';
$lang['login_attempts_exceeded'] 					= 'Maksymalna ilość prób logowania została przekroczona, należy poczekać kilka chwil przed dokonaniem ponownej próby.';
$lang['login_session_expired']						= 'Twoja sesja logowania wygasła.';
$lang['account_suspended'] 							= 'Twoje konto zostało zablokowane.';

// Account Changes
$lang['update_successful']							= 'Informacje o koncie zostały pomyślnie zaktualizowane.';
$lang['update_unsuccessful']						= 'Nie można zaktualizować informacji o koncie.';
$lang['delete_successful']							= 'Informacje o koncie zostały pomyślnie usunięte.';
$lang['delete_unsuccessful']						= 'Nie można usunąć informacji o koncie.';

// Form Validation
$lang['form_validation_duplicate_identity'] 		= "Konto z podanym adresem e-mail lub nazwą użytkownika jest zajęte.";
$lang['form_validation_duplicate_email'] 			= "Adres E-mail w polu %s jest niedostępny.";
$lang['form_validation_duplicate_username'] 		= "Nazwa użytkownika w polu %s jest niedostępna.";
$lang['form_validation_current_password'] 			= "Pole %s zawiera nieprawidłową wartość.";