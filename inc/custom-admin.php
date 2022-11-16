<?php 

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


function kulturai_toolbars( $toolbars )
{
    $toolbars['Only Color' ] = array();
    $toolbars['Only Color' ][1] = array(
        "formatselect", "forecolor", "bold","", "undo" ,"redo"
     );

    return $toolbars;
}


add_filter( 'acf/fields/wysiwyg/toolbars' , 'kulturai_toolbars'  );




function kulturai_wysiwyg_render_field_settings( $field ) {
	acf_render_field_setting( $field, array(
		'label'			=> __('Height'),
		'instructions'	=> __('Height of Editor after Init'),
		'name'			=> 'wysiwyg_height',
		'type'			=> 'number',
	));
}
add_action('acf/render_field_settings/type=wysiwyg', 'kulturai_wysiwyg_render_field_settings', 10, 1 );



/**
 * Render height on ACF WYSIWYG 
 */
function kulturai_wysiwyg_render_field( $field ) {
	$field_class = '.acf-'.str_replace('_', '-', $field['key']);
?>
	<style type="text/css">
	<?php echo $field_class; ?> iframe {
		min-height: <?php echo $field['wysiwyg_height']; ?>px; 
	}
	</style>
	<script type="text/javascript">
        jQuery(window).load(function() {
            jQuery('<?php echo $field_class; ?>').each(function() {
                setTimeout(() => jQuery(this).find('iframe').height( <?php echo $field['wysiwyg_height']; ?> ), 0);
	        });
        })
	</script>
<?php
}
add_action( 'acf/render_field/type=wysiwyg', 'kulturai_wysiwyg_render_field', 10, 1 );


?>