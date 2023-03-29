<?php
/**
 * Plugin Name: Gleam
 * Plugin URI: https://gleam.io/docs/faq#wordpress
 * Description: Gleam competition plugin. Requires PHP 5.3
 * Version: 1.0
 * Author: Crowd9
 * Author URI: https://github.com/Crowd9/Gleam-Wordpress
 */


function gleam_init() {
    $file = file_get_contents('https://js.gleam.io/e.js');
    echo "<script>$file</script>";
}

function gleam_shortcode($atts, $content = null) {
    $args = shortcode_atts(array(
        'url' => null
    ), $atts);
  
    if (empty($args['url'])) {
        return;
    }
  
    return 
        sprintf(
            '<a class="e-gleam" href="%s" rel="nofollow">%s</a>',
            htmlspecialchars($args['url']),
            do_shortcode($content)
        );
}

add_filter('wp_footer', 'gleam_init');

add_shortcode('gleam', 'gleam_shortcode');