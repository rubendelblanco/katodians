<?php
function my_category_module() {
   add_action ( 'edit_category_form_fields', 'add_image_cat');
   add_action ( 'edited_category', 'save_image');

   if (is_admin()){
     wp_enqueue_media(); //required to load media-library.js
 	   wp_enqueue_script( 'media-library-uploader', get_template_directory_uri() . '/js/media-library-uploader.js', array(), '1.0.0', true );
   }
 }

add_action('init', 'my_category_module');

function add_image_cat($tag){
   $category_images = get_option( 'category_images' );
   $category_image = '';

     if ( is_array( $category_images ) && array_key_exists( $tag->term_id, $category_images ) ) {
       $category_image = $category_images[$tag->term_id] ;
     }
   ?>
   <tr>
   <th scope="row" valign="top"><label for="auteur_revue_image">Image</label></th>
   <td>
   <?php
    if ($category_image !=""):
   ?>
   <div style="margin-bottom: 10px;">
     <img width="200" src="<?php echo $category_image;?>" alt="" title=""/>
   </div>
   <?php
    endif;
   ?>
   <input id="image-url" type="text" name="category-image" />
   <input id="upload-button" type="button" class="button" value="Upload Image" />
   <span>This field allows you to add a picture to illustrate the category. Upload the image from the media tab WordPress and paste its URL here.</span>
   </td>
   </tr>
 <?php
 }

 function save_image($term_id){
   if ( isset( $_POST['category-image'] ) ) {
     //load existing category featured option
     $category_images = get_option( 'category_images' );
     //set featured post ID to proper category ID in options array
     $category_images[$term_id] =  $_POST['category-image'];
     //save the option array
     update_option( 'category_images', $category_images );
   }
 }
?>
