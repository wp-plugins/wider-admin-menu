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

Wider Admin Menu by [WPMission](http://www.wpmission.com) means no more line breaks on long menu items.

Easily set the width of the Admin Menu from the default `160px` up to `300px` by dragging a slider or manually entering the width.

This lightweight plugin adds your custom width setting to a small `<style>` section in each admin page. A more efficient alternative is to use the separate CSS file `wider-admin-menu.css` in your theme instead of this plugin. See FAQ below.

Wider Admin Menu has been tested on WordPress versions 3.3 to 3.9.1.

This plugin will *leave no trace!* If you delete the plugin, all settings will be removed from the database. Guaranteed. However, simply deactivating it will leave your settings in place, as expected.

= Translations. =

Can you help? Contact me [here](http://www.wpmission.com/contact/).

== Installation ==

1. Upload the `wider-admin-menu` folder to your `/wp-content/plugins/` directory
1. Activate the plugin through the `Plugins` menu in WordPress
1. Go to the `Settings > Wider Admin Menu` page.
1. Smile.

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

Need a hand? I'm on the support forum.

= Leave no trace? What's that about? =

Some plugins and themes don't fully uninstall everything they installed; things like settings, database tables, subdirectories. That bugs me. Sometimes, it bugs your WordPress too. For the most part, it's harmless but my thinking is "Why risk it? Why not clean up after yourself?" 

Perhaps the best reason for leaving no trace is to make it easier to debug later. As a WordPress mechanic, I have wasted time tracking down leftover settings just to rule them out as suspects because their plugin or theme was removed.

So this plugin will completely remove itself upon deletion. Deactivating the plugin will leave the settings intact, though. As an added bonus, you can switch off "Leave No Trace" so the settings remain after deletion, if you want.

= I have a feature request. =

Please submit feature requests on the support forum.

= I need a WordPress mechanic. / I have a plugin idea. =

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
