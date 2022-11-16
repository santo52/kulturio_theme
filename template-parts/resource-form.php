<section class="resources">

    <div class='resources-image'>
        <?php if(get_theme_mod('kulturai_resources_image')): ?>
            <img src='<?= get_theme_mod('kulturai_resources_image'); ?>' />
        <?php else: ?>
            <img src='<?= get_template_directory_uri(); ?>/assets/images/recursos.jpeg' />
        <?php endif; ?>
    </div>

    <div class="resources-content">
        <span class="resources-description">
            <h5><?= get_theme_mod('kulturai_resources_title'); ?></h5>
            <span><?= get_theme_mod('kulturai_resources_text'); ?></span>
        </span>

        <div class="resources-form">
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
                    <input type="submit" class="btn btn-red" value="<?= get_theme_mod('kulturai_resources_button_text'); ?>" />
                </div>
            </form>
        </div>
    </div>
</section>
