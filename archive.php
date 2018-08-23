<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package katodians
 */

get_header(); ?>

	<div id="primary" class="content-area">
			<div class="container">
				<?php echo the_breadcrumb(); ?>
			<div class="row">
				<?php if ( have_posts() ) : ?>
					<div class="col-12">
						<header class="page-header">
							<?php
								if ( is_sticky()):
									echo '<div class="featured-sticky">'.__('FEATURED').'</div>';
								endif;
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
				</div>
			<?php endif; ?>
			</div>
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

						<?php
						$counter = 0;
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							$counter++;

							if ($counter == 1) echo '<div class="row">';
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

							if ($counter == 2) {
								echo '</div>';
								$counter = 0;
							}
						endwhile;

						the_posts_pagination( array( 'mid_size' => 2,
							'prev_text' => __( '<<', 'textdomain' ),
							'next_text' => __( '>>', 'textdomain' ),
							'screen_reader_text' => ' ' ) );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
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
