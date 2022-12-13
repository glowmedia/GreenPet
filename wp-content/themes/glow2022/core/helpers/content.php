<?php

use App\ThemeConfig;

/**
 * Returns true if the current post object contains content, false if not.
 *
 * @return bool
 *
 * @since 1.5.1
 */
function post_has_content()
{
    return !empty(get_post()->post_content);
}

add_filter('embed_oembed_html', 'oembed_youtube_add_wrapper', 0, 3);

function oembed_youtube_add_wrapper($return, $data, $url)
{
    if (strpos($data, 'youtube') != false)
        return '<div class="youtube-responsive-container"> ' . $return .  ' </div>';

    return $return;
}

/**
 * @param null $slug
 */
function load_page_content($slug = null)
{
    $template_names = [];

    foreach (glob(get_template_directory() . '/pages/*.php') as $page_template) {
        $path_parts = pathinfo($page_template);
        $template_names[] = $path_parts['filename'];
    }

    // Default homepage
    if (is_front_page() && is_home())
        get_template_part('/pages/home');
    // static homepage
    else if (is_front_page())
        get_template_part('/pages/home');
    else if (is_search())
        get_template_part('/pages/search-results');

        else if (is_shop())
        get_template_part('/pages/shop');
    //everything else
    else if (in_array($slug, $template_names))
        get_template_part('/pages/' . $slug);
    else if (locate_page_template(the_title_attribute(['echo' => false])))
        get_template_part('/pages/' . the_title_attribute(['echo' => false]));
    else
        get_template_part('/pages/default');
}

/**
 * @param $post_type
 * @param $category
 * @param $count
 *
 * @return array|bool
 */
function latest_articles($post_type, $category, $count)
{
    $args = [
        'post_type' => $post_type,
        (is_int($category)) ? 'cat' : 'category_name' => $category,
        'posts_per_page' => $count
    ];

    $loop = new WP_Query($args);
    $latest_articles = [];

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            $latest_articles[] = [
                'ID' => get_the_ID(),
                'title' => get_the_title(get_the_ID()),
                'link' => get_the_permalink(get_the_ID()),
                'published' => get_the_date(ThemeConfig::theme_date_format),
            ];
        }
        wp_reset_query();
    }

    return $latest_articles;
}

/**
 * @param $post_type
 * @param $category
 * @param $posts_per_page
 */
function paginated_post_grid($post_type, $category, $posts_per_page)
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = [
        'post_type' => $post_type,
        'category_name' => $category,
        'posts_per_page' => $posts_per_page,
        'order' => 'DESC',
        'paged' => $paged
    ];

    $loop = new WP_Query($args);

    while ($loop->have_posts()) {
        $loop->the_post();
        $article_id = get_the_ID();
        get_template_partial('partials/posts/article-block', $article_id);
    }

    echo custom_pagination('case-studies', $loop, $paged);

    wp_reset_query();
}

/**
 * @param $post_type
 * @param $taxonomy
 * @param $rewrite
 * @param $terms
 * @param $posts_per_page
 * @param $order_by
 * @param $order
 *
 * @throws
 * @package $operator
 *
 */
function paginated_cpt_list($post_type, $posts_per_page, $taxonomy = null, $rewrite = null, $terms = null, $order_by = 'date', $order = 'DESC', $meta = null, $meta_value = null, $meta_compare = null)
{
    global $post;

    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $tax_query = [];

    if ($taxonomy) {
        $tax_query[] = [
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $terms
        ];
    }

    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'order' => $order,
        'paged' => $paged,
        'tax_query' => $tax_query,
        'orderby' => $order_by,
        'meta_key' => $meta,
        'meta_value' => $meta_value,
        'meta_compare' => $meta_compare,
        'post_status' => 'publish',
    ];

    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            $post_id = get_the_ID();

            if ($post->post_type == 'cpt_testimonials') {

                
                $image = get_field('profile_picture', $post_id);
                $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                /*if( $image ) {
                    $profile_pic =  wp_get_attachment_image( $image, $size );
                }*/

                $stack = [
                    'title' => get_the_title(),
                    'snippet' => get_field('testimonial_snippet', $post_id),
                    'name' => get_field('name_&_company', $post_id),
                    'link' => get_field('link', $post_id),
                    'content' => get_the_content(),
                    'profile-pic' => wp_get_attachment_image( $image, $size ),
                    

                ];
                get_template_partial('partials/testimonials/testimonials-list-item', $stack);
            }
            elseif ($post->post_type == 'cpt_blog') {

                $stack = [
                    'title' => get_the_title(),
                    'link' => get_the_permalink(),

                ];
                get_template_partial('partials/blog/blog-list-item', $stack);
            } else {
                $stack = [
                    'title' => get_the_title(),
                    'date' => get_the_date(ThemeConfig::theme_date_format, $post_id),
                    'teaser' => get_field('teaser', $post_id),
                    'link' => get_the_permalink(),
                ];
                get_template_partial('partials/posts/post-item', $stack);
            }
        }

        //$reset_terms = $publications ? '/' . $terms : '';

        //$query_string = $category ? '?category=' . $category : '';

        //echo custom_pagination($rewrite . $reset_terms, $loop, $paged, $query_string);
        echo custom_pagination($rewrite , $loop, $paged);
    } else {
        echo '<div>No posts found.</div>';
    }

    wp_reset_query();
}

