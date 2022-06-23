<?php

/* 
 * include other core files
 */
include_once( plugins_url( 'core/fai.functions.php', __FILE__) );


/* 
 * add action
 * with 'wp_enqueue_scripts'
 */
add_action( 'wp_enqueue_scripts', 'fai_scripts' );


/*
 * add shortcode functions to Wordpress
 */
add_shortcode( 'fa', 'fai_shortcode' );


/* Register style.css an fontawesome.js */
function fai_scripts() {
		
	wp_register_script( 'fai-fontawesome', 'https://use.fontawesome.com/3272250aa2.js' );
	wp_register_style( 'fai-style', plugins_url('core/fai.style.css.php', __FILE__) );
	
	wp_enqueue_script( 'fai-fontawesome' );
	wp_enqueue_style( 'fai-style' );
	
}







?>