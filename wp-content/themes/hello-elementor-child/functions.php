<?php
/**
 * Hello Elementor Child Theme - LUXE WEAR
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LUXE_CHILD_VERSION', '1.0.0' );
define( 'LUXE_CHILD_PATH', get_stylesheet_directory() );
define( 'LUXE_CHILD_URL', get_stylesheet_directory_uri() );

/**
 * Enqueue parent and child theme styles
 */
function luxe_enqueue_styles() {
	// Google Fonts
	wp_enqueue_style(
		'luxe-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap',
		[],
		LUXE_CHILD_VERSION
	);

	// Parent theme styles
	wp_enqueue_style(
		'hello-elementor-parent',
		get_template_directory_uri() . '/style.css',
		[],
		LUXE_CHILD_VERSION
	);

	// Child theme main style
	wp_enqueue_style(
		'hello-elementor-child',
		get_stylesheet_uri(),
		[ 'hello-elementor-parent' ],
		LUXE_CHILD_VERSION
	);

	// Header & Footer styles
	wp_enqueue_style(
		'luxe-header-footer',
		LUXE_CHILD_URL . '/assets/css/header-footer.css',
		[ 'hello-elementor-child' ],
		LUXE_CHILD_VERSION
	);

	// WooCommerce custom styles
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style(
			'luxe-woocommerce',
			LUXE_CHILD_URL . '/assets/css/woocommerce-custom.css',
			[ 'hello-elementor-child' ],
			LUXE_CHILD_VERSION
		);
	}

	// Custom JavaScript
	wp_enqueue_script(
		'luxe-custom-js',
		LUXE_CHILD_URL . '/assets/js/custom.js',
		[ 'jquery' ],
		LUXE_CHILD_VERSION,
		true
	);

	// Localize script for AJAX
	if ( class_exists( 'WooCommerce' ) ) {
		wp_localize_script( 'luxe-custom-js', 'luxeData', [
			'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
			'nonce'     => wp_create_nonce( 'luxe_nonce' ),
			'cartUrl'   => wc_get_cart_url(),
			'shopUrl'   => wc_get_page_permalink( 'shop' ),
			'myAccount' => wc_get_page_permalink( 'myaccount' ),
		]);
	}
}
add_action( 'wp_enqueue_scripts', 'luxe_enqueue_styles', 20 );

/**
 * Theme setup
 */
function luxe_child_setup() {
	// Register navigation menus
	register_nav_menus([
		'luxe-primary'    => __( 'LUXE Primary Menu', 'hello-elementor-child' ),
		'luxe-account'    => __( 'LUXE Account Menu', 'hello-elementor-child' ),
		'luxe-footer-1'   => __( 'LUXE Footer Column 1', 'hello-elementor-child' ),
		'luxe-footer-2'   => __( 'LUXE Footer Column 2', 'hello-elementor-child' ),
		'luxe-footer-3'   => __( 'LUXE Footer Column 3', 'hello-elementor-child' ),
	]);

	// Add theme support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', [
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	]);

	// Load text domain
	load_child_theme_textdomain( 'hello-elementor-child', LUXE_CHILD_PATH . '/languages' );
}
add_action( 'after_setup_theme', 'luxe_child_setup' );

/**
 * Register widget areas
 */
function luxe_widgets_init() {
	register_sidebar([
		'name'          => __( 'Footer Column 1', 'hello-elementor-child' ),
		'id'            => 'footer-col-1',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	]);

	register_sidebar([
		'name'          => __( 'Footer Column 2', 'hello-elementor-child' ),
		'id'            => 'footer-col-2',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	]);

	register_sidebar([
		'name'          => __( 'Footer Column 3', 'hello-elementor-child' ),
		'id'            => 'footer-col-3',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	]);

	register_sidebar([
		'name'          => __( 'Shop Sidebar', 'hello-elementor-child' ),
		'id'            => 'shop-sidebar',
		'before_widget' => '<div class="shop-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="shop-widget-title">',
		'after_title'   => '</h4>',
	]);
}
add_action( 'widgets_init', 'luxe_widgets_init' );

/**
 * Add custom body classes
 */
function luxe_body_classes( $classes ) {
	$classes[] = 'luxe-wear-theme';

	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_shop() || is_product_category() || is_product_tag() ) {
			$classes[] = 'luxe-shop-page';
		}
		if ( is_product() ) {
			$classes[] = 'luxe-product-page';
		}
		if ( is_cart() ) {
			$classes[] = 'luxe-cart-page';
		}
		if ( is_checkout() ) {
			$classes[] = 'luxe-checkout-page';
		}
		if ( is_account_page() ) {
			$classes[] = 'luxe-account-page';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'luxe_body_classes' );

/**
 * Change number of products per row
 */
function luxe_products_per_row() {
	return 3;
}
add_filter( 'loop_shop_columns', 'luxe_products_per_row' );

/**
 * Change number of products displayed per page
 */
function luxe_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'luxe_products_per_page' );

/**
 * Custom WooCommerce account menu items - Vietnamese labels
 */
function luxe_account_menu_items( $items ) {
	$items = [
		'dashboard'       => 'Bảng điều khiển',
		'orders'          => 'Đơn hàng',
		'edit-address'    => 'Địa chỉ',
		'edit-account'    => 'Thông tin tài khoản',
		'customer-logout' => 'Đăng xuất',
	];
	return $items;
}
add_filter( 'woocommerce_account_menu_items', 'luxe_account_menu_items' );

/**
 * Cart fragments for AJAX cart update
 */
