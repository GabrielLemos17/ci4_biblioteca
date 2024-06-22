<div class="container ">
    <div class="row text-light text-center" style="margin-top: 250px">
            <h1>Seja Bem-vindo a Bibliotaca de Caucaia</h1> <br>
        <div class="col-md-4 offset-md-4">
            <h2 style="margin-bottom: 50px">Faça Login Para Continuar</h2>
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->get('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url('login/authenticate'); ?>" method="post">
                <div class="form-group d-flex flex-row align-items-center" style="margin-bottom: 15px">
                    <label for="email" style="margin-right: 10px">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo old('email'); ?>">
                </div>
                <div class="form-group d-flex flex-row align-items-center">
                    <label for="senha" style="margin-right: 10px">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div><br>
                    <button type="submit" class="btn btn-dark">Entrar</button>
            </form>
        </div>
    </div>
</div>