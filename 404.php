<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package katodians
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main">
			<div class="container">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'katodians' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'katodians' ); ?></p>
						<div class="row">
							<div class="col-12 col-lg-6">
							<?php
								get_search_form();
							?>
							</div>
						</div>
						<?php
							// only if wp-postratings is installed and active
							if(in_array('wp-postratings/wp-postratings.php', apply_filters('active_plugins', get_option('active_plugins')))){
								$posts = katodians_get_highest_rated ('post',0,4,0,true);
								
								if (count($posts) > 0) { 
									echo '<h3>'.__('Posts más valorados').'</h3>';
									echo '<div class="row">';
									foreach ($posts as $post)
									get_template_part( 'template-parts/content-postratings', 'none' );
									echo '</div>';
								}
							}

							$args = array(
								'numberposts' => 4,
								'offset' => 0,
								'category' => 0,
								'orderby' => 'post_date',
								'order' => 'DESC',
								'post_type' => 'post',
								'post_status' => 'publish',
								'suppress_filters' => true
							);

							$posts = wp_get_recent_posts( $args, ARRAY_A );
							echo '<h3>'.__('Posts más recientes').'</h3>';
							echo '<div class="row">';
				
							foreach ($posts as $post) {
								get_template_part( 'template-parts/content-lite', 'none' );
							}

							echo '</div>';
						?>
				</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
