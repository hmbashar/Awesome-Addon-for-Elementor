<?php
namespace AEFE_ELEMENTOR;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class AEFE_TeamMember extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'aefe-team-member';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AW Team Member', 'aefe' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'aefe-category' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'team member', 'Talent', 'Team', 'person' ];
	}

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		//Single Or Repeater
		$this->start_controls_section(
			'aefe-tm-single-or-repeater-tab',
			[
				'label' => esc_html__( 'Type', 'aefe' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'aefe-tm-repeater-single',
			[
				'label' => esc_html__( 'Type', 'aefe' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'single',
				'options' => [
					'single'  => esc_html__( 'Single', 'aefe' ),
					'slider' => esc_html__( 'Slider', 'aefe' ),
				],
			]
		);
		$this->end_controls_section(); // End the Single Or Repeater Option

        // Information Section
		$this->start_controls_section(
			'tm_content_section',
			[
				'label' => esc_html__( 'Content', 'AEFE' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aefe-tm-repeater-single' => 'single',
                ],
			]
		);
		
		// Person Name
		$this->add_control(
			'aefe-tm-name',
			[
				'label' => esc_html__( 'Name', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Member Name', 'AEFE' ),
			]
		);
		
		// Person subtitle
		$this->add_control(
			'aefe-tm-subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Subtitle', 'AEFE' ),
			]
		);

        // Person Picture
        $this->add_control(
			'aefe-tm-member-picture',
			[
				'label' => esc_html__( 'Member Picture', 'aefe' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

        // Social Profile Section
		$this->start_controls_section(
			'tm_social_section',
			[
				'label' => esc_html__( 'Social Profile', 'AEFE' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aefe-tm-repeater-single' => 'single',
                ],
			]
		);
		
		// facebook url 
		$this->add_control(
			'aefe-tm-facebook',
			[
				'label' => esc_html__( 'Facebook URL', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://fb.com/hmbashar', 'AEFE' ),
                'label_block' => true,
			]
		);
		
		// Twitter URL subtitle
		$this->add_control(
			'aefe-tm-twitter',
			[
				'label' => esc_html__( 'Twitter URL', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://twitter.com/hmbashar', 'AEFE' ),
                'label_block' => true,
			]
		);

		$this->end_controls_section();

        /*---------------------------------------------------------------
        Repeater Control
        -----------------------------------------------------------------*/
        $this->start_controls_section(
			'aefe-tm-slider-content_section',
			[
				'label' => esc_html__( 'Content', 'aefe' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
                    'aefe-tm-repeater-single' => 'slider',
                ],
			]
		);

		$repeater = new \Elementor\Repeater();

		// Person Name
		$repeater->add_control(
			'aefe-tm-name',
			[
				'label' => esc_html__( 'Name', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Member Name', 'AEFE' ),
				'default' => esc_html__( 'Member #1' , 'plugin-name' ),
			]
		);
		
		// Person subtitle
		$repeater->add_control(
			'aefe-tm-subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Subtitle', 'AEFE' ),
			]
		);

        // Person Picture
        $repeater->add_control(
			'aefe-tm-member-picture',
			[
				'label' => esc_html__( 'Member Picture', 'aefe' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		// facebook url 
		$repeater->add_control(
			'aefe-tm-facebook',
			[
				'label' => esc_html__( 'Facebook URL', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://fb.com/hmbashar', 'AEFE' ),
                'label_block' => true,
			]
		);
		
		// Twitter URL subtitle
		$repeater->add_control(
			'aefe-tm-twitter',
			[
				'label' => esc_html__( 'Twitter URL', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://twitter.com/hmbashar', 'AEFE' ),
                'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Color', 'aefe' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'aefe-tm-slider-list',
			[
				'label' => esc_html__( 'Slider List', 'aefe' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();



	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		/*-------------------------------------------- 
			Repeater Widget Data Display
		-------------------------------------------*/

		if(!empty($settings['aefe-tm-repeater-single']) && $settings['aefe-tm-repeater-single'] === 'slider') :
		?>

	
	       <!-- Our Talent Team Area-->
        <section class="our-talent-team-area fix">
           	<div class="our-talent-team column section-margin">
               <!--Our Talent Team Bottom/Content-->
               <div class="ourtalent-team-bottom">
                    <div class="our-talent-slider-content owl-carousel">

						<?php 
							if(!empty($settings['aefe-tm-slider-list'])) :
							
								foreach($settings['aefe-tm-slider-list'] as $team_member_slider) :

									// check if member image has set.
									if(!empty($team_member_slider['aefe-tm-member-picture']['url'])) {
										$team_img = $team_member_slider['aefe-tm-member-picture']['url'];
									}else {
										$team_img = AEFE_URL.'/assets/img/single-team-member-1.png'; // fallback placeholder image
									}	
									
									// Facebook URL Field Checked
									if ( ! empty( $team_member_slider['aefe-tm-facebook']['url'] ) ) {
										$this->add_link_attributes( 'aefe-tm-facebook', $team_member_slider['aefe-tm-facebook'] );
									}
							
									
									// Twitter URL Field Checked
									if ( ! empty( $team_member_slider['aefe-tm-twitter']['url'] ) ) {
										$this->add_link_attributes( 'aefe-tm-twitter', $team_member_slider['aefe-tm-twitter'] );
									}
							
						?>
							<!--Single Team Member-->
							<div class="single-team-member elementor-repeater-item-<?php echo esc_attr($team_member_slider['_id']); ?>">
								<div class="single-team-member-picture">
									<a><img src="<?php echo esc_url($team_img); ?>" alt="<?php echo esc_html($team_member_slider['aefe-tm-name']); ?>"></a>
								</div>
								<div class="single-team-member-name">
									<h2><a><?php echo esc_html($team_member_slider['aefe-tm-name']); ?></a></h2>
									<h3><?php echo esc_html($team_member_slider['aefe-tm-subtitle']); ?></h3>
								</div>
								<div class="single-team-member-social">
									<a <?php echo $this->get_render_attribute_string( 'aefe-tm-facebook' ); ?> ><i class="fab fa-facebook-f"></i></a>
									<a <?php echo $this->get_render_attribute_string( 'aefe-tm-twitter' ); ?> ><i class="fab fa-twitter"></i></a>
								</div>
							</div><!--/ Single Team Member-->
							
						<?php endforeach; endif; ?>

                    </div>
               </div><!--/ Our Talent Team Bottom/Content-->
           </div>
       </section><!--/ Our Talent Team Area-->

	   <!-------------------------------------------- 
			Single Widget Data Display
		------------------------------------------->
	<?php else : 
		
			// check if member image has set.
			if(!empty($settings['aefe-tm-member-picture']['url'])) {
				$team_single_img = $settings['aefe-tm-member-picture']['url'];
			}else {
				$team_single_img = AEFE_URL.'/assets/img/single-team-member-1.png'; // fallback placeholder image
			}	
			
			// Facebook URL Field Checked
			if ( ! empty( $settings['aefe-tm-facebook']['url'] ) ) {
				$this->add_link_attributes( 'aefe-tm-facebook', $settings['aefe-tm-facebook'] );
			}
	
			
			// Twitter URL Field Checked
			if ( ! empty( $settings['aefe-tm-twitter']['url'] ) ) {
				$this->add_link_attributes( 'aefe-tm-twitter', $settings['aefe-tm-twitter'] );
			}		

		?>

	<!--Single Team Member-->
	<div class="single-team-member">
		<div class="single-team-member-picture">
			<a><img src="<?php echo esc_url($team_single_img); ?>" alt="<?php echo esc_html($settings['aefe-tm-name']); ?>"></a>
		</div>
		<div class="single-team-member-name">
			<h2><a><?php echo esc_html($settings['aefe-tm-name']); ?></a></h2>
			<h3><?php echo esc_html($settings['aefe-tm-subtitle']); ?></h3>
		</div>
		<div class="single-team-member-social">
			<a <?php echo $this->get_render_attribute_string( 'aefe-tm-facebook' ); ?> ><i class="fab fa-facebook-f"></i></a>
			<a <?php echo $this->get_render_attribute_string( 'aefe-tm-twitter' ); ?> ><i class="fab fa-twitter"></i></a>
		</div>
	</div><!--/ Single Team Member-->

	<?php endif; ?>


<?php


	}


}