<?php
/**
 * Template Name: Home Template
 *
 * Template für die Darstellung der Startseite
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );


}
$args = [
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-templates/template-reservation.php'
];
$reservationpage = get_posts($args);
// only one page should have page template reservation
$reservationpage = $reservationpage[0];

$reservationpageURL = get_permalink($reservationpage->ID);


global $reservationpageURL;

?>

<div class="custom-slidercontroller-container">
	<i class="fas fa-angle-down"></i>	
</div>	
<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">


					<!-- ######## Facts Section ########  -->

						<div class="col-sm-12">
							<div class="row facts-row ">
								<div class="title-col col-sm-12">
									<h2>Kurz & Knapp</h2>
								</div>	

							<?php

								$args = array(
			    					'post_type'  => 'domi_facts_cpt',
			    					'numberposts' => -1,
			    					'post_status' => 'publish', 
		    						'orderby' => 'menu_order', 
		    						'order' => 'ASC', 

								);


							$facts = get_posts( $args );
							
							?>

							<?php 
							foreach ($facts as $fact ) {
								get_template_part( 'loop-templates/content', 'facts' );	
							}
							?>
							</div> <!-- facts row-->
						</div> <!-- col -->					
					

					

					<!-- ######## Kunstwerke Section ########  -->					
					<div class="col-sm-12">
						<div class="row kunstwerke-row ">
							<div class="title-col col-sm-12">
								<h2>Die Bilder</h2>
							</div>	

						<?php

							$args = array(
		    					'post_type'  => 'kunstwerkposttype',
		    					'numberposts' => -1,
		    					'post_status' => 'publish', 
	    						'orderby' => 'menu_order', 
	    						'order' => 'ASC', 

							);


						$kunstwerke = get_posts( $args );
						?>

						<?php 
						foreach ($kunstwerke as $kunstwerk ) {
							get_template_part( 'loop-templates/content', 'kunstwerke' );	
						}
						?>



					</div> <!-- postentry row-->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
