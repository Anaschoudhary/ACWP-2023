<?php

/**
 * Register Meta Boxes
 * 
 * @package acwp2023
 */

 namespace ACWP_THEME\Inc;

 use ACWP_THEME\Inc\Traits\Singleton;


class Meta_Boxes{

    use Singleton;

    protected function __construct(){
        
        $this->setup_hooks();
    }
    
    protected function setup_hooks(){
        /**
         * Actions
         */
        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        add_action( 'save_post', [$this, 'save_post_meta_data'] );
        
    }

    public function add_custom_meta_box(){

        $screens = [ 'post'];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'hide-page-title',                 // Unique ID
                __('Hide Page Title', 'acwp2023'),      // Box title
                [$this, 'custom_meta_box_html'],  // Content callback, must be of type callable
                $screen,
                'side'                            // Post type
            );
        }
    }

    public function custom_meta_box_html($post){
        $value = get_post_meta( $post->ID, '_hide_page_title', true );

        wp_nonce_field('hide_title_meta_box_n', 'hide_title_meta_box_nonce_name');

        ?>
        <label for="acwp_field"><?php esc_html_e('Hide the title', 'acwp2023'); ?></label>
        <select name="acwp_hide_title_field" id="acwp-field" class="postbox">
            <option value=""><?php esc_html_e('select', 'acwp2023'); ?></option>
            <option value="yes" <?php selected( $value, 'yes' ); ?>><?php esc_html_e('yes', 'acwp2023'); ?></option>
            <option value="no" <?php selected( $value, 'no' ); ?>><?php esc_html_e('no', 'acwp2023'); ?></option>
        </select>
        <?php
    }
    
    public function save_post_meta_data($post_id) {

        if(! current_user_can('edit_post', $post_id)){
            return;
        }

        if(! isset($_POST['hide_title_meta_box_nonce_name']) || ! wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'], 'hide_title_meta_box_n', )){
            return;
        }

        if ( array_key_exists( 'acwp_hide_title_field', $_POST )) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['acwp_hide_title_field']
            );
        }
    }

    
}