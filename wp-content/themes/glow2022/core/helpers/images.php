<?php

/**
 * @param $filename
 */
function theme_image($filename)
{
    $include = get_template_directory_uri() . '/img/' . $filename;
    //$path = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/' . wp_get_theme()->get('TextDomain') . '/img/' . $filename;


    //if (file_exists($include))
        echo $include;
    //else
       // echo 'Image not found';
}

add_theme_support('post-thumbnails');

/**
 * @param $id
 *
 * @return bool|false|string
 */
function get_featured_image($id)
{
    if (has_post_thumbnail($id))
        return get_the_post_thumbnail_url($id);

    return false;
}

/**
 * @param $image
 *
 * @return bool
 */
function apply_background_image($image)
{
    if ($image) {
        if (is_array($image))
            $image = $image['url'];

        echo 'style="background-image: url(' . $image . '); "';
    }

    return false;
}

/**
 * @param $url
 *
 * @return bool|string
 */
function apply_background_image_url($url)
{
    if (!empty($url))
        return 'style="background-image: url(' . $url . '); "';

    return false;
}

/**
 * @param bool $background
 * @param bool $post_id
 */
function page_icon($background = false, $post_id = false)
{
    $post_id = ($post_id) ? $post_id : get_the_ID();

    if ($background) {
        if (is_front_page())
            apply_background_image(get_field('icon', $post_id)['url']);
        else if (get_field('icon', $post_id))
            apply_background_image(get_field('icon', $post_id)['url']);
        else
            apply_background_image(acf_field_ascend_ancestors('icon', $post_id)['url']);
    } else {
        if (get_field('icon'))
            echo get_field('icon')['url'];
        else
            echo acf_field_ascend_ancestors('icon', $post_id)['url'];
    }
}

/**
 * From a given post_id, iterate progressively higher through an array of it's ancestors until the given
 * field is found. Once found, return and break the loop.
 *
 * @param      $field
 * @param      $post_id
 *
 * @return array|false
 */
function acf_field_ascend_ancestors($field, $post_id)
{
    foreach (get_post_ancestors($post_id) as $ancestor) {
        if (get_field($field, $ancestor)) {
            return get_field($field, $ancestor);
            break;
        }
    }

    return false;
}

add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-small', 520, 300, true );
add_image_size( 'blog-large', 420, 9999 );
add_image_size( 'blog-home', 380, 180 );