/**
 * Simply shortens the required function call to tidy up the codebase.
 */
function theme_path()
{
    echo get_template_directory_uri();
}

function assets_path($echo)
{
    if ($echo)
        echo get_template_directory_uri() . '/assets';
    else
        return get_template_directory_uri() . '/assets';
}

/**
 * @param $title
 */
function render_title_bar($title)
{
    echo '<div class="section-title"><h3 class="panel-title">' . $title . '</h3></div>';
}

function get_extra_content($post_id)
{
    if (get_field('extra_content', $post_id))
        get_template_partial('partials/page/content-extra', $post_id);

}

function get_teaser($post_id = null)
{
    $post_id = ($post_id) ?: get_the_ID();
    $teaser = get_field('teaser', $post_id);

    if ($teaser) {
        if (strlen($teaser) <= ThemeConfig::teaser_length['max']) {
            return $teaser;
        } else if (strlen($teaser) > ThemeConfig::teaser_length['max']) {
            return truncate_string($teaser, ThemeConfig::teaser_length['max'], ThemeConfig::teaser_length['ellipsis']);
        }
    }

    return truncate_string(get_the_excerpt($post_id), ThemeConfig::teaser_length['max']);
}

function get_short_title($post_id = null)
{
    $post_id = ($post_id) ?: get_the_ID();
    $short_title = get_field('short_title', $post_id);

    if ($short_title) {
        if (strlen($short_title) <= ThemeConfig::title_length['max']) {
            return $short_title;
        } else if (strlen($short_title) > ThemeConfig::title_length['max']) {
            return truncate_string($short_title, ThemeConfig::title_length['max'], ThemeConfig::title_length['ellipsis']);
        }
    }

    return truncate_string(get_the_title($post_id), ThemeConfig::title_length['max']);
}

function truncate_string($string, $length, $ellipsis = null)
{
    $ellipsis = $ellipsis ?: '';

    // cut the string down to $length, less the length of $ellipsis.
    $exploded_string = explode(' ', substr($string, 0, ($length - strlen($ellipsis))));

    // remove the last array item as it is likely to be a broken word.
    array_pop($exploded_string);

    // return the truncated string, plus the given ellipsis.
    return $imploded_string = implode(' ', $exploded_string) . $ellipsis;
}

/*
 * Retrieves the start date for a post
 */
function get_start_date($post_id = null)
{
    $post_id = ($post_id) ? $post_id : get_the_ID();
    $selection = get_field('start_date_display', $post_id);

    if ($selection === 'date') {
        $start_date = new DateTime(get_field('start_date', $post_id, false));
        return [
            'response_type' => 'date',
            'data' => $start_date->format('j F Y')
        ];
    } else if ($selection === 'descriptor') {
        return [
            'response_date' => 'descriptor',
            'data' => get_field('start_descriptor', $post_id)
        ];
    }

    return false;
}

/*
 * Retrieves the end date for a post
 */
function get_end_date($post_id = null)
{
    $post_id = ($post_id) ? $post_id : get_the_ID();
    $selection = get_field('end_date_display', $post_id);

    if ($selection === 'date') {
        $end_date = new DateTime(get_field('end_date', $post_id, false));
        return [
            'response_type' => 'date',
            'data' => $end_date->format('j F Y')
        ];
    } else if ($selection === 'descriptor') {
        return [
            'response_date' => 'descriptor',
            'data' => get_field('end_descriptor', $post_id)
        ];
    }

    return false;
}

/*
 * Checks if start date and end date are the same
 */
function date_display()
{
    if (get_start_date()['data'] == get_end_date()['data']){
        return '<strong>Date: </strong>' . get_start_date()['data'];
    } else {
        return '<strong>Start Date: </strong>' . get_start_date()['data'] . ' - <strong>End Date: </strong>' . get_end_date()['data'];
    }
}

add_theme_support( 'align-wide' );