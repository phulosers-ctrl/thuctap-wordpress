<?php
/**
 * My Account navigation - Custom styled
 *
 * Override of WooCommerce template.
 *
 * @package HelloElementorChild
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation" aria-label="<?php esc_html_e( 'Trang tài khoản', 'hello-elementor-child' ); ?>">
	<div class="lw-account-nav-header">
		<div class="lw-account-avatar">
			<?php echo get_avatar( get_current_user_id(), 60 ); ?>
		</div>
		<div class="lw-account-info">
			<span class="lw-account-name"><?php echo esc_html( wp_get_current_user()->display_name ); ?></span>
			<span class="lw-account-email"><?php echo esc_html( wp_get_current_user()->user_email ); ?></span>
		</div>
	</div>
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>>
					<?php echo esc_html( $label ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
