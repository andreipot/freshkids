<?php

class PB_Social_Hashtag_Admin {

	public function __construct() {
		// Add an options page to the admin menu.
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Register the options page in the menu.
	 */
	public function admin_menu() {
		add_options_page( __( 'Social Hashtag Import', 'pollen' ), __( 'Social Hashtag Import', 'pollen' ), 'manage_options', 'social-hashtag-import', array( $this, 'display_settings' ) );
	}

	/**
	 * Display the options page.
	 */
	public function display_settings() {
		$settings = PB_Social_Hashtag_Settings::get_instance();

		// Get current settings.
		$values = $settings->get_settings();

		// If the nonce is set the form has been submitted.
		if ( isset( $_POST['pb_shi_settings_nonce'] ) ) {

			// Verify the request.
			if (  wp_verify_nonce( $_POST['pb_shi_settings_nonce'], 'pb_shi_save_settings' ) ) {

				// Loop through settings and check for an updated value.
				foreach ( $values as $key => $value ) {

					// If setting found in post array add to values array.
					if ( isset( $_POST[ $key ] ) ) {
						$values[ $key ] = ( 'post_blacklist' == $key ) ? esc_textarea( $_POST[ $key ] ) : sanitize_text_field( $_POST[ $key ] );
					}

				}

				// Update settings.
				$settings->update_settings( $values );

				// Display settings updated message.
				echo '<div id="message" class="updated"><p>Settings updated.</p></div>';
			}

		} ?>

		<div class="wrap">
			<h2><?php _e( 'Social Hashtag Import', 'pollen' ); ?></h2>

			<form method="post" action="">
				<?php wp_nonce_field( 'pb_shi_save_settings', 'pb_shi_settings_nonce' ); ?>

				<h3 class="title">Twitter Keys</h3>

				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="twitter_consumer_key">Consumer Key:</label></th>
							<td><input type="text" name="twitter_consumer_key" id="twitter_consumer_key" value="<?php echo esc_attr( $values['twitter_consumer_key'] ); ?>" class="regular-text ltr" /></td>
						</tr>

						<tr>
							<th scope="row"><label for="twitter_consumer_secret">Consumer Secret:</label></th>
							<td><input type="text" name="twitter_consumer_secret" id="twitter_consumer_secret" value="<?php echo esc_attr( $values['twitter_consumer_secret'] ); ?>" class="regular-text ltr" /></td>
						</tr>

						<tr>
							<th scope="row"><label for="twitter_access_token">Access Token:</label></th>
							<td><input type="text" name="twitter_access_token" id="twitter_access_token" value="<?php echo esc_attr( $values['twitter_access_token'] ); ?>" class="regular-text ltr" /></td>
						</tr>

						<tr>
							<th scope="row"><label for="twitter_access_token_secret">Access Token Secret:</label></th>
							<td><input type="text" name="twitter_access_token_secret" id="twitter_access_token_secret" value="<?php echo esc_attr( $values['twitter_access_token_secret'] ); ?>" class="regular-text ltr" /></td>
						</tr>
					</tbody>
				</table>

				<h3 class="title">Instagram Keys</h3>

				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="instagram_api_key">API Key:</label></th>
							<td><input type="text" name="instagram_api_key" id="instagram_api_key" value="<?php echo esc_attr( $values['instagram_api_key'] ); ?>" class="regular-text ltr" /></td>
						</tr>

						<tr>
							<th scope="row"><label for="instagram_api_secret">API Secret:</label></th>
							<td><input type="text" name="instagram_api_secret" id="instagram_api_secret" value="<?php echo esc_attr( $values['instagram_api_secret'] ); ?>" class="regular-text ltr" /></td>
						</tr>

						<tr>
							<th scope="row"><label for="instagram_api_callback">API Callback:</label></th>
							<td><input type="url" name="instagram_api_callback" id="instagram_api_callback" value="<?php echo esc_attr( $values['instagram_api_callback'] ); ?>" class="regular-text ltr" /></td>
						</tr>
					</tbody>
				</table>

				<h3 class="title">Other</h3>

				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">Post Blacklist</th>
							<td>
								<fieldset>
									<legend class="screen-reader-text"><span>Post Blacklist</span></legend>
									<p><label for="post_blacklist">When a post contains any of these words in its content, name, URL, or IP, it will not be imported. One word or IP per line. It will match inside words, so “press” will match “WordPress”.</label></p>
									<p>
										<textarea name="post_blacklist" rows="10" cols="50" id="post_blacklist" class="large-text code"><?php echo esc_textarea( $values['post_blacklist'] ); ?></textarea>
									</p>
								</fieldset>
							</td>
						</tr>
					</tbody>
				</table>

				<div>
					<input type="submit" class='button-primary' name="update_pb_shi" value="<?php _e( 'Save' )?>" />
				</div>
			</form>
		</div>

		<?php
	}
}

$GLOBALS['pb_social_hashtag_admin'] = new PB_Social_Hashtag_Admin();