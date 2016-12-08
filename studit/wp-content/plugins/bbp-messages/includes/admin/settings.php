<?php

class BBP_messages_admin_settings
{

	protected static $instance = null;

	public static function instance() {

		return null == self::$instance ? new self : self::$instance;

	}

	public function html() {
		
		?>
				
			<div class="bbpm_left">

				<h2>bbPress Messages &raquo; Settings</h2>

				<form method="post">

					<style type="text/css">table.bbpm th{text-align: left;}</style>

					<table class="bbpm _form-table">
						
						<tr>
							<th><h3>Slugs</h3></th>
						</tr>

						<tr>
							
							<th><h4>Messages</h4></th>

							<td><label>
								<input type="text" value="<?php echo bbpm_settings()->slugs->messages; ?>" name="_bbpm_settings_slugs_messages" size="40" /><br/>
								<em>Your messages will be available at <?php echo home_url( bbp_get_user_slug() . '/' . wp_get_current_user()->user_nicename . '/<strong>' . bbpm_settings()->slugs->messages . '</strong>/' ); ?></em>
							</label></td>

						</tr>

						<tr>
							<th><h3>Pagination</h3></th>
						</tr>

						<tr>
							
							<th><h4>Messages per page</h4></th>

							<td>
								<input type="number" name="_bbpm_settings_pagination_messages" value="<?php echo bbpm_settings()->pagination->messages; ?>" />
							</td>

						</tr>

						<tr>
							
							<th><h4>Conversations per page</h4></th>

							<td>
								<input type="number" name="_bbpm_settings_pagination_conversations" value="<?php echo bbpm_settings()->pagination->conversations; ?>" />
							</td>

						</tr>

						<tr>
							<td><h3>Email notification</h3></td>
						</tr>

						<tr>
							<td>
								
								<p><strong>Allowed shortcodes:</strong><br/>
								<code>{site_name}</code> for site name,<br/>
								<code>{site_description}</code> for site description,<br/>
								<code>{site_link}</code> for home link,<br/>
								<code>{sender_name}</code> for message sender name,<br/>
								<code>{user_name}</code> for message recipient (sent-to) name,<br/>
								<code>{message_link}</code> for message link,<br/>
								<code>{message_id}</code> the unique message ID,<br/>
								<code>{message_big_link}Text{/message_big_link}</code> for message big link</p>
								<code>{message_excerpt}</code> inserts the content of this message limited to 150 characters</p>

							</td>
						</tr>

						<tr>
							
							<th><h4>Email subject</h4></th>

							<td>
								<input type="text" name="_bbpm_settings_notifications_subject" value="<?php echo bbpm_settings()->notifications->subject; ?>" size="40" />
							</td>

						</tr>

						<tr>
							
							<th><h4>Email content</h4></th>

							<td>
								<?php wp_editor( bbpm_settings()->notifications->body, '_bbpm_settings_notifications_body', array('quicktags' => false) ); ?></textarea>
							</td>

						</tr>

						<tr>
							<th><h3>Other settings</h3></th>
						</tr>

						<tr>
							
							<th><h4>Help text</h4></th>
							<td>
								<?php wp_editor( bbpm_settings()->help_text, '_bbpm_settings_help_text', array('quicktags' => false) ); ?></textarea>
							</td>

						</tr>

						<tr>
							<td>
								<?php wp_nonce_field( '_bbpm_settings', '_bbpm_settings_nonce' ); ?>
								<?php submit_button(); ?>
							</td>
						</tr>

					</table>

				</form>

			</div>
			<div class="bbpm_right">
				<span style="float: right;cursor: pointer;" onclick="this.parentNode.remove()" title="Hide sidebar">[x]</span>

				<h3>Get the best of the PRO version</h3>

				<li>User blocking and unblocking</li>
				<li>Marking messages unread</li>
				<li>More message media and oembeds</li>
				<li>Conversation archives</li>
				<li>bbPress Messages Widgets..</li>

				<p><a href="http://go.samelh.com/get/bbpress-messages/" class="button">More information</a></p>

				<p><hr/></p>

				<h3>Customize bbPress Messages</h3>

				<p>We often write blog posts about how to customize and extend bbPress Messages. <a href="http://blog.samelh.com/tag/bbpress-messages/">Check them out on our blog &raquo;</a></p>

				<p><hr/></p>

				<h3>Check out more of our premium plugins</h3>
				<li><a target="_blank" href="http://go.samelh.com/get/bbpress-ultimate/">bbPress Ultimate</a> adds more features to your forums and bbPress/BuddyPress profiles..</li>
				<li><a target="_blank" href="http://go.samelh.com/get/bbpress-thread-prefixes/">bbPress Thread Prefixes</a> enables thread prefixes in your blog, just like any other forum board!</li>
				<li><a target="_blank" href="http://go.samelh.com/get/wpchats/">WpChats</a> bringing instant live chat &amp; private messaging feature to your site..</li>
				<p>View more of our <a target="_blank" href="https://profiles.wordpress.org/elhardoum#content-plugins">free</a> and <a target="_blank" href="http://codecanyon.net/user/samiel/portfolio?ref=samiel">premium</a> plugins.</p>
				<p><hr/></p>

				<h3>Subscribe, Join our mailing list</h3>
				<p><i>Join our mailing list today for more WordPress tips and tricks and awesome free and premium WordPress plugins to add more functionality to your sites!</i><p>
				<form action="//samelh.us12.list-manage.com/subscribe/post?u=677d27f6f70087b832c7d6b67&amp;id=7b65601974" method="post" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="" style="border: 1px solid #ddd; padding: 1em; background: #F7F7F7;">
					<label><strong>Email:</strong><br/>
						<input type="email" value="<?php echo wp_get_current_user()->email; ?>" name="EMAIL" class="required email" id="mce-EMAIL" />
					</label>
					<br/>
					<label><strong>Your name:</strong><br/>
						<input type="text" value="<?php echo wp_get_current_user()->user_nicename; ?>" name="FNAME" class="" id="mce-FNAME" />
					</label>
				    <p><input type="submit" value="Subscribe Me" name="subscribe" id="mc-embedded-subscribe" class="button" /></p>
				</form>
				<p><hr/></p>

				<h3>Are you looking for help?</h3>
				<p>Don't worry, we got you covered:</p>
				<li><a href="http://wordpress.org/support/plugin/bbp-messages">Go to plugin support forum on WordPress</a></li>
				<li><a href="http://support.samelh.com/">Try our Support forum</a></li>
				<li><a href="http://blog.samelh.com/">Browse our blog for tutorials</a></li>
				<p><hr/></p>

				<h3>bbPress Messages Free Addons</h3>
				<li><a href="https://github.com/elhardoum/bbpm-recaptcha">Google reCaptcha</a></li>
				<p><hr/></p>

				<p>
					<li>Help us with a <a href="https://wordpress.org/support/view/plugin-reviews/bbp-messages?rate=5#postform">&#9733;&#9733;&#9733;&#9733;&#9733; rating</a>, feedbacks and reviews are appreciated!</li>
					<li>Follow<a href="http://twitter.com/samuel_elh">@Samuel_Elh</a> on Twitter for more bbPress projects..</li>
				</p>

				<p>Thank you! :)</p>

				<style type="text/css" media="all">@media screen and (min-width:700px){.bbpm_left,.bbpm_right{display:inline-block}.bbpm_left{width:65%}.bbpm_right{width:25%;vertical-align:top;border-left:1px solid #ddd;padding:0 1.2em;margin-top:-5px}}</style>

			</div>

		<?php

	}

}