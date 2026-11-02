<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

get_header();
while ( have_posts() ) :
	the_post(); ?><article <?php post_class( 'fsr-shell fsr-content' ); ?>><p class="fsr-kicker"><?php esc_html_e( '工作室', 'faststudio-red' ); ?></p><h1><?php the_title(); ?></h1><div class="fsr-entry">
	<?php
	the_content();
	wp_link_pages();
	?>
</div>
	<?php
	if ( is_active_sidebar( 'faststudio-red-sidebar' ) ) :
		?>
	<aside class="fsr-sidebar" aria-label="<?php esc_attr_e( '补充信息', 'faststudio-red' ); ?>"><?php dynamic_sidebar( 'faststudio-red-sidebar' ); ?></aside><?php endif; ?></article><?php endwhile;
get_footer(); ?>
