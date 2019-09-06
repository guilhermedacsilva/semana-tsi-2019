<div class="secao-colorida">
    <section class="container preenchimento-acima">
        <h2 class="margem-baixo">
            <img src="<?= URL_IMG . 'mascote.png' ?>" alt="Mascote de TSI" class="marcador">
            Desafio
        </h2>
        <p class="text-justify margem-baixo">
            <img src="<?= URL_IMG . 'charada.jpg' ?>" alt="Desafio" class="col-xs-5 col-md-4 col-lg-3 pull-right imagem-margem-esquerda imagem-desafio-funko">
            <!--
            <a class="btn btn-default" href="<?= URL_RAIZ . 'desafio' ?>">Entrar no desafio</a><br><br>
            -->
            O desafio da 8ª Semana Acadêmica de TSI será composto por charadas envolvendo diversos temas da área de computação. Não serão charadas tradicionais, com adivinhação, mas pequenos desafios computacionais, que serão liberados aos poucos para os alunos resolverem. Depois de resolver uma charada, digite o código descoberto na página do desafio para ganhar os pontos. Corra, pois quem resolver primeiro ganhará mais pontos!
            <?php if (count($melhores) == 5) : ?>
                <br><br>
                Ranking dos 5 melhores em ORDEM ALFABÉTICA<br>
                <?php foreach ($melhores as $nome) : ?>
                    <span class="glyphicon glyphicon-star"></span> <?= $nome ?><br>
                <?php endforeach ?>
                <?php if (count($demais) > 0) : ?>
                    <br>
                    Ranking dos demais com a pontuação<br>
                    <?php foreach ($demais as $chave => $aluno) : ?>
                        <?= $chave+6 . ' - ' . $aluno['nome'] ?> (<?= $aluno['pontuacao'] ?> pontos)<br>
                    <?php endforeach ?>
                <?php endif ?>
            <?php endif ?>
        </p>
    </section>
</div>
