<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

?>
<article <?php post_class( 'fsr-card' ); ?>>
<?php
if ( has_post_thumbnail() ) :
	?>
	<a class="fsr-card__image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?></a><?php endif; ?>
<p class="fsr-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html( faststudio_red_excerpt() ); ?></p>
</article>
