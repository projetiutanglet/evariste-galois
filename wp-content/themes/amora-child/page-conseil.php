<?php
/*
 Template name: Conseil
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

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'modules/content/content', 'page' ); ?>

				<?php
                if( is_front_page() && !get_theme_mod('amora_disable_comments')) :

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
            endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>