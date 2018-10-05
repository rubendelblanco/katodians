<?php
/**
 * Template part for displaying single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package katodians
 *
 * since 0.8.0
 */

?>
<div class="col-12">
	<div class="blog-wrapper">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="post-content post-content-single">
				<?php
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
				endif;
        $progress = get_post_meta(get_the_ID(), 'progress_bar', true);
        ?>
        <div class="status-project">
          Progreso del proyecto: <span><?php echo $progress; ?> % </span>
  			</div>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'katodians' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
</div>
