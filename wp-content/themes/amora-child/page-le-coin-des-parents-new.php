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
			
			<!-- Les portes -->
			<div id="pg-17-1"  class="panel-grid panel-no-style" >
				<div id="pgc-17-1-0"  class="panel-grid-cell" >
					<div id="panel-17-1-0-0" class="so-panel widget widget_media_image panel-first-child panel-last-child" data-index="1" >
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/orange/">
						<img width="275" height="300" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/02/porte-orange-275x300.png" class="image wp-image-307  attachment-medium size-medium" alt="" style="max-width: 100%; height: auto;" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/02/porte-orange-275x300.png 275w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/02/porte-orange.png 627w" sizes="(max-width: 275px) 100vw, 275px" /></a>
					</div>
				</div>
				<div id="pgc-17-1-1"  class="panel-grid-cell" >
					<div id="panel-17-1-1-0" class="so-panel widget widget_media_image panel-first-child panel-last-child" data-index="2" >
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/vert-deau/">
							<img width="292" height="300" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-vert-deau-292x300.png" class="image wp-image-462  attachment-medium size-medium" alt="" style="max-width: 100%; height: auto;" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-vert-deau-292x300.png 292w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-vert-deau.png 683w" sizes="(max-width: 292px) 100vw, 292px" /></a>
					</div>
				</div>
				<div id="pgc-17-1-2"  class="panel-grid-cell" >
					<div id="panel-17-1-2-0" class="so-panel widget widget_media_image panel-first-child panel-last-child" data-index="3" >
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/verte/">
							<img width="254" height="300" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-verte-254x300.png" class="image wp-image-460  attachment-medium size-medium" alt="" style="max-width: 100%; height: auto;" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-verte-254x300.png 254w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-verte.png 585w" sizes="(max-width: 254px) 100vw, 254px" /></a>
					</div>
				</div>
				<div id="pgc-17-1-3"  class="panel-grid-cell" >
					<div id="panel-17-1-3-0" class="so-panel widget widget_media_image panel-first-child panel-last-child" data-index="4" >
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/bleue/">
							<img width="229" height="300" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-bleue-229x300.png" class="image wp-image-459  attachment-medium size-medium" alt="" style="max-width: 100%; height: auto;" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-bleue-229x300.png 229w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-bleue.png 529w" sizes="(max-width: 229px) 100vw, 229px" /></a>
					</div>
				</div>
				<div id="pgc-17-1-4"  class="panel-grid-cell" >
					<div id="panel-17-1-4-0" class="so-panel widget widget_media_image panel-first-child panel-last-child" data-index="5" >
						<a href="https://projet-evariste-galois-lbarbe.c9users.io/le-coin-des-parents/jaune/">
							<img width="229" height="300" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-jaune-229x300.png" class="image wp-image-461  attachment-medium size-medium" alt="" style="max-width: 100%; height: auto;" srcset="https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-jaune-229x300.png 229w, https://projet-evariste-galois-lbarbe.c9users.io/wp-content/uploads/2018/03/porte-jaune.png 521w" sizes="(max-width: 229px) 100vw, 229px" /></a>
					</div>
				</div>
			</div>
			<!-- Le calendrier -->
			
			<!-- L'activité -->

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
