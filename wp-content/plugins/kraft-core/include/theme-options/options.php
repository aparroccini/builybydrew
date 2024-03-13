<?php

    /**
     * ReduxFramework      
     */

    if ( ! class_exists( 'Kraft_Theme_Options' ) ) {

        class Kraft_Theme_Options {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                $this->initSettings();
				
				add_action( 'redux/page/kraft_theme_settings/enqueue', array( $this, 'addPanelCustomCSS' ) );

            }

            public function initSettings() {

                // Set the default arguments
                $this->setArguments();               

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }
				
                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            public function setSections() {

                // ACTUAL DECLARATION OF SECTIONS     
				require_once KRAFT_CORE_PATH . 'include/theme-options/general.php';
				require_once KRAFT_CORE_PATH . 'include/theme-options/branding.php';	
			    require_once KRAFT_CORE_PATH . 'include/theme-options/menu.php';												
				require_once KRAFT_CORE_PATH . 'include/theme-options/typography.php';					
				require_once KRAFT_CORE_PATH . 'include/theme-options/portfolio.php';			
				require_once KRAFT_CORE_PATH . 'include/theme-options/blog.php';				
				require_once KRAFT_CORE_PATH . 'include/theme-options/social.php';				
				require_once KRAFT_CORE_PATH . 'include/theme-options/mapsettings.php';
				require_once KRAFT_CORE_PATH . 'include/theme-options/page404.php';
				require_once KRAFT_CORE_PATH . 'include/theme-options/footer.php';				
				require_once KRAFT_CORE_PATH . 'include/theme-options/customcss.php';
				
            }    
			
			function addPanelCustomCSS() {								

                wp_enqueue_style(
                    'kraft-redux-custom',
                    KRAFT_CORE_URL . 'assets/css/redux-custom.css',
					array( 'redux-admin-css' ),
					KRAFT_THEME_VERSION,
					'all'
                );

               	wp_enqueue_script(
                    'kraft-redux-custom',
                    KRAFT_CORE_URL . 'assets/js/redux-custom.js',
                    array( 'jquery', 'redux-js' ),
                    KRAFT_THEME_VERSION,
                    true
                );
			
			}
			
            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'           => 'kraft_theme_settings',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'       => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'    => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'          => 'submenu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'     => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'         => esc_html__( 'Theme Options', 'kraft' ),
                    'page_title'         => esc_html__( 'Theme Options', 'kraft' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'     => '',
                    // Must be defined to add google fonts to the typography module
					
					'disable_google_fonts_link' => true,

                    'async_typography'   => false,
                    // Use a asynchronous font on the front end or font string
                    'admin_bar'          => true,
                    // Show the panel pages on the admin bar
                    'global_variable'    => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'           => false,
                    // Show the time the page took to load, etc
                    'customizer'         => true,
                    // Enable basic customizer support

                    // OPTIONAL -> Give you extra features
                    'page_priority'      => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'        => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'   => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'          => '',
                    // Specify a custom URL to an icon
                    'last_tab'           => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'          => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'          => '_options',
                    // Page slug used to denote the panel
                    'save_defaults'      => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'       => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'       => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export' => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'     => 60 * MINUTE_IN_SECONDS,
                    'output'             => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'         => false,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'           => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'        => false,
                    // REMOVE

                    // HINTS
                    'hints'              => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );               
            }

        }

        global $kraft_reduxConfig;
        $kraft_reduxConfig = new Kraft_Theme_Options();
    }
