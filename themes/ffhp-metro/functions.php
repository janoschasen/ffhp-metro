<?php
/**
 * ffhp-metro functions and definitions
 *
 * @package _s
 * @since _s 1.0
 */

/**
 * extends the "..." shortener of excerpts to a read-more with link to the article 
 */
function child_theme_setup() {
	// override parent theme's 'more' text for excerpts
	remove_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' ); 
	remove_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );
}
add_action( 'after_setup_theme', 'child_theme_setup' );

// Puts link in excerpts more tag
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '" title="'. get_the_title() . '"> Weiterlesen...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Sets standard-length of excerpts
function new_excerpt_length($length) {
 return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

/**
 * excludes the named catgories in the widget-categories-area
 */
function exclude_widget_categories($args){
$exclude = "1,2,3,4,5,8"; // The IDs of the excluding categories
$args["exclude"] = $exclude;
return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");

/**
 * gets the src of the first image in a post and displys it on a page via:
 * <?php echo get_first_image() ?>
 * http://www.wprecipes.com/how-to-get-the-first-image-from-the-post-and-display-it
 */
function get_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "http://janoschasen.de/ffhp-wp-metro/wp-content/themes/ffhp-metro/images/default.jpg";
  }
  return $first_img;
}

/**
 * Updated July 19, 2012 to remove pubdate meta
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentyeleven_posted_on to override in a child theme
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
	);
}
// no endif needed because the conditional was removed //