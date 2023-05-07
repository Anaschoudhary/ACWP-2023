<?php
/**
 * Theme Functions
 * 
 * @package acwp2023
 */

 
if(!defined('ACWP_DIR_PATH')){
    define('ACWP_DIR_PATH', untrailingslashit(get_template_directory()));
}

if(!defined('ACWP_DIR_URI')){
    define('ACWP_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once ACWP_DIR_PATH . '/inc/helpers/autoloader.php';

function acwp_get_theme_instance (){
    
    \ACWP_THEME\Inc\ACWP_THEME::get_instance();
}
acwp_get_theme_instance ();