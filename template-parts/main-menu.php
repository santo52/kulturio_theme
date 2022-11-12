<div class="main-menu">
    <div class="main-menu-background to-desktop">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/close.png" alt="close button">
    </div>
    
    <div class="main-menu-content">
        <div class="main-menu-header to-desktop">
            <div class="logo">
                <?php apply_filters('the_logo', "desktop"); ?>
            </div>
        </div>
        <div class="main-menu-body">
            <?php 
                $args = array(
                    'before' => '- ',
                    'theme_location' => 'kulturai-main-menu',
                    'container' => 'nav',
                    'container_class' => 'kulturai-main-menu'
                );
            
                wp_nav_menu($args);
            ?>
        </div>
    </div>
</div>