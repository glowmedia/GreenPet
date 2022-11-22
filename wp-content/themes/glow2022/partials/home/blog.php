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
            <p><a href="/blogs/">View all Blogs</a></p>
        </div>
        <div class="col-right">
            <?php 
            
            $homeImage = get_field('insight_home_image');
            $size = 'full';
            
            
              if ($homeImage) {
                echo '<a href="' . get_permalink() . '" title="Read ' . get_the_title() . '">';
                echo wp_get_attachment_image( $homeImage, $size );
                echo '</a>';
              } else {
                echo '<a href="' . get_permalink() . '">';
                echo the_post_thumbnail( 'blog-home');
                echo '</a>';
              }
            
            ?>

            <a href="<?php the_permalink() ?>" class="btn-full btn-right" title="Read <?php the_title() ?>">Read Blog</a>
        </div>

    </div>
<?php 
  endwhile;
  wp_reset_postdata();
?>

