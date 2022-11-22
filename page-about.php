<?php 
/*
    Template Name: Página acerca de
*/
?>

<?php get_header(); ?>

<?php 

  apply_filters('the_thumbnail', 'full'); 
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
    <svg xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 41.997 219.03">
      <g transform="translate(-195.646 -1106)">
        <g fill="none" stroke="#fff" stroke-width="1" transform="translate(1747 823.326) rotate(90)">
          <path d="M564.674,1747h208" transform="translate(-282 -206.644)" />
          <path d="M656.954,1737.531l10.322,10.322-10.322,10.322" transform="translate(-166.279 -207.175)" />
        </g>
        <text transform="translate(220.644 1215) rotate(90)" font-size="16" fill="#66c2a5" font-family="RobotoMono-ExtraLight, Roboto Mono" font-weight="200"><tspan x="-52.809" y="0">Nuestro CEO</tspan></text>
      </g>
    </svg>
  </div>

  <section class="about-content about-divided">
    <?php if($ceo && $ceo['texto']): ?>
      <div class="about-ceo">
        <?php if($ceo['photo']): ?>
          <div class="about-ceo-photo" style="background-image: url(<?= $ceo['photo']['sizes']['large']; ?>)"></div>
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