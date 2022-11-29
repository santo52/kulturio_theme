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
        <div class="subscribed-logo" style="margin-top: 1.5rem;margin-right: 1.5rem;">
            <?php apply_filters('the_logo', 'desktop'); ?>
        </div>
        <div class="error">
            <div class="error-content">
                <div class="error-title">
                    !Error!
                    <div class="error-number">404</div>
                </div>
                <div class="error-text">
                    Existen 404 posibles razones por las cuales esta página no está donde debería estar...
                </div>
                <div class="error-text error-paddingr">
                    ... Sin problema, dirigete a nuestro sitio web haciendo <a href="/">click aquí</a>
                </div>
            </div>
            <div class="error-image">
                <img src="<?= get_template_directory_uri() ?>/assets/images/404.svg" alt="error bolo">
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>