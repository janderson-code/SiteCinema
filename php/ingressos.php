<?php

include('../config/conexao.php');
include('/models/delete_sessao.php');
include('/models/model.php');

$id_sessao = $_GET['id_sessao'];

//Query de busca
$sql = "SELECT s.id_sessao,s.id_filme,s.num_sala,s.horario,s.data_sessao,s.qtd_assento_disp,s.valor_ingresso,f.titulo, f.capa
FROM sessao s INNER JOIN filmes f ON s.id_filme = f.id 
ORDER BY s.criadoem";



//Resultado como um conjunto de linhas
$result = mysqli_query($conn, $sql);

//Busca a Query

$sessao = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
        <h1>Sessões em aberto</h1>
    </div>
    <br><br>
    <div class="row">
        <?php foreach ($sessao as $sessoes) : ?>
            <div class="card col s12 m6 l3">
                <div class="card-image">
                    <img src="<?= $sessoes['capa'] ?>" alt="" />
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="selec_assento.php?id_sessao=<?php echo $sessoes['id_sessao'] ?>&num_sala=<?php echo $sessoes['num_sala'] ?>"><i class="material-icons">payment</i></a>
                </div>
                <div class="card-content">
                    <p><b>Sessão :</b><?= $sessoes["id_sessao"] ?></p>
                    <p><b>Filme da sessão :</b><?= $sessoes["titulo"] ?></p>
                    <p><b>Sala :</b><?= $sessoes["num_sala"] ?></p>
                    <p><b>Horario :</b><?= $sessoes["horario"] ?></p>
                    <p><b>data :</b><?= $sessoes["data_sessao"] ?></p>
                    <p><b>Assentos disponiveis :</b><?= $sessoes["qtd_assento_disp"] ?></p>
                    <p><b>Preço do Ingresso :</b>R$<?= $sessoes["valor_ingresso"] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</main>
<?php include('includes/footer.php'); ?>
</body>

</html>