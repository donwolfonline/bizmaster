<?php
/**
 * Theme Footer Template
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bizmaster
 */

$page_container_meta = Bizmaster_Group_Fields_Value::page_container('bizmaster', 'header_options');
?>

</div><!-- #content -->

<?php if($page_container_meta['footer_type'] == 'style-01' || $page_container_meta['footer_type'] == 'style-02') { ?>
	<?php get_template_part('template-parts/footer/footer', $page_container_meta['footer_type']); ?>
<?php } else { ?>
	<?php get_template_part('template-parts/footer/footer'); ?>
<?php } ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
