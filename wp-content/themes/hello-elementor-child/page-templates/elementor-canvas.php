<?php
/**
 * Template Name: Elementor Canvas (LUXE)
 * Template Post Type: page
 *
 * Canvas template - no header/footer, perfect for landing pages
 * built entirely with Elementor.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

\Elementor\Plugin::$instance->frontend->add_body_class( 'elementor-template-canvas' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	if ( ! isset( $content_width ) ) {
		$content_width = 800;
	}
	wp_head();
	?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>

	<?php wp_footer(); ?>
</body>
</html>
