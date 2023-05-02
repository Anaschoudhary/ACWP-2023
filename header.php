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
<?php wp_body_open(); ?>
<header>Header</header>  