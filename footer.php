<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

?>
</main>
<footer class="fsr-footer"><div class="fsr-shell fsr-footer__inner">
<div><strong><?php echo esc_html( get_bloginfo( 'name' ) ); ?></strong>
<?php
if ( is_active_sidebar( 'faststudio-red-footer' ) ) {
	dynamic_sidebar( 'faststudio-red-footer' ); }
?>
</div>
<nav aria-label="<?php esc_attr_e( '页脚导航', 'faststudio-red' ); ?>">
<?php
wp_nav_menu(
	array(
		'theme_location' => 'footer',
		'container'      => false,
		'fallback_cb'    => false,
	)
);
?>
</nav>
</div></footer><?php wp_footer(); ?></body></html>
