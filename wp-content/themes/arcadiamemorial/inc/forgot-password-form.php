<?php

add_shortcode( 'custom_passreset', 'render_pass_reset_form' ); // shortcode [custom_passreset]
 
function render_pass_reset_form() {
 
 	// if the user is logged in, just display a message and exit the function
	if ( is_user_logged_in() ) {
		return sprintf( "You are already logged into the site. <a href='%s'>Sign Out</a>.", wp_logout_url() );
	}
 
	$return = ''; // the variable into which we will write everything
 
	// error processing
	if ( isset( $_REQUEST['errno'] ) ) {
		$errors = explode( ',', $_REQUEST['errno'] );
 
		foreach ( $errors as $error ) {
			switch ( $error ) {
				case 'empty_username':
					$return .= '<p class="errno">Did You Forget To Enter Your Email?</p>';
					break;
				case 'password_reset_empty':
					$return .= '<p class="errno">Enter Your Password</p>';
					break;
				case 'password_reset_mismatch':
					$return .= '<p class="errno">Password Mismatch</p>';
					break;
				case 'invalid_email':
				case 'invalidcombo':
					$return .= '<p class="errno">No User With The Specified Email Was Found On The Site.</p>';
					break;
			}
		}
	}
 
	// for those who came here using the link from email, we show the form for setting a New Password
	if ( isset( $_REQUEST['login'] ) && isset( $_REQUEST['key'] ) ) {
 
		$return .= '<h2 class="mt-0">Enter New Password</h2>
			<form name="resetpassform" id="resetpassform" action="' . site_url( 'wp-login.php?action=resetpass' ) . '" method="post" autocomplete="off">
				<input type="hidden" id="user_login" name="login" value="' . esc_attr( $_REQUEST['login'] ) . '" autocomplete="off" />
				<input type="hidden" name="key" value="' . esc_attr( $_REQUEST['key'] ) . '" />
        <p class="pass1">
					<!-- <label for="pass1">New Password</label> -->
					<input type="password" name="pass1" id="pass1" class="input" size="20" value="" placeholder="New Password" autocomplete="off" />
					 <svg class="eye" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.3548 7.64305C12.1923 7.48055 11.9281 7.48055 11.7656 7.64305C11.6031 7.80555 11.6031 8.07055 11.7656 8.23223C12.2373 8.70391 12.4981 9.33141 12.4981 9.99974C12.4981 11.3781 11.3764 12.4997 9.99809 12.4997C9.32977 12.4997 8.70227 12.2397 8.23059 11.7672C8.06809 11.6047 7.80391 11.6047 7.64141 11.7672C7.47891 11.9289 7.47891 12.1939 7.64141 12.3564C8.26973 12.9864 9.10723 13.3331 9.99809 13.3331C11.8364 13.3331 13.3314 11.8381 13.3314 9.99977C13.3314 9.10888 12.9848 8.27138 12.3548 7.64305Z"/>
						<path d="M10.5821 6.72388C10.3929 6.69056 10.1996 6.66638 10.0013 6.66638C8.16297 6.66638 6.66797 8.16138 6.66797 9.9997C6.66797 10.198 6.69215 10.3914 6.72629 10.5805C6.76211 10.7822 6.93797 10.9247 7.13547 10.9247C7.15965 10.9247 7.18379 10.923 7.20879 10.918C7.43461 10.878 7.58629 10.6613 7.54629 10.4355C7.52047 10.2938 7.50129 10.1497 7.50129 9.9997C7.50129 8.62138 8.62297 7.4997 10.0013 7.4997C10.1513 7.4997 10.2955 7.51888 10.4371 7.54388C10.6588 7.58888 10.8796 7.4322 10.9196 7.20638C10.9596 6.98056 10.808 6.76388 10.5821 6.72388Z"/>
						<path d="M19.8994 9.73053C19.8053 9.61885 17.5511 6.98803 14.442 5.37721C14.2403 5.27139 13.9861 5.35139 13.8803 5.55639C13.7745 5.76057 13.8545 6.01221 14.0595 6.11807C16.4545 7.35807 18.3678 9.29307 19.0219 9.99974C18.0286 11.0756 14.1195 14.9997 9.99865 14.9997C8.60033 14.9997 7.19115 14.6622 5.80865 13.9956C5.60366 13.8947 5.35284 13.9822 5.25284 14.1897C5.15202 14.3964 5.23952 14.6456 5.44702 14.7456C6.94283 15.4681 8.47451 15.8331 9.99869 15.8331C15.1329 15.8331 19.7078 10.4964 19.9003 10.2689C20.0319 10.1138 20.0311 9.88635 19.8994 9.73053Z"/>
						<path d="M12.7342 4.64638C11.7859 4.3272 10.8659 4.16638 10 4.16638C4.86587 4.16638 0.290876 9.50305 0.0983768 9.73055C-0.0233027 9.87387 -0.0333027 10.0822 0.0750565 10.238C0.132556 10.3205 1.51005 12.2764 3.89755 13.8622C3.96837 13.9097 4.04755 13.9322 4.12755 13.9322C4.26173 13.9322 4.39423 13.8672 4.47423 13.7447C4.60173 13.5539 4.54923 13.2947 4.35755 13.168C2.60423 12.0022 1.40423 10.5947 0.955055 10.0222C1.91423 8.98055 5.84923 4.99974 10 4.99974C10.7759 4.99974 11.6067 5.14642 12.4684 5.43556C12.6867 5.51388 12.9234 5.39306 12.9959 5.17388C13.0692 4.95556 12.9525 4.71974 12.7342 4.64638Z"/>
						<path id="dash" d="M17.3777 2.62218C17.2152 2.45968 16.951 2.45968 16.7885 2.62218L2.62187 16.7888C2.45938 16.9513 2.45938 17.2155 2.62187 17.378C2.70355 17.4588 2.81019 17.4997 2.91687 17.4997C3.02355 17.4997 3.13019 17.4589 3.21105 17.378L17.3777 3.21136C17.5402 3.04886 17.5402 2.78468 17.3777 2.62218Z"/>
					</svg>
				</p>
				<p class="pass2">
					<!-- <label for="pass2">Repeat Password</label> -->
					<input type="password" name="pass2" id="pass2" class="input" size="20" value="" placeholder="Repeat Password" autocomplete="off" />
					 <svg class="eye" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.3548 7.64305C12.1923 7.48055 11.9281 7.48055 11.7656 7.64305C11.6031 7.80555 11.6031 8.07055 11.7656 8.23223C12.2373 8.70391 12.4981 9.33141 12.4981 9.99974C12.4981 11.3781 11.3764 12.4997 9.99809 12.4997C9.32977 12.4997 8.70227 12.2397 8.23059 11.7672C8.06809 11.6047 7.80391 11.6047 7.64141 11.7672C7.47891 11.9289 7.47891 12.1939 7.64141 12.3564C8.26973 12.9864 9.10723 13.3331 9.99809 13.3331C11.8364 13.3331 13.3314 11.8381 13.3314 9.99977C13.3314 9.10888 12.9848 8.27138 12.3548 7.64305Z"/>
						<path d="M10.5821 6.72388C10.3929 6.69056 10.1996 6.66638 10.0013 6.66638C8.16297 6.66638 6.66797 8.16138 6.66797 9.9997C6.66797 10.198 6.69215 10.3914 6.72629 10.5805C6.76211 10.7822 6.93797 10.9247 7.13547 10.9247C7.15965 10.9247 7.18379 10.923 7.20879 10.918C7.43461 10.878 7.58629 10.6613 7.54629 10.4355C7.52047 10.2938 7.50129 10.1497 7.50129 9.9997C7.50129 8.62138 8.62297 7.4997 10.0013 7.4997C10.1513 7.4997 10.2955 7.51888 10.4371 7.54388C10.6588 7.58888 10.8796 7.4322 10.9196 7.20638C10.9596 6.98056 10.808 6.76388 10.5821 6.72388Z"/>
						<path d="M19.8994 9.73053C19.8053 9.61885 17.5511 6.98803 14.442 5.37721C14.2403 5.27139 13.9861 5.35139 13.8803 5.55639C13.7745 5.76057 13.8545 6.01221 14.0595 6.11807C16.4545 7.35807 18.3678 9.29307 19.0219 9.99974C18.0286 11.0756 14.1195 14.9997 9.99865 14.9997C8.60033 14.9997 7.19115 14.6622 5.80865 13.9956C5.60366 13.8947 5.35284 13.9822 5.25284 14.1897C5.15202 14.3964 5.23952 14.6456 5.44702 14.7456C6.94283 15.4681 8.47451 15.8331 9.99869 15.8331C15.1329 15.8331 19.7078 10.4964 19.9003 10.2689C20.0319 10.1138 20.0311 9.88635 19.8994 9.73053Z"/>
						<path d="M12.7342 4.64638C11.7859 4.3272 10.8659 4.16638 10 4.16638C4.86587 4.16638 0.290876 9.50305 0.0983768 9.73055C-0.0233027 9.87387 -0.0333027 10.0822 0.0750565 10.238C0.132556 10.3205 1.51005 12.2764 3.89755 13.8622C3.96837 13.9097 4.04755 13.9322 4.12755 13.9322C4.26173 13.9322 4.39423 13.8672 4.47423 13.7447C4.60173 13.5539 4.54923 13.2947 4.35755 13.168C2.60423 12.0022 1.40423 10.5947 0.955055 10.0222C1.91423 8.98055 5.84923 4.99974 10 4.99974C10.7759 4.99974 11.6067 5.14642 12.4684 5.43556C12.6867 5.51388 12.9234 5.39306 12.9959 5.17388C13.0692 4.95556 12.9525 4.71974 12.7342 4.64638Z"/>
						<path id="dash" d="M17.3777 2.62218C17.2152 2.45968 16.951 2.45968 16.7885 2.62218L2.62187 16.7888C2.45938 16.9513 2.45938 17.2155 2.62187 17.378C2.70355 17.4588 2.81019 17.4997 2.91687 17.4997C3.02355 17.4997 3.13019 17.4589 3.21105 17.378L17.3777 3.21136C17.5402 3.04886 17.5402 2.78468 17.3777 2.62218Z"/>
					</svg>
				</p>
 
				<p class="description">' . wp_get_password_hint() . '</p>
 
				<p class="resetpass-submit form-btn btn btn-light">
					<input type="submit" name="submit" id="resetpass-button" class="button" value="get new password" />
				</p>
			</form>';
 
		// return the form and exit the function
		return $return;
	}
 
	// everyone else - the usual form of password reset (1st step, where we indicate the email)
	$return .= '
		<h2 class="mt-0">Forgot Password?</h2>
		<form id="lostpasswordform" action="' . wp_lostpassword_url() . '" method="post">
		<p class="form-row">
		<!-- <label for="user_login">Email</label> -->
			<input type="email" name="user_login" id="user_login" placeholder="Enter Your Email">
		</p>
		<p class="forgot-text">Enter the same email address that you used to register your account. We will send you an email with an instruction on how to reset your password.</p>
		<p class="lostpassword-submit form-btn btn btn-light">
			<input type="submit" name="submit" class="lostpassword-button" value="Send" />
		</p>
		</form>';
 
	// return the form and exit the function
	return $return;
}
/*
 * redirect the standard form
 */
