<?php
/**
 * FastStudio Red theme setup and Customizer.
 *
 * @package FastStudio_Red
 */

defined( 'ABSPATH' ) || exit;

/** Configure theme supports and navigation locations. */
function faststudio_red_setup() {
	load_theme_textdomain( 'faststudio-red', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 96,
			'width'       => 280,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'style', 'script' ) );
	register_nav_menus(
		array(
			'primary' => __( '主导航', 'faststudio-red' ),
			'footer'  => __( '页脚导航', 'faststudio-red' ),
		)
	);
}
add_action( 'after_setup_theme', 'faststudio_red_setup' );

/** Return semantic palette defaults.
 *
 * @return array<string, string>
 */
function faststudio_red_colors() {
	return array(
		'accent'       => '#d92525',
		'soft_accent'  => '#f3dfd8',
		'paper'        => '#fff6ee',
		'ink'          => '#201d1a',
		'muted'        => '#625c56',
		'surface'      => '#fffdfa',
		'line'         => '#d8ccc2',
		'on_accent'    => '#ffffff',
		'footer'       => '#201d1a',
		'footer_text'  => '#fffdfa',
		'footer_muted' => '#c8beb7',
		'focus'        => '#005fcc',
	);
}

/** Register editable homepage copy and color controls.
 *
 * @param WP_Customize_Manager $customize WordPress Customizer manager.
 */
