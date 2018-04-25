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

	<div id="primary-mono" class="content-area <?php do_action('amora_primary-width') ?> page">
		<main id="main" class="site-main" role="main">

			<!-- Slider -->
			<?php wd_slider(1); ?>
			<!--Fil d'ariane -->
			 <?php page_breadcrumb(); ?>
			<!-- Le titre -->
			<h2>
				<?php	echo get_the_title();?>
			</h2>
			
			<?php echo get_menu_conseil();?>
			
			<?php echo get_conseil_recent();?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
