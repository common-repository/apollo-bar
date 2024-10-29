<?php

function apb_options_page() {

	global $apb_options;

	ob_start(); ?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php _e( 'Apollo Bar Options', 'apollo-bar' ); ?></h2>
		<p> <?php _e( 'The Apollo Bar is a simple notification plugin. This is a settings page. Setup the plugin color and other options. To add a notification text, go to Apollo Bar (custom post type) menu and create a new post, setup the Scheduling options and publish.', 'apollo-bar' ); ?> </p>

		<div class="postbox-container" style="width:70%; min-width:400px; padding: 0 20px 0 0;">
			<form method="post" action="options.php">

				<?php settings_fields( 'apb_settings_group' ); ?>

				<h3><?php _e( 'General Settings', 'apollo-bar' ); ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<label class="description" for="apb_settings[apollo_bar_display]"><?php _e( 'Enable Apollo Bar?', 'apollo-bar' ); ?></label>
						</th>
						<td>
							<input id="apb_settings[apollo_bar_display]" name="apb_settings[apollo_bar_display]" type="checkbox" value="1" <?php checked( '1', $apb_options['apollo_bar_display'] ); ?> />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label class="description" for="apb_settings[apollo_bar_title]"><?php _e( 'Enable Apollo Bar Logo?', 'apollo-bar' ); ?></label>
						</th>
						<td>
							<input id="apb_settings[apollo_bar_logo_display]" name="apb_settings[apollo_bar_logo_display]" type="checkbox" value="1" <?php checked( '1', $apb_options['apollo_bar_logo_display'] ); ?> />
						</td>
					</tr>
				</table>

				<h3><?php _e( 'Color Settings', 'apollo-bar' ); ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<label class="description" for="apb_settings[apollo_bar_color]"><?php _e( 'Chose a color skin', 'apollo-bar' ); ?></label>
						</th>
						<td>
							<?php $styles = array( 'blue', 'green', 'red' ); ?>
							<select id="apb_settings[apollo_bar_color]" name="apb_settings[apollo_bar_color]">
								<?php foreach ( $styles as $style ) { ?>
								<?php if( $apb_options['apollo_bar_color'] == $style ) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
								<option value="<?php echo $style; ?>" <?php echo $selected; ?>>
									<?php echo $style; ?>
								</option>
								<?php } ?>
							</select>
						</td>
					</tr>
				</table>

				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save', 'apollo-bar' ); ?>">
				</p>
			</form>
		</div>
		<div class="postbox-container" style="width:25%;min-width:200px;max-width:350px;">
			<div id="donate" class="apollo-bar" style="padding:11px 20px 20px 20px;border:1px solid #d4d4d4; background:#f8f8f8;margin-bottom:20px;">
				<h2><?php _e( 'Donate', 'apollo-bar' ); ?></h2>
				<p><?php _e( 'Want to help make this plugin even better? All donations are used to improve this plugin. Thanks! Donors enter their own contribution amount.', 'apollo-bar' ); ?></p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="AT7H43VEHN7UL">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<p><?php _e( 'Or', 'apollo-bar' ); ?>:</p>
				<ul>
					<li><a href="" target="_blank"><?php _e( 'Vote for the plugin on Wordpress.org.', 'apollo-bar' ); ?></a></li>
					<li><a href="http://www.code-art.hu/apollo-bar" target="_blank"><?php _e( 'Please refer to the side of plugin on your blog.', 'apollo-bar' ); ?></a></li>
				</ul>
			</div>
			<div id="promo" class="apollo-bar" style="padding:11px 20px 20px 20px;border:1px solid #d4d4d4; background:#f8f8f8;margin-bottom:20px;">
				<h2><?php _e( 'CodeArt', 'apollo-bar' ); ?></h2>
				<ul>
					<li><a href="https://twitter.com/code_art" target="_blank"><?php _e( 'Fallow us on Twitter', 'apollo-bar' ); ?></a></li>
					<li><a href="https://plus.google.com/b/108614031230703905838/108614031230703905838/posts" target="_blank"><?php _e( 'Fallow us on Google+', 'apollo-bar' ); ?></a></li>
					<li><a href="http://www.code-art.hu/feliratkozas" target="_blank"><?php _e( 'Newsletter Subscribe', 'apollo-bar' ); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php
	echo ob_get_clean();
}

function apb_add_options_link() {
	add_options_page( 'Apollo Bar Options Page', 'Apollo Bar', 'administrator', __FILE__, 'apb_options_page' );
}
add_action( 'admin_menu', 'apb_add_options_link' );

function apb_register_settings() {
	register_setting( 'apb_settings_group', 'apb_settings' );
}
add_action( 'admin_init', 'apb_register_settings' );
