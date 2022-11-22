<?php 
    $menuClass = get_field('fixed_menu') . '-header';
    $footerClass = get_field('footer_hidden') ? 'footer-hidden' : 'footer-visible';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>
    <div class="<?= $menuClass; ?> <?= $footerClass; ?>">
        <header class="kulturio-header">
            <?php get_template_part('template-parts/mobile-menu'); ?>
            <?php get_template_part('template-parts/desktop-menu'); ?>
        </header>

        <div id="subscription-modal" class="subscription-modal modal modal--bottom modal--round">
            <div class="modal-background">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/close.svg" alt="close button">
            </div>
            
            <div class="modal-content">
                <div class="modal-header">
                    <div style="display: block;width: 4rem;height: .4rem;background: gray;margin: auto;border-radius: 10px;"></div>
                </div>
                <div class="modal-body">
                    <div class="contact newsletter margin-top">
                        <div class="contact-title">
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/bombillo.svg" alt="icon blog">
                        </div>

                        <?php dynamic_sidebar( 'kulturai_newsletter' ); ?>

                        <!-- <div class="mailchimp-newsletter">
                            <h3 class="contact-description">
                                <strong>Suscríbete a nuestro newsletter</strong> para conocer más de nuestra solución
                            </h3>
                            <div class="contact-form">
                                <div class="alert alert-success">Se ha enviado el formulario satisfactoriamente</div>
                                <form class="kulturai-form">
                                    <div class="kulturai-form-group">
                                        <input required name="name" type="text" placeholder="Nombre" class="kulturai-form-control" />
                                    </div>
                                    <div class="kulturai-form-group">
                                        <input required name="email" type="email" placeholder="Email" class="kulturai-form-control" />
                                    </div>
                                    <div class="kulturai-form-group">
                                        <input required name="company" type="text" placeholder="Compañia" class="kulturai-form-control" />
                                    </div>
                                    <div class="margin-top">
                                        <input type="submit" class="btn btn-red" value="Suscribirme" />
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div id="contact-modal" class="contact-modal modal modal--right modal--dark">
            <div class="modal-background">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/close.svg" alt="close button">
            </div>
            
            <div class="modal-content">
                <div class="modal-body">
                    <?php get_template_part('template-parts/contact-form') ?>
                </div>
            </div>
        </div>

        <div id="resource-modal" class="resource-modal modal modal--right modal--dark">
            <div class="modal-background">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/close.svg" alt="close button">
            </div>
            
            <div class="modal-content">
                <div class="modal-body">
                    <?php get_template_part('template-parts/resource-form') ?>
                </div>
            </div>
        </div>
        

        <main class="container">