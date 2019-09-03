<div class="container-fluid">
    <div class="col-sm-6 col-sm-offset-3">
        <h1 class="text-center margem-baixo">Login do Desafio de TSI 2019</h1>
        <form action="<?= URL_RAIZ . 'login' ?>" method="post" class="margem-baixo">
            <div class="form-group <?= $this->getErroCss('login') ?>">
                <label class="control-label" for="ra">RA</label>
                <input id="ra" name="ra" class="form-control" autofocus value="<?= $this->getPost('ra') ?>">
            </div>
            <div class="form-group <?= $this->getErroCss('login') ?>">
                <label class="control-label" for="senha">Senha</label>
                <input id="senha" name="senha" class="form-control" type="password">
            </div>
            <div class="form-group has-error text-center">
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'login']) ?>
            </div>
            <button type="submit" class="btn btn-default center-block">Entrar</button>
        </form>
        <div class="text-center">
            <a href="<?= URL_RAIZ ?>">Voltar para o site da Semana Acadêmica de TSI.</a>
        </div>
    </div>
</div>
