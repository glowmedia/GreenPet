<?php

function single_presenter($post_id)
{
    $title = get_the_title();

  /*      if (is_singular('cpt_testimonials')) {
            get_template_partial('partials/page/title', $id);
            get_template_partial('partials/testimonials/testimonials-details', $id);

        }
      */      

        if (post_has_content())
            get_template_part('partials/single/content');


}