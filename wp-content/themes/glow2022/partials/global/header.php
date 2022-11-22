<!DOCTYPE html>
<html lang="en">
<head>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-H8FX4XW24W"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-H8FX4XW24W');
        </script>

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
    <div class="main-container">
        <div class="wrapper-header">
            <?php get_template_part('partials/global/logo'); ?>
            <?php get_template_part('partials/nav/main'); ?>
        </div>
    </div>

</header>

<main>