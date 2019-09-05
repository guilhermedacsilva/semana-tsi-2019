<div class="col-sm-6 col-lg-4 desafio-caixa">
	<div class="thumbnail <?= $resolvido ? 'resolvido' : '' ?>">
		<a href="<?= $href ?>" target="_blank">
			<div class="resolvido-mensagem">RESOLVIDO</div>
			<img src="<?= URL_IMG . $img ?>" alt="<?= $img ?>">
			<div class="caption">
				<p class="text-center"><?= $texto ?></p>
			</div>
		</a>
	</div>
</div>