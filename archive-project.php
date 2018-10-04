<?php
get_header();
?>

	<div id="primary" class="content-area">
			<div class="container">
				<?php echo the_breadcrumb(); ?>
			<div class="row">
					<div class="col-12">
						<div class="category-description">
							<header class="page-header">
                <h1 class="page-title">
								<?php
									the_title();
								?>
                </h1>
							</header><!-- .page-header -->
							<div class="row">
								<div class="col-12">
									<?php echo get_post()->post_content; ?>
								</div>
							</div>
						</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<?php

          if ( have_posts() ) : ?>

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
							get_template_part( 'template-parts/content', 'project' );
							if ($counter == 2) {
								echo '</div>';
								$counter = 0;
							}
						endwhile;

						if ($counter !=0) echo '</div>';

						the_posts_pagination( array( 'mid_size' => 2,
							'prev_text' => __( '<<', 'textdomain' ),
							'next_text' => __( '>>', 'textdomain' ),
							'screen_reader_text' => ' ' ) );

					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>
			</div>
			</div>
	</div><!-- #primary -->

<?php
get_footer();
