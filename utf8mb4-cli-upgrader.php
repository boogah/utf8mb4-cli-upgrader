<?php
/**
 * Plugin Name:       utf8mb4 database upgrader CLI
 * Plugin URI:        https://github.com/boogah/utf8mb4-cli-upgrader
 * Description:       Upgrade your WordPress database to utf8mb4 via WP-CLI.
 * Version:           1.0.0
 * Requires at least: 4.2
 * Requires PHP:      5.6
 * Author:            Jason Cosper
 * Author URI:        https://jasoncosper.com/
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: boogah/utf8mb4-cli-upgrader
 */

// If this file is called directly, abort.
 if (! defined('WPINC')) {
     die;
 }

 if (defined('WP_CLI') && WP_CLI) {
     class utf8mb4_Database_Upgrade
     {
         /**
          * Run utf8mb4 database conversion.
          */
         public function __invoke()
         {
             require_once(ABSPATH.'/wp-admin/includes/upgrade.php');
             global $wpdb;
             $mytables=$wpdb->get_results("SHOW TABLES");
             foreach ($mytables as $mytable) {
                 foreach ($mytable as $t) {
                     $old_collation = $wpdb->get_var("SELECT TABLE_COLLATION FROM information_schema.TABLES WHERE TABLE_NAME = '$t'");
                     WP_CLI::line("Table {$t} current collation: {$old_collation}");

                     $converted = maybe_convert_table_to_utf8mb4($t);
                     if ($converted) {
                         $new_collation = $wpdb->get_var("SELECT TABLE_COLLATION FROM information_schema.TABLES WHERE TABLE_NAME = '$t'");
                         WP_CLI::line("Table {$t} converted. New collation: {$new_collation}");
                     }
                 }
             }
         }
     }

     // Ensure WP_CLI class exists before adding the command.
     if (class_exists('WP_CLI')) {
         // Register our new CLI command.
         WP_CLI::add_command('upgrade_utf8mb4', 'utf8mb4_Database_Upgrade');
     }
 }
