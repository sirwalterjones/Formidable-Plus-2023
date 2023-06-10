<?php if ( !isset( $display_only ) ) $display_only = false; ?>
<?php if (!isset($row_num)) $row_num = 0; ?>
<?php if (count($rows)) :  ?>
<?php 
$field_idy = $field['id']; // Replace 456 with your desired field ID
$fieldy = FrmField::getOne( $field_idy );
// var_dump($fieldy);
$aa = $fieldy->field_options;
$bb = $aa['custom_column_name_list'];
$cc = $aa['custom_row_name_list'];
foreach ($rows as $opt_key => $opt) : 
//var_dump($row_stringsmart);
if($field['custom_row_name_list'] != NULL && $field['custom_row_name_list'] != '' ){
$row_stringsmart = $field['custom_row_name_list'];
}else{
$row_stringsmart = $cc;
}
$row_values = explode(',', $row_stringsmart);
$row_column = substr(FrmPlusFieldsHelper::parse_option($opt,'name'), 4);
$row_words = explode(' ', FrmPlusFieldsHelper::parse_option($opt,'name')); // Split the string into an array of words
// Get the first word from the array
$row_columnWord = $row_words[0];
//echo $row_columnWord; // Output: "column"
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
<tr class="row-<?php echo $row_num; ?>">
<?php if ( !isset( $field['hide_row_headers'] ) || !$field['hide_row_headers'] ) : ?>
<th><?php echo $row_result; ?></th>
<?php endif; ?>
<?php if (!count($columns)) $columns[] = ""; // Spoof to get a column up there to enter data into ?>
<?php $col_num = 1; foreach ($columns as $col_key => $col_opt) : ?>
<td class="prooooo column-<?php echo $col_num; ?>"><?php require('table-field.php'); $col_num++; ?></td>
<?php endforeach; ?>
</tr>
<?php $row_num++; endforeach; ?>
<?php else : 
if (count($columns)){
if ( !isset( $dynamic_options ) ){
$dynamic_options = FrmPlusFieldsHelper::get_dynamic_options( $field );
}
if (isset($field['value']) and is_array($field['value'])){
$rows_to_output = count($field['value']);
}
elseif ( defined( 'DOING_AJAX' ) && $_POST['action'] == 'frm_add_table_row' ){
$rows_to_output = 1;
}
else{
$rows_to_output = $dynamic_options->starting_rows;
}
for($r = 0; $r < $rows_to_output; $r++){ $col_num = -1; ?>
<tr class="row-<?php echo $row_num; ?>"><?php
foreach ($columns as $col_key => $col_opt){
?><td class="pooooooooooo column-<?php echo $col_num; ?>"><?php require('table-field.php'); $col_num++; ?></td><?php
}
if ($display_only !== true) : ?>
<td>
<a class="frmplus-delete-row" href="javascript:delete_row(<?php echo $field['id']; ?>,<?php echo $row_num; ?>)"><img src="<?php echo FRMPLUS_IMAGES_URL ?>/trash.png" alt="<?php echo apply_filters('frmplus_text_delete_row',$dynamic_options->delete_row_text,$field); ?>" title="<?php echo apply_filters('frmplus_text_delete_row',$dynamic_options->delete_row_text,$field); ?>" border="0"></a>
<?php if ( $dynamic_options->rows_sortable ) : ?>
<span class="frmplus-sort-row" ><img src="<?php echo FRMPLUS_IMAGES_URL ?>/move.png" alt="<?php echo apply_filters('frmplus_text_sort_row',$dynamic_options->sort_row_text,$field); ?>" title="<?php echo apply_filters('frmplus_text_sort_row',$dynamic_options->sort_row_text,$field); ?>" border="0"></span>
<?php endif; ?>
</td>
<?php endif;
?></tr>
<?php $row_num++; }
}
?>
<?php endif; ?>
