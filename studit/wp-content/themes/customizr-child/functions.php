<?php
/**
* This is where you can copy and paste your functions !
*/
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {

if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);

    }
}

add_action("user_register", function( $user_id ) {
    if ( !class_exists('BBP_messages_message') ) return; // bbPress messages is not there

    $sender = 2; // admin. Please provide a valid user ID
    $message = sprintf(
        "Greetings, %s!\n\nThis is an automated message, sent to greet and thank you for signing up for a membership on our website.\n\nSee you online,\n%s &mdash; %s.",
        get_userdata( $user_id )->display_name,
        get_userdata( $sender )->display_name,
        get_bloginfo( "name" )
    ); // message format

    return BBP_messages_message::sender( $user_id, $message, $sender );
});

// Checks for stud.ntnu.no email
function myplugin_check_fields( $errors, $sanitized_user_login, $user_email ) {

  if ( ! preg_match('/(.+)@(stud)\.(ntnu)\.(no)/', $user_email ) ) {
    $errors->add( 'demo_error', __( '<strong>ERROR</strong>: Invalid email. Email is not a NTNU student email. Only NTNU students can sign up.', 'my_textdomain' ) );
  }
    return $errors;
}

add_filter( 'registration_errors', 'myplugin_check_fields', 10, 3 );

// Changes logo on login screen
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
            padding-bottom: 30px;
            height: 80px;
            width: 80px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

        $login_header_url   = __( 'www.vbrestad.no/studit' );
		$login_header_title = __( 'Return to Studit' );

?>
