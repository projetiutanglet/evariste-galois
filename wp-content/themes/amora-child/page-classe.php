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
			<?php $adresse = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/"; ?>
			<div class="retour-arriere">
				<a href=<?php echo $adresse."/le-coin-des-parents/" ; ?>> < Retour à la page coin des parents</a>
			</div>

			<!-- Le titre -->
			<h2>
			<?php $current = explode('/',$_SERVER['REQUEST_URI']) ;
			if ($current[sizeof($current)-2] == "orange") {?>
				<img src=<?php echo $adresse."wp-content/uploads/2018/02/porte-orange-275x300.png";?>  alt=""  style="height:65px" />
			<?php
			}
			if ($current[sizeof($current)-2] == "vert-deau") {?>
				<img src=<?php echo $adresse."wp-content/uploads/2018/03/porte-vert-deau-292x300.png" ;?> alt="" style="height:65px" />
			<?php
			}
			if ($current[sizeof($current)-2] == "verte") {?>
				<img src=<?php echo $adresse."wp-content/uploads/2018/03/porte-verte-254x300.png" ;?>  alt="" style="height:65px" />
			<?php
			}
			if ($current[sizeof($current)-2] == "bleue") {?>
				<img src=<?php echo $adresse."wp-content/uploads/2018/03/porte-bleue-229x300.png" ;?>  alt="" style="height:65px" />
			<?php
			}
			if ($current[sizeof($current)-2] == "jaune") {?>
				<img src=<?php echo $adresse."wp-content/uploads/2018/03/porte-jaune-229x300.png" ;?>  alt="" style="height:65px" />
			<?php
			}
			?>
			
				<?php echo get_the_title();?>
			</h2>

			<?php get_calendar_activity() ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
