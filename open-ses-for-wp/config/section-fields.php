<?php
$pref = function( $name = '' ) {
	return 'open_ses_field_' . $name;
};

$smtp_desc = sprintf(
	__(
		'SMTP settings in AWS SES can be found in the SMTP Settings section under the SES console. To access it, log in to your AWS account, navigate to the SES console, select the appropriate region, and click on the "SMTP Settings" option in the left-hand menu.',
		'open-ses-for-wpp'
	),
	'<a href="https://docs.aws.amazon.com/ses/latest/dg/smtp-credentials.html" target="_blank">',
	'</a>'
);

$creds_desc = sprintf(
	__(
		"These values are used to authenticate the sender's identity when sending email messages. To obtain your Amazon SES SMTP Credentials, please refer to this %1\$sdocumentation%2\$s for guidance.",
		'open-ses-for-wpp'
	),
	'<a href="https://docs.aws.amazon.com/ses/latest/dg/smtp-credentials.html" target="_blank">',
	'</a>'
);

return array(
	'groups' => array(
		'basic' => array(
			'open_ses_smtp_section'  => array(
				'title'       => esc_html__( 'SMTP settings', 'open-ses-for-wp' ),
				'description' => $smtp_desc,
				'fields'      => array(
					array(
						'label'       => 'Host',
						'id'          => $pref( 'host' ),
						'description' => '',
						'placeholder' => 'email-smtp.us-east-1.amazonaws.com',
						'required'    => true,
					),
					array(
						'label'       => 'Port',
						'id'          => $pref( 'port' ),
						'description' => 'The port number. Provide an integer value.',
						'placeholder' => '25, 587 or 2587. ',
						'required'    => true,
						'pattern'     => '\d*',
					),
				),
			),
			'open_ses_creds_section' => array(
				'id'          => 'open_ses_creds_section',
				'title'       => esc_html__( 'Credentials', 'open-ses-for-wp' ),
				'description' => $creds_desc,
				'fields'      => array(
					array(
						'label'       => 'Username',
						'id'          => $pref( 'username' ),
						'description' => '',
						'placeholder' => '',
						'required'    => true,
					),
					array(
						'label'       => 'Password',
						'type'        => 'password',
						'description' => '',
						'id'          => $pref( 'password' ),
						'placeholder' => '',
						'required'    => true,
					),
				),
			),
		),
	),
);
