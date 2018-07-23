<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package katodians
 */

?>
<div class="col-md-6 col-12">
	<div class="post-wrap">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-img">
					<?php the_post_thumbnail(); ?>
      </div>
			<header class="post-content">
				<?php
				if ( is_sticky()):
					echo '<div class="featured-sticky"><span>'.__('FEATURED').'</span></div>';
				endif;
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php katodians_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content-no-border">
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'katodians' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
</div>
