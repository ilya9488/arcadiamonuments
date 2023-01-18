<?php

// custom form login

add_shortcode( 'custom_login', 'render_login' );

function render_login() {
 
	// check if the user is already logged in, then display the appropriate message and the link "Exit"
	if ( is_user_logged_in() ) {
		return sprintf( "You are already logged into the site. <a href='%s'>Log Out</a>.", wp_logout_url() );
	}
 
	// we assign the contents of the form to a variable and then return it, we cannot output via echo (), since this is a shortcode
	$return = '<div class="login-form-container"><h2>Log In</h2>';
 
	// error messages
	if ( isset( $_REQUEST['errno'] ) ) {
		$error_codes = explode( ',', $_REQUEST['errno'] );
 
		foreach ( $error_codes as $error_code ) {
			switch ( $error_code ) {
				case 'empty_username':
					$return .= '<p class="errno">Did You Forget To Enter Your Email?</p>';
					break;
				case 'empty_password':
					$return .= '<p class="errno">Please Enter Your Password.</p>';
					break;
				case 'invalid_username':
					$return .= '<p class="errno">The Specified User Was Not Found On The Site.</p>';
					break;
				case 'invalid_email':
					$return .= '<p class="errno">User With This Email Is Not Registered.</p>';
					break;
				case 'incorrect_password':
					$return .= sprintf( "<p class='errno'>Wrong Password. <a href='%s'>Restore</a>?</p>", wp_lostpassword_url() );
					break;
				case 'confirm':
					$return .= '<p class="errno success">Password Reset Instructions Have Been Sent To Your Email.</p>';
					break;
				case 'changed':
					$return .= '<p class="errno success">Password Changed Successfully.</p>';
					break;
				case 'expiredkey':
				case 'invalidkey':
					$retun .= '<p class="errno">Invalid Key.</p>';
					break;
			}
		}
	}
  if ( apply_filters( 'enable_login_autofocus', true ) && ! $error ) {
    $login_script .= "wp_attempt_focus();\n";
}
 
// Run `wpOnload()` if defined.
$login_script .= "if ( typeof wpOnload === 'function' ) { wpOnload() }";
 
  $args = array(
      'echo'                 => false, // do not display, but return
      'redirect'             => site_url(), // where to redirect the user after login
      'form_id'              => 'loginform',
      'label_username'       => __( '' ),
      'placeholder_username' => __( 'Enter Your Email' ),
      'label_password'       => __( '' ),
      'placeholder_password' => __( 'Password' ),
      'label_remember'       => __( 'Remember Me' ),
      'label_log_in'         => __( 'Log In' ),
      'id_username'          => 'user_login',
      'id_password'          => 'user_pass',
      'id_remember'          => 'rememberme',
      'id_submit'            => 'wp-submit',
      'remember'             => true,
      'value_username'       => NULL,
      'value_remember'       => false,
    );
// use wp_login_form() to display the form (but you can do it in pure HTML as well)
  $return .= '<form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
          ' . $login_form_top . '

          <p class="login-username">
            <label for="' . esc_attr( $args['id_username'] ) . '">' . esc_html( $args['label_username'] ) . '</label>
            <input type="text" placeholder="' . esc_attr( $args['placeholder_username'] ) . '" name="log" id="' . esc_attr( $args['id_username'] ) . '" class="input" value="' . esc_attr( $args['value_username'] ) . '" size="20" />
          </p>
          <p class="login-password">
            <label for="' . esc_attr( $args['id_password'] ) . '">' . esc_html( $args['label_password'] ) . '</label>
            <input type="password" placeholder="' . esc_attr( $args['placeholder_password'] ) . '" name="pwd" id="' . esc_attr( $args['id_password'] ) . '" class="input" value="" size="20" />
            <svg class="eye" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.3548 7.64305C12.1923 7.48055 11.9281 7.48055 11.7656 7.64305C11.6031 7.80555 11.6031 8.07055 11.7656 8.23223C12.2373 8.70391 12.4981 9.33141 12.4981 9.99974C12.4981 11.3781 11.3764 12.4997 9.99809 12.4997C9.32977 12.4997 8.70227 12.2397 8.23059 11.7672C8.06809 11.6047 7.80391 11.6047 7.64141 11.7672C7.47891 11.9289 7.47891 12.1939 7.64141 12.3564C8.26973 12.9864 9.10723 13.3331 9.99809 13.3331C11.8364 13.3331 13.3314 11.8381 13.3314 9.99977C13.3314 9.10888 12.9848 8.27138 12.3548 7.64305Z"/>
              <path d="M10.5821 6.72388C10.3929 6.69056 10.1996 6.66638 10.0013 6.66638C8.16297 6.66638 6.66797 8.16138 6.66797 9.9997C6.66797 10.198 6.69215 10.3914 6.72629 10.5805C6.76211 10.7822 6.93797 10.9247 7.13547 10.9247C7.15965 10.9247 7.18379 10.923 7.20879 10.918C7.43461 10.878 7.58629 10.6613 7.54629 10.4355C7.52047 10.2938 7.50129 10.1497 7.50129 9.9997C7.50129 8.62138 8.62297 7.4997 10.0013 7.4997C10.1513 7.4997 10.2955 7.51888 10.4371 7.54388C10.6588 7.58888 10.8796 7.4322 10.9196 7.20638C10.9596 6.98056 10.808 6.76388 10.5821 6.72388Z"/>
              <path d="M19.8994 9.73053C19.8053 9.61885 17.5511 6.98803 14.442 5.37721C14.2403 5.27139 13.9861 5.35139 13.8803 5.55639C13.7745 5.76057 13.8545 6.01221 14.0595 6.11807C16.4545 7.35807 18.3678 9.29307 19.0219 9.99974C18.0286 11.0756 14.1195 14.9997 9.99865 14.9997C8.60033 14.9997 7.19115 14.6622 5.80865 13.9956C5.60366 13.8947 5.35284 13.9822 5.25284 14.1897C5.15202 14.3964 5.23952 14.6456 5.44702 14.7456C6.94283 15.4681 8.47451 15.8331 9.99869 15.8331C15.1329 15.8331 19.7078 10.4964 19.9003 10.2689C20.0319 10.1138 20.0311 9.88635 19.8994 9.73053Z"/>
              <path d="M12.7342 4.64638C11.7859 4.3272 10.8659 4.16638 10 4.16638C4.86587 4.16638 0.290876 9.50305 0.0983768 9.73055C-0.0233027 9.87387 -0.0333027 10.0822 0.0750565 10.238C0.132556 10.3205 1.51005 12.2764 3.89755 13.8622C3.96837 13.9097 4.04755 13.9322 4.12755 13.9322C4.26173 13.9322 4.39423 13.8672 4.47423 13.7447C4.60173 13.5539 4.54923 13.2947 4.35755 13.168C2.60423 12.0022 1.40423 10.5947 0.955055 10.0222C1.91423 8.98055 5.84923 4.99974 10 4.99974C10.7759 4.99974 11.6067 5.14642 12.4684 5.43556C12.6867 5.51388 12.9234 5.39306 12.9959 5.17388C13.0692 4.95556 12.9525 4.71974 12.7342 4.64638Z"/>
              <path id="dash" d="M17.3777 2.62218C17.2152 2.45968 16.951 2.45968 16.7885 2.62218L2.62187 16.7888C2.45938 16.9513 2.45938 17.2155 2.62187 17.378C2.70355 17.4588 2.81019 17.4997 2.91687 17.4997C3.02355 17.4997 3.13019 17.4589 3.21105 17.378L17.3777 3.21136C17.5402 3.04886 17.5402 2.78468 17.3777 2.62218Z"/>
            </svg>
          </p>
          ' . $login_form_middle . '
          ' . ( $args['remember'] ? '<p class="login-remember">
            <label class="label-rememberme">
              <label for="rememberme" class="custom-checkbox"></label>
              <input name="rememberme" type="checkbox" id="' . esc_attr( $args['id_remember'] ) . '" value="forever"' . ( $args['value_remember'] ? ' checked="checked"' : '' ) . ' />
               ' . esc_html( $args['label_remember'] ) . '
              </label>
              <a class="forgot-password link" href="/forgot-password/">Forgot Password?</a>
              </p>' : '' ) . '

          <p class="login-submit btn btn-light">
            <input type="submit" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" class="button button-primary" value="' . esc_attr( $args['label_log_in'] ) . '" />
            <input type="hidden" name="redirect_to" value="' . esc_attr( $args['redirect'] ) . '" />
          </p>
          ' . $login_form_bottom . '
        </form>';
 
	// $return .= '<a class="forgot-password" href="' . wp_lostpassword_url() . '">Forgot Password?</a></div>';
 
	// and finally we return everything that happened
	return $return;
 
}

// redirect at authenticate
add_filter( 'authenticate', 'redirect_at_authenticate', 101, 3 );
 
function redirect_at_authenticate( $user, $username, $password ) {
 
	if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
		if ( is_wp_error( $user ) ) {
			$error_codes = join( ',', $user->get_error_codes() );
 
			$login_url = home_url( '/login/' );
			$login_url = add_query_arg( 'errno', $error_codes, $login_url );
 
			wp_redirect( $login_url );
			exit;
		}
	}
 
	return $user;
}
/*
 * Redirects after leaving the site
 */
add_action( 'wp_logout', 'logout_redirect', 5 );
function logout_redirect(){
	wp_safe_redirect( site_url( '/login/?logged_out=true' ) );
	exit;
}

// logout without confirmation and redirect
add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : site_url( '/login/?logged_out=true' );
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}