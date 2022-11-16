<?php 
/*
    Template Name: Página de contacto
*/
?>

<?php get_header(); ?>

<?php apply_filters('the_thumbnail', 'fixed'); ?>

<div class="margin-top">
    <?php get_template_part('template-parts/contact-form') ?>
</div>

<?php get_footer(); ?>