<div class="wrapper-full home-banner" style="background-image: linear-gradient(180deg, rgba(255,255,255,1) 10%, rgba(255,255,255,0) 80%), url(<?php echo get_field('home_page_banner', 'options') ?>);">

</div>

<div class="wrapper-full dark-green-bk home-text">
    <div class="page-content">
        <?php the_field('home_page_text', 'options'); ?>
    </div>

</div>

<div class="wrapper">
    <div class="page-content">
    
    <h2 class="heading-center">Best Sellers</h2>
    <?php echo do_shortcode('[products limit="3" columns="3" best_selling="true" /]'); ?>
</div>
</div>

<div class="wrapper-full light-green-bk">
    <div class="page-content">
        <?php get_template_part('partials/home/new-products'); ?>
    </div>

</div>

<div class="wrapper">
<?php get_template_part('partials/home/blog'); ?>
</div>

<div class="wrapper">
    <?php page_presenter(get_the_ID()); ?>
</div>

       
    
