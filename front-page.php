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
$methodology = get_field('methodology');
$valueProposition = get_field('value_proposition');
$backgroundImage = get_field('background_image');
$serviceTitle =  get_field('service_title');
$services =  get_field('services');

$iconsService = [
    "item_1" => "graficos.svg",
    "item_2" => "lupa_grafico.svg",
    "item_3" => "lupa_usuarios.svg",
]

?>

<?php get_header(); ?>

<?php if($intro): ?>
    <section class="section-block padding-top intro">
        <div class="home-video">
            <div class="home-video-content">
                <video id="home-video" src="<?= get_template_directory_uri() . '/assets/images/red.webm' ?>" autoplay muted loop playsinline>
                </video>
            </div>
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
            <div class="subscription-button-mobile">
                <button class="subscription-button btn btn-red">Suscríbete ahora</button>
            </div>
        </div>
        <div class="intro-image">
            <?php if(!empty($intro['image'])): ?>
                <img src="<?= $intro['image']['url'] ?>" alt="<?= $intro['image']['alt'] ?>" title="<?= $intro['image']['title'] ?>">
            <?php endif; ?>
        </div>
    </section>
    <section class="section-block padding-top whoarewe">
        <div class="whoarewe-text">
            <?= $intro['first_text'] ?>
        </div>
        <div class="whoarewe-slide to-desktop">
            <span>
                Desliza
                <svg xmlns="http://www.w3.org/2000/svg" width="103.31" height="21.351" viewBox="0 0 103.31 21.351"><g transform="translate(-282.674 -1704.146)"><path d="M564.674,1747h92.281" transform="translate(-282 -32.5)" fill="none" stroke="#fff" stroke-width="1"/><path d="M656.954,1737.531l10.322,10.322-10.322,10.322" transform="translate(-282 -33.031)" fill="none" stroke="#fff" stroke-width="1"/></g></svg>
            </span>
        </div>
        <div class="whoarewe-image slide">
            <img class="slide-content" src="<?= get_template_directory_uri(); ?>/assets/images/consumidor.svg" alt="bolo slide">
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
    <div class="curve padding-top padding-bottom ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.263 53.873">
            <path d="M266.836,1984.13c119.22,20.329,340.441,82.476,424.226,31.074" transform="translate(-266.584 -1982.651)" fill="none" stroke="#fff" />
        </svg>
    </div>
    <section class="section-block padding-top methodology">
        <div class="methodology-text">
            <?= $methodology['first_text'] ?>
        </div>
        <div class="methodology-slide">
            <span>
                Desliza
                <svg xmlns="http://www.w3.org/2000/svg" width="103.31" height="21.351" viewBox="0 0 103.31 21.351"><g transform="translate(-282.674 -1704.146)"><path d="M564.674,1747h92.281" transform="translate(-282 -32.5)" fill="none" stroke="#fff" stroke-width="1"/><path d="M656.954,1737.531l10.322,10.322-10.322,10.322" transform="translate(-282 -33.031)" fill="none" stroke="#fff" stroke-width="1"/></g></svg>
            </span>
        </div>
        <div class="methodology-image slide">
            <img class="slide-content" src="<?= get_template_directory_uri(); ?>/assets/images/methodology.svg" alt="methodology slide">
        </div>
    </section>
    <div class="curve padding-top padding-bottom ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.961 30.015"><path d="M-7.48,3693.941c122.836-10.277,306.97-16.967,426.4,18.907" transform="translate(7.605 -3684.27)" fill="none" stroke="#fff" stroke-width="3"/></svg>
    </div>
    <section class="section-block value-proposition">
        <div class="value-proposition-table">
            <?php foreach($valueProposition as $item) : ?>
                <div class="value-proposition-table-row image-slider">
                    <?= $item; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php if($backgroundImage): ?>
        <div class="background-fixed" style="background-image: url(<?= $backgroundImage['sizes']['large'] ?>)"></div>
    <?php endif; ?>
    <section class="section-block services padding-top">
        <div class="services-title">
            <?= $serviceTitle ?>
        </div>
        <div class="services-table">
            <?php foreach($services as $key => $item) : ?>
                <div class="services-table-row">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/<?= $iconsService[$key] ?>" alt="icon" />
                    <?= $item; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>