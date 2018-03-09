<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style', 'amora-main-theme-style' ) );
}


/********************** titre sans le mot "privé" (pour les pages privées) **************************/
add_filter('private_title_format', 'removePrivatePrefix');
add_filter('protected_title_format', 'removePrivatePrefix');

function removePrivatePrefix($format)
{
    return '%s';
}


/************************ calendrier et actualité ***********************************/
function get_calendar_activity(){
    echo '<div class="grille-ligne">';
        echo '<!-- Le calendrier -->
                <div id="calendrier';

			if (strpos($_SERVER['REQUEST_URI'], '/le-coin-des-parents/') !== false) {
				$cat = 13;
				if (strpos($_SERVER['REQUEST_URI'], '/orange/') !== false) {
					$cat = 14;
					echo '-orange';
				}
				if (strpos($_SERVER['REQUEST_URI'], '/vert-deau/') !== false) {
					$cat = 15;
					echo '-vert-deau';
				}
				if (strpos($_SERVER['REQUEST_URI'], '/verte/') !== false) {
					$cat = 16;
					echo '-verte';
				}
				if (strpos($_SERVER['REQUEST_URI'], '/bleue/') !== false) {
					$cat = 17;
					echo '-bleue';
				}
				if (strpos($_SERVER['REQUEST_URI'], '/jaune/') !== false) {
					$cat = 18;
					echo '-jaune';
				}
			}else{
				$cat = 12;
			}

		echo '" class="div-calendrier grille-ligne-item">
		        <h3>Calendrier d\'activités</h3>';
		calcat_get_calendar(true,true,$cat);

		if (strpos(get_the_title(), 'Classe') !== false) {
			$classe = explode('/',$_SERVER['REQUEST_URI']);
			$adresse = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$classe[1]/$classe[2]/galerie-$classe[2]/";
			echo '<a href="'.$adresse.'"><button type="button" class="bouton-galerie">Accès à la galerie photo</button> </a>';
		}

		echo '</div>
		<!-- L\'activité -->
		<div id="div-activite" class="grille-ligne-item">';

	        // Récupération du dernier article de la catégorie coin des parents
	        $the_query = new WP_Query(array(
	            'cat' => $cat,
	            'post_status' => 'publish',
	            'posts_per_page' => 1,
	            'year' => $_GET['Y'],
	            'monthnum' => $_GET['M'],
	            'day' => $_GET['D']
	        ));

	        if ($the_query->have_posts()) :
	             while ($the_query->have_posts()) : $the_query->the_post();
	              echo '<h3>';
	               the_title();
	               echo '</h3>';
	                the_content();
	             endwhile;
	             wp_reset_postdata();
	         endif;
		echo '</div>
	</div>';
}

