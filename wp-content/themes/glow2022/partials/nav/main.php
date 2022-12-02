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

    wp_nav_menu([
        'menu' => 'mobile',
        'theme_location' => 'mobile',
        'depth' => 2,
        'container' => 'div',
        'container_class' => 'navbar',
        'container_id' => 'mobile-navbar',
        'menu_class' => 'navbar-nav',
        'walker' => new GLOW_Menu_Walker(),
        'fallback_cb'    => 'link_to_menu_editor',
    ]
);

    ?>

    <div class="mobile-menu-icon">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>

</nav>

