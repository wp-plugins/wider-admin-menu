<?php
/*
	Plugin Name: Wider Admin Menu
	Description: Adjust the width of the Admin Menu to accomodate long menu items.
	Author: Chris Dillon
	Version: 0.2.2
	Author URI: http://wpmission.com
	Text Domain: wpmission
	License: GPL2

	Copyright 2014 • Chris Dillon • chris@wpmission.com

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
	Install with default setting.
*/
function wpmwam_install()
{
	$options = array(
			'wpmwam_width' => 200,
			'wpmwam_lnt' => 1
	);
	update_option( 'wpmwam_options', $options );
}
register_activation_hook( __FILE__, 'wpmwam_install' );


/*
	Uninstall and leave no trace.
*/ 
function wpmwam_uninstall()
{
	$options = get_option( 'wpmwam_options' );
	if( $options['wpmwam_lnt'] )
		delete_option( 'wpmwam_options' );
}
register_uninstall_hook( __FILE__, 'wpmwam_uninstall' );


/*
	Localization
*/
function wpmwam_init() 
{
	load_plugin_textdomain( 'wpmwam', false, 
	plugin_basename( dirname( __FILE__ ) . '/localization' ) );
}
add_action( 'init', 'wpmwam_init' );


/*
	Load styles and scripts.
*/
function wpmwam_admin_style( $hook ) 
{
	// Are we on our settings page?
	if( 'settings_page_wider-admin-menu' == $hook )
	{
		wp_enqueue_style( 'nouislider-style',	plugins_url( '/css/jquery.nouislider.min.css', __FILE__ ) );
		wp_register_script( 'nouislider', plugins_url( '/js/jquery.nouislider.min.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'nouislider' );
		
		wp_enqueue_style( 'wpmwam-options',	plugins_url( '/css/options.css', __FILE__ ) );
		wp_register_script( 'wpmwam-script', plugins_url( '/js/wider-admin-menu.js', __FILE__ ), array( 'nouislider' ) );
		wp_enqueue_script( 'wpmwam-script' );
	}
}
add_action( 'admin_enqueue_scripts', 'wpmwam_admin_style' );


/*
	Insert custom admin style.
*/
function wpmwam_custom_admin_style()
{
	$wp_version = get_bloginfo( 'version' );
	$ver_parts = explode( '.', $wp_version );
	$major = (int) $ver_parts[0];
	$minor = (int) $ver_parts[1];
	$patch = isset( $ver_parts[2] ) ? (int) $ver_parts[2] : 0;
	
	// Get width option. Prevent zero in case of installation error.
	$wpmwam = get_option( 'wpmwam_options' );
	$w = (int) $wpmwam['wpmwam_width'];
	if( !$w ) $w = 160;
	$wpx = $w . 'px';
	$w1px = ( $w + 1 ) . 'px';
	$w2px = ( $w + 20 ) . 'px';

	// start output buffer
	ob_start();
	?>
<style>
	/* Wider Admin Menu for WordPress <?php echo $wp_version; ?> */
<?php if( $major >= 3 && $minor >= 8 ) : ?>
	#wpcontent,
	#wpfooter {
		margin-left: <?php echo $w2px; ?>;
	}
	#adminmenuback,
	#adminmenuwrap,
	#adminmenu,
	#adminmenu .wp-submenu {
		width: <?php echo $wpx; ?>;
	}
	#adminmenu .wp-submenu {
		left: <?php echo $wpx; ?>;
	}
	#adminmenu .wp-not-current-submenu .wp-submenu,
	.folded #adminmenu .wp-has-current-submenu .wp-submenu {
		min-width: <?php echo $wpx; ?>;
	}
<?php else : ?>
	#wpcontent,
	#footer {
		margin-left: <?php echo $w2px; ?>;
	}
	#adminmenuback,
	#adminmenuwrap,
	#adminmenu,
	#adminmenu .wp-submenu,
	#adminmenu .wp-submenu-wrap,
	.folded #adminmenu .wp-has-current-submenu .wp-submenu {
		width: <?php echo $wpx; ?>;
	}
	#adminmenu li .wp-submenu,
	.folded #adminmenu .wp-has-current-submenu .wp-submenu {
		left: <?php echo $w1px; ?>;
	}
	.wp-menu-arrow {
		-moz-transform:    translate( <?php echo $w1px; ?> );
		-webkit-transform: translate( <?php echo $w1px; ?> );
		-o-transform:      translate( <?php echo $w1px; ?> );
		-ms-transform:     translate( <?php echo $w1px; ?> );
		transform:         translate( <?php echo $w1px; ?> );
	}
	#adminmenu li.wp-not-current-submenu .wp-menu-arrow {
		-moz-transform:    translate( <?php echo $wpx; ?> );
		-webkit-transform: translate( <?php echo $wpx; ?> );
		-o-transform:      translate( <?php echo $wpx; ?> );
		-ms-transform:     translate( <?php echo $wpx; ?> );
		transform:         translate( <?php echo $wpx; ?> );
	}
