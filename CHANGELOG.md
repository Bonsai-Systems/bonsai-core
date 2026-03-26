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
