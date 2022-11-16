<?php get_header(); ?>

<?php apply_filters('the_thumbnail', 'fixed'); ?>


<?php while(have_posts()): the_post(); ?>
    <section class="singular">
        <h2 class="singular-title"><?= the_title(); ?></h2>
        <article class="singular-content">
        <?= the_content(); ?>
        </article>
        <div class="singular-info">
            <div class="singular-author"><?= apply_filters('the_author_name', array()); ?> </div>
            <div class="singular-date"><?= the_time('d/m/Y'); ?> </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>