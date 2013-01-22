<?php
/* 
* row 2 mit Profil, Social-Media 2-Click, Web-Story sowie Kunden-, Compliance- und Technik-Blog
*/
?>

<div id="row2" class="clearfix">	
	<div class="tile h2 profil">
		<?php query_posts('p=146'); if(have_posts()) : the_post(); ?>
		<div class="profil-active active red tile">
			<div class="close-button"></div>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		<div class="tile-content red clickable">
			<div class="badge">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<?php endif; ?>
	</div>

	<div class="tile">
		<div id="socialshareprivacy" class="social">
			<?php if(function_exists('get_twoclick_buttons')) {get_twoclick_buttons(get_the_ID());}?>
		</div>
	</div>

	<div class="tile v2">
		<div class="tile-content darkpurple bloglist">
			<?php query_posts('category_name=compliance&showposts=4'); ?>
			<?php while (have_posts()) : the_post(); ?>
				<ul>
					<li><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				</ul>
			<?php endwhile; ?>
			<a href="<?php bloginfo('wpurl'); ?>/category/compliance" title="Alle Blogposts zu Compliance">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/security.png" alt="Security-Icon" />
			</a>
			<a href="<?php bloginfo('wpurl'); ?>/category/compliance" class="banner" title="Alle Blogposts zu Compliance">
				Blogposts Compliance
			</a>
		</div>
	</div>

	<div class="tile h2 v2">
		<div class="tile-content red customers">
			<div class="slideshow">
				<div class="nav">
					<p id="kunden-prev" class="prev"></p>
					<p id="kunden-next" class="next"></p>
				</div>
				<div id="kunden-slider" class="slides">
				<?php query_posts('category_name=projekte&showposts=4'); ?>
				<?php while (have_posts()) : the_post(); ?>
				<?php global $more; $more = 0; ?>
					<div class="slide">
						<div>
							<h1><?php the_title(); ?></h1>
							<img src="<?php echo get_first_image() ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="kundenslider-content">
							<?php the_content('Weiterlesen...'); ?>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="tile webstory">
	<?php query_posts('p=264'); if(have_posts()) : the_post(); ?>
		<div class="ffhp-active active amber tile">
			<div class="close-button"></div>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		<div class="tile-content amber clickable">
			<div class="badge">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Video128.png" alt="Video-Icon" />
				<span class="banner"><?php the_title(); ?></span>
			</div>	
		</div>
	<?php endif; ?>
	</div>

	<div class="tile h2">
		<div class="tile-content green bloglist">
			<?php query_posts('category_name=technik&showposts=3'); ?>
			<?php while (have_posts()) : the_post(); ?>
				<ul>
					<li><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				</ul>
			<?php endwhile; ?>
			<a href="<?php bloginfo('wpurl'); ?>/category/technik" title="Alle Blogposts zu Technik">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Lightbulp128.png" alt="Technik-Icon" />
			</a>
			<a href="<?php bloginfo('wpurl'); ?>/category/technik" class="banner technik-banner alignright" title="Alle Blogposts zu Technik">
				Blogposts Technik
			</a>
		</div>
	</div>	
</div>