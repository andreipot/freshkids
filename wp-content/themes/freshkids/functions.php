<?php

define( 'PB_INCLUDES_DIR', get_template_directory() . '/includes/' );
define( 'THEME_DIR', get_template_directory_uri());

// Foundation menu walker.
require_once( PB_INCLUDES_DIR . 'class-pb-foundation-menu-walker.php' );

// Various clean up functions.
require_once( PB_INCLUDES_DIR . 'cleanup.php' );

// Foundation compatibility functions.
require_once( PB_INCLUDES_DIR . 'foundation-compatibility.php' );

// Register custom post types and taxonomies.
require_once( PB_INCLUDES_DIR . 'post-types-taxonomies.php' );

/**
 * Register theme support for menus, thumbnails, feed links and post formats.
 */
function pb_theme_setup() {

	// Add language support.
	load_theme_textdomain( 'pollen', get_template_directory() . '/languages' );

	// Add menu support.
	add_theme_support( 'menus' );

	// Add post thumbnail support.
	add_theme_support( 'post-thumbnails' );

	// rss thingy.
	add_theme_support( 'automatic-feed-links' );

	// Add post formats support.
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat', ) );

	// Add HTML5 support.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

	// New WordPress title tag support.
	add_theme_support( 'title-tag' );

	// Register custom image sizes.

	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu',
	) );
}
add_action( 'after_setup_theme', 'pb_theme_setup' );

/**
 * Register widget areas.
 */
function pb_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'pollen' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Page sidebar widget area.', 'pollen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'pollen' ),
        'id'            => 'blog',
        'description'   => __( 'Blog sidebar widget area.', 'pollen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );


    register_sidebar( array(
		'name'          => __( 'Footer Menus', 'pollen' ),
		'id'            => 'footer-menu',
		'description'   => __( 'Additional footer menus.', 'pollen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'pb_widgets_init' );

/**
 * Load scripts and stylesheets.
 */
function pb_enqueue_scripts_styles() {
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700|Fresca|Asap:400,700' );
	wp_enqueue_style( 'freshkids', get_template_directory_uri() . '/css/style.css' );

	// Load the main JS file.
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'freshkids', get_template_directory_uri() . '/js/freshkids.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'salvattore', get_template_directory_uri() . '/js/salvattore.min.js', array( 'jquery' ), false, true );




    //infinite scroll

    wp_enqueue_script( 'infinitescroll', get_template_directory_uri() . '/js/infinitescroll.js', array( 'jquery' ), false, true );

    wp_register_script( 'imgloaded', get_template_directory_uri() . '/bower_components/imagesloaded/imagesloaded.pkgd.min.js', array( 'jquery'), false, true );
    wp_enqueue_script( 'imgloaded' );


    // Load the iso Js
    wp_enqueue_script( 'isopkd', get_template_directory_uri() . '/js/isotope.pkgd.js', array( 'jquery' ), false, true );

	if ( is_single() ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script( 'freshkids-main', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'pb_enqueue_scripts_styles' );

/**
 * Add additional classes to body element.
 *
 * Add blog classes to home and archives. Add page class to 404.
 *
 * @param array $classes
 * @return array
 */
function pb_filter_body_class( $classes ) {
	if ( is_home() ) {
		$classes[] = 'blog-index';
	} elseif ( is_category() || is_tag() ) {
		$classes[] = 'blog';
	} elseif ( is_404() ) {
		$classes[] = 'page';
	}

	return $classes;
}
add_filter( 'body_class', 'pb_filter_body_class' );


//add svg icon to main menu
function pb_filter_custom_menu_title($title, $ID)
{
    $svg_title = array(
        'about' => 'about',
        'products'=>'products',
        'retailers'=>'school',
        'fresh moms'=>'mons',
        'contact'=>'contact'
    );
    $svg_text = array_key_exists(strtolower($title), $svg_title) ? $svg_title[strtolower($title)] : 'news';
    $menu_icon = '<svg class="icon_36"><use xlink:href="#svg_nav_'.$svg_text.'"></use></svg>';
    if(!is_single()){
        $title = $menu_icon.$title;
    }
    return $title;
}

//get all blog post categories...
function pb_get_post_category_list($ID = 0)
{
    $post_categories = wp_get_post_categories($ID);
    foreach($post_categories as $category):
        $cat = get_category($category);
        echo '<li><a href="#">'.$cat->name.'</a></li>';
        if(end($post_categories) != $category)
            echo '<li><a>/</a></li>';
    endforeach;
}

//register custom post types for products

function pb_register_product_post_type() {

    $labels = array(
        'name'                => _x( 'Products', 'Post Type General Name', 'pollen' ),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'pollen' ),
        'menu_name'           => __( 'Products', 'pollen' ),
        'parent_item_colon'   => __( 'Parent Item:', 'pollen' ),
        'all_items'           => __( 'All Products', 'pollen' ),
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
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'supports'            => array('title','thumbnail','editor','excerpt')
    );

    register_post_type( 'product', $args );
}
add_action( 'init', 'pb_register_product_post_type', 0 );

//add custom gravity form submit function

function gf_submit_button($button, $form) {
    return '<button class="button round" id="gform_submit_button_'.$form['id'].'">'.$form['button']['text'].'</button>';
}
add_filter('gform_submit_button','gf_submit_button', 10, 2);

