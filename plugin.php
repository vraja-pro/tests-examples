<?php
/**
 * Plugin Name: Simple Calculator Plugin
 * Description: A WordPress plugin that provides a shortcode to render a React-based form for adding two numbers.
 * Version: 1.0.0
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-calculator.php';

function simple_calculator_plugin_register() {
    $calculator = new Calculator();
    $calculator->register();
}
add_action( 'plugins_loaded', 'simple_calculator_plugin_register' );
