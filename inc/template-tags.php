<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package katodians
 */

if ( ! function_exists( 'katodians_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function katodians_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$permalink = get_permalink();

		if (is_single()){
			$single_class='metadata-is-single';
		}
		else{
			$single_class='';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'katodians' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-calendar-alt"></i> ' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'katodians' ),
			'<span class="author vcard '.$single_class.'"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="far fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline '.$single_class.'"> ' . $byline . '</span> <span class="posted-on '.$single_class.'">' . $posted_on . '</span> ';
		echo '<span class="permalink '.$single_class.'"><a href="'.$permalink.'"><i class="fas fa-link"></i> Permalink</a></span>';

	}
endif;

if ( ! function_exists( 'katodians_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function katodians_entry_footer() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			//$comments_link = comments_link();
			echo '<span class="comments-link">';
			echo '<a href="'.get_comments_link().'">';
			echo ' <i class="far fa-comment"></i> ';
			echo comments_number('0','1','%');
			echo '</a></span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'katodians' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
