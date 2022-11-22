<?php

class SliderModel
{
    /**
     * @param $post_id
     *
     * @return array
     */
    public static function get_slides($post_id)
    {
        $slides = [];

        if (have_rows('slide')) {
            while (have_rows('slide')) {
                the_row();

                if ('external' == get_sub_field('slide_link', $post_id))
                    $link = ['type' => 'external', 'url' => get_sub_field('slide_external', $post_id)];
                
                else if ('internal' == get_sub_field('slide_link', $post_id)){

                    if (get_sub_field('utm_source', $post_id)){
                        $utm_code = '?utm_source=' . get_sub_field('utm_source', $post_id) . '&utm_medium=' . get_sub_field('utm_medium', $post_id) . '&utm_campaign=' . get_sub_field('utm_campaign', $post_id);
                        $link = ['type' => 'internal', 'url' => get_the_permalink(get_sub_field('slide_internal', $post_id)[0]->ID).$utm_code];

                    }else{
                        $link = ['type' => 'internal', 'url' => get_the_permalink(get_sub_field('slide_internal', $post_id)[0]->ID)];
                    }
                }
                
                else
                    $link = ['type' => null, 'url' => null];
                    
                $slides[] = [
                    'image' => get_sub_field('slide_image', $post_id),
                    'link_type' => $link['type'],
                    'link_url' => $link['url'],
                ];
            }
        }

        return $slides;
    }
}