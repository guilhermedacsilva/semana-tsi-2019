<div class="col-sm-6 col-lg-4 desafio-caixa">
	<div class="thumbnail <?= $this->getUsuario()->isCodigoResolvido($id) ? 'resolvido' : '' ?>">
		<a href="<?= URL_PUBLICO . "desafio/$arquivo" ?>" target="_blank">
			<div class="resolvido-mensagem">RESOLVIDO</div>
			<img src="<?= URL_IMG . $img ?>" alt="<?= $img ?>" class="thumbnail-imagem">
			<div class="caption">
				<p class="text-center"><?= $texto ?></p>
			</div>
		</a>
	</div>
</div>