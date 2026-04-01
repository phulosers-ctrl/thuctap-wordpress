<?php
/**
 * Custom Footer Template - LUXE WEAR
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

</div><!-- #content -->

<!-- LUXE WEAR Footer -->
<footer id="luxe-footer" class="luxe-footer">
	<!-- Main Footer -->
	<div class="luxe-footer-main">
		<div class="luxe-footer-container">
			<!-- Column 1: Brand -->
			<div class="luxe-footer-col luxe-footer-brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="luxe-footer-logo">
					<span class="luxe-logo-text">LUXE<span class="luxe-logo-accent">WEAR</span></span>
				</a>
				<p class="luxe-footer-desc">
					Thời trang cao cấp dành cho những người yêu thích phong cách. Chúng tôi mang đến những bộ sưu tập hiện đại, tinh tế và chất lượng.
				</p>
				<div class="luxe-social-links">
					<a href="#" class="luxe-social-link" aria-label="Facebook" title="Facebook">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
					</a>
					<a href="#" class="luxe-social-link" aria-label="Instagram" title="Instagram">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
					</a>
					<a href="#" class="luxe-social-link" aria-label="TikTok" title="TikTok">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.88-2.88 2.89 2.89 0 0 1 2.88-2.88c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.15 15a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.75a8.28 8.28 0 0 0 3.76.92V6.22a4.83 4.83 0 0 1 0 .47z"/></svg>
					</a>
					<a href="#" class="luxe-social-link" aria-label="YouTube" title="YouTube">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
					</a>
				</div>
			</div>

			<!-- Column 2: Quick Links -->
			<div class="luxe-footer-col">
				<h4 class="luxe-footer-title">Liên kết nhanh</h4>
				<ul class="luxe-footer-links">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a></li>
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Cửa hàng</a></li>
					<?php endif; ?>
					<li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">Giới thiệu</a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Liên hệ</a></li>
				</ul>
			</div>

			<!-- Column 3: Customer Service -->
			<div class="luxe-footer-col">
				<h4 class="luxe-footer-title">Dịch vụ khách hàng</h4>
				<ul class="luxe-footer-links">
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<li><a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">Tài khoản</a></li>
						<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>">Đơn hàng</a></li>
						<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>">Địa chỉ</a></li>
						<li><a href="<?php echo esc_url( wc_get_cart_url() ); ?>">Giỏ hàng</a></li>
					<?php endif; ?>
					<li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>">Chính sách bảo mật</a></li>
				</ul>
			</div>

			<!-- Column 4: Newsletter -->
			<div class="luxe-footer-col luxe-footer-newsletter">
				<h4 class="luxe-footer-title">Đăng ký nhận tin</h4>
				<p class="luxe-newsletter-desc">Nhận thông tin về bộ sưu tập mới và ưu đãi đặc biệt.</p>
				<form class="luxe-newsletter-form" action="#" method="post">
					<div class="luxe-newsletter-input-wrap">
						<input type="email" name="newsletter_email" placeholder="Email của bạn" required class="luxe-newsletter-input">
						<button type="submit" class="luxe-newsletter-btn" aria-label="Đăng ký">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<line x1="22" y1="2" x2="11" y2="13"></line>
								<polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
							</svg>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Footer Bottom -->
	<div class="luxe-footer-bottom">
		<div class="luxe-footer-container">
			<p class="luxe-copyright">
				&copy; <?php echo date( 'Y' ); ?> LUXE WEAR. Tất cả quyền được bảo lưu.
			</p>
			<div class="luxe-payment-methods">
				<span class="luxe-payment-label">Thanh toán an toàn</span>
				<div class="luxe-payment-icons">
					<span class="luxe-payment-icon">💳</span>
					<span class="luxe-payment-icon">🏦</span>
					<span class="luxe-payment-icon">📱</span>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
