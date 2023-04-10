<?php
/**
 * The settings callback.
 *
 * @since 1.0.0
 * @package open-ses-for-wordpress
 */

return function() {

	$settings = open_ses_for_wp_get_config( 'section-fields' );

	$settings_groups = $settings['groups'];

	foreach ( $settings_groups as $group_id => $section_group ) {

		foreach ( $section_group as $section_id => $section ) {

			$page = 'open-ses-for-wp';

			add_settings_section(
				$section_id,
				esc_html( $section['title'] ),
				require OSFWP_ABSPATH . '/src/views/section.php',
				$page
			);

			foreach ( $section['fields'] as $field ) {

				add_settings_field(
					$field['id'],
					$field['label'],
					require OSFWP_ABSPATH . '/src/views/field.php',
					$page,
					$section_id,
					array(
						'label_for' => $field['id'],
						'class'     => sanitize_html_class( $field['id'] ),
						'args'      => array(
							'field'   => $field,
							'setting' => $section,
						),
					)
				);

			}

			register_setting( $group_id, $section_id, array( 'test' => 1 ) );

		}
	}
};
