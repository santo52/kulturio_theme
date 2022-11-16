<?php get_header(); ?>


<section class="blog">

    <div class="blog-title">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/hoja_roja.svg" alt="icon blog">
        <h2>Blog</h2>
    </div>

    <span class="blog-description">
        Conoce mejor a tu consumidor y actualizate con nuestro blog
    </span>

    <div class="blog-list">
        <?php while(have_posts()): the_post(); ?>
            
            <div class="blog-card">
                <a class="<?= !has_post_thumbnail() ? 'blog-card-noimage' : '' ?>" href="<?= the_permalink(); ?>">
                    <?php if(has_post_thumbnail()): ?>
                        <?= the_post_thumbnail( 'small' ); ?>
                    <?php else: ?>
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/camera.png" alt="camera"/>
                    <?php endif; ?>
                    <div class="blog-card-content">
                        <h4><?= the_title(); ?></h4>
                    </div>
                </a>
            </div>
            
        <?php endwhile; ?>
</div>

</section>


<?php get_footer(); ?>