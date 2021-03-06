<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bellini
 */
if ( ! bellini_sidebar_active_left() ) {
	return;
}
?>
<aside id="secondary" class="widget-area widget-area--left col-md-3 <?php bellini_sidebar_widget_class(); ?>" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'sidebar-left' ); ?>
</aside><!-- #secondary -->