<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="fsr-skip" href="#main-content"><?php esc_html_e( '跳转到正文', 'faststudio-red' ); ?></a>
<header class="fsr-header"><div class="fsr-shell fsr-header__inner">
<?php
if ( has_custom_logo() ) :
	?>
	<div class="fsr-brand"><?php the_custom_logo(); ?></div>
	<?php
else :
	?>
	<a class="fsr-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php endif; ?>
<nav class="fsr-nav" aria-label="<?php esc_attr_e( '主导航', 'faststudio-red' ); ?>">
<?php
wp_nav_menu(
	array(
		'theme_location' => 'primary',
		'container'      => false,
		'fallback_cb'    => false,
	)
);
?>
</nav>
</div></header>
<main id="main-content" class="fsr-main">
