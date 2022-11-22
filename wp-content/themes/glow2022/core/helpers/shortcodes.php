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
 * @param $atts
 *
 * @return string
 */
function heading_shortcode($atts)
{
    $atts = shortcode_atts([
        'title' => '',
    ], $atts, 'heading');

    $output = '<div class="heading">';
    $output .= '<h2>' . $atts['title'] . '</h2>';
    $output .= '</div>';

    return wpautop($output, false);
}

if (!shortcode_exists('heading'))
    add_shortcode('heading', 'heading_shortcode');

/**
 * @param $atts
 *
 * @return string
 */
function quote_shortcode($atts)
{
    $atts = shortcode_atts([
        'text' => '',
        'who' => '',
    ], $atts, 'quote');

    $output = '<blockquote>';
    $output .= '<span class="quote-what">' . $atts['text'] . '</span>';
    $output .= '<span class="quote-who">' . $atts['who'] . '</span>';
    $output .= '</blockquote>';

    return $output;
}

if (!shortcode_exists('quote'))
    add_shortcode('quote', 'quote_shortcode');

function get_contract_start_date() {
    return '<strong>' . get_start_date()['data'] . '</strong>';
}

if (!shortcode_exists('contract_start'))
    add_shortcode('contract_start', 'get_contract_start_date');

function get_contract_end_date() {
    return '<strong>' . get_end_date()['data'] . '</strong>';
}

if (!shortcode_exists('contract_end'))
    add_shortcode('contract_end', 'get_contract_end_date');

function get_contract_date_diff() {
    if (get_start_date()['response_type'] == 'date' && get_end_date()['response_type'] == 'date') {
        $start = Carbon::createFromFormat('j F Y', get_start_date()['data'], 'Europe/London');
        $end = Carbon::createFromFormat('j F Y', get_end_date()['data'], 'Europe/London')->addDay();

        $total = $start->diffInDays($end) / 30.417;

        return '<strong>' . round($total) . _n( ' month', ' months', $start->diffInMonths($end)) . '</strong>';

    }

    return '<<< This post doesn\'t have the required start and end dates set to perform contract_diff >>>';

}

if (!shortcode_exists('contract_diff'))
    add_shortcode('contract_diff', 'get_contract_date_diff');

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

    /** 
 * Display a link to jump and open an accordian
 * [jump tab="{id of tab}" link_txt="Some text"]
 **/

 function tab_jump($atts) {

    extract(shortcode_atts(array(
        'tab' => 1,
        'link_text' => '',
     ), $atts));

    return '<a data-tab-name="' . $tab . '" class="tab-jump"><strong>'. $link_text .'</strong></a>';

 }

 if (!shortcode_exists('tab_jump'))
    add_shortcode('jump', 'tab_jump');