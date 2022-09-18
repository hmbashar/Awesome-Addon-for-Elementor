<?php
namespace AEFE_ELEMENTOR\AEFETestimonialSlider;

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
class AEFE_Testimonial_Slider extends \Elementor\Widget_Base {

	 
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
		return 'aefe-testimonial';
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
		return esc_html__( 'Testimonial Slider', AEFE_TEXTDOMAIN );
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
		return 'eicon-review';
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
		return [ 'testimonial', 'feedback', 'reviews' ];
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
	
      
        $this->start_controls_section(
			'aefe-testimonial-slider-style-section',
			[
				'label' => esc_html__( 'Style', AEFE_TEXTDOMAIN ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,				
			]
		);
		$this->add_control(
			'aefe_testimonial_slider_style',
			[
				'label' => esc_html__( 'Style', AEFE_TEXTDOMAIN),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'testm-style-one',
				'options' => [
					'testm-style-one'  => esc_html__( 'Style One', AEFE_TEXTDOMAIN ),
					'testm-style-two' => esc_html__( 'Style Two', AEFE_TEXTDOMAIN ),
					'testm-style-three' => esc_html__( 'Style Three', AEFE_TEXTDOMAIN ),
				],
			]
		);

		$this->end_controls_section();


        $this->start_controls_section(
			'aefe_testimonial_slider_section',
			[
				'label' => esc_html__( 'Content', AEFE_TEXTDOMAIN ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,				
			]
		);

		$repeater = new \Elementor\Repeater();
		// Title
		$repeater->add_control(
			'aefe_testimonial_slider_title',
			[
				'label' => esc_html__( 'Title', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Title Name', AEFE_TEXTDOMAIN ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		// subtitle
		$repeater->add_control(
			'aefe_testimonial_slider_subtitle',
			[
				'label' => esc_html__( 'Sub Title', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Subtitle', AEFE_TEXTDOMAIN ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        // Image
        $repeater->add_control(
			'aefe_testimonial_slider_img',
			[
				'label' => esc_html__( 'Image', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

        // Content
        $repeater->add_control(
			'aefe_testimonial_slider_content',
			[
				'label' => esc_html__( 'Content', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		// facebook url 
		$repeater->add_control(
			'aefe_testimonial_slider_fb_url',
			[
				'label' => esc_html__( 'Facebook URL', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://fb.com/hmbashar', AEFE_TEXTDOMAIN ),
				'label_block' => true,			
			]
		);
		
		// Twitter URL 
		$repeater->add_control(
			'aefe_testimonial_slider_tw_url',
			[
				'label' => esc_html__( 'Twitter URL', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://twitter.com/hmbashar', AEFE_TEXTDOMAIN ),
				'label_block' => true,
			]
		);
		
		// LinkedIn URL
		$repeater->add_control(
			'aefe_testimonial_slider_linkd_url',
			[
				'label' => esc_html__( 'LinkedIn URL', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://www.linkedin.com/in/shaplahost/', AEFE_TEXTDOMAIN ),
				'label_block' => true,
			]
		);
		
		// Dribbble URL
		$repeater->add_control(
			'aefe_testimonial_slider_drib_url',
			[
				'label' => esc_html__( 'Dribbble URL', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://www.linkedin.com/in/shaplahost/', AEFE_TEXTDOMAIN ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'aefe_testimonial_slider_rating',
			[
				'label' => esc_html__( 'Rating', AEFE_TEXTDOMAIN),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '5',
				'options' => [
					'0'  => esc_html__( 'None', AEFE_TEXTDOMAIN),
					'1'  => esc_html__( '1 Star', AEFE_TEXTDOMAIN),
					'2'  => esc_html__( '2 Stars', AEFE_TEXTDOMAIN),
					'3'  => esc_html__( '3 Stars', AEFE_TEXTDOMAIN),
					'4'  => esc_html__( '4 Stars', AEFE_TEXTDOMAIN),
					'5'  => esc_html__( '5 Stars', AEFE_TEXTDOMAIN),
				],
			]
		);

		$this->add_control(
			'aefe_testimonial_slider_list',
			[
				'label' => esc_html__( 'Testimonial List', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ aefe_testimonial_slider_title }}}',
			]
		);
		
		$this->end_controls_section();

		
		//Testimonial Style
		$this->start_controls_section(
			'aefe_testimonial_slider_style_section',
			[
				'label' => esc_html__( 'Style', AEFE_TEXTDOMAIN ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		

		// Testimonial Style
		$this->add_control(
			'aefe_testimonial_slider_style_tab', 
			[
				'label' => esc_html__( 'This Features will be available in the next update.', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::HEADING,			
				
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
		if (is_admin())
		{
		  // solves the width issue
		  // The javascript called after elementor scripts are fully loaded.
		  if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
			  return;
		  }
		  echo "<script>jQuery('.owl-carousel').owlCarousel();</script>";
		}
			//load render view to show widget output on frontend/website.
			if(!empty($settings['aefe_testimonial_slider_style']) && 'testm-style-one' == $settings['aefe_testimonial_slider_style']) {
				include 'testimonial-style-one.php';
			}

			//load render view to show widget output on frontend/website.
			elseif(!empty($settings['aefe_testimonial_slider_style']) && 'testm-style-two' == $settings['aefe_testimonial_slider_style']) {
				include 'testimonial-style-two.php';
			}

			//load render view to show widget output on frontend/website.
			elseif(!empty($settings['aefe_testimonial_slider_style']) && 'testm-style-three' == $settings['aefe_testimonial_slider_style']) {
				include 'testimonial-style-three.php';
			}
			

	?>
          
<?php	

	}


}