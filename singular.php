<?php get_header(); ?>

<?php apply_filters('the_thumbnail', 'full'); 

    global $post;
    $tags = wp_get_post_tags($post->ID);
    // if ($tags) :
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args=array(
           'tag__in' => $tag_ids,
           'post__not_in' => array($post->ID),
           'posts_per_page'=>4, // Number of related posts to display.
           'ignore_sticky_posts'=>1
        );

        $my_query = new wp_query( $args );
?>


<?php while(have_posts()): the_post(); ?>
    <section class="singular">
        <h2 class="singular-title"><?= the_title(); ?></h2>
        <article class="singular-content">
        <?= the_content(); ?>
        </article>
        <div class="singular-info margin-bottom">
            <div class="singular-author"><?= apply_filters('the_author_name', array()); ?> </div>
            <div class="singular-date"><?= the_time('d/m/Y'); ?> </div>
        </div>
        <?php if($my_query->have_posts()) : ?>
            <span class="singular-related-title">Artículos relacionados</span>
            <div class="singular-related slide">
                <div class="singular-related-container slide-content" data-min="3">
                    <?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
                        <div class="blog-card singular-related-card">
                            <a class="<?= !has_post_thumbnail() ? 'blog-card-noimage' : '' ?>" href="<?= the_permalink(); ?>">
                                <?php if(has_post_thumbnail()): ?>
                                    <?= the_post_thumbnail( 'large' ); ?>
                                <?php else: ?>
                                    <img src="<?= get_template_directory_uri(); ?>/assets/images/camera.png" alt="camera"/>
                                <?php endif; ?>
                                <div class="blog-card-content">
                                    <h4><?= the_title(); ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
    
<?php endwhile;  wp_reset_query(); ?>

<?php get_footer(); ?>