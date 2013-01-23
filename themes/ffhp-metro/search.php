<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package ffhp-metro
 * @since _s 1.0
 */

get_header(); ?>


<div id="row-s">	<!-- rowS -->
	<?php get_sidebar(); ?>
</div>	<!-- rowS -->

<div id="row-b">	<!-- rowB -->
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Suchergebnisse für: %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php _s_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php _s_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

	</div><!-- #content .site-content -->
</div> <!-- rowB -->
	<?php get_template_part( 'row3' ); ?>

<?php get_footer(); ?>