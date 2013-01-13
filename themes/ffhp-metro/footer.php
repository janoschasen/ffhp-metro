<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _s
 * @since _s 1.0
 */
?>

	<div id="footer-tiles">
		<div class="impress-active active teal tile">
			<div class="close-button"></div>
				<?php query_posts('p=8'); if(have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php endif; ?>
			</div>

			<div class="datenschutz-active active teal tile">
				<div class="close-button"></div>
				<?php query_posts('p=63'); if(have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div> 

<footer id="footer" class="site-footer" role="contentinfo">
	<div class="footer-main site-info">
		<?php query_posts('p=8'); if(have_posts()) : the_post(); ?>
		<span class="impress clickable"><?php the_title(); ?></span>
		<?php endif; ?>

		<?php query_posts('p=63'); if(have_posts()) : the_post(); ?>
		<span class="datenschutz clickable"><?php the_title(); ?></span>
		<?php endif; ?>

		<span class="copyright">
			<a href="http://wordpress.org/" rel="nofollow" title="WordPress Homepage" target="_blank">WordPress</a>
			<a href="http://farfromhomepage-dc.com"  title="FarFromHomePage - Digital Consulting" target="_blank">Theme by FarFromHomePage</a>
		</span>
	</div>
</footer>

<div class="error-active">
	<div>
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/error.jpg" alt="<pre>Internet Socket Error</pre>" title="Error-Message" />
		<div class="error-button"><span>ohjemine</span></div>
		<br>
		<div class="error-help">
			<h1>Erschrocken?</h1>
			<h1>Genau das soll Ihnen nicht passieren.</h1>
			<h1 class="error-exit">Weiter zu Peter Haase</h1>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/ffhp-metro.js"></script>

</body>
</html>