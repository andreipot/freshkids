<?php
/**
 * Plugin Name: Social Hashtag Import
 * Plugin URI: http://soshedid.org
 * Description: Import posts from Twitter and Instagram for a hashtag.
 * Version: 1.0
 * Author: Pollen Brands
 * Author URI: http://pollenbrands.com/
 */

// Prevent execution if opened directly.
if ( ! function_exists( 'add_action' ) ) {
	echo 'This file can\'t be opened directly.';
	exit;
}

define( 'PB_SHI_PATH', plugin_dir_path( __FILE__ ) );

// Load Twitter API Class.
if ( ! class_exists( 'TwitterAPIExchange' ) ) {
	require_once( PB_SHI_PATH . 'twitter-api-php/TwitterAPIExchange.php' );
}

// Load Twitter Text Autolink Class.
if ( ! class_exists( 'Twitter_Autolink' ) ) {
	require_once( PB_SHI_PATH . 'twitter-text/Autolink.php' );
}

// Load Instagram API Class.
if ( ! class_exists( 'Instagram' ) ) {
	require_once( PB_SHI_PATH . 'instagram-api-php/instagram.class.php' );
}

require_once( PB_SHI_PATH . 'class-pb-social-hashtag-settings.php' );

// Load options class.
if ( is_admin() ) {
	require_once( PB_SHI_PATH . 'class-pb-social-hashtag-admin.php' );
}

/**
 * Add a WordPress CRON event to run the importer
 * every hour once the plugin is activated.
 */
function pb_shi_create_scheduled_import_event() {

	// Check if the import event is already scheduled.
	$timestamp = wp_next_scheduled( 'pb_shi_social_import' );

	if ( ! $timestamp ) {
		wp_schedule_event( time(), 'hourly', 'pb_shi_social_import' );
	}
}
register_activation_hook( __FILE__, 'pb_shi_create_scheduled_import_event' );

/**
 * Remove the WordPress CRON event when the plugin
 * is deactivated.
 */
function pb_shi_remove_scheduled_import_event() {
	wp_clear_scheduled_hook( 'pb_shi_social_import' );
}
register_deactivation_hook( __FILE__, 'pb_shi_remove_scheduled_import_event' );

/**
 * Register the celebrate post type.
 */
function pb_shi_register_post_type() {

	$labels = array(
		'name'                => _x( 'Social Media Posts', 'Post Type General Name', 'pollen' ),
		'singular_name'       => _x( 'Social Media Post', 'Post Type Singular Name', 'pollen' ),
		'menu_name'           => __( 'Social Media Post', 'pollen' ),
		'parent_item_colon'   => __( 'Parent Item:', 'pollen' ),
		'all_items'           => __( 'Social Media Posts', 'pollen' ),
		'view_item'           => __( 'View Item', 'pollen' ),
		'add_new_item'        => __( 'Add New Item', 'pollen' ),
		'add_new'             => __( 'Add New', 'pollen' ),
		'edit_item'           => __( 'Edit Item', 'pollen' ),
		'update_item'         => __( 'Update Item', 'pollen' ),
		'search_items'        => __( 'Search Item', 'pollen' ),
		'not_found'           => __( 'Not found', 'pollen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'pollen' ),
	);

	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
        'has_archive'         => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		/*'capability_type'     => 'page',*/
        'rewrite'                    => array('slug'=>'fresh-moms')
	);

	register_post_type( 'social_media_post', $args );
}
add_action( 'init', 'pb_shi_register_post_type', 0 );

/**
 * Register the 'Celebrate' taxonomy.
 */
