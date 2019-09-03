<header class="topo">
	<h1 class="hide"><?= APLICACAO_NOME ?></h1>
	<img src="<?= URL_IMG . 'cartaz.jpg' ?>" alt="8ª Semana Acadêmica" class="cartaz">
</header>
<main>
	<?php $this->incluirVisao('inicial/sobre.php') ?>
	<?php $this->incluirVisao('inicial/edicoes-anteriores.php') ?>
	<?php $this->incluirVisao('inicial/cronograma.php') ?>
	<?php $this->incluirVisao('inicial/desafio.php') ?>
	<?php $this->incluirVisao('inicial/inscricao.php') ?>
	<?php $this->incluirVisao('inicial/informacoes.php') ?>
	<?php $this->incluirVisao('inicial/local.php') ?>
	<?php $this->incluirVisao('inicial/rodape.php') ?>
</main>
