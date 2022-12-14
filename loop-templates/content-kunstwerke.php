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
$reservationsstatus = $kunstwerkMeta['kunstwerk_reservationsstatus'];
$material = $kunstwerkMeta['kunstwerk_material'];
 
// Probleme mit Umlauten vermeiden
if ($reservationsstatus == 'offen'):
	$reservationsstatus_display = 'verfügbar';
endif;

// Probleme mit Umlauten vermeiden
if ($reservationsstatus == 'reserviert'):
	$reservationsstatus_display = 'reserviert';
endif;


?>



<article class="partner-col card-holder col-md-12 reservationsstatus-<?=$reservationsstatus?>">

	<div class="entry-content">
		<div class="card">
			
			<header class="entry-header">
				<a href="<?=get_post_permalink($kunstwerk);?>">
					<h2><?php echo $kunstwerk->post_title;?></h2>
				</a>	
			</header><!-- .entry-header -->	
			
			<div class="reservations-card"><h3>Dieses Bild ist bereits reserviert.</h3></div>	
			<?php 

			$laenge = $kunstwerkMeta['kunstwerk_laenge'];
			$breite = $kunstwerkMeta['kunstwerk_breite'];

			?>
			<div class="row">
				<div class="col-sm-12 text-left">
					<?php	if (isset($laenge) && !empty($laenge)): ?>

					<?php if (isset($breite) && !empty($breite)): ?>

						<div class="info-block info-block-breite">
							<h4 class="boxTitle">Breite:</h4>
							<span><?=$breite;?></span>
						</div>	
					<?php endif; ?>

					<?php if (isset($laenge) && !empty($laenge) && isset($breite) && !empty($breite) ): ?>
						<div class="info-block info-block-seperator">
							<span>|</span>
						</div>
					<?php endif; ?>

					<div class="info-block info-block-laenge">
							<h4 class="boxTitle">Länge:</h4>
							<span><?=$laenge;?></span>
						</div>	
					<?php endif; ?>
						



		

					<?php if (isset($material) && !empty($material)): ?>

						<div class="info-block info-block-material">
							<h4 class="boxTitle">Material:</h4>
							<span><?=$material;?></span>
						</div>	

					<?php endif; ?>					

					<?php if (isset($reservationsstatus_display) && !empty($reservationsstatus_display)): ?>

						<div class="info-block info-block-reservationsstatus">
							<h4 class="boxTitle">Reservationsstatus:</h4>
							<span><?=$reservationsstatus_display;?></span>
						</div>	

					<?php endif; ?>					

					

				</div>
			</div>	

	 		<div class="image-container">
	 			<a href="<?=get_post_permalink($kunstwerk);?>">
	 				<img src="<?=get_the_post_thumbnail_url($kunstwerk->ID, 'kunstwerkSize')?>" />
	 			</a>	
	 		</div>	
	 		
	 		<?php if ($reservationsstatus == 'offen'):?>
				<div class="button-container">
					<a class="customBoutton moreInformation" href="<?=get_post_permalink($kunstwerk);?>">  <span>Reservieren</span> <i class="fa-solid fa-up-right-from-square"></i></a>	
				</div>	 		
			<?php endif;?>

		</div>
	</div>	

</article>

