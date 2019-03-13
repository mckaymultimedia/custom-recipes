<?php
// Settings Page: Recipes Options
// Retrieving values: get_option( 'your_field_id' )
class recipesoptions_Settings_Page {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}

	public function wph_create_settings() {
		$page_title = 'Recipes Options';
		$menu_title = 'Recipes Options';
		$capability = 'manage_options';
		$slug = 'recipesoptions';
		$callback = array($this, 'wph_settings_content');
		add_management_page($page_title, $menu_title, $capability, $slug, $callback);
	}

	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>Recipes Options</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'recipesoptions' );
					do_settings_sections( 'recipesoptions' );
					submit_button();
				?>
			</form>
		</div> <?php
	}

	public function wph_setup_sections() {
		add_settings_section( 'recipesoptions_section', 'Description text goes here.', array(), 'recipesoptions' );
	}

	public function wph_setup_fields() {
		$fields = array(
			array(
				'label' => 'Example Field',
				'id' => 'example-field-id',
				'type' => 'text',
				'section' => 'recipesoptions_section',
			),
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'recipesoptions', $field['section'], $field );
			register_setting( 'recipesoptions', $field['id'] );
		}
	}

	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		$placeholder = '';
		if ( isset($field['placeholder']) ) {
			$placeholder = $field['placeholder'];
		}
		switch ( $field['type'] ) {
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$placeholder,
					$value
				);
		}
		if( isset($field['desc']) ) {
			if( $desc = $field['desc'] ) {
				printf( '<p class="description">%s </p>', $desc );
			}
		}
	}
}
new recipesoptions_Settings_Page();