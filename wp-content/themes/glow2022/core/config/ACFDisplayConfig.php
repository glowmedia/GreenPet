<?php

namespace App;

/**
 * Class ACFDisplayConfig
 * @package App
 */
class ACFDisplayConfig
{
    /**
     * ACF Options Pages
     * Present an array of arrays with the desired parameters. Present an empty array if not required.
     */
    const acf_options_pages = [
        [
            'page_title' => 'Footer',
            'menu_title' => 'Footer',
            'menu_slug' => 'footer',
            'capability' => 'edit_posts',
            'redirect' => false,
            'icon_url' => 'dashicons-info'
        ],
        [
            'page_title' => 'Site',
            'menu_title' => 'Site',
            'menu_slug' => 'site',
            'capability' => 'edit_posts',
            'redirect' => false,
            'icon_url' => 'dashicons-info'
        ],
        [
            'page_title' => 'Contract Static Info',
            'menu_title' => 'Contract Static Info',
            'menu_slug' => 'contract_static_info',
            'capability' => 'edit_posts',
            'redirect' => false,
            'icon_url' => 'dashicons-info'
        ],
    ];

    /*
     * Pass the menu_slug of the options page to apply it's fields
     * */
    const display_acf_footer = [
        'footer',
    ];

    const display_acf_site = [
        'site',
    ];

    /**
     * ACF display options v2.0.
     * Field options are in /core/acf-config/
     */
    const display_acf_general = [];

    const display_acf_page = [
        'page',
        'cpt_event',
        'cpt_news_article',
        'post',
    ];

    const display_acf_staging = [
        'cpt_icn',
        'cpt_saving',
        'cpt_news_article',
        'cpt_contract',
        'cpt_contact',
        'cpt_publication',
        'page',
        'cpt_event',
        'cpt_service_update',
        'contactcardable',
    ];

    const display_acf_visibility = [];

    const display_acf_meta = [
        'cpt_icn',
        'cpt_saving',
        'cpt_news_article',
        'cpt_contract',
        'cpt_contact',
        'cpt_publication',
        'page',
        'cpt_event',
    ];

    const display_acf_product_type = [];

    const display_acf_usage = [];

    const display_acf_funding = [];

    const display_acf_titles = [
        'cpt_icn',
        'cpt_saving',
        'cpt_news_article',
        'cpt_contract',
        'cpt_contact',
        'cpt_publication',
        'page',
        'cpt_event',
    ];

    const display_acf_acf_end_of_life = [
        'cpt_icn',
        'cpt_saving',
        'cpt_news_article',
        'cpt_contract',
        'cpt_contact',
        'cpt_publication',
        'cpt_event',
    ];

    const display_acf_featured = [];

    const display_acf_persona_specific_content = [];

    const display_acf_internal_specific_content = [];

    const display_acf_downloads = [
        'cpt_icn',
        'cpt_saving',
        'cpt_news_article',
        'cpt_contract',
        'cpt_contact',
        'page',
        'cpt_event',
    ];

    const display_acf_links = [
        'cpt_icn',
        'cpt_saving',
        'cpt_news_article',
        'cpt_contract',
        'page',
        'cpt_event',
    ];

    const display_acf_icon = [
        'cpt_saving',
        'page',
    ];

    const display_acf_hero = [
        'page',
        /*'!home',*/
    ];

    const display_acf_hero_slider = [
        'home',
    ];

    const display_acf_start_end_dates = [
        'cpt_saving',
        'cpt_contract',
        'cpt_event',
    ];

    /*
     * By Post Type
     * */
    const display_acf_icn = [
        'cpt_icn',
    ];

    const display_acf_icn_updates = [
        'cpt_icn',
    ];

    const display_acf_savings = [
        'cpt_saving',
    ];

    const display_acf_contracts = [
        'cpt_contract',
    ];

    const display_acf_contacts = [
        'cpt_contact',
    ];

    const display_acf_service_updates = [
        'cpt_service_update',
    ];

    const display_acf_publications = [
        'cpt_publication',
    ];

    const display_acf_additional_child_pages = [
        'page',
    ];

    const display_acf_content_extra = [
        'page',
    ];

    const display_acf_events = [
        'cpt_event',
    ];

    /*
     * By Page
     * */
    const display_acf_home_news_feed = [
        'home'
    ];

    const display_acf_featured_case_study = [
        'home'
    ];

    const display_acf_featured_news = [
        'home'
    ];

    const display_acf_test = [];

    const display_contact_locations = [
        'contact/locations'
    ];

    const display_acf_buoy = [
        'cpt_icn',
        'cpt_saving',
        'cpt_news_article',
        'cpt_contract',
        'page',
        'cpt_event',
    ];

    /*
     * Keyword Invoked Search
     * */
    const display_acf_keyword_invoked_search = [
        'page',
        'cpt_contract',
    ];
}
