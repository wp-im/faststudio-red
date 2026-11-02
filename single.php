<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

get_header();
while ( have_posts() ) :
	the_post(); ?><article <?php post_class( 'fsr-shell fsr-content' ); ?>><p class="fsr-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p><h1><?php the_title(); ?></h1>
	<?php
	if ( has_post_thumbnail() ) :
		?>
	<div class="fsr-featured"><?php the_post_thumbnail( 'large', array( 'loading' => 'eager' ) ); ?></div><?php endif; ?><div class="fsr-entry">
	<?php
	the_content();
	wp_link_pages();
	?>
</div>
	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template(); }
	?>
</article><?php endwhile;
get_footer(); ?>
