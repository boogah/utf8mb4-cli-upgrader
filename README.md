# utf8mb4 database upgrader for WP-CLI

Force upgrade your WordPress database to utf8mb4 via WP-CLI.

## Description

This WordPress plugin is designed to upgrade your WordPress database to utf8mb4 via WP-CLI. The plugin will go through each table in your database and upgrade its collation to `utf8mb4_unicode_ci`.

Why would you do this? Maybe your database missed this conversion when WordPress 4.2 first shipped. If it did, you may be [affecting your site's performance](https://www.percona.com/blog/charset-and-collation-settings-impact-on-mysql-performance/).

## Installation

1. Upload the plugin files to the `/wp-content/plugins/utf8mb4-database-upgrader-cli` directory, or install the plugin through the WordPress plugins screen directly.
2. The plugin can be run via WP-CLI with the following command: `wp upgrade_utf8mb4`.

## Requirements

- WordPress 4.2 or higher
- PHP 7.0 or higher

## Usage

To run the utf8mb4 upgrade on your WordPress database, use the WP-CLI command:

```
wp upgrade_utf8mb4
```

The output will look like this:

```
Table wp_commentmeta current collation: utf8_general_ci
Table wp_commentmeta converted. New collation: utf8mb4_unicode_ci
Table wp_comments current collation: utf8_general_ci
Table wp_comments converted. New collation: utf8mb4_unicode_ci
Table wp_links current collation: utf8_general_ci
Table wp_links converted. New collation: utf8mb4_unicode_ci
Table wp_options current collation: utf8_general_ci
Table wp_options converted. New collation: utf8mb4_unicode_ci
Table wp_postmeta current collation: utf8_general_ci
Table wp_postmeta converted. New collation: utf8mb4_unicode_ci
Table wp_posts current collation: utf8_general_ci
Table wp_posts converted. New collation: utf8mb4_unicode_ci
Table wp_term_relationships current collation: utf8_general_ci
Table wp_term_relationships converted. New collation: utf8mb4_unicode_ci
Table wp_term_taxonomy current collation: utf8_general_ci
Table wp_term_taxonomy converted. New collation: utf8mb4_unicode_ci
Table wp_termmeta current collation: utf8_general_ci
Table wp_termmeta converted. New collation: utf8mb4_unicode_ci
Table wp_terms current collation: utf8_general_ci
Table wp_terms converted. New collation: utf8mb4_unicode_ci
Table wp_usermeta current collation: utf8_general_ci
Table wp_usermeta converted. New collation: utf8mb4_unicode_ci
Table wp_users current collation: utf8_general_ci
Table wp_users converted. New collation: utf8mb4_unicode_ci
```

## Changelog

### 1.0.0
- Initial Release
