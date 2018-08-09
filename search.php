<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package katodians
 */

get_header(); ?>

<div id="primary" class="content-area">
		<div class="container">
		<div class="row">
			<?php
			if (!wp_is_mobile()):
			?>
			<aside id="secondary" class="col-lg-3 col-md-3 col-sm-12">
			<?php
			get_sidebar();
			?>
			</aside>
			<?php
			endif;
			?>
			<div class="col-md-9 col-12">
			<?php if ( have_posts() ) : ?>
				<div class="col-12">
					<header class="page-header">
						<h1 class="page-title"><?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'katodians' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
					</header><!-- .page-header -->
				</div>
				<div class="row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					the_posts_pagination( array( 'mid_size' => 2,
						'prev_text' => __( '<<', 'textdomain' ),
						'next_text' => __( '>>', 'textdomain' ),
						'screen_reader_text' => ' ' ) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			</div>
			<?php
			if (wp_is_mobile()):
			?>
			<aside id="secondary" class="col-lg-3 col-md-3 col-sm-12">
			<?php
			get_sidebar();
			?>
			</aside>
			<?php
			endif;
			?>
		</div>
		</div>
</div><!-- #primary -->

<?php
get_footer();
