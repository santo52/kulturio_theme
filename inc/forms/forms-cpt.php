<?php 

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

 add_action( 'admin_menu', 'kulturai_forms_menu' );

 ?>