<?php // No copiar esta línea

// Register Custom Post Type
function contact_post_type() {

	$labels = array(
		'name'                  => _x( 'Contactos', 'Post Type General Name', 'contactos_domain' ),
		'singular_name'         => _x( 'Contacto', 'Post Type Singular Name', 'contactos_domain' ),
		'menu_name'             => __( 'Contactos', 'contactos_domain' ),
		'name_admin_bar'        => __( 'Contactos', 'contactos_domain' ),
		'archives'              => __( 'Archivo contactos', 'contactos_domain' ),
		'attributes'            => __( 'Atributos contactos', 'contactos_domain' ),
		'parent_item_colon'     => __( 'Contacto padre:', 'contactos_domain' ),
		'all_items'             => __( 'Contactos', 'contactos_domain' ),
		'add_new_item'          => __( 'Agregar nueva', 'contactos_domain' ),
		'add_new'               => __( 'Agregar', 'contactos_domain' ),
		'new_item'              => __( 'Nueva', 'contactos_domain' ),
		'edit_item'             => __( 'Editar', 'contactos_domain' ),
		'update_item'           => __( 'Actualizar', 'contactos_domain' ),
		'view_item'             => __( 'Ver contacto', 'contactos_domain' ),
		'view_items'            => __( 'Ver contactos', 'contactos_domain' ),
		'search_items'          => __( 'Buscar contacto', 'contactos_domain' ),
		'not_found'             => __( 'No encontrado', 'contactos_domain' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'contactos_domain' ),
		'featured_image'        => __( 'Imagen detacada', 'contactos_domain' ),
		'set_featured_image'    => __( 'Asignar imagen destacada', 'contactos_domain' ),
		'remove_featured_image' => __( 'Remover imagen', 'contactos_domain' ),
		'use_featured_image'    => __( 'Usar como imagen detacada', 'contactos_domain' ),
		'insert_into_item'      => __( 'Insertar en contacto', 'contactos_domain' ),
		'uploaded_to_this_item' => __( 'Subir a contacto', 'contactos_domain' ),
		'items_list'            => __( 'Lista contacto', 'contactos_domain' ),
		'items_list_navigation' => __( 'Navegación contactos', 'contactos_domain' ),
		'filter_items_list'     => __( 'Fitro contactos', 'contactos_domain' ),
	);
	$args = array(
		'label'                 => __( 'Contacto', 'contactos_domain' ),
		'description'           => __( 'Lista de contactos', 'contactos_domain' ),
		'supports' => array( 'title' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'kulturai_forms',
		'rewrite' => array('slug' => 'contacts' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array(),
		'menu_position'         => 1,
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
        'capabilities' => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap' =>true,
	);
	register_post_type( 'contact_post_type', $args );

}
add_action( 'init', 'contact_post_type', 0 );


// Hooks admin-post


// Funcion callback
function kulturai_ajax_contact_form() {

	$name = sanitize_text_field($_POST['name']);
	$email = sanitize_email($_POST['email']);
	$subject = sanitize_text_field($_POST['subject']);
	$message = sanitize_textarea_field($_POST['message']);

	$isActive = get_theme_mod("email_contact");
	$sendmail = false;
	if(get_theme_mod("email_contact")) {
		$adminmail = get_theme_mod("email_contact"); //email destino
		$sub = 'Contacto: ' . $subject; //asunto
		$headers = "Reply-to: " . $name . " <" . $email . ">";

		//Cuerpo del mensaje
		$msg = "Nombre: " . $name . "\n";
		$msg .= "E-mail: " . $email . "\n\n";
		$msg .= "Mensaje: \n\n" . $message . "\n";

		$sendmail = wp_mail( $adminmail, $sub, $msg, $headers);
	}

	$post_id = wp_insert_post([
		'post_title'	=>'Mensaje de '. $name,
		'post_type'		=>'contact_post_type',
		'post_status' 	=> 'publish',
		'meta_input' => array(
			'contact_cpt_name' => $name,
			'contact_cpt_email' => $email,
			'contact_cpt_subject' => $subject,
			'contact_cpt_message' => $message,
		)
	]);

	$saved = $post_id || $sendmail;
	echo json_encode(["saved" => $saved]);
	exit();
}

add_action( 'wp_ajax_nopriv_kulturai_ajax_contact_form', 'kulturai_ajax_contact_form' );
add_action( 'wp_ajax_kulturai_ajax_contact_form', 'kulturai_ajax_contact_form' );