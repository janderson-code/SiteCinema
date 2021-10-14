<?php

include('../config/conexao.php');
include('/models/delete_sessao.php');
include('/models/model.php');

$id_sessao = $_GET['id_sessao'];

//Query de busca
$sql = "SELECT s.id_sessao,s.id_filme,s.num_sala,s.horario,s.data_sessao,s.qtd_assento_disp,s.valor_ingresso,f.titulo, f.capa
FROM sessao s INNER JOIN filmes f ON s.id_filme = f.id";



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
        <a href="cadastrarSessao.php" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Clique aqui para Cadastrar novas Sessões</a>
    </div>
    <br><br>
    <div class="row">
        <?php foreach ($sessao as $sessoes) : ?>
           <div class="card  col l3">
               <div class="card-image">
                   <img src="<?= $sessoes['capa'] ?>" alt=""/>
                   <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">payment</i></a>
               </div>
               <div class="card-content">
                 <p><b>Sessão :</b><?= $sessoes["id_sessao"] ?></p>
                 <p><b>Filme da sessão :</b><?= $sessoes["titulo"] ?></p>
                 <p><b>Sala :</b><?= $sessoes["num_sala"] ?></p>
                 <p><b>Horario :</b><?= $sessoes["horario"] ?></p>
                 <p><b>data :</b><?= $sessoes["data_sessao"] ?></p>
                 <p><b>Assentos disponiveis :</b><?= $sessoes["qtd_assento_disp"] ?></p>
                 <p><b>Preço do Ingresso  :</b>R$<?= $sessoes["valor_ingresso"] ?></p>
            </div>
               <div class="card-action">
                   <a class="waves-effect waves-light btn-small blue" href="alterarSessao.php?id_sessao=<?php echo $sessoes['id_sessao'] ?>"><i class="material-icons right">edit</i></a>
                    <button class="waves-effect waves-light btn-small red " onclick="excluir(<?= $sessoes['id_sessao'] ?>)"><i class="material-icons right">delete</i></button>
               </div>
           </div>
        <?php endforeach ?>
    </div>

</main>
<?php include('includes/footer.php'); ?>
</body>
<script>
    // Código para exclusão do item ao clicar no button de deletar.
    function excluir() {
        if (confirm("Deseja remover a sessão '<?= $sessoes['id_sessao'] ?>' com o filme <?= $sessoes['titulo'] ?>'  ? ")) {
            $.ajax({
                url: "models/delete_sessao.php?id_sessao=<?= $sessoes['id_sessao'] ?>",
                type: "GET",
                success: function() {
                    location.reload();
                }
            });
        }

    }
</script>

</html>