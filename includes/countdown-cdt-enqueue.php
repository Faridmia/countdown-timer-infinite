<?php
class Countdown_Cdt_Enqueue {

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'countdowncdt_enqueue_scripts'));

    }

    public function countdowncdt_enqueue_scripts()
	{

        wp_enqueue_style('countdown-front-css', COUNTDOWNCDT_CORE_ASSETS . 'assets/front/css/countdown.css', '', COUNTDOWNCDT_VERSION,false );
        wp_enqueue_script( 'countdown-front-js', COUNTDOWNCDT_CORE_ASSETS . 'assets/front/js/countdown.js', array( 'jquery' ), COUNTDOWNCDT_VERSION, true );

        if ( function_exists( 'countdowncdt_get_custom_color' ) ) {
			wp_add_inline_style( 'countdown-front-css', countdowncdt_get_custom_color() );
		}
	}
}

new Countdown_Cdt_Enqueue();