# Open Amazon Simple Email Service (SES)

A light weight WordPress plugin that provides user interface so you can use Amazon SES as an SMTP server.

Uses action hook called `phpmailer_init` to overwite default WordPress email SMTP to use AMAZON SES credentials you specified in the wp-admin -> Settings -> Amazon SES

Screenshot:

<img width="898" alt="Screenshot 2023-04-10 at 2 05 46 PM" src="https://user-images.githubusercontent.com/81974552/230837642-342ef2ff-5bb5-4cbb-a084-0df4088e68c8.png">

## Downloading
- Go to the [releases](https://github.com/JosephGabito/open-ses-for-wp/releases/tag/1.0.0) tab, and download a specific version.

## Installation
- Log in to your WordPress dashboard.
- Navigate to the "Plugins" section on the left-hand side of the dashboard.
- Click on "Add New."
- Click on the "Upload Plugin" button.
- Select the plugin file from your computer and click on "Install Now."
- Once the installation is complete, click on "Activate" to activate the plugin.

## Usage
- Go to wp-admin > Settings > Amazon SES
- Go to Amazon SES Console, and locate your SMTP settings. Create a credentials if needed.
- Go back to wp-admin > Settings > Amazon SES and provide the credentials.
- Send a test email to your self.

