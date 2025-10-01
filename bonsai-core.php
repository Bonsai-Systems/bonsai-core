<?php
/*
Plugin Name: Bonsai Digital Core Customisations
Description: Custom admin color scheme, Support link, and theme setup functions.
Version: 1.6
Author: Ben Ervine / The Bonsai Digital Collective
*/


// Register custom admin color scheme
function bonsai_custom_admin_color_scheme() {
    $css_file = plugin_dir_url(__FILE__) . 'colour-scheme.css';
    wp_admin_css_color(
        'bonsai',
        __('Bonsai Collective Colour Scheme'),
        $css_file,
        array('#000000', '#ffffff', '#ee4367', '#ee4367')
    );
}
add_action('admin_init', 'bonsai_custom_admin_color_scheme');

// Force all users to use the custom admin color scheme
function bonsai_set_default_admin_color($color_scheme) {
    return 'bonsai';
}
add_filter('get_user_option_admin_color', 'bonsai_set_default_admin_color', 5);

// Bonsai Support Menu 
function add_custom_toolbar_menu( $wp_admin_bar ) {
  $args = array(
    'id'    => 'custom-menu',
    'title' => __( 'Contact the support desk', 'textdomain' ),
    'href'  => 'https://bonsaidigitalcollective.zendesk.com/hc/en-gb/requests/new',
    'meta'  => array(
      'target' => '_blank', // Open in new tab
      'title'  => __( 'Open support desk in a new tab', 'textdomain' )
    )
  );
  $wp_admin_bar->add_menu( $args ); 
}
add_action( 'admin_bar_menu', 'add_custom_toolbar_menu', 999 );

// Bonsai Support Widget
add_action('wp_dashboard_setup', 'bonsai_add_support_widget', 10);

function bonsai_add_support_widget() {
  wp_add_dashboard_widget(
    'bonsai_support_widget',
    __('The Bonsai Digital Collective Maintenance Support', 'textdomain'),
    'bonsai_render_support_widget'
  );
}

function bonsai_render_support_widget() {
  // Defaults (override with the filters below if needed)
  $banner = apply_filters(
    'bonsai_support_banner_url', 'https://bonsaidigitalcollective.co.uk/support-banner.jpg'
  );
  $hc  = apply_filters(
    'bonsai_support_helpcentre_url',
    'https://bonsaidigitalcollective.zendesk.com/hc/en-gb'
  );
  $req = apply_filters(
    'bonsai_support_request_url',
    'https://bonsaidigitalcollective.zendesk.com/hc/en-gb/requests/new'
  );

  // Output
  echo '<div style="margin:-12px -12px 0 -12px;">';
  if ($banner) {
    echo '<img src="' . esc_url($banner) . '" alt="' . esc_attr__('Bonsai Digital Support', 'textdomain') . '" style="width:100%;height:auto;">';
  }
  echo '</div>';

  echo '<p>' . esc_html__('If you’ve found a problem or have a question, please visit our', 'textdomain') . ' ';
  echo '<a href="' . esc_url($hc) . '" target="_blank" rel="noopener" style="color:#ee4367;text-decoration:underline;">' . esc_html__('Help Centre', 'textdomain') . '</a> ';
  echo esc_html__('for quick answers to common issues.', 'textdomain') . '</p>';

  echo '<p>' . esc_html__('If you don’t find what you need, just', 'textdomain') . ' ';
  echo '<a href="' . esc_url($req) . '" target="_blank" rel="noopener" style="color:#ee4367;text-decoration:underline;">' . esc_html__('contact our support team', 'textdomain') . '</a> ';
  echo esc_html__('and we’ll get back to you as soon as possible.', 'textdomain') . '</p>';

  echo '<p style="margin-bottom:0;">' . esc_html__('We’re here to help keep your site running smoothly!', 'textdomain') . '</p>';
}
