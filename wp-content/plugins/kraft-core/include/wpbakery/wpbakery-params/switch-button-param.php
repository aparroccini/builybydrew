<?php

if( !class_exists( 'Kraft_Switch_Button_Param' ) ) {

	class Kraft_Switch_Button_Param {
	
		function __construct() {	
			
			vc_add_shortcode_param( 'switch_button' , array( $this, 'checkbox_param' ) );						
		}

		function checkbox_param( $settings, $value ) {
			
			$dependency = '';
			$output = $checked = '';
			
			$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
			$type = isset( $settings['type'] ) ? $settings['type'] : '';
			$options = isset( $settings['options'] ) ? $settings['options'] : '';
			$class = isset( $settings['class'] ) ? $settings['class'] : '';
					
			$un = uniqid( 'switch-'.rand() );
								
			if( is_array( $options ) && !empty( $options ) ) {
				
				if( $value == 'on' ) {
					$checked = "checked";
				} else {
					$checked = "";
				}
			
				$uid = uniqid( 'switchparam-'.rand() );
					
				$output .= '<div class="onoffswitch">
						<input type="checkbox" name="'.$param_name.'" value="'.$value.'" '.$dependency.' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . ' '.$dependency.' onoffswitch-checkbox chk-switch-'.$un.'" id="switch'.$uid.'" '.$checked.'>
						<label class="onoffswitch-label" for="switch'.$uid.'">
							<div class="onoffswitch-inner">
								<div class="onoffswitch-active">
									<div class="onoffswitch-switch">'.$options['on'].'</div>
								</div>
								<div class="onoffswitch-inactive">
									<div class="onoffswitch-switch">'.$options['off'].'</div>
								</div>
							</div>
						</label>
					</div>';					
			}				
		
			$output .= '<script type="text/javascript">
				jQuery("#switch'.$uid.'").change(function(){

					 if(jQuery("#switch'.$uid.'").is(":checked")){
						jQuery("#switch'.$uid.'").val("on");
						jQuery("#switch'.$uid.'").attr("checked","checked");
					 } else {
						jQuery("#switch'.$uid.'").val("off");
						jQuery("#switch'.$uid.'").removeAttr("checked");
					 }

				});
			</script>';

			return $output;
			
		}

	}
}

if( class_exists( 'Kraft_Switch_Button_Param' ) ) {
	
	$Kraft_Switch_Button_Param = new Kraft_Switch_Button_Param();
}
