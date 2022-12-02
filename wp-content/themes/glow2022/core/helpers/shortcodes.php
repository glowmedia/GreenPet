<?php

use Carbon\Carbon;

/**
 * This short code displays a link or static text with a different coloured left border
 * An example of this being used is on the: Nationally Contracted Products page.
 *
 * @param $atts
 *
 * @return string
 */
function link_shortcode($atts)
{
    $atts = shortcode_atts([
        'border-color' => '',
        'url' => '',
        'url-text' => '',
        'text' => '',
        'date' => '',
    ], $atts, 'link');

    $link = $atts['url'];
    $text = $atts['text'];
    $date = $atts['date'];

    $output = '<div class="link-shortcode" style="border-left: 5px solid ' . $atts['border-color'] . ';">';

    if ($link)
        $output .= '<a href="' . $link . '">' . $atts['url-text'] . '</a> ';

    if ($text)
        $output .= '<span>' . $text . '</span>';

    if ($date)
        $output .= '<span class="date">' . $atts['date'] . '</span>';

    $output .= '</div>';

    return $output;
}

if (!shortcode_exists('link'))
    add_shortcode('link', 'link_shortcode');




/** 
 * Display a wordpress menu in a page
 * [menu name="main-menu"]
 **/

function page_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(['name' => null], $atts));
    return wp_nav_menu(['menu' => $name, 'echo' => false]);
  }

if (!shortcode_exists('page_menu_shortcode'))
    add_shortcode('menu', 'page_menu_shortcode');
