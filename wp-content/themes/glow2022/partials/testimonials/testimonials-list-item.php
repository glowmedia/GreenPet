<figure class="testimonial_item">
    <blockquote>
        <?php
            echo $stack['content'];
            /*echo '<h3><a href="' . $stack['link'] . '" target="_blank">' . $stack['title'] . '</a></h3>';
            if ($stack['profile-pic']) {
            echo $stack['profile-pic'];
            } else {
                echo 'no photo';
            }
            if ($stack['name']) {
                echo '<p><strong>' . $stack['name'] . '</strong><br>';
            }
            
            */
        ?>

    </blockquote>

    <figcaption>
        <div class="citation-text">
                    <?php echo '<strong>' .  $stack['title'] . '</strong>'; ?>
                    <a href="<?php echo $stack['link']; ?>" target="_blank" title="View <?php echo $stack['title']; ?>'s Linkedin Profile">View Linkedin Profile</a>
                </div>
                
                <?php
                    
                        echo '<div class="citation-img">';
                        echo $stack['profile-pic'];
                        echo '</div>';
                    
                ?>
        </figcaption>

</figure>
