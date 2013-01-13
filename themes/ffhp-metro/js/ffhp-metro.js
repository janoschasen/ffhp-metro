/* Tiles  */
jQuery('.clickable').click(function() {
  jQuery('.active').fadeOut(200);
  jQuery(this).parent().children('.active').fadeIn(200);
});

jQuery('.close-button').click(function() {
  jQuery(this).parent().fadeOut(200);
});

jQuery('.scrolldown').click(function() {
  jQuery("html, body").animate({ scrollTop: "150px" });
});

/* Footer  */
jQuery('.impress').click(function() {
  jQuery('.active').fadeOut(200);
  jQuery('.impress-active').fadeIn(200);
});

jQuery('.datenschutz').click(function() {
  jQuery('.active').fadeOut(200);
  jQuery('.datenschutz-active').fadeIn(200);
});

/* Slideshows  */
jQuery("#logo-slider").before('<div id="logo-pager" class="pager">').cycle({
	fx: 'fade',
	pause: 1,
	pauseOnPagerHover: 1,
	timeout: 4000,
	prev: '#logo-prev',
	next: '#logo-next',
	pager: '#logo-pager'
});

jQuery("#rss-slider").before('<div id="rss-pager" class="pager">').cycle({
	fx: 'scrollLeft',
	pause: 1,
	pauseOnPagerHover: 1,
	timeout: 10000,
	prev: '#rss-prev',
	next: '#rss-next',
	pager: '#rss-pager'
});

jQuery("#kunden-slider").before('<div id="kunden-pager" class="pager">').cycle({
	fx: 'fade',
	pause: 1,
	pauseOnPagerHover: 1,
	timeout: 5000,
	prev: '#kunden-prev',
	next: '#kunden-next',
	pager: '#kunden-pager'
});

jQuery(".slideshow").hover(function() {
  jQuery(".nav", this).fadeIn();}, function() {
    jQuery(".nav", this).stop().fadeOut();
});

/* Error-Message  */
jQuery('.site-description').click(function() {
  jQuery('#main').fadeOut(600);
  jQuery('.error-active').fadeIn(200);
});

jQuery('.error-button').click(function() {
  jQuery('.error-help').fadeIn(200);
});

jQuery('.error-exit').click(function() {
  jQuery('#main').fadeIn(600);
  jQuery('.error-help').fadeOut(200);
  jQuery('.error-active').delay(400).fadeOut(200);
});