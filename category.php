<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package katodians
 */

get_header();
$current_cat = get_queried_object();
$category_images = get_option( 'category_term_images' );
$current_cat_img = $category_images[$current_cat->cat_ID];
?>

	<div id="primary" class="content-area">
			<div class="container">
				<?php echo the_breadcrumb(); ?>
			<div class="row">
				<?php if ( have_posts() ) : ?>
					<div class="col-12">
						<div class="category-description">
							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
								?>
							</header><!-- .page-header -->
							<div class="row">
								<div class="col-md-12 col-lg-6">
									<?php the_archive_description( '<div class="cat-text">', '</div>' ); ?>
								</div>
								<div class="col-md-12 col-lg-6">
									<div class="cat-image">
										<img src="<?php  echo $current_cat_img; ?>">
									</div>
								</div>
							</div>
						</div>
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
