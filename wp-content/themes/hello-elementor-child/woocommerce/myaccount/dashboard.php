<?php
/**
 * My Account Dashboard - Custom styled with cards
 *
 * Override of WooCommerce template.
 *
 * @package HelloElementorChild
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="lw-dashboard-welcome">
	<h2><?php printf( 'Xin chào, %s! 👋', '<strong>' . esc_html( $current_user->display_name ) . '</strong>' ); ?></h2>
	<p class="lw-dashboard-subtitle">
		<?php
		printf(
			wp_kses(
				'Không phải %1$s? <a href="%2$s">Đăng xuất</a>',
				$allowed_html
			),
			'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
			esc_url( wc_logout_url() )
		);
		?>
	</p>
</div>

<div class="lw-dashboard-cards">
	<a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="lw-dashboard-card">
		<span class="card-icon">📦</span>
		<span class="card-title">Đơn hàng</span>
		<span class="card-desc">Xem đơn hàng của bạn</span>
	</a>

	<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>" class="lw-dashboard-card">
		<span class="card-icon">📍</span>
		<span class="card-title">Địa chỉ</span>
		<span class="card-desc">Quản lý địa chỉ</span>
	</a>

	<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>" class="lw-dashboard-card">
		<span class="card-icon">👤</span>
		<span class="card-title">Tài khoản</span>
		<span class="card-desc">Thông tin cá nhân</span>
	</a>

	<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="lw-dashboard-card">
		<span class="card-icon">🛍️</span>
		<span class="card-title">Cửa hàng</span>
		<span class="card-desc">Khám phá sản phẩm</span>
	</a>
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );
