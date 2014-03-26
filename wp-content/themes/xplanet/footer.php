<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
			</div><!-- #main .wrapper -->
		</div><!-- #page -->
		<div class="bar-reds" style="position:absolute;bottom:0;">
			<div id="rodape" class="site">
				<div class="footer-describe">&reg xplanet. novas ideias. outras possibilidades.</div>
				<div class="footer-describe right">Tel. 55 11 3467 3382</div>
				<footer id="colophon" role="contentinfo" class="menu">
					<?php wp_nav_menu( array('menu' => 'submenu', 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</footer><!-- #colophon -->
				<nav class="main-navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav>
			</div>
		</div>

</div>
<?php wp_footer(); ?>
</body>
</html>