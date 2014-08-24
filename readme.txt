=== Wider Admin Menu ===
Contributors: cdillon27
Donate link: http://www.wpmission.com/donate/
Tags: admin, menu
Requires at least: 3.3
Tested up to: 3.9.2
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Make the Admin Menu wider to accomodate long menu items.

== Description ==

Wider Admin Menu by [WP Mission](http://www.wpmission.com) is a lightweight plugin that lets you easily set the width of your admin menu from the default `160px` up to `300px`.

A separate stylesheet is also included if you wish to avoid Yet Another Plugin. See FAQ.

This plugin will *leave no trace!* If you delete the plugin, all settings will be removed from the database. Guaranteed. However, simply deactivating it will leave your settings in place, as expected.

= Recommended =

[Admin Menu Post List](http://wordpress.org/plugins/admin-menu-post-list/) (100% compatible)

= Translations. =

Can you help? Please [contact me](http://www.wpmission.com/contact/).


== Installation ==

Option A: 

1. Go to `Plugins > Add New`.
1. Search for "wider admin menu".
1. Click "Install Now".

Option B: 

1. Download the zip file.
1. Unzip it on your hard drive.
1. Upload the `wider-admin-menu` folder to the `/wp-content/plugins/` directory.

Option C:

1. Download the zip file.
1. Upload the zip file via `Plugins > Add New > Upload`.

Finally, activate the plugin.

By default, the plugin will set the width of the admin menu to `200px`. Go to Settings > Wider Admin Menu to select a new width.

If you have any questions or need help, use the [support forum](http://wordpress.org/support/plugin/wider-admin-menu) or [contact me](http://www.wpmission.com/contact/).

== Frequently Asked Questions ==

= I don't need a plugin. Can I just add some code to my stylesheet? =

Sure. That's actually how this plugin started out. If you simply need a wider admin bar and you're cool with CSS then try this: 

Look in the plugin's `/css` folder for the file `wider-admin-menu.css`.

Then either copy its contents to your theme's stylesheet,

OR

copy the file to your theme folder and add this to your theme's `functions.php` to load it:

`
function wider_admin_menu() {
  wp_enqueue_style( 'wider-admin-menu', get_stylesheet_directory_uri() . '/wider-admin-menu.css' );
}
add_action( 'admin_enqueue_scripts', 'wider_admin_menu' );
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

Please use the [support forum](http://wordpress.org/support/plugin/wider-admin-menu) or [contact me](http://www.wpmission.com/contact).

== Screenshots ==

1. Before: 160px default width.
2. After: the plugin sets the initial width to 200px.
3. The sweet & simple settings page where **you** can set the width from 160px - 300px.

== Changelog ==

= 1.0 =
* Refactored to object-oriented.
* Improved i18n, ready for translations.

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

= 1.0 =
Refactor to object-oriented. Improved i18n, ready for translations.

= 0.3 =
Definitely upgrade if you're running WordPress versions 3.5 to 3.7.1.
