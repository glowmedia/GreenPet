<div class="wrapper-full home-banner" style="background-image: linear-gradient(180deg, rgba(255,255,255,1) 10%, rgba(255,255,255,0) 60%), url(<?php echo get_field('home_page_banner', 'options') ?>);">

    <div class="banner-text">
        <?php the_field('home_page_text', 'options'); ?>
    </div>
</div>

<div class="wrapper">
<?php echo do_shortcode('[products limit="3" columns="3" best_selling="true" /]'); ?>
</div>

<div class="wrapper-full light-green-bk">
    <div class="page-content">
        <p>Full width - New arrivals</p>
</div>

</div>

<div class="wrapper">
<p> site width - blog</p>
</div>

<div class="wrapper">
    <?php page_presenter(get_the_ID()); ?>
</div>

       
    
