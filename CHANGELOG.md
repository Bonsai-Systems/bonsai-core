# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
-

### Changed
-

### Fixed
-

### Removed
-

### Security
-

---

## [1.10] - 2026-11-11

### Added
- [bonsai-core.php] Plugin Update Checker now matches the `bonsai-code-injector` reference setup: explicit 6-hour `$checkPeriod` (was the library default of 12h) and `setBranch( 'main' )` for an unambiguous update source

### Changed
- [bonsai-core.php] GitHub PAT for the Plugin Update Checker now read from a `BONSAI_PUC_GITHUB_TOKEN` constant instead of being hardcoded in the file
- [bonsai-core.php] Update checker repository URL corrected to `github.com/Bonsai-Systems/bonsai-core` (was pointing at the old `The-Bonsai-Digital-Collective` org, which would have made update checks fail silently)
- [bonsai-core.php] Admin bar link and dashboard widget now point to `https://support.bonsaidigitalcollective.co.uk/` (was the old Zendesk help centre); labels renamed to "Bonsai Support"
- [README.md] Help Centre link updated to the new support site

### Fixed
- [bonsai-core.php] Added missing `defined('ABSPATH') || exit;` guard to prevent direct file access
- [composer.json] `composer.json` was byte-identical to several other Bonsai plugins' (all requiring `yahnis-elsts/plugin-update-checker`), which risked Composer generating the same `ComposerAutoloaderInit{hash}` autoloader class across plugins — a fatal "class already in use" error if two such plugins were ever active together on the same site (confirmed happening between `cookie-consent-video-embed-CookieScript` and `bonsai-code-injector`/`bonsai-maintenance`/`bonsai-pop-up` on a live client site). Added a unique `name` field to `composer.json` and regenerated `vendor/` from a clean install; also picked up `yahnis-elsts/plugin-update-checker` v5.6 → v5.7 in the process.

### Removed
-

### Security
- [bonsai-core.php] Removed hardcoded GitHub fine-grained PAT from source; requires defining `BONSAI_PUC_GITHUB_TOKEN` in `wp-config.php` on each site going forward

---

## [1.9] - 2026-03-26

### Added
- [bonsai-core.php] Plugin Update Checker (v5.6) via Composer — WordPress sites now receive native update notifications via GitHub Releases
- [composer.json] Composer dependency management introduced
- [.gitignore] Added to exclude OS junk files

### Fixed
- [bonsai-core.php] Corrected text domain from `'textdomain'` to `'bonsai'` across all translation calls
- [bonsai-core.php] Renamed `add_custom_toolbar_menu()` to `bonsai_add_custom_toolbar_menu()` for namespace safety
- [bonsai-core.php] Added missing text domain to `wp_admin_css_color()` call
- [bonsai-core.php] Added `rel="noopener"` to admin bar external link
- [bonsai-core.php] Applied WordPress Coding Standards formatting throughout
- [colour-scheme.css] Fixed double-hash syntax error on `.wp-ui-text-highlight` colour value

---

## [1.8] - 2026-03-26

### Fixed
- [bonsai-core.php] Corrected text domain from `'textdomain'` to `'bonsai'` across all translation calls
- [bonsai-core.php] Renamed `add_custom_toolbar_menu()` to `bonsai_add_custom_toolbar_menu()` for namespace safety and to avoid naming collisions
- [bonsai-core.php] Added missing text domain to `wp_admin_css_color()` call
- [bonsai-core.php] Added `rel="noopener"` to admin bar external link
- [bonsai-core.php] Added `esc_html__()` to dashboard widget title for defensive escaping
- [bonsai-core.php] Applied WordPress Coding Standards formatting throughout (tabs, spaces inside parens, trailing commas)
- [colour-scheme.css] Fixed double-hash syntax error (`##ee4367`) on `.wp-ui-text-highlight` colour value

---

## [1.6] - 2025-10-01

### Added
- Custom admin colour scheme using Bonsai brand colours
- Force all users onto the Bonsai colour scheme for consistency
- Admin bar support link (opens in a new tab)
- Support widget with banner, Help Centre, and support request links
- Improved escaping and admin-only context
