<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $fact;
$factMeta = get_fields($fact->ID); 

// different layout for home and "facts"
$columnwidth = 'fact-col card-holder' . ' ' . (is_front_page() ? 'col-sm-6' : 'col-sm-6');
$facttype =  (is_front_page() ? 'smallfactLayout' : 'bigfactLayout');

?>


<article class= " <?=$columnwidth . ' ' . $facttype?>" >

	<div class="entry-content">

			<span class="fact-icon"><?php echo $factMeta["fa_html"];?> </span>	

			<header class="entry-header">
				<h5><?php echo $fact->post_title;?></h5>
			</header><!-- .entry-header -->	
			
	 			
 			
	 		
	</div>	

</article>

