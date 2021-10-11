<?php
include('../config/conexao.php');


//Query de busca
$sql = 'SELECT * FROM filmes WHERE is_cartaz ="S" Order BY criadoem';

//Resultado como um conjunto de linhas
$result = mysqli_query($conn, $sql);

//Busca a Query

$filmes = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Limpa a memoria do $result
mysqli_free_result($result);

//fecha conexão
mysqli_close($conn);

?>
<?php include('includes/header.php'); ?>
<main>
    <section class="galeria">
        <div class="fotos">
            <img src="../images/carrosel/item01.jpg" alt="">
            <img src="../images/carrosel/item02.png" alt="">
            <img src="../images/carrosel/item03.png" alt="">
            <img src="../images/carrosel/item04.jpg" alt="">
            <img src="../images/carrosel/item01.jpg" alt="">
        </div>
    </section>
    <h3 class="center ">Filmes em Cartaz</h3>
    <div class="row">
        <?php foreach ($filmes as $filme) : ?>
        <!---CARD COM IMAGENS -->
        <!-- <div class="col s12 m6 l3">
                <div class="card hoverable">       
                    <div class="card-image">                   
                        <img class="card-img" src="<?= $filme["capa"] ?>" alt="Venom capa" />
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper"><i class="material-icons amber-text">star</i>9,5</p>
                        <span class="card-title"><?= $filme["titulo"] ?></span>
                        <p><?= $filme["sinopse"] ?>.</p><br>
                        <i>Gênero:<?= $filme["genero"] ?></i>
                    </div>
                    <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <a href="#">Comprar</a>
                    </div>
                </div>
            </div>    -->
        <!---CARD COM IMAGENS -->
        <div class="card col s12 m6 l3 ">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="card-img" src="<?= $filme["capa"] ?>" alt="Venom capa" />
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><span
                        class="card-title"><?= $filme["titulo"] ?></span><i
                        class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><span
                        class="card-title"><?= $filme["titulo"] ?></span><i
                        class="material-icons right">close</i></span>
                <p><?= $filme["sinopse"] ?>.</p><br>
                <i>Gênero:<?= $filme["genero"] ?></i>
            </div>
        </div>
        <?php endforeach ?>
        <!-- <div class="col s3">
                <div class="card hoverable">
                    <div class="card-image">
                        <img class="card-img" src="https://www.themoviedb.org/t/p/original/9cH7ZjFbZ3JQCQ8LfoFeze3259m.jpg" alt="Abelha Maya capa" />
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper"><i class="material-icons amber-text">star</i>9,5</p>
                        <span class="card-title">Abelinha Maya</span>
                        <p>Quando Maya, uma abelhinha teimosa, e seu melhor amigo Willi resgatam uma formiga princesa, eles se encontram no meio de uma batalha épica de insetos que os levará a estranhos mundos e testará sua amizade até o limite.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div> -->
</main>
<?php include('../includes/footer.php'); ?>
</body>

</html>