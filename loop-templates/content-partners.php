<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $partner;
$partnerMeta = get_fields($partner->ID); 

?>


<article class="partner-col card-holder col-md-6 bigpartnerLayout">

	<div class="entry-content">
		<div class="card">

			<header class="entry-header">
				<h2><?php echo $partner->post_title;?></h2>
			</header><!-- .entry-header -->	
			
	 		<div class="image-container">
	 			
	 			<a href="<?=$partnerMeta["partner_url"]?>" target="_blank">
	 				<img src="<?=get_the_post_thumbnail_url($partner->ID, 'medium')?>" />
	 			</a>
	 		</div>	


			<div class="button-container">
				<a class="customBoutton moreInformation" href="<?=$partnerMeta["partner_url"]?>" target="_blank">  <span>Mehr erfahren</span> <i class="fa-solid fa-up-right-from-square"></i></a>	
			</div>	 		

		</div>
	</div>	

</article>

