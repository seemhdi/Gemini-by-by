<?php
/**
 * PremiumGift functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PremiumGift
 */

if ( ! defined( 'PREMIUMGIFT_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'PREMIUMGIFT_VERSION', '1.0.0' );
}

if ( ! function_exists( 'premiumgift_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function premiumgift_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'premiumgift', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'premiumgift' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'premiumgift_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'premiumgift_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function premiumgift_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'premiumgift' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'premiumgift' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'premiumgift_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function premiumgift_scripts() {
	wp_enqueue_style( 'premiumgift-style', get_stylesheet_uri(), array(), PREMIUMGIFT_VERSION );
	wp_style_add_data( 'premiumgift-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'premiumgift_scripts' );

/**
 * Add Iranian currencies (Toman and Rial) to WooCommerce.
 */
function premiumgift_add_iranian_currencies( $currencies ) {
    $currencies['IRT'] = __( 'Iranian Toman', 'premiumgift' );
    $currencies['IRR'] = __( 'Iranian Rial', 'premiumgift' );
    return $currencies;
}
add_filter( 'woocommerce_currencies', 'premiumgift_add_iranian_currencies' );

function premiumgift_add_iranian_currency_symbols( $currency_symbol, $currency ) {
    switch ( $currency ) {
        case 'IRT':
            $currency_symbol = __( 'Toman', 'premiumgift' );
            break;
        case 'IRR':
            $currency_symbol = __( 'Rial', 'premiumgift' );
            break;
    }
    return $currency_symbol;
}
add_filter( 'woocommerce_currency_symbol', 'premiumgift_add_iranian_currency_symbols', 10, 2 );


/**
 * Implement WooCommerce features.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load SEO related functions.
 */
require get_template_directory() . '/inc/seo.php';