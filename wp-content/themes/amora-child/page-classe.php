<?php
/*
 Template name: Classe
 */

get_header(); ?>
<div id="primary-mono" class="content-area <?php do_action('amora_primary-width') ?> page">
		<main id="main" class="site-main" role="main">
				<!-- Slider -->
			<?php wd_slider(1); ?>
				<!--Fil d'ariane -->
			 <?php page_breadcrumb(); ?>

			<div class="retour-arriere">
				<a href="javascript:history.go(-1)"> < Retour à la page Coin des parents</a>
			</div>
				<!-- Le titre -->
			<h2>
				<?php echo get_the_title();?>
			</h2>

			<?php get_calendar_activity() ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
