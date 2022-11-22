<div class="wrapper-full">
    <div class="page-content page-title">
        <h1>Search Results for <?php echo get_search_query(); ?></h1>
    </div>
</div>

<div class="wrapper">
    <div class="page-content search-results">
        <?php global $wp_query; ?>
        <div class="wp-block-columns">
        <div class="wp-block-column" style="flex-basis:66.66%">
            <p><?php echo show_search_results_message($wp_query); ?></p>
            <p>If you haven't found what you searched for, please try searching again.</p>
        </div>

        <div class="wp-block-column" style="flex-basis:33.33%">
            <p><strong>Search Insights</strong></p>

            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="wp-block-search__button-inside wp-block-search__icon-button wp-block-search">
                <div class="wp-block-search__inside-wrapper">
                    <input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Search" required="">
                    <button type="submit" class="wp-block-search__button has-icon">
                        <svg id="search-icon" class="search-icon" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        </div>
        <?php show_search_results($wp_query); ?>

    </div>
</div>