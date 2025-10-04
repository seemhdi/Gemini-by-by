<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package PremiumGift
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function premiumgift_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'max_rows'        => 8,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 5,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'premiumgift_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function premiumgift_woocommerce_scripts() {
	// Enqueue custom WooCommerce stylesheet.
	wp_enqueue_style( 'premiumgift-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css', array( 'premiumgift-style' ), PREMIUMGIFT_VERSION );
}
add_action( 'wp_enqueue_scripts', 'premiumgift_woocommerce_scripts' );


/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'premiumgift_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content Wrapper.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function premiumgift_woocommerce_wrapper_before() {
		?>
		<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'premiumgift_woocommerce_wrapper_before' );

if ( ! function_exists( 'premiumgift_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content Wrapper.
	 *
	 * Closes the wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function premiumgift_woocommerce_wrapper_after() {
		?>
		</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'premiumgift_woocommerce_wrapper_after' );

/**
 * Unset unnecessary checkout fields for virtual products.
 * This improves the user experience for digital-only stores.
 */
function premiumgift_unset_checkout_fields_for_virtual_products( $fields ) {
    // Check if the cart contains non-virtual products
    $is_cart_virtual = WC()->cart->is_virtual();

    if ( $is_cart_virtual ) {
        unset( $fields['billing']['billing_company'] );
        unset( $fields['billing']['billing_address_1'] );
        unset( $fields['billing']['billing_address_2'] );
        unset( $fields['billing']['billing_city'] );
        unset( $fields['billing']['billing_postcode'] );
        unset( $fields['billing']['billing_country'] );
        unset( $fields['billing']['billing_state'] );

        // Also remove the "Ship to a different address" section
        unset( $fields['shipping'] );
        add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false', 9999 );
    }

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'premiumgift_unset_checkout_fields_for_virtual_products' );

// Add more WooCommerce customizations below.