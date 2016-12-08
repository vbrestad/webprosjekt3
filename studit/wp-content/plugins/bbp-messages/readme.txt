=== bbPress Messages Lite - Forum Users Private Messages ===
Contributors: elhardoum
Tags: messages, bbPress, forums, private messages, BuddyPress, contact, widget, embed, conversations, notifications, email, child themes
Requires at least: 3.0.1
Tested up to: 4.5.3
Stable tag: 0.2.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Author URI: http://samelh.com/
Donate link: http://samelh.com/

bbPress Messages - User Private Messages with notifications, widgets and media with no BuddyPress needed.

== Description ==

bbPress Messages - User Private Messages with notifications, widgets and media with no BuddyPress messaging component needed.

Send and receive private messages from bbPress users on the forums easily. Embeds are detected atomatically from message text such as YouTube videos so no need for formatting the message text and also can parse shortcodes as well..

This is a lite free version, so many features were stripped out of it, the most of them consist of user blocking and unblocking, conversation archives, making messages unread, and much more nice widgets.

You can overwrite everything and extend it the way you want, all you need to do for example to overwrite the stylesheet is to copy the plugin folder into your child theme, then open assets > css and modify the CSS.

Applicable files which can be modified in your child theme are those files found in assets and themes folders.

The messages can easily output shortcodes, convert plain text links into clickable ones, fetch YouTube videos and embed them, parse images that are wrapped in [img][/img] bbCode tags, also comes with a built-in user online status..

<strong>reCaptcha</strong>: Google reCaptcha is supported as of v. 0.2.2, simply download and install <a href="https://github.com/elhardoum/bbpm-recaptcha/">reCaptcha for bbPress Messages WordPress Plugin</a> addon from our Github repositories and update the captcha settings.

We often write tutorials on the blog on about this plugin, make sure to <a href="http://blog.samelh.com/tag/bbpress-messages/">check them out</a>

<blockquote>

	<strong>Get the best of the PRO version:</strong><br/>

	If you are enjoying this plugin, and want to upgrade to PRO, here are some of the premium features powered:

	<li>User blocking and unblocking</li>
	<li>Marking messages unread</li>
	<li>More message media and oembeds</li>
	<li>Conversation archives</li>
	<li>bbPress Messages Widgets..</li>

	<p><a href="http://go.samelh.com/get/bbpress-messages/">More information &raquo;</a></p>

</blockquote>

For more WordPress/bbPress/BuddyPress free and premium plugins, sign up for the newsletter: http://go.samelh.com/newsletter

== Installation ==

* Install and activate the plugin:

1. Upload the plugin to your plugins directory, or use the WordPress installer.
2. Activate the plugin through the \'Plugins\' menu in WordPress.
3. Once done, use the plugin settings link to access settings, or go to Dashboard > Users > Restrict Registration

Enjoy!

== Screenshots ==

1. My messages and conversations and the widget.
2. Single conversation view.
3. The "new message" notification email.

== Changelog ==
= 0.2.3 =
* Made it more extensible, and fixed couple bugs and done few improvements.

= 0.2.2 =
* Added couple hooks

= 0.2.1 =
* Fixed bug related to user email notification preferences
* Fixed 404 issues related to bbPress users base in the forums

= 0.1.1.3 =
* Fixed bug related to user email notification preferences

= 0.1.1.2 =
* Fixed a bug related to user email confirmation
* Fixed a bug related to bbPress user profile saving edits
Thanks nuzik for the heads up!

= 0.1.1.1 =
* Forgot to include flushing rewrite rules upon plugin activation, which will fix the 404 issues.

= 0.1.1 =
* Fixed a bug: when using BuddyPress, the bbPress profile link is overwritten thus the messages page gives 404.
* Other few improvements.

= 0.1 =
* Initial release.

== Other Notes ==
To do: - caching. - reducing load time by improving code.