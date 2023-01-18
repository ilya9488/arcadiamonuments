<?php
/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

// user registration login form
function registration_form() {

 // if the user is logged in, just display a message and exit the function
	// if ( is_user_logged_in() ) {
	// 	return sprintf( '
	// 	<div class="congratulations">
	// 		<h3>Congratulations!</h3>
	// 		<p>There is 1 step left to complete your registration. We have sent a confirmation email to the Email address you provided during registration. Please, open it and follow the instructions.</p>
	// 	</div>
	// 	');
	// }

	// only show the registration form to non-logged-in members
	if(!is_user_logged_in()) {
 
		// check if registration is enabled
		$registration_enabled = get_option('users_can_register');
		// if enabled
		if($registration_enabled) {
			$output = registration_fields();
		} else {
			$output = __('User registration is not enabled');
		}
		// return $output = 'Complete!';
		return $output;
	}
}
add_shortcode('register_form', 'registration_form');

// registration form fields
function registration_fields() {
	
	ob_start(); ?>	
		<h2 class="header mt-0 mb-0"><?php _e('Personal Account'); ?></h2>
		<p class="header-text">
			Join Arcadia Memorial to Quickly Access the Online Memorials of your Relatives, Family, and Friends. With a profile, you can honor someone and Light a Virtual Candle at their Online Memorial. Moreover, if you wish to buy any other "Memorial Gift," and present it on your behalf at the Online Memorial. You can add your payment card and much more on your profile page.
		</p>
		<?php 
		// show any error messages after form submission
		register_messages(); ?>

		<form id="registration_form" name="login_form_register" class="form" action="" method="POST">
			<fieldset class="d-flex flex-wrap justify-content-between">
				<p class="half-field">
					<!-- <label for="user_first"><?php // _e('First Name'); ?></label> -->
					<input name="user_first" id="user_first" type="text" class="user_first" placeholder="Your First Name *" />
				</p>
				<p class="half-field">
					<!-- <label for="user_last"><?php // _e('Last Name'); ?></label> -->
					<input name="user_last" id="user_last" type="text" class="user_last" placeholder="Your Last Name *"/>
				</p>
				
				<p class="w-100">
					<span class="icon icon-bracket-accordion"></span>
					<input autocomplete="off" type="text" class="input" id="birthday" name="birthday" value="<?php echo esc_attr( $birthday ) ?>" placeholder="Date Of Birth" readonly>
				</p>
				<p class="d-none">
					<!-- <label for="user_Login"><?php // _e('Username'); ?></label> -->
					<input name="user_login" id="user_login" class="user_login" type="text" placeholder="Enter Your Username *"/>
				</p>
				<p class="w-100">
					<!-- <label for="user_email"><?php // _e('Email'); ?></label> -->
					<input name="user_email" id="user_email" class="user_email" type="email" placeholder="Enter Your Email *"/>
				</p>
				<p class="half-field password-wrap">
					<!-- <label for="password"><?php // _e('Password'); ?></label> -->
					<input name="user_pass" id="password" class="password" type="password" placeholder="Password *"/>
					<svg class="eye-signup" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.3548 7.64305C12.1923 7.48055 11.9281 7.48055 11.7656 7.64305C11.6031 7.80555 11.6031 8.07055 11.7656 8.23223C12.2373 8.70391 12.4981 9.33141 12.4981 9.99974C12.4981 11.3781 11.3764 12.4997 9.99809 12.4997C9.32977 12.4997 8.70227 12.2397 8.23059 11.7672C8.06809 11.6047 7.80391 11.6047 7.64141 11.7672C7.47891 11.9289 7.47891 12.1939 7.64141 12.3564C8.26973 12.9864 9.10723 13.3331 9.99809 13.3331C11.8364 13.3331 13.3314 11.8381 13.3314 9.99977C13.3314 9.10888 12.9848 8.27138 12.3548 7.64305Z"/>
						<path d="M10.5821 6.72388C10.3929 6.69056 10.1996 6.66638 10.0013 6.66638C8.16297 6.66638 6.66797 8.16138 6.66797 9.9997C6.66797 10.198 6.69215 10.3914 6.72629 10.5805C6.76211 10.7822 6.93797 10.9247 7.13547 10.9247C7.15965 10.9247 7.18379 10.923 7.20879 10.918C7.43461 10.878 7.58629 10.6613 7.54629 10.4355C7.52047 10.2938 7.50129 10.1497 7.50129 9.9997C7.50129 8.62138 8.62297 7.4997 10.0013 7.4997C10.1513 7.4997 10.2955 7.51888 10.4371 7.54388C10.6588 7.58888 10.8796 7.4322 10.9196 7.20638C10.9596 6.98056 10.808 6.76388 10.5821 6.72388Z"/>
						<path d="M19.8994 9.73053C19.8053 9.61885 17.5511 6.98803 14.442 5.37721C14.2403 5.27139 13.9861 5.35139 13.8803 5.55639C13.7745 5.76057 13.8545 6.01221 14.0595 6.11807C16.4545 7.35807 18.3678 9.29307 19.0219 9.99974C18.0286 11.0756 14.1195 14.9997 9.99865 14.9997C8.60033 14.9997 7.19115 14.6622 5.80865 13.9956C5.60366 13.8947 5.35284 13.9822 5.25284 14.1897C5.15202 14.3964 5.23952 14.6456 5.44702 14.7456C6.94283 15.4681 8.47451 15.8331 9.99869 15.8331C15.1329 15.8331 19.7078 10.4964 19.9003 10.2689C20.0319 10.1138 20.0311 9.88635 19.8994 9.73053Z"/>
						<path d="M12.7342 4.64638C11.7859 4.3272 10.8659 4.16638 10 4.16638C4.86587 4.16638 0.290876 9.50305 0.0983768 9.73055C-0.0233027 9.87387 -0.0333027 10.0822 0.0750565 10.238C0.132556 10.3205 1.51005 12.2764 3.89755 13.8622C3.96837 13.9097 4.04755 13.9322 4.12755 13.9322C4.26173 13.9322 4.39423 13.8672 4.47423 13.7447C4.60173 13.5539 4.54923 13.2947 4.35755 13.168C2.60423 12.0022 1.40423 10.5947 0.955055 10.0222C1.91423 8.98055 5.84923 4.99974 10 4.99974C10.7759 4.99974 11.6067 5.14642 12.4684 5.43556C12.6867 5.51388 12.9234 5.39306 12.9959 5.17388C13.0692 4.95556 12.9525 4.71974 12.7342 4.64638Z"/>
						<path id="dash" d="M17.3777 2.62218C17.2152 2.45968 16.951 2.45968 16.7885 2.62218L2.62187 16.7888C2.45938 16.9513 2.45938 17.2155 2.62187 17.378C2.70355 17.4588 2.81019 17.4997 2.91687 17.4997C3.02355 17.4997 3.13019 17.4589 3.21105 17.378L17.3777 3.21136C17.5402 3.04886 17.5402 2.78468 17.3777 2.62218Z"/>
					</svg>
				</p>
				<p class="half-field password-wrap">
					<!-- <label for="password_again"><?php // _e('Password Again'); ?></label> -->
					<input name="user_pass_confirm" id="password_again" class="password_again" type="password" placeholder="Re-Enter Password *"/>
					<svg class="eye confirm-signup" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.3548 7.64305C12.1923 7.48055 11.9281 7.48055 11.7656 7.64305C11.6031 7.80555 11.6031 8.07055 11.7656 8.23223C12.2373 8.70391 12.4981 9.33141 12.4981 9.99974C12.4981 11.3781 11.3764 12.4997 9.99809 12.4997C9.32977 12.4997 8.70227 12.2397 8.23059 11.7672C8.06809 11.6047 7.80391 11.6047 7.64141 11.7672C7.47891 11.9289 7.47891 12.1939 7.64141 12.3564C8.26973 12.9864 9.10723 13.3331 9.99809 13.3331C11.8364 13.3331 13.3314 11.8381 13.3314 9.99977C13.3314 9.10888 12.9848 8.27138 12.3548 7.64305Z"/>
						<path d="M10.5821 6.72388C10.3929 6.69056 10.1996 6.66638 10.0013 6.66638C8.16297 6.66638 6.66797 8.16138 6.66797 9.9997C6.66797 10.198 6.69215 10.3914 6.72629 10.5805C6.76211 10.7822 6.93797 10.9247 7.13547 10.9247C7.15965 10.9247 7.18379 10.923 7.20879 10.918C7.43461 10.878 7.58629 10.6613 7.54629 10.4355C7.52047 10.2938 7.50129 10.1497 7.50129 9.9997C7.50129 8.62138 8.62297 7.4997 10.0013 7.4997C10.1513 7.4997 10.2955 7.51888 10.4371 7.54388C10.6588 7.58888 10.8796 7.4322 10.9196 7.20638C10.9596 6.98056 10.808 6.76388 10.5821 6.72388Z"/>
						<path d="M19.8994 9.73053C19.8053 9.61885 17.5511 6.98803 14.442 5.37721C14.2403 5.27139 13.9861 5.35139 13.8803 5.55639C13.7745 5.76057 13.8545 6.01221 14.0595 6.11807C16.4545 7.35807 18.3678 9.29307 19.0219 9.99974C18.0286 11.0756 14.1195 14.9997 9.99865 14.9997C8.60033 14.9997 7.19115 14.6622 5.80865 13.9956C5.60366 13.8947 5.35284 13.9822 5.25284 14.1897C5.15202 14.3964 5.23952 14.6456 5.44702 14.7456C6.94283 15.4681 8.47451 15.8331 9.99869 15.8331C15.1329 15.8331 19.7078 10.4964 19.9003 10.2689C20.0319 10.1138 20.0311 9.88635 19.8994 9.73053Z"/>
						<path d="M12.7342 4.64638C11.7859 4.3272 10.8659 4.16638 10 4.16638C4.86587 4.16638 0.290876 9.50305 0.0983768 9.73055C-0.0233027 9.87387 -0.0333027 10.0822 0.0750565 10.238C0.132556 10.3205 1.51005 12.2764 3.89755 13.8622C3.96837 13.9097 4.04755 13.9322 4.12755 13.9322C4.26173 13.9322 4.39423 13.8672 4.47423 13.7447C4.60173 13.5539 4.54923 13.2947 4.35755 13.168C2.60423 12.0022 1.40423 10.5947 0.955055 10.0222C1.91423 8.98055 5.84923 4.99974 10 4.99974C10.7759 4.99974 11.6067 5.14642 12.4684 5.43556C12.6867 5.51388 12.9234 5.39306 12.9959 5.17388C13.0692 4.95556 12.9525 4.71974 12.7342 4.64638Z"/>
						<path id="dash" d="M17.3777 2.62218C17.2152 2.45968 16.951 2.45968 16.7885 2.62218L2.62187 16.7888C2.45938 16.9513 2.45938 17.2155 2.62187 17.378C2.70355 17.4588 2.81019 17.4997 2.91687 17.4997C3.02355 17.4997 3.13019 17.4589 3.21105 17.378L17.3777 3.21136C17.5402 3.04886 17.5402 2.78468 17.3777 2.62218Z"/>
					</svg>
				</p>
				<p class="signup-agree w-100 d-flex align-content-center">
					<label for="terms" class="custom-checkbox-agree"></label>
					<input name="terms" id="terms" type="checkbox" value="Yes">
					<label for="terms">I agree to the <a href="<?= site_url(); ?>/terms-of-service">Terms and Conditions</a> Of The Site.</label>
				</p>
				<p class="btn form-btn btn-light">
					<input type="submit" value="<?php _e('Sign Up'); ?>"/>
					<input type="hidden" name="csrf" value="<?php echo wp_create_nonce('vicode-csrf'); ?>"/>
				</p>
			</fieldset>
		</form>
	<?php
	return ob_get_clean();
}

