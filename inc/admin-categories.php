<?php

function category_edit_form_fields(){ ?>
  <tr class="form-field">
    <th valign="top" scope="row">
        <label for="catpic"><?php _e('Picture of the category', ''); ?></label>
    </th>
    <td>
        <input type="file" id="catpic" name="catpic"/>
    </td>
  </tr>
<?php
}

add_action('category_add_form_fields','category_edit_form_fields');
?>
