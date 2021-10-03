<?php
include('../config/conexao.php');
include('/models/delete.php');
include('/models/model.php');

//Query de busca
$sql = 'SELECT id ,titulo ,sinopse, genero, capa FROM filmes Order BY criadoem';

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
    </section class="filmes">
    <br><br>
    <div class="center-align">
        <a href="cadastrarFilme.php" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Clique aqui para Cadastrar filmes novos</a>
    </div>
    <br><br>
    <div class="row ">
        <?php foreach ($filmes as $filme) : ?>
            <!---CARD COM IMAGENS -->
            <!-- <div class="col s12 m6 l3 offset-l2">
                <div class="card hoverable">
                    <div class="buttons center">
                        <a class="waves-effect waves-light btn-small blue" href="alterarFilme.php"><i class="material-icons right">edit</i></a>
                        <a class="waves-effect waves-light btn-small red" href="removerFilme.php"><i class="material-icons right">delete</i></a>
                    </div>
                    <div class="card-image">
                        <img class="card-img" src="<?= $filme["capa"] ?>" alt="Venom capa" />
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper"><i class="material-icons amber-text">star</i>9,5</p>
                        <span class="card-title"><?= $filme["titulo"] ?></span>
                        <p><?= $filme["sinopse"] ?>.</p><br>
                        <i>Gênero:<?= $filme["genero"] ?></i>
                    </div>
                    <div class="card-action">
                        <a href="#">Comprar</a>
                    </div>
                </div>
            </div> -->
            <!---CARD COM IMAGENS -->
            <div class="card col s12 m6 l3 ">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="card-img" src="<?= $filme['capa'] ?>" alt="Venom capa" />
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><span class="card-title"><?= $filme["titulo"] ?></span><i class="material-icons right">more_vert</i></span>
                    <p><a href="#">This is a link</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><span class="card-title"><?= $filme["titulo"] ?></span><i class="material-icons right">close</i></span>
                    <p><?= $filme["sinopse"] ?>.</p><br>
                    <i>Gênero:<?= $filme["genero"] ?></i><br><br>
                    <a class="waves-effect waves-light btn-small blue" href="alterarFilme.php"><i class="material-icons right">edit</i></a>
                    <button class="waves-effect waves-light btn-small red btn-delete" href="javascript:void(0)" onclick="excluir(<?= $filme['id'] ?>)"><i class="material-icons right">delete</i></button>
                </div>
            </div>
        <?php endforeach ?>
</main>
<?php include('includes/footer.php'); ?>
</body>
<script>
    function excluir() {
        $.ajax({
            url: "models/delete.php?id=<?= $filme['id'] ?>",
            type: "GET",
            success: function() {
                location.reload();
            }
        });
    }

    function alterar() {
        $.ajax({
            url: "models/alterar.php?id=<?= $filme['id'] ?>",
            type: "GET",
            success: function() {
                location.reload();
            }
        });
    }
</script>

</html>