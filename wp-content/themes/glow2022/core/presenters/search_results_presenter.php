<?php

function show_search_results_message($wp_query)
{
    $count = $wp_query->found_posts;
    if ($count >= 0)
        return 'Your search returned: <strong>' . $count . ' Blogs.</strong>';
        if ($count > 51)
            return 'Your search term returned a lot of results. For more meaningful results please try to narrow your query further.';

    return false;
}

function show_search_results($wp_query)
{
    if (!empty($wp_query)) {


        foreach ($wp_query->posts as $search_result) {
            if ($search_result->post_type === 'cpt_blog') {
                $search_result = [
                    'post' => $search_result,

                ];
                get_template_partial('partials/search/search-result-blog', $search_result);
            } else {
                get_template_partial('partials/search/search-result', $search_result);
            }
        }


        custom_search_pagination();

    }

    
    return false;
}
