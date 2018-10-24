<?php

/*
* Cutom taxonomy "trait"
*
* Since 0.9.0
*/

function katodians_traits() {

	$labels = array(
		'name'                       => _x( 'Traits', 'Traits', 'katodians_trait' ),
		'singular_name'              => _x( 'Trait', 'Trait', 'katodians_trait' ),
		'menu_name'                  => __( 'Traits', 'katodians_trait' ),
		'all_items'                  => __( 'All Traits', 'katodians_trait' ),
		'new_item_name'              => __( 'New Trait Name', 'katodians_trait' ),
		'add_new_item'               => __( 'Add New Trait', 'katodians_trait' ),
		'edit_item'                  => __( 'Edit Trait', 'katodians_trait' ),
		'update_item'                => __( 'Update Trait', 'katodians_trait' ),
		'view_item'                  => __( 'View Trait', 'katodians_trait' ),
		'separate_items_with_commas' => __( 'Separate trait with commas', 'katodians_trait' ),
		'add_or_remove_items'        => __( 'Add or remove trait', 'katodians_trait' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'katodians_trait' ),
		'popular_items'              => __( 'Popular Traits', 'katodians_trait' ),
		'search_items'               => __( 'Search Traits', 'katodians_trait' ),
		'not_found'                  => __( 'Not Found', 'katodians_trait' ),
		'no_terms'                   => __( 'No trait', 'katodians_trait' ),
		'items_list'                 => __( 'Traits list', 'katodians_trait' ),
		'items_list_navigation'      => __( 'Traits list navigation', 'katodians_trait' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => false,
    'rewrite'                    => false,
    'show_in_nav_menus'          => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
	);
	register_taxonomy( 'katodians_trait', array( 'post' ), $args );

  /**
   * Remove the 'description' column from the table in 'edit-tags.php'
   * but only for the 'katodians_trait' taxonomy
   */
  add_filter('manage_edit-katodians_trait_columns', function ( $columns )
  {
      if( isset( $columns['description'] ) )
          unset( $columns['description'] );

      return $columns;
  } );

}
add_action( 'init', 'katodians_traits', 0 );
?>
