<?php
/**
 * Created by PhpStorm.
 * User: Jonathan.Guenz
 * Date: 27.02.2019
 * Time: 22:23
 */

global $wpdb;

$user = wp_get_current_user();

?>

<link href="<?php echo plugins_url() . '/makerspace-tischkicker/src/assets/styles/main.css' ?>" rel="stylesheet">

<div class="container-fluid mb-5">
    <div class="row">
        <div class="col">
            <div class="card" style="max-width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Hinweise zur Spielaufzeichnung</h5>
                    <p class="card-text">
                        Der Spaß am Spiel steht immer im Vordergrund. Die Spieleaufzeichnung soll keine Rivalitäten oder Konkurenzen fördern.
                        Sollten es zu extremen Konkurenzdenken bei den Spielenden kommen, behalten wir uns vor die Spieleaufzeichnung abzuschalten.
                    </p>
                    <p>
                        Der Tischkicker soll immer ein Ort sein, an dem alle zusammen kommen und abschalten können.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="container-fluid mb-5" id="championships">
    <div class="row">
        <div class="col"><h2 class="text-uppercase">Laufende Wettbewerbe</h2></div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-img-top bg-secondary" style="background-image: url('#'); min-width: 100%; min-height: 120px;"></div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<?php

    $sql_unapproved_games = "SELECT * FROM makerspace_tischkicker_games WHERE player_two = %d AND approved = 0";
    $entries = $wpdb->get_results( $wpdb->prepare($sql_unapproved_games, $user->ID) );

    if(count($entries) > 0):
?>
<div class="container-fluid mb-5" id="unapproved-games">
    <div class="row">
        <div class="col"><h2 class="text-uppercase">Bitte bestätige die folgenden Spiele</h2></div>
    </div>
    <div class="row">
        <div class="col">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action list-group-header">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="" style="width: 150px">Gegner*in</div>
                        <div class="" style="width: 200px;">Tore Gegner*in</div>
                        <div class="" style="width: 200px;">Meine Tore</div>
                        <div class="" style="width: 50%;">Erfasst am</div>
                        <div class="" style="width: 50%;">Aktionen</div>
                    </div>
                </a>

                <?php foreach ($entries as $entry): ?>
                <a class="list-group-item list-group-item-action list-group-header">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="" style="width: 150px"><?php echo ( get_userdata( $entry->player_one ) )->display_name ?></div>
                        <div class="" style="width: 200px;"><?php echo $entry->result_player_two ?></div>
                        <div class="" style="width: 200px;"><?php echo $entry->result_player_one ?></div>
                        <div class="" style="width: 50%;"><?php echo date('d.m.Y H:i', strtotime($entry->game_date)) ?></div>
                        <div class="" style="width: 50%;">
                            <button onclick="window.location.href = '/wp-admin/admin.php?page=ms_tischkicker&ms-tk-approve-game=<?php echo $entry->game_id ?>'"
                                    type="button"
                                    class="btn btn-outline-success btn-sm">Spiel ist korrekt</button>
                            <button type="button" class="btn btn-outline-danger btn-sm">Spiel ist nicht korrekt</button>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php

    $sql_games = "SELECT * FROM makerspace_tischkicker_games WHERE approved = 1";
    $entries = $wpdb->get_results( $sql_games );

    $players = array();

    foreach ($entries as $entry) {
        $competitors = array(
                array("ID" => $entry->player_one, "games_completed" => 0, "games_won" => 0, "games_lost" => 0, "games_tie" => 0, "total_goals" => 0),
                array("ID" => $entry->player_two, "games_completed" => 0, "games_won" => 0, "games_lost" => 0, "games_tie" => 0, "total_goals" => 0)
        );

        for ($i = 0; $i < 2; $i++) {
            if ( $players[$competitors[$i]["ID"]]) { $competitors[$i] = $players[ $competitors[$i]["ID"] ]; }

            $competitors[$i]["games_completed"] ++;
        }

        $competitors[0]["total_goals"] += $entry->result_player_one;
        $competitors[1]["total_goals"] += $entry->result_player_two;


        if ($entry->result_player_one > $entry->result_player_two) {
            $competitors[0]["games_won"]++;
            $competitors[1]["games_lost"]++;
        }
        elseif ($entry->result_player_one < $entry->result_player_two) {
            $competitors[1]["games_won"]++;
            $competitors[0]["games_lost"]++;
        } else {
            $competitors[1]["games_tie"]++;
            $competitors[0]["games_tie"]++;
        }

        $players[$competitors[0]["ID"]] = $competitors[0];
        $players[$competitors[1]["ID"]] = $competitors[1];


    }

?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-uppercase">Aktuelle Rangliste</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action list-group-header">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="" style="width: 150px">Platz</div>
                        <div class="" style="width: 100%">Name</div>
                        <div class="" style="width: 150px">Spiele</div>
                        <div class="" style="width: 150px">Siege</div>
                        <div class="" style="width: 200px">Unentschieden</div>
                        <div class="" style="width: 200px">Niederlagen</div>
                        <div class="" style="width: 200px">Tore gesamt</div>
                        <div class="" style="width: 200px">Tore Durchschnitt</div>
                        <div class="" style="width: 150px">Score</div>
                    </div>
                </a>


                <?php foreach ($players as $player): ?>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="" style="width: 150px">1</div>
                        <div class="" style="width: 100%"><?php echo ( get_userdata( $player["ID"] ))->display_name  ?></div>
                        <div class="" style="width: 150px"><?php echo $player["games_completed"] ?></div>
                        <div class="" style="width: 150px"><?php echo $player["games_won"] ?></div>
                        <div class="" style="width: 200px"><?php echo $player["games_tie"] ?></div>
                        <div class="" style="width: 200px"><?php echo $player["games_lost"] ?></div>
                        <div class="" style="width: 200px"><?php echo $player["total_goals"] ?></div>
                        <div class="" style="width: 200px"><?php echo ($player["total_goals"] / $player["games_completed"] ) ?></div>
                        <div class="" style="width: 150px">1540</div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
