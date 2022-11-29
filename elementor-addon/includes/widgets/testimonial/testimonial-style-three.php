<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$unique_ID = uniqid();

$settings = $this->get_settings_for_display();

// Item Count
$item_count_desk = $settings['aefe_testimonial_item_count'] ? $settings['aefe_testimonial_item_count'] : 1; // for desktop
$item_count_tab = $settings['aefe_testimonial_item_count_tablet'] ? $settings['aefe_testimonial_item_count_tablet'] : 1; // for tab
$item_count_mobile = $settings['aefe_testimonial_item_count_mobile'] ? $settings['aefe_testimonial_item_count_mobile'] : 1; // for mobile


// Mouse Drag
$mouseDrag_desk = $settings['aefe_testimonial_item_mouseDrag'] ? $settings['aefe_testimonial_item_mouseDrag'] : 1; // for desktop
$mouseDrag_tab = $settings['aefe_testimonial_item_mouseDrag_tablet'] ? $settings['aefe_testimonial_item_mouseDrag_tablet'] : 1; // for tab
$mouseDrag_mobile = $settings['aefe_testimonial_item_mouseDrag_mobile'] ? $settings['aefe_testimonial_item_mouseDrag_mobile'] : 1; // for mobile


// Nav Bar
$nav_desk = $settings['aefe_testimonial_slider_nav_switch'] ? $settings['aefe_testimonial_slider_nav_switch'] : 0; // for desktop
$nav_tab = $settings['aefe_testimonial_slider_nav_switch_tablet'] ? $settings['aefe_testimonial_slider_nav_switch_tablet'] : 0; // for tab
$nav_mobile = $settings['aefe_testimonial_slider_nav_switch_mobile'] ? $settings['aefe_testimonial_slider_nav_switch_mobile'] : 0; // for mobile


// dot Bar
$dot_desk = $settings['aefe_testimonial_slider_dot_switch'] ? $settings['aefe_testimonial_slider_dot_switch'] : 0; // for desktop
$dot_tab = $settings['aefe_testimonial_slider_dot_switch_tablet'] ? $settings['aefe_testimonial_slider_dot_switch_tablet'] : 0; // for tab
$dot_mobile = $settings['aefe_testimonial_slider_dot_switch_mobile'] ? $settings['aefe_testimonial_slider_dot_switch_mobile'] : 0; // for mobile




// check autoplay on/off
  if('yes' === $settings['aefe_testimonial_slider_autoplay']) {
    $autoplay = 1;
  }else {
    $autoplay = 0;
  }

// check Loop on/off
  if('yes' === $settings['aefe_testimonial_slider_loop']) {
    $aefe_loop = 1;
  }else {
    $aefe_loop = 0;
  }





?>

<script>
  jQuery(document).ready(function(){
    
    jQuery('.aefe-owl-testimonial-three-<?php echo $unique_ID; ?>').owlCarousel({     		
      loop: <?php echo $aefe_loop; ?>,
      autoplay: <?php echo $autoplay; ?>,      
      navText: ['<?php \Elementor\Icons_Manager::render_icon( $settings['aefe_testimonial_nav_selected_icon_left'], [ 'aria-hidden' => 'true' ] ); ?>', '<?php \Elementor\Icons_Manager::render_icon( $settings['aefe_testimonial_nav_selected_icon_right'], [ 'aria-hidden' => 'true' ] ); ?>'],
      autoplayHoverPause: false,     
      responsive:{
          0:{
            items:<?php echo $item_count_mobile; ?>,            
            mouseDrag: <?php echo $mouseDrag_mobile; ?>, 
            nav: <?php echo $nav_mobile; ?>,
            dots: <?php echo $dot_mobile; ?>,
          },
          600:{
            items:2
          },
          750:{
            items:<?php echo $item_count_tab; ?>,
            mouseDrag: <?php echo $mouseDrag_tab; ?>, 
            nav: <?php echo $nav_tab; ?>,
            dots: <?php echo $dot_tab; ?>,
          },
          1000:{
            items:<?php echo $item_count_desk; ?>,
            nav: <?php echo $nav_desk; ?>,
            mouseDrag: <?php echo $mouseDrag_desk; ?>,  
            dots: <?php echo $dot_desk; ?>,         
          }
        }
    });
  });
</script>


<div class="aefe-tm-3-testimonial-area fix">
	<div class="aefe-tm-3-testimonial fix">
		<div class="aefe-tm-3-testimonial-slider owl-carousel fix aefe-owl-testimonial-three-<?php echo $unique_ID; ?>">
			<?php if(!empty($settings['aefe_testimonial_slider_list'])) : foreach($settings['aefe_testimonial_slider_list'] as $testimonial_slider) : ?>
			<!--Single Testimonial-->
			<div class="aefe-tm-3-single-testimonial">
				<div class="aefe-tm-3-testimonila-text fix">
					<div class="aefe-tm-3-testimonial-icon">
						<i class="fa fa-quote-right"></i>
					</div>
					<?php 
						if(!empty($testimonial_slider['aefe_testimonial_slider_rating']) && '0' !== $testimonial_slider['aefe_testimonial_slider_rating']) : 
							$tst_val = $testimonial_slider['aefe_testimonial_slider_rating']; 
					?>
					<!--Rating -->
					<div class="aefe-tms-testimonial-rating aefe-tm-3-single-testimonial-rating">
						<?php
							for ($x = 1; $x <= $tst_val; $x++)  :    
						?>
							<i class="fa fa-star"></i>
						<?php endfor;?>
					</div><!--/ Rating -->
					<?php endif; ?>
					<div class="aefe-tm-3-testimonial-message">
						<p><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_content']); ?></p>						
					</div>
					<div class="aefe-tm-3-testimonial-client-info fix">							
						<div class="aefe-tm-3-testimonial-img">
							<?php if(!empty($testimonial_slider['aefe_testimonial_slider_img']['url'])) : ?>
								<img src="<?php echo esc_url($testimonial_slider['aefe_testimonial_slider_img']['url']); ?>" alt="">
							<?php else : ?>
								<img src="<?php echo AEFE_URL ?>assets/img/single-team-member.png" alt="">
							<?php endif; ?>
						</div>
						<div class="aefe-tm-3-testi_client_name">
							<h2><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_title']); ?></h2>
							<h3><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_subtitle']); ?></h3>
						</div>
					</div>
				</div>
			</div><!--/ Single Testimonial-->
			<?php endforeach; else : ?>              
              <div class="aefe-single-some-review-title fix">
                  <h2><a><?php do_action('aefe_please_add_testimonial');?></a></h2>                  
              </div>
            <?php endif; ?>
		</div>
	</div>
</div><!--/ Testimonial Area-->