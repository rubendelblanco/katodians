<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package katodians
 */

get_header();

  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

	<div id="primary" class="content-area">
			<div class="container">
				<?php echo the_breadcrumb(); ?>
			<div class="row">
				<?php if ( have_posts() ) : ?>
					<div class="col-12">
						<div class="author-info">
							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
								?>
							</header><!-- .page-header -->
              <div class="row">
                <div class="col-12 col-sm-2">
                  <span class="author-image">
                    <img src="<?php echo get_avatar_url($curauth->ID);?>">
                  </span>
                </div>
                <div class="col-12 col-sm-10 mt-2">
                  <span class="author-description"><?php echo nl2br(get_the_author_meta('description')); ?></span>
                </div>
              </div>
						</div>
				</div>
			<?php endif; ?>
			</div>
			<div class="row">
				<div class="col-12">
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
