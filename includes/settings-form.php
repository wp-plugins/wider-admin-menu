<?php
/**
 * Wider Admin Menu > Settings > Form
 */
?>
<form method="post" action="options.php">
			
	<?php
	// version-based CSS classes
	if ( version_compare( $wp_version, '3.8', '>=' ) ) {
		$version_class = 'ver38';
		$reset_class = 'dashicons dashicons-undo';
	} else {
		$version_class = 'pre-ver38';
		$reset_class = 'undo';
	}
	
	$default_width = 160;
	settings_fields( 'wpmwam_settings_group' );
	$wpmwam_options = get_option( 'wpmwam_options' );
	$wpmwam_width = $wpmwam_options['wpmwam_width'];
	if ( ! $wpmwam_width )
		$wpmwam_width = $default_width;
	?>
	
	<input type="hidden" name="wp_version" value="<?php echo $wp_version; ?>">
	
	<table class="form-table wpmwam" style="width: auto;">
		<tr>
			<td><?php _e( 'New', 'wider-admin-menu' ); ?></td>
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
			<td><?php _e( 'Current', 'wider-admin-menu' ); ?></td>
			<td><span id="wpmwam_current" class="box <?php echo $version_class; ?>"><?php esc_attr_e( $wpmwam_width ); ?></span>px</td>
			<td class="lefted">
				<a id="reset-current" class="<?php echo $reset_class; ?>" href="#" title="<?php _e( 'revert to the current width', 'wider-admin-menu' ); ?>"></a>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Default', 'wider-admin-menu' ); ?></td>
			<td><span id="wpmwam_default" class="box <?php echo $version_class; ?>"><?php echo $default_width; ?></span>px</td>
			<td class="lefted">
					<a id="reset-default" class="<?php echo $reset_class; ?>" href="#" title="<?php _e( 'restore default width', 'wider-admin-menu' ); ?>"></a>
			</td>
		</tr>
	</table>
	
	<div class="option leave-no-trace">
		<div class="onoffswitch">
			<input id="myonoffswitch" type="checkbox" name="wpmwam_options[wpmwam_lnt]" class="onoffswitch-checkbox" value="1" <?php checked( 1, $wpmwam_options['wpmwam_lnt'] ); ?>>
			<label class="onoffswitch-label" for="myonoffswitch">
				<div class="onoffswitch-inner"></div>
				<div class="onoffswitch-switch"></div>
			</label>
		</div>
		<label for="myonoffswitch"><div class="option-label"><?php _e( 'Leave No Trace', 'wider-admin-menu' ); ?></div></label>
		<div class="option-desc">
			<?php _e( 'Deleting this plugin will also delete these settings.', 'wider-admin-menu' ); ?><br>
			<?php _e( 'Deactivating it will <strong>not</strong> delete these settings.', 'wider-admin-menu' ); ?>
		</div>
	</div>
	
	<?php submit_button(); ?>
	
</form>
