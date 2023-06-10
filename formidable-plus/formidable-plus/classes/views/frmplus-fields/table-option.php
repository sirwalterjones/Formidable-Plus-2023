<div class="frm_single_option_sortable" id="frm_field-<?php echo $field['id']; ?>-<?php echo $opt_key; ?>">
<span id="frm_delete_field_<?php echo $field['id']; ?>-<?php echo $opt_key; ?>_container" class="frm_single_option">
	<?php if ( defined( 'FRM_IMAGES_URL' ) ) : // older version of Formidable.  Do it the old way ?>
		<a href="javascript:frm_delete_field_option(<?php echo $field['id']?>, '<?php echo $opt_key ?>',ajaxurl);" class="frm_single_visible_hover alignleft" ><img src="<?php echo FRM_IMAGES_URL ?>/trash.png" alt="Delete"></a>
	    <a href="javascript:void(0);" class="frm_single_visible_hover alignleft frm_sortable_handle" ><img src="<?php echo FRM_IMAGES_URL ?>/move.png" alt="Reorder"></a>
    <?php elseif ( !FrmPlusAppHelper::is_version2() ) : // newer version, do it the newer way ?>
		<a href="javascript:void(0)" class="frm_single_visible_hover frm_icon_font frm_delete_icon frm_delete_field_<?php echo substr( $opt_key, 0, 3 ); ?>" style="visibility: hidden;"> </a>
	    <a href="javascript:void(0);" class="frm_single_visible_hover alignleft frm_sortable_handle frm_icon_font frm_move_field" > </a>
	<?php else : // Formidable Version 2 or greater, yet another adjustment ?>	
		<a href="javascript:void(0)" class="frm_single_visible_hover frm_icon_font frm_delete_icon frm_delete_field_<?php echo substr( $opt_key, 0, 3 ); ?>"> </a>
	    <a href="javascript:void(0);" class="frm_single_visible_hover alignleft frm_sortable_handle frm_icon_font frm_move_field" > </a>
	<?php endif; ?>
	<?php
		list ( $type, $name, $options ) = FrmPlusFieldsHelper::parse_option( $opt );
		
		
$stringsmart = $field['custom_column_name_list'];
$values = explode(',', $stringsmart);
$column = substr($name, 7);
$words = explode(' ', $name); // Split the string into an array of words
// Get the first word from the array
$columnWord = $words[0];
//echo $columnWord; // Output: "column"
// Convert $column to an integer
$column = intval($column);
// Check if $column is within the valid range
if ($column >= 1 && $column <= count($values)) {
    $result = $values[$column - 1]; // Adjusting for zero-based indexing
    //echo "Result: " . $result;
} else {
    //echo "Invalid column number";
}




$row_stringsmart = $field['custom_row_name_list'];
$row_values = explode(',', $row_stringsmart);
$row_column = substr($name, 4);
$row_words = explode(' ', $name); // Split the string into an array of words
// Get the first word from the array
$row_columnWord = $row_words[0];
echo $name.":"; // Output: "column"
// Convert $column to an integer
$row_column = intval($row_column);
// Check if $column is within the valid range
if ($row_column >= 1 && $row_column <= count($row_values)) {
    $row_result = $row_values[$row_column - 1]; // Adjusting for zero-based indexing
    //echo "Result: " . $row_result;
} else {
    //echo "Invalid column number";
}




		
		
	?>
		<select class="frmplus_field_type" id="field_<?php echo $field['id']?>-<?php echo $opt_key ?>-type">
			<?php foreach ( FrmPlusFieldsHelper::get_types( 'valid' ) as $available_type ) : ?>
				<option value="<?php echo $available_type; ?>" <?php selected( $type, $available_type ); ?>><?php echo __( ucwords( str_replace( '_', ' ', $available_type ) ), FRMPLUS_PLUGIN_NAME ); ?></option>
			<?php endforeach; ?>
		</select>
		<span class="frmplus_field_options icon16" id="field_<?php echo $field['id']?>-<?php echo $opt_key ?>-options" <?php echo ( in_array( $type, FrmPlusFieldsHelper::get_types( 'with_options' ) ) ? '' : 'style="display:none"' ); ?>></span>
		
		
		
		

	<?php if($columnWord == 'Column'){ ?>
    <span class="frm_ipe_field_option frm_ipe_table_field" id="field_<?php echo $field['id']?>-<?php echo $opt_key ?>"><?php echo $result ?></span>
    <?php } ?>
    
    
    <?php if($row_columnWord == 'Row'){ ?>
    <span class="frm_ipe_field_option frm_ipe_table_field" id="field_<?php echo $field['id']?>-<?php echo $opt_key ?>"><?php echo $row_result ?></span>
    <?php } ?>
    
    

    
    
    
    <!--<span class="frm_ipe_field_option frm_ipe_table_field" id="field_<?php echo $field['id']?>-<?php echo $opt_key ?>"><?php //echo $name ?></span>-->
	<div class="frmplus_options_form">
		<div class="form-contents">
			<!-- this gets filled in via AJAX -->
		</div>
	</div>
</span>
<div class="clear"></div>
<!-- adding to prevent Formidable Javascript error -->
<span class="frm_other_option" style="display:none"></span>
</div> <!-- frm_single_option_sortable -->