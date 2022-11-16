<?php 

function kulturai_customize_register( $wp_customize ) {
    $wp_customize->remove_control('site_icon');

    $wp_customize->add_setting(
        'email_contact',
        array(
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',
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

    $wp_customize->add_setting(
        'linkedin_link',
        array(
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'linkedin_link',
        array(
            'type'        => 'text',
            'section'     => 'title_tagline',
            'label'       =>  __( 'Linkedin link' ),
            'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
            'flex_height' => true, // Require the res
        )
    );


    // $wp_customize->add_control(
    //     'resource_file',
    //     array(
    //         'type'        => 'text',
    //         'section'     => 'title_tagline',
    //         'label'       =>  __( 'Archivo recurso' ),
    //         'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
    //         'flex_height' => true, // Require the res
    //     )
    // );

    // $images = [
    //     [ "key" => 'logo_mobile', "label"  => __( 'Logo mobile' ) ],
    //     [ "key" => 'logo_desktop', "label"  => __( 'Logo desktop' ) ],
    // ];


    // foreach ($images as $image) {
    //     $wp_customize->add_setting(
    //         $image['key'],
    //         array(
    //             'capability'        => 'edit_theme_options',
    //             'transport'         => 'postMessage',
    //         )
    //     );

    //     $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, $image['key'], array(
    //         'section'     => 'title_tagline',
    //         'label'       => $image['label'],
    //         'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
    //         'flex_height' => true, // Require the resulting image to be exactly as tall as the height attribute (default).
    //         // 'width'       => 1500,
    //         // 'height'      => 1500,
    //     ) ) );
    // }

    // // Add postMessage support for site title and description.
    // $wp_customize->get_setting('blogname')->transport = 'postMessage';
    // $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    /* 个人简介 */
    // $wp_customize->add_section('pure_profile_options', array('title' => __('Formularios', 'pure'), 'description' => __('Add profile here. This may be shown publicly', 'pure'), 'priority' => 25));
    // // 是否显示




    // $wp_customize->add_setting('pure_profile_show_on', array('default' => get_option('pure_profile_show_on', 'off'), 'sanitize_callback' => 'pure_sanitize_show_on'));
    // $wp_customize->add_control('pure_profile_show_on', array('label' => __('Front page displays', 'pure'), 'section' => 'pure_profile_options', 'type' => 'radio', 'choices' => array('on' => __('Show on', 'pure'), 'off' => __('Show off', 'pure'))));
    // // 邮箱
    // $wp_customize->add_setting('pure_profile_email', array('default' => '', 'sanitize_callback' => 'pure_sanitize_email'));
    // $wp_customize->add_control('pure_profile_email', array('label' => __('Email address', 'pure'), 'section' => 'pure_profile_options', 'type' => 'text'));
    // // 昵称
    // $wp_customize->add_setting('pure_profile_nickname', array('default' => '', 'sanitize_callback' => 'pure_sanitize_nohtml'));
    // $wp_customize->add_control('pure_profile_nickname', array('label' => __('Nickname', 'pure'), 'section' => 'pure_profile_options', 'type' => 'text'));
    // // 简介
    // $wp_customize->add_setting('pure_profile_description', array('default' => '', 'sanitize_callback' => 'pure_sanitize_nohtml'));
    // $wp_customize->add_control('pure_profile_description', array('label' => __('Description', 'pure'), 'section' => 'pure_profile_options', 'type' => 'textarea'));
    /* copyright */
    // $wp_customize->add_section('pure_copyright_options', array('title' => __('Copyright', 'pure'), 'description' => __('Add copyright here. This may be shown publicly', 'pure'), 'priority' => 25));
    // // 备案号
    // $wp_customize->add_setting('pure_copyright_icp', array('default' => '', 'sanitize_callback' => 'pure_sanitize_nohtml'));
    // $wp_customize->add_control('pure_copyright_icp', array('label' => __('ICP Licensing', 'pure'), 'section' => 'pure_copyright_options', 'type' => 'text'));
    
    $wp_customize->add_panel( 'kulturai_form_options', 
    array(
            //'priority'       => 100,
            'title'            => __( 'Formularios', 'kulturai' ),
            'description'      => __( 'Lista de formularios del tema', 'kulturai' ),
        ) 
    );

    // Text Options Section Inside Theme
    $wp_customize->add_section( 'kulturai_resources_options', 
        array(
            'title'         => __( 'Formulario de Recursos', 'kulturai' ),
            'priority'      => 1,
            'panel'         => 'kulturai_form_options'
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
            'transport'         => 'refresh'
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
            'transport'         => 'refresh'
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
            'transport'         => 'refresh'
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

    

    // // Setting for Copyright text.
    // $wp_customize->add_setting( 'nd_dosth_copyright_text2',
    //     array(
    //         'default'           => __( 'All rights reserved ', 'nd_dosth' ),
    //         'sanitize_callback' => 'sanitize_text_field',
    //         'transport'         => 'refresh',
    //     )
    // );
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