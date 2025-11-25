<?php 

add_action( 'rest_api_init', function () {

    // Registered route should match plugin name for non-conflict and best practices
    register_rest_route( 'custom_product_search/v1', '/search/', array(
        'methods' => 'GET',
        'callback' => 'custom_search_function',
    ));
});

// Made generic due to NDA
function custom_product_search( WP_REST_Request $request ) {

    $search_params = $request->get_param( 'search_term' );
    $args = array( 'posts_per_page' => -1, 'post_type' => 'post', 's' => $search_params );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        $posts = array_map( function ( $post ) { return ( array ) $post; }, $query->posts );
        return new WP_REST_Response( $posts, 200) ;
    }
    return new WP_REST_Response( array( 'message' => 'No posts found' ), 404 );
}