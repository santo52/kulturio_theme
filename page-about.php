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
    <svg xmlns="http://www.w3.org/2000/svg" width="41.997" height="219.03" viewBox="0 0 41.997 219.03">
      <g id="Grupo_119" data-name="Grupo 119" transform="translate(-195.646 -1106)">
        <g id="Grupo_71" data-name="Grupo 71" transform="translate(1747 823.326) rotate(90)">
          <path id="Trazado_165" data-name="Trazado 165" d="M564.674,1747h208" transform="translate(-282 -206.644)" fill="none" stroke="#fff" stroke-width="1"/>
          <path id="Trazado_166" data-name="Trazado 166" d="M656.954,1737.531l10.322,10.322-10.322,10.322" transform="translate(-166.279 -207.175)" fill="none" stroke="#fff" stroke-width="1"/>
        </g>
        <text id="Nuestro_CEO" data-name="Nuestro CEO" transform="translate(220.644 1215) rotate(90)" fill="#66c2a5" font-size="16" font-family="Open Sans"><tspan x="-47.973" y="0">Nuestro CEO</tspan></text>
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