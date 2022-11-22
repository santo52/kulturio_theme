                
                    <div class="curve footer-curve padding-top padding-bottom ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.263 53.873">
                            <path d="M266.836,1984.13c119.22,20.329,340.441,82.476,424.226,31.074" transform="translate(-266.584 -1982.651)" fill="none" stroke="#fff" />
                        </svg>
                    </div>
                    <footer class="footer section-block">
                        <div class="footer-info">
                            <div class="footer-section footer-org-info">
                                <?php apply_filters('the_logo', "desktop"); ?>
                                <?= bloginfo("description") ?>
                            </div>
                            <div class="footer-section footer-contact">
                                <?php if(get_theme_mod("email_contact")) : ?>
                                    <div class="footer-item">
                                        <span class="icon">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/email.svg" alt="email">
                                        </span>
                                        <a class="footer-item-text" href="mailito:<?=get_theme_mod("email_contact");?>"><?=get_theme_mod("email_contact");?></a>
                                    </div>
                                <?php endif; ?>
                                <div class="footer-item">
                                    <span class="icon">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/location.svg" alt="location">
                                    </span>
                                    <span class="footer-item-text">México</span>
                                </div>
                                <div class="footer-item">
                                    <span class="icon">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/location.svg" alt="location">
                                    </span>
                                    <span class="footer-item-text">Bogotá</span>
                                </div>
                                <div class="footer-item">
                                    <span class="icon">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/location.svg" alt="location">
                                    </span>
                                    <span class="footer-item-text">Miami</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer-section footer-social-media">
                            <span class="footer-item-text display-block">Síguenos en</span>
                            <?php if(get_theme_mod("kulturai_linkedin_link")) : ?>
                                <div class="icon">
                                    <a href="<?= get_theme_mod("kulturai_linkedin_link"); ?>" target="_blank">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt="location" />
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="footer-mobile-bolo">
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/bolo_rojo.svg" alt="bolo rojo">
                        </div>
                    </footer>
                </main>
            </div>
            
        <?php wp_footer(); ?>
    </body>
</html>