# Bonsai Digital Core Customisations

A lightweight WordPress plugin that applies branded admin customisations and adds quick support access for clients.  

![WordPress](https://img.shields.io/badge/WordPress-%5E6.0-blue)  
![License: GPL v2](https://img.shields.io/badge/License-GPLv2-blue.svg)  

---

## Description

This plugin ensures a consistent Bonsai Digital Collective experience across WordPress by providing:

- **Custom Admin Colour Scheme**  
  - Applies Bonsai’s brand colours (#000000, #ffffff, #ee4367) to the WordPress dashboard  
  - Forces all users to use the branded scheme  

- **Admin Bar Support Menu**  
  - Adds a persistent link to the support desk in the WordPress admin bar  
  - Opens in a new tab for quick access to support  

- **Dashboard Support Widget**  
  - Displays a branded support banner  
  - Links to the [Help Centre](https://bonsaidigitalcollective.zendesk.com/hc/en-gb)  
  - Provides direct access to submit support requests  
  - Includes friendly messaging for clients and site managers  

---

## Installation

1. Download the plugin `.zip` or clone the repo.  
2. Upload to `/wp-content/plugins/` directory or install via the WordPress admin **Plugins → Add New → Upload**.  
3. Activate **Bonsai Digital Core Customisations** from the WordPress **Plugins** screen.  
4. The custom colour scheme, admin bar link, and dashboard widget will load automatically.  

---

## Frequently Asked Questions

**Q: Can users switch back to another colour scheme?**  
A: No — the plugin forces all users to use the Bonsai branded scheme.  

**Q: Who can see the support widget and menu?**  
A: By default, all users with Dashboard/Admin access. To restrict, add a capability check (e.g. `current_user_can('manage_options')`).  

**Q: Can I customise the banner or support links?**  
A: Yes — edit the `$banner`, `$hc`, and `$req` variables inside the plugin, or override them with filters.  

---

## Changelog

### 1.6 (2025-10-01)  
- Added custom admin colour scheme using Bonsai brand colours  
- Forced all users onto Bonsai colour scheme for consistency  
- Added admin bar support link (opens in a new tab)  
- Added support widget with banner, Help Centre, and support request links  
- Improved escaping and admin-only context  

---

## Development Notes

- Built to be lightweight and DRY  
- Follows WordPress coding standards and escaping best practices  
- Inline styles are minimal; enqueue a custom admin stylesheet if needed  

---

## Author

Developed by [Ben Ervine / The Bonsai Digital Collective](https://bonsaidigitalcollective.co.uk/)  
