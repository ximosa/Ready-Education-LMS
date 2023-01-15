<?php
/**
 * Woocommerce
 *
 * @package edukul
 * @version 3.6.8
 */

// Disable WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Remove breadcrumb (we're using the WooFramework default breadcrumb)
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Removes the "shop" title on the main shop page
add_filter( 'woocommerce_show_page_title', '__return_false' );

// Remove Heading Text Tab
add_filter( 'woocommerce_product_description_heading', '__return_false' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

// Change gravatar size
add_filter( 'woocommerce_review_gravatar_size', 'edukul_woocommerce_gravatar_size', 10 );
function edukul_woocommerce_gravatar_size() { return 100; }

// Adjust markup on all WooCommerce pages
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Remove WC sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Fix html on item product 
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'woocommerce_before_shop_loop_item', 'edukul_before_shop_loop_item' );
add_action( 'edukul_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'edukul_before_shop_loop_item', 'woocommerce_template_loop_product_thumbnail', 10 );

function edukul_before_shop_loop_item() {
	echo '<div class="product-thumbnail">';
	do_action( 'edukul_before_shop_loop_item' );
	echo '</div><div class="product-info">';
}
add_action( 'woocommerce_after_shop_loop_item', function() {
	echo '</div>';
}, 99 );

// Update the number on cart icon
add_filter( 'woocommerce_add_to_cart_fragments', 'edukul_woocommerce_cart_link_fragment' );
if ( ! function_exists( 'edukul_woocommerce_cart_link_fragment' ) ) {
	// Ensure cart contents update when products are added to the cart via AJAX
	function edukul_woocommerce_cart_link_fragment( $fragments ) {
		global $woocommerce;
		ob_start(); ?>

		<a class="nav-cart-trigger" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'edukul' ); ?>">
			<?php
			$item_count = sprintf(
				_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'edukul' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="cart-icon core-icon-shopping-cart2"><span class="shopping-cart-items-count"><?php echo esc_html( $item_count ); ?></span></span>
		</a>		

		<?php $fragments['a.nav-cart-trigger'] = ob_get_clean();

		return $fragments;
	}
}

// Output the script placeholder for cart updater
add_action( 'wp_footer', 'edukul_cart_fragments_placeholder', 100 );
function edukul_cart_fragments_placeholder() {
	echo '<script id="shopping-cart-items-updater" type="text/javascript"></script>';
}

// Display products per page
add_filter( 'loop_shop_per_page', 'edukul_products_per_page', 20 );
function edukul_products_per_page() {
	if ( ! $items = edukul_get_mod('shop_products_per_page') ) {
		return 6;
	} else {
		return $items;
	}
}

// Change columns in product loop
add_filter( 'loop_shop_columns', 'edukul_shop_loop_columns', 20 );
function edukul_shop_loop_columns() {

	if ( ! $cols = edukul_get_mod('shop_columns') ) {
		return 3;
	} else {
		if ( $cols == '2' ) return 2;
		if ( $cols == '3' ) return 3;
		if ( $cols == '4' ) return 4;
	}
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Change number of related output
add_filter( 'woocommerce_output_related_products_args', 'edukul_related_products' );
function edukul_related_products() {
	$args = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);
	return $args;
}

// Change number of upsells output
add_filter( 'woocommerce_upsell_display_args', 'wc_change_number_related_products', 20 );
function wc_change_number_related_products( $args ) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	return $args;
}

// Change product thumbnails columns to 5
add_filter('woocommerce_product_thumbnails_columns','edukul_custom_storefront_gallery' );
function edukul_custom_storefront_gallery( $column ) {
	$column  = 6;
	return $column ;
}

// Add category to product item
function edukul_product_cat(){
    $cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
    if ( $cats && ! is_wp_error ( $cats ) ){
        $cat = array_shift( $cats ); ?>

        <div class="product-cat"><?php echo esc_html( $cat->name ); ?></div>
<?php }
}
add_action( 'woocommerce_shop_loop_item_title', 'edukul_product_cat', 11 );
