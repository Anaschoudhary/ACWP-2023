<?php
/**
 * Template for entry content. works only in wp loop
 * @package acwp2023
*/

?>

<div class="">
    <?php 
        if(is_single()){
            the_content(
                sprintf(
                        wp_kses(
                            __('Continue Reading &s <span class="meta-nav">&rarr.</span>', 'acwp2023'),
                            [
                                'span' => [
                                    'class'=> []
                                ]
                            ]
                        )
                            ),
                            the_title('<span class="screen-reader-text">"', '"</span>', false)
            );
             wp_link_pages(
            [
                'before' => '<div class="page-links">'.esc_html__('Pages:', 'acwp2023'),
                'after' => '</div>',
            ]
            );
        }else{
            acwp_excerpt(0);
            echo acwp_excerpt_more();
        }
       
    ?>
</div>