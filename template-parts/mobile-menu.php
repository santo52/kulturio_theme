<div class="mobile-menu to-desktop">
    <div class="hamburguer-menu fixed">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/menu.svg" alt="hamburguer menu">
    </div>

    <?php get_template_part('template-parts/mobile-menu-items'); ?>
    
    <div class="sticky-header">
        <div>
            <div class="logo">
                <?php apply_filters('the_logo', "desktop"); ?>
            </div>
            <div class="hamburguer-menu">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/menu.svg" alt="hamburguer menu 2">
            </div>

            <?php get_template_part('template-parts/mobile-menu-items'); ?>
        </div>
    </div>
</div>