add_action( 'login_form_lostpassword', 'pass_reset_redir' );
 
function pass_reset_redir() {
	// if using a different shortcut to the password reset page please specify here
	$forgot_pass_page_slug = '/forgot-pass';
	// if using a different login page shortcut please specify here
	$login_page_slug = '/login';
	// if someone went to the password reset page
	// (!) just went over, not sent by the form,
	// then redirect to our custom password reset page
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] && !is_user_logged_in() ) {
		wp_redirect( site_url( $forgot_pass_page_slug ) );
		exit;
	} else if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
    		// if on the contrary, the form was submitted
    		// use retrieve_password()
    		// which sends a password reset link to the mail
    		// to the user who is specified in $_POST['user_login']
		$errors = retrieve_password();
		if ( is_wp_error( $errors ) ) {
            		// if errors occurred, return the user back to the form
            		$to = site_url( $forgot_pass_page_slug );
            		$to = add_query_arg( 'errno', join( ',', $errors->get_error_codes() ), $to );
        	} else {
            		// if there were no errors, redirect to the login with a success message
            		$to = site_url( $login_page_slug );
            		$to = add_query_arg( 'errno', 'confirm', $to );
        	}
 
		// the actual redirect itself
        	wp_redirect( $to );
        	exit;
	}
}
 
