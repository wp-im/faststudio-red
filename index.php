<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

get_header(); ?><div class="fsr-shell fsr-content fsr-content--wide">
<header><p class="fsr-kicker"><?php esc_html_e( '工作手记', 'faststudio-red' ); ?></p><h1><?php echo esc_html( is_home() ? get_the_title( (int) get_option( 'page_for_posts' ) ) : __( '最新文章', 'faststudio-red' ) ); ?></h1></header>
<div class="fsr-grid fsr-section">
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content' );
endwhile; else :
	?>
	<p><?php esc_html_e( '没有找到文章。', 'faststudio-red' ); ?></p><?php endif; ?></div>
<nav class="fsr-pagination" aria-label="<?php esc_attr_e( '文章分页', 'faststudio-red' ); ?>"><?php the_posts_navigation(); ?></nav>
</div><?php get_footer(); ?>
