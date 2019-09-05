<div class="container">
	<h1 class="text-center margem-baixo-md">Desafio de TSI 2019</h1>

	<?php if ($mensagem) : ?>
        <div class="alert alert-<?= $mensagemTipo ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $mensagem ?>
        </div>
    <?php endif ?>

	<div class="margem-baixo-sm">
		Aluno: <?= $this->getUsuario()->getNome() ?>
		<form action="<?= URL_RAIZ . 'login' ?>" method="post" class="inline">
		    <input type="hidden" name="_metodo" value="DELETE">
		    <button type="submit" class="btn btn-danger btn-linha">Sair</button>
		</form>
	</div>

	<div class="margem-baixo-md">
		Pontuação atual: <strong><?= $this->getUsuario()->getPontuacao() ?></strong>
	</div>

	<form class="form-inline margem-baixo-md" method="POST" action="<?= URL_RAIZ . 'desafio' ?>">
		<div class="form-group">
			Inserir código:
			<input name="codigo" class="form-control btn-linha">
			<button type="submit" class="btn btn-primary btn-linha">Enviar</button>
		</div>
	</form>

	<div class="cronograma">
        <h2>Listagem de desafios</h2>
        <div class="cronograma-conteudo">

            <?php $this->incluirVisao('desafio/item.php', [
            	'href' => '',
            	'img' => 'oculto.png',
            	'texto' => 'Mensagem oculta',
            	'resolvido' => $this->getUsuario()->isCodigoResolvido(1)
            ]) ?>

            <?php $this->incluirVisao('desafio/item.php', [
            	'href' => '',
            	'img' => 'oculto.png',
            	'texto' => '123',
            	'resolvido' => $this->getUsuario()->isCodigoResolvido(2)
            ]) ?>

        </div>
        <div class="cronograma-rodape"></div>
    </div>

</div>