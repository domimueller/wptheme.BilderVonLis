<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $team;

?>


<article class= "card-holder  col-md-6" >

	<div class="entry-content">
		<div class="card">

			<header class="entry-header">
				<h2><?php echo $team->post_title;?></h2>
			</header><!-- .entry-header -->	
			
			<?php if (isset($team->post_content) && !empty($team->post_content)):?>
				<div class="cite">
					<blockquote class="blockquote">
	  					<div class="blockquote-footer"><?php echo $team->post_content;?></cite>
					</blockquote>
				</div>
			<?php endif;?>
	 		<div class="image-container"> 			

	 			<a href="<?=get_the_post_thumbnail_url($team->ID, 'large')?>" data-rel="lightbox-image-0" data-rl_title="" data-rl_caption="" title="">
	 				<img class="" src="<?=get_the_post_thumbnail_url($team->ID, 'teampicture')?>" />
	 			</a>	
	 		</div>	
		</div>
	</div>	

</article>

