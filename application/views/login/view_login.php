<div class="container">
    <form class="form-signin" style="border: 1px solid black;">
        <div id="errorLogin" class="alert alert-danger" style="display: none">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong><br/>E-mail ou senha inválidos.
        </div>
        <div id="errorLogin_blank" class="alert alert-warning" style="display: none">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong><br/>Campos não podem estar vazio.
        </div>
        <h2 class="form-signin-heading">Login</h2>
        <hr>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password">
        <div class="text-right"><img style="width: 32px; display: none" id="loading" src="<?=  base_url('/public/images/5.gif') ?>"/></div>
        <div class="text-right"><a id="btnLogin" class="btn btn-lg btn-primary" style="display: inline">Login</a></div>
    </form>
</div>