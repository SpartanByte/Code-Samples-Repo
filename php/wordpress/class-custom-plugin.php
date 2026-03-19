<?php
/**
 * File: Custom plugin class to create custom post type
 * The custom plugin could also associate custom taxonomies and
 * any custom functionality for the CPT so it can be imported into other projects if needed.
 */

/**
 * Implementation example to be placed in functions.php so it can intialize the plugin
 */
/*
// Define the path for convenience
define( 'MY_PLUGINS_PATH', get_template_directory() . '/inc/custom-plugins/' );

// Require the class file
require_once MY_PLUGINS_PATH . 'class-test-acf.php';

// Initialize the class
if ( class_exists( 'Test_ACF' ) ) {
        Custom_Plugin::get_instance(); // where Custom_Plugin is the class nameß
    }
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Custom_Plugin' ) ) {

    class Custom_Plugin {

        // Store the instance
        private static $instance = null;

        // Private constructor prevents multiple instances
        private function __construct() {
            $this->init_hooks();
        }

        // The "Gateway" to the class
        public static function get_instance() {
            if ( self::$instance === null ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        // Register your WordPress hooks here
        private function init_hooks() {
            add_action( 'init', [ $this, 'register_custom_post_type' ] );
            add_action( 'init', [ $this, 'custom_resources_cpt' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        }

        public function register_custom_post_type() {
            // Your CPT code herec
            add_action( 'init', [ $this, 'custom_resources_cpt' ] );
        }

        

        public function enqueue_assets() {
            // wp_enqueue_style( 'my-feature-style', ... );
        }

        /**
         * Register the 'Project' Custom Post Type
         */
        public function custom_resources_cpt() {
            $labels = [
                'name'               => 'Custom Resources',
                'singular_name'      => 'Custom Resource',
                'add_new'            => 'Add New Resource',
                'add_new_item'       => 'Add New Resource',
                'edit_item'          => 'Edit Resource',
                'all_items'          => 'All Custom Resources',
                'search_items'       => 'Search Custom Resources',
                'not_found'          => 'No custom resources found.',
            ];

            $args = [
                'labels'             => $labels,
                'public'             => true,
                'has_archive'        => true,
                'rewrite'            => [ 'slug' => 'custom-resources' ],
                'menu_icon'          => 'dashicons-buddicons-topics', 
                'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
                'show_in_rest'       => true, // Required for Gutenberg/Block Editor
            ];

            register_post_type( 'resource', $args );
        }
    }
}