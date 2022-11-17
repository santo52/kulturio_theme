<?php 
/*
    Template Name: Página gracias por suscribirte
*/
?>

<?php 
/*
    Template Name: Página acerca de
*/
?>

<?php get_header(); ?>

<div class="subscribed">
  <div class="subscribed-logo">
      <?php apply_filters('the_logo', 'desktop'); ?>
  </div>
  <div class="subscribed-main">
    <?php while(have_posts()): the_post(); ?>
      <section class="subscribed-container">
          <h2 class="subscribed-title"><?= the_title(); ?></h2>
          <article class="subscribed-content">
          <?= the_content(); ?>
          </article>
      </section>
      <div class="subscribed-image">
        <img src="<?= get_template_directory_uri() ?>/assets/images/feliz.svg" />
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>