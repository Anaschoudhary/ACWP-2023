<?php
/**
 * Theme Functions
 * 
 * @package acwp2023
 */

function acwp_enqueue() {

    //Register Styles
    wp_register_style('style-acwp', get_template_directory_uri(). '/style.css', [], filemtime(get_template_directory(). './style.css'), 'all');
    wp_register_style('bootstrap-css', get_template_directory_uri(). '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

    //Register Script
    wp_register_script('mainjs-acwp', get_template_directory_uri(). '/assets/main.js', [], filemtime(get_template_directory(). '/assets/main.js'), true);
    wp_register_script('bootstrap-js', get_template_directory_uri(). '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

    //Enqueue Style
    wp_enqueue_style('style-acwp');
    wp_enqueue_style('bootstrap-css');

    //Enqueue Script
    wp_enqueue_script('mainjs-acwp');
    wp_enqueue_script('bootstrap-js');

}

add_action('wp_enqueue_scripts', 'acwp_enqueue'); 