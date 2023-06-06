<?php
/**
 * Content  Template
 * @package acwp2023
*/
?>
<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'acwp2023'); ?></h1>
    </header>

    <div class="page-content">
        <?php
            if(is_home() && current_user_can('publish_posts')){ ?>

                <?php
                    printf(
                        wp_kses(
                            __( 'Ready to publish your first post? <a href="%s">Get started here</a>', 'acwp2023'),
                            [
                                'a' => [
                                    'href' => []
                                ]
                            ]
                                ),
                                esc_url(admin_url('post-new.php'))

                    );
                
                ?>

         <?php   }elseif(is_search()){
            ?>
            <p><?php esc_html_e('No Search Result found', 'acwp2023') ?></p>
            <?php get_search_form(); ?>
    <?php
         }else{
            ?>
            <p><?php esc_html_e('Not found what you looking for', 'acwp2023') ?></p> 
           
         <?php }

        ?>
    </div>
</section>