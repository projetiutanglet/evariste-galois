<header id="masthead" class="site-header" role="banner">
    <div class="container">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <div class="amora-logo">
                <div id="site-logo">
                    <?php the_custom_logo(); ?>
                </div>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span style="color: #13dc21;">É</span><span style="color: #f37a20;">v</span><span style="color: #2ba2d6;">a</span><span style="color: #65c08f;">r</span><span style="color: #ded82c;">i</span><span style="color: #13dc21;">s</span><span style="color: #f37a20;">t</span><span style="color: #2ba2d6;">e</span> <span style="color: #65c08f;">G</span><span style="color: #ded82c;">a</span><span style="color: #13dc21;">l</span><span style="color: #f37a20;">o</span><span style="color: #2ba2d6;">i</span><span style="color: #65c08f;">s</span></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>
    </div>
    <?php get_template_part('modules/navigation/menu','primary'); ?>
</header><!-- #masthead -->