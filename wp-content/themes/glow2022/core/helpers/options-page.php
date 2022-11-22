<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(
        array(
            'page_title' 	=> 'CFR Options',
            'menu_title'	=> 'CFR Options',
            'menu_slug' 	=> 'cfr-options',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        )
        );
	
}