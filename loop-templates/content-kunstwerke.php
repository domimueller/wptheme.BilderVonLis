<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $kunstwerk;
global $reservationpageURL;
$kunstwerkMeta = get_fields($kunstwerk->ID); 

$reservationpageURLParam = $reservationpageURL . '?bild=' . $kunstwerk->ID;



?>


<article class="partner-col card-holder col-md-12">

	<div class="entry-content">
		<div class="card">

			<header class="entry-header">
				<h2><?php echo $kunstwerk->post_title;?></h2>
			</header><!-- .entry-header -->	
			
			
			<?php 

			$laenge = $kunstwerkMeta['kunstwerk_laenge'];
			$breite = $kunstwerkMeta['kunstwerk_breite'];

			?>
			<div class="row">
				<div class="col-sm-12 text-left">
					<?php	if (isset($laenge) && !empty($laenge)): ?>

						<div class="info-block info-block-laenge">
							<h4 class="boxTitle">Länge:</h4>
							<span><?=$laenge;?></span>
						</div>	
						<?php endif; ?>
						
						<?php if (isset($laenge) && !empty($laenge) && isset($breite) && !empty($breite) ): ?>
						<div class="info-block info-block-seperator">
							<span>|</span>
						</div>
						<?php endif; ?>
						
						<?php if (isset($breite) && !empty($breite)): ?>

						<div class="info-block info-block-breite">
							<h4 class="boxTitle">Breite:</h4>
							<span><?=$breite;?></span>
						</div>	

						<?php endif; ?>

				</div>
			</div>	

	 		<div class="image-container">
	 			<img src="<?=get_the_post_thumbnail_url($kunstwerk->ID, 'kunstwerkSize')?>" />
	 		</div>	


			<div class="button-container">
				<a class="customBoutton moreInformation" href="<?=$reservationpageURLParam?>">  <span>Reservieren</span> <i class="fa-solid fa-up-right-from-square"></i></a>	
			</div>	 		

		</div>
	</div>	

</article>

