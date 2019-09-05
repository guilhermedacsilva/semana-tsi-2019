<div class="container">
	<h1 class="text-center margem-baixo-md">Desafio de TSI 2019</h1>

	<?php if ($mensagem) : ?>
        <div class="alert alert-<?= $mensagemTipo ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $mensagem ?>
        </div>
    <?php endif ?>

	<div class="margem-baixo-md">
		Aluno: <?= $this->getUsuario()->getNome() ?>
		<form action="<?= URL_RAIZ . 'login' ?>" method="post" class="inline">
		    <input type="hidden" name="_metodo" value="DELETE">
		    <button type="submit" class="btn btn-danger btn-linha">Sair</button>
		</form>
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
            
			<div class="thumbnail col-lg-2">
				<a href="">
					<img src="<?= URL_IMG . 'oculto.png' ?>" alt="Oculto">
					<div class="caption">
						<p class="text-center">Mensagem oculta</p>
					</div>
				</a>
			</div>

        </div>
        <div class="cronograma-rodape"></div>
    </div>

</div>