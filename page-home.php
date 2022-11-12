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

?>

<?php get_header(); ?>

<?php if($intro): ?>
    <section id="intro" class="intro section-block">
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
                <h2 class="intro-description-title"><?= $intro['title']; ?></h2>
                <span class="intro-description-content"><p><?= $intro['text']; ?></p></span>
            </article>
            <button class="btn btn-red">Suscríbete ahora</button>
        </div>
        <div class="intro-image">
            <?php if(!empty($intro['image'])): ?>
                <img src="<?= $intro['image']['url'] ?>" alt="<?= $intro['image']['alt'] ?>" title="<?= $intro['image']['title'] ?>">
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>