<?php
$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
$permalink = get_permalink($post['ID']);
$time_string = sprintf( $time_string,
  esc_attr( get_the_date( 'c', $post['ID'] ) ),
  esc_html( get_the_date('', $post['ID']) ),
  esc_attr( get_the_modified_date( 'c', $post['ID'] ) ),
  esc_html( get_the_modified_date('', $post['ID']) )
);
$posted_on = sprintf(
  /* translators: %s: post date. */
  esc_html_x( '%s', 'post date', 'katodians' ),
  '<a href="' . esc_url( $permalink ) . '" rel="bookmark"><i class="far fa-calendar-alt"></i> ' . $time_string . '</a>'
);
?>
<div class="col-lg-3 col-md-4 col-6">
  <div class="post-wrap post-wrap-lite">
    <article id="post-<?php echo $post['ID'] ?>" <?php echo $permalink ?>>
      <div class="post-img-center">
          <?php echo get_the_post_thumbnail( $post['ID'], 'post-thumbnail', '' ); ?>
      </div>
      <header>
        <h3 class="entry-title">
          <a href="<?php echo $permalink; ?>">
          <?php echo $post['post_title']; ?>
          </a>
        </h3>
      </header>
      <div class="entry-media">
        <?php echo '<div class="permalink"><a href="'.$permalink.'"><i class="fas fa-link"></i> Permalink</a></div>';
        echo '<div class="posted-on">' . $posted_on . '</div> '; ?>
      </div><!-- .entry-meta -->
    </article><!-- #post-<?php the_ID(); ?> -->
  </div>
</div>
