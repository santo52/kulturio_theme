<div class="desktop-menu from-desktop">
    <span class="static-header">
        <?php get_template_part('template-parts/desktop-menu-items'); ?>
    </span>
    <div class="sticky-header">
        <div>
            <div class="logo">
                <?php apply_filters('the_logo', "desktop"); ?>
            </div>
            <span class="desktop-menu-nav-container">
                <?php get_template_part('template-parts/desktop-menu-items'); ?>
                <button class="subscription-button btn btn-red">Suscríbete ahora</button>
            </span>
        </div>
    </div>
</div>