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
        Menus::get_instance();
        Meta_Boxes::get_instance();
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

        add_theme_support('post-thumbnails');

        add_image_size('featured-thumbnail', 350, 233, true);

        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support( 'html5', [
                'comment-list', 
                'comment-form',
                'search-form',
                'gallery',
                'caption',
                'script',
                'style'
                ] );
        add_editor_style();
        add_theme_support('wp-blocks-styles');
        add_theme_support('align-wide');
        
        global $content_width;
        if(!isset($content_width)){
            $content_width;
        }
    }
  
}