<?php 
    $fixedMenuClass = get_field('fixed_menu') ? 'fixed-header' : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/style.css">
    <?php wp_head(); ?>
</head>
<body>
    <div class="<?= $fixedMenuClass ?>">
        <header class="kulturio-header">
            <?php get_template_part('template-parts/mobile-menu'); ?>
            <?php get_template_part('template-parts/desktop-menu'); ?>
        </header>

        <div id="subscription-modal" class="subscription-modal modal modal--bottom modal--round">
            <div class="modal-background">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/close.svg" alt="close button">
            </div>
            
            <div class="modal-content">
                <div class="modal-header">
                    <div style="display: block;width: 4rem;height: .4rem;background: gray;margin: auto;border-radius: 10px;"></div>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>

        <div id="contact-modal" class="contact-modal modal modal--right modal--dark">
            <div class="modal-background">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/close.svg" alt="close button">
            </div>
            
            <div class="modal-content">
                <div class="modal-body">
                    <?php get_template_part('template-parts/contact-form') ?>
                </div>
            </div>
        </div>

        <div id="resource-modal" class="resource-modal modal modal--right modal--dark">
            <div class="modal-background">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/close.svg" alt="close button">
            </div>
            
            <div class="modal-content">
                <div class="modal-body">
                    <?php get_template_part('template-parts/resource-form') ?>
                </div>
            </div>
        </div>
        

        <main class="container">