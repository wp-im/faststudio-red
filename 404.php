<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red
 */

get_header(); ?><section class="fsr-shell fsr-content"><p class="fsr-kicker"><?php esc_html_e( '404', 'faststudio-red' ); ?></p><h1><?php esc_html_e( '暂时找不到这个页面。', 'faststudio-red' ); ?></h1><p><?php esc_html_e( '地址可能已经变更。你可以搜索站内内容，或返回首页。', 'faststudio-red' ); ?></p><?php get_search_form(); ?><p><a class="fsr-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( '返回首页', 'faststudio-red' ); ?></a></p></section><?php get_footer(); ?>
