<?php
/**
 * Registers the contact form 7 shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Contact_Form_7 extends Widget_Base {
	
	public function get_name() {
		return 'kraft-contact-form-7-widget';
	}

	public function get_title() {
		return esc_html__( 'Contact Form 7', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-mail';
	}		
	
	public function get_categories() {		
		return [ 'kraft' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
			]
		);	
		
		$this->add_control(
			'cf7_id',
			[
				'label' => esc_html__( 'Select Contact Form', 'kraft' ),
                'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'kraft' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => false,
				'label_block' => 1,
				'options' => kraft_get_contact_form_7_posts(),
			]
		);					
							
		$this->end_controls_section();	

	}

	protected function render( $instance = [] ) {	

		$params = $this->get_settings_for_display();	
	?>
		<div class="clbr-cf7-wrapper">

			<?php if( ! empty( $params[ 'cf7_id' ] ) ) { ?>			
				<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $params[ 'cf7_id' ] ) . '" ]' ); ?>				
			<?php } else { ?>			
				<div class="cf7-not-found">Please select the Contact Form</div>
			<?php }	?>

		</div>

	<?php }

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Contact_Form_7() );
