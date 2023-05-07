<?php 

/**
 * Enqueue theme assets
 * 
 * @package acwp2023
 */

 namespace ACWP_THEME\Inc;

 use ACWP_THEME\Inc\Traits\Singleton;


class Assets{

    use Singleton;

    protected function __construct(){
        
        $this->setup_hooks();
    }
    
    protected function setup_hooks(){
        /**
         * Actions
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']); 
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']); 
    }

    public function register_styles(){

        //Register Styles
        wp_register_style('style-acwp', ACWP_DIR_URI . '/style.css', [], filemtime(ACWP_DIR_PATH . './style.css'), 'all');
        wp_register_style('bootstrap-css', ACWP_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

        //Enqueue Style
        wp_enqueue_style('style-acwp'); 
        wp_enqueue_style('bootstrap-css');

    }

    public function register_scripts(){

        //Register Script
        wp_register_script('mainjs-acwp', ACWP_DIR_URI . '/assets/main.js', [], filemtime(ACWP_DIR_PATH . '/assets/main.js'), true);
        wp_register_script('bootstrap-js', ACWP_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

        //Enqueue Script
        wp_enqueue_script('mainjs-acwp');
        wp_enqueue_script('bootstrap-js');
    }
}