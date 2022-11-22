<?php
/**
 * @param $slug
 * @param $loop
 * @param $paged
 * @param $query_string
 *
 * @return string
 */
function custom_pagination($slug, $loop, $paged, $query_string = '')
{
    $total_pages = $loop->max_num_pages;
    $current_page = $paged;
    $prev_page = ($current_page == 1) ? null : $current_page - 1;
    $next_page = ($current_page == $total_pages) ? null : $current_page + 1;
    $pagination_html = '';

    if ($total_pages > 1) {
        $pagination_html .= '<div class="col pagination">';

        if ($prev_page != null) {
            $pagination_html .= '<a class="prev page-numbers" href="/' . $slug . '/page/' . $prev_page . $query_string . '">&larr;</a>';
            $pagination_html .= '<a class="page-numbers" href="/' . $slug . '/page/' . $prev_page . $query_string . '">' . $prev_page . '</a>';
        }

        $pagination_html .= '<span class="page-numbers current">' . $current_page . '</span>';

        if ($next_page != null) {
            $pagination_html .= '<a class="page-numbers" href="/' . $slug . '/page/' . $next_page . $query_string . '">' . $next_page . '</a>';
            $pagination_html .= '<a class="next page-numbers" href="/' . $slug . '/page/' . $next_page . $query_string . '">&rarr;</a>';

        }

        $pagination_html .= '</div>';
    }

    return $pagination_html;
}

/**
 * Rework the FacetWP pagination used on the search results page to bring
 * it in line with the custom_pagination() used on post loops.
 *
 * @param $output
 * @param $params
 *
 * @return string
 */
function search_pagination($output, $params)
{
    $output = '';
    $total_pages = $params['total_pages'];
    $current_page = $params['page'];
    $prev_page = ($current_page == 1) ? null : $current_page - 1;
    $next_page = ($current_page == $total_pages) ? null : $current_page + 1;


    if ($total_pages > 1) {
        $output .= '<div class="col pagination search-pagination">';

        if ($prev_page != null) {
            $output .= '<a class="facetwp-page page-numbers prev" data-page="' . $prev_page . '"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>';
            $output .= '<a class="facetwp-page page-numbers" data-page="' . $prev_page . '">' . $prev_page . '</a>';
        }

        $output .= '<span class="page-numbers current">' . $current_page . '</span>';

        if ($next_page != null) {
            $output .= '<a class="facetwp-page page-numbers" data-page="' . $next_page . '">' . $next_page . '</a>';
            $output .= '<a class="facetwp-page page-numbers next" data-page="' . $next_page . '"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
        }

        $output .= '</div>';
    }

    return $output;
}

add_filter('facetwp_pager_html', 'search_pagination', 10, 2);

function custom_search_pagination()
{
    global $wp_query;

    // No idea why this line was in the if statement originally...
    $paged = ( get_query_var('paged') ? get_query_var('paged') : 1 );

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => $paged,
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type'  => 'array',
        'prev_next'   => TRUE,
        'prev_text'    => __('&larr;'),
        'next_text'    => __('&rarr;'),
    ) );

    if( is_array( $pages ) ) {

        echo '<div class="col pagination">' .
                 str_replace( 'class="page-numbers"', 'class="page-link"', ''), implode( '', $pages ) .
             '</div>';

    }
}
