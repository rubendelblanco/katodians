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
        return '<img src="' . get_template_directory_uri() . '/images/default-image.png" width="150px" height="100px" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" />';
    }
    // Else, return the post thumbnail
    return $html;
}
add_filter( 'post_thumbnail_html', 'katodians_filter_post_thumbnail_html' );

/**
* Customizing admin WYSIWYG
*/
function add_style_select_button($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'add_style_select_button');

// add custom styles to the WordPress editor

function katodians_wysiwyg_insert_formats( $init_array ) {

$style_formats = array(
	// These are the custom styles
	array(
		'title' => 'Info',
		'inline' => 'div',
		'classes' => 'katodian-msg alert alert-info',
		'wrapper' => true,
	),
	array(
		'title' => 'Success',
		'block' => 'div',
		'classes' => 'katodian-msg alert alert-success',
		'wrapper' => true,
	),
	array(
		'title' => 'Warning',
		'block' => 'div',
		'classes' => 'katodian-msg alert alert-warning',
		'wrapper' => true,
	),
	array(
		'title' => 'Danger',
		'block' => 'div',
		'classes' => 'katodian-msg alert alert-danger',
		'wrapper' => true,
	),
);
// Insert the array, JSON ENCODED, into 'style_formats'
$init_array['style_formats'] = json_encode( $style_formats );

return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'katodians_wysiwyg_insert_formats' );

/**
* katodians_get_highest_rated
* Customizing get_highest_rated function from wp-postratings plugin
* @return query array
*/
if(!function_exists('katodians_get_highest_rated')) {
	function katodians_get_highest_rated($mode = '', $min_votes = 0, $limit = 10, $chars = 0, $display = true) {
		global $wpdb;
		$ratings_max = intval(get_option('postratings_max'));
		$ratings_custom = intval(get_option('postratings_customrating'));

		if(!empty($mode) && $mode != 'both') {
			$where = $wpdb->prepare( "$wpdb->posts.post_type = %s", $mode );
		} else {
			$where = '1=1';
		}
		if($ratings_custom && $ratings_max == 2) {
			$order_by = 'ratings_score';
		} else {
			$order_by = 'ratings_average';
		}
		$temp = stripslashes(get_option('postratings_template_highestrated'));
		$sql = $wpdb->prepare(
			"SELECT DISTINCT $wpdb->posts.ID, $wpdb->posts.post_title, $wpdb->posts.post_author, $wpdb->posts.post_date, (t1.meta_value+0.00) AS ratings_average, (t2.meta_value+0.00) AS ratings_users, (t3.meta_value+0.00) AS ratings_score FROM $wpdb->posts LEFT JOIN $wpdb->postmeta AS t1 ON t1.post_id = $wpdb->posts.ID LEFT JOIN $wpdb->postmeta As t2 ON t1.post_id = t2.post_id LEFT JOIN $wpdb->postmeta AS t3 ON t3.post_id = $wpdb->posts.ID WHERE t1.meta_key = 'ratings_average' AND t2.meta_key = 'ratings_users' AND t3.meta_key = 'ratings_score' AND $wpdb->posts.post_password = '' AND $wpdb->posts.post_date < NOW() AND $wpdb->posts.post_status = 'publish' AND t2.meta_value >= %d AND $where ORDER BY $order_by DESC, ratings_users DESC LIMIT %d",
			$min_votes,
			$limit
		);

		if ( false === ( $highest_rated = wp_cache_get( $cache_key = 'get_highest_rated_' . md5($sql), $cache_group = 'wp-postratings' ) ) ) {
			$highest_rated = $wpdb->get_results( $sql, ARRAY_A );
			wp_cache_add( $cache_key, $highest_rated, $cache_group, HOUR_IN_SECONDS );
		}

		// Prime the post caches if need be.
		_prime_post_caches( wp_list_pluck( $highest_rated, 'ID' ) );

		// Add the post objects
		/*foreach ( $most_rated as $i => $post_rating ) {
			$most_rated[ $i ] = (object) array_merge( $post_rating, (array)get_post( $post_rating['ID'] ) );
		}*/

		return $highest_rated;

	}
}


/**
 * Extends category admin page.
 */
require get_template_directory() . '/inc/admin-terms.php';
