<?php
/**
 * Post Thumbnail Functions
 * @package bizmaster
 * @since 1.0.0
 */

$bizmaster = bizmaster();
if (has_post_thumbnail()): ?>
    <div class="thumbnail text-center">
        <?php $bizmaster->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>
