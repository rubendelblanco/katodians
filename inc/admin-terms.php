<?php
function katodians_terms_extension() {

  if (!isset($_GET['taxonomy']) and !isset($_POST['taxonomy'])) return;
  if (isset($_GET['taxonomy'])) $taxonomy = sanitize_text_field( $_GET['taxonomy'] );
  elseif (isset($_POST['taxonomy'])) $taxonomy = sanitize_text_field( $_POST['taxonomy'] );
  add_action ( $taxonomy.'_add_form_fields', 'katodians_add_image_term' );
  add_action ( $taxonomy.'_edit_form_fields','katodians_add_image_term' );
  add_action ( 'edited_terms','katodians_save_image_term', 10);
  add_action ( 'create_term','katodians_save_image_term', 10);

   if (is_admin()){
     wp_enqueue_media(); //required to load media-library.js
 	   wp_enqueue_script( 'media-library-uploader', get_template_directory_uri() . '/js/media-library-uploader.js', array(), '1.0.0', true );
   }
 }

add_action('init', 'katodians_terms_extension');

function katodians_add_image_term($term){
   if (!isset($_GET['taxonomy'])) return;
   $taxonomy = sanitize_text_field( $_GET['taxonomy'] );
   $term_images = get_option( $taxonomy.'_term_images' );
   $term_image = '';
     if ( is_array( $term_images ) && array_key_exists( $term->term_id, $term_images ) ) {
       $term_image = $term_images[$term->term_id] ;
     }
   ?>
   <tr>
   <th scope="row" valign="top"><label for="auteur_revue_image">Image</label></th>
   <td>
   <?php
    if ($term_image !=""):
   ?>
   <div style="margin-bottom: 10px;">
     <img width="200" src="<?php echo $term_image;?>" alt="" title=""/>
   </div>
   <?php
    endif;
   ?>
   <input id="image-url" type="text" name="term-image" />
   <input id="upload-button" type="button" class="button" value="Upload Image" /><br/>
   <span>This field allows you to add a picture to illustrate the category. Upload the image from the media tab WordPress and paste its URL here.</span>
   </td>
   </tr>
 <?php
 }

 function katodians_save_image_term($term_id){
   ///wp_die();
   if (!isset($_GET['taxonomy']) and !isset($_POST['taxonomy'])) return;
   if (isset($_GET['taxonomy'])) $taxonomy = sanitize_text_field( $_GET['taxonomy'] );
   elseif (isset($_POST['taxonomy'])) $taxonomy = sanitize_text_field( $_POST['taxonomy'] );

   if ( isset( $_POST['term-image'] ) ) {
     //load existing category featured option
     $category_images = get_option( $taxonomy.'_term_images' );
     //set featured post ID to proper category ID in options array
     $category_images[$term_id] =  $_POST['term-image'];
     //save the option array
     update_option( $taxonomy.'_term_images', $category_images );
   }
 }
?>
