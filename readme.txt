=== Bonsai Digital Core Customisations ===
Contributors: bonsaidigital, benervine  
Tags: admin, colour scheme, dashboard widget, support, branding  
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.10
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html  

Applies Bonsai’s branded admin colour scheme, adds a support link in the admin bar, and provides a dashboard support widget with quick access to help resources.

== Description ==

This plugin enhances the WordPress admin for Bonsai Digital Collective clients by:

* **Custom Admin Colour Scheme**  
  * Applies Bonsai’s brand colours (#000000, #ffffff, #ee4367)  
  * Forces all users to use the scheme for a consistent experience  

* **Admin Bar Support Menu**  
  * Adds a “Contact the support desk” link to the admin bar  
  * Opens in a new tab for quick access  

* **Dashboard Support Widget**  
  * Displays a branded support banner  
  * Links to the Help Centre and Support Request form  
  * Includes clear client-facing guidance  

== Installation ==

1. Upload the plugin files to `/wp-content/plugins/bonsai-core-customisations` or install via the WordPress Plugins screen.  
2. Activate **Bonsai Digital Core Customisations** from the WordPress Plugins screen.  
3. The custom colour scheme, admin bar link, and dashboard widget will load automatically.  

== Frequently Asked Questions ==

= Can users switch colour schemes? =  
No. This plugin forces all users to use the Bonsai branded scheme.  

= Who can see the support widget and menu? =  
All users with Dashboard/Admin access. To restrict, add a capability check (e.g. `current_user_can('manage_options')`).  

= Can I change the banner or links? =  
Yes. Edit the `$banner`, `$hc`, and `$req` variables directly in the plugin, or override them using the provided filters.  

== Screenshots ==

1. Custom Bonsai admin colour scheme in action.  
2. Dashboard support widget with banner and links.  
3. Admin bar menu with quick support link.  

== Changelog ==

= 1.10 (2026-08-13) =
* Plugin Update Checker now reads its GitHub token from `BONSAI_PUC_GITHUB_TOKEN` in wp-config.php instead of a hardcoded value in the plugin file
* Fixed update checker repository URL (was pointing at the old Bonsai org, now `Bonsai-Systems`)
* Fixed a fatal "class already in use" error that could occur when this plugin was active alongside other Bonsai plugins bundling the same Composer dependency
* Added `defined('ABSPATH') || exit;` guard against direct file access
* Update checker now checks every 6 hours and targets the `main` branch explicitly, matching the rest of the Bonsai plugin suite

= 1.6 (2025-10-01) =
* Added Bonsai custom admin colour scheme and forced it for all users  
* Added admin bar support link (opens in new tab)  
* Added branded support widget with Help Centre and support request links  
* Improved escaping and admin-only context  

== Upgrade Notice ==

= 1.8 =  
New release includes branded admin colour scheme, support menu, and widget. Recommended update.  
