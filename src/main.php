<?php


if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if ( ! class_exists( 'Makerspace_Tischkicker' ) ) {

    require_once 'tischkicker.php';

    class Makerspace_Tischkicker {

        const VERSION = '1.0.0';

        protected static $instance;

        public static function instance() {
            if ( ! self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        function register_admin_menu () {
            add_menu_page(
                'Tischkicker',
                'Tischkicker',
                'read',
                'ms_tischkicker',
                array('Tischkicker', 'Page_Tischkicker_Main')
            );
        }

        function register_script_styles () {
            //wp_register_style('makerspace_tischkicker_styles', plugins_url('assets/styles/main.css'));
            //wp_enqueue_style( 'makerspace_tischkicker_styles' );
        }

        function __construct() {
            add_action('admin_menu', array($this, 'register_admin_menu') );
        }

        public static function activate() {


        }

        public static function deactivate( $network_deactivating ) {

        }
    }

}