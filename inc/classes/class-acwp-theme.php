<?php
/**
 * 
 * @package acwp2023
 */

namespace ACWP_THEME\Inc;

use ACWP_THEME\Inc\Traits\Singleton;

 class ACWP_THEME {

    use Singleton;

    protected function __construct(){

        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions
        */
        add_action('after_setup_theme', [$this, 'setup_theme']);     
    }

    public function setup_theme(){
        add_theme_support('title-tag');
        add_theme_support( 'custom-logo', [
            'header-text'          => array( 'site-title', 'site-description' ),
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,          
            'unlink-homepage-logo' => true,       
            ] );
        add_theme_support( 'custom-background', [
             'default-color' => '0000ff',
             'default-image' => '',
        ]);
    }
        

  
}