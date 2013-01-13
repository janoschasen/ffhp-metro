<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _s
 * @since _s 1.0
 */
get_header(); ?>

<div id="row-s">	<!-- rowS -->
	<?php get_sidebar(); ?>
</div>	<!-- rowS -->

<div id="row-b">	<!-- rowB -->
	<div class="post-content">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'single' ); ?>
		<?php if ( comments_open() || '0' != get_comments_number() )
			comments_template( '', true );	?>
	<?php endwhile; // end of the loop. ?>
	</div>
</div> <!-- rowB -->
	<?php get_template_part( 'row3' ); ?>

<?php get_footer(); ?>