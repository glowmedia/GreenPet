<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="overlay"></div>
<header>
    <?php if (get_field('announcement_bar', 'options')) {
        get_template_part('partials/global/announcement');
    } ?>

    <div class="main-container">
        
        
        <div class="wrapper-header">
            <?php get_template_part('partials/global/logo'); ?>
            <?php get_template_part('partials/nav/main'); ?>
            <?php get_template_part('partials/global/icons'); ?>
        </div>

        <div class="search-box">
            <div class="search-form">
            <?php get_template_part('partials/search/basic-searchform'); ?>
            </div>
        </div>
    </div>

</header>

<main>