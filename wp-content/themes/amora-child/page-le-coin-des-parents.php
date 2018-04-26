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
		$adresse = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
		if(!is_user_logged_in() && $_SERVER['REQUEST_URI'] == "/le-coin-des-parents/") {

			$adresse .= "connexion/";
			wp_redirect( $adresse, 302 );
		}?>
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
			<!-- Les portes -->
			<div id="zone-des-portes"  class="grille-ligne" >
				<div id="div-orange"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href= <?php echo $adresse."le-coin-des-parents/orange/";?> >
						<img src=<?php echo get_stylesheet_directory_uri() . '/images/porte-orange-275x300.png'?>  alt="" /></a>
					</div>
					<div class="text-porte">
						Classe orange
					</div>
				</div>
				<div id="div-vert-deau"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href=<?php echo $adresse."le-coin-des-parents/vert-deau/";?> >
							<img src=<?php echo get_stylesheet_directory_uri() . "/images/porte-vert-deau-292x300.png" ;?> alt="" /></a>
					</div>
					<div class="text-porte">
						Classe vert d'eau
					</div>
				</div>
				<div id="div-verte"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href=<?php echo $adresse."le-coin-des-parents/verte/";?> >
							<img src=<?php echo get_stylesheet_directory_uri() . "/images/porte-verte-254x300.png" ;?>  alt="" /></a>
					</div>
					<div class="text-porte">
						Classe verte
					</div>
				</div>
				<div id="div-bleue"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href=<?php echo $adresse."le-coin-des-parents/bleue/";?> >
							<img src=<?php echo get_stylesheet_directory_uri() . "/images/porte-bleue-229x300.png" ;?>  alt=""  /></a>
					</div>
					<div class="text-porte">
						Classe bleue
					</div>
				</div>
				<div id="div-jaune"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href=<?php echo $adresse."le-coin-des-parents/jaune/";?> >
							<img src=<?php echo get_stylesheet_directory_uri() . "/images/porte-jaune-229x300.png" ;?>  alt="" /></a>
					</div>
					<div class="text-porte">
						Classe jaune
					</div>
				</div>
			</div>
			<hr width=100%>
			<!--Le calendrier-->
			<?php get_calendar_activity() ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
