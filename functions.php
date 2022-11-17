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
    wp_register_script('kulturai_script',get_stylesheet_directory_uri(). '/assets/js/kulturai.js', array('jquery'), '1', true );
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


// function custom_admin_js($hook) {
//     echo "<script>localStorage.setItem('template_directory_uri', '" . get_template_directory_uri() . "')</script>";
//     if($hook === 'widgets.php') {
//         $url = get_template_directory_uri() . '/assets/js/wp-widgets.js';
//         wp_enqueue_script('handle', $url);
//     }
// }
// add_action('admin_enqueue_scripts', 'custom_admin_js');

?>
