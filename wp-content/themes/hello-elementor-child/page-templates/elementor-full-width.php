<?php
/**
 * Template Name: Elementor Full Width (LUXE)
 * Template Post Type: page
 *
 * Full width template with header/footer but no sidebar,
 * content area stretches to full width.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main luxe-full-width-content" role="main">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>

<?php
get_footer();
