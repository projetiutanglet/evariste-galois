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
			
			<!-- Slider -->
			<?php wd_slider(1); ?>
			<!-- Le titre -->
			<h3>
				Le coin des parents
			</h3>
			<!-- Les portes -->
			<div id="zone-des-portes"  class="grille-ligne" >
				<div id="div-orange"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/orange/">
						<img src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/02/porte-orange-275x300.png"  alt=""  srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/02/porte-orange-275x300.png 210w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/02/porte-orange.png 627w" sizes="(max-width: 275px) 100vw, 275px" /></a>
					</div>
					<div class="text-porte">
						Classe orange
					</div>
				</div>
				<div id="div-vert-deau"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/vert-deau/">
							<img src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-vert-deau-292x300.png"  alt="" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-vert-deau-292x300.png 292w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-vert-deau.png 683w" sizes="(max-width: 292px) 100vw, 292px" /></a>
					</div>
					<div class="text-porte">
						Classe vert d'eau
					</div>
				</div>
				<div id="div-verte"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/verte/">
							<img src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-verte-254x300.png"  alt="" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-verte-254x300.png 254w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-verte.png 585w" sizes="(max-width: 254px) 100vw, 254px" /></a>
					</div>
					<div class="text-porte">
						Classe verte
					</div>
				</div>
				<div id="div-bleue"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/bleue/">
							<img src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-bleue-229x300.png"  alt="" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-bleue-229x300.png 229w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-bleue.png 529w" sizes="(max-width: 229px) 100vw, 229px" /></a>
					</div>
					<div class="text-porte">
						Classe bleue
					</div>
				</div>
				<div id="div-jaune"  class="grille-ligne-item" >
					<div class="porte hvr-float-shadow">
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/jaune/">
							<img src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-jaune-229x300.png"  alt="" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-jaune-229x300.png 229w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-jaune.png 521w" sizes="(max-width: 229px) 100vw, 229px" /></a>
					</div>
					<div class="text-porte">
						Classe jaune
					</div>
				</div>
			</div>
			<div class="grille-ligne">
				<!-- Le calendrier -->
				<div id="div-calendrier" class="grille-ligne-item">
					<h4>Calendrier d'activité</h4>
					<?php get_calendar(); ?>

				</div>
				<!-- L'activité -->
				<div id="div-activite" class="grille-ligne-item">
					<?php
			        // Récupération du dernier article de la catégorie coin des parents
			        $the_query = new WP_Query(array(
			            'category_name' => 'Coin des parents',
			            'post_status' => 'publish',
			            'posts_per_page' => 1,
			        ));
			        ?>
			
			        <?php if ($the_query->have_posts()) : ?>
			            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			               <h4><?php the_title(); ?></h4>
			               <?php the_content(); ?>
			            <?php endwhile; ?>
			            <?php wp_reset_postdata(); ?>
			        <?php endif; ?>
				</div>
					
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
