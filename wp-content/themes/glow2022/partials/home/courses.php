
    <div class="home-courses">
        <?php //the_field('courses_home_page_box', 'options');
        
        // Check rows exists.
        if( have_rows('courses_home_page_box', 'options') ):

    // Loop through rows.
        while( have_rows('courses_home_page_box', 'options') ) : the_row();

        $course_title = get_sub_field('course_title', 'options');
        $course_detail = get_sub_field('course_detail', 'options');
        $course_link = get_sub_field('course_link', 'options');




        echo '<div class="course">';
        echo '<h2>' . $course_title . '</h2>';
        echo $course_detail;

        echo '<p class="has-text-align-right"><a class="btn-full" href="' . $course_link . '">VIEW DETAIL</a></p>';


        // Load sub field value.
        
        // Do something...

   

        echo '</div>';

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;  
        
        
        ?>
    </div>
