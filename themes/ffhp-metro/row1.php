<?php
/* 
* row 1 mit Bild-Slider, Video-Blog, Angebot und RSS-Feed von Heise 
*/
?>
<div id="row1" class="clearfix">
	<div class="tile">
		<div class="tile-content white">
			<div class="slideshow">
				<div class="nav">
					<p id="logo-prev" class="prev"></p>
					<p id="logo-next" class="next"></p>
				</div>
				<div id="logo-slider" class="slides">
				<?php query_posts('category_name=logos&showposts=5'); ?><?php while (have_posts()) : the_post(); ?>
					<div class="slide">
						<img src="<?php echo get_first_image() ?>" alt="<?php the_title(); ?>">
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="tile video">
	<?php query_posts('category_name=videos&showposts=1'); ?><?php while (have_posts()) : the_post(); ?>
		<div class="video-active active black tile">
			<div class="close-button"></div>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		<div class="tile-content black clickable">
			<div class="badge">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/YouTube128.png" alt="YouTube-Logo" />
			</div>	
			<div class="banner">
				<?php the_title(); ?>
			</div>
		</div>
	<?php endwhile; ?>
	</div>

	<div class="tile angebot">
	<?php query_posts('p=17'); if(have_posts()) : the_post(); ?>
		<div class="angebot-active active orange tile">	
			<div class="close-button"></div>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		
		<div class="tile-content orange clickable">
			<div class="badge">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	<?php endif; ?>
	</div>

	<div class="tile analyse">
	<?php query_posts('p=19'); if(have_posts()) : the_post(); ?>
		<div class="analyse-active active orange tile">
			<div class="close-button"></div>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?> 
		</div>
		
		<div class="tile-content orange clickable">		
			<div class="badge">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	<?php endif; ?>
	</div>
	
	<div class="tile hpnonstop">
	<?php query_posts('p=23'); if(have_posts()) : the_post(); ?>
		<div class="hpnonstop-active active orange tile">
			<div class="close-button"></div>			
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?> 
		</div>
		
		<div class="tile-content orange clickable">
			<div class="badge">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	<?php endif; ?>
	</div>

	<div class="tile compliance">
	<?php query_posts('p=21'); if(have_posts()) : the_post(); ?>
		<div class="compliance-active active orange tile">
			<div class="close-button"></div>		
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		
		<div class="tile-content orange clickable">
			<div class="badge">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	<?php endif; ?>
	</div>

	<div class="tile h2 rss">
		<div class="tile-content skyblue slideshow">
			<div class="nav">
				<p id="rss-prev" class="prev"></p>
				<p id="rss-next" class="next"></p>
			</div>
			<h1>IT-News von heise-Security</h1>
			<div id="rss-slider" class="slides">
				<?php echo do_shortcode('[rss feed="http://www.heise.de/security/news/news-atom.xml" num="5" excerpt="true" target="_blank"]'); ?>
			</div>
		</div>
	</div>
</div>