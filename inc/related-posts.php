<?php

/**
 * katodians Related posts support
 *
 * @package katodians
 */

/**
* returns related posts by tag
*/
 function get_related_posts(){
  global $post;
  $tags = wp_get_post_tags($post->ID);

  if ($tags) :
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=>4, // Number of related posts to display.
    'ignore_sticky_post'=>1
    );

  $my_query = new wp_query( $args );

  while( $my_query->have_posts() ) :
    $my_query->the_post();
  ?>
  <div class="col-m">
    <div class="relatedthumb">
      <div class="relatedthumb-thumb">
      <a rel="external" href="<?php the_permalink()?>"><?php the_post_thumbnail(array(150, 150)); ?>
      </div>
      <div class="relatedthumb-title"><?php the_title(); ?></div>
      </a>
    </div>
  </div>

  <?php
      endwhile;
  endif;
  wp_reset_query();
}

?>
