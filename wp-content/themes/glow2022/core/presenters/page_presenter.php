<?php

function page_presenter($id)
{
    $title = get_the_title();



    if (post_has_content() && !is_search() ) {
    get_template_part('partials/page/content');

    if (is_page('courses')) {
       // get_template_part('partials/page/testimonials');
       //echo 'courses page';

   } 
}

   if (is_page('testimonials')) {
        get_template_part('partials/page/testimonials');

   } 
   
   if (is_page('blogs')) {
    get_template_part('partials/page/blog');

    } 

    if (is_search()) {
        get_template_part('partials/page/search');
    
        } 

        

}