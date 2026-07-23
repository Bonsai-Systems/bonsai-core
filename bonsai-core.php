<?php
/*
Plugin Name: Bonsai Digital Core Customisations
Description: Custom admin color scheme, Support link, and theme setup functions.
Version: 1.9
Author: The Bonsai Digital Collective
Author URI: https://bonsaidigitalcollective.co.uk/
Text Domain: bonsai

-------------------------------------------------------------
Update 2025-09-01: Refactored for code quality.
- Updated to 'The Bonsai Digital Collective Help Centre'
- Updates spellings on centre
-------------------------------------------------------------
*/

defined( 'ABSPATH' ) || exit;

// Plugin Update Checker — checks GitHub releases for new versions
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$bonsai_update_checker = PucFactory::buildUpdateChecker(
	'https://github.com/The-Bonsai-Digital-Collective/bonsai-core/',
	__FILE__,
	'bonsai-core'
);

// Private repo — fine-grained token with Contents: read-only scope.
// Define BONSAI_PUC_GITHUB_TOKEN in wp-config.php (never commit the token itself).
if ( defined( 'BONSAI_PUC_GITHUB_TOKEN' ) && BONSAI_PUC_GITHUB_TOKEN ) {
	$bonsai_update_checker->setAuthentication( BONSAI_PUC_GITHUB_TOKEN );
}

$bonsai_update_checker->getVcsApi()->enableReleaseAssets();

// Register custom admin color scheme
function bonsai_custom_admin_color_scheme() {
	$css_file = plugin_dir_url( __FILE__ ) . 'colour-scheme.css';
	wp_admin_css_color(
		'bonsai',
		__( 'Bonsai Collective Colour Scheme', 'bonsai' ),
		$css_file,
		array( '#000000', '#ffffff', '#ee4367', '#ee4367' )
	);
}
add_action( 'admin_init', 'bonsai_custom_admin_color_scheme' );

// Force all users to use the custom admin color scheme
function bonsai_set_default_admin_color( $color_scheme ) {
	return 'bonsai';
}
add_filter( 'get_user_option_admin_color', 'bonsai_set_default_admin_color', 5 );

// Bonsai Support Menu
function bonsai_add_custom_toolbar_menu( $wp_admin_bar ) {
	$args = array(
		'id'    => 'bonsai-support-menu',
		'title' => __( 'Contact the support desk', 'bonsai' ),
		'href'  => 'https://bonsaidigitalcollective.zendesk.com/hc/en-gb/requests/new',
		'meta'  => array(
			'target' => '_blank',
			'rel'    => 'noopener',
			'title'  => __( 'Open support desk in a new tab', 'bonsai' ),
		),
	);
	$wp_admin_bar->add_menu( $args );
}
add_action( 'admin_bar_menu', 'bonsai_add_custom_toolbar_menu', 999 );

// Bonsai Support Widget
add_action( 'wp_dashboard_setup', 'bonsai_add_support_widget', 10 );

function bonsai_add_support_widget() {
	wp_add_dashboard_widget(
		'bonsai_support_widget',
		esc_html__( 'The Bonsai Digital Collective Help Centre', 'bonsai' ),
		'bonsai_render_support_widget'
	);
}

function bonsai_render_support_widget() {
	// Defaults (override with the filters below if needed)
	$banner = apply_filters(
		'bonsai_support_banner_url', 'https://bonsaidigitalcollective.co.uk/support-banner.jpg'
	);
	$hc = apply_filters(
		'bonsai_support_helpcentre_url',
		'https://bonsaidigitalcollective.zendesk.com/hc/en-gb'
	);
	$req = apply_filters(
		'bonsai_support_request_url',
		'https://bonsaidigitalcollective.zendesk.com/hc/en-gb/requests/new'
	);

	// Output
	echo '<div style="margin:-12px -12px 0 -12px;">';
	if ( $banner ) {
		echo '<img src="' . esc_url( $banner ) . '" alt="' . esc_attr__( 'Bonsai Digital Support', 'bonsai' ) . '" style="width:100%;height:auto;">';
	}
	echo '</div>';

	echo '<p>' . esc_html__( 'If you\'ve found a problem or have a question, please visit our', 'bonsai' ) . ' ';
	echo '<a href="' . esc_url( $hc ) . '" target="_blank" rel="noopener" style="color:#ee4367;text-decoration:underline;">' . esc_html__( 'Help Centre', 'bonsai' ) . '</a> ';
	echo esc_html__( 'for quick answers to common issues.', 'bonsai' ) . '</p>';

	echo '<p>' . esc_html__( 'If you don\'t find what you need, just', 'bonsai' ) . ' ';
	echo '<a href="' . esc_url( $req ) . '" target="_blank" rel="noopener" style="color:#ee4367;text-decoration:underline;">' . esc_html__( 'contact our support team', 'bonsai' ) . '</a> ';
	echo esc_html__( 'and we\'ll get back to you as soon as possible.', 'bonsai' ) . '</p>';

	echo '<p style="margin-bottom:0;">' . esc_html__( 'We\'re here to help keep your site running smoothly!', 'bonsai' ) . '</p>';
}
