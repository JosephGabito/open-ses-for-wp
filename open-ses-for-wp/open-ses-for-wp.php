<?php
/**
 * Plugin Name:         Open Amazon Simple Email Service (SES)
 * Description:         A light weight WordPress plugin that provides user interface so you can use Amazon SES as an SMTP server.
 * Author:              Joseph G.
 * Author URI:          https://wordpress.org/plugins/open-ses-for-wp
 * Plugin URI:          https://wordpress.org/plugins/open-ses-for-wp
 * Text Domain:         open-ses-for-wp
 * Domain Path:         /languages
 * License:             GPLv3
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 * Version:             1.0.0
 * Requires at least:   5.0
 * Requires PHP:        5.6
 *
 * @package open-ses-for-wp
 */

define( 'OSFWP_ABSPATH', trailingslashit( __DIR__ ) );
define( 'OSFWP_VERSION', '1.0.0' );

add_action(
	'phpmailer_init',
	function( $mailer ) {

		$options = open_ses_for_wp_get_options();

		if ( is_array( $options )
		&& ! empty( $options )
		&& 4 === count( $options ) ) {

			$mailer->IsSMTP();
			$mailer->Host     = $options['open_ses_field_host'];
			$mailer->Port     = $options['open_ses_field_port'];
			$mailer->Username = $options['open_ses_field_username'];
			$mailer->Password = $options['open_ses_field_password'];
			$mailer->SMTPAuth = true;
		}

	},
	10,
	1
);

/**
 * Retrieves the settings fields config.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'open_ses_for_wp_get_config' ) ) {

	/**
	 * Retrieves a specific config.
	 *
	 * @param string $conf Option parameter to retrieve a specific config in /config directory.
	 *
	 * @return array The array of settings fields.
	 */
	function open_ses_for_wp_get_config( $conf = '' ) {

		if ( empty( $conf ) ) {
			_doing_it_wrong( 'open_ses_for_wp_get_config', 'Provide the config name', '1.0.0' );
			return array();
		}

		return (array) require dirname( __DIR__ )
			. '/open-ses-for-wp/config/' . sanitize_file_name( $conf )
			. '.php';

	}
}

if ( ! function_exists( 'open_ses_for_wp_get_options' ) ) {

	/**
	 * Retrieves the SMTP options.
	 *
	 * @return array[]
	 */
	function open_ses_for_wp_get_options() {

		$options = array();
		$config  = open_ses_for_wp_get_config( 'section-fields' );

		foreach ( $config['groups'] as $groups ) {
			foreach ( $groups as $section_id => $section ) {
				$option_value = get_option( $section_id );
				if ( is_array( $option_value ) && false !== $option_value ) {
					$options[] = $option_value;
				}
			}
		}

		return array_merge( ...$options );

	}
}
/**
 * Initialize our settings page.
 *
 * @since 1.0.0
 */
add_action(
	'admin_init',
	function() {
		$settings = OSFWP_ABSPATH . 'src/settings/settings.php';
		if ( file_exists( $settings ) ) {
			call_user_func( require_once $settings );
		}
	}
);

/**
 * Adds 'Amazon SES' menu under /wp-admin > Settings.
 *
 * @since 1.0.0
 */
add_action(
	'admin_menu',
	function() {
		add_submenu_page(
			'options-general.php',
			__( 'SMTP settings & credentials', 'open-ses-for-wp' ),
			__( 'Amazon SES', 'open-ses-for-wp' ),
			'manage_options',
			'open-ses-for-wp',
			require_once OSFWP_ABSPATH . '/src/views/settings.php',
			20
		);
	}
);
