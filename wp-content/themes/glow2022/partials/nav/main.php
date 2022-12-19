<nav>
 



    <?php 
    wp_nav_menu([
            'menu' => 'main',
            'theme_location' => 'main',
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'navbar',
            'container_id' => 'navbar',
            'menu_class' => 'navbar-nav',
        ]
    );
    ?>

<div id="mobile-navbar" class="navbar">

<img src="<?php bloginfo('template_url'); ?>/img/GP-Logo.svg" alt="Green Pet" width="120" height="34" />

<?php

    wp_nav_menu([
        'menu' => 'mobile',
        'theme_location' => 'mobile',
        'depth' => 2,
        'container' => false,
        'container_class' => 'xxxnavbar',
        'container_id' => 'xxxmobile-navbar',
        'menu_class' => 'navbar-nav',
        'walker' => new GLOW_Menu_Walker(),
        'fallback_cb'    => 'link_to_menu_editor',
    ]
);

    ?>

</div>

    <div class="mobile-menu-icon">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>

</nav>

