<?php
/**
 * Studio homepage template.
 *
 * @package FastStudio_Red
 */

get_header();
?>
<section class="fsr-shell fsr-hero" aria-labelledby="fsr-home-title">
<p class="fsr-kicker"><?php echo esc_html( faststudio_red_mod( 'eyebrow', __( '独立设计 · 个人工作室', 'faststudio-red' ) ) ); ?></p>
<h1 id="fsr-home-title"><?php echo esc_html( faststudio_red_mod( 'headline', __( '让好想法，获得清晰而鲜明的表达。', 'faststudio-red' ) ) ); ?></h1>
<p class="fsr-lede"><?php echo esc_html( faststudio_red_mod( 'intro', __( '为网站与品牌设计鲜明的个性，把想法变成值得被看见的作品。', 'faststudio-red' ) ) ); ?></p>
<?php
if ( faststudio_red_mod( 'action_url', '#cases' ) && faststudio_red_mod( 'action_label', __( '查看作品', 'faststudio-red' ) ) ) :
	?>
	<a class="fsr-button" href="<?php echo esc_url( faststudio_red_mod( 'action_url', '#cases' ) ); ?>"><?php echo esc_html( faststudio_red_mod( 'action_label', __( '查看作品', 'faststudio-red' ) ) ); ?></a><?php endif; ?>
<?php
if ( is_active_sidebar( 'faststudio-red-home-intro' ) ) :
	?>
	<div><?php dynamic_sidebar( 'faststudio-red-home-intro' ); ?></div><?php endif; ?>
</section>
<?php
if ( is_active_sidebar( 'faststudio-red-home-services' ) ) :
	?>
	<section class="fsr-services" aria-labelledby="fsr-services-title"><div class="fsr-shell"><h2 id="fsr-services-title"><?php echo esc_html( faststudio_red_mod( 'services_label', __( '服务方向', 'faststudio-red' ) ) ); ?></h2><div class="fsr-services__grid"><?php dynamic_sidebar( 'faststudio-red-home-services' ); ?></div></div></section>
	<?php
endif;
?>
<section class="fsr-section" id="cases" aria-labelledby="fsr-work-title"><div class="fsr-shell">
<?php
$posts_page_url = get_permalink( (int) get_option( 'page_for_posts' ) );
if ( ! $posts_page_url ) {
	$posts_page_url = home_url( '/' );
}
?>
<div class="fsr-section__head"><h2 id="fsr-work-title"><?php echo esc_html( faststudio_red_mod( 'work_label', __( '精选作品', 'faststudio-red' ) ) ); ?></h2><a href="<?php echo esc_url( $posts_page_url ); ?>"><?php esc_html_e( '全部手记', 'faststudio-red' ); ?></a></div>
<div class="fsr-grid">
<?php
$work = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
?>
<?php
if ( $work->have_posts() ) :
	while ( $work->have_posts() ) :
		$work->the_post();
		?>
<article <?php post_class( 'fsr-card' ); ?>><a class="fsr-card__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); }
		?>
</a><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html( faststudio_red_excerpt() ); ?></p></article>
		<?php
	endwhile;
	wp_reset_postdata(); else :
		?>
	<p class="fsr-empty"><?php esc_html_e( '已发布文章及其特色图片会显示在这里。', 'faststudio-red' ); ?></p><?php endif; ?>
</div>
<?php
if ( is_active_sidebar( 'faststudio-red-home-after-work' ) ) :
	?>
	<div><?php dynamic_sidebar( 'faststudio-red-home-after-work' ); ?></div><?php endif; ?>
</div></section>
<section class="fsr-section" id="about" aria-labelledby="fsr-about-title"><div class="fsr-shell fsr-about"><h2 id="fsr-about-title"><?php echo esc_html( faststudio_red_mod( 'about_label', __( '关于工作室', 'faststudio-red' ) ) ); ?></h2><div class="fsr-about__copy"><?php echo wp_kses_post( wpautop( esc_html( faststudio_red_mod( 'about_copy', __( '保持独立，也乐于协作。工作室把策略、设计与细致制作结合起来，为每个项目找到清楚而鲜明的表达。', 'faststudio-red' ) ) ) ) ); ?></div></div></section>
<?php
if ( is_active_sidebar( 'faststudio-red-home-contact' ) ) :
	?>
	<section class="fsr-contact" aria-labelledby="fsr-contact-title"><div class="fsr-shell"><h2 id="fsr-contact-title"><?php echo esc_html( faststudio_red_mod( 'contact_label', __( '合作方式与联系', 'faststudio-red' ) ) ); ?></h2><div class="fsr-contact__widgets"><?php dynamic_sidebar( 'faststudio-red-home-contact' ); ?></div></div></section>
	<?php
endif;
?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); if ( trim( get_the_content() ) ) :
			?>
	<section class="fsr-section"><div class="fsr-shell fsr-content fsr-entry"><?php the_content(); ?></div></section>
			<?php
endif;
endwhile;
endif;
?>
<?php get_footer(); ?>