// register a new user
function add_new_user() {
    if (isset( $_POST["user_login"] ) && wp_verify_nonce($_POST['csrf'], 'vicode-csrf')) {
      $user_login				= $_POST["user_login"];	
      $user_email				= $_POST["user_email"];
      $user_first 	    = $_POST["user_first"];
      $user_last	 			= $_POST["user_last"];
      $user_pass				= $_POST["user_pass"];
      $pass_confirm 		= $_POST["user_pass_confirm"];
      $terms 	        	= $_POST["terms"];
      
      // this is required for username checks
      require_once(ABSPATH . WPINC . '/registration.php');
      if($user_first == '') {
          //invalid first name
          errors()->add('user_first', __('Please enter your first name'));
      }
      if($user_last == '') {
          //invalid first name
          errors()->add('user_last', __('Please enter your last name'));
      }
      if(!is_email($user_email)) {
          //invalid email
          errors()->add('email_invalid', __('Invalid email'));
      }
      if(email_exists($user_email)) {
          //Email address already registered
          errors()->add('email_used', __('Email already registered'));
      }
      if($user_pass == '') {
          // passwords do not match
          errors()->add('password_empty', __('Please enter a password'));
      }
      if($user_pass != $pass_confirm) {
          // passwords do not match
          errors()->add('password_mismatch', __('Passwords do not match'));
			}
			if($_POST['terms'] != 'Yes'){
					errors()->add('terms', __('Terms is not Yes'));
			}
      
      $errors = errors()->get_error_messages();
      
      // if no errors then cretate user
      if(empty($errors)) {
          
          $new_user_id = wp_insert_user(array(
                  'user_login'					 => $user_login,
                  'user_pass'	 					 => $user_pass,
                  'user_email'					 => $user_email,
                  'first_name'					 => $user_first,
                  'last_name'						 => $user_last,
                  'user_registered'			 => date('Y-m-d H:i:s'),
                  'role'								 => 'subscriber',
                  'show_admin_bar_front' => 'false',
                  'display_name' 				 => $user_first,
              )
          );
          if($new_user_id) {
              // send an email to the admin
              wp_new_user_notification($new_user_id);   
              // log the new user in
              // wp_setcookie($user_login, $user_pass, true);
              // wp_set_current_user($new_user_id, $user_login);	
							// do_action('wp_login', $user_login);
              
              // send the newly created user to the home page after logging them in
              wp_redirect(home_url('/sign-up/congratulations/')); exit;
          }   
      }
  }
}
add_action('init', 'add_new_user');

