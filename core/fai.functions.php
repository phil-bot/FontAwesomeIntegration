<?php

function fai_template_buffer ( $template ) {
	ob_start();
	include( plugins_url($template, __FILE__) );
    return ob_get_clean();
}


/**
 * Returns the $n-th color of all colors ordered by the date they were inserted
 * 
 * @param array $atts collection of attributes for the shortcode
 * @return string html output
 */
function fai_shortcode( $atts, $text = null ) {
		
    $atts = shortcode_atts( array(
	'icon'		=> 'certificate',	// fa-att
	'options'	=> FALSE,	// fa-att
	'pale'		=> FALSE,	// css-att
	'href'		=> FALSE, 	// link-att
	'title'		=> FALSE,	// link-att
	'target'	=> FALSE,	// link-att
    ), $atts, 'fa' );

	foreach( $atts as $key => $val ) {
		if( isset( $key ) ) {
			switch ($key) {
				case ('icon' or 'href' or 'title' or 'target'): $$key = $val;
				break;
				case 'options': foreach( explode(' ',$val) as $opt ) $options.= ' fa-' . $opt;
				break;
				case 'pale': $options.=' fai-pale';
				break;
			}
		}
	}
	
	$content = fai_template_buffer ( 'templates/fia.fontawesome.tpl' );
	
	if( isset( $href ) ) return fai_template_buffer ( 'templates/fia.link.tpl' );
	else return $content;
}
?>