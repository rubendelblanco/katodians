<?php
/**
 * Template part for displaying CPT projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package katodians
 * @since 0.8.0
 */

$progress = get_post_meta(get_the_ID(), 'progress_bar', true);
?>
<div class="col-md-6 col-12">
	<div class="post-wrap">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			<div class="project-img">
					<?php the_post_thumbnail('large'); ?>
      </div>
			<div class="progress" data-percentage="<?php echo $progress;?>">
			  <span class="progress-left">
			    <span class="progress-bar"></span>
			  </span>
			  <span class="progress-right">
			    <span class="progress-bar"></span>
			  </span>
			  <div class="progress-value">
			    <div>
			      <?php echo $progress ?>%<br>
			      <span>completado</span>
			    </div>
			  </div>
			</div>
			<div class="entry-content-excerpt project">
				<?php
					echo the_excerpt();
				?>
			</div>
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
