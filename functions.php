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
        'kulturai-main-menu' => __( 'Mobile Menu', 'kulturai' ),
        'kulturai-desktop-menu' => __( 'Desktop Menu', 'kulturai' ),
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
        $logoImage = wp_get_attachment_image($logo, 'full');
    } else {
        $logoImage = "<img src='{$baseURL}/assets/images/logo-{$type}.svg' alt='default logo {$type}' />";
    }

    echo "<a href='/'>{$logoImage}</a>";
}

add_filter( 'the_logo', 'kulturai_the_logo' );


function kulturai_toolbars( $toolbars )
{
    $toolbars['Only Color' ] = array();
    $toolbars['Only Color' ][1] = array(
        "formatselect", "forecolor", "bold","", "undo" ,"redo"
     );


    //  var_dump($toolbars['Full']);
    //  $toolbars['Only Color' ]=$toolbars['Full'];

    return $toolbars;
}


add_filter( 'acf/fields/wysiwyg/toolbars' , 'kulturai_toolbars'  );


function wysiwyg_render_field_settings( $field ) {
	acf_render_field_setting( $field, array(
		'label'			=> __('Height'),
		'instructions'	=> __('Height of Editor after Init'),
		'name'			=> 'wysiwyg_height',
		'type'			=> 'number',
	));
}
add_action('acf/render_field_settings/type=wysiwyg', 'wysiwyg_render_field_settings', 10, 1 );


/**
 * Render height on ACF WYSIWYG 
 */
function wysiwyg_render_field( $field ) {
	$field_class = '.acf-'.str_replace('_', '-', $field['key']);
?>
	<style type="text/css">
	<?php echo $field_class; ?> iframe {
		min-height: <?php echo $field['wysiwyg_height']; ?>px; 
	}
	</style>
	<script type="text/javascript">
        jQuery(window).load(function() {
            console.log(jQuery("<?php echo $field_class; ?>").find('iframe'))
            jQuery('<?php echo $field_class; ?>').each(function() {
                setTimeout(() => jQuery(this).find('iframe').height( <?php echo $field['wysiwyg_height']; ?> ), 0);
	        });
        })
	</script>
<?php
}
add_action( 'acf/render_field/type=wysiwyg', 'wysiwyg_render_field', 10, 1 );


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
