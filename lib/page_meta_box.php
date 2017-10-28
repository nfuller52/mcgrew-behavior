<?php
namespace MBS\Lib;

/**
 * Helper class for creating meta objects
 *
 * TODO: Extract this out into a base class
 */
class PageMetaBox {

	/**
	 * Assign the necessary values for creating a meta box
	 *
	 * @param string $id
	 * @param string $title
	 * @param string $post_type
	 * @param string $context
	 * @param string $priority
	 * @param array $callback_args
	 */
	public function __construct( $id, $title, $post_type = 'post', $context = 'side', $priority = 'default', $callback_args = null ) {

		$this->id            = $id;
		$this->title         = $title;
		$this->post_type     = $post_type;
		$this->context       = $context;
		$this->priority      = $priority;
		$this->callback_args = $callback_args;

		$this->select_fields = array(
			'mbs-nav-color' => array(
				'title'   => 'Color',
				'options' => array( 'Full Color' => 'nav--full-color', 'White' => 'nav--white' )
			)
		);

		$this->nonce = basename( __FILE__) . __NAMESPACE__;

		add_action( 'add_meta_boxes', array( $this, 'register' ) );
		add_action( 'save_post', array( $this, 'save_meta_box_values' ), 10, 3 );
	}

	/**
	 * Creates the meta box for the supplied attributes
	 *
	 * @return void
	 */
	public function register() {

		add_meta_box( $this->id, $this->title, array( $this, 'display'), $this->post_type, $this->context, $this->priority );

	}

	/**
	 * Renders the HTML to the admin view. Currently only spec'd for select menus.
	 *
	 * @param  WP_Object The object in context, page, post etc.
	 * @return void
	 */
	public function display( $object ) {

		wp_nonce_field( $this->nonce, $this->id . '-nonce' );

		foreach ( $this->select_fields as $field => $settings ) {
			?>
				<div>
					<label for="<?php echo $field; ?>"><?php echo $settings['title']; ?></label>
					<select name="<?php echo $field; ?>">
						<?php
							foreach ( $settings['options'] as $title => $value ) {
								if ( $value === get_post_meta( $object->ID, $field, true ) ) {
									?>
										<option value="<?php echo $value;?>" selected><?php echo $title; ?></option>
									<?php
								} else {
									?>
										<option value="<?php echo $value;?>"><?php echo $title; ?></option>
									<?php
								}
							}
						?>
					</select>
				</div>
			<?php
		}

	}

	/**
	 * Sanitizes and saves the values provided by the meta box
	 *
	 * @param  integer   $object_id The id of object in context
	 * @param  WP_Object $object    The object in context, page, post etc.
	 * @param  WP_Object $update
	 * @return void
	 */
	public function save_meta_box_values( $object_id, $object, $update ) {

		foreach ( $this->select_fields as $field => $settings ) {
			if ( ! isset( $_POST[ $field ] ) || ! wp_verify_nonce( $_POST[ $this->id . '-nonce' ], $this->nonce ) ) return $object_id;
			if ( ! current_user_can( 'edit_post', $object_id ) ) return $object_id;
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return $object_id;
			if ( $this->post_type !== $object->post_type ) return $object_id;

			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $object_id, $field, $_POST[ $field ] );
			}
		}

	}

}
