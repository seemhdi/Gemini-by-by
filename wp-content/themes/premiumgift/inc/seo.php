<?php
/**
 * SEO related functions
 *
 * @package PremiumGift
 */

if ( ! function_exists( 'premiumgift_display_breadcrumbs' ) ) :
    /**
     * Display breadcrumbs.
     *
     * Checks for popular SEO plugins like Yoast SEO or Rank Math first.
     * This ensures we are using the most optimized breadcrumbs available.
     *
     * @return void
     */
    function premiumgift_display_breadcrumbs() {
        // Don't show on the homepage.
        if ( is_front_page() ) {
            return;
        }

        // Priority 1: Yoast SEO Breadcrumbs.
        if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
            return;
        }

        // Priority 2: Rank Math Breadcrumbs.
        if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
            rank_math_the_breadcrumbs();
            return;
        }

        // Fallback or custom breadcrumbs can be added here later if needed.
    }
endif;