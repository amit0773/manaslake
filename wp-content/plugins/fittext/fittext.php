<?php
/*
Plugin Name: jQuery fitText
Plugin URI: http://www.ramoonus.nl/wordpress/fittext/
Description: fittext_footer is a JavaScript utility that emulates CSS3 pseudo-classes and attribute selectors in Internet Explorer 6-8. 
Version: 1.2
Author: Ramoonus
Author URI: http://www.ramoonus.nl/
*/

function rw_fittext() {
		wp_deregister_script('fittext'); // deregister
		wp_enqueue_script('fittext', plugins_url('/js/jquery.fittext.js', __FILE__), array("jquery"), '1.2');
}
add_action('wp_enqueue_scripts', 'rw_fittext');
?>