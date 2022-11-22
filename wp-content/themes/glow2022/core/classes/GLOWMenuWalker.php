<?php

//namespace App;

class GLOW_Menu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {

        $output .="<li class='" . implode(" ", $item->classes) . "'>";

        if ($args->walker->has_children) {

            $output .= "<a href='" . $item->url . "' class='submenu-parent'>" . $item->title . "</a>";
            $output .= '<span class="open-submenu">&#9660;</span>';

        }else {
                $output .="<a href='" . $item->url . "'>" . $item->title . "</a>";
           
        }

    }
}