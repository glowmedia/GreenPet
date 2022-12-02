<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(
        array(
            'page_title' 	=> 'Green Pet Options',
            'menu_title'	=> 'Green Pet Options',
            'menu_slug' 	=> 'greenpet-options',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        )
        );
	
}