


<link href="<?php echo plugins_url() . '/makerspace-tischkicker-wordpress-plugin/src/assets/styles/main.css' ?>" rel="stylesheet">

<form>

<div class="container-fluid mb-5">
    <div class="row">
        <div class="col"><h2 class="text-uppercase">Spiel erfassen</h2></div>
    </div>
    <div class="row">
        <div class="col">
                <div class="form-group">
                    <label for="ms-tk-opponent-id">Gegner</label>
                    <select id="ms-tk-opponent-id" name="ms-tk-opponent-id" class="form-control">
                        <?php $users = get_users(); ?>
                        <?php foreach ($users as $player): ?>
                            <option value="<?php echo $player->id ?>"><?php echo $player->display_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
        </div>
        <div class="col">

                <div class="d-flex">

                    <div style="z-index: 10; height: 20px; width: 80%; background: rgb(20, 20, 20); position: absolute; top: 50%; margin-top: -20px; ">
                        <div style="z-index: 10; height: 10px; width: 100%; background: rgb(50, 50, 50); position: absolute; top: 50%; margin-top: -5px; "></div>
                    </div>

                    <div class="ts-radio-counter-stoper">
                        <div class="ts-radio-counter-stoper-inner d-flex justify-content-center align-items-center">
                            <div class="ts-radio-counter-stoper-screw" style="">+</div>
                        </div>
                    </div>

                    <?php for($i = 0; $i < 10; $i++): ?>
                    <input class="d-none" type="radio" id="ms-tk-opponent-goals-<?php echo $i ?>" name="ms-tk-opponent-goals">
                    <label style="z-index: 20;" class="tk-radio-counter d-flex justify-content-center align-items-center" for="ms-tk-opponent-goals-<?php echo $i ?>">
                        <span class="text-center"><?php echo $i + 1 ?></span>
                    </label>
                    <?php endfor; ?>

                    <div class="ts-radio-counter-stoper">
                        <div class="ts-radio-counter-stoper-inner d-flex justify-content-center align-items-center">
                            <div class="ts-radio-counter-stoper-screw">+</div>
                        </div>
                    </div>

                </div>

<!--
                <div class="form-group">
                    <label for="ms-tk-opponent">Spielstand Gegner</label>
                    <input type="number" id="ms-tk-opponent-goals" name="ms-tk-opponent-goals" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="ms-tk-my-goals">Eigener Spielstand</label>
                    <input type="number" id="ms-tk-my-goals" name="ms-tk-my-goals" class="form-control" />
                </div>

                <button type="submit" class="btn btn-primary">Spiel erfassen</button>
 -->       </div>
    </div>
</div>

</form>
