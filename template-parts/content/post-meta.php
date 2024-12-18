<?php
/**
 * Post Meta Functions
 * @package bizmaster
 * @since 1.0.0
 */

$bizmaster = bizmaster();
$post_meta = Bizmaster_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <ul class="post-meta">
        <?php if ($post_meta['posted_by']): ?>
            <li>
                <i class="far fa-user"></i>
                <?php $bizmaster->posted_by(); ?>
            </li>
        <?php endif; ?>

		<?php if ($post_meta['posted_on']): ?>
		<li>
            <i class="fas fa-calendar-alt"></i>
            <?php $bizmaster->posted_on(); ?>
        </li>
		<?php endif; ?>

		<?php if ($post_meta['comments_count']): ?>
        <li>
            <i class="far fa-comments"></i>
            <?php $bizmaster->comment_count(); ?>
        </li>
		<?php endif; ?>

		<?php if ($post_meta['posted_cat']): ?>
		<li>
			<i class="far fa-folder-open"></i>
			<?php the_category(', ', '') ?>
		</li>
		<?php endif; ?>
    </ul>
</div>