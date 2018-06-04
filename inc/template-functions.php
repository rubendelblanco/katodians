<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package katodians
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function katodians_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'katodians_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function katodians_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'katodians_pingback_header' );

/**
 * Check if a default featured image exists.
 * If not, loads the default thumb.
 */
function katodians_filter_post_thumbnail_html( $html ) {
    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $html ) {
        return '<img src="' . get_template_directory_uri() . '/images/default-image.png" width="150px" height="100px" class="image-size-name" />';
    }
    // Else, return the post thumbnail
    return $html;
}
add_filter( 'post_thumbnail_html', 'katodians_filter_post_thumbnail_html' );
