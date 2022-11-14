<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Kultur
 * @since Kultur 1.0
 */


$intro = get_field('intro');
$valueProposition = get_field('value_proposition');

?>

<?php get_header(); ?>

<?php if($intro): ?>
    <section class="padding-top intro">
        <div class="home-video">
            <video id="home-video" src="<?= get_template_directory_uri() . '/assets/images/red.webm' ?>" autoplay muted loop playsinline>
            </video>
        </div>
        <div class="intro-info">
            <div class="intro-icon">
                <span class="from-laptop" >
                    <?php apply_filters('the_logo', "desktop"); ?>
                </span>
                <span class="to-laptop">
                    <?php apply_filters('the_logo', "mobile"); ?>
                </span>
            </div>
            <article class="intro-description">
                <?= $intro['intro_text']; ?>
            </article>
            <button class="subscription-button btn btn-red">Suscríbete ahora</button>
        </div>
        <div class="intro-image">
            <?php if(!empty($intro['image'])): ?>
                <img src="<?= $intro['image']['url'] ?>" alt="<?= $intro['image']['alt'] ?>" title="<?= $intro['image']['title'] ?>">
            <?php endif; ?>
        </div>
    </section>
    <section class="padding-top whoarewe">
        <div class="whoarewe-text">
            <?= $intro['first_text'] ?>
        </div>
        <div class="whoarewe-slide">
            <span>
                Desliza
                <svg xmlns="http://www.w3.org/2000/svg" width="103.31" height="21.351" viewBox="0 0 103.31 21.351"><g transform="translate(-282.674 -1704.146)"><path d="M564.674,1747h92.281" transform="translate(-282 -32.5)" fill="none" stroke="#fff" stroke-width="1"/><path d="M656.954,1737.531l10.322,10.322-10.322,10.322" transform="translate(-282 -33.031)" fill="none" stroke="#fff" stroke-width="1"/></g></svg>
            </span>
        </div>
        <div class="whoarewe-bolo slide">
            <img src="<?= get_template_directory_uri(); ?>/assets/images/consumidor.svg" alt="bolo slide">
        </div>
        <div class="whoarewe-text">
            <?= $intro['second_text'] ?>
        </div>
        <div class="whoarewe-text padding-top">
            <?= $intro['third_text'] ?>
        </div>
        <div class="whoarewe-table">
            <?php foreach($intro['table'] as $item) : ?>
                <div class="whoarewe-table-row">
                    <?= $item; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>