<?php
/**
 * Countdown_Cdt_Settings_Field
 *
 * @author Farid Mia
 */
if ( !class_exists( 'Countdown_Cdt_Settings_Field' ) ):
    class Countdown_Cdt_Settings_Field {

        private $settings_api;

        function __construct() {
            $this->settings_api = new Countdown_Cdt_Setting_Api;

            add_action( 'admin_init', array( $this, 'cdt_countdown_admin_init' ) );
            add_action( 'admin_menu', array( $this, 'cdt_countdown_admin_menu' ) );

        }

        public function cdt_countdown_admin_init() {

            //set the settings
            $this->settings_api->set_sections( $this->get_settings_sections() );
            $this->settings_api->set_fields( $this->get_settings_fields() );

            //initialize settings
            $this->settings_api->admin_init();

        }

        public function cdt_countdown_admin_menu() {
            add_options_page( 'Countdown Timer Infinite', 'Countdown Timer Infinite', 'delete_posts', 'countdown_timer_cdt', array( $this, 'countdowncdt_plugin_page' ) );
        }

        public function get_settings_sections() {
            $sections = array(
                array(
                    'id'    => 'cdt_inf_basics',
                    'title' => __( 'Basic Settings', 'countdown-infinite' ),
                ),
                array(
                    'id'    => 'cdt_inf_color',
                    'title' => __( 'Advanced Settings', 'countdown-infinite' ),
                ),
            );
            return $sections;
        }

        /**
         * Returns all the settings fields
         *
         * @return array settings fields
         */
        public function get_settings_fields() {
            $tab_settings_fields = array(
                'cdt_inf_basics' => array(
                    array(
                        'name'    => 'heading_off_off',
                        'label'   => __( 'Heading ON/OFF', 'countdown-infinite' ),
                        'type'    => 'checkbox',
                        'default' => 'on',
                    ),
                    array(
                        'name'              => 'countdown_heading',
                        'label'             => __( 'Countdown Heading', 'countdown-infinite' ),
                        'default'           => __( "stay turned for something amazing", "countdown-infinite" ),
                        'type'              => 'text',
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                    array(
                        'name'    => 'cdt_date',
                        'label'   => __( 'Date', 'countdown-infinite' ),
                        'desc'    => __( 'Date Select Here', 'countdown-infinite' ),
                        'type'    => 'date',
                    ),
                    array(
                        'name'              => 'countdown_shortcode',
                        'label'             => __( 'Shortcode', 'countdown-infinite' ),
                        'desc'              => __( 'Add Shortcode in pages, articles or widgets', 'countdown-infinite' ),
                        'type'              => 'textarea',
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                    array(
                        'name'              => 'container_padding',
                        'label'             => __( 'Container Padding', 'countdown-infinite' ),
                        'default'           => __( '20px', 'countdown-infinite' ),
                        'type'              => 'text',
                        'size'              => '15px',
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                    array(
                        'name'              => 'cdt_title_margin',
                        'label'             => __( 'Title Margin', 'countdown-infinite' ),
                        'default'           => __( '20px', 'countdown-infinite' ),
                        'type'              => 'text',
                        'size'              => '15px',
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                    array(
                        'name'              => 'cdt_title_font_size',
                        'label'             => __( 'Heading Font Size', 'countdown-infinite' ),
                        'default'           => __( '80px', 'countdown-infinite' ),
                        'type'              => 'text',
                        'size'              => '15px',
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                    array(
                        'name'              => 'cdt_date_font_size',
                        'label'             => __( 'Date Font Size', 'countdown-infinite' ),
                        'default'           => __( '40px', 'countdown-infinite' ),
                        'type'              => 'text',
                        'size'              => '15px',
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                    array(
                        'name'              => 'date_title_font_size',
                        'label'             => __( 'Date Title Font Size', 'countdown-infinite' ),
                        'default'           => __( '18px', 'countdown-infinite' ),
                        'type'              => 'text',
                        'size'              => '12px',
                        'sanitize_callback' => 'sanitize_text_field',
                    ),

                ),
                'cdt_inf_color'  => array(
                    array(
                        'name'    => 'background_color',
                        'label'   => __( 'Background Color', 'countdown-infinite' ),
                        'desc'    => __( 'Wrapper Background Color select', 'countdown-infinite' ),
                        'type'    => 'color',
                    ),
                    array(
                        'name'    => 'title_color',
                        'label'   => __( 'Heading Color', 'countdown-infinite' ),
                        'desc'    => __( 'Heading Color Select', 'countdown-infinite' ),
                        'type'    => 'color',
                    ),
                    array(
                        'name'    => 'date_color',
                        'label'   => __( 'Date Color', 'countdown-infinite' ),
                        'desc'    => __( 'Date Color Select', 'countdown-infinite' ),
                        'type'    => 'color',
                    ),
                    array(
                        'name'    => 'date_title_color',
                        'label'   => __( 'Date Title Color', 'countdown-infinite' ),
                        'desc'    => __( 'Date Title Color Select', 'countdown-infinite' ),
                        'type'    => 'color',
                    ),
                ),
            );

            return $tab_settings_fields;
        }

        public function countdowncdt_plugin_page() {
            echo '<div class="cdt-wrap">';
            $this->settings_api->cdt_show_navigation();
            $this->settings_api->cdt_show_forms();

            echo '</div>';
        }

        /**
         * Get all the pages
         *
         * @return array page names with key value pairs
         */
        public function get_pages() {
            $pages         = get_pages();
            $pages_options = array();
            if ( $pages ) {
                foreach ( $pages as $page ) {
                    $pages_options[$page->ID] = $page->post_title;
                }
            }

            return $pages_options;
        }

    }
endif;