<?php endif; ?>
</style>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
}
add_action( 'admin_head', 'wpmwam_custom_admin_style' );


/*
	Add options page to Settings menu.
*/
function wpmwam_add_options_page() 
{
	add_options_page( 'Wider Admin Menu', 'Wider Admin Menu', 'manage_options', basename( __FILE__ ), 'wpmwam_page' );
	add_action( 'admin_init', 'wpmwam_register_settings' );
}
add_action( 'admin_menu', 'wpmwam_add_options_page' );


/*
	Register the setting.
*/
function wpmwam_register_settings()
{
	register_setting( 'wpmwam_settings_group', 'wpmwam_options', 'wpmwam_sanitize_options' );
}


/*
	Sanitize user input.
	If options are stored in an array, each element must be treated separately.
*/
function wpmwam_sanitize_options( $input )
{
	$input['wpmwam_width'] = sanitize_text_field( $input['wpmwam_width'] );
	
	// checkbox
	if( isset( $input['wpmwam_lnt'] ) )
		$input['wpmwam_lnt'] = 1;
	else
		$input['wpmwam_lnt'] = 0;
		
	return $input;
}


/*
	The options page.
*/
function wpmwam_page() 
{
	if( !current_user_can( 'manage_options' ) )
		return false;
		
	?>
	<div class="wrap">
	
		<h2><?php _e( 'Wider Admin Menu', 'wpmwam' ); ?></h2>
		
		<p><?php _e( 'Adjust the width of the Admin Menu to accomodate longer menu items.', 'wpmwam' ); ?></p>
		
		<form method="post" action="options.php">
		
			<?php
			// version-based CSS classes
			$wp_version = get_bloginfo( 'version' );
			$ver_parts = explode( '.', $wp_version );
			$major = (int) $ver_parts[0];
			$minor = (int) $ver_parts[1];
			$patch = isset( $ver_parts[2] ) ? (int) $ver_parts[2] : 0;
			if( $major >= 3 && $minor >= 8 )
			{
				$version_class = 'ver38';
				$reset_class = 'dashicons dashicons-undo';
			}
			else
			{
				$version_class = 'pre-ver38';
				$reset_class = 'undo';
			}
			
			$default_width = 160;
			settings_fields( 'wpmwam_settings_group' );
			$wpmwam_options = get_option( 'wpmwam_options' );
			$wpmwam_width = $wpmwam_options['wpmwam_width'];
			if( !$wpmwam_width ) $wpmwam_width = $default_width;
			?>
			
			<input type="hidden" name="wp_version" value="<?php echo $wp_version; ?>">
			
			<table class="form-table wpmwam" style="width: auto;">
				<tr>
					<td>New</td>
					<td class="input">
						<input id="wpmwam_width" type="text" name="wpmwam_options[wpmwam_width]" 
								value="<?php esc_attr_e( $wpmwam_width ); ?>" 
								size="8" maxlength="8" tabindex="1">px
					</td>
					<td class="slider">
						<div id="nouislider-wrap">
							<div id="nouislider"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td>Current</td>
					<td><span id="wpmwam_current" class="box <?php echo $version_class; ?>"><?php esc_attr_e( $wpmwam_width ); ?></span>px</td>
					<td class="lefted">
						<a id="reset-current" class="<?php echo $reset_class; ?>" href="#" title="<?php _e( 'revert to the current width', 'wpmwam' ); ?>"></a>
					</td>
				</tr>
				<tr>
					<td>Default</td>
					<td><span id="wpmwam_default" class="box <?php echo $version_class; ?>"><?php echo $default_width; ?></span>px</td>
					<td class="lefted">
							<a id="reset-default" class="<?php echo $reset_class; ?>" href="#" title="<?php _e( 'restore default width', 'wpmwam' ); ?>"></a>
					</td>
				</tr>
			</table>
			
			<div class="option leave-no-trace">
				<div class="onoffswitch">
					<input id="myonoffswitch" type="checkbox" name="wpmwam_options[wpmwam_lnt]" 
							class="onoffswitch-checkbox" value="1" <?php checked( 1, $wpmwam_options['wpmwam_lnt'] ); ?>>
					<label class="onoffswitch-label" for="myonoffswitch">
						<div class="onoffswitch-inner"></div>
						<div class="onoffswitch-switch"></div>
					</label>
				</div>
				<label for="myonoffswitch"><div class="option-label"><?php _e( 'Leave No Trace', 'wpmwam' ); ?></div></label>
				<div class="option-desc">
					<?php _e( 'Deleting this plugin will also delete these settings.<br>Deactivating it will <b>not</b> delete these settings.', 'wpmwam' ); ?>
				</div>
			</div>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save', 'wpmwam' ); ?>" tabindex="2">
			</p>
			
		</form>
		
	</div>
	<?php
}
