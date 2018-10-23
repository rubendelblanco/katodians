<?php
/*
* Custom Post Types
*/

/*
* Proyectos CPT
*/
// Register Custom Post Type Project
// Post Type Key: project
function katodians_create_project_cpt() {

	$labels = array(
		'name' => __( 'Projects', 'Post Type General Name', 'kat-project' ),
		'singular_name' => __( 'Project', 'Post Type Singular Name', 'kat-project' ),
		'menu_name' => __( 'Projects', 'kat-project' ),
		'name_admin_bar' => __( 'Project', 'kat-project' ),
		'archives' => __( 'Project Archives', 'kat-project' ),
		'attributes' => __( 'Project Attributes', 'kat-project' ),
		'parent_item_colon' => __( 'Parent Project:', 'kat-project' ),
		'all_items' => __( 'All Projects', 'kat-project' ),
		'add_new_item' => __( 'Add New Project', 'kat-project' ),
		'add_new' => __( 'Add New', 'kat-project' ),
		'new_item' => __( 'New Project', 'kat-project' ),
		'edit_item' => __( 'Edit Project', 'kat-project' ),
		'update_item' => __( 'Update Project', 'kat-project' ),
		'view_item' => __( 'View Project', 'kat-project' ),
		'view_items' => __( 'View Projects', 'kat-project' ),
		'search_items' => __( 'Search Project', 'kat-project' ),
		'not_found' => __( 'Not found', 'kat-project' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'kat-project' ),
		'featured_image' => __( 'Featured Image', 'kat-project' ),
		'set_featured_image' => __( 'Set featured image', 'kat-project' ),
		'remove_featured_image' => __( 'Remove featured image', 'kat-project' ),
		'use_featured_image' => __( 'Use as featured image', 'kat-project' ),
		'insert_into_item' => __( 'Insert into Project', 'kat-project' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'kat-project' ),
		'items_list' => __( 'Projects list', 'kat-project' ),
		'items_list_navigation' => __( 'Projects list navigation', 'kat-project' ),
		'filter_items_list' => __( 'Filter Projects list', 'kat-project' ),
	);
	$args = array(
		'label' => __( 'Project', 'kat-project' ),
		'description' => __( 'work projects in development', 'kat-project' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-lightbulb',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'katodians_create_project_cpt', 0 );

// Register Custom Post Type Web Tool
// Post Type Key: webtool
function katodians_create_webtool_cpt() {

	$labels = array(
		'name' => __( 'Web Tools', 'Post Type General Name', 'kat-tools' ),
		'singular_name' => __( 'Web Tool', 'Post Type Singular Name', 'kat-tools' ),
		'menu_name' => __( 'Web Tools', 'kat-tools' ),
		'name_admin_bar' => __( 'Web Tool', 'kat-tools' ),
		'archives' => __( 'Web Tool Archives', 'kat-tools' ),
		'attributes' => __( 'Web Tool Attributes', 'kat-tools' ),
		'parent_item_colon' => __( 'Parent Web Tool:', 'kat-tools' ),
		'all_items' => __( 'All Web Tools', 'kat-tools' ),
		'add_new_item' => __( 'Add New Web Tool', 'kat-tools' ),
		'add_new' => __( 'Add New', 'kat-tools' ),
		'new_item' => __( 'New Web Tool', 'kat-tools' ),
		'edit_item' => __( 'Edit Web Tool', 'kat-tools' ),
		'update_item' => __( 'Update Web Tool', 'kat-tools' ),
		'view_item' => __( 'View Web Tool', 'kat-tools' ),
		'view_items' => __( 'View Web Tools', 'kat-tools' ),
		'search_items' => __( 'Search Web Tool', 'kat-tools' ),
		'not_found' => __( 'Not found', 'kat-tools' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'kat-tools' ),
		'featured_image' => __( 'Featured Image', 'kat-tools' ),
		'set_featured_image' => __( 'Set featured image', 'kat-tools' ),
		'remove_featured_image' => __( 'Remove featured image', 'kat-tools' ),
		'use_featured_image' => __( 'Use as featured image', 'kat-tools' ),
		'insert_into_item' => __( 'Insert into Web Tool', 'kat-tools' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Web Tool', 'kat-tools' ),
		'items_list' => __( 'Web Tools list', 'kat-tools' ),
		'items_list_navigation' => __( 'Web Tools list navigation', 'kat-tools' ),
		'filter_items_list' => __( 'Filter Web Tools list', 'kat-tools' ),
	);
	$args = array(
		'label' => __( 'Web Tool', 'kat-tools' ),
		'description' => __( 'Your web tools portfolio', 'kat-tools' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-tools',
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'webtool', $args );

}
add_action( 'init', 'katodians_create_webtool_cpt', 0 );

// custom meta boxes for web tools and projects

add_action( 'add_meta_boxes', 'katodians_meta_boxes' );

function katodians_meta_boxes() {
    add_meta_box( 'katodians-progress-meta-box', __( 'Progreso del proyecto', 'katodians_progress_textdomain' ), 'katodians_progress_meta_box_callback', ['project'] );
		add_meta_box( 'katodians-url-web', __('Enlace de la web', 'katodians_url_textdomain'), 'katodians_url_meta_box_callback', ['webtool']);
}

function katodians_progress_meta_box_callback( $post ) {
	 wp_nonce_field( 'katodians_progress_meta_box', 'katodians_meta_box_nonce_progress' );
	 $post_meta = get_post_custom( $post->ID );
	 $value = esc_attr( get_post_meta( $post->ID, 'ktds_progress_bar', true ) );
	 if ( $value == null ) $value = 0;
	?>
	<div class="slidecontainer">
		<div id="progress-percentage"></div>
		<input type="range" name="ktds_progress_bar" min="0" max="100" value="<?php echo $value ?>" step="10" class="slider" id="range">
	</div>
<?php
}

function katodians_url_meta_box_callback( $post ){
	wp_nonce_field( 'katodians_url_meta_box', 'katodians_meta_box_nonce_url' );
	$post_meta = get_post_custom( $post->ID );
	$value = esc_attr( get_post_meta( $post->ID, 'ktds_url_web', true ) );
	if ( $value == null ) $value = '';
	?>
	<div class="ktds-web-url">
		<span class="dashicons dashicons-admin-links" style="margin: 4px 4px 0 4px"></span>
		<input type="text" name="ktds_url_web" size="100" value="<?php echo $value ?>">
	</div>
	<?php
}

add_action( 'save_post', 'katodians_save_custom_fields_progress', 10, 2 );
add_action( 'save_post', 'katodians_save_custom_fields_url', 10, 2 );

//save progress bar value
function katodians_save_custom_fields_progress( $post_id, $post ){
		//nonce check
    if ( ! isset( $_POST['katodians_meta_box_nonce_progress'] ) || ! wp_verify_nonce( $_POST['katodians_meta_box_nonce_progress'], 'katodians_progress_meta_box' ) ) {
        return;
    }

		if ( isset( $_POST['ktds_progress_bar'] ) && $_POST['ktds_progress_bar'] != "" ) {
        update_post_meta( $post_id, 'ktds_progress_bar', $_POST['ktds_progress_bar'] );
    }
}

//save webtool url
function katodians_save_custom_fields_url( $post_id, $post ){
	//nonce check
	if ( ! isset( $_POST['katodians_meta_box_nonce_url'] ) || ! wp_verify_nonce( $_POST['katodians_meta_box_nonce_url'], 'katodians_url_meta_box' ) ) {
			return;
	}

	if ( isset( $_POST['ktds_url_web'] ) && $_POST['ktds_url_web'] != "" ) {

		// Remove all illegal characters from a url
		$url = filter_var($_POST['ktds_url_web'], FILTER_SANITIZE_URL);
		//validate URL
		if (!filter_var($url, FILTER_VALIDATE_URL)) {
	    return;
		}
		else{
			update_post_meta( $post_id, 'ktds_url_web', $_POST['ktds_url_web'] );
		}

	}
}


 ?>
