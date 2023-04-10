<?php
/**
 * The Field template.
 *
 * @since 1.0.0
 * @package open-ses-for-wordpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

return function() use ( $section_id, $field ) {

	$option = get_option( $section_id );
	$value  = '';
	$id     = esc_attr( $field['id'] );

	if ( false !== $option ) {
		$value = isset( $option[ $id ] ) ? $option[ $id ] : '';
	}

	$placeholder = $field['placeholder'];
	$description = $field['description'];

	$required = $field['required'] ? 'required' : '';
	$pattern  = isset( $field['pattern'] ) ? "pattern={$field['pattern']}" : '';
	$type     = isset( $field['type'] ) ? $field['type'] : 'text';
	$name     = $section_id . '[' . $id . ']';

	?>
	<input class="regular-text" 
		<?php echo esc_attr( $required ); ?> 
		<?php echo esc_attr( $pattern ); ?>
		id="<?php echo esc_attr( $id ); ?>"
		name="<?php echo esc_attr( $name ); ?>"
		placeholder="<?php echo esc_attr( $placeholder ); ?>"
		type="<?php echo esc_attr( $type ); ?>"
		value="<?php echo esc_attr( $value ); ?>"
		/>
		<p class='description'>
			<?php echo esc_html( $description ); ?>
		</p>
	<?php
};