/*
 * Manipulations after clicking on the link from the letter
 */
add_action( 'login_form_rp', 'to_custom_password_reset' );
add_action( 'login_form_resetpass', 'to_custom_password_reset' );
 
function to_custom_password_reset(){
 
	$key = $_REQUEST['key'];
	$login = $_REQUEST['login'];
	// if using a different shortcut to the password reset page please specify here
	$forgot_pass_page_slug = '/forgot-pass';
	// if using a different login page shortcut please specify here
	$login_page_slug = '/login';
 
	// we check the compliance of the key and login in both cases
	if ( ( 'GET' == $_SERVER['REQUEST_METHOD'] || 'POST' == $_SERVER['REQUEST_METHOD'] )
		&& isset( $key ) && isset( $login ) ) {
 
		$user = check_password_reset_key( $key, $login );
 
		if ( ! $user || is_wp_error( $user ) ) {
			if ( $user && $user->get_error_code() === 'expired_key' ) {
				wp_redirect( site_url( $login_page_slug . '?errno=expiredkey' ) );
			} else {
				wp_redirect( site_url( $login_page_slug . '?errno=invalidkey' ) );
			}
			exit;
		}
 
	}
 
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
 
		$to = site_url( $forgot_pass_page_slug );
		$to = add_query_arg( 'login', esc_attr( $login ), $to );
		$to = add_query_arg( 'key', esc_attr( $key ), $to );
 
		wp_redirect( $to );
		exit;
 
	} elseif ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
 
		if ( isset( $_POST['pass1'] ) ) {
 
 			if ( $_POST['pass1'] != $_POST['pass2'] ) {
				// if passwords don't match
				$to = site_url( $forgot_pass_page_slug );
 
				$to = add_query_arg( 'key', esc_attr( $key ), $to );
				$to = add_query_arg( 'login', esc_attr( $login ), $to );
				$to = add_query_arg( 'errno', 'password_reset_mismatch', $to );
 
				wp_redirect( $to );
				exit;
			}
 
			if ( empty( $_POST['pass1'] ) ) {
				// if the password field is empty
 				$to = site_url( $forgot_pass_page_slug );
 
				$to = add_query_arg( 'key', esc_attr( $key ), $to );
				$to = add_query_arg( 'login', esc_attr( $login ), $to );
				$to = add_query_arg( 'errno', 'password_reset_empty', $to );
 
				wp_redirect( $to );
				exit;
			}
			// here by the way, you can set your own checks, for example, so that the password length is 8 characters
			// everything is ok with passwords, you can reset
			reset_password( $user, $_POST['pass1'] );
			wp_redirect( site_url( $login_page_slug . '?errno=changed' ) );
 
		} else {
			// if something went wrong
			echo "Something went wrong.";
		}
		exit;
	}
}