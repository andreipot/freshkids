<?php

class PB_Social_Hashtag_Settings {

	private static $instance;

	private $settings;

	/**
	 * @return PB_Social_Hashtag_Settings
	 */
	public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		$default_values = array(
			'twitter_consumer_key'        => '',
			'twitter_consumer_secret'     => '',
			'twitter_access_token'        => '',
			'twitter_access_token_secret' => '',
			'instagram_api_key'           => '',
			'instagram_api_secret'        => '',
			'instagram_api_callback'      => '',
			'post_blacklist'              => '',
		);

		$this->settings = array_merge( $default_values, (array) get_option( 'pb_shi_settings' ) );
	}

	/**
	 * Get settings array.
	 *
	 * @param string $filter Optional. Filter returned options to a group. Options: none, twitter, instagram
	 *
	 * @return array
	 */
	public function get_settings( $filter = 'none' ) {
		switch ( $filter ) {
			case 'twitter':
				return array(
					'consumer_key'              => $this->settings['twitter_consumer_key'],
					'consumer_secret'           => $this->settings['twitter_consumer_secret'],
					'oauth_access_token'        => $this->settings['twitter_access_token'],
					'oauth_access_token_secret' => $this->settings['twitter_access_token_secret'],
				);
				break;

			case 'instagram':
				return array(
					'apiKey'      => $this->settings['instagram_api_key'],
					'apiSecret'   => $this->settings['instagram_api_secret'],
					'apiCallback' => $this->settings['instagram_api_callback'],
				);
				break;

			default:
				return $this->settings;
		}
	}

	/**
	 * Update settings.
	 *
	 * @param array $settings
	 *
	 * @return bool
	 */
	public function update_settings( $settings ) {
		$this->settings =  $settings;
		update_option( 'pb_shi_settings', $settings );

		return true;
	}

	/**
	 * Have settings been entered for Twitter?
	 *
	 * @return bool
	 */
	function is_twitter_configured() {
		if ( ! empty( $this->settings['twitter_consumer_key'] )
		     && ! empty( $this->settings['twitter_consumer_secret'] )
		     && ! empty( $this->settings['twitter_access_token'] )
		     && ! empty( $this->settings['twitter_access_token_secret'] ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Have settings been entered for Instagram?
	 *
	 * @return bool
	 */
	function is_instagram_configured() {
		if ( ! empty( $this->settings['instagram_api_key'] )
		     && ! empty( $this->settings['instagram_api_secret'] )
		     && ! empty( $this->settings['instagram_api_callback'] ) ) {
			return true;
		} else {
			return false;
		}
	}

}