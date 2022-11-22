<div class="wrapper-sidebar">
<div class="page-content">



<?php
        if ( has_post_thumbnail() ) {     
            the_post_thumbnail( 'full', array('class' => 'top-image'));
        }
?>

<h1><?php the_title(); ?></h1>


    <?php if (post_has_content()) :
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif;
    endif; ?>

<?php comments_template(); ?>

<div class="blog-nav">

<?php next_post_link( '%link', '<strong>Next</strong>' ); ?>
	
<a href="/blogs/">All Blogs</a>

<?php previous_post_link('%link', '<strong>Previous</strong>'); ?>
</div>

</div>
<?php get_sidebar(); ?>
</div>
