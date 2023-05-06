<?php
/**
 * Header template
 * 
 * @package acwp2023
 */

 ?>
<!DOCTYPE html>  
<html lang="<?php language_attributes('charset') ?>">  
    <head>  
        <meta charset="<?php bloginfo() ?>">  
        <meta name="description" content="Wordpress Theme ACWP 2023">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>  
<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){
    wp_body_open();
} ?>
<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
       <?php get_template_part('template-parts/header/nav'); ?>
    </header>  

    <div id="content" class="site-content">

    </div>
</div>