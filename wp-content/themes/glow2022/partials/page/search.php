<div class="wrapper-full">
<div class="page-content">

<h1 class="search-title"> <?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h1>
    <?php if (post_has_content()) :
        if (have_posts()) :
            while (have_posts()) :
                the_title();
                the_post();
                //the_content();
                the_excerpt();
            endwhile;
        endif;
    endif; ?>
</div>
</div>
