<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(
        array(
            'page_title' 	=> 'Grren Pet Options',
            'menu_title'	=> 'Grren Pet Options',
            'menu_slug' 	=> 'greenpet-options',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        )
        );
	
}