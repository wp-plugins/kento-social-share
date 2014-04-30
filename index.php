<?php
/*
Plugin Name: Kento Social Share
Plugin URI: http://kentothemes.com
Description: Fancy Social share tool.
Version: 1.0
Author: KentoThemes
Author URI: http://kentothemes.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('KENTO_SOCIAL_SHARE_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
function kento_social_share()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_style('kento_social_share-style', KENTO_SOCIAL_SHARE_PLUGIN_PATH.'css/style.css');
		wp_enqueue_script('kento_social_share_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
	}
add_action("init","kento_social_share");


function kento_social_share_display($kento_social_share)
	{

		$kento_social_share .= "<div class='kento-social-share'>
		
			<div class='s-button button-1'><a target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=".k_social_share_get_url()."' class='fb'></a></div>
			<div class='s-button button-2'><a href='https://plus.google.com/share?url=".k_social_share_get_url()."' class='gplus'></a> </div>
			<div class='s-button button-3'><a href='https://www.linkedin.com/shareArticle?mini=true&url=".k_social_share_get_url()."' class='linkedin'></a> </div>
			<div class='s-button button-4'><a href='https://twitter.com/intent/tweet?url=".k_social_share_get_url()."' class='twitter'></a> </div>
			<div class='s-button button-5'><a href='https://pinterest.com/pin/create/button/?url=".k_social_share_get_url()."&media=".k_social_share_get_image()."' class='pinterest'></a> </div>
			<div class='s-button button-6'><a href='http://www.stumbleupon.com/badge/?url=".k_social_share_get_url()."' class='stumble'></a> </div>
			<div class='s-button button-7'><a href='http://www.folkd.com/page/social-bookmarking.html?addurl=".k_social_share_get_url()."' class='folkd'></a> </div>
			<div class='s-button button-8'><a href='https://delicious.com/post?url=".k_social_share_get_url()."' class='delicious'></a> </div>
			<div class='s-button button-9'><a href='http://www.digg.com/submit?url=".k_social_share_get_url()."' class='digg'></a> </div>
			<div class='s-button button-10'><a href='http://www.reddit.com/submit?url=".k_social_share_get_url()."' class='reddit'></a> </div>
			<div class='s-button button-11'><a href='mailto:?Subject=".k_social_share_get_title()."&Body=".k_social_share_get_url()."' class='email'></a> </div>			
			
		<div class='buttons'>

		</div></div>";
		echo $kento_social_share;
	}

add_filter('wp_footer', 'kento_social_share_display');





function k_social_share_get_url()
	{
		$actual_link = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
		return $actual_link;
	}



function k_social_share_get_image()
	{	
		global $post;
		if(is_single())
			{
			
				if ( has_post_thumbnail()) {
						$post_thumbnail_id = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ));
				 }
				 
			}
		elseif(is_page())
			{
				if ( has_post_thumbnail()) {
						$post_thumbnail_id = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ));
				 }

			}

		 
		 return $post_thumbnail_id[0];
	}


function k_social_share_get_title()
	{
		global $post;
		if(is_single())
			{
				$title = get_the_title();
			}
		elseif(is_page())
			{
				$title = get_the_title();
			}
		
		return $title;
	
	}


















?>