<!DOCTYPE html>
<html>
	<head>
	    <title><?= APLICACAO_NOME ?></title>
	    <meta charset="utf-8">
		<meta name="referrer" content="never">
		<meta name="referrer" content="no-referrer">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="VIII Semana Acadêmica de TSI - UTFPR Câmpus Guarapuava">
	    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
	    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
	    <link rel="stylesheet" href="<?= URL_CSS . 'desafio.css' ?>">
	    <link rel="shortcut icon" href="<?= URL_PUBLICO ?>/ico/mascote.ico">
	</head>
	<body>
		<?php $this->imprimirConteudo() ?>
	    <script src="<?= URL_JS . 'jquery-3.1.1.min.js' ?>"></script>
	    <script src="<?= URL_JS . 'bootstrap.min.js' ?>"></script>
	</body>
</html>
