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
		//Single Or Repeater
		$this->start_controls_section(
			'aefe-tm-single-or-repeater',
			[
				'label' => esc_html__( 'Type', 'aefe' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'aefe-tm-repeater',
			[
				'label' => esc_html__( 'Type', 'aefe' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'single',
				'options' => [
					'single'  => esc_html__( 'Single', 'aefe' ),
					'repeater' => esc_html__( 'Repeater', 'aefe' ),
				],
			]
		);
		$this->end_controls_section(); // End the Single Or Repeater Option

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

		?>

	       <!-- Our Talent Team Area-->
           <section class="our-talent-team-area fix" id="out_team">
           <div class="our-talent-team column section-margin">
               <!--Our Talent Team Bottom/Content-->
               <div class="ourtalent-team-bottom">
                    <div class="our-talent-slider-content owl-carousel">
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">HASI KHUSI</a></h2>
                                <h3>Advisor of Team</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member-1.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">AHMED AMIR</a></h2>
                                <h3>Head of Office</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member-2.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">RANIA ASKHAR</a></h2>
                                <h3>UI/UX Designer</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member-3.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">CHIRO KUMAR</a></h2>
                                <h3>Developer</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">HASI KHUSI</a></h2>
                                <h3>Advisor of Team</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member-1.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">AHMED AMIR</a></h2>
                                <h3>Head of Office</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member-2.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">RANIA ASKHAR</a></h2>
                                <h3>UI/UX Designer</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                        <!--Single Team Member-->
                        <div class="single-team-member">
                            <div class="single-team-member-picture">
                                <a href=""><img src="<?php echo AEFE_URL ?>/assets/img/single-team-member-3.png" alt=""></a>
                            </div>
                            <div class="single-team-member-name">
                                <h2><a href="">CHIRO KUMAR</a></h2>
                                <h3>Developer</h3>
                            </div>
                            <div class="single-team-member-social">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div><!--/ Single Team Member-->
                    </div>
               </div><!--/ Our Talent Team Bottom/Content-->
           </div>
       </section><!--/ Our Talent Team Area-->



<?php


	}


}