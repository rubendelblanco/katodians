<div class="row">
<?php
  $most_rated_posts = katodians_get_highest_rated ('post',0,4,0,true);
  foreach ($most_rated_posts as $post):
?>
<div class="col-lg-3 col-md-4 col-6">
  <div class="post-wrap post-wrap-lite">
    <article id="post-<?php echo $post['ID']; ?>" <?php echo get_post_class('', $post['ID']); ?>>
      <div class="post-img-center">
          <?php echo get_the_post_thumbnail( $post['ID'], 'post-thumbnail', '' ); ?>
      </div>
      <header>
        <h3 class="entry-title">
          <a href="<?php get_post_permalink($post['ID']); ?>">
          <?php echo $post['post_title']; ?>
          </a>
        </h3>
      </header>
      <div class="entry-media">
        <span class="byline">
          <div class="permalink">
            <a href="<?php get_post_permalink($post['ID']); ?>">
            <i class="fas fa-link"></i> <?php get_post_permalink($post['ID']); ?>
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
<?php endforeach; ?>
</div>
