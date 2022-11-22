<form role="search" method="get" class="basic-searchform" id="searchform-404" action="/">
    <input type="search" class="search-field"
           placeholder="<?php echo esc_attr_x('Search', 'placeholder'); ?>"
           value="<?php echo get_search_query(); ?>" name="s"
           title="<?php echo esc_attr_x('Search', 'label'); ?>"
           required
    >
    <button type="submit" class="search-submit"><span class='fa fa-search' aria-hidden='true'></span></button>
</form>