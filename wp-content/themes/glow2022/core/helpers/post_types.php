<?php

/*
Testimonial CPT
*/
function create_post_types() {
if (!post_type_exists('cpt_testimonials')) {

    register_post_type( 'cpt_testimonials', 
        [
            'labels' => [
                'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Testimonials', 'text_domain' ),
                'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
                'archives'              => __( 'Testimonial Archives', 'text_domain' ),
                'attributes'            => __( 'Testimonial Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Items', 'text_domain' ),
                'add_new_item'          => __( 'Add New Item', 'text_domain' ),
                'add_new'               => __( 'Add New Testimonial', 'text_domain' ),
                'new_item'              => __( 'New Item', 'text_domain' ),
                'edit_item'             => __( 'Edit Item', 'text_domain' ),
                'update_item'           => __( 'Update Item', 'text_domain' ),
                'view_item'             => __( 'View Item', 'text_domain' ),
                'view_items'            => __( 'View Items', 'text_domain' ),
                'search_items'          => __( 'Search Item', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            ],
            'supports'              => array( 'title', 'editor' ),
            'taxonomies'            => array( 'category' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-format-quote',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rewrite'            => array( 'slug' => 'testimonial' ),
        ]
    
    );

    

}

if (!post_type_exists('cpt_blog')) {
register_post_type( 'cpt_blog', 
        [
            'labels' => [
                'name'                  => _x( 'Blogs', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Blog', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Blogs', 'text_domain' ),
                'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
                'archives'              => __( 'Blog Archives', 'text_domain' ),
                'attributes'            => __( 'Blog Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Items', 'text_domain' ),
                'add_new_item'          => __( 'Add New Item', 'text_domain' ),
                'add_new'               => __( 'Add New Blog', 'text_domain' ),
                'new_item'              => __( 'New Item', 'text_domain' ),
                'edit_item'             => __( 'Edit Item', 'text_domain' ),
                'update_item'           => __( 'Update Item', 'text_domain' ),
                'view_item'             => __( 'View Item', 'text_domain' ),
                'view_items'            => __( 'View Items', 'text_domain' ),
                'search_items'          => __( 'Search Item', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            ],
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
            'taxonomies'            => array( 'category' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-star-filled
            ',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rewrite'            => array( 'slug' => 'blog', 'with_front' => false ),
        ]
    
    );
}

}

add_action('init', 'create_post_types');