// used for tracking error messages
function errors(){
    static $wp_error; // global variable handle
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function register_messages() {
	if($codes = errors()->get_error_codes()) {
		echo '<div class="errors">';
		    // Loop error codes and display errors
		   foreach($codes as $code){
		        $message = errors()->get_error_message($code);
		        echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
		    }
		echo '</div>';
	}
}



// add new field ( birthday data)
add_action( 'register_form', 'true_show_fields' );
function true_show_fields() {
	$birthday = ! empty( $_POST[ 'birthday' ] ) ? $_POST[ 'birthday' ] : '';
	?>
	<p>Additional Information
		<label for="birthday">Birthday</label>
		<input type="text" id="birthday" name="birthday" class="input" value="<?php echo esc_attr( $birthday ) ?>" size="25" />
	</p>
	<?php
}

add_action( 'user_register', 'true_register_fields' );
function true_register_fields( $user_id ) {
	update_user_meta( $user_id, 'birthday', sanitize_text_field( $_POST[ 'birthday' ] ) );
}

add_action( 'user_new_form', 'true_admin_registration_form' ); 
function true_admin_registration_form( $operation ) {
 
	if ( 'add-new-user' !== $operation ) {
		// $operation may also be 'add-existing-user' for multisite
		return;
	}
	$birthday = ! empty( $_POST[ 'birthday' ] ) ? $_POST[ 'birthday' ] : '';
	?>
	<h3>Additional Information</h3>
	<table class="form-table">
		<tr class="form-field">
			<th><label for="birthday">Birthday date:</label></th>
			<td><input id="birthday" name="birthday" class="input" type="text" value="<?php echo esc_attr( $birthday ) ?>" /></td>
		</tr>
	</table>
	<?php
}

// when the user himself edits his profile
add_action( 'show_user_profile', 'true_show_profile_fields' );
// when someone's profile is edited by an admin for example
add_action( 'edit_user_profile', 'true_show_profile_fields' );
function true_show_profile_fields( $user ) {
	// displaying the title for our fields
 	echo '<h3>Additional Information</h3>';
	// the fields in the profile are in the table frame <table>
 	echo '<table class="form-table">';
 	// add the city field
	$user_birthday = get_the_author_meta( 'birthday', $user->ID );
 	echo '<tr><th><label for="birthday">Birthday date:</label></th>
 	<td><input type="text" name="birthday" id="birthday" value="' . esc_attr( $user_birthday ) . '" class="regular-text" /></td>
	</tr>';
 	echo '</table>';
}

// when the user himself edits his profile
add_action( 'personal_options_update', 'true_save_profile_fields' );
// when someone's profile is edited by an admin for example
add_action( 'edit_user_profile_update', 'true_save_profile_fields' );
function true_save_profile_fields( $user_id ) {
	update_user_meta( $user_id, 'birthday', sanitize_text_field( $_POST[ 'birthday' ] ) );
}