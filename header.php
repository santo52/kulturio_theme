<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
</head>
<body>
    <header class="kulturio-header">
        <div class="hamburguer-menu fixed to-desktop">
            <img src="<?= get_template_directory_uri(); ?>/assets/images/menu.png" alt="hamburguer menu">
        </div>

        <?php get_template_part('template-parts/main-menu'); ?>
        
        <div class="header-fixed">
            <div>
                <div class="logo">
                    <?php apply_filters('the_logo', "desktop"); ?>
                </div>
                <div class="hamburguer-menu to-desktop">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/menu.png" alt="hamburguer menu 2">
                </div>

                <?php get_template_part('template-parts/main-menu'); ?>
            </div>
        </div>
    </header>
    <main class="container">