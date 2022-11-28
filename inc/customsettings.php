<?php

function modify_post_data( $post_data, $form, $args ) {

    $title_before_submission = get_the_title($post_data['ID']);
    $title_after_submission = 'Reserviert - ' . $title_before_submission;
    $post_data['post_title'] =  $title_after_submission;

    $id = $post_data['ID'];

    update_post_meta($id,'kunstwerk_reservationsstatus', 'reserviert');

    return $post_data;
}
add_filter( 'af/form/editing/post_data', 'modify_post_data', 10, 3 );


function filter_submit_button_attributes( $attributes, $form, $args ) {
    $attributes['class'] .= ' customBoutton moreInformation';
    
    return $attributes;
}
add_filter( 'af/form/button_attributes', 'filter_submit_button_attributes', 10, 3 );


add_image_size( 'kunstwerkSize', 1024, 512 );


// add acf options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


// allow svg
function kb_svg ( $svg_mime ){
	$svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}

add_filter( 'upload_mimes', 'kb_svg' );
	

function kb_ignore_upload_ext($checked, $file, $filename, $mimes){

 if(!$checked['type']){
 $wp_filetype = wp_check_filetype( $filename, $mimes );
 $ext = $wp_filetype['ext'];
 $type = $wp_filetype['type'];
 $proper_filename = $filename;

 if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
 $ext = $type = false;
 }

 $checked = compact('ext','type','proper_filename');
 }

 return $checked;
}

add_filter('wp_check_filetype_and_ext', 'kb_ignore_upload_ext', 10, 4);	
?>