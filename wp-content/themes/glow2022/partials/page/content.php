<div class="wrapper-full">
<div class="page-content">
    <?php if (post_has_content()) :
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif;
    endif; ?>
</div>
</div>
