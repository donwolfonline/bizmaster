<?php
/**
 * Theme Footer Widget Template
 * @package bizmaster
 * @since 1.0.0
 */

if (!is_active_sidebar('footer-widget')){
	return;
}
?>
<div class="footer--top padding-top-120 padding-bottom-40">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar('footer-widget');?>
		</div>
	</div>
</div>