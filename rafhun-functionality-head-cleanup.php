<?php
/**
 * Head Cleanup
 *
 * Removes mostly unnecessary stuff from the head (like emoji detection, the generator or comment scripts).
 *
 * @package rafhun
 * @since 0.2.0
 */

// remove generator from head
remove_action('wp_head', 'wp_generator');

// remove emoji stuff
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// remove comments reply script
function clean_header(){
  wp_deregister_script( 'comment-reply' );
}

add_action('init','clean_header');
?>
