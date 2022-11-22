<?php

/**
 * Passes $stack down to a view.
 *
 * @param $partial
 * @param $stack
 */
function get_template_partial($partial, $stack)
{
    $path = $partial . '.php';

    if (file_exists(locate_template($path)))
        include(locate_template($path));
}

/**
 * @param $page_name
 *
 * @return bool
 */
function locate_page_template($page_name)
{
    if (file_exists(locate_template('/pages/' . $page_name . '.php')))
        return true;

    return false;
}