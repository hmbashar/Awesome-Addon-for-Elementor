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
		return esc_html__( 'Skills', AEFE_TEXTDOMAIN );
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
		return 'eicon-code';
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
		return [ 'services', 'our services', 'skill', 'profession' ];
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
				'label' => esc_html__( 'Content', AEFE_TEXTDOMAIN ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,				
			]
		);
		$this->add_control(
			'aefe_skills_template_style',
			[
				'label' => esc_html__( 'Style', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [					
					'aefe_skill_style_one' => esc_html__( 'Style One', AEFE_TEXTDOMAIN ),					
				],
				'default' => 'aefe_skill_style_one',

			]
		);

		// Title
		$this->add_control(
			'aefe-skills-title',
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
		$this->add_control(
			'aefe-skills-subtitle',
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
		
		// Percentage
		$this->add_control(
			'aefe-skills-percentage',
			[
				'label' => esc_html__( 'Level', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::NUMBER,				
				'placeholder' => esc_html__( 'How much percentage?', AEFE_TEXTDOMAIN ),	
				'label_block' => true,			
			]
		);

        // Logo
        $this->add_control(
			'aefe-skills-logo',
			[
				'label' => esc_html__( 'Logo', AEFE_TEXTDOMAIN ),
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
				'label' => esc_html__( 'Content', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		

		$this->end_controls_section();

		//Skill Style
		$this->start_controls_section(
			'aefe_skill_1_style_section',
			[
				'label' => esc_html__( 'Style', AEFE_TEXTDOMAIN ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		

		// Skill Style
		$this->add_control(
			'aefe_skill_1_style', [
				'label' => esc_html__( 'This Features will be available in the next update', AEFE_TEXTDOMAIN ),
				'type' => \Elementor\Controls_Manager::HEADING,			
				
			]
		);




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

			if(!empty($settings['aefe_skills_template_style']) && 'aefe_skill_style_one' == $settings['aefe_skills_template_style']) {
				include 'skill-style-one.php';
			}
			
			//include 'skill-style-two.php';

	?>


<?php	

	}

}