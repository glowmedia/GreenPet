<div class="post_item">
    <?php
        
        
        if ( has_post_thumbnail() ) {
            echo '<a href="' . $stack['link'] . '" class="blog-image" title="View ' . $stack['title'] . '">';
            the_post_thumbnail( 'blog-small' );
            echo '</a>';     
        }


        echo '<h3><a href="' . $stack['link'] . '">' . $stack['title'] . '</a></h3>';
        //echo '<p class="blog-date">' . get_the_date() . '</p>';

        echo '<p>' . get_the_excerpt() . '</p>';
        echo '<a href="' . $stack['link'] . '" class="blog-button" title="View ' . $stack['title'] . '"> continue reading... </a>';
    ?>

</div>