function luxe_cart_count_fragment( $fragments ) {
	ob_start();
	?>
	<span class="luxe-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['.luxe-cart-count'] = ob_get_clean();

	ob_start();
	?>
	<span class="luxe-cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
	<?php
	$fragments['.luxe-cart-total'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'luxe_cart_count_fragment' );

/**
 * Override WooCommerce wrapper
 */
function luxe_woocommerce_wrapper_before() {
	echo '<div id="primary" class="content-area luxe-woo-content"><main id="main" class="site-main">';
}
function luxe_woocommerce_wrapper_after() {
	echo '</main></div>';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'luxe_woocommerce_wrapper_before' );
add_action( 'woocommerce_after_main_content', 'luxe_woocommerce_wrapper_after' );

/**
 * Remove WooCommerce sidebar from shop pages
 */
function luxe_remove_wc_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'init', 'luxe_remove_wc_sidebar' );

/**
 * Custom WooCommerce image sizes
 */
function luxe_woocommerce_image_dimensions() {
	$catalog = [
		'width'  => 400,
		'height' => 500,
		'crop'   => 1,
	];
	$single = [
		'width'  => 600,
		'height' => 750,
		'crop'   => 1,
	];
	$thumbnail = [
		'width'  => 120,
		'height' => 150,
		'crop'   => 1,
	];

	update_option( 'shop_catalog_image_size', $catalog );
	update_option( 'shop_single_image_size', $single );
	update_option( 'shop_thumbnail_image_size', $thumbnail );
}
add_action( 'after_switch_theme', 'luxe_woocommerce_image_dimensions' );

/**
 * Add account menu icons via CSS classes
 */
function luxe_account_menu_item_classes( $classes, $endpoint ) {
	$classes .= ' lw-nav-' . $endpoint;
	return $classes;
}
add_filter( 'woocommerce_account_menu_item_classes', 'luxe_account_menu_item_classes', 10, 2 );

/**
 * Customize WooCommerce breadcrumb
 */
function luxe_wc_breadcrumb_defaults( $defaults ) {
	$defaults['delimiter']   = ' <span class="lw-breadcrumb-sep">›</span> ';
	$defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb lw-breadcrumb">';
	$defaults['wrap_after']  = '</nav>';
	$defaults['home']        = 'Trang chủ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'luxe_wc_breadcrumb_defaults' );

/**
 * Translate WooCommerce strings to Vietnamese
 */
function luxe_wc_translations( $translated_text, $text, $domain ) {
	if ( $domain !== 'woocommerce' ) {
		return $translated_text;
	}

	$translations = [
		'Add to cart'           => 'Thêm vào giỏ',
		'View cart'             => 'Xem giỏ hàng',
		'Description'           => 'Mô tả',
		'Additional information'=> 'Thông tin thêm',
		'Reviews'               => 'Đánh giá',
		'Related products'      => 'Sản phẩm liên quan',
		'Sale!'                 => 'Giảm giá!',
		'Out of stock'          => 'Hết hàng',
		'In stock'              => 'Còn hàng',
		'Search products&hellip;' => 'Tìm sản phẩm&hellip;',
		'Search'                => 'Tìm kiếm',
		'Shop'                  => 'Cửa hàng',
		'Cart'                  => 'Giỏ hàng',
		'Checkout'              => 'Thanh toán',
		'My account'            => 'Tài khoản',
		'My Account'            => 'Tài khoản',
		'Dashboard'             => 'Bảng điều khiển',
		'Orders'                => 'Đơn hàng',
		'Addresses'             => 'Địa chỉ',
		'Account details'       => 'Thông tin tài khoản',
		'Logout'                => 'Đăng xuất',
		'Log out'               => 'Đăng xuất',
		'Username or email address' => 'Tên đăng nhập hoặc email',
		'Password'              => 'Mật khẩu',
		'Remember me'           => 'Ghi nhớ đăng nhập',
		'Log in'                => 'Đăng nhập',
		'Login'                 => 'Đăng nhập',
		'Register'              => 'Đăng ký',
		'Lost your password?'   => 'Quên mật khẩu?',
		'Subtotal'              => 'Tạm tính',
		'Total'                 => 'Tổng cộng',
		'Coupon'                => 'Mã giảm giá',
		'Apply coupon'          => 'Áp dụng',
		'Update cart'           => 'Cập nhật giỏ hàng',
		'Proceed to checkout'   => 'Tiến hành thanh toán',
		'Billing details'       => 'Thông tin thanh toán',
		'Shipping address'      => 'Địa chỉ giao hàng',
		'Place order'           => 'Đặt hàng',
		'Product'               => 'Sản phẩm',
		'Price'                 => 'Giá',
		'Quantity'              => 'Số lượng',
		'Your cart is currently empty.' => 'Giỏ hàng của bạn đang trống.',
		'Return to shop'        => 'Quay lại cửa hàng',
		'No order has been made yet.' => 'Chưa có đơn hàng nào.',
		'Browse products'       => 'Xem sản phẩm',
		'Billing address'       => 'Địa chỉ thanh toán',
		'Shipping address'      => 'Địa chỉ giao hàng',
	];

	if ( isset( $translations[ $text ] ) ) {
		return $translations[ $text ];
	}

	return $translated_text;
}
add_filter( 'gettext', 'luxe_wc_translations', 20, 3 );

/**
 * Change "Add to cart" text on single product page
 */
function luxe_single_add_to_cart_text() {
	return 'Thêm vào giỏ hàng';
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'luxe_single_add_to_cart_text' );

/**
 * Change "Add to cart" text on archive/shop page
 */
function luxe_archive_add_to_cart_text() {
	return 'Thêm vào giỏ';
}
add_filter( 'woocommerce_product_add_to_cart_text', 'luxe_archive_add_to_cart_text' );
