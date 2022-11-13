<div class="main-menu modal modal--right">
    <div class="modal-background to-desktop">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/close.png" alt="close button">
    </div>
    
    <div class="modal-content">
        <div class="modal-header to-desktop">
            <div class="logo">
                <?php apply_filters('the_logo', "desktop"); ?>
            </div>
        </div>
        <div class="modal-body">
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