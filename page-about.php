<?php get_header(); ?>

<?php 

  apply_filters('the_thumbnail', 'fixed'); 
  $ceo = get_field('ceo');

?>

<div class="about">

  <div class="about-logo">
    <div class="logo-desktop from-desktop">
        <?php apply_filters('the_logo', 'desktop'); ?>
    </div>
    <div class="logo-mobile to-desktop">
        <?php apply_filters('the_logo', 'mobile'); ?>
    </div>
  </div>

  <section class="about-content">
    <article class="about-content-text">
      <?= get_field('text_1'); ?>
    </article>
  </section>

  <div class="about-arrow">
    <img src="<?= get_template_directory_uri() ?>/assets/images/flecha_abajo.svg" alt="CEO arrow" />
    <!-- <span>Nuestro CEO</span> -->
  </div>

  <section class="about-content about-divided">
    <?php if($ceo && $ceo['texto']): ?>
      <div class="about-ceo">
        <?php if($ceo['photo']): ?>
          <div class="about-ceo-photo" style="background-image: url(<?= $ceo['photo']['url']; ?>)"></div>
        <?php endif; ?>
        <div class="about-ceo-text">
          <?= $ceo['texto']; ?>
        </div>
      </div>
    <?php endif; ?>
    <article class="about-content-text">
      <?= get_field('text_2'); ?>
    </article>
  </section>
</div>



<?php get_footer(); ?>