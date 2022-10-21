<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $chili;


$chiliMeta = get_fields($chili);
$chiliExternalURL = $chiliMeta['chili_Tax_external_URL'];
$chiliDegree = $chiliMeta['chili_Tax_degree'];

?>



<article class="card-holder  col-md-6">

	<div class="entry-content">
		<div class="card">

			<header class="entry-header">
				<h2><?php echo $chili->post_title;?></h2>
			</header><!-- .entry-header -->	
			

	 		<div class="location-container">
	 			
	 			<h5>Standorte</h5>
								
	 			<ul>
		 			<?php 

		 			$locations = get_the_terms($chili->ID, 'standort' );

		 			if (isset($locations) && !empty($locations)):
			 			foreach ($locations as $location ):?>

			 				<li>
			 					<span><?php echo $location->name;?> </span>
								<span class="tooltip-holder" data-toggle="tooltip" title="<?=$location->description;?>">
									<i class="fa-solid fa-circle-info"></i>
								</span>
			 				</li> 
			 			<?php endforeach;
			 		endif;
	 				?> 	
	 			</ul>	
	 		</div>	



	 		<div class="spicy-degree-container">
				
				<h5>Schärfegrad</h5>
	 			
	 			<?php
					$active = get_field('options_spicy_active', 'option');
					$active = $active['url'];
					
					$inactive = get_field('options_spicy_inactive', 'option');										
					$inactive = $inactive['url'];
				

					for ($i = 1; $i <= $chiliDegree; $i++) {

						$active = get_field('options_spicy_active', 'option');
						$active = $active['url'];	?>
						<img src="<?=$active?>" />
						

					<?php
					}
	 			?>
	 			

	 			<?php
					
					for ($i = 1; $i <= (10 - $chiliDegree); $i++) {

							?>
						<img src="<?=$inactive?>" />										

					<?php
					}
	 			?>					 			
	 		</div>						 		

	 		<div class="image-container">
	 			
	 				<?=get_the_post_thumbnail($chili, 'medium');?> 
	 		
	 		</div>	

			<div class="button-container">
				<a class="customBoutton moreInformation" href="<?=$chiliExternalURL?>" target="_blank"><span>Mehr erfahren</span> <i class="fa-solid fa-up-right-from-square"></i></a>	
			</div>

		</div>
	</div>	



</article>			

