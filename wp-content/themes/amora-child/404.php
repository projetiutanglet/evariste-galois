<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package amora
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! Les enfants ont cassé la page !', 'amora' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Il semble que rien n\'a été trouvé à cet endroit. Peut-être essayer une recherche ci-dessous ?', 'amora' ); ?></p>

					<?php WP_Advanced_Search(); ?>



				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>