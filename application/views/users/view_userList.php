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
        <div class="col-md-6"><button id="btnNewUser" style="float: right" class="btn btn-primary">Novo Usuário</button></div>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>

        <?php

        foreach ($list as $user) { ?>
            <tr>
                <td><?= $user->user_id ?></td>
                <td><?= $user->user_fullname ?></td>
                <td><?= $user->user_email ?></td>
                <td><?= $user->profile_name ?></td>
                <td>
                    <a href="#" onclick="editUser(<?= $user->user_id ?>);">Editar</a>
                    <a href="#" onclick="viewUser(<?= $user->user_id ?>);">Visualizar</a>
                    <a href="#" onclick="deleteUser(<?= $user->user_id ?>);">Excluir</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
  </table>
    <?php echo $pagination; ?>
</div>