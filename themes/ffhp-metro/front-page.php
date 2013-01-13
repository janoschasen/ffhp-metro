<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme.
 * It is used to display a page when nothing more specific matches a query.
 * It puts together the home page when no home.php or front-page.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ffhp-metro
 * @since _s 1.0
 */
get_header(); ?>

<?php get_template_part( 'row1' ); ?>
<?php get_template_part( 'row2' ); ?>
<?php get_template_part( 'row3' ); ?>

<?php get_footer(); ?>