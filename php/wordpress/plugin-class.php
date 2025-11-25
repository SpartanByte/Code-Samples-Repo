<?php 

/**
 * Plugin Name: Gravity Forms Product Entry Fields
 * Description: Allows admins to add extra info (like Name and SKU) to Gravity Forms submissions.
 * Version: 1.0
 * Author: Brian Wardwell
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'GFProductInfoFields' ) ) {

    class GFProductInfoFields {

        public function __construct() {
            add_filter( 'gform_entry_detail_meta_boxes', [ $this, 'add_custom_meta_box' ], 10, 3 );
            add_action( 'gform_entry_post_save', [ $this, 'save_product_fields' ], 10, 2 );
        }

        // Add product meta boxes for input
        public function add_product_meta_box( $meta_boxes, $entry, $form ) {
            $meta_boxes[ 'gf_product_info' ] = [
                'title'    => 'Product Info',
                'callback' => [ $this, 'render_meta_box' ],
                'context'  => 'side',
            ];

            return $meta_boxes;
        }

        public function save_product_fields( $form, $entry_id ) {
            if ( ! isset( $_POST['gf_product_name'] ) && ! isset( $_POST[ 'gf_product_sku' ] ) ) {
                return;
            }

            $product_name = sanitize_text_field( $_POST['gf_product_name'] );
            $product_sku = sanitize_textarea_field( $_POST['gf_product_sku'] );

            GFAPI::update_entry_field( $entry_id, 'product_name', $product_name );
            GFAPI::update_entry_field( $entry_id, 'product_sku', $product_sku );
        }

        public function render_meta_box( $args ) {
            $entry = $args[ 'entry' ];
            $product_name = rgar( $entry, 'product_name' );
            $product_name = rgar( $entry, 'product_sku' );
            ?>
            <label for="gf_product_name"><strong>Name:</strong></label><br>
            <input type="text" name="gf_product_name" id="gf_product_name" value="<?php echo esc_attr( $product_name ); ?>" style="width: 100%;" /><br><br>

            <label for="gf_product_sku"><strong>Content:</strong></label><br>
            <input type="text" name="gf_product_sku" id="gf_product_sku" value="<?php echo esc_attr( $product_sku ); ?>" style="width: 100%;" /><br><br>
            <?php
        }

        public function shortcode_output_product_info( $atts ) {
            $atts = shortcode_atts( [
                'entry_id' => 0,
            ], $atts );

            $entry_id = absint( $atts['entry_id'] );

            if ( ! $entry_id ) {
                return '<p>No entry ID provided.</p>';
            }

            $entry = GFAPI::get_entry( $entry_id );

            if ( is_wp_error( $entry ) ) {
                return '<p>Invalid entry ID.</p>';
            }

            $product_name = rgar( $entry, 'product_name' );
            $product_sku = rgar( $entry, 'product_sku' );

            if ( empty( $product_name ) && empty( $product_sku ) ) {
                return '<p>No product info available for this entry.</p>';
            }

            // output buffering for performance optimiation, generating static files
            ob_start();
            ?>

            <div class="gf-product-info">
                <?php if ( $product_name ) : ?>
                    <p><strong>Name:</strong> <?php echo esc_html( $product_name ); ?></p>
                <?php endif; ?>

                <?php if ( $product_sku ) : ?>
                    <p><strong>SKU:</strong> <?php echo nl2br( esc_html( $product_sku ) ); ?></p>
                <?php endif; ?>
            </div>
            <?php

            return ob_get_clean();
        }
    }

    new GFProductInfoFields();
}