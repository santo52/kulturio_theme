<?php 
/*
    Template Name: Página de contacto
*/
?>

<?php get_header(); ?>

<?php apply_filters('the_thumbnail', 'full'); ?>

<?php get_template_part('template-parts/contact-form') ?>

<?php get_footer(); ?>