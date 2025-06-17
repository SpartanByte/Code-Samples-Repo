<?php

    // Properly enqueuing styles and scripts is essential for theme and plugin development.
    function sample_custom_styles() {
        wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/custom-style.css');
    }
    add_action('wp_enqueue_scripts', 'sample_custom_styles');