function pb_shi_register_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Social Post Types', 'Taxonomy General Name', 'pollen' ),
		'singular_name'              => _x( 'Social Post Type', 'Taxonomy Singular Name', 'pollen' ),
		'menu_name'                  => __( 'Social Post Type', 'pollen' ),
		'all_items'                  => __( 'All Items', 'pollen' ),
		'parent_item'                => __( 'Parent Item', 'pollen' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pollen' ),
		'new_item_name'              => __( 'New Item Name', 'pollen' ),
		'add_new_item'               => __( 'Add New Item', 'pollen' ),
		'edit_item'                  => __( 'Edit Item', 'pollen' ),
		'update_item'                => __( 'Update Item', 'pollen' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pollen' ),
		'search_items'               => __( 'Search Items', 'pollen' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pollen' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'pollen' ),
		'not_found'                  => __( 'Not Found', 'pollen' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'rewrite'                    => array('slug'=>'fresh-moms-types')
	);

	register_taxonomy( 'social_post_type', array( 'social_media_post' ), $args );
}
add_action( 'init', 'pb_shi_register_taxonomy', 0 );

/**
 * Run the social import every hour on a WP CRON task.
 */
function pb_shi_perform_import() {
	$settings = PB_Social_Hashtag_Settings::get_instance();

	$opts = (array) get_option( 'pb_shi_import' );

	// Get the ID of the last tweet imported.
	$last_tweet_id = ( ! empty( $opts['last_tweet_id'] ) ) ? $opts['last_tweet_id'] : '';

	// Check if Twitter has been configured.
	if ( $settings->is_twitter_configured() ) {

		// Import tweets.
		$last_tweet_id = pb_shi_import_from_twitter( $last_tweet_id );

	}

	// Get the ID of the last Instagram post imported.
	$min_tag_id = ( ! empty( $opts['min_tag_id'] ) ) ? $opts['min_tag_id'] : '';

	// Check if Instagram has been configured.
	if ( $settings->is_instagram_configured() ) {

		// Import Instagram posts.
		$min_tag_id = pb_shi_import_from_instagram( $min_tag_id );

	}

	update_option( 'pb_shi_import', array(
		'last_tweet_id' => $last_tweet_id,
		'min_tag_id'    => $min_tag_id,
	) );
}
add_action( 'pb_shi_social_import', 'pb_shi_perform_import' );

/**
 * Import tweets. Send a GET request to Twitter
 * searching for tweets tagged #SoSheDid. Get
 * most recent 15 starting from the last imported
 * tweet.
 *
 * @param string $last_tweet_id
 *
 * @return string Last imported tweet ID.
 */
function pb_shi_import_from_twitter( $last_tweet_id = '' ) {

	// Authenticate with Twitter.
	$settings = PB_Social_Hashtag_Settings::get_instance();
	$twitter = new TwitterAPIExchange( $settings->get_settings( 'twitter' ) );

	// Submit a GET request, search for #SoSheDid.
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	$get = '?q=%23SoSheDid&result_type=recent';

	// If the last tweet ID is set only get tweets from that point.
	if ( ! empty( $last_tweet_id ) ) {
		$get .= '&since_id=' . $last_tweet_id;
	}

	$result = $twitter->setGetfield( $get )
	                  ->buildOauth( $url, 'GET' )
	                  ->performRequest();

	$decoded = json_decode( $result );
    print_r($result);

	// If tweets were found loop through them and import.
	if ( ! empty( $decoded->statuses ) ) {
		$count = 1;

		foreach ( $decoded->statuses as $status ) {

			// Most recent tweet first so set as last ID.
			if ( 1 === $count ) {
				$last_tweet_id = $status->id_str;
			}

			// Skip importing posts by @soshedidorg.
			if ( 'soshedidorg' == $status->user->screen_name ) {
				continue;
			}

			$tweet = $status->text;

			if ( isset( $status->retweeted_status ) ) {
				$tweet = sprintf( 'RT @%s: %s', $status->retweeted_status->user->screen_name, $status->retweeted_status->text );
			}

			// Prevent non-ASCII characters from causing issues when entering into the DB.
			$tweet = preg_replace('/[^(\x20-\x7F)]*/','', $tweet );

			$post_args = array(
				'post_title'    => substr( $tweet, 0, 40 ),
				'post_date_gmt' => date( 'Y-m-d H:i:s', strtotime( $status->created_at ) ),
			);

			$parsed_tweet = Twitter_Autolink::create( $tweet )
											->setNoFollow( false )
											->addLinks();

			$meta = array(
				'username' => $status->user->screen_name,
				'user_url' => 'https://twitter.com/' . $status->user->screen_name,
				'tweet'    => $parsed_tweet,
				'user_image'=> $status->user->profile_image_url
			);

			pb_shi_insert_post( $post_args, $meta,6 );

			$count++;
		}
	}

	return $last_tweet_id;
}

/**
 * Import Instagram posts. Send a GET request to
 * Instagram searching for images tagged #SoSheDid.
 * Get most recent 20 starting from the last imported
 * post.
 *
 * @param string $min_tag_id
 *
 * @return string Last imported Instagram post ID.
 */
function pb_shi_import_from_instagram( $min_tag_id = '' ) {
	$settings = PB_Social_Hashtag_Settings::get_instance();
	$instagram = new Instagram( $settings->get_settings( 'instagram' ) );
	$result = $instagram->getTagMedia('soshedid', 0, $min_tag_id);

	if ( isset( $result->meta->code ) && 200 == $result->meta->code ) {
		if ( isset( $result->pagination->min_tag_id ) ) {
			$min_tag_id = (string) $result->pagination->min_tag_id;
		}

		$count = 1;

		if ( ! empty( $result->data ) ) {
			foreach ( (array) $result->data as $post ) {
				$post_args = array(
					'post_title' => substr( $post->caption->text, 0, 40 ),
					'post_date_gmt' => date( 'Y-m-d H:i:s', $post->caption->created_time ),
					'tax_input' => array( 'Celebrate' => 9 ),
				);

				$meta = array(
					'username' => $post->user->username,
					'user_url' => esc_url( 'https://instagram.com/' . $post->user->username ),
					'image_url' => $post->images->standard_resolution->url,
					'link_to_photo' => $post->link,
				);

				pb_shi_insert_post( $post_args, $meta, 7 );

				$count++;
			}
		}
	}

	return $min_tag_id;
}

/**
 * Insert a post and update meta fields.
 *
 * @param array $post_args Args for wp_insert_post().
 * @param array $meta Associative array of meta keys and values.
 * @param int $term_id Term to associate post with in the Celebrate taxonomy.
 *
 * @return bool Post inserted successfully.
 */
function pb_shi_insert_post( $post_args, $meta = array(), $term_id = 0 ) {
	$default_args = array(
		'post_type'   => 'social_media_post',
		'post_status' => 'publish',
		'post_date'   => get_date_from_gmt( $post_args['post_date_gmt'] ),
	);

	// Combine the post args with some default to make up a complete array for wp_insert_post.
	$args = array_merge( $default_args, $post_args );

	$post_id = wp_insert_post( $args );

	if ( is_wp_error( $post_id ) ) {
		return false;
	}

	foreach ( (array) $meta as $meta_key => $meta_value ) {
		update_post_meta( $post_id, $meta_key, $meta_value );
	}

	// Apply the Celebrate term.
	wp_set_object_terms( $post_id, $term_id, 'social_post_type' );

	return true;
}

/**
 * Determine if a post should be banned. Check against a list of
 * words defined by the admin.
 *
 * @param string $content Post content.
 *
 * @return bool Post is banned?
 */
function pb_shi_is_post_banned( $content = '' ) {
	return true;
}