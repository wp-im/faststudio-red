<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

get_header(); ?><div class="fsr-shell fsr-content fsr-content--wide"><header><p class="fsr-kicker"><?php esc_html_e( '浏览', 'faststudio-red' ); ?></p><h1><?php echo esc_html( get_the_archive_title() ); ?></h1>
<?php
$description = get_the_archive_description(); if ( $description ) :
	?>
	<div class="fsr-entry"><?php echo wp_kses_post( $description ); ?></div><?php endif; ?></header><div class="fsr-grid fsr-section">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content' );
		endwhile; else :
			?>
	<p><?php esc_html_e( '没有找到文章。', 'faststudio-red' ); ?></p><?php endif; ?></div><?php the_posts_pagination(); ?></div><?php get_footer(); ?>
