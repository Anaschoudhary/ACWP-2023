<?php 

/**
 * Single Post Template
 * 
 * @package acwp2023
 * 
 */
get_header();
?>

<div id="primary">
    
    <main id="main" class="site-main mt-5" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">

<?php 
        get_template_part('template-parts/ted');
            if(have_posts()) : ?>

                <div class="post-wrap">
                    <?php if(is_home() && ! is_front_page()): ?>
                    
                    <header class="mb-5">
                        <h1 class="page-title screen-reader-text">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php endif; ?>
                        <?php 
                        $posts_count = wp_count_posts()->publish;
                        while(have_posts()) : the_post(); 
                          get_template_part('template-parts/content');        
                         endwhile; ?>                
                </div>

           <?php 
           
                else : 
                    
                    get_template_part('template-parts/content-none');

                endif; ?>

                    <?php
                    previous_post_link();
                    next_post_link();
                    ?>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
         
    </main>
</div> 

<?php
get_footer();