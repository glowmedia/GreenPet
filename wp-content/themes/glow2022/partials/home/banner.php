    <div class="wrapper-full">
    <?php
        $image = get_field('home_banner_single', 'options');

            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo '<div class="home-banner">';
                echo wp_get_attachment_image( $image, $size );
                echo '</div>';
            }

    ?>

    <?php
    /*
    $rows = get_field('home_banner', 'options' );

    $temp_arr = $rows;
    shuffle( $temp_arr );

    // Grab up to 10 values of the array
    $random_slice = array_slice( $temp_arr, 0, 10 );

    echo ('<div class="home-banner">');
    
    foreach( $random_slice as $subfield ) {
        echo ('<div class="slide-wrapper">');
        //echo '<div class="banner-text">' . $subfield['banner_text'] . '</div>';
        //var_dump($subfield);

        $image = $subfield['banner_image'];

        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {
            echo wp_get_attachment_image( $image, $size );
        }

        //echo '<img src="' . $subfield['banner_image'] . '" width="1170" height="370" alt="" />';
        echo ('</div>');
    }
    */
    ?>
    <!--
    <a class="prev-slide">&#10094;</a>
    <a class="next-slide">&#10095;</a>
-->

    <?php
    /*
    echo ('</div>');
    */
    ?>

   
</div>