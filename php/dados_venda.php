<?php

include('../config/conexao.php');

$numero = $_GET['id_sessao'];

$num_assento_vendido = $_GET['num_assento'];

$sql_dadosVenda = "SELECT s.num_sala,s.horario,s.data_sessao,s.qtd_assento_disp,s.valor_ingresso,f.titulo, f.capa,v.id_sessao,v.num_assento_vendido
FROM filmes f
INNER JOIN sessao s ON s.id_filme = f.id
INNER JOIN vendas v ON v.id_sessao =  s.id_sessao
WHERE v.num_assento_vendido = '$num_assento_vendido' AND v.id_sessao = '$numero'";



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

<div class="row ">

    <div class="col s12 m7 offset-l3">
        <h2 class="header center">Finalizando compra</h2>
        <div class="card horizontal">
            <div class="card-image">
                <img src="<?php echo $dados_venda['capa'] ?>">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p><b>Sessão :</b><?= $data_venda["id_sessao"] ?></p>
                    <p><b>Filme da sessão :</b><?= $data_venda["titulo"] ?></p>
                    <p><b>Sala :</b><?= $$data_venda["num_sala"] ?></p>
                    <p><b>Horario :</b><?= $data_venda["horario"] ?></p>
                    <p><b>data :</b><?= $data_venda["data_sessao"] ?></p>
                    <p><b>Poltrona:</b><?= $$data_venda["num_assento_vendido"] ?></p>
                    <p><b>Preço do Ingresso :</b>R$<?= $data_venda["valor_ingresso"] ?></p>
                    <div class="center-align">
                        <a href="" class="waves-effect waves-light btn"><i class="material-icons left">check_circle</i>Finalizar sua Compra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>