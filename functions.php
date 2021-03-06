<?php
/**
 * katodians functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package katodians
 */

if ( ! function_exists( 'katodians_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function katodians_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on katodians, use a find and replace
		 * to change 'katodians' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'katodians', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'katodians' ),
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


		//Add theme support for some post formats
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'link' ) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'katodians_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 150,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		set_post_thumbnail_size( 150, 150 );
	}
endif;
add_action( 'after_setup_theme', 'katodians_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function katodians_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'katodians_content_width', 640 );
}
add_action( 'after_setup_theme', 'katodians_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function katodians_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'katodians' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'katodians' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'katodians_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function katodians_scripts() {
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css',false,'4.0','all');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css',false,'1.0','all');
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.min.css',false,'1.0','all');

	if (!is_home())
		wp_enqueue_style( 'sidebar-right', get_template_directory_uri() . '/css/sidebar-content.css',false,'1.0','all');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome-all.min.css',false,'1.0','all');
	wp_enqueue_style( 'katodians-style', get_stylesheet_uri() );

	wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
  wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.0.0', true );
	wp_enqueue_script( 'katodians-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'katodians-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'katodians-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '20151215', true );
	wp_enqueue_script( 'katodians-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'katodians_scripts' );

/**
* Enqueue scripts and styles in admin panel.
*/
function katodians_admin_scripts(){
	  wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin-style.css',false,'1.0','all');
		wp_enqueue_script( 'katodians-admin-scripts', get_template_directory_uri() . '/js/admin-scripts.js', array(), '20180919', false );
}

add_action('admin_head', 'katodians_admin_scripts');

/**
* Customize excerpt word length
*/
function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
* Erase 'category:','archive:','tag:' from archive titles
* https://gretathemes.com/guides/remove-category-title-category-pages/
*/
function prefix_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
		elseif ( is_tag() ) {

    	$title = single_tag_title( '', false );

    } elseif ( is_author() ) {

      $title = '<span class="vcard">' . get_the_author() . '</span>' ;

    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_archive_title' );


/**
* get breadcrumbs
*/
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Related posts functions.
 */
require get_template_directory() . '/inc/related-posts.php';

/**
 * Implement the Custom Post Types.
 */
require get_template_directory() . '/inc/post-types.php';

/**
*  Implement custom taxonomies
*/
require get_template_directory() . '/inc/taxonomies.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
