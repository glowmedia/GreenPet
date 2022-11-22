<?php setup_postdata($stack->ID); ?>

<div class="single-search-result">
    <a href="<?php echo esc_url(add_query_arg(['utm_source' => sanitize_title(get_the_title($stack->ID)), 'utm_medium' => 'Web', 'utm_campaign' => 'Search'], get_permalink($stack->ID))); ?>">
        <h3><?php echo $stack->post_title; ?></h3>
        <p><?php //echo get_teaser($stack->ID); ?></p>
    </a>
</div>
<?php wp_reset_postdata(); ?>
