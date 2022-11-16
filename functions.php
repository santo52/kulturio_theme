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

 require get_template_directory() . '/inc/contact-cpt.php';


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


// function kulturai_widgets() {
//     register_sidebar(array(
//         'name' => 'Menu Footer 1',
//         'id' => 'footer_menu_1',
//         'before_widget' => '<div class="footer-widget">',
//         'after_widget' => '</div>',
//     ));
//     register_sidebar(array(
//         'name' => 'Menu Footer 2',
//         'id' => 'footer_menu_2',
//     ));
// }

// add_action('widgets_init', 'kulturai_widgets');


// function custom_admin_js($hook) {
//     echo "<script>localStorage.setItem('template_directory_uri', '" . get_template_directory_uri() . "')</script>";
//     if($hook === 'widgets.php') {
//         $url = get_template_directory_uri() . '/assets/js/wp-widgets.js';
//         wp_enqueue_script('handle', $url);
//     }
// }
// add_action('admin_enqueue_scripts', 'custom_admin_js');

?>
