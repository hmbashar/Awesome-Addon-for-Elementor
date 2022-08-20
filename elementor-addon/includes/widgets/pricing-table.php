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
class AEFE_Pricing_Table extends \Elementor\Widget_Base {

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
		return 'aefe-pricing-table';
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
		return esc_html__( 'AW Pricing Table', 'aefe' );
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
		return 'eicon-bullet-list';
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
		return [ 'list', 'lists', 'ordered', 'unordered' ];
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

		// Header Section
		$this->start_controls_section(
			'header_content_section',
			[
				'label' => esc_html__( 'Header', 'AEFE' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Package Name
		$this->add_control(
			'package_name',
			[
				'label' => esc_html__( 'Pacakge Name', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Starter', 'AEFE' ),
				'placeholder' => esc_html__( 'Pacakge Name', 'AEFE' ),
			]
		);
		$this->end_controls_section();

		// Price Section
		$this->start_controls_section(
			'pacakge_price_section',
			[
				'label' => esc_html__( 'Price', 'AEFE' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Package Price Currency
		$this->add_control(
			'package_price_currency',
			[
				'label' => esc_html__( 'Currency', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '$', 'AEFE' ),
				'placeholder' => esc_html__( 'Currency', 'AEFE' ),
				'label_block' => true,
			]
		);	
		
		// Package Price
		$this->add_control(
			'package_price',
			[
				'label' => esc_html__( 'Price', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => esc_html__( '10', 'AEFE' ),
				'placeholder' => esc_html__( 'Price', 'AEFE' ),
				'label_block' => true,
			]
		);
		
				
		// Package Duration
		$this->add_control(
			'package_duration',
			[
				'label' => esc_html__( 'Duration', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '/m', 'AEFE' ),
				'placeholder' => esc_html__( 'Duration', 'AEFE' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// Package Content Section
		$this->start_controls_section(
			'pacakge_content_section',
			[
				'label' => esc_html__( 'Content', 'AEFE' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Package Feature list
		$this->add_control(
			'package_content',
			[
				'label' => esc_html__( 'Feature List', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,	
				'placeholder' => esc_html__( 'Pacakge Feature', 'AEFE' ),		
				
			]
		);
		
		$this->end_controls_section();

		// Package Footer Section
		$this->start_controls_section(
			'pacakge_footer_section',
			[
				'label' => esc_html__( 'Footer', 'AEFE' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Package Button Text
		$this->add_control(
			'pacakge_button_text',
			[
				'label' => esc_html__( 'Button Text', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Buy Now', 'AEFE' ),								
				'label_block' => true,
				'default'		=> esc_html('Buy Now', 'AEFE'),
			]
		);
		
		// Package Button URL
		$this->add_control(
			'pacakge_button_url',
			[
				'label' => esc_html__( 'Button URL', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'AEFE' ),					
				'label_block' => true,				
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

		if ( ! empty( $settings['pacakge_button_url']['url'] ) ) {
			$this->add_link_attributes( 'pacakge_button_url', $settings['pacakge_button_url'] );
		}
		?>

		<!--Single Price-->
		<div class="single-pricing-table floatleft">
			<div class="single-pricing-table-header">
				<h2><?php echo esc_html($settings['package_name']);?></h2>
			</div>
			<div class="single-pricing-price">
				<h2><sup><?php echo esc_html($settings['package_price_currency']);?></sup><?php echo esc_html($settings['package_price']);?><span><?php echo esc_html($settings['package_duration']);?></span></h2>
			</div>
			<div class="single-pricing-content">
				<?php echo wp_kses($settings['package_content'],  wp_kses_allowed_html('post'));?>
			</div>
			<div class="single-pricing-buy">
				<a <?php echo $this->get_render_attribute_string( 'pacakge_button_url' ); ?>><?php echo esc_html($settings['pacakge_button_text']);?></a>
			</div>
		</div><!--/ Single Price-->

<?php


	}


}