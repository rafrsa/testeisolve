<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-right">
                <h5><?= $this->session->user_fullname ?></h5>
                <div class="pull-right"><a id="btnLogout" href="#"><img src="../../../public/images/logout.png"></a></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"><h2>Usuários</h2></div>
    </div>

    <hr>

    <input type="hidden" id="hd_id" value="<?= $edit ?>"/>
    <?php
    if($edit == 1 || $edit == 3) {
    ?>
        <div class="form-group row">
            <label for="txtID" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="txtID" value="<?= $user[0]['user_id'] ?>">
            </div>
        </div>
    <?php } ?>

    <div class="form-group row">
        <label for="txtFullname" class="col-sm-2 col-form-label">Nome Completo</label>
        <div class="col-sm-5">
            <input type="text" <?= $edit == 3 ? 'readonly' : '' ?> class="form-control" id="txtFullname" value="<?= $edit == 1 || $edit == 3 ? $user[0]['user_fullname'] : '' ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="txtEmail" class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-5">
            <input type="email" <?= $edit == 3 ? 'readonly' : '' ?> class="form-control" id="txtEmail" value="<?= $edit == 1 || $edit == 3 ? $user[0]['user_email'] : '' ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="txtDatePicker" class="col-sm-2 col-form-label">Data de Nascimento</label>
        <div class="col-sm-5">
            <input type="text" class="form-control"  <?= $edit == 1 || $edit == 3 ? 'readonly' : 'id="txtDatePicker"' ?>  value="<?= $edit == 1 || $edit == 3 ? $user[0]['user_birth_date'] : '' ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="txtProfile" class="col-sm-2 col-form-label">Perfil</label>
        <div class="col-sm-5">
            <select <?= $edit == 3 ? 'readonly' : '' ?> class="form-control" id="txtProfile">
                <?php
                if($edit==3) { ?>
                    <option><?= $user[0]['profile_name'] ?></option>
                <?php }
                else {
                    foreach ($profiles as $profile) { ?>
                        <option <?= ($edit == 1 || $edit == 3) && $profile['profile_id'] == $user[0]['user_profile'] ? ' selected="selected"' : '' ?>
                                value="<?= $profile['profile_id'] ?>"><?= $profile['profile_name'] ?></option>
                    <?php }
                } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="txtPass" class="col-sm-2 col-form-label">Senha</label>
        <div class="col-sm-5">
            <input type="password" <?= $edit == 3 ? 'readonly' : '' ?> class="form-control" id="txtPass" value="<?= $edit == 1 || $edit == 3 ? $user[0]['user_password'] : '' ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="txtRePass" class="col-sm-2 col-form-label">Confirme a Senha</label>
        <div class="col-sm-5">
            <input type="password" <?= $edit == 3 ? 'readonly' : '' ?> class="form-control" id="txtRePass" value="<?= $edit == 1 || $edit == 3 ? $user[0]['user_password'] : '' ?>">
        </div>
    </div>

    <input type="hidden" id="hd_passOld" value="<?= $edit == 1 ? $user[0]['user_password'] : '' ?>"/>
    <input type="hidden" id="hd_userID" value="<?= $edit == 1 ? $user[0]['user_id'] : '' ?>"/>
    <input type="hidden" id="hd_birthDate" value="<?= $edit == 1 ? $user[0]['user_birth_date'] : '' ?>"/>

    <?php
    if($edit!=3)
    {
    ?>
        <button id="btnSaveUser" class="btn btn-primary">Salvar</button>
    <?php } ?>
    </div>
</div>