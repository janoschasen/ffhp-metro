<?php
/* 
* row 3 mit Twitter-Feed, Kontaktbutton, Kontaktsdaten / Newsletter (noch auskommentiert). 
*/
?>

<div id="row3" class="clearfix">

<!-- twitter -->
	<div id="twitter" class="tile v2">
	<div class="tile-content skyblue">
		<h1>Twitter</h1>

		<div class="tw-profile">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Peter-Haase.jpg" alt="Bild von Peter Haase" />
				<a href="https://twitter.com/HaasePeter" target="_blank" title="Peter Haase auf Twitter">@HaasePeter</a><br>
				<a href="https://twitter.com/HaasePeter" title="Peter Haase folgen" class="twitter-follow-button" data-show-count="false" data-lang="de" data-show-screen-name="false">@HaasePeter folgen</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				
		</div>

		<?php
		// draft sample display for array returned from oAuth Twitter Feed for Developers WP plugin
		// http://wordpress.org/extend/plugins/oauth-twitter-feed-for-developers/
			echo '
			<div class="tw-feed">';

		$tweets = getTweets(3); //change number up to 20 for number of tweets
		if(is_array($tweets)){

		// to use with intents
		echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';

		foreach($tweets as $tweet){

			if($tweet['text']){
				$the_tweet = $tweet['text'];
				/*
				Twitter Developer Display Requirements
				https://dev.twitter.com/terms/display-requirements

				2.b. Tweet Entities within the Tweet text must be properly linked to their appropriate home on Twitter. For example:
				  i. User_mentions must link to the mentioned user's profile.
				 ii. Hashtags must link to a twitter.com search with the hashtag as the query.
				iii. Links in Tweet text must be displayed using the display_url
					 field in the URL entities API response, and link to the original t.co url field.
				*/

				// i. User_mentions must link to the mentioned user's profile.
				if(is_array($tweet['entities']['user_mentions'])){
					foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
						$the_tweet = preg_replace(
							'/@'.$user_mention['screen_name'].'/i',
							'<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank" title="Peter Haase auf Twitter">@'.$user_mention['screen_name'].'</a>',
							$the_tweet);
					}
				}

				// ii. Hashtags must link to a twitter.com search with the hashtag as the query.
				if(is_array($tweet['entities']['hashtags'])){
					foreach($tweet['entities']['hashtags'] as $key => $hashtag){
						$the_tweet = preg_replace(
							'/#'.$hashtag['text'].'/i',
							'<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank" title="#'.$hashtag['text'].'">#'.$hashtag['text'].'</a>',
							$the_tweet);
					}
				}

				// iii. Links in Tweet text must be displayed using the display_url
				//      field in the URL entities API response, and link to the original t.co url field.
				if(is_array($tweet['entities']['urls'])){
					foreach($tweet['entities']['urls'] as $key => $link){
						$the_tweet = preg_replace(
							'`'.$link['url'].'`',
							'<a href="'.$link['url'].'" target="_blank" title="Externer Link: '.$link['url'].'"><img src="http://janoschasen.de/ffhp-wp-metro/wp-content/themes/ffhp-metro/images/link.png" alt="'.$link['url'].'" class="tw-link-img" /></a>',
							$the_tweet);
					}
				}

			echo '<p>';
				echo $the_tweet;
				echo '</p>';

				// 3. Tweet Actions
				//    Reply, Retweet, and Favorite action icons must always be visible for the user to interact with the Tweet. 
				//    These actions must be implemented using Web Intents or with the authenticated Twitter API.
				//    No other social or 3rd party actions similar to Follow, Reply, Retweet and Favorite may be attached to a Tweet.
				//    get the sprite or images from twitter's developers resource and update your stylesheet
				// 4. Tweet Timestamp
				//    The Tweet timestamp must always be visible and include the time and date. e.g., "3:00 PM - 31 May 12".
				// 5. Tweet Permalink
				//    The Tweet timestamp must always be linked to the Tweet permalink.
				echo '
			<div class="tw-intents">
				<a class="reply" href="https://twitter.com/intent/tweet?in_reply_to='.$tweet['id_str'].'" title="Antworten"><div class="t-rep"></div></a>
				<a class="retweet" href="https://twitter.com/intent/retweet?tweet_id='.$tweet['id_str'].'" title="Retweeten"><div class="t-ret"></div></a>
					<a class="favorite" href="https://twitter.com/intent/favorite?tweet_id='.$tweet['id_str'].'" title="Favorisieren"><div class="t-fav"></div></a>

				<span class="timestamp">
						<a href="https://twitter.com/YOURUSERNAME/status/'.$tweet['id_str'].'" target="_blank" title="'.$tweet['id_str'].'">
						'.date('d. M, H:i',strtotime($tweet['created_at']. '+ 1 hour')).'
						</a>
				</span> 
			</div>
			'; // +1 GMT for MEZ
			} else {
				echo '
				<br /><br />
				<a href="http://twitter.com/YOURUSERNAME" target="_blank" title="Twitter Feed lesen">Click here to read YOURUSERNAME\'S Twitter feed</a>';
			}
		}
		}
			echo '
			</div>';
		?>
		</div>
	</div>
<!-- #twitter -->

	<div class="tile contact">
		<div class="contact-active active skyblue tile">
			<div class="close-button">
			</div>
			<?php query_posts('p=66'); if(have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endif; ?>
			<?php query_posts('p=124'); if(have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endif; ?>
		</div>

		<div class="tile-content skyblue clickable scrolldown">
			<div class="badge">
				<h1>Kontaktieren Sie mich</h1>
			</div>
		</div>

	</div>
	
	<div class="tile contact newsletter">
		<div class="tile-content skyblue">
			<div class="contact-info">
				<?php query_posts('p=6'); if(have_posts()) : the_post(); ?>
				<?php the_content(); ?><?php endif; ?>
			</div>
		</div>
	</div>

</div>