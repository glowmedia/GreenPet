<?php
  $args = array(
    'post_type'=>'cpt_blog', 
    'posts_per_page'=>'1'
  );

  $blog = new WP_Query($args);

  while ($blog->have_posts()) : $blog->the_post(); 
?>
    <div class="home-blog">

    <div class="col-left">
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink() ?>" class="btn-full" title="Read <?php the_title() ?>">Read Blog</a>
        </div>
        <div class="col-right">
            <?php 
            

                echo '<a href="' . get_permalink() . '">';
                echo the_post_thumbnail( 'blog-home');
                echo '</a>';

            
            ?>

            
        </div>

    </div>
<?php 
  endwhile;
  wp_reset_postdata();
?>

