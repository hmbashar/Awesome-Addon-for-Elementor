<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$unique_ID = 'aefe-owl-testimonial-'.uniqid();

$settings = $this->get_settings_for_display();

// Item Count
$item_count_desk = $settings['aefe_testimonial_item_count'] ? $settings['aefe_testimonial_item_count'] : 3; // for desktop
$item_count_tab = $settings['aefe_testimonial_item_count_tablet'] ? $settings['aefe_testimonial_item_count_tablet'] : 2; // for tab
$item_count_mobile = $settings['aefe_testimonial_item_count_mobile'] ? $settings['aefe_testimonial_item_count_mobile'] : 1; // for mobile


// Item Gap
$item_gap_desk = $settings['aefe_testimonial_item_gap'] ? $settings['aefe_testimonial_item_gap'] : 0; // for desktop
$item_gap_tab = $settings['aefe_testimonial_item_gap_tablet'] ? $settings['aefe_testimonial_item_gap_tablet'] : 0; // for tab
$item_gap_mobile = $settings['aefe_testimonial_item_gap_mobile'] ? $settings['aefe_testimonial_item_gap_mobile'] : 0; // for mobile

// Mouse Drag
$mouseDrag_desk = $settings['aefe_testimonial_item_mouseDrag'] ? $settings['aefe_testimonial_item_mouseDrag'] : 1; // for desktop
$mouseDrag_tab = $settings['aefe_testimonial_item_mouseDrag_tablet'] ? $settings['aefe_testimonial_item_mouseDrag_tablet'] : 1; // for tab
$mouseDrag_mobile = $settings['aefe_testimonial_item_mouseDrag_mobile'] ? $settings['aefe_testimonial_item_mouseDrag_mobile'] : 1; // for mobile

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
    
    jQuery('.aefe-owl-testimonial-<?php echo $unique_ID; ?>').owlCarousel({
      dots: true,				
      loop: <?php echo $aefe_loop; ?>,
      autoplay: <?php echo $autoplay; ?>,
      nav: true,
      navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      autoplayHoverPause: false,
     
      responsive:{
          0:{
            items:<?php echo $item_count_mobile; ?>,
            margin:<?php echo $item_gap_mobile; ?>,
            mouseDrag: <?php echo $mouseDrag_mobile; ?>, 
          },
          600:{
            items:2
          },
          750:{
            items:<?php echo $item_count_tab; ?>,
            margin:<?php echo $item_gap_tab; ?>,
            mouseDrag: <?php echo $mouseDrag_tab; ?>, 
          },
          1000:{
            items:<?php echo $item_count_desk; ?>,
            margin:<?php echo $item_gap_desk; ?>,
           // center: true,
            mouseDrag: <?php echo $mouseDrag_desk; ?>,           
          }
        }
    });
  });
</script>


         <div class="aefe-some-review-contents-area fix">
            <div class="aefe-some-review-content-slide fix owl-carousel aefe-owl-testimonial-<?php echo $unique_ID; ?>">
              <?php if(!empty($settings['aefe_testimonial_slider_list'])) : foreach($settings['aefe_testimonial_slider_list'] as $testimonial_slider) : 

                				if ( ! empty( $testimonial_slider['aefe_testimonial_slider_fb_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_fb_url', $testimonial_slider['aefe_testimonial_slider_fb_url'] );
                        }
                
                        //for facebook url
                        if ( ! empty( $testimonial_slider['aefe_testimonial_slider_tw_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_tw_url', $testimonial_slider['aefe_testimonial_slider_tw_url'] );
                        }
                
                        //for linkedin url
                        if ( ! empty( $testimonial_slider['aefe_testimonial_slider_linkd_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_linkd_url', $testimonial_slider['aefe_testimonial_slider_linkd_url'] );
                        }
                
                        //for dribbble url
                        if ( ! empty( $testimonial_slider['aefe_testimonial_slider_drib_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_drib_url', $testimonial_slider['aefe_testimonial_slider_drib_url'] );
                        }
                
                ?>
              <!--Single Some Review -->
              <div class="aefe-single-some-review">
                <div class="aefe-single-some-review-img">
                  
                  <?php if(!empty($testimonial_slider['aefe_testimonial_slider_img']['url'])) : ?>
                    <img src="<?php echo esc_url($testimonial_slider['aefe_testimonial_slider_img']['url']); ?>" alt="">
                  <?php else : ?>
                    <img src="<?php echo AEFE_URL ?>assets/img/single-team-member.png" alt="">
                  <?php endif; ?>

                </div>
                <div class="aefe-single-some-review-title fix">
                  <h2><a><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_title']); ?></a></h2>
                  <h4><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_subtitle']); ?></h4>
                  <?php if(!empty($testimonial_slider['aefe_testimonial_slider_rating']) && '0' !== $testimonial_slider['aefe_testimonial_slider_rating']) : 
                    $tst_val = $testimonial_slider['aefe_testimonial_slider_rating']; 
                  ?>
                    <div class="aefe-tms-testimonial-rating">
                        <?php
                            for ($x = 1; $x <= $tst_val; $x++)  :    
                        ?>
                            <i class="fa fa-star"></i>
                        <?php endfor;?> 
                    </div>
                  <?php  endif; ?>
                </div>
                <div class="aefe-single-some-review-content fix">
                  <p><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_content']); ?></p>
                 
               
                </div>
                <div class="aefe-single-some-review-social fix">          
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_fb_url' ); ?>><i class="fa fa-facebook"></i></a>
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_tw_url' ); ?>><i class="fa fa-twitter"></i></a>
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_linkd_url' ); ?>><i class="fa fa-linkedin"></i></a>
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_drib_url' ); ?>><i class="fa fa-dribbble"></i></a>                  
                </div>
              </div><!--/ Single Some Review -->
            <?php endforeach; else : ?>              
              <div class="aefe-single-some-review-title fix">
                  <h2><a><?php do_action('aefe_please_add_testimonial');?></a></h2>                  
              </div>
            <?php endif; ?>

            </div>
          </div>