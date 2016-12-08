<?php

/**
  *
  *
  */

class BBP_messages_hooks
{

	protected static $instance = null;

	public static function instance() {

		return null == self::$instance ? new self : self::$instance;

	}

	function __construct() {


		add_filter('bbpm_conversation_no_messages_notice', function( $text ) {

			if( bbpm_is_search_messages() ) {
				$text = 'No message has matched your search query.';
			}

			elseif( ! bbpm_get_conversation_id( bbpm_get_recipient_id() ) ) {
				$text = 'This conversation is empty. Send a message below.';
			}

			return  $text;

		});

		add_action('bbpm_before_messages_list', function() {

			if( bbpm_is_search_messages() ) {
				echo '<p>Showing message results for "' . bbpm_get_search_query() . '" :</p>';
			}

			echo apply_filters('bbpm_section_separator', '<p style="text-align:center">&middot; &middot; &middot;</p>');

		});

		add_action('bbpm_before_conversation_form', function() {

			echo apply_filters('bbpm_section_separator', '<p style="text-align:center">&middot; &middot; &middot;</p>');

		});

		add_filter('bbpm_get_conversation_array', function( $args ) {

			if( bbpm_is_search_messages() && '' !== bbpm_get_search_query() ) {

				global $wpdb;
				$table = $wpdb->prefix . BBPM_TABLE;
				global $current_user;
				$pm_id = $args->last_message->PM_ID;
				$q = bbpm_get_search_query();
				$query = $wpdb->get_results( "SELECT * FROM $table WHERE `PM_ID` = '$pm_id' AND NOT FIND_IN_SET('$current_user->ID', `deleted`) ORDER BY `ID` AND `message` LIKE '%$q%' DESC LIMIT 1" );
				
				if( ! empty( $query[0] ) && ! empty( $query[0]->PM_ID ) ) :;

					$args->last_message = BBP_messages_message::instance()->get_message( $query[0]->ID );

				else :;

					$args = false;

				endif;

			}

			return $args;

		});

		add_filter('bbpm_no_messages_notice', function( $text ) {

			if( bbpm_is_search_messages() ) {
				$text = 'No conversations have matched your search query.';
			}

			if( ! bbpm_is_archives() ) {
				if( bbpm_get_counts()->archives > 0 ) {

					if( bbpm_is_search_messages() ) {
						$text .= ' <a href="' . bbpm_messages_base( 'archives/?q=' . bbpm_get_search_query() ) . '">Search archives &raquo;</a>';
					} else {
						$text .= ' <a href="' . bbpm_messages_base( 'archives/' ) . '">View archives &raquo;</a>';
					}

				}
			}

			if( isset( $_GET['view'] ) && 'unread' == (string) $_GET['view'] ) {
				$text = 'You have no unread conversations.';
			}

			return $text;

		});

		add_action('bbpm_after_messages_top_header', function() {

			if( bbpm_is_search_messages() ) {
				echo '<p>Showing message results for "' . bbpm_get_search_query() . '" :</p>';
			}

			echo apply_filters('bbpm_section_separator', '<p style="text-align:center">&middot; &middot; &middot;</p>');

		});

		add_action('bbp_user_edit_after_contact', function() {
			
			?>

				<div>
					<label for=""><?php echo apply_filters('bbpm_user_edit_notification_settings_intro_text', 'bbPress messages'); ?></label>	
					<label>
						<input type="checkbox" name="bbpm_email_me" style="width: auto;" <?php echo checked( bbpm_can_notify( bbp_get_displayed_user_id() ) ); ?> />
						<?php echo apply_filters('bbpm_user_edit_notification_settings_label_text', 'Email me whenever I receive a message on the forums'); ?>
					</label>
				</div>

			<?php

		});
		add_action( 'personal_options_update', array( &$this, 'bbpm_update_user_preferences' ) );
		add_action( 'edit_user_profile_update', array( &$this, 'bbpm_update_user_preferences' ) );

		// when editing someone else's profile as admin, make sure not to update their online status as we save
		add_filter('bbpm_core_update_user_status_time_int', function( $time, $args) {

			$user_id = ! empty( $args['user'] ) ? (int) $args['user'] : 0;
			if( get_userdata( $user_id ) ) {
				if( wp_get_current_user()->ID !== $user_id ) {
					$time = bbpm_get_user_data( $user_id )->last_seen;
				}
			}
			return $time;

		}, 10, 2);

		add_action('bbpm_before_template_load', function() {

			if( isset( $_GET['done'] ) ) {

				$identifier = (string) $_GET['done'];
				if( bbpm_notice( $identifier )->notice ) :;
					?>
						<div class="notice<?php echo bbpm_notice( $identifier )->success ? '' : ' err'; ?>">
							<?php echo bbpm_notice( $identifier )->notice; ?>
							<span title="dismiss">[x]</span>
						</div>
					<?php

				endif;

			}

		});

		/**
		  * Parsing shortcodes.
		  * Only admins can have shortcodes parsed within the message content.
		  * To allow this for everyone, add add_filter('bbpm_the_message', 'do_shortcode');
		  * to your child theme's functions file.
		  */

		add_filter("bbpm_the_message", "bbpm_the_message_do_shortcode");
		function bbpm_the_message_do_shortcode( $content ) {
			if( current_user_can('manage_options') )
				$content = do_shortcode( $content );
			return $content;
		}

		add_filter('bbp_template_after_user_profile', function() {
			
			$user_id = bbp_get_displayed_user_id();
			global $current_user;
			
			if( empty( $current_user->ID ) || !get_userdata( $user_id ) || $user_id == $current_user->ID )
				return;

			ob_start();
			?>

				<p>
					<a href="<?php echo bbpm_get_conversation_permalink( '', $user_id ); ?>">Send <?php echo get_userdata( $user_id )->user_nicename; ?> a message</a>
				</p>

			<?php

			echo apply_filters('bbpm_bbp_template_after_user_profile', ob_get_clean());

		});

		add_action('bbp_theme_after_reply_author_details', function() {
			
			$user_id = bbp_get_reply_author_id();
			global $current_user;
			
			if( empty( $current_user->ID ) || !get_userdata( $user_id ) || $user_id == $current_user->ID )
				return;

			ob_start();
			?>

				<p>
					<a href="<?php echo bbpm_get_conversation_permalink( '', $user_id ); ?>">Send <?php echo get_userdata( $user_id )->user_nicename; ?> a message</a>
				</p>

			<?php

			echo apply_filters('bbpm_bbp_theme_after_reply_author_details', ob_get_clean());

		});

	}

	public function bbpm_update_user_preferences( $user_id ) {

		$value = isset( $_POST['bbpm_email_me'] ) ? 1 : 0;
		update_user_meta( $user_id, '_bbpm_notify_me', (string) $value );

	}

}

BBP_messages_hooks::instance();