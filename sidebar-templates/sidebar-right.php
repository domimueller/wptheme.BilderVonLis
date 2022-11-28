<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

$kunstwerkMeta = get_fields($post->ID);             
$laenge = $kunstwerkMeta['kunstwerk_laenge'];
$breite = $kunstwerkMeta['kunstwerk_breite'];
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



<div class="col-md-4 widget-area" id="right-sidebar">
   <div class="details-box">
        <h2>Details</h2>

        <?php   if (isset($laenge) && !empty($laenge)): ?>

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

    <h2>Reservation</h2>

        <?php 

        $form_id_or_key = 47;
        $args = array(
                            'post' =>"current",
                            'submit_text' => 'Reservieren'
                        );

        advanced_form($form_id_or_key, $args);?>

</div>
