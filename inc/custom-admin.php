<?php 

add_action( 'customize_register', 'kulturai_edit_theme_options_register' );
function kulturai_edit_theme_options_register($wp_customize) {

    $wp_customize->add_setting(
        'email_contact',
        array(
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'email_contact',
        array(
            'type'        => 'text',
            'section'     => 'title_tagline',
            'label'       =>  __( 'Email de contacto' ),
            'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
            'flex_height' => true, // Require the res
        )
    );


    $wp_customize->add_panel( 'kulturai_theme_options', 
    array(
            'title'            => __( 'Configuraciones Kultur', 'kulturai' ),
            'description'      => __( 'Lista de configuraciones del tema', 'kulturai' ),
        ) 
    );

    $wp_customize->add_section( 'kulturai_linkedin_options', 
        array(
            'title'         => __( 'Linkedin', 'kulturai' ),
            'priority'      => 1,
            'panel'         => 'kulturai_theme_options'
        ) 
    );

    $wp_customize->add_setting(
        'kulturai_linkedin_link',
        array(
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'kulturai_linkedin_link',
        array(
            'type'        => 'text',
            'section'     => 'kulturai_linkedin_options',
            'label'       =>  __( 'Linkedin link' ),
            'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
            'flex_height' => true, // Require the res
        )
    );

    $wp_customize->add_setting( 'kulturai_linkedin_tag',
        array('transport'         => 'postMessage')
    );

    $wp_customize->add_control( 
        'kulturai_linkedin_tag', 
        array(
            'type'        => 'text',
            'section'     => 'kulturai_linkedin_options',
            'label'       =>  __( 'Linkedin Partner ID', 'kulturai' ),
            'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
            'flex_height' => true, // Require the res
        )
    );


    $wp_customize->add_section( 'kulturai_resources_options', 
        array(
            'title'         => __( 'Formulario de Recursos', 'kulturai' ),
            'priority'      => 1,
            'panel'         => 'kulturai_theme_options'
        ) 
    );

    $wp_customize->add_setting( 'kulturai_resources_image',
        array('transport'         => 'postMessage')
    );

    $wp_customize->add_control( 
        new WP_Customize_Image_Control( 
        $wp_customize, 
        'kulturai_resources_image', 
        array(
            'label'      => __( 'Archivo para descarga', 'kulturai' ),
            'section'    => 'kulturai_resources_options',
            'settings'   => 'kulturai_resources_image',
        ) ) 
    );


    $wp_customize->add_setting( 'kulturai_resources_title',
        array(
            'default'      => __( '¿Conoces realmente a tu consumidor?', 'kulturai' ),
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control( 
        'kulturai_resources_title', 
        array(
            'type'        => 'text',
            'section'     => 'kulturai_resources_options',
            'label'       =>  __( 'Título', 'kulturai' ),
            'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
            'flex_height' => true, // Require the res
        )
    );

    $wp_customize->add_setting( 'kulturai_resources_text',
        array(
            'default'      => __( 'Descarga un template que puede ayudarte', 'kulturai' ),
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control( 
        'kulturai_resources_text', 
        array(
            'type'        => 'text',
            'section'     => 'kulturai_resources_options',
            'label'       =>  __( 'Texto', 'kulturai' ),
            'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
            'flex_height' => true, // Require the res
        )
    );


    $wp_customize->add_setting( 'kulturai_resources_button_text',
        array(
            'default'      => __( 'Descargar recurso', 'kulturai' ),
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control( 
        'kulturai_resources_button_text', 
        array(
            'type'        => 'text',
            'section'     => 'kulturai_resources_options',
            'label'       =>  __( 'Texto del botón', 'kulturai' ),
            'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
            'flex_height' => true, // Require the res
        )
    );

    // Setting for Copyright text.
    $wp_customize->add_setting( 'kulturai_resources_file',
        array('transport'         => 'postMessage')
    );

    $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
        $wp_customize, 
        'kulturai_resources_file', 
        array(
            'label'      => __( 'Archivo para descarga', 'kulturai' ),
            'section'    => 'kulturai_resources_options',
            'settings'   => 'kulturai_resources_file',
        ) ) 
    );
}





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