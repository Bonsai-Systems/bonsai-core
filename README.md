# Bonsai Digital Core Customisations

A lightweight WordPress plugin that applies branded admin customisations and adds quick support access for clients.  

![WordPress](https://img.shields.io/badge/WordPress-%5E6.0-blue)  

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
  - Links to [Bonsai Support](https://support.bonsaidigitalcollective.co.uk/)  
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

## Updates

Ships with [YahnisElsts/plugin-update-checker](https://github.com/YahnisElsts/plugin-update-checker) (installed via Composer, `vendor/` committed), loaded via `vendor/autoload.php` and pointed at `github.com/Bonsai-Systems/bonsai-core` — the same pattern used by `bonsai-code-injector` and `bonsai-maintenance`. Sites with the plugin installed see updates on the **Plugins** screen in wp-admin.

This is a private repo, so the update checker needs a GitHub token to read releases:

1. Create a fine-grained personal access token scoped to `Bonsai-Systems/bonsai-core` with **Contents: read-only**.
2. Define it in `wp-config.php` on each site: `define( 'BONSAI_PUC_GITHUB_TOKEN', 'github_pat_...' );`
3. Never commit the token itself.

To ship a new version:

1. Bump the `Version:` header in `bonsai-core.php` and add a `CHANGELOG.md` entry.
2. Commit and push to `main`.
3. Publish a GitHub Release tagged with the new version (release-assets mode is enabled, so attach a zip of the plugin folder — plain source-archive tags won't be picked up).

Sites check for updates every 6 hours (`$checkPeriod` argument to `buildUpdateChecker()`), or immediately if an admin clicks "Check again" on the Plugins screen.

---

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for the full release history.

---

## Development Notes

- Built to be lightweight and DRY  
- Follows WordPress coding standards and escaping best practices  
- Inline styles are minimal; enqueue a custom admin stylesheet if needed  

---

## Author

Developed by [Ben Ervine / The Bonsai Digital Collective](https://bonsaidigitalcollective.co.uk/)  
