<?php
/**
 * brian-weber functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brian-weber
 */

if ( ! function_exists( 'brian_weber_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function brian_weber_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on brian-weber, use a find and replace
	 * to change 'brian-weber' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'brian-weber', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'brian-weber' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'brian_weber_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'brian_weber_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brian_weber_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'brian_weber_content_width', 640 );
}
add_action( 'after_setup_theme', 'brian_weber_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brian_weber_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'brian-weber' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'brian-weber' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'brian_weber_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function brian_weber_scripts() {

	wp_enqueue_style( 'brian-weber-foundation-styles',  get_template_directory_uri() . '/layouts/foundation.min.css' );
	
	wp_enqueue_style( 'brian-weber-style', get_stylesheet_uri() );

	wp_enqueue_script( 'brian-weber-jquery', get_template_directory_uri() . '/js/jquery.min.js', array() );

	wp_enqueue_script( 'brian-weber-what-input', get_template_directory_uri() . '/js/what-input.min.js', array('jquery') );

	wp_enqueue_script( 'brian-weber-foundtion', get_template_directory_uri() . '/js/foundation.min.js', array('brian-weber-jquery', 'brian-weber-what-input') );

	wp_enqueue_script( 'brian-weber-app', get_template_directory_uri() . '/js/app.js', array('brian-weber-jquery', 'brian-weber-what-input', 'brian-weber-foundtion') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'brian_weber_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom theme logo.
 */

function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 443,
		'width'       => 373,
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

/**
 * Multiple Featured Images.
 */
add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
        'id' => 'featured-image',
        'desc' => 'Set an additonal img.',
        'label_name' => 'Featured Image 2',
        'label_set' => 'Set featured image 2',
        'label_remove' => 'Remove additonal img',
        'label_use' => 'Set additonal img',
        'post_type' => array( 'page' ),
    );

    $featured_images[] = $args;
    return $featured_images;
});

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
        'id' => 'modal-image',
        'desc' => 'This image will display first in the pop-up modal.',
        'label_name' => 'Modal Image 1',
        'label_set' => 'Set Modal Image 1',
        'label_remove' => 'Remove Modal Image 1',
        'label_use' => 'Set Modal Image 1',
        'post_type' => array( 'work' ),
    );

    $featured_images[] = $args;
    return $featured_images;
});

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
        'id' => 'modal-image2',
        'desc' => 'This image will display second in the pop-up modal.',
        'label_name' => 'Modal Image 2',
        'label_set' => 'Set Modal Image 2',
        'label_remove' => 'Remove Modal Image 2',
        'label_use' => 'Set Modal Image 2',
        'post_type' => array( 'work' ),
    );

    $featured_images[] = $args;
    return $featured_images;
});

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
        'id' => 'modal-image3',
        'desc' => 'This image will display third in the pop-up modal.',
        'label_name' => 'Modal Image 3',
        'label_set' => 'Set Modal Image 3',
        'label_remove' => 'Remove Modal Image 3',
        'label_use' => 'Set Modal Image 3',
        'post_type' => array( 'work' ),
    );

    $featured_images[] = $args;
    return $featured_images;
});

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
        'id' => 'modal-image4',
        'desc' => 'This image will display fourth in the pop-up modal.',
        'label_name' => 'Modal Image 4',
        'label_set' => 'Set Modal Image 4',
        'label_remove' => 'Remove Modal Image 4',
        'label_use' => 'Set Modal Image 4',
        'post_type' => array( 'work' ),
    );

    $featured_images[] = $args;
    return $featured_images;
});