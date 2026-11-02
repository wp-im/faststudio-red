<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

get_header(); ?><div class="fsr-shell fsr-content fsr-content--wide"><header><p class="fsr-kicker"><?php esc_html_e( '站内搜索', 'faststudio-red' ); ?></p><h1>
<?php
/* translators: %s: the search query. */
printf( esc_html__( '“%s”的搜索结果', 'faststudio-red' ), esc_html( get_search_query() ) );
?>
</h1><?php get_search_form(); ?></header><div class="fsr-grid fsr-section">
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content' );
endwhile; else :
	?>
	<p><?php esc_html_e( '没有找到内容，请尝试其他关键词。', 'faststudio-red' ); ?></p><?php endif; ?></div><?php the_posts_pagination(); ?></div><?php get_footer(); ?>
