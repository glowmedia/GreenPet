<?php setup_postdata($stack['post']->ID); ?>

    <div class="single-search-result">
        <a href="<?php echo get_the_permalink($stack['post']->ID); ?>" aria-label="View <?php echo get_the_title($stack['post']->ID); ?>">
            <h3><?php echo get_the_title($stack['post']->ID); ?></h3>
        </a>
            <p> <?php echo get_the_excerpt($stack['post']->ID); ?> </p>
            <p class="blog-link"><a href="<?php echo get_the_permalink($stack['post']->ID); ?>" aria-label="View <?php echo get_the_title($stack['post']->ID); ?>">View Insight</a></p>
        
    </div>

<?php wp_reset_postdata(); ?>