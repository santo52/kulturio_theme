<?php // No copiar esta línea

// Register Custom Post Type
function resource_post_type() {

	$labels = array(
		'name'                  => _x( 'Recursos', 'recursos_domain' ),
		'singular_name'         => _x( 'Recurso', 'recursos_domain' ),
		'menu_name'             => __( 'Recursos', 'recursos_domain' ),
		'name_admin_bar'        => __( 'Recursos', 'recursos_domain' ),
		'archives'              => __( 'Archivo recursos', 'recursos_domain' ),
		'attributes'            => __( 'Atributos recursos', 'recursos_domain' ),
		'parent_item_colon'     => __( 'Recurso padre:', 'recursos_domain' ),
		'all_items'             => __( 'Resursos', 'recursos_domain' ),
		'add_new_item'          => __( 'Agregar nueva', 'recursos_domain' ),
		'add_new'               => __( 'Agregar', 'recursos_domain' ),
		'new_item'              => __( 'Nueva', 'recursos_domain' ),
		'edit_item'             => __( 'Editar', 'recursos_domain' ),
		'update_item'           => __( 'Actualizar', 'recursos_domain' ),
		'view_item'             => __( 'Ver recurso', 'recursos_domain' ),
		'view_items'            => __( 'Ver recursos', 'recursos_domain' ),
		'search_items'          => __( 'Buscar recurso', 'recursos_domain' ),
		'not_found'             => __( 'No encontrado', 'recursos_domain' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'recursos_domain' ),
		'featured_image'        => __( 'Imagen detacada', 'recursos_domain' ),
		'set_featured_image'    => __( 'Asignar imagen destacada', 'recursos_domain' ),
		'remove_featured_image' => __( 'Remover imagen', 'recursos_domain' ),
		'use_featured_image'    => __( 'Usar como imagen detacada', 'recursos_domain' ),
		'insert_into_item'      => __( 'Insertar en recurso', 'recursos_domain' ),
		'uploaded_to_this_item' => __( 'Subir a recurso', 'recursos_domain' ),
		'items_list'            => __( 'Lista recurso', 'recursos_domain' ),
		'items_list_navigation' => __( 'Navegación recursos', 'recursos_domain' ),
		'filter_items_list'     => __( 'Fitro recursos', 'recursos_domain' ),
	);

	$args = array (
		'label'                 => __( 'Recurso', 'recursos_domain' ),
		'description'           => __( 'Lista de recursos', 'recursos_domain' ),
		'supports' => array( 'title' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'kulturai_forms',
		'rewrite' => array('slug' => 'resources' ),
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
	register_post_type( 'resource_post_type', $args );

}
add_action( 'init', 'resource_post_type', 0 );


// Hooks admin-post


// Funcion callback
function kulturai_ajax_resource_form() {

	$name = sanitize_text_field($_POST['name']);
	$email = sanitize_email($_POST['email']);
	$company = sanitize_text_field($_POST['company']);

	$post_id = wp_insert_post([
		'post_title'	=>'Mensaje de '. $name,
		'post_type'		=>'resource_post_type',
		'post_status' 	=> 'publish',
		'meta_input' => array(
			'resource_cpt_name' => $name,
			'resource_cpt_email' => $email,
			'resource_cpt_company' => $company,
		)
	]);

	$response['saved'] = is_numeric($post_id);
	$resource = get_theme_mod('kulturai_resources_file');

	if($response['saved'] && $resource) {
		$response['resource'] = $resource;
	}

	echo json_encode($response);
	exit();
}

add_action( 'wp_ajax_nopriv_kulturai_ajax_resource_form', 'kulturai_ajax_resource_form' );
add_action( 'wp_ajax_kulturai_ajax_resource_form', 'kulturai_ajax_resource_form' );


