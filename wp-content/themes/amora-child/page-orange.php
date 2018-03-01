<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package amora
 */

get_header(); ?>

	<?php
		if(!is_user_logged_in() && $_SERVER['REQUEST_URI'] == "/le-coin-des-parents/") {
		
			$adresse = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/connexion/";
			wp_redirect( $adresse, 302 );
		}?>
	<div id="primary-mono" class="content-area <?php do_action('amora_primary-width') ?> page">
		<main id="main" class="site-main" role="main">
			
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'modules/content/content', 'page' ); ?>

			
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
