# WordPress
![WordPress graphic](/images/wordpress-logo.png "WordPress CMS")

---

**Backlinks**
Creating custom backlinks
```php
$referrer_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

// Prepare an empty array for potential parameters
$referrer_params = array();

// Check if a hidden field was used on the source page (optional)
if ( isset( $_POST['location'] ) && isset( $_POST['categories'] ) ) {
  $referrer_params['location'] = sanitize_text_field( $_POST['location'] );
  $referrer_params['categories'] = sanitize_text_field( $_POST['categories'] );
}

// Attempt to parse parameters from the referrer URL (less reliable)
if ( $referrer_url ) {
  $parsed_url = parse_url( $referrer_url );
  $query_string = isset( $parsed_url['query'] ) ? $parsed_url['query'] : '';

  if ( $query_string ) {
    parse_str( $query_string, $referrer_params_from_url );
    // Merge potential parameters from the referrer URL (overwrite if already set)
    $referrer_params = array_merge( $referrer_params, $referrer_params_from_url );
  }
}

// Build the back link URL
$back_link_url = get_permalink( get_queried_object_id() ); // Use current page URL as base

// Add any retrieved parameters to the back link
if ( ! empty( $referrer_params ) ) {
  $back_link_url = add_query_arg( $referrer_params, $back_link_url );
}
```
Using the backlink
```html
<a href="<?php echo $back_link_url; ?>">Go Back</a>
```

---

**Creating a custom shortcode**\
Use a shortcode function to check the `position` attribute and set it before or after the title. The function determines the output based on its value.

Then using the `get_post_meta` hook to retrieve the shortcode's position attribute (Such as a post) and display it in the desired location.
```php
function my_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'position' => 'after_title',
    ), $atts );

    // Logic based on the 'position' attribute
    if ( $atts['position'] === 'after_title' ) {
        // Output for after title
    } elseif ( $atts['position'] === 'before_content' ) {
        // Output for before content
    }

    return $output;
}

// Register the shortcode
add_shortcode( 'my_shortcode', 'my_shortcode' );
```

**Example Usage:**
```php
<?php if ( get_post_meta( get_the_ID(), '_my_shortcode_position', true ) === 'after_title' ) : ?>
    <?php echo do_shortcode('[my_shortcode position="after_title"]'); ?>
<?php endif; ?>
```

---

#### Advanced Custom Fields Pro
**Getting data from a repeater field**
```php
if( have_rows('my_repeater_field') ): ?>
    <ul>
        <?php while ( have_rows('my_repeater_field') ) : the_row(); ?>
            <li>
                <?php // Access sub fields here ?>
                <p><?php echo get_sub_field('sub_field_1'); ?></p>
                <p><?php echo get_sub_field('sub_field_2'); ?></p>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
```
