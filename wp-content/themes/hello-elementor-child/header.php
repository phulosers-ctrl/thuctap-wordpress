<?php
/**
 * Custom Header Template - LUXE WEAR
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<meta name="description" content="LUXE WEAR - Thời trang cao cấp, phong cách hiện đại">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- Skip to content -->
<a class="skip-link screen-reader-text" href="#content">Bỏ qua nội dung</a>

<!-- LUXE WEAR Header -->
<header id="luxe-header" class="luxe-header">
	<div class="luxe-header-inner">
		<!-- Logo -->
		<div class="luxe-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="luxe-logo-link" aria-label="Trang chủ LUXE WEAR">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<span class="luxe-logo-text">LUXE<span class="luxe-logo-accent">WEAR</span></span>
				<?php endif; ?>
			</a>
		</div>

		<!-- Primary Navigation -->
		<nav id="luxe-nav" class="luxe-nav" aria-label="Menu chính">
			<?php
			if ( has_nav_menu( 'luxe-primary' ) ) {
				wp_nav_menu([
					'theme_location' => 'luxe-primary',
					'menu_class'     => 'luxe-nav-list',
					'container'      => false,
					'depth'          => 2,
					'fallback_cb'    => false,
				]);
			} else {
				// Default menu if no menu is assigned
				?>
				<ul class="luxe-nav-list">
					<li class="menu-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a></li>
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<li class="menu-item"><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Cửa hàng</a></li>
					<?php endif; ?>
					<li class="menu-item"><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">Giới thiệu</a></li>
					<li class="menu-item"><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Liên hệ</a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<!-- Utility Icons -->
		<div class="luxe-header-actions">
			<!-- Search Toggle -->
			<button id="luxe-search-toggle" class="luxe-icon-btn" aria-label="Tìm kiếm" title="Tìm kiếm">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<circle cx="11" cy="11" r="8"></circle>
					<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
				</svg>
			</button>

			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
			<!-- Account Dropdown -->
			<div class="luxe-account-dropdown">
				<button id="luxe-account-toggle" class="luxe-icon-btn" aria-label="Tài khoản" title="Tài khoản">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
						<circle cx="12" cy="7" r="4"></circle>
					</svg>
				</button>
				<div class="luxe-dropdown-menu" id="luxe-account-menu">
					<?php if ( is_user_logged_in() ) : ?>
						<div class="luxe-dropdown-header">
							<span class="luxe-user-greeting">Xin chào, <?php echo esc_html( wp_get_current_user()->display_name ); ?></span>
						</div>
						<ul class="luxe-dropdown-list">
							<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard' ) ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
								Bảng điều khiển
							</a></li>
							<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
								Đơn hàng
							</a></li>
							<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
								Địa chỉ
							</a></li>
							<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-account' ) ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
								Thông tin tài khoản
							</a></li>
							<li class="luxe-dropdown-divider"></li>
							<li><a href="<?php echo esc_url( wc_logout_url() ); ?>" class="luxe-logout-link">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								Đăng xuất
							</a></li>
						</ul>
					<?php else : ?>
						<div class="luxe-dropdown-header">
							<span class="luxe-user-greeting">Chào mừng bạn!</span>
						</div>
						<ul class="luxe-dropdown-list">
							<li><a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
								Đăng nhập
							</a></li>
							<li><a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
								Đăng ký
							</a></li>
						</ul>
					<?php endif; ?>
				</div>
			</div>

			<!-- Cart -->
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="luxe-icon-btn luxe-cart-btn" id="luxe-cart-toggle" aria-label="Giỏ hàng" title="Giỏ hàng">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
					<line x1="3" y1="6" x2="21" y2="6"></line>
					<path d="M16 10a4 4 0 0 1-8 0"></path>
				</svg>
				<span class="luxe-cart-count"><?php echo class_exists( 'WooCommerce' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : '0'; ?></span>
			</a>
			<?php endif; ?>

			<!-- Mobile Menu Toggle -->
			<button id="luxe-mobile-toggle" class="luxe-icon-btn luxe-mobile-toggle" aria-label="Menu" title="Menu">
				<span class="luxe-hamburger">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>
		</div>
	</div>

	<!-- Search Overlay -->
	<div id="luxe-search-overlay" class="luxe-search-overlay">
		<div class="luxe-search-overlay-inner">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="luxe-search-form">
				<input type="search" name="s" placeholder="Tìm kiếm sản phẩm..." class="luxe-search-input" autocomplete="off">
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<input type="hidden" name="post_type" value="product">
				<?php endif; ?>
				<button type="submit" class="luxe-search-submit" aria-label="Tìm kiếm">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<circle cx="11" cy="11" r="8"></circle>
						<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
					</svg>
				</button>
			</form>
			<button id="luxe-search-close" class="luxe-search-close" aria-label="Đóng tìm kiếm">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<line x1="18" y1="6" x2="6" y2="18"></line>
					<line x1="6" y1="6" x2="18" y2="18"></line>
				</svg>
			</button>
		</div>
	</div>
</header>

<!-- Mobile Menu Overlay -->
<div id="luxe-mobile-menu" class="luxe-mobile-menu">
	<div class="luxe-mobile-menu-inner">
		<div class="luxe-mobile-menu-header">
			<span class="luxe-logo-text">LUXE<span class="luxe-logo-accent">WEAR</span></span>
			<button id="luxe-mobile-close" class="luxe-mobile-close" aria-label="Đóng menu">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<line x1="18" y1="6" x2="6" y2="18"></line>
					<line x1="6" y1="6" x2="18" y2="18"></line>
				</svg>
			</button>
		</div>
		<nav class="luxe-mobile-nav">
			<?php
			if ( has_nav_menu( 'luxe-primary' ) ) {
				wp_nav_menu([
					'theme_location' => 'luxe-primary',
					'menu_class'     => 'luxe-mobile-nav-list',
					'container'      => false,
					'depth'          => 2,
				]);
			} else {
				?>
				<ul class="luxe-mobile-nav-list">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a></li>
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Cửa hàng</a></li>
					<?php endif; ?>
					<li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">Giới thiệu</a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Liên hệ</a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<?php if ( class_exists( 'WooCommerce' ) ) : ?>
		<div class="luxe-mobile-account">
			<h4>Tài khoản</h4>
			<ul class="luxe-mobile-account-list">
				<?php if ( is_user_logged_in() ) : ?>
					<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard' ) ); ?>">Bảng điều khiển</a></li>
					<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>">Đơn hàng</a></li>
					<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>">Địa chỉ</a></li>
					<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-account' ) ); ?>">Thông tin tài khoản</a></li>
					<li><a href="<?php echo esc_url( wc_logout_url() ); ?>">Đăng xuất</a></li>
				<?php else : ?>
					<li><a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">Đăng nhập / Đăng ký</a></li>
				<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>

<div id="content" class="site-content">
