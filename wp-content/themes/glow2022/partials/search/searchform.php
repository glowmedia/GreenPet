<form role="search" method="get" class="searchform" id="searchform-<?php echo $identifier; ?>" action="/">
    <select class="search-select" aria-label="Choose to Search the Website or Catalogue">
        <option value="site">Website</option>
        <option value="catalogue">Online Catalogue</option>
    </select>
    <input type="search" class="search-field"
           placeholder="<?php echo esc_attr_x('Search', 'placeholder'); ?>"
           value="<?php echo get_search_query(); ?>" name="s"
           title="<?php echo esc_attr_x('Search', 'label'); ?>"
           required
    >
    <button type="submit" class="search-submit"><span class='fa fa-search' aria-hidden='true'></span></button>
</form>