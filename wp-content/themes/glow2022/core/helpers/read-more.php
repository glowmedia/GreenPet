<?php
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
    global $post;
 //return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
    return;
}
add_filter('excerpt_more', 'new_excerpt_more');