<?php
/*********************************************************************************
* 	Add custom field (radio button) to the user account (Woocommerce) 
*********************************************************************************/
add_action( 'woocommerce_edit_account_form', 'custom_field_edit_account_form' );
function custom_field_edit_account_form() {
	woocommerce_form_field(
		'custom_meta',
		array(
			'type'        => 'radio',
			'required'    => false,
			'label'       => 'Label',
			'options'	  => array( '' => 'Choose...', 'radio_1' => 'Radio 1', 'radio_2' => 'Radio 2', 'radio_3' => 'Radio 3')
		),
		get_user_meta( get_current_user_id(), 'custom_meta', true )
	);
}

add_action( 'woocommerce_save_account_details', 'theme_save_account_details' );
function theme_save_account_details( $user_id ) {
	update_user_meta( $user_id, 'custom_meta', sanitize_text_field( $_POST['custom_meta'] ) );
}
