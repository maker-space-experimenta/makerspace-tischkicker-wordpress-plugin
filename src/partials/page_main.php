<?php
/**
 * Created by PhpStorm.
 * User: Jonathan.Guenz
 * Date: 27.02.2019
 * Time: 22:23
 */



?>

<link href="<?php echo plugins_url() . '/makerspace-tischkicker-wordpress-plugin/src/assets/styles/main.css' ?>" rel="stylesheet">

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

<div class="container-fluid mb-5" id="championships">
    <div class="row">
        <div class="col"><h2 class="text-uppercase">Meine unbestätigten Spiele</h2></div>
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

                <a href="#" class="list-group-item list-group-item-action list-group-header">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="" style="width: 150px">Caro</div>
                        <div class="" style="width: 200px;">10</div>
                        <div class="" style="width: 200px;">5</div>
                        <div class="" style="width: 50%;">27. 02. 2019 16:30</div>
                        <div class="" style="width: 50%;">
                            <button type="button" class="btn btn-outline-success btn-sm">Spiel ist korrekt</button>
                            <button type="button" class="btn btn-outline-danger btn-sm">Spiel ist nicht korrekt</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<?php

    $users = get_users();
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
                        <div class="" style="width: 150px">Score</div>
                    </div>
                </a>


                <?php foreach ($users as $player): ?>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="" style="width: 150px">1</div>
                        <div class="" style="width: 100%"><?php echo $player->display_name  ?></div>
                        <div class="" style="width: 150px">102</div>
                        <div class="" style="width: 150px">70</div>
                        <div class="" style="width: 200px">22</div>
                        <div class="" style="width: 200px">10</div>
                        <div class="" style="width: 150px">1540</div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