function faststudio_red_register_customizer( $customize ) {
	$customize->add_section(
		'faststudio_red_home',
		array(
			'title'    => __( 'FastStudio Red：工作室首页', 'faststudio-red' ),
			'priority' => 35,
		)
	);
	$fields = array(
		'eyebrow'        => array( __( '首页眉题', 'faststudio-red' ), '独立设计 · 个人工作室' ),
		'headline'       => array( __( '首页主标题', 'faststudio-red' ), __( '让好想法，获得清晰而鲜明的表达。', 'faststudio-red' ) ),
		'intro'          => array( __( '首页介绍', 'faststudio-red' ), __( '为网站与品牌设计鲜明的个性，把想法变成值得被看见的作品。', 'faststudio-red' ) ),
		'work_label'     => array( __( '作品区标题', 'faststudio-red' ), __( '精选作品', 'faststudio-red' ) ),
		'services_label' => array( __( '服务区标题', 'faststudio-red' ), __( '服务方向', 'faststudio-red' ) ),
		'about_label'    => array( __( '关于区标题', 'faststudio-red' ), __( '关于工作室', 'faststudio-red' ) ),
		'about_copy'     => array( __( '工作室介绍', 'faststudio-red' ), __( '保持独立，也乐于协作。用清晰的结构与大胆的色彩，为每个想法找到自己的表达。', 'faststudio-red' ) ),
		'contact_label'  => array( __( '联系区标题', 'faststudio-red' ), __( '合作方式与联系', 'faststudio-red' ) ),
		'action_label'   => array( __( '首页链接文字', 'faststudio-red' ), __( '查看作品', 'faststudio-red' ) ),
		'action_url'     => array( __( '首页链接地址', 'faststudio-red' ), '#cases' ),
	);
	foreach ( $fields as $key => $field ) {
		$textarea = in_array( $key, array( 'intro', 'about_copy' ), true );
		$is_url   = '_url' === substr( $key, -4 );
		$customize->add_setting(
			'faststudio_red_' . $key,
			array(
				'default'           => $field[1],
				'sanitize_callback' => $is_url ? 'esc_url_raw' : ( $textarea ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
			)
		);
		$customize->add_control(
			'faststudio_red_' . $key,
			array(
				'label'   => $field[0],
				'section' => 'faststudio_red_home',
				'type'    => $is_url ? 'url' : ( $textarea ? 'textarea' : 'text' ),
			)
		);
	}
	$customize->add_section(
		'faststudio_red_palette',
		array(
			'title'       => __( 'FastStudio Red：配色', 'faststudio-red' ),
			'priority'    => 36,
			'description' => __( '所有主题颜色都可以修改。更改后请检查文字与背景的对比度。', 'faststudio-red' ),
		)
	);
	$labels = array(
		'accent'       => __( '红色强调色', 'faststudio-red' ),
		'soft_accent'  => __( '浅红区块底色', 'faststudio-red' ),
		'paper'        => __( '暖白页面底色', 'faststudio-red' ),
		'ink'          => __( '主要文字', 'faststudio-red' ),
		'muted'        => __( '次要文字', 'faststudio-red' ),
		'surface'      => __( '内容表面', 'faststudio-red' ),
		'line'         => __( '分隔线与边框', 'faststudio-red' ),
		'on_accent'    => __( '强调色背景文字', 'faststudio-red' ),
		'footer'       => __( '页脚底色', 'faststudio-red' ),
		'footer_text'  => __( '页脚文字', 'faststudio-red' ),
		'footer_muted' => __( '页脚次要文字', 'faststudio-red' ),
		'focus'        => __( '键盘焦点提示', 'faststudio-red' ),
	);
	foreach ( faststudio_red_colors() as $key => $default ) {
		$customize->add_setting(
			'faststudio_red_color_' . $key,
			array(
				'default'           => $default,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$customize->add_control(
			new WP_Customize_Color_Control(
				$customize,
				'faststudio_red_color_' . $key,
				array(
					'label'   => $labels[ $key ],
					'section' => 'faststudio_red_palette',
				)
			)
		);
	}
}
add_action( 'customize_register', 'faststudio_red_register_customizer' );

/** Register editable homepage, sidebar, and footer areas. */
function faststudio_red_widgets() {
	$areas = array(
		'faststudio-red-home-intro'      => __( '首页：补充介绍', 'faststudio-red' ),
		'faststudio-red-home-services'   => __( '首页：服务方向', 'faststudio-red' ),
		'faststudio-red-home-after-work' => __( '首页：作品之后的补充内容', 'faststudio-red' ),
		'faststudio-red-home-contact'    => __( '首页：合作方式与联系', 'faststudio-red' ),
		'faststudio-red-sidebar'         => __( '文章与页面：侧栏', 'faststudio-red' ),
		'faststudio-red-footer'          => __( '页脚：工作室信息', 'faststudio-red' ),
	);
	foreach ( $areas as $id => $name ) {
		register_sidebar(
			array(
				'id'            => $id,
				'name'          => $name,
				'before_widget' => '<section id="%1$s" class="widget fsr-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="fsr-label">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'faststudio_red_widgets' );

/** Enqueue the theme stylesheet and sanitized palette variables. */
function faststudio_red_assets() {
	$theme = wp_get_theme();
	wp_enqueue_style( 'faststudio-red-style', get_stylesheet_uri(), array(), $theme->get( 'Version' ) );
	$vars = '';
	foreach ( faststudio_red_colors() as $key => $default ) {
		$value   = sanitize_hex_color( get_theme_mod( 'faststudio_red_color_' . $key, $default ) );
		$css_key = array(
			'paper'        => 'paper',
			'ink'          => 'ink',
			'muted'        => 'muted',
			'surface'      => 'surface',
			'line'         => 'line',
			'on_accent'    => 'on-accent',
			'footer_text'  => 'footer-text',
			'footer_muted' => 'footer-muted',
		);
		$vars   .= '--fsr-' . ( isset( $css_key[ $key ] ) ? $css_key[ $key ] : $key ) . ':' . ( $value ? $value : $default ) . ';';
	}
	wp_add_inline_style( 'faststudio-red-style', ':root{' . $vars . '}' );
}
add_action( 'wp_enqueue_scripts', 'faststudio_red_assets' );

/** Get a theme setting with a fallback.
 *
 * @param string $key Setting name without theme prefix.
 * @param mixed  $fallback Default value.
 * @return mixed
 */
function faststudio_red_mod( $key, $fallback = '' ) {
	return get_theme_mod( 'faststudio_red_' . $key, $fallback );
}

/** Return a post excerpt or a short content fallback.
 *
 * @return string
 */
function faststudio_red_excerpt() {
	$excerpt = get_the_excerpt();
	return $excerpt ? $excerpt : wp_trim_words( wp_strip_all_tags( get_the_content() ), 22 );
}
