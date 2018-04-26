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
	               echo '<div id="posteLe">Posté le '.get_the_date("l j F Y")." : ".'</div>';
	                the_content();
	             endwhile;
	             wp_reset_postdata();
	         endif;
		echo '</div>
	</div>';
}


// Ajout d'un role Parent
function egalois_add_role() {
    add_role( 'parent', 'Parent',			 // son identifiant et son nom visible
             array(
                  'read',
                  'read_private_pages'		 // On liste les droits à donner

                  )	    );
                  
}

add_action( 'init', 'egalois_add_role' );	// On lance la création de notre fonction


//si l'utilisateur veut s'enregistrer, il est redirigé
function tml_action_url( $url, $action, $instance ) {
	if ( 'register' == $action )
		$url =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER["HTTP_HOST"]."/connexion/";
	return $url;
}
add_filter( 'tml_action_url', 'tml_action_url', 10, 3 );


/******************** Redirection *************************/
//Rediriger les utilisateurs après une connexion réussi.
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles )||in_array( 'enseignant', $user->roles ) ) {
				return $redirect_to;
		}else{

			$url =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER["HTTP_HOST"]."/le-coin-des-parents/";
			return $url;
		}
	} else {
		return $redirect_to;
	}
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


/******************** fil d'ariane *************************/
function page_breadcrumb(){
  global $post;

  echo "<div class='fil_d_ariane'>";

   // Navigation
	 if (is_page() && !is_front_page() || is_single() || is_category()) {

	 echo ' <a title="Accueil" rel="nofollow" href="'.get_option('siteurl').'">Accueil</a> - ';

	 if (is_page()) {
	 $ancestors = get_post_ancestors($post);

		if ($ancestors) {
    		$ancestors = array_reverse($ancestors);
        	foreach ($ancestors as $crumb) {
        	   echo ' <a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a> - ';
        	}
    	}
	 }

	 // Page actuelle
	 if (is_page() || is_single()) {
	 echo get_the_title();
	 }

	 } elseif (is_front_page()) {
	 // Page d'accueil

	 echo '<a title="Accueil" rel="nofollow" href="'.get_option('siteurl').'">Accueil</a>';

	 }
 echo "</div>";
}


/******************* Calendrier *************************/

function get_my_day_link($daylink,$year, $month, $day) {

	if ( !$year )
        $year = gmdate('Y', current_time('timestamp'));
    if ( !$month )
        $month = gmdate('m', current_time('timestamp'));
    if ( !$day )
        $day = gmdate('j', current_time('timestamp'));

    $daylink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER["HTTP_HOST"];
    $daylink .= esc_url( add_query_arg( array('Y' => $year, 'M' =>$month, 'D' => $day) ) );
	return $daylink;
}

add_filter( 'day_link', 'get_my_day_link', 1, 4 ); // Where $priority is 1, $accepted_args is 3.


function get_my_month_link($monthlink,$year, $month) {

	if ( !$year )
        $year = gmdate('Y', current_time('timestamp'));
    if ( !$month )
        $month = gmdate('m', current_time('timestamp'));

    $monthlink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER["HTTP_HOST"];

    $monthlink .=  add_query_arg( array('Y' => $year, 'M' =>$month) );
	$monthlink = add_query_arg( 'D', false, $monthlink );
	return $monthlink;

}

add_filter( 'month_link', 'get_my_month_link', 1, 3 ); // Where $priority is 1, $accepted_args is 3.

function get_menu_conseil(){
	
	$id = get_page_by_title( "Conseils d'école" )->ID;
	$args = array(
		'sort_order' => 'asc',
		'sort_column' => 'ID',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => $id,	//ID de la page conseils d'école
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args); 
	
	$menu = '<div id="listeBoutonConseil">';
	
	$numconseil = substr(get_the_title(), -1);
	if ($numconseil >=1 && $numconseil <=3) {
		$actuel = $numconseil;
	}
	
	$i = 0;
	foreach($pages as $page){
		$idConseil = $page->ID;
		$i++;
		$menu.='<div class="boutonConseil">
				<a href="'.get_page_link($idConseil).'" ';
		if ($i == $actuel){
			$menu .= 'id="conseilActuel"';
		}

		$menu.='>
				<span>	Conseil d\'école n°'.$i.'</span></a></div>';
	}
	$menu.='</div>';
	return $menu;
}

function get_conseil_recent(){
	
			$args = array(

				'sort_order' => 'desc',

				'sort_column' => 'post_modified',
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'meta_key' => '',
				'meta_value' => '',
				'authors' => '',
				'child_of' => get_the_ID(),
				'parent' => -1,
				'exclude_tree' => '',
				'number' => '',
				'offset' => 0,
				'post_type' => 'page',

				'post_status' => 'publish'
			); 
			$pages = get_pages($args); 
			return $pages[0]->post_content;

}

//////// CSS Administration //////////////


function admin_style() {
wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


function my_custom_js() {
    echo '<script type="text/javascript" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-includes/js/jquery/jquery.js"></script>';
    echo '<script type="text/javascript" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-includes/js/jquery/jquery.cookie.js"></script>';
    echo '<script type="text/javascript" src="https://projet-evariste-galois-lbarbe.c9users.io/wp-includes/js/jquery/jquery.rememberscroll.js"></script>';
}
// Add hook for front-end <head></head>
add_action('wp_head', 'my_custom_js');

