<?php


if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if ( ! class_exists( 'Makerspace_Tischkicker' ) ) {

    require_once plugin_dir_path( __FILE__ ) . '/tischkicker.php';

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

            add_submenu_page(
                'ms_tischkicker',
                'Spiel erfassen',
                'Spiel erfassen',
                'read',
                'ms_tischkicker_add_game',
                array('Tischkicker', 'Page_Tischkicker_Add_Game'));
        }

        function register_script_styles () {
            //wp_register_style('makerspace_tischkicker_styles', plugins_url('assets/styles/main.css'));
            //wp_enqueue_style( 'makerspace_tischkicker_styles' );
        }

        function __construct() {
            add_action('admin_menu', array($this, 'register_admin_menu') );
        }

        public static function activate() {
            global $wpdb;

            $sql = "
                CREATE TABLE IF NOT EXISTS makerspace_tischkicker_games (
                  game_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                  player_one BIGINT(20) NOT NULL,
                  player_two BIGINT(20) NOT NULL,
                  approved BOOLEAN NOT NULL DEFAULT 0,
                  game_date DATETIME,
                  result_player_one TINYINT(1) NOT NULL DEFAULT 0,
                  result_player_two TINYINT(1) NOT NULL DEFAULT 0
                )
            ";

            $wpdb->get_results( $sql );

        }

        public static function deactivate( $network_deactivating ) {

        }
    }

}