<?php
function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post','cpt_blog'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');
?>