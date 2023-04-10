<?php
/**
 * The Section template.
 *
 * @since 1.0.0
 * @package open-ses-for-wp
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

return function( $hook_args ) use ( $section ) {
	?>
	<p id="<?php echo esc_attr( $hook_args['id'] ); ?>">
		<?php echo wp_kses_post( $section['description'] ); ?>
	</p>
	<?php
};
