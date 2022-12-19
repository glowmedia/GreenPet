<?php

	$post_objects = get_field('new_products', 'options');

if( $post_objects ): ?>
    <h2>New Products</h2>
    <div class="woocommerce columns-3">
    <ul class="products columns-3 new-prods">
    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

        <?php
        $product = wc_get_product( $post );

        $product_id = $product->get_id();

        ?>
        <li class="product">
			<a href="<?php the_permalink(); ?>">

            <?php echo woocommerce_get_product_thumbnail( 'woocommerce_thumbnail' ); ?>

            <div class="card-body">
            <p><?php the_title(); ?></p>
            <p><?php echo $product->get_price_html(); ?></p>
            </div>
            
            </a>
            <a href="?add-to-cart=<?php echo $product_id; ?>" data-quantity="1" class="button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $product_id; ?>" data-product_sku="" aria-label="Add this product to your cart" rel="nofollow">Add to cart</a>
            
        </li>
    <?php endforeach; ?>
    </ul>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
