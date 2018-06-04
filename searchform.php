<div class="form-style search-form">
  <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <input type="search" placeholder="Search here..." value="<?php echo get_search_query() ?>"
    name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
    <button><i class="fa fa-search"></i></button>
  </form>
</div>
