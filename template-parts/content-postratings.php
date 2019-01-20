<?php
$permalink = get_permalink($post['ID']);
?>
<div class="col-lg-3 col-md-4 col-6">
  <div class="post-wrap post-wrap-lite">
    <article id="post-<?php echo $post['ID']; ?>" class="<?php echo get_post_class('', $post['ID'])[0]; ?>">
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
        <span class="byline">
          <div class="permalink">
            <a href="<?php  echo $permalink; ?>">
            <i class="fas fa-link"></i> <a href="<?php echo $permalink; ?>">
            Permalink
            </a>
          </div>
          <div class="rating">
            <i class="fas fa-star"></i> <?php echo __('Valoración media: ').$post['ratings_score']; ?>
          </div>
        </span>
      </div>
    </article><!-- #post-<?php the_ID(); ?> -->
  </div>
</div>
