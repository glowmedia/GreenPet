<div class="footer-col1">
        <h3>Quick Links</h3>
        <?php get_template_part('partials/nav/footer'); ?>
</div>
<div class="footer-col2">
        <h3>Need Help?</h3>
        <?php
                wp_nav_menu([
                        'menu' => 'footer',
                        'theme_location' => 'footer_contact_us',
                        'depth' => 1,
                        'container' => 'div',
                        'container_class' => 'footer-menu2',
                        'menu_class' => 'footer-nav-list',
                        ]
                );
    ?>
</div>
<div class="footer-col3">
<h3>Subscribe to our Newsletter</h3>
			<p>We'll send you a sweet 15% discount coupon you can use on your fist order.</p>	
			<p><a href="" target="_blank" class="btn-full">GET MY 15% OFF</a></p>
			<p><small>Valid for online purchases only. Does not apply to products already on offer.</small></p>
</div>
