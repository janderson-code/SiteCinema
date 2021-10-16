<?php

include('../config/conexao.php');

$num_sessao = $_GET['id_sessao'];

$num_assento_vendido = $_GET['num_assento'];

$sql_dadosVenda = "SELECT s.id_sessao,s.num_sala,s.horario,s.data_sessao,s.qtd_assento_disp,s.valor_ingresso,f.titulo, f.capa
FROM sessao s
INNER JOIN filmes f ON s.id_filme = f.id
WHERE s.id_sessao = '$num_sessao'";

//Resultado como um conjunto de linhas
$result = mysqli_query($conn, $sql_dadosVenda);

//Busca a Query

$dados_venda = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Limpa a memoria do $result
mysqli_free_result($result);

//fecha conexão
mysqli_close($conn);

?>
<?php include('includes/header.php'); ?>
<style>
    p{
        font-size:1.5em;
    }
    .btn{
        height:80px;
        font-size: 20px;

    }
</style>
<div class="row ">
    <?php foreach ($dados_venda as $dados_vendas) : ?>
        <div class="col s12 m8 l6 offset-l3 ">
            <h2 class="header center">Finalizando compra</h2>
            <div class="card horizontal">
                <div class="card-image">
                    <img src="<?php echo $dados_vendas['capa'] ?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p><b>Sessão :</b><?= $dados_vendas["id_sessao"] ?></p>
                        <p><b>Filme da sessão :</b><?= $dados_vendas["titulo"] ?></p>
                        <p><b>Sala :</b><?= $dados_vendas["num_sala"] ?></p>
                        <p><b>Horario :</b><?= $dados_vendas["horario"] ?></p>
                        <p><b>data :</b><?= $dados_vendas["data_sessao"] ?></p>
                        <p><b>Poltrona:</b><?= $num_assento_vendido ?></p>
                        <p><b>Preço do Ingresso :</b>R$<?= $dados_vendas["valor_ingresso"] ?></p>
                        <div class="center-align " style="margin-top: 20px;">
                            <button href="" class="waves-effect waves-light btn" onclick="pergunta()"><i class="material-icons left">check_circle</i>Finalizar sua Compra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
    function pergunta() {
        if (confirm("Deseja confirmar a compra  da sessão <?= $dados_vendas["id_sessao"] ?> do filme <?= $dados_vendas["titulo"] ?>?")) {
            window.location="finalizar_compra.php?num_assento=<?php echo $num_assento_vendido?>&id_sessao=<?php echo $num_sessao?>";
        }

    }
</script>