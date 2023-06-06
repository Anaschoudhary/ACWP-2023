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
        }else{
            acwp_excerpt(0);
        }
    ?>
</div>