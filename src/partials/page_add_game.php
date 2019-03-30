


<link href="<?php echo plugins_url() . '/makerspace-tischkicker-wordpress-plugin/src/assets/styles/main.css' ?>" rel="stylesheet">

<form action="/wp-admin/admin.php?page=ms_tischkicker" method="post">

<div class="container-fluid mb-5">
    <div class="row">
        <div class="col"><h2 class="text-uppercase">Spiel erfassen</h2></div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card w-100 d-block" style="max-width: 5000px !important;">

            <div class="form-group row">
                <label class="col-3" for="ms-tk-opponent-id">Gegner</label>
                <select id="ms-tk-opponent-id" name="ms-tk-opponent-id" class="col form-control">
                    <?php $users = get_users(); ?>
                    <?php foreach ($users as $player): ?>
                        <option value="<?php echo $player->id ?>"><?php echo $player->display_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row mt-5">
                <label class="col-3">Punkte Gegner</label>


                <div class="col d-flex ms-tk-goal-counter">

                    <div style="z-index: 10; height: 20px; width: 98%; background: rgb(20, 20, 20); position: absolute; top: 50%; margin-top: -10px; ">
                        <div style="z-index: 10; height: 10px; width: 100%; background: rgb(50, 50, 50); position: absolute; top: 50%; margin-top: -5px; "></div>
                    </div>


                    <input class="d-none" type="radio" id="ms-tk-opponent-goals-0" name="ms-tk-opponent-goals">
                    <label class="ts-radio-counter-stoper"  for="ms-tk-opponent-goals-0">
                        <div class="ts-radio-counter-stoper-inner d-flex justify-content-center align-items-center">
                            <div class="ts-radio-counter-stoper-screw" style="">+</div>
                        </div>
                    </label>

                    <?php for($i = 0; $i < 10; $i++): ?>
                        <input class="d-none" type="radio" id="ms-tk-opponent-goals-<?php echo $i ?>" name="ms-tk-opponent-goals-<?php echo $i ?>">
                        <label style="z-index: 20;" class="ts-radio-counter-stoper tk-radio-counter d-flex justify-content-center align-items-center" for="ms-tk-opponent-goals-<?php echo $i ?>">
                            <span class="text-center ts-radio-counter-stoper-inner"><?php echo $i + 1 ?></span>
                        </label>
                    <?php endfor; ?>

                    <div class="ts-radio-counter-stoper">
                        <div class="ts-radio-counter-stoper-inner d-flex justify-content-center align-items-center">
                            <div class="ts-radio-counter-stoper-screw">+</div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-5">
                <label class="col-3">Eigene Punkte</label>

                <div class="col d-flex ms-tk-goal-counter">

                    <div style="z-index: 10; height: 20px; width: 98%; background: rgb(20, 20, 20); position: absolute; top: 50%; margin-top: -10px; ">
                        <div style="z-index: 10; height: 10px; width: 100%; background: rgb(50, 50, 50); position: absolute; top: 50%; margin-top: -5px; "></div>
                    </div>


                    <input class="d-none" type="radio" id="ms-tk-my-goals-0" name="ms-tk-my-goals">
                    <label class="ts-radio-counter-stoper"  for="ms-tk-opponent-goals-0">
                        <div class="ts-radio-counter-stoper-inner d-flex justify-content-center align-items-center">
                            <div class="ts-radio-counter-stoper-screw" style="">+</div>
                        </div>
                    </label>

                    <input class="d-none" type="radio" id="ms-tk-my-goals-0" name="ms-tk-my-goals">
                    <label style="z-index: 20;" class="ts-radio-counter-stoper tk-radio-counter d-flex justify-content-center align-items-center" 
                           for="ms-tk-my-goals-0">
                        <span class="text-center ts-radio-counter-stoper-inner">0</span>
                    </label>

                    <?php for($i = 1; $i < 10; $i++): ?>
                        <input class="d-none" type="radio" id="ms-tk-my-goals-<?php echo $i ?>" name="ms-tk-my-goals-<?php echo $i ?>">
                        <label style="z-index: 20;" class="ts-radio-counter-stoper tk-radio-counter d-flex justify-content-center align-items-center" for="ms-tk-my-goals-<?php echo $i ?>">
                            <span class="text-center ts-radio-counter-stoper-inner"><?php echo $i + 1 ?></span>
                        </label>
                    <?php endfor; ?>

                    <div class="ts-radio-counter-stoper">
                        <div class="ts-radio-counter-stoper-inner d-flex justify-content-center align-items-center">
                            <div class="ts-radio-counter-stoper-screw">+</div>
                        </div>
                    </div>

                </div>
            </div>
            </div>

        </div>
        <div class="col-3">
            <div class="card p-0">
                <div class="card-header">
                    Spiel speichern
                </div>
                <div class="card-body">
                    <p>
                        Das Spiel speichern und dem Gegner zum bestätigen vorlegen. Erst wenn der Gegner bestätigt hat, wird das Spiel eingetragen.
                    </p>
                </div>

                <div class="card-footer text-muted d-flex justify-content-end">
                    <button type="submit" class="card-link btn btn-sm btn-outline-primary">speichern</button>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
