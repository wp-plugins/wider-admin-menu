=== Wider Admin Menu ===
Contributors: cdillon27
Donate link: http://www.wpmission.com/donate/
Tags: admin
Requires at least: 3.3
Tested up to: 3.9.1
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Adjust the width of the Admin Menu to accomodate long menu items.

== Description ==

Wider Admin Menu by [WP Mission](http://www.wpmission.com) means no more line breaks on long menu items.

Easily set the width of the Admin Menu from the default `160px` up to `300px` by dragging a slider or manually entering the width.

This lightweight plugin adds your custom width setting to a small `<style>` section in each admin page. A more efficient alternative is to use the separate CSS file `wider-admin-menu.css` in your theme instead of this plugin. See FAQ below.

This plugin will *leave no trace!* If you delete the plugin, all settings will be removed from the database. Guaranteed. However, simply deactivating it will leave your settings in place, as expected.

= Translations. =

Can you help? Contact me [here](http://www.wpmission.com/contact/).

== Frequently Asked Questions ==

= I don't need a plugin. Can I just add some code to my stylesheet? =

Sure. That's actually how this plugin started out. If you simply need a wider admin bar and you're cool with CSS then try this: 

Look in the plugin's `/css` folder for the file `wider-admin-menu.css`.

Then either copy its contents to your theme's stylesheet,
OR
copy the file to your theme folder and add this to your theme's `functions.php` to load it:

`
function wpmwam_style() {
  wp_enqueue_style( 'wpmwam-style',	get_stylesheet_directory_uri() . '/wider-admin-menu.css' );
}
add_action( 'admin_enqueue_scripts', 'wpmwam_style' );
`

That covers WordPress 3.8 and up.
For WordPress 3.5 to 3.7.1, substitute `wider-admin-menu-35.css`.
For WordPress 3.3 to 3.4.2, substitute `wider-admin-menu-33.css`.

Need a hand? I'm on the [support forum](http://wordpress.org/support/plugin/wider-admin-menu).

= Leave no trace? What's that about? =

Some plugins and themes don't fully uninstall everything they installed - things like settings, database tables, subdirectories. That bugs me. Sometimes, it bugs your WordPress too.

As a WordPress mechanic, I think the best reason for leaving no trace is to make it easier to debug wonky behavior later.

So this plugin will completely remove itself upon deletion. Deactivating the plugin will leave the settings intact, though. As an added bonus, you can switch off "Leave No Trace" so the settings remain after deletion, if you want.

= I have a feature request. =

Please submit feature requests on the [support forum](http://wordpress.org/support/plugin/wider-admin-menu) or [contact me](http://www.wpmission.com/contact).

= I need a WordPress mechanic. =

[Let's talk](http://www.wpmission.com/contact/).

== Screenshots ==

1. Before: 160px default width.
2. After: the plugin sets the initial width to 200px.
3. The sweet & simple settings page where **you** can set the width from 160px - 300px.

== Changelog ==

= 0.3 =
* Use PHP `version_compare` function.
* Fix footer style for WordPress 3.5 to 3.7.1.
* Add "Alternate Method" instructions.
* Use WordPress coding standards.

= 0.2.3 = 
* Updated for WordPress 3.8.2.

= 0.2.2 =
* Added empty `localization` directory.

= 0.2.1 =
* Version bump to trigger update message for anyone who downloaded my svn-fubar.

= 0.2 =
* Moved CSS from style.php to in-page <style> section.

= 0.1 =
* First release.

== Upgrade Notice ==

= 0.3 =
Definitely upgrade if you're running WordPress versions 3.5 to 3.7.1.

== Markdown Test ==

`This is a test to wring as much style as possible out of WordPress' (bland) flavor of Markdown.`

Strong Testimonials by [WP Mission](http://www.wpmission.com) makes testimonials simple.

* **Show** with a variety of shortcodes or in a widget with transition effects.
* **Collect** through a customizable form with anti-spam options.
* **Manage** in the post editor including Featured Images and Categories.

> **This is a work in progress.** Strong is my project for learning plugin development. It will always be free. If you cannot tolerate occasional bugs and frequent updates, then please consider another plugin. 

> On the other hand, if you want: -- to participate in this plugin's development by offering ideas and feedback, -- the prompt, personal attention of its developer (who will move mountains to resolve issues), -- popular features that other plugins offer at a price, then welcome aboard! You have been warned :)

> On the other hand, if you want: [ to participate in this plugin's development by offering ideas and feedback ],  [ the prompt, personal attention of its developer (who will move mountains to resolve issues) ], [ popular features that other plugins offer at a price ], then welcome aboard! You have been warned :)

> On the other hand, if you want ::: to participate in this plugin's development by offering ideas and feedback, ::: the prompt, personal attention of its developer (who will move mountains to resolve issues), ::: popular features that other plugins offer at a price, *then welcome aboard!* You have been warned :)
