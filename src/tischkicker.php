<?php
/**
 * Created by PhpStorm.
 * User: Jonathan.Guenz
 * Date: 27.02.2019
 * Time: 22:15
 */


class Tischkicker {

    public static function Page_Tischkicker_Main()
    {
        self::SaveGame();
        self::ApproveGame();
        require 'partials/page_main.php';
    }

    public static function Page_Tischkicker_Add_Game () {
        require 'partials/page_add_game.php';
    }

    public static function SaveGame() {

        if(!$_POST["ms-tk-opponent-id"]) {
            return;
        }

        $user = wp_get_current_user();
        $opponent = $_POST["ms-tk-opponent-id"];
        $opponent_goals = 0;
        $my_goals = 0;

        if ($_POST["ms-tk-opponent-goals-1"]) { $opponent_goals = 1; }
        elseif ($_POST["ms-tk-opponent-goals-2"]) { $opponent_goals = 2; }
        elseif ($_POST["ms-tk-opponent-goals-3"]) { $opponent_goals = 3; }
        elseif ($_POST["ms-tk-opponent-goals-4"]) { $opponent_goals = 4; }
        elseif ($_POST["ms-tk-opponent-goals-5"]) { $opponent_goals = 5; }
        elseif ($_POST["ms-tk-opponent-goals-6"]) { $opponent_goals = 6; }
        elseif ($_POST["ms-tk-opponent-goals-7"]) { $opponent_goals = 7; }
        elseif ($_POST["ms-tk-opponent-goals-8"]) { $opponent_goals = 8; }
        elseif ($_POST["ms-tk-opponent-goals-9"]) { $opponent_goals = 9; }
        elseif ($_POST["ms-tk-opponent-goals-10"]) { $opponent_goals = 10; }


        if ($_POST["ms-tk-my-goals-1"]) { $my_goals = 1; }
        elseif ($_POST["ms-tk-my-goals-2"]) { $my_goals = 2; }
        elseif ($_POST["ms-tk-my-goals-3"]) { $my_goals = 3; }
        elseif ($_POST["ms-tk-my-goals-4"]) { $my_goals = 4; }
        elseif ($_POST["ms-tk-my-goals-5"]) { $my_goals = 5; }
        elseif ($_POST["ms-tk-my-goals-6"]) { $my_goals = 6; }
        elseif ($_POST["ms-tk-my-goals-7"]) { $my_goals = 7; }
        elseif ($_POST["ms-tk-my-goals-8"]) { $my_goals = 8; }
        elseif ($_POST["ms-tk-my-goals-9"]) { $my_goals = 9; }
        elseif ($_POST["ms-tk-my-goals-10"]) { $my_goals = 10; }

        global $wpdb;

        $sql = "
                INSERT INTO makerspace_tischkicker_games 
                  ( player_one, player_two, game_date, result_player_one, result_player_two )
                  VALUES (%d, %d, NOW(), %d, %d )
            ";

        $wpdb->get_results( $wpdb->prepare($sql, $user->ID, $opponent, $my_goals, $opponent_goals) );
        echo '<div class="bg-success">Spiel erfolgreich gespeichert</div>';
    }

    public static function ApproveGame() {
        if(!$_GET["ms-tk-approve-game"]) {
            return;
        }
        global $wpdb;
        $user = wp_get_current_user();

        $sql_game = "UPDATE makerspace_tischkicker_games set approved = 1 WHERE player_two = %d AND game_id = %d";
        if ($wpdb->query( $wpdb->prepare($sql_game, $user->ID, $_GET["ms-tk-approve-game"]) )) {
            echo '<div class="bg-success">Spiel erfolgreich bestätigt</div>';
        }
    }

}