<?php 

/**
 * Register Sidebars
 * 
 * @package acwp2023
 */

 namespace ACWP_THEME\Inc;

 use ACWP_THEME\Inc\Traits\Singleton;


class Sidebars{

    use Singleton;

    protected function __construct(){
        
        $this->setup_hooks();
    }
    
    protected function setup_hooks(){
        /**
         * Actions
         */
        add_action('widgets_init', [$this, 'register_sidebars']);
        add_action('widgets_init', [$this, 'register_clock_widget']);
    }

    public function register_sidebars(){

        register_sidebar( array(
		'name'          => __( 'Sidebar', 'acwp2023' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar', 'acwp2023' ),
            'id'            => 'sidebar-2',
            'before_widget' => '<div id="%1$s" class="widget widget-footer cell %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

    }

    public function register_clock_widget(){
        register_widget( 'ACWP_THEME\Inc\Clock_widget' );
    }
    
   
}