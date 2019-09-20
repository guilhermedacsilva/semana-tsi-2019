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
			Inserir frase secreta:
			<input name="codigo" class="form-control btn-linha">
			<button type="submit" class="btn btn-primary btn-linha">Enviar</button>
		</div>
	</form>

	<div class="cronograma">
        <h2>Listagem de desafios</h2>
        <div class="cronograma-conteudo">

            <?php $this->incluirVisao('desafio/item.php', [
            	'id' => 1,
            	'arquivo' => 'mensagem.zip',
            	'img' => 'oculto.png',
            	'texto' => 'Mensagem oculta',
            ]) ?>

            <?php $this->incluirVisao('desafio/item.php', [
                'id' => 2,
                'arquivo' => 'sucesso.zip',
                'img' => 'dicionario.png',
                'texto' => 'Números do sucesso',
            ]) ?>

            <?php $this->incluirVisao('desafio/item.php', [
                'id' => 3,
                'arquivo' => 'palavras.zip',
                'img' => 'palavras.png',
                'texto' => 'Palavras',
            ]) ?>

            <?php $this->incluirVisao('desafio/item.php', [
                'id' => 4,
                'arquivo' => 'calculadora.zip',
                'img' => 'calculadora.png',
                'texto' => 'Calculadora',
            ]) ?>

            <?php $this->incluirVisao('desafio/item.php', [
                'id' => 5,
                'arquivo' => 'Em_Negrito_no_Livro_Arquitetura_Pg_388.zip',
                'img' => 'livro.jpg',
                'texto' => 'Biblioteca',
            ]) ?>

            <?php $this->incluirVisao('desafio/item.php', [
                'id' => 6,
                'arquivo' => 'quebra-cabeca.zip',
                'img' => 'puzzle.png',
                'texto' => 'Quebra-cabeça',
            ]) ?>

            <?php $this->incluirVisao('desafio/item.php', [
                'id' => 7,
                'arquivo' => 'banco_de_dados.zip',
                'img' => 'bd.png',
                'texto' => 'Banco de dados',
            ]) ?>

        </div>
        <div class="cronograma-rodape"></div>
    </div>

</div>