<div class="wrapper-full">
    <div class="page-content page-title">
        <h1>Search Results for <?php echo get_search_query(); ?></h1>



    <div class="search-results">
        <?php global $wp_query; ?>
       <p><?php echo show_search_results_message($wp_query); ?></p>
            <p>If you haven't found what you searched for, please try searching again.</p>

        <?php show_search_results($wp_query); ?>

    </div>
</div>