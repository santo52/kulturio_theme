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

function kulturai_menus() {
    register_nav_menus(array(
        'kulturai-main-menu' => __( 'Main Menu', 'kulturai' )
    ));
}
 
add_action( 'init', 'kulturai_menus' );



function kulturai_enqueue_scripts() {
    wp_enqueue_script('kulturai', get_stylesheet_directory_uri().'/assets/js/kulturai.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'kulturai_enqueue_scripts');


function kulturai_customize_register( $wp_customize ) {
        $wp_customize->remove_control('site_icon');

        $images = [
            [ "key" => 'logo_mobile', "label"  => __( 'Logo mobile' ) ],
            [ "key" => 'logo_desktop', "label"  => __( 'Logo desktop' ) ],
        ];


        foreach ($images as $image) {
            $wp_customize->add_setting(
                $image['key'],
                array(
                    'capability'        => 'edit_theme_options',
                    'transport'         => 'postMessage',
                )
            );

            $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, $image['key'], array(
                'section'     => 'title_tagline',
                'label'       => $image['label'],
                'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
                'flex_height' => true, // Require the resulting image to be exactly as tall as the height attribute (default).
                // 'width'       => 1500,
                // 'height'      => 1500,
            ) ) );
        }
}
add_action( 'customize_register', 'kulturai_customize_register' );



function kulturai_the_logo( $type ) {
 
    if($type !== 'desktop' && $type !== 'mobile') return;

    $baseURL = get_template_directory_uri();
    $logo = get_theme_mod("logo_{$type}");
    if($logo) {
        echo wp_get_attachment_image($logo, 'full');
    } else {
        echo "<img src='{$baseURL}/assets/images/logo-{$type}.png' alt='default logo {$type}' />";
    }
}

add_filter( 'the_logo', 'kulturai_the_logo' );

?>
