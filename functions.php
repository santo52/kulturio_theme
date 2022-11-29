<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */


 require get_template_directory() . '/inc/custom-filters.php';

 require get_template_directory() . '/inc/custom-admin.php';

add_action( 'admin_menu', 'kulturai_forms_menu' );
function kulturai_forms_menu() {

	add_menu_page(
		'Formularios',
		'Formularios',
		'read',
		'kulturai_forms',
		'',
		'dashicons-admin-users',
		40
	);
 }

 //Forms
 require get_template_directory() . '/inc/contact-cpt.php';
 require get_template_directory() . '/inc/resources-cpt.php';


function kulturai_menus() {
    register_nav_menus(array(
        'kulturai-main-menu' => __( 'Mobile Menu', 'kulturai' ),
        'kulturai-desktop-menu' => __( 'Desktop Menu', 'kulturai' ),
    ));
}
 
add_action( 'init', 'kulturai_menus' );



function kulturai_enqueue_scripts() {

    wp_enqueue_style( 'kulturai_styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.14', 'all' );

    wp_register_script('kulturai_script',get_stylesheet_directory_uri(). '/assets/js/kulturai.js', array('jquery'), '1.0.14', true );
    wp_enqueue_script('kulturai_script');

    wp_localize_script('kulturai_script','kulturai_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
}

add_action('wp_enqueue_scripts', 'kulturai_enqueue_scripts');



function kulturai_theme_setup() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'kulturai_theme_setup' );


function inject_linkedin_tag() {
    $partnerID = get_theme_mod("kulturai_linkedin_tag");
    if($partnerID) {
        echo "<script type='text/javascript'>
                _linkedin_partner_id = '{$partnerID}';
                window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
                window._linkedin_data_partner_ids.push(_linkedin_partner_id);
            </script>
            <script type='text/javascript'>
                (function(l) {
                if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
                window.lintrk.q=[]}
                var s = document.getElementsByTagName('script')[0];
                var b = document.createElement('script');
                b.type = 'text/javascript';b.async = true;
                b.src = 'https://snap.licdn.com/li.lms-analytics/insight.min.js';
                s.parentNode.insertBefore(b, s);})(window.lintrk);
             </script>
            <noscript>
                <img height='1' width='1' style='display:none;' alt='' src='https://px.ads.linkedin.com/collect/?pid={$partnerID}&fmt=gif' />
            </noscript>
        ";
    }
}
add_action( 'wp_footer', 'inject_linkedin_tag', 100 );


function kulturai_widgets() {
    register_sidebar(array(
        'name' => 'Newsletter',
        'id' => 'kulturai_newsletter',
        'before_widget' => '<div class="newsletter-widget">',
        'after_widget' => '</div>',
    ));
}

add_action('widgets_init', 'kulturai_widgets');


function kulturai_the_paginator() {

    global $paged;
    global $wp_query;

    if (empty($paged)) {
      $paged = 1;
    }
    
    $max_page = $wp_query->max_num_pages;
    if(!$max_page) {
        $max_page = 1;
    }

    if($max_page == 1) return;

    $perPage = $wp_query->query_vars['posts_per_page'];

    $baseURI = get_template_directory_uri();
    $hidePrev = $paged <= 1 ? 'paginator-arrow--hide' : '';
    $hideNext = $paged >= $max_page ? 'paginator-arrow--hide' : '';

    $prevPage = $paged - 1;
    $nextPage = $paged + 1;

    $prevPageLink = $paged > 1 ? previous_posts( false ) : 'javascript:void(0);';
    $nextPageLink = $paged < $max_page ? next_posts( $max_page, false ) : 'javascript:void(0);';

    $from = (($paged - 1) * $perPage) + 1;
    $to = $paged * $perPage;
    if($wp_query->post_count < $perPage) {
        $to -= ($perPage * 2) - $wp_query->found_posts;
    }

    echo "
        <div class='paginator'>
            <div class='paginator-text'>{$from} - {$to} de {$wp_query->found_posts} artículos</div>
            <div class='paginator-arrow'>
                <a href='{$prevPageLink}' class='paginator-arrow-left {$hidePrev}'>
                    <div class='paginator-arrow-icon'>
                        <img src='{$baseURI}/assets/images/flecha.svg' alt='arrow' />
                    </div>
                </a>
                <a href='{$nextPageLink}' class='paginator-arrow-right {$hideNext}'>
                    <div class='paginator-arrow-icon'>
                        <img src='{$baseURI}/assets/images/flecha.svg' alt='arrow' />
                    </div>
                </a>
            </div>
        </div>
    ";
  
  }

  add_filter( 'the_paginator', 'kulturai_the_paginator' );

/* Menús de administración que SÍ se ven - El resto desaparecen */

function ayudawp_admin_init() {  
    $menus_to_remove = array(
        'edit-comments.php', // coments
        'edit.php?post_type=acf-field-group', //Custom Fields
    );      

    foreach ($GLOBALS['menu'] as $key => $value) {   
        if (in_array($value[2], $menus_to_remove)) remove_menu_page($value[2]);
    }   
}
add_action('admin_init', 'ayudawp_admin_init');

?>
