<?php

function my_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'position' => 'after_title',
    ), $atts );

    // Logic based on the 'position' attribute
    if ( $atts['position'] === 'after_title' ) {
        // Content such as a custom product information or HTML to be displayed after the title
    } elseif ( $atts['position'] === 'before_content' ) {
        // Content such as a custom product information or HTML to be displayed before the content
    }

    return $output;
}

// Register the shortcode
add_shortcode( 'my_shortcode', 'my_shortcode' );

// Example usage in a post or page in admin editor
// [my_shortcode position="after_title"]

// Example in a template file
echo do_shortcode( '[my_shortcode position="before_content"]' );     
