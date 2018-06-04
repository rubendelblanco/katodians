<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package katodians
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );
		?>
		<div class="col-12">
			<div class="blog-wrapper">
				<i class="fas fa-bookmark"></i>
				<?php the_category( ', ' ); ?>
			</div>
			<div class="blog-wrapper">
				<?php the_tags( '<i class="fas fa-tags"></i> ', ', ', '<br />' ); ?>
			</div>
			<div class="mt-3">
					<?php
						the_post_navigation();
					?>
			</div>
		</div>
		<div class="col-12 mt-5">
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
?>
</div>
<?php
get_footer();
