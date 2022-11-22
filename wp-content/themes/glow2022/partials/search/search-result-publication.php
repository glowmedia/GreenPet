<?php

use Auth\Auth;
use Auth\User;
use Auth\Asset;

?>

<div class="single-search-result">
    <h3><?php echo get_short_title($stack['post']->ID); ?></h3>

    <p><?php echo get_teaser($stack['post']->ID); ?></p>

    <?php if (Asset::is_protected($stack['post']->ID) && !User::logged_in()) : ?>
        <?php Auth::sign_in_prompt(); ?>
    <?php else : ?>
        <?php if (get_field('publication_assets_are_text', 'option')) : ?>
            <a href="<?php echo get_field('publication_asset', $stack['post']->ID); ?>" class="btn-primary btn" target="_blank">DOWNLOAD</a>
        <?php else : ?>
            <a href="<?php echo get_field('publication_asset', $stack['post']->ID)['url']; ?>" class="btn-primary btn" target="_blank">DOWNLOAD</a>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php wp_reset_postdata(); ?>
