<?php

$homeTestimonials = get_field('home_testimonials', 'options'); 

if( $homeTestimonials ): ?>

<div class="home-testimonials-slider">

  <?php foreach( $homeTestimonials as $post ): 

      // Setup this post for WP functions (variable must be named $post).
      setup_postdata($post); ?>


<figure class="home-testimonial">
  <blockquote>
    <?php echo get_the_content(); ?>
  </blockquote>
  <figcaption>
  <?php
            $image = get_field('profile_picture', $post);
            $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo '<div class="citation-img">';
                echo wp_get_attachment_image( $image, $size );
                echo '</div>';
            }
          ?>

          <?php echo '<strong>' .  get_the_title() . '</strong>'; ?>
            <a href="<?php echo the_field('link'); ?>" target="_blank" title="View <?php echo get_the_title(); ?>'s Linkedin Profile">View Linkedin Profile</a>
  </figcaption>
          </figure>
  <?php endforeach; ?>

  <?php 
  // Reset the global post object so that the rest of the page works correctly.
  wp_reset_postdata(); ?>
  </div>
<?php endif; ?>

<div class="testimonial-dots"></div>
    

    
