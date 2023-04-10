<?php
/**
 * The main settings template.
 *
 * @since 1.0.0
 * @package open-ses-for-wp
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

return function( $args ) {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	?>
	<style>
	#wpcontent, .site-health #wpcontent, .site-health.auto-fold #wpcontent {
		padding-left: 0;
	}
	</style>
	<div class="privacy-settings-header open-ses-for-wp-header">
		<div class="privacy-settings-title-section">
			<h1 style="margin:1.5em auto 0 auto;">
				<?php esc_html_e( 'Amazon Simple Email Service (SES)', 'open-ses-for-wp' ); ?><br/>
				<small style="font-size: 1rem;font-weight: 400;color: #454545;">
					<?php echo esc_html( get_admin_page_title() ); ?>
				</small>
			</h1>
		</div>
		<nav class="privacy-settings-tabs-wrapper hide-if-no-js" aria-label="<?php esc_attr_e( 'Secondary menu', 'open-ses-for-wp' ); ?>">
			<a href="javascript:return false;" class="privacy-settings-tab active" aria-current="true">
				<?php esc_html_e( 'Settings', 'open-ses-for-wp' ); ?>
			</a>
			<a href="https://github.com/JosephGabito/amazon-ses-simple-email-service-smtp-plugin-for-wordpress" class="privacy-settings-tab" aria-current="true">
				<?php esc_html_e( 'Github', 'open-ses-for-wp' ); ?>
			</a>
		</nav>
	</div>

	<hr class="wp-header-end">

	<div class="health-check-body">

		<?php settings_errors( 'wporg_messages' ); ?>

		<form action="options.php" method="post">
			<?php settings_fields( 'basic' ); ?>
			<?php do_settings_sections( 'open-ses-for-wp' ); ?>
			<?php $smtp = get_option( 'open_ses_smtp_section' ); ?>
			<?php $creds = get_option( 'open_ses_creds_section' ); ?>
			<?php submit_button( 'Save settings' ); ?>
		</form>

	</div>
	<?php
};
