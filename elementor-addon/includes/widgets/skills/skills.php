<?php
namespace AEFE_ELEMENTOR\AEFESkills;

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
class AEFE_Skills extends \Elementor\Widget_Base {

	 
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
		return 'aefe-skills';
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
		return esc_html__( 'Skills', 'aefe' );
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
		return [ 'services', 'our services', 'skill' ];
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
			'aefe-skills_section',
			[
				'label' => esc_html__( 'Content', 'aefe' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,				
			]
		);


		// Title
		$this->add_control(
			'aefe-skills-title',
			[
				'label' => esc_html__( 'Title', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Title Name', 'AEFE' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		// subtitle
		$this->add_control(
			'aefe-skills-subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'AEFE' ),
				'type' => \Elementor\Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Subtitle', 'AEFE' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

        // Logo
        $this->add_control(
			'aefe-skills-logo',
			[
				'label' => esc_html__( 'Logo', 'aefe' ),
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
        $this->add_control(
			'aefe-skills-content',
			[
				'label' => esc_html__( 'Content', 'aefe' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
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

			//load render view to show widget output on frontend/website.
			//include 'skill-style-one.php';

	?>
	<!-- Skill bar Style Two Start -->
	<div class="aefe-skill-bar-style-two">		
		<div class="aefe_single_skill_st_bar_item">
			<div class="aefe_st_skill-bar">
				<p>HTML &amp; CSS</p>
				<div class="aefe_sk_st_progressbar" data-perc="85%">
					<div class="aefe_skst_bar"></div>
					<span class="aefe_skill_bar_st_label">85</span>
				</div>
			</div>
		</div>
	</div><!--/ Skill bar Style Two Start -->

<?php	

	}

}